<?php
$this->load->view('header_view');
//$this->load->view('user_left_view');
?>
<div class="container main_container">
    <div class="well main_body">
      <div class="row" id="_bigCallout">
        <?php
        //$return = $this->custom->get_nav_node_crumb($id, $nav_type);
        //$this->custom->get_side_navigation_panel_new($id, $nav_type);
        ?>
   
   <div class="col-md-3">
                <div class="well fre_news">
                    <h3 id="free_news">Free Newsletter </h3>
                    <p class="textstyle">Learn new skills every month and get our Personal Selling Toolkit free as the Subscription bonus.</p>
                    <div class="input-group">
                        <form action="<?php echo base_url().'subscribNewsLetter/user'; ?>" id="news_letter" method="POST">
                            <input id="first_name" name="first_name" class="form-control inputbox" placeholder="First Name" type="text" data-validation-required-message="Please enter your first name." required="" aria-invalid="false"/>
                            <input id="last_name" name="last_name" class="form-control inputbox" placeholder="Last Name" type="text" data-validation-required-message="Please enter your last name." required="" aria-invalid="false"/>
                            <input id="email" name="email" class="form-control inputbox" placeholder="Email" type="email" data-validation-required-message="Please enter your email address." required="" aria-invalid="false"/>
                            <button type="submit" class="btn btn-primary btn-lg bttn" data-toggle="modal" data-target="#myModal">
                                Click to subscribe
                            </button>
                            
                        </form>
                    </div>
                    <!-- /.input-group -->
                </div>

</div><!-- end col-md-3 -->
<!-- end sidebar panel -->








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
 </div>          
 
