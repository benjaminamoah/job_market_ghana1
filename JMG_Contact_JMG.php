<?php
if ($_POST['Submit'] == "Submit"){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$comments = $_POST['comments'];

	if (empty($name)){
		$message_name = "Please give your name";
	}
	else{
	$message_name = "";
	}

	if (empty($email)){
		$message_email = "Please leave your email address";
	}
	else{
	$message_email = "";
	}

	if (empty($comments)){
		$message_comments = "Please comment or request for information here";
	}
	else{
	$message_comments = "";
	}

if(strlen($message_name) == 0 && strlen($message_email) == 0 && strlen($message_comments) == 0)
{
		$to = 'ben01@localhost';
		$header = 'ben01@localhost';
		$title = "$subject";

		$body = "$comments\n\n\t subject is: $subject \n\n\t Name of Sender is: $name \n\n\t Email of Writer: $email";

		mail($to, $title, $body, "From: $header");

		header('location:JMG_Comments_Sent.php');
}
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">


<head>
<title>JMG_Contact_JMG</title>
	<meta name="description" content="JobMarketGhana(JMG) is a free and reliable online service that advertises job vacancies in Ghanaian companies or institutions to jobseekers. JMG wants to avoid causing any form of inconvenience to the employers and jobseekers who will be using this website. Because of this, the website has been optimized to make it very simple and easy to use. ">
	<meta name="keywords" content="job vacancies, Ghanaian jobs, free advertisements in ghana, ghana, jobs, vacancies, Ghana job vacancy, Ghanaian company jobs, Ghana bank jobs, employment, find employment in Ghana, Ghanaian, best jobs, qualification, work, find work, ghana job market, ghana employment market, job search ghana, accra jobs, tema jobs, telecom jobs, telecom industry employment">
<link rel="stylesheet" href="JMG.css" type="text/css">


<style>
    .errortext {
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

			<p>
			<h4>Comments and Contributions</h4>
			If you have any comments or contributions to help improve the services of JMG,
			please let me know. You can contact JMG by filling out the form provided below.
			</p><b>Required fields</b> <span class="errortext">*</span>
			<form action="JMG_Contact_JMG.php" method="post">

			<fieldset>
			<legend><b>Please Send Your Comments Through Here</b></legend>
			<table>
			<tr>
			<td>
			<span class="errortext">*</span>Name:&#160;</td>
			<td><input type="text" name="name" size="30" value="<?php echo $name ?>" />
			</td><td>

			<?php
        		print '<span class="errortext">'.
			$message_name."</span>\n";
			?>
			</td></tr>


			<tr>
			<td>
			<span class="errortext">*</span>Email:&#160;</td>
			<td><input type="text" name="email" size="30" value="<?php echo $email ?>" />
			</td><td>

			<?php
        		print '<span class="errortext">'.
			$message_email."</span>\n";
			?>
			</td></tr>

			<tr><td>
			&#160;Subject:&#160;</td>
			<td><input type="text" name="subject" size="30" value="<?php echo $subject ?>" /></td></tr>


			<br />
			<tr><td>
				<span class="errortext">*</span>Message:&#160;</td><td><textarea type="text" name="comments" rows="10" style="width: 100%" cols="10">
			<?php echo $comments ?>
			</textarea></td><td>

			<?php
        		print '<span class="errortext">'.
            		$message_comments."</span>\n";
			?>
			</td></tr>

			</table>
			<br />
			<br />
			&#160;<input type="submit" name="Submit" value="Submit">
			</form>
		</fieldset>

			<br /><br /><br />You may contact JMG by post with this address:
			<br />
			<br />
			<address>Benjamin Amoah
			<br />General Coordinator
			<br />JobMarketGhana
			<br />P.M.B. 71 KD
			<br />Kanda-Accra
			<br />Ghana.</address>
			<br />
			I'll happy to hear from you.

			</p>


	<br /><br /><br /><br /><br /><hr />


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