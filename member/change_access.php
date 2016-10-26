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
require("../init.php"); if(!isloggedin()) { header("location: index.php"); } else { $user=$_SESSION["user"]; }
echo"<title>$config->title &raquo; Change Password</title>";
echo"<div class='body_width'>";
include "../topnav.php";
echo"<div class='breadcrumb'></div>";
echo"<center>";
include "../ads.php";
fblike();
echo"</center>";
echo"<center>



<div class='public_message'><div class='success'></div></div>

</center>



<div style='margin-top: 5px;' class='grid3'>
</div>";
echo"<div class='grid3 middle'>
<div class='b_head'>Change Password</div><br/>";
if(isset($_POST["submit"]))
{
//Retrieve values
$errors=array();
$newpassword=$_POST["newpassword"];
$newpassword2=$_POST["newpassword2"];
$oldpassword=md5($_POST["oldpassword"]);
//clean values
$oldpassword=cleanvalues($oldpassword);
$newpassword=cleanvalues($newpassword);
$newpassword2=cleanvalues($newpassword2);
if(strlen($newpassword)<4||empty($newpassword))
{
$errors[]="Your password is too short";
}
$num=get_row("SELECT * FROM b_users WHERE username='$user' AND password='$oldpassword'");
if($num==0)
{
$errors[]="Wrong password";
}
if($newpassword!==$newpassword2)
{
$errors[]="Confirmation password does not match your new password";
}
if(count($errors)==0)
{
$user=$_SESSION["user"];
$password=md5($newpassword);
$insert=mysql_query("UPDATE b_users SET password='$password' WHERE username='$user'") or mysql_error();
if(!$insert)
{
$pmsg="An error occured";
}
else
{
$pmsg="Password successfully changed";
}
header("location: settings.php?msg=$pmsg");
exit();
}
else
{
foreach($errors as $error)
{
$string.="*$error<br/>";
}
}
}
//ERROR
if($string!=" "); echo"<div class='msg'>$string</div>";
echo"<form action='#' method='POST'>
Old password:<br/><input type='text' name='oldpassword'><br/>New password:<br/><input type='text' name='newpassword'><br/>Confirm New Password:<br/><input type='text' name='newpassword2'><br/><br><center><input type='submit' name='submit' class='button' value='Update'></center><br><div class='link_button'><a href='settings.php'>Go Back</a></div>";
include "../footer.php";
?>
