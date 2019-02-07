<?php
if(isset($_POST['Submit_btn_x'])){
 $username = $_POST['username'];
 $password = $_POST['password'];
 require($_SERVER['DOCUMENT_ROOT']."\config2\access.php");
 $connection = mysql_connect($db_host, $db_user, $db_password) or die(mysql_error());
 mysql_select_db($db_name, $connection);

 $query = "select * from employers";
 $result = mysql_query($query, $connection) or die(mysql_error());
 $i = 0;
 $c = 0;

while($i< mysql_num_rows($result)){
 $query1 = "select * from employers";
 $username_query = mysql_query($query1, $connection) or die(mysql_error());
 $username_result = mysql_result($username_query, $i, "user");
if($username_result == $username){
	$i=mysql_num_rows($result)+2;
	}else{$c++; $i++;}
}

$message ="";

if($i==mysql_num_rows($result)+2){
 $query2 = "select * from employers";
 $password_query = mysql_query($query2, $connection) or die(mysql_error());
 $password_result = mysql_result($password_query, $c, "pass");
	if($password_result == $password){
	session_start();
	$_SESSION['username'] = $username;

	$date = time();
	$query3 = "insert into visitor_log(auto_ID, username, password, date_of_visit) values(NULL, '$username', '$password', '$date')";
	mysql_query($query3, $connection) or die(mysql_error());

	header('location:JMG_Employers_Account.php');
	}else{$message = '<img src="JMGimg/error.png" />  ';}
	}else{$message = '<img src="JMGimg/error.png" />  ';}

}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">


<head>
<title>JMG_Home</title>
	<meta name="description" content="JobMarketGhana(JMG) is a free and reliable online service that advertises job vacancies in Ghanaian companies or institutions to jobseekers. JMG wants to avoid causing any form of inconvenience to the employers and jobseekers who will be using this website. Because of this, the website has been optimized to make it very simple and easy to use. ">
	<meta name="keywords" content="job vacancies, ghana, searching, jobs, job search, ghana job search, Ghanaian jobs, free advertisements in ghana, ghana, jobs, vacancies, Ghana job vacancy, Ghanaian company jobs, Ghana bank jobs, employment, find employment in Ghana, Ghanaian, best jobs, qualification, work, find work, ghana job market, ghana employment market, job search ghana, accra jobs, tema jobs, telecom jobs, telecom industry employment">
<link rel="stylesheet" href="JMG.css" type="text/css">
</head>


<body>

<div id="container">
<div id="container1">
<div id="head_right">

<!--login form begins-->
<form action="<?php echo $_SERVER[PHP_SELF]; ?>" method="POST">
<?php echo '<span class="error">'.$message."</span>" ?>
Username:&#160;
<input type="text" style="font-size:10px" name="username" value="<?php echo $username ?>" >
Password:&#160;
<input type="password" style="font-size:10px" name="password" />
&#160;
<input type="image" src="JMGimg/sign_in_btn01.png" value="Log In!" name="Submit_btn" />&#160;&#160;
</form>
<!--login form ends-->
<div id="head">

</div>

</div>

<div id="links">
<div id="head_base2">
<a href="JMG_Home.php">HOME</a>
<a href="JMG_Employers.php">EMPLOYERS</a>
<a href="JMG_Jobseekers.php">JOBSEEKERS</a>
<a href="JMG_Partners.php">PARTNERS</a>
<a href="JMG_Contact_JMG.php">CONTACT JMG</a>
</div>
</div>

<div id="adverts">

<br /><center><b><i>Pro 21:31<br /><br />
The horse is prepared against the day of battle: but safety is of the LORD.</i></b>
<br /><br /></center>

<!-- Start of Yahoo! Finance code -->
<iframe allowtransparency="true" marginwidth="0" marginheight="0" hspace="0" vspace="0" frameborder="0" scrolling="no" src="http://api.finance.yahoo.com/instrument/1.0/%5EIXIC,IBM,AAPL,YHOO,HPQ,INTC,MSFT,KO,GOLD,ICE/badge;quote/HTML?AppID=qW365J7GXXvmceuxWLGGZv2a2LRt&sig=qNl9WOuSina_.ktxHha0Pg39NL8-&t=1264840407510" width="200px" height="541px"><a href="http://finance.yahoo.com">Yahoo! Finance</a><br/><a href="http://finance.yahoo.com/q?s=^IXIC">Quote for ^IXIC</a></iframe>
<!-- End of Yahoo! Finance code -->

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
<br />
<div><h4>Job Market Ghana(JMG): What it's all about...</h4></div>
	<p>
	Job Market Ghana(JMG) is all about bringing innovation into
	how employers and prospective employees interact.
	JMG allows the employer to paste a job vacancy on this website for free.
	<a href="JMG_Employers_Registration.php">This is done by simply going to this link</a> and providing JMG with the details of the job vacacy.<br /><br />
	The details of the job vacancy are immediately pasted on the <a href="JMG_Jobseekers.php">Jobseekers Page</a> of this website where
	prospective employees can go to view the vacancy and submit their CVs.
	An account is also created for the employer. The employer can access this account using the username and password
	that the employer chose while providing JMG with the details of the job vacancy. In the account the employer can <br />
	<ol>
		<li>Change the details of the job vacancy</li>
		<li>Make the job vacancy visible or invisible to jobseekers</li>
		<li>And most importantly, have access to CVs or job applications <br />that prospective employees have submitted</li>
	</ol>
	<p>
	Say goodbye to the long periods of waiting for the postal service.
	The whole job vacancy advertsing and application process can now be done online with <b>JobMarketGhana.Net</b>.
	<br /><br />
	</p>
<div><h4>For Employers</h4></div>
	<p>
	JMG works round the clock to inform jobseekers of this innovative way of
	job-hunting. As a one stop spot for jobseekers, JMG is arguably the most powerful tool for advertizing job
	and internship opportunities in Ghana today.
	<br /><br />To help you put up your job vacancy as quickly and as effortlessly as possible, the service has been made absolutely <font color="green"><b>FREE OF CHARGE</b></font>.
	However, the service can be used by employers in Ghanaian companies or institutions only. <a href="JMG_Employers.php">Create your account here for free</a>
	to benefit from the great advantage that JMG offers you.
	<br /><br />
	</p>
<div><h4>For Jobseekers</h4></div>
	<p>
	If you are searching for employment in Ghana,
	then this is the place to be. On this website, you will find job vacancies from
	all the ten regions of Ghana. So no matter where you live, you can find the job opportunity
	most suited to you. In addition to this, you can submit your CV or job application right here. <a href="JMG_Jobseekers.php">View Job Opportunities and Submit CVs Right Here!</a>
	</p>
	<br />
	See <a href="JMG_Partners.php">PARTNERS</a> for some great services you might be interested in...
	<br /><br /><a href="#">Back To Top</a><br /><br /><br /><br /><br /><br /><hr />

</div>
<br /><br />
<br /><br /><br />

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

Copyright&#169; 2010, JMG All Rights Reserved
</div>

</body>

</html>