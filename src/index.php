<?php
include ("mobile.inc.php");
session_start();

require ("nolang.inc.php");
include ("db.member.inc.php");
include ("login.inc.php");
include ("bimage.inc.php");
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
<link rel="stylesheet" type="text/css" href="/css/global.css" media="all" />
<script type="text/javascript" src="/cs.js"></script>
<script type="text/javascript" src="/nav.js"></script>
<script type="text/javascript" src="/suggest.js"></script>
<script type="text/javascript" src="/nothing.js"></script>
<base target="_top" />
<style type="text/css">
body { 
	background: url(<?php echo $bimage; ?>) repeat; 
	background-position : 50% 140px; 
	}
</style>
<style type="text/css">
div#homepage_content { 
	margin : 0 auto; 
	width : 98%; 
	}

div#homepage_header { 
	background-color : #ebf4fb; 
	border : 1px solid #acd8f0; 
	display : block; 
	}

div#homepage_header div { 
	font-size : 40pt; 
	margin : 24px; 
	}

div#panels { 
	clear : both; 
	display : block; 
	margin-top : 10px; 
	}

div#panels div#stats { 
	background-color : #ebf4fb; 
	border : 1px solid #acd8f0; 
	clear : right; 
	display : block; 
	float : left; 
	min-height : 320px; 
	width : 40%; 
	}

div#panels div#stats div.header { 
	font-size : 30pt; 
	margin : 10px; 
	}

div#panels div#stats div.content { 
	background-color : #ebf4fb; 
	clear : both; 
	font-size : 22pt; 
	line-height : 2.2em; 
	margin : 0 auto; 
	margin : 10px; 
	}

div#panels div#members_online { 
	background-color : #ebf4fb; 
	border : 1px solid #acd8f0; 
	display : block; 
	float : left; 
	margin-left : 1%; 
	min-height : 320px; 
	text-align : center; 
	width : 27.5%;
	}

div#panels div#members_online div.header { 
	font-size : 20pt; 
	margin : 10px; 
	}

div#panels div#members_online div.content { 
	background-color : #ebf4fb; 
	clear : both; 
	margin : 0 auto; 
	margin : 10px; 
	}

div#panels div#updates { 
	background-color : #ebf4fb; 
	border : 1px solid #acd8f0; 
	clear : right; 
	display : block; 
	float : right; 
	min-height : 320px; 
	width : 30%; 
	}

div#panels div#updates div.header { 
	font-size : 26pt; 
	margin : 10px; 
	}

div#panels div#updates div.content { 
	background-color : #ebf4fb; 
	clear : both; 
	margin : 0 auto; 
	margin : 10px; 
	text-align : left; 
	width : 90%; 
	}

div#panels div#updates div.content a { 
	text-decoration : none; 
	}

div#fmembers { 
	background-color : #ebf4fb; 
	border : 1px solid #acd8f0; 
	clear : both; 
	display : block; 
	text-align : center; 
	}

div#fmembers div.header { 
	font-size : 26pt; 
	margin : 10px; 
	}

div#fmembers div.content { 
	background-color : #ebf4fb; 
	clear : both; 
	margin : 0 auto; 
	margin : 10px; 
	text-align : center; 
	}

div#fmembers div.content a { 
	text-decoration : none; 
	}

div#fmembers div.content div.container { 
	margin : 0 auto; 
	text-align : center; 
	width : 100%; 
	}

div.friendsection { 
	background-color : #ffffff; 
	border-radius : 6px; 
	-moz-border-radius : 6px; 
	-webkit-border-radius : 6px; 
	clear : right; 
	display : block; 
	float : left; 
	margin : 0 auto; 
	margin : 5px; 
	padding : 5px; 
	text-align : center; 
	width : 17.8%; 
	}

div.friendsection img.friend { 
	border-radius : 6px; 
	-moz-border-radius : 6px; 
	-webkit-border-radius : 6px; 
	border-width : 0px; 
	height : auto; 
	margin-top : 4px; 
	width : 100px; 
	}

div.friendsection div.name { 
	margin-top : 4px; 
	}
</style>
</head>

<body>
<?php
include ("hd.inc.php");
?>
<!-- Begin page content -->
<div id="home_pagecontent" class="pagecontent">
<div id="homepage_content">
<?php
// number of members online
$oresult = mysql_db_query($om, "SELECT DISTINCT username FROM users_online") or die("Database SELECT Error");
$online = mysql_num_rows($oresult);

// list of members online
$uresult = mysql_db_query($om, "SELECT DISTINCT username FROM users_online ORDER BY timestamp DESC") or die("Database SELECT Error");

// number of members
$mresult = mysql_query('SELECT user_id FROM login');
$members = mysql_num_rows($mresult);

// number of guests online
$goresult = mysql_db_query($om, "SELECT DISTINCT ip FROM guests_online") or die("Database SELECT Error");
$gonline = mysql_num_rows($goresult);

if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1) { // user is logged in
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
echo "<br />";
echo "<b>$gonline</b>";

if ($gonline < 2) {
echo " Guest ";
} else {
echo " Guests ";
}
echo "Online";
}
} else {
echo "<b>$online</b> out of $members  Members Online";

if ($gonline > 0) {
echo "<br />";
echo "<b>$gonline</b>";

if ($gonline < 2) {
echo " Guest ";
} else {
echo " Guests ";
}
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
// get user id of members online
$query = 'SELECT user_id, username FROM
login
WHERE
username = "' . $users . '"';
$result = mysql_query($query, $db) or die(mysql_error($db));

$row = mysql_fetch_array($result);
extract($row);
mysql_free_result($result);

$users_id = $row['user_id'];

$query = 'SELECT * FROM
login u
JOIN
info i
ON
u.user_id = i.user_id
WHERE
u.user_id = ' . $users_id;
$result = mysql_query($query, $db) or die(mysql_error($db));
$row = mysql_fetch_array($result);
extract($row);
mysql_free_result($result);

$fullname = $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname'];

if ($default_image != null) {
echo '<div style="clear : both; margin : 0 auto; margin : 15px; text-align : center; "><a href="/user_profile.php?id=' . $users_id . '" title="View ' . $users . '\'s Profile!"><img src="uploads/' . $users . '/images/thumb/' . $default_image . '" id="defaultuserimage" alt="View ' . $fullname . '\'s Profile!" /></a></div>';
} else {
echo '<div style="clear : both; margin : 0 auto; margin : 15px; text-align : center; "><a href="/user_profile.php?id=' . $users_id . '" title="View ' . $users . '\'s Profile!"><img src="i/mem/default.jpg" id="defaultuserimage" alt="View ' . $fullname . '\'s Profile!" /></a></div>';
}
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
case 0:
$order = "u.user_id";
break;

case 1:
$order = "u.username";
break;

case 2:
$order = "i.firstname";
break;

case 3:
$order = "i.lastname";
break;
}

$rsort = mt_rand(0, 1);

if ($rsort == 0) {
$sort = "ASC";
} else {
$sort = "DESC";
}

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
<?php
echo '<a href="/user_profile.php?id=' . $row2['user_id'] . '" title="View ' . $row2['username'] . '\'s Profile">' . "\n";
?>
<div class="friendsection">
<?php
if ($row2['default_image'] != null) {
echo '<img src="/uploads/' . $row2['username'] . '/images/thumb/' . $row2['default_image'] . '" class="friend" /><br />' . "\n";
} else {
echo '<img src="/i/mem/default.jpg" class="friend" /><br />' . "\n";
}

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
<div style="clear : both; width : 100%; ">&nbsp;</div>
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
echo "<br />";
echo "<b>$gonline</b>";

if ($gonline < 2) {
echo " Guest ";
} else {
echo " Guests ";
}
echo "Online";
}
} else {
echo "<b>$online</b> out of $members  Members Online";

if ($gonline > 0) {
echo "<br />";
echo "<b>$gonline</b>";

if ($gonline < 2) {
echo " Guest ";
} else {
echo " Guests ";
}
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
// get user id of members online
$query = 'SELECT user_id, username FROM
login
WHERE
username = "' . $users . '"';
$result = mysql_query($query, $db) or die(mysql_error($db));

$row = mysql_fetch_array($result);
extract($row);
mysql_free_result($result);

$users_id = $row['user_id'];

$query = 'SELECT * FROM
login u
JOIN
info i
ON
u.user_id = i.user_id
WHERE
u.user_id = ' . $users_id;
$result = mysql_query($query, $db) or die(mysql_error($db));
$row = mysql_fetch_array($result);
extract($row);
mysql_free_result($result);

$fullname = $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname'];

if ($default_image != null) {
echo '<div style="clear : both; margin : 0 auto; margin : 15px; text-align : center; "><a href="/user_profile.php?id=' . $users_id . '" title="View ' . $users . '\'s Profile!"><img src="/uploads/' . $users . '/images/thumb/' . $default_image . '" id="defaultuserimage" alt="View ' . $fullname . '\'s Profile!" /></a></div>';
} else {
echo '<div style="clear : both; margin : 0 auto; margin : 15px; text-align : center; "><a href="/user_profile.php?id=' . $users_id . '" title="View ' . $users . '\'s Profile!"><img src="/i/mem/default.jpg" id="defaultuserimage" alt="View ' . $fullname . '\'s Profile!" /></a></div>';
}
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
<div>
<?php
$rorder = mt_rand(0, 3);

switch ($rorder) {
case 0:
$order = "u.user_id";
break;

case 1:
$order = "u.username";
break;

case 2:
$order = "i.firstname";
break;

case 3:
$order = "i.lastname";
break;
}

$rsort = mt_rand(0, 1);

if ($rsort == 0) {
$sort = "ASC";
} else {
$sort = "DESC";
}

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
<?php
echo '<a href="/user_profile.php?id=' . $row2['user_id'] . '" title="View ' . $friend . '\'s Profile">';
?>
<div class="friendsection">
<?php
if ($row2['default_image'] != null) {
echo '<img src="/uploads/' . $row2['username'] . '/images/thumb/' . $row2['default_image'] . '" class="friend" /><br />' . "\n";
} else {
echo '<img src="/i/mem/default.jpg" class="friend" /><br />' . "\n";
}

echo "<div style='margin-top : 4px; '>" . $fullname . "</div>";
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
<div style="clear : both; width : 100%; ">&nbsp;</div>
</div>
</div>
</div>
<?php
}
?>
</div>
<div style='clear : both; width : 100%; '></div>
</div>
<!-- End page content -->
<?php
include ("ft.inc.php");
include ("tracking_scripts.inc.php");
?>
</body>

</html>
<?php
mysql_close($db);
?>