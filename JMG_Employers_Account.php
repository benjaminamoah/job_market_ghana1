<?php
session_start();
$username = $_SESSION['username'];

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

 $query = "select * from employers";
 $auto_ID_query = mysql_query($query, $connection) or die(mysql_error());
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

$r = substr($result_region,0,1);
 if($r == "_"){
 $visibility_btn = "JMGimg/make_visible.png";
 }else{
 $visibility_btn = "JMGimg/make_invisible.png";
 }


if(isset($_POST['edit_x'])){
header('location:JMG_Employers_Edit_Account.php');
}

if(isset($_POST['visibility_x'])){
 if($r == "_"){
 $region = substr($result_region,1,strlen($result_region));
 $update_region = "update employers set region='$region' where user='$result_username'";
 mysql_query($update_region, $connection) or die(mysql_error());
 $visibility_btn = "JMGimg/make_invisible.png";
 }else{
 $region = '_'.$result_region;
 $update_region = "update employers set region='$region' where user='$result_username'";
 mysql_query($update_region, $connection) or die(mysql_error());
 $visibility_btn = "JMGimg/make_visible.png";
 }
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
<h3>Welcome <?php echo $username; ?><br /> You can manage your account from here.</h3>

<br />
<fieldset><legend><i><b>Account Details</b></i></legend>
			<hr />
<table><tr><td bgcolor="green">
<font color="#ffffff"><b>Company Name:</b></font>&#160;</td><td><?php echo $result_company; ?>
</td></tr>

<tr><td bgcolor="green">
<font color="#ffffff"><b>Region Located:</b></font>&#160;</td><td><?php echo $result_region; ?>
</td></tr>

<tr><td bgcolor="green">
<font color="#ffffff"><b>Telephone Number:</b></font>&#160;</td><td><?php echo "0".$result_tel_number; ?>
</td></tr>

<tr><td bgcolor="green">
<font color="#ffffff"><b>Position Available in Your Company/Organization:</b></font>&#160;</td><td><?php echo $result_position; ?>
</td></tr>

<tr><td bgcolor="green">
<font color="#ffffff"><b>Qualification(s) Required of Applicants:</b></font>&#160;</td><td><?php echo $result_qualification; ?>
</td></tr>

<tr><td bgcolor="green">
<font color="#ffffff"><b>Work Experience Required of Applicants:</b></font>&#160;</td><td><?php echo $result_work_experience; ?>
</td></tr>

<tr><td bgcolor="green">
<font color="#ffffff"><b>Vacancy Application Deadline:</b></font>&#160;</td><td><?php echo $result_dd." ".$result_dm." ".$result_dy; ?>
</td></tr>

<tr><td bgcolor="green">
<font color="#ffffff"><b>Other Information for Applicants:</b></font>&#160;</td><td><?php echo $result_other_info; ?>
</td></tr></table>

<br /><hr />
<br />

<form action="<?php echo $_SERVER[PHP_SELF]; ?>" method="POST">
<input type="image" src="JMGimg/edit.png" name="edit" />
</form>
</fieldset>

<br /><br /><br /><br />
<fieldset><legend><b>Vacancy Visibility</b></legend>
<br />
You may have more than enough applications. So if you would like to change the visibility status of your vacancy,
click on the visibility button below. This decides whether you vacancy is displayed in the "Jobseekers" section
or not.<br /><br />
<form action="<?php echo $_SERVER[PHP_SELF]; ?>" method="POST">
&#160;<input type="image" src="<?php echo $visibility_btn; ?>" name="visibility" />
</form>
</fieldset>

<br /><br /><br /><br />
<fieldset><legend><b>Aplicants' CVs</b></legend>
<br />
To access a prospective employee's CV, right-click on the link and click on "Save Target As".

<br />
<?php
$query3 = "select * from cv";
$applicant_query = mysql_query($query3,$connection) or die(mysql_error());
$app = 0;
$x = 1;
while($app<mysql_num_rows($applicant_query)){
$query_user = mysql_result($applicant_query, $app, "match_user");
 if($result_username == $query_user){
 $query_files = mysql_result($applicant_query, $app, "files");
 echo '<br /><a href="'.$query_files.'">Applicant '.$x.'</a>';
 $app++;
 $x++;
 $y = 1;
 }else{$app++;}
}

if($y == 1){
 echo "";
 }else{
 echo '<h3>Sorry, no job applications made yet.</h3>';
}
?><br /><br />
</fieldset>

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