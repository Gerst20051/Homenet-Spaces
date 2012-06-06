<?php
session_start();

require ("nolang.inc.php");
include ("db.member.inc.php");
include ("login.inc.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//<?php echo $TEXT['global-dtdlang']; ?>" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $TEXT['global-lang']; ?>" lang="<?php echo $TEXT['global-lang']; ?>" dir="<?php echo $TEXT['global-text_dir']; ?>">

<head>
<title><?php echo $TEXT['global-headertitle'] . $TEXT['mobile-headertitle'] . " | " . $TEXT['homepage-headertitle']; ?></title>
<meta http-equiv="content-type" content="text/html; charset=<?php echo $TEXT['global-charset']; ?>" />
<meta name="author" content="Homenet Spaces Andrew Gerst" />
<meta name="copyright" content="© Homenet Spaces" />
<meta name="keywords" content="Homenet, Spaces, The, Place, To, Be, Creative, Andrew, Gerst, Free, Profiles, Information, Facts" />
<meta name="description" content="Welcome to Homenet Spaces | This is the place to be creative! Feel free to add yourself to our wonderful community by registering!" />
<meta name="verify-v1" content="IcnSEyHrk5lWSJrEatQ3Q9KovOtFtjJ29xIS+gSh+Co=" />
<meta name="revisit-after" content="7 days" />
<meta name="googlebot" content="index, follow, all" />
<meta name="robots" content="index, follow, all" />
<link rel="alternate" type="application/rss+xml" title="<?php echo $TEXT['homepage-rssfeed_monthlyupdates']; ?>" href="rss/rss.xml" />
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="javascript.php"></script>
<base target="_top" />
</head>

<body>
<?php include ("hd.inc.php"); ?>
<!-- Begin page content -->
<div id="home_pagecontent" class="pagecontent">
<?php
if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1) {
?>
<h1><?php echo $TEXT['homepage-content_header']; ?></h1>
<h3>Community Stats:</h3>
<?php
$oresult = mysql_db_query($om, "SELECT DISTINCT username FROM users_online") or die("Database SELECT Error");
$online = mysql_num_rows($oresult);

$uresult = mysql_db_query($om, "SELECT DISTINCT username FROM users_online ORDER BY timestamp DESC") or die("Database SELECT Error");

$mresult = mysql_query('SELECT user_id FROM login');
$members = mysql_num_rows($mresult);

$goresult = mysql_db_query($om, "SELECT DISTINCT ip FROM guests_online") or die("Database SELECT Error");
$gonline = mysql_num_rows($goresult);

if ($online == 0) {
echo "$members  Members<br />No Members Online";

if ($gonline > 0) {
echo "<br />";
echo "<b>$gonline</b>";

if ($gonline < 2) echo " Guest ";
else echo " Guests ";
echo "Online";
}
} else {
echo "<b>$online</b> out of $members  Members Online";

if ($gonline > 0) {
echo "<br />";
echo "<b>$gonline</b>";

if ($gonline < 2) echo " Guest ";
else echo " Guests ";
echo "Online";
}

echo "<br /><br />";
echo "<div style='margin-bottom: 10px; margin-top: 10px; text-align: center; width: 100%;'>";
echo "<fieldset style='margin: 0 auto; width: 65%;'>";
echo "<legend>Members Online </legend>";

while ($onlineusers = mysql_fetch_array($uresult, MYSQL_ASSOC)) {
foreach ($onlineusers as $users) {
$query = 'SELECT user_id, username FROM login WHERE username = "' . $users . '"';
$result = mysql_query($query, $db) or die(mysql_error($db));
$row = mysql_fetch_array($result);
extract($row);
mysql_free_result($result);

$users_id = $row['user_id'];

$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id WHERE u.user_id = ' . $users_id;
$result = mysql_query($query, $db) or die(mysql_error($db));
$row = mysql_fetch_array($result);
extract($row);
mysql_free_result($result);

if ($default_image != null) echo '<span style="margin: 15px; text-align: center; width: 150px;"><a href="user_profile.php?id=' . $users_id . '"><img src="uploads/' . $users . '/images/thumb/' . $default_image . '" id="defaultuserimage" alt="View ' . $first_name . ' ' . $last_name . '\'s Profile!" /></a></span>';
else echo '<span style="margin: 15px; text-align: center; width: 150px;"><a href="user_profile.php?id=' . $users_id . '" title="View ' . $users . '\'s Profile!"><img src="i/mem/default.jpg" id="defaultuserimage" /></a></span>';
}
}

echo "</fieldset>";
echo "</div>";
}
?>
<p><a href="old/mc/misc/hsp/2009/p/february/changes.txt">February Updates</a> | <a href="old/mc/misc/hsp/2009/p/april/changes.txt">April Updates</a> | <a href="old/mc/misc/hsp/2009/p/may/changes.txt">May Updates</a> | <a href="old/mc/misc/hsp/2009/p/june/changes.txt">June Updates</a> | <a href="old/mc/misc/hsp/2009/p/july/changes.txt">July Updates</a> ( Current / This Month )<br /><br /></p>
<?php
} else { // user is not logged in
?>
<h1><?php echo $TEXT['homepage-content_header']; ?></h1>
You are currently not logged in to our system. Once you log in, you will have access to your personal area along with other user information.
<br /><br />
<h5>Please Login!</h5>
<h3>Community Stats:</h3>
<?php
$oresult = mysql_db_query($om, "SELECT DISTINCT username FROM users_online") or die("Database SELECT Error");
$online = mysql_num_rows($oresult);

$uresult = mysql_db_query($om, "SELECT DISTINCT username FROM users_online ORDER BY timestamp DESC") or die("Database SELECT Error");

$mresult = mysql_query('SELECT user_id FROM login');
$members = mysql_num_rows($mresult);

$goresult = mysql_db_query($om, "SELECT DISTINCT ip FROM guests_online") or die("Database SELECT Error");
$gonline = mysql_num_rows($goresult);

if ($online == 0) {
echo "$members  Members<br />No Members Online";

if ($gonline > 0) {
echo "<br />";
echo "<b>$gonline</b>";

if ($gonline < 2) echo " Guest ";
else echo " Guests ";
echo "Online";
}
} else {
echo "<b>$online</b> out of $members  Members Online";

if ($gonline > 0) {
echo "<br />";
echo "<b>$gonline</b>";

if ($gonline < 2) echo " Guest ";
else echo " Guests ";
echo "Online";
}

echo "<br /><br />";
echo "<div style='margin-bottom: 10px; margin-top: 10px; text-align: center; width: 100%;'>";
echo "<fieldset style='margin: 0 auto; width: 65%;'>";
echo "<legend>Members Online </legend>";

while ($onlineusers = mysql_fetch_array($uresult, MYSQL_ASSOC)) {
foreach ($onlineusers as $users) {
$query = 'SELECT user_id, username FROM login WHERE username = "' . $users . '"';
$result = mysql_query($query, $db) or die(mysql_error($db));
$row = mysql_fetch_array($result);
extract($row);
mysql_free_result($result);

$users_id = $row['user_id'];

$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id WHERE u.user_id = ' . $users_id;
$result = mysql_query($query, $db) or die(mysql_error($db));
$row = mysql_fetch_array($result);
extract($row);
mysql_free_result($result);

if ($default_image != null) echo '<span style="margin: 15px; text-align: center; width: 150px;"><a href="user_profile.php?id=' . $users_id . '"><img src="uploads/' . $users . '/images/thumb/' . $default_image . '" id="defaultuserimage" alt="View ' . $first_name . ' ' . $last_name . '\'s Profile!" /></a></span>';
else echo '<span style="margin: 15px; text-align: center; width: 150px;"><a href="user_profile.php?id=' . $users_id . '" title="View ' . $users . '\'s Profile!"><img src="i/mem/default.jpg" id="defaultuserimage" /></a></span>';
}
}

echo "</fieldset>";
echo "</div>";
}
?>
<p><a href="old/mc/misc/hsp/2009/p/february/changes.txt">February Updates</a> | <a href="old/mc/misc/hsp/2009/p/april/changes.txt">April Updates</a> | <a href="old/mc/misc/hsp/2009/p/may/changes.txt">May Updates</a> | <a href="old/mc/misc/hsp/2009/p/june/changes.txt">June Updates</a> | <a href="old/mc/misc/hsp/2009/p/july/changes.txt">July Updates</a> ( Current / This Month )<br /><br /></p>
<?php } ?>
</div>
<!-- End page content -->
<?php
include ("ft.inc.php");
include ("tracking_scripts.inc.php");
?>
</body>

</html>
<?php mysql_close($db); ?>