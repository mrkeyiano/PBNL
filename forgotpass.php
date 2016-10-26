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
echo"<title> $config->title &raquo; Forgot Password </title>";
if(isset($_POST["submit"]))
{
$email=$_POST["email"];
$username=$_POST["username"];
//check details
$query=mysql_query("SELECT * FROM b_users WHERE email='$email' AND username='$username'");
$info=mysql_fetch_array($query);
if(mysql_num_rows($query)==1)
{//PREPARE UR MAILER
$email=$_POST["email"];
$uid=$info["userID"];
$from="Auto- Response";
$subject="$config->title Password Retriever";
$message="Please click on the link below to get your new password
________________________
Link: ".$config->url."retrievepass.php?uid=$uid&email=$email
__________This is an automated response, PLEASE DO NOT REPLY THIS MESSAGE";
mail("$email","$subject","$message","$from");
$msg="Your new password has been sent to $email";
header("location: index.php?msg=$msg");
exit();
}
else
{
$msg="User not found";
header("location: index.php?msg=$msg");
}
}
?>
<style type="text/css">
<!--
.style1 {
color: #FF0000;
font-size: 12px;
}
-->
</style>
<div class="body_width">
<div class="page_wrapper clearfix">
<div class="middle">
<br>
<p class="b_head" style="margin-left: 3px; text-align:center;">Retrieve Password</p>
<div class="m_signup">
<center>
<p>		  </p>
<p class="style1">Check your Email Inbox or Spam Folder for your Password after Submission! </p>
<form action='#' method='POST'>
<li>Your Email:<br/><input type='text' name='email'></li><li>Your Username:<br/>
<input type='text' name='username'></li><li>
<center><br><input type='submit' name='submit' class='button' value='Retrieve Password'><center></li></ul></form><p><a href="index">Go Back to Homepage</a>          </p>
<style type="text/css">
<!--
.style8 {
font-family: Georgia, "Times New Roman", Times, serif;
font-size: 12px;
}
-->
</style>
<?php include"footer.php"; ?>
