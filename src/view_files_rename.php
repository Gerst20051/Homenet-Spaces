<?php
session_start();
require ("lang.inc.php");
include ("db.member.inc.php");
include ("login.inc.php");

if (isset($_POST['renamefile']) && $_POST['renamefile'] == 'Rename') {
$dirfiletorename = $_GET['dir'];
$filetorename = $_GET['file'];
$newfilename = $_POST['newfilename'];
$header_updateerrors = array();

if (empty($newfilename)) $header_updateerrors[] = 'New File Name cannot be blank.';

if (count($header_updateerrors) > 0) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//<?php echo $TEXT['global-dtdlang']; ?>" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $TEXT['global-lang']; ?>" lang="<?php echo $TEXT['global-lang']; ?>" dir="<?php echo $TEXT['global-text_dir']; ?>">

<head>
<title><?php echo $TEXT['global-headertitle'] . " | " . $TEXT['homepage-headertitle']; ?></title>
<meta http-equiv="content-type" content="text/html; charset=<?php echo $TEXT['global-charset']; ?>" />
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="javascript.php"></script>
<style type="text/css">
div.pagecontent input[type="text"] {
font-size : 13pt; 
height : 31px; 
letter-spacing : 2px; 
line-height : 29px; 
}

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
</head>

<body>
<?php include ("hd.inc.php"); ?>
<!-- Begin page content -->
<div class="pagecontent">
<p>
Are you sure you want to rename the file?
<br /><br />
<strong style="color: #f33; weight: bold;">Don't Forget The File Extention.</strong>
</p>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
<div>
<label for="filetorename">Old Name </label><input type="text" name="filetorename" id="filetorename" value="<?php echo $filetorename; ?>" style="width: 300px;" disabled="disabled">
<br /><br />
<label for="newfilename">New Name </label><input type="text" name="newfilename" id="newfilename" value="<?php echo $newfilename; ?>" style="width: 300px;">
<br /><br />
<input type="submit" name="renamefile" value="Rename" />
<input type="button" id="cancel" value="Cancel" onclick="history.go(-1);" />
</div>
</form>
<br />
<p><strong style="color: #f33; weight: bold;">The file name will be changed once you confirm!</strong></p>
</div>
<!-- End page content -->
<?php include ("ft.inc.php"); ?>
</body>

</html>
<?php
} else {
if (!@rename($dirfiletorename . $filetorename, $dirfiletorename . $newfilename)) $header_error = "File Couldn't Be Renamed";
else $header_error = "File Was Renamed";
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
<p><strong>
<?php
echo $filetorename;

if ($header_error != "File Was Renamed") echo " couldn't be renamed";
else echo " has been renamed to $newfilename";
?>
</strong></p>
<p><a href="view_files.php">Click here</a> to view your files.</p>
<p><a href="view_files_rename.php?dir=<?php echo $dirfiletorename; ?>&file=<?php echo $newfilename; ?>">Click here</a> to rename <?php echo $newfilename; ?> again.</p>
</div>
<!-- End page content -->
<?php include ("ft.inc.php"); ?>
</body>
<?php
mysql_close($db);
die();
}
} else {
$dirfiletorename = $_GET['dir'];
$filetorename = $_GET['file'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//<?php echo $TEXT['global-dtdlang']; ?>" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $TEXT['global-lang']; ?>" lang="<?php echo $TEXT['global-lang']; ?>" dir="<?php echo $TEXT['global-text_dir']; ?>">

<head>
<title><?php echo $TEXT['global-headertitle'] . " | " . $TEXT['homepage-headertitle']; ?></title>
<meta http-equiv="content-type" content="text/html; charset=<?php echo $TEXT['global-charset']; ?>" />
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="javascript.php"></script>
<style type="text/css">
div.pagecontent input[type="text"] {
font-size : 13pt; 
height : 31px; 
letter-spacing : 2px; 
line-height : 29px; 
}

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
</head>

<body>
<?php include ("hd.inc.php"); ?>
<!-- Begin page content -->
<div class="pagecontent">
<p>
Are you sure you want to rename the file?
<br /><br />
<strong style="color: #f33; weight: bold;">Don't Forget The File Extention.</strong>
</p>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
<div>
<label for="filetorename">Old Name </label><input type="text" name="filetorename" id="filetorename" value="<?php echo $filetorename; ?>" style="width: 300px;" disabled="disabled">
<br /><br />
<label for="newfilename">New Name </label><input type="text" name="newfilename" id="newfilename" value="<?php echo $newfilename; ?>" style="width: 300px;">
<br /><br />
<input type="submit" name="renamefile" value="Rename" />
<input type="button" id="cancel" value="Cancel" onclick="history.go(-1);" />
</div>
</form>
<br />
<p><strong style="color: #f33; weight: bold;">The file name will be changed once you confirm!</strong></p>
</div>
<!-- End page content -->
<?php include ("ft.inc.php"); ?>
</body>

</html>
<?php } ?>