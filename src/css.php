<?php
session_start();
header("Content-Type: text/css");

if (isset($_GET['theme']) && is_numeric((int)$_GET['theme']) && ((int)$_GET['theme'] > 0) && ((int)$_GET['theme'] < 7)) (int)$theme = (int)$_GET['theme'];
else (int)$theme = 1;
$css = array('blue','orange','green','yellow','red','black');

switch ($theme) {
case 1:
	$body_bgcolor = "#fff";
	$body_color = "#000";
	$bgcolor = "#ebf4fb";
	$bordercolor = "#acd8f0";
	$acolor = "#004080";
	$ahovercolor = "#5084c1";
	$hrcolor = "#f3f3f3";
	$pc_bgcolor = "#ecffff";
	$phd_bgcolor = "#ff9";
	$phd_bordercolor = "#fc0";

	/*

	*/
break;
case 2:
	$bgcolor = "";
	$bordercolor = "";
	
	/*
	
	*/
break;
case 3:
	$bgcolor = "";
	$bordercolor = "";

	/*
	
	*/
break;
case 4:
	$bgcolor = "";
	$bordercolor = "";

	/*
	
	*/
break;
case 5:
	$bgcolor = "";
	$bordercolor = "";

	/*
	
	*/
break;
case 6:
	$bgcolor = "";
	$bordercolor = "";

	/*
	
	*/
break;
}

switch (date('d')) {
case 1: $bimage = "Autumn%20Leaves.jpg"; break;
case 2: $bimage = "Field%202.jpg"; break;
case 3: $bimage = "Field.jpg"; break;
case 4: $bimage = "Image%2023.jpg"; break;
case 5: $bimage = "Image%2028.jpg"; break;
case 6: $bimage = "Image%2043.jpg"; break;
case 7: $bimage = "Image%2045.jpg"; break;
case 8: $bimage = "Image%2063.jpg"; break;
case 9: $bimage = "Jacksons%20Wharf.jpg"; break;
case 10: $bimage = "Landscapes%203.jpg"; break;
case 11: $bimage = "Landscapes%205.jpg"; break;
case 12: $bimage = "Lim%20Yu%20Jie.jpg"; break;
case 13: $bimage = "Mount%20Taranaki.jpg"; break;
case 14: $bimage = "Mt%20Ruapehu%20Sheep.jpg"; break;
case 15: $bimage = "Nihotupu%20Dam.jpg"; break;
case 16: $bimage = "Ocean.jpg"; break;
case 17: $bimage = "Pakiri%20Tree.jpg"; break;
case 18: $bimage = "Ruahine%20Ranges%20From%20Apiti.jpg"; break;
case 19: $bimage = "Scenes%203.jpg"; break;
case 20: $bimage = "Sebastian%20Guek.jpg"; break;
case 21: $bimage = "Tree.jpg"; break;
case 22: $bimage = "Tulips%202.jpg"; break;
case 23: $bimage = "Wallpaper%205.jpg"; break;
case 24: $bimage = "Wallpaper%207.jpg"; break;
case 25: $bimage = "Wallpaper%208.jpg"; break;
case 26: $bimage = "Wallpaper%2010.jpg"; break;
case 27: $bimage = "Waterfall%202.jpg"; break;
case 28: $bimage = "Wedding%20Sunflowers.jpg"; break;
case 29: $bimage = "Window.jpg"; break;
case 30: $bimage = "Windows%207%20RC1.jpg"; break;
case 31: $bimage = "Winter%20In%20Queenstown.jpg"; break;
case 32: $bimage = "Yosemite%20Valley.jpg"; break;
default: $bimage = "Field.jpg"; break;
}

$bimage = "http://homenetspaces.webs.com/w/" . $bimage;
?>
/* ---------------------------------------------------- */
/* ----------- >>>  Global Style Sheet  <<< ----------- */
/* ---------------------------------------------------- */

/* ---------------------------------------------------- */
/* Site Name:    Homenet Spaces
/* Site Creator: Andrew Gerst
/* Site Created: Wed, 01 Apr 2009 16:40:05 -0400
/* Last Updated: <?php echo date(r, filemtime('css.php')) . "\n"; ?>
<?php if (isset($_SESSION['logged']) && ($_SESSION['logged'] == 1)) { ?>/* Current User: <?php echo $_SESSION['fullname'] . "\n";} ?>
/* Select Theme: <?php echo $theme . "\n"; ?>
/* ---------------------------------------------------- */

/* ---------------------------------------------------- */
/* ------------ >>>  Table of Contents  <<< ----------- */
/* ---------------------------------------------------- */
/* CSS Reset
/* CCS Base
/* Buttons
/* - SPN
/* - Shiny
/* Main
/* Transparency
/* Floating & Clearing
/* Drag / Resize
/* ---------------------------------------------------- */

/* Begin CSS Reset */

html {
background-color: #fff;
color: #000;
font-size: 100.01%;
}

body, div, dl, dt, dd, ul, ol, li, h1, h2, h3, h4, h5, h6, pre, code, form, fieldset, legend, input, textarea, p, blockquote, th, td {
margin: 0;
padding: 0;
}

table {
border-collapse: collapse;
border-spacing: 0;
}

fieldset, img {
border: 0;
}

address, caption, cite, code, dfn, em, strong, th, var {
font-style: normal;
font-weight: normal;
}

li {
list-style: none;
}

caption, th {
text-align: left;
}

h1, h2, h3, h4, h5, h6 {
font-size: 100%;
font-weight: normal;
}

q:before, q:after {
content: '';
}

abbr, acronym {
border: 0;
font-variant: normal;
}

sup {
vertical-align: text-top;
}

sub {
vertical-align: text-bottom;
}

input, textarea, select {
font-family: inherit;
font-size: inherit;
font-weight: inherit;
}

input, textarea, select {
*font-size: 100%;
}

legend {
color: #000;
}

/* End CSS Reset */
/* Begin CSS Base */

html, body {
font-family: tahoma, arial, verdana, sans-serif;
font-size: 1em;
line-height: 1.4;
margin: 0 auto;
padding: 0 auto;
width: 100%;
}

html {
user-select: text;
-khtml-user-select: text;
-moz-user-select: text;
-webkit-user-select: text;
}

body {
width: 100%;
}

h1 {
font-size: 138.5%;
}

h2 {
font-size: 123.1%;
}

h3 {
font-size: 108%;
}

h1, h2, h3 {
margin: 1em 0;
}

h1, h2, h3, h4, h5, h6, strong {
font-weight: bold;
}

abbr, acronym {
border-bottom: 1px dotted #000;
cursor: help;
}

em {
font-style: italic;
}

blockquote, ul, ol, dl {
margin: 1em;
}

ol, ul, dl {
margin-left: 2em;
}

ol li {
list-style: decimal outside;
}

ul li {
list-style: disc outside;
}

dl dd {
margin-left: 1em;
}

th, td {
border: 1px solid #000;
padding: .5em;
}

th {
font-weight: bold;
text-align: center;
}

caption {
margin-bottom: .5em;
text-align: center;
}

p, fieldset, table {
margin-bottom: 1em;
}

/*
pre {
background: #eee;
padding: 10px;
border: 2px solid #c94a29;
overflow: hidden;
margin: 0 0 15px 0;
width: 563px;
font-family: Courier, Monospace;
}
*/
/* End CSS Base */
/* Begin HTML 5 */

address, article, aside, footer, header, hgroup, nav, section, time {
display: block;
}

address {
margin: 0 0 0.2em 0;
}

time {
margin: 0 0 1.5em 0;
}

/*
article:after { clear: both; content: "."; display: block; height: 0; visibility: hidden; }
aside:after { clear: both; content: "."; display: block; height: 0; visibility: hidden; }
div:after { clear: both; content: "."; display: block; height: 0; visibility: hidden; }
form:after { clear: both; content: "."; display: block; height: 0; visibility: hidden; }
header:after { clear: both; content: "."; display: block; height: 0; visibility: hidden; }
nav:after { clear: both; content: "."; display: block; height: 0; visibility: hidden; }
section:after { clear: both; content: "."; display: block; height: 0; visibility: hidden; }
ul:after { clear: both; content: "."; display: block; height: 0; visibility: hidden; }
*/

/* End HTML5 */
/* Begin Buttons */

.buttons a,
.buttons button {/* if no image in button add padding-left: 10px */
background-color: #f5f5f5;
border: 1px solid #dedede;
border-left: 1px solid #eee;
border-top: 1px solid #eee;
color: #565656;
cursor: pointer;
display: block;
float: left;
font-family: "lucida grande", tahoma, arial, verdana, sans-serif;
font-size: 10pt;
font-weight: bold;
line-height: 130%;
margin: 0 7px 0 0;
padding: 5px 10px 6px 7px;
text-decoration: none;
}

.buttons button {
overflow: visible;
padding: 4px 10px 3px 7px;
width: auto;
}

.buttons button[type] {
line-height: 17px;
padding: 5px 10px 5px 7px;
}

*:first-child+html button[type] {
padding: 4px 10px 3px 7px;
}

.buttons a img,
.buttons button img {
border: none;
height: 16px;
margin: 0 3px -3px 0 !important;
padding: 0;
width: 16px;
}

/* STANDARD */

button:hover,
.buttons a:hover {
background-color: #dff4ff;
border: 1px solid #c2e1ef;
color: #336699;
}

.buttons a:active {
background-color: #6299c5;
border: 1px solid #6299c5;
color: #fff;
}

/* POSITIVE */

button.positive,
.buttons a.positive {
color: #529214;
}

.buttons a.positive:hover,
button.positive:hover {
background-color: #e6efc2;
border: 1px solid #c6d880;
color: #529214;
}

.buttons a.positive:active {
background-color: #529214;
border: 1px solid #529214;
color: #fff;
}

/* NEGATIVE */

.buttons a.negative,
button.negative {
color: #d12f19;
}

.buttons a.negative:hover,
button.negative:hover {
background: #fbe3e4;
border: 1px solid #fbc2c4;
color: #d12f19;
}

.buttons a.negative:active {
background-color: #d12f19;
border: 1px solid #d12f19;
color: #fff;
}

/** Begin Shiny Buttons */

.shiny-button1,
.shiny-button2,
.shiny-button3 {
background-color: #666;
background-color: rgba(128,128,128,0.75);
background-image: -moz-linear-gradient(top, bottom, from(rgba(64,64,64,0.75)), to(rgba(192,192,192,0.9)));
background-image: -webkit-gradient(linear, 0% 0%, 0% 90%, from(rgba(64,64,64,0.75)), to(rgba(192,192,192,0.9)));
border: 2px solid #999;
border-radius: 16px;
-khtml-border-radius: 16px;
-moz-border-radius: 16px;
-opera-border-radius: 16px;
-webkit-border-radius: 16px;
box-shadow: rgba(192,192,192,0.75) 0 8px 24px;
-khtml-box-shadow: rgba(192,192,192,0.75) 0 8px 24px;
-moz-box-shadow: rgba(192,192,192,0.75) 0 8px 24px;
-webkit-box-shadow: rgba(192,192,192,0.75) 0 8px 24px;
color: #fff;
cursor: pointer;
display: inline-block;
font-size: 1.5em;
font-weight: bold;
padding: 0.25em 0.5em 0.3em 0.5em;
position: relative;
text-align: center;
text-shadow: 1px 1px 3px rgba(0,0,0,0.5);
user-select: none;
-khtml-user-select: none;
-moz-user-select: none;
-webkit-user-select: none;
width: 8em;
}

.shiny-button1 span,
.shiny-button2 span,
.shiny-button3 span {
background-color: rgba(255,255,255,0.25);
background-image: -moz-linear-gradient(top, bottom, from(rgba(255,255,255,0.75)), to(rgba(255,255,255,0)));
background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(rgba(255,255,255,0.75)), to(rgba(255,255,255,0)));
border-radius: 8px;
-khtml-border-radius: 8px;
-moz-border-radius: 8px;
-opera-border-radius: 8px;
-webkit-border-radius: 8px;
display: block;
height: 50%;
left: 3.5%;
position: absolute;
top: 0;
width: 94%;
}

.shiny-button1:hover { /* red */
background-color: rgba(255,0,0,0.75);
background-image: -moz-linear-gradient(top, bottom, from(rgba(128,64,64,0.75)), to(rgba(192,128,128,0.9)));
background-image: -webkit-gradient(linear, 0% 0%, 0% 90%, from(rgba(128,64,64,0.75)), to(rgba(256,128,128,0.9)));
border-color: #aa7777;
box-shadow: rgba(256,128,128,0.5) 0 8px 24px;
-khtml-box-shadow: rgba(256,128,128,0.5) 0 8px 24px;
-moz-box-shadow: rgba(256,128,128,0.5) 0 8px 24px;
-webkit-box-shadow: rgba(256,128,128,0.5) 0 8px 24px;
}

.shiny-button2:hover { /* green */
background-color: rgba(0,128,0,0.75);
background-image: -moz-linear-gradient(top, bottom, from(rgba(64,128,64,0.75)), to(rgba(128,192,128,0.9)));
background-image: -webkit-gradient(linear, 0% 0%, 0% 90%, from(rgba(64,128,64,0.75)), to(rgba(128,255,128,0.9)));
border-color: #77cc77;
box-shadow: rgba(128,256,128,0.6) 0 8px 24px;
-khtml-box-shadow: rgba(128,256,128,0.6) 0 8px 24px;
-moz-box-shadow: rgba(128,256,128,0.6) 0 8px 24px;
-webkit-box-shadow: rgba(128,256,128,0.6) 0 8px 24px;
}

.shiny-button3:hover { /* blue */
background-color: rgba(64,128,192,0.75);
background-image: -moz-linear-gradient(top, bottom, from(rgba(16,96,192,0.75)), to(rgba(96,192,255,0.9)));
background-image: -webkit-gradient(linear, 0% 0%, 0% 90%, from(rgba(16,96,192,0.75)), to(rgba(96,192,255,0.9)));
border-color: #6699cc;
box-shadow: rgba(128,192,255,0.75) 0 8px 24px;
-khtml-box-shadow: rgba(128,192,255,0.75) 0 8px 24px;
-moz-box-shadow: rgba(128,192,255,0.75) 0 8px 24px;
-webkit-box-shadow: rgba(128,192,255,0.75) 0 8px 24px;
}

/* End Shiny Buttons **/
/* End Buttons */

/* ----------------------------------------------------- */
/* -------------- >>>  Global Layout  <<< -------------- */
/* ----------------------------------------------------- */

/* Begin Main */

div#blackout {
background-color: #000;
filter: alpha(opacity=60);
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=60)";
height: 100%;
opacity: 0.6;
-khtml-opacity: 0.6;
-moz-opacity: 0.6;
width: 100%;
}

div#whiteout {
background-color: #fff;
filter: alpha(opacity=60);
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=60)";
height: 100%;
opacity: 0.6;
-khtml-opacity: 0.6;
-moz-opacity: 0.6;
width: 100%;
}

div.breakwrap {
white-space: normal;
white-space: pre-wrap;
white-space: -pre-wrap;
white-space: -moz-pre-wrap;
white-space: -o-pre-wrap;
word-break: break-all;
word-wrap: break-word;
}

/* End Main */
/* Begin Transparency */

.transparent1 {
filter: alpha(opacity=10) !important;
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=10)" !important;
opacity: 0.1 !important;
-khtml-opacity: 0.1 !important;
-moz-opacity: 0.1 !important;
}

.transparent2 {
filter: alpha(opacity=20) !important;
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=20)" !important;
opacity: 0.2 !important;
-khtml-opacity: 0.2 !important;
-moz-opacity: 0.2 !important;
}

.transparent3 {
filter: alpha(opacity=30) !important;
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=30)" !important;
opacity: 0.3 !important;
-khtml-opacity: 0.3 !important;
-moz-opacity: 0.3 !important;
}

.transparent4 {
filter: alpha(opacity=40) !important;
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=40)" !important;
opacity: 0.4 !important;
-khtml-opacity: 0.4 !important;
-moz-opacity: 0.4 !important;
}

.transparent5 {
filter: alpha(opacity=50) !important;
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=50)" !important;
opacity: 0.5 !important;
-khtml-opacity: 0.5 !important;
-moz-opacity: 0.5 !important;
}

.transparent6 {
filter: alpha(opacity=60) !important;
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=60)" !important;
opacity: 0.6 !important;
-khtml-opacity: 0.6 !important;
-moz-opacity: 0.6 !important;
}

.transparent7 {
filter: alpha(opacity=70) !important;
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=70)" !important;
opacity: 0.7 !important;
-khtml-opacity: 0.7 !important;
-moz-opacity: 0.7 !important;
}

.transparent8 {
filter: alpha(opacity=80) !important;
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=80)" !important;
opacity: 0.8 !important;
-khtml-opacity: 0.8 !important;
-moz-opacity: 0.8 !important;
}

.transparent9 {
filter: alpha(opacity=90) !important;
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=90)" !important;
opacity: 0.9 !important;
-khtml-opacity: 0.9 !important;
-moz-opacity: 0.9 !important;
}

.transparent10 {
filter: alpha(opacity=100) !important;
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=100)" !important;
opacity: 1 !important;
-khtml-opacity: 1 !important;
-moz-opacity: 1 !important;
}

/* End Transparency */
/* Begin Floating & Clearing */

.clear { clear: both !important; }
.left { float: left !important; }
.right { float: right !important; }

/** Begin Clear Fix */

.clearfix:after {
clear: both;
content: " ";
display: block;
font-size: 0;
height: 0;
line-height: 0;
visibility: hidden;
width: 0;
}

.clearfix {
display: inline-table;
display: inline-block;
}

html[xmlns] .clearfix {
display: block;
}

/* Begin Hide From IE-Mac \*/

* html .clearfix {
height: 1%;
}

.clearfix {
display: block;
}

/* End Hide From IE-Mac */
/* End Clear Fix **/
/* End Floating & Clearing */
/* Begin Drag/Resize */

.drsElement {
position: absolute;
z-index: 1;
}

.drsMoveHandle {
background-color: transparent;
cursor: move;
height: 28px;
width: 100%;
}

.dragresize {
background-color: transparent;
border: 0;
font-size: 1px;
position: absolute;
}

.dragresize-tl {
cursor: nw-resize;
height: 6px;
left: 0;
top: 0;
width: 6px;
z-index: 101;
}

.dragresize-tm {
cursor: n-resize;
height: 6px;
left: 0;
top: 0;
width: 100%;
z-index: 100;
}

.dragresize-tr {
cursor: ne-resize;
height: 6px;
right: 0;
top: 0;
width: 6px;
z-index: 101;
}

.dragresize-ml {
cursor: w-resize;
top: 0;
left: 0;
height: 100%;
width: 6px;
z-index: 100;
}

.dragresize-mr {
cursor: e-resize;
height: 100%;
top: 0;
right: 0;
width: 6px;
z-index: 100;
}

.dragresize-bl {
bottom: 0;
cursor: sw-resize;
height: 6px;
left: 0;
width: 6px;
z-index: 101;
}

.dragresize-bm {
bottom: 0;
cursor: s-resize;
height: 6px;
left: 0;
width: 100%;
z-index: 100;
}

.dragresize-br {
bottom: 0;
cursor: se-resize;
height: 6px;
right: 0;
width: 6px;
z-index: 101;
}

/* End Drag/Resize */
/* Begin User Interface */

body {
background: url(<?php echo $bimage; ?>) repeat !important;
background-position: 50% 140px;
font-family: times new roman;
font-size: 12pt;
margin: 0;
padding: 0;
width: 100%;
}

.togglehaf {
display: block;
left: 2px;
position: absolute;
top: 14px;
}

/* Begin Global */
/** Begin Header */

#header {
display: block;
height: 143px;
margin: 0;
width: 100%;
z-index: 200;
}

#togglehead {
display: block;
}

/*** Begin Site Name */

#header #hnslogo {
float: left;
height: 50px;
left: 15px;
position: absolute;
text-align: center;
top: 20px;
width: 300px;
}

#header #hnslogo .sitename {
font-family: arial;
font-size: 30px;
letter-spacing: -1px;
}

#header #hnslogo .sitenamer {
font-family: arial;
font-size: 12px;
letter-spacing: -1px;
position: relative;
top: -10px;
}

#header #hnslogo .sitenamer a.sitelink {
font-family: arial;
font-size: 12px;
text-decoration: none;
}

#header #hnslogo .sitenamer a.sitelink:hover {
font-family: arial;
font-size: 12px;
text-decoration: none;
}

#header #hnslogo .siteslogan {
font-family: arial;
font-size: 15px;
letter-spacing: -1px;
}

#header #hnslogo .sitesloganr {
font-family: arial;
font-size: 10px;
letter-spacing: -1px;
position: relative;
top: -4px;
}

/* End Site Name ***/
/*** Begin Logged In */

#header #loggedin {
border: 0;
float: right;
font-size: 1em;
height: 83px;
margin: 0 19px 0 0;
text-align: left;
width: 549px;
}

#header #loggedin a, 
#header #loggedin a:visited {
text-align: center;
text-decoration: none;
}

#header #loggedin a:hover {
text-align: center;
}

#header #loggedin .content {
padding-bottom: 5px;
position: relative;
top: 8px;
}

#header #loggedin .content .userimage {
left: 12px;
position: absolute;
top: -2px;
}

#header #loggedin .content .userimage #userimage {
border-radius: 6px;
-moz-border-radius: 6px;
-webkit-border-radius: 6px;
height: 52px;
width: 52px;
}

#header #loggedin .content .greeting {
left: 74px;
padding-bottom: 5px;
position: relative;
top: 0;
}

#header #loggedin .content .greeting .name {
font-weight: bold;
}

#header #loggedin .content .myaccount {
left: 74px;
padding-bottom: 5px;
position: relative;
top: 5px;
}

#header #loggedin .adminarea {
line-height: 20px;
padding-bottom: 5px;
position: absolute;
right: 35px;
text-align: right;
top: 30px;
width: 200px;
}

#header #loggedin .logout {
line-height: 20px;
padding-bottom: 5px;
position: absolute;
right: 35px;
text-align: right;
top: 8px;
width: 200px;
}

/**** Begin Sam */

#sam {
cursor: pointer;
display: block;
font-size: 12px;
height: 50px;
right: 200px;/* 545px Original */
padding: 10px;
position: absolute;
top: -1px;/* 8px Original */
width: 155px;
}

#sam .status {
display: block;
font-weight: bold;
height: 18px;
left: 0;
overflow: hidden;
padding: 2px;
position: relative;
top: 0;
width: 100%;
}

#sam .status .text {
font-weight: normal;
overflow: hidden;
width: 100%;
}

#sam .mood {
display: block;
font-weight: bold;
height: 18px;
left: 0;
margin-left: 5px;
overflow: hidden;
padding: 2px;
position: relative;
top: 0;
width: 100%;
}

#sam .mood .text {
font-weight: normal;
overflow: hidden;
width: 100%;
}

/***** Begin Sam Update */

#samupdate {
border-radius: 6px;
-moz-border-radius: 6px;
-webkit-border-radius: 6px;
bottom: -55px;
display: block;
height: 260px;
right: 570px;
padding: 10px;
position: absolute;
top: 14px;
width: 230px;
z-index: 210;
}

#samupdate a {
cursor: pointer;
}

#samupdate a.close {
font-size: 14px;
line-height: 30px;
padding-right: 5px;
text-align: right;
text-decoration: none;
width: 80px;
}

#samupdate .closespan {
border-radius: 4px;
-moz-border-radius: 4px;
-webkit-border-radius: 4px;
display: block;
font-size: 14px;
font-weight: bold;
height: 30px;
padding: 5px;
text-align: right;
}

#samupdate .header {
float: left;
font-size: 14px;
font-weight: bold;
letter-spacing: 2px;
line-height: 30px;
padding-left: 5px;
text-align: left;
}

#samupdate .splash {
border-radius: 4px;
-moz-border-radius: 4px;
-webkit-border-radius: 4px;
display: block;
font-size: 14px;
font-weight: bold;
height: 145px;
margin-top: 10px;
padding-bottom: 4px;
text-align: center;
width: 100%;
}

#samupdate form#samform {
display: block;
margin: 0 auto;
}

#samupdate table {
float: left;
margin-left: 8px;
width: 90%;
}

#samupdate td {
border: 0;
vertical-align: top;
}

#samupdate .statusseparator {
padding: 5px 0 0 8px;
}

#samupdate .moodseparator {
padding: 5px 0 0 8px;
}

#samupdate label {
float: left;
letter-spacing: 2px;
}

#samupdate input[type="text"]#textbox {
height: 20px;
line-height: 20px;
padding: 5px;
width: 185px;
}

#samupdate input[type="submit"]#statusbutton {
bottom: 10px;
height: 50px;
left: 9px;
letter-spacing: 2px;
line-height: 10px;
padding: 4px;
position: absolute;
width: 80px;
}

#samupdate input[type="submit"]#sambutton {
bottom: 10px;
height: 50px;
left: 105px;
letter-spacing: 2px;
line-height: 10px;
padding: 4px;
position: absolute;
width: 40px;
}

#samupdate input[type="submit"]#moodbutton {
bottom: 10px;
height: 50px;
letter-spacing: 2px;
line-height: 10px;
padding: 4px;
position: absolute;
right: 9px;
width: 80px;
}

/* End Sam Update *****/
/* End Sam ****/
/* End Logged In ***/
/*** Begin Signin */

#header #signin {
border-width: 0;
float: right;
font-size: 1em;
height: 83px;
margin: 0 19px 0 0;
width: 549px;
}

#header #signin div#content {
margin: 10px 0 0 15px;
width: 534px;/* Minus Left Margin (4th) From 549px */
}

#header #signin div#content a, 
#header #signin div#content a:visited {
text-align: center;
}

#header #signin div#content a:hover {
text-align: center;
}

#header #signin div#content table {
margin: 0;
}

#header #signin div#content table td {
border: 0;
padding: 0;
}

#header #signin div#content #username {
height: 18px;
line-height: 18px;
padding: 2px;
text-align: center;
vertical-align: middle;
}

#header #signin div#content #password {
height: 18px;
line-height: 18px;
margin-left: 4px;
padding: 2px;
text-align: center;
vertical-align: middle;
}

#header #signin div#content .button {
border: none;
cursor: pointer;
font-size: 11px;
font-weight: bold;
height: 21px;
left: 5px;
position: relative;
text-align: center;
top: 1.5px;
width: 100px;
}

#header #signin div#content #remember {
left: 0;
position: relative;
text-align: left;
text-decoration: none;
top: 3px;
}

#header #signin div#content #remember a.link, 
#header #signin div#content #remember a.link:visited {
font-size: 12px;
text-align: left;
text-decoration: none;
}

#header #signin div#content #remember a.link:hover {
font-size: 12px;
text-align: left;
text-decoration: none;
}

#header #signin div#content #forgot {
left: 5px;
position: relative;
text-align: left;
text-decoration: none;
top: 3px;
}

#header #signin div#content #forgot a.link, 
#header #signin div#content #forgot a.link:visited {
font-size: 12px;
text-align: left;
text-decoration: none;
}

#header #signin div#content #forgot a.link:hover {
font-size: 12px;
text-align: left;
text-decoration: none;
}

#header #signin div#content #rememberlife {
padding: 2px;
position: absolute;
right: 570px;
top: 18px;
}

#header #signin div#content #rememberlife #dropdown {
padding: 4px;
}

/* End Signin ***/
/*** Begin Tabs | Background Colors #5084c1 and #6398d1 */

#header #tabs {
border-width: 0;
clear: right;
float: right;
font-size: 1.1em;
font-family: times new roman;
height: 24px;
list-style-type: none;
margin: 0 18px 0 0;
text-align: center;
vertical-align: bottom;
width: 750px;
z-index: 205;
}

#header #tabs ul {
margin: 0;
}

#header #tabs ul li {
float: right;
height: 24px;
list-style-type: none;
text-align: center;
vertical-align: bottom;
width: 114px;
}

#header #tabs ul li a {
display: block;
font-family: times new roman;
font-size: 1em;
height: 24px;
padding-top: 4px;
text-decoration: none;
width: 100%;
}

#header #tabs ul li a.active {
display: block;
font-family: times new roman;
font-size: 1em;
height: 24px;
padding-top: 4px;
text-decoration: none;
width: 100%;
}

#header #tabs ul li a.active:hover {
display: block;
font-family: times new roman;
font-size: 1em;
height: 24px;
padding-top: 4px;
text-decoration: none;
width: 100%;
}

#header #tabs ul li a:hover {
display: block;
font-family: times new roman;
font-size: 1em;
height: 24px;
padding-top: 4px;
text-decoration: none;
width: 100%;
}

/* End Tabs ***/
/*** Begin Drop Down Navigation User */

html #header #navigationuser ul li {
height: 30px;
}

html #header #navigationuser ul li a {
height: 30px;
}

#header #navigationuser li:hover ul, 
#header #navigationuser li.over ul {
display: block;
height: 30px;
margin: 0 0 0 0;
}

#header #navigationuser {
display: block;
height: 33px;
left: 0;
line-height: 33px;
list-style-type: none;
margin: 0 auto;
padding-bottom: 0;
position: absolute;
top: 110px;
width: 100%;
z-index: 200;
}

#header #navigationuser ul {
list-style-type: none;
margin: 0;
padding: 0;
text-align: center;
}

#header #navigationuser ul li {
cursor: pointer;
display: inline;
float: left;
font-size: 13pt;
height: 30px;
line-height: 30px;
margin: 0;
width: 150px;/* 150px When Logged In */
}

#header #navigationuser ul li a {
display: block;
height: 30px;
line-height: 30px;
padding: 0;
text-decoration: none;
}

#header #navigationuser li ul {
border-top: 0;
display: none;
font-size: 10pt;
height: 28px;
line-height: 28px;
}

#header #navigationuser ul#subnav li {
display: inline;
float: left;
font-size: 10pt;
height: 28px;
line-height: 28px;
padding-bottom: 1px;
padding-left: 2px;
padding-right: 2px;
padding-top: 1px;
width: 146px;/* Minus Left & Right Padding From 150px */
}

#header #navigationuser ul#subnav li.first {
padding-bottom: 1px;
padding-left: 2px;
padding-right: 2px;
padding-top: 2px;
}

#header #navigationuser ul#subnav li.last {
padding-bottom: 2px;
padding-left: 2px;
padding-right: 2px;
padding-top: 1px;
}

#header #navigationuser ul#subnav li a {
display: block;
height: 26px;
line-height: 26px;
padding: 0;
text-decoration: none;
}

#header #navigationuser ul#subnav li a:hover {
border-radius: 4px;
-moz-border-radius: 4px;
-webkit-border-radius: 4px;
}

/**** Begin Home */

#header #navigationuser ul li.home {
width: 80px;
}

/* End Home ****/
/**** Begin Profile */

#header #navigationuser ul li.profile {
width: 100px;
}

/* End Profile ****/
/**** Begin More */

#header #navigationuser ul li.more {
width: 80px;
}

/* End More ****/
/**** Begin Member */

#header #navigationuser ul li.member {
width: 150px;
}

/* End More ****/
/**** Begin Search */

#header #navigationuser ul li#directorysearch {
float: right;
font-size: 13pt;
height: 32px;
line-height: 32px;
list-style-type: none;
margin: 0;
padding: 0;
position: absolute;
right: 0;
text-align: right;
width: 350px;
}

#header #navigationuser ul li#directorysearch #search {
margin: 0;
}

#header #navigationuser ul li#directorysearch #searchquery {
margin-right: 20px;
}

#header #navigationuser ul li#directorysearch #searchquery #input {
font-size: 10px;
height: 14px;
letter-spacing: 2px;
line-height: 14px;
padding: 2px;
text-align: center;
width: 220px;
}

#header #navigationuser ul li#directorysearch #searchquery .button {
border: none;
cursor: pointer;
font-size: 11px;
font-weight: bold;
height: 20px;
line-height: 20px;
margin-top: 6px;
padding: 0;
text-align: center;
vertical-align: top;
width: 50px;
}

/* End Search ****/
/* End Drop Down Navigation User ***/
/*** Begin Drop Down Navigation */

html #header #navigation ul li {
height: 30px;
}

html #header #navigation ul li a {
height: 30px;
}

#header #navigation li:hover ul, 
#header #navigation li.over ul {
display: block;
height: 30px;
margin: 0;
}

#header #navigation {
display: block;
height: 33px;
left: 0;
line-height: 33px;
list-style-type: none;
margin: 0 auto;
padding-bottom: 0;
position: absolute;
top: 110px;
width: 100%;
z-index: 200;
}

#header #navigation ul {
list-style-type: none;
margin: 0;
padding: 0;
text-align: center;
}

#header #navigation ul li {
cursor: pointer;
display: inline;
float: left;
font-size: 13pt;
height: 30px;
line-height: 30px;
margin: 0;
width: 100px;/* 100px When Logged Out - They Dont Need To Be As Big As When Logged In */
}

#header #navigation ul li a {
display: block;
height: 30px;
line-height: 30px;
padding: 0;
text-decoration: none;
}

#header #navigation li ul {
border-top: 0;
display: none;
font-size: 10pt;
height: 28px;
line-height: 28px;
}

#header #navigation ul#subnav li {
display: inline;
float: left;
font-size: 10pt;
height: 28px;
line-height: 28px;
padding: 1px 2px;
width: 146px;/* Minus Left & Right Padding From 150px */
}

#header #navigation ul#subnav li.first {
padding: 2px 2px 1px 2px;
}

#header #navigation ul#subnav li.last {
padding: 1px 2px 2px 2px;
}

#header #navigation ul#subnav li a {
display: block;
height: 26px;
line-height: 26px;
padding: 0;
text-decoration: none;
}

#header #navigation ul#subnav li a:hover {
border-radius: 5px;
-moz-border-radius: 5px;
-webkit-border-radius: 5px;
}

/**** Begin More */

#header #navigation ul li.more {
width: 80px;
}

/* End More ****/
/**** Begin Member */

#header #navigation ul li.member {
width: 150px;
}

/* End More ****/
/**** Begin Search */

#header #navigation ul li#directorysearch {
float: right;
font-size: 13pt;
height: 32px;
line-height: 32px;
list-style-type: none;
margin: 0;
padding: 0;
position: absolute;
right: 0;
text-align: right;
width: 350px;
}

#header #navigation ul li#directorysearch #search {
margin: 0;
}

#header #navigation ul li#directorysearch #searchquery {
margin-right: 20px;
}

#header #navigation ul li#directorysearch #searchquery #input {
font-size: 10px;
height: 14px;
letter-spacing: 2px;
line-height: 14px;
padding: 2px;
text-align: center;
width: 220px;
}

#header #navigation ul li#directorysearch #searchquery .button {
border: none;
cursor: pointer;
font-size: 11px;
font-weight: bold;
height: 20px;
line-height: 20px;
margin-top: 6px;
padding: 0;
text-align: center;
vertical-align: top;
width: 50px;
}

/* End Search ****/
/* End Drop Down Navigation ***/
/*** Begin Errors */

#error {
margin: 0 auto;
padding-bottom: 5px;
padding-top: 5px;
text-align: center;
width: 99.5%;
}

div#error table {
margin: 0;
}

div#error table td {
border: 0;
}

/**** Begin Url */

#error .url {
text-align: center;
width: 100%;
}

#error .url .row {
background-color: #fff;
}

#error .url .row .cell {
padding: 8px;
}

/* End Url ****/
/**** Begin Global */

#error .global {
text-align: center;
width: 100%;
}

#error .global .row {
background-color: #fff;
}

#error .global .row .cell {
padding: 8px;
}

/* End Global ****/
/**** Begin Login */

#error .login {
text-align: center;
width: 100%;
}

#error .login .row {
background-color: #fff;
}

#error .login .row .cell {
padding: 8px;
}

/* End Login ****/
/**** Begin Update */

#error .update {
text-align: center;
width: 100%;
}

#error .update .row {
background-color: #fff;
}

#error .update .row .cell {
padding: 8px;
}

#error .update .row .cell .header {
color: #f00;
}

#error .update .row .cell .list {
text-align: left;
}

/* End Update ****/
/**** Begin Register */

#error .register {
text-align: center;
width: 100%;
}

#error .register .row {
background-color: #fff;
}

#error .register .row .cell {
padding: 8px;
}

#error .register .row .cell .header {
color: #f00;
}

#error .register .row .cell .list {
text-align: left;
}

/* End Register ****/
/**** Begin Create Group */

#error .creategroup {
text-align: center;
width: 100%;
}

#error .creategroup .row {
background-color: #fff;
}

#error .creategroup .row .cell {
padding: 8px;
}

#error .creategroup .row .cell .header {
color: #f00;
}

#error .creategroup .row .cell .list {
text-align: left;
}

/* End Create Group ****/
/**** Begin Reset Password */

#error .resetpassword {
text-align: center;
width: 100%;
}

#error .resetpassword .row {
background-color: #fff;
}

#error .resetpassword .row .cell {
padding: 8px;
}

#error .resetpassword .row .cell .header {
color: #f00;
}

#error .resetpassword .row .cell .list {
text-align: left;
}

/* End Reset Password ****/
/* End Errors ***/
/*** Begin Messages */

#message {
margin: 0 auto;
padding-bottom: 5px;
padding-top: 5px;
text-align: center;
width: 99.5%;
}

div#message table {
margin: 0;
}

div#message table td {
border: 0;
}

/**** Begin Url */

#message .url {
text-align: center;
width: 100%;
}

#message .url .row {
background-color: #fff;
}

#message .url .row .cell {
padding: 8px;
}

/* End Url ****/
/**** Begin Global */

#message .global {
text-align: center;
width: 100%;
}

#message .global .row {
background-color: #fff;
}

#message .global .row .cell {
padding: 8px;
}

/* End Global ****/
/**** Begin Normal */

#message .normal {
text-align: center;
width: 100%;
}

#message .normal .row {
background-color: #fff;
}

#message .normal .row .cell {
padding: 8px;
}

/* End Normal ****/
/* End Messages ***/
/* End Header **/
/** Begin Footer */

#footer {
clear: both;
display: block;
font-size: 12pt;
min-height: 115px;
letter-spacing: 1px;
line-height: 1.1em;
margin: 0;
padding: 0;
width: 100%;
z-index: 200;
}

#togglefoot {
display: block;
}

/*** Begin Worldwide Languages */

#worldwidelang {
border-radius: 6px;
-moz-border-radius: 6px;
-webkit-border-radius: 6px;
cursor: pointer;
bottom: 10px;
display: block;
left: 38px;
padding: 10px;
position: fixed;
width: 180px;
z-index: 210;
}

#worldwidelang a {
cursor: pointer;
}

#worldwidelang a.close {
font-size: 14px;
padding-right: 10px;
text-align: right;
text-decoration: none;
width: 182px;
}

#worldwidelang .closespan {
border-radius: 4px;
-moz-border-radius: 4px;
-webkit-border-radius: 4px;
display: block;
height: 30px;
line-height: 30px;
font-size: 14px;
margin-bottom: 5px;
text-align: right;
width: 180px;
}

#worldwidelang .linkdiv {
width: 182px;
}

#worldwidelang a.languages {
font-size: 14px;
line-height: 25px;
text-align: left;
text-decoration: none;
width: 180px;
}

/* End Worldwide Languages ***/

#footer a, 
#footer a:visited {
font-size: 1em;
text-decoration: none;
}

#footer a:hover {
font-size: 1em;
}

#footer dl {
cursor: pointer;
font-size: 0.8em;
height: 100px;
line-height: 1.1em;
margin-top: 15px;
width: 226px;
}

#footer dl dt {
font-size: 1em;
margin-top: 0;
}

#footer dl dd {
font-size: 0.8em;
margin-top: 3px;
}

#footer dl.copyright {
float: left;
font-size: 0.8em;
height: 100px;/* Add 15 To DL Height */
line-height: 1.1em;
margin-top: 15px;
padding: 0;
text-align: left;
width: 226px;
}

#footer dl.copyright dt {
font-size: 1em;
margin-top: 0;
padding: 0;
padding-left: 10px;
}

#footer dl.copyright dd {
font-size: 0.8em;
margin-top: 3px;
}

#footer dl.homepagethemes {
float: right;
font-size: 0.8em;
height: 85px;
line-height: 1.1em;
margin-top: 15px;
padding: 0;
padding-right: 5px;
text-align: right;
width: 200px;
}

#footer dl.homepagethemes dt {
font-size: 1em;
margin-top: 0;
padding: 0;
padding-right: 6px;
}

#footer dl.homepagethemes dd {
font-size: 0.8em;
margin-top: 3px;
}

#footer dl.homepagethemes dd span span {
position: relative;
right: 3px;
top: -3px;
}

#footer dl.aboutus {
float: right;
font-size: 0.8em;
height: 85px;
line-height: 1.1em;
margin-top: 15px;
padding: 0;
padding-right: 10px;
text-align: right;
width: 160px;
}

#footer dl.aboutus dt {
font-size: 1em;
margin-top: 0;
padding: 0;
}

#footer dl.aboutus dd {
font-size: 0.8em;
margin-top: 3px;
}

#footer dl.companyrelations {
float: right;
font-size: 0.8em;
height: 85px;
line-height: 1.1em;
margin-top: 15px;
padding: 0;
padding-right: 10px;
text-align: right;
width: 188px;
}

#footer dl.companyrelations dt {
font-size: 1em;
margin-top: 0;
padding: 0;
}

#footer dl.companyrelations dd {
font-size: 0.8em;
margin-top: 3px;
}

#footer dl.explore {
float: right;
font-size: 0.8em;
height: 85px;
line-height: 1.1em;
margin-top: 15px;
padding: 0;
padding-right: 20px;
text-align: right;
width: 170px;
}

#footer dl.explore dt {
font-size: 1em;
margin-top: 0;
padding-bottom: 0;
}

#footer dl.explore dd {
font-size: 0.8em;
margin-top: 3px;
}

/*** Begin Homepage Themes */

#footer .blue {
color: blue;
display: block;
float: left;
font-size: 0.9em;
padding: 1.5px;
text-decoration: none;
width: 70px;
}

#footer .orange {
color: orange;
display: block;
float: right;
font-size: 0.9em;
padding: 1.5px;
text-decoration: none;
width: 78px;
}

#footer .green {
color: green;
display: block;
float: left;
font-size: 0.9em;
padding: 1.5px;
text-decoration: none;
width: 70px;
}

#footer .yellow {
color: yellow;
display: block;
float: right;
font-size: 0.9em;
padding: 1.5px;
text-decoration: none;
width: 78px;
}

#footer .red {
color: red;
display: block;
float: left;
font-size: 0.9em;
padding: 1.5px;
text-decoration: none;
width: 70px;
}

#footer .black {
color: black;
display: block;
float: right;
font-size: 0.9em;
padding: 1.5px;
text-decoration: none;
width: 78px;
}

/* End Homepage Themes ***/
/* End Footer **/
/** Begin Main */

div.pagecontent {
clear: both;
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=94)";
filter: alpha(opacity=94);
height: 100%;
margin: 0 auto;
-moz-opacity: 0.94;
-khtml-opacity: 0.94;
opacity: 0.94;
padding-bottom: 15px;
padding-top: 15px;
text-align: center;
width: 960px;
z-index: 100;
}

small.formreminder {
color: #f00;
}

/* End Main **/
/* End Global */
/* Begin Sub */
/* Begin Homepage */

div#home_pagecontent {
}

div#homepage_content {
margin: 0 auto;
width: 98%;
}

div#homepage_header {
background-color: #ebf4fb;
border: 1px solid #acd8f0;
border-radius: 6px;
-khtml-border-radius: 6px;
-moz-border-radius: 6px;
-opera-border-radius: 6px;
-webkit-border-radius: 6px;
display: block;
}

div#homepage_header div {
font-size: 40pt;
margin: 24px;
}

div#panels {
clear: both;
display: block;
margin-top: 10px;
}

div#panels div#stats {
background-color: #ebf4fb;
border: 1px solid #acd8f0;
border-radius: 6px;
-khtml-border-radius: 6px;
-moz-border-radius: 6px;
-opera-border-radius: 6px;
-webkit-border-radius: 6px;
clear: right;
display: block;
float: left;
min-height: 320px;
width: 40%;
}

div#panels div#stats div.header {
font-size: 30pt;
margin: 10px;
}

div#panels div#stats div.content {
background-color: #ebf4fb;
clear: both;
font-size: 22pt;
line-height: 2.2em;
margin: 0 auto;
margin: 10px;
}

div#panels div#members_online {
background-color: #ebf4fb;
border: 1px solid #acd8f0;
border-radius: 6px;
-khtml-border-radius: 6px;
-moz-border-radius: 6px;
-opera-border-radius: 6px;
-webkit-border-radius: 6px;
display: block;
float: left;
margin-left: 1%;
min-height: 320px;
text-align: center;
width: 27.5%;
}

div#panels div#members_online div.header {
font-size: 20pt;
margin: 10px;
}

div#panels div#members_online div.content {
background-color: #ebf4fb;
clear: both;
margin: 0 auto;
margin: 10px;
}

div#panels div#updates {
background-color: #ebf4fb;
border: 1px solid #acd8f0;
border-radius: 6px;
-khtml-border-radius: 6px;
-moz-border-radius: 6px;
-opera-border-radius: 6px;
-webkit-border-radius: 6px;
clear: right;
display: block;
float: right;
min-height: 320px;
width: 30%;
}

div#panels div#updates div.header {
font-size: 26pt;
margin: 10px;
}

div#panels div#updates div.content {
background-color: #ebf4fb;
clear: both;
margin: 0 auto;
margin: 10px;
text-align: left;
width: 90%;
}

div#panels div#updates div.content a {
text-decoration: none;
}

div#fmembers {
background-color: #ebf4fb;
border: 1px solid #acd8f0;
border-radius: 6px;
-khtml-border-radius: 6px;
-moz-border-radius: 6px;
-opera-border-radius: 6px;
-webkit-border-radius: 6px;
clear: both;
display: block;
text-align: center;
}

div#fmembers div.header {
font-size: 26pt;
margin: 10px;
}

div#fmembers div.content {
background-color: #ebf4fb;
clear: both;
margin: 0 auto;
margin: 10px;
text-align: center;
}

div#fmembers div.content a {
text-decoration: none;
}

div#fmembers div.content div.container {
margin: 0 auto;
text-align: center;
width: 100%;
}

div.friendsection {
background-color: #fff;
border-radius: 6px;
-moz-border-radius: 6px;
-webkit-border-radius: 6px;
clear: right;
display: block;
float: left;
margin: 0 auto;
margin: 5px;
padding: 5px;
text-align: center;
width: 17.8%;
}

div.friendsection img.friend {
border-radius: 6px;
-moz-border-radius: 6px;
-webkit-border-radius: 6px;
border-width: 0px;
height: auto;
margin-top: 4px;
width: 100px;
}

div.friendsection div.name {
margin-top: 4px;
}

/* End Homepage */
/* Begin Members */

div#members_pagecontent {
margin: 0 auto;
}

/** Begin More Info */

.moreinfo {
border-radius: 6px;
-moz-border-radius: 6px;
-webkit-border-radius: 6px;
display: inline;
height: 190px;
margin-left: 8px;
margin-top: 10px;
padding: 10px;
position: absolute;
width: 210px;/* 40 Less Then Fieldset Width */
z-index: 105;
}

.moreinfo a {
cursor: pointer;
}

.moreinfo a.close {
font-size: 14px;
line-height: 23px;
padding-right: 5px;
text-align: right;
text-decoration: none;
width: 150px;
}

.moreinfo a:hover {
}

.moreinfo .closespan {
border-radius: 4px;
-moz-border-radius: 4px;
-webkit-border-radius: 4px;
display: block;
height: 23px;
line-height: 13px;
font-size: 14px;
font-weight: bold;
padding: 5px;
text-align: right;
}

.moreinfo .header {
float: left;
font-size: 14px;
font-weight: bold;
letter-spacing: 2px;
padding-left: 5px;
padding-top: 2px;
text-align: left;
}

.moreinfo .splash {
border-radius: 4px;
-moz-border-radius: 4px;
-webkit-border-radius: 4px;
display: block;
font-size: 14px;
font-weight: bold;
height: auto;
margin-top: 10px;
padding-bottom: 6px;
padding-left: 15px;
padding-right: 15px;
padding-top: 6px;
text-align: left;
}

.moreinfo .splash div {
margin-bottom: 1px;
}

/* End More Info **/
/** Begin Customize Profile */

div#customizeprofile_pagecontent textarea#user_style {
font-size: 14px;
padding: 10px;
text-align: left;
}

div#customizeprofile_pagecontent .globalthemes .themecode {
margin: 0 auto;
text-align: center;
}

div#customizeprofile_pagecontent .globalthemes .themecode textarea {
font-size: 14px;
padding: 10px;
text-align: left;
}

/* End Customize Profile **/
/** Begin User Profile */

#defaultuserimage {
border-width: 0;
border-radius: 6px;
-moz-border-radius: 6px;
-webkit-border-radius: 6px;
height: auto;
width: 200px;
}

/*** Begin Voters */

#voters {
border-radius: 6px;
-moz-border-radius: 6px;
-webkit-border-radius: 6px;
display: block;
height: 218px;
right: 335px;
padding: 10px;
position: absolute;
top: 0;
width: 300px;
z-index: 1;
}

#voters a {
cursor: pointer;
}

#voters a.close {
font-size: 14px;
line-height: 30px;
padding-right: 5px;
text-align: right;
text-decoration: none;
width: 150px;
}

#voters .closespan {
border-radius: 4px;
-moz-border-radius: 4px;
-webkit-border-radius: 4px;
display: block;
height: 30px;
line-height: 20px;
font-size: 14px;
font-weight: bold;
padding: 5px;
text-align: right;
}

#voters .header {
float: left;
font-size: 14px;
font-weight: bold;
letter-spacing: 2px;
padding-left: 5px;
padding-top: 2px;
text-align: left;
}

#voters .splash {
border-radius: 4px;
-moz-border-radius: 4px;
-webkit-border-radius: 4px;
display: block;
font-size: 14px;
font-weight: bold;
height: 150px;
margin-top: 10px;
padding: 8px;
text-align: center;
}

/* End Voters ***/
/* End User Profile **/
/* Begin User Profile Lite View **/
/*** Begin Voters */

#voters_lite {
border-radius: 6px;
-moz-border-radius: 6px;
-webkit-border-radius: 6px;
display: block;
height: 112px;
right: 210px;
padding: 10px;
position: absolute;
top: 0;
width: 350px;
z-index: 1;
}

#voters_lite a {
cursor: pointer;
}

#voters_lite a.close {
font-size: 14px;
line-height: 30px;
padding-right: 5px;
text-align: right;
text-decoration: none;
width: 150px;
}

#voters_lite a:hover {
}

#voters_lite .closespan {
border-radius: 4px;
-moz-border-radius: 4px;
-webkit-border-radius: 4px;
display: block;
height: 30px;
line-height: 20px;
font-size: 14px;
font-weight: bold;
padding: 5px;
text-align: right;
}

#voters_lite .header {
float: left;
font-size: 14px;
font-weight: bold;
letter-spacing: 2px;
padding-left: 5px;
padding-top: 2px;
text-align: left;
}

#voters_lite .splash {
border-radius: 4px;
-moz-border-radius: 4px;
-webkit-border-radius: 4px;
display: block;
font-size: 14px;
font-weight: bold;
height: 47px;
margin-top: 10px;
padding: 8px;
text-align: center;
}

/* End Voters ***/
/* End User Profile Lite View **/
/* End Members */
/* End Sub */
/* End User Interface */
/* Begin Theme */

body {
background: url('i/b/<?php echo $css[($theme - 1)]; ?>/cor7.png');
background-attachment: fixed;
background-color: <?php echo $body_bgcolor; ?>;
background-position: top left;
background-repeat: repeat;
color: <?php echo $body_color; ?>;
}

a {
color: <?php echo $acolor; ?>;
}

a:hover {
color: <?php echo $ahovercolor; ?>;
}

hr {
color: <?php echo $hrcolor; ?>;
}

#header {
background: url('i/b/<?php echo $css[($theme - 1)]; ?>/banner_background.png');
background-attachment: scroll;
background-position: top left;
background-repeat: repeat;
}

#header #hnslogo .sitename {
color: #fff;
}

#header #hnslogo .sitenamer {
color: #fff;
}

#header #hnslogo .sitenamer a.sitelink {
color: #fff;
}

#header #hnslogo .sitenamer a.sitelink:hover {
color: #fff;
}

#header #hnslogo .siteslogan {
color: rgb(184,211,97);
}

#header #hnslogo .sitesloganr {
color: rgb(184,211,97);
}

#header #loggedin {
background: url('i/b/<?php echo $css[($theme - 1)]; ?>/top_login_background25.png');
background-attachment: scroll;
background-position: top center;
background-repeat: no-repeat;
border-width: 0;
color: #00468c;
}

#header #loggedin a, 
#header #loggedin a:visited {
color: #fff;
}

#header #loggedin a:hover {
border-bottom: 1px dotted #fff;
color: #fff;
}

#sam .status {
color: #00468c;
}

#sam .status .text {
color: #fff;
}

#sam .mood {
color: #00468c;
}

#sam .mood .text {
color: #fff;
}

#samupdate {
background-color: #ccf;
border: 1px solid #5084c1;
}

#samupdate a {
color: #004080;
}

#samupdate a:hover {
color: #6398d1;
}

#samupdate .closespan {
background-color: #5084c1;
}

#samupdate .splash {
background-color: #6398d1;
}

#samupdate label {
color: #fff;
}

#header #signin {
background: url('i/b/<?php echo $css[($theme - 1)]; ?>/top_login_background25.png');
background-attachment: scroll;
background-position: top center;
background-repeat: no-repeat;
color: #00468c;
}

#header #signin div#content a, 
#header #signin div#content a:visited {
color: #fff;
}

#header #signin div#content a:hover {
color: #fff;
}

#header #signin div#content #username {
color: #000;
}

#header #signin div#content #password {
color: #000;
}

#header #signin div#content .button {
background: url(i/b/<?php echo $css[($theme - 1)]; ?>/button_sign_in.png) no-repeat;
color: #fff;
}

#header #signin div#content #remember a.link, 
#header #signin div#content #remember a.link:visited {
color: #fff;
}

#header #signin div#content #remember a.link:hover {
color: #fff;
}

#header #signin div#content #forgot a.link, 
#header #signin div#content #forgot a.link:visited {
color: #fff;
}

#header #signin div#content #forgot a.link:hover {
color: #fff;
}

#header #tabs {
color: #fff;
}

#header #tabs ul li a {
background-attachment: scroll;
background-color: transparent;
background-image: url('i/b/<?php echo $css[($theme - 1)]; ?>/n/tab_inactive25s.png');
background-position: 0% 0%;
background-repeat: no-repeat;
color: #fff;
}

#header #tabs ul li a.active {
background-attachment: scroll;
background-color: transparent;
background-image: url('i/b/<?php echo $css[($theme - 1)]; ?>/n/tab_active25s.png');
background-position: 0% 0%;
background-repeat: no-repeat;
color: #fff;
}

#header #tabs ul li a.active:hover {
background-attachment: scroll;
background-color: transparent;
background-image: url('i/b/<?php echo $css[($theme - 1)]; ?>/n/tab_active25s.png');
background-position: 0% 0%;
background-repeat: no-repeat;
color: #6398d1;
}

#header #tabs ul li a:hover {
background-attachment: scroll;
background-color: transparent;
background-image: url('i/b/<?php echo $css[($theme - 1)]; ?>/n/tab_active25s.png');
background-position: 0% 0%;
background-repeat: no-repeat;
color: #6398d1;
}

#header #navigationuser {
background-attachment: scroll;
background-color: transparent;
background-image: url('i/b/<?php echo $css[($theme - 1)]; ?>/n/background.jpg');
background-position: 0% 0%;
background-repeat: repeat-x;
}

#header #navigationuser ul li a {
background-color: rgb(210,231,242);
border: 1px solid rgb(139,191,222);
color: #777;
}

#header #navigationuser ul li a:hover {
background-color: rgb(187,217,236);
}

#header #navigationuser ul#subnav li {
background-color: rgb(139,191,222);
}

#header #navigationuser ul#subnav li a {
background-color: rgb(139,191,222);
border: 1px solid rgb(139,191,222);
color: #777;
}

#header #navigationuser ul#subnav li a:hover {
background-color: rgb(210,231,242);
border: 1px solid #5084c1;
}

#header #navigationuser ul li#directorysearch #searchquery #input {
color: #afafaf;
}

#header #navigationuser ul li#directorysearch #searchquery .button {
background: url(i/b/<?php echo $css[($theme - 1)]; ?>/button_search.png) no-repeat;
color: #fff;
}

#header #navigation {
background-attachment: scroll;
background-color: transparent;
background-image: url('i/b/<?php echo $css[($theme - 1)]; ?>/n/background.jpg');
background-position: 0% 0%;
background-repeat: repeat-x;
}

#header #navigation ul li a {
background-color: rgb(210,231,242);
border: 1px solid rgb(139,191,222);
color: #777;
}

#header #navigation ul li a:hover {
background-color: rgb(187,217,236);
}

#header #navigation ul#subnav li {
background-color: rgb(139,191,222);
}

#header #navigation ul#subnav li a {
background-color: rgb(139,191,222);
border: 1px solid rgb(139,191,222);
color: #777;
}

#header #navigation ul#subnav li a:hover {
background-color: rgb(210,231,242);
border: 1px solid #5084c1;
}

#header #navigation ul li#directorysearch {
color: #fff;
}

#header #navigation ul li#directorysearch #searchquery #input {
color: #afafaf;
}

#header #navigation ul li#directorysearch #searchquery .button {
background: url(i/b/<?php echo $css[($theme - 1)]; ?>/button_search.png) no-repeat;
color: #fff;
}

#error .url .row {
background-color: #fff;
}

#error .global .row {
background-color: #fff;
}

#error .login .row {
background-color: #fff;
}

#error .update .row {
background-color: #fff;
}

#error .register .row {
background-color: #fff;
}

#error .register .row .cell .header {
color: #f00;
}

#error .creategroup .row {
background-color: #fff;
}

#error .creategroup .row .cell .header {
color: #f00;
}

#error .resetpassword .row {
background-color: #fff;
}

#error .resetpassword .row .cell .header {
color: #f00;
}

#message .url .row {
background-color: #fff;
}

#message .global .row {
background-color: #fff;
}

#message .normal .row {
background-color: #fff;
}

#footer {
background: url('i/b/<?php echo $css[($theme - 1)]; ?>/footer_background.png');
background-attachment: scroll;
background-color: transparent;
background-position: bottom left;
background-repeat: repeat;
}

#worldwidelang {
background-color: #ccccff;
border: 1px solid #5084c1;
}

#worldwidelang a {
color: #004080;
}

#worldwidelang a.close {
color: #004080;
}

#worldwidelang a:hover {
color: #6398d1;
}

#worldwidelang .closespan {
background-color: #5084c1;
}

#worldwidelang a.languages:hover {
color: #6398d1;
}

#footer a, 
#footer a:visited {
color: #fff;
}

#footer a:hover {
border-bottom: 1px dotted #fff;
color: #fff;
}

#footer dl {
color: #badf74;
}

#footer dl dt {
color: #badf74;
}

#footer dl.copyright {
color: #badf74;
}

#footer dl.copyright dt {
color: #badf74;
}

#footer dl.homepagethemes {
background: url('i/Line%20Seperator.png');
background-attachment: scroll;
background-color: transparent;
background-position: top right;
background-repeat: no-repeat;
color: #badf74;
}

#footer dl.homepagethemes dt {
color: #badf74;
}

#footer dl.aboutus {
background: url('i/Line%20Seperator.png');
background-attachment: scroll;
background-color: transparent;
background-position: top right;
background-repeat: no-repeat;
color: #badf74;
}

#footer dl.aboutus dt {
color: #badf74;
}

#footer dl.companyrelations {
background: url('i/Line%20Seperator.png');
background-attachment: scroll;
background-color: transparent;
background-position: top right;
background-repeat: no-repeat;
color: #badf74;
}

#footer dl.explore {
color: #badf74;
}

#footer dl.explore dt {
color: #badf74;
}

#footer .blue {
color: blue;
}

#footer .orange {
color: orange;
}

#footer .green {
color: green;
}

#footer .yellow {
color: yellow;
}

#footer .red {
color: red;
}

#footer .black {
color: black;
}

div.pagecontent {
background-color: #ecffff;
}

small.formreminder {
color: #f00;
}

/* Begin Members */
/** Begin More Info */

.moreinfo {
background-color: #ccf;
border: 1px solid #5084c1;
}

.moreinfo a {
color: #004080;
}

.moreinfo a.close {
color: #004080;
}

.moreinfo a:hover {
color: #6398d1;
}

.moreinfo .closespan {
background-color: #5084c1;
}

.moreinfo .splash {
background-color: #6398d1;
}

/* End More Info **/
/** Begin User Profile */
/*** Begin Voters */

#voters {
background-color: #ccf;
border: 1px solid #5084c1;
}

#voters a {
color: #004080;
}

#voters a.close {
color: #004080;
}

#voters a:hover {
color: #6398d1;
}

#voters .closespan {
background-color: #5084c1;
}

#voters .splash {
background-color: #6398d1;
}

/* End Voters ***/
/* End User Profile **/
/* Begin User Profile Lite View **/
/*** Begin Voters */

#voters_lite {
background-color: #ccf;
border: 1px solid #5084c1;
}

#voters_lite a {
color: #004080;
}

#voters_lite a.close {
color: #004080;
}

#voters_lite a:hover {
color: #6398d1;
}

#voters_lite .closespan {
background-color: #5084c1;
}

#voters_lite .splash {
background-color: #6398d1;
}

/* End Voters ***/
/* End User Profile Lite View **/
/* End Members */
/* End Theme */

div.pagecontent input[type="file"] {
font-size: 13pt;
height: 36px;
letter-spacing: 2px;
line-height: 29px;
}

div.pagecontent input[type="text"] {
font-size: 13pt;
height: 36px;
letter-spacing: 2px;
line-height: 29px;
}

div.pagecontent input[type="password"] {
font-size: 13pt;
height: 36px;
letter-spacing: 2px;
line-height: 29px;
}

div.pagecontent input[type="submit"] {
font-size: 13pt;
height: 36px;
letter-spacing: 2px;
line-height: 29px;
}

div.pagecontent input[type="button"] {
font-size: 13pt;
height: 36px;
letter-spacing: 2px;
line-height: 29px;
}

div.pagecontent input[type="reset"] {
font-size: 13pt;
height: 36px;
letter-spacing: 2px;
line-height: 29px;
}

div.pagecontent input[type="radio"] {
font-size: 14pt;
height: 25px;
letter-spacing: 2px;
line-height: 25px;
}

#star {
margin: 0 auto;
padding-top: 5px;
width: 125px;
}

#star ul.star {
background: url('i/sy/st/stars.gif') repeat-x;
cursor: pointer;
float: left;
height: 20px;
left: 0;
list-style-type: none;
margin: 0;
padding: 0;
position: relative;
top: -5px;
width: 85px;
}

#star li {
display: block;
float: left;
height: 20px;
left: 0;
margin: 0;
padding: 0;
position: absolute;
text-decoration: none;
text-indent: -9000px;
width: 85px;
z-index: 20;
}

#star li.curr {
background: url('i/sy/st/stars.gif') left 25px;
font-size: 1px;
}

#star div.user {
color: #888;
float: left;
font-family: arial;
font-size: 13px;
left: 15px;
position: relative;
width: 30px;
}

div#pageheader {
background-color: <?php echo $phd_bgcolor; ?>;
border: 2px solid <?php echo $phd_bordercolor; ?>;
display: block;
height: auto;
line-height: 110px;
margin: 0 auto;
margin-bottom: 20px;
margin-left: 20px;
margin-right: 20px;
text-align: left;
width: 915px;
}

div#pageheader div.heading {
font-size: 40px;
left: 20px;
letter-spacing: 1px;
position: relative;
}

div.pageheader1 {
border-radius: 8px;
-moz-border-radius: 8px;
-webkit-border-radius: 8px;	
}

div.pageheader2 {
border-top-left-radius: 8px;
border-top-right-radius: 8px;
-moz-border-radius-topleft: 8px;
-moz-border-radius-topright: 8px;
-webkit-border-top-left-radius: 8px;
-webkit-border-top-right-radius: 8px;
}