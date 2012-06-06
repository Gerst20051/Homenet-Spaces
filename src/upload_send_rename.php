<?php
session_start();

require ("lang.inc.php");
include ("db.member.inc.php");
include ("login.inc.php");

if (!isset($_POST['send'])) {
header('refresh: 2; url=upload_send.php?' . $_SERVER['QUERY_STRING']);
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
echo '<p><strong style="color: #f33; weight: bold;">You need to select a file to send.</strong></p>';
echo '<p>You are now being redirected to the send page. If your browser ' .
'doesn\'t redirect you automatically, <a href="upload_send.php?' . $_SERVER['QUERY_STRING'] . '">click here</a>.</p>';
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
<?php include ("hd.inc.php"); ?>
<!-- Begin page content -->
<div class="pagecontent">
<?php
$senddir = $_POST['senddir'];
$file_name = $_FILES['ufile']['name'];
$random_digit = rand(0000, 9999);
$new_file_name = $file_name;
$path = $senddir . '/' . $new_file_name;

if ($ufile != none) {
if (copy($_FILES['ufile']['tmp_name'], $path)) {
echo "<h2>Send was Successful</h2>";
echo "File Name : " . $new_file_name . "<br />"; 
echo "File Size : " . $_FILES['ufile']['size'] . "<br />"; 
echo "File Type : " . $_FILES['ufile']['type'] . "<br />"; 
echo "<br />";
echo "<a href='upload_send.php?" . $_SERVER['QUERY_STRING'] . "'>Send More Files</a>";

if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1) {
$query = 'SELECT rank FROM info WHERE user_id = ' . $user_id;
$result = mysql_query($query, $db) or die(mysql_error());
$row = mysql_fetch_array($result);
extract($row);
mysql_free_result($result);

$rank = ($rank + 100);

$query = 'UPDATE info SET rank = ' . $rank . ' WHERE user_id = ' . $user_id;
mysql_query($query, $db) or die(mysql_error());
}
} else {
echo "<a href='upload_send.php?" . $_SERVER['QUERY_STRING'] . "'>Please Select A File To Send</a>";
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