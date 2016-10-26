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
{ header("location: ../index.php"); } else
{ $user=$_SESSION["user"]; }
echo"<title>$config->title &raquo; Inbox </title>";
echo"<div class='body_width'>";
include"../topnav.php";
echo"<div class='breadcrumb'><a href='index.php'>Messaging</a></div><br>";
echo"<center>";
include"../ads.php";
fblike();

echo"</center>";
echo"<center>
<div class='public_message'><div class='success'></div></div></center><div style='margin-top: 5px;' class='grid3'>
</div>";

if(isset($_POST["delete"]))
{
$pms=$_REQUEST["pms"];
$pmcount=count($pms);
$i=0;
for($i=0; $i<count($pms); $i++)
{
$del=$pms[$i];
$r=mysql_query("DELETE FROM b_pms WHERE reciever='$user' AND id=$del")or die(mysql_error());
if($r) $a++;
}
$msg="$a/$pmcount was successfully deleted";
header("location: index.php?msg=$msg");
exit();
}
echo"<div class='grid3 middle'>
<div class='b_head'>Messaging Inbox</div>";
$pmquery=mysql_query("SELECT * FROM b_pms WHERE reciever='$user' ORDER BY id DESC");
$pmcount=mysql_num_rows($pmquery);
if($pmcount==0)
{
echo"<div class='msg'><strong><br>You do not have any received messages</strong></div><br>";
}

else
{
echo"<form action='#' method='POST'>";
while($pminfo=mysql_fetch_array($pmquery))
{
$pmid=$pminfo["id"];
//echo"<b>$pmid</b>";
echo"<ul class='message-list'><li>
<table border='0' width='100%'>
<tr><td width='4%'><input type='checkbox' name='pms[]' value='$pmid'></td>
<td width='96%'>";
$sender=cleanvalues2($pminfo["sender"]);
$subject=cleanvalues2($pminfo["subject"]);
$date=$pminfo["date"];
$date=date("D d M, Y", $date); $hasread=$pminfo["hasread"];
if($hasread==0) { $img="<img src='../images/newmsg.png' alt='new' border='0' />"; } else { $img="<img src='../images/oldmsg.png' alt='old' border='0' />"; } $sid=user_info($sender, userID);
echo"$img <a href='view.php?id=$pmid'>$subject</a><br>from <a href='../profile.php?uid=$sid'>$sender</a> @ $date</td>
</tr>
</table>
</li>";
}
echo"<br><center><input type='submit' name='delete' value='Delete Selected'></form></center><br>";
}
echo"<div class='link_button'><a href='index.php'>Go Back</a></div>";
include"../footer.php";
?>
