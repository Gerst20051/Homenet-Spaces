<?php
session_start();

$error = 'The file you are trying to edit is not a supported filetype. They are GIF, JPEG, & PNG.';
$error .= '<br /><br />';
$error .= '<a href="upload.php?type=image">Upload More Images</a>';
$error .= '</div>';
$error .= '<!-- End page content -->';
$error .= '</body>';

$image = urldecode($_GET['image']);

list($width, $height, $type, $attr) = getimagesize($image);

switch ($type) {
case IMAGETYPE_GIF: $newimage = imagecreatefromgif($image) or die($error); break;
case IMAGETYPE_JPEG: $newimage = imagecreatefromjpeg($image) or die($error); break;
case IMAGETYPE_PNG: $newimage = imagecreatefrompng($image) or die($error); break;
default: die($error);
}

if (isset($_SESSION['caption']) && $_SESSION['caption'] != null) {
$caption = $_SESSION['caption'];
$fontsize = mt_rand(10, 64);
$angle = mt_rand(-180, 180);
$xint = mt_rand(10, ($width -10));
$yint = mt_rand(10, ($height - 10));
$color = mt_rand(0, 255);
$font = 'i/captcha/fonts/arial.ttf';
imagettftext($newimage, $fontsize, $angle, $xint, $yint, $color, $font, $caption);
}

$effect = urldecode($_GET['effect']);

switch ($effect) {
case IMG_FILTER_BRIGHTNESS:
$howbright = mt_rand(-255, 255);
imagefilter($newimage, IMG_FILTER_BRIGHTNESS, $howbright);
break;

case IMG_FILTER_COLORIZE:
$red = mt_rand(-255, 255);
$green = mt_rand(-255, 255);
$blue = mt_rand(-255, 255);
$trans = mt_rand(0, 127);
$alpha = mt_rand(1, 2);
$alpha = $alpha == 1 ? $trans : null;
imagefilter($newimage, IMG_FILTER_COLORIZE, $red, $green, $blue, $alpha);
break;

case IMG_FILTER_CONTRAST:
$value = mt_rand(-100, 100);
imagefilter($newimage, IMG_FILTER_CONTRAST, $value);
break;

case IMG_FILTER_EDGEDETECT:
imagefilter($newimage, IMG_FILTER_EDGEDETECT);
break;

case IMG_FILTER_EMBOSS:
imagefilter($newimage, IMG_FILTER_EMBOSS);
break;

case IMG_FILTER_GAUSSIAN_BLUR:
imagefilter($newimage, IMG_FILTER_GAUSSIAN_BLUR);
break;

case IMG_FILTER_GRAYSCALE:
imagefilter($newimage, IMG_FILTER_GRAYSCALE);
break;

case IMG_FILTER_MEAN_REMOVAL:
imagefilter($newimage, IMG_FILTER_MEAN_REMOVAL);
break;

case IMG_FILTER_NEGATE:
imagefilter($newimage, IMG_FILTER_NEGATE);
break;

case IMG_FILTER_PIXELATE:
$bsize = mt_rand(1, 10);
$atense = mt_rand(1, 2);
$adv = $atense == 1 ? true : false;
imagefilter($newimage, IMG_FILTER_PIXELATE, $bsize, $adv);
break;

case IMG_FILTER_SELECTIVE_BLUR:
imagefilter($newimage, IMG_FILTER_SELECTIVE_BLUR);
break;

case IMG_FILTER_SMOOTH:
$value = -1924.124;
imagefilter($newimage, IMG_FILTER_SMOOTH, $value);
break;
}

header('Content-Type: image/jpeg');
imagejpeg($newimage, null, 90);
imagedestroy($newimage);
?>