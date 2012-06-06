<?php
/*
session_start();

require ("lang.inc.php");
include ("auth.inc.php");
include ("admin.inc.php");
include ("db.member.inc.php");
*/
?>
<?php
if (isset($_POST['createfile']) && ($_POST['createfile'] == "Create PHP File")) {
$file_to_copy = "blank.php";
$new_filename = $_POST['new_filename'];
$new_filename .= ".php";

if (!file_exists($new_filename)) {
if (!copy($file_to_copy, $new_filename)) echo "An Error Occurred While Creating Your File";
} else {
echo "That File Already Exists Please Choose A New File Name!";
}
?>
<html>

<head>
<title>Homenet Spaces | Create A File</title>
</head>

<body>
<div class="pagecontent">

</div>
</body>

</html>
<?php
die();
}
?>
<html>

<head>
<title>Homenet Spaces | Create A File</title>
</head>

<body>
<div class="pagecontent">

</div>
</body>

</html>