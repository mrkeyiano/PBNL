<?php
ERROR_REPORTING(1);
include('../moduls/init.php'); if(!isloggedin())
{ header("location: ../index.php"); }
else { $user=$_SESSION["user"];
} echo"<title>$config->title &raquo; Advertise with Us</title>";
echo"<style type='text/css'>
<!--
.style1 {
color: #FF0000;
font-family: Arial, Helvetica, sans-serif;
font-size: 12px; }
.style2 {font-size: 12px; font-family: Arial, Helvetica, sans-serif;} .style3 {color: #000000}
--></style><div class='body_width'>";
include "../topnav.php";
echo"<center>";
include "../ads.php";
fblike();
echo"</center>

<div style='margin-top: 5px;' class='grid3'>




</div>";
echo"<div class='grid3 middle'>
<div class='b_head'>Advertise with Us</center></div>";
echo "<p><img src='../images/advertise-here2.gif' width='150' height='125' /></p>";
echo "<p>Are you thinking of Advertising Your Business or Services? Advertising on is a very good decision to take. <br/><br/>If Publicity & Huge Sales is what you want, Then Hitting your Target is a Childs Play when you Advertise with Us. Contact the administrator at
<br/><b><font color=\"red\">$config->email</font></b> or call <br /><b><font color=\"green\">$config->mobile</font></b> for more details";
echo"<div class='gap'></div><br><div class='link_button'><a href='../index.php'>Go Back</a></div>";
include "../footer.php";
?>
