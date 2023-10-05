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
                                    <input id="fname" type="text" name="org_name" placeholder="Name of the College/University" class="form-control" required="">
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
                                    <label class="control-label required sr-only" for="select"></label>
                                    <select class="form-control" id="stream" required="" name="stream">
                                        <!--<optgroup label="Category">-->
                                        <option value="">Stream </option>
                                        <option value="commerce">Commerce</option>
                                        <option value="Engineering">Engineering</option>
                                        <option value="Healthcare">Healthcare</option>
                                        <option value="HotelManagement">Hotel Management</option>
                                        <option value="Humanities">Humanities</option>
                                        <option value="Law">Law</option>
                                        <option value="Management">Management</option>
                                        <option value="Science">Science</option>
                                        <option value="Others">Others</option>
                                        <!--</optgroup>-->



                                    </select>
                                </div>
                            </div>
                            <div id="other_stream" class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="display:none">
                                <div class="form-group">
                                    <label class="control-label sr-only " for="Name"></label>
                                    <input  type="text" name="other_stream" placeholder="Specify Stream if Other!" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label required sr-only" for="select"></label>
                                    <select class="form-control" required="" id="course" name="course">
                                        <!--<optgroup label="Category">-->
                                        <option value="">Course </option>
                                        <option value="bcom">B.Com</option>
                                        <option value="bsc">B.Sc.</option>
                                        <option value="btech">B Tech</option>
                                        <option value="ba">BA</option>
                                        <option value="bba">BBA</option>
                                        <option value="bca">BCA</option>
                                        <option value="diploma">Diploma</option>
                                        <option value="mcom">M.Com</option>
                                        <option value="mphil">M.Phil</option>
                                        <option value="msc">M.Sc.</option>
                                        <option value="mtech">M Tech</option>
                                        <option value="ma">MA</option>
                                        <option value="mba">MBA</option>
                                        <option value="pgdbm">PGDBM</option>
                                        <option value="pgdca">PGDCA</option>
                                        <option value="mca">MCA</option>
                                        <option value="phd">PhD</option>
                                        <option value="llb">LLB</option>
                                        <option value="llm">LLM</option>
                                        <option value="Others">Other</option>
                                        <!--</optgroup>-->



                                    </select>
                                </div>
                            </div>
                            <div id="other_course" class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="display:none">
                                <div class="form-group">
                                    <label class="control-label sr-only " for="Name"></label>
                                    <input  type="text" name="other_course" placeholder="Specify Course if Other!" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label required sr-only" for="select"></label>
                                    <select class="form-control" id="specialization_area" required="" name="specialization_area">
                                        <!--<optgroup label="Category">-->
                                        <option value="">Area of Specialization </option>
                                        <optgroup label="Engineering">
                                            <option value="aeronautical">Aeronautical</option>
                                            <option value="biotechnology">Biotechnology</option>
                                            <option value="chemical">Chemical</option>
                                            <option value="civil">Civil</option>
                                            <option value="cs&it">CS & IT</option>
                                            <option value="ece">ECE</option>
                                            <option value="electrical&electronics">Electrical & Electronics</option>
                                            <option value="instrumentation">Instrumentation</option>
                                            <option value="mechanical">Mechanical</option>
                                            <option value="metallurgy">Metallurgy</option>
                                            <option value="nanotechnology">Nanotechnology</option>
                                            <option value="Others">Other</option>
                                        </optgroup>
                                        <optgroup label="Business Administration">
                                            <option value="agribusiness">Agri-Business</option>
                                            <option value="entrepreneurship">Entrepreneurship</option>nanotechnology
                                            <option value="finance">Finance</option>
                                            <option value="healthcare">Health Care</option>
                                            <option value="hospital">Hospital</option>
                                            <option value="humanresource">Human Resources</option>
                                            <option value="internationalbusiness">International Business</option>
                                            <option value="IT">IT</option>
                                            <option value="marketing">Marketing</option>
                                            <option value="operations">Operations</option>
                                            <option value="retail">Retail</option>
                                            <option value="ruralmanagement">Rural Management</option>
                                            <option value="supplychainmanagement">Supply Chain Management</option>
                                            <option value="telecom">Telecom</option>
                                            <option value="Others">Other</option>
                                        </optgroup>
                                        <optgroup label="Science">
                                            <option value="biochemistry">Biochemistry</option>
                                            <option value="biology">Biology</option>
                                            <option value="botany">Botany</option>
                                            <option value="chemistry">Chemistry</option>
                                            <option value="electronics">Electronics</option>
                                            <option value="mathematics">Mathematics</option>
                                            <option value="microbiology">Microbiology</option>
                                            <option value="physics">Physics</option>
                                            <option value="zoology">Zoology</option>
                                            <option value="agriculture">Agriculture</option>
                                            <option value="horticulture">Horticulture</option>
                                            <option value="Others">Other</option>
                                        </optgroup>
                                        <optgroup label="Humanities">
                                            <option value="aeronautical">Archeology</option>
                                            <option value="biotechnology">Economics</option>
                                            <option value="chemical">Geography</option>
                                            <option value="civil">History</option>
                                            <option value="cs&it">Library Sciences</option>
                                            <option value="ece">Literature</option>
                                            <option value="electrical&electronics">Philosphy</option>
                                            <option value="instrumentation">Political Science</option>
                                            <option value="mechanical">Psephology</option>
                                            <option value="metallurgy">Public Adminstration</option>
                                            <option value="nanotechnology">Sociology</option>
                                            <option value="nanotechnology">Statistics</option>
                                            <option value="Others">Other</option>
                                        </optgroup>

                                        <optgroup label="Law">
                                            <option value="civil">Civil</option>
                                            <option value="corporate">Corporate</option>
                                            <option value="criminal">Criminal</option>
                                            <option value="general">General</option>
                                            <option value="international">International</option>
                                            <option value="labor">Labor</option>
                                            <option value="patent">Patent</option>
                                            <option value="realestate">Real Estate</option>
                                            <option value="tax">Tax</option>
                                            <option value="Others">Other</option>
                                        </optgroup>

                                        <optgroup label="Health Care">
                                            <option value="mbbs">MBBS</option>
                                            <option value="nursing">Nursing</option>
                                            <option value="nutrition&dietetics">Nutrition & Dietetics</option>
                                            <option value="pharmacy">Pharmacy</option>
                                            <option value="physiotherapy">Physiotherapy</option>
                                            <option value="Others">Other</option>
                                        </optgroup>

                                        <optgroup label="Hotel Management">
                                            <option value="accommodation">Accommodation</option>
                                            <option value="bakery&confectionary">Bakery & Confectionary</option>
                                            <option value="food&beverage">Food & Beverage</option>
                                            <option value="foodproduction">Food Production</option>
                                            <option value="frontoffice">Front Office</option>
                                            <option value="general">General</option>
                                            <option value="housekeeping">Housekeeping</option>
                                            <option value="Others">Other</option>
                                        </optgroup>


                                        <!--</optgroup>-->



                                    </select>
                                </div>
                            </div>
                            <div id="other_specialization_area" class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="display:none">
                                <div class="form-group">
                                    <label class="control-label sr-only " for="Name"></label>
                                    <input  type="text" name="other_specialization_area" placeholder="Specify Area of Specialisation if Other!" class="form-control">
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
            </section>

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
    $("#stream").on('change', function () {
//        alert($("#stream").val());
        if ($("#stream").val() == "Others") {
            $("#other_stream").show();
        } else {
            $("#other_stream").hide();
        }

    });
    $("#course").on('change', function () {
//        alert($("#stream").val());
        if ($("#course").val() == "Others") {
            $("#other_course").show();
        } else {
            $("#other_course").hide();
        }

    });
    $("#specialization_area").on('change', function () {
//        alert($("#stream").val());
        if ($("#specialization_area").val() == "Others") {
            $("#other_specialization_area").show();
        } else {
            $("#other_specialization_area").hide();
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

//        alert('Form is submitting....');
// Or Do Something...
        return true;
    });
</script>
<script type="text/javascript">
    $('#dob').datetimepicker({
        allowInputToggle: true,
        format: 'DD-MM-YYYY'
    });


</script>


