<?php
if(($_POST['Submit_btn']) == "Register!"){
 $username = $_POST['username'];
 $password = $_POST['password'];
 $password_conf = $_POST['password_conf'];
 $company_name = $_POST['company_name'];
 $region = $_POST['region'];
 $tel_number = $_POST['tel_number'];
 $industry = $_POST['industry'];
 $position = $_POST['position'];
 $qualification = $_POST['qualification'];
 $work_experience = $_POST['work_experience'];
 $deadline_day = $_POST['deadline_day'];
 $deadline_month = $_POST['deadline_month'];
 $deadline_year = $_POST['deadline_year'];
 $other_info = $_POST['other_info'];

 require($_SERVER["DOCUMENT_ROOT"]."\config2\access.php");
 $connection = mysql_connect($db_host, $db_user, $db_password);
 mysql_select_db($db_name, $connection);
 $query = "select * FROM employers";
 $username_query = mysql_query($query, $connection) or die(mysql_error());

 $u = 0;
 $a = 0;
 $n = 0;
 $r = 0;
 $t = 0;
 $p = 0;
 $q = 0;
 $w = 0;
 $d = 0;

 while($i<mysql_num_rows($username_query)){
 $result = mysql_result($username_query, $i, "user");
 if($username == $result || strlen($username) == 0){
	$u = 1;
	}else{$u = 0;}
 if($u == 1){
 $username_error = "The user name already exists";
 $i=mysql_num_rows($username_query)+1;
 }else{$username_error = "";}
 $i++;
 }

 if($password != $password_conf || strlen($password) == 0 || strlen($password_conf) == 0){
	$a = 1;
	}else{$a = 0;}
 if($a == 1){
 $password_error = "Password Error: Please ensure that the passwords match";
 }else{$password_error = "";}

 if(strlen($company_name) == 0){
	$n = 1;
	}else{$n = 0;}
 if($n == 1){
 $company_name_error = "Please state your company's/organization's name";
 }else{$company_name_error = "";}

 if($region == "--"){
	$r = 1;
	}else{$r = 0;}
 if($r == 1){
 $region_error = "Please choose the region where your company/organization is located";
 }else{$region_error = "";}

 if(strlen($tel_number) == 0){
	$t = 1;
	}else{$t = 0;}
 if($t == 1){
 $tel_number_error = "Please provide a contact number";
 }else{$tel_number_error = "";}

 if($industry == "--"){
	$r = 1;
	}else{$r = 0;}
 if($r == 1){
 $industry_error = "Please choose the industry your compant/organization  belongs to.";
 }else{$industry_error = "";}

 if(strlen($position) == 0){
	$p = 1;
	}else{$p = 0;}
 if($p == 1){
 $position_error = "Please state job vacancy title";
 }else{$position_error = "";}

 if(strlen($qualification) == 0){
	$q = 1;
	}else{$q = 0;}
 if($q == 1){
 $qualification_error = "Please specify the qualification(s) required of job applicants";
 }else{$qualification_error = "";}

 if(strlen($work_experience) == 0){
	$w = 1;
	}else{$w = 0;}
 if($w == 1){
 $work_experience_error = "Please specify the kind of working experience required";
 }else{$work_experience_error = "";}

 if($deadline_day == "--" || $deadline_month == "--"){
	$d = 1;
	}else{$d = 0;}
 if($d == 1){
 $deadline_error = "Please specify a deadline for the job vacancy";
 }else{$deadline_error = "";}

 if($k == 1 || $n == 1 || $a == 1 || $r == 1 || $t == 1 || $p == 1 || $q == 1 || $w == 1 || $d == 1){
 $i = mysql_num_rows($username_query)+2;
 }

if($i==mysql_num_rows($username_query)){
	$date = time();
	$insert_record = "insert into employers (auto_ID, user, pass, company, region, telephone_number, industry, position, qualification, work_experience, dd, dm, dy, other_info, date_posted) VALUES(NULL ,'$username' ,'$password' , '$company_name', '$region', '$tel_number', '$industry', '$position', '$qualification',  '$work_experience' , '$deadline_day' , '$deadline_month' , '$deadline_year' , '$other_info' , '$date')";
	mysql_query($insert_record, $connection) or die(mysql_error());

	session_start();
	$_SESSION['user']=$username;
	$_SESSION['pass']=$password;
	header("location:JMG_Employers_Finish.php");
}elseif($i == mysql_num_rows($username_query)+2){
$registration_error = "Error, Please try again.";
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
	<script src="jquery-1.5.js" type="text/javascript"></script>
    <script src="jav.js" type="text/javascript"></script>


<style>
    .error{
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
<br /><br /><a href='https://www.google.com/accounts/ServiceLogin?service=mail&passive=true&rm=false&continue=http%3A%2F%2Fmail.google.com%2Fmail%2F%3Fui%3Dhtml%26zy%3Dl&bsv=zpwhtygjntrz&scc=1&ltmpl=default&ltmplcache=2'><img src='JMGimg/gmail.gif'></a>
<br /><br /><a href='https://login.yahoo.com/config/mail?.intl=us'><img src='JMGimg/yahoo.gif'></a>
<br /><br /><a href='http://login.live.com/login.srf?wa=wsignin1.0&rpsnv=11&ct=1247754795&rver=5.5.4177.0&wp=MBI&wreply=http:%2F%2Fmail.live.com%2Fdefault.aspx&lc=1033&id=64855&mkt=en-US'><img src='JMGimg/hotmail.gif'></a>

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

<!--registration form starts-->
<h3><font decorate="underline">Create An Account Here</font></h3>
<span class="error">*</span>&#160;<b>Required Fields</b><br /><br />
<?php print '<span class="error">'.$registration_error."</span>"; ?>
<form action="<?php echo $_SERVER[PHP_SELF]; ?>" method="POST">
<table>
<tr><td>
<span class="error">*</span>Username:&#160;
</td><td>
<input type="text" name="username" value="<?php echo $username ?>" ></td><td><?php print '<span class="error">'.$username_error."</span>"; ?><br /><br />
</td></tr>
<tr><td>
<span class="error">*</span>Password:&#160;
</td><td>
<input type="password" name="password" /><br />
</td></tr>
<tr><td>
<span class="error">*</span>Password Confirmation:&#160;
</td><td>
<input type="password" name="password_conf" /></td><td><?php print '<span class="error">'.$password_error."</span>"; ?><br /><br />
</td></tr>
<tr><td>
<span class="error">*</span>Name of Company/Organization:&#160;
</td>
<td>
<input type="text" name="company_name" value="<?php echo $company_name ?>" ></td><td><?php print '<span class="error">'.$company_name_error."</span>"; ?><br />
</td></tr>
<tr><td>
<span class="error">*</span>Region:&#160;
</td>
<td>

			<select type="text" name="region">
				<option>--</option>
				<option>Ashanti</option>
				<option>Brong Ahafo</option>
				<option>Central</option>
				<option>Eastern</option>
				<option>Greater Accra</option>
				<option>Northern</option>
				<option>Upper East</option>
				<option>Upper West</option>
				<option>Volta</option>
				<option>Western</option>
			</select></td><td><?php print '<span class="error">'.$region_error."</span>" ?>

</td></tr>
<tr><td>
<span class="error">*</span>Telephone Number:&#160;
</td>
<td>
<input type="text" name="tel_number" value="<?php echo $tel_number ?>" ></td><td><?php print '<span class="error">'.$tel_number_error."</span>"; ?><br />
</td></tr>
<tr><td>
<span class="error">*</span>Industry:&#160;
</td>
<td>

			<select type="text" name="industry">
				<option>--</option>
				<option>Ashanti</option>
				<option>Brong Ahafo</option>
				<option>Central</option>
				<option>Eastern</option>
				<option>Greater Accra</option>
				<option>Northern</option>
				<option>Upper East</option>
				<option>Upper West</option>
				<option>Volta</option>
				<option>Western</option>
			</select></td><td><?php print '<span class="error">'.$industry_error."</span>" ?>

</td></tr>
<tr><td>
<span class="error">*</span>Position Available:&#160;
</td>
<td>
<input type="text" name="position" value="<?php echo $position ?>" ></td><td><?php echo '<span class="error">'.$position_error."</span>"; ?><br />
</td></tr>
<tr><td>
<span class="error">*</span>Qualification:&#160;
</td>
<td>
<input type="text" name="qualification" value="<?php echo $qualification ?>" ></td><td><?php print '<span class="error">'.$qualification_error."</span>"; ?><br />
</td></tr>
<tr><td>
<span class="error">*</span>Work Experience:&#160;
</td>
<td>
<input type="text" name="work_experience" value="<?php echo $work_experience ?>" ></td><td><?php print '<span class="error">'.$work_experience_error."</span>"; ?><br />
</td></tr>


			<tr>
			<td>
			<span class="error">*</span>Vacancy Application Deadline:&#160;</td>
			<td><select type="text" name="deadline_day">
				<option>--</option>
				<option>01</option>
				<option>02</option>
				<option>03</option>
				<option>04</option>
				<option>05</option>
				<option>06</option>
				<option>07</option>
				<option>08</option>
				<option>09</option>
				<option>10</option>
				<option>11</option>
				<option>12</option>
				<option>13</option>
				<option>14</option>
				<option>15</option>
				<option>16</option>
				<option>17</option>
				<option>18</option>
				<option>19</option>
				<option>20</option>
				<option>21</option>
				<option>22</option>
				<option>23</option>
				<option>24</option>
				<option>25</option>
				<option>26</option>
				<option>27</option>
				<option>28</option>
				<option>29</option>
				<option>30</option>
				<option>31</option>
			</select>

			<select type="text" name="deadline_month">
				<option>--</option>
				<option>January</option>
				<option>Febrary</option>
				<option>March</option>
				<option>April</option>
				<option>May</option>
				<option>June</option>
				<option>July</option>
				<option>August</option>
				<option>September</option>
				<option>October</option>
				<option>November</option>
				<option>December</option>
			</select>

			<select type="text" name="deadline_year">
				<option>2010</option>
				<option>2011</option>
				<option>2012</option>
				<option>2013</option>

			<br />

			</select></td><td>
			<?php
        		print '<span class="error">'.
            		$deadline_error."</span>\n";
			?>
			</td>
			</tr>





<br />
<tr><td>
Other Information:&#160;<br /><br />(This is optional. Do you have <br />other details you wish <br />jobseekers to know about.)
</td>
<td>
<textarea style="width: 150%" rows="10" name="other_info" value="<?php echo $other_info ?>" ></textarea><br />
</td></tr>
<tr><td>
&#160;
</td></tr>
<tr>
Please be sure to keep your username and password in a safe and secure place. <b>You cannot access your account without them.</b>
</tr>
<tr><td>
&#160;
</td><td>
<input type="submit" value="Register!" name="Submit_btn" />
</td></tr>
</table>
</form>
<!--registration form ends-->
	<br /><br /><br /><hr />

</div>
<br /><br />


<br /><br /><br />
</div>

			<br /><div id="reveal" Style="color: blue; cursor: pointer;"><b>Please Note >></b></div> <div id="note">that as part of its social responsibility, JMG does not encourage jobs it finds
			fundamentally antisocial or amoral and thus reserves the right to decline to advertise certain job vacancies.
			In the hopefully unlikely event that your job vacancy would not be advertised on this site, JMG reserves the right to disable your account without giving prior notification to any party.
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