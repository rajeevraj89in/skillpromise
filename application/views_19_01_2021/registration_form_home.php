<?php $this->load->view('home_header_view'); ?>


<!-- Content Row -->
<div class="container main_container">
    <div class="main_body">
        <div class="row">


            <aside class="col-md-3">
                <?php $this->load->view('ProgramSideView'); ?>
                <?php
               $this->load->view('newsLetterSubscription');
               ?>

            </aside>



            <section class="col-md-9" style="min-height: 395px;">

                <div class="panel">
                    <h1 class="header_text">Registration form</h1>
                </div>


                <div class="text-justify">
                    <h1></h1>
                <div class="input-group">
                    <form action="<?php echo base_url().'registrationMail_'; ?>" id="news_letter" method="POST">
                      <!--<input id="first_name" name="first_name" class="form-control inputbox" placeholder="First Name" type="text" data-validation-required-message="Please enter your first name." required="" aria-invalid="false"/>
                        <input id="last_name" name="last_name" class="form-control inputbox" placeholder="Last Name" type="text" data-validation-required-message="Please enter your last name." required="" aria-invalid="false"/>
                        <input id="contact_number" name="contact_no" class="form-control inputbox" placeholder="Contact Number" type="" data-validation-required-message="Please enter your contact number." required="" aria-invalid="false"/>
                        <input id="email" name="email" class="form-control inputbox" placeholder="Email" type="email" data-validation-required-message="Please enter your email address." required="" aria-invalid="false"/>
                    -->    
<label>For Institutional Customers only</label><input id="code" name="uid" class="form-control inputbox" placeholder="Please enter your 10-digit alphanumeric code" type="text" data-validation-required-message="Please enter your 10-digit alphanumeric code" required="" aria-invalid="false"/>
                    
                        <button type="submit" class="bttn btn btn-primary inputbox col-md-12"  ><b>Submit</b></button>
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


     
 
