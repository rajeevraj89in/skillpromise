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
                        <h1 class="header_text">Self-Assessment and Development Need Analysis (SANA) for Professionals</h1>
                </div> 


                <div class="text-justify">
                    <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/' . 'SANA-for-p.jpg'); ?>" ><br>
                    <small class="block">Picture Courtesy: Pixabay.com</small><br>

                    <p>Self-Assessment is the is the process of gathering information about yourself in order to make informed and intelligent Life decisions.</p>  
                    <p>Self-Assessment can help to find the right direction for your life, if you are a young professional and if you are a tenured professional then it can help you make the required course corrections for enhanced productivity. It is very important for Professionals to ask themselves the following questions:</p> 
                    <ul class="custom">
                       <li>Am I pursuing the right career?</li>
                        <li>Am I open to learning?</li>
                        <li>Am I Coachable?</li>
                        <li>Do I believe in Adding Value and Providing service?</li>
                        <li>Are my skills in line with what is expected out of me at work?</li>
                        <li>Do I live the values of my organization?</li>
                        <li>Do I display highest level of Integrity and Respect at work?</li>
                        <li>What is helping or hampering achievement of my KRA’s, KPI’s, Targets etc.?</li>
                        <li>Are my Goals in line with my Values, Skills, Strengths, and Attitude</li>
                        <li>Do I Operate with any Limiting beliefs about Learning, Relationships and about my Capabilities?</li>
                        <li>Do I take Ownership?</li>
                        <li>Do I know what excites me the most and keeps me sleepless?</li>
                        <li>Are my efforts Informed and Channelized? How am I performing in my Endeavours?</li>
                        <li>Do I need to Reengineer myself? What do I need to do to reengineer myself?</li>
                        <li>Am I aware of the professional enhancements, that I need equip myself with, to achieve my career objectives?</li>
                        <li>Do I have a well-defined Short term, Mid-term and Long term career plan?</li>
 

                    </ul><br>
                    <p>All the above mentioned questions ultimately bring out the need of a Blue print for  life. A blue print for life can also be defined as a Life plan. Self-Assessment forms the base for Life Planning. Life Planning is dynamic activity, in which, you requires constant Aiming and Shooting. This makes Self-Assessment a periodic activity. Self-Assessment frequency completely depends on the agility levels that you define, to be current on knowledge on self.</p> 

                    <p>Self-Assessment and Development Need Analysis Program (SANA)  will help Professionals learn about their Qualities, find outtheir areas of improvement, and External environment around them</p> 
                     <p>Self-Assessment and Development Need Analysis Program (SANA) will help Professionals explore information about Self, create action plans for their Areas of Improvement, Document all this informationon Action Sheets and retrieve it later in a consolidated report called Self-Assessment Summary Sheet. Please click on the icons below to know more about Self-Assessment and Development Need Analysis Program (SANA).</p>

                     <div class="row">
                         <div class="col-md-4 text-center"><a href="learning-objectives-professional" class="btn btn-warning">Learning Objectives</a></div>
                         <div class="col-md-4 text-center"><a href="program-benefits-professional" class="btn btn-warning">Program Benefits</a></div>
                         <div class="col-md-4 text-center"><a href="course-content-professional" class="btn btn-warning">Course Content</a></div>  
                     </div>
                     <hr>
                     <div class="row">
                         <div class="col-md-4 text-center"><a href="#!" class="btn btn-success">USD 15</a></div>
                         <div class="col-md-4 text-center"><a href="#!" class="btn btn-success">INR 999</a></div>
                         <div class="col-md-4 text-center"><a href="my-cart" class="btn btn-success">Add to Cart</a></div>  
                     </div>

                </div> 
            </section><!-- end col-md-9 --> 


        </div>
       
<?php
        $this->load->view('home_footer');
        ?>
    </div>
</div>