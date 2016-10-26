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
echo"<title>$config->title &raquo; Music</title>";
echo"<style type='text/css'>
<!--
.style1 {color: #FF0000}
.style2 {
font-family: Arial, Helvetica, sans-serif;
font-size: 12px;
}
-->
</style>

<div class='body_width'>";
include"../topnav.php";
echo "<div class='breadcrumb'><a href='../member/index.php'>Home</a> &raquo; Music</div>";
$msg=cleanvalues2($_GET["msg"]);
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
<div class='b_head'>NAIJA MUSIC DOWNLOAD PORTAL</div>";
echo"<p class='style1'> The Official Portal for Naija Music! Your are Free to Upload &amp; Download Music here! </p>";
echo"<div class='list'><ul>
<li> <a href='index2.php'><div class='button'>Play + Download Music</div></a></li><li><img src='".$config->url."images/download_icon.gif' width='16' height='16'> <a href='upload.php'>Upload Your Music</a></li><li><img src='".$config->url."images/request.png' width='16' height='16' border='0'> <a href='../forum/showtopic.php?id=15'>Request For Music here</a></li><li><img src='".$config->url."images/search.png' width='16' height='16' border='0'> <a href='search.php'>Search For Musics Here</a></li></ul></div>";
include"../footer.php";
?>
