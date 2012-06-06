<?php
session_start();
require ("lang.inc.php");
include ("db.member.inc.php");
include ("login.inc.php");

if (session_is_registered('logged')) {
session_unset();
session_destroy();

if (isset($_COOKIE['hnsrememberme'])) {
$time = time();
setcookie("hnsrememberme[username]", null, ($time - 3600));
setcookie("hnsrememberme[password]", null, ($time - 3600));
}

$redirect = (isset($_REQUEST['redirect'])) ? $_REQUEST['redirect'] : 'index.php';
header ('refresh: 2; url=' . $redirect);
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
<?php
echo '<div id="pageheader" class="pageheader2"><div class="heading">';
echo 'Logged Off';
echo '</div></div>';
echo '<p>You will be redirected to your original page request.</p>';
echo '<p>If your browser doesn\'t redirect you properly automatically, <a href="' . $redirect . '">click here</a>.</p>';
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
} else {
$redirect = (isset($_REQUEST['redirect'])) ? $_REQUEST['redirect'] : 'index.php';
header ('refresh: 2; url=' . $redirect);
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
<?php
echo '<div id="pageheader" class="pageheader2"><div class="heading">';
echo 'You Are Not Even Logged In';
echo '</div></div>';
echo '<p>You will be redirected to your original page request.</p>';
echo '<p>If your browser doesn\'t redirect you properly automatically, <a href="' . $redirect . '">click here</a>.</p>';
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