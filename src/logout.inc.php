<?php
session_start();

require ("lang.inc.php");
include ("db.member.inc.php");
include ("login.inc.php");
include ("bimage.inc.php");

// check to make sure the session variable is registered
if (session_is_registered('logged')) {
// session variable is registered, the user is ready to logout
session_unset();
session_destroy();

if (isset($_COOKIE['hnsrememberme'])) {
$time = time();

setcookie("hnsrememberme[username]", null, $time - 3600);
setcookie("hnsrememberme[password]", null, $time - 3600);
}

// user is logged off therefore; the session variable isn't registered. the user shouldn't even be on this page
$redirect = (isset($_REQUEST['redirect'])) ? $_REQUEST['redirect'] : 'index.php';

header ('refresh: 2; url=' . $redirect);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//<?php echo $TEXT['global-dtdlang']; ?>" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $TEXT['global-lang']; ?>" lang="<?php echo $TEXT['global-lang']; ?>" dir="<?php echo $TEXT['global-text_dir']; ?>">

<head>
<title><?php echo $TEXT['global-headertitle'] . " | " . $TEXT['homepage-headertitle']; ?></title>
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
body { 
	background: url(<?php echo $bimage; ?>) repeat; 
	background-position : 50% 140px; 
	}
</style>
</head>

<body>
<?php
include ("hd.inc.php");
?>
<!-- Begin page content -->
<div class="pagecontent">
<?php
echo '<h2>Logged Off</h2>';
echo '<p>You will be redirected to your original page request.</p>';
echo '<p>If your browser doesn\'t redirect you properly automatically, ' .
'<a href="' . $redirect . '">click here</a>.</p>';
?>
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
} else { // user is logged off; therefore, the session variable isn't registered. the user shouldn't even be on this page
$redirect = (isset($_REQUEST['redirect'])) ? $_REQUEST['redirect'] : 'index.php';

header ('refresh: 2; url=' . $redirect);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//<?php echo $TEXT['global-dtdlang']; ?>" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $TEXT['global-lang']; ?>" lang="<?php echo $TEXT['global-lang']; ?>" dir="<?php echo $TEXT['global-text_dir']; ?>">

<head>
<title><?php echo $TEXT['global-headertitle'] . " | " . $TEXT['homepage-headertitle']; ?></title>
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
body { 
	background: url(<?php echo $bimage; ?>) repeat; 
	background-position : 50% 140px; 
	}
</style>
</head>

<body>
<?php
include ("hd.inc.php");
?>
<!-- Begin page content -->
<div class="pagecontent">
<?php
echo '<h2>You Are Not Even Logged In</h2>';
echo '<p>You will be redirected to your original page request.</p>';
echo '<p>If your browser doesn\'t redirect you properly automatically, ' .
'<a href="' . $redirect . '">click here</a>.</p>';
?>
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