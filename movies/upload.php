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
echo"<title>$config->title - Add Videos</title>";

echo"<div class='body_width'>";
include"../topnav.php";
echo"<div class='breadcrumb'><a href='../member/index.php'>Home</a> &raquo; <a href='index.php'>Video Home</a> &raquo; Add Video</div><br>";
echo"<center>";
include"../ads.php";
fblike();

echo"</center>";
echo"<center>

<div class='public_message'><div class='success'></div></div>

</center>


<div style='margin-top: 5px;' class='grid3'>




</div>";
echo"
<div class='grid3 middle'>   <div class='b_head'> Upload Video</div>";
$errors=array();
if(isset($_POST["submit"]))
{$link=cleanvalues($_POST["link"]);
$cat=cleanvalues($_POST["cat"]);
$img=cleanvalues($_POST["img"]);
$comment=cleanvalues($_POST["comment"]);
$title=cleanvalues($_POST["title"]);
if(empty($title) || strlen($title)<4)
{
$errors[]="Your title is too short";
}
if(empty($comment) || strlen($comment)<4)
{
$errors[]="Your comment is too short";
}
if(empty($cat))
{
$errors[]="You must select a category";
}
$check=mysql_num_rows(mysql_query("SELECT * FROM b_movies WHERE title='$title'"));
if($check>0)
{
$errors[]="Video already Exists";
}
if(count($errors)==0)
{
$user=$user;
$date=time();
$insert=mysql_query("INSERT INTO b_movies SET `title`='$title', `comment`='$comment', `catid`='$cat', `link`='$link', `img`='$img', `by`='$user', `time`='$date'");
if(!$insert)
{
$msg=mysql_error();
}
else
{
$msg="Upload successful";
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
echo"<div class='msg'>$string</div>";
}
}
echo"<div class='center'><ul><span class='style4'>Always Enter Correct Video Name or Video Title e.g, How To Jerk</span></ul></div><br>";
//ERRORS
echo"<form action='#' method='POST'><ul><li>Video title<br/><input type='text' name='title'></li><li><center>Select Category<br/><select name='cat'><option value='0'>--SELECT---</option>";
$query=mysql_query("SELECT * FROM b_moviescat");
while($cinfo=mysql_fetch_array($query))
{
$cid=$cinfo["id"];
$cname=$cinfo["name"];
echo"<option value='$cid'>$cname</option>";
}
echo"</select></center></li><li>Video Download Link<br/><input type='text' name='link'></li>
<li>Video Comment<br/><input type='text' name='comment'></li>
<li>Video Image<br/><input type='text' name='img'></li><li><center><input type='submit' name='submit' value='Add' class='button'></center></li></ul></form>";
echo"<div class='center'><ul><span class='style4'>If You dont how to upload Video to $config->title please see the below tutorial or dont upload any Video !</span></ul></div>";
echo"<br><div class='link_button'><a href='index.php'>Go Back</a></div>";
include"../footer.php";
