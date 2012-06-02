<?php
session_start();

require ("lang.inc.php");
include ("db.member.inc.php");
include ("login.inc.php");
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
<meta name="description" content="Welcome to Homenet Spaces we offer you a free profile with many cool and interesting things! This is the place to be creative!" />
<meta name="revisit-after" content="7 days" />
<meta name="googlebot" content="index, follow, all" />
<meta name="robots" content="index, follow, all" />
<link rel="stylesheet" type="text/css" href="css/global.css" media="all" />
<script type="text/javascript" src="cs.js"></script>
<script type="text/javascript" src="nav.js"></script>
<script type="text/javascript" src="suggest.js"></script>
<style type="text/css">
th { 
	background-color : #3366cc; 
	padding : 5px; 
	}
	
table#members { 
	margin : 0 auto; 
	width : 80%; 
	}

.odd_row { 
	background-color : #ccffff; 
	height : 30px; 
	width : 25%; 
	}

.even_row { 
	background-color : #ccccff; 
	height : 30px; 
	width : 25%; 
	}

a.header { 
	color : #dfe9fd; 
	text-decoration : none; 
	width : 100%; 
	}

a.header:hover { 
	color : #004080; 
	text-decoration : none; 
	width : 100%; 
	}

a.username { 
	color : #004080; 
	line-height : 20px; 
	text-decoration : none; 
	}

a.username:hover { 
	border-bottom : 1px dotted #004080; 
	color : #004080; 
	line-height : 20px; 
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
<div id="searchmembers_pagecontent" class="pagecontent">
<h1>Search our Community   {[(Soon :))]}</h1>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
<input type="text" name="query" />
<input type="submit" name="search" value="Search" />
</form>
<?php
// get the search variable from URL
$s = @$_GET['s'];
$var = @$_GET['query'];
$trimmed = trim($var); // trim whitespace from the stored variable

// rows to return
$limit = 10;

// check for an empty string and display a message.
if ($trimmed == "") {
echo "<p>Please enter a search...<br /><br /></p>";
echo "</div>";
echo "<!-- End page content -->";
include ("ft.inc.php");
echo "</body>";

echo "</html>";
exit;
}

// check for a search parameter
if (!isset($var)) {
echo "<p>We dont seem to have a search parameter!<br /></p>";
echo "</div>";
echo "<!-- End page content -->";
include ("ft.inc.php");
echo "</body>";

echo "</html>";
exit;
}

// build query
$query = "SELECT user_id, username FROM login WHERE username LIKE \"%$trimmed%\" ORDER BY username";

$numresults = mysql_query($query);
$numrows = mysql_num_rows($numresults);

switch ($_GET['sort']) {
case 'username':
switch ($_GET['order']) {
case 'asc':
$query = "SELECT user_id, username FROM login WHERE username LIKE \"%$trimmed%\" ORDER BY username ASC";
$result = mysql_query($query, $db) or die(mysql_error($db));
break;

case 'desc':
$query = "SELECT user_id, username FROM login WHERE username LIKE \"%$trimmed%\" ORDER BY username DESC";
$result = mysql_query($query, $db) or die(mysql_error($db));
break;
}
break;

case 'firstname':
switch ($_GET['order']) {
case 'asc':
$query = "SELECT user_id, username FROM login WHERE username LIKE \"%$trimmed%\" ORDER BY username ASC";
$result = mysql_query($query, $db) or die(mysql_error($db));
break;

case 'desc':
$query = "SELECT user_id, username FROM login WHERE username LIKE \"%$trimmed%\" ORDER BY username DESC";
$result = mysql_query($query, $db) or die(mysql_error($db));
break;
}
break;

case 'lastname':
switch ($_GET['order']) {
case 'asc':
$query = "SELECT user_id, username FROM login WHERE username LIKE \"%$trimmed%\" ORDER BY username ASC";
$result = mysql_query($query, $db) or die(mysql_error($db));
break;

case 'desc':
$query = "SELECT user_id, username FROM login WHERE username LIKE \"%$trimmed%\" ORDER BY username DESC";
$result = mysql_query($query, $db) or die(mysql_error($db));
break;
}
break;

case 'email':
switch ($_GET['order']) {
case 'asc':
$query = "SELECT user_id, username FROM login WHERE username LIKE \"%$trimmed%\" ORDER BY username ASC";
$result = mysql_query($query, $db) or die(mysql_error($db));
break;

case 'desc':
$query = "SELECT user_id, username  FROM login WHERE username LIKE \"%$trimmed%\" ORDER BY username DESC";
$result = mysql_query($query, $db) or die(mysql_error($db));
break;
}
break;
}

// if we have no results, offer a google search as an alternative
if ($numrows == 0) {
echo "<h4>Results</h4>";
echo "<p>Sorry, your search: &quot;" . $var . "&quot; returned zero results</p>";
echo "<p><a href=\"http://www.google.com/search?q=" . $trimmed . "\" target=\"_blank\" title=\"Look up " . $trimmed . " on Google\">Click here</a> to try the search on google<br /><br /></p>";
echo "</div>";
echo "<!-- End page content -->";
include ("ft.inc.php");
echo "</body>";

echo "</html>";
exit;
}

// next determine if s has been passed to script, if not use 0
if (empty($s)) {
$s = 0;
}

// get results
$query .= " limit $s, $limit";
$result = mysql_query($query) or die("Couldn't execute query");

// display what the person searched for
echo "<p>You searched for: &quot;" . $var . "&quot;</p>";

// begin to show results set
echo "Results";

$count = (1 + $s);

// determine sorting order of table
$orders = array('asc', 'desc', 'asc', 'desc', 'asc', 'desc', 'asc', 'desc', 'asc', 'desc', 'asc', 'desc', 'asc', 'desc', 'asc', 'desc', 'asc', 'desc');
$o = rand(0, count($orders) - 1);
$switchOrder = "{$orders[$o]}";

echo '<table id="members">';
echo '<tr><th><a href="' . $_SERVER['PHP_SELF'] . '?s=' . $s. '&query=' . $var . '&sort=username&order=' . $switchOrder . '" title="Sort by Username ' . $switchOrder . '" class="header">Username</a></th>
<th><a href="' . $_SERVER['PHP_SELF'] . '?s=' . $s . '&query=' . $var . '&sort=firstname&order=' . $switchOrder . '" title="Sort by First Name ' . $switchOrder . '" class="header">First Name</a></th>
<th><a href="' . $_SERVER['PHP_SELF'] . '?s=' . $s . '&query=' . $var . '&sort=lastname&order=' . $switchOrder . '" title="Sort by First Name ' . $switchOrder . '" class="header">Last Name</a></th>
<th><a href="' . $_SERVER['PHP_SELF'] . '?s=' . $s . '&query=' . $var . '&sort=email&order=' . $switchOrder . '" title="Sort by Email ' . $switchOrder . '" class="header">Email</a></th></tr>';

// now you can display the results returned
while ($row = mysql_fetch_array($result)) {
$query2 = "SELECT user_id, firstname, lastname, email FROM info WHERE user_id = " . $row['user_id'];
$result2 = mysql_query($query2, $db) or die(mysql_error($db));
$row2 = mysql_fetch_assoc($result2);
extract($row2);
mysql_free_result($result2);

echo ($odd == true) ? '<tr class="odd_row">' : '<tr class="even_row">';
$odd = !$odd;

echo '<td style="padding : 3px; "><a href="user_profile.php?id=' . $row['user_id'] . '" class="username">' . $row['username'] . '</a></td>';
echo '<td style="padding : 3px; ">' . $row2['firstname'] . '</td>';
echo '<td style="padding : 3px; ">' . $row2['lastname'] . '</td>';
echo '<td style="padding : 3px; text-align : center; ">' . $row2['email'] . '</td>';
echo '</tr>';

$count++;
}

echo '</table>';

$currPage = (($s / $limit) + 1);

// break before paging
echo "<br />";

// next we need to do the links to other results
if ($s >= 1) { // bypass prev link if s is 0
$prevs = ($s - $limit);
print "&nbsp;<a href=\"$phpself?s=$prevs&query=$var\">&lt;&lt;&nbspPrev 10</a>&nbsp&nbsp;";
}

// calculate number of pages needing links
$pages = intval($numrows / $limit);

// $pages now contains int of pages needed unless there is a remainder from division

if ($numrows % $limit) {
// has remainder so add one page
$pages++;
}

// check to see if last page
if (!((($s + $limit) / $limit) == $pages) && $pages != 1) {

// not last page so give next link
$news = ($s + $limit);

echo "&nbsp;<a href=\"$phpself?s=$news&query=$var\">Next 10 &gt;&gt;</a>";
}

$a = ($s + $limit);

if ($a > $numrows) {
$a = $numrows;
}

$b = ($s + 1);

echo "<br /><br />";
echo "<div>Showing results $b to $a of $numrows</div>";
echo "<br />";
echo "<br />";
?>
</div>
<!-- End page content -->
<?php
include ("ft.inc.php");
include ("tracking_scripts.inc.php");
?>
</body>

</html>