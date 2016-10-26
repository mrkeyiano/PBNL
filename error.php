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
require("init.php");
echo"<title>$config->title &raquo; Error</title>";
echo"<style type='text/css'>
<!--
.style1 {
color: #FF0000;
font-family: Arial, Helvetica, sans-serif;
font-size: 12px;
}
.style2 {font-size: 12px; font-family: Arial, Helvetica, sans-serif;}
.style3 {color: #000000}
-->
</style>
<div class='page_wrapper'>
<div class='body_width'>";

echo"<center>";
include"ads.php";
fblike();

echo"</center>";
echo"<center>



<div class='public_message'><div class='success'></div></div>

</center>



<div style='margin-top: 5px;' class='grid3'>



</div>";
echo"<div class='grid3 middle'>
<div class='b_head'>ERROR</center></div>";

echo"<p>
<h4>SORRY, THE PAGE YOU WERE LOOKING FOR WAS NOT FOUND ON OUR SERVER.</h4>
It might be that you followed a dead link or the page never existed on this server.
<br /> <br />Please <a href='../index.php' title='Login'> LOGIN </a> or if you are not yet a member,
<a href='../register.php' title='REGISTER'> REGISTER </a>. And search through the site manually for the page you were looking for.
</p>";
echo"<p><h5> HERE ARE SUGGESTIONS OF SECTIONS THAT MIGHT RELATED TO WHAT YOU WERE SEARCHING FOR</h5>
<div class='b_head'><font color='white'><a href='".$config->url."music' title='MUSIC' style='color:white'> MUSIC DOWNLOADS </a> |
<a href='".$config->url."movies' title='VIDEOS' style='color:white'> VIDEO DOWNLOADS </a> |
<a href='".$config->url."forum' title='FORUM' style='color:white'> FORUM </a> |
<a href='".$config->url."tutorials' title='TUTORIALS' style='color:white'> TUTORIALS </a>
</font>
</div>
</p>";
include"footer.php";
?>
