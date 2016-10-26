<?php ERROR_REPORTING(0);
/*
Project: PBNL Forum v2.3

Coded By: Oyebamiji Akorede (Harkorede)

Facebook: http://facebook.com/harkorede94

Email: (harkorede01@gmail.com)

CellPhone +2348029828364

Twitter: @harkorede94

WebSite: http://naijamobile.in
*/
include("../init.php");
if(!isloggedin())
{ header('location: ../index.php');
exit(); } else { $user=$_SESSION["user"];
$banned=user_info($user, banned);
if($banned==0) { updateonline(); } else { header('location: ../logout.php'); exit(); } }
echo"<div class='body_width'>"; echo"<div class='page_w'>"; include "../topnav.php";
echo"<div class='clearfix'></div>
"; echo"<div style='clear: both'></div><br>";
echo"<center>";
include "../ads.php";
fblike(); echo"</center>";
echo"<center><div class='public_message'><div class='success'></div></div></center>"; $online=mysql_num_rows(mysql_query("SELECT DISTINCT(chatter) FROM b_chatonline"));
$recent=date("U")-900; $onlineusers=mysql_num_rows(mysql_query("SELECT * FROM b_users WHERE lasttime>'$recent'"));
if(isset($_POST["update"])) { $status=$_POST["status"];
$status=cleanvalues($status);
mysql_query("UPDATE b_users SET status='$status' WHERE username='$username'");
echo"<div class='msg'>Your status has been updated</div>"; } $status=user_info($user, status);
$status=cleanvalues2($status);
$msg=$_GET["msg"];
if(!empty($msg))
{ echo"<div class='ms'>$msg</div>";
} echo"<div class='grid3' style='margin-top: 5px;'>
</div>";
echo"<title>$config->title &raquo; Members Section</title>";
?><style type="text/css">
<!--.style7 { color: #FFFFFF; font-size: 13px; font-family: Arial, Helvetica, sans-serif; } .style70 {font-size: 12px} .style73 {color: #00FF00}
--></style><div class="grid3 middle" align="center"><div class="b_head"><strong>&raquo;</strong><?php echo $config->title; ?> Main Panel<strong>&laquo;</strong></div><div style=""><form action="#" method="post"><p><li><center><input type="text" name="status" value="<?php echo $status; ?>"></li><li><center><input type="submit" name="update" value="Update Your Mood" class="button"></center></li></ul></p><div class="error_message"></div><div id="site-alert"><span class="prefix"><?php
myupdates(85);
?></div></div><div align="center"><ul class="dashboard-links"><li class="dashboard_button"><a href="../forum"><img src="/images/brow.png" border="0"><br /><span class="dashboard_button_heading">FORUMS</span></a><br></li><li class="dashboard_button"><a href="../tutorials"><img src="/images/books.png" border="0"><br />
<span class="dashboard_button_heading">TUTORIAL SECTION</span></a><br></li><li class="dashboard_button"><a href="../upload"><img src="/images/upload.png" border="0"><br />
<span class="dashboard_button_heading">APP DOWNLOAD ZONE</span></a><br></li><li class="dashboard_button"><a href="../music"><img src="/images/music.png" border="0"><br /><span class="dashboard_button_heading">MUSIC DOWNLOADS</span></a><br></li><li class="dashboard_button"><a href="../video"><img src="/images/video1.png" border="0" /><br /><span class="dashboard_button_heading">PC VIDEOS SECTION</span></a><br></li><li class="dashboard_button"><a href="../movies"><img src="/images/video.png" border="0"><br/>
<span class="dashboard_button_heading">MOBILE VIDEOS</span></a></li><li class="dashboard_button"><a href="../chat"><img src="/images/chat1.png" border="0"><br /><span class="dashboard_button_heading">CHATROOM </span></a></li><li class="dashboard_button"><a href="online.php"><img src="/images/online.png" border="0"><br/><span class="dashboard_button_heading">ONLINE MEMBERS</span></a></li></ul><div class="style7" style="background:#000033; padding: 3px;"><span class="style70"><a href="http://fb.me/harkorede94"style="color:#ffffff">Create a site like this</a> &para; <a href="../content/about.php"style="color:#ffffff"> About Us</a> &para;
<a href="../content/advertise.php"style="color:#ffffff">Advertise with us</a></span>  &para; <a href="../invite.php"style="color:#ffffff">Invite your Friends</a> &para;
<a href="../content/privacy.php"style="color:#ffffff">Privacy Policy</a></span></span></div></div></div><div class="clearfix"></div></div></div>
<!-- Footer --><?php include "../footer.php"; ?><br /><!-- End Footer --> </body>  </html>
