<?php
session_start();

require ("lang.inc.php");
include ("auth.inc.php");
include ("admin.inc.php");
include ("db.member.inc.php");
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
PHP Info / Settings
</div></div>
<div style="margin-bottom: 20px;">
<a href="admin_phpinfo.php">PHP</a> | <a href="admin_perlinfo.pl">Perl</a> | <a href="admin_aspinfo.asp">ASP</a>
</div>
<?php phpinfo(); ?>
</div>
<!-- End page content -->
<?php include ("ft.inc.php"); ?>
</body>

</html>