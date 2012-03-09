<?php
session_start();

require ("lang.inc.php");
include ("auth.inc.php");
include ("admin.inc.php");
include ("db.member.inc.php");

/*
Average Age, Files, Pictures, Logins, Hits, Friends, Comments, Messages, Votes, Rating
Hometowns
Profile Songs List
Number of Privacy Changes
Profile View Choice
Ratio Gender, Email, Website, About Me, SAM, Full Name
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//<?php echo $TEXT['global-dtdlang']; ?>" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $TEXT['global-lang']; ?>" lang="<?php echo $TEXT['global-lang']; ?>" dir="<?php echo $TEXT['global-text_dir']; ?>">

<head>
<title><?php echo $TEXT['global-headertitle'] . " | " . $TEXT['homepage-headertitle']; ?></title>
<meta http-equiv="content-type" content="text/html; charset=<?php echo $TEXT['global-charset']; ?>" />
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="javascript.php"></script>
</head>

<body>
<?php include ("hd.inc.php"); ?>
<!-- Begin page content -->
<div class="pagecontent">
<h1>Welcome to the Admin Member Summary.</h1>
<a href="admin_page_editor.php">Page Editor</a> | <a href="admin_view_files.php">Browse Files</a> | <a href="admin_msummary.php">Member Summary</a>
<br />
<br />
<div style="margin: 0 auto;width: 75%;">
<span style="float: left; text-align: left; width: 300px;">Here you can edit member information!
<br />There are 
<?php
$result = mysql_query('SELECT user_id FROM login');
$members = mysql_num_rows($result);
echo $members;
?>
 members.</span>
<span style="float: right; text-align: right; width: 300px;">
<?php
$ssort = (isset($_GET['sort'])) ? $_GET['sort'] : null;
$sorder = (isset($_GET['order'])) ? $_GET['order'] : null;
?>
<select name="sortingorder" size="1" id="selectsort" style="padding: 4px;" onchange="window.location = document.all.selectsort.value">
<option <?php if ($ssort == 0 || null) { echo 'selected="selected"'; } ?>>Select Your Sorting Order:&nbsp;</option>
<option value="<?php echo $_SERVER['PHP_SELF']; ?>?sort=username&order=asc" <?php if ($ssort == "username" && $sorder == "asc") { echo 'selected="selected"'; } ?>>Username ASC</option>
<option value="<?php echo $_SERVER['PHP_SELF']; ?>?sort=username&order=desc" <?php if ($ssort == "username" && $sorder == "desc") { echo 'selected="selected"'; } ?>>Username DESC</option>
<option value="<?php echo $_SERVER['PHP_SELF']; ?>?sort=firstname&order=asc" <?php if ($ssort == "firstname" && $sorder == "asc") { echo 'selected="selected"'; } ?>>First Name ASC</option>
<option value="<?php echo $_SERVER['PHP_SELF']; ?>?sort=firstname&order=desc" <?php if ($ssort == "firstname" && $sorder == "desc") { echo 'selected="selected"'; } ?>>First Name DESC</option>
<option value="<?php echo $_SERVER['PHP_SELF']; ?>?sort=lastname&order=asc" <?php if ($ssort == "lastname" && $sorder == "asc") { echo 'selected="selected"'; } ?>>Last Name ASC</option>
<option value="<?php echo $_SERVER['PHP_SELF']; ?>?sort=lastname&order=desc" <?php if ($ssort == "lastname" && $sorder == "desc") { echo 'selected="selected"'; } ?>>Last Name DESC</option>
<option value="<?php echo $_SERVER['PHP_SELF']; ?>?sort=datejoined&order=asc" <?php if ($ssort == "datejoined" && $sorder == "asc") { echo 'selected="selected"'; } ?>>Date Joined ASC</option>
<option value="<?php echo $_SERVER['PHP_SELF']; ?>?sort=datejoined&order=desc" <?php if ($ssort == "datejoined" && $sorder == "desc") { echo 'selected="selected"'; } ?>>Date Joined DESC</option>
<option value="<?php echo $_SERVER['PHP_SELF']; ?>?sort=lastlogin&order=asc" <?php if ($ssort == "lastlogin" && $sorder == "asc") { echo 'selected="selected"'; } ?>>Last Login ASC</option>
<option value="<?php echo $_SERVER['PHP_SELF']; ?>?sort=lastlogin&order=desc" <?php if ($ssort == "lastlogin" && $sorder == "desc") { echo 'selected="selected"'; } ?>>Last Login DESC</option>
<option value="<?php echo $_SERVER['PHP_SELF']; ?>?sort=rank&order=asc" <?php if ($ssort == "rank" && $sorder == "asc") { echo 'selected="selected"'; } ?>>Rank ASC</option>
<option value="<?php echo $_SERVER['PHP_SELF']; ?>?sort=rank&order=desc" <?php if ($ssort == "rank" && $sorder == "desc") { echo 'selected="selected"'; } ?>>Rank DESC</option>
<option value="<?php echo $_SERVER['PHP_SELF']; ?>?sort=xrank&order=asc" <?php if ($ssort == "xrank" && $sorder == "asc") { echo 'selected="selected"'; } ?>>xRank ASC</option>
<option value="<?php echo $_SERVER['PHP_SELF']; ?>?sort=xrank&order=desc" <?php if ($ssort == "xrank" && $sorder == "desc") { echo 'selected="selected"'; } ?>>xRank DESC</option>
<option value="<?php echo $_SERVER['PHP_SELF']; ?>?sort=votes&order=asc" <?php if ($ssort == "votes" && $sorder == "asc") { echo 'selected="selected"'; } ?>>Votes ASC</option>
<option value="<?php echo $_SERVER['PHP_SELF']; ?>?sort=votes&order=desc" <?php if ($ssort == "votes" && $sorder == "desc") { echo 'selected="selected"'; } ?>>Votes DESC</option>
<option value="<?php echo $_SERVER['PHP_SELF']; ?>?sort=rating&order=asc" <?php if ($ssort == "rating" && $sorder == "asc") { echo 'selected="selected"'; } ?>>Rating ASC</option>
<option value="<?php echo $_SERVER['PHP_SELF']; ?>?sort=rating&order=desc" <?php if ($ssort == "rating" && $sorder == "desc") { echo 'selected="selected"'; } ?>>Rating DESC</option>
<option value="<?php echo $_SERVER['PHP_SELF']; ?>?sort=hits&order=asc" <?php if ($ssort == "hits" && $sorder == "asc") { echo 'selected="selected"'; } ?>>Hits ASC</option>
<option value="<?php echo $_SERVER['PHP_SELF']; ?>?sort=hits&order=desc" <?php if ($ssort == "hits" && $sorder == "desc") { echo 'selected="selected"'; } ?>>Hits DESC</option>
<option value="<?php echo $_SERVER['PHP_SELF']; ?>?sort=logins&order=asc" <?php if ($ssort == "logins" && $sorder == "asc") { echo 'selected="selected"'; } ?>>Logins ASC</option>
<option value="<?php echo $_SERVER['PHP_SELF']; ?>?sort=logins&order=desc" <?php if ($ssort == "logins" && $sorder == "desc") { echo 'selected="selected"'; } ?>>Logins DESC</option>
<option value="<?php echo $_SERVER['PHP_SELF']; ?>?sort=age&order=asc" <?php if ($ssort == "age" && $sorder == "asc") { echo 'selected="selected"'; } ?>>Age ASC</option>
<option value="<?php echo $_SERVER['PHP_SELF']; ?>?sort=age&order=desc" <?php if ($ssort == "age" && $sorder == "desc") { echo 'selected="selected"'; } ?>>Age DESC</option>
</select>
</span>
</div>
<br /><br />
<?php
$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id ORDER BY date_joined ASC';
$result = mysql_query($query, $db) or die(mysql_error($db));

switch ($_GET['sort']) {
case 'username':
switch ($_GET['order']) {
case 'asc':
$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id ORDER BY username ASC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;

case 'desc':
$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id ORDER BY username DESC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;
}
break;

case 'firstname':
switch ($_GET['order']) {
case 'asc':
$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id  ORDER BY firstname ASC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;

case 'desc':
$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id ORDER BY firstname DESC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;
}
break;

case 'lastname':
switch ($_GET['order']) {
case 'asc':
$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id ORDER BY lastname ASC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;

case 'desc':
$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id ORDER BY lastname DESC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;
}
break;

case 'datejoined':
switch ($_GET['order']) {
case 'asc':
$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id ORDER BY date_joined ASC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;

case 'desc':
$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id ORDER BY date_joined DESC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;
}

case 'lastlogin':
switch ($_GET['order']) {
case 'asc':
$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id ORDER BY last_login ASC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;

case 'desc':
$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id ORDER BY last_login DESC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;
}

case 'rank':
switch ($_GET['order']) {
case 'asc':
$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id ORDER BY rank ASC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;

case 'desc':
$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id ORDER BY rank DESC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;
}

case 'xrank':
switch ($_GET['order']) {
case 'asc':
$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id ORDER BY xrank ASC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;

case 'desc':
$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id ORDER BY xrank DESC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;
}

case 'votes':
switch ($_GET['order']) {
case 'asc':
$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id ORDER BY xratings ASC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;

case 'desc':
$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id ORDER BY xratings DESC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;
}

case 'rating':
switch ($_GET['order']) {
case 'asc':
$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id ORDER BY rating ASC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;

case 'desc':
$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id ORDER BY rating DESC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;
}

case 'hits':
switch ($_GET['order']) {
case 'asc':
$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id ORDER BY hits ASC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;

case 'desc':
$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id ORDER BY hits DESC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;
}

case 'logins':
switch ($_GET['order']) {
case 'asc':
$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id ORDER BY logins ASC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;

case 'desc':
$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id ORDER BY logins DESC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;
}

case 'age': // order should be switched
switch ($_GET['order']) {
case 'asc':
$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id ORDER BY birth_year DESC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;

case 'desc':
$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id ORDER BY birth_year ASC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;
}
break;
}

function determine_age($birth_date) {
$birth_date_time = strtotime($birth_date);
$to_date = date('m/d/Y', $birth_date_time);

list ($birth_month, $birth_day, $birth_year) = explode('/', $to_date);

$now = time();
$current_month = date("m");
$current_day = date("d");
$current_year = date("Y");

$this_year_birth_date = $birth_month . '/' . $birth_day . '/' . $current_year;
$this_year_birth_date_timestamp = strtotime($this_year_birth_date);

$years_old = ($current_year - $birth_year);

if ($now < $this_year_birth_date_timestamp) { // his/her birthday hasn't yet arrived this year
$years_old = ($years_old - 1);
}

return $years_old;
}

while ($row = mysql_fetch_array($result)) {
// determine color of background
$colorarray = array('ccffff', 'ccccff');
$o = rand(0, count($colorarray) - 1);
$randcolor = "{$colorarray[$o]}";
?>
<span style="background-color: #ffffff; float: left; width: 33.333%;">
<fieldset style="clear: right; padding: 10px; margin: 0 auto; width: 300px;">
<legend><a href="admin_update_user.php?id=<?php echo $row['user_id']; ?>" style="text-decoration: none;"><?php
$uresult = mysql_db_query($om, "SELECT DISTINCT username FROM users_online ORDER BY username ASC") or die("Database SELECT Error");

echo $row['username'] . " | " . $row['first_name'] . " " . $row['last_name'];

while ($onlineusers = mysql_fetch_array($uresult, MYSQL_ASSOC)) {
foreach ($onlineusers as $users) {
if ($row['username'] == $users) {
echo " is Online!";
}
}
};

echo "</a>";

if ($current_month == $row['birth_month'] && $current_day == $row['birth_day']) {
echo " Happy Birthday!";
}
?>&nbsp;</legend>
<!-- Begin moreinfo -->
<div id="<?php echo $row['username'] . $row['user_id']; ?>" class="moreinfo" style="visibility: hidden; display: block;">
<span class="closespan">
<span class="header">
More Info
</span>
<a title="Close" accesskey="8" onclick="showMe5('<?php echo $row['username'] . $row['user_id']; ?>')" class="close">Close</a>
</span>
<div class="splash">
<ul style="list-style-type: none; margin: 0; text-align: left;">
<li>
<?php
$votes = ($row['xratings'] > 0) ? $row['xratings'] : 'No';
$vtense = ($row['xratings'] == 0 || $row['xratings'] > 1) ? ' Votes' : ' Vote';
echo "<small>$votes$vtense</small>";
?>
<small>
&nbsp;&nbsp;|&nbsp;&nbsp;xRank:
<?php
if ($row['website'] != null) $ifexists_website = 1000;
if ($row['user_style'] != null) $ifexists_user_style = 1000;
if ($row['default_image'] != null) $ifexists_defualt_image = 1000;

$xrank = ($row['rank'] + ($row['hits'] * 2) + ($row['logins'] * 5) + ($ifexists_website) + ($ifexists_user_style) + ($ifexists_default_image));

if ($row['logins'] > 5) {
if ($row['logins'] > 100) { $xrank = ($xrank * 5);
if ($row['logins'] > 200) { $xrank = ($xrank * 10);
if ($row['logins'] > 300) { $xrank = ($xrank * 15);
if ($row['logins'] > 400) { $xrank = ($xrank * 20);
if ($row['logins'] > 500) { $xrank = ($xrank * 25);
}}}}}
$xrank = ($xrank * 1.0586951);
}
elseif ($row['logins'] == 4) $xrank = ($xrank / 2.2452);
elseif ($row['logins'] == 3) $xrank = ($xrank / 3.1385);
elseif ($row['logins'] == 2) $xrank = ($xrank / 4.3698);
elseif ($row['logins'] == 1) $xrank = 0;
else $xrank = 0;

echo " $xrank ";
?></small>
</li>
<li>
<small>
Profile Views: 
<?php echo $row['hits']; ?>
</small>
</li>
<li>
<small>
Logged On
<?php
echo " $row['logins'] ";
if ($row['logins'] > 1) echo "Times";
elseif ($row['logins'] == 1) echo "Time";
else echo "Times & Was Hacked :P";
?>
</small>
</li>
<li>
<small>
Last Login: <?php echo $row['last_login']; ?>
</small>
</li>
<li>
<small>
Date Joined: <?php echo $row['date_joined']; ?>
</small>
</li>
</ul>
</div>
</div>
<!-- End moreinfo -->
<div style="background-color: #<?php echo $randcolor; ?>; height: 150px; margin-top: 5px; padding: 10px;">
<span style="float: left; width: 150px;">
<?php
if ($row['default_image'] != null) echo '<a title="View More Info!" onclick="showMe5(\'' . $row['username'] . $row['user_id'] . '\')"><img src="uploads/' . $row['username'] . '/images/thumb/' . $row['default_image'] . '" id="defaultuserimage" /></a><br />' . "\n";
else echo '<a title="View More Info!" onclick="showMe5(\'' . $row['username'] . $row['user_id'] . '\')"><img src="i/mem/default.jpg" id="defaultuserimage" /></a><br />' . "\n";
?>
</span>
<span style="float: right; text-align: left; width: 120px;">
<div style="margin-bottom: 16px;">
Status:
<br />
<?php
if ($row['status'] != null) echo $row['status'];
else echo "<br />";
?>
</div>
<div style="margin-bottom: 16px;">
Mood:
<br />
<?php
if ($row['mood'] != null) echo $row['mood'];
else echo "<br />";
?>
</div>
<div>
Gender:
<?php echo $row['gender']; ?>
</div>
<div style="margin-bottom: 6px;">
Age:
<?php
$birth_date = $row['birth_month'] . "/" . $row['birth_day'] . "/" . $row['birth_year'];
$age = determine_age($birth_date);
echo $age;
?>
</div>
</span>
</div>
</fieldset>
</span>
<?php
}

mysql_free_result($result);
mysql_close($db);
?>
</div>
<!-- End page content -->
<?php include ("ft.inc.php"); ?>
</body>

</html>