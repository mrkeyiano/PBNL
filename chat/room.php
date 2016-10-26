<?php
/*
Project: PBNL Forum v2.3

Coded By: Oyebamiji Akorede (Harkorede)

Facebook: http://facebook.com/harkorede94

Email: (harkorede01@gmail.com)

CellPhone +2348029828364

Twitter: @harkorede94

WebSite: http://naijamobile.in
*/require("../init.php");
if(!isloggedin())
{ header("location: ../index.php"); }
else { $user=$_SESSION["user"];
$level=user_info($user, level);
}
$id=(int)$_REQUEST["id"];
$check=mysql_query("SELECT * FROM b_chatroom WHERE id=$id");
if(mysql_num_rows($check)==0)
{
header("location: index.php");
exit();
}
$rinfo=mysql_fetch_assoc($check);
$roomid=$rinfo["id"];
$roomname=$rinfo["name"];
$timeout=time()-100;
$time=time();
//$ctimeout=$ctimenow-$ctimeto;
mysql_query("DELETE FROM b_chatonline WHERE chatter='$user'");
$insert=mysql_query("INSERT INTO b_chatonline SET time='$time', chatter='$user', roomid='$roomid'");
if(!$insert)
{
mysql_query("UPDATE b_chatonline SET time='$time', chatter='$user', roomid='$roomid'");
}
mysql_query("DELETE FROM b_chatonline WHERE time<'$timeout'");
if($_GET["act"]=="del")
{
$mid=(int)$_GET["mid"];
mysql_query("DELETE FROM b_chat WHERE id=$mid");
}
/*$link="<a href='?cat=del'>[x]</a>";
$link2=($level>0) ? $link : ' ';*/
echo"<title>$config->title - Chat - $roomname</title>";
echo"<style type='text/css'>
<!--
.style2 {color: #FFFF00}
-->
</style><div class='body_width'>";
include"../topnav.php";
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
<div class='b_head'>$roomname</div>";echo"<div class='style2'><a href='room.php?id=$roomid'>Refresh</a></div><div class='gap'></div>";
$onlinequery=mysql_query("SELECT DISTINCT * FROM b_chatonline WHERE roomid=$roomid");
echo"<ul><li><select><option>PEOPLE PRESENTLY IN ROOM</option>";
while($row=@mysql_fetch_array($onlinequery))
{
$chatter=$row["chatter"];
echo"<option>$chatter</option>";
}
echo"</select></li></ul>";
$query=mysql_query("SELECT * FROM b_chat WHERE roomid=$roomid ORDER BY id DESC LIMIT 10");
while($info=mysql_fetch_array($query))
{
$chatter=cleanvalues2($info["chatter"]);
$message=cleanvalues2($info["message"]);
$message=bbcode($message);
$message=smiley($message); $time=$info["time"];
$time=date("H:i", $time);
$uid=user_info($chatter, userID);
$mid=$info["id"];
echo"<div class='chat-list'><ul><li><a href='../profile.php?uid=$uid'><b>$chatter</b></a> ($time)</li><li>$message</li></div>";
if($level>0)
{
echo"<a href='?act=del&mid=$mid&id=$id'><font color='red'>DELETE</font></a></ul>";
}
else
{
echo"</li></ul>";
}
}
//ERROR
if(isset($_POST["submit"]))
{
$message=$_POST["message"];
$user=$_SESSION["user"];
$time=time();
if(empty($message) || strlen($message)<4)
{
echo"<div class='msg'>Hey bro.. Your message is too short</div>";
}
else
{
$update=mysql_query("INSERT INTO b_chat SET chatter='$user', message='$message', time='$time', roomid='$roomid'");
header("location: room.php?id=$roomid");
}
}
echo"<div class='title'><center>Post Message</center></div><br/><form action='room.php?id=$roomid' method='POST'><ul><li><textarea name='message'></textarea></li><center><input type='submit' name='submit' value='SEND' class='button'></li></ul>";
echo"<br /> <br /><div class='link_button'><a href='index.php'>Go Back</a></div>";
include"../footer.php";
?>
