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
	}else{$message = "wrong username or password";}
	}else{$message = "wrong username or password";}

}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">


<head>
<title>JMG_Employers</title>
<link rel="stylesheet" href="JMG.css" type="text/css">
	<meta name="description" content="JobMarketGhana(JMG) is a free and reliable online service that advertises job vacancies in Ghanaian companies or institutions to jobseekers. JMG wants to avoid causing any form of inconvenience to the employers and jobseekers who will be using this website. Because of this, the website has been optimized to make it very simple and easy to use. ">
	<meta name="keywords" content="job vacancies, Ghanaian jobs, free advertisements in ghana, ghana, jobs, vacancies, Ghana job vacancy, Ghanaian company jobs, Ghana bank jobs, employment, find employment in Ghana, Ghanaian, best jobs, qualification, work, find work, ghana job market, ghana employment market, job search ghana, accra jobs, tema jobs, telecom jobs, telecom industry employment">

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
<div id="head_base1"></div>
</div>

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
<br />
<center><font size="3px" color="red"><b><i>Set up an email account...</i></b></font>
<br /><br /><a href='https://www.google.com/accounts/ServiceLogin?service=mail&passive=true&rm=false&continue=http%3A%2F%2Fmail.google.com%2Fmail%2F%3Fui%3Dhtml%26zy%3Dl&bsv=zpwhtygjntrz&scc=1&ltmpl=default&ltmplcache=2'><img src='JMGimg/gmail.gif' border="0"></a>
<br /><br /><a href='https://login.yahoo.com/config/mail?.intl=us'><img src='JMGimg/yahoo.gif' border="0"></a>
<br /><br /><a href='http://login.live.com/login.srf?wa=wsignin1.0&rpsnv=11&ct=1247754795&rver=5.5.4177.0&wp=MBI&wreply=http:%2F%2Fmail.live.com%2Fdefault.aspx&lc=1033&id=64855&mkt=en-US'><img src='JMGimg/hotmail.gif' border="0"></a>

</center>
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
<h4>Welcome Administrator</h4><hr />


</div>

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