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
echo"<title>$config->title &raquo; Add Videos</title>";
echo"<style type='text/css'>
<!--
.style1 {
font-family: Georgia, 'Times New Roman', Times, serif;
font-size: 12px;
}
.style5 {color: #FF0000}
-->
</style>


<div class='body_width'>";
include"../topnav.php";
echo"<div class='breadcrumb'><a href='../main.php'>Home</a>&raquo; <a href='index.php'>Videos Home</a> &raquo; Add Video</div>";
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
<div class='b_head'> Upload Videos</div>";
$errors=array();
if(isset($_POST["submit"]))
{
$url=$_POST["url"];
$cat=$_POST["cat"];
if(empty($url) || strlen($url)<5)
{
$errors[]="Your download url is too short";
}
if(empty($cat))
{
$errors[]="You must select a category";
}
if(substr($url, 0, 4) !="http")
{
$url="http://".$url;
}
if(substr($url, 7, 4) !="www.")
{
$url=str_replace('http://', 'http://www.', $url);
}
if(substr($url, 0, 31) !="http://www.youtube.com/watch?v=")
{
$errors[]="The video seems to be invalid. For now we only support video from youtube";
}
$check=mysql_num_rows(mysql_query("SELECT * FROM b_video WHERE url='$url'"));
if($check>0)
{
$errors[]="Video already Exists";
}
if(count($errors)==0)
{
require_once('youtube.php');
$url=$_POST["url"];
$date=time();
$video=video_info($url);
$thumb = $video['thumb_1'];
$title = $video['title'];
$info =$video['info'];
$info=str_replace("'", " ", $info);
$info=str_replace('"', ' ', $info);
//echo"<div class='msg'>$url $cat $title $info $thumb</div>";
$insert=mysql_query("INSERT INTO b_video SET `title`='$title', `catid`='$cat', `description`='$info', `img`='$thumb', `url`='$url', `by`='$user', `time`='$date'");
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
echo"<p class='style1'><strong>&gt;&gt;</strong> <span class='style5'>Always Upload Video into the Correct Category!</span> </p>
<ul>
<li>
";
//ERRORS
echo"<form action='#' method='POST'>
<b>Youtube Video Url (e.g </b>http://www.youtube.com/watch?v=cMonOjbEGws<b>):</b>  <br> <input type='text' name='url'></li><li><center>Select Category<br/><select name='cat'><option value='0'>--SELECT---</option>";
$query=mysql_query("SELECT * FROM b_videocat");
while($cinfo=mysql_fetch_array($query))
{
$cid=$cinfo["id"];
$cname=$cinfo["name"];
echo"<option value='$cid'>$cname</option>";
}
echo"</select></center></li><li><center><input type='submit' name='submit' value='Add' class='button'></center></li></ul></form>";
echo"<div class='link_button'><a href='index.php'>Go Back</a></div>";
include"../footer.php";
