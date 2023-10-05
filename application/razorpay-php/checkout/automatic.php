<!--  The entire list of Checkout fields is available at
 https://docs.razorpay.com/docs/checkout-form#checkout-fields -->

<form action="verify.php" method="POST">
  <!--PAGE STRUCTURE GOES HERE-->

<style type="text/css">
  body {
    font-family: "Arial";
    font-size: 14px;
    background-color: #e8e8e8 !important;
}
.razorpay-payment-button{
    position: fixed;
    left: 47%;
    /* margin-left: -8px; */
    top: 43%;
    background-color: #f67043;
    color: #fff;
    border: 1px #fff;
    padding: 0.2rem 1rem;
    border-radius: 5px;
    font-size: 15px;
    text-transform: uppercase;
}
.razorpay-cancle-button{
    position: fixed;
    left:45.5%;
    /* margin-left: -8px; */
    top: 57%;
    color: #fff;
    background-color: #00897b;
    border-color: #00897b;
    border: 1px;
    padding: 0.2rem 1rem;
    border-radius: 5px;
    font-size: 15px;
    text-transform: uppercase;
    text-decoration: none;

}
.razorpay-cancle-button:hover{color: #000; text-decoration: none;}
.custom-box{
    position: relative;
    margin: 4rem 0;
    background: #00BCD4;
    border-radius: 30px;
    padding: 8rem 0;
    color: #fff;
}
</style>
<!--<section class="container">

     <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="custom-box">
                <p class="text-center">You sent a payment of Rs 7200 to Razorpay.</p>
            </div>
        </div>
    </div>

</section>-->

<!--PAGE STRUCTURE ENDS HERE-->

  <script
    src="<?php echo(base_url() . 'assets/js/' . 'checkout.js'); ?>"
    data-key="<?php echo $data['key']?>"
    data-amount="<?php echo $data['amount']?>"
    data-currency="INR"
    data-name="<?php echo $data['name']?>"
    data-image="<?php echo $data['image']?>"
    data-description="<?php echo $data['description']?>"
    data-prefill.name="<?php echo $data['prefill']['name']?>"
    data-prefill.email="<?php echo $data['prefill']['email']?>"
    data-prefill.contact="<?php echo $data['prefill']['contact']?>"
    data-notes.shopping_order_id="3456"
    data-order_id="<?php echo $data['order_id']?>"
    <?php if ($displayCurrency !== 'INR') { ?> data-display_amount="<?php echo $data['display_amount']?>" <?php } ?>
    <?php if ($displayCurrency !== 'INR') { ?> data-display_currency="<?php echo $data['display_currency']?>" <?php } ?>
  >
  </script>
  <!-- Any extra fields to be submitted with the form but not sent to Razorpay -->
  <input type="hidden" name="shopping_order_id" value="3456">
   <input type="hidden" name="package" value="<?php echo $package ?>">
  <input type="hidden" name="reg" value="<?php echo $reg ?>">
</form>
<!--a href="#!" class="razorpay-cancle-button">Back to Cart</a-->


<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $('.razorpay-payment-button').val("Pay Now");
        });
    </script>