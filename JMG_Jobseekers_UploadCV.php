<?php
 require($_SERVER["DOCUMENT_ROOT"]."\config2\access.php");
 $connection = mysql_connect($db_host, $db_user, $db_password) or die(mysql_error());
 mysql_select_db($db_name, $connection);

 session_start();
 $ID = $_SESSION['ID'];
 $username = $_SESSION['username'];
 $company = $_SESSION['company'];


if($_POST['Upload_btn'] == "Upload CV!"){

$ID_entered = $_POST['ID'];
$CV = $_FILES['cv']['name'];
$ID_error = "";
$size_error = "";
$ext_error = "";
$field_error = "";

if(strlen($ID_entered) != 0){

 define(MAXSIZE,200000);

function getExtension($str) {
 $i = strpos($str,".");
 if(!$i){return "";}
 $l = strlen($str) - $i;
 $ext = substr($str, $i+1, $l);
 return $ext;
}

if($ID == $ID_entered){

$file = $_FILES['cv']['name'];

if($file){
 $filename = stripslashes($CV);
 $file_ext = getExtension($filename);
 $file_ext = strtolower($file_ext);


if(($file_ext == "docx") || ($file_ext == "docm") || ($file_ext == "doc") || ($file_ext == "dotx") || ($file_ext == "dotm") || ($file_ext == "dot") || ($file_ext == "rtf") || ($file_ext == "wps") || ($file_ext == "pdf")){
$ext_error = "";
}else{
$ext_error = "Please ensure that your Cover Letter and CV are contained in a word document or PDF file.";
}

$size = filesize($_FILES['cv']['tmp_name']);
if($size > MAXSIZE){
 $size_error = "You have exceeded the filesize limit of 200 kilobytes.";
}else{
 $size_error = "";
}

$file_name = time()."_".$username.".".$file_ext;
$newname = $_SERVER['DOCUMENT_ROOT']."/CVs/".$file_name;

if($ext_error == "" && $size_error == ""){
$copied = copy($_FILES['cv']['tmp_name'], $newname);
$a = strpos($newname,"_");
$m = strlen($newname) - $a;
$CV_user_ext = substr($newname,$a+1,$m);
$k =strpos($CV_user_ext,".");
$CV_user = substr($CV_user_ext,0,$k);
$query = "insert into cv(auto_ID, files,match_user) values(null,'$newname','$CV_user') ";
mysql_query($query, $connection) or die(mysql_error());
header('location:JMG_Jobseekers_Upload_Successful.php');
}else{$upload_message = "Upload was Unsuccessful!";}
}

}else{$ID_error = "You entered the wrong ID. The system is case sensitive i.e. <b>A</b> is not the same as <b>a</b>.";}
}else{$field_error = "Please fill-in both fields.";}
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

<div><h3>Please send your Cover Letter and CV to <?php echo $company; ?> through here!</h3>
 <hr /><center>Guildlines:</center><br />
Enter the ID number given on the previous page and them click on "Browse" to choose the file to be uploaded. Then click on "Upload CV!"
<br /><b>Kindly ensure that both Cover Letter and CV are presented in a single word document or PDF file.</b>

	<br /><br /><br />
<!--login form begins-->
<div style="width:450px">
<?php echo '<span class="error">'.$field_error.'</span>'; ?>
<?php echo '<span class="error">'.$ID_error.'</span>'; ?>
<?php echo '<span class="error">'.$upload_error.'</span>'; ?>
<fieldset><legend><b>Cover Letter and CV Upload</b></legend>
<form form enctype="multipart/form-data" action="<?php echo $_SERVER[PHP_SELF]; ?>" method="POST">
<table><tr><td>
<?php echo '<span class="error">'.$message."</span>" ?>
</td></tr>
<tr><td>
ID Number:
</td><td>
<input type="text" name="ID" value="<?php echo $ID_entered; ?>" style="font-size:14px" />
</td></tr>
<tr><td>
<input type="hidden" name="sizelimit" value="1000000" />
</td></tr>
<tr><td>
<?php echo '<span class="error">'.$ext_error.'</span>'; ?>
</td></tr>
<tr><td>
<?php echo '<span class="error">'.$size_error.'</span>'; ?>
</td></tr>
<tr><td>
File:
</td><td>
<input type="file" name="cv" style="font-size:14px" />
</td></tr>
<tr><td>
&#160;
</td><td>
<input type="submit" value="Upload CV!" name="Upload_btn" style="font-size:14px" />
</td></tr></table>
</form>

</fieldset>
</div>
<!--login form ends-->



	<br /><hr />
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