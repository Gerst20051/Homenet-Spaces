<?php
require ("lang.inc.php");
include ("auth.inc.php");
include ("db.member.inc.php");

function ucname($string) {
$string = ucwords(strtolower($string));

foreach (array('-', '\'', 'Mc') as $delimiter) {
if (strpos($string, $delimiter) !== false) {
$string = implode($delimiter, array_map('ucfirst', explode($delimiter, $string)));
}
}

return $string;
}

if (isset($_POST['update']) && $_POST['update'] == 'Update') {
$username = (isset($_POST['username'])) ? trim($_POST['username']) : '';
$password = (isset($_POST['password'])) ? trim($_POST['password']) : '';
$password_ver = (isset($_POST['password_ver'])) ? $_POST['password_ver'] : '';
$password_old = (isset($_POST['password_old'])) ? $_POST['password_old'] : '';
$fullname = (isset($_POST['fullname'])) ? trim(ucname($_POST['fullname'])) : '';
$email = (isset($_POST['email'])) ? trim($_POST['email']) : '';
$gender = (isset($_POST['gender'])) ? trim($_POST['gender']) : '';
$birth_month = (isset($_POST['birth_month'])) ? trim($_POST['birth_month']) : '';
$birth_day = (isset($_POST['birth_day'])) ? trim($_POST['birth_day']) : '';
$birth_year = (isset($_POST['birth_year'])) ? trim($_POST['birth_year']) : '';
$hometown = (isset($_POST['hometown'])) ? trim($_POST['hometown']) : '';
$community = (isset($_POST['community'])) ? trim($_POST['community']) : '';
$hobbies = (isset($_POST['hobbies'])) && is_array($_POST['hobbies']) ? $_POST['hobbies'] : array();
$security_question1 = (isset($_POST['security_question1'])) ? trim($_POST['security_question1']) : '';
$security_answer1 = (isset($_POST['security_answer1'])) ? trim($_POST['security_answer1']) : '';
$security_question2 = (isset($_POST['security_question2'])) ? trim($_POST['security_question2']) : '';
$security_answer2 = (isset($_POST['security_answer2'])) ? trim($_POST['security_answer2']) : '';
$website = (isset($_POST['website'])) ? trim($_POST['website']) : '';
$status = (isset($_POST['status'])) ? trim($_POST['status']) : '';
$mood = (isset($_POST['mood'])) ? trim($_POST['mood']) : '';
$privacy = (isset($_POST['privacy'])) ? trim($_POST['privacy']) : '1';
$privacy_profile_view = (isset($_POST['privacy_profile_view'])) ? trim($_POST['privacy_profile_view']) : '';
$privacy_birthdate = (isset($_POST['privacy_birthdate'])) ? trim($_POST['privacy_birthdate']) : '';
$show_birthdate = (isset($_POST['show_birthdate'])) ? trim($_POST['show_birthdate']) : '';
$about_me = (isset($_POST['about_me'])) ? trim(stripslashes($_POST['about_me'])) : '';
$away_message = (isset($_POST['away_message'])) ? trim(stripslashes($_POST['away_message'])) : '';
$profile_song_history = (isset($_POST['profile_song_history'])) ? trim($_POST['profile_song_history']) : '';
$profile_song_artist = (isset($_POST['profile_song_artist'])) ? trim($_POST['profile_song_artist']) : '';
$profile_song_name = (isset($_POST['profile_song_name'])) ? trim($_POST['profile_song_name']) : '';
$profile_song_astart = (isset($_POST['profile_song_astart'])) ? trim($_POST['profile_song_astart']) : '';
$pref_song_astart = (isset($_POST['pref_song_astart'])) ? trim($_POST['pref_song_astart']) : '';
$pref_psong_astart = (isset($_POST['pref_psong_astart'])) ? trim($_POST['pref_psong_astart']) : '';
$pref_upstyle = (isset($_POST['pref_upstyle'])) ? trim($_POST['pref_upstyle']) : '';
$pref_pupstyle = (isset($_POST['pref_pupstyle'])) ? trim($_POST['pref_pupstyle']) : '';
$pref_upview = (isset($_POST['pref_upview'])) ? trim($_POST['pref_upview']) : '';
$setting_vmode = (isset($_POST['setting_vmode'])) ? trim($_POST['setting_vmode']) : '';
$setting_theme = (isset($_POST['setting_theme'])) ? trim($_POST['setting_theme']) : '';
$setting_language = (isset($_POST['setting_language'])) ? trim($_POST['setting_language']) : '';
$txtsecuritycode = (isset($_POST['txtsecuritycode'])) ? trim($_POST['txtsecuritycode']) : '';

$query = 'SELECT username FROM login WHERE user_id = ' . (int)$_SESSION['user_id'] . ' AND username = "' . mysql_real_escape_string($_SESSION['username'], $db) . '"';
$result = mysql_query($query, $db) or die(mysql_error());

if (mysql_num_rows($result) == 0) {
include ("break_out_form.inc.php");
mysql_free_result($result);
die();
}

mysql_free_result($result);
$header_updateerrors = array();

if (empty($fullname)) $header_updateerrors[] = 'Full Name cannot be blank.';

if (empty($email)) {
$header_updateerrors[] = 'Email Address cannot be blank.';
} else {
if (preg_match("/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}?$/i", $email)) {
} else {
$header_updateerrors[] = 'Email Address should be in correct form.';
}
}

if (empty($gender)) $header_updateerrors[] = 'Gender cannot be blank.';
if ($birth_month == 0 && $birth_day == 0 && $birth_year == 0) $header_updateerrors[] = 'Birth Date cannot be blank.';
elseif ($birth_month == 0) $header_updateerrors[] = 'Birth Month cannot be blank.';
elseif ($birth_day == 0) $header_updateerrors[] = 'Birth Day cannot be blank.';
elseif ($birth_year == 0) $header_updateerrors[] = 'Birth Year cannot be blank.';

if (empty($hometown)) $header_updateerrors[] = 'Hometown cannot be blank.';
if (empty($community)) $header_updateerrors[] = 'Community cannot be blank.';
if (empty($hobbies)) $header_updateerrors[] = 'Hobbies cannot be blank.';
if ($security_question1 == $security_question2) $header_registererrors[] = 'Security Questions cannot be the same.';
if (empty($security_question1) || ($security_question1 == 0)) $header_updateerrors[] = 'Security Question 1 cannot be blank.';
if (empty($security_answer1)) $header_updateerrors[] = 'Security Answer 1 cannot be blank.';
if (empty($security_question2) || ($security_question2 == 0)) $header_updateerrors[] = 'Security Question 2 cannot be blank.';
if (empty($security_answer2)) $header_updateerrors[] = 'Security Answer 2 cannot be blank.';

if (!empty($password)) {
if (empty($password_ver)) $header_updateerrors[] = 'Please confirm your new password.';
if (empty($password_old)) $header_updateerrors[] = 'Please verify your old password.';

if (!empty($password_ver) && !empty($password_old)) {
if ($password != $password_ver) {
$header_updateerrors[] = 'Both of your new passwords need to match.';
} else {
$query = 'SELECT username, password FROM login WHERE username = "' . mysql_real_escape_string($_SESSION['username'], $db) . '" AND password = PASSWORD("' . mysql_real_escape_string($password_old, $db) . '")';
$result = mysql_query($query, $db) or die(mysql_error($db));

if (mysql_num_rows($result) == 0) $header_updateerrors[] = 'Your old password is not correct.';
}
}

if ($username == $password) $header_registererrors[] = 'Username & Password Cannot Be The Same.';
}

if (empty($privacy)) $header_updateerrors[] = 'Privacy cannot be blank.';

if ($profile_song_artist != null && $profile_song_name != null) {
$songname = $profile_song_artist . " - " . $profile_song_name;

if (!empty($profile_song_history)) $profile_song_history .= ", " . $songname;
else $profile_song_history = $songname;

/*
$profile_song_letter = substr($profile_song_artist, 1, 1);

if (is_numeric($profile_song_letter)) {
$profile_song_letter = "#";
}

$songpath = "media/mp/" . $profile_song_letter . "/" . $profile_song_artist . "/" . $profile_song_artist . " - " . $profile_song_name;
$song_artistpath = "media/mp/" . $profile_song_letter . "/" . $profile_song_artist . "/";

if (!is_file($songpath)) {
if (is_dir($song_artistpath)) {
$header_updateerrors[] = 'That Song Doesn\'t Exist / <a href="' . $song_artistpath . '" target="_blank">Click here</a> to see what songs we have from ' . $profile_song_artist;
$footer_updateerrors[] = 'That Song Doesn\'t Exist / <a href="' . $song_artistpath . '" target="_blank">Click here</a> to see what songs we have from ' . $profile_song_artist;
} else {
$header_updateerrors[] = 'We Don\'t Have Any Songs From ' . $profile_song_artist . ' / Please Browse The Music Place, Check Your Spelling, or Request A Song.';
$footer_updateerrors[] = 'We Don\'t Have Any Songs From ' . $profile_song_artist . ' / Please Browse The Music Place, Check Your Spelling, or Request A Song.';
}
}
*/
}

if ($_POST['txtsecuritycode'] != $_SESSION['SECURITY_CODE']) {
$header_updateerrors[] = ' Security Code cannot be incorrect.';
$footer_updateerrors[] = '<div><strong style="color: #f33; weight: bold;">Security Code cannot be incorrect.</strong></div>';
}

if (count($header_updateerrors) > 0) {
} else {
list($firstname, $middlename, $lastname) = split(' ', $fullname);
if (!$lastname) {
$lastname = $middlename;
unset($middlename);
}

if (!empty($password) && !empty($password_ver) && !empty($password_old)) {
$query = 'UPDATE login SET password = PASSWORD("' . mysql_real_escape_string($password, $db) . '") WHERE user_id = ' . $_SESSION['user_id'] . ' LIMIT 1';
mysql_query($query, $db) or die(mysql_error());
}

$query = 'UPDATE info SET
firstname = "' . mysql_real_escape_string($firstname, $db) . '",
middlename = "' . mysql_real_escape_string($middlename, $db) . '",
lastname = "' . mysql_real_escape_string($lastname, $db) . '",
email = "' . mysql_real_escape_string($email, $db) . '",
gender = "' . mysql_real_escape_string($gender, $db) . '",
birth_month = "' . mysql_real_escape_string($birth_month, $db) . '",
birth_day = "' . mysql_real_escape_string($birth_day, $db) . '",
birth_year = "' . mysql_real_escape_string($birth_year, $db) . '",
hometown = "' . mysql_real_escape_string($hometown, $db) . '",
community = "' . mysql_real_escape_string($community, $db) . '",
hobbies = "' . mysql_real_escape_string(join(', ', $hobbies), $db) . '",
security_question1 = "' . mysql_real_escape_string($security_question1, $db) . '",
security_answer1 = "' . mysql_real_escape_string($security_answer1, $db) . '",
security_question2 = "' . mysql_real_escape_string($security_question2, $db) . '",
security_answer2 = "' . mysql_real_escape_string($security_answer2, $db) . '",
website = "' . mysql_real_escape_string($website, $db) . '",
status = "' . mysql_real_escape_string($status, $db) . '",
mood = "' . mysql_real_escape_string($mood, $db) . '",
privacy = "' . mysql_real_escape_string($privacy, $db) . '",
privacy_profile_view = "' . mysql_real_escape_string($privacy_profile_view, $db) . '",
privacy_birthdate = "' . mysql_real_escape_string($privacy_birthdate, $db) . '",
about_me = "' . mysql_real_escape_string($about_me, $db) . '",
away_message = "' . mysql_real_escape_string($away_message, $db) . '",
profile_song_history = "' . mysql_real_escape_string($profile_song_history, $db) . '",
profile_song_artist = "' . mysql_real_escape_string($profile_song_artist, $db) . '",
profile_song_name = "' . mysql_real_escape_string($profile_song_name, $db) . '",
profile_song_astart = "' . mysql_real_escape_string($profile_song_astart, $db) . '",
pref_song_astart = "' . mysql_real_escape_string($pref_song_astart, $db) . '",
pref_psong_astart = "' . mysql_real_escape_string($pref_psong_astart, $db) . '",
pref_upstyle = "' . mysql_real_escape_string($pref_upstyle, $db) . '",
pref_pupstyle = "' . mysql_real_escape_string($pref_pupstyle, $db) . '",
pref_upview = "' . mysql_real_escape_string($pref_upview, $db) . '",
setting_vmode = "' . mysql_real_escape_string($setting_vmode, $db) . '",
setting_theme = "' . mysql_real_escape_string($setting_theme, $db) . '",
setting_language = "' . mysql_real_escape_string($setting_language, $db) . '"
WHERE
user_id = ' . $_SESSION['user_id'] . '
LIMIT 1';
mysql_query($query, $db) or die(mysql_error());

$_SESSION['fullname'] = $fullname;
$_SESSION['firstname'] = $firstname;
$_SESSION['middlename'] = $middlename;
$_SESSION['lastname'] = $lastname;
$_SESSION['email'] = $email;
$_SESSION['status'] = $status;
$_SESSION['mood'] = $mood;
$_SESSION['pref_song_astart'] = $pref_song_astart;
$_SESSION['pref_psong_astart'] = $pref_psong_astart;
$_SESSION['pref_upstyle'] = $pref_upstyle;
$_SESSION['pref_pupstyle'] = $pref_pupstyle;
$_SESSION['pref_upview'] = $pref_upview;
$_SESSION['setting_vmode'] = $setting_vmode;
$_SESSION['setting_theme'] = $setting_theme;
$_SESSION['setting_language'] = $setting_language;

$query = 'SELECT rank FROM info WHERE user_id = ' . $_SESSION['user_id'];
$result = mysql_query($query, $db) or die(mysql_error());
$row = mysql_fetch_array($result);
extract($row);
mysql_free_result($result);

$expire = (time() + (60 * 60 * 24 * 30 * 12));
$rank = ($row['rank'] + 100);

$query = 'UPDATE info SET rank = ' . $rank . ' WHERE user_id = ' . $_SESSION['user_id'];
mysql_query($query, $db) or die(mysql_error());

if ($_SESSION['setting_vmode'] == 1) $redirect = "m_index.php";
if (!isset($_COOKIE['hnsmaintheme'])) setcookie('hnsmaintheme', $_SESSION['setting_theme'], $expire);
if (isset($_COOKIE['hnsmaintheme']) && ($_COOKIE['hnsmaintheme'] != $_SESSION['setting_theme'])) setcookie('hnsmaintheme', $_SESSION['setting_theme'], $expire);

$expire = (time() + (60 * 60 * 24 * 30));
if (!isset($_COOKIE['hnslanguage'])) setcookie('hnslanguage', $_SESSION['setting_language'], $expire);
if (isset($_COOKIE['hnslanguage']) && ($_COOKIE['hnslanguage'] != $_SESSION['setting_language'])) setcookie('hnslanguage', $_SESSION['setting_language'], $expire);

require ("lang/" . $_SESSION['setting_language'] . ".php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//<?php echo $TEXT['global-dtdlang']; ?>" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $TEXT['global-lang']; ?>" lang="<?php echo $TEXT['global-lang']; ?>" dir="<?php echo $TEXT['global-text_dir']; ?>">

<head>
<title><?php echo $TEXT['global-headertitle'] . " | " . $TEXT['homepage-headertitle']; ?></title>
<meta http-equiv="content-type" content="text/html; charset=<?php echo $TEXT['global-charset']; ?>" />
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="javascript.php"></script>
</head>

<body>
<?php include ("hd.inc.php"); ?>
<!-- Begin page content -->
<div class="pagecontent">
<p><strong>Your account information has been updated.</strong></p>
<p><a href="user_profile.php?id=<?php echo $_SESSION['user_id']; ?>">Click here</a> to view your profile.</p>
<p><a href="user_personal.php">Click here</a> to return to your account.</p>
<p><a href="update_account.php">Click here</a> to update your account.</p>
</div>
<!-- End page content -->
<?php include ("ft.inc.php"); ?>
</body>

</html>
<?php
die();
}
} else {
$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id WHERE username = "' . mysql_real_escape_string($_SESSION['username'], $db) . '" LIMIT 1';
$result = mysql_query($query, $db) or die(mysql_error());
$row = mysql_fetch_assoc($result);
extract($row);
mysql_free_result($result);
$fullname = $row['firstname'] . " " . $row['middlename'] . " " . $row['lastname'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//<?php echo $TEXT['global-dtdlang']; ?>" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $TEXT['global-lang']; ?>" lang="<?php echo $TEXT['global-lang']; ?>" dir="<?php echo $TEXT['global-text_dir']; ?>">

<head>
<title><?php echo $TEXT['global-headertitle'] . " | " . $TEXT['homepage-headertitle']; ?></title>
<meta http-equiv="content-type" content="text/html; charset=<?php echo $TEXT['global-charset']; ?>" />
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="javascript.php"></script>
<style type="text/css">
td {
vertical-align: top;
}

div.pagecontent table td.label {
padding: 6px;
text-align: right;
}

div.pagecontent table td.label label {
position: relative;
top: 4px;
}

div.pagecontent table td.input {
padding: 6px;
text-align: left;
}

div.pagecontent input[type="text"] {
font-size: 14pt;
height: 25px;
letter-spacing: 2px;
line-height: 25px;
}

div.pagecontent input[type="password"] {
font-size: 14pt;
height: 25px;
letter-spacing: 2px;
line-height: 25px;
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

div.pagecontent table td.input span.radio {
left: 2px;
position: relative;
top: -6.5px;
}

div.pagecontent textarea#away_message {
font-size: 14px;
padding: 10px;
text-align: left;
}

div.pagecontent textarea#about_me {
font-size: 14px;
padding: 10px;
text-align: left;
}
</style>
</head>

<body>
<?php include ("hd.inc.php"); ?>
<!-- Begin page content -->
<div class="pagecontent">
<div id="pageheader" class="pageheader2"><div class="heading">
Update Account Information
</div></div>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<fieldset style="margin: 0 auto; width: 75%;">
<legend>Personal Information&nbsp;</legend>
<table style="margin-bottom: 10px; margin-top: 10px;">
<tr>
<td class="label"><label for="fullname">Full Name:</label></td>
<td class="input"><input type="text" name="fullname" id="fullname" size="32" maxlength="40" value="<?php echo $fullname; ?>" /></td>
</tr>
<tr>
<td class="label"><label for="email">Email:</label></td>
<td class="input"><input type="text" name="email" id="email" size="32" maxlength="50" value="<?php echo $email; ?>" /></td>
</tr>
<tr>
<td class="label"><label for="gender">Gender:</label></td>
<td class="input">
<input type="radio" name="gender" id="gender" value="Male" <?php if ($gender == "Male") { echo 'checked="checked"'; } ?> /><span class="radio">Male</span>
<input type="radio" name="gender" id="gender" value="Female" <?php if ($gender == "Female") { echo 'checked="checked"'; } ?> /><span class="radio">Female</span>
</td>
</tr>
<tr>
<td class="label">Birth Date:</td>
<td class="input">
<select name="birth_month" id="birth_month">
<option value="0" <?php if ($birth_month == 0 || null) { echo 'selected="selected"'; } ?>></option>
<option value="1" <?php if ($birth_month == 1) { echo 'selected="selected"'; } ?>>&nbsp;January</option>
<option value="2" <?php if ($birth_month == 2) { echo 'selected="selected"'; } ?>>&nbsp;February</option>
<option value="3" <?php if ($birth_month == 3) { echo 'selected="selected"'; } ?>>&nbsp;March</option>
<option value="4" <?php if ($birth_month == 4) { echo 'selected="selected"'; } ?>>&nbsp;April</option>
<option value="5" <?php if ($birth_month == 5) { echo 'selected="selected"'; } ?>>&nbsp;May</option>
<option value="6" <?php if ($birth_month == 6) { echo 'selected="selected"'; } ?>>&nbsp;June</option>
<option value="7" <?php if ($birth_month == 7) { echo 'selected="selected"'; } ?>>&nbsp;July</option>
<option value="8" <?php if ($birth_month == 8) { echo 'selected="selected"'; } ?>>&nbsp;August</option>
<option value="9" <?php if ($birth_month == 9) { echo 'selected="selected"'; } ?>>&nbsp;September</option>
<option value="10" <?php if ($birth_month == 10) { echo 'selected="selected"'; } ?>>&nbsp;October</option>
<option value="11" <?php if ($birth_month == 11) { echo 'selected="selected"'; } ?>>&nbsp;November</option>
<option value="12" <?php if ($birth_month == 12) { echo 'selected="selected"'; } ?>>&nbsp;December</option>
</select>
<select name="birth_day" id="birth_day">
<option value="0" <?php if ($birth_day == 0 || null) { echo 'selected="selected"'; } ?>></option>
<option value="1" <?php if ($birth_day == 1) { echo 'selected="selected"'; } ?>>&nbsp;1</option>
<option value="2" <?php if ($birth_day == 2) { echo 'selected="selected"'; } ?>>&nbsp;2</option>
<option value="3" <?php if ($birth_day == 3) { echo 'selected="selected"'; } ?>>&nbsp;3</option>
<option value="4" <?php if ($birth_day == 4) { echo 'selected="selected"'; } ?>>&nbsp;4</option>
<option value="5" <?php if ($birth_day == 5) { echo 'selected="selected"'; } ?>>&nbsp;5</option>
<option value="6" <?php if ($birth_day == 6) { echo 'selected="selected"'; } ?>>&nbsp;6</option>
<option value="7" <?php if ($birth_day == 7) { echo 'selected="selected"'; } ?>>&nbsp;7</option>
<option value="8" <?php if ($birth_day == 8) { echo 'selected="selected"'; } ?>>&nbsp;8</option>
<option value="9" <?php if ($birth_day == 9) { echo 'selected="selected"'; } ?>>&nbsp;9</option>
<option value="10" <?php if ($birth_day == 10) { echo 'selected="selected"'; } ?>>&nbsp;10</option>
<option value="11" <?php if ($birth_day == 11) { echo 'selected="selected"'; } ?>>&nbsp;11</option>
<option value="12" <?php if ($birth_day == 12) { echo 'selected="selected"'; } ?>>&nbsp;12</option>
<option value="13" <?php if ($birth_day == 13) { echo 'selected="selected"'; } ?>>&nbsp;13</option>
<option value="14" <?php if ($birth_day == 14) { echo 'selected="selected"'; } ?>>&nbsp;14</option>
<option value="15" <?php if ($birth_day == 15) { echo 'selected="selected"'; } ?>>&nbsp;15</option>
<option value="16" <?php if ($birth_day == 16) { echo 'selected="selected"'; } ?>>&nbsp;16</option>
<option value="17" <?php if ($birth_day == 17) { echo 'selected="selected"'; } ?>>&nbsp;17</option>
<option value="18" <?php if ($birth_day == 18) { echo 'selected="selected"'; } ?>>&nbsp;18</option>
<option value="19" <?php if ($birth_day == 19) { echo 'selected="selected"'; } ?>>&nbsp;19</option>
<option value="20" <?php if ($birth_day == 20) { echo 'selected="selected"'; } ?>>&nbsp;20</option>
<option value="21" <?php if ($birth_day == 21) { echo 'selected="selected"'; } ?>>&nbsp;21</option>
<option value="22" <?php if ($birth_day == 22) { echo 'selected="selected"'; } ?>>&nbsp;22</option>
<option value="23" <?php if ($birth_day == 23) { echo 'selected="selected"'; } ?>>&nbsp;23</option>
<option value="24" <?php if ($birth_day == 24) { echo 'selected="selected"'; } ?>>&nbsp;24</option>
<option value="25" <?php if ($birth_day == 25) { echo 'selected="selected"'; } ?>>&nbsp;25</option>
<option value="26" <?php if ($birth_day == 26) { echo 'selected="selected"'; } ?>>&nbsp;26</option>
<option value="27" <?php if ($birth_day == 27) { echo 'selected="selected"'; } ?>>&nbsp;27</option>
<option value="28" <?php if ($birth_day == 28) { echo 'selected="selected"'; } ?>>&nbsp;28</option>
<option value="29" <?php if ($birth_day == 29) { echo 'selected="selected"'; } ?>>&nbsp;29</option>
<option value="30" <?php if ($birth_day == 30) { echo 'selected="selected"'; } ?>>&nbsp;30</option>
<option value="31" <?php if ($birth_day == 31) { echo 'selected="selected"'; } ?>>&nbsp;31</option>
</select>
<select name="birth_year" id="birth_year">
<option value="0" <?php if ($birth_year == 0 || null) { echo 'selected="selected"'; } ?>></option>
<option value="2010" <?php if ($birth_year == 2010) { echo 'selected="selected"'; } ?>>&nbsp;2010</option>
<option value="2009" <?php if ($birth_year == 2009) { echo 'selected="selected"'; } ?>>&nbsp;2009</option>
<option value="2008" <?php if ($birth_year == 2008) { echo 'selected="selected"'; } ?>>&nbsp;2008</option>
<option value="2007" <?php if ($birth_year == 2007) { echo 'selected="selected"'; } ?>>&nbsp;2007</option>
<option value="2006" <?php if ($birth_year == 2006) { echo 'selected="selected"'; } ?>>&nbsp;2006</option>
<option value="2005" <?php if ($birth_year == 2005) { echo 'selected="selected"'; } ?>>&nbsp;2005</option>
<option value="2004" <?php if ($birth_year == 2004) { echo 'selected="selected"'; } ?>>&nbsp;2004</option>
<option value="2003" <?php if ($birth_year == 2003) { echo 'selected="selected"'; } ?>>&nbsp;2003</option>
<option value="2002" <?php if ($birth_year == 2002) { echo 'selected="selected"'; } ?>>&nbsp;2002</option>
<option value="2001" <?php if ($birth_year == 2001) { echo 'selected="selected"'; } ?>>&nbsp;2001</option>
<option value="2000" <?php if ($birth_year == 2000) { echo 'selected="selected"'; } ?>>&nbsp;2000</option>
<option value="1999" <?php if ($birth_year == 1999) { echo 'selected="selected"'; } ?>>&nbsp;1999</option>
<option value="1998" <?php if ($birth_year == 1998) { echo 'selected="selected"'; } ?>>&nbsp;1998</option>
<option value="1997" <?php if ($birth_year == 1997) { echo 'selected="selected"'; } ?>>&nbsp;1997</option>
<option value="1996" <?php if ($birth_year == 1996) { echo 'selected="selected"'; } ?>>&nbsp;1996</option>
<option value="1995" <?php if ($birth_year == 1995) { echo 'selected="selected"'; } ?>>&nbsp;1995</option>
<option value="1994" <?php if ($birth_year == 1994) { echo 'selected="selected"'; } ?>>&nbsp;1994</option>
<option value="1993" <?php if ($birth_year == 1993) { echo 'selected="selected"'; } ?>>&nbsp;1993</option>
<option value="1992" <?php if ($birth_year == 1992) { echo 'selected="selected"'; } ?>>&nbsp;1992</option>
<option value="1991" <?php if ($birth_year == 1991) { echo 'selected="selected"'; } ?>>&nbsp;1991</option>
<option value="1990" <?php if ($birth_year == 1990) { echo 'selected="selected"'; } ?>>&nbsp;1990</option>
<option value="1989" <?php if ($birth_year == 1989) { echo 'selected="selected"'; } ?>>&nbsp;1989</option>
<option value="1988" <?php if ($birth_year == 1988) { echo 'selected="selected"'; } ?>>&nbsp;1988</option>
<option value="1987" <?php if ($birth_year == 1987) { echo 'selected="selected"'; } ?>>&nbsp;1987</option>
<option value="1986" <?php if ($birth_year == 1986) { echo 'selected="selected"'; } ?>>&nbsp;1986</option>
<option value="1985" <?php if ($birth_year == 1985) { echo 'selected="selected"'; } ?>>&nbsp;1985</option>
<option value="1984" <?php if ($birth_year == 1984) { echo 'selected="selected"'; } ?>>&nbsp;1984</option>
<option value="1983" <?php if ($birth_year == 1983) { echo 'selected="selected"'; } ?>>&nbsp;1983</option>
<option value="1982" <?php if ($birth_year == 1982) { echo 'selected="selected"'; } ?>>&nbsp;1982</option>
<option value="1981" <?php if ($birth_year == 1981) { echo 'selected="selected"'; } ?>>&nbsp;1981</option>
<option value="1980" <?php if ($birth_year == 1980) { echo 'selected="selected"'; } ?>>&nbsp;1980</option>
<option value="1979" <?php if ($birth_year == 1979) { echo 'selected="selected"'; } ?>>&nbsp;1979</option>
<option value="1978" <?php if ($birth_year == 1978) { echo 'selected="selected"'; } ?>>&nbsp;1978</option>
<option value="1977" <?php if ($birth_year == 1977) { echo 'selected="selected"'; } ?>>&nbsp;1977</option>
<option value="1976" <?php if ($birth_year == 1976) { echo 'selected="selected"'; } ?>>&nbsp;1976</option>
<option value="1975" <?php if ($birth_year == 1975) { echo 'selected="selected"'; } ?>>&nbsp;1975</option>
<option value="1974" <?php if ($birth_year == 1974) { echo 'selected="selected"'; } ?>>&nbsp;1974</option>
<option value="1973" <?php if ($birth_year == 1973) { echo 'selected="selected"'; } ?>>&nbsp;1973</option>
<option value="1972" <?php if ($birth_year == 1972) { echo 'selected="selected"'; } ?>>&nbsp;1972</option>
<option value="1971" <?php if ($birth_year == 1971) { echo 'selected="selected"'; } ?>>&nbsp;1971</option>
<option value="1970" <?php if ($birth_year == 1970) { echo 'selected="selected"'; } ?>>&nbsp;1970</option>
<option value="1969" <?php if ($birth_year == 1969) { echo 'selected="selected"'; } ?>>&nbsp;1969</option>
<option value="1968" <?php if ($birth_year == 1968) { echo 'selected="selected"'; } ?>>&nbsp;1968</option>
<option value="1967" <?php if ($birth_year == 1967) { echo 'selected="selected"'; } ?>>&nbsp;1967</option>
<option value="1966" <?php if ($birth_year == 1966) { echo 'selected="selected"'; } ?>>&nbsp;1966</option>
<option value="1965" <?php if ($birth_year == 1965) { echo 'selected="selected"'; } ?>>&nbsp;1965</option>
<option value="1964" <?php if ($birth_year == 1964) { echo 'selected="selected"'; } ?>>&nbsp;1964</option>
<option value="1963" <?php if ($birth_year == 1963) { echo 'selected="selected"'; } ?>>&nbsp;1963</option>
<option value="1962" <?php if ($birth_year == 1962) { echo 'selected="selected"'; } ?>>&nbsp;1962</option>
<option value="1961" <?php if ($birth_year == 1961) { echo 'selected="selected"'; } ?>>&nbsp;1961</option>
<option value="1960" <?php if ($birth_year == 1960) { echo 'selected="selected"'; } ?>>&nbsp;1960</option>
<option value="1959" <?php if ($birth_year == 1959) { echo 'selected="selected"'; } ?>>&nbsp;1959</option>
<option value="1958" <?php if ($birth_year == 1958) { echo 'selected="selected"'; } ?>>&nbsp;1958</option>
<option value="1957" <?php if ($birth_year == 1957) { echo 'selected="selected"'; } ?>>&nbsp;1957</option>
<option value="1956" <?php if ($birth_year == 1956) { echo 'selected="selected"'; } ?>>&nbsp;1956</option>
<option value="1955" <?php if ($birth_year == 1955) { echo 'selected="selected"'; } ?>>&nbsp;1955</option>
<option value="1954" <?php if ($birth_year == 1954) { echo 'selected="selected"'; } ?>>&nbsp;1954</option>
<option value="1953" <?php if ($birth_year == 1953) { echo 'selected="selected"'; } ?>>&nbsp;1953</option>
<option value="1952" <?php if ($birth_year == 1952) { echo 'selected="selected"'; } ?>>&nbsp;1952</option>
<option value="1951" <?php if ($birth_year == 1951) { echo 'selected="selected"'; } ?>>&nbsp;1951</option>
<option value="1950" <?php if ($birth_year == 1950) { echo 'selected="selected"'; } ?>>&nbsp;1950</option>
<option value="1949" <?php if ($birth_year == 1949) { echo 'selected="selected"'; } ?>>&nbsp;1949</option>
<option value="1948" <?php if ($birth_year == 1948) { echo 'selected="selected"'; } ?>>&nbsp;1948</option>
<option value="1947" <?php if ($birth_year == 1947) { echo 'selected="selected"'; } ?>>&nbsp;1947</option>
<option value="1946" <?php if ($birth_year == 1946) { echo 'selected="selected"'; } ?>>&nbsp;1946</option>
<option value="1945" <?php if ($birth_year == 1945) { echo 'selected="selected"'; } ?>>&nbsp;1945</option>
<option value="1944" <?php if ($birth_year == 1944) { echo 'selected="selected"'; } ?>>&nbsp;1944</option>
<option value="1943" <?php if ($birth_year == 1943) { echo 'selected="selected"'; } ?>>&nbsp;1943</option>
<option value="1942" <?php if ($birth_year == 1942) { echo 'selected="selected"'; } ?>>&nbsp;1942</option>
<option value="1941" <?php if ($birth_year == 1941) { echo 'selected="selected"'; } ?>>&nbsp;1941</option>
<option value="1940" <?php if ($birth_year == 1940) { echo 'selected="selected"'; } ?>>&nbsp;1940</option>
<option value="1939" <?php if ($birth_year == 1939) { echo 'selected="selected"'; } ?>>&nbsp;1939</option>
<option value="1938" <?php if ($birth_year == 1938) { echo 'selected="selected"'; } ?>>&nbsp;1938</option>
<option value="1937" <?php if ($birth_year == 1937) { echo 'selected="selected"'; } ?>>&nbsp;1937</option>
<option value="1936" <?php if ($birth_year == 1936) { echo 'selected="selected"'; } ?>>&nbsp;1936</option>
<option value="1935" <?php if ($birth_year == 1935) { echo 'selected="selected"'; } ?>>&nbsp;1935</option>
<option value="1934" <?php if ($birth_year == 1934) { echo 'selected="selected"'; } ?>>&nbsp;1934</option>
<option value="1933" <?php if ($birth_year == 1933) { echo 'selected="selected"'; } ?>>&nbsp;1933</option>
<option value="1932" <?php if ($birth_year == 1932) { echo 'selected="selected"'; } ?>>&nbsp;1932</option>
<option value="1931" <?php if ($birth_year == 1931) { echo 'selected="selected"'; } ?>>&nbsp;1931</option>
<option value="1930" <?php if ($birth_year == 1930) { echo 'selected="selected"'; } ?>>&nbsp;1930</option>
<option value="1929" <?php if ($birth_year == 1929) { echo 'selected="selected"'; } ?>>&nbsp;1929</option>
<option value="1928" <?php if ($birth_year == 1928) { echo 'selected="selected"'; } ?>>&nbsp;1928</option>
<option value="1927" <?php if ($birth_year == 1927) { echo 'selected="selected"'; } ?>>&nbsp;1927</option>
<option value="1926" <?php if ($birth_year == 1926) { echo 'selected="selected"'; } ?>>&nbsp;1926</option>
<option value="1925" <?php if ($birth_year == 1925) { echo 'selected="selected"'; } ?>>&nbsp;1925</option>
<option value="1924" <?php if ($birth_year == 1924) { echo 'selected="selected"'; } ?>>&nbsp;1924</option>
<option value="1923" <?php if ($birth_year == 1923) { echo 'selected="selected"'; } ?>>&nbsp;1923</option>
<option value="1922" <?php if ($birth_year == 1922) { echo 'selected="selected"'; } ?>>&nbsp;1922</option>
<option value="1921" <?php if ($birth_year == 1921) { echo 'selected="selected"'; } ?>>&nbsp;1921</option>
<option value="1920" <?php if ($birth_year == 1920) { echo 'selected="selected"'; } ?>>&nbsp;1920</option>
<option value="1919" <?php if ($birth_year == 1919) { echo 'selected="selected"'; } ?>>&nbsp;1919</option>
<option value="1918" <?php if ($birth_year == 1918) { echo 'selected="selected"'; } ?>>&nbsp;1918</option>
<option value="1917" <?php if ($birth_year == 1917) { echo 'selected="selected"'; } ?>>&nbsp;1917</option>
<option value="1916" <?php if ($birth_year == 1916) { echo 'selected="selected"'; } ?>>&nbsp;1916</option>
<option value="1915" <?php if ($birth_year == 1915) { echo 'selected="selected"'; } ?>>&nbsp;1915</option>
<option value="1914" <?php if ($birth_year == 1914) { echo 'selected="selected"'; } ?>>&nbsp;1914</option>
<option value="1913" <?php if ($birth_year == 1913) { echo 'selected="selected"'; } ?>>&nbsp;1913</option>
<option value="1912" <?php if ($birth_year == 1912) { echo 'selected="selected"'; } ?>>&nbsp;1912</option>
<option value="1911" <?php if ($birth_year == 1911) { echo 'selected="selected"'; } ?>>&nbsp;1911</option>
<option value="1910" <?php if ($birth_year == 1910) { echo 'selected="selected"'; } ?>>&nbsp;1910</option>
<option value="1909" <?php if ($birth_year == 1909) { echo 'selected="selected"'; } ?>>&nbsp;1909</option>
<option value="1908" <?php if ($birth_year == 1908) { echo 'selected="selected"'; } ?>>&nbsp;1908</option>
<option value="1907" <?php if ($birth_year == 1907) { echo 'selected="selected"'; } ?>>&nbsp;1907</option>
<option value="1906" <?php if ($birth_year == 1906) { echo 'selected="selected"'; } ?>>&nbsp;1906</option>
<option value="1905" <?php if ($birth_year == 1905) { echo 'selected="selected"'; } ?>>&nbsp;1905</option>
<option value="1904" <?php if ($birth_year == 1904) { echo 'selected="selected"'; } ?>>&nbsp;1904</option>
<option value="1903" <?php if ($birth_year == 1903) { echo 'selected="selected"'; } ?>>&nbsp;1903</option>
<option value="1902" <?php if ($birth_year == 1902) { echo 'selected="selected"'; } ?>>&nbsp;1902</option>
</select>
</td>
</tr>
<tr>
<td class="label"><label for="hometown">Hometown:</label></td>
<td class="input"><input type="text" name="hometown" id="hometown" size="32" maxlength="50" value="<?php echo $hometown; ?>" />
</td>
</tr>
<tr>
<td class="label"><label for="community">Community:</label></td>
<td class="input"><input type="text" name="community" id="community" size="32" maxlength="50" value="<?php echo $community; ?>" />
<small class="formreminder">( Current Location, School, Business, or Group )</small></td>
</tr>
<tr>
<td class="label"><label for="hobbies">Hobbies / Interests:</label></td>
<td class="input"><select name="hobbies[]" id="hobbies" size="10" multiple="multiple">
<?php
$hobbies_list = array('Aircraft Spotting','Airbrushing','Airsofting','Acting','Aeromodeling','Amateur Astronomy','Amateur Radio','Animals/Pets/Dogs','Arts','Astrology','Astronomy','Backgammon','Badminton','Baseball','Basketball','Beach/Sun Tanning','Beachcombing','Beadwork','Beatboxing','Becoming A Child Advocate','Bell Ringing','Belly Dancing','Bicycling','Billiards','Biology','Bird Watching','Birding','BMX','Blacksmithing','Blogging','Board Games','Boating','Body Building','Bonsai Tree','Boomerangs','Bowling','Brewing Beer','Bridge Building','Bringing Food To The Disabled','Building A House For Habitat For Humanity','Building Dollhouses','Bungee Jumping','Butterfly Watching','Button Collecting',
'Cake Decorating','Calculus','Call of Duty','Calligraphy','Camping','Candle Making','Canoeing','Car Racing','Casino Gambling','Cave Diving','Celebrating Your Favorite Pastimes/Collections','Checkers','Cheerleading','Chemistry','Chess','Church/Church Activities','Cigar Smoking','Cloud Watching','Coin Collecting','Collecting','Collecting Antiques','Collecting Artwork','Collecting Music Albums','Compose Music','Computer Activities','Cooking','Cosplay','Crafts','Crafts (Unspecified)','Crochet','Crocheting','Cross-Stitch','Crossword Puzzles','Dancing','Darts','Dating','Dating Online','Diecast Collectibles','Digital Photography','Dolls','Dominoes','Drawing','Dumpster Diving','Eating Out','Educational Courses','Electronics','Embroidery','Entertaining','Exercise (Aerobics, Weights)',
'Fast Cars','Fencing','Fishing','Flying','Football','Four Wheeling','Freecell','Freshwater Aquariums','Frisbee Golf (Frolf)','Games','Gardening','Garage Saleing','Genealogy','Geocaching','Ghost Hunting','Glowsticking','Going To Movies','Golfing','Go Kart Racing','Grip Strength','Guitar','Handwriting Analysis','Hang Gliding','Hiking','History','Home Brewing','Home Repair','Home Theater','Horseback Riding','Hot Air Ballooning','Hula Hooping','Hunting','Illusion','Internet','Jet Engines','Jewelry Making','Jigsaw Puzzles','Juggling','Keep A Journal','Kayaking','Kitchen Chemistry','Kites','Kite Boarding','Knitting','Knotting',
'Lasers','Lawn Darts','Learning A Foreign Language','Learning An Instrument','Learning To Pilot A Plane','Leathercrafting','Legos','Listening To Music','Macram&eacute;','Magic','Making Model Cars','Matchstick Modeling','Mathematics','Meditation','Microscopy','Minesweeper','Mixed Martial Arts','Metal Detecting','Model Rockets','Modeling Ships','Models','Motorcycle Racing','Motorcycles','Mountain Biking','Mountain Climbing','Musical Instruments','Needlepoint',
'Online Gambling','Origami','Other than listed','Owning An Antique Car','Pac-Man','Painting','Paintball','Papermaking','Papermache','Parachuting','People Watching','Photography','Piano','Pinball','Pinochle','Playing Cards','Playing Music','Playing Poker','Playing Team Sports','Pottery','Puppetry','Pyrotechnics','Quilting','Rafting','Railfans','R/C Boats','R/C Cars','R/C Helicopters','R/C Planes','Read Ghost Stories','Reading','Reading To The Elderly','Relaxing','Renting Movies','Rescuing Abused Or Abandoned Animals','Reviving Old Interests','Robotics','Rock Climbing','Rock Collecting','Rockets','Rocking AIDS Babies','Rubik&apos;s Cubes','Running',
'Saltwater Aquariums','School','Scrapbooking','Scuba Diving','Sewing','Shark Fishing','Shopping','Singing','Singing In Choir','Skateboarding','Sketching','Skeet Shooting','Skiing','Sky Diving','Sleeping','Smoking Pipes','Snorkeling','Soap Making','Soccer','Socializing With Friends/Neighbors','Solitaire','Spelunkering','Spending Time With Family/Kids','Spider Solitaire','Stamp Collecting','Storytelling','String Figures','Surf Fishing','Swimming',
'Tea Tasting','Tennis','Tesla Coils','Tetris','Texting','Textiles','Theater','Tic-Tac-Toe','Tombstone Rubbing','Tool Collecting','Toy Collecting','Train Collecting','Train Spotting','Traveling','Treasure Hunting','Trekkie','Tug Of War','Tutoring Children','Urban Exploration','Vacation','Video Games','Volunteer','Walking','Warhammer','Watching Sporting Events','Watching TV','Websites','Windsurfing','Wine Making','Woodworking','Working','Working In A Food Pantry','Working On Cars','Writing','Writing Music','Writing Songs','Yoga','YoYo');
$hobbies = explode(', ', $hobbies);

foreach ($hobbies_list as $hobby) {
if (in_array($hobby, $hobbies)) echo '<option value="' . $hobby . '" selected="selected">' . $hobby . '</option>';
else echo '<option value="' . $hobby . '">' . $hobby . '</option>';
}
?>
</select>
<small class="formreminder">( Hold Ctrl to select more than one )</small></td>
</tr>
<tr>
<td class="label"><label for="website">Website:</label></td>
<td class="input"><input type="text" name="website" id="website" size="32" maxlength="50" value="<?php echo $website; ?>" />
<small class="formreminder">( In Format: http://www.yoursite.com/ )</small></td>
</tr>
<tr>
<td class="label"><label for="status">Status:</label></td>
<td class="input"><input type="text" name="status" id="status" size="32" maxlength="17" value="<?php echo $status; ?>" /></td>
</tr>
<tr>
<td class="label"><label for="mood">Mood:</label></td>
<td class="input"><input type="text" name="mood" id="mood" size="32" maxlength="17" value="<?php echo $mood; ?>" /></td>
</tr>
</table>
</fieldset>
<br /><br />
<fieldset style="margin: 0 auto; width: 75%;">
<legend>Login Credentials&nbsp;</legend>
<table style="margin-bottom: 10px; margin-top: 10px;">
<tr>
<td class="label"><label for="username">Username:</label></td>
<td class="input"><input type="text" name="username" id="username" size="32" maxlength="20" value="<?php echo $_SESSION['username']; ?>" disabled="disabled" /></td>
</tr>
</table>
<fieldset style="margin: 0 auto; margin-bottom: 10px; width: 75%;">
<legend>Change Password&nbsp;</legend>
<table style="margin-bottom: 10px; margin-top: 10px;">
<tr>
<td class="label"><label for="password">New Password:</label></td>
<td class="input"><input type="password" name="password" id="password" size="32" maxlength="20" value="" />
</td>
</tr>
<tr>
<td class="label"><label for="password_ver">Confirm Password:</label></td>
<td class="input"><input type="password" name="password_ver" id="password_ver" size="32" maxlength="20" value="" />
</td>
</tr>
<tr>
<td class="label"><label for="password_old">Verify Old Password:</label></td>
<td class="input"><input type="password" name="password_old" id="password_old" size="32" maxlength="20" value="" />
</td>
</tr>
</table>
<div style="margin-bottom: 10px;">
<small class="formreminder">( Leave blank if you're not changing your password )</small>
</div>
</fieldset>
</fieldset>
<br /><br />
<fieldset style="margin: 0 auto; width: 75%;">
<legend>Security Questions&nbsp;</legend>
<div style="margin: 0 auto; margin-bottom: 10px; margin-top: 10px;">
<fieldset style="margin: 0 auto; width: 90%;">
<legend>Question 1&nbsp;</legend>
<table style="margin: 0 auto; margin-bottom: 10px; margin-top: 10px;">
<tr>
<td class="label"><label for="security_question1">Question:</label></td>
<td class="input">
<select name="security_question1" id="security_question1">
<option value="0" <?php if ($security_question1 == 0 || null) { echo 'selected="selected"'; } ?>>&nbsp;</option>
<option value="1" <?php if ($security_question1 == 1) { echo 'selected="selected"'; } ?>>&nbsp;What was your childhood nickname?</option>
<option value="2" <?php if ($security_question1 == 2) { echo 'selected="selected"'; } ?>>&nbsp;What was your dream job as a child?</option>
<option value="3" <?php if ($security_question1 == 3) { echo 'selected="selected"'; } ?>>&nbsp;What street did you live on in third grade?</option>
<option value="4" <?php if ($security_question1 == 4) { echo 'selected="selected"'; } ?>>&nbsp;What was the name of your first stuffed animal?</option>
<option value="5" <?php if ($security_question1 == 5) { echo 'selected="selected"'; } ?>>&nbsp;In what city or town did your mother and father meet?</option>
<option value="6" <?php if ($security_question1 == 6) { echo 'selected="selected"'; } ?>>&nbsp;What is the last name of your third grade teacher?</option>
<option value="7" <?php if ($security_question1 == 7) { echo 'selected="selected"'; } ?>>&nbsp;What is the middle name of your oldest child?</option>
<option value="8" <?php if ($security_question1 == 8) { echo 'selected="selected"'; } ?>>&nbsp;What school did you attend for sixth grade?</option>
<option value="9" <?php if ($security_question1 == 9) { echo 'selected="selected"'; } ?>>&nbsp;In what city did you meet your spouce/significant other?</option>
<option value="10" <?php if ($security_question1 == 10) { echo 'selected="selected"'; } ?>>&nbsp;What was your childhood phone number including area code? (e.g. 000-000-000)</option>
<option value="11" <?php if ($security_question1 == 11) { echo 'selected="selected"'; } ?>>&nbsp;What is the first name of the boy or girl you first kissed?</option>
<option value="12" <?php if ($security_question1 == 12) { echo 'selected="selected"'; } ?>>&nbsp;What is the name of your favorite childhood friend?</option>
</select>
</td>
</tr>
<tr>
<td class="label"><label for="security_answer1">Answer:</label></td>
<td class="input"><input type="text" name="security_answer1" id="security_answer1" size="35" maxlength="50" value="<?php echo $security_answer1; ?>" /></td>
</tr>
</table>
</fieldset>
<br />
<fieldset style="margin: 0 auto; width: 90%;">
<legend>Question 2&nbsp;</legend>
<table style="margin: 0 auto; margin-bottom: 10px; margin-top: 10px;">
<tr>
<td class="label"><label for="security_question2">Question:</label></td>
<td class="input">
<select name="security_question2" id="security_question2">
<option value="0" <?php if ($security_question1 == 0 || null) { echo 'selected="selected"'; } ?>>&nbsp;</option>
<option value="1" <?php if ($security_question2 == 1) { echo 'selected="selected"'; } ?>>&nbsp;What was your childhood nickname?</option>
<option value="2" <?php if ($security_question2 == 2) { echo 'selected="selected"'; } ?>>&nbsp;What was your dream job as a child?</option>
<option value="3" <?php if ($security_question2 == 3) { echo 'selected="selected"'; } ?>>&nbsp;What street did you live on in third grade?</option>
<option value="4" <?php if ($security_question2 == 4) { echo 'selected="selected"'; } ?>>&nbsp;What was the name of your first stuffed animal?</option>
<option value="5" <?php if ($security_question2 == 5) { echo 'selected="selected"'; } ?>>&nbsp;In what city or town did your mother and father meet?</option>
<option value="6" <?php if ($security_question2 == 6) { echo 'selected="selected"'; } ?>>&nbsp;What is the last name of your third grade teacher?</option>
<option value="7" <?php if ($security_question2 == 7) { echo 'selected="selected"'; } ?>>&nbsp;What is the middle name of your oldest child?</option>
<option value="8" <?php if ($security_question2 == 8) { echo 'selected="selected"'; } ?>>&nbsp;What school did you attend for sixth grade?</option>
<option value="9" <?php if ($security_question2 == 9) { echo 'selected="selected"'; } ?>>&nbsp;In what city did you meet your spouce/significant other?</option>
<option value="10" <?php if ($security_question2 == 10) { echo 'selected="selected"'; } ?>>&nbsp;What was your childhood phone number including area code? (e.g. 000-000-000)</option>
<option value="11" <?php if ($security_question2 == 11) { echo 'selected="selected"'; } ?>>&nbsp;What is the first name of the boy or girl you first kissed?</option>
<option value="12" <?php if ($security_question2 == 12) { echo 'selected="selected"'; } ?>>&nbsp;What is the name of your favorite childhood friend?</option>
</select>
</td>
</tr>
<tr>
<td class="label"><label for="security_answer2">Answer:</label></td>
<td class="input"><input type="text" name="security_answer2" id="security_answer2" size="35" maxlength="50" value="<?php echo $security_answer2; ?>" /></td>
</tr>
</table>
</fieldset>
</div>
</fieldset>
<br /><br />
<fieldset style="margin: 0 auto; width: 75%;">
<legend>Privacy&nbsp;</legend>
<table style="margin-bottom: 10px; margin-top: 10px;">
<tr>
<td class="label"><label for="privacy">Who Can View Your Profile:</label></td>
<td class="input">
<input type="radio" name="privacy" id="privacy" value="1" <?php if ($privacy == "1") { echo 'checked="checked"'; } ?> /><span class="radio">Everyone</span>
<input type="radio" name="privacy" id="privacy" value="2" <?php if ($privacy == "2") { echo 'checked="checked"'; } ?> /><span class="radio">Only Members</span>
</td>
</tr>
<tr>
<td class="label"><label for="privacy_profile_view">Profile View Mode:</label></td>
<td class="input">
<input type="radio" name="privacy_profile_view" id="privacy_profile_view" value="0" <?php if ($privacy_profile_view == "0") { echo 'checked="checked"'; } ?> /><span class="radio">Normal</span>
<input type="radio" name="privacy_profile_view" id="privacy_profile_view" value="1" <?php if ($privacy_profile_view == "1") { echo 'checked="checked"'; } ?> /><span class="radio">Lite</span>
</td>
</tr>
<tr>
<td class="label"><label for="privacy_birthdate">Birthdate:</label></td>
<td class="input">
<input type="radio" name="privacy_birthdate" id="privacy_birthdate" value="1" <?php if ($privacy_birthdate == "1") { echo 'checked="checked"'; } ?> /><span class="radio">Show</span>
<input type="radio" name="privacy_birthdate" id="privacy_birthdate" value="0" <?php if ($privacy_birthdate == "0") { echo 'checked="checked"'; } ?> /><span class="radio">Hide</span>
</td>
</tr>
</table>
</fieldset>
<br /><br />
<fieldset style="margin: 0 auto; width: 75%;">
<legend>Preferences&nbsp;</legend>
<table style="margin-bottom: 10px; margin-top: 10px;">
<tr>
<td class="label"><label for="pref_song_astart">User Profile Music Autostart:</label></td>
<td class="input">
<input type="radio" name="pref_song_astart" id="pref_song_astart" value="0" onclick="showMe4('pref_psong_offon')" <?php if ($pref_song_astart == "0") { echo 'checked="checked"'; } ?> /><span class="radio">True</span>
<input type="radio" name="pref_song_astart" id="pref_song_astart" value="1" onclick="showMe6('pref_psong_offon')" <?php if ($pref_song_astart == "1") { echo 'checked="checked"'; } ?> /><span class="radio">False</span>
</td>
</tr>
<?php
if ($pref_song_astart == 1) echo '<tr id="pref_psong_offon" style="">';
else echo '<tr id="pref_psong_offon" style="display: none;">';
?>
<td class="label"><label for="pref_psong_astart" style="color: #f00;">Only Autostart My Profile Music:</label></td>
<td class="input">
<input type="radio" name="pref_psong_astart" id="pref_psong_astart" value="1" <?php if ($pref_psong_astart == "1") { echo 'checked="checked"'; } ?> /><span class="radio">True</span>
<input type="radio" name="pref_psong_astart" id="pref_psong_astart" value="0" <?php if ($pref_psong_astart == "0") { echo 'checked="checked"'; } ?> /><span class="radio">False</span>
</td>
</tr>
<tr>
<td class="label"><label for="pref_upstyle">Show User Customized Profile Style:</label></td>
<td class="input">
<input type="radio" name="pref_upstyle" id="pref_upstyle" value="0" onclick="showMe4('pref_pupstyle_offon')" <?php if ($pref_upstyle == "0") { echo 'checked="checked"'; } ?> /><span class="radio">True</span>
<input type="radio" name="pref_upstyle" id="pref_upstyle" value="1" onclick="showMe6('pref_pupstyle_offon')" <?php if ($pref_upstyle == "1") { echo 'checked="checked"'; } ?> /><span class="radio">False</span>
</td>
</tr>
<?php
if ($pref_upstyle == 1) echo '<tr id="pref_pupstyle_offon" style="">';
else echo '<tr id="pref_pupstyle_offon" style="display: none;">';
?>
<td class="label"><label for="pref_pupstyle" style="color : #f00; ">Only Show My Profile Style:</label></td>
<td class="input">
<input type="radio" name="pref_pupstyle" id="pref_pupstyle" value="1" <?php if ($pref_pupstyle == "1") { echo 'checked="checked"'; } ?> /><span class="radio">True</span>
<input type="radio" name="pref_pupstyle" id="pref_pupstyle" value="0" <?php if ($pref_pupstyle == "0") { echo 'checked="checked"'; } ?> /><span class="radio">False</span>
</td>
</tr>
<tr>
<td class="label"><label for="pref_upview">View User Profile Mode:</label></td>
<td class="input">
<input type="radio" name="pref_upview" id="pref_upview" value="0" <?php if ($pref_upview == "0") { echo 'checked="checked"'; } ?> /><span class="radio">Normal</span>
<input type="radio" name="pref_upview" id="pref_upview" value="1" <?php if ($pref_upview == "1") { echo 'checked="checked"'; } ?> /><span class="radio">Lite</span>
</td>
</tr>
</table>
<div style="margin-bottom: 10px;">
<small class="formreminder">( Settings When Viewing Other Members Profiles )</small>
</div>
</fieldset>
<br /><br />
<fieldset style="margin: 0 auto; width: 75%;">
<legend>Settings&nbsp;</legend>
<table style="margin-bottom: 10px; margin-top: 10px;">
<tr>
<td class="label"><label for="setting_vmode">Viewing Mode:</label></td>
<td class="input">
<input type="radio" name="setting_vmode" id="setting_vmode" value="0" <?php if ($setting_vmode == "0") { echo 'checked="checked"'; } ?> /><span class="radio">Main</span>
<input type="radio" name="setting_vmode" id="setting_vmode" value="1" <?php if ($setting_vmode == "1") { echo 'checked="checked"'; } ?> /><span class="radio">Mobile</span>
</td>
</tr>
<tr>
<td class="label"><label for="setting_theme">Theme:</label></td>
<td class="input">
<input type="radio" name="setting_theme" id="setting_theme" value="1" <?php if ($setting_theme == "1") { echo 'checked="checked"'; } ?> /><span class="radio">Blue</span>
<input type="radio" name="setting_theme" id="setting_theme" value="2" <?php if ($setting_theme == "2") { echo 'checked="checked"'; } ?> /><span class="radio">Orange</span>
<input type="radio" name="setting_theme" id="setting_theme" value="3" <?php if ($setting_theme == "3") { echo 'checked="checked"'; } ?> /><span class="radio">Green</span>
<input type="radio" name="setting_theme" id="setting_theme" value="4" <?php if ($setting_theme == "4") { echo 'checked="checked"'; } ?> /><span class="radio">Yellow</span>
<input type="radio" name="setting_theme" id="setting_theme" value="5" <?php if ($setting_theme == "5") { echo 'checked="checked"'; } ?> /><span class="radio">Red</span>
<input type="radio" name="setting_theme" id="setting_theme" value="6" <?php if ($setting_theme == "6") { echo 'checked="checked"'; } ?> /><span class="radio">Black</span>
</td>
</tr>
<tr>
<td class="label"><label for="setting_language">Language:</label></td>
<td class="input">
<input type="radio" name="setting_language" id="setting_language" value="de" <?php if ($setting_language == "de") { echo 'checked="checked"'; } ?> /><span class="radio">Deutsch</span>
<input type="radio" name="setting_language" id="setting_language" value="nl" <?php if ($setting_language == "nl") { echo 'checked="checked"'; } ?> /><span class="radio">Dutch</span>
<input type="radio" name="setting_language" id="setting_language" value="en" <?php if ($setting_language == "en") { echo 'checked="checked"'; } ?> /><span class="radio">English</span>
<input type="radio" name="setting_language" id="setting_language" value="es" <?php if ($setting_language == "es") { echo 'checked="checked"'; } ?> /><span class="radio">Espa&ntilde;ol</span>
<input type="radio" name="setting_language" id="setting_language" value="fr" <?php if ($setting_language == "fr") { echo 'checked="checked"'; } ?> /><span class="radio">Français</span><br />
<input type="radio" name="setting_language" id="setting_language" value="it" <?php if ($setting_language == "it") { echo 'checked="checked"'; } ?> /><span class="radio">Italiano</span>
<input type="radio" name="setting_language" id="setting_language" value="no" <?php if ($setting_language == "no") { echo 'checked="checked"'; } ?> /><span class="radio">Norsk</span>
<input type="radio" name="setting_language" id="setting_language" value="pl" <?php if ($setting_language == "pl") { echo 'checked="checked"'; } ?> /><span class="radio">Polski</span>
<input type="radio" name="setting_language" id="setting_language" value="pt_br" <?php if ($setting_language == "pt_br") { echo 'checked="checked"'; } ?> /><span class="radio">Portugu&ecirc;s (Brasil)</span>
</td>
</tr>
</table>
<div style="margin-bottom: 10px;">
<small class="formreminder">( General Settings &amp; Viewing Mode )</small>
</div>
</fieldset>
<br /><br />
<fieldset style="margin: 0 auto; width: 75%;">
<legend>Away Message&nbsp;</legend>
<table style="margin: 0 auto; margin-bottom: 10px; margin-top: 10px;">
<tr>
<td> </td>
<td>
<textarea name="away_message" id="away_message" cols="80" rows="8" maxlength="255">
<?php echo $away_message; ?>
</textarea>
</td>
</tr>
</table>
<div style="margin-bottom: 10px;">
<small class="formreminder">( Set this message when you are away on vacation )</small>
</div>
</fieldset>
<br /><br />
<fieldset style="margin: 0 auto; width: 75%;">
<legend>About Me&nbsp;</legend>
<table style="margin: 0 auto; margin-bottom: 10px; margin-top: 10px;">
<tr>
<td> </td>
<td>
<textarea name="about_me" id="about_me" cols="80" rows="15" maxlength="65536">
<?php echo $about_me; ?>
</textarea>
</td>
</tr>
</table>
</fieldset>
<br /><br />
<fieldset style="margin: 0 auto; width: 75%;">
<legend>Profile Song&nbsp;</legend>
<table style="margin-bottom: 10px; margin-top: 10px;">
<tr>
<td class="label">
</td>
<td class="input">
<a href="media/mp/" target="_blank" style="margin-left: 10px; position: relative; text-decoration: none; top: -1px;">Browse The Music Place</a>
</td>
</tr>
<tr>
<td class="label">
<label for="profile_song_artist">Artist Name:</label>
</td>
<td class="input">
<input type="text" name="profile_song_artist" id="profile_song_artist" size="45" value="<?php echo $profile_song_artist ?>" />
</td>
</tr>
<tr>
<td class="label">
<label for="profile_song_name">Song Name:</label>
</td>
<td class="input">
<input type="text" name="profile_song_name" id="profile_song_name" size="45" value="<?php echo $profile_song_name ?>" />
</td>
</tr>
<tr>
<td class="label"><label for="profile_song_astart">Autostart:</label></td>
<td class="input">
<input type="radio" name="profile_song_astart" id="profile_song_astart" value="1" <?php if ($profile_song_astart == "1") { echo 'checked="checked"'; } ?> /><span class="radio">True</span>
<input type="radio" name="profile_song_astart" id="profile_song_astart" value="0" <?php if ($profile_song_astart == "0") { echo 'checked="checked"'; } ?> /><span class="radio">False</span>
</td>
</tr>
</table>
<div style="margin-bottom : 10px; ">
<small class="formreminder">( Don't Forget The Song's File Extention i.e [ .mp3 or .wma ] )</small>
<br />
<small class="formreminder">( Songs Have Spaces Between Words )</small>
<br />
<small class="formreminder">( Do Not Include The Following Symbols: { [ ( ' < , & * # ! - : ; = + \ | / _ ~ ` ^ % $ @ ? > " ) ] } )</small>
<br />
<small class="formreminder">( Some Songs May Include: Live Acoustic Instrumental Freestyle Skit Intro Outro Remix )</small>
</div>
</fieldset>
<br /><br />
<fieldset style="margin: 0 auto; width: 75%;">
<legend>Security Code&nbsp;</legend>
<table style="margin: 0 auto; margin-bottom: 10px; margin-top: 10px;">
<tr>
<td><input type="text" name="txtsecuritycode" size="14" maxlength="7" value="" style="font-size: 18pt; height: 30px; letter-spacing: 2px; line-height: 30px; margin-right: 5px; text-align: center;" /></td>
<td><img name="captchaimg" alt="Security Code" src="captcha_securityimage.php" /></td>
<td><a onclick="javascript:updatecaptchaimg();"><img src="i/captcha/arrow_refresh.png" alt="Refresh Code" style="border-width: 0; margin-left: 5px; margin-top: 7px;" /></a></td>
</tr>
</table>
<br />
<div>
<input type="hidden" name="profile_song_history" value="<?php echo $profile_song_history; ?>" />
<input type="submit" name="update" value="Update" />
<input type="button" id="cancel" value="Cancel"  onclick="history.go(-1);" />
<input type="reset" id="reset" value="Reset" />
</div>
<br />
</fieldset>
</form>
<br />
<span>
<a href="customize_profile.php">Customize Profile</a> &nbsp;|&nbsp; <a href="update_images.php">Update Default Image</a>
</span>
</div>
<!-- End page content -->
<?php include ("ft.inc.php"); ?>
</body>

</html>