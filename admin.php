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
 $query1 = "select * from admin";
 $username_query = mysql_query($query1, $connection) or die(mysql_error());
 $username_result = mysql_result($username_query, $i, "admin_user");
if($username_result == $username){
	$i=mysql_num_rows($result)+2;
	}else{$c++; $i++;}
}

$message ="";

if($i==mysql_num_rows($result)+2){
 $query2 = "select * from admin";
 $password_query = mysql_query($query2, $connection) or die(mysql_error());
 $password_result = mysql_result($password_query, $c, "admin_pass");
	if($password_result == $password){
	session_start();
	$_SESSION['username'] = $username;

	$date = time();
	$query3 = "insert into admin_visitor_log(auto_ID, username, password, date_of_visit) values(NULL, '$username', '$password', '$date')";
	mysql_query($query3, $connection) or die(mysql_error());

	header('location:JMG_Admin_Control_Panel.php');
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
<div style="width:450px">
<fieldset><legend><b>Adminstrator Login</b></legend>

<!--login form begins-->
<form action="<?php echo $_SERVER[PHP_SELF]; ?>" method="POST">
<?php echo '<span class="error">'.$message."</span>" ?>
&#160;Username:&#160;
<input type="text" style="font-size:10px" name="username" value="<?php echo $username ?>" ><br />
&#160;Password:&#160;
<input type="password" style="font-size:10px" name="password" /><br />
&#160;<br />
&#160;&#160;<input type="image" src="JMGimg/sign_in_btn01.png" value="Log In!" name="Submit_btn" />&#160;&#160;
</form>
<!--login form ends-->

</fieldset>

</div>

</div>
<br /><br />

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