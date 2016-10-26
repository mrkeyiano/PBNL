<?php
ERROR_REPORTING(0);
require("../init.php");
/*
Project: PBNL Forum v2.3

Coded By: Oyebamiji Akorede (Harkorede)

Facebook: http://facebook.com/harkorede94

Email: (harkorede01@gmail.com)

CellPhone +2348029828364

Twitter: @harkorede94

WebSite: http://naijamobile.in
*/
if(!isloggedin())
{

}
else
{
$user=$_SESSION["user"];
}
echo"<title>$config->title &raquo; Music Zone</title>";
echo"<style type='text/css'>
<!--
.style1 {
color: #FF0000;
font-weight: bold;
}
.style2 {font-size: 13px}
-->
</style>


<div class='body_width'>";
include"../topnav.php";

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




</div> ";
echo"<div class='grid3 middle'>

<div class='b_head'>MUSIC SECTIONS</div><br>";
echo"<span class='style1'>-</span> <span class='style2'>Click on any Category you want to Download or Listen to Music From!</span><br>
<br>";
if($level>0)
{
echo"<div  class='link_button'><a href='upload.php' style='color:white'><font color='white'>Add Music</font></a></div><br /> <br />";
}
$query=mysql_query("SELECT * FROM b_musiccat ORDER BY id ASC");
$count=mysql_num_rows($query);
if($count>0)
{
while($row=mysql_fetch_array($query))
{
$name=$row["name"];
$id=$row["id"];
//$description=$row["description"];
$img=$row["img"];
$img="<img src='../addons/music/$img' alt='IMG'border='0' height='48' width='48'>";
echo"<div class='list'>
<ul><li><a href='category.php?id=$id'>$img<br/>$name</a></center><br/></li></ul>
</div>

";
}
}
else
{
echo"<div class='msg'><font color='red'><center>No category created yet</center></font></div><div class='gap'></div>";
}
echo"<div class='link_button'><a href='../main.php'>Go Back</a></div>";
include"../footer.php";
?>
