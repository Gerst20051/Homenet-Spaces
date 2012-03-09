<?php
if (isset($_POST['befriend']) && ($_POST['befriend'] == "Befriend")) {
if ($friends != null) {
$query = 'UPDATE info SET friends = "' . $friends . ", " . $_SESSION['username'] . '" WHERE user_id = ' . $row['user_id'] . ' LIMIT 1';
} else {
$query = 'UPDATE info SET friends = "' . $_SESSION['username'] . '" WHERE user_id = ' . $row['user_id'] . ' LIMIT 1';
}

mysql_query($query, $db) or die(mysql_error());

$query = 'SELECT friends FROM info WHERE user_id = ' . $_SESSION['user_id'];
$result = mysql_query($query, $db) or die(mysql_error());
$row2 = mysql_fetch_array($result);
extract($row2);
mysql_free_result($result);

if ($row2['friends'] != null) {
$query = 'UPDATE info SET friends = "' . $friends . ", " . $row['username'] . '" WHERE user_id = ' . $_SESSION['user_id'] . ' LIMIT 1';
} else {
$query = 'UPDATE info SET friends = "' . $row['username'] . '" WHERE user_id = ' . $_SESSION['user_id'] . ' LIMIT 1';
}

mysql_query($query, $db) or die(mysql_error());
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//<?php echo $TEXT['global-dtdlang']; ?>" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $TEXT['global-lang']; ?>" lang="<?php echo $TEXT['global-lang']; ?>" dir="<?php echo $TEXT['global-text_dir']; ?>">

<head>
<title><?php echo $username . " ( " . $firstname . " " . $lastname . " ) | " . $TEXT['global-headertitle']; ?></title>
<meta http-equiv="content-type" content="text/html; charset=<?php echo $TEXT['global-charset']; ?>" />
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="javascript.php"></script>
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

<body id="userprofile_body">
<?php include ("hd.inc.php"); ?>
<!-- Begin page content -->
<div id="userprofile_pagecontent" class="pagecontent">
<div id="pageheader" class="pageheader2"><div class="heading">
<?php echo $row['firstname'] . " " . $row['lastname']; ?> is Now Your Friend
</div></div>
<br />
<div style="margin: 0 auto; width: 94%;">
<div style="float: left; width: 30%;">
<?php
if ($row['default_image'] != null) echo '<img src="/uploads/' . $row['username'] . '/images/thumb/' . $row['default_image'] . '" id="defaultuserimage" /><br />' . "\n";
else echo '<img src="i/mem/default.jpg" id="defaultuserimage" /><br />' . "\n";
?>
</div>
<div style="float: right; text-align: center; width: 70%;">
<a href="<?php echo $_SERVER['PHP_SELF'] . "?id=" . $row['user_id']; ?>">View <?php echo $row['firstname'] . " " . $row['lastname']; ?>'s Profile</a>
</div>
</div>
<div style="clear: both; width: 100%;">&nbsp;</div>
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
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//<?php echo $TEXT['global-dtdlang']; ?>" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $TEXT['global-lang']; ?>" lang="<?php echo $TEXT['global-lang']; ?>" dir="<?php echo $TEXT['global-text_dir']; ?>">

<head>
<title><?php echo $username . " ( " . $firstname . " " . $lastname . " ) | " . $TEXT['global-headertitle']; ?></title>
<meta http-equiv="content-type" content="text/html; charset=<?php echo $TEXT['global-charset']; ?>" />
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="javascript.php"></script>
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

<body id="userprofile_body">
<?php include ("hd.inc.php"); ?>
<!-- Begin page content -->
<div id="userprofile_pagecontent" class="pagecontent">
<div id="pageheader" class="pageheader2"><div class="heading">
Befriend - <?php echo $row['firstname'] . " " . $row['lastname']; ?>
</div></div>
<br />
<div style="margin: 0 auto; width: 94%;">
<div style="float: left; width: 30%;">
<?php
if ($row['default_image'] != null) echo '<img src="/uploads/' . $row['username'] . '/images/thumb/' . $row['default_image'] . '" id="defaultuserimage" /><br />' . "\n";
else echo '<img src="i/mem/default.jpg" id="defaultuserimage" /><br />' . "\n";
?>
</div>
<div style="float: right; text-align: center; width: 70%;">
<form action="<?php echo $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING']; ?>" method="post">
<input type="submit" name="befriend" value="Befriend" style="font-size: 40pt; height: 120px; letter-spacing: 8px; width: 500px;" />
<br /><br />
<input type="button" value="Cancel" onclick="history.go(-1);" style="font-size: 40pt; height: 120px; letter-spacing: 8px; width: 500px;" />
</form>
</div>
</div>
<div style="clear: both; width: 100%;">&nbsp;</div>
</div>
<!-- End page content -->
<?php
include ("ft.inc.php");
include ("tracking_scripts.inc.php");
?>
</body>

</html>
<?php die(); ?>