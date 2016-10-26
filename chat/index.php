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
{ header('location: ../index.php'); }
else
{
$user=$_SESSION["user"];
$banned=user_info($user, banned);
if($banned==1)
{
header("location: ../logout.php");
exit();
}
else
{
updateonline();
}
}
echo"<title>$config->title - Chat</title>";
echo"<div class='body_width'>";
include"../topnav.php";
echo"<div class='breadcrumb'></div>";
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
<div class='b_head'>Chat Rooms</div>";
echo"<div class='ms'><div class='chat-room-list'><font color='red'><strong><br><!-- google_afm --><br>

WARNING:</strong> </font>Please English is the only allowed language here<br>
<br>";
$query=mysql_query("SELECT * FROM b_chatroom ORDER BY id DESC");
$count=mysql_num_rows($query);
if($count>0)
{
while($row=mysql_fetch_array($query))
{
$name=cleanvalues2($row["name"]);
$id=$row["id"];
$online=mysql_num_rows(mysql_query("SELECT DISTINCT(chatter) FROM b_chatonline WHERE roomid=$id"));
//$description=$row["description"];
/*$img=$row["img"];
if(!empty($img))
{
$img="<img src='/images/$img' alt='IMG'/>";
}
else
{
$img="No Img";
}
*/
echo"<div class='chat-room-list'><a href='room.php?id=$id'><ul><li>$name ($online)</a>
</li></ul></div>
</div>";
}
}
else
{
echo"<div class='msg'><font color='red'><center>No room created yet</center></font></div><div class='gap'></div>";
}
echo"<div class='link_button'><a href='".$config->url."main.php'>Go Back</a></div>";
include"../footer.php";
?>
