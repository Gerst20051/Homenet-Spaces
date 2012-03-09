<?php
include ("redirect.inc.php");
$expire = (time() + 120);

/*
set on login.
gets value from database.
resets cookie if cookie doesn't exist nor same as existing cookie
set time as 30 days
random theme option
*/

switch ($_GET['theme']) {
case 'blue': setcookie('hnsmaintheme', '1', $expire); header('refresh: 0; url=index.php?theme=blue&redirect=' . $redirect); break;
case 'orange': setcookie('hnsmaintheme', '2', $expire); header('refresh: 0; url=index.php?theme=orange&redirect=' . $redirect); break;
case 'green': setcookie('hnsmaintheme', '3', $expire); header('refresh: 0; url=index.php?theme=green&redirect=' . $redirect); break;
case 'yellow': setcookie('hnsmaintheme', '4', $expire); header('refresh: 0; url=index.php?theme=yellow&redirect=' . $redirect); break;
case 'red': setcookie('hnsmaintheme', '5', $expire); header('refresh: 0; url=index.php?theme=red&redirect=' . $redirect); break;
case 'black': setcookie('hnsmaintheme', '6', $expire); header('refresh: 0; url=index.php?theme=black&redirect=' . $redirect); break;
default: setcookie('hnsmaintheme', '1', $expire); header('refresh: 0; url=index.php?theme=blue&redirect=' . $redirect); break;
}
?>