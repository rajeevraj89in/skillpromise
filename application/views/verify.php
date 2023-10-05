<?php

require(APPPATH . '/razorpay-php/config.php');
//session_start();

require(APPPATH . '/razorpay-php/Razorpay.php');

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;

$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false) {
    $api = new Api("rzp_test_ZIuKMztAVE02xK", "fUXTgRoX6FjqoevTspjWe5yu");

    try {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_POST['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );


        $api->utility->verifyPaymentSignature($attributes);
    } catch (SignatureVerificationError $e) {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true) {
//    echo "<pre>";
//    print_r($_POST);
//    die;
    $package = $_POST['package'];
    $reg = $_POST['reg'];
    $order_id = $_POST['razorpay_order_id'];
    $payment_id = $_POST['razorpay_payment_id'];
    $signature = $_POST['razorpay_signature'];
	header('Location: ' . base_url() . "payment_details/" . $package . '/' . $reg . "/" . $payment_id . "/" . $signature);
//    header('Location: ' . base_url() . "payment_details/" . $package . '/' . $reg . "/" . $payment_id . '/' . $order_id . '/' . $signature);
//    $html = "<p>Your payment was successful</p>
//             <p>Payment ID: {$_POST['razorpay_payment_id']}</p>";
} else {
    $html = "<p>Your payment failed</p>
             <p>{$error}</p>";
}

echo $html;
