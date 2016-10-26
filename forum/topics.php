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
{ header(''); }
{ $user=$_SESSION["user"];
$banned=user_info($user, banned);
if($banned==1) { header("");
exit(); }
else {
updateonline(); } }
$id=(int)$_GET["id"];
if($id<1)
{ header('location: index.php');
exit(); }
$num=get_row("SELECT * FROM b_forums WHERE id=$id");
if($num==0)
{ header('');
exit(); }
$query=mysql_fetch_array(mysql_query("SELECT * FROM b_forums WHERE id=$id"));
$name=$query["name"];
echo"<title>$config->title &raquo; Forum | $name</title>";
echo"<div class='body_width'>";
include"../topnav.php";
echo"<div class='breadcrumb'><a href='../member/index.php'>Home</a> &raquo; <a href='index.php'>Forums</a></div><br>";
echo"<center>";
include"../ads.php";
fblike();

echo"</center>";
echo"<center>

<div class='public_message'><div class='success'></div></div>

</center>



<div style='margin-top: 5px;' class='grid3'>




</div>";
echo"<div class='grid3 middle'>
<div class='b_head'>Forum &raquo; $name</div>";
$action=$_GET["action"];
if($action=="add")
{ $id=$_GET["id"];
if($_POST["submit"])
{
$title=$_POST["title"];
$message=$_POST["message"];
//clean
$title=cleanvalues($title);
$message=cleanvalues($message);
$errors=array();
if(empty($title)|| strlen($title)<4)
{
$errors[]="Your title is too short";
}
if(empty($message)||strlen($message)<4)
{
$errors[]="Your content is too short";
}
if(count($errors)==0)
{
$date=time();
$query=mysql_query("INSERT INTO b_topics SET poster='$user', lastpostdate='$date', lastposter='$user', subject='$title', message='$message', date='$date', forumid=$id");
if(!$query)
{
$msg="An error occured";
}
else
{
$msg="Topic was successfully created";
}
header("location: index.php?msg=$msg");
}
else
{
foreach($errors as $error)
{
$string.="$error<br/>";
}
}
}
if($string!==" "){
echo"<div class='msg'>$string</div>";
}
echo"<div class='msg'><br><span class='style1'><strong>Warning</strong></span><p><span class='style1'><b>.</b> </span>Do not Create Topic in the Wrong Section & be careful on the Kind of Topic you Create to Avoid Ban!<br>

<span class='style1'><b>.</b></span> Never Ask any Member to Call You or Request before you Post, Else your Account might be Suspended.</div>";
echo"<form action='#' method='post'><center><ul><li><center>Titlte<br/><input type='text' name='title'></li><li>Content<br/><textarea name='message'></textarea></li><li><input type='submit' name='submit' class='button' value='Create'></li></ul></center><br/><div class='link_button'><a href='index.php'>Go Back</a></div>";
include"../footer.php";
//echo"hello this is your id $id";
exit();
}


$self=$_SERVER["PHP_SELF"];
$rowsperpage=10;
$range=7;
if(isset($_GET["currentpage"]) && is_numeric($_GET["currentpage"])) { $currentpage=(int)$_GET["currentpage"]; } else { $currentpage=1; } $offset=($currentpage-1)*$rowsperpage;
$numrows=mysql_num_rows(mysql_query("SELECT * FROM b_topics WHERE forumid=$id"));
$totalpages=ceil($numrows/$rowsperpage);
if($currentpage>$totalpages) { $currentpage=$totalpages; }
if($currentpage<1) {$currentpage=1; } $query2=mysql_query("SELECT * FROM b_topics WHERE forumid='$id' ORDER BY lastpostdate DESC LIMIT $offset, $rowsperpage");
$num=mysql_num_rows($query2); if($num==0)
{ echo"<div class='msg'>No topics yet</div>"; }
else { echo"<br><div class='center'><span class='style18'></span></div><br><br>
";
while($info=mysql_fetch_array($query2)) { $title=cleanvalues2($info["subject"]);
$id2=cleanvalues2($info["id"]); $author=cleanvalues2($info["poster"]);
$aid=user_info($author, userID);
$date=cleanvalues2($info["date"]);
$lastposter=cleanvalues2($info["lastposter"]);
$forumid=cleanvalues2($info["forumid"]);
$bid=user_info($lastposter, userID);
$lastpostdate=cleanvalues2($info["lastpostdate"]);
$date=date(' G:i D, d M Y', $date); if(empty($lastposter))
{ $lastposter="---"; $lastpostdate=" "; }
else { $lastposter="last reply by <a href='../profile.php?uid=$bid'>$lastposter </a>&nbsp;"; $lastpostdate=@date('G:i D, d M Y', $lastpostdate); }
$query=mysql_fetch_array(mysql_query("SELECT * FROM b_forums WHERE id=$forumid"));
$name=$query["name"];
echo "<div class='forum-list'><ul><li><a href=showtopic.php?id=$id2><font color=\"#cc0000\"
style=\"text-transform:uppercase; font-weight:bold\">$title</font></a>
posted by <a href='../profile.php?uid=$aid'>$author       </a>&nbsp; $date <br/>$lastposter $lastpostdate</li><br></ul>
</div>";
} if($currentpage>1) { echo " <a href='$self?id=$id&currentpage=1'>[<b>First</b>]</a> "; $prevpage=$currentpage-1;
echo" <a href='$self?id=$id&currentpage=$prevpage'>[<b>Prev</b>]</a> "; } for($x=($currentpage-$range); $x<(($currentpage+$range)+1); $x++) { if(($x>0) &&($x<=$totalpages)) { if($x==$currentpage)
{ echo" [<font color='red'>$x</font>] ";
} else { echo" <a href='$self?id=$id&currentpage=$x'>[<b>$x</b>]</a> "; } } } if($currentpage!=$totalpages) { $nextpage=$currentpage+1; echo" <a href='$self?id=$id&currentpage=$nextpage'>[<b>Next</b>]</a> "; echo" <a href='$self?id=$id&currentpage=$totalpages'>[<b>Last</b>]</a> "; } } echo"<br/><br><div class='link_button'><a href=?action=add&id=$id>Create new Thread</a></div><div class='gap'></div>";
include"../footer.php";
?>
