<?php $this->load->view('home_front_view'); ?>
<!-- Content Row -->
<section class="unsub-bottom py-5">

        <div class="container cont-border">


            <img src="<?php echo base_url('assets/home/images/unsub.jpg');?>" alt="Unsubscribe">

            <h3>You have unsubscribed</h3>
            <p>You will no longer receive monthly Newsletter from Skillpromise</p>

            <hr class="hr-bottom">

            <p>Unsubscribed by accident? <a href="<?= base_url();?>">Subscribe again</a></p>



        </div>
        
        <p style="margin-top:50px;">Checking Subscribe again will the use to <a href="<?= base_url();?>">home page</a></p>






    </section>
  <!--<section class="unsubscribed py-5 ">-->
  <!--  <div class="container">  -->
  <!--           <h3>You have successfully unsubscribed</h3>-->

  <!--            </div>-->
  <!--          </section>-->
       
        
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


