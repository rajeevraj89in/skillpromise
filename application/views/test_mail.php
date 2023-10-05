
<?php

//$to = 'vipin.saxena@lexiconcpl.com';
//$subject = 'test smtp';
//$message = 'hello';
//$headers = 'From: mohit.soni@lexiconcpl.com' . "\r\n" .
//        'Reply-To: mohit.soni@lexiconcpl.com' . "\r\n" .
//        'X-Mailer: PHP/' . phpversion();
//
//$r = mail($to, $subject, $message, $headers);
//if ($r) {
//    echo 'mail sent';
//}

$from = "WebMaster@parasreprographic.com";
$to = "vipin.saxena@lexiconcpl.com";
$subject = "test mail";
$body = "test mail ddh gd dghd fdg gdsfg dg test";

$config = array($from, $to, $subject, $body);
//print_r($config);
//die;

$CI = & get_instance();
$CI->load->library('smtpclient', $config);

if ($this->smtpclient->send_mail()) {
    echo 'mail sent';
}
?>
