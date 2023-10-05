<?php
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

                <div class="panel">
                    <h1 class="header_text">Checkout</h1>
                </div>


                <div class="checkout">
                    <p><strong>Your Details - 2 of 3</strong></p>
                    <div class="row">
                        <form method="post" role="form" action=" <?php echo base_url() . 'UserRegPart3'; ?>">

                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label sr-only " for="Name"></label>
                                    <input id="fname" type="text" name="org_name" placeholder="Organisation Name" class="form-control" required="">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label sr-only " for="Name"></label>
                                    <input id="lname" type="text" name="city" placeholder="City" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label sr-only " for="Name"></label>
                                    <input id="lname" type="text" name="state" placeholder="State" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label sr-only " for="Name"></label>
                                    <input id="lname" type="text" name="country" placeholder="Country" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label sr-only " for="designation"></label>
                                    <input id="designation" type="text" name="designation" placeholder="Designation" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label sr-only " for="designation"></label>
                                    <input id="work_exp" type="text" name="work_exp" placeholder="Working Experience" class="form-control">
                                </div>
                            </div>


                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label required sr-only" for="select"></label>
                                    <select class="form-control" id="work_area" required="" name="work_area">
                                        <!--<optgroup label="Category">-->
                                        <option value="">Working Area </option>
                                        <option value="administartion">Administartion</option>
                                        <option value="customercare">Customer Care</option>
                                        <option value="engineering">Engineering</option>
                                        <option value="facilities">Facilities</option>
                                        <option value="finance">Finance</option>
                                        <option value="hotelmanagement">Hotel Management</option>
                                        <option value="hr">HR</option>
                                        <option value="legal">Legal</option>
                                        <option value="market6ing">Marketing</option>
                                        <option value="operations">Operations</option>
                                        <option value="programming">Programming</option>
                                        <option value="sales">Sales</option>
                                        <option value="servicedelivery">Service Delivery</option>
                                        <option value="testing">Testing</option>
                                        <option value="Others">Others</option>
                                        <!--</optgroup>-->



                                    </select>
                                </div>
                            </div>
                            <div id="other_work_area" class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="display:none">
                                <div class="form-group">
                                    <label class="control-label sr-only " for="Name"></label>
                                    <input  type="text" name="work_area" placeholder="Specify Work Area if Other!" class="form-control">
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label sr-only " for="Name"></label>
                                    <input id="phone" type="number" name="phone" placeholder="Contact No." class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label sr-only " for="Name"></label>
                                    <input id="dob" type="text" name="dob" placeholder="Date Of Birth" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                <button type="submit" id="submit" class="btn btn-success btn-sm ">Continue</button>
                            </div>



                        </form>
                    </div>
                </div>
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


</style>
<script>
    $("#work_area").on('change', function () {
//        alert($("#stream").val());
        if ($("#work_area").val() == "Others") {
            $("#other_work_area").show();
        } else {
            $("#other_work_area").hide();
        }

    });
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip({
            placement: "top"
        });

    });
    $('#dob').datetimepicker({
        allowInputToggle: true,
        format: 'DD-MM-YYYY'
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
</script>


