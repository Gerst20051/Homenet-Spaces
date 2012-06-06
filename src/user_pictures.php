<?php
$user_id = (isset($_GET['id'])) ? $_GET['id'] : 0;

if ($user_id == 0) {
header('location: members.php');
die();
}

session_start();
require ("lang.inc.php");
include ("db.member.inc.php");
include ("db.om.inc.php");
include ("login.inc.php");

$query = 'SELECT user_id FROM login WHERE user_id = ' . $user_id;
$result = mysql_query($query, $db) or die(mysql_error());

if (mysql_num_rows($result) == 0) header('location: members.php');

$user_id = $_GET['id'];
$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id WHERE u.user_id = ' . $user_id;
$result = mysql_query($query, $db) or die(mysql_error($db));
$row = mysql_fetch_array($result);
extract($row);
mysql_free_result($result);

if ($privacy == 2) {
if (!isset($_SESSION['logged'])) {
$header_message = "You Need To Be Logged In To View " . $username . "'s Pictures";
$footer_message = "You Need To Be Logged In To View " . $username . "'s Pictures";
header('refresh: 3; url=login.php?redirect=' . $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'] . "&hurlmessage=" . urlencode($header_message) . "&furlmessage=" . urlencode($footer_message));
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
<?php
echo '<form name="counter" style="margin: 0;"><p><strong style="color: #f33; font-weight: bold;">You will be redirected to the login page in
<input type="text" size="1" name="cd" style="background-color: transparent; border: 0; color: #f33; font-weight: bold; width: 12px;">
seconds.</strong></p></form>';
echo '<p>If your browser doesn\'t redirect you properly automatically, ' . '<a href="login.php?redirect=' . $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'] . '">click here</a>.</p>';
?>
</div>
<script type="text/javascript"> 
<!--
var milisec = 0;
var seconds = 4; // add 1 to absolute value
document.counter.cd.value = seconds;

function display() {
if (milisec <= 0) {
milisec = 10;
seconds -= 1;
}

if (seconds <= -1) {
milisec = 0;
seconds += 1;
} else {
milisec -= 1;
document.counter.cd.value = seconds;
setTimeout("display()", 110);
}
}

display();
//-->
</script>
<!-- End page content -->
<?php
include ("ft.inc.php");
include ("tracking_scripts.inc.php");
?>
</body>

</html>
<?php
die();
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//<?php echo $TEXT['global-dtdlang']; ?>" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $TEXT['global-lang']; ?>" lang="<?php echo $TEXT['global-lang']; ?>" dir="<?php echo $TEXT['global-text_dir']; ?>">

<head>
<title><?php echo $username . " ( " . $firstname . " " . $lastname . " ) | " . $TEXT['global-headertitle'] . " | Photo Gallery"; ?></title>
<meta http-equiv="content-type" content="text/html; charset=<?php echo $TEXT['global-charset']; ?>" />
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="javascript.php"></script>
<?php
if (isset($_SESSION['logged']) && ($_SESSION['pref_upstyle'] == 1)) {
} else {
if ($user_style != null) {
?>
<!-- Begin user customization style -->
<style type="text/css">
<?php echo $user_style . "\n"; ?>
</style>
<!-- End user customization style -->
<?php
}
}
?>
</head>

<body id="userpictures_body">
<?php include ("hd.inc.php"); ?>
<!-- Begin page content -->
<?php
$hits = ($hits + 1);

$query = 'UPDATE info SET hits = ' . $hits . ' WHERE user_id = ' . $user_id;
mysql_query($query, $db) or die(mysql_error());
?>
<div id="userpictures_pagecontent" class="pagecontent">
<span style="float: right; position: relative; right: 17px; top: 0;">
<?php
if ($row['default_image'] != null) echo '<img src="uploads/' . $row['username'] . '/images/thumb/' . $row['default_image'] . '" id="defaultuserimage" /><br />' . "\n";
else echo '<img src="i/mem/default.jpg" id="defaultuserimage" /><br />' . "\n";
?>
<div style="padding: 5px; text-align: left;">
<div>Status: <?php echo $status; ?></div>
<div>Mood: <?php echo $mood; ?></div>
<br />
</div>
</span>
<?php
$user = $row['firstname'] . " " . $row['lastname'];
$usernamedir = $row['username'] . "/";
$username = $row['username'];

if ($_SESSION['username'] == $username) {
echo '<div id="pageheader" class="pageheader2"><div class="heading">';
echo 'View your Images!';
echo '</div></div>';
} else {
echo '<div id="pageheader" class="pageheader2"><div class="heading">';
echo $user . '\'s Pictures!';
echo '</div></div>';
}
?>
<br /><br />
<br />
<div style="padding-left: 40px; text-align: left;"><a href="view_files.php?id=<?php echo $user_id; ?>">View <?php echo $firstname; ?>'s Files!</a> | <a href="view_files.php?id=<?php echo $user_id; ?>">Shared Files!</a> | <a href="upload_send.php?id=<?php echo $user_id; ?>">Send <?php echo $firstname; ?> Files!</a></div>
<?php
$dirpath = "uploads/";
$imagedir = $dirpath . $usernamedir . 'images/thumb/';
$mainimagedir = $dirpath . $usernamedir . 'images/';
$images = opendir($imagedir);
$count = 0;
// only 4 rows of 4

if ($_SESSION['username'] == $username) {
while ($image = readdir($images)) {
if (is_file($imagedir . $image)) {
if (($image != ".") && ($image != "..") && ($image != "desktop.ini") && ($image != "Thumbs.db") && ($image != "Ehthumbs.db") && ($image != "_derived") && ($image != "_fpclass") && ($image != "_themes") && ($image != "_vti_cnf") && ($image != "_vti_pvt")) {
$count++;

if ($count == 3) $break = "<div style='clear: both; width: 100%;'>&nbsp;</div>\n";
elseif ($count == 6) $break = "<div style='clear: both; width: 100%;'>&nbsp;</div>\n";
elseif ($count == 9) $break = "<div style='clear: both; width: 100%;'>&nbsp;</div>\n";
elseif ($count == 12) $break = "<div style='clear: both; width: 100%;'>&nbsp;</div>\n";
else $break = null;

$what .= "<span style='float: left; margin: 15px; text-align: center; width: 200px;'><a href='$mainimagedir$image'><img src='$imagedir$image' id='defaultuserimage' alt='$image' /></a><br /><span style='height: 30px; line-height: 30px;'><a href='update_images.php?make_default=$image' style='text-decoration: none;'>Make Default</a> | <a href='update_images_edit.php?image=$image' style='text-decoration: none;'>Edit</a></span></span>\n" . $break;
}
}
}
} else {
while ($image = readdir($images)) {
if (is_file($imagedir . $image)) {
if (($image != ".") && ($image != "..") && ($image != "desktop.ini") && ($image != "Thumbs.db") && ($image != "Ehthumbs.db") && ($image != "_derived") && ($image != "_fpclass") && ($image != "_themes") && ($image != "_vti_cnf") && ($image != "_vti_pvt")) {
$count++;

if ($count == 3) $break = "<div style='clear: both; width: 100%;'>&nbsp;</div>\n";
elseif ($count == 6) $break = "<div style='clear: both; width: 100%;'>&nbsp;</div>\n";
elseif ($count == 9) $break = "<div style='clear: both; width: 100%;'>&nbsp;</div>\n";
elseif ($count == 12) $break = "<div style='clear: both; width: 100%;'>&nbsp;</div>\n";
else $break = null;

$what .= "<span style='float: left; margin: 15px; text-align: center; width: 200px;'><a href='$mainimagedir$image'><img src='$imagedir$image' id='defaultuserimage' alt='$image' /></a></span>\n" . $break;
}
}
}
}
?>
<div style="display: block; margin-left: 3.5%; text-align: center; width: 720px;">
<?php
echo $what;
echo "<div style='clear: both; width: 100%;'>&nbsp;</div>\n";
?>
</div>
</div>
<!-- End page content -->
<?php
include ("ft.inc.php");
include ("tracking_scripts.inc.php");
?>
</body>

</html>