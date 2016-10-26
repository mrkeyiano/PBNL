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
include('monit.php');
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/pjpeg"))
&& ($_FILES["file"]["size"] < 900000))
{
if ($_FILES["file"]["error"] > 0)
{
echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
}
else
{

$file_name = 'upload/'.substr(md5(time()),0,10).'.jpg';
$file = imagecreatefromjpeg($_FILES["file"]["tmp_name"]);

$watermark = @imagecreatefrompng('./wm.png');
$imagewidth = imagesx($file);
$imageheight = imagesy($file);
$watermarkwidth = imagesx($watermark);
$watermarkheight = imagesy($watermark);
$startwidth = (($imagewidth - $watermarkwidth)/1);
$startheight = (($imageheight - $watermarkheight)/1);
imagecopy($file, $watermark, $startwidth, $startheight, 0, 0, $watermarkwidth, $watermarkheight);
#imagecopymerge($file, $watermark, $startwidth, $startheight, 0, 0, $watermarkwidth, $watermarkheight, 80);
imagedestroy($watermark);

imagejpeg($file, $file_name, 90);
ImageDestroy($new);
ImageDestroy($file);

#echo "Upload: " . $_FILES["file"]["name"] . "<br />";
#echo "Type: " . $_FILES["file"]["type"] . "<br />";
#echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
#echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
echo '<img src="'.$file_name.'" alt=""/>';
/*if (file_exists("upload/" . $_FILES["file"]["name"]))
{
echo $_FILES["file"]["name"] . " already exists. ";
}
else
{
move_uploaded_file($_FILES["file"]["tmp_name"],
"upload/" . $_FILES["file"]["name"]);
echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
}*/
}
}
else
{
echo "Invalid file";
}
?>
<html>
<body>

<form action="" method="post"
enctype="multipart/form-data">
<label for="file">File:</label>
<input type="file" name="file" id="file" />
<br />
<input type="submit" name="submit" value="Submit" />
</form>

</body>
</html>

<?php
if ($handle = opendir('./upload/')) {
while (false !== ($entry = readdir($handle))) {
if ($entry != "." && $entry != "..") {
echo "<a href=\"upload/$entry\">$entry</a>, \n";
}
}
closedir($handle);
}
?>
