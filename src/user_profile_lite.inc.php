<div style="background-color: transparent; width: 100%;">
<fieldset style="padding: 10px; margin: 0 auto; width: 90%;">
<legend><a href="user_profile.php?id=<?php echo $user_id; ?>" style="text-decoration: none;"><?php
$uresult = mysql_db_query($om, "SELECT DISTINCT username FROM users_online ORDER BY username ASC") or die("Database SELECT Error");

echo $row['username'] . " | " . $firstname . " " . $middlename . " " . $lastname;

while ($onlineusers = mysql_fetch_array($uresult, MYSQL_ASSOC)) {
foreach ($onlineusers as $users) if ($row['username'] == $users) echo " is Online!";
}

echo "</a>";

$current_month = date("n");
$current_day = date("d");
$current_year = date("Y");

if ($birth_month == $current_month && $birth_day == $current_day) echo " / Happy Birthday!";
?>&nbsp;</legend>
<?php
$colorarray = array('cff', 'ccf');
$o = rand(0, count($colorarray) - 1);
$randcolor = "{$colorarray[$o]}";
?>
<div style="background-color: #<?php echo $randcolor; ?>; height: 150px; margin-top: 5px; padding: 10px;">
<span style="float: left; width: 150px;">
<?php
if ($row['default_image'] != null) echo '<a href="user_pictures.php?id=' . $user_id . '"><img src="uploads/' . $row['username'] . '/images/thumb/' . $row['default_image'] . '" id="defaultuserimage" title="View ' . $firstname . ' ' . $lastname . '\'s Picture Gallery" /></a><br />' . "\n";
else echo '<img src="i/mem/default.jpg" id="defaultuserimage" /><br />' . "\n";
?>
</span>
<span style="left: 440px; position: absolute; text-align: left; width: 225px;">
<div style="margin-bottom: 16px;">
Status:
<br />
<?php
if ($status != null) echo $status;
else echo "<br />";
?>
</div>
<div style="margin-bottom: 16px;">
Mood:
<br />
<?php
if ($mood != null) echo $mood;
else echo "<br />";
?>
</div>
<div>
Gender:
<?php echo $gender; ?>
</div>
<div style="margin-bottom: 6px;">
Age:
<?php
function determine_age($birth_date) {
$birth_date_time = strtotime($birth_date);
$to_date = date('m/d/Y', $birth_date_time);

list ($birth_month, $birth_day, $birth_year) = explode('/', $to_date);

$now = time();
$current_month = date("n");
$current_day = date("d");
$current_year = date("Y");
$this_year_birth_date = $birth_month . '/' . $birth_day . '/' . $current_year;
$this_year_birth_date_timestamp = strtotime($this_year_birth_date);
$years_old = ($current_year - $birth_year);
if ($now < $this_year_birth_date_timestamp) $years_old = ($years_old - 1);

return $years_old;
}

$birth_date = $birth_month . "/" . $birth_day . "/" . $birth_year;
$age = determine_age($birth_date);
$current_month = date("n");
$current_day = date("d");
$current_year = date("Y");

if ($age == 0) {
if ($current_month < $birth_month) {
$month_diff = (12 - $birth_month);
$age = ($month_diff + $current_month);
echo $age . " Months";
} else {
$age = ($current_month - $birth_month);
echo $age . " Months";
}
} else {
echo $age;
}

if ($privacy_birthdate == 1) {
echo " / Birthdate: ";
echo $birth_date;
}
?>
</div>
</span>
<span style="margin-top: 8px; position: absolute; right: 240px; text-align: left; width: 200px;">
<div>xRank:
<?php
if ($website != null) $ifexists_website = 1000;
if ($user_style != null) $ifexists_user_style = 1000;
if ($default_image != null) $ifexists_defualt_image = 1000;

$xrank = ($rank + ($hits * 2) + ($logins * 5) + ($ifexists_website) + ($ifexists_user_style) + ($ifexists_default_image));

if ($logins > 5) {
if ($logins > 100) { $xrank = ($xrank * 5);
if ($logins > 200) { $xrank = ($xrank * 10);
if ($logins > 300) { $xrank = ($xrank * 15);
if ($logins > 400) { $xrank = ($xrank * 20);
if ($logins > 500) { $xrank = ($xrank * 25);
}}}}}
$xrank = ($xrank * 1.0586951);
}
elseif ($logins == 4) $xrank = ($xrank / 2.2452);
elseif ($logins == 3) $xrank = ($xrank / 3.1385);
elseif ($logins == 2) $xrank = ($xrank / 4.3698);
elseif ($logins == 1) $xrank = 0;
else $xrank = 0;

echo " $xrank ";
?>
</div>
<div>
Profile Views: 
<?php echo $hits; ?>
</div>
<div>
Logged On
<?php
echo " $logins ";

if ($logins > 1) echo "Times";
elseif ($logins == 1) echo "Time";
else echo "Times & Was Hacked :P";
?>
</div>
<div>
Last Login: <?php echo $last_login; ?>
</div>
<div>
Date Joined: <?php echo $date_joined; ?>
</div>
<div>
<div id="star">
<ul id="star" class="star" onmousedown="star.update(event,this)" onmousemove="star.mouse(event,this)" title="Rate <?php echo $first_name . " " . $last_name . "!"; ?>">
<li id="starCur" class="curr" title="<?php echo ($rating); ?>"<?php
echo ' style="width : ';
$width = round((($rating) * 84) / 100);
echo $width;
echo 'px; ">';
?></li>
</ul>
<div id="starUser" class="user"><?php echo ($rating); ?>%</div>
<div class="starvotes">
<small><a href="#" title="See Who Voted!" onclick="showMe2('voters_lite')">
<?php
$votes = ($xratings > 0) ? $xratings : 'No';
$vtense = ($xratings == 0 || $xratings > 1) ? ' Votes' : ' Vote';
echo "$votes$vtense</a></small>";

if (isset($_GET['rating'])) {
if (($vote < 0) || ($vote > 100)) {
} else {
echo " & ";
echo "<small>";
echo $rating_message;
echo "</small>";
}
}
?>
</div>
</div>
<!-- Begin voters -->
<div id="voters_lite" style="visibility: hidden; display: block;">
<span class="closespan">
<span class="header">
<?php
if ($voters == null) {
echo "0 Voters";
} else {
$numvoters = str_word_count($voters, null, '.0..9');

if ($numvoters == 1) {
echo $numvoters;
echo " Voter";
} else {
echo $numvoters;
echo " Voters";
}
}
?>
</span>
<a title="Close" accesskey="8" onclick="showMe5('voters_lite')" class="close">Close</a>
</span>
<div class="splash">
<span>
<?php
if ($voters == null) echo "No Voters Are Registered";
else echo $voters;
?>
</span>
</div>
</div>
<!-- End voters -->
</div>
</span>
</div>
</fieldset>
</div>