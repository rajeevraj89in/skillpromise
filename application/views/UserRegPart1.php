<?php
$this->load->view('home_front_view');
// $this->load->view('home_header_view');
$this->load->library('cart');
?>
<script src="http://imsportal.in/assets/js/jquery.blockUI.js"></script>
<!-- Content Row -->
<div class="container container">

        <div class="row">


            <div class="col-md-3">

                <!--cart page-->
                <div class="panel panel-primary border" style="  border: 1px solid; 
                box-shadow: 0px 1px 1px 1px #888888;">
                    <h4 class="quickpanelhead quiz_head" style="background:#3e7010;color:#fff;text-align:center;margin-top:10px;padding:10px">Cart Summary</h4>
                    <div class="cart-inner">
                        <div class="table-responsive">
                            <table class="table">
                                <tr style="background:#3e7010;color:#fff;text-align:center;margin-top:10px;padding:10px">
                                    <td >Program (s)</td>
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

                <?php //$this->load->view('ProgramSideView'); ?>



            </div>



            <section class="col-md-9" >

                <div class="panel mt-2">
                    <h2 class="header_text">Checkout</h2>
                </div>


                <div class="checkout">
                    <p><strong>Your Details - 1 of 3</strong></p>
                    <div class="container">
                         <form method="post"  action=" <?php echo base_url() . 'UserRegPart2'; ?>" >
       
                    <div class="row">
                       
<!--                        <input type="hidden" name="total_amount" id="total_amount" value="<?php echo $total_amount; ?>">-->

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label " for="Name"></label>
                                    <input id="fname" type="text" name="fname" placeholder="First Name" class="form-control" required="">
                                </div>
                            </div>
                            
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label sr-only " for="Name"></label>
                                    <input id="lname" type="text" name="lname" placeholder="Last Name" class="form-control">
                                </div>
                            </div>
                            
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label sr-only " for="email"></label>
                                    <input id="email" type="email" name="email" placeholder="Email Address" class="form-control" required="">
                                    <span id="emailWarn" class="emailWarn"></span>
                                </div>
                            </div>
                            
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label sr-only " for="email"></label>
                                    <input id="confirmEmail" type="email" onkeyup="checkMail();return false;" placeholder="Confirm Email Address" class="form-control" required="">
                                    <span id="confirmEmailMessage" class="confirmEmailMessage"></span>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label sr-only " for="Phone"></label>
                                    <input id="user_name" name="user_name" pattern="[A-Za-z0-9_]{4,}" data-toggle="tooltip" title="4 or mor characters in length and may only contains letters,numbers, and the underscror '_'" type="text" placeholder="User Name" class="form-control" required="">
                                    <span id="userWarn" class="userWarn"></span>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label sr-only " for="Phone"></label>
                                    <input id="newPassword" name="password" pattern=".{6,}" data-toggle="tooltip"  title="Must be 6 or more characters." type="password" placeholder="Password" class="form-control" required="">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label sr-only " for="Phone"></label>
                                    <input id="confirmPassword" onkeyup="checkPass();return false;" type ="password" placeholder="Confirm Password" class="form-control" required="">
                                    <span id="confirmMessage" class="confirmMessage"></span>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label required sr-only" for="select"></label>
                                    <select class="form-control" required="" name="category">
                                        <!--<optgroup label="Category">-->
                                        <option value="School" selected="true">School</option>
                                        <option value="College">College</option>
                                        <option value="Professionals">Professionals</option>
                                        <!--</optgroup>-->



                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                <button type="submit" id="submit" class="btn btn-success btn-sm ">Continue</button>
                            </div>
                        



                  
                    </div>
                          </form>
                    </div>
                </div>
            </section><!-- end col-md-9 -->

</div>
<br>
    

        <?php
        $this->load->view('home_footer');
        ?>
    
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

    $("#email").on('blur', function () {
        var datastring = {}
        datastring['data'] = $("#email").val();
        datastring['type'] = 'email';
        $.ajax({
            url: "<?php echo base_url(); ?>validate",
            type: "POST",
            data: datastring,

            beforeSend: function () {
               $.blockUI({ css: { 
            border: 'none', 
            padding: '15px', 
            backgroundColor: '#000', 
            '-webkit-border-radius': '10px', 
            '-moz-border-radius': '10px', 
            opacity: .5, 
            color: '#fff' 
        } }); 
                
            },
            success: function (data) {
                $.unblockUI();
                var goodColor = "#66cc66";
                var badColor = "#ff6666";
                var message = document.getElementById('emailWarn');
                if (data == 1) {
                    $("#submit").prop('disabled', true);
                    message.style.color = badColor;
                    message.innerHTML = "Email Id is already registerd!";
                } else {
                    $("#submit").prop('disabled', false);
                    message.innerHTML = "";

                }
//                window.open(base_url, "_self");

            },
            error: function () {
                alert('Failed...');
            }
        });
    });
    $("#user_name").on('blur', function () {
        var datastring = {}
        datastring['data'] = $("#user_name").val();
        datastring['type'] = 'user_name';
        $.ajax({
            url: "<?php echo base_url(); ?>validate",
            type: "POST",
            data: datastring,

            beforeSend: function () {
               $.blockUI({ css: { 
            border: 'none', 
            padding: '15px', 
            backgroundColor: '#000', 
            '-webkit-border-radius': '10px', 
            '-moz-border-radius': '10px', 
            opacity: .5, 
            color: '#fff' 
        } }); 
            },
            success: function (data) {
//                alert(data);
                $.unblockUI();
                var goodColor = "#66cc66";
                var badColor = "#ff6666";
                var message = document.getElementById('userWarn');
                if (data == 1) {
                    $("#submit").prop('disabled', true);
                    message.style.color = badColor;
                    message.innerHTML = "User Name is already registerd!";
                } else {
                    $("#submit").prop('disabled', false);
                    message.innerHTML = "";

                }
//                window.open(base_url, "_self");

            },
            error: function () {
                alert('Failed...');
            }
        });
    });

    $("form").submit(function () {
        $(this).find(":submit").prop('disabled', true);
        $(this).find(":submit").html("please wait....");
//        alert('Form is submitting....');
        $.blockUI({ css: { 
            border: 'none', 
            padding: '15px', 
            backgroundColor: '#000', 
            '-webkit-border-radius': '10px', 
            '-moz-border-radius': '10px', 
            opacity: .5, 
            color: '#fff' 
        } }); 

//        alert('Form is submitting....');
// Or Do Something...
        return true;
    });
</script>


