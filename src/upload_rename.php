<?php
session_start();

require ("lang.inc.php");
include ("db.member.inc.php");
include ("login.inc.php");

if (!isset($_POST['upload'])) {
header('refresh: 2; url=upload.php');
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
echo '<p><strong style="color: #f33; weight: bold;">You need to select a file to upload.</strong></p>';
echo '<p>You are now being redirected to the upload page. If your browser ' .
'doesn\'t redirect you automatically, <a href="upload.php">click here</a>.</p>';
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
die();
} else {
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
<?phpinclude ("hd.inc.php"); ?>
<!-- Begin page content -->
<div class="pagecontent">
<?php
$uploaddir = $_POST['uploaddir'];
$thumbuploaddir = $_POST['thumbuploaddir'];
$file_name = $_FILES['ufile']['name'];
$random_digit = rand(0000, 9999);

if (isset($_POST['make_random'])) $new_file_name = $random_digit . "_" . $file_name;
else $new_file_name = $file_name;

$path = $uploaddir . $new_file_name;

if (isset($_POST['thumbuploaddir'])) {
if (!eregi('image/', $_FILES['ufile']['type'])) {
echo 'That Was Not A Valid Image';
echo '<br /><br />';
echo "<a href='upload.php?type=image'>Upload More Images</a>";
echo '<br /><br />';
echo 'Please Upload A Valid File!';
} else {
list($width, $height, $type, $attr) = getimagesize($_FILES['ufile']['tmp_name']);

$error = 'The file you uploaded is not a supported filetype. They are GIF, JPEG, & PNG.';
$error .= '<br /><br />';
$error .= '<a href="upload.php?type=image">Upload More Images</a>';
$error .= '</div>';
$error .= '<!-- End page content -->';
$error .= '</body>';

switch ($type) {
case IMAGETYPE_GIF: $image = imagecreatefromgif($_FILES['ufile']['tmp_name']) or die($error); break;
case IMAGETYPE_JPEG: $image = imagecreatefromjpeg($_FILES['ufile']['tmp_name']) or die($error); break;
case IMAGETYPE_PNG: $image = imagecreatefrompng($_FILES['ufile']['tmp_name']) or die($error); break;
default: die($error);
}

if ($ufile != none) {
if ($_FILES['ufile']['error'] != UPLOAD_ERR_OK) {
switch ($_FILES['ufile']['error']) {
case UPLOAD_ERR_INI_SIZE: die('The uploaded file exceeds the upload_max_filesize directive in php.ini.<br /><br /><a href="upload.php?type=image">Upload More Images</a></div><!-- End page content --></body>'); break;
case UPLOAD_ERR_FORM_SIZE: die('The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.<br /><br /><a href="upload.php?type=image">Upload More Images</a></div><!-- End page content --></body>'); break;
case UPLOAD_ERR_PARTIAL: die('The uploaded file was only partially uploaded.<br /><br /><a href="upload.php?type=image">Upload More Images</a></div><!-- End page content --></body>'); break;
case UPLOAD_ERR_NO_FILE: die('No file was uploaded.<br /><br /><a href="upload.php?type=image">Upload More Images</a></div><!-- End page content --></body>'); break;
case UPLOAD_ERR_NO_TMP_DIR: die('The server is missing a temporary folder.<br /><br /><a href="upload.php?type=image">Upload More Images</a></div><!-- End page content --></body>'); break;
case UPLOAD_ERR_CANT_WRITE: die('The server failed to write the uploaded file to disk.<br /><br /><a href="upload.php?type=image">Upload More Images</a></div><!-- End page content --></body>'); break;
case UPLOAD_ERR_EXTENTION: die('File upload stopped by extension.<br /><br /><a href="upload.php?type=image">Upload More Images</a></div><!-- End page content --></body>'); break;
}
}

if (file_exists($path)) $fileoverridden = true;

if (copy($_FILES['ufile']['tmp_name'], $path)) {
$filesize = $_FILES['ufile']['size'];

function display_filesize($filesize) {
if (is_numeric($filesize)) {
$decr = 1024;
$step = 0;
$prefix = array('Bytes', 'KB', 'MB', 'GB', 'TB', 'PB');

while (($filesize / $decr) > 0.9) {
$filesize = ($filesize / $decr);
$step++;
}

return round($filesize, 2) . ' ' . $prefix[$step];
} else {
}
}

echo "<h2>Upload was Successful</h2>";

if ($fileoverridden == true) echo "<h4 style='color: #f00; letter-spacing: 1px;'>A File Has Been Overridden :/</h4>";

echo "File Name : " . $new_file_name . "<br />"; 
echo "File Size : " . display_filesize($filesize) . "<br />";
echo "File Type : " . $_FILES['ufile']['type'] . "<br />"; 
echo "<br />";
echo "<a href='upload.php?type=image'>Upload More Images</a>";

if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1) {
$query = 'SELECT rank FROM info WHERE user_id = ' . $_SESSION['user_id'];
$result = mysql_query($query, $db) or die(mysql_error());
$row = mysql_fetch_array($result);
extract($row);
mysql_free_result($result);

$rank = ($rank + 100);

$query = 'UPDATE info SET rank = ' . $rank . ' WHERE user_id = ' . $_SESSION['user_id'];
mysql_query($query, $db) or die(mysql_error());

$thumb_width = 200;
$ratio = ($width / $thumb_width);
$thumb_height = round($height / $ratio);
$thumb = imagecreatetruecolor($thumb_width, $thumb_height);
$newthumb = $thumbuploaddir . $new_file_name;

imagecopyresampled($thumb, $image, 0, 0, 0, 0, $thumb_width, $thumb_height, $width, $height);
imagejpeg($thumb, $newthumb, 90);
imagedestroy($thumb);

if (isset($_POST['make_default'])) {
$default_image = $new_file_name;

$query = 'UPDATE info SET default_image = "' . mysql_real_escape_string($default_image, $db) . '" WHERE user_id = ' . $_SESSION['user_id'] . ' LIMIT 1';
mysql_query($query, $db) or die(mysql_error());

$_SESSION['default_image'] = $default_image;
}
}
} else {
echo "<a href='upload.php?type=image'>Please Select An Image To Upload</a>";
}
}
}
} else {
if ($ufile != none) {
if ($_FILES['ufile']['error'] != UPLOAD_ERR_OK) {
switch ($_FILES['ufile']['error']) {
case UPLOAD_ERR_INI_SIZE: die('The uploaded file exceeds the upload_max_filesize directive in php.ini.<br /><br /><a href="upload.php?type=image">Upload More Images</a></div><!-- End page content --></body>'); break;
case UPLOAD_ERR_FORM_SIZE: die('The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.<br /><br /><a href="upload.php?type=image">Upload More Images</a></div><!-- End page content --></body>'); break;
case UPLOAD_ERR_PARTIAL: die('The uploaded file was only partially uploaded.<br /><br /><a href="upload.php?type=image">Upload More Images</a></div><!-- End page content --></body>'); break;
case UPLOAD_ERR_NO_FILE: die('No file was uploaded.<br /><br /><a href="upload.php?type=image">Upload More Images</a></div><!-- End page content --></body>'); break;
case UPLOAD_ERR_NO_TMP_DIR: die('The server is missing a temporary folder.<br /><br /><a href="upload.php?type=image">Upload More Images</a></div><!-- End page content --></body>'); break;
case UPLOAD_ERR_CANT_WRITE: die('The server failed to write the uploaded file to disk.<br /><br /><a href="upload.php?type=image">Upload More Images</a></div><!-- End page content --></body>'); break;
case UPLOAD_ERR_EXTENTION: die('File upload stopped by extension.<br /><br /><a href="upload.php?type=image">Upload More Images</a></div><!-- End page content --></body>'); break;
}
}

if (file_exists($path)) $fileoverridden = true;

if (copy($_FILES['ufile']['tmp_name'], $path)) {
$filesize = $_FILES['ufile']['size'];

function display_filesize($filesize) {
if (is_numeric($filesize)) {
$decr = 1024;
$step = 0;
$prefix = array('Bytes', 'KB', 'MB', 'GB', 'TB', 'PB');

while (($filesize / $decr) > 0.9) {
$filesize = ($filesize / $decr);
$step++;
}

return round($filesize, 2) . ' ' . $prefix[$step];
} else {
}
}

echo "<h2>Upload was Successful</h2>";

if ($fileoverridden == true) echo "<h4 style='color: #f00; letter-spacing: 1px;'>A File Has Been Overridden :/</h4>";

echo "File Name : " . $new_file_name . "<br />";
echo "File Size : " . display_filesize($filesize) . "<br />";
echo "File Type : " . $_FILES['ufile']['type'] . "<br />";
echo "<br />";
echo "<a href='upload.php?type=file'>Upload More Files</a>";

if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1) {
$query = 'SELECT rank FROM info WHERE user_id = ' . $_SESSION['user_id'];
$result = mysql_query($query, $db) or die(mysql_error());
$row = mysql_fetch_array($result);
extract($row);
mysql_free_result($result);

$rank = ($rank + 100);

$query = 'UPDATE info SET rank = ' . $rank . ' WHERE user_id = ' . $_SESSION['user_id'];
mysql_query($query, $db) or die(mysql_error());
}
} else {
echo "<a href='upload.php?type=file'>Please Select A File To Upload</a>";
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
<?php } ?>