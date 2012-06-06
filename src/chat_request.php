<?php
session_start();

if (isset($_GET['message'])) {
$message = $_GET['message'];
$chatfile = "chat_history.php";
$fhandle = fopen($chatfile, "r") or exit("Unable to open file!");
$content = fread($fhandle, filesize($chatfile));
$message = '<div>(' . date("g:i A") . ') <b>' . $_SESSION['username'] . '</b>: ' . stripslashes(htmlspecialchars($message)) . '<br /></div>' . "\n";
$content .= $message;
$fhandle = fopen($chatfile, "w");
fwrite($fhandle, $content);
fclose($fhandle);
}

$chatfile = "chat_history.php";
$mtime = filemtime($chatfile);
$ctime = time();
$timediff = ($ctime - $mtime);

if ($timediff > 3600) {
$content = "<div>Welcome To Homenet Spaces CHAT!! Enjoy :)</div><br />\n";
$fhandle = fopen($chatfile, "w");
fwrite($fhandle, $content);
fclose($fhandle);
}

$fhandle = fopen($chatfile, "r") or exit("Unable to open file!");
$content = fread($fhandle, filesize($chatfile));
fclose($fhandle);

echo $content;

if (strlen($content) > 60) {
echo "<br />Last Message Was Sent ";

if ($timediff < 60) {
echo $timediff;

if ($timediff > 1) echo " Seconds Ago";
else echo " Second Ago";
} else {
$mtimediff = floor($timediff / 60);
$stimediff = ($timediff % 60);
echo $mtimediff;

if ($mtimediff > 1) echo " Minutes & ";
else echo " Minute & ";
echo $stimediff;

if ($stimediff > 1) echo " Seconds Ago";
else echo " Second Ago";
}
}
?>