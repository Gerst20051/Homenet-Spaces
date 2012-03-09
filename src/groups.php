<?php
session_start();

require ("lang.inc.php");
include ("db.member.inc.php");
include ("login.inc.php");

if (!isset($_GET['action'])) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//<?php echo $TEXT['global-dtdlang']; ?>" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $TEXT['global-lang']; ?>" lang="<?php echo $TEXT['global-lang']; ?>" dir="<?php echo $TEXT['global-text_dir']; ?>">

<head>
<title><?php echo $TEXT['global-headertitle'] . " | " . $TEXT['homepage-headertitle']; ?></title>
<meta http-equiv="content-type" content="text/html; charset=<?php echo $TEXT['global-charset']; ?>" />
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="javascript.php"></script>
<style type="text/css">
th {
background-color: #36c;
padding: 5px;
}
	
#members {
margin: 0 auto;
width: 80%;
}

.odd_row {
background-color: #cff;
width: 25%;
}

.even_row {
background-color: #ccf;
width: 25%;
}

a.header {
color: #dfe9fd;
text-decoration: none;
width: 100%;
}

a.header:hover {
color: #004080;
text-decoration: none;
width: 100%;
}

a.username {
color: #004080;
text-decoration: none;
}

a.username:hover {
border-bottom: 1px dotted #004080;
color: #004080;
text-decoration: none;
}
</style>
</head>

<body>
<?php include ("hd.inc.php"); ?>
<!-- Begin page content -->
<div class="pagecontent">
<div id="pageheader" class="pageheader2"><div class="heading">
Welcome to the Groups area.
</div></div>
<p>Here you can view your community!
<br />
<br />
<a href="<?php $_SERVER['PHP_SELF']; ?>?action=create">Create A Group</a>
<br />
<br />
<?php
$sql = "SHOW TABLES FROM groups";
$result = mysql_query($sql, $group_db);
$tablerow = array();

while ($row = mysql_fetch_array($result)) $tablerow[] = $row;
$total_tables = count($tablerow);

echo "There are ";
echo $total_tables;
echo " groups";
echo "<br /><br />";

$sql = "SHOW TABLES FROM groups";
$result = mysql_query($sql, $group_db);

while ($grouplist = mysql_fetch_row($result)) echo "{$grouplist[0]}\n";

mysql_free_result($result);
?>
</p>
<?php
$orders = array('asc', 'desc', 'asc', 'desc', 'asc', 'desc', 'asc', 'desc', 'asc', 'desc', 'asc', 'desc', 'asc', 'desc', 'asc', 'desc', 'asc', 'desc');
$o = rand(0, count($orders) - 1);
$switchOrder = "{$orders[$o]}";

echo '<table id="members">';
echo '<tr><th><a href="' . $_SERVER['PHP_SELF'] . '?sort=name&order=' . $switchOrder . '" title="Sort by Group Name ' . $switchOrder . '" class="header">Group Name</a></th>
<th><a href="' . $_SERVER['PHP_SELF'] . '?sort=numbermembers&order=' . $switchOrder . '" title="Sort by First Name ' . $switchOrder . '" class="header">Number Of Members</a></th>
<th><a href="' . $_SERVER['PHP_SELF'] . '?sort=created&order=' . $switchOrder . '" title="Sort by Last Name ' . $switchOrder . '" class="header">Date Created</a></th>';

$query = 'SELECT TABLES FROM groups ORDER BY created ASC';
$result = mysql_query($query, $group_db) or die(mysql_error($group_db));

switch ($_GET['sort']) {
case 'name':
switch ($_GET['order']) {
case 'asc':
$result = mysql_query($query, $group_db) or die(mysql_error($group_db));
break;

case 'desc':
$result = mysql_query($query, $group_db) or die(mysql_error($group_db));
break;
}

case 'firstname':
switch ($_GET['order']) {
case 'asc':
$result = mysql_query($query, $group_db) or die(mysql_error($group_db));
break;

case 'desc':
$result = mysql_query($query, $group_db) or die(mysql_error($group_db));
break;
}

case 'lastname':
switch ($_GET['order']) {
case 'asc':
$result = mysql_query($query, $group_db) or die(mysql_error($group_db));
break;

case 'desc':
$result = mysql_query($query, $group_db) or die(mysql_error($group_db));
break;
}
}

$odd = true;

while ($row = mysql_fetch_array($result)) {
echo ($odd == true) ? '<tr class="odd_row">' : '<tr class="even_row">';
$odd = !$odd;
echo '<td style="padding: 3px;"><a href="groups.php?id=' . $row['groupname'] . '" class="username">' . $row['groupname'] . '</a></td>';
echo '<td style="padding: 3px;">' . $numbermembers . '</td>';
echo '<td style="padding: 3px;">' . $created . '</td>';
echo '</tr>';
}
echo '</table>';

mysql_free_result($result);
?>
</table>
</div>
<!-- End page content -->
<?php
include ("ft.inc.php");
include ("tracking_scripts.inc.php");
?>
</body>

</html>

<?php
}

if (isset($_GET['action'])) {
switch ($_GET['action']) {
case 'create':
?>
<?php
$groupname = (isset($_POST['groupname'])) ? trim($_POST['groupname']) : '';
$joincode = (isset($_POST['joincode'])) ? trim($_POST['joincode']) : '';

if (isset($_POST['create']) && ($_POST['create'] == 'Create Group')) {
$header_creategrouperrors = array();

if (empty($groupname)) $header_creategrouperrors[] = 'Group Name cannot be blank.';

if (count($header_creategrouperrors) > 0) {
} else {
$date_created = date('Y-m-d');

$sql = "CREATE TABLE IF NOT EXISTS " . $groupname . " (
type varchar(255),
name varchar(255),
control varchar(255),
username varchar(255),
access_level varchar(255),
date_joined varchar(255),
time varchar(255),
update varchar(255)
)
ENGINE=MyISAM";
mysql_query($sql, $group_db) or die(mysql_error($group_db));

$query = 'INSERT INTO ' . $groupname . '
(type, name, control)
VALUES
("setting", "created", "' . $date_created . '")';
$result = mysql_query($query, $group_db) or die(mysql_error($group_db));

header('refresh: 4; url=index.php');
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
<p><strong>Thank you <?php echo $groupname; ?> for registering!</strong></p>
<p>Your registration is complete! You are being sent to the homepage. If your browser doesn't redirect properly after 4 seconds, <a href="index.php">click here</a>.</p>
</div>
<!-- End page content -->
<?php include ("ft.inc.php"); ?>
</body>

</html>
<?php
die();
}
}
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

div.pagecontent table td.label label {
position: relative;
top: 4px;
}

div.pagecontent table td.input {
padding: 6px;
text-align: left;
}
</style>
</head>

<body>
<?php include ("hd.inc.php"); ?>
<!-- Begin page content -->
<div class="pagecontent">
<div id="pageheader" class="pageheader2"><div class="heading">
Create A Group.
</div></div>
<a href="groups.php">View All Groups</a>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
<fieldset style="margin: 0 auto; width: 65%;">
<legend>Group Info&nbsp;</legend>
<table style="margin: 0 auto; margin-bottom: 10px; margin-top: 10px;">
<tr>
<td class="label"><label for="username">Group Name:</label></td>
<td class="input"><input type="text" name="groupname" id="groupname" size="25" maxlength="20" value="<?php echo $groupname; ?>" /></td>
</tr>
<tr>
<td class="label"><label for="joincode">Join Code:</label></td>
<td class="input"><input type="text" name="joincode" id="joincode" size="25" maxlength="20" value="" />
<br /><br />
<small class="formreminder">( Leave blank if you don't want your group private )</small></td>
</tr>
</table>
<span>
<input type="submit" name="create" value="Create Group" />
</span>
<br /><br />
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
<?php
break;
}
}
?>