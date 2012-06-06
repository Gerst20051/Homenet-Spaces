<?php
session_start();
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
<base target="_top" />
</head>

<body onload="refreshChat(); focusMessage();">
<?php include ("hd.inc.php"); ?>
<!-- Begin page content -->
<div id="chat_pagecontent" class="pagecontent">
<div id="pageheader" class="pageheader2"><div class="heading">
Homenet Spaces Chat
</div></div>
<br />
<div>
<div id="chatarea" style="background-color: #fff; border: 1px solid #acd8f0; color: #000; height: 400px; margin: 0 auto; overflow: auto; padding: 5px; text-align: left; width: 600px;">
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
if (window.XMLHttpRequest) {
return new XMLHttpRequest();
}

if (window.ActiveXObject) {
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
<?php include ("ft.inc.php"); ?>
</body>

</html>