<?php
require ("lang.inc.php");
include ("auth.inc.php");
include ("db.member.inc.php");

$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id WHERE username = "' . mysql_real_escape_string($_SESSION['username'], $db) . '"';
$result = mysql_query($query, $db) or die(mysql_error($db));
$row = mysql_fetch_array($result);
extract($row);
mysql_free_result($result);

$fullname = $row['firstname'] . " " . $row['middlename'] . " " . $row['lastname'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//<?php echo $TEXT['global-dtdlang']; ?>" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $TEXT['global-lang']; ?>" lang="<?php echo $TEXT['global-lang']; ?>" dir="<?php echo $TEXT['global-text_dir']; ?>">

<head>
<title><?php echo $TEXT['global-headertitle'] . " | " . $firstname . " " . $lastname . " | " . $TEXT['homepage-headertitle']; ?></title>
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

/*
This Comment Stops Update Function
------------------------------------

star.update = function(e,o) {
var n = star.num,
v = parseInt($('starUser' + n).innerHTML);

n = o.id.substr(4);
$('starCur' + n).title = v;

var w = "<?php echo $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING']; ?>&rating=" + v;

window.location = w;
};
*/

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

div#rightpanel div.profilepicupdate { 
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

div#rightpanel div.profilepicupdate div.content { 
line-height : 1.5em; 
margin : 5px; 
}

div#rightpanel div.profilepicchecklist { 
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

div#rightpanel div.profilepicchecklist div.heading { 
color : #ff0000; 
font-size : 16pt; 
padding-top : 4px; 
text-align : center; 
width : 100%; 
}

div#rightpanel div.profilepicchecklist div.content { 
line-height : 1.5em; 
margin : 5px; 
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

<body id="userpersonal_body">
<?php include ("hd.inc.php"); ?>
<!-- Begin page content -->
<div id="userpersonal_pagecontent" class="pagecontent">
<div id="pageheader" class="pageheader2"><div class="heading">
Personal Area
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
echo 'px; ">';
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
<div class="profilepicupdate">
<div class="content">
<div><a href="update_account.php">Update Account</a></div>
<div><a href="delete_account.php">Delete Account</a></div>
<div><a href="send_feedback.php">Send Feedback</a></div>
</div>
</div>
<?php
$checklist = 0;

if ($row['default_image'] == null) $checklist += 1;
if (($status == null) || ($mood == null)) $checklist += 1;
if ($user_style == null) $checklist += 1;
if ($website == null) $checklist += 1;
if ($about_me == null) $checklist += 1;
if ($profile_song_letter == null || $profile_song_artist == null || $profile_song_name == null) $checklist += 1;
if ($checklist > 0) {
?>
<div class="profilepicchecklist">
<div class="heading">
<div>Checklist ( <?php echo $checklist; ?> )</div>
</div>
<div class="content">
<?php
if ($row['default_image'] == null) echo '<div><a href="upload.php?type=image&default">Upload Default Image</a></div>';
if (($status == null) || ($mood == null)) echo '<div><a href="#" onclick="showMe3(\'samupdate\'); ">Update Status & Mood</a></div>';
if ($user_style == null) echo '<div><a href="customize_profile.php">Customize Profile</a></div>';
if ($website == null) echo '<div><a href="update_account.php">Add Website</a></div>';
if ($about_me == null) echo '<div><a href="update_account.php">About Me</a></div>';
if ($profile_song_letter == null || $profile_song_artist == null || $profile_song_name == null) echo '<div><a href="update_account.php">Profile Song</a></div>';
?>
</div>
</div>
<?php } ?>
</div>
<!-- End profile pic -->
</div>
<!-- End right panel -->
<!-- Begin left panel -->
<div id="leftpanel">
<div class="profilelinks">
<a href="upload.php">Upload Your Files!</a> | <a href="view_files.php">View Your Files!</a> | <a href="view_files.php">Received Files!</a>
</div>
<div class="profileinfo">
<div class="heading">
<?php echo "Welcome $firstname $lastname"; ?>
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

if ($now < $this_year_birth_date_timestamp) { // his/her birthday hasn't yet arrived this year
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
echo "$age Months";
} else {
$age = ($current_month - $birth_month);
echo "$age Months";
}
} else {
echo $age;
}

if ($privacy_birthdate == 1) {
echo " / Birthdate: $birth_date";
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
$hits = ($hits + 1);

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
</div>
<!-- End page content -->
<?php
include ("ft.inc.php");
include ("tracking_scripts.inc.php");
?>
</body>

</html>