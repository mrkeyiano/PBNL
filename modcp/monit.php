<?php
/*
Project: PBNL Forum v2.3

Coded By: Oyebamiji Akorede (Harkorede)

Facebook: http://facebook.com/harkorede94

Email: (harkorede01@gmail.com)

CellPhone +2348029828364

Twitter: @harkorede94

WebSite: http://naijamobile.in
*/
ob_start();
session_start();
include('../moduls/settings.php');
include('../moduls/connect.php');
include('../moduls/header.php');
include('../moduls/func.php');
?>
<div class="body_width">
<?php
include('../topnav.php');  if(!isloggedin())
{ header('location: index.php'); }
else {
$user=$_SESSION["user"];
$banned=user_info($user, banned);
if($banned==1)
{ header("location: logout.php");
exit();
} else
$user=$_SESSION["user"];
$level=user_info($user, level);
if($level>0)
{ updateonline(); } else { header("location:../member/index.php");
exit();
} }
?>
