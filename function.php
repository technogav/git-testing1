<?php //1

define("WEBMASTER_EMAIL", 'info@compuhire.ie');
$email_from = "info@compuhire.ie";

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['company_name'])){
	$company_name = $_POST['company_name'];
	$venue_address = $_POST['venue_address'];
	$company_phone = $_POST['company_phone'];
	$venue_phone = $_POST['venue_phone'];
	$company_email = $_POST['company_email'];
	$room_setup_date = $_POST['setup_date'];
	$course_reference = $_POST['course_reference'];
	$course_start = $_POST['course_start'];
	$trainer_name = $_POST['trainer_name'];
	$trainer_email = $_POST['trainer_email'];
	$pcSavy = $_POST['pcsavy'];
	$course_description = $_POST['course_description'];
	$course_end = $_POST['course_end'];
	$trainer_phone = $_POST['trainer_phone'];
	$room_layout = $_POST['room_layout'];
	$power_sockets = $_POST['power_sockets'];
	$location_sockets = $_POST['location_sockets'];
	$required_units = $_POST['pc_equipment'];
	$internetAccess = $_POST['access_details'];
	if(isset($_POST['special_reqirements'] )){$special_requirements = $_POST['special_reqirements'];}
	else{$special_requirements = "no requirements";}		
	if(isset($_POST['additional_questions'])){ $additional_questions = $_POST['additional_questions'];}
	else{$additional_questions = "no questions";}	
	if(isset($_POST['swivel_chairs'])){ $swivel_chairs = $_POST['swivel_chairs'];}
	else{$swivel_chairs = "No";}
	if(isset($_POST['tables'])){$tables = "Yes";}
	else{$tables = "No";}
	if(isset($_POST['projecter'])){$projecter = "Yes";}
	else{$projecter = "No";}
	if(isset($_POST['screen'])){$screen = "Yes";}
	else{$screen = "No";}
	if(isset($_POST['printer1'])){$printer1 = "Yes";}
	else{$printer1 = "No";}
	if(isset($_POST['printer2'])){$printer2 = "Yes";}
	else{$printer2 = "No";}
	if(isset($_POST['scanner'])){$scanner = "Yes";	}
	else{$scanner = "No";}
		
	$body =  <<<TEXT
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<style>
tr td {
	padding: 8px;
}
</style>
</head>
<body style="background: white; font-size: 1.1em; font-family: Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif">
<div style="width: 80%; padding: 35px; margin-left: 10%; margin-right: 10%;">
  <h2 style="text-align: center; margin-top: 20px;">Training Venue Response - $company_name </h2>
  <h3 style="text-align: center; color: red;">Contact Details</h3>
  <p><strong>Company Name</strong> ---  $company_name<br>
    <strong>Company Address</strong> --- $venue_address </p>
  <p><strong>Company Phone Number</strong> --- $company_phone<br>
    <strong>Company Email</strong> --- $company_email </p>
  <br>
  <hr>
  <br>
  <h3 style="text-align: center; color: red;">Course Details</h3>
  <p><strong>Course Start</strong> --- $course_start<br>
    <strong>Course End</strong> --- $course_end </p>
  <p><strong>Course Ref</strong> --- $course_reference <br>
    <strong>Course Description</strong> --- $course_description<br>
    <strong>Room Setup Date</strong> --- $room_setup_date </p>
  <br>
  <hr>
  <br>
  <h3 style="text-align: center; color: red;">Order Details C</h3>
  <p><strong>Required Units</strong> --- $required_units</p>
  <p><strong>Special Requirements</strong> --- $special_requirements</p>
  <table style="width:100%; background: #E9E9E9;">
    <tr>
      <td><strong>21 swivel chairs</strong> --- $swivel_chairs</td>
      <td><strong>12 tables</strong> --- $tables</td>
      <td><strong>projecter</strong> --- $projecter</td>
    </tr>
    <tr>
      <td><strong>screen</strong> --- $screen</td>
      <td><strong>1 printer</strong> --- $printer1</td>
      <td><strong>2 printers</strong> --- $printer2</td>
    </tr>
    <tr>
      <td><strong>scanner</strong> --- $scanner</td>
      <td></td>
      <td></td>
    </tr>
  </table>
  <p><strong>Additional Equipment</strong> --- $additional_equipment</p>
  <br>
  <hr>
  <br>
  <h3 style="text-align: center; color: red;">Setting Up Details & Contacts D</h3>
  <table style="width:100%;" >
    <tr>
      <td><strong>Number of power sockets</strong> --- $power_sockets</td>
      <td><strong>Location of sockets</strong> --- $location_sockets</td>
    </tr>
    <tr>
      <td><strong>Trainer Name</strong> --- $trainer_name</td>
      <td><strong>Internet Access</strong> --- $internetAccess</td>
    </tr>
    <tr>
      <td><strong>Trainer Email</strong> --- $trainer_email</td>
      <td><strong>Trainer Phone Number</strong> --- $trainer_phone</td>
    </tr>
    <tr>
      <td><strong>Venue Phone Number</strong> --- $venue_phone</td>
      <td><strong>Pc Savy</strong> --- $pcSavy</td>
    </tr>
  </table>
  <br>
  <hr>
  <br>
</div>
</body>
</html>
TEXT;

?>
	<?php mail(WEBMASTER_EMAIL, "Training Venue Response - " . $company_name . ".", $body , "From: Training Venue Response - " . $company_name . "<" . $email_from . ">\r\n"
		 . "Content-Type: text/html "
		. "Reply-To: " . $email_from . "\r\n"
		. "X-Mailer: PHP/" . phpversion());
	
	header('Location: http://www.compuhire.ie/thanks.html');
	exit();
 }
