<?php
/*
Project: PBNL Forum v2.3

Coded By: Oyebamiji Akorede (Harkorede)

Facebook: http://facebook.com/harkorede94

Email: (harkorede01@gmail.com)

CellPhone +2348029828364

Twitter: @harkorede94

WebSite: http://naijamobile.in
*/
require("monit.php");
echo "<title>$config->title &raquo; Admin Panel</title>";
echo "<div class='msg'>Welcome to  <b>$config->title Admin Panel v2.3 Designed by <a href=\"http://fb.me/harkorede94\">Harkorede</a></b></div><br/>";
if(!isloggedin())
{ header('location: ../index.php');
exit(); } echo "<div class='b_head'>Admin Menu</div><br/>"; $msg=$_GET["msg"];
if(!empty($msg))
{ echo"<div class='msg'>$msg</div>"; } echo "<div class='user-info'><ul><li><a href='updates.php'>Updates</a></li><li><a href='user.php?action=pm'>Global Pm</a></li><li><a href='user.php'>Manage Users</a></li><li><a href='chat.php'>Manage Chatrooms</a></li><li><a href='forum.php'>Manage Forums</a></li><li><a href='tutorials.php'>Manage Tutorial</a></li><li><a href='updatesl.php'>Manage All updates</a></li><li><a href='uploads.php'>Manage Downloads</a></li><li><a href='jamz.php'>Music Zone</a></li><li><a href='videos.php'>Video Management</a></li><li><a href='films.php'>Pc Videos</a></li></ul></div>";
echo"<div class='link_button'><a href='../member/index.php'>Back to Main Site</a></div>";
include"../footer.php";
?>
