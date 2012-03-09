<?php
require ("lang.inc.php");
include ("auth.inc.php");
include ("db.member.inc.php");

$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id WHERE username = "' . mysql_real_escape_string($_SESSION['username'], $db) . '"';
$result = mysql_query($query, $db) or die(mysql_error($db));
$row = mysql_fetch_array($result);
extract($row);
mysql_free_result($result);

$query = 'SELECT * FROM ' . mysql_real_escape_string($_SESSION['username'], $comment_db) . ' ORDER BY date DESC';

switch ($_GET['filter']) {
case 'all': $query = 'SELECT * FROM ' . mysql_real_escape_string($_SESSION['username'], $comment_db) . ' ORDER BY date DESC'; break;
case 'inbox': $query = 'SELECT * FROM ' . mysql_real_escape_string($_SESSION['username'], $comment_db) . ' WHERE type = 0 ORDER BY date DESC'; break;
case 'sent': $query = 'SELECT * FROM ' . mysql_real_escape_string($_SESSION['username'], $comment_db) . ' WHERE type = 1 ORDER BY date DESC'; break;
}

$result = mysql_query($query, $comment_db) or die(mysql_error($comment_db));
$num_comments = mysql_num_rows($result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//<?php echo $TEXT['global-dtdlang']; ?>" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $TEXT['global-lang']; ?>" lang="<?php echo $TEXT['global-lang']; ?>" dir="<?php echo $TEXT['global-text_dir']; ?>">

<head>
<title><?php echo $TEXT['global-headertitle'] . " | " . $first_name . " " . $last_name . " | " . $TEXT['homepage-headertitle']; ?></title>
<meta http-equiv="content-type" content="text/html; charset=<?php echo $TEXT['global-charset']; ?>" />
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="javascript.php"></script>
<style type="text/css">
div.commentcontainer { 
background-color : #ff9; 
border : 2px solid #fc0; 
border-radius : 8px; 
-moz-border-radius : 8px; 
-webkit-border-radius : 8px; 
display : block; 
height : auto; 
margin : 0 auto; 
}
</style>
<?php
if (isset($_SESSION['logged']) && ($_SESSION['pref_upstyle'] == 1)) {
} else {
if ($user_style != null) {
?>
<!-- Begin user customization style -->
<style type="text/css">
<?php echo $user_style . "\n"; ?>
</style>
<!-- End user customization style -->
<?php
}
}
?>
</head>

<body id="usercomments_body">
<?php include ("hd.inc.php"); ?>
<!-- Begin page content -->
<div id="usercomments_pagecontent" class="pagecontent">
<div id="pageheader" class="pageheader2"><div class="heading">
Comments
</div></div>
<div style="padding: 20px;">
<?php if ($num_comments > 0) { ?>
<div>
<div style="float: left; text-align: left; width: 30%;">
Showing <?php echo $num_comments; ?> out of <?php echo $num_comments; ?>
</div>
<div style="float: right; text-align: right; width: 30%;">
<?php $sfilter = (isset($_GET['filter'])) ? $_GET['filter'] : null; ?>
<select name="selectfilter" size="1" id="selectfilter" style="padding: 4px;" onchange="window.location = document.all.selectfilter.value">
<option value="<?php echo $_SERVER['PHP_SELF']; if (isset($_SERVER['QUERY_STRING'])) { echo "?" . $_SERVER['QUERY_STRING']; } ?>"<?php if ($sfilter == 0 || null) { echo 'selected="selected"'; } ?>></option>
<option value="<?php echo $_SERVER['PHP_SELF']; if (isset($_SERVER['QUERY_STRING'])) { echo "?" . $_SERVER['QUERY_STRING'] . "&filter=all"; } else { echo "?filter=all"; } ?>" <?php if ($sfilter == "all") { echo 'selected="selected"'; } ?>>All</option>
<option value="<?php echo $_SERVER['PHP_SELF']; if (isset($_SERVER['QUERY_STRING'])) { echo "?" . $_SERVER['QUERY_STRING'] . "&filter=inbox"; } else { echo "?filter=inbox"; } ?>" <?php if ($sfilter == "inbox") { echo 'selected="selected"'; } ?>>Inbox</option>
<option value="<?php echo $_SERVER['PHP_SELF']; if (isset($_SERVER['QUERY_STRING'])) { echo "?" . $_SERVER['QUERY_STRING'] . "&filter=sent"; } else { echo "?filter=sent"; } ?>" <?php if ($sfilter == "sent") { echo 'selected="selected"'; } ?>>Sent</option>
</select>
</div>
</div>
<br /><br />
<?php
while ($row2 = mysql_fetch_assoc($result)) {
$query3 = 'SELECT firstname, lastname, default_image FROM info WHERE user_id = "' . $row2['user_id'] . '"';
$result3 = mysql_query($query3, $db) or die(mysql_error($db));
$row3 = mysql_fetch_array($result3);
extract($row3);
mysql_free_result($result3);
?>
<div class="commentcontainer">
<div style="diplay: block;">
<div style="float: left; text-align: left; padding: 10px; width: 45%;">
<?php
if ($row2['type'] == "1") echo "To";
else echo "From";
?>: <?php echo '<a href="user_profile.php?id=' . $row2['user_id'] . '">' . $row2['user'] . '</a>'; if (($row2['status'] == 0) && ($row2['type'] == 1)) { echo ' | <span style="color: #f00;"><small>Unread!</small></span>'; } ?>
</div>
<div style="clear: right; float: right; text-align: right; padding: 10px; width: 45%;">
<?php if (($row2['status'] == 0) && ($row2['type'] == 0)) { echo '<span style="color: #f00; font-weight: bold;">New!</span> | '; } echo $row2['date']; ?>
</div>
</div>
<div style="background-color: #fff; clear: both; display: block; margin: 0 auto; margin-left: 10px; margin-right: 10px; min-height: 50px; padding: 10px; padding-bottom: 16px; text-align: left;">
<div style="display: block; text-align: center; width: 10%;">
<?php
if ($row3['default_image'] != null) echo '<img src="uploads/' . $row2['user'] . '/images/thumb/' . $row3['default_image'] . '" id="defaultuserimage" title="' . $firstname . ' ' . $lastname . '" style="float: left; height: 50px; margin-right: 10px; margin-top: 4px; width: 50px;" />' . "\n";
else echo '<img src="i/mem/default.jpg" alt="" id="defaultuserimage" style="float: left; height: 50px; margin-right: 10px; margin-top: 4px; width: 50px;" />' . "\n";
?>
</div>
<div style="clear: right; display: block; font-size: 12pt; width: 100%;">
<?php echo $row2['comment']; ?>
</div>
</div>
<div style="clear: both; padding: 10px; text-align: right;">
<a href="user_comments.php?comment_id=<?php echo $row2['comment_id'] . "&action=delete"; ?>">Delete</a> | 
<a href="user_profile.php?id=<?php echo $row2['user_id'] . "&action=comment"; ?>">Comment Back</a> | 
<a href="user_profile.php?id=<?php echo $row2['user_id'] . "&action=message"; ?>">Message</a>
</div>
</div>
<br />
<?php
if (($row2['status'] == 0) && ($row2['type'] == 0)) {
$query = 'UPDATE ' . $_SESSION['username'] . ' SET status = 1 WHERE comment_id = ' . $row2['comment_id'] . ' LIMIT 1';
mysql_query($query, $comment_db) or die(mysql_error());

$query = 'UPDATE ' . $row2['user'] . ' SET status = 1 WHERE comment_id = ' . $row2['user_cid'] . ' LIMIT 1';
mysql_query($query, $comment_db) or die(mysql_error());
}
}
} else {
?>
You Don't Have Any Comments
<?php } ?>
</div>
</div>
<!-- End page content -->
<?php
include ("ft.inc.php");
include ("tracking_scripts.inc.php");
?>
</body>

</html>