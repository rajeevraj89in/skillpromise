<?php
//use 'src/Exception.php';
//use '/var/www/html/smtp/smtp/class.phpmailer.php';
//use '/var/www/html/smtp/smtp/class.smtp.php';
error_reporting(E_ALL);
ini_set('display_errors', 'On');

echo "<pre>";
print_r($_REQUEST);
die;

require_once ("/var/www/html/smtp/smtp/PHPMailerAutoload.php");
$mail = new PHPMailer;
$message = array();

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();
$mail->CharSet   = "UTF-8";
$mail->SMTPDebug = 3;                                          // Send using SMTP                                      // Set mailer to use SMTP
$mail->Host = 'mail.parinaam.in';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'mycpm@parinaam.in';                 // SMTP username
$mail->Password = 'In$ia#00089';                           // SMTP password
//$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('mycpm@parinaam.in', 'MyCPM App');
$mail->addAddress($_REQUEST['mail_to'], $_REQUEST['helpdesk_name']);     // Add a recipient
$mail->addCC($_REQUEST['reporting_manager'], 'Reporting Manager');
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('prakash.pant@in,cpm-int.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML


$mail->Subject = 'Helpdesk';
$mail->Body    = "<b> Employee Email : ".$_REQUEST['mail_from']."</b><br> 
                    <b>Employee Code : ". $_REQUEST['emp_code']. " </b><br>
                    <b>Issue : ". $_REQUEST['problem_statement']. "</b>";
$mail->AltBody = "<b> Employee Email : ".$_REQUEST['mail_from']."</b><br> 
                    <b>Employee Code : ". $_REQUEST['emp_code']. " </b><br>
                    <b>Issue : ". $_REQUEST['problem_statement']. "</b>";

//$mail->Subject = 'Here is the subject3';
//$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    $message['status'] = false;
    $message['message'] = 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    $message['status'] = true;
    $message['message'] = 'Message has been sent';
}

echo json_encode($message);
