<?php
include ("redirect.inc.php");
$expire = (time() + (60 * 60 * 24 * 30));

switch ($_GET['lang']) {
case 'de': setcookie('hnslanguage', 'de', $expire); header('refresh: 0; url=language_set.php?lang=de&redirect=' . $redirect); break;
case 'en': setcookie('hnslanguage', 'en', $expire); header('refresh: 0; url=language_set.php?lang=en&redirect=' . $redirect); break;
case 'es': setcookie('hnslanguage', 'es', $expire); header('refresh: 0; url=language_set.php?lang=es&redirect=' . $redirect); break;
case 'fr': setcookie('hnslanguage', 'fr', $expire); header('refresh: 0; url=language_set.php?lang=fr&redirect=' . $redirect); break;
case 'it': setcookie('hnslanguage', 'it', $expire); header('refresh: 0; url=language_set.php?lang=it&redirect=' . $redirect); break;
case 'nl': setcookie('hnslanguage', 'nl', $expire); header('refresh: 0; url=language_set.php?lang=nl&redirect=' . $redirect); break;
case 'no'; setcookie('hnslanguage', 'no', $expire); header('refresh: 0; url=language_set.php?lang=no&redirect=' . $redirect); break;
case 'pl': setcookie('hnslanguage', 'pl', $expire); header('refresh: 0; url=language_set.php?lang=pl&redirect=' . $redirect); break;
case 'pt_br': setcookie('hnslanguage', 'pt_br', $expire); header('refresh: 0; url=language_set.php?lang=pt_br&redirect=' . $redirect); break;
default: setcookie('hnslanguage', 'en', $expire); header('refresh: 0; url=language_set.php?lang=en&redirect=' . $redirect); break;
}
?>