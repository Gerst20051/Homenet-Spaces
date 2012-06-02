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
if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
return new XMLHttpRequest();
}

if (window.ActiveXObject) { // code for IE6, IE5
return new ActiveXObject("Microsoft.XMLHTTP");
}

return null;
}

function GetXmlHttpObject() {
var xmlhttp = null;

try { // IE7+, Firefox, Chrome, Opera 8.0+, Safari
xmlhttp = new XMLHttpRequest();
} catch (e) { // Internet Explorer 5, 6
try {
xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}
}

return xmlhttp;
}