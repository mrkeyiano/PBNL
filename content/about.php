<?php
ERROR_REPORTING(0);
/*
Coded By: Oyebamiji Akorede (Harkorede)

Facebook: http://facebook.com/harkorede94

Email: (harkorede01@gmail.com)

CellPhone +2348029828364

Twitter: @harkorede94

WebSite: http://naijamobile.in
*/

include('../moduls/init.php');
if(!isloggedin())
{ header("location: ../index.php"); }
else { $user=$_SESSION["user"];
} echo"<title>$config->title &raquo; About Us</title>";
echo"<div class='body_width'>";
include "../topnav.php";
echo"<div align='center'>";
include "../ads.php";
fblike();
echo"</div>";
echo"<center>
<div class='public_message'><div class='success'></div></div>

</center>




<div style='margin-top: 5px;' class='grid3'>

<br />

</div>";
echo"<div class='grid3 middle'>
<div class='b_head'>About Us</center></div>";
?>

<p> <?php echo $config->title; ?> stands out among all Nigerian website portals not
only for its beautiful design and easy navigation but for its loaded, rich, priceless and unique contents.
The idea of <?php echo $config->title; ?> was concieved and  built from scratch by <b><?php echo $config->owner; ?></b> , the CEO, and thanks to my Friend <br />"<b><a href="http://fb.me/harkorede94">Oyebamiji Akorede</a></b>" <br /> aka <b><a href="http://facebook.com/harkorede94">Harkorede</a></b> for His support..
a seasoned webdesigner, web consultant and a specialist in web analysis with a degree in C.Sc. to bolster his ranks.
<br /> <br />After much consideration, scruitination and deliberation <?php echo $config->title; ?> was launched October 2
and since its inception, <?php echo $config->title; ?> has been providing immense  and un-quantifiable help and services to the Nigerian society
by keeping them abreast with the latest happenings in Free Browsing Technology, Entertainment, and unlimited free mobile contents for  mobile phones, laptops, ipads e.t.c .
<br /> <br />While focusing on the above <b><?php echo $config->title; ?></b> knows the level of job unemployment in the country and are doing their own little best to eradicate this menace by providing
online Legitimate money making tutorials and business ideas to the ever growing number of Nigerian youths.
<br /><br /><b><?php echo $config->title; ?></b> also extends its borders by organising eye - catching seminars and workshop to tutor Nigerian youths on some specialized areas
like pond making, construction of solar panels e.t.c.
<br /><br /><b><?php echo $config->title; ?></b> superlative and hardworking crew (admins) cannot be left unmentioned for their good and productive ideas. They are the brain behind </b><?php echo $config->title; ?></b>.
<br />This introductory text was composed and written by <b><?php echo $config->owner; ?></b>  of <b><?php echo $config->title; ?></b> a seasoned writer and web review expert.

<br /> <br /> <br /><center><span class="style1"><strong>ABOUT THE OWNER</strong></span></center>
Software expert and website wizard <b><?php echo $config->owner; ?></b> holds an admireable degree in C.Sc. From one of Nigerians priemere institutions.
<b><?php echo $config->title; ?></b> was established on Aug 25 by <b><?php echo $config->owner; ?></b> with the help of <b><a href="http://fb.me/harkorede94">Harkorede</a></b>, Nigerian priemere phone technologist.
He has recieved so many recognition, accolades and good will messages from his fans and well wishers. Above all <b><?php echo $config->owner; ?></b> is a humble
and an average Nigerian dude with a great perspective to life.</p>
<?php
echo"<br><div class='link_button'><a href='../member/index.php'>Go Back</a></div>
<br/></div>        <div class='clearfix'></div>
</div>
</div>";

?>
<!-- Footer -->
<?php
include('../footer.php'); ?>
