<?php
/*
Project: PBNL Forum v2.3

Coded By: Oyebamiji Akorede (Harkorede)

Facebook: http://facebook.com/harkorede94

Email: (harkorede01@gmail.com)

CellPhone +2348029828364

Twitter: @harkorede94

WebSite: http://naijamobile.in
*/
echo	'<style type="text/css">
.img
{
width:728px;
height:90px;
}

</style>';
echo	'<div class=\'ads\'>';
$num	=	5; #Put the number of random links you want here, maximum is 5
$ads	=	rand(2,$num);
$ad1	=	'<a href=\'http://naijamobile.in\'>
<img src=\'../images/banner.jpg\' alt=\'libra\'/></a>';
$ad2	=	'<a href=\'http://naijamobile.im/ad\'>
<img src=\'../images/banner.png\' alt=\'ad\'/></a>';
$ad3	=	'<a href=\'http://click.buzzcity.net/click.php?partnerid=72482\'>
<img src=\'http://show.buzzcity.net/show.php?partnerid=71566&get=mweb\' alt=\'m-phone\'/></a>';
$ad4	=	'<a href=\'http://ad.wapbux.com/go/9134120789\'>
<img src=\'http://show.buzzcity.net/show.php?partnerid=71566&get=mweb\' alt=\'facebook.mobi\'/></a>';
$ad5	=	'<a href=\'http://click.buzzcity.net/click.php?partnerid=71566\'>
<img src=\'../images/banner.jpg\' alt=\'tweet for free\'/></a>';

switch($ads)
{
case 1 : print $ad1.'<br>';
break;
case 2 : print $ad2.'<br>';
break;
case 3 : print $ad3.'<br>';
break;
case 4 : print $ad4.'<br>';
break;
case 5 : print $ad5.'<br>';
break;
default : print $s3nzo.'<br>';
}



?>
