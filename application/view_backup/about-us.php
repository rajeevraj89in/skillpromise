<?php $this->load->view('home_header_view'); ?> 


<!-- Content Row -->
<div class="container main_container">
    <div class="main_body">
        <div class="row">


            <aside class="col-md-3">
            <!--program menu start -->
            <div class="panel panel-primary border">
                <h4 class="quickpanelhead quiz_head">Programs</h4>
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

                                        <button type="submit" class="bttn btn btn-primary inputbox">Subscribe</button>
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
                        <h1 class="header_text">About Us</h1>
                </div> 


                <div class="text-justify">
                    <p class="imp-text">
                        Incorporated in August 2017, Skillpromise.com, a part of Sana Skillpromise Education Private Limited, is an eLearning platform that helps School students, Higher Education Students and Professionals, engage in Self-Assessment and Career Skill programs. We are based out of Delhi, India.  
                    </p><br>
                    <img style="width: 848px;" class="img-responsive" src="<?php echo(base_url() . 'assets/img/' . 'about.jpg'); ?>" ><br>
                    <small class="block">Picture Courtesy: Pixabay.com</small>

                    <br>  
                    <p>Skillpromise.com has a mission to create programs with high-quality, well researched and easy-to-imbibe content. Skillpromise takes an agile learning approach in building a platform that meets the learning goals of the users.</p>
                    <p>In addition to helping individual learners, we offer flexible, cost-effective group memberships for Schools, Colleges, Universities and Corporate.</p>

                    <p>Skillpromise.com has team members from both, Corporate and Academic world, all of whom are focused on developing Self-Assessment and Skill programs, with world class, incisive and comprehensive content to help you reach optimal levels of your efficiency.</p>
                    <p>Skillpromise.com has created “Learning Accountability Loops” that tightly integrate Self-monitoring, Self-Evaluation, Self Judgment, and Self-Improvisation. This enables you to do the following:</p>
                    <ul class="custom">
                        <li>Study the Program content</li>
                        <li>Identify your Strength and Improvement areas</li>
                        <li>Prepare an Improvement Roadmap with well-defined timelines</li>
                        <li>Track your performance</li>

                    </ul><br>
                    <p>As a registered user of Skillpromise.com, you get access to the Analytics section where you can download summary of your performance in the programs, you buy.</p>
                    <p>Blog at Skillpromise.com helps you learn and discuss the essential skills you need for an excellent career, including Communication Skills, Personal productivity Skills, Employability Skills, Management Skills, Domain Skills, Selling Skills, Customer Service Skills etc.</p>
                    
                </div> 
            </section><!-- end col-md-9 --> 


        </div>
       
<?php
        $this->load->view('home_footer');
        ?>
    </div>
</div>