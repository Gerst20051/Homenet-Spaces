<?php
require ("lang.inc.php");
include ("auth.inc.php");
include ("db.member.inc.php");

if (!isset($_GET['image'])) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//<?php echo $TEXT['global-dtdlang']; ?>" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $TEXT['global-lang']; ?>" lang="<?php echo $TEXT['global-lang']; ?>" dir="<?php echo $TEXT['global-text_dir']; ?>">

<head>
<title><?php echo $TEXT['global-headertitle'] . " | " . $TEXT['homepage-headertitle']; ?></title>
<meta http-equiv="content-type" content="text/html; charset=<?php echo $TEXT['global-charset']; ?>" />
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="javascript.php"></script>
</head>

<body>
<?php include ("hd.inc.php"); ?>
<!-- Begin page content -->
<div class="pagecontent">
<p><strong style="color: #f33; font-weight: bold;">Your Need To Choose An Image To Edit!</strong></p>
<p><a href="user_pictures.php?id=<?php echo $_SESSION['user_id']; ?>">Browse Photo Gallery</a></p>
</div>
<!-- End page content -->
<?php include ("ft.inc.php"); ?>
</body>

</html>
<?php
die();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//<?php echo $TEXT['global-dtdlang']; ?>" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $TEXT['global-lang']; ?>" lang="<?php echo $TEXT['global-lang']; ?>" dir="<?php echo $TEXT['global-text_dir']; ?>">

<head>
<title><?php echo $TEXT['global-headertitle'] . " | " . $TEXT['homepage-headertitle']; ?></title>
<meta http-equiv="content-type" content="text/html; charset=<?php echo $TEXT['global-charset']; ?>" />
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="javascript.php"></script>
<style type="text/css">
div.pagecontent input[type="submit"] {
font-size: 13pt;
height: 36px;
letter-spacing: 2px;
line-height: 29px;
}

div.pagecontent input[type="button"] { 
font-size: 13pt;
height: 36px;
letter-spacing: 2px;
line-height: 29px;
}
</style>
<?php
$image_to_edit = urldecode($_GET['image']);
$imagedir = "uploads/" . $_SESSION['username'] . "/images/";
$image = $imagedir . $image_to_edit;
?>
<script type="text/javascript">
<!--
function updateimage(data) {
document.picture.src = "update_images_edit_effect.inc.php?image=<?php echo urlencode($image); ?>&effect=" + data.effect.value;
}
-->
</script>
</head>

<body>
<?php include ("hd.inc.php"); ?>
<!-- Begin page content -->
<div class="pagecontent">
<h1>Image Editor</h1>
<?php
if (file_exists($image)) {
?>
<form action="<?php echo $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING']; ?>" method="post">
<fieldset style="margin: 0 auto; width: 80%;">
<legend>Current Image:
<?php
if (file_exists($image)) echo $image_to_edit;
else echo "Doesn't Exist";
?>&nbsp;</legend>
<div style="margin-bottom: 15px; margin-top: 15px;">
<?php
$effect = (isset($_POST['effect'])) ? urldecode($_POST['effect']) : -1;

if (isset($_POST['saveoverride']) || isset($_POST['savenew'])) {
$error = 'The file you are trying to edit is not a supported filetype. They are GIF, JPEG, & PNG.';
$error .= '<br /><br />';
$error .= '<a href="upload.php?type=image">Upload More Images</a>';
$error .= '</div>';
$error .= '<!-- End page content -->';
$error .= '</body>';

list($width, $height, $type, $attr) = getimagesize($image);

switch ($type) {
case IMAGETYPE_GIF: $newimage = imagecreatefromgif($image) or die($error); break;
case IMAGETYPE_JPEG: $newimage = imagecreatefromjpeg($image) or die($error); break;
case IMAGETYPE_PNG: $newimage = imagecreatefrompng($image) or die($error); break;
default: die($error);
}

if (isset($_POST['captioncheck']) && $_POST['captioncheck'] == 1) {
if (!empty($_POST['captioncheck'])) {
$_SESSION['caption'] = (isset($_POST['caption'])) ? $_POST['caption'] : "Homenet Spaces";
$fontsize = mt_rand(10, 64);
$angle = mt_rand(-180, 180);
$xint = mt_rand(10, ($width -10));
$yint = mt_rand(10, ($height - 10));
$color = mt_rand(0, 255);
$font = 'i/captcha/fonts/arial.ttf';
imagettftext($newimage, $fontsize, $angle, $xint, $yint, $color, $font, $caption);
}
}

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

if (isset($_POST['saveoverride'])) {
imagejpeg($newimage, $image, 90);

$thumb_width = 200;
$ratio = ($width / $thumb_width);
$thumb_height = round($height / $ratio);
$thumb = imagecreatetruecolor($thumb_width, $thumb_height);
$newthumb = $imagedir . "thumb/" . $image_to_edit;

imagecopyresampled($thumb, $newimage, 0, 0, 0, 0, $thumb_width, $thumb_height, $width, $height);
imagejpeg($thumb, $newthumb, 90);
imagedestroy($thumb);
imagedestroy($newimage);

echo '<div style="color: #f00; letter-spacing: 1px;">Image Saved Sucessfully</div>';
echo '<br />';
echo '<img src="' . $image . '" style="height: auto; width: 600px;" />';
}

if (isset($_POST['savenew'])) {
$random_digit = rand(0000, 9999);
$image_to_edit = $random_digit . "_" . $image_to_edit;
$image = $imagedir . $image_to_edit;

imagejpeg($newimage, $image, 90);

$thumb_width = 200;
$ratio = ($width / $thumb_width);
$thumb_height = round($height / $ratio);
$thumb = imagecreatetruecolor($thumb_width, $thumb_height);
$newthumb = $imagedir . "thumb/" . $image_to_edit;

imagecopyresampled($thumb, $newimage, 0, 0, 0, 0, $thumb_width, $thumb_height, $width, $height);
imagejpeg($thumb, $newthumb, 90);
imagedestroy($thumb);
imagedestroy($newimage);

echo '<div style="color: #f00; letter-spacing: 1px;">Image Saved Sucessfully</div>';
echo '<br />';
echo '<img src="' . $image . '" style="height: auto; width: 600px;" />';
}

echo '</div>';
echo '</fieldset>';
echo '</form>';

$query = 'SELECT rank FROM info WHERE user_id = ' . $_SESSION['user_id'];
$result = mysql_query($query, $db) or die(mysql_error());
$row = mysql_fetch_array($result);
extract($row);
mysql_free_result($result);

$rank = ($rank + 100);

$query = 'UPDATE info SET rank = ' . $rank . ' WHERE user_id = ' . $_SESSION['user_id'];
mysql_query($query, $db) or die(mysql_error());
} else {

if (isset($_POST['captioncheck']) && $_POST['captioncheck'] == 1) {
if (!empty($_POST['captioncheck'])) $_SESSION['caption'] = (isset($_POST['caption'])) ? $_POST['caption'] : "Homenet Spaces";
}

echo '<img src="update_images_edit_effect.inc.php?image=' . urlencode($image) . '&effect=' . urlencode($effect) . '" name="picture" style="height : auto; width : 600px; " />';
?>
<br /><br />
<input type="hidden" name="user_id" value="<?php echo $user_id; ?>" />
<select name="effect" id="effect" onchange="updateimage(this.form);" >
<option value="-1">None</option>
<?php
echo '<option value="' . IMG_FILTER_BRIGHTNESS . '"';
if (isset($_POST['effect']) && $_POST['effect'] == IMG_FILTER_BRIGHTNESS) echo ' selected="selected"';
echo '>Brightness</option>';

echo '<option value="' . IMG_FILTER_COLORIZE . '"';
if (isset($_POST['effect']) && $_POST['effect'] == IMG_FILTER_COLORIZE) echo ' selected="selected"';
echo '>Colorize</option>';

echo '<option value="' . IMG_FILTER_CONTRAST . '"';
if (isset($_POST['effect']) && $_POST['effect'] == IMG_FILTER_CONTRAST) echo ' selected="selected"';
echo '>Contrast</option>';

echo '<option value="' . IMG_FILTER_EDGEDETECT . '"';
if (isset($_POST['effect']) && $_POST['effect'] == IMG_FILTER_EDGEDETECT) echo ' selected="selected"';
echo '>Edge Detect</option>';

echo '<option value="' . IMG_FILTER_EMBOSS . '"';
if (isset($_POST['effect']) && $_POST['effect'] == IMG_FILTER_EMBOSS) echo ' selected="selected"';
echo '>Emboss</option>';

echo '<option value="' . IMG_FILTER_GAUSSIAN_BLUR . '"';
if (isset($_POST['effect']) && $_POST['effect'] == IMG_FILTER_GAUSSIAN_BLUR) echo ' selected="selected"';
echo '>Gaussian Blur</option>';

echo '<option value="' . IMG_FILTER_GRAYSCALE . '"';
if (isset($_POST['effect']) && $_POST['effect'] == IMG_FILTER_GRAYSCALE) echo ' selected="selected"';
echo '>Gray Scale</option>';

echo '<option value="' . IMG_FILTER_MEAN_REMOVAL . '"';
if (isset($_POST['effect']) && $_POST['effect'] == IMG_FILTER_MEAN_REMOVAL) echo ' selected="selected"';
echo '>Mean Removal</option>';

echo '<option value="' . IMG_FILTER_NEGATE . '"';
if (isset($_POST['effect']) && $_POST['effect'] == IMG_FILTER_NEGATE) echo ' selected="selected"';
echo '>Negate</option>';

echo '<option value="' . IMG_FILTER_PIXELATE . '"';
if (isset($_POST['effect']) && $_POST['effect'] == IMG_FILTER_PIXELATE) echo ' selected="selected"';
echo '>Pixelate</option>';

echo '<option value="' . IMG_FILTER_SELECTIVE_BLUR . '"';
if (isset($_POST['effect']) && $_POST['effect'] == IMG_FILTER_SELECTIVE_BLUR) echo ' selected="selected"';
echo '>Selective Blur</option>';

echo '<option value="' . IMG_FILTER_SMOOTH . '"';
if (isset($_POST['effect']) && $_POST['effect'] == IMG_FILTER_SMOOTH) echo ' selected="selected"';
echo '>Smooth</option>';
?>
</select>
<input type="submit" name="preview" value="Preview" />
<br /><br />
<label for="caption">Caption: </label>
<input type="checkbox" name="captioncheck" id="captioncheck" title="Embed Caption" value="1"<?php if (isset($_SESSION['caption']) && $_SESSION['caption'] != null) { echo ' checked="checked"'; } ?> />
<input type="text" name="caption" id="caption" title="Embed Caption In Image?" value="<?php echo $_SESSION['caption']; ?>" />
<br /><br />
<input type="submit" name="saveoverride" value="Save & Override" />
<input type="button" id="cancel" value="Cancel"  onclick="history.go(-1);" />
<input type="submit" name="savenew" value="Save As A New Image" />
<br />
<h4 style="color: #f00; letter-spacing: 1px;">( After You Save You Cannot Undo The Filter You Applied )</h4>
</div>
</fieldset>
</form>
<?php
}
} else {
echo '<fieldset style="margin: 0 auto; width: 80%;">';
echo '<legend>Current Image: Doesn\'t Exist</legend>';
echo '<div style="color: #f00; letter-spacing: 1px;">This Image Doesn\'t Exist</div>';
echo '<br />';
echo '<img src="i/mem/default.jpg" style="height: auto; width: 600px;" />';
echo '</fieldset>';
}
?>
<br />
<span>
<a href="user_pictures.php?id=<?php echo $_SESSION['user_id']; ?>">Browse Photo Gallery</a>
</span>
</div>
<!-- End page content -->
<?php include ("ft.inc.php"); ?>
</body>

</html>