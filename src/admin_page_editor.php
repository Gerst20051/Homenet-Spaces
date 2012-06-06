<?php
require ("lang.inc.php");
include ("auth.inc.php");
include ("admin.inc.php");
include ("db.member.inc.php");

if (isset($_GET['action']) && $_GET['action'] == 'Edit') {
if (isset($_POST['update']) && $_POST['update'] == 'Update') {
$filecontents = (isset($_POST['filecontents'])) ? trim(stripslashes($_POST['filecontents'])) : '';

$query = 'SELECT username FROM login WHERE user_id = ' . (int)$_SESSION['user_id'] . ' AND username = "' . mysql_real_escape_string($_SESSION['username'], $db) . '"';
$result = mysql_query($query, $db) or die(mysql_error());

if (mysql_num_rows($result) == 0) {
include ("break_out_form.inc.php");
mysql_free_result($result);
die();
}

mysql_free_result($result);

$header_updateerrors = array();

if (empty($filecontents)) $header_updateerrors[] = 'File Contents cannot be blank.';

if (count($header_updateerrors) > 0) {
} else {
$dirpath = $_GET['dir'];
$fname = $_GET['file'];
$filetoedit = $dirpath . $fname;
$fhandle = fopen($filetoedit, "r") or exit("Unable to open file!");
$content = fread($fhandle, filesize($filetoedit));
$content = str_replace($content, $filecontents, $content);
$fhandle = fopen($filetoedit, "w");
fwrite($fhandle, $content);
fclose($fhandle);
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
<p><strong>The file has been updated!</strong></p>
<p><a href="user_personal.php">Click here</a> to return to your account.</p>
<p><a href="admin_page_editor.php">Select File</a> &nbsp;|&nbsp; <a href="<?php echo $dirpath . $fname; ?>" target="_blank">View File</a> &nbsp;|&nbsp; <a href="admin_page_editor.php?dir=<?php echo $dirpath; ?>&file=<?php echo $fname; ?>&action=Edit">Edit File</a></p>
</div>
<!-- End page content -->
<?php include ("ft.inc.php"); ?>
</body>

</html>
<?php
die();
}
} else {
$query = 'SELECT u.user_id FROM login u JOIN info i ON u.user_id = i.user_id WHERE username = "' . mysql_real_escape_string($_SESSION['username'], $db) . '"';
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
div.pagecontent .filecontents textarea {
font-size: 14px;
padding: 10px;
text-align: left;
}

div.highlightsyntax span#syntax div.code {
padding: 20px;
text-align: left;
}
</style>
</head>

<body>
<?php include ("hd.inc.php"); ?>
<!-- Begin page content -->
<div id="pageeditor_pagecontent" class="pagecontent">
<div id="pageheader" class="pageheader2"><div class="heading">
Page Editor
</div></div>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
<?php
$dirpath = $_GET['dir'];
$fname = $_GET['file'];
$filetoedit = $dirpath . $fname;
$fhandle = fopen($filetoedit, "r") or exit("Unable to open file!<br /><br /><a href='javascript:history.go(-1)'>Go Back</a> | <a href='admin_page_editor.php'>Select Another File</a>");

// this will not edit files with textareas
echo "you are editing " . $fname;
echo "<br /><br />";
echo "<div class='filecontents'><textarea name='filecontents' id='filecontents' rows='30' cols='110' maxlength='65536'>";
while (!feof($fhandle)) echo fgets($fhandle);
echo "</textarea></div>";
?>
<br />
<input type="hidden" name="action" value="Edit" />
<input type="submit" name="update" value="Update" />
<input type="button" id="cancel" value="Cancel"  onclick="history.go(-1);" />
<input type="reset" id="reset" value="Reset" />
</form>
<br />
<div class="highlightsyntax">
<span class="syntaxlinks">
<a href="#" onclick="showhide('syntax'); return(false);">Highlight PHP Syntax</a>
</span>
<br />
<span id="syntax" style="display: none">
<br />
<?php
$filecode = file_get_contents($filetoedit, "r") or exit("Unable to open file!<br /><br /><a href='javascript:history.go(-1)'>Go Back</a> | <a href='admin_page_editor.php'>Select Another File</a>");

echo "<div class='code'>";
echo highlight_string($filecode);
echo "</div>";
?>
</span>
</div>
</div>
<!-- End page content -->
<?php include ("ft.inc.php"); ?>
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
<?php include ("hd.inc.php"); ?>
<!-- Begin page content -->
<div id="pageeditor_pagecontent" class="pagecontent">
<div id="pageheader" class="pageheader2"><div class="heading">
Select File to Edit
</div></div>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="get">
<input type="text" name="file" value="<?php echo $filetoedit; ?>" />
<input type="submit" name="action" value="Edit" />
<input type="button" id="cancel" value="Cancel"  onclick="history.go(-1);" />
</form>
<br />
<a href="admin_view_files.php">Browse Files</a>
</div>
<!-- End page content -->
<?php include ("ft.inc.php"); ?>
</body>

</html>
<?php } ?>