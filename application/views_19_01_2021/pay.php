<form enctype="multipart/form-data" class="form-horizontal" id="form" role="form" action=" <?php echo base_url() . 'verify'; ?>" method="POST">
    <?php
    require(APPPATH . '/razorpay-php/config.php');
    require(APPPATH . '/razorpay-php/Razorpay.php');

//session_start();
// Create the Razorpay Order

    use Razorpay\Api\Api;

$api = new Api("rzp_test_ZIuKMztAVE02xK", "fUXTgRoX6FjqoevTspjWe5yu");

//
// We create an razorpay order using orders api
// Docs: https://docs.razorpay.com/docs/orders
//
    $orderData = [
        'receipt' => 3456,
        'amount' => $total_amt * 100, // 2000 rupees in paise
        'currency' => 'INR',
        'payment_capture' => 1 // auto capture
    ];

    $razorpayOrder = $api->order->create($orderData);

    $razorpayOrderId = $razorpayOrder['id'];

    $_SESSION['razorpay_order_id'] = $razorpayOrderId;

    $displayAmount = $amount = $orderData['amount'];

 //   if ($displayCurrency !== 'INR') {
 //       $url = "https://data.fixer.io/api/latest?symbols=$displayCurrency&base=INR";
 //       $exchange = json_decode(file_get_contents($url), true);

 //       $displayAmount = $exchange[$displayCurrency] * $amount / 100;
 //   }

    $checkout = 'automatic';

    if (isset($_GET['checkout']) and in_array($_GET['checkout'], ['automatic', 'manual'], true)) {
        $checkout = $_GET['checkout'];
    }

    $data = [
        "key" => $keyId,
        "amount" => $amount,
        "name" => "Skill Promise",
        "description" => "© by Skillcrop Pvt. Ltd",
        "image" => base_url() . 'assets\img\skillcrop_logo.png',
        "prefill" => [
            "name" => $coustmetn_details->fname." ".$coustmetn_details->lname,
            "email" => $coustmetn_details->email,
            "contact" => $coustmetn_details->phone,
        ],
        "notes" => [
            "address" => "Hello World",
            "merchant_order_id" => "12312321",
        ],
        "theme" => [
            "color" => "#F37254"
        ],
        "order_id" => $razorpayOrderId,
    ];

 //   if ($displayCurrency !== 'INR') {
 //       $data['display_currency'] = $displayCurrency;
 //       $data['display_amount'] = $displayAmount;
 //   }

    $json = json_encode($data);
//require("checkout/{$checkout}.php");
    require(APPPATH . '/razorpay-php/checkout/automatic.php');
    ?>
    <input type="hidden" name="package" value="<?php echo $package ?>">
    <input type="hidden" name="reg" value="<?php echo $reg ?>">
</form>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('#form').submit();
    });
</script>