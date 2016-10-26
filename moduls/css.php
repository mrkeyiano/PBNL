<?php
ERROR_REPORTING(0);/*
Project: PBNL Forum v2.3

Coded By: Oyebamiji Akorede (Harkorede)

Facebook: http://facebook.com/harkorede94

Email: (harkorede01@gmail.com)

CellPhone +2348029828364

Twitter: @harkorede94

WebSite: http://naijamobile.in
*/

if(preg_match('/(apple|iphone|ipod)/i', $_SERVER['HTTP_USER_AGENT']) && preg_match('/mobile/i', $_SERVER['HTTP_USER_AGENT']))

               $browser   = "mobile";



           // Other mobile browsers render as mobile

if(preg_match('/(blackberry|configuration\/cldc|hp |hp-|htc |htc_|htc-|iemobile|kindle|midp|mmp|motorola|mobile|nokia|opera mini|opera mobi|palm|palmos|pocket|portalmmm|ppc;|smartphone|sonyericsson|sqh|spv|symbian|treo|up.browser|up.link|vodafone|windows ce|xda |xda_)/i', $_SERVER['HTTP_USER_AGENT']))

         $browser   = "mobile";

            // Wap browser

if(((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'text/vnd.wap.wml') > 0) || (strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml')>0)) || ((isset($_SERVER['HTTP_X_WAP_PROFILE']) || isset($_SERVER['HTTP_PROFILE']))))

               $browser = mobile;

            

            // Shortend user agents

         if(in_array(strtolower(substr($_SERVER['HTTP_USER_AGENT'],0,3)),array('lg '=>'lg ','lg-'=>'lg-','lg_'=>'lg_','lge'=>'lge')))

               $browser = "mobile";

            

            // More shortend user agents

            if(in_array(strtolower(substr($_SERVER['HTTP_USER_AGENT'],0,4)),array('acs-'=>'acs-','amoi'=>'amoi','doco'=>'doco','eric'=>'eric','huaw'=>'huaw','lct_'=>'lct_','leno'=>'leno','mobi'=>'mobi','mot-'=>'mot-','moto'=>'moto','nec-'=>'nec-','phil'=>'phil','sams'=>'sams','sch-'=>'sch-','shar'=>'shar','sie-'=>'sie-','wap_'=>'wap_','zte-'=>'zte-')))

$browser   = "mobile";  

            // Render mobile site for mobile search engines

 if(preg_match('/Googlebot-Mobile/i', $_SERVER['HTTP_USER_AGENT']) || preg_match('/YahooSeeker\/M1A1-R2D2/i', $_SERVER['HTTP_USER_AGENT']))

               $browser   = "mobile";

if($browser=='mobile')

	echo '<link rel="stylesheet" href="'.$config->url.'content/css/'.$config->css.'mobile.css" type="text/css" media="all" />';

else

	echo '<link rel="stylesheet" href="'.$config->url.'content/css/'.$config->css.'pc.css" type="text/css" media="all" />';
?>