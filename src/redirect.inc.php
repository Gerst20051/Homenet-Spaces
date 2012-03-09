<?php
if (isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] != null) $noredirect = $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'];
else $noredirect = $_SERVER['PHP_SELF'];
$redirect = (isset($_REQUEST['redirect'])) ? $_REQUEST['redirect'] : $noredirect;
?>