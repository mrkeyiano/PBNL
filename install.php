<?php
error_reporting(0);
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
?><?php
echo "<title>$config->title &raquo; Website Installation</title>";
echo "<div class=\"body_width\">";
echo "<div class=\"page_wrapper clearfix\">";
echo "<div class=\"b_head\">";
echo "$config->title Installation</div><br>";

echo "<p>Welcome to your Admin Installation Panel | Register as $config->title Site Administrator Below</p>";

if(isset($_POST['submit']))
{ $username = $_POST['username'];
$password = $_POST['password'];
$number = $_POST['phone'];
$email = $_POST['email'];
$date = date("U");
$spassword =md5($password);
$query="INSERT INTO b_users(username,password,email,validated,number,regtime,level) values('$username','$spassword','$email','1','$number','$date','2')";
$query2=mysql_query($query) or die(mysql_error());
$regmsg="You Have successfully Registered As Global Admin. Please Login now";
header("location: index.php?msg=$regmsg");
exit(); }

echo "<form method=\"post\" action=\"\">";
echo "<ul>";
echo "<li>Admin Username:- <input type=\"text\" name=\"username\" size=\"23\"></li>";
echo "<li>Admin Password:- <input type=\"password\" name=\"password\" size=\"23\"></li>";
echo "<li>Admin Phone Number:- <input type=\"text\" name=\"phone\" size=\"23\"></li>";
echo "<li>Admin Email:- <input type=\"text\" name=\"email\" size=\"23\"></li>";
echo "<li><input type=\"submit\" name=\"submit\" value=\"Submit\"></li>";
echo "</ul>";
echo "</form>";
echo "</div>";
include "footer.php";
echo "</body>";
?></html>
