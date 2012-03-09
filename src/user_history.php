<?php
require ("lang.inc.php");
include ("auth.inc.php");
include ("db.member.inc.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//<?php echo $TEXT['global-dtdlang']; ?>" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $TEXT['global-lang']; ?>" lang="<?php echo $TEXT['global-lang']; ?>" dir="<?php echo $TEXT['global-text_dir']; ?>">

<head>
<title><?php echo $TEXT['global-headertitle'] . " | " . $TEXT['homepage-headertitle']; ?></title>
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
z-index : 20; 
}

#star li.curr { 
background : url('i/sy/st/stars.gif') left 25px; 
font-size : 1px; 
}

#star div.user { 
color : #888; 
float : left; 
font-family : arial; 
font-size : 13px; 
left : 15px; 
position : relative; 
width : 30px; 
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

/*
This Comment Stops Rating From Changing On Hover
--------------------------------------------------

$S('starCur' + n).width = oX + 'px';
$S('starUser' + n).color = '#111';
$('starUser' + n).innerHTML = Math.round((oX / 84) * 100) + '%';
*/

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
</head>

<body>
<?php include ("hd.inc.php"); ?>
<!-- Begin page content -->
<div class="pagecontent">
<?php
$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id WHERE username = "' . mysql_real_escape_string($_SESSION['username'], $db) . '"';
$result = mysql_query($query, $db) or die(mysql_error($db));
$row = mysql_fetch_array($result);
extract($row);
mysql_free_result($result);
?>
<div id="pageheader" class="pageheader2"><div class="heading">
Welcome to your Account History!
</div></div>
<div>
<fieldset style="margin: 0 auto; width: 75%;">
<legend>Last Login Info&nbsp;</legend>
<span>
<?php
if ($_SESSION['last_login'] != null) {
echo "You Last Logged In On: ";
echo $_SESSION['last_login'];
} else {
echo "You Last Logged In On: ";
echo $last_login;
}
?>
</span>
<br />
<span>
<?php
if ($_SESSION['last_login_ip'] != null) {
if ($_SESSION['last_login_ip'] == 0) {
echo "This is the first time you logged on!";
echo "<br />";
echo "Thanks For Joining :)";
} else {
echo "With This Computer: ";
echo $_SESSION['last_login_ip'];
echo " | ";
echo '<a href="http://phpweby.com/services/iplocation?ip=' . $_SESSION['last_login_ip'] . '" title="Locate This IP" target="_blank">Locate</a>';
}
} else {
if ($last_login_ip == 0 || null) {
echo "This is the first time you logged on!";
echo "<br />";
echo "Thanks For Joining :)";
}
}
?>
</span>
</fieldset>
</div>
<br />
<div>
<fieldset style="margin: 0 auto; width: 75%;">
<legend>Current Login Info&nbsp;</legend>
<span>
Your Computer Is: <?php echo $last_login_ip; ?>
<?php
echo " | ";
echo '<a href="http://phpweby.com/services/iplocation?ip=' . $last_login_ip . '" title="Locate Your IP" target="_blank">Locate</a>';
?>
</span>
</fieldset>
</div>
<br />
<div>
<fieldset style="margin: 0 auto; width: 75%;">
<legend>Account Summary&nbsp;</legend>
<span>
Profile Views: <?php echo $hits; ?>
<br />
Logged On
<?php
echo " $logins ";

if ($logins > 1) echo "Times";
elseif ($logins == 1) echo "Time";
else echo "Times & Was Hacked :P";
?>
<br />
Date Joined: <?php echo $date_joined; ?>
</span>
</fieldset>
</div>
<br />
<div>
<fieldset style="margin: 0 auto; width: 75%;">
<legend>User Rating / Rank&nbsp;</legend>
<span>
xRank:
<?php
if ($website != null) $ifexists_website = 1000;
if ($website != null) $ifexists_customizeprofile = 1000;
if ($website != null) $ifexists_defualtpic = 1000;

$xrank = ($rank + ($hits * 2) + ($logins * 5) + ($ifexists_website) + ($ifexists_customizeprofile) + ($ifexists_defaultpic));

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
<br /><br />
<div id="star">
<ul id="star" class="star" onmousemove="star.mouse(event,this)" title="Your Rating Is <?php echo ($rating); ?>%">
<li id="starCur" class="curr" title="<?php echo ($rating); ?>"<?php
echo ' style="width : ';
$width = round((($rating) * 84) / 100);
echo $width;
echo 'px; ">';
?></li>
</ul>
<div style="color: rgb(136, 136, 136);" id="starUser" class="user"><?php echo ($rating); ?>%</div>
</div>
<div style="clear: both; color: rgb(136, 136, 136);">
<?php
$votes = ($xratings > 0) ? $xratings : 'No';
$vtense = ($xratings == 0 || $xratings > 1) ? ' Votes' : ' Vote';
echo "<small>$votes$vtense</small>";

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
</span>
</fieldset>
</div>
<br />
<div>
<fieldset style="margin: 0 auto; width: 75%;">
<legend>
<?php
if ($voters == null) {
echo "Voters";
} else {
$numvoters = str_word_count($voters, null, '.0..9');

if ($numvoters == 1) {
echo $numvoters;
echo " Voter";
} else {
echo $numvoters;
echo " Voters";
}
}
?>
&nbsp;
</legend>
<span>
<?php
if ($voters == null) echo "No Voters Are Registered";
else echo $voters;
?>
</span>
</fieldset>
</div>
</div>
<!-- End page content -->
<?php
include ("ft.inc.php");
include ("tracking_scripts.inc.php");
?>
</body>

</html>
<?php mysql_close($db); ?>