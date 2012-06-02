<?php
require ("lang.inc.php");
include ("auth.inc.php");
include ("db.member.inc.php");
include ("bimage.inc.php");

if (isset($_POST['delete']) && $_POST['delete'] == ' Yes ') {
$txtsecuritycode = (isset($_POST['txtsecuritycode'])) ? trim($_POST['txtsecuritycode']) : '';

$header_updateerrors = array();

// check to see if security codes match
if ($_POST['txtsecuritycode'] == $_SESSION['SECURITY_CODE']) {
} else {
$header_updateerrors[] = 'Security Code cannot be incorrect.';
$footer_error = '<p><strong style="color : #ff3333; weight : bold; ">Security Code cannot be incorrect.</strong></p>';
}

if (count($header_updateerrors) > 0) {
} else { // no errors so delete user
$query = 'DELETE i FROM login u JOIN info i ON u.user_id = i.user_id WHERE u.username = "' .
mysql_real_escape_string($_SESSION['username'], $db) . '"';
mysql_query($query, $db) or die(mysql_error($db));

$query = 'DELETE i FROM login u JOIN hns_desktop i ON u.user_id = i.user_id WHERE u.user_id = "' .
mysql_real_escape_string($_SESSION['user_id'], $db) . '"';
mysql_query($query, $db) or die(mysql_error($db));

$query = 'DELETE FROM login WHERE username = "' .
mysql_real_escape_string($_SESSION['username'], $db) . '"';
mysql_query($query, $db) or die(mysql_error($db));

$query = 'DELETE FROM users_online WHERE username = "' .
mysql_real_escape_string($_SESSION['username'], $db) . '"';
mysql_query($query, $db) or die(mysql_error($db));

/*
$query = 'DROP TABLE "' . mysql_real_escape_string($_SESSION['username']) . '"';
mysql_query($query, $member_db) or die(mysql_error($member_db));

$query = 'DROP TABLE "' . mysql_real_escape_string($_SESSION['username']) . '"';
mysql_query($query, $comment_db) or die(mysql_error($comment_db));
*/

if (isset($_SESSION['username'])) {
$userdirname = "uploads/" . $_SESSION['username'];

if (file_exists($userdirname)) {
function delete_directory($dirname) {
if (is_dir($dirname)) {
$dir_handle = opendir($dirname);
}

if (!$dir_handle) {
return false;
}

while ($file = readdir($dir_handle)) {
if ($file != "." && $file != "..") {
if (!is_dir($dirname . "/" . $file)) {
unlink($dirname . "/" . $file);
} else {
delete_directory($dirname . '/' . $file);    
}
}
}

closedir($dir_handle);
rmdir($dirname);

return true;
}

delete_directory($userdirname);
}
}

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

session_unset();
session_destroy();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//<?php echo $TEXT['global-dtdlang']; ?>" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $TEXT['global-lang']; ?>" lang="<?php echo $TEXT['global-lang']; ?>" dir="<?php echo $TEXT['global-text_dir']; ?>">

<head>
<title><?php echo $TEXT['global-headertitle'] . " | " . $TEXT['homepage-headertitle']; ?></title>
<meta http-equiv="content-type" content="text/html; charset=<?php echo $TEXT['global-charset']; ?>" />
<meta name="author" content="Homenet Spaces Andrew Gerst" />
<meta name="copyright" content="� Homenet Spaces" />
<meta name="keywords" content="Homenet, Spaces, The, Place, To, Be, Creative, Andrew, Gerst, Free, Profiles, Information, Facts" />
<meta name="description" content="Welcome to Homenet Spaces we offer you a free profile with many cool and interesting things! This is the place to be creative!" />
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
?>
<!-- Begin page content -->
<div class="pagecontent">
<p><strong style="color : #ff3333; font-weight : bold; ">Your account has been deleted.</strong></p>
<p><a href="index.php">Click here</a> to return to the homepage.</p>
</div>
<!-- End page content -->
<?php
include ("ft.inc.php");
?>
</body>
<?php
mysql_close($db);
die();
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//<?php echo $TEXT['global-dtdlang']; ?>" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $TEXT['global-lang']; ?>" lang="<?php echo $TEXT['global-lang']; ?>" dir="<?php echo $TEXT['global-text_dir']; ?>">

<head>
<title><?php echo $TEXT['global-headertitle'] . " | " . $TEXT['homepage-headertitle']; ?></title>
<meta http-equiv="content-type" content="text/html; charset=<?php echo $TEXT['global-charset']; ?>" />
<meta name="author" content="Homenet Spaces Andrew Gerst" />
<meta name="copyright" content="� Homenet Spaces" />
<meta name="keywords" content="Homenet, Spaces, The, Place, To, Be, Creative, Andrew, Gerst, Free, Profiles, Information, Facts" />
<meta name="description" content="Welcome to Homenet Spaces we offer you a free profile with many cool and interesting things! This is the place to be creative!" />
<meta name="revisit-after" content="7 days" />
<meta name="googlebot" content="index, follow, all" />
<meta name="robots" content="index, follow, all" />
<link rel="stylesheet" type="text/css" href="css/global.css" media="all" />
<script type="text/javascript" src="cs.js"></script>
<script type="text/javascript" src="nav.js"></script>
<script type="text/javascript" src="suggest.js"></script>
<script type="text/javascript">
<!--
function updatecaptchaimg() {
document.captchaimg.src = document.captchaimg.src + '?';
}
-->
</script>
<script type="text/javascript">
<!--
function delete_account() {
var answer = confirm("Are You Sure You Want To Delete Your Account?")
if (!answer) {
window.location = "index.php";
}
}
//-->
</script>
<style type="text/css">
div.pagecontent input[type="submit"] {
	font-size : 13pt; 
	height : 36px; 
	letter-spacing : 2px; 
	line-height : 29px; 
	}

div.pagecontent input[type="button"] {
	font-size : 13pt; 
	height : 36px; 
	letter-spacing : 2px; 
	line-height : 29px; 
	}
</style>
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
?>
<!-- Begin page content -->
<div class="pagecontent">
<p>Are you sure you want to delete your account?</p>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
<div>
<input type="submit" name="delete" value=" Yes " onclick="delete_account(); " />
<input type="button" id="cancel" value="  No  " onclick="history.go(-1); " />
</div>
<br />
<fieldset style="margin : 0 auto; width : 480px; ">
<legend>Security Code&nbsp;</legend>
<table style="margin : 0 auto; margin-bottom : 10px; margin-top : 10px; ">
<tr>
<td><input type="text" name="txtsecuritycode" size="14" maxlength="7" value="" style="font-size : 18pt; height : 30px; letter-spacing : 2px; line-height : 30px; margin-right : 5px; text-align : center; " /></td>
<td><img name="captchaimg" alt="Security Code" src="captcha_securityimage.php" /></td>
<td><a onclick="javascript:updatecaptchaimg();"><img src="i/captcha/arrow_refresh.png" alt="Refresh Code" style="border-width : 0px; margin-left : 5px; margin-top : 7px; " /></a></td>
</tr>
</table>
</fieldset>
</form>
<p><strong style="color : #ff3333; weight : bold; ">There is no way to retrieve your account &amp; files once you confirm!</strong></p>
</div>
<!-- End page content -->
<?php
include ("ft.inc.php");
?>
</body>

</html>