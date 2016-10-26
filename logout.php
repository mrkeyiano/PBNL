<?php 
ERROR_REPORTING(0);
/*
       FOR FREE ASSISTANCE CONTACT ME VIA:

       Coded By: Ayomide Segz Homezone

       Facebook: http://www.facebook.com/homezonecheat

       Email: (homezonic@gmail.com)

       CellPhone +2348094662304 

       Twitter: @homezonic

       WebSite: if i hear?
*/
require("init.php");
$user=$_SESSION["user"];
mysql_query("UPDATE b_users SET lasttime=0 WHERE username='$user'");
unset($_SESSION["user"]);
session_destroy();
header("location: index.php?msg=$config->lome");
exit();
?>
