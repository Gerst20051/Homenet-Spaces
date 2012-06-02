<?php
$user_id = (isset($_GET['id'])) ? $_GET['id'] : 0;

if ($user_id == 0) {
header('location: members.php');
die();
}

session_start();

require ("lang.inc.php");
include ("db.member.inc.php");
include ("db.om.inc.php");
include ("login.inc.php");
include ("bimage.inc.php");

// check if user id is registered
$query = 'SELECT
user_id
FROM
login
WHERE
user_id = ' . $user_id;
$result = mysql_query($query, $db) or die(mysql_error());

if (mysql_num_rows($result) == 0) {
header('location: members.php');
}

$user_id = $_GET['id'];
$query = 'SELECT * FROM
login u
JOIN
info i
ON
u.user_id = i.user_id
WHERE
u.user_id = ' . $user_id;
$result = mysql_query($query, $db) or die(mysql_error($db));

$row = mysql_fetch_array($result);
extract($row);
mysql_free_result($result);

if ($privacy == 2) {
if (!isset($_SESSION['logged'])) {
$header_message = "You Need To Be Logged In To View " . $username . "'s Profile";
$footer_message = "You Need To Be Logged In To View " . $username . "'s Profile";
header('refresh: 3; url=login.php?redirect=' . $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'] . "&hurlmessage=" . urlencode($header_message) . "&furlmessage=" . urlencode($footer_message));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//<?php echo $TEXT['global-dtdlang']; ?>" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $TEXT['global-lang']; ?>" lang="<?php echo $TEXT['global-lang']; ?>" dir="<?php echo $TEXT['global-text_dir']; ?>">

<head>
<title><?php echo $TEXT['global-headertitle'] . " | " . $TEXT['homepage-headertitle']; ?></title>
<meta http-equiv="content-type" content="text/html; charset=<?php echo $TEXT['global-charset']; ?>" />
<meta name="author" content="Homenet Spaces Andrew Gerst" />
<meta name="copyright" content="© Homenet Spaces" />
<meta name="keywords" content="Homenet, Spaces, The, Place, To, Be, Creative, Andrew, Gerst, Free, Profiles, Information, Facts" />
<meta name="description" content="Welcome to Homenet Spaces | This is the place to be creative! Feel free to add yourself to our wonderful community by registering! " />
<meta name="revisit-after" content="7 days" />
<meta name="googlebot" content="index, follow, all" />
<meta name="robots" content="index, follow, all" />
<link rel="stylesheet" type="text/css" href="css/global.css" media="all" />
<script type="text/javascript" src="cs.js"></script>
<script type="text/javascript" src="nav.js"></script>
<script type="text/javascript" src="suggest.js"></script>
<style type="text/css">
body { 
	background: url(<?php echo $bimage; ?>) repeat; 
	background-position : 50% 140px; 
	}
</style>
</head>

<body>
<?php
include ("hd.inc.php");
?>
<!-- Begin page content -->
<div class="pagecontent">
<?php
echo '<form name="counter" style="margin : 0px; "><p><strong style="color : #ff3333; font-weight : bold; ">You will be redirected to the login page in
<input type="text" size="1" name="cd" style="background-color : transparent; border : 0px; color : #ff3333; font-weight : bold; width : 12px; ">
seconds.</strong></p></form>';
echo '<p>If your browser doesn\'t redirect you properly automatically, ' . '<a href="login.php?redirect=' . $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'] . '">click here</a>.</p>';
?>
</div>
<script type="text/javascript"> 
<!--
var milisec = 0;
var seconds = 4; // add 1 to absolute value
document.counter.cd.value = seconds;

function display() {
if (milisec <= 0) {
milisec = 10;
seconds -= 1;
}

if (seconds <= -1) {
milisec = 0;
seconds += 1;
} else {
milisec -= 1;
document.counter.cd.value = seconds;
setTimeout("display()", 110);
}
}

display();
//-->
</script>
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
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//<?php echo $TEXT['global-dtdlang']; ?>" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $TEXT['global-lang']; ?>" lang="<?php echo $TEXT['global-lang']; ?>" dir="<?php echo $TEXT['global-text_dir']; ?>">

<head>
<title><?php echo $username . " ( " . $first_name . " " . $last_name . " ) | " . $TEXT['global-headertitle'] . " | Song History"; ?></title>
<meta http-equiv="content-type" content="text/html; charset=<?php echo $TEXT['global-charset']; ?>" />
<meta name="author" content="Homenet Spaces Andrew Gerst" />
<meta name="copyright" content="© Homenet Spaces" />
<meta name="keywords" content="Homenet, Spaces, The, Place, To, Be, Creative, Andrew, Gerst, Free, Profiles, Information, Facts" />
<meta name="description" content="Welcome to Homenet Spaces we offer you a free profile with many cool and interesting things! This is the place to be creative!" />
<meta name="revisit-after" content="7 days" />
<meta name="googlebot" content="index, follow, all" />
<meta name="robots" content="index, follow, all" />
<link rel="stylesheet" type="text/css" href="css/global.css" media="all" />
<script type="text/javascript" src="cs.js"></script>
<script type="text/javascript" src="nav.js"></script>
<script type="text/javascript" src="suggest.js"></script>
<style type="text/css">
div#profileheader { 
	background-color : #ff9; 
	border : 2px solid #fc0; 
	border-radius : 8px; 
	border-radius-bottomleft : 0px; 
	border-radius-bottomright : 0px; 
	-moz-border-radius-topleft : 8px; 
	-webkit-border-top-left-radius : 8px; 
	-moz-border-radius-topright : 8px; 
	-webkit-border-top-right-radius : 8px; 
	display : block; 
	height : auto; 
	line-height : 110px; 
	margin : 0 auto; 
	margin-left : 20px; 
	margin-right : 20px; 
	text-align : left; 
	width : 915px; 
	}

div#profileheader .heading { 
	font-size : 40px; 
	left : 20px; 
	letter-spacing : 1px; 
	position : relative; 
	}

div#rightpanel { 
	float : right; 
	margin-right : 20px; 
	width : 45%; 
	}

div#rightpanel div#profilepic { 
	position : relative; 
	right : -90px; 
	top : -85px;
	}

div#songhistory { 
	background-color : #ffffff; 
	margin-left : 20px; 
	margin-right : 20px; 
	padding : 10px; 
	text-align : left; 
	}
</style>
<style type="text/css">
body { 
	background: url(<?php echo $bimage; ?>) repeat; 
	background-position : 50% 140px; 
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

<body id="usersonghistory_body">
<?php
include ("hd.inc.php");
?>
<!-- Begin page content -->
<div id="usersonghistory_pagecontent" class="pagecontent">
<div id="profileheader">
<div class="heading">
Song History
</div>
</div>
<!-- Begin right panel -->
<div id="rightpanel">
<!-- Begin profile pic -->
<div id="profilepic">
<?php
if ($row['default_image'] != null) {
echo '<a href="user_pictures.php?id=' . $user_id . '"><img src="uploads/' . $row['username'] . '/images/thumb/' . $row['default_image'] . '" id="defaultuserimage" title="View ' . $first_name . ' ' . $last_name . '\'s Picture Gallery" /></a><br />' . "\n";
} else {
echo '<img src="i/mem/default.jpg" id="defaultuserimage" /><br />' . "\n";
}
?>
</div>
<!-- End profile pic -->
</div>
<!-- End right panel -->
<div style="clear : both; width : 100%; ">&nbsp;</div>
<!-- Begin song history -->
<div id="songhistory">
<?php
$songs = explode(", ", $profile_song_history);
$numsongs = count($songs);

for ($i = 0; $i < $numsongs; $i++) {
echo '<a href="media/mp/' . $songs[$i] . '">' . $songs[$i] . '</a>';
echo "<br />";
}
?>
</div>
<!-- End song history -->
<div style="clear : both; width : 100%; ">&nbsp;</div>
</div>
<!-- End page content -->
<?php
include ("ft.inc.php");
include ("tracking_scripts.inc.php");
?>
</body>

</html>