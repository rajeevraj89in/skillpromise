<?php $this->load->view('home_front_view'); ?>
<h5 style="margin-left:100px;margin-top:5px;"><a href="<?= base_url();?>">Home</a> / Subscribenewsletter / Bonusdownload</h5>
<!-- Content Row -->
 <?php
      if(!isset($chec))
      { ?> 
  <section class="newsletter py-5 ">
    <div class="container">
        <h2>Thank you for Subscribing to our Newsletter</h2>
        <p>Please confirm you email address by clicking on the link in the email sent to you</p>
        <img src="<?php echo(base_url() . 'assets/home/images/'.'subscription.png'); ?>" style="width:60%;height:150px;" alt="subscription">
        <p>Please check you spam folder if you do not receive the mail. Remember to check promotions tab, if you use Gmail.</p>
     </div>
    </section>
         <?php }
    else if(isset($return_id))
     {
         ?>  
 <section class="unsubscribed py-5 ">
    <div class="container">            
         <h3>You have successfully unsubscribed</h3>
        <p>If you have a moment, please let us know why you unsubscribed:</p>
   <form style="padding-left:0% !important;" action="<?php  echo base_url().'/mailUnsubscribedConfirm/'.$return_id; ?>" method="post">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="reason" id="exampleRadios1" value="option1" checked>
            <label class="form-check-label" for="exampleRadios1">
                The Newsletter mail is too frequent
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="reason" id="exampleRadios2" value="option2">
            <label class="form-check-label" for="exampleRadios2">
                I never signed up for the Newsletter
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="reason" id="exampleRadios3" value="option3">
            <label class="form-check-label" for="exampleRadios3">
                Newsletter is too long
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="reason" id="exampleRadios4" value="option4">
            <label class="form-check-label" for="exampleRadios4">
                I do not find the Newsletter useful
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="reason" id="exampleRadios5" value="option5">
            <label class="form-check-label" for="exampleRadios5">
                This is temporary. I will subscribe again after some time
            </label>
          </div>
                        <button  id="subsc" style="background-color:white !important;border:1px solid black !important;color:black !important;border-radius:0px !important;margin: 31px 0 24px;padding: 5px 10px;">Subscribe</button>
         </form>
          <!--<a href="#" class="glb-btn submit">Submit</a>-->
            </div>
            </section>
             <?php  }
                    
            else{ ?> 
                  
   <section class="newsletter py-5 ">
     <div class="container">
        <h2>Thank you! Download your subscription bonus</h2>
        <p>You have successfully confirmed your email address and subscribed to our newsletter. Please click on the link below to download your Art of Building Credibility eBook</p>
        <img src="<?php echo(base_url() . 'assets/home/images/'.'download.png'); ?>" style="width:60%;height:150px;" alt="download">        
        <a href="<?php echo base_url(); ?>assets/Art of Building Credibility e-Book.pdf" width="100px" height="20px" class="glb-btn download">Download</a>
     </div>
    </section>
            <?php }                  
                    ?>
 <?php
        $this->load->view('home_footer');
        ?>
<!--<div class="container main?>_container">-->
<!--    <div class="main_body">-->
        <!--<div class="row">-->
        <!--    <section class="col-md-12" style="min-height: 395px;">-->
        <!--        <div class="text-justify" style="text-align:center;margin-top:50px;width:100%;">-->
        <!--        
        <!--            if(!isset($chec)){ ?> -->
        <!--            <h1 >Thank you for Subscribing to our NewsLater</h1>-->
        <!--            <span>-->
        <!--                Please confirm you email address by clicking on the link in the email sent to you-->
        <!--            </span><br><br><br>-->
        <!--                <img src="<?php echo(base_url() . 'assets/img/'.'subscription_image.jpg'); ?>">-->
                    <!--<form action="#" id="thankyouform">-->
                    <!--    <div class="input-group col">-->
                    <!--        <input value="school student" id="role_radiio1" class="radioBtnClass" type="radio" name="role"/> &nbsp;School Student<br>-->
                    <!--        <input value="higher education student"  id="role_radiio2" class="radioBtnClass" type="radio" name="role" checked=""/> &nbsp;Higher Education Student<br>-->
                    <!--        <input value="school teacher"  id="role_radiio3" class="radioBtnClass" type="radio" name="role"/> &nbsp;School Teacher<br>-->
                    <!--        <input value="college professor"  id="role_radiio4" class="radioBtnClass" type="radio"  name="role"/> &nbsp;College Professor<br>-->
                    <!--        <input value="first job seeker"  id="role_radiio5" class="radioBtnClass" type="radio" name="role"/>&nbsp;First Job Seeker<br>-->
                    <!--        <input value="management professional"  id="role_radiio6" class="radioBtnClass" type="radio" name="role"/> &nbsp;Management Professional<br>-->
                    <!--        <input value="leadership professional"  id="role_radiio7" class="radioBtnClass" type="radio" name="role"/> &nbsp;Leadership Professional<br>-->
                    <!--        <input value="college director"  id="role_radiio8" class="radioBtnClass" type="radio" name="role"/> &nbsp;College Director<br>-->
                    <!--        <input value="college vice chancellor"  id="role_radiio9" class="radioBtnClass" type="radio" name="role"/> &nbsp;College Vice Chancellor<br><br>-->
                    <!--        <br>-->
                    <!--    </div>-->
                    <!--    <div class="input-group">-->
                    <!--        <a download href="<?php echo base_url(); ?>assets/Art of Building Credibility e-Book.pdf">&nbsp;<button type="button" id="sub" class="bttn btn btn-sm btn-primary">Download your Art of Building Credibility e-Book</button></a>-->
                    <!--    </div>-->
                    <!--</form>-->
        <!--            <br><br>-->
        <!--                 Please check you spam folder if you do not receive the mail. Remember to check promotions tab, if you use Gmail.-->
        <!--            <br><br>-->
        <!--            
        <!--            else if(isset($return_id)){-->
        <!--            ?>    -->
        <!--          <div class="container" >-->
        <!--              <center >-->
        <!--                <h2 style="color:red;">You have successfully Unsubscribed</h2>-->
        <!--                <br>-->
        <!--              <h3>If you have a moment , please let us know why unsubscribed :</h3>-->
        <!--              </center>-->
        <!--                <br>-->
        <!--                <center>-->
        <!--                <div style="width:100%; heigth:400px;text-align:left !important;">-->
        <!--                  <form style="padding-left:0% !important;" action="<?php  echo base_url().'/mailUnsubscribedConfirm/'.$return_id; ?>" method="post">-->
        <!--                <div style="padding-left:0%;">-->
        <!--                      <span>Home/Subscribe</span>-->
        <!--                    <input type="radio" id="html" name="reason" value="The Newsletter mail is too frequent" style=" width: 25px;-->
        <!--                    height: 25px;">-->
        <!--                <label for="html"><h3>The Newsletter mail is too frequent</h3>-->
        <!--                </label>-->
        <!--                </div>-->
        <!--                <div style="padding-left:0%;">-->
        <!--                    <input type="radio" id="css" name="reason" value="II never signed up for the Newsletter" style=" width: 25px;-->
        <!--                    height: 25px;">-->
        <!--                    <input type="hidden" name="subscriber_id" value="<?php echo $return_id; ?>">-->
        <!--                <label for="css"><h3>II never signed up for the Newsletter</h3>-->
        <!--                </label>-->
        <!--                </div>-->
        <!--                <div  style="padding-left:0%;">-->
        <!--                    <input type="radio" id="javascript" name="reason" value="Newsletter is too long" style=" width: 25px;-->
        <!--                    height: 25px;">-->
        <!--                <label for="javascript"><h3>Newsletter is too long</h3>-->
        <!--                </label><br />-->
        <!--                </div>-->
        <!--                <input type="radio" id="html" name="reason" value="I do not find the Newsletter useful" style=" width: 25px;-->
        <!--                    height: 25px;">-->
        <!--                <label for="html"><h3>I do not find the Newsletter useful</h3>-->
        <!--                </label><br>-->
        <!--                <input type="radio" id="javascript" name="reason" value="This is temporary. I will subscribe again after some time" style=" width: 25px;-->
        <!--                    height: 25px;">-->
        <!--                <label for="javascript"><h3>This is temporary. I will subscribe again after some time</h3>-->
        <!--                </label><br>-->
        <!--                <button  id="subsc" style="background-color:white !important;border:1px solid black !important;color:black !important;border-radius:0px !important;margin: 31px 0 24px;padding: 7px 15px;">Subscribe</button>-->
        <!--                </form>-->
        <!--                </div>-->
        <!--                </center>-->
        <!--            </div> -->
        <!--        
        <!--            else{ ?> -->
        <!--            <img src="<?php echo(base_url() . 'assets/img/' . 'post_confirm_image.png'); ?>" style="width:80%;height:300px;"><br><br>-->
        <!--                <center>                  <a download href="<?php echo base_url(); ?>assets/Art of Building Credibility e-Book.pdf">&nbsp;<button type="button" id="sub" class="bttn btn btn-sm btn-primary">Download</button></a></center>-->
        <!--            
        <!--            ?>-->
        <!--        </div>-->
        <!--    </section><!-- end col-md-9 -->
        <!--</div>-->
       
<!--    </div>-->
<!--</div>-->

<script>
    $(document).ready(function () {

        var t = '<?php echo $chec; ?>';

        $('#sub').click(function (e) {

            if ($("input[type='radio'].radioBtnClass").is(':checked')) {
                var checked_val = $("input[type='radio'].radioBtnClass:checked").val();
                var dataString = {};
                dataString['cat'] = checked_val;
                dataString['id'] = t;

                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>/category",
                    data: dataString,
                    success: function (data) {



                    }

                });


            }


        }
        );
    });

</script>

