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
{ header("location: ../index.php"); }
else { $user=$_SESSION["user"]; }
echo"<title>$config->title &raquo; Search Topics</title>";
echo"<style type='text/css'>
<!--
.style2 {font-size: 12px; font-family: Arial, Helvetica, sans-serif;}
.style4 {color: #FF0000; font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold; }
.style5 {
color: #FF0000;
font-weight: bold;
}
-->
</style>";
echo"<div class='body_width'>";
include"../topnav.php";
echo"<center>";
include"../ads.php";
fblike();

echo"</center>
<div style='margin-top: 5px;' class='grid3'</div>";
echo"<div class='grid3 middle'>
<div class='b_head'>Search For Forum Topics</div>";
echo"<br><!-- google_afm --><br>
<span class='style4'>&gt;&gt; </span><span class='style2'>Search for any Forum Topic by Using a Single word <span class='style5'>e.g</span> Maybe Someone Created a Topic: <u><strong>How to eat without hand</strong></u>, You can Search for <span class='style5'>eat</span>, You will get it.</span> <br>
<br>";
echo"<form action='#' method='POST'><ul><li><input type='text' name='q' /></li><li><center><input type='submit' name='submit' value='Search' class='button'></center></li></ul>";
$q=$_REQUEST["q"];
if(isset($q) && !empty($q))
{
$q=trim($q);
$q=cleanvalues($q);
$q=strtoupper($q);
//echo"you searched for $q";
//$u="is";
$self=$_SERVER["PHP_SELF"];
$rowsperpage=2;
$range=2;
if(isset($_GET["currentpage"]) && is_numeric($_GET["currentpage"]))
{
$currentpage=(int)$_GET["currentpage"];
}
else
{
$currentpage=1;
}
$offset=($currentpage-1)*$rowsperpage;
$numrows=mysql_num_rows(mysql_query("SELECT * from b_topics WHERE UPPER(subject) LIKE '%$q%' OR UPPER(subject) LIKE '%$q' OR UPPER(subject) LIKE '$q%'"));
$totalpages=ceil($numrows/$rowsperpage);
if($currentpage>$totalpages)
{
$currentpage=$totalpages;
}
if($currentpage<1)
{
$currentpage=1;
}
$query=mysql_query("SELECT * from b_topics WHERE UPPER(subject) LIKE '%$q%' OR UPPER(subject) LIKE '%$q' OR UPPER(subject) LIKE '$q%' LIMIT $offset, $rowsperpage");
$num=mysql_num_rows($query);
if($num==0)
{
echo"<div class='msg'>No result found</div>";
}
else
{
echo"<div class='title'><center>Search Results For $q</center></div><div class='gap'></div>";
while($info=mysql_fetch_assoc($query))
{
$title=cleanvalues2($info["subject"]);
$id=$info["id"];
echo"<ul><a href='showtopic.php?id=$id'>$title</a></ul><div class='gap'></div>";
}
if($currentpage>1)
{
echo"<a href='$self?currentpage=1&q=$q'>[<b>First</b>]</a>";
$prevpage=$currentpage-1;
echo"<a href='$self?currentpage=$prevpage&q=$q'>[<b>Prev</b>]</a>";
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
echo"<a href='$self?currentpage=$x&q=$q'>[<b>$x</b>]</a>";
}
}
}
if($currentpage!=$totalpages)
{
$nextpage=$currentpage+1;
echo"<a href='$self?currentpage=$nextpage&q=$q'>[<b>Next</b>]</a>";
echo"<a href='$self?currentpage=$totalpages&q=$q'>[<b>Last</b>]</a>";
}}
}

echo"<br>
<br>
<div class='link_button'><a href='index.php'>Go Back</a></div>";
include"../footer.php";
?>
