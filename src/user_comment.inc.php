<?php
if (isset($_POST['send']) && ($_POST['send'] == "Send Comment")) {
$comment = (isset($_POST['comment'])) ? trim($_POST['comment']) : '';

// insert into receivers table
$query = 'INSERT INTO ' . $row['username'] . '
(comment_id, type, user, user_id, status, date, comment)
VALUES
(NULL, 0, "' . $_SESSION['username'] . '", "' . $_SESSION['user_id'] . '", 0, "' . date('Y-m-d H:i:s') . '", "' . $comment . '")';
mysql_query($query, $comment_db) or die(mysql_error($comment_db));

$receivers_cid = mysql_insert_id($comment_db);

// insert into senders table
$query = 'INSERT INTO ' . $_SESSION['username'] . '
(comment_id, type, user, user_id, user_cid, status, date, comment)
VALUES
(NULL, 1, "' . $row['username'] . '", "' . $user_id . '", "' . $receivers_cid . '", 0, "' . date('Y-m-d H:i:s') . '", "' . $comment . '")';
mysql_query($query, $comment_db) or die(mysql_error($comment_db));

$senders_cid = mysql_insert_id($comment_db);

// update mid in receivers table
$query = 'UPDATE ' . $row['username'] . ' SET
user_cid = ' . $senders_cid . '
WHERE
comment_id = ' . $receivers_cid;
mysql_query($query, $comment_db) or die(mysql_error($comment_db));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//<?php echo $TEXT['global-dtdlang']; ?>" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $TEXT['global-lang']; ?>" lang="<?php echo $TEXT['global-lang']; ?>" dir="<?php echo $TEXT['global-text_dir']; ?>">

<head>
<title><?php echo $username . " ( " . $first_name . " " . $last_name . " ) | " . $TEXT['global-headertitle'] . " | Message Sent"; ?></title>
<meta http-equiv="content-type" content="text/html; charset=<?php echo $TEXT['global-charset']; ?>" />
<meta name="author" content="Homenet Spaces Andrew Gerst" />
<meta name="copyright" content="� Homenet Spaces" />
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

div.userimage { 
	float : left; 
	margin : 0 auto; 
	margin-top : 20px; 
	text-align : center; 
	width : 35%; 
	}

div.body { 
	float : right; 
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

<body id="userprofile_sendmessage_body">
<?php
include ("hd.inc.php");
?>
<!-- Begin page content -->
<div id="userprofile_sendcomment_pagecontent" class="pagecontent">
<div id="profileheader">
<div class="heading">
Comment Has Been Sent
</div>
</div>
<div class="userimage">
<?php
if ($row['default_image'] != null) {
echo '<a href="user_pictures.php?id=' . $user_id . '"><img src="uploads/' . $row['username'] . '/images/thumb/' . $row['default_image'] . '" id="defaultuserimage" title="View ' . $firstname . ' ' . $lastname . '\'s Picture Gallery" /></a><br />' . "\n";
} else {
echo '<img src="i/mem/default.jpg" id="defaultuserimage" /><br />' . "\n";
}
?>
</div>
<div class="body">
<div class="sent_comment">
<?php echo "Comment: " . $comment; ?>
</div>
<p><a href="user_profile.php?id=<?php echo $user_id; ?>">Click here</a> to view <?php echo $row['username'];?>'s profile</p>
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
<title><?php echo $row['username'] . " ( " . $firstname . " " . $lastname . " ) | " . $TEXT['global-headertitle'] . " | Send Message"; ?></title>
<meta http-equiv="content-type" content="text/html; charset=<?php echo $TEXT['global-charset']; ?>" />
<meta name="author" content="Homenet Spaces Andrew Gerst" />
<meta name="copyright" content="� Homenet Spaces" />
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

div.userimage { 
	float : left; 
	margin : 0 auto; 
	margin-top : 20px; 
	text-align : center; 
	vertical-align : middle; 
	width : 35%; 
	}

div.commentbody { 
	float : right; 
	margin : 0 auto; 
	margin-top : 20px; 
	text-align : left; 
	width : 65%; 
	}

div.commentbody label { 
	font-size : 20px; 
	margin-left : 10px; 
	}

div.commentbody input[type="text"] {
	font-size : 14pt; 
	height : 25px; 
	letter-spacing : 2px; 
	line-height : 25px; 
	padding : 10px; 
	width : 350px; 
	}

div.commentbody input[type="submit"] {
	font-size : 13pt; 
	height : 36px; 
	letter-spacing : 2px; 
	line-height : 29px; 
	}
	
div.commentbody textarea#comment { 
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

<body id="userprofile_sendmessage_body">
<?php
include ("hd.inc.php");
?>
<!-- Begin page content -->
<div id="userprofile_sendcomment_pagecontent" class="pagecontent">
<div id="profileheader">
<div class="heading">
Send Comment
</div>
</div>
<div class="userimage">
<?php
if ($row['default_image'] != null) {
echo '<a href="user_pictures.php?id=' . $user_id . '"><img src="uploads/' . $row['username'] . '/images/thumb/' . $row['default_image'] . '" id="defaultuserimage" title="View ' . $firstname . ' ' . $lastname . '\'s Picture Gallery" /></a><br />' . "\n";
} else {
echo '<img src="i/mem/default.jpg" id="defaultuserimage" /><br />' . "\n";
}
?>
<br />
<div class="recipient">
To: <?php echo $row['username'] . " ( " . $firstname . " " . $lastname . " ) "; ?>
</div>
</div>
<div class="commentbody">
<form action="<?php echo $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING']; ?>" method="post">
<textarea name="comment" id="comment">
<?php echo $comment; ?>
</textarea>
<br /><br />
<input type="submit" name="send" value="Send Comment" />
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
<?php
die();
?>