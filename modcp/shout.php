<?php 
/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
////       FOR FREE ASSISTANCE CONTACT ME VIA:					         ////
////																	 ////
////       Coded By: Ayomide Segz Homezone							 ////
////		   													         ////
////       Facebook: http://www.facebook.com/homezonecheat				 ////
////															         ////
////       Email: (homezonic@gmail.com)								 ////
////															         ////
////       CellPhone +2348094662304                                      ////
////	   	                                                             ////
////       Twitter: @homezonic                                      ////
////																	 ////
////       WebSite: if i hear...			                 ////
/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
include($_SERVER['DOCUMENT_ROOT'].'/mod/monit.php');
$act=$_GET["act"];
if($act==1)
{
mysql_query("UPDATE b_settings SET shout='1'") or mysql_error();
}
else
{
mysql_query("UPDATE b_settings SET shout='0'") or mysql_error();
}
$query=mysql_fetch_assoc(mysql_query("SELECT * FROM b_settings"));
$option=$query["shout"];
if($option==1)
{
$link="<a href='?act=0'>HIDE</a>";
}
else
{
$link="<a href='?act=1'>SHOW</a>";
}
echo"<div class='topnav'><a href='index.php'>Cpanel</a><div class='right'>$link</div></div><div class='center'>Here You can move/delete shout</div>";
$delete=$_POST["delete"];
if($delete)
{
$checkbox=$_REQUEST["pm"];
foreach($checkbox as $check)
{
$del=$check;
$r=mysql_query("DELETE FROM b_shout WHERE id=$del");
}
if($r)
{
echo"<div class='msg'>Operation was successful</div>";
}
else
{
echo"<div class='msg'>".mysql_error()."</div>";
}
}
$query=mysql_query("SELECT * FROM b_shout");
echo"<form action='#' method='POST' enctype='multipart/form-data'>";
while($row=mysql_fetch_array($query))
{
$id=$row["id"];
$message=$row["message"];
echo"<ul><input type='checkbox' name=pm[] value=$id>$id$message</ul>";
}
echo"<input type='submit' name='delete' value='delete'></form>";
?>
