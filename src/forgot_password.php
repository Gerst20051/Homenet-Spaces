<?php
session_start();

require ("lang.inc.php");
include ("db.member.inc.php");
include ("login.inc.php");

if (isset($_POST['sendemail'])) {
$email = (isset($_POST['email'])) ? trim($_POST['email']) : '';
$txtsecuritycode = (isset($_POST['txtsecuritycode'])) ? trim($_POST['txtsecuritycode']) : '';

if (empty($email)) $header_resetpassworderrors[] = 'Email Address cannot be blank.';
if (isset($_SESSION['logged'])) $header_resetpassworderrors[] = 'You cannot be logged in while you reset your password.';

if ($_POST['txtsecuritycode'] != $_SESSION['SECURITY_CODE']) {
$header_resetpassworderrors[] = 'Security Code cannot be incorrect.';
$footer_error = '<p><strong style="color: #f33; weight: bold;">Security Code cannot be incorrect.</strong></p>';
}

if (count($header_resetpassworderrors) > 0) {
} else {
$query = 'SELECT user_id, firstname, middlename, lastname, email, security_question1, security_answer1, security_question2, security_answer2 FROM info WHERE email = "' . mysql_real_escape_string($email, $db) . '"';
$result = mysql_query($query, $db) or die(mysql_error($db));

if (mysql_num_rows($result) == 0) {
include ("break_out_form.inc.php");
mysql_free_result($result);
die();
}

$row = mysql_fetch_array($result);
extract($row);
mysql_free_result($result);

$members_id = $row['user_id'];
$userfullname = $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname'];
$usersecurity_question1 = $row['security_question1'];
$usersecurity_answer1 = $row['security_answer1'];
$usersecurity_question2 = $row['security_question2'];
$usersecurity_answer2 = $row['security_answer2'];

if ($usersecurity_question1 == $usersecurity_question2) $header_resetpassworderrors[] = 'User Security Questions cannot be the same.';
if (($usersecurity_question1 == null) || ($usersecurity_answer1 == null) || ($usersecurity_question2 == null) || ($usersecurity_answer2 == null)) {
if (empty($usersecurity_question1)) $header_resetpassworderrors[] = 'User Security Question 1 cannot be blank.';
if (empty($usersecurity_answer1)) $header_resetpassworderrors[] = 'User Security Answer 1 cannot be blank.';
if (empty($usersecurity_question2)) $header_resetpassworderrors[] = 'User Security Question 2 cannot be blank.';
if (empty($usersecurity_answer2)) $header_resetpassworderrors[] = 'User Security Answer 2 cannot be blank.';
if (empty($usersecurity_answer1) || empty($usersecurity_answer2)) $footer_error = '<p><strong style="color : #ff3333; weight : bold; ">Unable to reset your password.</strong></p>';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//<?php echo $TEXT['global-dtdlang']; ?>" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $TEXT['global-lang']; ?>" lang="<?php echo $TEXT['global-lang']; ?>" dir="<?php echo $TEXT['global-text_dir']; ?>">

<head>
<title><?php echo $TEXT['homepage-headertitle']; ?></title>
<meta http-equiv="content-type" content="text/html; charset=<?php echo $TEXT['global-charset']; ?>" />
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="javascript.php"></script>
</head>

<body>
<?php include ("hd.inc.php"); ?>
<!-- Begin page content -->
<div class="pagecontent">
<p><strong>Thank you <?php echo $userfullname; ?>, but</strong></p>
<p><strong>Your security questions and answers are not set!</strong></p>
<p><strong>Your password cannot be reset!</strong></p>
</div>
<!-- End page content -->
<?php include ("ft.inc.php"); ?>
</body>

</html>
<?php
die();
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

div.pagecontent table td.input {
padding: 6px;
text-align: left;
}
</style>
</head>

<body>
<?php include ("hd.inc.php"); ?>
<!-- Begin page content -->
<div class="pagecontent">
<div id="pageheader" class="pageheader2"><div class="heading">
Password Reset
</div></div>
<p>Forgot your password? Just answer your security questions. We'll email you a new one!</p>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
<fieldset style="margin: 0 auto; width: 80%;">
<legend>Security Questions&nbsp;</legend>
<div style="margin: 0 auto; margin-bottom: 10px; margin-top: 10px;">
<fieldset style="margin: 0 auto; width: 80%;">
<legend>Question 1&nbsp;</legend>
<table style="margin: 0 auto; margin-bottom: 10px; margin-top: 10px;">
<tr>
<td class="label"><label>Question:</label></td>
<td class="input">
<?php if ($usersecurity_question1 == 1 || null) { echo 'What was your childhood nickname?'; } ?>
<?php if ($usersecurity_question1 == 2) { echo 'What was your dream job as a child?'; } ?>
<?php if ($usersecurity_question1 == 3) { echo 'What street did you live on in third grade?'; } ?>
<?php if ($usersecurity_question1 == 4) { echo 'What was the name of your first stuffed animal?'; } ?>
<?php if ($usersecurity_question1 == 5) { echo 'In what city or town did your mother and father meet?'; } ?>
<?php if ($usersecurity_question1 == 6) { echo 'What is the last name of your third grade teacher?'; } ?>
<?php if ($usersecurity_question1 == 7) { echo 'What is the middle name of your oldest child?'; } ?>
<?php if ($usersecurity_question1 == 8) { echo 'What school did you attend for sixth grade?'; } ?>
<?php if ($usersecurity_question1 == 9) { echo 'In what city did you meet your spouce/significant other?'; } ?>
<?php if ($usersecurity_question1 == 10) { echo 'What was your childhood phone number including area code? (e.g. 000-000-000)'; } ?>
<?php if ($usersecurity_question1 == 11) { echo 'What is the first name of the boy or girl you first kissed?'; } ?>
<?php if ($usersecurity_question1 == 12) { echo 'What is the name of your favorite childhood friend?'; } ?>

</td>
</tr>
<tr>
<td class="label"><label for="security_answer1">Answer:</label></td>
<td class="input"><input type="text" name="security_answer1" id="security_answer1" size="35" maxlength="50" /></td>
</tr>
</table>
</fieldset>
<br />
<fieldset style="margin: 0 auto; width: 80%;">
<legend>Question 2&nbsp;</legend>
<table style="margin: 0 auto; margin-bottom: 10px; margin-top: 10px;">
<tr>
<td class="label"><label>Question:</label></td>
<td class="input">
<?php if ($usersecurity_question2 == 1) { echo 'What was your childhood nickname?'; } ?>
<?php if ($usersecurity_question2 == 2 || null) { echo 'What was your dream job as a child?'; } ?>
<?php if ($usersecurity_question2 == 3) { echo 'What street did you live on in third grade?'; } ?>
<?php if ($usersecurity_question2 == 4) { echo 'What was the name of your first stuffed animal?'; } ?>
<?php if ($usersecurity_question2 == 5) { echo 'In what city or town did your mother and father meet?'; } ?>
<?php if ($usersecurity_question2 == 6) { echo 'What is the last name of your third grade teacher?'; } ?>
<?php if ($usersecurity_question2 == 7) { echo 'What is the middle name of your oldest child?'; } ?>
<?php if ($usersecurity_question2 == 8) { echo 'What school did you attend for sixth grade?'; } ?>
<?php if ($usersecurity_question2 == 9) { echo 'In what city did you meet your spouce/significant other?'; } ?>
<?php if ($usersecurity_question2 == 10) { echo 'What was your childhood phone number including area code? (e.g. 000-000-000)'; } ?>
<?php if ($usersecurity_question2 == 11) { echo 'What is the first name of the boy or girl you first kissed?'; } ?>
<?php if ($usersecurity_question2 == 12) { echo 'What is the name of your favorite childhood friend?'; } ?>
</td>
</tr>
<tr>
<td class="label"><label for="security_answer2">Answer:</label></td>
<td class="input"><input type="text" name="security_answer2" id="security_answer2" size="35" maxlength="50" /></td>
</tr>
</table>
</fieldset>
</div>
</fieldset>
<br /><br />
<fieldset style="margin: 0 auto; width: 60%;">
<legend>Security Code&nbsp;</legend>
<table style="margin: 0 auto; margin-bottom: 10px; margin-top: 10px;">
<tr>
<td><input type="text" name="txtsecuritycode" size="14" maxlength="7" value="" style="font-size: 18pt; height: 30px; letter-spacing: 2px; line-height: 30px; margin-right: 5px; text-align: center;" /></td>
<td><img name="captchaimg" alt="Security Code" src="captcha_securityimage.php" /></td>
<td><a onclick="javascript:updatecaptchaimg();"><img src="i/captcha/arrow_refresh.png" alt="Refresh Code" style="border-width: 0; margin-left: 5px; margin-top: 7px;" /></a></td>
</tr>
</table>
</fieldset>
<br /><br />
<input type="submit" name="sendquestions" value="Reset My Password!" />
<input type="hidden" name="members_id" value="<?php echo $members_id; ?>" />
<input type="hidden" name="userfullname" value="<?php echo $userfullname; ?>" />
<input type="hidden" name="usersecurity_question1" value="<?php echo $usersecurity_question1; ?>" />
<input type="hidden" name="usersecurity_answer1" value="<?php echo $usersecurity_answer1; ?>" />
<input type="hidden" name="usersecurity_question2" value="<?php echo $usersecurity_question2; ?>" />
<input type="hidden" name="usersecurity_answer2" value="<?php echo $usersecurity_answer2; ?>" />
</form>
</div>
<!-- End page content -->
<?php
include ("ft.inc.php");
include ("tracking_scripts.inc.php");
?>
</body>

</html>
<?php
die();
}
}

if (isset($_POST['sendquestions'])) {
$members_id = (isset($_POST['members_id'])) ? trim($_POST['members_id']) : '';
$userfullname = (isset($_POST['userfullname'])) ? trim($_POST['userfullname']) : '';
$usersecurity_question1 = (isset($_POST['usersecurity_question1'])) ? trim($_POST['usersecurity_question1']) : '';
$usersecurity_answer1 = (isset($_POST['usersecurity_answer1'])) ? trim($_POST['usersecurity_answer1']) : '';
$usersecurity_question2 = (isset($_POST['usersecurity_question2'])) ? trim($_POST['usersecurity_question2']) : '';
$usersecurity_answer2 = (isset($_POST['usersecurity_answer2'])) ? trim($_POST['usersecurity_answer2']) : '';
$security_answer1 = (isset($_POST['security_answer1'])) ? trim($_POST['security_answer1']) : '';
$security_answer2 = (isset($_POST['security_answer2'])) ? trim($_POST['security_answer2']) : '';
$txtsecuritycode = (isset($_POST['txtsecuritycode'])) ? trim($_POST['txtsecuritycode']) : '';

if (empty($members_id)) $header_resetpassworderrors[] = 'Members ID cannot be blank.';
if (empty($usersecurity_question1)) $header_resetpassworderrors[] = 'User Security Question 1 cannot be blank.';
if (empty($usersecurity_answer1)) $header_resetpassworderrors[] = 'User Security Answer 1 cannot be blank.';
if (empty($usersecurity_question2)) $header_resetpassworderrors[] = 'User Security Question 2 cannot be blank.';
if (empty($usersecurity_answer2)) $header_resetpassworderrors[] = 'User Security Answer 2 cannot be blank.';
if (empty($security_answer1)) $header_resetpassworderrors[] = 'Security Answer 1 cannot be blank.';
if (empty($security_answer2)) $header_resetpassworderrors[] = 'Security Answer 2 cannot be blank.';

if ($_POST['txtsecuritycode'] != $_SESSION['SECURITY_CODE']) {
$header_resetpassworderrors[] = 'Security Code cannot be incorrect.';
$footer_error = '<p><strong style="color: #f33; weight: bold;">Security Code cannot be incorrect.</strong></p>';
}

if (count($header_resetpassworderrors) > 0) {
} else {
$t_stamp = time();
$randnum = mt_rand(10000, 100000);
$new_password = $randnum . $t_stamp . $randnum;
$new_password = md5($new_password);

function split_hjms_chars($xstr, $xlenint, $xlaststr) {
$texttoshow = chunk_split($xstr, $xlenint, "\r\n");
$texttoshow = split("\r\n", $texttoshow);
$texttoshow = $texttoshow[0] . $xlaststr;

return $texttoshow;
}

$new_password = split_hjms_chars($new_password, 20, null);

$query = 'UPDATE login SET password = PASSWORD("' . mysql_real_escape_string($new_password, $db) . '") WHERE user_id = ' . $members_id . ' LIMIT 1';
mysql_query($query, $db) or die(mysql_error());

/* function for emailing password
if (mysql_num_rows($result) > 0) {
$row = mysql_fetch_array($result);

$subject = 'Homenet Spaces Password Reminder';
$body = "Just a reminder, your password for " .
"Homenet Spaces is: " . $new_password .
"\n\nYou can use this to log in at http://homenetspaces.tk";
$headers = "From: homenetspaces@yahoo.com\r\n";

mail($_POST['email'], $subject, $body, $headers) or die('Could not send reminder email.');
}
*/
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
<div id="pageheader" class="pageheader2"><div class="heading">
Your Password Has Been Reset
</div></div>
<fieldset style="margin: 0 auto; width: 60%;">
<legend>New Password&nbsp;</legend>
<div style="margin: 0 auto; margin-bottom: 10px; margin-top: 10px;">
<?php echo $new_password; ?>
</div>
</fieldset>
<br /><br />
<div style="margin: 0 auto; margin-bottom: 10px; margin-top: 10px;">
Thank you <?php echo $userfullname; ?>, <a href="login.php">click here</a> to log in.
</div>
</div>
<!-- End page content -->
<?php
include ("ft.inc.php");
include ("tracking_scripts.inc.php");
?>
</body>

</html>
<?php
die();
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

div.pagecontent table td.input {
padding: 6px;
text-align: left;
}
</style>
</head>

<body>
<?php include ("hd.inc.php"); ?>
<!-- Begin page content -->
<div class="pagecontent">
<div id="pageheader" class="pageheader2"><div class="heading">
Password Reset
</div></div>
<p>Forgot your password? Just answer your security questions. We'll email you a new one!</p>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
<fieldset style="margin:0 auto; width: 80%;">
<legend>Security Questions&nbsp;</legend>
<div style="margin:0 auto; margin-bottom: 10px; margin-top: 10px;">
<fieldset style="margin: 0 auto; width: 80%;">
<legend>Question 1&nbsp;</legend>
<table style="margin: 0 auto; margin-bottom: 10px; margin-top: 10px;">
<tr>
<td class="label"><label>Question:</label></td>
<td class="input">
<?php if ($usersecurity_question1 == 1) { echo 'What was your childhood nickname?'; } ?>
<?php if ($usersecurity_question1 == 2) { echo 'What was your dream job as a child?'; } ?>
<?php if ($usersecurity_question1 == 3) { echo 'What street did you live on in third grade?'; } ?>
<?php if ($usersecurity_question1 == 4) { echo 'What was the name of your first stuffed animal?'; } ?>
<?php if ($usersecurity_question1 == 5) { echo 'In what city or town did your mother and father meet?'; } ?>
<?php if ($usersecurity_question1 == 6) { echo 'What is the last name of your third grade teacher?'; } ?>
<?php if ($usersecurity_question1 == 7) { echo 'What is the middle name of your oldest child?'; } ?>
<?php if ($usersecurity_question1 == 8) { echo 'What school did you attend for sixth grade?'; } ?>
<?php if ($usersecurity_question1 == 9) { echo 'In what city did you meet your spouce/significant other?'; } ?>
<?php if ($usersecurity_question1 == 10) { echo 'What was your childhood phone number including area code? (e.g. 000-000-000)'; } ?>
<?php if ($usersecurity_question1 == 11) { echo 'What is the first name of the boy or girl you first kissed?'; } ?>
<?php if ($usersecurity_question1 == 12) { echo 'What is the name of your favorite childhood friend?'; } ?>
</td>
</tr>
<tr>
<td class="label"><label for="security_answer1">Answer:</label></td>
<td class="input"><input type="text" name="security_answer1" id="security_answer1" size="35" maxlength="50" /></td>
</tr>
</table>
</fieldset>
<br />
<fieldset style="margin: 0 auto; width: 80%;">
<legend>Question 2&nbsp;</legend>
<table style="margin: 0 auto; margin-bottom: 10px; margin-top: 10px;">
<tr>
<td class="label"><label>Question:</label></td>
<td class="input">
<?php if ($usersecurity_question2 == 1) { echo 'What was your childhood nickname?'; } ?>
<?php if ($usersecurity_question2 == 2) { echo 'What was your dream job as a child?'; } ?>
<?php if ($usersecurity_question2 == 3) { echo 'What street did you live on in third grade?'; } ?>
<?php if ($usersecurity_question2 == 4) { echo 'What was the name of your first stuffed animal?'; } ?>
<?php if ($usersecurity_question2 == 5) { echo 'In what city or town did your mother and father meet?'; } ?>
<?php if ($usersecurity_question2 == 6) { echo 'What is the last name of your third grade teacher?'; } ?>
<?php if ($usersecurity_question2 == 7) { echo 'What is the middle name of your oldest child?'; } ?>
<?php if ($usersecurity_question2 == 8) { echo 'What school did you attend for sixth grade?'; } ?>
<?php if ($usersecurity_question2 == 9) { echo 'In what city did you meet your spouce/significant other?'; } ?>
<?php if ($usersecurity_question2 == 10) { echo 'What was your childhood phone number including area code? (e.g. 000-000-000)'; } ?>
<?php if ($usersecurity_question2 == 11) { echo 'What is the first name of the boy or girl you first kissed?'; } ?>
<?php if ($usersecurity_question2 == 12) { echo 'What is the name of your favorite childhood friend?'; } ?>
</td>
</tr>
<tr>
<td class="label"><label for="security_answer2">Answer:</label></td>
<td class="input"><input type="text" name="security_answer2" id="security_answer2" size="35" maxlength="50" /></td>
</tr>
</table>
</fieldset>
</div>
</fieldset>
<br /><br />
<fieldset style="margin: 0 auto; width: 60%;">
<legend>Security Code&nbsp;</legend>
<table style="margin: 0 auto; margin-bottom: 10px; margin-top: 10px;">
<tr>
<td><input type="text" name="txtsecuritycode" size="14" maxlength="7" value="" style="font-size: 18pt; height: 30px; letter-spacing: 2px; line-height: 30px; margin-right: 5px; text-align: center;" /></td>
<td><img name="captchaimg" alt="Security Code" src="captcha_securityimage.php" /></td>
<td><a onclick="javascript:updatecaptchaimg();"><img src="i/captcha/arrow_refresh.png" alt="Refresh Code" style="border-width: 0; margin-left: 5px; margin-top: 7px;" /></a></td>
</tr>
</table>
</fieldset>
<br /><br />
<input type="submit" name="sendquestions" value="Reset My Password!" />
<input type="hidden" name="members_id" value="<?php echo $members_id; ?>" />
<input type="hidden" name="userfullname" value="<?php echo $userfullname; ?>" />
<input type="hidden" name="members_id" value="<?php echo $members_id; ?>" />
<input type="hidden" name="usersecurity_question1" value="<?php echo $usersecurity_question1; ?>" />
<input type="hidden" name="usersecurity_answer1" value="<?php echo $usersecurity_answer1; ?>" />
<input type="hidden" name="usersecurity_question2" value="<?php echo $usersecurity_question2; ?>" />
<input type="hidden" name="usersecurity_answer2" value="<?php echo $usersecurity_answer2; ?>" />
</form>
</div>
<!-- End page content -->
<?php
include ("ft.inc.php");
include ("tracking_scripts.inc.php");
?>
</body>

</html>
<?php
die();
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

div.pagecontent table td.input {
padding: 6px;
text-align: left;
}
</style>
</head>

<body>
<?php include ("hd.inc.php"); ?>
<!-- Begin page content -->
<div class="pagecontent">
<div id="pageheader" class="pageheader2"><div class="heading">
Password Reset
</div></div>
<p>Forgot your password? Just enter your email address. We'll email you a new one!</p>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
<fieldset style="margin: 0 auto; width: 60%;">
<legend>Security Questions&nbsp;</legend>
<table style="margin: 0 auto; margin-bottom: 10px; margin-top: 10px;">
<tr>
<td class="label"><label for="email">Email Address:</label></td>
<td class="input"><input type="text" name="email" id="email" size="30" maxlength="50" /></td>
</tr>
</table>
</fieldset>
<br /><br />
<fieldset style="margin: 0 auto; width: 60%;">
<legend>Security Code&nbsp;</legend>
<table style="margin: 0 auto; margin-bottom: 10px; margin-top: 10px;">
<tr>
<td><input type="text" name="txtsecuritycode" size="14" maxlength="7" value="" style="font-size: 18pt; height: 30px; letter-spacing: 2px; line-height: 30px; margin-right: 5px; text-align: center;" /></td>
<td><img name="captchaimg" alt="Security Code" src="captcha_securityimage.php" /></td>
<td><a onclick="javascript:updatecaptchaimg();"><img src="i/captcha/arrow_refresh.png" alt="Refresh Code" style="border-width: 0; margin-left: 5px; margin-top: 7px;" /></a></td>
</tr>
</table>
</fieldset>
<br /><br />
<input type="submit" name="sendemail" value="Reset My Password!" />
</form>
</div>
<!-- End page content -->
<?php
include ("ft.inc.php");
include ("tracking_scripts.inc.php");
?>
</body>

</html>