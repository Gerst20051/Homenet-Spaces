<?php
if (!isset($_GET['type'])) header('location:' . $_SERVER['PHP_SELF'] . '?type=upload&' . $_SERVER['QUERY_STRING']);
elseif (!isset($_GET['id'])) header('location: members.php?hurlerror=Please Select A Member To Send Files To!');
elseif ($_GET['id'] == 0 || null) header('location: members.php?hurlerror=Please Select A Member To Send Files To!');
else {
session_start();
require ("lang.inc.php");
include ("db.member.inc.php");
include ("login.inc.php");

$send_id = $_GET['id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//<?php echo $TEXT['global-dtdlang']; ?>" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $TEXT['global-lang']; ?>" lang="<?php echo $TEXT['global-lang']; ?>" dir="<?php echo $TEXT['global-text_dir']; ?>">

<head>
<title><?php echo $TEXT['global-headertitle'] . " | " . $TEXT['homepage-headertitle']; ?></title>
<meta http-equiv="content-type" content="text/html; charset=<?php echo $TEXT['global-charset']; ?>" />
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="javascript.php"></script>
<style type="text/css">
div.pagecontent input[type="file"] {
font-size : 13pt; 
height : 36px; 
letter-spacing : 2px; 
line-height : 29px; 
}

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

div.pagecontent input[type="reset"] {
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
<?php
$query = 'SELECT user_id, username FROM login WHERE user_id = ' . $send_id;
$result = mysql_query($query, $db) or die(mysql_error());
$row = mysql_fetch_array($result);
extract($row);
mysql_free_result($result);

switch ($_GET['type']) {
case 'upload':
echo '<div id="pageheader" class="pageheader2"><div class="heading">';
echo 'Upload and Send your Files!';
echo '</div></div>';

if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1) {
$dirpath = "/uploads/";
$recipient = $row['username'];
$sender = $_SESSION['username'];
$senddir = $dirpath . $recipient . "/received/" . $sender;

if (!is_dir($senddir)) mkdir($senddir, 0777, true) or die("Directory could not be created.");
} else {
$dirpath = "/uploads/";
$recipient = $row['username'];
$sender = "guest";
$senddir = $dirpath . $recipient . "/received/" . $sender;

if (!is_dir($senddir)) mkdir($senddir, 0777, true) or die("Directory could not be created.");
}

echo '<a href="' . $_SERVER['PHP_SELF'] . '"?type=upload&id="' . $send_id . '">Upload Files To Send</a> | <a href="' . $_SERVER['PHP_SELF'] . '"?type=copy&id="' . $send_id . '">Copy Your Uploaded Files</a>';
echo '<br /><br />';
echo '<div>Recipient: ' . $row['username'] . ' | <a href="members.php">Change</a>' . '</div>';
echo '<br />';
echo '<form action="upload_send_rename.php?' . $_SERVER['QUERY_STRING'] . '" method="post" enctype="multipart/form-data">
<input type="file" name="ufile" size="100" />
<input type="hidden" name="MAX_FILE_SIZE" value="10814714" />
<input type="hidden" name="senddir" value="' . $senddir . '" />
<br />
<br />
<input type="submit" name="send" value="Upload & Send" />
</form>';
break;

case 'copy':
echo '<div id="pageheader" class="pageheader2"><div class="heading">';
echo 'Send your Uploaded Files!';
echo '</div></div>';

if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1) {
$dirpath = "/uploads/";
$recipient = $row['username'];
$sender = $_SESSION['username'];
$senddir = $dirpath . $sender;

if (!is_dir($senddir)) mkdir($senddir, 0777, true) or die("Directory could not be created.");
} else {
$dirpath = "/uploads/";
$recipient = $row['username'];
$sender = "guest";
$senddir = $dirpath . $recipient . "/received/" . $sender;

if (!is_dir($senddir)) mkdir($senddir, 0777, true) or die("Directory could not be created.");
}

echo '<a href="' . $_SERVER['PHP_SELF'] . '"?type=upload&id="' . $send_id . '">Upload Files To Send</a> | <a href="' . $_SERVER['PHP_SELF'] . '"?type=copy&id="' . $send_id . '">Copy Your Uploaded Files</a>';
echo '<br /><br />';
echo '<div>Recipient: ' . $row['username'] . ' | <a href="members.php">Change</a>' . '</div>';
echo '<br />';
echo '<form action="upload_send_rename.php?' . $_SERVER['QUERY_STRING'] . '" method="post" enctype="multipart/form-data">
<input type="file" name="ufile" size="100" />
<input type="hidden" name="MAX_FILE_SIZE" value="10814714" />
<input type="hidden" name="senddir" value="' . $senddir . '" />
<br />
<br />
<input type="submit" name="send" value="Copy & Send" />
</form>';
break;
}
}

echo '<br />';
echo '<a href="view_files.php?type=upload">Click here</a> to see the files you have sent ' . $recipient . '.';
echo '<br /><br />';
?>
<form action="<?php echo $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING']; ?>" method="post">
<input type="text" name="newfoldername" style="width : 200px; " />
<input type="submit" name="createfolder" value="Create This Folder" />
</form>
<?php
if (isset($_POST['createfolder'])) {
$newfoldertocreate = $_POST['newfoldername'];

if ($newfoldertocreate != null) {
$newdir = $senddir . '/' . $newfoldertocreate;

if (!is_dir($newdir)) {
mkdir($newdir, 0777, true) or die("Directory could not be created.");

$query = 'SELECT rank FROM info WHERE user_id = ' . $user_id;
$result = mysql_query($query, $db) or die(mysql_error());
$row = mysql_fetch_array($result);
extract($row);
mysql_free_result($result);

$rank = ($rank + 100);

$query = 'UPDATE info SET rank = ' . $rank . ' WHERE user_id = ' . $user_id;
mysql_query($query, $db) or die(mysql_error());

$footer_message = '<div><strong style="color: #f33; weight: bold;">The folder ' . $newfoldertocreate . ' was created successfully!</strong></div>';
} else {
$footer_error = '<div><strong style="color: #f33; weight: bold;">The folder ' . $newfoldertocreate . ' already exists!</strong></div>';
}
} else {
$footer_error = '<div><strong style="color: #f33; weight: bold;">Please Enter A Name For The New Directory</strong></div>';
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