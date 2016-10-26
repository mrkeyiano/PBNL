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
require("../init.php");
if(!isloggedin())
{
header("location: ../index.php");
}
else
{
$user=$_SESSION["user"];
}
echo"<title>$config->title &raquo; Sent Messages </title>";

echo"<div class='body_width'>";
include"../topnav.php";
echo"<div class='breadcrumb'><a href='index.php'>Messaging</a> </div><br>";
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
<div class='b_head'>Outbox</div>";
$pmquery=mysql_query("SELECT * FROM b_pms WHERE sender='$user' ORDER BY id DESC");
$pmcount=mysql_num_rows($pmquery);
if($pmcount==0)
{
echo"<div class='msg'><strong><br>You do not have any sent messages<br></strong></div>";
}
else
{
while($pminfo=mysql_fetch_array($pmquery))
{
$pmid=$pminfo["id"];
$reciever=$pminfo["reciever"];
$subject=$pminfo["subject"];
$date=$pminfo["date"];
$date=date("D d M, Y", $date);
$sid=user_info($reciever, userID);
echo"<ul class='message-list'>    <li><a href='view.php?ref=outbox&id=$pmid'><img src='../old.gif' alt='old' border='0' /> Re: $subject</a> <br>to <a href='../profile.php?uid=$sid'>$reciever</font></a> @ $date</font></li><div class='gap'></div></ul>";
}
}
echo"<br><div class='link_button'><a href='index.php'>Go Back</a></div>";
include"../footer.php";
