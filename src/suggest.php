<?php
session_start();

/*
require ("lang.inc.php");
*/

include ("db.member.inc.php");

$q = trim($_GET["q"]);

if (strlen($q) > 0) {
$qarr = explode(" ", $q);
$numq = count($qarr);

if ($numq == 1) {
$query = "SELECT user_id, firstname, middlename, lastname, default_image FROM info WHERE firstname LIKE \"%$q%\" ORDER BY firstname ASC";
$result = mysql_query($query, $db) or die(mysql_error($db));
$num_hints1 = mysql_num_rows($result);
$count = 0;

if ($num_hints1 > 0) echo '<div style="color: #000; margin-bottom: 5px; text-align: left;">Names (' . $num_hints1 . ')</div>';

while ($row = mysql_fetch_array($result)) {
$query2 = "SELECT user_id, username FROM login WHERE user_id = " . $row['user_id'];
$result2 = mysql_query($query2, $db) or die(mysql_error($db));
$row2 = mysql_fetch_assoc($result2);
extract($row2);
mysql_free_result($result2);

$fullname = $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname'];

if ($count > 0) echo '<div style="margin-top: 5px; overflow: hidden;"><a href="user_profile.php?id=' . $row['user_id'] . '" title="View ' . $row2['username'] . '\'s Profile" style="border-radius: 4px; -khtml-border-radius: 4px; -moz-border-radius: 4px; -opera-border-radius: 4px; -webkit-border-radius: 4px; padding-left: 4px; padding-right: 4px;">';
else echo '<div><a href="user_profile.php?id=' . $row['user_id'] . '" title="View ' . $row2['username'] . '\'s Profile" style="border-radius: 4px; -khtml-border-radius: 4px; -moz-border-radius: 4px; -opera-border-radius: 4px; -webkit-border-radius: 4px; padding-left: 4px; padding-right: 4px;">';
if ($row['default_image'] != null) echo '<img src="/uploads/' . $row2['username'] . '/images/thumb/' . $row['default_image'] . '" style="border-width: 0; height: 22px; position: relative; top: 4px; width: 22px;" />';
else echo '<img src="i/mem/default.jpg" style="border-width: 0; height: 22px; position: relative; top: 4px; width: 22px;" />';
echo '<div style="clear: right; display: block; float: right; margin-left: 5px; max-width: 150px; overflow: hidden; text-align: right; width: 150px;">' . $fullname . '</div>';
echo '</a></div>';

$count++;
}
} else {
$qname = 1;

// ADD MIDDLE NAME SUPPORT
if ($qarr[0] == "?") $query = "SELECT user_id, firstname, middlename, lastname, default_image FROM info WHERE lastname LIKE \"%$qarr[1]%\" ORDER BY firstname ASC";
else if ($qarr[1] == "?") $query = "SELECT user_id, firstname, middlename, lastname, default_image FROM info WHERE firstname LIKE \"%$qarr[0]%\" ORDER BY firstname ASC";
else $query = "SELECT user_id, firstname, middlename, lastname, default_image FROM info WHERE firstname LIKE \"%$qarr[0]%\" AND lastname LIKE \"%$qarr[1]%\" ORDER BY firstname ASC";

$result = mysql_query($query, $db) or die(mysql_error($db));
$num_hints1 = mysql_num_rows($result);
$count = 0;

if ($num_hints1 > 0) echo '<div style="color: #000; margin-bottom: 5px; text-align: left;">Names (' . $num_hints1 . ')</div>';

while ($row = mysql_fetch_array($result)) {
$query2 = "SELECT user_id, username FROM login WHERE user_id = " . $row['user_id'];
$result2 = mysql_query($query2, $db) or die(mysql_error($db));
$row2 = mysql_fetch_assoc($result2);
extract($row2);
mysql_free_result($result2);

$fullname = $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname'];

if ($count > 0) echo '<div style="margin-top: 5px;"><a href="user_profile.php?id=' . $row['user_id'] . '" title="View ' . $row2['username'] . '\'s Profile" style="border-radius: 4px; -khtml-border-radius: 4px; -moz-border-radius: 4px; -opera-border-radius: 4px; -webkit-border-radius: 4px; padding-left: 4px; padding-right: 4px;">';
else echo '<div><a href="user_profile.php?id=' . $row['user_id'] . '" title="View ' . $row2['username'] . '\'s Profile" style="border-radius: 4px; -khtml-border-radius: 4px; -moz-border-radius: 4px; -opera-border-radius: 4px; -webkit-border-radius: 4px; padding-left: 4px; padding-right: 4px;">';
if ($row['default_image'] != null) echo '<img src="/uploads/' . $row2['username'] . '/images/thumb/' . $row['default_image'] . '" style="border-width: 0; height: 22px; position: relative; top: 4px; width: 22px;" />';
else echo '<img src="i/mem/default.jpg" style="border-width: 0; height: 22px; position: relative; top: 4px; width: 22px;" />';
echo '<div style="clear: right; display: block; float: right; margin-left: 5px; max-width: 150px; overflow: hidden; text-align: right; width: 150px;">' . $fullname . '</div>';
echo '</a></div>';

$count++;
}
}

$query = "SELECT user_id, username FROM login WHERE username LIKE \"%$q%\" ORDER BY username ASC";
$result = mysql_query($query, $db) or die(mysql_error($db));
$num_hints2 = mysql_num_rows($result);
$count = 0;

if ($num_hints2 > 0) {
if ($num_hints1 > 0) echo '<div style="color: #000; margin-bottom: 5px; margin-top: 5px; text-align: left;">Usernames (' . $num_hints2 . ')</div>';
else echo '<div style="color: #000; margin-bottom: 5px; text-align: left;">Usernames (' . $num_hints2 . ')</div>';
}

while ($row3 = mysql_fetch_array($result)) {
$query4 = "SELECT user_id, firstname, middlename, lastname, default_image FROM info WHERE user_id = " . $row3['user_id'];
$result4 = mysql_query($query4, $db) or die(mysql_error($db));
$row4 = mysql_fetch_assoc($result4);
extract($row4);
mysql_free_result($result4);

$fullname = $row4['firstname'] . ' ' . $row4['middlename'] . ' ' . $row4['lastname'];

if ($count > 0) echo '<div style="margin-top: 5px;"><a href="user_profile.php?id=' . $row3['user_id'] . '" title="View ' . $fullname . '\'s Profile" style="border-radius: 4px; -khtml-border-radius: 4px; -moz-border-radius: 4px; -opera-border-radius: 4px; -webkit-border-radius: 4px; padding-left: 4px; padding-right: 4px;">';
else echo '<div><a href="user_profile.php?id=' . $row3['user_id'] . '" title="View ' . $fullname . '\'s Profile" style="border-radius: 4px; -khtml-border-radius: 4px; -moz-border-radius: 4px; -opera-border-radius: 4px; -webkit-border-radius: 4px; padding-left: 4px; padding-right: 4px;">';
if ($row4['default_image'] != null) echo '<img src="/uploads/' . $row3['username'] . '/images/thumb/' . $row4['default_image'] . '" style="border-width: 0; height: 22px; position: relative; top: 4px; width: 22px;" />';
else echo '<img src="i/mem/default.jpg" style="border-width: 0; height: 22px; position: relative; top: 4px; width: 22px;" />';
echo '<div style="clear: right; display: block; float: right; margin-left: 5px; max-width: 150px; overflow: hidden; text-align: right; width: 150px;">' . $row3['username'] . '</div>';
echo '</a></div>';

$count++;
}
}

if (($num_hints1 == 0) && ($num_hints2 == 0)) echo '<div style="color: #000; text-align: center;">no suggestions</div>';
elseif ($num_hints1 == 0) echo '<div style="color: #000; margin-top: 5px; text-align: center;">no name suggestions</div>';
elseif (($num_hints2 == 0) && ($qname != 1)) echo '<div style="color: #000; margin-top: 5px; text-align: center;">no username suggestions</div>';
?>