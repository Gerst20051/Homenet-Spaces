<a name="top"></a>
<!-- Begin global header -->
<span class="togglehaf">
<input type="checkbox" title="Toggle Header and Footer" onclick="ToggleHaf('togglehead', 'togglefoot', this)" />
</span>
<div id="togglehead">
<div id="header">
<!-- Begin global logo -->
<div id="hnslogo" title="<?php echo $TEXT['header-hnslogo_title']; ?>">
<span class="sitename"><?php echo $TEXT['header-hnslogo_sitename']; ?></span>
<span class="sitenamer"><a href="http://74.162.47.163/" class="sitelink" target="_top">®</a></span><br />
<span class="siteslogan"><?php echo $TEXT['header-hnslogo_siteslogan']; ?></span>
<span class="sitesloganr">®</span>
</div>
<!-- End global logo -->
<!-- Begin header content -->
<?php
if (isset($_SESSION['logged']) && ($_SESSION['logged'] == 1)) {
include ("auth.inc.php");

/* used to temporary change a users access level
if ($_SESSION['username'] == null) {
$_SESSION['access_level'] = 2;
}
*/
?>
<!-- Begin logged in -->
<!-- Begin sam update -->
<div id="sam" onclick="showMe3('samupdate')" title="Update SAM">
<div class="status" title="<?php echo $_SESSION['status']; ?>">
Status: <span class="text">
<?php
function split_hjms_chars($xstr, $xlenint, $xlaststr) {
$texttoshow = chunk_split($xstr, $xlenint, "rn");
$texttoshow = split("rn", $texttoshow);
$texttoshow = $texttoshow[0] . $xlaststr;
return $texttoshow;
}

$chars = strlen($_SESSION['status']);
preg_match_all('/[A-Z]/', $_SESSION['status'], $your_match);
$upper_case_count = count($your_match[0]);
$dots = "…";

if ($chars >= 13) {
if ($upper_case_count == 0 || 1) {
echo split_hjms_chars($_SESSION['status'], 11, $dots);
} else {
if ($upper_case_count >= 8) echo split_hjms_chars($_SESSION['status'], 8, $dots);
elseif ($upper_case_count == 7) echo split_hjms_chars($_SESSION['status'], 8, $dots);
elseif ($upper_case_count == 6) echo split_hjms_chars($_SESSION['status'], 9, $dots);
elseif ($upper_case_count == 5) echo split_hjms_chars($_SESSION['status'], 10, $dots);
elseif ($upper_case_count == 4) echo split_hjms_chars($_SESSION['status'], 10, $dots);
elseif ($upper_case_count == 3) echo split_hjms_chars($_SESSION['status'], 10, $dots);
elseif ($upper_case_count == 2) echo split_hjms_chars($_SESSION['status'], 10, $dots);
}
} else { // l2 or less characters
if ($upper_case_count <= 3) {
echo $_SESSION['status'];
} else {
if ($upper_case_count == 4) echo split_hjms_chars($_SESSION['status'], 10, $dots);
elseif ($upper_case_count == 5) echo split_hjms_chars($_SESSION['status'], 10, $dots);
elseif ($upper_case_count == 6) echo split_hjms_chars($_SESSION['status'], 10, $dots);
elseif ($upper_case_count == 7) echo split_hjms_chars($_SESSION['status'], 10, $dots);
elseif ($upper_case_count == 8) echo split_hjms_chars($_SESSION['status'], 9, $dots);
elseif ($upper_case_count == 9) echo split_hjms_chars($_SESSION['status'], 9, $dots);
elseif ($upper_case_count == 10) echo split_hjms_chars($_SESSION['status'], 9, $dots);
elseif ($upper_case_count == 11) echo split_hjms_chars($_SESSION['status'], 9, $dots);
elseif ($upper_case_count == 12) echo split_hjms_chars($_SESSION['status'], 9, $dots);
}
}
?>
</span>
</div>
<div class="mood" title="<?php echo $_SESSION['mood']; ?>">
Mood: <span class="text">
<?php
$chars = strlen($_SESSION['mood']);
preg_match_all('/[A-Z]/', $_SESSION['mood'], $your_match);
$upper_case_count = count($your_match[0]);
$dots = "…";

if ($chars >= 13) {
if ($upper_case_count == 0 || 1) {
echo split_hjms_chars($_SESSION['mood'], 11, $dots);
} else {
if ($upper_case_count >= 8) echo split_hjms_chars($_SESSION['mood'], 8, $dots);
elseif ($upper_case_count == 7) echo split_hjms_chars($_SESSION['mood'], 8, $dots);
elseif ($upper_case_count == 6) echo split_hjms_chars($_SESSION['mood'], 9, $dots);
elseif ($upper_case_count == 5) echo split_hjms_chars($_SESSION['mood'], 10, $dots);
elseif ($upper_case_count == 4) echo split_hjms_chars($_SESSION['mood'], 10, $dots);
elseif ($upper_case_count == 3) echo split_hjms_chars($_SESSION['mood'], 10, $dots);
elseif ($upper_case_count == 2) echo split_hjms_chars($_SESSION['mood'], 10, $dots);
}
} else {
if ($upper_case_count <= 3) {
echo $_SESSION['mood'];
} else {
if ($upper_case_count == 4) echo split_hjms_chars($_SESSION['mood'], 10, $dots);
elseif ($upper_case_count == 5) echo split_hjms_chars($_SESSION['mood'], 10, $dots);
elseif ($upper_case_count == 6) echo split_hjms_chars($_SESSION['mood'], 10, $dots);
elseif ($upper_case_count == 7) echo split_hjms_chars($_SESSION['mood'], 10, $dots);
elseif ($upper_case_count == 8) echo split_hjms_chars($_SESSION['mood'], 9, $dots);
elseif ($upper_case_count == 9) echo split_hjms_chars($_SESSION['mood'], 9, $dots);
elseif ($upper_case_count == 10) echo split_hjms_chars($_SESSION['mood'], 9, $dots);
elseif ($upper_case_count == 11) echo split_hjms_chars($_SESSION['mood'], 9, $dots);
elseif ($upper_case_count == 12) echo split_hjms_chars($_SESSION['mood'], 9, $dots);
}
}
?>
</span>
</div>
</div>
<div id="samupdate" style="visibility: hidden; display: block;">
<span class="closespan">
<span class="header">
Update SAM
</span>
<a title="Close Sam Update" accesskey="8" onclick="showMe3('samupdate')" class="close">Close</a>
</span>
<?php
if (isset($_POST['updatesam'])) {
$status = (isset($_POST['status'])) ? trim($_POST['status']) : '';
$mood = (isset($_POST['mood'])) ? trim($_POST['mood']) : '';
$header_updateerrors = array();

$query = 'SELECT username FROM login WHERE user_id = ' . (int)$_SESSION['user_id'] . ' AND username = "' . mysql_real_escape_string($_SESSION['username'], $db) . '"';
$result = mysql_query($query, $db) or die(mysql_error());

if (mysql_num_rows($result) == 0) {
?>
<div class="pagecontent">
<p><strong>Don't try to break out form!</strong></p>
</div>
<?php
mysql_free_result($result);
die();
}

mysql_free_result($result);

if ($_POST['updatesam'] == ' | ') {
if (empty($status)) $header_updateerrors[] = 'Status cannot be blank.';
if (empty($mood)) $header_updateerrors[] = 'Mood cannot be blank.';

if (count($header_updateerrors) > 0) {
} else {
$query = 'UPDATE info SET status = "' . mysql_real_escape_string($status, $db) . '", mood = "' . mysql_real_escape_string($mood, $db) . '" WHERE user_id = ' . $_SESSION['user_id'];
mysql_query($query, $db) or die(mysql_error());
$_SESSION['status'] = $status;
$_SESSION['mood'] = $mood;
}
}

if ($_POST['updatesam'] == 'Status') {
if (empty($status)) $header_updateerrors[] = 'Status cannot be blank.';

if (count($header_updateerrors) > 0) {
} else {
$query = 'UPDATE info SET status = "' . mysql_real_escape_string($status, $db) . '" WHERE user_id = ' . $_SESSION['user_id'];
mysql_query($query, $db) or die(mysql_error());
$_SESSION['status'] = $status;
}
}

if ($_POST['updatesam'] == 'Mood') {
if (empty($mood)) $header_updateerrors[] = 'Mood cannot be blank.';

if (count($header_updateerrors) > 0) {
} else {
$query = 'UPDATE info SET mood = "' . mysql_real_escape_string($mood, $db) . '" WHERE user_id = ' . $_SESSION['user_id'];
mysql_query($query, $db) or die(mysql_error());
$_SESSION['mood'] = $mood;
}
}
}
?>
<div class="splash">
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" id="samform">
<table>
<tr>
<td class="statusseparator"><label for="status">Status</label></td>
</tr>
<tr>
<td><input type="text" name="status" id="textbox" maxlength="17" value="<?php echo $_SESSION['status']; ?>" /></td>
</tr>
<tr>
<td class="moodseparator"><label for="mood">Mood</label></td>
</tr>
<tr>
<td><input type="text" name="mood" id="textbox" maxlength="17" value="<?php echo $_SESSION['mood']; ?>" /></td>
</tr>
<tr>
<td>
<span id="updatespan">
<input type="submit" name="updatesam" value="Status" id="statusbutton" />
<input type="submit" name="updatesam" value=" | " id="sambutton" title="Update Status & Mood" />
<input type="submit" name="updatesam" value="Mood" id="moodbutton" />
</span>
</td>
</tr>
</table>
</form>
</div>
</div>
<!-- End sam update -->
<div id="loggedin">
<span class="content">
<span class="userimage">
<?php
if ($_SESSION['default_image'] != null) echo '<img src="/uploads/' . $_SESSION['username'] . '/images/thumb/' . $_SESSION['default_image'] . '" id="userimage" />' . "\n";
else echo '<img src="i/mem/default.jpg" id="userimage" alt="Set your default picture!" />' . "\n";
?>
</span>
<span class="greeting"><?php echo $TEXT['header-loggedin_greeting']; ?> <span class="name"><?php echo $_SESSION['username']; ?>!</span>
</span>
<br />
<span class="myaccount">
<a href="user_personal.php"><?php echo $TEXT['header-loggedin_myaccount']; ?></a>
</span>
</span>
<span class="logout">
<a href="logout.php"><?php echo $TEXT['header-loggedin_logout']; ?></a>
</span>
<?php
if ($_SESSION['access_level'] > 1) echo '<span class="adminarea"><a href="admin_area.php">' . $TEXT['header-loggedin_adminarea'] . '</a></span>' . "\n";
?>
</div>
<!-- End logged in -->
<?php } else { // user is not logged in ?>
<!-- Begin global signin -->
<div id="signin">
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="signin">
<div id="content">
<table style="width: 100%;">
<tr>
<td style="width: 35%;">
<input type="text" name="username" id="username" title="<?php echo $TEXT['header-signin_username']; ?>" size="27" maxlength="20" align="middle" accesskey="u" tabindex="1" value="" />
</td>
<td style="width: 65%;">
<input type="password" name="password" id="password" title="<?php echo $TEXT['header-signin_password']; ?>" size="27" maxlength="20" align="middle" accesskey="p" tabindex="2" value="" />
<input type="submit" name="signin" title="<?php echo $TEXT['header-signin_submitbutton_title']; ?>" class="button" accesskey="l" tabindex="4" value="<?php echo $TEXT['header-signin_submitbutton']; ?>" onclick="this.value='<?php echo $TEXT['header-signin_submitbutton_onclick']; ?>'; "/>
</td>
</tr>
<tr>
<td style="width: 35%;">
<span id="remember" title="<?php echo $TEXT['header-signin_rememberme_title']; ?>">
<a class="link" title="<?php echo $TEXT['header-signin_rememberme_title']; ?>" onclick="showMe2('rememberlife')" ><?php echo $TEXT['header-signin_rememberme'] . "\n"; ?></a>
</span>
</td>
<td style="width: 65%;">
<span id="forgot">
<a class="link" href="forgot_password.php" title="<?php echo $TEXT['header-signin_forgotpassword_title']; ?>">
<?php echo $TEXT['header-signin_forgotpassword']; ?></a>
</span>
</td>
</tr>
</table>
<div id="rememberlife" style="visibility: hidden;">
<select name="rememberlife" id="dropdown">
<option value="-1" selected="selected"><?php echo $TEXT['header-signin_rememberme_forever']; ?></option>
<option value="3600">1 <?php echo $TEXT['header-signin_rememberme_hour']; ?></option>
<option value="86400">1 <?php echo $TEXT['header-signin_rememberme_day']; ?></option>
<option value="604800">1 <?php echo $TEXT['header-signin_rememberme_week']; ?></option>
<option value="2592000">1 <?php echo $TEXT['header-signin_rememberme_month']; ?></option>
</select>
</div>
</div>
<input type="hidden" name="redirect" value="<?php echo $redirect; ?>" />
</form>
<script type="text/javascript">

</script>
</div>
<!-- End global signin -->
<?php } ?>
<!-- Begin global tabs -->
<div id="tabs">
<ul>
<li><a href="video_central.php" title="<?php echo $TEXT['header-tabs_videos_title']; ?>" accesskey="0"><?php echo $TEXT['header-tabs_videos']; ?></a></li>
<li><a href="music_place.php" title="<?php echo $TEXT['header-tabs_music_title']; ?>" accesskey="0"><?php echo $TEXT['header-tabs_music']; ?></a></li>
<li><a href="movie_central.php" title="<?php echo $TEXT['header-tabs_movies_title']; ?>" accesskey="0"><?php echo $TEXT['header-tabs_movies']; ?></a></li>
<li><a href="members.php" title="<?php echo $TEXT['header-tabs_members_title']; ?>" accesskey="0"><?php echo $TEXT['header-tabs_members']; ?></a></li>
<li><a href="media_center.php" title="<?php echo $TEXT['header-tabs_mediacenter_title']; ?>" accesskey="0"><?php echo $TEXT['header-tabs_mediacenter']; ?></a></li>
<li><a href="index.php" title="<?php echo $TEXT['header-tabs_home_title']; ?>" class="active" target="_top" accesskey="0"><?php echo $TEXT['header-tabs_home']; ?></a></li>
</ul>
</div>
<!-- End global tabs -->
<?php
if (isset($_SESSION['logged']) && ($_SESSION['logged'] == 1)) {
$num_alerts = 0;
$nquery = 'SELECT * FROM ' . mysql_real_escape_string($_SESSION['username'], $message_db) . ' WHERE type = 0 AND status = 0';
$nresult = mysql_query($nquery, $message_db) or die(mysql_error($message_db));
$num_amessages = mysql_num_rows($nresult);

if ($num_amessages > 0) $num_alerts += 1;

$nquery = 'SELECT * FROM ' . mysql_real_escape_string($_SESSION['username'], $comment_db) . ' WHERE type = 0 AND status = 0';
$nresult = mysql_query($nquery, $comment_db) or die(mysql_error($comment_db));
$num_acomments = mysql_num_rows($nresult);

if ($num_acomments > 0) $num_alerts += 1;
?>
<!-- Begin dropdown navigation -->
<div id="navigationuser">
<ul id="nav">
<li class="home">
<a href="user_personal.php">Home</a>
</li>
<li class="profile">
<a href="user_profile.php?id=<?php echo $_SESSION['user_id'] ?>">
<?php if ($num_alerts > 0) echo "! "; ?>
Profile<small style="font-size: 12px;"> &#9660;</small></a>
<ul id="subnav">
<li class="first"><a href="user_history.php">Account History</a></li>
<li><a href="customize_profile.php">Customize</a></li>
<li><a href="user_messages.php">View Messages<?php if ($num_amessages > 0) echo " ( " . $num_amessages . " )"; ?></a></li>
<li><a href="user_comments.php">View Comments<?php if ($num_acomments > 0) echo " ( " . $num_acomments . " )"; ?></a></li>
<li><a href="user_pictures.php?id=<?php echo $_SESSION['user_id']; ?>">Photo Gallery</a></li>
<li><a href="update_account.php">Update Account</a></li>
<li><a href="update_images.php">Update Images</a></li>
<li><a href="upload.php">Upload Files</a></li>
<li><a href="view_files.php">View Files</a></li>
<li class="last"><a href="user_song_history.php">View Song History</a></li>
</ul>
</li>
<?php if ($_SESSION['access_level'] > 1) { ?>
<li>
<a href="admin_area.php">Admin Area<small style="font-size: 12px;"> &#9660;</small></a>
<ul id="subnav">
<li class="first"><a href="admin_page_editor.php">Page Editor</a></li>
<li><a href="admin_msummary.php">Member Summary</a></li>
<li><a href="admin_online.php">View Whos Online</a></li>
<li class="last"><a href="admin_view_files.php">File Browser</a></li>
</ul>
</li>
<?php } ?>
<li class="more">
<a href="#">More<small style="font-size: 12px;"> &#9660;</small></a>
<ul id="subnav">
<li class="first"><a href="/hnsdesktop/" title="Homenet Spaces OS is an open source web desktop!">HnS Desktop</a></li>
<li><a href="/socialhns/" title="Newest Website! Experimental">Social HnS</a></li>
<li><a href="old/">Old Site</a></li>
<li><a href="chat.php">Chat (Beta)</a></li>
<li><a href="groups.php">Groups (Beta)</a></li>
<li><a href="forums.php">Forums (Beta)</a></li>
<li class="last"><a href="<?php
if (isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] != null) $noredirect = $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'];
else $noredirect = $_SERVER['PHP_SELF'];
echo $noredirect . "#bot";
?>">Bottom of Page</a></li>
</ul>
</li>
<?php
if ($_SERVER['PHP_SELF'] == "/user_profile.php") {
$user_id = $_GET['id'];
$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id WHERE u.user_id = ' . $user_id;
$result = mysql_query($query, $db) or die(mysql_error($db));
$row = mysql_fetch_array($result);
extract($row);
mysql_free_result($result);
?>
<li class="member">
<a href="<?php echo $_SERVER['PHP_SELF'] . "?id=" . $user_id; ?>">
<?php
$chars = strlen($username);
preg_match_all('/[A-Z]/', $username, $your_match);
$upper_case_count = count($your_match[0]);
$dots = "…";

if ($chars >= 13) {
if ($upper_case_count <= 1) {
echo split_hjms_chars($username, 11, $dots);
} else {
if ($upper_case_count >= 11) echo split_hjms_chars($username, 9, $dots);
elseif ($upper_case_count == 10) echo split_hjms_chars($username, 9, $dots);
elseif ($upper_case_count == 9) echo split_hjms_chars($username, 9, $dots);
elseif ($upper_case_count == 8) echo split_hjms_chars($username, 9, $dots);
elseif ($upper_case_count == 7) echo split_hjms_chars($username, 9, $dots);
elseif ($upper_case_count == 6) echo split_hjms_chars($username, 9, $dots);
elseif ($upper_case_count == 5) echo split_hjms_chars($username, 10, $dots);
elseif ($upper_case_count == 4) echo split_hjms_chars($username, 10, $dots);
elseif ($upper_case_count == 3) echo split_hjms_chars($username, 10, $dots);
elseif ($upper_case_count == 2) echo split_hjms_chars($username, 10, $dots);
}
} else {
if ($upper_case_count <= 3) {
echo $username;
} else {
if ($upper_case_count == 4) echo split_hjms_chars($username, 10, $dots);
elseif ($upper_case_count == 5) echo split_hjms_chars($username, 10, $dots);
elseif ($upper_case_count == 6) echo split_hjms_chars($username, 10, $dots);
elseif ($upper_case_count == 7) echo split_hjms_chars($username, 10, $dots);
elseif ($upper_case_count == 8) echo split_hjms_chars($username, 9, $dots);
elseif ($upper_case_count == 9) echo split_hjms_chars($username, 9, $dots);
elseif ($upper_case_count == 10) echo split_hjms_chars($username, 9, $dots);
elseif ($upper_case_count == 11) echo split_hjms_chars($username, 9, $dots);
elseif ($upper_case_count == 12) echo split_hjms_chars($username, 9, $dots);
}
}
?>
<small style="font-size: 12px;"> &#9660;</small></a>
<ul id="subnav">
<?php if ($_SESSION['access_level'] > 1) { ?>
<li class="first"><a href="admin_update_user.php<?php echo "?id=" . $user_id; ?>">Update User</a></li>
<?php } ?>
<li<?php if ($_SESSION['access_level'] < 2) { echo ' class="first"'; } ?>><a href="user_profile.php<?php echo "?id=" . $user_id . "&action=message"; ?>">Message</a></li>
<li><a href="user_profile.php<?php echo "?id=" . $user_id . "&action=comment"; ?>">Comment</a></li>
<li><a href="user_profile.php<?php echo "?id=" . $user_id . "&action=befriend"; ?>">Befriend</a></li>
<li><a href="user_pictures.php<?php echo "?id=" . $user_id; ?>">Photo Gallery</a></li>
<li><a href="view_files.php<?php echo "?id=" . $user_id; ?>">View Files</a></li>
<li><a href="upload_send.php<?php echo "?id=" . $user_id; ?>">Send A File</a></li>
<li class="last"><a href="user_song_history.php<?php echo "?id=" . $user_id; ?>">View Song History</a></li>
</ul>
<?php } ?>
<?php
if ($_SERVER['PHP_SELF'] == "/user_pictures.php") {
$user_id = $_GET['id'];
$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id WHERE u.user_id = ' . $user_id;
$result = mysql_query($query, $db) or die(mysql_error($db));
$row = mysql_fetch_array($result);
extract($row);
mysql_free_result($result);
?>
<li class="member">
<a href="<?php echo "user_profile.php?id=" . $user_id; ?>">
<?php
$chars = strlen($username);
preg_match_all('/[A-Z]/', $username, $your_match);
$upper_case_count = count($your_match[0]);
$dots = "…";

if ($chars >= 13) {
if ($upper_case_count <= 1) {
echo split_hjms_chars($username, 11, $dots);
} else {
if ($upper_case_count >= 11) echo split_hjms_chars($username, 9, $dots);
elseif ($upper_case_count == 10) echo split_hjms_chars($username, 9, $dots);
elseif ($upper_case_count == 9) echo split_hjms_chars($username, 9, $dots);
elseif ($upper_case_count == 8) echo split_hjms_chars($username, 9, $dots);
elseif ($upper_case_count == 7) echo split_hjms_chars($username, 9, $dots);
elseif ($upper_case_count == 6) echo split_hjms_chars($username, 9, $dots);
elseif ($upper_case_count == 5) echo split_hjms_chars($username, 10, $dots);
elseif ($upper_case_count == 4) echo split_hjms_chars($username, 10, $dots);
elseif ($upper_case_count == 3) echo split_hjms_chars($username, 10, $dots);
elseif ($upper_case_count == 2) echo split_hjms_chars($username, 10, $dots);
}
} else {
if ($upper_case_count <= 3) {
echo $username;
} else {
if ($upper_case_count == 4) echo split_hjms_chars($username, 10, $dots);
elseif ($upper_case_count == 5) echo split_hjms_chars($username, 10, $dots);
elseif ($upper_case_count == 6) echo split_hjms_chars($username, 10, $dots);
elseif ($upper_case_count == 7) echo split_hjms_chars($username, 10, $dots);
elseif ($upper_case_count == 8) echo split_hjms_chars($username, 9, $dots);
elseif ($upper_case_count == 9) echo split_hjms_chars($username, 9, $dots);
elseif ($upper_case_count == 10) echo split_hjms_chars($username, 9, $dots);
elseif ($upper_case_count == 11) echo split_hjms_chars($username, 9, $dots);
elseif ($upper_case_count == 12) echo split_hjms_chars($username, 9, $dots);
}
}
?>
<small style="font-size: 12px;"> &#9660;</small></a>
<ul id="subnav">
<?php if ($_SESSION['access_level'] > 1) { ?>
<li class="first"><a href="admin_update_user.php<?php echo "?id=" . $user_id; ?>">Update User</a></li>
<?php } ?>
<li<?php if ($_SESSION['access_level'] < 2) { echo ' class="first"'; } ?>><a href="user_profile.php<?php echo "?id=" . $user_id . "&action=message"; ?>">Message</a></li>
<li><a href="user_profile.php<?php echo "?id=" . $user_id . "&action=comment"; ?>">Comment</a></li>
<li><a href="user_profile.php<?php echo "?id=" . $user_id . "&action=befriend"; ?>">Befriend</a></li>
<li><a href="user_pictures.php<?php echo "?id=" . $user_id; ?>">Photo Gallery</a></li>
<li><a href="view_files.php<?php echo "?id=" . $user_id; ?>">View Files</a></li>
<li><a href="upload_send.php<?php echo "?id=" . $user_id; ?>">Send A File</a></li>
<li class="last"><a href="user_song_history.php<?php echo "?id=" . $user_id; ?>">View Song History</a></li>
</ul>
<?php } ?>
<li id="directorysearch">
<form id="search" name="search" method="get" action="search_members.php">
<div id="searchquery">
<input type="text" name="query" id="input" accesskey="" value="<?php echo $TEXT['header-navigation_searchinput']; ?>" onfocus="if (this.value == '<?php echo $TEXT['header-navigation_searchinput']; ?>') { this.value = ''; }" onblur="if (this.value == '') { this.value = '<?php echo $TEXT['header-navigation_searchinput']; ?>'; }" onkeyup="suggest(this.value);" autocomplete="off" />
<input type="submit" name="search" title="<?php echo $TEXT['header-navigation_searchbutton_title']; ?>" class="button" accesskey="" value="<?php echo $TEXT['header-navigation_searchbutton']; ?>" />
</div>
</form>
<div id="suggestcontainer" style="background-color: #fff; border: 1px solid rgb(139, 191, 222); border-bottom-left-radius: 4px; border-bottom-right-radius: 4px; -khtml-border-bottom-left-radius: 4px; -khtml-border-bottom-right-radius: 4px; -moz-border-radius-bottomleft: 4px; -moz-border-radius-bottomright: 4px; -webkit-border-bottom-left-radius: 4px; -webkit-border-bottom-right-radius: 4px; display: none; position: absolute; right: 74px; text-align: left; top: 29px; width: 226px; z-index: 220;">
<div style="max-height: 400px; margin: 5px; overflow: auto;">
<div id="suggest" style="margin: 5px;">
</div>
</div>
</div>
</li>
</ul>
</div>
<!-- End dropdown navigation -->
<?php } else { // user is not logged in ?>
<!-- Begin dropdown navigation -->
<div id="navigation">
<ul id="nav">
<li>
<a href="login.php">Log In</a>
</li>
<li>
<a href="register.php">Sign Up</a>
</li>
<li class="more">
<a href="#">More<small style="font-size: 12px;"> &#9660;</small></a>
<ul id="subnav">
<li class="first"><a href="/hnsdesktop/" title="Homenet Spaces OS is an open source web desktop!">HnS Desktop</a></li>
<li><a href="/socialhns/" title="Newest Website! Experimental">Social HnS</a></li>
<li><a href="old/">Old Site</a></li>
<li><a href="chat.php">Chat (Beta)</a></li>
<li><a href="upload.php">Upload Files</a></li>
<li><a href="view_files.php">View Files</a></li>
<li><a href="groups.php">Groups (Beta)</a></li>
<li><a href="forums.php">Forums (Beta)</a></li>
<li class="last"><a href="<?php
if (isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] != null) $noredirect = $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'];
else $noredirect = $_SERVER['PHP_SELF'];
echo $noredirect . "#bot";
?>">Bottom of Page</a></li>
</ul>
</li>
<?php
if ($_SERVER['PHP_SELF'] == "/user_profile.php") {
$user_id = $_GET['id'];
$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id WHERE u.user_id = ' . $user_id;
$result = mysql_query($query, $db) or die(mysql_error($db));
$row = mysql_fetch_array($result);
extract($row);
mysql_free_result($result);
?>
<li class="member">
<a href="<?php echo $_SERVER['PHP_SELF'] . "?id=" . $user_id; ?>">
<?php
function split_hjms_chars($xstr, $xlenint, $xlaststr) {
$texttoshow = chunk_split($xstr, $xlenint, "rn");
$texttoshow = split("rn", $texttoshow);
$texttoshow = $texttoshow[0] . $xlaststr;
return $texttoshow;
}

$chars = strlen($username);
preg_match_all('/[A-Z]/', $username, $your_match);
$upper_case_count = count($your_match[0]);
$dots = "…";

if ($chars >= 13) {
if ($upper_case_count <= 1) {
echo split_hjms_chars($username, 11, $dots);
} else {
if ($upper_case_count >= 11) echo split_hjms_chars($username, 9, $dots);
elseif ($upper_case_count == 10) echo split_hjms_chars($username, 9, $dots);
elseif ($upper_case_count == 9) echo split_hjms_chars($username, 9, $dots);
elseif ($upper_case_count == 8) echo split_hjms_chars($username, 9, $dots);
elseif ($upper_case_count == 7) echo split_hjms_chars($username, 9, $dots);
elseif ($upper_case_count == 6) echo split_hjms_chars($username, 9, $dots);
elseif ($upper_case_count == 5) echo split_hjms_chars($username, 10, $dots);
elseif ($upper_case_count == 4) echo split_hjms_chars($username, 10, $dots);
elseif ($upper_case_count == 3) echo split_hjms_chars($username, 10, $dots);
elseif ($upper_case_count == 2) echo split_hjms_chars($username, 10, $dots);
}
} else {
if ($upper_case_count <= 3) {
echo $username;
} else {
if ($upper_case_count == 4) echo split_hjms_chars($username, 10, $dots);
elseif ($upper_case_count == 5) echo split_hjms_chars($username, 10, $dots);
elseif ($upper_case_count == 6) echo split_hjms_chars($username, 10, $dots);
elseif ($upper_case_count == 7) echo split_hjms_chars($username, 10, $dots);
elseif ($upper_case_count == 8) echo split_hjms_chars($username, 9, $dots);
elseif ($upper_case_count == 9) echo split_hjms_chars($username, 9, $dots);
elseif ($upper_case_count == 10) echo split_hjms_chars($username, 9, $dots);
elseif ($upper_case_count == 11) echo split_hjms_chars($username, 9, $dots);
elseif ($upper_case_count == 12) echo split_hjms_chars($username, 9, $dots);
}
}
?>
<small style="font-size: 12px;"> &#9660;</small></a>
<ul id="subnav">
<li class="first"><a href="user_pictures.php<?php echo "?id=" . $user_id; ?>">Photo Gallery</a></li>
<li><a href="view_files.php<?php echo "?id=" . $user_id; ?>">View Files</a></li>
<li><a href="upload_send.php<?php echo "?id=" . $user_id; ?>">Send A File</a></li>
<li class="last"><a href="user_song_history.php<?php echo "?id=" . $user_id; ?>">View Song History</a></li>
</ul>
<?php } ?>
<?php
if ($_SERVER['PHP_SELF'] == "/user_pictures.php") {
$user_id = $_GET['id'];
$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id WHERE u.user_id = ' . $user_id;
$result = mysql_query($query, $db) or die(mysql_error($db));
$row = mysql_fetch_array($result);
extract($row);
mysql_free_result($result);
?>
<li class="member">
<a href="<?php echo "user_profile.php?id=" . $user_id; ?>">
<?php
function split_hjms_chars($xstr, $xlenint, $xlaststr) {
$texttoshow = chunk_split($xstr, $xlenint, "rn");
$texttoshow = split("rn", $texttoshow);
$texttoshow = $texttoshow[0] . $xlaststr;
return $texttoshow;
}

$chars = strlen($username);
preg_match_all('/[A-Z]/', $username, $your_match);
$upper_case_count = count($your_match[0]);
$dots = "…";

if ($chars >= 13) {
if ($upper_case_count <= 1) {
echo split_hjms_chars($username, 11, $dots);
} else {
if ($upper_case_count >= 11) echo split_hjms_chars($username, 9, $dots);
elseif ($upper_case_count == 10) echo split_hjms_chars($username, 9, $dots);
elseif ($upper_case_count == 9) echo split_hjms_chars($username, 9, $dots);
elseif ($upper_case_count == 8) echo split_hjms_chars($username, 9, $dots);
elseif ($upper_case_count == 7) echo split_hjms_chars($username, 9, $dots);
elseif ($upper_case_count == 6) echo split_hjms_chars($username, 9, $dots);
elseif ($upper_case_count == 5) echo split_hjms_chars($username, 10, $dots);
elseif ($upper_case_count == 4) echo split_hjms_chars($username, 10, $dots);
elseif ($upper_case_count == 3) echo split_hjms_chars($username, 10, $dots);
elseif ($upper_case_count == 2) echo split_hjms_chars($username, 10, $dots);
}
} else {
if ($upper_case_count <= 3) {
echo $username;
} else {
if ($upper_case_count == 4) echo split_hjms_chars($username, 10, $dots);
elseif ($upper_case_count == 5) echo split_hjms_chars($username, 10, $dots);
elseif ($upper_case_count == 6) echo split_hjms_chars($username, 10, $dots);
elseif ($upper_case_count == 7) echo split_hjms_chars($username, 10, $dots);
elseif ($upper_case_count == 8) echo split_hjms_chars($username, 9, $dots);
elseif ($upper_case_count == 9) echo split_hjms_chars($username, 9, $dots);
elseif ($upper_case_count == 10) echo split_hjms_chars($username, 9, $dots);
elseif ($upper_case_count == 11) echo split_hjms_chars($username, 9, $dots);
elseif ($upper_case_count == 12) echo split_hjms_chars($username, 9, $dots);
}
}
?>
<small style="font-size: 12px;"> &#9660;</small></a>
<ul id="subnav">
<li class="first"><a href="user_pictures.php<?php echo "?id=" . $user_id; ?>">Photo Gallery</a></li>
<li><a href="view_files.php<?php echo "?id=" . $user_id; ?>">View Files</a></li>
<li><a href="upload_send.php<?php echo "?id=" . $user_id; ?>">Send A File</a></li>
<li class="last"><a href="user_song_history.php<?php echo "?id=" . $user_id; ?>">View Song History</a></li>
</ul>
<?php } ?>
<li id="directorysearch">
<form id="search" name="search" method="get" action="search_members.php">
<div id="searchquery">
<input type="text" name="query" id="input" accesskey="s" value="<?php echo $TEXT['header-navigation_searchinput']; ?>" onfocus="if (this.value == '<?php echo $TEXT['header-navigation_searchinput']; ?>') { this.value = ''; }" onblur="if (this.value == '') { this.value = '<?php echo $TEXT['header-navigation_searchinput']; ?>'; }" onkeyup="suggest(this.value);" autocomplete="off" />
<input type="submit" name="search" title="<?php echo $TEXT['header-navigation_searchbutton_title']; ?>" class="button" accesskey="q" value="<?php echo $TEXT['header-navigation_searchbutton']; ?>" />
</div>
</form>
<div id="suggestcontainer" style="background-color: #fff; border: 1px solid rgb(139, 191, 222); border-bottom-left-radius: 4px; border-bottom-right-radius: 4px; -khtml-border-bottom-left-radius: 4px; -khtml-border-bottom-right-radius: 4px; -moz-border-radius-bottomleft: 4px; -moz-border-radius-bottomright: 4px; -webkit-border-bottom-left-radius: 4px; -webkit-border-bottom-right-radius: 4px; display: none; position: absolute; right: 74px; text-align: left; top: 29px; width: 226px; z-index: 220;">
<div style="max-height: 400px; margin: 5px; overflow: auto;">
<div id="suggest" style="margin: 5px;">
</div>
</div>
</div>
</li>
</ul>
</div>
<!-- End dropdown navigation -->
<?php } ?>
<!-- End header content -->
</div>
</div>
<!-- End global header -->
<?php
if (isset($_SESSION['logged']) && ($_SESSION['logged'] == 1)) {
include ("users_online.loggedin.inc.php"); // include db.om.inc if this gets removed
include ("check_session.inc.php");
} else {
include ("users_online.notloggedin.inc.php"); // include db.om.inc if this gets removed
include ("check_session.inc.php");
}

if (isset($_GET['hurlmessage'])) {
$header_url_message = urldecode($_GET['hurlmessage']);

echo '<!-- Begin header url message -->' . "\n";
echo '<div id="message">' . "\n" . '<table class="url">' . "\n" . '<tr class="row">' . "\n";
echo '<td class="cell">' . stripslashes($header_url_message) . '</td>' . "\n";
echo '</tr>' . "\n" . '</table>' . "\n" . '</div>' . "\n";
echo '<!-- End header url message -->' . "\n";
}

if (isset($_GET['hurlerror'])) {
$header_url_error = urldecode($_GET['hurlerror']);

echo '<!-- Begin header url error -->' . "\n";
echo '<div id="error">' . "\n" . '<table class="url">' . "\n" . '<tr class="row">' . "\n";
echo '<td class="cell">' . stripslashes($header_url_error) . '</td>' . "\n";
echo '</tr>' . "\n" . '</table>' . "\n" . '</div>' . "\n";
echo '<!-- End header url error -->' . "\n";
}

/* used to temporary add a global message -- set cookie is in login.inc.php
if (!isset($_COOKIE['tempmessage']) && !isset($_GET['action'])) {
$header_globalmessage = '<div><strong style="color: #f33; weight: bold;">Message</strong> <a href="' . $SERVER['PHP_SELF'] . '?action=remove">Remove</a></div>';
$footer_globalmessage = '<div><strong style="color: #f33; weight: bold;">Message</strong> <a href="' . $SERVER['PHP_SELF'] . '?action=remove">Remove</a></div>';
}
*/

if (isset($header_globalmessage)) {
echo '<!-- Begin header global message -->' . "\n";
echo '<div id="message">' . "\n" . '<table class="global">' . "\n" . '<tr class="row">' . "\n";
echo '<td class="cell">' . $header_globalmessage . '</td>' . "\n";
echo '</tr>' . "\n" . '</table>' . "\n" . '</div>' . "\n";
echo '<!-- End header global message -->' . "\n";
}

if (isset($header_message)) {
echo '<!-- Begin header message -->' . "\n";
echo '<div id="message">' . "\n" . '<table class="normal">' . "\n" . '<tr class="row">' . "\n";
echo '<td class="cell">' . $header_message . '</td>' . "\n";
echo '</tr>' . "\n" . '</table>' . "\n" . '</div>' . "\n";
echo '<!-- End header message -->' . "\n";
}

if (isset($header_error)) {
echo '<!-- Begin header global error -->' . "\n";
echo '<div id="error">' . "\n" . '<table class="global">' . "\n" . '<tr class="row">' . "\n";
echo '<td class="cell">' . $header_error . '</td>' . "\n";
echo '</tr>' . "\n" . '</table>' . "\n" . '</div>' . "\n";
echo '<!-- End header global error -->' . "\n";
}

if (isset($header_loginerror)) {
echo '<!-- Begin header login error -->' . "\n";
echo '<div id="error">' . "\n" . '<table class="login">' . "\n" . '<tr class="row">' . "\n";
echo '<td class="cell">' . $header_loginerror . '</td>' . "\n";
echo '</tr>' . "\n" . '</table>' . "\n" . '</div>' . "\n";
echo '<!-- End header login error -->' . "\n";
}

if (count($header_updateerrors) > 0) {
echo '<!-- Begin header update errors -->' . "\n";
echo '<div id="error">' . "\n" . '<table class="update">' . "\n" . '<tr class="row">' . "\n";
echo '<td class="cell">' . "\n";
echo '<div><strong class="header">' . $TEXT['header-updateerrors_header'] . '</strong></div>' . "\n";
echo '<div class="list">' . "\n";
echo '<div>' . $TEXT['header-updateerrors_listheader'] . '</div>' . "\n";
echo '<ul>' . "\n";

foreach ($header_updateerrors as $header_updateerror) {
echo '<li>' . $header_updateerror . '</li>' . "\n";
}

echo '</ul>' . "\n";
echo '</div>' . "\n";
echo '</td>' . "\n";
echo '</tr>' . "\n" . '</table>' . "\n" . '</div>' . "\n";
echo '<!-- End header update errors -->' . "\n";
}

if (count($header_registererrors) > 0) {
echo '<!-- Begin header register errors -->' . "\n";
echo '<div id="error">' . "\n" . '<table class="register">' . "\n" . '<tr class="row">' . "\n";
echo '<td class="cell">' . "\n";
echo '<div><strong class="header">' . $TEXT['header-registererrors_header'] . '</strong></div>' . "\n";
echo '<div class="list">' . "\n";
echo '<div>' . $TEXT['header-registererrors_listheader'] . '</div>' . "\n";
echo '<ul>' . "\n";

foreach ($header_registererrors as $header_registererror) {
echo '<li>' . $header_registererror . '</li>' . "\n";
}

echo '</ul>' . "\n";
echo '</div>' . "\n";
echo '</td>' . "\n";
echo '</tr>' . "\n" . '</table>' . "\n" . '</div>' . "\n";
echo '<!-- End header register errors -->' . "\n";
}

if (count($header_creategrouperrors) > 0) {
echo '<!-- Begin header create group errors -->' . "\n";
echo '<div id="error">' . "\n" . '<table class="creategroup">' . "\n" . '<tr class="row">' . "\n";
echo '<td class="cell">' . "\n";
echo '<div><strong class="header">' . $TEXT['header-creategrouperrors_header'] . '</strong></div>' . "\n";
echo '<div class="list">' . "\n";
echo '<div>' . $TEXT['header-creategrouperrors_listheader'] . '</div>' . "\n";
echo '<ul>' . "\n";

foreach ($header_creategrouperrors as $header_creategrouperror) {
echo '<li>' . $header_creategrouperror . '</li>' . "\n";
}

echo '</ul>' . "\n";
echo '</div>' . "\n";
echo '</td>' . "\n";
echo '</tr>' . "\n" . '</table>' . "\n" . '</div>' . "\n";
echo '<!-- End header create group errors -->' . "\n";
}

if (count($header_resetpassworderrors) > 0) {
echo '<!-- Begin header reset password errors -->' . "\n";
echo '<div id="error">' . "\n" . '<table class="resetpassword">' . "\n" . '<tr class="row">' . "\n";
echo '<td class="cell">' . "\n";
echo '<div><strong class="header">' . $TEXT['header-resetpassworderrors_header'] . '</strong></div>' . "\n";
echo '<div class="list">' . "\n";
echo '<div>' . $TEXT['header-resetpassworderrors_listheader'] . '</div>' . "\n";
echo '<ul>' . "\n";

foreach ($header_resetpassworderrors as $header_resetpassworderror) {
echo '<li>' . $header_resetpassworderror . '</li>' . "\n";
}

echo '</ul>' . "\n";
echo '</div>' . "\n";
echo '</td>' . "\n";
echo '</tr>' . "\n" . '</table>' . "\n" . '</div>' . "\n";
echo '<!-- End header reset password errors -->' . "\n";
}
?>