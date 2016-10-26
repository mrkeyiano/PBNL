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
echo"<title>$config->title &raquo; Uploads</title>";
echo"<style type='text/css'>

<!--

.style1 {

color: #FF0000;

font-weight: bold;

}

.style2 {color: #FF0000}

-->

</style>

<div class='body_width'>";
include"../topnav.php";
echo"<div class='breadcrumb'><a href='../member/index.php'>Home</a> &raquo; Uploads</div>";
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




</div>
";
echo"<div class='grid3 middle'>
<div class='b_head'>
Upload & Download Zone
</div>
<br>
<span class='style2'>Enjoy the Best of Our Download Zone! Its Truly Loaded.</span>
<br>
<br>

";
echo"<div class='list'>  <ul>    <li><img src='".$config->url."addons/dload/upload-icon.png' width='16' height='16'> <a href='upload.php'>Upload file</a></li><li><img src='".$config->url."addons/dload/download-icon.png' width='16' height='16'> <a href='index2.php'>Download Here</a></li><li><img src='".$config->url."addons/dload/search.gif' width='16' height='16' border='0'> <a href='search.php'>Search For Files</a></li></ul></div> ";
echo"<br /><div class='link_button'><a href='".$config->url."main.php'>Go Back</a></div>";
include"../footer.php";
?>
