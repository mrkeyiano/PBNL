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
header("location: ../index.php");
}
else
{
$user=$_SESSION["user"];
}
$id=(int)$_REQUEST["id"];
if($id<1)
{
header('location: index.php');
exit();
}
$cquery=mysql_query("SELECT * FROM b_uploadcat WHERE id=$id");
if(mysql_num_rows($cquery)==0)
{
header("location: index.php");
exit();
}
$cinfo=mysql_fetch_array($cquery);
$name=$cinfo["name"];
echo"<title>$config->title &raquo; $name</title>";
echo"<style type='text/css'>
<!--
.style2 {
color: #FF0000;
font-weight: bold;
}
-->
</style>


<div class='body_width'>";
include"../topnav.php";
echo"<div class='breadcrumb'><a href='../main.php'>Home</a> &raquo; <a href='index.php'>uploads</a> &raquo; $name</div>";
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
<div class='b_head'>Category &raquo; $name</div>";
$self=$_SERVER["PHP_SELF"];
$rowsperpage=3;
$range=7;
if(isset($_GET["currentpage"]) && is_numeric($_GET["currentpage"]))
{
$currentpage=(int)$_GET["currentpage"];
}
else
{
$currentpage=1;
}
$offset=($currentpage-1)*$rowsperpage;
$numrows=mysql_num_rows(mysql_query("SELECT * FROM b_upload WHERE catid=$id"));
$totalpages=ceil($numrows/$rowsperpage);
if($currentpage>$totalpages)
{
$currentpage=$totalpages;
}
if($currentpage<1)
{
$currentpage=1;
}
$sort=$_REQUEST["sort"];
if($sort==1)
{
$tquery=mysql_query("SELECT * FROM b_upload WHERE catid=$id ORDER BY id DESC LIMIT $offset, $rowsperpage");
}
elseif($sort==2)
{
$tquery=mysql_query("SELECT * FROM b_upload WHERE catid=$id ORDER BY id ASC LIMIT $offset, $rowsperpage");
}
elseif($sort==3)
{
$tquery=mysql_query("SELECT * FROM b_upload WHERE catid=$id ORDER BY downloads LIMIT $offset, $rowsperpage");
}
elseif($sort==4)
{
$tquery=mysql_query("SELECT * FROM b_upload WHERE catid=$id ORDER BY `views` LIMIT $offset, $rowsperpage");
}
else
{
$tquery=mysql_query("SELECT * FROM b_upload WHERE catid=$id ORDER BY id DESC LIMIT $offset, $rowsperpage");
}
if(mysql_num_rows($tquery)==0)
{
echo"<div class='msg'>No files yet</div>";
}
else
{
echo"<ul><li><center>Sort By:</center></li><li> <form action='category.php?id=$id' method='POST'><center><select name='sort'><option value='1'>Newest First</option><option value='2'>Oldest First</option><option value='3'>Most Downloaded</option><option value='4'>Most viewed</option></select></center></li><li><center><input type='submit' value='SUBMIT' class='button' name='submit'></center></li></ul></form>";
echo"<div class='title'><br><center>Search for any file <font color='red'><a href='search.php'><b>Here</b></a></font></center></div>";
while($info=mysql_fetch_assoc($tquery))
{
$fid=$info["id"];
$name=$info["name"];
echo"<div class='file-list'>
<ul class=''><li><img src='http://9jacliq.com/app.jpg' height='32' width='32' alt='no img' /> <a href='view.php?id=$fid'>$name</a></li></ul></div>";
}
if($currentpage>1)
{
echo"<a href='$self?currentpage=1&id=$id&sort=$sort'>[<b>First</b>]</a>";
$prevpage=$currentpage-1;
echo"<a href='$self?currentpage=$prevpage&id=$id&sort=$sort'>[<b>Prev</b>]</a>";
}
for($x=($currentpage-$range); $x<(($currentpage+$range)+1); $x++)
{
if(($x>0) &&($x<=$totalpages))
{
if($x==$currentpage)
{
echo"[<font color='red'>$x</font>]";
}
else
{
echo"<a href='$self?currentpage=$x&id=$id&sort=$sort'>[<b>$x</b>]</a>";
}
}
}
if($currentpage!=$totalpages)
{
$nextpage=$currentpage+1;
echo"<a href='$self?currentpage=$nextpage&id=$id&sort=$sort'>[<b>Next</b>]</a>";
echo"<a href='$self?currentpage=$totalpages&id=$id&sort=$sort'>[<b>Last</b>]</a>";
}
}
echo"<br><div class='link_button'><a href='index.php'>Go Back</a></div>";
include"../footer.php";
?>
