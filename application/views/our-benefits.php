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
                        <h1 class="header_text">Our Benefits</h1>
                </div> 


                <div class="text-justify">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="sub-sub-title">Convenience</h5>
                                <p>Our Programsare Self-Paced, Online Programs. You can complete assignments at your own pace, as long as you complete all course work before the course ends.</p>
                            </div>
                            <div class="col-md-6"><img class="img-responsive text-left" src="<?php echo(base_url() . 'assets/img/' . 'Convenience.jpg'); ?>" ><br><small class="block">Picture Courtesy: Pixabay.com</small><br></div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-6"><img class="img-responsive text-left" src="<?php echo(base_url() . 'assets/img/' . 'Confidence.jpg'); ?>" ><br><small class="block">Picture Courtesy: Pixabay.com</small><br></div>
                            <div class="col-md-6">
                                <h5 class="sub-sub-title">Enhanced Confidence levels</h5>
                                <p>Our Programs will help you understand yourself in terms of your Values, Skills, Areas of Improvement, Goals, Intelligence Mix, Hobbies, Needs, Etiquettes, Attitude and External environment. This will enable you to make informed decisions and pursue your goals with enhanced confidence.</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="sub-sub-title">Informed Decision Making</h5>
                                <p>Our Programs will equips you with  a clear picture about your needs, future aspirations, resources required and actions that should be taken. In light of all this well researched information, you are able to make informed decisions.</p>
                            </div>
                            <div class="col-md-6"><img class="img-responsive text-left" src="<?php echo(base_url() . 'assets/img/' . 'Decision.jpg'); ?>" ><br><small class="block">Picture Courtesy: Pixabay.com</small><br></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6"><img class="img-responsive text-left" src="<?php echo(base_url() . 'assets/img/' . 'Return.jpg'); ?>" ><br><small class="block">Picture Courtesy: Pixabay.com</small><br></div>
                            <div class="col-md-6">
                                <h5 class="sub-sub-title">Instant Return on Learning</h5>
                                <p>Our Programs will enable you to use your learning immediately. As soon as you finish a section, you know the impact of your learnings on your future aspirations and you can make a course correction immediately</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="sub-sub-title">Easy Information Access</h5>
                                <p>Our Programs enable you to document your learnings and your action plan, by making you fill action sheets, at the end of every section. You can retrieve this information from the Analytics section of Skillpromise.com, at your convenience.</p>
                            </div>
                            <div class="col-md-6"><img class="img-responsive text-left" src="<?php echo(base_url() . 'assets/img/' . 'Easy.jpg'); ?>" ><br><small class="block">Picture Courtesy: Pixabay.com</small><br></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6"><img class="img-responsive text-left" src="<?php echo(base_url() . 'assets/img/' . 'Comprehensiveness.jpg'); ?>" ><br><small class="block">Picture Courtesy: Pixabay.com</small><br></div>
                            <div class="col-md-6">
                                <h5 class="sub-sub-title">Comprehensiveness of content</h5>
                                <p>Our Programs offers very comprehensive content. For Example: the Values Assessment section of our Self-Assessment & Development Need Analysis Program, gives you a choice of 135 values, with explanations, to choose your values from</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="sub-sub-title">Privacy</h5>
                                <p>Reflective learning in a classroom training may make you uncomfortable as you won’t like to share your values, skills, strengths or areas of improvement with everybody. You do not have to worry about all these things when you are taking the course online.</p>
                            </div>
                            <div class="col-md-6"><img class="img-responsive text-left" src="<?php echo(base_url() . 'assets/img/' . 'Privacy.jpg'); ?>" ><br><small class="block">Picture Courtesy: Pixabay.com</small><br></div>
                        </div> 



                    </div>    
                    
                </div> 
            </section><!-- end col-md-9 --> 


        </div>
       
<?php
        $this->load->view('home_footer');
        ?>
    </div>
</div>
