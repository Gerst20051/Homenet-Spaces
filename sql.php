<?php
$sql = array();

array_push($sql,'CREATE TABLE IF NOT EXISTS `login` (
`user_id` INT( 10 ) NOT NULL AUTO_INCREMENT ,
`username` VARCHAR( 20 ) NOT NULL ,
`pass` VARCHAR( 41 ) NOT NULL ,
`access_level` TINYINT( 1 ) NOT NULL ,
`last_login` DATE NOT NULL ,
`last_login_ip` VARCHAR( 40 ) NOT NULL ,
`date_joined` DATE NOT NULL ,
`logins` INT( 11 ) NOT NULL ,
PRIMARY KEY (`user_id` )
) ENGINE = MYISAM  DEFAULT CHARSET = latin1  AUTO_INCREMENT = 1');

array_push($sql,'CREATE TABLE IF NOT EXISTS `info` (
`user_id` INT( 10 ) NOT NULL ,
`firstname` VARCHAR( 20 ) NOT NULL ,
`middlename` VARCHAR( 20 ) NOT NULL ,
`lastname` VARCHAR( 20 ) NOT NULL ,
`email` VARCHAR( 50 ) NOT NULL ,
`gender` ENUM(  \'Male\',  \'Female\' ) NOT NULL ,
`birth_month` INT( 2 ) NOT NULL ,
`birth_day` INT( 2 ) NOT NULL ,
`birth_year` INT( 4 ) NOT NULL ,
`current_city` VARCHAR( 50 ) NOT NULL ,
`hometown` VARCHAR( 50 ) NOT NULL ,
`default_image` VARCHAR( 255 ) NOT NULL ,
PRIMARY KEY (`user_id` )
) ENGINE = MYISAM');

array_push($sql,'CREATE TABLE IF NOT EXISTS `socialhns` (
`user_id` INT( 10 ) NOT NULL ,
`followers` TEXT NOT NULL ,
`contacts` TEXT NOT NULL ,
PRIMARY KEY (`user_id` )
) ENGINE = MYISAM');

array_push($sql,'CREATE TABLE IF NOT EXISTS `stream` (
`sid` INT( 10 ) NOT NULL ,
`owner` INT( 10 ) NOT NULL ,
`timestamp` INT( 10 ) NOT NULL ,
`type` INT( 1 ) NOT NULL ,
`data` TEXT NOT NULL ,
`likes` INT( 11 ) NOT NULL ,
`comments` MEDIUMTEXT NOT NULL ,
`shares` MEDIUMTEXT NOT NULL ,
`block` TEXT NOT NULL ,
`ids` TEXT NOT NULL ,
PRIMARY KEY (`sid` )
) ENGINE = MYISAM');

array_push($sql,'CREATE TABLE IF NOT EXISTS `users_online` (
`timestamp` INT( 10 ) NOT NULL ,
`ip` VARCHAR( 40 ) NOT NULL ,
`user_id` INT( 10 ) NOT NULL ,
`username` VARCHAR( 20 ) NOT NULL ,
`file` VARCHAR( 100 ) NOT NULL
) ENGINE = MYISAM');

array_push($sql,'CREATE TABLE IF NOT EXISTS `homenetspaces` (
`user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
`hobbies` text NOT NULL,
`security_question1` int(2) NOT NULL,
`security_answer1` varchar(255) NOT NULL,
`security_question2` int(2) NOT NULL,
`security_answer2` varchar(255) NOT NULL,
`hits` int(5) NOT NULL,
`logins` int(10) NOT NULL,
`rank` int(10) NOT NULL,
`xrank` int(10) NOT NULL,
`rating` int(11) NOT NULL,
`xratings` int(11) NOT NULL,
`voters` text NOT NULL,
`friends` text NOT NULL,
`website` varchar(255) NOT NULL,
`status` varchar(50) NOT NULL,
`mood` varchar(50) NOT NULL,
`alarm` varchar(255) NOT NULL,
`user_style` text NOT NULL,
`privacy` int(1) NOT NULL DEFAULT \'1\',
`privacy_profile_view` int(1) NOT NULL,
`privacy_birthdate` int(1) NOT NULL,
`about_me` text NOT NULL,
`away_message` varchar(255) NOT NULL,
`profile_song_history` text NOT NULL,
`profile_song_artist` varchar(255) NOT NULL,
`profile_song_name` varchar(255) NOT NULL,
`profile_song_astart` int(1) NOT NULL,
`pref_song_astart` int(1) NOT NULL,
`pref_psong_astart` int(1) NOT NULL,
`pref_upstyle` int(1) NOT NULL,
`pref_pupstyle` int(1) NOT NULL,
`pref_upview` int(1) NOT NULL,
`setting_vmode` int(1) NOT NULL,
`setting_theme` int(2) NOT NULL DEFAULT \'1\',
`setting_language` varchar(10) NOT NULL DEFAULT \'en\',
PRIMARY KEY (`user_id`)
) ENGINE = MYISAM  DEFAULT CHARSET = latin1');

array_push($sql,'CREATE TABLE IF NOT EXISTS `hns_desktop` (
`user_id` int(10) unsigned NOT NULL,
`notepad` mediumtext NOT NULL,
`theme_id` int(2) NOT NULL DEFAULT \'1\',
`bg_color` varchar(20) NOT NULL,
`wallpaper_file` varchar(50) NOT NULL,
`wallpaper_position` varchar(20) NOT NULL,
`wallpaper_repeat` varchar(20) NOT NULL,
`font_color` varchar(20) NOT NULL,
`transparency` int(1) NOT NULL DEFAULT \'1\',
`screensaver` int(1) NOT NULL DEFAULT \'1\',
`screensaver_time` int(3) NOT NULL,
`yt_playlist` text NOT NULL,
`music_song` varchar(255) NOT NULL,
`browser_home` varchar(100) NOT NULL,
`browser_favorites` varchar(255) NOT NULL,
`browser_history` varchar(255) NOT NULL,
`players` varchar(255) NOT NULL,
`twttr_playlist` text NOT NULL,
`launcher_autorun` varchar(255) NOT NULL,
`launcher_thumbs` varchar(255) NOT NULL,
`launcher_startmenuapps` varchar(255) NOT NULL,
`launcher_startmenutools` varchar(255) NOT NULL,
`launcher_quickstart` varchar(255) NOT NULL,
`launcher_tray` varchar(255) NOT NULL,
`app_documents` varchar(100) NOT NULL,
`app_preferences` varchar(100) NOT NULL,
`app_notepad` varchar(100) NOT NULL,
`app_flash_name` varchar(100) NOT NULL,
`app_ytinstant` varchar(100) NOT NULL,
`app_piano` varchar(100) NOT NULL,
`app_about_hnsdesktop` varchar(100) NOT NULL,
`app_feedback` varchar(100) NOT NULL,
`app_tic_tac_toe` varchar(100) NOT NULL,
`app_friends` varchar(100) NOT NULL,
`app_goom_radio` varchar(100) NOT NULL,
`app_search` varchar(100) NOT NULL,
`app_chat` varchar(100) NOT NULL,
`app_music` varchar(100) NOT NULL,
`app_web_browser` varchar(100) NOT NULL,
`app_calendar` varchar(100) NOT NULL,
`app_app_explorer` varchar(100) NOT NULL,
`app_calculator` varchar(100) NOT NULL,
`app_twitter` varchar(100) NOT NULL,
UNIQUE KEY `uid` (`user_id`)
) ENGINE = MYISAM  DEFAULT CHARSET = latin1');

mysql_create_db('hns') or die('Cannot create database');
mysql_select_db('hns') or die('Cannot select database');

foreach ($sql as $query) {
	//mysql_query($query);
}