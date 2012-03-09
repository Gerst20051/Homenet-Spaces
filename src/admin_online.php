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
<style type="text/css">
table#online {
margin: 0 auto;
margin-top: 10px;
}

table#online tr {
margin: 0 auto;
padding: 5px;
width: 800px;
}

table#online tr.header {
background-color: #ccf;
margin: 0 auto;
padding: 5px;
width: 800px;
}

table#online tr.header th {
padding: 5px;
text-align: center;
width: 160px;
}

table#online tr.header th.file {
padding: 5px;
text-align: center;
width: 320px;
}

table#online tr td {
background-color: #cff;
padding: 5px;
text-align: center;
width: 160px;
}

table#online tr td.file {
background-color: #cff;
padding: 5px;
text-align: center;
width: 320px;
}
</style>
</head>

<body>
<?php include ("hd.inc.php"); ?>
<!-- Begin page content -->
<div class="pagecontent">
<div id="pageheader" class="pageheader2"><div class="heading">
Guests &amp; Members Online
</div></div>
<div style="margin: 0 auto; width: 75%;">
<span style="float: left; text-align: left; width: 300px;">
There are 
<?php
$oresult = mysql_db_query($om, "SELECT DISTINCT username FROM users_online") or die("Database SELECT Error");
$online = mysql_num_rows($oresult);

$uresult = mysql_db_query($om, "SELECT DISTINCT username FROM users_online ORDER BY timestamp DESC") or die("Database SELECT Error");

$mresult = mysql_query('SELECT user_id FROM login');
$members = mysql_num_rows($mresult);

$goresult = mysql_db_query($om, "SELECT DISTINCT ip FROM guests_online") or die("Database SELECT Error");
$gonline = mysql_num_rows($goresult);

if ($online == 0) {
echo "$members  Members<br />No Members Online";

if ($gonline > 0) {
echo "<br />";
echo "<b>$gonline</b>";

if ($gonline < 2) echo " Guest ";
else echo " Guests ";
echo "Online";
}
} else {
echo "<b>$online</b> out of $members  Members Online";

if ($gonline > 0) {
echo "<br />";
echo "<b>$gonline</b>";

if ($gonline < 2) echo " Guest ";
else echo " Guests ";
echo "Online";
}
}
?>
</span>
<span style="float: right; text-align: right; width: 300px;">
<?php
$ssort = (isset($_GET['sort'])) ? $_GET['sort']: null;
$sorder = (isset($_GET['order'])) ? $_GET['order']: null;
?>
<select name="sortingorder" size="1" id="selectsort" style="padding: 4px;" onchange="window.location = document.all.selectsort.value">
<option <?php if ($ssort == 0 || null) { echo 'selected="selected"'; } ?>>Select Your Sorting Order:&nbsp;</option>
<option value="<?php echo $_SERVER['PHP_SELF']; ?>?sort=timestamp&order=asc" <?php if ($ssort == "timestamp" && $sorder == "asc") { echo 'selected="selected"'; } ?>>Timestamp ASC</option>
<option value="<?php echo $_SERVER['PHP_SELF']; ?>?sort=timestamp&order=desc" <?php if ($ssort == "timestamp" && $sorder == "desc") { echo 'selected="selected"'; } ?>>Timestamp DESC</option>
<option value="<?php echo $_SERVER['PHP_SELF']; ?>?sort=ip&order=asc" <?php if ($ssort == "ip" && $sorder == "asc") { echo 'selected="selected"'; } ?>>IP Address ASC</option>
<option value="<?php echo $_SERVER['PHP_SELF']; ?>?sort=ip&order=desc" <?php if ($ssort == "ip" && $sorder == "desc") { echo 'selected="selected"'; } ?>>IP Address DESC</option>
<option value="<?php echo $_SERVER['PHP_SELF']; ?>?sort=username&order=asc" <?php if ($ssort == "username" && $sorder == "asc") { echo 'selected="selected"'; } ?>>Username ASC</option>
<option value="<?php echo $_SERVER['PHP_SELF']; ?>?sort=username&order=desc" <?php if ($ssort == "username" && $sorder == "desc") { echo 'selected="selected"'; } ?>>Username DESC</option>
<option value="<?php echo $_SERVER['PHP_SELF']; ?>?sort=fileviewed&order=asc" <?php if ($ssort == "fileviewed" && $sorder == "asc") { echo 'selected="selected"'; } ?>>File Viewed ASC</option>
<option value="<?php echo $_SERVER['PHP_SELF']; ?>?sort=fileviewed&order=desc" <?php if ($ssort == "fileviewed" && $sorder == "desc") { echo 'selected="selected"'; } ?>>File Viewed DESC</option>
</select>
</span>
</div>
<br /><br />
<?php
if ($gonline > 0) {
$query = 'SELECT * FROM
guests_online
ORDER BY
timestamp DESC';
$result = mysql_query($query, $db) or die(mysql_error($db));

switch ($_GET['sort']) {
case 'timestamp':
switch ($_GET['order']) {
case 'asc':
$query = 'SELECT * FROM guests_online ORDER BY timestamp ASC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;

case 'desc':
$query = 'SELECT * FROM guests_online ORDER BY timestamp DESC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;
}
break;

case 'ip':
switch ($_GET['order']) {
case 'asc':
$query = 'SELECT * FROM guests_online ORDER BY ip ASC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;

case 'desc':
$query = 'SELECT * FROM guests_online ORDER BY ip DESC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;
}
break;

case 'username':
switch ($_GET['order']) {
case 'asc':
$query = 'SELECT * FROM guests_online ORDER BY username ASC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;

case 'desc':
$query = 'SELECT * FROM guests_online ORDER BY username DESC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;
}
break;

case 'fileviewed':
switch ($_GET['order']) {
case 'asc':
$query = 'SELECT * FROM guests_online ORDER BY file ASC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;

case 'desc':
$query = 'SELECT * FROM guests_online ORDER BY file DESC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;
}
break;
}

echo "<table id='online'>";
echo "<tr class='header'>";
echo "<th>Timestamp</th>";
echo "<th>IP Address</th>";
echo "<th>Username</th>";
echo "<th class='file'>File Viewed</th>";
echo "</tr>";

while ($row = mysql_fetch_array($result)) {
echo "<tr>";
echo "<td><a href='http://www.4webhelp.net/us/timestamp.php?action=stamp&stamp=" . $row['timestamp'] . "&timezone=-4' title='Local Time' target='_blank'>" . $row['timestamp'] . "</a></td>";
echo "<td><a href='http://phpweby.com/services/iplocation?ip=" . $row['ip'] . "' title='Locate This IP' target='_blank'>" . $row['ip'] . "</a></td>";
echo "<td>" . $row['username'] . "</td>";
echo "<td class='file'><a href='" . $row['file'] . "' title='View This File' target='_blank'>" . $row['file'] . "</a></td>";
echo "</tr>";
}

echo "</table>";

mysql_free_result($result);
}

$query = 'SELECT * FROM users_online ORDER BY timestamp DESC';
$result = mysql_query($query, $db) or die(mysql_error($db));

switch ($_GET['sort']) {
case 'timestamp':
switch ($_GET['order']) {
case 'asc':
$query = 'SELECT * FROM users_online ORDER BY timestamp ASC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;

case 'desc':
$query = 'SELECT * FROM users_online ORDER BY timestamp DESC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;
}
break;

case 'ip':
switch ($_GET['order']) {
case 'asc':
$query = 'SELECT * FROM users_online ORDER BY ip ASC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;

case 'desc':
$query = 'SELECT * FROM users_online ORDER BY ip DESC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;
}
break;

case 'username':
switch ($_GET['order']) {
case 'asc':
$query = 'SELECT * FROM users_online ORDER BY username ASC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;

case 'desc':
$query = 'SELECT * FROM users_online ORDER BY username DESC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;
}
break;

case 'fileviewed':
switch ($_GET['order']) {
case 'asc':
$query = 'SELECT * FROM users_online ORDER BY file ASC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;

case 'desc':
$query = 'SELECT * FROM users_online ORDER BY file DESC';
$result = mysql_query($query, $db) or die(mysql_error($db));
break;
}
break;
}

echo "<table id='online'>";
echo "<tr class='header'>";
echo "<th>Timestamp</th>";
echo "<th>IP Address</th>";
echo "<th>Username</th>";
echo "<th class='file'>File Viewed</th>";
echo "</tr>";

while ($row = mysql_fetch_array($result)) {
echo "<tr>";
echo "<td><a href='http://www.4webhelp.net/us/timestamp.php?action=stamp&stamp=" . $row['timestamp'] . "&timezone=-4' title='Local Time' target='_blank'>" . $row['timestamp'] . "</a></td>";
echo "<td><a href='http://phpweby.com/services/iplocation?ip=" . $row['ip'] . "' title='Locate This IP' target='_blank'>" . $row['ip'] . "</a></td>";
echo '<td><a href="user_profile.php?id=' . $row['user_id'] . '" title="View ' . $row['username'] . '\'s Profile" target="_blank">' . $row['username'] . '</a></td>';
echo "<td class='file'><a href='" . $row['file'] . "' title='View This File' target='_blank'>" . $row['file'] . "</a></td>";
echo "</tr>";
}

echo "</table>";

mysql_free_result($result);
mysql_close($db);
?>
<div style="clear: both; width: 100%;">&nbsp;</div>
</div>
<!-- End page content -->
<?php include ("ft.inc.php"); ?>
</body>

</html>