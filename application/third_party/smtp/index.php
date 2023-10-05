<?php
include('smtp/PHPMailerAutoload.php');
$html='Msg';
echo smtp_mailer('shubham.das@lexiconcpl.com','subject',$html);
function smtp_mailer($to,$subject, $msg){
	$mail = new PHPMailer(); 
	$mail->SMTPDebug  = 1;
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls';
	$mail->SMTPAutoTLS = true; 
	$mail->Host = "mail.parinaam.in";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Username = "mycpm@parinaam.in";
	$mail->Password = "In$ia#00089";
	$mail->SetFrom("mycpm@parinaam.in","MyCPM APP");
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		echo $mail->ErrorInfo;
	}else{
		return 'Sent';
	}
}
?>