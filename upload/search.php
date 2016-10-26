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
echo"<title>$config->title &raquo; Search Uploads</title>";
echo"<style type='text/css'>
<!--
.style1 {
color: #FF0000;
font-weight: bold;
font-family: Georgia, 'Times New Roman', Times, serif;
font-size: 13px;
}
.style2
color: #400000;
font-family: Georgia, 'Times New Roman', Times, serif;
font-size: 13px;
}
-->
</style>
<div class='body_width'>";
include"../topnav.php";
echo"<div class='breadcrumb'><a href='../main.php'>Home</a> &raquo; <a href='index.php'>Uploads</a> &raquo; Search Uploads</div>";
echo"<center>";
include"../ads.php";
fblike();
echo"</center>";
echo"<center>

<div class='public_message'><div class='success'></div></div>

</center>


<div style='margin-top: 5px;' class='grid3'>




</div>";
echo"<div class='grid3 middle'>  <div class='b_head'>Search Uploads</div>";
echo"<ul><font color='red'><!-- google_afm --></font>
<br><br><span class='style1'><u>NOTE:</u></span><span class='style2'> You can Search for Files by Searching their Keywords e.g Opera, Bolt, Ucweb, etc</span><br><br>";
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
$numrows=mysql_num_rows(mysql_query("SELECT * from b_upload WHERE UPPER(name) LIKE '%$q%' OR UPPER(name) LIKE '%$q' OR UPPER(name) LIKE '$q%'"));
$totalpages=ceil($numrows/$rowsperpage);
if($currentpage>$totalpages)
{
$currentpage=$totalpages;
}
if($currentpage<1)
{
$currentpage=1;
}
$query=mysql_query("SELECT * from b_upload WHERE UPPER(name) LIKE '%$q%' OR UPPER(name) LIKE '%$q' OR UPPER(name) LIKE '$q%' LIMIT $offset, $rowsperpage");
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
$name=cleanvalues2($info["name"]);
$id=$info["id"];
echo"<ul><a href='download.php?id=$id'>$name</a></ul><div class='gap'></div>";
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

echo"<br><div class='link_button'><a href='index.php'>Go Back</a></div>";
include"../footer.php";
?>
