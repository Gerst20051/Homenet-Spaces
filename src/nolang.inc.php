<?php
include ("redirect.inc.php");

switch ($_COOKIE['hnslanguage']) {
case 'de': include ("lang/de.php"); break;
case 'en': include ("lang/en.php"); break;
case 'es': include ("lang/es.php"); break;
case 'fr': include ("lang/fr.php"); break;
case 'it': include ("lang/it.php"); break;
case 'nl': include ("lang/nl.php"); break;
case 'no': include ("lang/no.php"); break;
case 'pl': include ("lang/pl.php"); break;
case 'pt_br': include ("lang/pt_br.php"); break;
default: include ("lang/en.php"); break;
}
?>