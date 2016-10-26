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
{ header("location: ../index.php"); }
else { $user=$_SESSION["user"]; }
$level=user_info($user, level);
if($level==0)
{ echo"<title>Forbidden</title>";
echo"<div class='msg'><font color='red'>You dont have this permission</font></div>";
include"../footer.php";
exit();
}
include"../topnav.php";
$action=$_GET["action"];
if($action=="lock")
{
$id=(int)$_GET["id"];
$query=mysql_query("SELECT * FROM b_tutorialtopics WHERE id=$id");
if(mysql_num_rows($query)==0)
{
echo"<div class='msg'><font color='red'>invalid tutorial</font></div>";
}
else
{
$query=mysql_query("UPDATE b_tutorialtopics SET locked=1 WHERE id=$id");
$msg="Topic Successfully Locked";
header("location: showtopic.php?id=$id&amsg=$msg");
exit();
}
}

if($action=="edittopic") {  if(isset($_POST["submit"])) {
$id=$_POST["id"];
$subject=cleanvalues($_POST["subject"]); $title=cleanvalues($_POST["title"]); if(empty($title) || strlen($title)<4 || empty($subject) || strlen($subject)<4) { echo"<div class='msg'>Please make sure you entered message title and message and it must be greater than four characters</div>"; } else {
//$date=time();
mysql_query("UPDATE b_tutorialtopics SET `subject`='$subject', `title`='$title' WHERE id=$id") or die(mysql_error()); $msg="Saved successfuly"; header("location: showtopic.php?id=$id&amsg=$msg"); exit(); } }
$id=(int)$_GET["tid"];
$info=mysql_fetch_assoc(mysql_query("SELECT * FROM b_tutorialtopics WHERE id=$id"));
$subject=cleanvalues2($info["subject"]); $title=cleanvalues2($info["title"]); echo"<form action='?action=edittopic' method='POST'><ul><li>Topic Title<br/><input type='text' name='title' value='$title'></li><input type='hidden' name='id' value='$id'><li>Message<br/><textarea name='subject'>$subject</textarea></li><li><center><input type='submit' name='submit' value='Save Changes' class='button'></center></li></ul></form>";
exit();
}
elseif($action==movetopic)
{
if(isset($_POST["submit"]))
{
$id=(int)$_POST["id"];
$finfo=mysql_fetch_assoc(mysql_query("SELECT * FROM b_tutorialcat WHERE id=$id"));
$name=$finfo["name"];
$tid=(int)$_POST["tid"];
mysql_query("UPDATE b_tutorialtopics SET catid='$id' WHERE id=$tid") or die(mysql_error());
$msg="Topic moved to <b>$name</b> Category successfully";
header("location: index.php?msg=$msg");
exit();
}
else
{
$tid=(int)$_GET["tid"];
echo"<div class='msg'>Are You Sure You Want to Move This Topic ?</div>";
echo"<form action='?action=movetopic' method='POST'><ul><li>Move to....<br/><select name='id'>";
$query=mysql_query("SELECT * FROM b_tutorialcat");
while($row=mysql_fetch_assoc($query))
{
$cname=$row["name"];
$id=$row["id"];
echo"<option value='$id'>$cname</option>";
}
echo"</select></li><input type='hidden' name='tid' value='$tid'><li><input type='submit' name='submit' class='button' value='Move'></li></ul></form>";
}
exit();
}
elseif($action=="delete")
{
$id=(int)$_GET["id"];
$query=mysql_query("SELECT * FROM b_tutorialreplies WHERE id=$id");
if(mysql_num_rows($query)==0)
{
echo"invalid reply";
}
else
{
$delete=mysql_query("DELETE FROM b_tutorialreplies WHERE id=$id");
$tid=$_GET["tid"];
$msg="Post Successfully Deleted";
header("location: showtopic.php?id=$tid&amsg=$msg");
exit();
}
}
elseif($action=="edit")
{
print"<title>$config->title -- Edit Post</title>";
//include"../topnav.php";
If(isset($_POST['update']))
{
$tid=$_POST["tid"];
$id=$_POST["id"];
$message=cleanvalues($_POST["message"]);
if(empty($message)||strlen($message)<4)
{
echo"<div class='msg'>Message Can not be blank</div>";
}
else
{
$query=mysql_query("UPDATE b_tutorialreplies SET message='$message' WHERE id=$id");
$msg="Post successfully updated";
header("location: showtopic.php?id=$tid&amsg=$msg");
exit();
}
}
else
{
$tid=(int)$_GET["tid"];
$id=$_GET["id"];
$info=mysql_fetch_array(mysql_query("SELECT * FROM b_tutorialreplies WHERE id=$id"));
$message=$info["message"];
$author=$info["poster"];
echo"<form action='?action=edit' method='POST'><div class='title'>Editing Post By $author</div><input type='hidden' name='id' value='$id'><input type='hidden' name='tid' value='$tid'><ul><li><textarea name='message' rows='10' cols='30'>$message</textarea></li><li><center><input type='submit' name='update' class='button' value='Save Changes'></center></li></ul>";
include"../footer.php";
exit();
}}

if($action=="unlock")
{
$id=(int)$_GET["id"];
$query=mysql_query("SELECT * FROM b_tutorialtopics WHERE id=$id");
if(mysql_num_rows($query)==0)
{
echo"<div class='msg'><font color='red'>invalid Tutorial</font></div>";
}
else
{
$query=mysql_query("UPDATE b_tutorialtopics SET locked=0 WHERE id=$id");
$msg="Topic Unlocked Successfully";
header("location: showtopic.php?id=$id&amsg=$msg");
exit();
}
}
else
{
echo"<div class='msg'><font color='red'>HOW DID YOU GET HERE</red></div>";
}
?>
