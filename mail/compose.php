<?php
ERROR_REPORTING(0);
require("../init.php");
/*
Project: PBNL Forum v2.3

Coded By: Oyebamiji Akorede (Harkorede)

Facebook: http://facebook.com/harkorede94

Email: (harkorede01@gmail.com)

CellPhone +2348029828364

Twitter: @harkorede94

WebSite: http://naijamobile.in
*/
if(!isloggedin())
{ header("location: ../index.php"); }
else {
$user=$_SESSION["user"];
}
echo"<title>$config->title &raquo; Write Message</title>";
echo"<div class='body_width'>";
include"../topnav.php";
echo"<div class='breadcrumb'><a href='../mail/index.php'>Messaging</a></div><br>";
echo"<center>";
include"../ads.php";
fblike();

echo"</center>";
echo"<center>

<div class='public_message'><div class='success'></div></div>

</center>



<div style='margin-top: 5px;' class='grid3'>




</div>";
echo"<div class='grid3 middle'>
<div class='b_head'>Compose Message</div>";
if(isset($_POST["submit"]))
{
$date=time();
$rname=cleanvalues($_POST["rname"]);
$sname=cleanvalues($_POST["sname"]);
$subject=cleanvalues($_POST["subject"]);
$message=cleanvalues($_POST["message"]);
$errors=array();
$checkreciever=get_row("SELECT * FROM b_users WHERE username='$rname'");
echo"<b>$checkreciever</b>";
if(empty($rname))
{
$errors[]="Provide a recipient";
}
if($checkreciever==0)
{
$errors[]="Provide a Valid user";
}
if(empty($subject))
{
$errors[]="provide a subject";
}
if(empty($message)||strlen($message)<4)
{
$errors[]="Your message is too short";
}
if(count($errors)==0)
{
//INSERT
$insert=mysql_query("INSERT INTO b_pms SET `reciever`='$rname', `sender`='$sname',
`subject`='$subject', `message`='$message', `date`='$date'") or mysql_erro();
if(!$insert)
{ $msg="An error occured";
}
else
{
$msg="Message Successfully sent";
}
header("location: index.php?msg=$msg");
exit();
}
else
{
foreach($errors as $error)
{
$string.="$error<br/>";
}
}
}
if($string!=" ")
{ echo"<div class='msg'>$string</div>";
}
echo"<form action='#' method='Post'>";
if(isset($_GET["rname"]))
{
$rname=$_GET["rname"];
echo"<center>To</center><li><input type='text' name='rname' value='$rname'></li><li>";
}
else
{
echo"<center>To</center><li><input type='text' name='rname'></li>";
}
echo"<center>Subject</center><li><input type='text' name='subject'></li>";
echo"<center>Message</center><li><textarea rows='5' cols='25' name='message'></textarea></li>";
echo"<br><input type='hidden' name='sname' value='$user'><center><input type='submit' class='button' name='submit' value='Send'></center><br><div class='link_button'><a href='index.php'>Go Back</a></div>";
include"../footer.php";
?>
