<?php
/*
Project: PBNL Forum v2.3

*/
////DATABASE SETTINGS////
global $config, $db;

$dbname = "DATABASE NAME HERE"; // Your Sql Database Name

$dbuser = "DATABASE USERNAME HERE"; // Your sql database username

$dbhost = "DATABASE HOST"; // its always localhost, except if your host states otherwise

$dbpass = "DATABASE PASSWORD"; // Your sql database password

////SITE SETTING////

$config->url = "http://www.websiteurl.tld/"; // Your website address with the trailing slash.

$config->title = "PBNL Forum"; // Your site title. Preferably your domain without .com/.net/.org/ etc

$config->css = "blue"; // css styles options.. black, green, blue, or red..

$config->desc = "Mobile Forum"; // Your site description,

$config->lome = "You Have Been Logged Out Successfully"; //Message For User After Logging Out

////OTHER SETTINGS///

$config->twit = "@Twitter"; // Your Twitter Username (Not URL)

$config->fb = "@Facebook"; // Site Facebook Page name (Not profile name or URL)

$config->owner = "Admin"; // Name Of Owner

$config->email = "admin@email.com"; // Email Of Owner

$config->mobile = ""; // Mobile No. Of Owner          ?>
