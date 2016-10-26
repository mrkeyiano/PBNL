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
include('monit.php'); echo "<title>$config->title &raquo; Moderator Cp</title>";
if(!isloggedin())
{ header('location: ../index.php');
exit(); } echo"<div class='msg'>Welcome to <b>$config->title Moderator Panel v2.3 Designed by <a href=\"http://fb.me/harkorede94\">Harkorede</a></b></div>";
echo"<br><div class='b_head'>Moderator Menu</div><br><div class='user-info'><ul><li><a href='user.php'>Manage Users</a></li><li><a href='chat.php'>Manage Chatroom</a></li><li><a href='forum.php'>Manage Forums</a></li><li><a href='uploads.php'>Manage Downloads</a></li><li><a href='mupload.php'>Upload Music</a></li><li><a href='musics.php'>Music Zone</a></li><li><a href='films.php'>PC Videos</a></li><li><a href='videos.php'>Mobile Videos</a></li></ul>";
echo"<div class='link_button'><a href='../member/index.php'>Back to Main Site</a></div></div>";
include "../footer.php";
?>
