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
$id=(int)$_REQUEST["id"];
if($id<1)
{
header('location: index.php');
exit();
}
$cquery=mysql_query("SELECT * FROM b_upload WHERE id=$id");
if(mysql_num_rows($cquery)==0)
{
header("location: index.php");
exit();
}
$cinfo=mysql_fetch_array($cquery);
$name=$cinfo["name"];
$id=$cinfo["id"];
$description=$cinfo["description"];
$by=$cinfo["by"];
$date=$cinfo["date"];
$date=date("D, d M Y", $date);
$extension=$cinfo["extension"];
$downloads=$cinfo["downloads"];
$views=$cinfo["views"]+1;
mysql_query("UPDATE b_upload SET views='$views'");
$size=$cinfo["size"];
$size=get_size($size);
$catid=$cinfo["catid"];
$catinfo=mysql_fetch_assoc(mysql_query("SELECT name FROM b_uploadcat WHERE id='$catid'"));
$catname=$catinfo["name"];
echo"<title>$config->title &raquo; viewing $name</title>";
echo"<style type='text/css'>
<!--
.style1 {
color: #FF0000;
font-weight: bold;
}
.style2 {
color: #FFFF00;
font-family: Arial, Helvetica, sans-serif;
font-size: 13px;
}
.style5 {font-family: Arial, Helvetica, sans-serif; color: #FF0000;}
.style6 {
font-family: Arial, Helvetica, sans-serif;
font-size: 12px;
}
-->
</style>

<div class='body_width'>";
include"../topnav.php";
echo"<div class='breadcrumb'><a href='../main.php'>Home</a> &raquo; <a href='index.php'>uploads</a> &raquo; $name</div>";
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
<div class='b_head'>File &raquo; $name</div>";
echo"<div class='file-info'>
<div class='download_button'><a href='download.php?id=$id'><center>Download this App Here</center></a></div><ul>
<li class='first'>
<b><span>Name: $name</li><li><span class='style1'>Description:</span> $description</li><li>Uploaded on: $date</li><li>By: $by</li><li>Category: $catname</li><li>Size: $size</li><li>Extension: $extension</li><li>Total views: $views</li><li>Total Downloads: $downloads</li></ul></span></li></li></ul></div>";
echo"<div class='link_button'><a href='category.php?id=$catid'>Go Back</a></div>";

include"../footer.php";
?>
