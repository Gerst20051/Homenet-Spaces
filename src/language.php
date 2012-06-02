<?php
session_start();

include ("nolang.inc.php");
include ("db.member.inc.php");
include ("login.inc.php");
include ("bimage.inc.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//<?php echo $TEXT['global-dtdlang']; ?>" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $TEXT['global-lang']; ?>" lang="<?php echo $TEXT['global-lang']; ?>" dir="<?php echo $TEXT['global-text_dir']; ?>">

<head>
<title><?php echo $TEXT['global-headertitle'] . " | " . $TEXT['language-headertitle']; ?></title>
<meta http-equiv="content-type" content="text/html; charset=<?php echo $TEXT['global-charset']; ?>" />
<meta name="author" content="Homenet Spaces Andrew Gerst" />
<meta name="copyright" content="© Homenet Spaces" />
<meta name="keywords" content="Homenet, Spaces, The, Place, To, Be, Creative, Andrew, Gerst, Free, Profiles, Information, Facts" />
<meta name="description" content="Welcome to Homenet Spaces we offer you a free profile with many cool and interesting things! This is the place to be creative!" />
<meta name="revisit-after" content="7 days" />
<meta name="googlebot" content="index, follow, all" />
<meta name="robots" content="index, follow, all" />
<link rel="stylesheet" type="text/css" href="css/global.css" media="all" />
<script type="text/javascript" src="cs.js"></script>
<script type="text/javascript" src="nav.js"></script>
<script type="text/javascript" src="suggest.js"></script>
<style type="text/css">
div.links { 
	color : #bbcacf; 
	font-size : 19px; 
	}

div.links a { 
	text-decoration : none; 
	}
</style>
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
<h1><?php echo $TEXT['language-content_header']; ?></h1>
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

if (isset($_COOKIE['hnslanguage'])) {
echo $TEXT['global-current_language'] . "!";
} else {
echo '<span style="color : #ff0000">';
echo $TEXT['language-content_subheader'] . " or Login";
echo '</span>';
}
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
<?php
mysql_close($db);
?>