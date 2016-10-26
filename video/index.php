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
} else { $user=$_SESSION["user"]; }
echo"<title>$config->title &raquo; Videos</title>";
echo"<div class='body_width'>";
include"../topnav.php";
echo"<div class='breadcrumb'><a href='../main.php'>Home</a>&raquo; Videos</div>";
$msg=$_GET["msg"];
if(!empty($msg))
{
echo"<div class='msg'>$msg</div>";
}
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
<div class='b_head'>Videos</center></div>";
echo"<div class='list'>
<ul>
<li><a href='upload.php'>Add Video</a></li><li><a href='category.php'>Watch & Download Videos</a></li><li><a href='search.php'>Search For Videos</a></li></ul>
</div><br>Guruszanga Video Section is Powered By<strong>:</strong><br>
<img src='".$config->url."/images/youtube_icon_video.png' width='64' height='64' alt='Youtube'><br>
<br>";
include"../footer.php";
?>
