<?php
$host = "localhost"; // Your mySQL Server, most cases "localhost"
$db_user = "root"; // Your mySQL Username
$db_pass = "comwiz05"; // Your mySQL Password
$om = "members"; // Database Name

mysql_connect($host, $db_user, $db_pass) or die("Users Online Database CONNECT Error");
?>