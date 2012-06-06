<?php
require ("lang.inc.php");
include ("auth.inc.php");
include ("db.member.inc.php");

if (isset($_GET['make_default'])) {
$default_image = (isset($_GET['make_default'])) ? trim($_GET['make_default']) : '';

if ($default_image != null) {
$query = 'UPDATE info SET default_image = "' . mysql_real_escape_string($default_image, $db) . '" WHERE user_id = ' . $_SESSION['user_id'] . ' LIMIT 1';
mysql_query($query, $db) or die(mysql_error());

$_SESSION['default_image'] = $default_image;

$query = 'SELECT rank FROM info WHERE user_id = ' . $_SESSION['user_id'];
$result = mysql_query($query, $db) or die(mysql_error());
$row = mysql_fetch_array($result);
extract($row);
mysql_free_result($result);

$rank = ($rank + 100);

$query = 'UPDATE info SET rank = ' . $rank . ' WHERE user_id = ' . $_SESSION['user_id'];
mysql_query($query, $db) or die(mysql_error());

header('refresh: 3; url=user_pictures.php?id=' . $_SESSION['user_id']);
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
<p><strong style="color: #f33; font-weight: bold;">Your Default Image Has Been Updated!</strong></p>
<p>Now It Is <?php echo $default_image; ?></p>
<form name="counter" style="margin: 0;"><p>If your browser doesn't redirect properly after
<input type="text" size="1" name="cd" style="border: 1px solid #fff; width: 12px;">
seconds, <a href="user_pictures.php?id='<?php echo $_SESSION['user_id']; ?>">click here</a>.</strong></p></form>
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
<?php include ("ft.inc.php"); ?>
</body>

</html>
<?php
die();
}
}

if (isset($_POST['update']) && $_POST['update'] == 'Update') {
$username = (isset($_POST['username'])) ? trim($_POST['username']) : '';
$default_image = (isset($_POST['default_image'])) ? trim($_POST['default_image']) : '';
$default = (isset($_POST['default'])) ? trim($_POST['default']) : '';

$query = 'SELECT username  FROM login WHERE user_id = ' . (int)$_SESSION['user_id'] . ' AND username = "' . mysql_real_escape_string($_SESSION['username'], $db) . '"';
$result = mysql_query($query, $db) or die(mysql_error());

if (mysql_num_rows($result) == 0) {
include ("break_out_form.inc.php");
mysql_free_result($result);
die();
}

mysql_free_result($result);
$header_updateerrors = array();

if (isset($_POST['default'])) {
$default_image = "";

if (count($header_updateerrors) > 0) {
} else {
$query = 'UPDATE info SET default_image = "' . mysql_real_escape_string($default_image, $db) . '" WHERE user_id = ' . $_SESSION['user_id'] . ' LIMIT 1';
mysql_query($query, $db) or die(mysql_error());

$_SESSION['default_image'] = $default_image;

$header_globalmessage = "Your Default Image Has Been Set To Default!";
$footer_globalmessage = "Your Default Image Has Been Set To Default!";
}
} else {
if (empty($default_image)) {
$header_updateerrors[] = 'Default Image cannot be blank.';
}

if (count($header_updateerrors) > 0) {
} else {
if (!empty($default_image)) {
$query = 'UPDATE info SET default_image = "' . mysql_real_escape_string($default_image, $db) . '" WHERE user_id = ' . $_SESSION['user_id'] . ' LIMIT 1';
mysql_query($query, $db) or die(mysql_error());

$_SESSION['default_image'] = $default_image;

$query = 'SELECT rank FROM info WHERE user_id = ' . $_SESSION['user_id'];
$result = mysql_query($query, $db) or die(mysql_error());
$row = mysql_fetch_array($result);
extract($row);
mysql_free_result($result);

$rank = ($rank + 100);

$query = 'UPDATE info SET rank = ' . $rank . ' WHERE user_id = ' . $_SESSION['user_id'];
mysql_query($query, $db) or die(mysql_error());
}
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
<p><strong>Your default image has been updated.</strong></p>
<p><a href="user_personal.php">Click here</a> to return to your account.</p>
<p><a href="update_images.php">Click here</a> to update your default image.</p>
<p><a href="upload.php?type=image">Click here</a> to upload more images.</p>
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
$query = 'SELECT u.user_id, default_image FROM login u JOIN info i ON u.user_id = i.user_id WHERE username = "' . mysql_real_escape_string($_SESSION['username'], $db) . '" LIMIT 1';
$result = mysql_query($query, $db) or die(mysql_error());
$row = mysql_fetch_assoc($result);
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

div.pagecontent table td.image {
padding: 6px;
text-align: right;
}

div.pagecontent table td.input {
padding: 6px;
text-align: left;
}

div.pagecontent table td.input input[type="text"] {
font-size: 14pt;
height: 25px;
letter-spacing: 2px;
line-height: 25px;
}

div.pagecontent table td.input input[type="submit"] {
font-size: 13pt;
height: 36px;
letter-spacing: 2px;
line-height: 29px;
}

div.pagecontent table td.input input[type="reset"] {
font-size: 13pt;
height: 36px;
letter-spacing: 2px;
line-height: 29px;
}

div.pagecontent table td.input input[type="button"] {
font-size: 13pt;
height: 36px;
letter-spacing: 2px;
line-height: 29px;
}

div.pagecontent table td.input span.default {
position: relative;
top: -3px;
}
</style>
</head>

<body>
<?php include ("hd.inc.php"); ?>
<!-- Begin page content -->
<div class="pagecontent">
<div id="pageheader" class="pageheader2"><div class="heading">
Update Images
</div></div>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<fieldset style="margin: 0 auto; width: 75%;">
<legend>Default Image&nbsp;</legend>
<table style="margin-bottom: 10px; margin-top: 10px;">
<tr>
<td class="image">
<?php
if ($default_image != null) echo '<img src="uploads/' . $_SESSION['username'] . '/images/thumb/' . $default_image . '" style="height : 150px; width : 150px; " />';
else echo '<img src="i/mem/default.jpg" id="defaultuserimage" />';
?>
</td>
<td class="input"><input type="text" name="default_image" id="default_image" size="41" maxlength="255" value="<?php echo $default_image; ?>" />
<br /><br />
<input type="submit" name="update" value="Update" />
<input type="button" id="cancel" value="Cancel" onclick="history.go(-1);" />
<input type="reset" name="reset" value="Reset" />
<input type="checkbox" id="default" name="default" title="This Clears Your Default Image" /> <span class="default"><label for="default"><small>Set To Default</small></label></span>
</td>
</tr>
</table>
</fieldset>
</form>
<br />
<span>
<a href="user_pictures.php?id=<?php echo $_SESSION['user_id']; ?>">Browse Photo Gallery</a>  |  <a href="update_account.php">Update Account</a>  |  <a href="view_files.php?type=image">View Images</a>  |  <a href="upload.php?type=image">Upload Images</a>
</span>
</div>
<!-- End page content -->
<?php include ("ft.inc.php"); ?>
</body>

</html>