<?php
require ("lang.inc.php");
include ("auth.inc.php");
include ("db.member.inc.php");

if (isset($_POST['update']) && $_POST['update'] == 'Update') {
$username = (isset($_POST['username'])) ? trim($_POST['username']) : '';
$user_style = (isset($_POST['user_style'])) ? trim(stripslashes($_POST['user_style'])) : '';
$default = (isset($_POST['default'])) ? trim($_POST['default']) : '';
$txtsecuritycode = (isset($_POST['txtsecuritycode'])) ? trim($_POST['txtsecuritycode']) : '';

$query = 'SELECT username FROM login WHERE user_id = ' . (int)$_SESSION['user_id'] . ' AND username = "' . mysql_real_escape_string($_SESSION['username'], $db) . '"';
$result = mysql_query($query, $db) or die(mysql_error());

if (mysql_num_rows($result) == 0) {
include ("break_out_form.inc.php");
mysql_free_result($result);
die();
}

mysql_free_result($result);

$header_updateerrors = array();

if (isset($_POST['default'])) {
$user_style = "";

if ($_POST['txtsecuritycode'] != $_SESSION['SECURITY_CODE']) {
$header_updateerrors[] = 'Security Code cannot be incorrect.';
$footer_error = '<div><strong style="color: #f33; weight: bold;">Security Code cannot be incorrect.</strong></div>';
}

if (count($header_updateerrors) > 0) {
} else {
$query = 'UPDATE info SET user_style = "' . mysql_real_escape_string($user_style, $db) . '" WHERE user_id = ' . $user_id;
mysql_query($query, $db) or die(mysql_error());

$header_globalmessage = "Your Profile Style Has Been Set To Default!";
$footer_globalmessage = "Your Profile Style Has Been Set To Default!";
}
} else {
if (empty($user_style)) $header_updateerrors[] = 'Profile Style cannot be blank.';
if ($_POST['txtsecuritycode'] != $_SESSION['SECURITY_CODE']) {
$header_updateerrors[] = 'Security Code cannot be incorrect.';
$footer_error = '<div><strong style="color: #f33; weight: bold;">Security Code cannot be incorrect.</strong></div>';
}

if (count($header_updateerrors) > 0) {
} else {
$query = 'UPDATE info SET user_style = "' . mysql_real_escape_string($user_style, $db) . '" WHERE user_id = ' . $_SESSION['user_id'];
mysql_query($query, $db) or die(mysql_error());

$query = 'SELECT rank FROM info WHERE user_id = ' . $_SESSION['user_id'];
$result = mysql_query($query, $db) or die(mysql_error());
$row = mysql_fetch_array($result);
extract($row);
mysql_free_result($result);

$rank = ($row['rank'] + 100);

$query = 'UPDATE info SET rank = ' . $rank . ' WHERE user_id = ' . $_SESSION['user_id'];
mysql_query($query, $db) or die(mysql_error());
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
<p><strong>Your profile style has been published!</strong></p>
<p><a href="user_profile.php?id=<?php echo $_SESSION['user_id']; ?>">Click here</a> to view your profile.</p>
<p><a href="user_personal.php">Click here</a> to return to your account.</p>
<p><a href="customize_profile.php">Click here</a> to customize your profile style.</p>
</div>
<!-- End page content -->
<?php include ("ft.inc.php"); ?>
</body>

</html>
<?php
die();
}
}
} else {
$query = 'SELECT u.user_id, user_style FROM login u JOIN info i ON u.user_id = i.user_id WHERE username = "' . mysql_real_escape_string($_SESSION['username'], $db) . '"';
$result = mysql_query($query, $db) or die(mysql_error());
$row = mysql_fetch_array($result);
extract($row);
mysql_free_result($result);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//<?php echo $TEXT['global-dtdlang']; ?>" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $TEXT['global-lang']; ?>" lang="<?php echo $TEXT['global-lang']; ?>" dir="<?php echo $TEXT['global-text_dir']; ?>">

<head>
<title><?php echo $TEXT['global-headertitle'] . " | " . $TEXT['homepage-headertitle']; ?></title>
<meta http-equiv="content-type" content="text/html; charset=<?php echo $TEXT['global-charset']; ?>" />
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="javascript.php"></script>
<style type="text/css">
td {
vertical-align: top;
}

span.default {
position: relative;
top: -3px;
}
</style>
</head>

<body>
<?php include ("hd.inc.php"); ?>
<!-- Begin page content -->
<div id="customizeprofile_pagecontent" class="pagecontent">
<div id="pageheader" class="pageheader2"><div class="heading">
Customize Profile Style
</div></div>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
<fieldset style="margin: 0 auto; width: 90%;">
<legend>
<span style="color: #f33; weight: bold;">
enter your css code here&nbsp;
</span>
</legend>
<table style="margin: 0 auto; margin-bottom: 10px; margin-top: 10px;">
<tr>
<td> </td>
<td>
<textarea name="user_style" id="user_style" cols="100" rows="30" maxlength="65536">
<?php echo $user_style . "\n"; ?>
</textarea>
</td>
</tr>
</table>
<br />
<fieldset style="margin: 0 auto; width: 480px;">
<legend>Security Code&nbsp;</legend>
<table style="margin: 0 auto; margin-bottom: 10px; margin-top: 10px;">
<tr>
<td><input type="text" name="txtsecuritycode" size="14" maxlength="7" value="" style="font-size: 18pt; height: 30px; letter-spacing: 2px; line-height: 30px; margin-right: 5px; text-align: center;" /></td>
<td><img name="captchaimg" alt="Security Code" src="captcha_securityimage.php" /></td>
<td><a onclick="javascript:updatecaptchaimg();"><img src="i/captcha/arrow_refresh.png" alt="Refresh Code" style="border-width: 0; margin-left: 5px; margin-top: 7px;" /></a></td>
</tr>
</table>
</fieldset>
<div style="clear: both; width: 100%;"> </div>
<div>
<input type="submit" name="update" value="Update" />
<input type="button" id="cancel" value="Cancel"  onclick="history.go(-1);" />
<input type="reset" name="reset" value="Reset" />
<input type="checkbox" id="default" name="default" title="This Clears Your Custom User Style And You Can't Get It Back." /> <span class="default"><label for="default"><small>Set To Default</small></label></span
</div>
<br /><br />
</fieldset>
</form>
<div style="clear: both; width: 100%;"> </div>
<div class="globalthemes">
<span class="themelinks">
<a href="#" onclick="showhide('global'); return(false);">Global</a>
 &nbsp;|&nbsp; 
<a href="#" onclick="showhide('globalblue'); return(false);">Blue Theme</a>
 &nbsp;|&nbsp; 
<a href="#" onclick="showhide('globalorange'); return(false);">Orange Theme</a>
 &nbsp;|&nbsp; 
<a href="#" onclick="showhide('globalgreen'); return(false);">Green Theme</a>
 &nbsp;|&nbsp; 
<a href="#" onclick="showhide('globalyellow'); return(false);">Yellow Theme</a>
 &nbsp;|&nbsp; 
<a href="#" onclick="showhide('globalred'); return(false);">Red Theme</a>
 &nbsp;|&nbsp; 
<a href="#" onclick="showhide('globalblack'); return(false);">Black Theme</a>
</span>
<br />
<span id="global" style="display: none;">
<br />
<?php
$globaltheme = fopen("css/global.css", "r") or exit("Unable to open file!");
$globalsubtheme = fopen("css/global_sub.css", "r") or exit("Unable to open file!");

echo "<div class='themecode'><textarea name='global' rows='30' cols='110' maxlength='65536'>";
while (!feof($globaltheme)) echo fgets($globaltheme);
echo "\n";
while (!feof($globalsubtheme)) echo fgets($globalsubtheme);
echo "</textarea></div>";

fclose($globaltheme);
fclose($globalsubtheme);
?>
</span>
<span id="globalblue" style="display: none;">
<br />
<?php
$bluetheme = fopen("css/globalblue.css", "r") or exit("Unable to open file!");
$bluesubtheme = fopen("css/globalblue_sub.css", "r") or exit("Unable to open file!");

echo "<div class='themecode'><textarea name='blue' rows='30' cols='110' maxlength='65536'>";
while (!feof($bluetheme)) echo fgets($bluetheme);
echo "\n";
while (!feof($bluesubtheme)) echo fgets($bluesubtheme);
echo "</textarea></div>";

fclose($bluetheme);
fclose($bluesubtheme);
?>
</span>
<span id="globalorange" style="display: none;">
<br />
<?php
$orangetheme = fopen("css/globalorange.css", "r") or exit("Unable to open file!");
$orangesubtheme = fopen("css/globalorange_sub.css", "r") or exit("Unable to open file!");

echo "<div class='themecode'><textarea name='orange' rows='30' cols='110' maxlength='65536'>";
while (!feof($orangetheme)) echo fgets($orangetheme);
echo "\n";
while (!feof($orangesubtheme)) echo fgets($orangesubtheme);
echo "</textarea></div>";

fclose($orangetheme);
fclose($orangesubtheme);
?>
</span>
<span id="globalgreen" style="display: none;">
<br />
<?php
$greentheme = fopen("css/globalgreen.css", "r") or exit("Unable to open file!");
$greensubtheme = fopen("css/globalgreen_sub.css", "r") or exit("Unable to open file!");

echo "<div class='themecode'><textarea name='green' rows='30' cols='110' maxlength='65536'>";
while (!feof($greentheme)) echo fgets($greentheme);
echo "\n";
while (!feof($greensubtheme)) echo fgets($greensubtheme);
echo "</textarea></div>";

fclose($greentheme);
fclose($greensubtheme);
?>
</span>
<span id="globalyellow" style="display: none;">
<br />
<?php
$yellowtheme = fopen("css/globalyellow.css", "r") or exit("Unable to open file!");
$yellowsubtheme = fopen("css/globalyellow_sub.css", "r") or exit("Unable to open file!");

echo "<div class='themecode'><textarea name='yellow' rows='30' cols='110' maxlength='65536'>";
while (!feof($yellowtheme)) echo fgets($yellowtheme);
echo "\n";
while (!feof($yellowsubtheme)) echo fgets($yellowsubtheme);
echo "</textarea></div>";

fclose($yellowtheme);
fclose($yellowsubtheme);
?>
</span>
<span id="globalred" style="display: none;">
<br />
<?php
$redtheme = fopen("css/globalred.css", "r") or exit("Unable to open file!");
$redsubtheme = fopen("css/globalred_sub.css", "r") or exit("Unable to open file!");

echo "<div class='themecode'><textarea name='red' rows='30' cols='110' maxlength='65536'>";
while (!feof($redtheme)) echo fgets($redtheme);
echo "\n";
while (!feof($redsubtheme)) echo fgets($redsubtheme);
echo "</textarea></div>";

fclose($redtheme);
fclose($redsubtheme);
?>
</span>
<span id="globalblack" style="display: none;">
<br />
<?php
$blacktheme = fopen("css/globalblack.css", "r") or exit("Unable to open file!");
$blacksubtheme = fopen("css/globalblack_sub.css", "r") or exit("Unable to open file!");

echo "<div class='themecode'><textarea name='black' rows='30' cols='110' maxlength='65536'>";
while (!feof($blacktheme)) echo fgets($blacktheme);
echo "\n";
while (!feof($blacksubtheme)) echo fgets($blacksubtheme);
echo "</textarea></div>";

fclose($blacktheme);
fclose($blacksubtheme);
?>
</span>
</div>
</div>
<!-- End page content -->
<?php include ("ft.inc.php"); ?>
</body>

</html>