<?php
require ("lang.inc.php");
include ("auth.inc.php");
include ("admin.inc.php");
include ("db.member.inc.php");
include ("bimage.inc.php");
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
div.pagecontent input[type="text"] {
	font-size : 13pt; 
	height : 31px; 
	letter-spacing : 2px; 
	line-height : 29px; 
	}

div.pagecontent input[type="submit"] {
	font-size : 13pt; 
	height : 36px; 
	letter-spacing : 2px; 
	line-height : 29px; 
	}

div.pagecontent input[type="button"] {
	font-size : 13pt; 
	height : 36px; 
	letter-spacing : 2px; 
	line-height : 29px; 
	}
</style>
<style type="text/css">
body { 
	background: url(<?php echo $bimage; ?>) repeat; 
	background-position : 50% 140px; 
	}
</style>
<style type="text/css">
div#directorylisting { 
	margin : 0 auto; 
	width : 96%; 
	}

div#directorylisting div.container { 
	}

div#directorylisting div.container div span.image { 
	display : block; 
	float : left; 
	width : 40px; 
	}

div#directorylisting div.container div span.image img { 
	height : 16px; 
	width : 16px; 
	}

div#directorylisting div.container div span.link { 
	display : block; 
	float : right; 
	}

div#directorylisting div.container div span.link a { 
	text-decoration : none; 
	}
</style>
</head>

<body>
<?php
include ("hd.inc.php");
?>
<div class="pagecontent">
<?php
$view = $_GET['view'];
$opendir = $_GET['dir'];
$current_dir = "homenetspaces/" . $opendir;
$dirpath = "./" . $opendir . "/";
$files = opendir($dirpath);

echo "<h1>File Browser!</h1>";
echo "<a href='admin_page_editor.php'>Page Editor</a>";
?>
<br /><br />
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="get">
<input type="text" name="dir" title="i.e. old/" value="<?php echo $opendir; ?>" />
<input type="submit" value="Browse" />
<input type="button" id="cancel" value="Cancel"  onclick="history.go(-1); " />
</form>
<br />
<?php
echo "Current directory you are browsing is $current_dir<br>";
echo "Directory Listing:<br />";
echo "<div id='directorylisting'><hr />";

if ($view != "all") {
while ($file = readdir($files)) {
if (($file != ".") && ($file != "..") && ($file != "desktop.ini") && ($file != "Thumbs.db") && ($file != "Ehthumbs.db") && ($file != "_derived") && ($file != "_fpclass") && ($file != "_themes") && ($file != "_vti_cnf") && ($file != "_vti_pvt") && ($file != "images")) {
echo "<div class='container'><div style='float : left; margin-left : 5px; '>";
echo "<span class='image'><img src='i/sy/i/file/folder-blue.gif' title='directory' /></span>";
echo "<span class='link'><a href='$dirpath$file' title='Browse This Directory'>$file</a></span></div>";
echo "<div style='float : right; margin-right : 5px; '>";
echo "<a href='admin_page_editor.php?dir=$dirpath&file=$file&action=Edit'>Edit</a> | ";
echo "<a href='admin_view_files_rename.php?dir=$dirpath&file=$file'>Rename</a> | <a href='admin_view_files_delete.php?dir=$dirpath&file=$file'>Delete</a></div></div><br /><hr />\n";

/*
echo "<a href='admin_page_editor.php?dirtofile=$filesdir&filetoedit=$file&action=Edit' title='Edit'>$file</a>";
echo "<a href='" . $_SERVER['PHP_SELF'] . "?dirtobrowse=$browsedir$file%2F&action=Browse' title='Browse Directory'><</a>";
echo " &nbsp;|&nbsp; ";
echo "<a href='$filesdir$file' title='Direct Link'>></a><br /><hr />";
*/
}
}
} else {
while ($file = readdir($files)) {
if (($file != ".") && ($file != "..")) {
echo "<a href='admin_page_editor.php?dirtofile=$filesdir&filetoedit=$file&action=Edit' title='Edit'>$file</a>";
echo "<a href='" . $_SERVER['PHP_SELF'] . "?dirtobrowse=$browsedir$file%2F&action=Browse' title='Browse Directory'><</a>";
echo " &nbsp;|&nbsp; ";
echo "<a href='$filesdir$file' title='Direct Link'>></a><br /><hr />";
}
}
}

closedir($files);

echo "</div>";
?>
</div>
<?php
include ("ft.inc.php");
?>
</body>

</html>