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
echo"<title>$config->title &raquo; Downloads</title>";
echo"<style type='text/css'>
<!--
.style2 {
color: #FF0000;
font-weight: bold;
}
-->
</style>


<div class='body_width'>";
include"../topnav.php";
echo"<div class='breadcrumb'><a href='../main.php'>Home</a> &raquo; Downloads</div>";
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
<div class='b_head'>File Download Category</div>";
echo"<br>
<img src='".$config->url."images/software_installer.png' width='64' height='64'><ul>Looking for any Game or software? dont look further, search for it <a href='search.php'><font color='red'><b>Here</b></font></a><br></ul>";
$query=mysql_query("SELECT * FROM b_uploadcat ORDER BY id DESC");
$count=mysql_num_rows($query);
if($count>0)
{
while($row=mysql_fetch_array($query))
{
$name=$row["name"];
$id=$row["id"];
//$description=$row["description"];
$img=$row["img"];
if(!empty($img))
{
$img="<img src='/images/$img' alt='IMG'border='0' height='35' width='35'/>";
}
else
{
$img="No Img";
}
echo"<ul class='file-cat-list'>
<li><a href='category.php?id=$id'>$img<br/><b>$name</b></a></li>";
}
}
else
{
echo"<div class='msg'><font color='red'><center>No category created yet</center></font></div><div class='gap'></div>";
}
echo"<br>
<div class='link_button'><a href='../main.php'>Go Back</a></div>";
include"../footer.php";
?>
