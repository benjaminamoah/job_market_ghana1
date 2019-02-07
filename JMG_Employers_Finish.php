<?php
session_start();
$user = $_SESSION['user'];
$pass = $_SESSION['pass'];

if(isset($_POST['Submit_btn_x'])){
 $username = $_POST['username'];
 $password = $_POST['password'];
 require($_SERVER["DOCUMENT_ROOT"]."\config2\access.php");
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
	$show_date = date("H:i:s m/d/y", $date);
	$query3 = "insert into visitor_log(auto_ID, username, password, date_of_visit) values(NULL, '$username', '$password', '$show_date')";
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
<a href="JMG_Contact_JMG.php">CONTACT JMG</a></div>
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

<div><h4>CONGRATULATIONS!!!</h4>
			<p>
			That's all there is to it. Please check the jobseeker's section of this site to view your job vacancy advertisement.
			If for some reason you do not find that your advertisement is being displayed, contact JMG via our comments sumition
			form at <a href="JMG_Contact_JMG.php">Contact_JMG</a> so that the situation may be addressed.

			<br /><br />
			Your username is <?php echo "'<b>'$user'</b>'"; ?> and your password is <?php echo "'<b>'$pass'</b>'"; ?>.
			Please keep these datails in a secure place.
			</p>


<br />
<div id="login_form">
<!--login form begins-->

<fieldset><legend>You May Sign In Now!</legend>

<form action="<?php echo $_SERVER[PHP_SELF]; ?>" method="POST">
<table>
<tr><td>
Username:&#160;
</td>
<td>
<input type="text" name="username" value="<?php echo $username ?>" ><br /><br />
</td></tr>
<tr><td>
Password:&#160;
</td><td>
<input type="password" name="password" /><br /><br />
</td></tr>
<tr>
<?php echo '<span class="error">'.$message."</span>" ?>
</tr>
<tr><td>
&#160;
</td><td>
<input type="image" src="JMGimg/sign_in_btn.png" value="Log In!" name="Submit_btn" />
</td></tr></table>
</form>
<!--login form ends-->
</fieldset>
</div>


	<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
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