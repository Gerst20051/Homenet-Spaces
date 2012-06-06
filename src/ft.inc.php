<?php
if (isset($_GET['furlmessage'])) {
$footer_url_message = urldecode($_GET['furlmessage']);

echo '<!-- Begin footer url message -->' . "\n";
echo '<div id="message">' . "\n" . '<table class="url">' . "\n" . '<tr class="row">' . "\n";
echo '<td class="cell">' . stripslashes($footer_url_message) . '</td>' . "\n";
echo '</tr>' . "\n" . '</table>' . "\n" . '</div>' . "\n";
echo '<!-- End footer url message -->' . "\n";
}

if (isset($_GET['furlerror'])) {
$footer_url_error = urldecode($_GET['furlerror']);

echo '<!-- Begin footer url error -->' . "\n";
echo '<div id="error">' . "\n" . '<table class="url">' . "\n" . '<tr class="row">' . "\n";
echo '<td class="cell">' . stripslashes($footer_url_error) . '</td>' . "\n";
echo '</tr>' . "\n" . '</table>' . "\n" . '</div>' . "\n";
echo '<!-- End footer url error -->' . "\n";
}

if (isset($footer_globalmessage)) {
echo '<!-- Begin footer global message -->' . "\n";
echo '<div id="message">' . "\n" . '<table class="global">' . "\n" . '<tr class="row">' . "\n";
echo '<td class="cell">' . $footer_globalmessage . '</td>' . "\n";
echo '</tr>' . "\n" . '</table>' . "\n" . '</div>' . "\n";
echo '<!-- End footer global message -->' . "\n";
}

if (isset($footer_message)) {
echo '<!-- Begin footer message -->' . "\n";
echo '<div id="message">' . "\n" . '<table class="normal">' . "\n" . '<tr class="row">' . "\n";
echo '<td class="cell">' . $footer_message . '</td>' . "\n";
echo '</tr>' . "\n" . '</table>' . "\n" . '</div>' . "\n";
echo '<!-- End footer message -->' . "\n";
}

if (isset($footer_error)) {
echo '<!-- Begin footer global errors -->' . "\n";
echo '<div id="error">' . "\n" . '<table class="global">' . "\n" . '<tr class="row">' . "\n";
echo '<td class="cell">' . $footer_error . '</td>' . "\n";
echo '</tr>' . "\n" . '</table>' . "\n" . '</div>' . "\n";
echo '<!-- End footer global errors -->' . "\n";
}

if (isset($footer_loginerror)) {
echo '<!-- Begin footer login error -->' . "\n";
echo '<div id="error">' . "\n" . '<table class="login">' . "\n" . '<tr class="row">' . "\n";
echo '<td class="cell">' . $footer_loginerror . '</td>' . "\n";
echo '</tr>' . "\n" . '</table>' . "\n" . '</div>' . "\n";
echo '<!-- End footer login error -->' . "\n";
}

if (count($footer_updateerrors) > 0) {
echo '<!-- Begin footer update errors -->' . "\n";
echo '<div id="error">' . "\n" . '<table class="update">' . "\n" . '<tr class="row">' . "\n";
echo '<td class="cell">' . "\n";
echo '<div><strong class="header">' . $TEXT['header-updateerrors_header'] . '</strong></div>' . "\n";
echo '<div class="list">' . "\n";
echo '<div>' . $TEXT['header-updateerrors_listheader'] . '</div>' . "\n";
echo '<ul>' . "\n";

foreach ($footer_updateerrors as $footer_updateerror) {
echo '<li>' . $footer_updateerror . '</li>' . "\n";
}

echo '</ul>' . "\n";
echo '</div>' . "\n";
echo '</td>' . "\n";
echo '</tr>' . "\n" . '</table>' . "\n" . '</div>' . "\n";
echo '<!-- End footer update errors -->' . "\n";
}

if (count($footer_registererrors) > 0) {
echo '<!-- Begin footer register errors -->' . "\n";
echo '<div id="error">' . "\n" . '<table class="register">' . "\n" . '<tr class="row">' . "\n";
echo '<td class="cell">' . "\n";
echo '<div><strong class="header">' . $TEXT['header-registererrors_header'] . '</strong></div>' . "\n";
echo '<div class="list">' . "\n";
echo '<div>' . $TEXT['header-registererrors_listheader'] . '</div>' . "\n";
echo '<ul>' . "\n";

foreach ($footer_registererrors as $footer_registererror) {
echo '<li>' . $footer_registererror . '</li>' . "\n";
}

echo '</ul>' . "\n";
echo '</div>' . "\n";
echo '</td>' . "\n";
echo '</tr>' . "\n" . '</table>' . "\n" . '</div>' . "\n";
echo '<!-- End footer register errors -->' . "\n";
}

if (count($footer_creategrouperrors) > 0) {
echo '<!-- Begin footer create group errors -->' . "\n";
echo '<div id="error">' . "\n" . '<table class="creategroup">' . "\n" . '<tr class="row">' . "\n";
echo '<td class="cell">' . "\n";
echo '<div><strong class="header">' . $TEXT['header-creategrouperrors_header'] . '</strong></div>' . "\n";
echo '<div class="list">' . "\n";
echo '<div>' . $TEXT['header-creategrouperrors_listheader'] . '</div>' . "\n";
echo '<ul>' . "\n";

foreach ($footer_creategrouperrors as $footer_creategrouperror) {
echo '<li>' . $footer_creategrouperror . '</li>' . "\n";
}

echo '</ul>' . "\n";
echo '</div>' . "\n";
echo '</td>' . "\n";
echo '</tr>' . "\n" . '</table>' . "\n" . '</div>' . "\n";
echo '<!-- End footer create group errors -->' . "\n";
}

if (count($footer_resetpassworderrors) > 0) {
echo '<!-- Begin footer reset password errors -->' . "\n";
echo '<div id="error">' . "\n" . '<table class="resetpassword">' . "\n" . '<tr class="row">' . "\n";
echo '<td class="cell">' . "\n";
echo '<div><strong class="header">' . $TEXT['header-resetpassworderrors_header'] . '</strong></div>' . "\n";
echo '<div class="list">' . "\n";
echo '<div>' . $TEXT['header-resetpassworderrors_listheader'] . '</div>' . "\n";
echo '<ul>' . "\n";

foreach ($footer_resetpassworderrors as $footer_resetpassworderror) {
echo '<li>' . $footer_resetpassworderror . '</li>' . "\n";
}

echo '</ul>' . "\n";
echo '</div>' . "\n";
echo '</td>' . "\n";
echo '</tr>' . "\n" . '</table>' . "\n" . '</div>' . "\n";
echo '<!-- End footer reset password errors -->' . "\n";
}
?>
<!-- Begin global footer -->
<div id="worldwidelang" style="visibility : hidden; ">
<span class="closespan">
<a title="<?php echo $TEXT['footer-worldwidelang_close_title']; ?>" accesskey="8" onclick="showMe2('worldwidelang')" class="close"><?php echo $TEXT['footer-worldwidelang_close']; ?></a>
</span>
<?php
include ("lang/languages.php");
include ("redirect.inc.php");

$i = 0;

while (list($key, $value) = each($languages)) {
if ($i++) echo '';
echo '<div class="linkdiv"><a href="set_language.php?lang=' . $key . '&amp;redirect=' . $redirect . '" target="_top" class="languages">' . $value . '</a></div>';
}
?>
</div>
<div id="togglefoot">
<div id="footer">
<!-- Begin global copyright -->
<dl class="copyright">
<dt>
<?php echo $TEXT['footer-list1_header']; ?>
</dt>
<dd>
<a href="javascript:history.back()" title="<?php echo $TEXT['footer-list1_link1_title']; ?>" accesskey="8">
<?php echo $TEXT['footer-list1_link1']; ?></a>&nbsp; |&nbsp;
<a href="<?php
if (isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] != null) $noredirect = $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'];
else $noredirect = $_SERVER['PHP_SELF'];
echo $noredirect . "#top";
?>" title="<?php echo $TEXT['footer-list1_link2_title']; ?>" accesskey="8">
<?php echo $TEXT['footer-list1_link2']; ?></a>&nbsp; |&nbsp;
<a href="javascript:history.forward()" title="<?php echo $TEXT['footer-list1_link3_title']; ?>" accesskey="8">
<?php echo $TEXT['footer-list1_link3']; ?></a>
</dd>
<dd>
<a href="language.php" title="<?php echo $TEXT['footer-list1_link4_title']; ?>" accesskey="8">
<?php echo $TEXT['footer-list1_link4']; ?></a>
<a title="<?php echo $TEXT['footer-list1_link4_uparrow_title']; ?>" accesskey="8" onclick="showMe2('worldwidelang')">
<?php echo $TEXT['footer-list1_link4_uparrow']; ?></a>&nbsp; |&nbsp;
<a href="index.php" title="<?php echo $TEXT['footer-list1_link5_title']; ?>" accesskey="8">
<?php echo $TEXT['footer-list1_link5']; ?></a>
</dd>
<dd>
<a href="m_index.php" title="<?php echo $TEXT['footer-list1_link6_title']; ?>" accesskey="8">
<?php echo $TEXT['footer-list1_link6']; ?></a>&nbsp; |&nbsp;
<a href="index.php" title="<?php echo $TEXT['footer-list1_link7_title']; ?>" accesskey="8">
<?php echo $TEXT['footer-list1_link7']; ?></a>
</dd>
<dd>
<a href="register.php" title="<?php echo $TEXT['footer-list1_link8_title']; ?>" accesskey="8">
<?php echo $TEXT['footer-list1_link8']; ?></a>
</dd>
</dl>
<!-- End global copyright -->
<!-- Begin global explore -->
<dl class="explore">
<dt><?php echo $TEXT['footer-list2_header']; ?></dt>
<dd>
<a href="search_members.php" title="<?php echo $TEXT['footer-list2_link1_title']; ?>" accesskey="8"><?php echo $TEXT['footer-list2_link1']; ?></a>
</dd>
<dd>
<a href="mc/tad/index.html" title="<?php echo $TEXT['footer-list2_link2_title']; ?>" accesskey="8"><?php echo $TEXT['footer-list2_link2']; ?></a>
</dd>
<dd>
<a href="mc/ph/index.html" title="<?php echo $TEXT['footer-list2_link3_title']; ?>" accesskey="8"><?php echo $TEXT['footer-list2_link3']; ?></a>
</dd>
<dd>
<a href="s/index.html" title="<?php echo $TEXT['footer-list2_link4_title']; ?>" accesskey="8"><?php echo $TEXT['footer-list2_link4']; ?></a>
</dd>
</dl>
<!-- End global explore -->
<!-- Begin global company relations -->
<dl class="companyrelations">
<dt><?php echo $TEXT['footer-list3_header']; ?></dt>
<dd>
<a href="pp.html" title="<?php echo $TEXT['footer-list3_link1_title']; ?>" accesskey="8"><?php echo $TEXT['footer-list3_link1']; ?></a>
</dd>
<dd>
<a target="_top" href="mailto:homenetspaces@yahoo.com" title="<?php echo $TEXT['footer-list3_link2_title']; ?>" accesskey="8"><?php echo $TEXT['footer-list3_link2']; ?></a>
</dd>
<dd>
<a href="st/index.html" title="<?php echo $TEXT['footer-list3_link3_title']; ?>" accesskey="8"><?php echo $TEXT['footer-list3_link3']; ?></a>
</dd>
</dl>
<!-- End global company relations -->
<!-- Begin global about us -->
<dl class="aboutus">
<dt><?php echo $TEXT['footer-list4_header']; ?></dt>
<dd>
<a href="mc/misc/hsp/hsfp.html" title="<?php echo $TEXT['footer-list4_link1_title']; ?>" accesskey="8"><?php echo $TEXT['footer-list4_link1']; ?></a>
</dd>
<dd>
<a href="mc/misc/hsp/ahs.htm" title="<?php echo $TEXT['footer-list4_link2_title']; ?>" accesskey="8"><?php echo $TEXT['footer-list4_link2']; ?></a>
</dd>
<dd>
<a href="mc/misc/hsp/index.html" title="<?php echo $TEXT['footer-list4_link3_title']; ?>" accesskey="8"><?php echo $TEXT['footer-list4_link3']; ?></a>
</dd>
<dd>
<a href="mc/misc/hsp/hsf.html" title="<?php echo $TEXT['footer-list4_link4_title']; ?>" accesskey="8"><?php echo $TEXT['footer-list4_link4']; ?></a>
</dd>
</dl>
<!-- End global about us -->
<!-- Begin homepage themes -->
<dl class="homepagethemes">
<dt><?php echo $TEXT['footer-list5_header']; ?></dt>
<dd>
<span class="blue" onmousedown="style.backgroundColor='blue'" onmouseout="style.backgroundColor=''" title="<?php echo $TEXT['footer-list5_color1_title']; ?>">
<span><?php echo $TEXT['footer-list5_color1']; ?></span><input type="radio" name="grootte" value="1" onclick="setCookie(theme, this.value, exp); doRefresh();" accesskey="1" />
</span>
<span class="orange" onmousedown="style.backgroundColor='orange'" onmouseout="style.backgroundColor=''" title="<?php echo $TEXT['footer-list5_color2_title']; ?>"> 
<span><?php echo $TEXT['footer-list5_color2']; ?></span><input type="radio" name="grootte" value="2" onclick="setCookie(theme, this.value, exp); doRefresh();" accesskey="2" />
</span>
</dd>
<dd>
<span class="green" onmousedown="style.backgroundColor='green'" onmouseout="style.backgroundColor=''" title="<?php echo $TEXT['footer-list5_color3_title']; ?>">
<span><?php echo $TEXT['footer-list5_color3']; ?></span><input type="radio" name="grootte" value="3" onclick="setCookie(theme, this.value, exp); doRefresh();" accesskey="3" />
</span>
<span class="yellow" onmousedown="style.backgroundColor='yellow'" onmouseout="style.backgroundColor=''" title="<?php echo $TEXT['footer-list5_color4_title']; ?>"> 
<span><?php echo $TEXT['footer-list5_color4']; ?></span><input type="radio" name="grootte" value="4" onclick="setCookie(theme, this.value, exp); doRefresh();" accesskey="4" />
</span>
</dd>
<dd>
<span class="red" onmousedown="style.backgroundColor='red'" onmouseout="style.backgroundColor=''"  title="<?php echo $TEXT['footer-list5_color5_title']; ?>">
<span><?php echo $TEXT['footer-list5_color5']; ?></span><input type="radio" name="grootte" value="5" onclick="setCookie(theme, this.value, exp); doRefresh();" accesskey="5" />
</span>
<span class="black" onmousedown="style.backgroundColor='black'" onmouseout="style.backgroundColor=''" title="<?php echo $TEXT['footer-list5_color6_title']; ?>"> 
<span><?php echo $TEXT['footer-list5_color6']; ?></span><input type="radio" name="grootte" value="6" onclick="setCookie(theme, this.value, exp); doRefresh();" accesskey="6" />
</span>
</dd>
</dl>
<!-- End homepage themes -->
</div>
</div>
<!-- End global footer -->
<a name="bot"></a>
<?php
// keep this space here for source code spacing
?>