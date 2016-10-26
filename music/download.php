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
ERROR_REPORTING(0);
require("../init.php");
if(!isloggedin())
{ header("location: ../index.php?msg=Please Login Or Register To Download Music From $config->title");
exit();
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
$cquery=mysql_query("SELECT * FROM b_music WHERE id=$id");
if(mysql_num_rows($cquery)==0)
{
header("location: index.php");
exit();
}
$info=mysql_fetch_array($cquery);
$link=$info["link"];
$downloads=$info["downloads"]+1;
mysql_query("UPDATE b_music SET downloads='$downloads' WHERE id=$id");
header("location: $link");
?>
