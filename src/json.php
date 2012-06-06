<?php
header('Content-Type: text/javascript; charset=utf8');
header('Access-Control-Allow-Origin: *');

function error($msg,$json=false) {
	if ($json) print_r($CALLBACK.'('.json_encode(array("error"=>$msg)).');');
	else $final['error'] = $msg;
}

$ref = (isset($_SERVER['HTTP_REFERER']))?$_SERVER['HTTP_REFERER']:'';
if (isset($ref) && !empty($ref) && isset($_GET['apikey']) && !empty($_GET['apikey'])) {
	require 'api_auth.php';
	$allow = true;
	foreach($auth as $key => $referer) {
		if ($_GET['apikey'] == $key && strpos($ref,$referer) !== false) { $allow = true; break; }
	}
	if (!$allow) die(error("Bad API Key!",true));
} else {
	if (!isset($_GET['apikey']) || empty($_GET['apikey'])) die(error("API Key Error!",true));
	elseif (!isset($ref) || empty($ref)) die(error("HTTP Referer Error!",true));
}
$mysql = mysql_connect('localhost','root','comwiz05');
if (!$mysql) die(error(mysql_error(),true));
mysql_select_db('hns');

if (isset($_GET['id']) && !empty($_GET['id'])) $ID = $_GET['id'];
if (isset($_GET['fields']) && !empty($_GET['fields'])) $FIELDS = $_GET['fields'];
if (isset($_GET['callback']) && !empty($_GET['callback'])) $CALLBACK = $_GET['callback'];

$query = 'SELECT u.user_id';

if (isset($FIELDS)) {
	$search = array("user_id","user_id,","first_name","middle_name","last_name");
	$replace = array("u.user_id","","firstname","middlename","lastname");
	$fields = str_replace($search,$replace,$FIELDS);
	$query .= ','.$fields;
} else $query .= ', username, last_login, date_joined, logins, firstname, middlename, lastname, email, gender, birth_month, birth_day, birth_year, hometown, current_city, default_image, hobbies, hits, rank, xrank, xratings, voters, friends, website, status, mood, setting_language';

$query .= ' FROM (login u JOIN info i ON u.user_id = i.user_id) JOIN homenetspaces h ON u.user_id = h.user_id';

if (isset($ID)) {
	if (strpos($ID,",")) {
		$ids = explode(",",$ID);
		$query .= ' WHERE';
		foreach ($ids as $key => $id) {
			if ($key > 0) $query .= ' OR u.user_id = '.$id;
			else $query .= ' u.user_id = '.$id;
		}
	} elseif (strpos($ID,"-")) {
		$ids = explode("-",$ID);
		$query .= ' WHERE u.user_id > '.$ids[0].' AND u.user_id < '.$ids[1];
	} else $query .= ' WHERE u.user_id = '.$ID;
}

$res = mysql_query($query) or die(error(mysql_error(),true));

while ($row = mysql_fetch_assoc($res)) {
	for ($i=0; $i<mysql_num_fields($res); $i++) {
		$info = mysql_fetch_field($res,$i);
		$type = $info->type;
		if ($type == 'real') $row[$info->name] = doubleval($row[$info->name]);
		else if ($type == 'int') $row[$info->name] = intval($row[$info->name]);
	}
	$rows[] = $row;
}

$final = array(
	"data"=>$rows,
	"error"=>false
);

$json = '('.json_encode($final).');';
print_r($CALLBACK.$json);
mysql_close();

/*
CHECK if user_id exists
CHECK PRIVACY
REMOVE UNWANTED DATA FROM FIELDS

Options:
** NONE = ALL,
** ID = Specific User
** FIELDS = WHAT DATA
** Available Fields = {user_id} username, last_login, date_joined, firstname, middlename, lastname, email, gender, birth_month, birth_day, birth_year, hometown, current_city, community, hobbies, hits, logins, rank, xrank, xratings, voters, friends, website, status, mood, default_image, setting_language 
*/
?>