<?php /*
Project: PBNL Forum v2.3

Coded By: Oyebamiji Akorede (Harkorede)

Facebook: http://facebook.com/harkorede94

Email: (harkorede01@gmail.com)

CellPhone +2348029828364

Twitter: @harkorede94

WebSite: http://naijamobile.in
*/
require("monit.php");
echo"<title>$config->title &raquo; Manage Users</title>";
echo"<div class='breadcrumb'><a href='../member/index.php'>Home</a> &raquo; Manage users</div>";
echo"<center>
          
            <br> 
        <img src='http://show.buzzcity.net/show.php?partnerid=71566&get=mweb' height='110' width='728'>        <br>
        <div class='public_message'><div class='success'></div></div> 
     
</center>";
echo"<div style='margin-top: 5px;' class='grid3'></div>";
echo"<div class='grid3 middle'>
                <div class='b_head'>
Search Users</div>";
echo "<br><br><b>Search By username:</b> ";
echo"<form action='#' method='POST'><ul><li><input type='text' name='q' /></li><li><center><input type='submit' name='submit' value='Search' class='button'></center></li></ul><br>";
$q=$_REQUEST["q"];
if(isset($q) && !empty($q))
{
$q=trim($q);
$q=cleanvalues($q);
$q=strtoupper($q);
//echo"you searched for $q";
//$u="is";
$self=$_SERVER["PHP_SELF"];
$rowsperpage=2;
$range=2;
if(isset($_GET["currentpage"]) && is_numeric($_GET["currentpage"]))
{
$currentpage=(int)$_GET["currentpage"];
}
else
{
$currentpage=1;
}
$offset=($currentpage-1)*$rowsperpage;
$numrows=mysql_num_rows(mysql_query("SELECT * from b_users WHERE UPPER(username) LIKE '%$q%' OR UPPER(username) LIKE '%$q' OR UPPER(username) LIKE '$q%'"));
$totalpages=ceil($numrows/$rowsperpage);
if($currentpage>$totalpages)
{
$currentpage=$totalpages;
}
if($currentpage<1)
{
$currentpage=1;
}
$query=mysql_query("SELECT * from b_users WHERE UPPER(username) LIKE '%$q%' OR UPPER(username) LIKE '%$q' OR UPPER(username) LIKE '$q%' LIMIT $offset, $rowsperpage");
$num=mysql_num_rows($query);
if($num==0)
{
echo"<div class='msg'>No result found</div>";
}
else
{
echo"<div class='title'><center>Search Results For $q</center></div><div class='gap'></div>";

while($info=mysql_fetch_assoc($query))
{
$username=cleanvalues2($info["username"]);
$id=$info["userID"];
echo"<ul><a href='profile.php?uid=$id'>$username</a></ul><div class='gap'></div>";
echo"<ul><li>[$i] $st$username<br/><a href='?action=Delete&yes=true&id=$id'>Rank</a></li></ul>";

//echo"<ul><li>[$i] $st$username<br/><a href='?action=rank&id=$id'>Rank</a></li></ul>";

if(isset($_GET["action"]))
{
$action=$_GET["action"];
}
else
{
$action=" ";
}
if($action=="Delete")
{
if(isset($_GET["yes"]) & $_GET["yes"]==true)
{ $id=(int)$_GET["id"];
$query=mysql_query("UPDATE b_users SET level='1' WHERE userID=$id");
if($query)
{
$msg="User Ranked Successfuly";
}
else
{
$msg=mysql_error();
}
header("location: ?msg=$msg");
exit();
}
$id=(int)$_GET["id"];
echo"<div class='topnav'>System Warning</div><div class='msg'>Are You Sure You want to Delete This User from $config->title Database ?</div><div class='gap'></div><div class='button'><a href='?action=Delete&yes=true&id=$id'>
<font color='red'>Yes</font></a> | <div class='right'><a href='user.php'>No</a></div></div>";
}

elseif($action=="rank")
{
$id=(int)$_GET["id"];
if(isset($_POST["submit"]))
{
$level=(int)$_POST["level"];
$rank=getrank($level);
mysql_query("UPDATE b_users SET level='1' WHERE userID=$id") or die(mysql_error());
$msg="User Ranked $rank Successfully";
header("location: ?msg=$msg");
exit();
echo"$msg";
}
$username=user_info2($id, username);
$img=user_info2($id, photo);
$level=user_info2($id, level);
$rank=getrank($level);
}


}
if($page>1)
{
$prev=$page-1;
echo"<a href='?page=$prev'><b>Previous</b></a>";

}
if($currentpage>1)
{
echo"<a href='$self?currentpage=1&q=$q'>[<b>First</b>]</a>";
$prevpage=$currentpage-1;
echo"<a href='$self?currentpage=$prevpage&q=$q'>[<b>Prev</b>]</a>";
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
echo"<a href='$self?currentpage=$x&q=$q'>[<b>$x</b>]</a>";
}
}
}
if($currentpage!=$totalpages)
{
$nextpage=$currentpage+1;
echo"<a href='$self?currentpage=$nextpage&q=$q'>[<b>Next</b>]</a>";
echo"<a href='$self?currentpage=$totalpages&q=$q'>[<b>Last</b>]</a>";
}}
}

echo"<div class='link_button'><a href='#'>GO BACK</a></div>";
include "../footer.php";
?>
