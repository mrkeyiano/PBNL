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
$user=$_SESSION["user"];
}
$id=(int)$_REQUEST["id"];
if($id<1)
{
header('');
exit();
}
$cquery=mysql_query("SELECT * FROM b_music WHERE id=$id");
if(mysql_num_rows($cquery)==0)
{
header();
exit();
}
$cinfo=mysql_fetch_array($cquery);
$name=$cinfo["title"];
$id=$cinfo["id"];
$by=$cinfo["by"];
$date=$cinfo["time"];
$date=date("D, d M Y", $date);
$format=$cinfo["format"];
$downloads=$cinfo["downloads"];
$url=$cinfo["url"];
$img=$cinfo["img"];
$uid=user_info($by, userID);
$comment=$cinfo["comment"];
$views=$cinfo["views"]+1;
mysql_query("UPDATE b_music SET views='$views'");
echo"<title>$config->title &raquo; music | $name</title>";
echo"<style type='text/css'>
<!--
.style3 {
font-family: verdana, Arial, Helvetica, sans-serif;
font-size: 12px;
}
.style4 {
color: #FF0000;
font-weight: bold;
}
-->
</style>

<div class='body_width'>";
include"../topnav.php";
echo"<div class='breadcrumb'>Back to  <a href='index.php'>Music categories</a> </div>";
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
<div class='b_head'> $name</div>";
echo"<div class='file-info'>
<div class='download_button'><a href='download.php?id=$id'><center> DOWNLOAD NOW </center></a></div><div align='center'><a name='fb_share'></a>

<script src='http://static.ak.fbcdn.net/connect.php/js/FB.Share'

type='text/javascript'>

</script></div><br><center><img src='$img' width='200' height='200' border='0' /></center>
<br>

<b>
<ul>
<li class='first'>

<span>Name: $name</li><li>Uploaded on: $date</li><li>By: <a href='../profile.php?uid=$uid'>$by</a></li><li>Music Comment: $comment</li><li>Format: $format</li><li>Total views: $views</li><li>Total Downloads: $downloads</li></ul></div>";
echo"<br><div class='link_button'><a href='index.php'>Go Back</a></div>";
include"../footer.php";
?>
