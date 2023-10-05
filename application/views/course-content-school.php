<?php $this->load->view('home_header_view'); ?> 


<!-- Content Row -->
<div class="container main_container">
    <div class="main_body">
        <div class="row">


            <aside class="col-md-3">
            <!--program menu start -->
            <div class="panel panel-primary border">
                <h4 class="quickpanelhead quiz_head">Programme</h4>
                <ul id="my_left_accordion" class="my_left_accordion nav nav-pills nav-stacked nav-sidebar">
                    <li class="">
                        <a href="#!">Self Assessment and Development Need Analysis (SANA) for Higher Education Students</a>
                    </li> 
                    <li class="">
                        <a href="#!">Self Assessment and Development Need Analysis (SANA) for Professionals</a>
                    </li> 
                    <li class="">
                        <a href="#!">Self Assessment and Development Need Analysis (SANA) for School Students</a>
                    </li> 
                </ul>
                </div>

                <!--news letter inner page-->
                <div id="newsletter">

                <div class="dooble-border">

                    <div class="well fre_news" style="margin-left: 0;">
                        <h3 id="free_news">Subscribe to our FREE Email Newsletter </h3>  
                        <div class="row"> 
                            <div class="col-md-9" style=" padding: 0 6px 0 15px;">
                                <div class="input-group">
                                    <form action="<?php echo base_url() . 'subscribNewsLetter/user'; ?>" id="news_letter" method="POST">
                                        <input id="first_name" name="first_name" class="form-control inputbox" placeholder="First Name" type="text" data-validation-required-message="Please enter your first name." required="" aria-invalid="false"/> 
                                        <input id="email" name="email" class="form-control inputbox" placeholder="Email" type="email" data-validation-required-message="Please enter your email address." required="" aria-invalid="false"/>

                                        <button type="submit" class="bttn btn btn-primary inputbox"><b>Subscribe</b></button>
                                    </form>
                                </div>
                            </div> 
                        <div class="col-md-3" style="padding: 8px 9px 0 0;">
                                <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/' . 'art-of-building.png'); ?>" >
                            </div>
                        </div>

                       <p class="textstyle">Signup for our free email newsletter and get our Art of Building Credibility e-Book FREE as the Subscription bonus<br><br><small class="text-right block"><a href="<?php echo(base_url() . "privacy-policy"); ?>" class="text-right">Our Privacy Policy</a></small></p> 
                        <!-- /.input-group -->
                    </div>
                </div>

            </div>
            <!--news letter inner end-->

            </aside>


            
            <section class="col-md-9" style="min-height: 395px;">

                <div class="panel">
                        <h1 class="header_text">Sections Covered in Self-Assessment & Development Need Analysis Program (SANA) for School Students</h1>
                </div>  

                <div class="text-justify"> 
                    <img style="width: 848px;" class="img-responsive" src="<?php echo(base_url() . 'assets/img/' . 'Course.jpg'); ?>" ><br>
                    <small class="block">Picture Courtesy: Pixabay.com</small>

                    <br>
                    

                    <h6 class="sub-sub-title">Recommended Duration: 30 days</h6>
                     <ul class="custom">
                        <li>Introduction to Self-Assessment</li>
                        <li>Self-Assessment Process</li>
                        <li>Components of Self-Assessment</li>
                        <li>Needs Assessment</li>
                        <li>Intelligence Assessment</li>
                        <li>Values Assessment</li>
                        <li>Skills Assessment</li>
                        <li>Strengths Assessment</li>
                        <li>Attitude Assessment</li>
                        <li>Wellness Assessment</li>
                        <li>Etiquette Assessment</li>
                        <li>Hobbies Assessment</li>
                        <li>Areas of Improvement Assessment</li>
                        <li>Personal SWOT Analysis</li>
                        <li>Goals Assessment</li> 
                     </ul>
                     
                     <br><br>
                    <div class="row">
                        <div class="col-md-12 text-center"><form>
                          <input class="btn btn-success" type="button" value="Back" onclick="history.go(-1)">
                        </form></div>
                         
                    </div>
                    
                </div> 
            </section><!-- end col-md-9 --> 


        </div>
       
<?php
        $this->load->view('home_footer');
        ?>
    </div>
</div>