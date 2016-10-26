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
{ header("location: index.php"); }
else { $user=$_SESSION["user"]; }
echo"<title>$config->title &raquo; Online Peeps</title>";
echo"<div class='body_width'>";
include "../topnav.php";
echo"<div class='breadcrumb'></div>
<center>";
include "../ads.php";
fblike();
echo"</center>
<div style='margin-top: 5px;' class='grid3'>
</div>";
echo"<div class='grid3 middle'>
<div class='b_head'>ONLINE MEMBERS</div>";
$recent=date("U")-900;
$self=$_SERVER["PHP_SELF"];
$rowsperpage=15;
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
$numrows=mysql_num_rows(mysql_query("SELECT * FROM b_users WHERE lasttime>'$recent'"));
$totalpages=ceil($numrows/$rowsperpage);
if($currentpage>$totalpages)
{
$currentpage=$totalpages;
}
if($currentpage<1)
{ $currentpage=1; }
$query=mysql_query("SELECT * FROM b_users WHERE lasttime>'$recent' LIMIT $offset, $rowsperpage");
if(mysql_num_rows($query)==0)
{ echo"<div class='msg'>No User Found</div>";
} else
{ while($info=mysql_fetch_array($query)) {
$username=cleanvalues2($info["username"]);
$school=cleanvalues2($info["school"]);
$sex=cleanvalues2($info["sexl"]);
$position=cleanvalues2($info["position"]);
$uid=$info["userID"];
$img=$info["photo"];
$status=$info["status"];
$status=wordwrap($status, 13, "<br/>\n");
if(empty($img))
{ $img="<img src='../avatars/nophoto.png' alt='photo' height='60' width='40'>";
} else { $img="<img src='../avatars/$img' alt='photo' height='60' width='40'>";
} echo"
<div class='user-info'><ul><li>$img <a href='profile.php?uid=$uid'>$username</a><br><a href='../mail/compose.php?rname=$username'>Send Message</a></li></ul></div>"; } if($currentpage>1)
{ echo" <a href='$self?currentpage=1'>[<b>First</b>]</a> "; $prevpage=$currentpage-1;
echo" <a href='$self?currentpage=$prevpage'>[<b>Prev</b>]</a> ";
} for($x=($currentpage-$range); $x<(($currentpage+$range)+1); $x++)
{ if(($x>0) &&($x<=$totalpages)) { if($x==$currentpage) { echo" [<font color='red'>$x</font>] "; } else { echo" <a href='$self?currentpage=$x'>[<b>$x</b>]</a> "; } } }
if($currentpage!=$totalpages)
{ $nextpage=$currentpage+1;
echo"<a href='$self?currentpage=$nextpage'>[<b>Next</b>]</a>";
echo"<a href='$self?currentpage=$totalpages'>[<b>Last</b>]</a>"; } } echo"<br><div class='link_button'><a href='index.php'>Go Back</div></a>";
include "../footer.php";
?>
