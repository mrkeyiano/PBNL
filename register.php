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
require("init.php");
echo"<title>$configg->title &raquo; Registration</title>";

echo"<div class='body_width'><div class='page_wrapper clearfix'><div class='middle'><p class='b_head' style='margin-left: 3px; text-align:center;'>Sign up</p>
<div class='m_signup'><center><span class='style1'><u><font color='black'> $config->title REGISTRATION RULES!</font></u></span><br><div class='gap'></div><ul>
<div class='center'><font color='red'>*</font> Use decent username & it must not be more than <font color='red'><b>15</b></font> letters<br/>
<font color='red'>*</font>Please fill your correct school details so that appropriate contents can be channeled to you.<br/>
<font color='red'>*</font>Please Select Aspirant, Student Or Graduate </div></ul><hr>";
?>
<?php if($_POST["submit"])
{
//Retrieve form values
$username=$_POST["username"];
$password=$_POST["password"];
$number=$_POST["number"];
$email=$_POST["email"];
$country=$_POST["country"];
$state=$_POST["state"];
$sex=$_POST["sex"];
$school=$_POST["school"];
$position=$_POST["position"];
$erros=array();

//clean up the values
$username=cleanvalues($username);
$password=cleanvalues($password);
$email=cleanvalues($email);
$number=cleanvalues($number);
$country=cleanvalues($country);
$state=cleanvalues($state);
$sex=cleanvalues($sex);
$school=cleanvalues($school);
$position=cleanvalues($position);

//Validate values & store errors
//username
if(empty($username)||strlen($username)<4)
{
$errors[]="username too short";
}
if(strlen($username)>25)
{
$errors[]="username too long";
}

$checkuser=mysql_query("SELECT *  FROM b_users WHERE username='$username'");
if(mysql_num_rows($checkuser)>0)
{
$errors[]="This Username already exists";
}

if(!preg_match("^[A-Za-z0-9]+$^", "$username"))
{
$errors[]="Username contains invalid characters";
}
//Email
if(!preg_match("/([\w\-]+\@[\w\-]+.[\w\-]+)/", $email) || strlen($email)<4)
{
$errors[]="invalid email address entered";
}
$checkemail=mysql_query("SELECT * FROM b_users WHERE email='$email'");

if(mysql_num_rows($checkemail)>0)
{
$errors[]="Email already exist";
}
//NUMBER
$checknumber=mysql_query("SELECT * FROM b_users WHERE number='$number'");
if(mysql_num_rows($checknumber)>0||!ctype_digit($number)||strlen($number)<4)
{
$error[]="this number already exists";
}

if(count($errors)==0)
{//ERROR FREE
//echo "success";

$spassword=md5($password);
//PREPARE UR CODE
$supervalue=$value;
$day=date("U");
$seedval=$day%10000;
srand($seedval);
$key=RAND(1000000, 2000000);
$query="INSERT INTO b_users(username,password,email,keynode,validated,number,country,sex,school,position,state,regtime) values('$username','$spassword','$email','$key','1','$number','$country', '$sex', '$school', '$position', '$state','$date')";
$query2=mysql_query($query) or die(mysql_error());
$regmsg="Your Registration was successful. Please Login now";
header("location: index.php?msg=$regmsg");
exit();
}
else
{//GAT SOME ERROR ??
foreach($errors as $error){ $tmp.="$error<br/>"; }
}
}
if($tmp!=" ") echo "<div class='msg'>$tmp</div>"; ?><form action="#" method="POST">
<center>Username<br/>
<input type="text" name="username"><br/>
Password<br/><input type="password" name="password"><br/>
Email<br/>
<input type="text" name="email" values="email">
<br/>


<center>Your Sex<br> <select name='sex'><option value='Male'>Male</option><option value='Female'>Female</option>--SELECT---</option>";
echo"</select></center>

<br/>


<center>Current or Aspiring Institution <br> <select name='school'><option value="None Selected">Select Institution</option>

<option value="absu">Abia State University (absu)</option>
<option value="atbu">Abubakar Tafawa Balewa University (atbu)</option>
<option value="achievers">Achievers University (achievers)</option>

<option value="adsu">Adamawa State University (adsu)</option>
<option value="aaua">Adekunle Ajasin University (aaua)</option>
<option value="adeleke">Adeleke University (adeleke)</option>
<option value="afebabalola">Afe Babalola University (afebabalola)</option>
<option value="abu">Ahmadu Bello University (abu)</option>
<option value="ajayi">Ajayi Crowther University (ajayi)</option>

<option value="akutech">Akwa Ibom State University (akutech)</option>
<option value="al-hikmah">Al-Hikmah University (al-hikmah)</option>
<option value="aau">Ambrose Alli University  (aau)</option>
<option value="aun">American University of Nigeria (aun)</option>
<option value="ansu">Anambra State University (ansu)</option>
<option value="babcock">Babcock University (babcock)</option>

<option value="basu">Bauchi State University (basu)</option>
<option value="buk">Bayero University Kano (buk)</option>
<option value="baze">Baze University (baze)</option>
<option value="bells">Bells University of Technology (bells)</option>
<option value="biu">Benson Idahosa University (biu)</option>
<option value="bsu">Benue State University  (bsu)</option>

<option value="Bingham">Bingham University (Bingham)</option>
<option value="bu">Bowen University (bu)</option>
<option value="bukar">Bukar Abba Ibrahim University (bukar)</option>
<option value="caleb">Caleb University (caleb)</option>
<option value="caritas">Caritas University (caritas)</option>
<option value="catholic">Catholic University of Nigeria (catholic)</option>

<option value="cetep">Cetep University (cetep)</option>
<option value="cu">Covenant University (cu)</option>
<option value="crawford">Crawford University (crawford)</option>
<option value="crescent">Crescent University (crescent)</option>
<option value="crutech">Cross River State University of Technology (crutech)</option>
<option value="delsu">Delta State University (delsu)</option>

<option value="ebsu">Ebonyi State University (ebsu)</option>
<option value="eksu">Ekiti State University (eksu)</option>
<option value="esut">Enugu State University Of Science And Technology  (esut)</option>
<option value="fuam">Federal University Of Agriculture, Makurdi (fuam)</option>
<option value="fupre">Federal University of Petroleum Resource (fupre)</option>
<option value="futa">Federal University of Technology Akure (futa)</option>

<option value="futminna">Federal University of Technology Minna (futminna)</option>
<option value="futyola">Federal University of Technology Yola (futyola)</option>
<option value="futo">Federal University of Technology, Owerri (futo)</option>
<option value="fud">Federal University, Dutse (fud)</option>
<option value="fudm">Federal University, Dutsin-ma (fudm)</option>
<option value="fuk">Federal University, Kashere (fuk)</option>

<option value="ful">Federal University, Lafia (ful)</option>
<option value="fulokoja">Federal University, Lokoja (fulokoja)</option>
<option value="funai">Federal University, Ndufu-alike (funai)</option>
<option value="fuotuoke">Federal University, Otuoke (fuotuoke)</option>
<option value="fuoye">Federal University, Oye-ekiti (fuoye)</option>
<option value="fuwukari">Federal University, Wukari (fuwukari)</option>

<option value="fountain">Fountain University (fountain)</option>
<option value="go">Godfrey Okoye University (go)</option>
<option value="gomsu">Gombe State university  (gomsu)</option>
<option value="ibbu">Ibrahim Badamasi Babangida University (ibbu)</option>
<option value="iuo">Igbinedion University (iuo)</option>
<option value="imsu">Imo State University (imsu)</option>

<option value="jabu">Joseph Ayo Babalola University (jabu)</option>
<option value="kasu">Kaduna State university (kasu)</option>
<option value="kust">Kano University Of Science And Technology (kust)</option>
<option value="katsu">Katsina University (katsu)</option>
<option value="ksusta">Kebbi State University Of Science And Technology (ksusta)</option>
<option value="ksu">kogi State University (ksu)</option>

<option value="kwasu">Kwara State University (kwasu)</option>
<option value="kwararafa">Kwararafa University (kwararafa)</option>
<option value="lautech">Ladoke Akintola University of Technology (lautech)</option>
<option value="lasu">Lagos State University (lasu)</option>
<option value="Landmark">Landmark University (Landmark)</option>
<option value="lcu">Lead City University (lcu)</option>

<option value="madonna">Madonna University (madonna)</option>
<option value="moua">Michael Okpara University of Agriculture (moua)</option>
<option value="Nsuk">Nasarawa State University (Nsuk)</option>
<option value="noun">National Open University of  Nigeria (noun)</option>
<option value="ndu">Niger Delta University (ndu)</option>
<option value="ntnu">Nigeria Turkish Nile University (ntnu)</option>

<option value="unizik">Nnamdi Azikiwe University (unizik)</option>
<option value="novena">Novena University (novena)</option>
<option value="oau">Obafemi Awolowo University  (oau)</option>
<option value="ou">Obong University (ou)</option>
<option value="oduduwa">Oduduwa University (oduduwa)</option>
<option value="oou">Olabisi Onabanjo University  (oou)</option>

<option value="osustech">Ondo State University of Science and Technology (osustech)</option>
<option value="uniosun">Osun State University  (uniosun)</option>
<option value="paul">Paul University (paul)</option>
<option value="pti">Petroleum Training Institute (pti)</option>
<option value="plasu">Plateau State University (plasu)</option>
<option value="ru">Redeemer's University (ru)</option>

<option value="rnu">Renaissance University (rnu)</option>
<option value="rhema">Rhema University (rhema)</option>
<option value="rsust">Rivers State University of Science and Technology  (rsust)</option>
<option value="salem">Salem University (salem)</option>
<option value="sau">Samuel Adegboyega University (sau)</option>
<option value="tasued">Tai Solarin University of Education  (tasued)</option>

<option value="tansain">Tansain University (tansain)</option>
<option value="tasu">Taraba State University (tasu)</option>
<option value="tunedik">The University Of Education, Ikere-Ekiti (tunedik)</option>
<option value="umyu">Umaru Musa Yar'adua University (umyu)</option>
<option value="uniabuja">University of Abuja (uniabuja)</option>
<option value="unaab">University of Agriculture, Abeokuta (unaab)</option>

<option value="uam">University of Agriculture, Makurdi (uam)</option>
<option value="uniben">University of Benin (uniben)</option>
<option value="unical">University of Calabar (unical)</option>
<option value="ui">University of Ibadan (ui)</option>
<option value="unilorin">University of Ilorin (unilorin)</option>
<option value="unijos">University of Jos (unijos)</option>

<option value="unilag">University of Lagos (unilag)</option>
<option value="unimaid">University of Maiduguri (unimaid)</option>
<option value="unimkar">University Of Mkar (unimkar)</option>
<option value="unn">University of Nigeria (unn)</option>
<option value="uniport">University of Port-Harcourt (uniport)</option>
<option value="usti">University Of Science And Technology, Ifaki-ekiti (usti)</option>

<option value="uniuyo">University of Uyo  (uniuyo)</option>
<option value="udusok">Usman Dan Fodio University  (udusok)</option>
<option value="veritas">Veritas University, Abuja (veritas)</option>
<option value="wellspring">Wellspring University (wellspring)</option>
<option value="wusto">Wesley University Of Science And Technology (wusto)</option>
<option value="wdu">Western Delta University (wdu)</option>

<option></option>
<option value="http://www.myschoolcomm.com" class="black_bg_white_text">Polytechnics</option>
<option value="agp">Abdul-gusau Polytechnic (agp)</option>
<option value="abiapoly">Abia State polytechnic  (abiapoly)</option>
<option value="aap">Abraham Adesanya Polytechnic (aap)</option>
<option value="atap">Abubakar Tatari Ali Polytechnic (atap)</option>

<option value="adamawapoly">Adamawa State polytechnic (adamawapoly)</option>
<option value="aflon">Aflon Digital Institute (aflon)</option>
<option value="afrihub">Afrihub Ict Institute (afrihub)</option>
<option value="abuth">Ahmadu Bello University Teaching Hospital (abuth)</option>
<option value="afit">Air Force Institute Of Technology (afit)</option>
<option value="akanupoly">Akanu Ibiam Federal polytechnic (akanupoly)</option>

<option value="aocayandev">Akperan Orshi College Of Agriculture (aocayandev)</option>
<option value="aiscas">Akwa Ibom State College Of Arts And Science (aiscas)</option>
<option value="akwaibompoly">Akwa Ibom State polytechnic  (akwaibompoly)</option>
<option value="alloverpoly">Allover central polytechnic (alloverpoly)</option>
<option value="acmgt">Ambassador College Of Management And Technology (acmgt)</option>
<option value="actps">Ambassador College Of Technology And Paralegal Studies (actps)</option>

<option value="akath">Aminu Kano Teaching Hospital (akath)</option>
<option value="arewa">Arewa Paralegal Innovation Enterprise (arewa)</option>
<option value="auchipoly">Auchi polytechnic (auchipoly)</option>
<option value="audubako">Audu Bako College Of Agriculture Danbatta (audubako)</option>
<option value="benpoly">Benue State Poly (benpoly)</option>
<option value="buckiepoly">Buckingham Academy Of Management And Technology (buckiepoly)</option>

<option value="beec">Business Education Examination Council (beec)</option>
<option value="ccae">Centre For Creative Arts Education (ccae)</option>
<option value="cifman">Cifman Institute Of Techn. & Management (cifman)</option>
<option value="citygate">City Gate Institute Of Innovation And Technology (citygate)</option>
<option value="coabs">College Of Administrative And Business Studies (coabs)</option>
<option value="coaas">College Of Agriculture And Animal Science (coaas)</option>

<option value="coaha">College Of Agriculture, Hadijia (coaha)</option>
<option value="coaja">College Of Agriculture, Jalingo (coaja)</option>
<option value="coaka">College Of Agriculture, Kabba (coaka)</option>
<option value="coala">College Of Agriculture, Lafia (coala)</option>
<option value="coazu">College Of Agriculture, Zuru (coazu)</option>
<option value="copoly">Covenant Polytechnic, Aba (copoly)</option>

<option value="crownpoly">Crown Polytechnic (crownpoly)</option>
<option value="dalewares">Dalewares Institute Of Technology (dalewares)</option>
<option value="delscoa">Delta State College Of Agriculture (delscoa)</option>
<option value="deltapoly">Delta state polytechnic (deltapoly)</option>
<option value="diabo">Diabo Paralegal Training Institute (diabo)</option>
<option value="dorbenpoly">Dorben polytechnic (dorbenpoly)</option>

<option value="dreamville">Dreamville Ltd (ladela School Abuja) (dreamville)</option>
<option value="edsca">Edo State College Of Agriculture (edsca)</option>
<option value="esitm">Edo State Institute Of Technology And Management (esitm)</option>
<option value="farmark">Farmark Institute Of Employment And Creativity Kaduna (farmark)</option>
<option value="fcaa">Federal College Of Agriculture, Akure (fcaa)</option>
<option value="fcai">Federal College Of Agriculture, Ishiagu (fcai)</option>

<option value="fcamp">Federal College Of Agriculture, Moor Plantation (fcamp)</option>
<option value="fcahptib">Federal College Of Animal Health & Production Tech, Ibadan (fcahptib)</option>
<option value="fcahptvom">Federal College Of Animal Health & Production Tech, Vom (fcahptvom)</option>
<option value="marinecollege">Federal College Of Fisheries And Marine Tech. V.I. (marinecollege)</option>
<option value="fcftib">Federal College Of Forestry Technology, Ibadan (fcftib)</option>

<option value="fcfjos">Federal College Of Forestry, Jos (fcfjos)</option>
<option value="fcfmaf">Federal College Of Forestry, Mechanisation, Afaka (fcfmaf)</option>
<option value="fcfftbo">Federal College Of Freshwater Fisheries Tech, Baga (fcfftbo)</option>
<option value="fcfftnewbussa">Federal College Of Freshwater Fisheries Tech, New Bussa (fcfftnewbussa)</option>
<option value="fchkowa">Federal College Of Horticulture, Dadin Kowa (fchkowa)</option>
<option value="fclrtkuru">Federal College Of Land Resources Technology, Kuru (fclrtkuru)</option>

<option value="fclrto">Federal College Of Land Resources Technology, Owerri (fclrto)</option>
<option value="fcotigbobi">Federal College Of Orthopedic Technology, Igbobi (fcotigbobi)</option>
<option value="fcwm">Federal College Of Wildlife Management, New Bussa (fcwm)</option>
<option value="fccibadan">Federal Cooperative College, Ibadan (fccibadan)</option>
<option value="fcckaduna">Federal Cooperative College, Kaduna (fcckaduna)</option>
<option value="fccojiriver">Federal Cooperative College, Oji River (fccojiriver)</option>

<option value="ekitipoly">Federal polytechnic, Ado-Ekiti  (ekitipoly)</option>
<option value="balipoly">Federal Polytechnic, Bali (balipoly)</option>
<option value="bauchipoly">Federal polytechnic, Bauchi  (bauchipoly)</option>
<option value="bidapoly">Federal polytechnic, Bida  (bidapoly)</option>
<option value="birnin-kebbipoly">Federal polytechnic, Birnin-Kebbi  (birnin-kebbipoly)</option>
<option value="damaturupoly">Federal polytechnic, Damaturu  (damaturupoly)</option>

<option value="edepoly">Federal polytechnic, Ede  (edepoly)</option>
<option value="idahpoly">Federal polytechnic, Idah  (idahpoly)</option>
<option value="ilaropoly">Federal polytechnic, Ilaro (ilaropoly)</option>
<option value="fedponam">Federal Polytechnic, Kaura Namoda (fedponam)</option>
<option value="mubipoly">Federal polytechnic, Mubi  (mubipoly)</option>
<option value="nasarawapoly">Federal polytechnic, Nasarawa  (nasarawapoly)</option>

<option value="nekedepoly">Federal polytechnic, Nekede  (nekedepoly)</option>
<option value="offapoly">Federal Polytechnic, Offa  (offapoly)</option>
<option value="okopoly">Federal polytechnic, Oko  (okopoly)</option>
<option value="fedsdtten">Federal School Of Dental Technology And Therapy, Enugu (fedsdtten)</option>
<option value="fssoyo">Federal School Of Surveying, Oyo (fssoyo)</option>
<option value="fideipoly">Fidei Polytechnic, Gboko (fideipoly)</option>

<option value="flyingdove">Flyingdove Institute Of Information Technology, Abuja (flyingdove)</option>
<option value="gatewaypoly">Gateway polytechnic Saapade  (gatewaypoly)</option>
<option value="gracepoly">Grace Polytechnic, Lagos (gracepoly)</option>
<option value="hukpoly">Hassan Usman Katsina Poly (hukpoly)</option>
<option value="heritage">Heritage Polytechnic (heritage)</option>
<option value="highland">Highland College Of Tech. & Further Education (highland)</option>

<option value="hussainipoly">Hussaini Adamu Federal polytechnic (hussainipoly)</option>
<option value="ifotech">Ifo College Of Management And Technology (ifotech)</option>
<option value="igbajopoly">Igbajo Polytechnic (igbajopoly)</option>
<option value="imfi">Imfi, Ict Academy, Uyo (imfi)</option>
<option value="imopoly">Imo State Polytechnic (imopoly)</option>
<option value="iitkad">Innovation Institute Of Technology, Kaduna (iitkad)</option>

<option value="imte">Institute of Management Technology, Enugu  (imte)</option>
<option value="iphoau">Institute Of Public Health (OAU), Ile-ife (iphoau)</option>
<option value="interlink">Interlink Polytechnic (interlink)</option>
<option value="jsiit">Jigawa State Institute Of Information Technology (jsiit)</option>
<option value="jigpoly">Jigawa State Polytechnic (jigpoly)</option>
<option value="kbs">Kaduna Business School (kbs)</option>

<option value="kadpoly">Kaduna Polytechnic (kadpoly)</option>
<option value="kanopoly">Kano State polytechnic (kanopoly)</option>
<option value="karrox">Karrox-ugrl Computer Education & Training Centre (karrox)</option>
<option value="kingspoly">Kings Polytechnic (kingspoly)</option>
<option value="ksp">Kogi State Polytechnic (ksp)</option>
<option value="kwarapoly">Kwara State polytechnic  (kwarapoly)</option>

<option value="lcccl">Lagos City Computer College, Lagos (lcccl)</option>
<option value="lagoscitypoly">Lagos City polytechnic  (lagoscitypoly)</option>
<option value="lagospoly">Lagos State polytechnic  (lagospoly)</option>
<option value="lanistephens">Lani Stephens Music Institute (lanistephens)</option>
<option value="laserpgc">Laser Petroleum Geo-sciences Centre (laserpgc)</option>
<option value="lighthousepoly">Light House Polytechnic (lighthousepoly)</option>

<option value="linetpaul">Linet Paul Innovative Institute (linetpaul)</option>
<option value="lcmt">Literacy College Of Management And Technology (lcmt)</option>
<option value="lufodo">Lufodo Academy Of Performing Arts (lufodo)</option>
<option value="mlcamai">Mahammed Lawan College Of Agriculture, Maiduguri (mlcamai)</option>
<option value="myhias">Mallam Yahaya Hamza Institute Of Advance Studies, (myhias)</option>
<option value="maritimeacademy">Maritime Academy of Nigeria (maritimeacademy)</option>

<option value="metit">Metropolitan Institute Of Technology (metit)</option>
<option value="moshoodabiolapoly">Moshood Abiola polytechnic (moshoodabiolapoly)</option>
<option value="naspoly">Nasarawa State Polytechnic (naspoly)</option>
<option value="coamokwa">Niger State College Of Agriculture, Mokwa (coamokwa)</option>
<option value="nigerpoly">Niger State polytechnic (nigerpoly)</option>
<option value="nasme">Nigeria Army School Of Military Engineering, Makurdi (nasme)</option>

<option value="ncat">Nigerian College of Aviation Technology (ncat)</option>
<option value="niit">NIIT (niit)</option>
<option value="nuhubamallipoly">Nuhu Bamalli polytechnic (nuhubamallipoly)</option>
<option value="osuntechcollege">Osun State College of Technology (osuntechcollege)</option>
<option value="osunpoly">Osun State polytechnic (osunpoly)</option>
<option value="osisatech">Our Saviour Institute of Science, Agric. & Tech. (osisatech)</option>

<option value="oyscai">Oyo State College Of Agriculture (oyscai)</option>
<option value="plascag">Plateau State College Of Agriculture, Garkawa (plascag)</option>
<option value="plaspoly">Plateau State Polytechnic (plaspoly)</option>
<option value="polysok">Polytechnic Of Sokoto (polysok)</option>
<option value="ramatpoly">Ramat polytechnic (ramatpoly)</option>
<option value="riverspoly">River State polytechnic (riverspoly)</option>

<option value="rivcas">Rivers State College Of Arts And Science (rivcas)</option>
<option value="rschst">Rivers State College Of Health Science And Technology (rschst)</option>
<option value="ronik">Ronik Polytechnic (ronik)</option>
<option value="rufusgiwapoly">Rufus Giwa polytechnic (rufusgiwapoly)</option>
<option value="samca">Samaru College Of Agriculture (samca)</option>
<option value="soab">School Of Agriculture, Bauchi (soab)</option>

<option value="soai">School Of Agriculture, Ikorodu (soai)</option>
<option value="sichstmakarfi">Shehu Idris College Of Health Sci & Tech, Makarfi (sichstmakarfi)</option>
<option value="secceit">South Eastern College of Computer Engineering and Info. Tech. (secceit)</option>
<option value="sniit">Southern-nigeria Institute Of Innovative Technology (sniit)</option>
<option value="templegatepoly">Temple-gate Polytechnic (templegatepoly)</option>
<option value="ibadanpoly">The polytechnic, Ibadan  (ibadanpoly)</option>

<option value="polyife">The Polytechnic, Ile-Ife (polyife)</option>
<option value="simtech">The School Of Information And Media Technology (simtech)</option>
<option value="wufpbk">Waziri Umaru Fed. Polytechnic Birnin Kebbi (wufpbk)</option>
<option value="wolex">Wolex Polytechnic (wolex)</option>
<option value="yabatech">Yaba College of Technology (yabatech)</option>
<option></option>

<option value="http://www.myschoolcomm.com" class="black_bg_white_text">College of Education</option>
<option value="ascoed">Abia State College Of Education (ascoed)</option>
<option value="adacoed">Adamu Augie College Of Education (adacoed)</option>
<option value="aocoed">Adeniran Ogunsanya College of Education (aocoed)</option>
<option value="aceondo">Adeyemi College Of Education, Ondo (aceondo)</option>
<option value="atcoicoed">African Thinkers Community Of Inquiry College Of Education (atcoicoed)</option>

<option value="akscoed">Akwa-ibom State College Of Education (akscoed)</option>
<option value="alhikma">Alhikma College Of Education (alhikma)</option>
<option value="allscoed">All States College Of Education, Akure (allscoed)</option>
<option value="alvan">Alvan Ikoku College Of Education (alvan)</option>
<option value="angelcrown">Angel Crown College Of Education (angelcrown)</option>
<option value="ansaruddeen">Ansar-ud-deen College Of Education (ansaruddeen)</option>

<option value="apacoed">Apa College Of Education (apacoed)</option>
<option value="ariscoed">Arabic And Islamic College Of Education (ariscoed)</option>
<option value="asscoed">Assanusiyah College Of Education (asscoed)</option>
<option value="adcoed">Awori District College Of Education (adcoed)</option>
<option value="bauchiiais">Bauchi Institute For Arabic And Islamic Studies (bauchiiais)</option>
<option value="bycoed">Bayelsa State College Of Education (bycoed)</option>

<option value="bayotijani">Bayotijani College Of Education (bayotijani)</option>
<option value="blcoed">Best Legacy College Of Education (blcoed)</option>
<option value="cfcoed">Calvin Foundation College Of Education (cfcoed)</option>
<option value="citycoed">City College Of Education (citycoed)</option>
<option value="coeaghor">College Of Education, Agbor (coeaghor)</option>
<option value="coeakwanga">College Of Education, Akwanga (coeakwanga)</option>

<option value="coeankpa">College Of Education, Ankpa (coeankpa)</option>
<option value="coeazare">College Of Education, Azare (coeazare)</option>
<option value="coeeki">College Of Education, Ekiadolor (coeeki)</option>
<option value="foreignlinks">College Of Education, Foreign Links Campus Moro (foreignlinks)</option>
<option value="coekc">College Of Education, Gidan-waya, Kafanchan (coekc)</option>
<option value="coegindiri">College Of Education, Gindiri (coegindiri)</option>

<option value="coehong">College Of Education, Hong (coehong)</option>
<option value="coeigueben">College Of Education, Igueben (coeigueben)</option>
<option value="coeikere">College Of Education, Ikere (coeikere)</option>
<option value="coeilemona">College Of Education, Ilemona (coeilemona)</option>
<option value="coeilesa">College Of Education, Ilesha (coeilesa)</option>
<option value="coeilorin">College Of Education, Ilorin (coeilorin)</option>

<option value="coejalingo">College Of Education, Jalingo (coejalingo)</option>
<option value="coekatsina">College Of Education, Katsina-ala (coekatsina)</option>
<option value="coedlfg">College Of Education, Lafiagi (coedlfg)</option>
<option value="coemaru">College Of Education, Maru (coemaru)</option>
<option value="coeminna">College Of Education, Minna (coeminna)</option>
<option value="coemoro">College Of Education, Moro-ife (coemoro)</option>

<option value="coeoju">College Of Education, Oju (coeoju)</option>
<option value="coeoro">College Of Education, Oro (coeoro)</option>
<option value="coeport">College Of Education, Port Harcourt (coeport)</option>
<option value="coewaka">College Of Education, Waka-biu (coewaka)</option>
<option value="coewarri">College Of Education, Warri (coewarri)</option>
<option value="cornerstone">Cornerstone College Of Education, Lagos (cornerstone)</option>

<option value="crscoed">Cross River State College Of Education (crscoed)</option>
<option value="delarcoed">Delar College Of Education (delarcoed)</option>
<option value="dscope">Delta State College Of Physical Education (dscope)</option>
<option value="ebecoed">Ebenezer College Of Education (ebecoed)</option>
<option value="ebscoed">Ebonyi State College Of Education (ebscoed)</option>
<option value="elderoyama">Elder Oyama Memorial College Of Education (elderoyama)</option>

<option value="eacoedoyo">Emmanuel Alyande College Of Education (eacoedoyo)</option>
<option value="escet">Enugu State College Of Education, Technical (escet)</option>
<option value="fctcoezuba">FCT College Of Education, Zuba (fctcoezuba)</option>
<option value="fceoyo">Federal College Of Education (Special), Oyo (fceoyo)</option>
<option value="fcetbichi">Federal College Of Education (Techinical) Bichi (fcetbichi)</option>
<option value="fcetakoka">Federal College Of Education (Technical) Akoka (fcetakoka)</option>

<option value="fcegusau">Federal College Of Education (Technical) Gusau (fcegusau)</option>
<option value="fcetomoku">Federal College Of Education (Technical) Omoku (fcetomoku)</option>
<option value="fceabeokuta">Federal College Of Education Abeokuta (fceabeokuta)</option>
<option value="fceasaba">Federal College Of Education Asaba (fceasaba)</option>
<option value="fcekatsina">Federal College Of Education Katsina (fcekatsina)</option>
<option value="fcekg">Federal College Of Education Kontagora (fcekg)</option>

<option value="fceobudu">Federal College Of Education Obudu (fceobudu)</option>
<option value="fceokene">Federal College Of Education Okene (fceokene)</option>
<option value="fceumunze">Federal College Of Education Umunze (fceumunze)</option>
<option value="fceyola">Federal College Of Education Yola (fceyola)</option>
<option value="fcezaria">Federal College Of Education Zaria (fcezaria)</option>
<option value="fceahaamufu">Federal College Of Education, Eha-amufu (fceahaamufu)</option>

<option value="fcegombe">Federal College Of Education, Gombe (fcegombe)</option>
<option value="fcekano">Federal College Of Education, Kano (fcekano)</option>
<option value="fcepankshin">Federal College of Education, Pankshin (fcepankshin)</option>
<option value="fcepotiskum">Federal College Of Education, Potiskum (fcepotiskum)</option>
<option value="hwcoed">Havard Wilson College Of Education, Aba (hwcoed)</option>
<option value="hillcoed">Hill College Of Education (hillcoed)</option>

<option value="iaisolodo">Institute Of Arabic And Islamic Studies, Olodo (iaisolodo)</option>
<option value="ikcoed">Isa Kaita College Of Education (ikcoed)</option>
<option value="jnicoed">Jama'atu Nasir Islam College Of Education, Kaduna (jnicoed)</option>
<option value="jcaie">Jibwis College Of Arabic And Islamic Education, Gombe (jcaie)</option>
<option value="jigcoed">Jigawa State College Of Education, Gumel (jigcoed)</option>
<option value="kanocoek">Kano State College Of Education, Kambotso (kanocoek)</option>

<option value="kicoem">Kashim-ibrahim College Of Education, Maiduguri (kicoem)</option>
<option value="kscoed">Kebbi State College Of Education, Argungu (kscoed)</option>
<option value="kinseycoed">Kinsey College Of Education, Ilorin (kinseycoed)</option>
<option value="kcoeo">Kwararafa College Of Education, Otukpo (kcoeo)</option>
<option value="mocped">Michael Otedola College Of Primary Education, Moforiji (mocped)</option>
<option value="mogcolis">Mohammed Goni College Of Legal And Islamic Studies (mogcolis)</option>

<option value="mulcoed">Muftau' Lanihun College Of Education (mulcoed)</option>
<option value="mcoed">Muhyldeen College Of Education, Ilorin (mcoed)</option>
<option value="mcoeiails">Murtadha Col. Of Edu. Inst. Of Arabic & Islamic Legal Studies (mcoeiails)</option>
<option value="namcoed">Nana Aishat Memorial College Of Education (namcoed)</option>
<option value="nocoed">Nwafor Orizu College Of Education, Nsugbe (nocoed)</option>
<option value="ocoeda">Onit College Of Education Abagana (ocoeda)</option>

<option value="ossceila">Osun State College Of Education, Ila-orangun (ossceila)</option>
<option value="oyocoed">Oyo State College Of Education (oyocoed)</option>
<option value="royalcoed">Royal City College Of Education (royalcoed)</option>
<option value="sscoesok">Shehu Shagari College Of Education, Sokoto (sscoesok)</option>
<option value="sacoed">St. Augustine College Of Education (sacoed)</option>
<option value="taccoed">The African Church College Of Education (taccoed)</option>

<option value="coensukka">The College Of Education, Nsukka (coensukka)</option>
<option value="topcoed">Topmost College Of Education (topcoed)</option>
<option value="uscoega">Umar Suleiman College Of Education, Gashua (uscoega)</option>
<option value="uecoeddut">Umar-ibn Ei-kanemi College Of Education, Dutsinma (uecoeddut)</option>
<option value="unitycoed">Unity College Of Education, Aukpa-adoka (unitycoed)</option>
<option value="yewacoed">Yewa Central College Of Education (yewacoed)</option>

<option value="ybuscolgs">Yusuf Bala Usman College Of Legal And General Studies (ybuscolgs)</option>

--SELECT---</option>";
echo"</select></center>

<br/>


<center>Choose your Position [Student ,Aspirant Or Graduate] <br> <select name='position'><option value='Aspirant'>Aspirant</option><option value='Student'>Student</option>
<option value='Graduate'>Graduate</option>--SELECT---</option>";
echo"</select></center>

<br/>


Mobile No<br/><input type="text" name="number"><br/>Country<br/><input type="text" name="country"><br/>State<br/><input type="text" name="state"><br/><br/><input class="button" type="submit" name="submit" value="Sign up"></center></form>
<br><br>
<center><img src="images/home.gif" alt="*"/><a href="index.php">Home</a></center>
<div class="clearfix"></div>
</div>
</div>

</div>  </div>
<?
include"footer.php";
?>
