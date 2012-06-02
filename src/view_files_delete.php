<?php
session_start();

require ("lang.inc.php");
include ("db.member.inc.php");
include ("login.inc.php");
include ("bimage.inc.php");

if (isset($_POST['deletefile']) && $_POST['deletefile'] == ' Yes ') {
$dirfiletodelete = $_GET['dir'];
$filetodelete = $_GET['file'];

if (is_file($dirfiletodelete . $filetodelete)) {
if (!@unlink($dirfiletodelete . $filetodelete)) {
$header_error = "File Couldn't Be Deleted";
} else {
$header_error = "File Was Deleted";
}
} else {
if (file_exists($dirfiletodelete . $filetodelete)) {
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

delete_directory($dirfiletodelete . $filetodelete);
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
<p><strong>
<?php
echo '"';
echo $filetodelete;
echo '"';

if (file_exists($dirfiletodelete . $filetodelete)) {
echo " Couldn't Be Deleted";
} else {
echo " Was Deleted";
}
?>
</strong></p>
<p><a href="view_files.php">Click here</a> to view your files.</p>
</div>
<!-- End page content -->
<?php
include ("ft.inc.php");
?>
</body>
<?php
mysql_close($db);
die();
} else {
$dirfiletodelete = $_GET['dir'];
$filetodelete = $_GET['file'];
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
<p>Are you sure you want to delete "<?php echo $filetodelete; ?>" ?</p>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
<div>
<input type="submit" name="deletefile" value=" Yes " />
<input type="button" id="cancel" value="  No  " onclick="history.go(-1); " />
</div>
</form>
<p><strong style="color : #ff3333; weight : bold; ">There is no way to retrieve the file once you confirm!</strong></p>
</div>
<!-- End page content -->
<?php
include ("ft.inc.php");
?>
</body>

</html>
<?php
}
?>