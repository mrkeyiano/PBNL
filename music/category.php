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
$user=$_SESSION["user"];
}
$id=(int)$_REQUEST["id"];
if($id<1)
{
header('');
ex();
}
$cquery=mysql_query("SELECT * FROM b_musiccat WHERE id=$id");
if(mysql_num_rows($cquery)==0)
{
header("S");
exit();
}
$cinfo=mysql_fetch_array($cquery);
$name=$cinfo["name"];
echo"<title>$config->title - $name Category</title>";
echo"<style type='text/css'>
<!--
.style1 {
color: #FF0000;
font-weight: bold;
}
.style2 {font-size: 13px}
-->
</style><div class='body_width'>";
include"../topnav.php";
echo"<div class='breadcrumb'><a href='../member/index.php'>Home</a> &raquo; <a href='index.php'>Music Home</a></div><br>";
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

<div class='b_head'>$name SECTION</div>";
$self=$_SERVER["PHP_SELF"];
$rowsperpage=10;
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
$numrows=mysql_num_rows(mysql_query("SELECT * FROM b_music WHERE catid=$id"));
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
$tquery=mysql_query("SELECT * FROM b_music WHERE catid=$id ORDER BY id DESC LIMIT $offset, $rowsperpage");
}
elseif($sort==2)
{
$tquery=mysql_query("SELECT * FROM b_music WHERE catid=$id ORDER BY id ASC LIMIT $offset, $rowsperpage");
}
elseif($sort==3)
{
$tquery=mysql_query("SELECT * FROM b_music WHERE catid=$id ORDER BY downloads LIMIT $offset, $rowsperpage");
}
elseif($sort==4)
{
$tquery=mysql_query("SELECT * FROM b_music WHERE catid=$id ORDER BY `views` LIMIT $offset, $rowsperpage");
}
else
{
$tquery=mysql_query("SELECT * FROM b_music WHERE catid=$id ORDER BY id DESC LIMIT $offset, $rowsperpage");
}
if(mysql_num_rows($tquery)==0)
{
echo"<div class='msg'>No files yet</div>";
}
else
{
echo"<ul><center><span class='style1'><b>Tips:</b></span> For Hot Musics, choose Most Downloaded in the Drop- down menu below</center><li><center>Sort By:</li><li> <form action='category.php?id=$id' method='POST'><center><select name='sort'><option value='1'>Newest First</option><option value='2'>Oldest First</option><option value='3'>Most Downloaded</option><option value='4'>Most viewed</option></select></center><input type='submit' value='Go' class='button' name='submit'></li></ul></form>";
echo"<div class='title'><center>Search for more music <a href='search.php'><span class='style1'><b>HERE</b></span></a></center></div>";
while($info=mysql_fetch_assoc($tquery))
{
$fid=$info["id"];
$name=$info["title"];
echo"<div class='file-list'>
<ul><li><a href='view.php?id=$fid'>$name</a></li></ul></div>";
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
