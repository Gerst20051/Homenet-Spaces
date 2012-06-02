<?php
if (isset($_GET['action']) && ($_GET['action'] == "remove") && (!isset($_COOKIE['oldversion']))) {
$expire = time() + (60 * 60 * 24 * 30);

setcookie('oldversion', 'remove', $expire);
}

if (isset($_GET['logged']) || isset($_GET['username']) || isset($_GET['password']) || isset($_GET['user_id']) || isset($_GET['access_level'])) {
$GET['logged'] = null;
$logged = null;
$GET['username'] = null;
$username = null;
$GET['password'] = null;
$password = null;
$GET['user_id'] = null;
$user_id = null;
$GET['access_level'] = null;
$access_level = null;

if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1 || 0) {
$hurl_message = 'Security Violation, Admin has been alerted.';
$furl_message = 'Security Violation, Admin has been alerted.';

header ('refresh: 0; url=logout.php?hurlmessage=' . $hurl_message . '&furlmessage=' . $furl_message);
} else {
$hurl_message = 'Security Violation, Admin has been alerted.';
$furl_message = 'Security Violation, Admin has been alerted.';

header ('refresh: 0; url=index.php?hurlmessage=' . $hurl_message . '&furlmessage=' . $furl_message);
}
} else {
if (isset($_COOKIE['hnsrememberme'])) {
if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1 || 0) {
} else {
$username = $_COOKIE['hnsrememberme']['username'];
$password = $_COOKIE['hnsrememberme']['password'];
$redirect = (isset($_REQUEST['redirect'])) ? $_REQUEST['redirect'] : 'user_personal.php';

$query = 'SELECT * FROM
login u
JOIN
info i
ON
u.user_id = i.user_id
WHERE ' .
'username = "' . mysql_real_escape_string($username, $db) .
'" AND ' .
'password = "' . mysql_real_escape_string($password, $db) . '"';
$result = mysql_query($query, $db) or die(mysql_error($db));

if (mysql_num_rows($result) > 0) {
$row = mysql_fetch_assoc($result);
extract($row);
mysql_free_result($result);

$_SESSION['logged'] = 1;
$_SESSION['username'] = $username;
$_SESSION['access_level'] = $row['access_level'];
$_SESSION['last_login'] = $row['last_login'];
$_SESSION['last_login_ip'] = $row['last_login_ip'];
$_SESSION['fullname'] = $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname'];
$_SESSION['firstname'] = $row['firstname'];
$_SESSION['middlename'] = $row['middlename'];
$_SESSION['lastname'] = $row['lastname'];
$_SESSION['email'] = $row['email'];
$_SESSION['status'] = $row['status'];
$_SESSION['mood'] = $row['mood'];
$_SESSION['default_image'] = $row['default_image'];
$_SESSION['pref_song_astart'] = $row['pref_song_astart'];
$_SESSION['pref_psong_astart'] = $row['pref_psong_astart'];
$_SESSION['pref_upstyle'] = $row['pref_upstyle'];
$_SESSION['pref_pupstyle'] = $row['pref_pupstyle'];
$_SESSION['pref_upview'] = $row['pref_upview'];
$_SESSION['setting_vmode'] = $row['setting_vmode'];
$_SESSION['setting_theme'] = $row['setting_theme'];
$_SESSION['setting_language'] = $row['setting_language'];
$_SESSION['user_id'] = $row['user_id'];
$user_id = null;
$username = null;

$last_login = date('Y-m-d');
$logins = ($logins + 1);

$query = 'UPDATE info SET
logins = ' . $logins . '
WHERE
user_id = ' . $_SESSION['user_id'];
mysql_query($query, $db) or die(mysql_error());

// check mode
if ($_SESSION['setting_vmode'] == 1) {
$redirect = "m_index.php";
}

// check theme
if (!isset($_COOKIE['hnsmaintheme'])) {
// cookie may expire 365 days from now (given in seconds)
$expire = time() + (60 * 60 * 24 * 30 * 12);

setcookie('hnsmaintheme', $_SESSION['setting_theme'], $expire);
}

if (isset($_COOKIE['hnsmaintheme']) && ($_COOKIE['hnsmaintheme'] != $_SESSION['setting_theme'])) {
// cookie may expire 365 days from now (given in seconds)
$expire = time() + (60 * 60 * 24 * 30 * 12);

setcookie('hnsmaintheme', $_SESSION['setting_theme'], $expire);
}

// check language
if (!isset($_COOKIE['hnslanguage'])) {
// cookie may expire 30 days from now (given in seconds)
$expire = time() + (60 * 60 * 24 * 30);

setcookie('hnslanguage', $_SESSION['setting_language'], $expire);
}

if (isset($_COOKIE['hnslanguage']) && ($_COOKIE['hnslanguage'] != $_SESSION['setting_language'])) {
// cookie may expire 30 days from now (given in seconds)
$expire = time() + (60 * 60 * 24 * 30);

setcookie('hnslanguage', $_SESSION['setting_language'], $expire);
}

require ("lang/" . $_SESSION['setting_language'] . ".php");
include ("bimage.inc.php");
header ('refresh: 2; url=' . $redirect);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//<?php echo $TEXT['global-dtdlang']; ?>" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $TEXT['global-lang']; ?>" lang="<?php echo $TEXT['global-lang']; ?>" dir="<?php echo $TEXT['global-text_dir']; ?>">

<head>
<title><?php echo $TEXT['global-headertitle'] . " | " . $TEXT['homepage-headertitle']; ?></title>
<meta http-equiv="content-type" content="text/html; charset=<?php echo $TEXT['global-charset']; ?>" />
<meta name="author" content="Homenet Spaces Andrew Gerst" />
<meta name="copyright" content="© Homenet Spaces" />
<meta name="keywords" content="Homenet, Spaces, The, Place, To, Be, Creative, Andrew, Gerst, Free, Profiles, Information, Facts" />
<meta name="description" content="Welcome to Homenet Spaces | This is the place to be creative! Feel free to add yourself to our wonderful community by registering! " />
<meta name="revisit-after" content="7 days" />
<meta name="googlebot" content="index, follow, all" />
<meta name="robots" content="index, follow, all" />
<link rel="stylesheet" type="text/css" href="css/global.css" media="all" />
<script type="text/javascript" src="cs.js"></script>
<script type="text/javascript" src="nav.js"></script>
<script type="text/javascript" src="suggest.js"></script>
<style type="text/css">
body { 
	background: url(<?php echo $bimage; ?>) repeat; 
	background-position : 50% 140px; 
	}
</style>
</head>

<body>
<?php
include ("hd.inc.php");

// needs validip.inc.php from header to get ip
$query = 'UPDATE login SET
last_login = "' . $last_login . '",
last_login_ip = "' . $ip . '"
WHERE
user_id = ' . $_SESSION['user_id'];
mysql_query($query, $db) or die(mysql_error());
?>
<!-- Begin page content -->
<div class="pagecontent">
<?php
echo '<h2>Logged In</h2>';
echo '<p>' . $TEXT["header-logininc_redirect1"] . '</p>';
echo '<p>' . $TEXT["header-logininc_redirect2"] . '<a href="' . $redirect . '">' . $TEXT["header-logininc_redirect_link"] . '</a>.</p>';
?>
</div>
<!-- End page content -->
<?php
include ("ft.inc.php");
include ("tracking_scripts.inc.php");
?>
</body>

</html>
<?php
mysql_close($db);
die();
} else {
$time = time();

setcookie("hnsrememberme[username]", null, $time - 3600);
setcookie("hnsrememberme[password]", null, $time - 3600);

// set these explicitly just to make sure
$_SESSION['logged'] = null;
$_SESSION['username'] = null;
$_SESSION['access_level'] = null;
$_SESSION['last_login'] = null;
$_SESSION['last_login_ip'] = null;
$_SESSION['fullname'] = null;
$_SESSION['firstname'] = null;
$_SESSION['middlename'] = null;
$_SESSION['lastname'] = null;
$_SESSION['email'] = null;
$_SESSION['status'] = null;
$_SESSION['mood'] = null;
$_SESSION['default_image'] = null;
$_SESSION['pref_song_astart'] = null;
$_SESSION['pref_psong_astart'] = null;
$_SESSION['pref_upstyle'] = null;
$_SESSION['pref_pupstyle'] = null;
$_SESSION['pref_upview'] = null;
$_SESSION['setting_vmode'] = null;
$_SESSION['setting_theme'] = null;
$_SESSION['setting_language'] = null;
$_SESSION['user_id'] = null;
$user_id = null;
$username = null;

$header_loginerror = '<p><strong style="color : #ff3333; weight : bold; ">'
. $TEXT["header-logininc_error1"] . '</strong>'
. $TEXT["header-logininc_error2"] . '<a href="register.php">'
. $TEXT["header-logininc_error_link"] . '</a>'
. $TEXT["header-logininc_error3"] . '</p>';
}
}
} else { // hnsrememberme cookie doesn't exist
if (isset($_POST['signin'])) {
// filter incoming values
$username = (isset($_POST['username'])) ? trim($_POST['username']) : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';
$redirect = (isset($_REQUEST['redirect'])) ? $_REQUEST['redirect'] : 'user_personal.php?login=1';
$time = time();
$life = (isset($_POST['rememberlife'])) ? $_POST['rememberlife'] : -1;

$query = 'SELECT * FROM
login u
JOIN
info i
ON
u.user_id = i.user_id
WHERE ' .
'username = "' . mysql_real_escape_string($username, $db) .
'" AND ' .
'password = PASSWORD("' . mysql_real_escape_string($password, $db) . '")';
$result = mysql_query($query, $db) or die(mysql_error($db));

if (mysql_num_rows($result) > 0) {
$row = mysql_fetch_assoc($result);
extract($row);
mysql_free_result($result);

if (isset($life)) {
setcookie("hnsrememberme[username]", $row['username'], $time + $life);
setcookie("hnsrememberme[password]", $row['password'], $time + $life);
}

if (isset($_POST['remember'])) {
setcookie("hnsrememberme[username]", $row['username'], $time + 604800);
setcookie("hnsrememberme[password]", $row['password'], $time + 604800);
}

$_SESSION['logged'] = 1;
$_SESSION['username'] = $username;
$_SESSION['access_level'] = $row['access_level'];
$_SESSION['last_login'] = $row['last_login'];
$_SESSION['last_login_ip'] = $row['last_login_ip'];
$_SESSION['fullname'] = $row['fullname'];
$_SESSION['firstname'] = $row['firstname'];
$_SESSION['middlename'] = $row['middlename'];
$_SESSION['lastname'] = $row['lastname'];
$_SESSION['email'] = $row['email'];
$_SESSION['status'] = $row['status'];
$_SESSION['mood'] = $row['mood'];
$_SESSION['default_image'] = $row['default_image'];
$_SESSION['pref_song_astart'] = $row['pref_song_astart'];
$_SESSION['pref_psong_astart'] = $row['pref_psong_astart'];
$_SESSION['pref_upstyle'] = $row['pref_upstyle'];
$_SESSION['pref_pupstyle'] = $row['pref_pupstyle'];
$_SESSION['pref_upview'] = $row['pref_upview'];
$_SESSION['setting_vmode'] = $row['setting_vmode'];
$_SESSION['setting_theme'] = $row['setting_theme'];
$_SESSION['setting_language'] = $row['setting_language'];
$_SESSION['user_id'] = $row['user_id'];
$user_id = null;
$username = null;

$last_login = date('Y-m-d');
$logins = ($logins + 1);

$query = 'UPDATE info SET
logins = ' . $logins . '
WHERE
user_id = ' . $_SESSION['user_id'];
mysql_query($query, $db) or die(mysql_error());

// check mode
if ($_SESSION['setting_vmode'] == 1) {
$redirect = "m_index.php";
}

// check theme
if (!isset($_COOKIE['hnsmaintheme'])) {
// cookie may expire 365 days from now (given in seconds)
$expire = time() + (60 * 60 * 24 * 30 * 12);

setcookie('hnsmaintheme', $_SESSION['setting_theme'], $expire);
}

if (isset($_COOKIE['hnsmaintheme']) && ($_COOKIE['hnsmaintheme'] != $_SESSION['setting_theme'])) {
// cookie may expire 365 days from now (given in seconds)
$expire = time() + (60 * 60 * 24 * 30 * 12);

setcookie('hnsmaintheme', $_SESSION['setting_theme'], $expire);
}

// check language
if (!isset($_COOKIE['hnslanguage'])) {
// cookie may expire 30 days from now (given in seconds)
$expire = time() + (60 * 60 * 24 * 30);

setcookie('hnslanguage', $_SESSION['setting_language'], $expire);
}

if (isset($_COOKIE['hnslanguage']) && ($_COOKIE['hnslanguage'] != $_SESSION['setting_language'])) {
// cookie may expire 30 days from now (given in seconds)
$expire = time() + (60 * 60 * 24 * 30);

setcookie('hnslanguage', $_SESSION['setting_language'], $expire);
}

require ("lang/" . $_SESSION['setting_language'] . ".php");
include ("bimage.inc.php");
header ('refresh: 2; url=' . $redirect);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//<?php echo $TEXT['global-dtdlang']; ?>" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $TEXT['global-lang']; ?>" lang="<?php echo $TEXT['global-lang']; ?>" dir="<?php echo $TEXT['global-text_dir']; ?>">

<head>
<title><?php echo $TEXT['global-headertitle'] . " | " . $TEXT['homepage-headertitle']; ?></title>
<meta http-equiv="content-type" content="text/html; charset=<?php echo $TEXT['global-charset']; ?>" />
<meta name="author" content="Homenet Spaces Andrew Gerst" />
<meta name="copyright" content="© Homenet Spaces" />
<meta name="keywords" content="Homenet, Spaces, The, Place, To, Be, Creative, Andrew, Gerst, Free, Profiles, Information, Facts" />
<meta name="description" content="Welcome to Homenet Spaces | This is the place to be creative! Feel free to add yourself to our wonderful community by registering! " />
<meta name="revisit-after" content="7 days" />
<meta name="googlebot" content="index, follow, all" />
<meta name="robots" content="index, follow, all" />
<link rel="stylesheet" type="text/css" href="css/global.css" media="all" />
<script type="text/javascript" src="cs.js"></script>
<script type="text/javascript" src="nav.js"></script>
<script type="text/javascript" src="suggest.js"></script>
<style type="text/css">
body { 
	background: url(<?php echo $bimage; ?>) repeat; 
	background-position : 50% 140px; 
	}
</style>
</head>

<body>
<?php
include ("hd.inc.php");

// needs validip.inc.php from header to get ip
$query = 'UPDATE login SET
last_login = "' . $last_login . '",
last_login_ip = "' . $ip . '"
WHERE
user_id = ' . $_SESSION['user_id'];
mysql_query($query, $db) or die(mysql_error());
?>
<!-- Begin page content -->
<div class="pagecontent">
<?php
echo '<h2>Logged In</h2>';
echo '<p>' . $TEXT["header-logininc_redirect1"] . '</p>';
echo '<p>' . $TEXT["header-logininc_redirect2"] . '<a href="' . $redirect . '">' . $TEXT["header-logininc_redirect_link"] . '</a>.</p>';
?>
</div>
<!-- End page content -->
<?php
include ("ft.inc.php");
include ("tracking_scripts.inc.php");
?>
</body>

</html>
<?php
mysql_close($db);
die();
} else {
// set these explicitly just to make sure
$_SESSION['logged'] = null;
$_SESSION['username'] = null;
$_SESSION['access_level'] = null;
$_SESSION['last_login'] = null;
$_SESSION['last_login_ip'] = null;
$_SESSION['fullname'] = null;
$_SESSION['firstname'] = null;
$_SESSION['middlename'] = null;
$_SESSION['lastname'] = null;
$_SESSION['email'] = null;
$_SESSION['status'] = null;
$_SESSION['mood'] = null;
$_SESSION['default_image'] = null;
$_SESSION['pref_song_astart'] = null;
$_SESSION['pref_psong_astart'] = null;
$_SESSION['pref_upstyle'] = null;
$_SESSION['pref_pupstyle'] = null;
$_SESSION['pref_upview'] = null;
$_SESSION['setting_vmode'] = null;
$_SESSION['setting_theme'] = null;
$_SESSION['setting_language'] = null;
$_SESSION['user_id'] = null;
$user_id = null;
$username = null;

$header_loginerror = '<p><strong style="color : #ff3333; weight : bold; ">'
. $TEXT["header-logininc_error1"] . '</strong>'
. $TEXT["header-logininc_error2"] . '<a href="register.php">'
. $TEXT["header-logininc_error_link"] . '</a>'
. $TEXT["header-logininc_error3"] . '</p>';
}
}
}
}

if ($_SESSION['logged'] != null) {
} else {
}
?>