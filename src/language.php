<?php
session_start();
include ("nolang.inc.php");
include ("db.member.inc.php");
include ("login.inc.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//<?php echo $TEXT['global-dtdlang']; ?>" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $TEXT['global-lang']; ?>" lang="<?php echo $TEXT['global-lang']; ?>" dir="<?php echo $TEXT['global-text_dir']; ?>">

<head>
<title><?php echo $TEXT['global-headertitle'] . " | " . $TEXT['language-headertitle']; ?></title>
<meta http-equiv="content-type" content="text/html; charset=<?php echo $TEXT['global-charset']; ?>" />
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="javascript.php"></script>
<style type="text/css">
div.links {
color: #bbcacf;
font-size: 14pt;
}

div.links a {
text-decoration: none;
}
</style>
</head>

<body>
<?php include ("hd.inc.php"); ?>
<!-- Begin page content -->
<div class="pagecontent">
<div id="pageheader" class="pageheader2"><div class="heading">
<?php echo $TEXT['language-content_header']; ?>
</div></div>
<div class="links">
<?php
include_once ("lang/languages.php");
include ("redirect.inc.php");

$i = 0;

while (list($key, $value) = each($languages)) {
if ($i++) echo ' &nbsp;/&nbsp; ';
echo '<a href="set_language.php?lang=' . $key . '&amp;redirect=' . $redirect . '" target="_top">' . $value . '</a>';
}

echo "<br /><br />";

if (isset($_COOKIE['hnslanguage'])) echo $TEXT['global-current_language'] . "!";
else echo "<span style=\"color: #f00;\">" . $TEXT['language-content_subheader'] . " or Login</span>";
?>
</div>
</div>
<!-- End page content -->
<?php
include ("ft.inc.php");
include ("tracking_scripts.inc.php");
?>
</body>

</html>
<?php mysql_close($db); ?>