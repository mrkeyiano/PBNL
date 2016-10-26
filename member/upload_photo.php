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
if(!isloggedin()) { header("location: index.php"); }
else { $user=$_SESSION["user"]; }
echo"<title>$config->title &raquo;  Upload Profile Picture</title>";
echo"<div class='body_width'>";
include "../topnav.php";
echo"<div class='breadcrumb'></div>";
echo"<center>";
include "../ads.php";
fblike();
echo"</center>";
echo"<center>



<div class='public_message'><div class='success'></div></div>

</ceter>



<div style='margin-top: 5px;' class='grid3'>
</div>";
echo"<div class='grid3 middle'>
<div class='b_head'>Upload Profile Picture</div>";
echo"<font color='red'><center>WARNING:</font> Do not upload Nude/offensive pictures as your Profile Picture.</center><br/><b>Select an image to upload</b>";
$folder="../avatars/";
$allowed_types=array('.jpg','.gif','.png','.bmp');
$filename=$_FILES["avatar"]["name"];
$ext=substr($filename, strpos($filename, '.'), strlen($filename)-1);
if(isset($_POST["submit"]))
{
if(!isset($_FILES["avatar"]) || $_FILES["avatar"]["size"]==0)
{
echo"<div class='msg'>No file was selected</div>";
}
elseif(!in_array($ext, $allowed_types))
{
echo"<div class='msg'>$ext is not an allowed type</div>";
} elseif(!file_exists($folder)) { echo"<div class='msg'>folder don't exist</div>";
} elseif(!is_writable($folder)) {
echo"<div class='msg'>folder not writable</div>";
}
else
{
if(move_uploaded_file($_FILES["avatar"]["tmp_name"], $folder.$filename))
{
$user=$_SESSION["user"];
mysql_query("UPDATE b_users SET photo='$filename' WHERE username='$user'") or mysql_erro();
$msg="Profile picture treated";
header("location: settings.php?msg=$msg");
}
else
{
$msg="Unable to upload, please try again";
header("location: settings.php?msg=$msg");
}
}
}
//ERRORS HERE
echo"<form action='#' method='POST' enctype='multipart/form-data'><center><input type='file' name='avatar' size='13'></center><br/><center><input type='submit' class='button' name='submit' value='Upload'></center><div class='gap'></div><div class='link_button'><a href='settings.php'>Go Back</a></div>";
include "../footer.php";
?>
