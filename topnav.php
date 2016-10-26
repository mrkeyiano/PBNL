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
*/ ?><div class="page_wrapper">
<?php
if(isloggedin())
{
?>
<?php
$username=user_info($user, username);
$uid=user_info($user, userID);
$level=user_info($user, level);
$position=user_info($user, position);
$school=user_info($user, school);
$pm=mysql_num_rows(mysql_query("SELECT * FROM b_pms WHERE reciever='$username' AND hasread=0"));
echo"<div class='d_board' style='padding: 13px;'>
<span class=''>Welcome, <a href='../profile.php?uid=$uid'>$username</a> | </span><span class='d_board_right'><a href='../index.php'>Home</a> | <a href='../member/settings.php'>Account Settings</a> | <a href='../mail/inbox.php'>Inbox (<font color='#ffcc33'><b>$pm</b></font>)</a> | <a href='../logout.php'>Logout</a>";
if($level==2)
{ echo "&nbsp;| <a href=\"../admincp/index.php\" style=\"color:white\"><b>Admin panel</b></a>";
} if($level==1)
{ echo "&nbsp;| <a href=\"../modcp/index.php\" style=\"color:white\"><b>Moderator panel</b></a>"; } echo"</div></span>";
$query=mysql_fetch_assoc(mysql_query("SELECT * FROM b_settings"));
$option=$query["shout"];
if($option=="0")
{ shoutbox(); }
echo"</dv>";?> <?php } else {
?> Welcome <b> Guest</b> Please <a href='../register.php'> <b>Register</b></a> OR <a href='../index.php'><b>Login</b></a> <?php } ?>
