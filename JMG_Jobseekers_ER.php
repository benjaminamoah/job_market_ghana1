<?php
require($_SERVER["DOCUMENT_ROOT"]."\config2\access.php");
$connection = mysql_connect($db_host, $db_user, $db_password) or die(mysql_error());
mysql_select_db($db_name, $connection);

$region = "Eastern";

if(isset($_POST['submit'])){
 $username = $_POST['vacancy'];
 session_start();
 $_SESSION['username'] = $_POST['username'];
 $_SESSION['ID'] = $_POST['ID'];
 $_SESSION['company'] = $_POST['company'];
 header('location:JMG_Jobseekers_UploadCV.php');
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">


<head>
<title>JMG_Jobseekers_ER</title>
	<meta name="description" content="JobMarketGhana(JMG) is a free and reliable online service that advertises job vacancies in Ghanaian companies or institutions to jobseekers. JMG wants to avoid causing any form of inconvenience to the employers and jobseekers who will be using this website. Because of this, the website has been optimized to make it very simple and easy to use. ">
	<meta name="keywords" content="job vacancies, Ghanaian jobs, free advertisements in ghana, ghana, jobs, vacancies, Ghana job vacancy, Ghanaian company jobs, Ghana bank jobs, employment, find employment in Ghana, Ghanaian, best jobs, qualification, work, find work, ghana job market, ghana employment market, job search ghana, accra jobs, tema jobs, telecom jobs, telecom industry employment">
<link rel="stylesheet" href="JMG.css" type="text/css">
</head>


<body>
<div id="container">
<div id="container1">

<div id="head_right">

<div id="head"></div>
</div>

<div id="head_base1"></div>
<div id="links">
<div id="head_base2">
<a href="JMG_Home.php">HOME</a>
<a href="JMG_Employers.php">EMPLOYERS</a>
<a href="JMG_Jobseekers.php">JOBSEEKERS</a>
<a href="JMG_Partners.php">PARTNERS</a>
<a href="JMG_Contact_JMG.php">CONTACT JMG</a>
</div>
<div id="ghana"></div>
</div>

<div id="adverts">

<object top="75" width="195" height="113">
<param name="advert" value="JMGimg/advertise.swf">
<embed src="JMGimg/advertise.swf"  top="75" width="195" height="113">
</embed>
</object>

<img src="JMGimg/jmg_advert_side.gif">

<br /><br /><hr />
<b>Contacts</b><br /><br />
Postal Address:<br />
<i>JobMarketGhana<br />
P.M.B. 71<br />
KANDA - Accra<br />
Ghana</i><br /><br />

Email: <font size=1px>info@jobmarketghana.net
<br />/comments@jobmarketghana.net</font>
</div>

<div id="sub-container">

<h3>Welcome to Eastern Region</h3>

<?php

 $query = "select * from employers";
 $result = mysql_query($query, $connection) or die(mysql_error());

 $i = 0;
 $a = 0;
 $c = 0;
 $k = 0; 

while($a==0 && $k < mysql_num_rows($result)){
 $query1 = "select * from employers";
 $region_query = mysql_query($query1, $connection) or die(mysql_error());
 $region_result = mysql_result($region_query, $k, "region");

 if($region_result == $region){
 $a=1; $k = mysql_num_rows($result);
}else{$a=0; $k++;}

}

if($a == 1){

while($i< mysql_num_rows($result)){
 $query2 = "select * from employers";
 $region_query2 = mysql_query($query2, $connection) or die(mysql_error());
 $region_result2 = mysql_result($region_query2, $i, "region");
if($region_result2 == $region){
 $auto_ID_query = mysql_query($query2, $connection) or die(mysql_error());
 $result_ID = mysql_result($auto_ID_query, $c, "auto_ID");
 $result_username = mysql_result($auto_ID_query, $c, "user");
 $result_company = mysql_result($auto_ID_query, $c, "company");
 $result_region = mysql_result($auto_ID_query, $c, "region");
 $result_tel_number = mysql_result($auto_ID_query, $c, "telephone_number");
 $result_position = mysql_result($auto_ID_query, $c, "position");
 $result_qualification = mysql_result($auto_ID_query, $c, "qualification");
 $result_work_experience = mysql_result($auto_ID_query, $c, "work_experience");
 $result_dd = mysql_result($auto_ID_query, $c, "dd");
 $result_dm = mysql_result($auto_ID_query, $c, "dm");
 $result_dy = mysql_result($auto_ID_query, $c, "dy");
 $result_other_info = mysql_result($auto_ID_query, $c, "other_info");

echo '<fieldset><legend><i><b>'.$result_company.'</b></i></legend>
			<hr />
<table>
<tr><td bgcolor="green">
<font color="#ffffff"><b>Position Available in the Company/Organization:</b></font>&#160;</td><td> '.$result_position.'
</td></tr>

<tr><td bgcolor="green">
<font color="#ffffff"><b>Qualification(s) Required of Applicants:</b></font>&#160;</td><td> '.$result_qualification.'
</td></tr>

<tr><td bgcolor="grey">
<font color="#ffffff"><b>Work Experience Required of Applicants:</b></font>&#160;</td><td> '.$result_work_experience.'
</td></tr>

<tr><td bgcolor="#aaaaaa">
<font color="#ffffff"><b>Vacancy Application Deadline:</b></font>&#160;</td><td> '.$result_dd." ".$result_dm." ".$result_dy.'
</td></tr>

<tr><td bgcolor="green">
<font color="#ffffff"><b>Telephone Number:</b></font>&#160;</td><td> 0'.$result_tel_number.'
</td></tr>

<tr><td bgcolor="grey">
<font color="#ffffff"><b>Other Information for Applicants:</b></font>&#160;</td><td> '.$result_other_info.'
</td></tr></table>

<br /><hr /><center>Please keep this ID number in mind. You will need it when you submit your Cover Letter and CV to this company/organization:
<b>ER00_'.$result_ID.'</b>
<form action="'.$_SERVER[PHP_SELF].'" method="POST">
<input type="hidden" name="ID" value="ER00_'.$result_ID.'" />
<input type="hidden" name="company" value="'.$result_company.'" />
<input type="hidden" name="username" value="'.$result_username.'" />
<input type="submit" name="submit" value="Submit Cover Letter and CV" />
</form>
</center>
</fieldset><br /><br /><br />';
 $c++; $i++;
	}else{$c++; $i++;}
}

}else{echo '<h3><i>No Job Vacancies for the '.$region.' Region are up yet</i></h3>';}


?>


<br /><hr />
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><hr />

</div>
<br /><br />
<br /><br /><br />
</div>
</div>
<div id="footer">

<div><center>
<a href="JMG_Home.php">HOME</a>&#160;&#160;&#160;
<a href="JMG_Employers.php">EMPLOYERS</a>&#160;&#160;&#160;
<a href="JMG_Jobseekers.php">JOBSEEKERS</a>&#160;&#160;&#160;
<a href="JMG_Partners.php">PARTNERS</a>&#160;&#160;&#160;
<a href="JMG_Extras.php">EXTRAS</a>&#160;&#160;&#160;
<a href="JMG_Contact_JMG.php">CONTACT JMG</a>
</center></div><br />

Copyright&#169; 2010, JMG All Rights Reserved</div>


</body>

</html>