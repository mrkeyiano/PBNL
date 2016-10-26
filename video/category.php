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
echo"<title>$config->title &raquo; Video Categories</title>";
echo"<div class='body_width'>";
include"../topnav.php";

echo"<div class='breadcrumb'><a href='index.php'>Home</a> &raquo; <a href='category.php'>Video Categories</a></div>";
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
<div class='b_head'>VIDEO CATEGORIES</div>";
$query=mysql_query("SELECT * FROM b_videocat ORDER BY id DESC");
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
$img="<img src='/images/$img' alt='IMG'border='0' height='64' width='64'/>";
}
else
{
$img="No Img";
}
echo"<div class='list'>
<ul>
<li><a href='video.php?id=$id'>$img<br/>$name</a></li></ul>
</div>";
}
}
else
{
echo"<div class='msg'><font color='red'><center>No category created yet</center></font></div>";
}
echo"<br><div class='link_button'><a href='index.php'>Go Back</a></div>";

include"../footer.php";
?>
