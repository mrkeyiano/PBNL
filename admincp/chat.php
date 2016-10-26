<?php
/*
Project: PBNL Forum v2.3

Coded By: Oyebamiji Akorede (Harkorede)

Facebook: http://facebook.com/harkorede94

Email: (harkorede01@gmail.com)

CellPhone +2348029828364

Twitter: @harkorede94

WebSite: http://naijamobile.in
*/
require("monit.php");
if(isset($_GET["action"]))
{
$action=$_GET["action"];
}
else
{
$action=" ";
}
if($action=="Add")
{
echo"<div class='msg'>All fields are required</div>";
if(isset($_POST["submit"]))
{
$name=$_POST["name"];
if(empty($name) || strlen($name)<4)
{
echo"<div class='center'><font color='red'><b>Please Enter Your Chatroom name</b></font></div>";
}
else
{
$name=cleanvalues($name);
$insert=mysql_query("INSERT INTO b_chatroom SET name='$name'");
if(!$insert)
{
$msg="An error occured".mysql_error();
}
else
{
$msg="Room Created successfully";
}
header("location: ?msg=$msg");
exit();
}
}
echo"<form action='?action=Add' method='POST'>";
echo"<ul><li><b>Room Name</b><br/><input type='text' name='name'></li><li><center><input type='submit' name='submit' class='button' value='Create Room'></center></li></ul></form>";
echo"<div class='title'><a href='chat.php'>Back To Chat</a></div>";
exit();
}
elseif($action=="Edit")
{
//if submit
if(isset($_POST["submit"]))
{
$id=(int)$_POST["id"];
$name=$_POST["name"];
//check values
if(empty($name) || strlen($name)<4)
{
echo"<div class='center'><font color='red'>Room name Cant be empty</font></div>";
}
else
{
$name=cleanvalues($name);
$insert=mysql_query("UPDATE b_chatroom SET name='$name' WHERE id=$id");
if(!$insert)
{
$msg=mysql_error();
}
else
{
$msg="Changes Successfully Saved";
}
header("location: ?msg=$msg");
exit();
}
}
$id=(int)$_GET["id"];
$query=mysql_query("SELECT * FROM b_chatroom WHERE id=$id");
$info=mysql_fetch_array($query);
$name=$info["name"];
$id=$info["id"];
echo"<form action='?action=Edit' method='POST'>";
echo"<ul><li><b>Room Name<b><br/><input type='text' value='$name' name='name'></li><li><input type='hidden' value='$id' name='id'></li><li><center><input type='submit' name='submit' class='button' value='Save Changes'></center></li></ul></form>";
echo"<div class='title'><a href='chat.php'>Back </a></div>";
exit();
}
elseif($action=="Delete")
{
if(isset($_GET["yes"]) & $_GET["yes"]==true)
{ $id=(int)$_GET["id"];
$query=mysql_query("DELETE FROM b_chatroom WHERE id=$id");
if($query)
{
$msg="Room Deleted Successfuly";
}
else
{
$msg=mysql_error();
}
header("location: ?msg=$msg");
exit();
}
$id=(int)$_GET["id"];
echo"<div class='topnav'>System Warning</div><div class='msg'>Are You Sure You want to Delete This Chatroom</div><div class='gap'></div><div class='button'><a href='?action=Delete&yes=true&id=$id'><font color='red'>Yes</font></a> | <div class='right'><a href='chat.php'>No</a></div></div>";
}
else
{
echo"<div class='topnav'><div class='left'><a href='chat.php?action=Add'>Create Room</a></div><div class='right'><a href='index.php'>Menu</a></div></div><div class='gap'></div><div class='center'><ul>Here You can Create New Rooms, delete or edit existing Chatrooms</ul></div>";
$msg=$_GET["msg"];
if(!empty($msg))
{
echo"<div class='msg'>$msg</div>";
}

echo"<div class='topnav'>Existing ChatRooms</div>";
$query=mysql_query("SELECT * FROM b_chatroom ORDER BY id DESC") or mysql_error();
while($info=mysql_fetch_assoc($query))
{
$name=$info["name"];
$id=$info["id"];
echo"<ul><li><b>Room Name: </b>$name</li><li><a href='?action=Edit&id=$id'>Edit</a> <div class='right'><a href='?action=Delete&id=$id'>Delete</a></li></div></ul>";
}
}
include"../footer.php";

?>
