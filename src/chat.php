<?php
session_start();

require ("lang.inc.php");
include ("auth.inc.php");
include ("db.member.inc.php");
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
<link rel="alternate" type="application/rss+xml" title="<?php echo $TEXT['homepage-rssfeed_monthlyupdates']; ?>" href="rss/rss.xml" />
<link rel="stylesheet" type="text/css" href="css/global.css" media="all" />
<script type="text/javascript" src="jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="cs.js"></script>
<script type="text/javascript" src="nav.js"></script>
<script type="text/javascript" src="suggest.js"></script>
<base target="_top" />
<style type="text/css">
body { 
	background: url(<?php echo $bimage; ?>) repeat; 
	background-position : 50% 140px; 
	}
</style>
<style type="text/css">
div#pageheader { 
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

div#pageheader div.heading { 
	font-size : 40px; 
	left : 20px; 
	letter-spacing : 1px; 
	position : relative; 
	}
</style>
</head>

<body onload="refreshChat(); focusMessage();">
<?php
include ("hd.inc.php");
?>
<!-- Begin page content -->
<div id="chat_pagecontent" class="pagecontent">
<div id="pageheader">
<div class="heading">
Homenet Spaces Chat
</div>
</div>
<br />
<div>
<div id="chatarea" style="background-color : #ffffff; border : 1px solid #ACD8F0; color : #000000; height : 400px; margin : 0 auto; overflow : auto; padding : 5px; text-align : left; width : 600px; ">
</div>
<br />
<div id="messagearea">
<input type="text" id="message" value="" style="width: 400px;" maxlength="1500" onkeyup="return onEnter(event);" />
</div>
</div>
</div>
<script type="text/javascript">
var xmlhttp;

function clearMessage() {
$("input[type='text']#message").val('');
focusMessage();
}

function focusMessage() {
$("input[type='text']#message").focus();
}

function scrollChatArea() {
var chatarea = document.getElementById('chatarea');
chatarea.scrollTop = chatarea.scrollHeight;
}

function chatChanged() {
if (xmlhttp.readyState == 4) {
var obj = document.getElementById('chatarea');
var html = obj.innerHTML;
var newhtml = xmlhttp.responseText;

if (html != newhtml) {
obj.innerHTML = newhtml;
}
}
}

function refreshChat() {
setTimeout("refreshChat()", 5000);

xmlhttp = GetXmlHttpObject();

if (xmlhttp == null) {
alert ("Your browser does not support XMLHTTP!");

return;
}

var url = "chat_request.php";
url += "?sid=" + Math.random();

xmlhttp.onreadystatechange = chatChanged;
xmlhttp.open("GET", url, true);
xmlhttp.send(null);

scrollChatArea();
}

function updateChat(str) {
xmlhttp = GetXmlHttpObject();

if (xmlhttp == null) {
alert ("Your browser does not support XMLHTTP!");

return;
}

var url = "chat_request.php";
url += "?message=" + str;
url += "&sid=" + Math.random();

xmlhttp.onreadystatechange = chatChanged;
xmlhttp.open("GET", url, true);
xmlhttp.send(null);

clearMessage();
}

function GetXmlHttpObject() {
if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
return new XMLHttpRequest();
}

if (window.ActiveXObject) { // code for IE6, IE5
return new ActiveXObject("Microsoft.XMLHTTP");
}

return null;
}

function onEnter(evt) {
var keyCode = '';

if (evt.keyCode) {
keyCode = evt.keyCode;
}

if (keyCode == 13) {
var msg = $("input[type='text']#message").val();
updateChat(msg);
clearMessage();

return false;
}

return true;
}
</script>
<!-- End page content -->
<?php
include ("ft.inc.php");
?>
</body>

</html>