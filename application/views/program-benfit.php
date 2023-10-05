<?php $this->load->view('home_header_view'); ?>


<!-- Content Row -->
<div class="container main_container">
    <div class="main_body">
        <div class="row">


            <aside class="col-md-3">
                <!--program menu start -->
                <div class="panel panel-primary border">
                    <h4 class="quickpanelhead quiz_head">Program</h4>
                    <ul id="my_left_accordion" class="my_left_accordion nav nav-pills nav-stacked nav-sidebar">
                        <li class="">
                            <a href="<?php echo(base_url() . "sana-for-school"); ?>">Aptitude Development Program</a>
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
                    <h1 class="header_text">Program Benefits</h1>
                </div>


                <div class="text-justify">
                    <img style="width: 848px;" class="img-responsive" src="<?php echo(base_url() . 'assets/img/' . 'Program.jpg'); ?>" ><br>
                    <small class="block">Picture Courtesy: Pixabay.com</small>

                    <h3 class="header_text">Benefits of Aptitude Development Program</h3><br>
                    <h6 class="sub-sub-title">Comprehensive Content</h6>
                    <p>Aptitude Development Program offers very comprehensive content in terms of both – Reach and Depth. This program comprehensively covers sections like Quantitative Aptitude, Logical Reasoning, Non-Verbal Reasoning, Verbal Reasoning, Data Interpretation and Verbal Ability</p>
                    <h6 class="sub-sub-title">Well Structured Content</h6>
                    <p>Aptitude Development Program offers very well structured content for better understanding and quick learning. Topics under various sections like Quantitative Aptitude, Logical Reasoning, Non-Verbal Reasoning, Verbal Reasoning and Data Interpretation have the following components</p>
                    <ul class="custom">
                        <li>Important Formula</li>
                        <li>Video Tutorials (Third Party)</li>
                        <li>Conceptual Questions</li>
                        <li>Practice Questions – Low, Medium and High Difficulty</li>
                        <li>MBA Entrance Exam Questions – CAT, MAT, XAT and SNAP</li>
                        <li>GATE Questions</li>
                        <li>Bank PO Questions</li>
                        <li>Campus Recruitment Test (CRT) Questions</li>
                    </ul>
                    <h6 class="sub-sub-title">Test Centre</h6>
                    <p>Aptitude Development Program efficiently amalgamates Learning with Testing through a Test Centre. The Test Centre has two types of Assessments – Topic Wise and Comprehensive. Topic Wise assessments, as the name suggests, have questions of various difficulty levels from a particular topic. Comprehensive Assessments have questions of various difficulty levels from more than one topic. The solutions of both types of assessments are visible in the Analytics Section of the website</p>
                    <h6 class="sub-sub-title">Analytics Section</h6>
                    <p>Aptitude Development Program helps you track your performance in Assessments through the Analytics Section. Analytics Section enables you to see your Score, Test Solutions and Areas of Improvement (Only in Comprehensive Assessments)</p>
                    <h6 class="sub-sub-title">Enhanced Confidence levels</h6>
                    <p>Aptitude Development Program will help you enhance your confidence levels as this will improve your Analytical and Problem Solving abilities</p>
                    <h6 class="sub-sub-title">Informed Decision Making</h6>
                    <p>Aptitude Development Program will enable you to Analyse Data, Situation and Information more accurately which will further lead to Informed Decision Making</p>
                    <h6 class="sub-sub-title">Instant Return on Learning</h6>
                    <p>Aptitude Development Program helps you to use your learning immediately. As soon as you finish a section, you can test yourself using the Test Centre. Your scores will  show depth of your learnings and you can make improvisations immediately</p>
                    <br>
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