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
                        <h1 class="header_text">Benefits of Self-Assessment & Development Need Analysis Program(SANA) for School Students</h1>
                </div> 
                <br> 
                <div class="text-justify"> 
                    <img style="width: 848px;" class="img-responsive" src="<?php echo(base_url() . 'assets/img/' . 'Program.jpg'); ?>" ><br>
                    <small class="block">Picture Courtesy: Pixabay.com</small>

                    <br>
                    

                    <h6 class="sub-sub-title">Convenience</h6>
                    <p>Self-Assessment and Development Need Analysis Program (SANA) is a Self-Paced Online Program. You can complete assignments at your own pace, as long as you complete all course work before the course ends.</p>

                    <h6 class="sub-sub-title">Enhanced Confidence levels</h6>
                    <p>Self-Assessment and Development Need Analysis Program (SANA) will help you understand yourself in terms of your Qualities, Areas of Improvement, Goals, Intelligence Mix, Hobbies, Needs, Etiquettes, External environment and Attitude. This will enable you to make informed decisions and pursue your goals with enhanced confidence.</p>
                    <h6 class="sub-sub-title">Informed Decision Making</h6>
                    <p>In-depth self-assessment equips you with a clear picture about your needs, future aspirations, resources required and actions that should be taken. In light of all this well researched information, you are able to make informed decisions.</p>
                    <h6 class="sub-sub-title">Instant Return on Learning</h6>
                    <p>Self-Assessment and Development Need Analysis Program (SANA) helps you to use your learning from the program immediately. As soon as you finish a section, you know the impact of your learnings on your future aspirations and you can make a course correction immediately.</p>
                    <h6 class="sub-sub-title">Easy Information Access</h6>
                    <p>Self-Assessment and Development Need Analysis Program (SANA)enables you to document your learnings and your action plan by making you fill action sheets at the end of every section. You can retrieve this information from the Analytics section of the website.</p>
                    <h6 class="sub-sub-title">Comprehensiveness of content</h6>
                    <p>Self-Assessment and Development Need Analysis Program (SANA) offers very comprehensive content. For Example: our values section gives you a choice of 135 values, with explanations, to choose your values from.</p>

                    <h6 class="sub-sub-title">Privacy</h6>
                    <p>Reflective learning in a classroom training may make you uncomfortable as you won’t like to share your values, skills, strengths or areas of improvement with everybody. You do not have to worry about all these things when you are taking the course online</p> 

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