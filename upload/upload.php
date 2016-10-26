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
header("location: index.php");
}
else
{
$user=$_SESSION["user"];
}
echo"<title>$config->title &raquo; Upload File</title>";
echo"<style type='text/css'>
<!--
.style1 {color: #FF0000}
.style2 {
color: #FFFF00;
font-weight: bold;
}
-->
</style>
<div class='body_width'>";
include"../topnav.php";
echo"<div class='breadcrumb'><a href='../main.php'>Home</a>&raquo; <a href='index.php'>Uploads</a> &raquo; Upload File</div>";
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
<div class='b_head'>Upload File</div>";
echo"<p> <span class='style1'><strong>-</strong></span> Choose the Correct File Category the File you are Uploading Falls under.<br>
<span class='style1'><strong>-</strong></span> Pls Enter the Use of the File you are Uploading in the Description Below. [Compulsory]</p><br/><b>Select a file to upload</b><div class='gap'></div>";
$folder="files/";
$allowed_types=array('.jar','.sis','.sisx','.zip','.nth','.rar');
$maxsize=10485760;
$filename=$_FILES["file"]["name"];
$check="files/$filename";
$ext=substr($filename, strpos($filename, '.'), strlen($filename)-1);
if(isset($_POST["submit"]))
{
$type=$_FILES["file"]["type"];
$filesize=$_FILES["file"]["size"];
$type=$_FILES["file"]["type"];
$description=$_POST["description"];
$cat=$_POST["cat"];
if(!isset($_FILES["file"]) || $_FILES["file"]["size"]==0)
{
echo"<div class='msg'>No file was selected</div>";
}
elseif(file_exists($check))
{
echo"<div class='msg'>File name already exits</div>";
}
elseif(!isset($cat) || empty($cat))
{
echo"<div class='msg'>Please choose a category</div>";
}
elseif(empty($description) || strlen($description)<4)
{
echo"<div class='msg'>File description is compusory</div>";
}
elseif(!in_array($ext, $allowed_types))
{
echo"<div class='msg'>$ext is not an allowed type</div>";
}
elseif(!file_exists($folder))
{
echo"<div class='msg'>folder don't exist</div>";
}
elseif(!is_writable($folder))
{
echo"<div class='msg'>folder not writable</div>";
}
else
{
if(move_uploaded_file($_FILES["file"]["tmp_name"], $folder.$filename))
{
$date=time();
$user=$_SESSION["user"];
mysql_query("INSERT INTO b_upload SET `name`='$filename', `description`='$description', `by`='$user', `size`='$filesize', `extension`='$ext', `date`='$date', `catid`='$cat', `type`='$type'") or mysql_error();
$msg="file successfully uploaded";
header("location: index.php?msg=$msg");
}
else
{
$msg="Unable to upload, please try again";
header("location: index.php?msg=$msg");
}
}
}
//ERRORS HERE
echo"<form action='#' method='POST' enctype='multipart/form-data'><ul><li><center><input type='file' name='file' size='8'></li><li><b>Select file category</b><br/><select name='cat'><option value='0'>--SELECT--</option>";
$query=mysql_query("SELECT * FROM b_uploadcat");
while($info=mysql_fetch_array($query))
{
$id=$info["id"];
$name=$info["name"];
echo"<option value='$id'>$name</option>";
}
echo"</select></li><li><b>Description</b><br/><textarea rows='5' cols='20' name='description'></textarea></li><li><input type='submit' class='button' name='submit' value='Upload'></center></li></ul>";
echo"<div class='left'>
<b><br>
Upload Max size:</b> 10 Mb<br>
<b>Allowed File Types:</b> jar, sis, sisx, zip, nth, rar</div>

<br>
<br>
<div class='link_button'><a href='index.php'>Go Back</a></div>";
include"../footer.php";
?>
