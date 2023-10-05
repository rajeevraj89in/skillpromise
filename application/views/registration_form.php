<?php
$this->load->view('header_view');
$this->load->view('user_left_view');
?>

 <!--<div class="container main_container">
        <div class="well main_body">
            <div class="row">-->
             <div class="col-md-6">
                 <h1>Registration form</h1>
                <div class="input-group">
                    <form action="<?php echo base_url().'registrationMail'; ?>" id="news_letter" method="POST">
                        <input id="first_name" name="first_name" class="form-control inputbox" placeholder="First Name" type="text" data-validation-required-message="Please enter your first name." required="" aria-invalid="false"/>
                        <input id="last_name" name="last_name" class="form-control inputbox" placeholder="Last Name" type="text" data-validation-required-message="Please enter your last name." required="" aria-invalid="false"/>
                        <input id="contact_number" name="contact_no" class="form-control inputbox" placeholder="Contact Number" type="" data-validation-required-message="Please enter your contact number." required="" aria-invalid="false"/>
                        <input id="email" name="email" class="form-control inputbox" placeholder="Email" type="email" data-validation-required-message="Please enter your email address." required="" aria-invalid="false"/>

                        <button type="submit" class="bttn btn btn-primary inputbox col-md-12"  ><b>Submit</b></button>
                    </form>
                </div>
             </div>
            <?php $this->load->view('quick_link_view'); ?>    
                
            
        
<?php
            
            $this->load->view('footer_view');
            $this->load->view('html_end_view');
?>       
        
 
