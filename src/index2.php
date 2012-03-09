<?php
include ("mobile.inc.php");
session_start();

require ("nolang.inc.php");
include ("db.member.inc.php");
include ("login.inc.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//<?php echo $TEXT['global-dtdlang']; ?>" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $TEXT['global-lang']; ?>" lang="<?php echo $TEXT['global-lang']; ?>" dir="<?php echo $TEXT['global-text_dir']; ?>">

<head>
<title><?php echo $TEXT['global-headertitle'] . " | " . $TEXT['homepage-headertitle']; ?></title>
<meta http-equiv="content-type" content="text/html; charset=<?php echo $TEXT['global-charset']; ?>" />
<meta name="author" content="Homenet Spaces Andrew Gerst" />
<meta name="copyright" content="© Homenet Spaces" />
<meta name="keywords" content="Homenet, Spaces, The, Place, To, Be, Creative, Andrew, Gerst, Free, Profiles, Information, Facts" />
<meta name="description" content="Welcome to Homenet Spaces | This is the place to be creative! Feel free to add yourself to our wonderful community by registering!" />
<meta name="verify-v1" content="IcnSEyHrk5lWSJrEatQ3Q9KovOtFtjJ29xIS+gSh+Co=" />
<meta name="y_key" content="26b304b5405c0df6" />
<meta name="revisit-after" content="7 days" />
<meta name="googlebot" content="index, follow, all" />
<meta name="robots" content="index, follow, all" />
<link rel="alternate" type="application/rss+xml" title="<?php echo $TEXT['homepage-rssfeed_monthlyupdates']; ?>" href="/rss/rss.xml" />
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="javascript.php"></script>
<base target="_top" />
</head>

<body>
<?php include ("hd.inc.php"); ?>
<!-- Begin page content -->
<div id="home_pagecontent" class="pagecontent">
<div id="homepage_content">
<?php
$oresult = mysql_db_query($om, "SELECT DISTINCT username FROM users_online") or die("Database SELECT Error");
$online = mysql_num_rows($oresult);

$uresult = mysql_db_query($om, "SELECT DISTINCT username FROM users_online ORDER BY timestamp DESC") or die("Database SELECT Error");

$mresult = mysql_query('SELECT user_id FROM login');
$members = mysql_num_rows($mresult);

$goresult = mysql_db_query($om, "SELECT DISTINCT ip FROM guests_online") or die("Database SELECT Error");
$gonline = mysql_num_rows($goresult);

if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1) {
?>
<div id="homepage_header">
<div><?php echo $TEXT['homepage-content_header']; ?></div>
</div>
<div id="panels">
<div id="stats">
<div class="header">
Community Stats:
</div>
<div class="content">
<?php
if ($online == 0) {
echo "$members  Members<br />No Members Online";

if ($gonline > 0) {
echo "<br /><b>$gonline</b>";

if ($gonline < 2) echo " Guest ";
else echo " Guests ";
echo "Online";
}
} else {
echo "<b>$online</b> out of $members  Members Online";

if ($gonline > 0) {
echo "<br /><b>$gonline</b>";

if ($gonline < 2) echo " Guest ";
else echo " Guests ";
echo "Online";
}
}
?>
</div>
</div>
<?php
if ($online > 0) {
echo '<div id="members_online">';
echo '<div class="header">Members Online</div>';
echo '<div class="content">';

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

$fullname = $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname'];

if ($default_image != null) echo '<div style="clear: both; margin: 0 auto; margin: 15px; text-align: center;"><a href="/user_profile.php?id=' . $users_id . '" title="View ' . $users . '\'s Profile!"><img src="uploads/' . $users . '/images/thumb/' . $default_image . '" id="defaultuserimage" alt="View ' . $fullname . '\'s Profile!" /></a></div>';
else echo '<div style="clear: both; margin: 0 auto; margin: 15px; text-align: center;"><a href="/user_profile.php?id=' . $users_id . '" title="View ' . $users . '\'s Profile!"><img src="i/mem/default.jpg" id="defaultuserimage" alt="View ' . $fullname . '\'s Profile!" /></a></div>';
}
}

echo "</div>";
echo "</div>";
}
?>
<div id="updates">
<div class="header">
HnS Updates
</div>
<div class="content">
<div><a href="/old/mc/misc/hsp/2009/p/february/changes.txt">February</a></div>
<div><a href="/old/mc/misc/hsp/2009/p/april/changes.txt">April</a></div>
<div><a href="/old/mc/misc/hsp/2009/p/may/changes.txt">May</a></div>
<div><a href="/old/mc/misc/hsp/2009/p/june/changes.txt">June</a></div>
<div><a href="/old/mc/misc/hsp/2009/p/july/changes.txt">July</a></div>
<div><a href="/old/mc/misc/hsp/2009/p/august/changes.txt">August</a></div>
<div><a href="/old/mc/misc/hsp/2009/p/september/changes.txt">September</a></div>
<div><a href="/old/mc/misc/hsp/2009/p/october/changes.txt">October</a></div>
</div>
</div>
</div>
<div style="clear : both; width : 100%; ">&nbsp;</div>
<div id="fmembers">
<div class="header">
Featured Members
</div>
<div class="content">
<div class="container">
<?php
$rorder = mt_rand(0, 3);

switch ($rorder) {
case 0: $order = "u.user_id"; break;
case 1: $order = "u.username"; break;
case 2: $order = "i.firstname"; break;
case 3: $order = "i.lastname"; break;
}

$rsort = mt_rand(0, 1);

if ($rsort == 0) $sort = "ASC";
else $sort = "DESC";

$result = mysql_query("SELECT u.user_id, u.username, i.firstname, i.middlename, i.lastname, i.default_image FROM login u JOIN info i WHERE u.user_id = i.user_id ORDER BY $order $sort");
$members = mysql_num_rows($result);

$range = 5;
$count = 0;

while ($row2 = mysql_fetch_assoc($result)) {
$fullname = $row2['firstname'] . ' ' . $row2['middlename'] . ' ' . $row2['lastname'];

if ($row2['default_image'] != null) {
if ($count < $range) {
?>
<!-- Begin <?php echo $row2['fullname']; ?>'s section -->
<?php echo '<a href="/user_profile.php?id=' . $row2['user_id'] . '" title="View ' . $row2['username'] . '\'s Profile">' . "\n"; ?>
<div class="friendsection">
<?php
if ($row2['default_image'] != null) echo '<img src="/uploads/' . $row2['username'] . '/images/thumb/' . $row2['default_image'] . '" class="friend" /><br />' . "\n";
else echo '<img src="/i/mem/default.jpg" class="friend" /><br />' . "\n";
echo "<div class='name'>" . $fullname . "</div>\n";
?>
</div>
</a>
<!-- End <?php echo $fullname; ?>'s section -->
<?php
}

$count++;
}
}
?>
<div style="clear: both; width: 100%;">&nbsp;</div>
</div>
</div>
</div>
<?php
} else { // user is not logged in
?>
<div id="homepage_header">
<div><?php echo $TEXT['homepage-content_header']; ?></div>
</div>
<div id="panels">
<div id="stats">
<div class="header">
Community Stats:
</div>
<div class="content">
<?php
if ($online == 0) {
echo "$members  Members<br />No Members Online";

if ($gonline > 0) {
echo "<br /><b>$gonline</b>";

if ($gonline < 2) echo " Guest ";
else echo " Guests ";
echo "Online";
}
} else {
echo "<b>$online</b> out of $members  Members Online";

if ($gonline > 0) {
echo "<br /><b>$gonline</b>";

if ($gonline < 2) echo " Guest ";
else echo " Guests ";
echo "Online";
}
}
?>
</div>
</div>
<?php
if ($online > 0) {
echo '<div id="members_online">';
echo '<div class="header">Members Online</div>';
echo '<div class="content">';

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

$fullname = $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname'];

if ($default_image != null) echo '<div style="clear: both; margin: 0 auto; margin: 15px; text-align: center; "><a href="/user_profile.php?id=' . $users_id . '" title="View ' . $users . '\'s Profile!"><img src="/uploads/' . $users . '/images/thumb/' . $default_image . '" id="defaultuserimage" alt="View ' . $fullname . '\'s Profile!" /></a></div>';
else echo '<div style="clear: both; margin: 0 auto; margin: 15px; text-align: center; "><a href="/user_profile.php?id=' . $users_id . '" title="View ' . $users . '\'s Profile!"><img src="/i/mem/default.jpg" id="defaultuserimage" alt="View ' . $fullname . '\'s Profile!" /></a></div>';
}
}

echo "</div>";
echo "</div>";
}
?>
<div id="updates">
<div class="header">
HnS Updates
</div>
<div class="content">
<div><a href="/old/mc/misc/hsp/2009/p/february/changes.txt">February</a></div>
<div><a href="/old/mc/misc/hsp/2009/p/april/changes.txt">April</a></div>
<div><a href="/old/mc/misc/hsp/2009/p/may/changes.txt">May</a></div>
<div><a href="/old/mc/misc/hsp/2009/p/june/changes.txt">June</a></div>
<div><a href="/old/mc/misc/hsp/2009/p/july/changes.txt">July</a></div>
<div><a href="/old/mc/misc/hsp/2009/p/august/changes.txt">August</a></div>
<div><a href="/old/mc/misc/hsp/2009/p/september/changes.txt">September</a></div>
<div><a href="/old/mc/misc/hsp/2009/p/october/changes.txt">October</a></div>
</div>
</div>
</div>
<div style="clear: both; width: 100%;">&nbsp;</div>
<div id="fmembers">
<div class="header">
Featured Members
</div>
<div class="content">
<div>
<?php
$rorder = mt_rand(0, 3);

switch ($rorder) {
case 0: $order = "u.user_id"; break;
case 1: $order = "u.username"; break;
case 2: $order = "i.firstname"; break;
case 3: $order = "i.lastname"; break;
}

$rsort = mt_rand(0, 1);

if ($rsort == 0) $sort = "ASC";
else $sort = "DESC";

$result = mysql_query("SELECT u.user_id, u.username, i.firstname, i.middlename, i.lastname, i.default_image FROM login u JOIN info i WHERE u.user_id = i.user_id ORDER BY $order $sort");
$members = mysql_num_rows($result);

$range = 5;
$count = 0;

while ($row2 = mysql_fetch_assoc($result)) {
$fullname = $row2['firstname'] . ' ' . $row2['middlename'] . ' ' . $row2['lastname'];

if ($row2['default_image'] != null) {
if ($count < $range) {
?>
<!-- Begin <?php echo $row2['fullname']; ?>'s section -->
<?php echo '<a href="/user_profile.php?id=' . $row2['user_id'] . '" title="View ' . $friend . '\'s Profile">'; ?>
<div class="friendsection">
<?php
if ($row2['default_image'] != null) echo '<img src="/uploads/' . $row2['username'] . '/images/thumb/' . $row2['default_image'] . '" class="friend" /><br />' . "\n";
else echo '<img src="/i/mem/default.jpg" class="friend" /><br />' . "\n";
echo "<div style='margin-top: 4px;'>" . $fullname . "</div>";
?>
</div>
</a>
<!-- End <?php echo $fullname; ?>'s section -->
<?php
}

$count++;
}
}
?>
<div style="clear: both; width: 100%;">&nbsp;</div>
</div>
</div>
</div>
<?php } ?>
</div>
<div style="clear: both; width: 100%;"></div>
</div>
<!-- End page content -->
<?php
include ("ft.inc.php");
include ("tracking_scripts.inc.php");
?>
</body>

</html>
<?php mysql_close($db); ?>