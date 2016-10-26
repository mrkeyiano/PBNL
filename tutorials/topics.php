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
{
header("location: ../index.php");
}
else
{
$user=$_SESSION["user"];
}
$level=user_info($user, level);
$id=(int)$_GET["id"];
if($id<1)
{
header('location: index.php');
exit();
}
$cquery=mysql_query("SELECT * FROM b_tutorialcat WHERE id=$id");
if(mysql_num_rows($cquery)==0)
{
header("location: index.php");
exit();
}
$cinfo=mysql_fetch_array($cquery);
$name=$cinfo["name"];
echo"<title>$config->title &raquo; $name</title>";
echo"<style type='text/css'>

<!--

.style18 {        color: #FFFF00;

font-weight: bold;

}

-->

</style>





<div class='body_width'>";
include"../topnav.php";
echo"<div class='breadcrumb'><a href='../main.php'>Home</a> &raquo; <a href='index.php'>Tutorials</a></div>";
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
<div class='b_head'>$name</div>";
if($_GET["action"]=="add")
{
$id=$_GET["id"];
if($_POST["submit"])
{
$title=cleanvalues($_POST["title"]);
$subject=cleanvalues($_POST["subject"]);
$errors=array();
if(empty($title)|| strlen($title)<4)
{
$errors[]="Your title is too short";
}
if(empty($subject)||strlen($subject)<4)
{
$errors[]="Your content is too short";
}
if(count($errors)==0)
{
$date=time();
$query=mysql_query("INSERT INTO b_tutorialtopics SET title='$title', subject='$subject', date='$date', catid=$id");
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
echo"<div class='msg'><font color='red'><br><b>Please always post useful Tutorials</b><br></font></div>";
echo"<form action='#' method='post'><center><ul><li><center>Titlte<br/><input type='text' name='title'></li><li>Content<br/><textarea name='subject'></textarea></li><li><input type='submit' name='submit' class='button' value='Create'></li></ul></center><br/><div class='link_button'><a href='index.php'>Go Back</a></div>";
include"../footer.php";
//echo"hello this is your id $id";
exit();
}
$self=$_SERVER["PHP_SELF"];
$rowsperpage=7;
$range=7;
if(isset($_GET["currentpage"]) && is_numeric($_GET["currentpage"]))
{
$currentpage=(int)$_GET["currentpage"];
}
else
{
$currentpage=1;
}
$offset=($currentpage-1)*$rowsperpage;
$numrows=mysql_num_rows(mysql_query("SELECT * FROM b_tutorialtopics WHERE catid=$id"));
$totalpages=ceil($numrows/$rowsperpage);
if($currentpage>$totalpages)
{
$currentpage=$totalpages;
}
if($currentpage<1)
{
$currentpage=1;
}
$tquery=mysql_query("SELECT * FROM b_tutorialtopics WHERE catid=$id ORDER BY id DESC LIMIT $offset, $rowsperpage");
if(mysql_num_rows($tquery)==0)
{
echo"<div class='msg'>No topics yet</div>";
}
else
{
echo"<div class='tutorial-header'><br>

<!-- google_afm -->







</div>



<br>
";
while($info=mysql_fetch_assoc($tquery))
{
$tid=$info["id"];
$title=cleanvalues2($info["title"]);
echo"<div class='tutorial-list' style='margin-top: 6px;'>

<ul>



<li class='p_12' style='padding:12px;'><a href='showtopic.php?id=$tid'>$title</a></li></ul></div>";
}
if($currentpage>1)
{
echo"<a href='$self?currentpage=1'>[<b>First</b>]</a>";
$prevpage=$currentpage-1;
echo"<a href='$self?currentpage=$prevpage'>[<b>Prev</b>]</a>";
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
echo"<a href='$self?currentpage=$x'>[<b>$x</b>]</a>";
}
}
}
if($currentpage!=$totalpages)
{
$nextpage=$currentpage+1;
echo"<a href='$self?currentpage=$nextpage'>[<b>Next</b>]</a>";
echo"<a href='$self?currentpage=$totalpages'>[<b>Last</b>]</a>";
}
}
if($level==2)
{
echo"<br/><br><center><a class='button' href=?action=add&id=$id>Create new Tutorials</a></center><br>";
}
echo"<div class='link_button'><a href='index.php'>Go Back</a></div>";
include"../footer.php";
?>


