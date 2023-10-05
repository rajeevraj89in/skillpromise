<?php
//use 'src/Exception.php';
//require '/var/www/html/smtp/smtp/class.phpmailer.php';
//require '/var/www/html/smtp/smtp/class.smtp.php';

//require PHPMailer\PHPMailer\PHPMailer;
//require PHPMailer\PHPMailer\Exception;
	

require_once ("/var/www/html/smtp/smtp/PHPMailerAutoload.php");

$mail = new PHPMailer;
//$mail->SMTPDebug = true;
$mail->IsSMTP();  // telling the class to use SMTP
$mail->CharSet   = "UTF-8";
$mail->SMTPDebug = 3;
$mail->SMTPAuth   = true; // SMTP authentication
$mail->Host       = "mail.parinaam.in"; // SMTP server
$mail->Port       = 587; // SMTP Port
$mail->Username   = "payroll@parinaam.in"; // SMTP account username
$mail->Password   = "P@yr01l#001";        // SMTP account password
//$mail->SMTPSecure = 'tls';

//The following code allows you to send mail automatically once the code is run
$mail->SetFrom('payroll@parinaam.in', 'Payroll'); // FROM
//$mail->AddReplyTo('mail id', 'name'); // Reply TO

$mail->AddAddress('hemraj.chhaunkar@in.cpm-int.com', 'Hemraj Chhaunkar'); // recipient email
$mail->Subject    = "First SMTP Message"; // email subject
$mail->Body       = "Hi! \n\n some text.";

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
