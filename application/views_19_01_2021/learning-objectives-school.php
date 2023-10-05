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
                        <h1 class="header_text">Learning Objectives of Self-Assessment and Development Need Analysis Program (SANA) for School Students</h1>
                </div>  


                <div class="text-justify"> 
                    <img style="width: 848px;" class="img-responsive" src="<?php echo(base_url() . 'assets/img/' . 'Learning.jpg'); ?>" ><br>
                    <small class="block">Picture Courtesy: Pixabay.com</small>

                    <br> 

                    <ul class="custom">
                        <li>Learn about your Values, Strengths, Skills, Attitude, Etiquettes, Intelligence Mix, Needs, Hobbies and External Environment.</li>
                        <li>Explore your Qualities/ Assets in terms ofValues, Strengths, Skills, Attitude and Etiquettes.</li>
                        <li>Explore your Needs and make informed goals in line with your needs/ motivations.</li>
                        <li>Learn about Questions that can be asked related to various sections of Self-Assessment and Development Need Analysis Program (SANA).</li>
                        <li>Explore your Areas of Improvement and the way you need to present your Areas of improvement effectively during interviews.</li>
                        <li>Explore your Hobbies, your learnings from your themand how to talk about your hobbiesproductively.</li>
                        <li>Create a Personal SWOT Analysis.</li>
                        <li>Explore and understand your intelligence mix and identify yourintelligence gap as per the goals that you have set for your life.</li>
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