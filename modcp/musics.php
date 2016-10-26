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
if(isset($_GET["action"]))
{
$action=$_GET["action"];
}
else
{
$action=" ";
}
if($action=="Delete")
{
if(isset($_GET["yes"]) & $_GET["yes"]==true)
{ $id=(int)$_GET["id"];
$query=mysql_query("DELETE FROM b_musiccat WHERE id=$id");
if($query)
{
$msg="Category Deleted Successfuly";
}
else
{
$msg=mysql_error();
}
header("location: ?msg=$msg");
exit();
}
$id=(int)$_GET["id"];
echo"<div class='topnav'>System Warning</div><div class='msg'>Are You Sure You want to Delete This Category ?</div><div class='gap'></div><div class='button'><a href='?action=Delete&yes=true&id=$id'><font color='red'>Yes</font></a> | <div class='right'><a href='?'>No</a></div></div>";
}
elseif($action=="Edit")
{
$id=(int)$_GET["id"];
if(isset($_POST["submit"]))
{
$name=cleanvalues2($_POST["name"]);
if(empty($name) || strlen($name)<4)
{
echo"<div class='center'><font color='red'>Category field name is empty or less than 4</font></div>";
}
else
{
if(empty($_FILES["file"]) || $_FILES["file"]["size"]==0)
{
mysql_query("UPDATE b_musiccat SET name='$name' WHERE id=$id") or die(mysql_error());
$msg="Changes Saved Successfulty";
header("location: ?msg=$msg");
exit();
}
else
{
$folder="../images/";
$types=array('.jpg', '.gif', '.png', '.jpeg');
$img=$_FILES["file"]["name"];
$checkimg="../images/$img";
$ext=substr($img, strpos($img, '.'), strlen($img)-1);
if(!in_array($ext, $types))
{
echo"<div class='msg'>$ext is not a valid image type</div>";
}
elseif(!file_exists($folder))
{
echo"<div class='msg'>Folder does not exists</div>";
}
elseif(file_exists($checkimg))
{
echo"<div class='msg'>image already in Use !</div>";
}
elseif(!is_writable($folder))
{
echo"<div class='msg'>Folder is not writable</div>";
}
else
{
move_uploaded_file($_FILES["file"]["tmp_name"], $folder.$img);
mysql_query("UPDATE b_musiccat SET name='$name', img='$img' WHERE id=$id");
$msg="Changes saved successfully";
header("location: ?msg=$msg");
}
}
}
}
$query=mysql_query("SELECT * FROM b_musiccat WHERE id='$id'");
$info=mysql_fetch_array($query);
$name=$info["name"];
echo"<form action='?action=Edit&id=$id' method='POST' enctype='multipart/form-data'><div class='title'>Editing Category</div><ul><li>Category Name</br><input type='text' name='name' value='$name'></li><li>Category Image<br/><input type='file' name='file'></li><li><center><input type='submit' name='submit' class='button' value='Save Changes'></center></li></ul></form>";
echo"<div class='button'><a href='?'>Back</a></div>";
exit();
}
elseif($action=="Add")
{
if(isset($_POST["submit"]))
{
$name=cleanvalues2($_POST["name"]);
$checkname=mysql_num_rows(mysql_query("SELECT * FROM b_musiccat WHERE name='$name'"));
if(empty($name) || strlen($name)<4)
{
echo"<div class='center'><font color='red'>Category field name is empty or less than 4</font></div>";
}
elseif($checkname>0) {
echo"<div class='msg'>Please Choose Another Name</div>"; }
else
{
if(empty($_FILES["file"]) || $_FILES["file"]["size"]==0)
{
mysql_query("INSERT INTO b_musiccat SET name='$name'") or die(mysql_error());
$msg="Category Created Successfulty";
header("location: ?msg=$msg");
exit();
}
else
{
$folder="../images/";
$types=array('.jpg', '.gif', '.png', '.jpeg');
$img=$_FILES["file"]["name"];
$checkimg="../images/$img";
$ext=substr($img, strpos($img, '.'), strlen($img)-1);
if(!in_array($ext, $types))
{
echo"<div class='msg'>$ext is not a valid image type</div>";
}
elseif(!file_exists($folder))
{
echo"<div class='msg'>Folder does not exists</div>";
}
elseif(file_exists($checkimg))
{
echo"<div class='msg'>image already in Use !</div>";
}
elseif(!is_writable($folder))
{
echo"<div class='msg'>Folder is not writable</div>";
}
else
{
move_uploaded_file($_FILES["file"]["tmp_name"], $folder.$img);
mysql_query("INSERT INTO b_musiccat SET name='$name', img='$img' WHERE id=$id");
$msg="Category Created successfully";
header("location: ?msg=$msg");
}
}
}
}
echo"<form action='?action=Add' method='POST' enctype='multipart/form-data'><div class='title'>Creating Category</div><ul><li>Category Name</br><input type='text' name='name'></li><li>Category Image<br/><input type='file' name='file'></li><li><center><input type='submit' name='submit' class='button' value='CREATE'></center></li></ul></form>";
echo"<div class='button'><a href='?'>Back</a></div>";
exit();
}
else
{
echo"<div class='topnav'><div class='left'><a href='?action=Add'>Create</a></div><div class='right'><a href='mfiles.php'>Uploaded Musics</a></div></div><div class='gap'></div><div class='center'><ul>Here You can Create New Categories, delete or edit existing music categories</ul></div>";
$msg=$_GET["msg"];
if(!empty($msg))
{
echo"<div class='msg'>$msg</div>";
}
$query=mysql_query("SELECT * FROM b_musiccat ORDER BY id DESC") or mysql_error();
$count=mysql_num_rows($query);
echo"<div class='topnav'><b>Music Categories</b>($count)</div>";
if($count>0)
{
while($row=mysql_fetch_array($query))
{
$name=cleanvalues2($row["name"]);
$id=$row["id"];
$img=$row["img"];
if(!empty($img))
{
$img="<img src='/images/$img' height='20' width='20' alt='img' />";
}
else
{
$img="*";
}
echo"<ul><li>$img $name</li><li><a href='?action=Edit&id=$id'>Edit</a> <div class='right'><a href='?action=Delete&id=$id'><font color='red'>Delete</font></a></li></ul>";
}
}
else
{
echo"<font color='red'><center>No category created yet</center></font><div class='gap'></div>";
}
echo"<div class='button'><a href='index.php'>Back</a></div>";
include"../footer.php";
}
?>
