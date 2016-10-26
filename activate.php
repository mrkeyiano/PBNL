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
ob_start();
require("init.php");
$action=$_GET["action"];
if($action=="resend")
{
include"header.php";
echo"<div class='button'><center>Activation</center></div>";
if($_POST["submit"])
{
$email=cleanvalues($_POST["email"]);
$username=cleanvalues($_POST["username"]);
$check=mysql_query("SELECT * FROM b_users WHERE email='$email' AND $username='$username'");
if(mysql_num_rows($check)<1)
{
$msg="This email / username does not exists in our database";
header("location: index.php?msg=$msg");
exit();
}
else
{
//PREPARE UR CODE
/*$supervalue=$value;
$day=date("U");
$seedval=$day%10000;
srand($seedval);
$key=RAND(1000000, 2000000);
//PREPARE UR MAILER
$email=$_POST["email"];
$subject="9jacliq: Account activation";
$msg="Hello, you requested for your activation details\n
To activate your account, click on the below link\n _____________________________________________________________________________\n
***ACTIVATION LINK***\n
Activation Link: $url/activate.php?email=$email&keynode=$key\n
___________________________________________________________________________\n
Thank you .This is an automated response.
PLEASE DO NOT REPLY.";
$from="Auto-Response";
$date=date("U");
$query=mysql_query("UPDATE b_users SET keynode='$key' WHERE email='$email' AND username='$username'"); mail("$email","$subject","$msg","$from");*/
$msg="Your Activation code has been mailed to $email";
header("location: index.php?msg=$msg");
exit();
}
}
echo"<ul><div class='title'><div class='center'>You are seeing this said because you have not activated your account..</div></div><div class='gap'></div>
<b>Question:</b> I Dont know how to Activate my Account.
Solution: Just login to the email address you provided during registration & check your inbox or Spam folder for your activation link<div class='gap'></div>.

<b>Question:</b> I didnt Receive an activation email. If you did'nt receive an activation email from us, it must have been an error from us.
Solution: please use the form below to resend your activation details.</ul>
<form action='#' method='POST'><ul><li><br/>
Your username(the username you used to register)<br/><input type='text' name='username'></li><li>Your email(the email you entered during registration)<br/><input type='text' name='email'></li><li><center><input type='submit' name='submit' class='button' value='Resend Activation'></form</center></li></ul>";
echo"<ul><font color='red'>Check Your email inbox or Spam folder for Your Activation email after Requesting for it</font></ul><div class='gap'></div>";
include"footer.php";
exit();
}

//GET THEM
$email=$_GET["email"];
$keynode=$_GET["keynode"];
//clean them
$email=cleanvalues($email);
$keynode=cleanvalues($keynode);
//Check if email exist
$checkquery=mysql_query("SELECT * FROM b_users WHERE email='$email' AND keynode=$keynode");
if(mysql_num_rows($checkquery)>0)
{
//Check if email has already been validated
$checkemail=mysql_query("SELECT * FROM b_users WHERE email='$email' AND validated=1");
if(mysql_num_rows($checkemail)>0)
{
$msg="This email has already been validated";
header("location: index.php?msg=$msg");
exit();
}
else
{
$update=mysql_query("UPDATE b_users SET validated='1' WHERE email='$email' AND keynode=$keynode");
if($update)
{
$msg="Your account has been validated successfully";
header("location: index.php?msg=$msg");
exit();
}
else
{
$msg="Oops ! An error occured , please try again later";
header("location: index.php?msg=$msg");
exit();
}
}
}
else
{
$msg="No such email in our database";
header("location: index.php?msg=$msg");
exit();
}

?>
