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
$uid=cleanvalues($_GET["uid"]);
$email=cleanvalues($_GET["email"]);
$check=mysql_query("SELECT * FROM b_users WHERE email='$email' AND userID=$uid");
$info=mysql_fetch_array($check);
if(mysql_num_rows($check)>0)
{
$newpass=rand(1000000,2000000);
$newpass2=md5($newpass);
mysql_query("UPDATE b_users SET password='$newpass2' WHERE userID='$uid' AND email='$email'");
//MAILER
$from="$config->title: Password system";
$subject="Your new password";
$email=$info["email"];
$message="This is now your new password on $config->title\n
____________________\n Password: $newpass\n
Note: You can as well change the password to what suits you from your control panel\n
____________________
Regards, $config->title team";
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
//echo"$config->title";
?>
