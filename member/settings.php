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
{ header("location: ../index.php");
} else { $user=$_SESSION["user"]; }
echo"<title>$config->title &raquo; Profile Settings</title>";
echo"<div class='body_width'>";
include "../topnav.php";
echo"<div class='breadcrumb'></div>";
echo"<center>";
include "../ads.php";
fblike();
echo"</center>";
echo"<center>

<div class='public_message'><div class='success'></div></div>

</center>";
//ERROR HERE
$msg=$_GET["msg"];
if($msg!==" ")
{
echo"<div class='msg'>$msg</div>";
}

echo"
<div style='margin-top: 5px;' class='grid3'>




</div>";
echo"<div class='grid3 middle'>
<div class='b_head'>Profile Settings</div><br><div class='list'>   <ul>  <li><a href='edit_profile.php'>Edit Profile Details</a></li>   <li><a href='upload_photo.php'>Upload Profile Picture</a></li>   <li><a href='change_access.php'>Change Password</a></li></li></ul></div><div class='link_button'><a href='index.php'>Go Back</a></div>";
include "../footer.php";
?>
