// These are the variables; you can change these if you want
var expDays = 365;  // How many days to remember the setting
var standardStyle = '1'; // This is the number of your standard style sheet; this will be used when the user did not do anything.
var theme = 'hnsmaintheme'; // This is the name of the cookie that is used.  
var urlToCSSDirectory = './css/'; // This is the URL to your directory where your .css files are placed on your site.

// Now you can set here the names of your different .css files; exactly the name as set on your website
var ScreenCSS_1 = 'globalblue.css';
var ScreenCSS_2 = 'globalorange.css';
var ScreenCSS_3 = 'globalgreen.css';
var ScreenCSS_4 = 'globalyellow.css';
var ScreenCSS_5 = 'globalred.css';
var ScreenCSS_6 = 'globalblack.css';

// If you use different .css files for printing a document, you can set these.  If you don't even know what this is, name then everything exactly the same as above.
// So: make then PrintCSS_1 the same as ScreenCSS_1, for example "screen_1.css".
var PrintCSS_1 = 'globalblue.css';
var PrintCSS_2 = 'globalorange.css';
var PrintCSS_3 = 'globalgreen.css';
var PrintCSS_4 = 'globalyellow.css';
var PrintCSS_5 = 'globalred.css';
var PrintCSS_6 = 'globalblack.css';


/***********************************************************************************************
	
	DO NOT CHANGE ANYTHING UNDER THIS LINE, UNLESS YOU KNOW WHAT YOU ARE DOING
	
***********************************************************************************************/

// This is the main function that does all the work
function switchStyleOfUser(){
	var hnsmaintheme = GetCookie(theme);
	if (hnsmaintheme == null) {
		hnsmaintheme = standardStyle;
	}
	
	if (hnsmaintheme == "1") { document.write('<link rel="stylesheet" type"text/css" href="' + urlToCSSDirectory + ScreenCSS_1 + '" media="screen" />'); }
	if (hnsmaintheme == "2") { document.write('<link rel="stylesheet" type"text/css" href="' + urlToCSSDirectory + ScreenCSS_2 + '" media="screen" />'); }
	if (hnsmaintheme == "3") { document.write('<link rel="stylesheet" type"text/css" href="' + urlToCSSDirectory + ScreenCSS_3 + '" media="screen" />'); }
	if (hnsmaintheme == "4") { document.write('<link rel="stylesheet" type"text/css" href="' + urlToCSSDirectory + ScreenCSS_4 + '" media="screen" />'); }
	if (hnsmaintheme == "5") { document.write('<link rel="stylesheet" type"text/css" href="' + urlToCSSDirectory + ScreenCSS_5 + '" media="screen" />'); }
	if (hnsmaintheme == "6") { document.write('<link rel="stylesheet" type"text/css" href="' + urlToCSSDirectory + ScreenCSS_6 + '" media="screen" />'); }
	
	if (hnsmaintheme == "1") { document.write('<link rel="stylesheet" type"text/css" href="' + urlToCSSDirectory + PrintCSS_1 + '" media="print" />'); }
	if (hnsmaintheme == "2") { document.write('<link rel="stylesheet" type"text/css" href="' + urlToCSSDirectory + PrintCSS_2 + '" media="print" />'); }
	if (hnsmaintheme == "3") { document.write('<link rel="stylesheet" type"text/css" href="' + urlToCSSDirectory + PrintCSS_3 + '" media="print" />'); }
	if (hnsmaintheme == "4") { document.write('<link rel="stylesheet" type"text/css" href="' + urlToCSSDirectory + PrintCSS_4 + '" media="print" />'); }
	if (hnsmaintheme == "5") { document.write('<link rel="stylesheet" type"text/css" href="' + urlToCSSDirectory + PrintCSS_5 + '" media="print" />'); }
	if (hnsmaintheme == "6") { document.write('<link rel="stylesheet" type"text/css" href="' + urlToCSSDirectory + PrintCSS_6 + '" media="print" />'); }

	var hnsmaintheme = "";
	return hnsmaintheme;
}

var exp = new Date(); 
exp.setTime(exp.getTime() + (expDays*24*60*60*1000));

// Function to get the settings of the user
function getCookieVal (offset) {  
	var endstr = document.cookie.indexOf (";", offset);  
	if (endstr == -1)    
	endstr = document.cookie.length;  
	return unescape(document.cookie.substring(offset, endstr));
}
	
// Function to get the settings of the user
function GetCookie (name) {  
	var arg = name + "=";  
	var alen = arg.length;  
	var clen = document.cookie.length;  
	var i = 0;  
	while (i < clen) {    
		var j = i + alen;    
		if (document.cookie.substring(i, j) == arg)      
		return getCookieVal (j);    
		i = document.cookie.indexOf(" ", i) + 1;    
		if (i == 0) break;   
	}  
	return null;
}

// Function to remember the settings
function SetCookie (name, value) {
	var argv = SetCookie.arguments;  
	var argc = SetCookie.arguments.length;  
	var expires = (argc > 2) ? argv[2] : null;  
	var path = (argc > 3) ? argv[3] : null;  
	var domain = (argc > 4) ? argv[4] : null;  
	var secure = (argc > 5) ? argv[5] : false;  
	document.cookie = name + "=" + escape (value) + 
	((expires == null) ? "" : ("; expires=" + expires.toGMTString())) + 
	((path == null) ? "" : ("; path=" + path)) +  
	((domain == null) ? "" : ("; domain=" + domain)) +    
	((secure == true) ? "; secure" : "");
}

// Function to remove the settings
function DeleteCookie (name) {  
	var exp = new Date();  
	exp.setTime (exp.getTime() - 1);  
	var cval = GetCookie (name);  
	document.cookie = name + "=" + cval + "; expires=" + exp.toGMTString();
}

// This function is used when the user gives his selection
function doRefresh(){
	location.reload();
}

// This will call the main function.  Do not remove this, because otherwise this script will do nothing...
document.write(switchStyleOfUser());