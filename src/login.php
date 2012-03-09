<?php
session_start();
require ("lang.inc.php");
include ("db.member.inc.php");
include ("login.inc.php");
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

div.pagecontent table td.input input[type="text"] {
font-size: 14pt;
height: 25px;
letter-spacing: 2px;
line-height: 25px;
}

div.pagecontent table td.input input[type="password"] {
font-size: 14pt;
height: 25px;
letter-spacing: 2px;
line-height: 25px;
}
</style>
</head>

<body>
<?php include ("hd.inc.php"); ?>
<!-- Begin page content -->
<div class="pagecontent">
<h1>Homenet Spaces Login</h1>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="login">
<fieldset style="margin: 0 auto; width: 50%;">
<legend>Please Login!&nbsp;</legend>
<table style="margin: 0 auto; margin-bottom: 10px; margin-top: 10px;">
<tr>
<td class="label">
<label for="username">Username: </label>
</td>
<td class="input">
<input type="text" name="username" size="26" maxlength="20" value="" />
</td>
</tr>
<tr>
<td class="label">
<label for="password">Password: </label>
</td>
<td class="input">
<input type="password" name="password" size="26" maxlength="20" value="" />
</td>
</tr>
<tr>
<td class="label">
<label for="checkbox">Remember Me: </label>
</td>
<td class="input">
<input type="checkbox" name="remember" value="remember" />
</td>
</tr>
</table>
<span>
<input type="submit" name="signin" value="Login!" />
<input type="reset" name="reset" value="Clear" />
</span>
</fieldset>
</form>
</div>
<!-- End page content -->
<?php
include ("ft.inc.php");
include ("tracking_scripts.inc.php");
?>
</body>

</html>
<?php mysql_close($db); ?>