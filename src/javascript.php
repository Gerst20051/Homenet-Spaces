<?php
session_start();
header("Content-Type: application/x-javascript");

/* begin dC database query */
if (isset($_SESSION['logged']) && ($_SESSION['logged'] == 1)) {
include ("db.member.inc.php");

$query = 'SELECT * FROM hns_desktop u JOIN info i ON u.user_id = i.user_id WHERE u.user_id = "' . mysql_real_escape_string($_SESSION['user_id'], $db) . '"';
$result = mysql_query($query, $db) or die(mysql_error($db));

if (mysql_num_rows($result) > 0) {
$row = mysql_fetch_assoc($result);
extract($row);
mysql_free_result($result);
}
}
/* end dC database query */
?>
/* ---------------------------------------------------- */
/* ----------- >>>  Global Javascript  <<< ------------ */
/* ---------------------------------------------------- */

/* ---------------------------------------------------- */
/* Site Name:    Homenet Spaces
/* Site Creator: Andrew Gerst
/* Site Created: Wed, 01 April 2009 16:40:05 -0400
/* Last Updated: <?php echo date(r, filemtime('javascript.php')) . "\n"; ?>
<?php if (isset($_SESSION['logged']) && ($_SESSION['logged'] == 1)) { ?>/* Current User: <?php echo $_SESSION['fullname'] . "\n"; } ?>
/* ---------------------------------------------------- */

/* ---------------------------------------------------- */
/* ------------ >>>  Table of Contents  <<< ----------- */
/* ---------------------------------------------------- */
/* Item 1
/* ---------------------------------------------------- */

/* Begin Nav */

startlist = function() {
	if (document.all && document.getElementById) {
		navRoot = document.getElementById("nav");

		for (i = 0; i < navRoot.childNodes.length; i++) {
			node = navRoot.childNodes[i];

			if (node.nodeName == "LI") {
				node.onmouseover = function() { this.className += " over"; }
				node.onmouseout = function() { this.className = this.className.replace(" over", ""); }
			}
		}
	}
}

window.onload = function() {
	startlist;
}

/* End Nav */
/* Begin Change Style */

var expDays = 365;
var standardStyle = 1;
var theme = 'hnsmaintheme';

function switchStyleOfUser() {
	var hnsmaintheme = getCookie(theme);
	if (hnsmaintheme == null) hnsmaintheme = standardStyle;
	document.write('<link rel="stylesheet" type"text/css" href="css.php?theme=' + hnsmaintheme + '" />');
	var hnsmaintheme = "";
	return hnsmaintheme;
}

var exp = new Date();
exp.setTime(exp.getTime() + (expDays * 24 * 60 * 60 * 1000));

function getCookieVal(offset) {
	var endstr = document.cookie.indexOf (";", offset);
	if (endstr == -1)	endstr = document.cookie.length;
	return unescape(document.cookie.substring(offset, endstr));
}

function getCookie(name) {
	var arg = name + "=";
	var alen = arg.length;
	var clen = document.cookie.length;
	var i = 0;

	while (i < clen) {
		var j = i + alen;
		if (document.cookie.substring(i, j) == arg) return getCookieVal(j);
		i = document.cookie.indexOf(" ", i) + 1;
		if (i == 0) break;
	}

	return null;
}

function setCookie(name, value) {
	var argv = setCookie.arguments;
	var argc = setCookie.arguments.length;
	var expires = (argc > 2) ? argv[2] : null;
	var path = (argc > 3) ? argv[3] : null;
	var domain = (argc > 4) ? argv[4] : null;
	var secure = (argc > 5) ? argv[5] : false;
	document.cookie = name + "=" + escape(value) + ((expires == null) ? "" : ("; expires=" + expires.toGMTString())) + ((path == null) ? "" : ("; path=" + path)) + ((domain == null) ? "" : ("; domain=" + domain)) + ((secure == true) ? "; secure" : "");
}

function deleteCookie(name) {
	var exp = new Date();
	exp.setTime(exp.getTime() - 1);
	var cval = getCookie(name);
	document.cookie = name + "=" + cval + "; expires=" + exp.toGMTString();
}

function doRefresh() {
	location.reload();
}

<?php if ($_SERVER['PHP_SELF'] != "index.php") echo "switchStyleOfUser();"; ?>

/* End Change Style */
/* Begin Suggest */

function suggest(str) {
	var obj = document.getElementById("suggest");
	var objCont = document.getElementById("suggestcontainer");

	if (str.length == 0) {
		obj.innerHTML = "";
		objCont.style.display = "none";
		return;
	}

	xmlhttp = GetXmlHttpObject();

	if (xmlhttp == null) {
		alert ("Your browser does not support XMLHTTP!");
		return;
	}

	var url = "suggest.php";
	url = url + "?q=" + str;
	url = url + "&sid=" + Math.random();
	xmlhttp.onreadystatechange = stateChanged;
	xmlhttp.open("GET", url, true);
	xmlhttp.send(null);
}

function stateChanged() {
	var obj = document.getElementById("suggest");
	var objCont = document.getElementById("suggestcontainer");

	if ((xmlhttp.readyState == 4) || (xmlhttp.readyState == "complete")) {
		obj.innerHTML = xmlhttp.responseText;
		objCont.style.display = "block";
	}
}

function GetXmlHttpObject() {
	if (window.XMLHttpRequest) return new XMLHttpRequest();
	if (window.ActiveXObject) return new ActiveXObject("Microsoft.XMLHTTP");
	return null;
}

function GetXmlHttpObject() {
	var xmlhttp = null;

	try {
		xmlhttp = new XMLHttpRequest();
	} catch (e) {
		try { xmlhttp = new ActiveXObject("Msxml2.XMLHTTP"); }
		catch (e) { xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); }
	}

	return xmlhttp;
}

/* End Suggest */
/* Begin Show / Hide */

// Adnin Area, Members, admin_msummary, user_personal, user_profile.php, lite.php
function showMe5 (it) {
	var vis = document.getElementById(it).style.visibility
	if (vis == "hidden") document.getElementById(it).style.visibility = "visible";
	else document.getElementById(it).style.visibility = "hidden";
}

// Admin Page Editor, Customize Profile, hd.inc.php
function showhide(id) {
	if (document.getElementById) {
		obj = document.getElementById(id);
		if (obj.style.display == "none") obj.style.display = "block";
		else obj.style.display = "none";
	}
}

// Admin Update User, Update Account
function showMe4 (it) {
	var vis = document.getElementById(it).style.display
	if (vis == "") document.getElementById(it).style.display = "none";
	else document.getElementById(it).style.display = "none";
}

function showMe6 (it) {
	var vis = document.getElementById(it).style.display
	if (vis == "") document.getElementById(it).style.display = "";
	else document.getElementById(it).style.display = "";
}

// ft.inc.php, hd.inc.php
function showMe2 (it) {
	var vis = document.getElementById(it).style.visibility
	if (vis == "hidden") document.getElementById(it).style.visibility = "visible";
	else document.getElementById(it).style.visibility = "hidden";
}

// header.inc.php
function showMe3 (it) {
	var vis = document.getElementById(it).style.visibility
	if (vis == "hidden") document.getElementById(it).style.visibility = "visible";
	else document.getElementById(it).style.visibility = "hidden";
}

function ToggleHaf (it, it2, box) {
	var vis = (box.checked) ? "none" : "block";
	document.getElementById(it).style.display = vis;
	document.getElementById(it2).style.display = vis;
}

/* End Show / Hide */
/* Begin Star Rating */ // user_history.php + user_personal.php + user_profile.php

// Admin Update User

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

// 

/* End Star Rating */
/* Begin Update Captcha */

function updatecaptchaimg() {
	document.captchaimg.src += '?';
}

/* End Update Captcha */
/* Begin Delete User */

// Admin Update User
function delete_user() {
	confirm("Are You Sure You Want To Delete <?php echo $row['username']; ?>'s Profile?");
}

/* End Delete User */
/* Begin Delete Account */

// delete_account.php
function delete_account() {
	var answer = confirm("Are You Sure You Want To Delete Your Account?")
	if (!answer) window.location = "index.php";
}

/* End Delete Account */
/* Begin Countdown */ // Language Set + Register + Update Images + User Pictures + User Profile + Song History

// auth.inc.php
/*
var milisec = 0;
var seconds = 5; // add 1 to absolute value
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
*/

/* End Countdown */
/* Begin Signin Focus */

// header.inc.php & login.php & register
// document.signin.username.focus();

/* End Signin Focus */
/* Begin DOM Ready *//*

$(document).ready(function() {

});

$(window).load(function() {

});

*//* End DOM Ready*/