<?php
use PHPMailer\PHPMailer\PHPMailer;

if(isset($_POST['name']) && isset($_POST['email'])){
	$name= $_POST['name']; 
	$email= $_POST['email']; 
	$fitnessclass= $_POST['fitnessclass']; 
	$timeslot= $_POST['timeslot']; 
	$coach= $_POST['coach']; 
	$amount= $_POST['amount']; 

	require_once "PHPMailer/PHPMailer.php";
	require_once "PHPMailer/SMTP.php";
	require_once "PHPMailer/Exception.php";

	$mail = new PHPMailer();

	//smtp 
	$mail->isSMTP();
	$mail->Host = "smtp.gmail.com";
	$mail->SMTPAuth = true; 
	$mail->Username = "spartanfitnesssport@gmail.com";
	$mail->Password = "jrtxixjnjsxytfnv";
	$mail->Port = '587'; 
	$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

	//email
	$mail->isHTML(true);
	$mail->setFrom($email, $name);
	$mail->addAddress("spartanfitnesssport@gmail.com");
	$mail->Subject = ("$email ($subject)");
	$mail->Body = "<h3>Name: $name <br>Email: $email <br>Address: $fitnessclass <br>Phone Number: $timeslot <br>Subject: $coach <br>Remarks: $amount</h3>"; 

	if($mail->send()){
		$status = "success";
		$response = "Email is sent!";
	}
	else 
	{
		$status = "failed";
		$response = "Something went wrong: <br>" .$mail->ErrorInfo;
	}
	exit(json_encode(array("status" => $status, "response" => $response)));


}

?>