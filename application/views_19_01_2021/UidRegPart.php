<?php
//echo $package_id;
//die;
$this->load->view('home_header_view');
$this->load->library('cart');
?>

<script src="http://imsportal.in/assets/js/jquery.blockUI.js"></script>
<!-- Content Row -->
<div class="container main_container">
    <div class="main_body">
        <div class="row">
            <aside class="col-md-3">
                <!--cart page-->
                <div class="panel panel-primary border">
                    <h4 class="quickpanelhead quiz_head">Cart Summary</h4>
                    <div class="cart-inner">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td>Program (s)</td>
                                    <td class="text-right"><?= $this->cart->total_items(); ?></td>
                                </tr>
                                <tr>
                                    <td class="no-border">Cost</td>
                                    <td class="no-border text-right">INR <?= $this->cart->total() + (($this->cart->total() / 100) * 18); ?></td>
                                </tr>
                            </table>
                        </div>
<!--                        <p class="text-center">

                            <button class="btn btn-warning">Proceed to Checkout</button></p>-->
                    </div>
                </div>
                <!--cart page end-->

                <?php $this->load->view('ProgramSideView'); ?>
            </aside>
            <section class="col-md-9" style="min-height: 395px;">

                <!--                <div class="panel">
                                    <h1 class="header_text">Checkout</h1>
                                </div>-->
                <!--                <div class="checkout">-->
                <div class="text-justify">
                    <div class="panel" style="background: #8abd54; color: #fff;">
                        <center><h4>Your Details - 3 of 3</h4></center>
                    </div>
                </div>
                <h4>For an Institutional Customer</h4><br><br><br><br>
                <div class="row">
                    <form method="post" role="form" action=" <?php echo base_url() . 'unique_code_verification'; ?>">
                        <input type="hidden" id="reg_id" name="reg_id" value="<?php echo $reg_id; ?>">
<!--                        <input type="hidden" id="total_amount" name="total_amount" value="<?php // echo $total_amount;                                                  ?>">-->
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <div class="row">
                                    <div class ="col-md-10">
                                        <label class="control-label sr-only " for="Name">UID:</label>
                                        <input id="coupon" type="text" name="coupon" placeholder="Please Put Your Unique Identification Number" class="form-control">
                                        <span id="emailWarn" class="emailWarn"></span>
                                    </div>
                                    <div class ="col-md-2">
                                        <button type="button" id="apply" class="bth btn-success">Apply</button>
                                    </div>
                                </div>
                                <h5><b>An alphanumeric 10 character number</b></h5>
                            </div>
                            <br><br><br><br>
                            <button type="submit" id="submit" class="btn btn-success btn-md ">Confirm</button>
                    </form>
                </div>
                <!--                </div>-->
            </section><!-- end col-md-9 -->
        </div>

        <?php
        $this->load->view('home_footer');
        ?>
    </div>
</div>
<style>


    .tooltip.top .tooltip-inner{

        max-width:250px;

        padding:3px 8px;

        color:#fff;

        text-align:center;

        background-color:rgb(1, 137, 123);

        border-radius:5px

    }
    .btn {
        width:840px;
        padding:7px;
    }

</style>
<script>
    $(document).ready(function () {
        $("#submit").hide();
    });

    $("#apply").click(function () {
        var coupon = $("#coupon").val();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() . 'unique_code_applied'; ?>",
            data: {
                coupon: coupon
            },
            success: function (data)
            {
                var goodColor = "#66cc66";
                var badColor = "#ff6666";
                var message = document.getElementById('emailWarn');
                if (data == "yes") {
                    $('#coupon').css('border-color', 'green');
                    $("#submit").show();
                    message.innerHTML = "";
                } else {
                    $('#coupon').css('border-color', 'red');
                    $("#submit").hide();
                    message.style.color = badColor;
                    message.innerHTML = "Invalid Coupon!";
                }
            },
            error: function () {
                // alert("ajax error");
            }
        });
    });
//    $("form").submit(function () {
//        $(this).find(":submit").prop('disabled', true);
//        $(this).find(":submit").html("please wait....");
////        alert('Form is submitting....');
//        $.blockUI({message: '<h1><img src="<?php echo base_url(); ?>/assets/img/ajax-loader.gif" /> </h1><h4>Please Wait...</h4>', css: {width: '18%', left: '40%'}});
//
////        alert('Form is submitting....');
//// Or Do Something...
//        return true;
//    });
</script>
<!--<script>
$("#stream").on('change', function () {
    alert($("#stream").val());
    if ($("#stream").val() == "Others") {
        $("#other_stream").show();
    } else {
        $("#other_stream").hide();
    }

});
$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip({
        placement: "top"
    });

});
function checkPass()
{
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('newPassword');
    var pass2 = document.getElementById('confirmPassword');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field
    //and the confirmation field
    if (pass1.value == pass2.value) {
        $('#confirmPassword').parent().removeClass("has-warning");
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match!";
        $("#submit").prop('disabled', false);
    } else {
        $('#confirmPassword').parent().addClass("has-warning");
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!";
        $("#submit").prop('disabled', true);
    }
}
function checkMail()
{
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('email');
    var pass2 = document.getElementById('confirmEmail');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmEmailMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field
    //and the confirmation field
    if (pass1.value == pass2.value) {
        $('#confirmEmail').parent().removeClass("has-warning");
        message.style.color = goodColor;
        message.innerHTML = "Email Ids Match!";
        $("#submit").prop('disabled', false);
    } else {
        $('#confirmEmail').parent().addClass("has-warning");
        message.style.color = badColor;
        message.innerHTML = "Email Ids Do Not Match!";
        $("#submit").prop('disabled', true);
    }
}

$("form").submit(function () {
    $(this).find(":submit").prop('disabled', true);
    $(this).find(":submit").html("please wait....");
//        alert('Form is submitting....');
    $.blockUI({message: '<h1><img src="<?php echo base_url(); ?>/assets/img/ajax-loader.gif" /> </h1><h4>Please Wait...</h4>', css: {width: '18%', left: '40%'}});

    alert('Form is submitting....');
// Or Do Something...
    return true;
});
</script>-->
<script type="text/javascript">
//    $('#dob').datetimepicker({
//        allowInputToggle: true,
//        format: 'DD-MM-YYYY'
//    });


</script>


