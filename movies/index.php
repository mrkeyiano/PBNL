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
echo"<title>$config->title - Videos</title>";

echo"<div class='body_width'>";
include"../topnav.php";
echo"<div class='breadcrumb'><a href='../main.php'>Home</a>&raquo; Videos</div>";
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
<div class='b_head'>$config->title Videos DOWNLOAD PORTAL</div>";
echo"<p class='style1'> The Official Portal for Videos! Your are Free to Upload &amp; Download Videos here! </p>";
echo"<div class='list'><ul>
<li> <a href='index1.php'><div class='button'><img src='".$config->url."addons/dload/download-icon.png' width='16' height='16' /> Play + Download Video</div></a></li>
<li><img src='".$config->url."addons/dload/upload-icon.png' width='16' height='16' /> <a href='upload.php'>Upload Your Videos</a></li>
<li><img src='".$config->url."addons/dload/request-icon.png' width='16' height='16' /> <a href='../forum/showtopic.php?id=15'>Request For Video here</a></li>
<li><img src='".$config->url."addons/dload/search.gif' width='16' height='16' /> <a href='search.php'>Search For Videos Here</a></li></ul></div>";
include"../footer.php";
?>
