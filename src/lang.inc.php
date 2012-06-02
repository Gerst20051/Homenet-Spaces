<?php
include ("redirect.inc.php");

if (!isset($_COOKIE['hnslanguage'])) {
header("location: language.php?redirect=" . $redirect);
} else {
if ($_COOKIE['hnslanguage'] == 'de') {
include ("lang/de.php");
}

if ($_COOKIE['hnslanguage'] == 'en') {
include ("lang/en.php");
}

if ($_COOKIE['hnslanguage'] == 'es') {
include ("lang/es.php");
}

if ($_COOKIE['hnslanguage'] == 'fr') {
include ("lang/fr.php");
}

if ($_COOKIE['hnslanguage'] == 'it') {
include ("lang/it.php");
}

if ($_COOKIE['hnslanguage'] == 'nl') {
include ("lang/nl.php");
}

if ($_COOKIE['hnslanguage'] == 'no') {
include ("lang/no.php");
}

if ($_COOKIE['hnslanguage'] == 'pl') {
include ("lang/pl.php");
}

if ($_COOKIE['hnslanguage'] == 'pt_br') {
include ("lang/pt_br.php");
}
}
?>