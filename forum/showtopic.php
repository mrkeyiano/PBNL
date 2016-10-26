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
if($id<1)
{ header("location: /forum/topics.php");
exit(); }
$level=user_info($user, level);
$username=user_info($user, username);
$rank=getrank($level);
//TOPIC DETAILS
$tquery=mysql_query("SELECT * FROM b_topics WHERE id=$id");
$tnum=mysql_num_rows($tquery);
if($tnum==0)
{ header("location: topics.php"); }
$tinfo=mysql_fetch_assoc($tquery);
$fid=$tinfo["forumid"];
$title=$tinfo["subject"];
$author=$tinfo["poster"];
$tmessage=$tinfo["message"];
$tmessage=bbcode($tmessage);
$tmessage=smiley($tmessage);
$locked=$tinfo["locked"];
$tdate=$tinfo["date"];
$tdate=date("D d M Y", $tdate);
$tid=$tinfo["id"];
$hints=$tinfo["hints"]+6;
mysql_query("UPDATE b_topics SET hints='$hints' WHERE id='$tid'");
//FORUMS
$finfo=mysql_fetch_assoc(mysql_query("SELECT * FROM b_forums WHERE id=$fid"));
$fname=$finfo["name"];
$fid=$finfo["id"];
echo"<title>$config->title &raquo; Forum | $title</title>";
echo"<style type='text/css'>
<!--
.style2 {
font-family: Arial, Helvetica, sans-serif;
color: #FF0000;
font-size: 12px;
}
.style3 {color: #FF0000}
.style5 {color: #FF0000; font-weight: bold; }
body,td,th {
font-family: Arial, Helvetica, sans-serif;
font-size: 13px;
}
-->
</style>

<div class='body_width'>";
include "../topnav.php";
echo"<div class='breadcrumb'><a href='../member/index.php'>Home</a> &raquo; <a href='index.php'>Forum</a> &raquo; <a href='topics.php?id=$fid'>$fname</a></div><br>";
echo"<center>";
include"../ads.php";
fblike();

echo"</center>";
echo"<center>

<div class='public_message'><div class='success'></div></div> ";


$amsg=$_GET["amsg"];
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
$insert=mysql_query("INSERT INTO b_replies SET poster='$poster', date='$date', topicid='$id', message='$message'");
mysql_query("UPDATE b_topics SET lastposter='$poster', lastpostdate='$date' WHERE id=$id");
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
$rowsperpage=5;
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
$numrows=mysql_num_rows(mysql_query("SELECT * FROM b_replies WHERE topicid=$id"));
$totalpages=ceil($numrows/$rowsperpage);
if($currentpage>$totalpages)
{
$currentpage=$totalpages;
}
if($currentpage<1)
{
$currentpage=1;
}
$rquery=mysql_query("SELECT * FROM b_replies WHERE topicid=$id ORDER BY id Asc LIMIT $offset, $rowsperpage");
$rnum=mysql_num_rows($rquery);
echo"
</center>



<div style='margin-top: 5px;' class='grid3'>




</div>";
echo"<div class='grid3 middle'>
<div class='b_head'>Forum &raquo; $fname</div><div class='thread'>
<div class='thread-main-post'>
<div id='post-head'>$title<br/><a href='https://twitter.com/share' class='twitter-share-button'>Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='//platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','twitter-wjs');</script></div>


<div id='post-info'>
<span class='left'>Views: $hints</span>&nbsp; | &nbsp;<span class='right'>Comments: $numrows</span><div class='clearfix'></div>
</div>";
$uid=user_info($author, userID);
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
echo "<div id=\"main-post\"><a href=\"../profile.php?uid=$uid\">$author</a> $tdate<br/>$tmessage<br/>$link2</div><br><iframe src=\"https://www.facebook.com/plugins/like.php?href=".$config->url."forum/showtopic.php?id=$tid\" scrolling=\"no\" frameborder=\"0\" style=\"border:none; width:100%; height:30px\"></iframe><br>
<p></p>
<hr>
<p>
<div class=\"info_post\"></div>
<h3 class=\"comment_header\"><font color=\"#ffffff\">Replies</h3></font>";

if($rnum==0)
{
echo"<div class='msg'>No replies yet</div>";
}
else
{
while($rinfo=mysql_fetch_assoc($rquery))
{
$poster=$rinfo["poster"];
$topicid=$rinfo["topicid"];
$uid=user_info($poster, userID);
$pid=$rinfo["id"];
$message=$rinfo["message"];
$date=$rinfo["date"];
$date=date("D d M Y", $date);
//BBCODE
$message=smiley(cleanvalues2($message));
$message=bbcode($message);
$link="<br><a href='action.php?action=delete&id=$pid&tid=$tid'><font color='red'>Delete</font></a> - <a href='action.php?action=edit&id=$pid&tid=$tid'>Edit</a>";
$link0=" ";
$link4=($level>0) ? $link : $link0;
$query=mysql_fetch_array(mysql_query("SELECT * FROM b_topics WHERE id=$topicid"));
$subject=$query["subject"];
echo"<div id='posts'><a href='../profile.php?uid=$uid'>$poster</a> $date<br>$message<br>$link4</div>";
} echo "<br><div class=\"pager\">"; if($currentpage>1)
{ echo"<a href='$self?currentpage=1&id=$id'>[<b>First</b>]</a>";
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
else {
echo"<a href='$self?currentpage=$x&id=$id'>[<b>$x</b>]</a>";
}
}
} if($currentpage!=$totalpages)
{ $nextpage=$currentpage+1;
echo"<a href='$self?currentpage=$nextpage&id=$id'>[<b>Next</b>]</a>"; echo"<a href='$self?currentpage=$totalpages&id=$id'>[<b>Last</b>]</a>"; } echo"</div><br>"; }
if($locked==0)
{ if(isloggedin())
{ echo "<span
class=\"style2\"><strong>=&gt;</strong>Pls do not Spam, else you <br/>might lose your Account!</span><br>
<br>Reply<form action='#' method='POST'><input type='hidden' name='topicid' value='$id'><input type='hidden' name='poster' value='$user'><textarea rows='4' cols='26' name='message'></textarea><br/><input type='submit' name='submit' value='Reply' class='button'></form><br/><center><a href=\"".$config->url."content/bbcode_ref.php\">Learn How to
Design your Post</a> | <a
href=\"".$config->url."content/smiley_ad.php\">Lovely
Smileys for your Post.</a>"; } else
{ echo "<span
class=\"style2\"><strong>=&gt;</strong>Pls do not Spam, else you <br/>might lose your Account!</span><br>
<br>Reply<form action='#' method='POST'><input type='hidden' name='topicid' value='$id'><input type='hidden' name='poster' value='$user'><textarea rows='4' cols='26' name='message'></textarea><br/><input type='submit' name='submit' value='Reply' class='button'></form></br><center><a href=\"".$config->url."content/bbcode_ref.php\">Learn How to
Design your Post</a> | <a
href=\"".$config->url."content/smiley_ad.php\">Lovely
Smileys for your Post.</a>"; } }
else {
echo"<div class='msg'><font color='red'><b>This Topic has been locked by the admin</b></font></div>";
}
echo"<br></div></div>";
include"../footer.php";
?>
