<?php
ERROR_REPORTING(0);

/*
       FOR FREE ASSISTANCE CONTACT ME VIA:

       Coded By: Ayomide Segz Homezone

       Facebook: http://www.facebook.com/homezonecheat

       Email: (homezonic@gmail.com)

       CellPhone +2348094662304 

       Twitter: @homezonic

       WebSite: if i hear?
*/
require("../init.php");
if(!isloggedin())
{
header('location: ../index.php');
exit();
}
else
{
$user=$_SESSION["user"];
$level=user_info($user, level);
if($level==2)
{
updateonline();
}
else
{
header('location: ../index.php');
exit();
}
}
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
echo"<div class='msg'>Please all fields are required</div>";
if(isset($_POST["submit"]))
{
$prefix=$_POST["prefix"];
$title=$_POST["title"];
$url=$_POST["url"];
if(empty($prefix) || empty($title) || empty($url) || strlen($prefix)<4 || strlen($title)<4  || strlen($url)<4)
{
echo"<div class='center'><font color='red'><b>Your title or url field is empty</b></font></div>";
}
else
{
$prefix=cleanvalues($prefix);
$title=cleanvalues($title);
$url=cleanvalues($url);
$insert=mysql_query("INSERT INTO b_updates SET title='$title', url='$url'");
if(!$insert)
{
$msg="An error occured".mysql_error();
}
else
{
$msg="Update successfully Added";
}
header("location: ?msg=$msg");
exit();
}
}
echo"<form action='?action=Add' method='POST'>";
echo"<ul><li><b>Update Title:</b><br/><textarea name='title'></textarea></li><li><b>Update Url:</b><br/><input type='text' name='url'></li><li><center><input type='submit' name='submit' class='button' value='Add Updates'></center></li></ul></form>";
echo"<div class='title'><a href='updates.php'>Back To Updates</a></div>";
exit();
}
elseif($action=="Edit")
{
//if submit
if(isset($_POST["submit"]))
{
$id=(int)$_POST["id"];
$title=$_POST["title"];
$url=$_POST["url"];
//check values
if(empty($title) || empty($url) || strlen($url)<4 || strlen($title)<4)
{
echo"<div class='center'><font color='red'>Your title or url is empty</font></div>";
}
else
{
$title=cleanvalues($title);
$url=cleanvalues($url);
$insert=mysql_query("UPDATE b_updates SET title='$title', url='$url' WHERE id=$id");
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
$query=mysql_query("SELECT * FROM b_updates WHERE id=$id");
$info=mysql_fetch_array($query);
$title=$info["title"];
$url=$info["url"];
$id=$info["id"];
echo"<form action='?action=Edit' method='POST'>";
echo"<ul><li><b>Update Title<b><br/><textarea name='title'>$title</textarea></li><li>Update Url<br/><input type='text' name='url' value='$url'></li><li><input type='hidden' value='$id' name='id'></li><li><center><input type='submit' name='submit' class='button' value='Save Changes'></center></li></ul></form>";
echo"<div class='title'><a href='updates.php'>Back Updates</a></div>";
exit();
}
elseif($action=="Delete")
{
$id=(int)$_GET["id"];
$query=mysql_query("DELETE FROM b_updates WHERE id=$id");
if($query)
{
$msg="Deleted Successfuly";
}
else
{
$msg=mysql_error();
}
header("location: ?msg=$msg");
exit();
}
else
{
echo"<div class='topnav'><div class='left'><a href='updates.php?action=Add'>Add update</a></div><div class='right'><a href='index.php'>Menu</a></div></div><div class='gap'></div><div class='center'><ul>Here You can add new update, delete or edit existing updates</ul></div>";
$msg=$_GET["msg"];
if(!empty($msg))
{
echo"<div class='msg'>$msg</div>";
}

echo"<div class='topnav'>Existing Updates</div>";
$query=mysql_query("SELECT * FROM b_updates ORDER BY id DESC") or mysql_error();
while($info=mysql_fetch_assoc($query))
{
$title=$info["title"];
$url=$info["url"];
$id=$info["id"];
echo"<ul><li><b>Title: </b>$title</li><li><b>URL:</b> $url</li><li><a href='?action=Edit&id=$id'>Edit</a> <div class='right'><a href='?action=Delete&id=$id'>Delete</a></li></div></ul>";
}
}
include"../footer.php";

?>
