<?php
include ("db.member.inc.php");
include ("db.om.inc.php");

$url = $_SERVER['QUERY_STRING'];

echo $url;

$query = 'SELECT * FROM login WHERE username = ' . $url;
$result = mysql_query($query, $db) or die(mysql_error($db));

mysql_free_result($result);
echo $user_id;
?>