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
</head>

<body>
<?php include ("hd.inc.php"); ?>
<!-- Begin page content -->
<div id="members_pagecontent" class="pagecontent">
<div id="pageheader" class="pageheader2"><div class="heading">
Welcome to the Members area.
</div></div>
<div style="margin: 0 auto; width: 75%;">
<?php
$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id ORDER BY date_joined ASC';
$result = mysql_query($query, $db) or die(mysql_error($db));

switch ($_GET['sort']) {
case 'username':
switch ($_GET['order']) {
case 'asc':
$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id ORDER BY username ASC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;

case 'desc':
$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id ORDER BY username DESC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;
}
break;

case 'firstname':
switch ($_GET['order']) {
case 'asc':
$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id ORDER BY firstname ASC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;

case 'desc':
$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id ORDER BY firstname DESC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;
}
break;

case 'lastname':
switch ($_GET['order']) {
case 'asc':
$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id ORDER BY lastname ASC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;

case 'desc':
$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id ORDER BY lastname DESC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;
}
break;

case 'datejoined':
switch ($_GET['order']) {
case 'asc':
$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id ORDER BY date_joined ASC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;

case 'desc':
$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id ORDER BY date_joined DESC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;
}

case 'lastlogin':
switch ($_GET['order']) {
case 'asc':
$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id ORDER BY last_login ASC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;

case 'desc':
$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id ORDER BY last_login DESC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;
}

case 'rank':
switch ($_GET['order']) {
case 'asc':
$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id ORDER BY rank ASC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;

case 'desc':
$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id ORDER BY rank DESC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;
}

case 'xrank':
switch ($_GET['order']) {
case 'asc':
$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id ORDER BY xrank ASC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;

case 'desc':
$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id ORDER BY xrank DESC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;
}

case 'votes':
switch ($_GET['order']) {
case 'asc':
$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id ORDER BY xratings ASC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;

case 'desc':
$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id ORDER BY xratings DESC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;
}

case 'rating':
switch ($_GET['order']) {
case 'asc':
$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id ORDER BY rating ASC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;

case 'desc':
$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id ORDER BY rating DESC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;
}

case 'hits':
switch ($_GET['order']) {
case 'asc':
$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id ORDER BY hits ASC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;

case 'desc':
$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id ORDER BY hits DESC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;
}

case 'logins':
switch ($_GET['order']) {
case 'asc':
$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id ORDER BY logins ASC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;

case 'desc':
$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id ORDER BY logins DESC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;
}

case 'age': // order should be switched
switch ($_GET['order']) {
case 'asc':
$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id ORDER BY birth_year DESC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;

case 'desc':
$query = 'SELECT * FROM login u JOIN info i ON u.user_id = i.user_id ORDER BY birth_year ASC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;
}
break;
}
?>
<span style="float: right; text-align: right; width: 300px;">
<?php
$ssort = (isset($_GET['sort'])) ? $_GET['sort'] : null;
$sorder = (isset($_GET['order'])) ? $_GET['order'] : null;
?>
<select name="sortingorder" size="1" id="selectsort" style="padding: 4px;" onchange="window.location = document.all.selectsort.value">
<option value="<?php echo $_SERVER['PHP_SELF']; if (isset($_SERVER['QUERY_STRING'])) { echo "?" . $_SERVER['QUERY_STRING']; } ?>"<?php if ($ssort == 0 || null) { echo 'selected="selected"'; } ?>>Select Your Sorting Order: </option>
<option value="<?php echo $_SERVER['PHP_SELF']; if (isset($_SERVER['QUERY_STRING'])) { echo "?" . $_SERVER['QUERY_STRING'] . "&sort=username&order=asc"; } else { echo "?sort=username&order=asc"; } ?>" <?php if ($ssort == "username" && $sorder == "asc") { echo 'selected="selected"'; } ?>>Username ASC</option>
<option value="<?php echo $_SERVER['PHP_SELF']; if (isset($_SERVER['QUERY_STRING'])) { echo "?" . $_SERVER['QUERY_STRING'] . "&sort=username&order=desc"; } else { echo "?sort=username&order=desc"; } ?>" <?php if ($ssort == "username" && $sorder == "desc") { echo 'selected="selected"'; } ?>>Username DESC</option>
<option value="<?php echo $_SERVER['PHP_SELF']; if (isset($_SERVER['QUERY_STRING'])) { echo "?" . $_SERVER['QUERY_STRING'] . "&sort=firstname&order=asc"; } else { echo "?sort=firstname&order=asc"; } ?>" <?php if ($ssort == "firstname" && $sorder == "asc") { echo 'selected="selected"'; } ?>>First Name ASC</option>
<option value="<?php echo $_SERVER['PHP_SELF']; if (isset($_SERVER['QUERY_STRING'])) { echo "?" . $_SERVER['QUERY_STRING'] . "&sort=firstname&order=desc"; } else { echo "?sort=firstname&order=desc"; } ?>" <?php if ($ssort == "firstname" && $sorder == "desc") { echo 'selected="selected"'; } ?>>First Name DESC</option>
<option value="<?php echo $_SERVER['PHP_SELF']; if (isset($_SERVER['QUERY_STRING'])) { echo "?" . $_SERVER['QUERY_STRING'] . "&sort=lastname&order=asc"; } else { echo "?sort=lastname&order=asc"; } ?>" <?php if ($ssort == "lastname" && $sorder == "asc") { echo 'selected="selected"'; } ?>>Last Name ASC</option>
<option value="<?php echo $_SERVER['PHP_SELF']; if (isset($_SERVER['QUERY_STRING'])) { echo "?" . $_SERVER['QUERY_STRING'] . "&sort=lastname&order=desc"; } else { echo "?sort=lastname&order=desc"; } ?>" <?php if ($ssort == "lastname" && $sorder == "desc") { echo 'selected="selected"'; } ?>>Last Name DESC</option>
<option value="<?php echo $_SERVER['PHP_SELF']; if (isset($_SERVER['QUERY_STRING'])) { echo "?" . $_SERVER['QUERY_STRING'] . "&sort=datejoined&order=asc"; } else { echo "?sort=datejoined&order=asc"; } ?>" <?php if ($ssort == "datejoined" && $sorder == "asc") { echo 'selected="selected"'; } ?>>Date Joined ASC</option>
<option value="<?php echo $_SERVER['PHP_SELF']; if (isset($_SERVER['QUERY_STRING'])) { echo "?" . $_SERVER['QUERY_STRING'] . "&sort=datejoined&order=desc"; } else { echo "?sort=datejoined&order=desc"; } ?>" <?php if ($ssort == "datejoined" && $sorder == "desc") { echo 'selected="selected"'; } ?>>Date Joined DESC</option>
<option value="<?php echo $_SERVER['PHP_SELF']; if (isset($_SERVER['QUERY_STRING'])) { echo "?" . $_SERVER['QUERY_STRING'] . "&sort=lastlogin&order=asc"; } else { echo "?sort=lastlogin&order=asc"; } ?>" <?php if ($ssort == "lastlogin" && $sorder == "asc") { echo 'selected="selected"'; } ?>>Last Login ASC</option>
<option value="<?php echo $_SERVER['PHP_SELF']; if (isset($_SERVER['QUERY_STRING'])) { echo "?" . $_SERVER['QUERY_STRING'] . "&sort=lastlogin&order=desc"; } else { echo "?sort=lastlogin&order=desc"; } ?>" <?php if ($ssort == "lastlogin" && $sorder == "desc") { echo 'selected="selected"'; } ?>>Last Login DESC</option>
<option value="<?php echo $_SERVER['PHP_SELF']; if (isset($_SERVER['QUERY_STRING'])) { echo "?" . $_SERVER['QUERY_STRING'] . "&sort=rank&order=asc"; } else { echo "?sort=rank&order=asc"; } ?>" <?php if ($ssort == "rank" && $sorder == "asc") { echo 'selected="selected"'; } ?>>Rank ASC</option>
<option value="<?php echo $_SERVER['PHP_SELF']; if (isset($_SERVER['QUERY_STRING'])) { echo "?" . $_SERVER['QUERY_STRING'] . "&sort=rank&order=desc"; } else { echo "?sort=rank&order=desc"; } ?>" <?php if ($ssort == "rank" && $sorder == "desc") { echo 'selected="selected"'; } ?>>Rank DESC</option>
<option value="<?php echo $_SERVER['PHP_SELF']; if (isset($_SERVER['QUERY_STRING'])) { echo "?" . $_SERVER['QUERY_STRING'] . "&sort=xrank&order=asc"; } else { echo "?sort=xrank&order=asc"; } ?>" <?php if ($ssort == "xrank" && $sorder == "asc") { echo 'selected="selected"'; } ?>>xRank ASC</option>
<option value="<?php echo $_SERVER['PHP_SELF']; if (isset($_SERVER['QUERY_STRING'])) { echo "?" . $_SERVER['QUERY_STRING'] . "&sort=xrank&order=desc"; } else { echo "?sort=xrank&order=desc"; } ?>" <?php if ($ssort == "xrank" && $sorder == "desc") { echo 'selected="selected"'; } ?>>xRank DESC</option>
<option value="<?php echo $_SERVER['PHP_SELF']; if (isset($_SERVER['QUERY_STRING'])) { echo "?" . $_SERVER['QUERY_STRING'] . "&sort=votes&order=asc"; } else { echo "?sort=votes&order=asc"; } ?>" <?php if ($ssort == "votes" && $sorder == "asc") { echo 'selected="selected"'; } ?>>Votes ASC</option>
<option value="<?php echo $_SERVER['PHP_SELF']; if (isset($_SERVER['QUERY_STRING'])) { echo "?" . $_SERVER['QUERY_STRING'] . "&sort=votes&order=desc"; } else { echo "?sort=votes&order=desc"; } ?>" <?php if ($ssort == "votes" && $sorder == "desc") { echo 'selected="selected"'; } ?>>Votes DESC</option>
<option value="<?php echo $_SERVER['PHP_SELF']; if (isset($_SERVER['QUERY_STRING'])) { echo "?" . $_SERVER['QUERY_STRING'] . "&sort=rating&order=asc"; } else { echo "?sort=rating&order=asc"; } ?>" <?php if ($ssort == "rating" && $sorder == "asc") { echo 'selected="selected"'; } ?>>Rating ASC</option>
<option value="<?php echo $_SERVER['PHP_SELF']; if (isset($_SERVER['QUERY_STRING'])) { echo "?" . $_SERVER['QUERY_STRING'] . "&sort=rating&order=desc"; } else { echo "?sort=rating&order=desc"; } ?>" <?php if ($ssort == "rating" && $sorder == "desc") { echo 'selected="selected"'; } ?>>Rating DESC</option>
<option value="<?php echo $_SERVER['PHP_SELF']; if (isset($_SERVER['QUERY_STRING'])) { echo "?" . $_SERVER['QUERY_STRING'] . "&sort=hits&order=asc"; } else { echo "?sort=hits&order=asc"; } ?>" <?php if ($ssort == "hits" && $sorder == "asc") { echo 'selected="selected"'; } ?>>Hits ASC</option>
<option value="<?php echo $_SERVER['PHP_SELF']; if (isset($_SERVER['QUERY_STRING'])) { echo "?" . $_SERVER['QUERY_STRING'] . "&sort=hits&order=desc"; } else { echo "?sort=hits&order=desc"; } ?>" <?php if ($ssort == "hits" && $sorder == "desc") { echo 'selected="selected"'; } ?>>Hits DESC</option>
<option value="<?php echo $_SERVER['PHP_SELF']; if (isset($_SERVER['QUERY_STRING'])) { echo "?" . $_SERVER['QUERY_STRING'] . "&sort=logins&order=asc"; } else { echo "?sort=logins&order=asc"; } ?>" <?php if ($ssort == "logins" && $sorder == "asc") { echo 'selected="selected"'; } ?>>Logins ASC</option>
<option value="<?php echo $_SERVER['PHP_SELF']; if (isset($_SERVER['QUERY_STRING'])) { echo "?" . $_SERVER['QUERY_STRING'] . "&sort=logins&order=desc"; } else { echo "?sort=logins&order=desc"; } ?>" <?php if ($ssort == "logins" && $sorder == "desc") { echo 'selected="selected"'; } ?>>Logins DESC</option>
<option value="<?php echo $_SERVER['PHP_SELF']; if (isset($_SERVER['QUERY_STRING'])) { echo "?" . $_SERVER['QUERY_STRING'] . "&sort=age&order=asc"; } else { echo "?sort=age&order=asc"; } ?>" <?php if ($ssort == "age" && $sorder == "asc") { echo 'selected="selected"'; } ?>>Age ASC</option>
<option value="<?php echo $_SERVER['PHP_SELF']; if (isset($_SERVER['QUERY_STRING'])) { echo "?" . $_SERVER['QUERY_STRING'] . "&sort=age&order=desc"; } else { echo "?sort=age&order=desc"; } ?>" <?php if ($ssort == "age" && $sorder == "desc") { echo 'selected="selected"'; } ?>>Age DESC</option>
</select>
</span>
<?php
$result = mysql_query('SELECT user_id FROM login');
$members = mysql_num_rows($result);
$numrows = $members;
$phpself = $_SERVER['PHP_SELF'];
$limit = 3;
$s = (isset($_GET['s'])) ? $_GET['s'] : 0;
$query .= " limit $s, $limit";
$result = mysql_query($query) or die("Couldn't execute query");
$scount = (1 + $s);
$count = 0;
$currpage = (($s / $limit) + 1);
$pages = intval($numrows / $limit);
if ($numrows % $limit) $pages++;
$range = 7;

if ($currpage < 3) $lowrange = ($currpage - $range);
else { if ($currpage > ($pages - 3)) $lowrange = ($pages - 10); else $lowrange = ($currpage - $range); }
if ($currpage > ($pages - 3)) $highrange = ($currpage + $range);
else { if ($currpage < 3) $highrange = 10; else $highrange = ($currpage + $range); }

function determine_age($birth_date) {
$birth_date_time = strtotime($birth_date);
$to_date = date('m/d/Y', $birth_date_time);

list ($birth_month, $birth_day, $birth_year) = explode('/', $to_date);

$now = time();
$current_month = date("n");
$current_day = date("d");
$current_year = date("Y");
$this_year_birth_date = $birth_month . '/' . $birth_day . '/' . $current_year;
$this_year_birth_date_timestamp = strtotime($this_year_birth_date);
$years_old = ($current_year - $birth_year);
if ($now < $this_year_birth_date_timestamp) $years_old = ($years_old - 1);
return $years_old;
}
?>
<span style="float: left; text-align: left; width: 300px;">Here you can view your community!
<br />
<?php
$a = ($s + $limit);

if ($a > $numrows) $a = $numrows;

$b = ($s + 1);
echo "Showing $b to $a out of $members Members";
?>
</span>
</div>
<style type="text/css">
div.pagelinks a {
text-decoration: none;
}
</style>
<?php
echo "<br />";
echo "<div style='clear: both; width: 100%;'> </div>";
echo "<div class='pagelinks' style='clear: both; color: #004080; width: 100%;'>";

if ($s >= 1) {
$first = 0;

if ($ssort != null && $sorder != null) echo "<a href=\"$phpself?s=$first&sort=$ssort&order=$sorder\">&lt;&lt; First</a> ";
else echo "<a href=\"$phpself?s=$first\">&lt;&lt; First</a> ";
} else echo "&lt;&lt; First ";

if ($s >= 1) {
$prevs = ($s - $limit);

if ($ssort != null && $sorder != null) echo " <a href=\"$phpself?s=$prevs&sort=$ssort&order=$sorder\">&lt; Prev</a> ";
else echo " <a href=\"$phpself?s=$prevs\">&lt; Prev</a> ";
} else {
echo " &lt; Prev ";
}

// page number links
if ($pages > 8) {
echo " ..";
for ($page = 3; $page <= ($pages - 3); $page++) {
$pagenum = (($page * $limit) - $limit);

if ($page >= $lowrange && $page <= $highrange) {
if ($page != $currpage) {
if ($ssort != null && $sorder != null) echo " <a href=\"$phpself?s=$pagenum&sort=$ssort&order=$sorder\">[$page]</a> ";
else echo " <a href=\"$phpself?s=$pagenum\">[$page]</a> ";
} else {
if ($page == $currpage) echo "&nbsp;$page&nbsp;";
}
}
}
echo ".. ";
} else {
echo "&nbsp;&nbsp;|&nbsp;&nbsp;";
}

if (!((($s + $limit) / $limit) == $pages) && $pages != 1) {
$news = ($s + $limit);

if ($ssort != null && $sorder != null) echo " <a href=\"$phpself?s=$news&sort=$ssort&order=$sorder\">Next &gt;</a> ";
else echo " <a href=\"$phpself?s=$news\">Next &gt;</a> ";
} else echo " Next &gt; ";

if (!((($s + $limit) / $limit) == $pages) && $pages != 1) {
$last = (($pages * $limit) - $limit);

if ($ssort != null && $sorder != null) echo " <a href=\"$phpself?s=$last&sort=$ssort&order=$sorder\">Last &gt;&gt;</a>";
else echo " <a href=\"$phpself?s=$last\">Last &gt;&gt;</a>";
} else echo " Last &gt;&gt;";

echo "<hr style='width: 95%;' />";
echo "<br />";
echo "</div>";
echo "<div style='clear: both; width: 100%;'>";

while ($row = mysql_fetch_array($result)) {
$fullname = $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname'];

$colorarray = array('ccffff', 'ccccff');
$o = rand(0, count($colorarray) - 1);
$randcolor = "{$colorarray[$o]}";
$count++;

if ($row['default_image'] != null) $userimage = '/uploads/' . $row['username'] . '/images/thumb/' . $row['default_image'];
else $userimage = 'i/mem/default.jpg';

list($width, $height, $type, $attr) = getimagesize($userimage);
?>
<!-- Begin <?php echo $fullname; ?>'s section -->
<style type="text/css">
span.<?php echo $fullname; ?> div.sectionsplash {
background-color: #<?php echo $randcolor; ?>;
height: <?php echo ($height); ?>px;
margin: 0 auto;
margin-top: 5px;
padding: 10px;
}

span.<?php echo $fullname; ?>:hover div.sectionsplash {
background-color: #<?php if ($randcolor == ccffff) { echo ccccff; } else { echo ccffff; }; ?>;
height: <?php echo ($height); ?>px;
margin: 0 auto;
margin-top: 5px;
padding: 10px;
}
</style>
<span class="<?php echo $fullname; ?>" style="float: left; width: 33.333%;">
<fieldset class="sectionfieldset" style="clear: right; height: <?php echo ($height + 45); ?>px; padding: 10px; margin: 0 auto; width: 250px;">
<legend><a href="user_profile.php?id=<?php echo $row['user_id']; ?>" style="text-decoration: none;"><?php
$uresult = mysql_db_query($om, "SELECT DISTINCT username FROM users_online ORDER BY username ASC") or die("Database SELECT Error");

echo $row['username'] . " | " . $fullname;

while ($onlineusers = mysql_fetch_array($uresult, MYSQL_ASSOC)) {
foreach ($onlineusers as $users) if ($row['username'] == $users) echo " is Online!";
}

echo "</a>";

if ($current_month == $row['birth_month'] && $current_day == $row['birth_day']) echo " Happy Birthday!";
?> </legend>
<!-- Begin moreinfo -->
<div id="<?php echo $row['username'] . $row['user_id']; ?>" class="moreinfo" style="display: block; visibility: hidden;">
<span class="closespan">
<span class="header">
More Info
</span>
<a title="Close" accesskey="8" onclick="showMe5('<?php echo $row['username'] . $row['user_id']; ?>')" class="close">Close</a>
</span>
<div class="splash">
<div>
<small>
Status:
<?php
if ($row['status'] != null) echo $row['status'];
else echo "<br />";
?>
</small>
</div>
<div>
<small>
Mood:
<?php
if ($row['mood'] != null) echo $row['mood'];
else echo "<br />";
?>
</small>
</div>
<div>
<?php
echo "<small>";
echo $row['gender'];

$birth_date = $row['birth_month'] . "/" . $row['birth_day'] . "/" . $row['birth_year'];
$age = determine_age($birth_date);
$current_month = date("n");
$current_day = date("d");
$current_year = date("Y");

if ($age == 0) {
if ($current_month < $row['birth_month']) {
$month_diff = (12 - $row['birth_month']);
$age = ($month_diff + $current_month);
echo " | " . $age . " Months Old";
} else {
$age = ($current_month - $row['birth_month']);
echo " | " . $age . " Months Old";
}
} else {
echo " | " . $age . " Years Old";
}

echo "</small>";
?>
</div>
<div>
<?php
$votes = ($row['xratings'] > 0) ? $row['xratings'] : 'No';
$vtense = ($row['xratings'] == 0 || $row['xratings'] > 1) ? ' Votes' : ' Vote';
echo "<small>$votes$vtense</small>";
?>
<small>
  |  xRank:
<?php
if ($row['website'] != null) $ifexists_website = 1000;
if ($row['user_style'] != null) $ifexists_user_style = 1000;
if ($row['default_image'] != null) $ifexists_defualt_image = 1000;

$xrank = ($row['rank'] + ($row['hits'] * 2) + ($row['logins'] * 5) + ($ifexists_website) + ($ifexists_user_style) + ($ifexists_default_image));

if ($row['logins'] > 5) {
if ($row['logins'] > 100) { $xrank = ($xrank * 5);
if ($row['logins'] > 200) { $xrank = ($xrank * 10);
if ($row['logins'] > 300) { $xrank = ($xrank * 15);
if ($row['logins'] > 400) { $xrank = ($xrank * 20);
if ($row['logins'] > 500) { $xrank = ($xrank * 25);
}}}}}
$xrank = ($xrank * 1.0586951);
}
elseif ($row['logins'] == 4) $xrank = ($xrank / 2.2452);
elseif ($row['logins'] == 3) $xrank = ($xrank / 3.1385);
elseif ($row['logins'] == 2) $xrank = ($xrank / 4.3698);
elseif ($row['logins'] == 1) $xrank = 0;
else $xrank = 0;

echo " ";


if ($xrank < 1000) echo round($xrank, 8);
elseif ($xrank < 10000) echo round($xrank, 8);
elseif ($xrank < 100000) echo round($xrank, 7);
elseif ($xrank < 1000000) echo round($xrank, 6);
elseif ($xrank < 10000000) echo round($xrank, 5);
elseif ($xrank < 100000000) echo round($xrank, 4);
elseif ($xrank < 1000000000) echo round($xrank, 3);
elseif ($xrank < 10000000000) echo round($xrank, 2);
elseif ($xrank < 100000000000) echo round($xrank, 1);
elseif ($xrank < 1000000000000) echo round($xrank, 0);

/*
if ($xrank < 1000) {
echo round($xrank, 8);
} else {
$xrankround = 1000;

for ($i = 8; $xrank < $xrankround; $i--) {
$xrankround = ($xrankround * 10);
if ($xrank < $xrankround) {
echo round($xrank, $i);
}
}
}
*/

echo " ";
?></small>
</div>
<div>
<small>
Profile Views: 
<?php echo $row['hits']; ?>
</small>
</div>
<div>
<small>
Logged On
<?php
echo " ";
echo $row['logins'];
echo " ";

if ($row['logins'] > 1) echo "Times";
elseif ($row['logins'] == 1) echo "Time";
else echo "Times & Was Hacked :P";
?>
</small>
</div>
<div>
<small>
Last Login: <?php echo $row['last_login']; ?>
</small>
</div>
<div>
<small>
Date Joined: <?php echo $row['date_joined']; ?>
</small>
</div>
</div>
</div>
<!-- End moreinfo -->
<div class="sectionsplash">
<span style="width: 150px;">
<?php
if ($row['default_image'] != null) echo '<a title="View More Info!" onclick="showMe5(\'' . $row['username'] . $row['user_id'] . '\')"><img src="/uploads/' . $row['username'] . '/images/thumb/' . $row['default_image'] . '" id="defaultuserimage" style="margin-top : 1px; " /></a><br />' . "\n";
else echo '<a title="View More Info!" onclick="showMe5(\'' . $row['username'] . $row['user_id'] . '\')"><img src="i/mem/default.jpg" id="defaultuserimage" style="margin-top : 1px; " /></a><br />' . "\n";
?>
</span>
</div>
</fieldset>
</span>
<!-- End <?php echo $row['fullname']; ?>'s section -->
<?php
$break = "<div style='clear: both; width: 100%;'> </div>\n";

// only 6 rows of 3
if ($count == 3) echo $break;
elseif ($count == 6) echo $break;
elseif ($count == 9) echo $break;
elseif ($count == 12) echo $break;
elseif ($count == 15) echo $break;

$scount++;
}

echo "</div>";

echo "<div class='pagelinks' style='clear: both; color: #004080; width: 100%;'>";
if ($count < 3) echo "<br />";
echo "<hr style='width: 95%;' />";

if ($s >= 1) {
$first = 0;

if ($ssort != null && $sorder != null) echo "<a href=\"$phpself?s=$first&sort=$ssort&order=$sorder\">&lt;&lt; First</a> ";
else echo "<a href=\"$phpself?s=$first\">&lt;&lt; First</a> ";
} else {
echo "&lt;&lt; First ";
}

if ($s >= 1) {
$prevs = ($s - $limit);

if ($ssort != null && $sorder != null) echo " <a href=\"$phpself?s=$prevs&sort=$ssort&order=$sorder\">&lt; Prev</a> ";
else echo " <a href=\"$phpself?s=$prevs\">&lt; Prev</a> ";
} else {
echo " &lt; Prev ";
}

if ($pages > 8) {
echo " ..";
for ($page = 3; $page <= ($pages - 3); $page++) {
$pagenum = (($page * $limit) - $limit);

if ($page >= $lowrange && $page <= $highrange) {
if ($page != $currpage) {
if ($ssort != null && $sorder != null) echo " <a href=\"$phpself?s=$pagenum&sort=$ssort&order=$sorder\">[$page]</a> ";
else echo " <a href=\"$phpself?s=$pagenum\">[$page]</a> ";
} else {
if ($page == $currpage) echo "&nbsp;$page&nbsp;";
}
}
}
echo ".. ";
} else echo "&nbsp;&nbsp;|&nbsp;&nbsp;";

if (!((($s + $limit) / $limit) == $pages) && $pages != 1) {
$news = ($s + $limit);

if ($ssort != null && $sorder != null) {
echo " <a href=\"$phpself?s=$news&sort=$ssort&order=$sorder\">Next &gt;</a> ";
} else {
echo " <a href=\"$phpself?s=$news\">Next &gt;</a> ";
}
} else echo " Next &gt; ";

if (!((($s + $limit) / $limit) == $pages) && $pages != 1) {
$last = (($pages * $limit) - $limit);

if ($ssort != null && $sorder != null) echo " <a href=\"$phpself?s=$last&sort=$ssort&order=$sorder\">Last &gt;&gt;</a>";
else echo " <a href=\"$phpself?s=$last\">Last &gt;&gt;</a>";
} else echo " Last &gt;&gt;";

echo "</div>";

mysql_free_result($result);
mysql_close($db);
?>
</div>
<!-- End page content -->
<?php
include ("ft.inc.php");
include ("tracking_scripts.inc.php");
?>
</body>

</html>