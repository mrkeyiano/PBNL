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
echo"<title>$config->title &raquo; Privacy Policy</title>";
echo"<style type='text/css'>
<!--
.style1 {
color: #FF0000;
font-family: Arial, Helvetica, sans-serif;
font-size: 12px;
}
.style2 {font-size: 12px; font-family: Arial, Helvetica, sans-serif;}
.style3 {color: #000000}
-->
</style>
<div class='body_width'>";
include "../topnav.php";
echo"<center>";
include "../ads.php";
fblike();
echo"</center><div class=\"b_head\">PRIVACY POLICY</div>";
echo "<center>
Any advertisements served by Google, Inc., and affiliated companies may be controlled using cookies. These cookies allow Google to display ads based on your visits to this site and other sites that use Google advertising services. Learn how to opt out of Google's cookie usage. As mentioned above, any tracking done by Google through cookies and other mechanisms is subject to Google's own privacy policies.

<h4>About Google advertising:</h4>
What is the DoubleClick DART cookie? The DoubleClick DART cookie is used by Google in the ads served on publisher websites displaying AdSense for content ads. When users visit an AdSense publisher's website and either view or click on an ad, a cookie may be dropped on that end user's browser. The data gathered from these cookies will be used to help AdSense publishers better serve and manage the ads on their site(s) and across the web. Users may opt out of the use of the DART cookie by visiting the Google ad and content network privacy policy.

<h3>Contact Information</h3>
Concerns or questions about this privacy policy can be directed to <b> $config->email </b>for further clarification.
<br/><b>1)</b> A word filter has been put in place to prevent forum members from using sexually explicit words in their posts.<br/><b>2)</b> Our Members have been informed that they need to keep their words clean if the Website is to survive.

<br/><b>3)</b> A privacy policy has been drafted for $config->title

I'm ready to do whatever may be additionally required to make my site fully complaint with your policies. </p>";
echo"<div class='gap'></div><br><div class='link_button'><a href='../member/index.php'>Go Back</a></div>";
include "../footer.php";
?>
