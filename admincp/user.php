<?php
include('monit.php');
/*
Project: PBNL Forum v2.3

Coded By: Oyebamiji Akorede (Harkorede)

Facebook: http://facebook.com/harkorede94

Email: (harkorede01@gmail.com)

CellPhone +2348029828364

Twitter: @harkorede94

WebSite: http://naijamobile.in
*/
echo "<title>$config->title &raquo; Admin Menu</title>"; if(isset($_GET["action"])) { $action=$_GET["action"]; }
else { $action=" "; }
if($action=="Delete")
{ if(isset($_GET["yes"]) & $_GET["yes"]==true)
{ $id=(int)$_GET["id"];
$query=mysql_query("DELETE FROM b_users WHERE userID=$id");
if($query)
{ $msg="User Deleted Successfuly"; }
else { $msg=mysql_error(); }
header("location: ?msg=$msg");
exit(); }
$id=(int)$_GET["id"];
echo"<div class='topnav'>System Warning</div><div class='msg'>Are You Sure You want to Delete This User from Your Database ?</div><div class='gap'></div><div class='button'><a href='?action=Delete&yes=true&id=$id'><font color='red'>Yes</font></a> | <a href='user.php'>No</a></div>"; }
elseif($action=="pm") { if(isset($_POST["submit"])) { $message=cleanvalues($_POST["message"]); $reciever=cleanvalues($_POST["reciever"]);
if(empty($message) || strlen($message)<4)
{ echo"<div class='center'><font color='red'>Please Enter Your Message</font></div>"; } else {
if($reciever=="1")
{ $query=mysql_query("SELECT * FROM b_users WHERE level=1"); } elseif($reciever=="2") { $query=mysql_query("SELECT * FROM b_users WHERE level=2"); } else
{ $query=mysql_query("SELECT * FROM b_users"); } $sname="$config->owner";
$subject="Administrator Message";
$date=time();
$message.="<br/><b><font color=\"red\">Note:</font></b> Do Not Reply This Message..";
while($info=mysql_fetch_assoc($query)) { $rname=$info["username"];
mysql_query("INSERT INTO b_pms SET `reciever`='$rname', `sender`='$sname',
`subject`='$subject', `message`='$message', `date`='$date'") or mysql_error(); }
$msg="Your message has been dispatched successfully"; header("location: index.php?msg=$msg"); } }
echo "<br/><div class='b_head'>Global Message</div><ul><div class='msg'>Please Send Global Messages Wisely</div><li><form action='?action=pm' method='POST'>Your Message<br/><textarea rows='4' name='message'></textarea></li><li>Select Receiver<br><select name='reciever'><option value='0'>All users</option><option value='1'>Moderators</option><option value='2'>Admins Only</option></select></li><li><center><input name='submit' value='Send Message' class='button' type='submit'></center></li></ul></form><br>"; } elseif($action=="rank")
{ $id=(int)$_GET["id"];
if(isset($_POST["submit"])) { $level=(int)$_POST["level"];
$rank=getrank($level);
mysql_query("UPDATE b_users SET level='$level' WHERE userID=$id") or die(mysql_error());
$msg="User Ranked $rank Successfully";
header("location: ?msg=$msg");
exit(); }
$username=user_info2($id, username);
$img=user_info2($id, photo); $level=user_info2($id, level);
$rank=getrank($level);
echo "<br/><div class='b_head'>Ranking User &raquo; $username</div><ul><div class='center'>Please Be Wise while Ranking a User</div><li><div class='center'><img src='../avatars/$img' alt='img' height='50' width='50'></div></li><li>Name: $username</li><li>Current Rank: $rank</li></ul>";
echo"<form action='#' method='POST'><ul><li>Choose Rank<br/><select name='level'><option value='0'>Normal User</option><option value='1'>Admin</option><option value='2'>Head Admin</option></select></li><li><center><input type='submit' name='submit' value='Rank User' class='button'></li></ul></form>"; }
elseif($action=="UnBan")
{ if(isset($_GET["yes"]) & $_GET["yes"]==true)
{ $id=(int)$_GET["id"];
$query=mysql_query("UPDATE b_users SET banned='0' WHERE userID=$id"); if($query)
{
$msg="User Has Been UnBanned Successfuly";
}
else
{
$msg=mysql_error();
}
header("location: ?msg=$msg");
exit();
}
$id=(int)$_GET["id"];
echo"<div class='topnav'>System Warning</div><div class='msg'>Are You Sure You want to UNBan This User ?</div><div class='gap'></div><div class='button'><a href='?action=UnBan&yes=true&id=$id'><font color='red'>Yes</font></a> | <a href='user.php'>No</a></div>";
}
elseif($action=="Ban")
{ if(isset($_GET["yes"]) & $_GET["yes"]==true)
{ $id=(int)$_GET["id"];
$query=mysql_query("UPDATE b_users SET banned='1' WHERE userID=$id"); if($query) { $msg="User Has Been Banned Successfuly"; } else { $msg=mysql_error(); } header("location: ?msg=$msg"); exit(); } $id=(int)$_GET["id"];
echo"<div class='topnav'>System Warning</div><div class='msg'>Are You Sure You want to Banish This User ?</div><div class='gap'></div><div class='button'><a href='?action=Ban&yes=true&id=$id'><font color='red'>Yes</font></a> | <a href='user.php'>No</a></div>"; } else
{ echo"<ul><div class='center'>Please Be Wise While Taking Action On Users !</div></ul><a href='searchanddeleteusers.php'>Search and Delete Users</a><br>";
$msg=$_GET["msg"];
if(!empty($msg))
{ echo"<div class='msg'>$msg</div>"; }
if(isset($_GET["page"]) && is_numeric($_GET["page"])) { $page=(int)$_GET["page"]; }
else { $page=1; }
$max=10;
$offset=($page-1)*$max;
if($_GET["show"]=="mod") { $result=mysql_num_rows(mysql_query("SELECT * FROM b_users WHERE level=1"));
$total=ceil($result/$max);
if($page<1){ $page=1; } if($page>$total){ $page=$total; } } else
{ $result=mysql_num_rows(mysql_query("SELECT * FROM b_users"));
$total=ceil($result/$max);
if($page<1){ $page=1; } if($page>$total){ $page=$total; } }
if($_GET["show"]=="mod") { echo "<div class=\"b_head\"><b>Moderators List</b></div><br/><div class=\"topnav\"><a href='?'>Users List</a></div>";
$query=mysql_query("SELECT * FROM b_users WHERE level=1 LIMIT $offset, $max"); } else { echo "<div class=\"b_head\"><b>Users List</b></div><br/><div class=\"topnav\"><a href='?show=mod'>Moderator</a></div>";
$query=mysql_query("SELECT * FROM b_users ORDER BY userID LIMIT $offset, $max"); }
$num=mysql_num_rows($query); if($num==0)
{ echo "<div class='msg'>No user found</div>"; }
else { $i=0;
while($uinfo=mysql_fetch_assoc($query)) { $i=$i+1;
$id=$uinfo["userID"];
$username=$uinfo["username"];
$level=$uinfo["level"];
$recent=date("U")-900; $onlinecheck=mysql_num_rows(mysql_query("SELECT * FROM b_users WHERE userID='$id' AND lasttime>'$recent'"));
if($onlinecheck>0) { $st=" <font color=\" green\">&bull;</font> "; } else {
$st=" <font color=\" red\">&bull;</font> "; } $ban=$uinfo["banned"]; if($ban=='0') { $b="<a href='?action=Ban&id=$id'>Ban</a>"; } else { $b="<a href='?action=UnBan&id=$id'>UnBan</a>"; } //$level=get_rank($level);
if($username=="Administrator") { continue; }
echo "<div class=\"user-info\"><ul><li>[$id] $st $username<br/><a href='?action=rank&id=$id'>Rank</a> - $b - <a href='?action=Delete&id=$id'>Delete</a> - <a href='../profile.php?uid=$id'>Info</a></li></ul></div>"; }
if($page>1) { $prev=$page-1;
echo" <a href='?page=$prev'>[<b>Previous</b>]</a> ";
} if($page<$total) { $next=$page+1;
echo" <a href='?page=$next'>[<b>Next</b>]</a> "; } } } echo "<br/><div class=\"link_button\"><a href=\"user.php\">G0 BACK</a></div>";
include "../footer.php";
?>
