<?php
error_reporting(0);
/*
Coded By: Oyebamiji Akorede (Harkorede)

Facebook: http://facebook.com/harkorede94

Email: (harkorede01@gmail.com)

CellPhone +2348029828364

Twitter: @harkorede94

WebSite: http://naijamobile.in
*/
require("moduls/init.php");
echo"<title>$config->title &raquo; $config->desc </title>";
if(isset($_SESSION["user"])) { header("location: member/index.php"); } $recent=date("U")-900;
$onlinequery=mysql_query("SELECT * FROM b_users WHERE lasttime>'$recent'");
$ucount=mysql_num_rows($onlinequery);
?><style type="text/css"><!-- .style1 {color: #FFFF00}
a:link { text-decoration: none;
} a:visited {
text-decoration: none;
} a:hover {
text-decoration: none;
}
a:active {
text-decoration: none;
} .style2 {
font-family: Arial,
Helvetica, sans-serif;
font-size: 12px;
} .style4 {font-size: 11px} .style5
{font-size: 12px}
.style6 {font-family: Arial,
Helvetica, sans-serif} .style7 {
color: #FF0000;
font-weight: bold; } --></style>
<div class="body_width"><div class="page_wrapper clearfix"><div class="clearfix"></div><?php
$count=get_rows(b_users);
$msg=$_GET["msg"];
if($msg!==" ") {
echo"<div class='msg'>$msg</div>";
}
?>

<div class='grid2'>
<div class="intro">
<p class="b_head"><strong>Welcome to <?php echo $config->title; ?></strong></p>
<p><div class='style4 style1'>This Website Is Dedicated To All Naija Youths</div></p><p class="style5"><span class="style6">The Hottest Naija Spot For:<br>  <u>Free Browsing</u></u> | <u>Mobile + Pc Tutorial</u></u> | <u>Forum</u></u> | <u>Online Gist & Music</u></u>, <u>Video + App Downloads.</u></u></span><p>

<img src="/images/phone.png" width="64" height="64" style="border-radius:5px" />
<img src="/images/music.png" width="64" height="64" style="border-radius:5px" />
<img src="/images/vd6.png" width="64" height="64" style="border-radius:5px" /></p></div></div><div class="grid2"><p class="b_head" style="margin-left: 3px;"> Member Login</p><div class="m_login"><form action="login.php" method="post">Username<br/><input type="text" name="username" size="20"><br/>Password<br/><input type="password" name="password" size="20"><br/><br><input type="submit" name="submit" class="button" value="Log in"></form></div><br>Not yet a member ? <a href="register.php"><b>Sign up</b></a> <strong>|</strong> <a href="forgotpass.php"><b>Forgot Details ?</b></a><br/><br/>
</div><div class="clearfix"></div><div class="grid1"><div class="b_head" style="margin-left: 3px;"> Random Members</div><div
style="padding:10px; border:
1px solid #FFF; border-radius:
6px; margin-bottom:
5px;"><?php
$query=mysql_query("SELECT * FROM b_users ORDER BY RAND() LIMIT 5");
while($info=mysql_fetch_array($query)) { $username=cleanvalues2($info["username"]);
$uid=$info["userID"];
$img=$info["photo"];
$status=$info["status"];
$status=wordwrap($status, 13, "<br/>\n");
if(empty($img))
{ $img="<img src='images/nophoto.png' alt='photo' height='60' width='40' style='border:
1px solid #FFF;'>"; }
else
{ $img="<img src='/avatars/$img' alt='photo' height='60' width='40' style='border:
1px solid #FFF;'>"; }
echo "<left><a href='profile.php?uid=$uid'style='color:#000033'>$img</a></left>";
} ?></div><div class="b_head">Site Statistic</div><div
style="padding: 10px; border:
1px solid #FFF; border-radius:
6px; margin-bottom:
5px;"><b>Total Members</b>: <?php echo $count; ?></div><div
style="padding: 10px; border:
1px solid #FFF; border-radius:
6px; margin-bottom:
5px;"><b>Online Members</b>:
<?php echo "$ucount<br/></div></div>";
while($uinfo=mysql_fetch_array
($onlinequery))
{ $userID=$uinfo["userID"];
$username=$uinfo["username"];
$school=$uinfo["school"];
$position=$uinfo["position"];
$sex=$uinfo["sex"];
$img=$uinfo["photo"];
echo"<a href='profile.php?uid=$userID'><font color='red'>$username</font></a>, <font color='gold'></font><font color='black'> </font>";
include "topis.php";
if(empty($img)) { $photo="<img src='/avatars/nophoto.png' alt='photo' height='60' width='40'>"; } else
{ $photo="<img src='/avatars/$photo' alt='photo' height='60' width='40'>"; } } ?><br><br><center>    <a href="http://www.facebook.com/<?php echo $config->fb; ?>" target="_blank"><img src="/images/fb-follow.png" width="160" height="27" border="0" /></a><center><a href="https://twitter.com/<?php echo $config->twit; ?>" class="twitter-follow-button" data-show-count="false">Follow @harkorede94</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script><p><span class="style7">&raquo;</span> Need to Contact us? <?php echo $config->email; ?></font><br></a></p></div><? include "footer.php"; ?>
