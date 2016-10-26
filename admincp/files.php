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
echo"<div class='topnav'><a href='uploads.php'>Uploads Menu</a></div><div class='center'>Here You can move/delete uploaded files</div>";
$msg=$_GET["msg"];
if(!empty($msg))
{
echo"<div class='msg'>$msg</div>";
}
$action=$_GET["action"];
if($action=="move")
{
if(isset($_POST["move"]))
{
$id=(int)$_POST["id"];
$cid=(int)$_POST["cid"];
mysql_query("UPDATE b_upload SET catid='$cid' WHERE id=$id");
$cinfo=mysql_fetch_assoc(mysql_query("SELECT * FROM b_uploadcat WHERE id=$cid"));
$cname=$cinfo["name"];
$msg="File moved to $cname category successfully";
header("location: files.php?msg=$msg");
exit();
}
else
{
$id=(int)$_GET["id"];
echo"<div class='msg'>Are You Sure You Want to move this file to another category ?</div>";
echo"<form action='?action=move' method='POST'><ul><li>Move to.....<br/><select name='cid'>";
$query=mysql_query("SELECT * FROM b_uploadcat");
while($row=mysql_fetch_array($query))
{
$cname=$row["name"];
$pid=$row["id"];
echo"<option value='$pid'>$cname</option>";
}
echo"</select></li><input type='hidden' name='id' value='$id'><li><input type='submit' name='move' class='button' value='move'></li></ul></form>";
exit();
}
}
if($action=="Delete")
{
if(isset($_GET["yes"]) & $_GET["yes"]==true)
{ $id=(int)$_GET["id"];
$query=mysql_query("DELETE FROM b_upload WHERE id=$id");
if($query)
{
$msg="FILE Deleted Successfuly";
}
else
{
$msg=mysql_error();
}
header("location: ?msg=$msg");
}
$id=(int)$_GET["id"];
echo"<div class='topnav'>System Warning</div><div class='msg'>Are You Sure You want to Delete This FILE ?</div><div class='gap'></div><div class='button'><a href='?action=Delete&yes=true&id=$id'><font color='red'>Yes</font></a> | <div class='right'><a href='?'>No</a></div></div>";
exit();
}


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
$numrows=mysql_num_rows(mysql_query("SELECT * FROM b_upload"));
$totalpages=ceil($numrows/$rowsperpage);
if($currentpage>$totalpages)
{
$currentpage=$totalpages;
}
if($currentpage<1)
{
$currentpage=1;
}
$tquery=mysql_query("SELECT * FROM b_upload ORDER BY id DESC LIMIT $offset, $rowsperpage");
if(mysql_num_rows($tquery)==0)
{
echo"<div class='msg'>No files yet</div>";
}
else
{
echo"<div class='title'>Uploaded Files</div>";
while($info=mysql_fetch_assoc($tquery))
{
$fid=$info["id"];
$name=cleanvalues2($info["name"]);
$by=cleanvalues2($info["by"]);
$date=$info["date"];
$date=date("D d, M Y", $date);
$catid=$info["catid"];
$cinfo=mysql_fetch_assoc(mysql_query("SELECT * FROM b_uploadcat WHERE id=$catid"));
$cat=$cinfo["name"];
$link="<a href='?action=move&id=$fid'>[-]</a>- <div class='right'><a href='?action=Delete&id=$fid'>[x]</a>";
echo"<ul><li>*<a href='../upload/view.php?id=$fid'><b>$name</b></a><br/>Category:- $cat<br/>BY:- $by<br/>$date<br/>$link</li></ul>";
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
echo"<div class='button'><a href='uploads.php'>Go Back</a></div>";
include"../footer.php";
?>
