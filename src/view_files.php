<?php
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
<style type="text/css">
div#directorylisting { 
margin : 0 auto; 
width : 96%; 
}

div#directorylisting div.container { 
}

div#directorylisting div.container div span.image { 
display : block; 
float : left; 
width : 40px; 
}

div#directorylisting div.container div span.image img { 
height : 16px; 
width : 16px; 
}

div#directorylisting div.container div span.link { 
display : block; 
float : right; 
}

div#directorylisting div.container div span.link a { 
text-decoration : none; 
}
</style>
</head>

<body>
<?php include ("hd.inc.php"); ?>
<div class="pagecontent">
<?php 
if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1) {
include ("auth.inc.php");

if (isset($_GET['id'])) {
$id = $_GET['id'];
$query = 'SELECT user_id, username FROM login WHERE user_id = ' . $id;
$result = mysql_query($query, $db) or die(mysql_error());
$row = mysql_fetch_assoc($result);
extract($row);
$user = $row['username'];
$username = $row['username'] . "/";
} else {
$user = $_SESSION['username'];
$username = $_SESSION['username'] . "/";
}

$filesdir = "uploads/" . $username . 'files/';

if (!is_dir($filesdir)) mkdir($filesdir, 0777, true) or die("Directory could not be created.");

$opendir = $_GET['dir'];
$current_dir = $username . $opendir;
$dirpath = $filesdir . $opendir;
$files = opendir($dirpath);

if (isset($_GET['id'])) {
echo '<div id="pageheader" class="pageheader2"><div class="heading">';
echo 'View ' . $user . '\'s Files!';
echo '</div></div>';
} else {
echo '<div id="pageheader" class="pageheader2"><div class="heading">';
echo 'View Shared Files!';
echo '</div></div>';
}

echo "Current directory you are browsing is $current_dir<br>";
echo "Directory Listing:<br />";
echo "<div id='directorylisting'><hr />";

if (!isset($_GET['id'])) {
while ($file = readdir($files)) {
if (($file != ".") && ($file != "..") && ($file != "desktop.ini") && ($file != "Thumbs.db") && ($file != "Ehthumbs.db") && ($file != "_derived") && ($file != "_fpclass") && ($file != "_themes") && ($file != "_vti_cnf") && ($file != "_vti_pvt") && ($file != "images")) {
if (is_file($dirpath . $file)) {
$nameArray = split("[/\\.]", $file);
$p = count($nameArray);
$filetype = $nameArray[($p - 1)];

echo "<div class='container'><div style='float: left; margin-left: 5px;'>";
echo "<span class='image'>";

if ($filetype == "css") echo "<img src='i/sy/i/file/css.gif' title='css' />";
elseif ($filetype == "dm") echo "<img src='i/sy/i/file/dreamweaver.gif' title='dreamweaver' />";
elseif (($filetype == "xls") || ($filetype == "xlsx")) echo "<img src='i/sy/i/file/excel.gif' title='spreadsheet' />";
elseif ($filetype == "exe") echo "<img src='i/sy/i/file/exe.gif' title='exe' />";
elseif ($filetype == "fla") echo "<img src='i/sy/i/file/flash.gif' title='flash' />";
elseif (($filetype == "htm") || ($filetype == "html")) echo "<img src='i/sy/i/file/html.gif' title='htm / html' />";
elseif ($filetype == "ill") echo "<img src='i/sy/i/file/illustrator.gif' title='illustrator' />";
elseif ($filetype == "ind") echo "<img src='i/sy/i/file/indesign.gif' title='indesign' />";
elseif ($filetype == "mp3") echo "<img src='i/sy/i/file/mp3-music.gif' title='mp3' />";
elseif (($filetype == "doc") || ($filetype == "docx")) echo "<img src='i/sy/i/file/ms-word.gif' title='word' />";
elseif ($filetype == "pdf") echo "<img src='i/sy/i/file/pdf.gif' title='pdf' />";
elseif ($filetype == "php") echo "<img src='i/sy/i/file/php.gif' title='php' />";
elseif ($filetype == "phshop") echo "<img src='i/sy/i/file/photoshop.gif' title='photoshop' />";
elseif ($filetype == "ppt") echo "<img src='i/sy/i/file/ppt.jpeg' title='powerpoint' />";
elseif ($filetype == "qt") echo "<img src='i/sy/i/file/quicktime-movie.gif' title='quicktime' />";
elseif ($filetype == "text") echo "<img src='i/sy/i/file/text.gif' title='text' />";
elseif ($filetype == "txt") echo "<img src='i/sy/i/file/txt.gif' title='txt' />";
elseif (($filetype == "wma") || ($filetype == "wmv")) echo "<img src='i/sy/i/file/window-media.gif' title='windows media' />";
elseif ($filetype == "xml") echo "<img src='i/sy/i/file/rss.gif' title='xml' />";
elseif ($filetype == "zip") echo "<img src='i/sy/i/file/zip.gif' title='zip' />";
else echo "<img src='i/sy/i/file/file.gif' title='file' />";

echo "</span>";
echo "<span class='link'><a href='$dirpath$file'>$file</a></span></div><div style='float : right; margin-right : 5px; '><a href='view_files_rename.php?dir=$dirpath&file=$file'>Rename</a> | <a href='view_files_delete.php?dir=$dirpath&file=$file'>Delete</a></div></div><br /><hr />\n";
} else {
echo "<div class='container'><div style='float: left; margin-left: 5px;'><span class='image'><img src='i/sy/i/file/folder-blue.gif' title='directory' /></span><span class='link'><a href='" . $_SERVER['PHP_SELF'] . "?dir=$opendir$file/' title='Browse This Directory'>$file</a></span></div><div style='float : right; margin-right : 5px; '><a href='view_files_rename.php?dir=$dirpath&file=$file'>Rename</a> | <a href='view_files_delete.php?dir=$dirpath&file=$file'>Delete</a></div></div><br /><hr />\n";
}
}
}
} else {
while ($file = readdir($files)) {
if (($file != ".") && ($file != "..") && ($file != "desktop.ini") && ($file != "Thumbs.db") && ($file != "Ehthumbs.db") && ($file != "_derived") && ($file != "_fpclass") && ($file != "_themes") && ($file != "_vti_cnf") && ($file != "_vti_pvt") && ($file != "images")) {
if (is_file($dirpath . $file)) {
$nameArray = split("[/\\.]", $file);
$p = count($nameArray);
$filetype = $nameArray[($p - 1)];

echo "<div class='container'><div style='float: left; margin-left: 5px;'>";
echo "<span class='image'>";

if ($filetype == "css") echo "<img src='i/sy/i/file/css.gif' title='css' />";
elseif ($filetype == "dm") echo "<img src='i/sy/i/file/dreamweaver.gif' title='dreamweaver' />";
elseif (($filetype == "xls") || ($filetype == "xlsx")) echo "<img src='i/sy/i/file/excel.gif' title='spreadsheet' />";
elseif ($filetype == "exe") echo "<img src='i/sy/i/file/exe.gif' title='exe' />";
elseif ($filetype == "fla") echo "<img src='i/sy/i/file/flash.gif' title='flash' />";
elseif (($filetype == "htm") || ($filetype == "html")) echo "<img src='i/sy/i/file/html.gif' title='htm / html' />";
elseif ($filetype == "ill") echo "<img src='i/sy/i/file/illustrator.gif' title='illustrator' />";
elseif ($filetype == "ind") echo "<img src='i/sy/i/file/indesign.gif' title='indesign' />";
elseif ($filetype == "mp3") echo "<img src='i/sy/i/file/mp3-music.gif' title='mp3' />";
elseif (($filetype == "doc") || ($filetype == "docx")) echo "<img src='i/sy/i/file/ms-word.gif' title='word' />";
elseif ($filetype == "pdf") echo "<img src='i/sy/i/file/pdf.gif' title='pdf' />";
elseif ($filetype == "php") echo "<img src='i/sy/i/file/php.gif' title='php' />";
elseif ($filetype == "phshop") echo "<img src='i/sy/i/file/photoshop.gif' title='photoshop' />";
elseif ($filetype == "ppt") echo "<img src='i/sy/i/file/ppt.jpeg' title='powerpoint' />";
elseif ($filetype == "qt") echo "<img src='i/sy/i/file/quicktime-movie.gif' title='quicktime' />";
elseif ($filetype == "text") echo "<img src='i/sy/i/file/text.gif' title='text' />";
elseif ($filetype == "txt") echo "<img src='i/sy/i/file/txt.gif' title='txt' />";
elseif (($filetype == "wma") || ($filetype == "wmv")) echo "<img src='i/sy/i/file/window-media.gif' title='windows media' />";
elseif ($filetype == "xml") echo "<img src='i/sy/i/file/rss.gif' title='xml' />";
elseif ($filetype == "zip") echo "<img src='i/sy/i/file/zip.gif' title='zip' />";
else echo "<img src='i/sy/i/file/file.gif' title='file' />";

echo "</span>";
echo "<span class='link'><a href='$dirpath$file'>$file</a></span></div></div><br /><hr />\n";
} else {
echo "<div class='container'><div style='float: left; margin-left: 5px;'><span class='image'><img src='i/sy/i/file/folder-blue.gif' title='directory' /></span><span class='link'><a href='" . $_SERVER['PHP_SELF'] . "?id=$id&dir=$opendir$file/' title='Browse This Directory'>$file</a></span></div></div><br /><hr />\n";
}
}
}
}

closedir($files);
} else {
if (isset($_GET['id'])) {
$id = $_GET['id'];
$query = 'SELECT user_id, username FROM login WHERE user_id = ' . $id;
$result = mysql_query($query, $db) or die(mysql_error());
$row = mysql_fetch_assoc($result);
extract($row);
$user = $row['username'];
$username = $row['username'] . "/";
} else {
$user = "guest";
$username = "guest/";
}

$filesdir = "uploads/" . $username . 'files/';

if (!is_dir($filesdir)) mkdir($filesdir, 0777, true) or die("Directory could not be created.");

$opendir = $_GET['dir'];
$current_dir = $username . $opendir;
$dirpath = $filesdir . $opendir;
$files = opendir($dirpath);

if (isset($_GET['id'])) {
echo '<div id="pageheader" class="pageheader2"><div class="heading">';
echo 'View ' . $user . '\'s Files!';
echo '</div></div>';
} else {
echo '<div id="pageheader" class="pageheader2"><div class="heading">';
echo 'View Shared Files!';
echo '</div></div>';
}

echo "Current directory you are browsing is $current_dir<br>";
echo "Directory Listing:<br />";
echo "<div id='directorylisting'><hr />";

if (!isset($_GET['id'])) {
while ($file = readdir($files)) {
if (($file != ".") && ($file != "..") && ($file != "desktop.ini") && ($file != "Thumbs.db") && ($file != "Ehthumbs.db") && ($file != "_derived") && ($file != "_fpclass") && ($file != "_themes") && ($file != "_vti_cnf") && ($file != "_vti_pvt") && ($file != "images")) {
if (is_file($dirpath . $file)) {
$nameArray = split("[/\\.]", $file);
$p = count($nameArray);
$filetype = $nameArray[($p - 1)];

echo "<div class='container'><div style='float: left; margin-left: 5px;'>";
echo "<span class='image'>";

// new ppt icon
// need js / php / pl / asp / images (gif, jpeg, png) / video (mpg, mov, mpeg) / ?

if ($filetype == "css") echo "<img src='i/sy/i/file/css.gif' title='css' />";
elseif ($filetype == "dm") echo "<img src='i/sy/i/file/dreamweaver.gif' title='dreamweaver' />";
elseif (($filetype == "xls") || ($filetype == "xlsx")) echo "<img src='i/sy/i/file/excel.gif' title='spreadsheet' />";
elseif ($filetype == "exe") echo "<img src='i/sy/i/file/exe.gif' title='exe' />";
elseif ($filetype == "fla") echo "<img src='i/sy/i/file/flash.gif' title='flash' />";
elseif (($filetype == "htm") || ($filetype == "html")) echo "<img src='i/sy/i/file/html.gif' title='htm / html' />";
elseif ($filetype == "ill") echo "<img src='i/sy/i/file/illustrator.gif' title='illustrator' />";
elseif ($filetype == "ind") echo "<img src='i/sy/i/file/indesign.gif' title='indesign' />";
elseif ($filetype == "mp3") echo "<img src='i/sy/i/file/mp3-music.gif' title='mp3' />";
elseif (($filetype == "doc") || ($filetype == "docx")) echo "<img src='i/sy/i/file/ms-word.gif' title='word' />";
elseif ($filetype == "pdf") echo "<img src='i/sy/i/file/pdf.gif' title='pdf' />";
elseif ($filetype == "php") echo "<img src='i/sy/i/file/php.gif' title='php' />";
elseif ($filetype == "phshop") echo "<img src='i/sy/i/file/photoshop.gif' title='photoshop' />";
elseif ($filetype == "ppt") echo "<img src='i/sy/i/file/ppt.jpeg' title='powerpoint' />";
elseif ($filetype == "qt") echo "<img src='i/sy/i/file/quicktime-movie.gif' title='quicktime' />";
elseif ($filetype == "text") echo "<img src='i/sy/i/file/text.gif' title='text' />";
elseif ($filetype == "txt") echo "<img src='i/sy/i/file/txt.gif' title='txt' />";
elseif (($filetype == "wma") || ($filetype == "wmv")) echo "<img src='i/sy/i/file/window-media.gif' title='windows media' />";
elseif ($filetype == "xml") echo "<img src='i/sy/i/file/rss.gif' title='xml' />";
elseif ($filetype == "zip") echo "<img src='i/sy/i/file/zip.gif' title='zip' />";
else echo "<img src='i/sy/i/file/file.gif' title='file' />";

echo "</span>";
echo "<span class='link'><a href='$dirpath$file'>$file</a></span></div><div style='float : right; margin-right : 5px; '><a href='view_files_rename.php?dir=$dirpath&file=$file'>Rename</a> | <a href='view_files_delete.php?dir=$dirpath&file=$file'>Delete</a></div></div><br /><hr />\n";
} else {
echo "<div class='container'><div style='float: left; margin-left: 5px;'><span class='image'><img src='i/sy/i/file/folder-blue.gif' title='directory' /></span><span class='link'><a href='" . $_SERVER['PHP_SELF'] . "?dir=$opendir$file/' title='Browse This Directory'>$file</a></span></div><div style='float : right; margin-right : 5px; '><a href='view_files_rename.php?dir=$dirpath&file=$file'>Rename</a> | <a href='view_files_delete.php?dir=$dirpath&file=$file'>Delete</a></div></div><br /><hr />\n";
}
}
}
} else {
while ($file = readdir($files)) {
if (($file != ".") && ($file != "..") && ($file != "desktop.ini") && ($file != "Thumbs.db") && ($file != "Ehthumbs.db") && ($file != "_derived") && ($file != "_fpclass") && ($file != "_themes") && ($file != "_vti_cnf") && ($file != "_vti_pvt") && ($file != "images")) {
if (is_file($dirpath . $file)) {
$nameArray = split("[/\\.]", $file);
$p = count($nameArray);
$filetype = $nameArray[($p - 1)];

echo "<div class='container'><div style='float: left; margin-left: 5px;'>";
echo "<span class='image'>";

if ($filetype == "css") echo "<img src='i/sy/i/file/css.gif' title='css' />";
elseif ($filetype == "dm") echo "<img src='i/sy/i/file/dreamweaver.gif' title='dreamweaver' />";
elseif (($filetype == "xls") || ($filetype == "xlsx")) echo "<img src='i/sy/i/file/excel.gif' title='spreadsheet' />";
elseif ($filetype == "exe") echo "<img src='i/sy/i/file/exe.gif' title='exe' />";
elseif ($filetype == "fla") echo "<img src='i/sy/i/file/flash.gif' title='flash' />";
elseif (($filetype == "htm") || ($filetype == "html")) echo "<img src='i/sy/i/file/html.gif' title='htm / html' />";
elseif ($filetype == "ill") echo "<img src='i/sy/i/file/illustrator.gif' title='illustrator' />";
elseif ($filetype == "ind") echo "<img src='i/sy/i/file/indesign.gif' title='indesign' />";
elseif ($filetype == "mp3") echo "<img src='i/sy/i/file/mp3-music.gif' title='mp3' />";
elseif (($filetype == "doc") || ($filetype == "docx")) echo "<img src='i/sy/i/file/ms-word.gif' title='word' />";
elseif ($filetype == "pdf") echo "<img src='i/sy/i/file/pdf.gif' title='pdf' />";
elseif ($filetype == "php") echo "<img src='i/sy/i/file/php.gif' title='php' />";
elseif ($filetype == "phshop") echo "<img src='i/sy/i/file/photoshop.gif' title='photoshop' />";
elseif ($filetype == "ppt") echo "<img src='i/sy/i/file/ppt.jpeg' title='powerpoint' />";
elseif ($filetype == "qt") echo "<img src='i/sy/i/file/quicktime-movie.gif' title='quicktime' />";
elseif ($filetype == "text") echo "<img src='i/sy/i/file/text.gif' title='text' />";
elseif ($filetype == "txt") echo "<img src='i/sy/i/file/txt.gif' title='txt' />";
elseif (($filetype == "wma") || ($filetype == "wmv")) echo "<img src='i/sy/i/file/window-media.gif' title='windows media' />";
elseif ($filetype == "xml") echo "<img src='i/sy/i/file/rss.gif' title='xml' />";
elseif ($filetype == "zip") echo "<img src='i/sy/i/file/zip.gif' title='zip' />";
else echo "<img src='i/sy/i/file/file.gif' title='file' />";

echo "</span>";
echo "<span class='link'><a href='$dirpath$file'>$file</a></span></div></div><br /><hr />";
} else {
echo "<div class='container'><div style='float: left; margin-left: 5px;'><span class='image'><img src='i/sy/i/file/folder-blue.gif' title='directory' /></span><span class='link'><a href='" . $_SERVER['PHP_SELF'] . "?id=$id&dir=$opendir$file/' title='Browse This Directory'>$file</a></span></div></div><br /><hr />";
}
}
}
}

closedir($files);
}

echo "</div>";
?>
</div>
<?php
include ("ft.inc.php");
include ("tracking_scripts.inc.php");
?>
</body>

</html>