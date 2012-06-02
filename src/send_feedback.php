<?php
session_start();

require ("lang.inc.php");
include ("db.member.inc.php");
include ("login.inc.php");
include ("bimage.inc.php");

if (isset($_POST['send']) && ($_POST['send'] == "Send Feedback")) {
$subject = (isset($_POST['subject'])) ? trim($_POST['subject']) : '';
$message = (isset($_POST['message'])) ? trim($_POST['message']) : '';

if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1) {
// insert into receivers table
$query = 'INSERT INTO Admin
(message_id, type, user, user_id, status, date, subject, message)
VALUES
(NULL, 0, "' . $_SESSION['username'] . '", "' . $_SESSION['user_id'] . '", 0, "' . date('Y-m-d H:i:s') . '", "' . $subject . '", "' . $message . '")';
mysql_query($query, $message_db) or die(mysql_error($message_db));

// insert into senders table
$query = 'INSERT INTO ' . $_SESSION['username'] . '
(message_id, type, user, user_id, status, date, subject, message)
VALUES
(NULL, 1, "Admin", 2, 0, "' . date('Y-m-d H:i:s') . '", "' . $subject . '", "' . $message . '")';
mysql_query($query, $message_db) or die(mysql_error($message_db));
} else { // guest is sending feedback
// insert into receivers table
$query = 'INSERT INTO Admin
(message_id, type, user, user_id, status, date, subject, message)
VALUES
(NULL, 0, "Guest", 0, 0, "' . date('Y-m-d H:i:s') . '", "' . $subject . '", "' . $message . '")';
mysql_query($query, $message_db) or die(mysql_error($message_db));
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//<?php echo $TEXT['global-dtdlang']; ?>" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $TEXT['global-lang']; ?>" lang="<?php echo $TEXT['global-lang']; ?>" dir="<?php echo $TEXT['global-text_dir']; ?>">

<head>
<title><?php echo $username . " ( " . $first_name . " " . $last_name . " ) | " . $TEXT['global-headertitle'] . " | Message Sent"; ?></title>
<meta http-equiv="content-type" content="text/html; charset=<?php echo $TEXT['global-charset']; ?>" />
<meta name="author" content="Homenet Spaces Andrew Gerst" />
<meta name="copyright" content="© Homenet Spaces" />
<meta name="keywords" content="Homenet, Spaces, The, Place, To, Be, Creative, Andrew, Gerst, Free, Profiles, Information, Facts" />
<meta name="description" content="Welcome to Homenet Spaces | This is the place to be creative! Feel free to add yourself to our wonderful community by registering! " />
<meta name="revisit-after" content="7 days" />
<meta name="googlebot" content="index, follow, all" />
<meta name="robots" content="index, follow, all" />
<link rel="stylesheet" type="text/css" href="css/global.css" media="all" />
<script type="text/javascript" src="cs.js"></script>
<script type="text/javascript" src="nav.js"></script>
<script type="text/javascript" src="suggest.js"></script>
<style type="text/css">
div#profileheader { 
	background-color : #ff9; 
	border : 2px solid #fc0; 
	border-radius : 8px; 
	border-radius-bottomleft : 0px; 
	border-radius-bottomright : 0px; 
	-moz-border-radius-topleft : 8px; 
	-webkit-border-top-left-radius : 8px; 
	-moz-border-radius-topright : 8px; 
	-webkit-border-top-right-radius : 8px; 
	display : block; 
	height : auto; 
	line-height : 110px; 
	margin : 0 auto; 
	margin-left : 20px; 
	margin-right : 20px; 
	text-align : left; 
	width : 915px; 
	}

div#profileheader div.heading { 
	font-size : 40px; 
	left : 20px; 
	letter-spacing : 1px; 
	position : relative; 
	}

div.body { 
	margin : 0 auto; 
	margin-top : 20px; 
	text-align : center; 
	width : 65%; 
	}
</style>
<style type="text/css">
body { 
	background: url(<?php echo $bimage; ?>) repeat; 
	background-position : 50% 140px; 
	}
</style>
</head>

<body id="sendfeedback_body">
<?php
include ("hd.inc.php");
?>
<!-- Begin page content -->
<div id="sendfeedback_pagecontent" class="pagecontent">
<div id="profileheader">
<div class="heading">
Your Feedback Has Been Sent
</div>
</div>
<div class="body">
<div class="sent_message">
<?php echo "Subject: " . $subject; ?>
<br />
<?php echo "Feedback: " . $message; ?>
</div>
</div>
<div style="clear : both; width : 100%; ">&nbsp;</div>
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
<title><?php echo $TEXT['global-headertitle'] . " | Send Feedback"; ?></title>
<meta http-equiv="content-type" content="text/html; charset=<?php echo $TEXT['global-charset']; ?>" />
<meta name="author" content="Homenet Spaces Andrew Gerst" />
<meta name="copyright" content="© Homenet Spaces" />
<meta name="keywords" content="Homenet, Spaces, The, Place, To, Be, Creative, Andrew, Gerst, Free, Profiles, Information, Facts" />
<meta name="description" content="Welcome to Homenet Spaces | This is the place to be creative! Feel free to add yourself to our wonderful community by registering! " />
<meta name="revisit-after" content="7 days" />
<meta name="googlebot" content="index, follow, all" />
<meta name="robots" content="index, follow, all" />
<link rel="stylesheet" type="text/css" href="css/global.css" media="all" />
<script type="text/javascript" src="cs.js"></script>
<script type="text/javascript" src="nav.js"></script>
<script type="text/javascript" src="suggest.js"></script>
<style type="text/css">
div#profileheader { 
	background-color : #ff9; 
	border : 2px solid #fc0; 
	border-radius : 8px; 
	border-radius-bottomleft : 0px; 
	border-radius-bottomright : 0px; 
	-moz-border-radius-topleft : 8px; 
	-webkit-border-top-left-radius : 8px; 
	-moz-border-radius-topright : 8px; 
	-webkit-border-top-right-radius : 8px; 
	display : block; 
	height : auto; 
	line-height : 110px; 
	margin : 0 auto; 
	margin-left : 20px; 
	margin-right : 20px; 
	text-align : left; 
	width : 915px; 
	}

div#profileheader div.heading { 
	font-size : 40px; 
	left : 20px; 
	letter-spacing : 1px; 
	position : relative; 
	}

div.messagebody { 
	margin : 0 auto; 
	margin-top : 20px; 
	text-align : left; 
	width : 65%; 
	}

div.messagebody label { 
	font-size : 20px; 
	margin-left : 10px; 
	}

div.messagebody input[type="text"] {
	font-size : 14pt; 
	height : 25px; 
	letter-spacing : 2px; 
	line-height : 25px; 
	padding : 10px; 
	width : 350px; 
	}

div.messagebody input[type="submit"] {
	font-size : 13pt; 
	height : 36px; 
	letter-spacing : 2px; 
	line-height : 29px; 
	}
	
div.messagebody textarea#message { 
	font-size : 14px; 
	height : 160px; 
	padding : 10px; 
	text-align : left; 
	width : 85%; 
	}
</style>
<style type="text/css">
body { 
	background: url(<?php echo $bimage; ?>) repeat; 
	background-position : 50% 140px; 
	}
</style>
</head>

<body id="sendfeedback_body">
<?php
include ("hd.inc.php");
?>
<!-- Begin page content -->
<div id="sendfeedback_pagecontent" class="pagecontent">
<div id="profileheader">
<div class="heading">
Send Feedback
</div>
</div>
<div class="messagebody">
<form action="<?php echo $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING']; ?>" method="post">
<input type="text" name="subject" value="Feedback<?php if (isset($subject)) { echo " " . $subject; } ?>" />
<label for="subject"> Subject</label>
<br /><br />
<textarea name="message" id="message">
<?php echo $message; ?>
</textarea>
<br /><br />
<input type="submit" name="send" value="Send Feedback" />
</form>
</div>
<div style="clear : both; width : 100%; ">&nbsp;</div>
</div>
<!-- End page content -->
<?php
include ("ft.inc.php");
include ("tracking_scripts.inc.php");
?>
</body>

</html>