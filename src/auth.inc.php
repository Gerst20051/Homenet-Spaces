<?php
session_start();

if (!isset($_SESSION['logged'])) {
include ("redirect.inc.php");
header('refresh: 4; url=login.php?redirect=' . $redirect);
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
echo '<form name="counter" style="margin: 0;"><p><strong style="color: #f33; font-weight: bold;">You will be redirected to the login page in
<input type="text" size="1" name="cd" style="background-color: transparent; border: 0; color: #f33; font-weight: bold; width: 12px;">
seconds.</strong></p></form>';
echo '<p>If your browser doesn\'t redirect you properly automatically, <a href="login.php?redirect=' . $redirect . '">click here</a>.</p>';
?>
</div>
<!-- End page content -->
<?php
include ("ft.inc.php");
include ("tracking_scripts.inc.php");
?>
</body>

</html>
<?php die(); } ?>