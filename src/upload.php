<?php
if (!isset($_GET['type'])) header('location:' . $_SERVER['PHP_SELF'] . '?type=file');
else {
session_start();
require ("lang.inc.php");
include ("db.member.inc.php");
include ("login.inc.php");
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
switch ($_GET['type']) {
case 'file':
echo '<div id="pageheader" class="pageheader2"><div class="heading">';
echo 'Upload your Files!';
echo '</div></div>';
echo '<div><a href="' . $_SERVER['PHP_SELF'] . '?type=file">Upload Files</a> | <a href="' . $_SERVER['PHP_SELF'] . '?type=image">Upload Images</a></div><br />';

if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1) {
$dirpath = "/uploads/";
$username = $_SESSION['username'] . "/files/";
$uploaddir = $dirpath . $username;

if (!is_dir($uploaddir)) mkdir($uploaddir, 0777, true) or die("Directory could not be created.");
} else {
$uploaddir = "/uploads/guest/files/";
}

echo '<form action="upload_rename.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="MAX_FILE_SIZE" value="10814714" />
<input type="file" name="ufile" size="100" />
<input type="hidden" name="uploaddir" value="' . $uploaddir . '" />
<br />
<br />
<label for="make_random">Random!</label>
<input type="checkbox" name="make_random" title="Add A Random Number To The Filename!" />
<input type="submit" name="upload" value="Upload!" />
</form>';
break;

case 'image':
echo '<div id="pageheader" class="pageheader2"><div class="heading">';
echo 'Upload your Images!';
echo '</div></div>';
echo '<div><a href="' . $_SERVER['PHP_SELF'] . '?type=file">Upload Files</a> | <a href="' . $_SERVER['PHP_SELF'] . '?type=image">Upload Images</a></div><br />';

if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1) {
$dirpath = "/uploads/";
$username = $_SESSION['username'] . "/images/";
$uploaddir = $dirpath . $username;
$thumbuploaddir = $dirpath . $username . "thumb/";

if (!is_dir($uploaddir)) mkdir($uploaddir, 0777, true) or die("Directory could not be created.");
if (!is_dir($thumbuploaddir)) mkdir($thumbuploaddir, 0777, true) or die("Directory could not be created.");

echo '<form action="upload_rename.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="MAX_FILE_SIZE" value="10814714" />
<input type="file" name="ufile" size="100" />
<input type="hidden" name="uploaddir" value="' . $uploaddir . '" />
<input type="hidden" name="thumbuploaddir" value="' . $thumbuploaddir . '" />
<br />
<br />
<label for="make_random">Random!</label>
<input type="checkbox" name="make_random" title="Add A Random Number To The Filename!" />
<input type="submit" name="upload" value="Upload!" />';

if (isset($_GET['default'])) echo ' <input type="checkbox" name="make_default" title="Change You Default Image To This Image!" checked="checked" />';
else echo ' <input type="checkbox" name="make_default" title="Change You Default Image To This Image!" />';

echo ' <label for="make_default">Default!</label>';
echo '</form>';
echo '<br />';
echo '<span style="color: #f33; weight: bold;">These Images Will Show Up In Your Photo Gallery</span>';
echo '<br />';
} else {
$uploaddir = "/uploads/guest/images/";
$thumbuploaddir = null;

echo '<form action="upload_rename.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="MAX_FILE_SIZE" value="10814714" />
<input type="file" name="ufile" size="100" />
<input type="hidden" name="uploaddir" value="' . $uploaddir . '" />
<input type="hidden" name="thumbuploaddir" value="' . $thumbuploaddir . '" />
<br />
<br />
<label for="make_random">Random!</label>
<input type="checkbox" name="make_random" title="Add A Random Number To The Filename!" />
<input type="submit" name="upload" value="Upload!" />
</form>';
}
break;
}
}

if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1) {
switch ($_GET['type']) {
case 'file': echo '<br /><a href="view_files.php?type=file">Click here</a> to see your files.<br /><br />'; break;
case 'image': echo '<br /><a href="view_files.php?type=image">Click here</a> to see your images.<br /><br />'; break;
default: echo '<br /><a href="view_files.php">Click here</a> to see your files.<br /><br />'; break;
}
?>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
<input type="text" name="newfoldername" style="width: 200px;" />
<input type="submit" name="createfolder" value="Create This Folder" />
</form>
<?php
if (isset($_POST['createfolder'])) {
$newfoldertocreate = $_POST['newfoldername'];

if ($newfoldertocreate != null) {
$newdir = $uploaddir . $newfoldertocreate;

if (!is_dir($newdir)) {
mkdir($newdir, 0777, true) or die("Directory could not be created.");

$query = 'SELECT rank FROM info WHERE user_id = ' . $_SESSION['user_id'];
$result = mysql_query($query, $db) or die(mysql_error());
$row = mysql_fetch_array($result);
extract($row);
mysql_free_result($result);

$rank = ($rank + 100);

$query = 'UPDATE info SET rank = ' . $rank . ' WHERE user_id = ' . $_SESSION['user_id'];
$result = mysql_query($query, $db) or die(mysql_error());

$footer_message = '<div><strong style="color: #f33; weight: bold;">The folder ' . $newfoldertocreate . ' was created successfully!</strong></div>';
} else {
$footer_error = '<div><strong style="color: #f33; weight: bold;">The folder ' . $newfoldertocreate . ' already exists!</strong></div>';
}
} else {
$footer_error = '<div><strong style="color: #f33; weight: bold;">Please Enter A Name For The New Directory</strong></div>';
}
}
?>
<?php
} else {
switch ($_GET['type']) {
case 'file': echo '<br /><a href="view_files.php?type=file">Click here</a> to see shared files.<br /><br />'; break;
case 'image': echo '<br /><a href="view_files.php?type=image">Click here</a> to see shared images.<br /><br />'; break;
default: echo '<br /><a href="view_files.php">Click here</a> to see shared files.<br /><br />'; break;
}
?>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
<input type="text" name="newfoldername" style="width: 200px;" />
<input type="submit" name="createfolder" value="Create This Folder" />
</form>
<?php
if (isset($_POST['createfolder'])) {
$newfoldertocreate = $_POST['newfoldername'];

if ($newfoldertocreate != null) {
$newdir = $uploaddir . $newfoldertocreate;

if (!is_dir($newdir)) {
mkdir($newdir, 0777, true) or die("Directory could not be created.");

$footer_message = '<div><strong style="color: #f33; weight: bold;">The folder ' . $newfoldertocreate . ' was created successfully!</strong></div>';
} else {
$footer_error = '<div><strong style="color: #f33; weight: bold;">The folder ' . $newfoldertocreate . ' already exists!</strong></div>';
}
} else {
$footer_error = '<div><strong style="color: #f33; weight: bold;">Please Enter A Name For The New Directory</strong></div>';
}
}
}
?>
</div>
<!-- End page content -->
<?php
include ("ft.inc.php");
include ("tracking_scripts.inc.php");
?>
</body>

</html>