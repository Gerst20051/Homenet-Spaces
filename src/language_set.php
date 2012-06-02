<?php
include ("redirect.inc.php");

header('refresh: 4; url=' . $redirect);

session_start();

include ("lang.inc.php");
include ("db.member.inc.php");
include ("login.inc.php");
include ("bimage.inc.php");

switch ($_GET['lang']) {
case 'de':
echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//' . $TEXT['global-dtdlang'] . '" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
echo '<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="' . $TEXT['global-lang'] . '" lang="' . $TEXT['global-lang'] . '" dir="' . $TEXT['global-text_dir'] . '">';

echo '<head>';
echo '<title>Homenet Gewerbe | Legen Sie Ihre Sprache</title>';
echo '<link rel="stylesheet" type="text/css" href="css/global.css" media="all" />';
echo '<script type="text/javascript" src="cs.js"></script>';
echo '<script type="text/javascript" src="nav.js"></script>';
echo '<script type="text/javascript" src="suggest.js"></script>';
echo '</head>';

echo '<body style="background: url(<?php echo $bimage; ?>) top repeat; ">';
include ("hd.inc.php");
echo '<!-- Begin page content -->';
echo '<div class="pagecontent">';
echo '<h1>Ihre Sprache Deutsch</h1>';
echo '<form name="counter" style="margin : 0px; "><p>Sie werden automatisch auf die Hauptseite in
<input type="text" size="1" name="cd" style="background-color : transparent; border : 0px; width : 12px; ">
sekunden.</p></form>';
echo '<p>Wenn Ihr Browser keine Weiterleitung Sie automatisch <a href="' . $redirect . '">Klicken Sie hier</a>.</p>';
echo '</div>';
echo '<script type="text/javascript"> 
<!--
var milisec = 0;
var seconds = 5; // add 1 to absolute value
document.counter.cd.value = seconds;

function display() {
if (milisec <= 0) {
milisec = 10;
seconds -= 1;
}

if (seconds <= -1) {
milisec = 0;
seconds += 1;
} else {
milisec -= 1;
document.counter.cd.value = seconds;
setTimeout("display()", 110);
}
}

display();
//-->
</script>';
echo '<!-- End page content -->';
include ("ft.inc.php");
echo '</body>';

echo '</html>';
break;

case 'en':
echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//' . $TEXT['global-dtdlang'] . '" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
echo '<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="' . $TEXT['global-lang'] . '" lang="' . $TEXT['global-lang'] . '" dir="' . $TEXT['global-text_dir'] . '">';

echo '<head>';
echo '<title>Homenet Spaces | Your Language Is Set</title>';
echo '<link rel="stylesheet" type="text/css" href="css/global.css" media="all" />';
echo '<script type="text/javascript" src="cs.js"></script>';
echo '<script type="text/javascript" src="nav.js"></script>';
echo '<script type="text/javascript" src="suggest.js"></script>';
echo '</head>';

echo '<body style="background: url(<?php echo $bimage; ?>) top repeat; ">';
include ("hd.inc.php");
echo '<!-- Begin page content -->';
echo '<div class="pagecontent">';
echo '<h1>Your Language Is English</h1>';
echo '<form name="counter" style="margin : 0px; "><p>You will be redirected to the main page in
<input type="text" size="1" name="cd" style="background-color : transparent; border : 0px; width : 12px; ">
seconds</p></form>';
echo '<p>If your browser doesn\'t redirect you automatically <a href="' . $redirect . '">click here</a>.</p>';
echo '</div>';
echo '<script type="text/javascript"> 
<!--
var milisec = 0;
var seconds = 5; // add 1 to absolute value
document.counter.cd.value = seconds;

function display() {
if (milisec <= 0) {
milisec = 10;
seconds -= 1;
}

if (seconds <= -1) {
milisec = 0;
seconds += 1;
} else {
milisec -= 1;
document.counter.cd.value = seconds;
setTimeout("display()", 110);
}
}

display();
//-->
</script>';
echo '<!-- End page content -->';
include ("ft.inc.php");
echo '</body>';

echo '</html>';
break;

case 'es':
echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//' . $TEXT['global-dtdlang'] . '" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
echo '<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="' . $TEXT['global-lang'] . '" lang="' . $TEXT['global-lang'] . '" dir="' . $TEXT['global-text_dir'] . '">';

echo '<head>';
echo '<title>Homenet Espacios | Su idioma es Conjunto</title>';
echo '<link rel="stylesheet" type="text/css" href="css/global.css" media="all" />';
echo '<script type="text/javascript" src="cs.js"></script>';
echo '<script type="text/javascript" src="nav.js"></script>';
echo '<script type="text/javascript" src="suggest.js"></script>';
echo '</head>';

echo '<body style="background: url(<?php echo $bimage; ?>) top repeat; ">';
include ("hd.inc.php");
echo '<!-- Begin page content -->';
echo '<div class="pagecontent">';
echo '<h1>Su idioma es Español</h1>';
echo '<form name="counter" style="margin : 0px; "><p>Usted va a ser redirigido a la página principal en
<input type="text" size="1" name="cd" style="background-color : transparent; border : 0px; width : 12px; ">
segundos.</p></form>';
echo '<p>Si su navegador no te redirecciona automáticamente <a href="' . $redirect . '">haga clic aquí</a>.</p>';
echo '</div>';
echo '<script type="text/javascript"> 
<!--
var milisec = 0;
var seconds = 5; // add 1 to absolute value
document.counter.cd.value = seconds;

function display() {
if (milisec <= 0) {
milisec = 10;
seconds -= 1;
}

if (seconds <= -1) {
milisec = 0;
seconds += 1;
} else {
milisec -= 1;
document.counter.cd.value = seconds;
setTimeout("display()", 110);
}
}

display();
//-->
</script>';
echo '<!-- End page content -->';
include ("ft.inc.php");
echo '</body>';

echo '</html>';
break;

case 'fr':
echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//' . $TEXT['global-dtdlang'] . '" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
echo '<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="' . $TEXT['global-lang'] . '" lang="' . $TEXT['global-lang'] . '" dir="' . $TEXT['global-text_dir'] . '">';

echo '<head>';
echo '<title>Homenet Espaces | Votre langue est-Set</title>';
echo '<link rel="stylesheet" type="text/css" href="css/global.css" media="all" />';
echo '<script type="text/javascript" src="cs.js"></script>';
echo '<script type="text/javascript" src="nav.js"></script>';
echo '<script type="text/javascript" src="suggest.js"></script>';
echo '</head>';

echo '<body style="background: url(<?php echo $bimage; ?>) top repeat; ">';
include ("hd.inc.php");
echo '<!-- Begin page content -->';
echo '<div class="pagecontent">';
echo '<h1>Votre langue est Francais</h1>';
echo '<form name="counter" style="margin : 0px; "><p>Vous allez être redirigé vers la page principale en
<input type="text" size="1" name="cd" style="background-color : transparent; border : 0px; width : 12px; ">
secondes.</p></form>';
echo '<p>Si votre navigateur ne vous redirige pas automatiquement <a href="' . $redirect . '">cliquez ici</a>.</p>';
echo '</div>';
echo '<script type="text/javascript"> 
<!--
var milisec = 0;
var seconds = 5; // add 1 to absolute value
document.counter.cd.value = seconds;

function display() {
if (milisec <= 0) {
milisec = 10;
seconds -= 1;
}

if (seconds <= -1) {
milisec = 0;
seconds += 1;
} else {
milisec -= 1;
document.counter.cd.value = seconds;
setTimeout("display()", 110);
}
}

display();
//-->
</script>';
echo '<!-- End page content -->';
include ("ft.inc.php");
echo '</body>';

echo '</html>';
break;

case 'it':
echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//' . $TEXT['global-dtdlang'] . '" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
echo '<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="' . $TEXT['global-lang'] . '" lang="' . $TEXT['global-lang'] . '" dir="' . $TEXT['global-text_dir'] . '">';

echo '<head>';
echo '<title>Spazi Interni | Imposta il tuo linguaggio è</title>';
echo '<link rel="stylesheet" type="text/css" href="css/global.css" media="all" />';
echo '<script type="text/javascript" src="cs.js"></script>';
echo '<script type="text/javascript" src="nav.js"></script>';
echo '<script type="text/javascript" src="suggest.js"></script>';
echo '</head>';

echo '<body style="background: url(<?php echo $bimage; ?>) top repeat; ">';
include ("hd.inc.php");
echo '<!-- Begin page content -->';
echo '<div class="pagecontent">';
echo '<h1>La sua lingua è Italiano</h1>';
echo '<form name="counter" style="margin : 0px; "><p>Verrai reindirizzato alla pagina principale di
<input type="text" size="1" name="cd" style="background-color : transparent; border : 0px; width : 12px; ">
secondi.</p></form>';
echo '<p>Se il vostro browser non reindirizzato automaticamente <a href="' . $redirect . '">clicca qui</a>.</p>';
echo '</div>';
echo '<script type="text/javascript"> 
<!--
var milisec = 0;
var seconds = 5; // add 1 to absolute value
document.counter.cd.value = seconds;

function display() {
if (milisec <= 0) {
milisec = 10;
seconds -= 1;
}

if (seconds <= -1) {
milisec = 0;
seconds += 1;
} else {
milisec -= 1;
document.counter.cd.value = seconds;
setTimeout("display()", 110);
}
}

display();
//-->
</script>';
echo '<!-- End page content -->';
include ("ft.inc.php");
echo '</body>';

echo '</html>';
break;

case 'nl':
echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//' . $TEXT['global-dtdlang'] . '" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
echo '<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="' . $TEXT['global-lang'] . '" lang="' . $TEXT['global-lang'] . '" dir="' . $TEXT['global-text_dir'] . '">';

echo '<head>';
echo '<title>Homenet Spaces | Uw taal is ingesteld</title>';
echo '<link rel="stylesheet" type="text/css" href="css/global.css" media="all" />';
echo '<script type="text/javascript" src="cs.js"></script>';
echo '<script type="text/javascript" src="nav.js"></script>';
echo '<script type="text/javascript" src="suggest.js"></script>';
echo '</head>';

echo '<body style="background: url(<?php echo $bimage; ?>) top repeat; ">';
include ("hd.inc.php");
echo '<!-- Begin page content -->';
echo '<div class="pagecontent">';
echo '<h1>Uw taal Dutch</h1>';
echo '<form name="counter" style="margin : 0px; "><p>U wordt omgeleid naar de hoofdpagina in
<input type="text" size="1" name="cd" style="background-color : transparent; border : 0px; width : 12px; ">
seconden.</p></form>';
echo '<p>Als uw browser geen omleiding u automatisch <a href="' . $redirect . '">klik hier</a>.</p>';
echo '</div>';
echo '<script type="text/javascript"> 
<!--
var milisec = 0;
var seconds = 5; // add 1 to absolute value
document.counter.cd.value = seconds;

function display() {
if (milisec <= 0) {
milisec = 10;
seconds -= 1;
}

if (seconds <= -1) {
milisec = 0;
seconds += 1;
} else {
milisec -= 1;
document.counter.cd.value = seconds;
setTimeout("display()", 110);
}
}

display();
//-->
</script>';
echo '<!-- End page content -->';
include ("ft.inc.php");
echo '</body>';

echo '</html>';
break;

case 'no';
echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//' . $TEXT['global-dtdlang'] . '" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
echo '<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="' . $TEXT['global-lang'] . '" lang="' . $TEXT['global-lang'] . '" dir="' . $TEXT['global-text_dir'] . '">';

echo '<head>';
echo '<title>Homenet Spaces | Språket ditt er Satt</title>';
echo '<link rel="stylesheet" type="text/css" href="css/global.css" media="all" />';
echo '<script type="text/javascript" src="cs.js"></script>';
echo '<script type="text/javascript" src="nav.js"></script>';
echo '<script type="text/javascript" src="suggest.js"></script>';
echo '</head>';

echo '<body style="background: url(<?php echo $bimage; ?>) top repeat; ">';
include ("hd.inc.php");
echo '<!-- Begin page content -->';
echo '<div class="pagecontent">';
echo '<h1>Språket ditt er Norwegian</h1>';
echo '<form name="counter" style="margin : 0px; "><p>Du omdirigeres til hovedsiden i
<input type="text" size="1" name="cd" style="background-color : transparent; border : 0px; width : 12px; ">
seconds</p></form>';
echo '<p>Hvis nettleseren ikke omdirigere deg automatisk <a href="' . $redirect . '">klikk her</a>.</p>';
echo '</div>';
echo '<script type="text/javascript"> 
<!--
var milisec = 0;
var seconds = 5; // add 1 to absolute value
document.counter.cd.value = seconds;

function display() {
if (milisec <= 0) {
milisec = 10;
seconds -= 1;
}

if (seconds <= -1) {
milisec = 0;
seconds += 1;
} else {
milisec -= 1;
document.counter.cd.value = seconds;
setTimeout("display()", 110);
}
}

display();
//-->
</script>';
echo '<!-- End page content -->';
include ("ft.inc.php");
echo '</body>';

echo '</html>';
break;

case 'pl':
echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//' . $TEXT['global-dtdlang'] . '" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
echo '<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="' . $TEXT['global-lang'] . '" lang="' . $TEXT['global-lang'] . '" dir="' . $TEXT['global-text_dir'] . '">';

echo '<head>';
echo '<title>Homenet Obszary | Twój jezyk jest ustawiony</title>';
echo '<link rel="stylesheet" type="text/css" href="css/global.css" media="all" />';
echo '<script type="text/javascript" src="cs.js"></script>';
echo '<script type="text/javascript" src="nav.js"></script>';
echo '<script type="text/javascript" src="suggest.js"></script>';
echo '</head>';

echo '<body style="background: url(<?php echo $bimage; ?>) top repeat; ">';
include ("hd.inc.php");
echo '<!-- Begin page content -->';
echo '<div class="pagecontent">';
echo '<h1>Twój jezyk jest Polski</h1>';
echo '<form name="counter" style="margin : 0px; "><p>Zostaniesz przekierowany na strone glówna w
<input type="text" size="1" name="cd" style="background-color : transparent; border : 0px; width : 12px; ">
sekundy.</p></form>';
echo '<p>Jezeli Twoja przegladarka nie przekierowuja automatycznie <a href="' . $redirect . '">kliknij tutaj</a>.</p>';
echo '</div>';
echo '<script type="text/javascript"> 
<!--
var milisec = 0;
var seconds = 5; // add 1 to absolute value
document.counter.cd.value = seconds;

function display() {
if (milisec <= 0) {
milisec = 10;
seconds -= 1;
}

if (seconds <= -1) {
milisec = 0;
seconds += 1;
} else {
milisec -= 1;
document.counter.cd.value = seconds;
setTimeout("display()", 110);
}
}

display();
//-->
</script>';
echo '<!-- End page content -->';
include ("ft.inc.php");
echo '</body>';

echo '</html>';
break;

case 'pt_br':
echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//' . $TEXT['global-dtdlang'] . '" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
echo '<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="' . $TEXT['global-lang'] . '" lang="' . $TEXT['global-lang'] . '" dir="' . $TEXT['global-text_dir'] . '">';

echo '<head>';
echo '<title>Espaços de Homenet | Defina o seu idioma é</title>';
echo '<link rel="stylesheet" type="text/css" href="css/global.css" media="all" />';
echo '<script type="text/javascript" src="cs.js"></script>';
echo '<script type="text/javascript" src="nav.js"></script>';
echo '<script type="text/javascript" src="suggest.js"></script>';
echo '</head>';

echo '<body style="background: url(<?php echo $bimage; ?>) top repeat; ">';
include ("hd.inc.php");
echo '<!-- Begin page content -->';
echo '<div class="pagecontent">';
echo '<h1>Sua língua é Português</h1>';
echo '<form name="counter" style="margin : 0px; "><p>Você será redirecionado para a página principal em
<input type="text" size="1" name="cd" style="background-color : transparent; border : 0px; width : 12px; ">
segundos.</p></form>';
echo '<p>Se o seu navegador não redirecionar você automaticamente <a href="' . $redirect . '">clique aqui</a>.</p>';
echo '</div>';
echo '<script type="text/javascript"> 
<!--
var milisec = 0;
var seconds = 5; // add 1 to absolute value
document.counter.cd.value = seconds;

function display() {
if (milisec <= 0) {
milisec = 10;
seconds -= 1;
}

if (seconds <= -1) {
milisec = 0;
seconds += 1;
} else {
milisec -= 1;
document.counter.cd.value = seconds;
setTimeout("display()", 110);
}
}

display();
//-->
</script>';
echo '<!-- End page content -->';
include ("ft.inc.php");
echo '</body>';

echo '</html>';
break;
}
?>