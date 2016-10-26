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
$id=(int)$_REQUEST["id"];
if($id<1)
{
header('location: index.php');
exit();
}
$cquery=mysql_query("SELECT * FROM b_video WHERE id=$id");
if(mysql_num_rows($cquery)==0)
{
header("location: index.php");
exit();
}
$cinfo=mysql_fetch_array($cquery);
$title=$cinfo["title"];
$id=$cinfo["id"];
$description=$cinfo["description"];
$by=$cinfo["by"];
$uid=user_info($by, userID);
$url=$cinfo["url"];
$date=$cinfo["time"];
$date=date("D, d M Y", $date);
$views=$cinfo["views"]+1;
mysql_query("UPDATE b_videos SET views='$views' WHERE id=$id");
echo"<title>$config->title &raquo; Viewing $title</title>";
echo"<style type='text/css'>
<!--
.style1 {
color: #FFFFFF;
font-weight: bold;
}
.style2 {
color: #FF0000;
font-weight: bold;
}
.style3 {
font-family: Arial, Helvetica, sans-serif;
font-size: 12px;
}
.style5 {color: #FF0000; font-weight: bold; font-size: 11px; }
-->
</style>


<div class='body_width'>";
include"../topnav.php";
echo"<div class='breadcrumb'><a href='../main.php'>Home</a> &raquo; <a href='index.php'>video</a> </div>";
echo"<center>";
include"../ads.php";
fblike();

echo"</center>";
echo"<center>

<div class='public_message'><div class='success'></div></div>

</center>


<div style='margin-top: 5px;' class='grid3'>




</div>";

$ytarray=explode("/", $url);
$ytendstring=end($ytarray);
$ytendarray=explode("?v=", $ytendstring);
$ytcode=$ytendarray[1];
//echo"<div class='msg'>$ytcode</div>";
echo"<div class='grid3 middle'>
<div class='b_head'>$title</div><table width='470' border='1' align='center' cellpadding='0' cellspacing='0'>
<tr>
<td><iframe width='490' height='340' src='http://www.youtube.com/embed/$ytcode' frameboder='0' allowfullscreen></iframe></td>
</tr>
</table>";
echo"<div class='file-info'>
<ul>
<li class='first'>
<span>Title:</span> $title</li>
<li class='first'><span class='style2'> Video Description:</span> $description</li>
<li>
<span>Uploaded on:</span> $date</li>
<li>
<span>By:</span> <a href='../profile.php'><b>$by</b></a></li>
<li>
<span>Total views:</span> $views</li>
</ul>
</div>
<br>
<hr>
<br>";
echo"<div class='title'><ul><li><a href='http://sfrom.net/$url'>Download this Video In Any Format</a></li></ul></div>";
echo"<img src='$config->title/images/fb.png' width='48' height='48' /><br />
<a href='http://www.facebook.com/sharer.php' name='fb_share' class='style51' id='fb_share' type='button_count' share_url='http://?url=$url'>Share Video  on FB!</a><br>
<script src='http://static.ak.fbcdn.net/connect.php/js/FB.Share' type='text/javascript'></script><br>";
echo"<div class='gap'></div><div class='link_button'><a href='category.php?id=$catid'>Go Back</a></div>";
/*$ytarray=explode("/", $url);
$ytendstring=end($ytarray);
$ytendarray=explode("?v=", $ytendstring);
$ytcode=$ytendarray[1];
//echo"<div class='msg'>$ytcode</div>";
echo"<ul><li><iframe width='250' height='310' src='http://www.youtube.com/embed/$ytcode' frameboder='0' allowfullscreen></iframe></li></ul>";*/
include"../footer.php";
?>
