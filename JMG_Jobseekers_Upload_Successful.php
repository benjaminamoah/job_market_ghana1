<?php
session_start();
$_SESSION['company'];
$company = $_SESSION['company'];

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">


<head>
<title>JMG_Employers_Finish</title>
	<meta name="description" content="JobMarketGhana(JMG) is a free and reliable online service that advertises job vacancies in Ghanaian companies or institutions to jobseekers. JMG wants to avoid causing any form of inconvenience to the employers and jobseekers who will be using this website. Because of this, the website has been optimized to make it very simple and easy to use. ">
	<meta name="keywords" content="job vacancies, Ghanaian jobs, free advertisements in ghana, ghana, jobs, vacancies, Ghana job vacancy, Ghanaian company jobs, Ghana bank jobs, employment, find employment in Ghana, Ghanaian, best jobs, qualification, work, find work, ghana job market, ghana employment market, job search ghana, accra jobs, tema jobs, telecom jobs, telecom industry employment">
<link rel="stylesheet" href="JMG.css" type="text/css">

<style>
    .error {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 14px; color:#C00000; font-weight: normal;
    }
</style>
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

<object width=200 height=150>
<param value= movie url="JMGimg/flag.swf">
<embed src="JMGimg/flag.swf" width=200 height=150>
</embeded>
</object>

<img src="JMGimg/jmg_advert_side.gif">
</div>

<div id="sub-container">

<div><h4>UPLOAD SUCCESSFULLY!!!</h4>
			<p>Your Cover Letter and CV have been sent to <?php echo $company; ?>. 
			It is advisable to note the telephone number of <?php echo $company; ?> so 
			that you could enquire of the progress of your application 
			from your potential employer.
			</p>


<h3><a href="JMG_Jobseekers.php"><< Return</a></h3><br /><br /><br /><br /><br />
</div>
</div>
</div>
<br /><br />
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
<br /><br /><br />



</body>

</html>