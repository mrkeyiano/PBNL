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
{ header("location: index.php"); }
else { $user=$_SESSION["user"]; }
echo"<title>$config->title &raquo; Invite Friends</title>";
echo"<style type='text/css'>
<!--
.style1 {
color: #FF0000;
font-family: Arial, Helvetica, sans-serif;
font-size: 12px;
} .style2 {font-size: 12px; font-family: Arial, Helvetica, sans-serif;} .style3 {color: #000000}
--> </style><div class='body_width'>";
include"topnav.php";
echo"<div class='breadcrumb'></div>";
echo"<center>";
include"ads.php";
fblike();
echo"</center>";
echo"<center>

<div class='public_message'><div class='success'></div></div>

</center>



<div style='margin-top: 5px;' class='grid3'>
</div>";
echo"<div class='grid3 middle'><div class='b_head'>Invite Friends</div>";
echo"<div class='msg'><span class='style1'>When You Invite a Friend to $config->title, Your username will be logged into our database and you will be rewarded once you hit our invitation threshold</div>";
if(isset($_POST["submit"])) { $email=$_POST["email"];
if(empty($email))
{ echo"<div class='center'><font color='red'>This email You Entered Is Not Valid</font></div>"; }
else { $from="From:Auto- Response";
$email=$_POST["email"];
$subject="INVITATION TO J0in $config->title";
$message="Hi friend, i wish to invite you to $config->url, the website for youths, its one of the best website in Nigeria with dynamic content ranging from different interesting section to Another. You will love to join the thousand of people who are already making cool money online through this website, join $config->title @ $config->url";
$send=mail("$email","$subject","$message","$from");
if($send)
{
$msg="An invitation has been sent to $email";
}
else
{
$msg="An error Occured";
}
header("location: ../member/index.php?msg=$msg");
exit();
}
}
echo"<form action='#' method='POST'><ul><li>Invited By:<br/><input type='text' disabled='disabled' name='user' value='$user'></li><li>Friends Email<br/><input type='text' name='email'></li><li><center><input type='submit' name='submit' value='INVITE' class='button'></center></li></ul><br><br><div class='link_button'><a href='../member/index.php'>Go Back</a></div>";

include"footer.php";
?>
