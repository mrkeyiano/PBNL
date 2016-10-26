<?php
ERROR_REPORTING(0);
/*
Project: PBNL Forum v2.3

Coded By: Oyebamiji Akorede (Harkorede)

Facebook: http://facebook.com/harkorede94

Email: (harkorede01@gmail.com)

CellPhone +2348029828364

Twitter: @harkorede94

WebSite: http://naijamobile.in
*/
require("init.php");
if(!isloggedin())
{ header('location: index.php'); }
else { $user=$_SESSION["user"];
$banned=user_info($user, banned);
if($banned==1) { header("location: logout.php"); exit(); }
else { updateonline(); } } echo"<style type='text/css'>
<!-- .style1 {
color: #FF0000;
font-weight: bold;
font-family: Arial, Helvetica, sans-serif;
font-size: 13px;
} .style7 {color: #FFFFFF} --> </style> <div class='body_width'>";
include "topnav.php";
$uid=(int)$_GET["uid"];
$checkid=mysql_num_rows(mysql_query("SELECT * FROM b_users WHERE userID=$uid"));
if(empty($uid)||$checkid<1) { header('Location: index.php'); } $username=cleanvalues2(user_info2($uid, username));
$status=cleanvalues2(user_info2($uid, status));
$lasttime=cleanvalues2(user_info2($uid, lasttime));
$lasttime2=date("D d M Y", $lasttime); $sex=user_info2($uid, sex);
$position=user_info2($uid, position); $about=user_info2($uid, note);
$regtime=user_info2($uid, regtime); $regtime=date("D d M, Y", $regtime); $avatar=user_info2($uid, photo); $country=user_info2($uid, country); $name=user_info2($uid, name); $city=user_info2($uid, city);
$school=user_info2($uid, school); $level=user_info2($uid, level);
$rank=getrank($level);
$recent=date("U")-900; $onlinecheck=mysql_num_rows(mysql_query("SELECT * FROM b_users WHERE userID='$uid' AND lasttime>'$recent'"));
if($onlinecheck>0) {
$st="<font color='green'>.::ONLINE::.</font>"; } else { $st="<font color='red'>.::OFFLINE::.</font>"; } echo "<title>$config->title &raquo; $username's profile</title>";
echo"<div class='breadcrumb'></div>
<center>"; include "ads.php";
fblike(); echo"</center>
<div style='margin-top: 5px;' class='grid3'></div>";
echo"<div class='grid3 middle' align='center'><div class='b_head'>$username's Profile</div>$st<br/>$status"; if(empty($avatar)) { $avatar="/images/nophoto.png"; } else { $avatar="/avatars/$avatar";
} echo "<div class='user-pic'><br><img src='$avatar' alt='photo' height='150' width='150' /></div><center><a class='button' href='/mail/compose.php?rname=$username'>Send message</a><center><br/>";
echo"<div class='user-info'>
<ul><li><b>Username:</b> $username</li><li><b>Full Name:</b> $name</li><li><b>Gender:</b> $sex</li><li><b>About Me:</b> $about</li><li><b>City:</b> $city</li><li><b>Country:</b> $country</li><li><b>School:</b> $position Of $school</li><li><b>Member Since:</b> $regtime</li><li><b>Last Login:</b> $lasttime2</li><li><b>Site status:</b> $rank</li></ul><br><br>&raquo; <a href='../member/settings.php'>Edit your profile details</a><br/><center><br/><font color='red'><b>Invite Your Friends To $config->title</b></font><br/></center><br/><div style=' background:#EFEF00; padding: 3px;' class='style7'>=> <a href='../member/search.php'>Search For Members</a></div><br/><div class='link_button'><a href='../member/index.php'>  Go Back </a></div></div>";
include "footer.php"; ?>
