<?php
$user_id = (isset($_GET['id'])) ? $_GET['id'] : 0;
if ($user_id == 0) { header('location: members.php'); die(); }

session_start();
require ("lang.inc.php");
include ("db.member.inc.php");
include ("db.om.inc.php");
include ("login.inc.php");

$query = 'SELECT user_id FROM login WHERE user_id = ' . $user_id;
$result = mysql_query($query, $db) or die(mysql_error());

if (mysql_num_rows($result) == 0) header('location: members.php');

if (isset($_GET['rating'])) {
$vote = $_GET['rating'];
$user_id = $_GET['id'];

$query = 'SELECT user_id, rating, xratings, voters FROM info WHERE user_id = ' . $user_id;
$result = mysql_query($query, $db) or die(mysql_error());
$row = mysql_fetch_array($result);
extract($row);
mysql_free_result($result);

$avgvote = ($rating * $xratings);
$totalrating = ($avgvote + $vote);
$xratings = ($xratings + 1);
$newrating = ($totalrating / $xratings);

if ($voters == null) {
if ($_SESSION['username'] == null) $voters = "guest";
else $voters = $_SESSION['username'];
} else {
if ($_SESSION['username'] == null) $voters = $voters . ", guest";
else $voters = $voters . ", " . $_SESSION['username'];
}

if (($vote < 0) || ($vote > 100)) {
$header_error = "Security Violation, Admin has been alerted.";
$footer_error = "Security Violation, Admin has been alerted.";
} else {
$query = 'UPDATE info SET
rating = "' . mysql_real_escape_string($newrating, $db) . '",
xratings = "' . mysql_real_escape_string($xratings, $db) . '",
voters = "' . mysql_real_escape_string($voters, $db) . '"
WHERE
user_id = ' . $user_id . '
LIMIT 1';
mysql_query($query, $db) or die(mysql_error());

$rating_message = "You Voted " . $vote . "%";
}
}

$user_id = $_GET['id'];
$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id WHERE u.user_id = ' . $user_id;
$result = mysql_query($query, $db) or die(mysql_error($db));
$row = mysql_fetch_array($result);
extract($row);
mysql_free_result($result);

$fullname = $row['firstname'] . " " . $row['middlename'] . " " . $row['lastname'];

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
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="javascript.php"></script>
</head>

<body>
<?php include ("hd.inc.php"); ?>
<!-- Begin page content -->
<div class="pagecontent">
<?php
echo '<form name="counter" style="margin: 0;"><p><strong style="color: #f33; font-weight: bold;">You will be redirected to the login page in
<input type="text" size="1" name="cd" style="background-color: transparent; border: 0; color: #f33; font-weight: bold; width: 12px;">
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

if (isset($_GET['action']) && ($_GET['action'] == "message")) include ("user_message.inc.php");
elseif (isset($_GET['action']) && ($_GET['action'] == "comment")) include ("user_comment.inc.php");
elseif (isset($_GET['action']) && ($_GET['action'] == "allcomments")) include ("user_allcomments.inc.php");
elseif (isset($_GET['action']) && ($_GET['action'] == "befriend")) include ("user_befriend.inc.php");
elseif (isset($_GET['action']) && ($_GET['action'] == "allfriends")) include ("user_allfriends.inc.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//<?php echo $TEXT['global-dtdlang']; ?>" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $TEXT['global-lang']; ?>" lang="<?php echo $TEXT['global-lang']; ?>" dir="<?php echo $TEXT['global-text_dir']; ?>">

<head>
<title><?php echo $username . " ( " . $firstname . " " . $lastname . " ) | " . $TEXT['global-headertitle']; ?></title>
<meta http-equiv="content-type" content="text/html; charset=<?php echo $TEXT['global-charset']; ?>" />
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="javascript.php"></script>
<style type="text/css">
#star { 
margin : 0 auto; 
padding-top : 5px; 
width : 125px; 
}

#star ul.star { 
background : url('i/sy/st/stars.gif') repeat-x; 
cursor : pointer; 
float : left; 
height : 20px; 
left : 0px; 
list-style-type : none; 
margin : 0px; 
padding : 0px; 
position : relative; 
top : -5px; 
width : 85px; 
}

#star li { 
display : block; 
float : left; 
height : 20px; 
left : 0px; 
margin : 0px; 
padding : 0px; 
position : absolute; 
text-decoration : none; 
text-indent : -9000px; 
width : 85px; 
z-index : 120; 
}

#star li.curr { 
background : url('i/sy/st/stars.gif') left 25px; 
font-size : 1px; 
}

#star div.user { 
color: rgb(136, 136, 136); 
float : left; 
font-family : arial; 
font-size : 13px; 
left : 15px; 
position : relative; 
width : 20px; 
}

#star div.starvotes { 
clear : both; 
color: rgb(136, 136, 136); 
padding-bottom : 2px; 
text-align : center; 
}

#star div.starvotes a { 
color: rgb(136, 136, 136); 
text-decoration : none; 
}
</style>
<script type="text/javascript"> 
function $(v,o) {
return((typeof(o) == 'object' ? o : document).getElementById(v));
}
 
function $S(o) {
return((typeof(o) == 'object' ? o : $(o)).style);
}
 
function agent(v) {
return(Math.max(navigator.userAgent.toLowerCase().indexOf(v),0));
}
 
function abPos(o) {
var o = (typeof(o) == 'object' ? o : $(o)),
z = {
X : 0,
Y : 0
};
 
while (o != null) {
z.X += o.offsetLeft;
z.Y += o.offsetTop;
o = o.offsetParent;
};
return(z);
}
 
function XY(e,v) {
var o = agent('msie') ? {
'X' : event.clientX + document.body.scrollLeft,
'Y' : event.clientY + document.body.scrollTop
} : {
'X' : e.pageX,
'Y' : e.pageY
};
return(v ? o[v] : o);
}
 
star = {};

star.mouse = function(e,o) {
if (star.stop || isNaN(star.stop)) {
star.stop = 0;

document.onmousemove = function(e) {
var n = star.num;
var p = abPos($('star' + n)),
x = XY(e),
oX = x.X - p.X,
oY = x.Y - p.Y;
star.num = o.id.substr(4);

if (oX < 1 || oX > 84 || oY < 0 || oY > 19) {
star.stop = 1;
star.revert();
} else {
$S('starCur' + n).width = oX + 'px';
$S('starUser' + n).color = '#111';
$('starUser' + n).innerHTML = Math.round((oX / 84) * 100) + '%';
}
};
}
};
 
star.update = function(e,o) {
var n = star.num,
v = parseInt($('starUser' + n).innerHTML);
 
n = o.id.substr(4);
$('starCur' + n).title = v;
 
var w = "<?php echo $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING']; ?>&rating=" + v;
 
window.location = w;
};
 
star.revert = function() {
var n = star.num,
v = parseInt($('starCur' + n).title);
 
$S('starCur' + n).width = Math.round((v * 84) / 100) + 'px';
$('starUser' + n).innerHTML = (v > 0 ? Math.round(v) + '%' : '');
$('starUser' + n).style.color = '#888';
 
document.onmousemove = '';
};
 
star.num = 0;
</script>
<style type="text/css">
div#leftpanel { 
float : left; 
margin-left : 20px; 
width : 47%; 
}

div#rightpanel { 
float : right; 
margin-right : 20px; 
width : 47%; 
z-index : 900; 
}

div#rightpanel div#profilepic { 
position : relative; 
right : -98px; 
top : -85px;
}

div#rightpanel div.profilepicinfo { 
background-color : #ff9; 
border : 2px solid #fc0; 
border-radius-bottomleft : 8px; 
border-radius-bottomright : 8px; 
-moz-border-radius-bottomleft : 8px; 
-webkit-border-bottom-left-radius : 8px; 
-moz-border-radius-bottomright : 8px; 
-webkit-border-bottom-right-radius : 8px; 
display : block; 
height : auto; 
margin : 0 auto; 
margin-top : 15px; 
padding : 6px; 
text-align : left; 
width : 176px; 
}

div#rightpanel div.profilepicinfo div.sam { 
padding : 5px; 
}

div#rightpanel div.profilepicmusic { 
background-color : #ff9; 
border : 2px solid #fc0; 
border-radius : 8px; 
-moz-border-radius : 8px; 
-webkit-border-radius : 8px; 
display : block; 
height : auto; 
margin : 0 auto; 
margin-top : 15px; 
padding : 6px; 
text-align : center; 
width : 176px; 
}

div#rightpanel div.profilepicmusic div.heading { 
font-size : 18px; 
}

div#leftpanel div.profilelinks { 
background-color : #ff9; 
border : 2px solid #fc0; 
border-radius : 8px; 
border-radius-topleft : 0px; 
border-radius-bottomright : 0px; 
-moz-border-radius-bottomleft : 8px; 
-webkit-border-bottom-left-radius : 8px; 
-moz-border-radius-topright : 8px; 
-webkit-border-top-right-radius : 8px; 
display : inline; 
float : left; 
height : auto; 
line-height : 50px; 
margin : 0 auto; 
margin-top : 15px; 
text-align : center; 
width : 440px; 
}

div#leftpanel div.profileawaymessage { 
background-color : #ff9; 
border : 2px solid #fc0; 
border-radius : 8px; 
border-radius-topleft : 0px; 
border-radius-bottomright : 0px; 
-moz-border-radius-bottomleft : 8px; 
-webkit-border-bottom-left-radius : 8px; 
-moz-border-radius-topright : 8px; 
-webkit-border-top-right-radius : 8px; 
display : inline; 
float : left; 
height : auto; 
margin : 0 auto; 
margin-top : 15px; 
text-align : center; 
width : 440px; 
}

div#leftpanel div.profileawaymessage div.heading { 
color : #ff0000; 
font-size : 16pt; 
letter-spacing : 1px; 
padding-top : 8px; 
text-align : center; 
width : 100%; 
}

div#leftpanel div.profileawaymessage div.content { 
letter-spacing : 1px; 
padding : 20px; 
}

div#leftpanel div.profileinfo { 
background-color : #ff9; 
border : 2px solid #fc0; 
border-radius : 8px; 
border-radius-topright : 0px; 
-moz-border-radius-bottomleft : 8px; 
-webkit-border-bottom-left-radius : 8px; 
-moz-border-radius-bottomright : 8px; 
-webkit-border-bottom-right-radius : 8px; 
-moz-border-radius-topleft : 8px; 
-webkit-border-top-left-radius : 8px; 
clear : both; 
display : block; 
float : left; 
height : auto; 
margin : 0 auto; 
margin-top : 15px; 
text-align : left; 
width : 440px; 
}

div#leftpanel div.profileinfo div.heading { 
font-size : 16pt; 
padding-top : 8px; 
text-align : center; 
width : 100%; 
}

div#leftpanel div.profileinfo div.content { 
margin : 18px; 
}

div#leftpanel div.profilestats { 
background-color : #ff9; 
border : 2px solid #fc0; 
border-radius : 8px; 
-moz-border-radius-bottomleft : 8px; 
-webkit-border-bottom-left-radius : 8px; 
-moz-border-radius-bottomright : 8px; 
-webkit-border-bottom-right-radius : 8px; 
-moz-border-radius-topleft : 8px; 
-webkit-border-top-left-radius : 8px; 
-moz-border-radius-topright : 8px; 
-webkit-border-top-right-radius : 8px; 
clear : both; 
display : block; 
float : left; 
height : auto; 
margin : 0 auto; 
margin-top : 15px; 
text-align : left; 
width : 440px; 
}

div#leftpanel div.profilestats div.heading { 
font-size : 16pt; 
padding-top : 8px; 
text-align : center; 
width : 100%; 
}

div#leftpanel div.profilestats div.content { 
margin : 18px; 
}

div#leftpanel div.profiledetails { 
background-color : #ff9; 
border : 2px solid #fc0; 
border-radius : 8px; 
-moz-border-radius-bottomleft : 8px; 
-webkit-border-bottom-left-radius : 8px; 
-moz-border-radius-bottomright : 8px; 
-webkit-border-bottom-right-radius : 8px; 
-moz-border-radius-topleft : 8px; 
-webkit-border-top-left-radius : 8px; 
-moz-border-radius-topright : 8px; 
-webkit-border-top-right-radius : 8px; 
clear : both; 
display : block; 
float : left; 
height : auto; 
margin : 0 auto; 
margin-top : 15px; 
text-align : left; 
width : 440px; 
}

div#leftpanel div.profiledetails div.heading { 
font-size : 16pt; 
padding-top : 8px; 
text-align : center; 
width : 100%; 
}

div#leftpanel div.profiledetails div.content { 
margin : 18px; 
}

div#friends { 
background-color : #ff9; 
border : 2px solid #fc0; 
border-radius : 8px; 
-moz-border-radius-bottomleft : 8px; 
-webkit-border-bottom-left-radius : 8px; 
-moz-border-radius-bottomright : 8px; 
-webkit-border-bottom-right-radius : 8px; 
-moz-border-radius-topleft : 8px; 
-webkit-border-top-left-radius : 8px; 
-moz-border-radius-topright : 8px; 
-webkit-border-top-right-radius : 8px; 
margin : 0 auto; 
margin-top : 15px; 
}

div#friends a { 
text-decoration : none; 
}

div#friends div.header { 
padding : 10px; 
}

div#friends div.header span.heading { 
float : left; 
font-size : 18px; 
}

div#friends div.header span.link { 
float : right; 
}

div#friends div.content { 
padding : 10px; 
}

div#friends div.footer { 
padding : 10px; 
}

div#friends div.footer span.toplink { 
float : left; 
}

div#friends div.footer span.link { 
float : right; 
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
width : 120px; 
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

div#comments { 
background-color : #ff9; 
border : 2px solid #fc0; 
border-radius : 8px; 
-moz-border-radius-bottomleft : 8px; 
-webkit-border-bottom-left-radius : 8px; 
-moz-border-radius-bottomright : 8px; 
-webkit-border-bottom-right-radius : 8px; 
-moz-border-radius-topleft : 8px; 
-webkit-border-top-left-radius : 8px; 
-moz-border-radius-topright : 8px; 
-webkit-border-top-right-radius : 8px; 
clear : both; 
margin : 0 auto; 
margin-left : 20px; 
margin-right : 20px; 
}

div#comments a { 
text-decoration : none; 
}

div#comments div.header { 
padding : 10px; 
}

div#comments div.header span.heading { 
float : left; 
font-size : 18px; 
}

div#comments div.header span.link { 
float : right; 
}

div#comments div.content { 
padding : 10px; 
}

div#comments div.commentcontainer { 
background-color : #ff9; 
border : 1px solid #fc0; 
border-radius : 8px; 
-moz-border-radius : 8px; 
-webkit-border-radius : 8px; 
display : block; 
height : auto; 
margin : 0 auto; 
}

div#comments div.footer { 
padding : 10px; 
}

div#comments div.footer span.toplink { 
float : left; 
}

div#comments div.footer span.link { 
float : right; 
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

<body id="userprofile_body">
<?php include ("hd.inc.php"); ?>
<!-- Begin page content -->
<div id="userprofile_pagecontent" class="pagecontent">
<?php
if ($privacy_profile_view == 1) {
include ("user_profile_lite.inc.php");
} else {
if ($_SESSION['pref_upview'] == 1) {
include ("user_profile_lite.inc.php");
} else {
?>
<div id="pageheader" class="pageheader2"><div class="heading">
<?php echo $fullname; ?>
<?php
$uresult = mysql_db_query($om, "SELECT DISTINCT username FROM users_online ORDER BY username ASC") or die("Database SELECT Error");

while ($onlineusers = mysql_fetch_array($uresult, MYSQL_ASSOC)) {
foreach ($onlineusers as $users) { if ($row['username'] == $users) echo " is Online!"; }
}
?>
</div></div>
<!-- Begin right panel -->
<div id="rightpanel">
<!-- Begin profile pic -->
<div id="profilepic">
<?php
if ($row['default_image'] != null) echo '<a href="user_pictures.php?id=' . $user_id . '"><img src="/uploads/' . $row['username'] . '/images/thumb/' . $row['default_image'] . '" id="defaultuserimage" title="View ' . $firstname . ' ' . $lastname . '\'s Picture Gallery" /></a><br />' . "\n";
else echo '<img src="i/mem/default.jpg" id="defaultuserimage" /><br />' . "\n";
?>
<div class="profilepicinfo">
<div class="sam">
<div title="<?php echo $status; ?>">
Status:
<?php
$chars = strlen($status);
preg_match_all('/[A-Z]/', $status, $your_match);
$upper_case_count = count($your_match[0]);
$dots = "&hellip;";

if ($chars >= 13) {
if ($upper_case_count == 0 || 1) {
echo split_hjms_chars($status, 11, $dots);
} else {
if ($upper_case_count >= 8) echo split_hjms_chars($status, 8, $dots);
elseif ($upper_case_count == 7) echo split_hjms_chars($status, 8, $dots);
elseif ($upper_case_count == 6) echo split_hjms_chars($status, 9, $dots);
elseif ($upper_case_count == 5) echo split_hjms_chars($status, 10, $dots);
elseif ($upper_case_count == 4) echo split_hjms_chars($status, 10, $dots);
elseif ($upper_case_count == 3) echo split_hjms_chars($status, 10, $dots);
elseif ($upper_case_count == 2) echo split_hjms_chars($status, 10, $dots);
}
} else { // l2 or less characters
if ($upper_case_count <= 3) {
echo $status;
} else {
if ($upper_case_count == 4) echo split_hjms_chars($status, 10, $dots);
elseif ($upper_case_count == 5) echo split_hjms_chars($status, 10, $dots);
elseif ($upper_case_count == 6) echo split_hjms_chars($status, 10, $dots);
elseif ($upper_case_count == 7) echo split_hjms_chars($status, 10, $dots);
elseif ($upper_case_count == 8) echo split_hjms_chars($status, 9, $dots);
elseif ($upper_case_count == 9) echo split_hjms_chars($status, 9, $dots);
elseif ($upper_case_count == 10) echo split_hjms_chars($status, 9, $dots);
elseif ($upper_case_count == 11) echo split_hjms_chars($status, 9, $dots);
elseif ($upper_case_count == 12) echo split_hjms_chars($status, 9, $dots);
}
}
?>
</div>
<div title="<?php echo $mood; ?>">
Mood:
<?php
$chars = strlen($mood);
preg_match_all('/[A-Z]/', $mood, $your_match);
$upper_case_count = count($your_match[0]);
$dots = "&hellip;";

if ($chars >= 13) {
if ($upper_case_count == 0 || 1) {
echo split_hjms_chars($mood, 11, $dots);
} else {
if ($upper_case_count >= 8) echo split_hjms_chars($mood, 8, $dots);
elseif ($upper_case_count == 7) echo split_hjms_chars($mood, 8, $dots);
elseif ($upper_case_count == 6) echo split_hjms_chars($mood, 9, $dots);
elseif ($upper_case_count == 5) echo split_hjms_chars($mood, 10, $dots);
elseif ($upper_case_count == 4) echo split_hjms_chars($mood, 10, $dots);
elseif ($upper_case_count == 3) echo split_hjms_chars($mood, 10, $dots);
elseif ($upper_case_count == 2) echo split_hjms_chars($mood, 10, $dots);
}
} else { // l2 or less characters
if ($upper_case_count <= 3) {
echo $mood;
} else {
if ($upper_case_count == 4) echo split_hjms_chars($mood, 10, $dots);
elseif ($upper_case_count == 5) echo split_hjms_chars($mood, 10, $dots);
elseif ($upper_case_count == 6) echo split_hjms_chars($mood, 10, $dots);
elseif ($upper_case_count == 7) echo split_hjms_chars($mood, 10, $dots);
elseif ($upper_case_count == 8) echo split_hjms_chars($mood, 9, $dots);
elseif ($upper_case_count == 9) echo split_hjms_chars($mood, 9, $dots);
elseif ($upper_case_count == 10) echo split_hjms_chars($mood, 9, $dots);
elseif ($upper_case_count == 11) echo split_hjms_chars($mood, 9, $dots);
elseif ($upper_case_count == 12) echo split_hjms_chars($mood, 9, $dots);
}
}
?>
</div>
</div>
<div id="star">
<ul id="star" class="star" onmousedown="star.update(event,this)" onmousemove="star.mouse(event,this)" title="Rate <?php echo $firstname . " " . $lastname . "!"; ?>">
<li id="starCur" class="curr" title="<?php echo ($rating); ?>"<?php
echo ' style="width: ';
$width = round((($rating) * 84) / 100);
echo $width;
echo 'px;">';
?></li>
</ul>
<div id="starUser" class="user"><?php echo ($rating); ?>%</div>
<div class="starvotes">
<small><a href="#" title="See Who Voted!" onclick="showMe2('voters')">
<?php
$votes = ($xratings > 0) ? $xratings : 'No';
$vtense = ($xratings == 0 || $xratings > 1) ? ' Votes' : ' Vote';
echo "$votes$vtense</a></small>";

if (isset($_GET['rating'])) {
if (($vote < 0) || ($vote > 100)) {
} else {
echo " & ";
echo "<small>";
echo $rating_message;
echo "</small>";
}
}
?>
</div>
</div>
<!-- Begin voters -->
<div id="voters" style="visibility: hidden; display: block;">
<span class="closespan">
<span class="header">
<?php
if ($voters == null) {
echo "0 Voters";
} else {
$numvoters = str_word_count($voters, null, '.0..9');
if ($numvoters == 1) echo "1 Voter";
else echo "$numvoters Voters";
}
?>
</span>
<a title="Close" accesskey="8" onclick="showMe5('voters')" class="close">Close</a>
</span>
<div class="splash">
<span>
<?php
if ($voters == null) echo "No Voters Are Registered";
else echo $voters;
?>
</span>
</div>
</div>
<!-- End voters -->
</div>
<?php
if ($profile_song_artist && $profile_song_name != null) {
/*
$profile_song_letter = substr($profile_song_artist, 1, 1);

if (is_numeric($profile_song_letter)) {
$profile_song_letter = "#";
}
*/
?>
<div class="profilepicmusic">
<div style="padding: 5px;">
<div class="heading">
Music Panel
</div>
<!-- Begin user profile song -->
<div style="padding: 8px;">
<embed src="media/mp/<?php echo $profile_song_artist . " - " . $profile_song_name; ?>" autostart="<?php
if (isset($_SESSION['logged']) && ($_SESSION['pref_song_astart'] == 1)) {
if ($_SESSION['username'] == $username) {
if ($_SESSION['pref_psong_astart'] == 0) echo "false";
else echo "true";
} else {
echo "false";
}
} else {
if ($profile_song_astart == 1) echo "true";
else echo "false";
} ?>" loop="2" playcount="2" controls="smallconsole" volume="50" style="height : 16px; width : 150px; " />
<noembed>
<bgsound src="media/mp/<?php echo $profile_song_artist . " - " . $profile_song_name; ?>" loop="2" />
</noembed>
</div>
<!-- End user profile song -->
<div style="text-align: left;">
Artist: <?php echo $profile_song_artist; ?>
</div>
<div style="text-align: left;">
Song:
<?php
$nameArray = split("[/\\.]", $profile_song_name);
$p = count($nameArray);
for ($i = 0; $i < ($p - 1); $i++) $psongname .= $nameArray[$i];
echo $psongname;
?>
</div>
</div>
</div>
<?php
}
?>
</div>
<!-- End profile pic -->
<!-- Begin friends -->
<a name="friends"></a>
<div id="friends">
<?php
if ($row['username'] == "Admin") {
$result = mysql_query('SELECT user_id FROM login WHERE user_id != 2');
$members = mysql_num_rows($result);

$rorder = mt_rand(0, 3);

switch ($rorder) {
case 0: $order = "user_id"; break;
case 1: $order = "username"; break;
case 2: $order = "firstname"; break;
case 3: $order = "lastname"; break;
}

$rsort = mt_rand(0, 1);

if ($rsort == 0) $sort = "ASC";
else $sort = "DESC";

$range = 18;
$limit1 = mt_rand(0, ($members - $range));
$count = 0;

$query = "SELECT u.user_id, username, firstname, lastname, default_image FROM login u JOIN info i ON u.user_id = i.user_id WHERE u.user_id != 2 ORDER BY $order $sort LIMIT $limit1, $range";
$result = mysql_query($query, $db) or die(mysql_error($db));

while ($row2 = mysql_fetch_array($result)) {
if ($count > 0) $friends .= ", " . $row2['username'];
else $friends = $row2['username'];

$count++;
}
}

if ($friends == null) {
$friends = "Admin";
$numfriends = 1;
} else {
if ($row['username'] != "Admin") $friends = "Admin, " . $friends;
if ($row['username'] != "Admin") $numfriends = count(explode(", ", $friends));
else $numfriends = $members;
}

$friends = explode(", ", $friends);
?>
<div class="header">
<span class="heading">Friends ( <?php echo $numfriends; ?> )</span>
<span class="link"><a href="user_profile.php?id=<?php echo $user_id . "&action=allfriends"; ?>">View All Friends</a><?php if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1) { ?> | <a href="<?php echo $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'] . "&action=befriend"; ?>">Befriend</a><?php } ?></span>
</div>
<br />
<div class="content">
<?php
$fcount = 1;

if ($numfriends > 0) {
foreach ($friends as $friend) {
$query2 = "SELECT u.user_id, u.username, i.firstname, i.lastname, i.default_image FROM login u JOIN info i ON u.user_id = i.user_id WHERE u.username = '" . $friend . "'";
$result2 = mysql_query($query2, $db) or die(mysql_error($db));
$row2 = mysql_fetch_array($result2);
$fullname = $row2['firstname'] . " " . $row2['middlename'] . " " . $row2['lastname'];
?>
<!-- Begin <?php echo $fullname; ?>'s section -->
<?php
echo '<a href="user_profile.php?id=' . $row2['user_id'] . '" title="View ' . $friend . '\'s Profile">' . "\n";
?>
<div class="friendsection">
<?php
if ($row2['default_image'] != null) echo '<img src="/uploads/' . $row2['username'] . '/images/thumb/' . $row2['default_image'] . '" class="friend" /><br />' . "\n";
else echo '<img src="i/mem/default.jpg" class="friend" /><br />' . "\n";
echo "<div class='name'>" . $row2['firstname'] . " " . $row2['lastname'] . "</div>\n";
?>
</div>
</a>
<!-- End <?php echo $row2['firstname'] . " " . $row2['lastname']; ?>'s section -->
<?php
$break = "<div style='clear: both; width: 100%;'> </div>\n";

if ($fcount == 3) echo $break;
elseif ($fcount == 6) echo $break;
elseif ($fcount == 9) echo $break;
elseif ($fcount == 12) echo $break;
elseif ($fcount == 15) echo $break;

$fcount++;
}

echo $break;
}
?>
</div>
<div class="footer">
<span class="toplink"><a href="#friends">&uarr; Top of Friends</a></span>
<span class="link"><a href="user_profile.php?id=<?php echo $user_id . "&action=allfriends"; ?>">View All Friends</a></span>
</div>
<br />
</div>
<!-- End friends -->
</div>
<!-- End right panel -->
<!-- Begin left panel -->
<div id="leftpanel">
<div class="profilelinks">
<a href="view_files.php?id=<?php echo $user_id; ?>">View <?php echo $firstname; ?>'s Files!</a> | <a href="view_files.php?id=<?php echo $user_id; ?>">Shared Files!</a> | <a href="upload_send.php?id=<?php echo $user_id; ?>">Send <?php echo $firstname; ?> Files!</a>
</div>
<?php
if ($away_message != null) {
echo '<div class="profileawaymessage">';
echo '<div class="heading">';
echo 'This User Has Set An Away Message';
echo '</div>';
echo '<div class="content">';
echo $away_message;
echo '</div>';
echo '</div>';
}
?>
<div class="profileinfo">
<div class="heading">
<?php echo $row['username'] . "'s Profile "; ?>
</div>
<div class="content">
<div>Gender: <?php echo $gender; ?></div>
<div>Age: <?php
function determine_age($birth_date) {
$birth_date_time = strtotime($birth_date);
$to_date = date('m/d/Y', $birth_date_time);

list ($birth_month, $birth_day, $birth_year) = explode('/', $to_date);

$now = time();
$current_month = date("n");
$current_day = date("d");
$current_year = date("Y");

$this_year_birth_date = $birth_month . '/' . $birth_day . '/' . $current_year;
$this_year_birth_date_timestamp = strtotime($this_year_birth_date);

$years_old = ($current_year - $birth_year);

if ($now < $this_year_birth_date_timestamp) {
$years_old = ($years_old - 1);
}

return $years_old;
}

$birth_date = $birth_month . "/" . $birth_day . "/" . $birth_year;
$age = determine_age($birth_date);
$current_month = date("n");
$current_day = date("d");
$current_year = date("Y");

if ($age == 0) {
if ($current_month < $birth_month) {
$month_diff = (12 - $birth_month);
$age = ($month_diff + $current_month);
echo $age . " Months";
} else {
$age = ($current_month - $birth_month);
echo $age . " Months";
}
} else {
echo $age;
}

if ($privacy_birthdate == 1) {
echo " / Birthdate: ";
echo $birth_date;
}

if ($birth_month == $current_month && $birth_day == $current_day) echo " / Happy Birthday!";
?></div>
<div>Hometown: <?php echo $hometown; ?></div>
<div>Community: <?php echo $community; ?></div>
<div>Email Address: <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></div>
<div>Website: <a href="<?php echo $website; ?>" target="_blank"><?php echo $website; ?></a></div>
</div>
</div>
<div class="profilestats">
<div class="heading">
Profile Stats
</div>
<div class="content">
<div>xRank:
<?php
if ($website != null) $ifexists_website = 1000;
if ($user_style != null) $ifexists_user_style = 1000;
if ($default_image != null) $ifexists_defualt_image = 1000;

$xrank = ($rank + ($hits * 2) + ($logins * 5) + ($ifexists_website) + ($ifexists_user_style) + ($ifexists_default_image));

if ($logins > 5) {
if ($logins > 100) { $xrank = ($xrank * 5);
if ($logins > 200) { $xrank = ($xrank * 10);
if ($logins > 300) { $xrank = ($xrank * 15);
if ($logins > 400) { $xrank = ($xrank * 20);
if ($logins > 500) { $xrank = ($xrank * 25);
}}}}}
$xrank = ($xrank * 1.0586951);
}
elseif ($logins == 4) $xrank = ($xrank / 2.2452);
elseif ($logins == 3) $xrank = ($xrank / 3.1385);
elseif ($logins == 2) $xrank = ($xrank / 4.3698);
elseif ($logins == 1) $xrank = 0;
else $xrank = 0;

echo " $xrank ";
?>
</div>
<div>Profile Views: 
<?php
$hits++;

$query = 'UPDATE info SET hits = ' . $hits . ' WHERE user_id = ' . $user_id;
mysql_query($query, $db) or die(mysql_error());

echo $hits;
?>
</div>
<div>Logged On
<?php
echo " $logins ";

if ($logins > 1) echo "Times";
elseif ($logins == 1) echo "Time";
else echo "Times & Was Hacked :P";
?>
</div>
<div>Last Login: <?php echo $last_login; ?></div>
<div>Date Joined: <?php echo $date_joined; ?></div>
</div>
<div style="padding-bottom: 10px; text-align: center;">
<a href="http://www.facebook.com/share.php?u=http://hnsdesktop.tk/<?php echo $row['username']; ?>" target="_blank">Share profile on Facebook</a>
<br />
<a href="http://www.twitter.com/home?status=View+my+Homenet+Spaces+profile.+Check+it+out!+http://hnsdesktop.tk/<?php echo $row['username']; ?>" target="_blank">Share profile on Twitter</a>
</div>
</div>
<div class="profiledetails">
<div class="heading">
Profile Details
</div>
<div class="content">
<div>Hobbies / Interests: <?php echo $hobbies; ?></div>
<br />
<div>About Me: <?php echo $about_me; ?></div>
</div>
</div>
</div>
<!-- End left panel -->
<div style="clear: both; width: 100%;">&nbsp;</div>
<!-- Begin comments -->
<a name="comments"></a>
<div id="comments">
<?php
$query = 'SELECT * FROM ' . mysql_real_escape_string($row['username'], $comment_db) . ' WHERE type = 0 ORDER BY date DESC';
$result = mysql_query($query, $comment_db) or die(mysql_error($comment_db));
$num_comments = mysql_num_rows($result);
?>
<div class="header">
<span class="heading">Comments ( <?php echo $num_comments; ?> )</span>
<span class="link"><a href="user_profile.php?id=<?php echo $user_id . "&action=allcomments"; ?>">View All Comments</a><?php if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1) { ?> | <a href="<?php echo $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'] . "&action=comment"; ?>">Add A Comment</a><?php } ?></span>
</div>
<br />
<div class="content">
<?php
$ccount = 0;

while ($row2 = mysql_fetch_assoc($result)) {
$query3 = 'SELECT firstname, middlename, lastname, default_image FROM info WHERE user_id = "' . $row2['user_id'] . '"';
$result3 = mysql_query($query3, $db) or die(mysql_error($db));
$row3 = mysql_fetch_array($result3);
extract($row3);
mysql_free_result($result3);

$fullname = $row3['firstname'] . ' ' . $row3['middlename'] . ' ' . $row3['lastname'];

if ($ccount > 0) echo "<br />\n";
?>
<div class="commentcontainer">
<div style="diplay: block;">
<div style="float: left; text-align: left; padding: 10px; width: 45%;">
<?php echo '<a href="user_profile.php?id=' . $row2['user_id'] . '">' . $row2['user'] . '</a>'; ?>
</div>
<div style="clear: right; float: right; text-align: right; padding: 10px; width: 45%;">
<?php
if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1) {
if ($row['username'] == $_SESSION['username']) {
if ($row2['status'] == 0) {
echo '<span style="color: #f00; font-weight: bold;">New!</span> | ';
}
}
}

echo $row2['date'];
?>
</div>
</div>
<div style="background-color: #fff; clear: both; display: block; margin: 0 auto; margin-left: 10px; margin-right: 10px; min-height: 50px; padding: 10px; padding-bottom: 16px; text-align: left;">
<div style="display: block; text-align: center; width: 10%;">
<?php
if ($row3['default_image'] != null) echo '<img src="/uploads/' . $row2['user'] . '/images/thumb/' . $row3['default_image'] . '" id="defaultuserimage" title="' . $fullname . '" style="float: left; height: 50px; margin-right: 10px; margin-top: 4px; width: 50px;" />' . "\n";
else echo '<img src="i/mem/default.jpg" alt="" id="defaultuserimage" style="float: left; height: 50px; margin-right: 10px; margin-top: 4px; width: 50px;" />' . "\n";
?>
</div>
<div style="clear: right; display: block; font-size: 12pt; width: 100%;">
<?php
echo $row2['comment'];
?>
</div>
</div>
<?php
if (isset($_SESSION['logged']) && ($_SESSION['logged'] == 1)) {
if ($row['username'] == $_SESSION['username']) {
?>
<div style="clear: both; padding: 10px; text-align: right;">
<a href="user_comments.php?comment_id=<?php echo $row2['comment_id'] . "&action=delete"; ?>">Delete</a> | 
<a href="user_profile.php?id=<?php echo $row2['user_id'] . "&action=comment"; ?>">Comment Back</a> | 
<a href="user_profile.php?id=<?php echo $row2['user_id'] . "&action=message"; ?>">Message</a>
</div>
<?php
} else {
?>
<div style="clear: both; padding: 10px; text-align: right;">
<a href="user_profile.php?id=<?php echo $row2['user_id'] . "&action=comment"; ?>">Comment</a> | 
<a href="user_profile.php?id=<?php echo $row2['user_id'] . "&action=message"; ?>">Message</a>
</div>
<?php
}
} else {
?>
<div style="clear: both; padding: 10px; text-align: right;">
</div>
<?php
}
?>
</div>
<?php
$ccount++;
}
?>
</div>
<div class="footer">
<span class="toplink"><a href="#comments">&uarr; Top of Comments</a></span>
<span class="link"><a href="user_profile.php?id=<?php echo $user_id . "&action=allcomments"; ?>">View All Comments</a><?php if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1) { ?> | <a href="<?php echo $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'] . "&action=comment"; ?>">Add A Comment</a><?php } ?></span>
</div>
<br />
</div>
<!-- End comments -->
<div style="clear: both; width: 100%;">&nbsp;</div>
<?php
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