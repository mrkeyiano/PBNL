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
$id=(int)$_GET["id"];
if($id<1||empty($id))
{
header("");
exit();
}
$level=user_info($user, level);
//TOPIC DETAILS
$tquery=mysql_query("SELECT * FROM b_clothing WHERE id=$id");
$tnum=mysql_num_rows($tquery);
if($tnum==0)
{
header("location: topics.php");
}
$tinfo=mysql_fetch_assoc($tquery);
$cid=$tinfo["catid"];
$title=cleanvalues2($tinfo["title"]);
$tmessage=cleanvalues2($tinfo["subject"]);
$tmessage=bbcode($tmessage);
$tmessage=smiley($tmessage);
$locked=$tinfo["locked"];
$tdate=$tinfo["date"];
$tdate=date("D d M Y", $tdate);
$tid=$tinfo["id"];
$views=$tinfo["views"]+6;
mysql_query("UPDATE b_clothing SET `views`='$views' WHERE id='$tid'");
//CATEGORIES
$cinfo=mysql_fetch_assoc(mysql_query("SELECT * FROM b_clothingcat WHERE id=$cid"));
$cname=$cinfo["name"];
$cid=$finfo["id"];
echo"<title>$config->title &raquo; Tutorials | $title</title>";
echo"<style type='text/css'>
<!--
.style5 {
font-size: 13px;
font-weight: bold;
}
.style12 {
font-family: Georgia, 'Times New Roman', Times, serif;
font-size: 12px;
}
.style14 {
font-size: 13px;
font-family: Arial, Helvetica, sans-serif;
font-weight: bold;
color: #FF0000;
}
-->
</style>


<div class='body_width'>";
include "../topnav.php";
echo"<div class='breadcrumb'><a href='../index.php'>Home</a> &raquo; <a href='index.php'>Latest Campus Clothing</a> </div>";
echo"<center>

<br>
<br>
<div class='public_message'><div class='success'></div></div>

</center>



<div style='margin-top: 5px;' class='grid3'>




</div>";
$amsg=cleanvalues2($_GET["amsg"]);
if(!empty($amsg))
{ echo"<div class='msg'>$amsg</div>";
}
if(isset($_POST["submit"]))
{
$poster=$_POST["poster"];
$topicid=$_POST["topicid"];
$message=$_POST["message"];
$date=time();
//CLEAN
if(strlen($message)<4 || empty($message))
{
echo"<div class='msg'>Your message is too short</div>";
}
else
{
$topicid=cleanvalues($topicid);
$message=cleanvalues($message);
$insert=mysql_query("INSERT INTO b_clothingreplies SET poster='$poster', date='$date', topicid='$id', message='$message'");
if(!$insert)
{
$msg3="An error occured";
}
else
{
$msg3="Reply Successfully Added";
}
echo"<div class='msg'>$msg3</div>";
}
}
//REPLIES
$self=$_SERVER["PHP_SELF"];
$rowsperpage=10;
$range=10;
if(isset($_GET["currentpage"]) && is_numeric($_GET["currentpage"]))
{
$currentpage=(int)$_GET["currentpage"];
}
else
{
$currentpage=1;
}
$offset=($currentpage-1)*$rowsperpage;
$numrows=mysql_num_rows(mysql_query("SELECT * FROM b_clothingreplies WHERE topicid=$id"));
$totalpages=ceil($numrows/$rowsperpage);
if($currentpage>$totalpages)
{
$currentpage=$totalpages;
}
if($currentpage<1)
{
$currentpage=1;
}
$rquery=mysql_query("SELECT * FROM b_clothingreplies WHERE topicid=$id ORDER BY id Asc LIMIT $offset, $rowsperpage");
$rnum=mysql_num_rows($rquery);
echo"<div class='grid3 middle'>
<div class='tutorial-list'>

<div class='tutotial_container'><div class='tutorial_head'><b><font color='white'>$title</b></font><div align='center'><a name='fb_share'></a>

<script src='http://static.ak.fbcdn.net/connect.php/js/FB.Share'

type='text/javascript'>

</script></div></div> <div id='post-info'>
<span class='left'>Comments: $numrows</span> <span class='right'>Views: $views</span> Posted In $cname <br>
<span>Posted On: $tdate<br>
<div style='clear: both;'></div>
</span></div>   ";
If($level==2)
{
if($locked==0)
{
$link2="<a href='action.php?action=movetopic&tid=$tid'>Move</a> - <a href='action.php?action=lock&id=$tid'>Lock</a>- <a href='action.php?action=edittopic&tid=$tid'>Edit</a>";
}
else
{
$link2="<a href='action.php?action=movetopic&id=$tid'>Move</a> - <a href='action.php?action=unlock&id=$tid'>UnLock</a> - <a href='action.php?action=edittopic&id=$tid'>Edit</a>";
}
}
echo"<div class='tutorial_content'>
<style type='text/css'>
<!--
body,td,th {
font-family: Arial, Helvetica, sans-serif;
font-size: 13px;
}
.style1 {
color: #FFFF00;
font-weight: bold;
}
.style4 {
color: #00FFFF;
font-weight: bold;
}
.style5 {
color: #FF0000;
font-weight: bold;
}
-->
</style><p>$tmessage</em></p></div>
</div>
</div><br/>$link2<div class='tutorial-comment-holder'>

<h4 class='comment_header'><font color='white'>Responses</font></h4>";

if($rnum==0)
{
echo"<div class='msg'>No replies yet</div>";
}
else
{
while($rinfo=mysql_fetch_assoc($rquery))
{
$poster=$rinfo["poster"];
$uid=user_info($poster, userID);
$pid=$rinfo["id"];
$message=$rinfo["message"];
$date=$rinfo["date"];
$date=date("D d M Y", $date);
//BBCODE
$message=smiley(cleanvalues2($message));
$message=bbcode($message);
$link="<a href='action.php?action=delete&id=$pid&tid=$tid'><font color='red'>Delete</font></a> - <div class='right'><a href='action.php?action=edit&id=$pid&tid=$tid'>Edit</a></div>";
$link0=" ";
$link4=($level>0) ? $link : $link0;
echo"<div class='tutorial-comment'>
<div class='tutorial-comment-info'><a href='../profile.php?uid=$uid'>$poster</a> $date</div><div class='tutorial-comment-text'>$message</div></div><br/>$link4";
}
if($currentpage>1)
{
echo"<a href='$self?currentpage=1&id=$id'>[<b>First</b>]</a>";
$prevpage=$currentpage-1;
echo"<a href='$self?currentpage=$prevpage&id=$id'>[<b>Prev</b>]</a>";
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
echo"<a href='$self?currentpage=$x&id=$id'>[<b>$x</b>]</a>";
}
}
}
if($currentpage!=$totalpages)
{
$nextpage=$currentpage+1;
echo"<a href='$self?currentpage=$nextpage&id=$id'>[<b>Next</b>]</a>";
echo"<a href='$self?currentpage=$totalpages&id=$id'>[<b>Last</b>]</a>";
}
echo"<div class='gap'></div>";
}
echo"<br><center><font color='red'><b>WARNING:</b></font> Please Dont copy Campusloaded Contents To other Web platforms<br/>";
if($locked==0)
{
echo"Comment<form action='#' method='POST'><input type='hidden' name='topicid' value='$id'><input type='hidden' name='poster' value='$user'><textarea rows='3' cols='20' name='message'></textarea><br/><input type='submit' name='submit' value='Reply' class='button'></form></center><center>";
}
else
{
echo"<div class='msg'><font color='red'><b>This Topic has been locked by the admin</b></font></div><div class='gap'></div>";
}
echo"<a href='design.php'>Design Your post</a> | <a href='smiles.php'>Post Smileys</a></b></center><div class='gap'></div>";
echo"<br><div class='link_button'><a href='index.php'>Go Back</a></div></div>";
include"../footer.php";
?>
