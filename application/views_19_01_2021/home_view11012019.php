<?php $this->load->view('home_header_view'); ?>

<!-- Content Row -->
<div class="container main_container">
    <div class="main_body">
        <div class="row imgcarousel">
            <div class="col-md-8 sliderimg">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" >
                        <div class="item active">
                            <div class="header-text hidden-xs">
                                <div class="slider-content">
                                    <h4 class="title">Develop a Sense of Urgency</h4>
                                    <p>Act with a Sense of Urgency to make the best use of opportunities available to you in this rapidly changing world</p>
                                    <div class="slider_btn text-left" >
                                        <a href="<?php echo(base_url() . "skill-talk-slider"); ?>">Know More</a>
                                    </div>
                                </div>
                            </div>
                            <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/' . 'banner1.jpg'); ?>" width="100%" alt="">
                        </div>
                        <div class="item">
                            <div class="header-text hidden-xs" >
                                <div class="slider-content">
                                    <h4 class="title">How good are your Credibility Building Skills?</h4>
                                    <p>Take the quick self-test to explore your understanding of various techniques of Credibility Building. Subscribe to the Monthly Newsletter and get our Art of Building Credibility e-Book FREE</p>
                                    <div class="slider_btn text-left" >
                                        <a href="<?php echo(base_url() . "home_sheets/sheets/61"); ?>">Get started</a>
                                    </div>
                                </div>
                            </div>
                            <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/' . 'banner2.jpg'); ?>" width="100%" alt="">
                        </div>
                        <div class="item">
                            <div class="header-text hidden-xs">
                                <div class="slider-content">
                                    <h4 class="title">Essentials of Employability</h4>
                                    <p>Learn about Employability scenario in India. Understand what Employability is and how you can work on enhancing your Employability.</p>
                                    <div class="slider_btn text-left" >
                                        <a href="<?php echo(base_url() . "employability-zone-slider"); ?>">Know More</a>
                                    </div>
                                </div>
                            </div>
                            <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/' . 'banner3.jpg'); ?>" width="100%" alt="">
                        </div>
                    </div>

                    <!--a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a-->


                </div>
            </div>

            <!-- Newsletter Column -->
            <div class="col-md-4" id="newsletter">

                <div class="dooble-border">

                    <div class="well fre_news">
                        <h3 id="free_news">Subscribe to our FREE Email Newsletter </h3>


                        <div class="row">
                            <div class="col-md-9" style=" padding: 0 6px 0 15px;">
                                <div class="input-group">
                                    <form action="<?php echo base_url() . 'subscribNewsLetter/user'; ?>" id="news_letter" method="POST">
                                        <input id="first_name" name="first_name" class="form-control inputbox" placeholder="First Name" type="text" data-validation-required-message="Please enter your first name." required="" aria-invalid="false"/>
                                        <input id="email" name="email" class="form-control inputbox" placeholder="Email" type="email" data-validation-required-message="Please enter your email address." required="" aria-invalid="false"/>

                                        <button type="submit" class="bttn btn btn-primary inputbox" data-toggle="modal" data-target="#newLetter_modal">Subscribe</button>
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

                <!-- Modal -->
                <div class="modal fade" id="newLetter_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <!--h4 class="modal-title" id="myModalLabel">Modal title</h4-->
                      </div>
                      <div class="modal-body">
                        <div class="row">
                            <div class="col-md-8">
                                <h4>Thank you for subscribing to our Email Newsletter. Please follow the following steps to complete your signup process:</h4>
                                <ul class="custom">
                                    <li>Check for our Email in your Inbox and in case it is not there, check your Spam folder.</li>
                                    <li>Click the link “Confirm” in the Email that you will receive from us.</li>
                                    <li>Download your Art of Building e-Book.</li>
                                    
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/' . 'art-of-building.png'); ?>" ><br>

                            </div>
                        </div>
                      </div>
                      <!--div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                      </div-->
                    </div>
                  </div>
                </div>
                <!-- Modal  end-->


            </div>

        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-8">
                <div class="dooble-border">
                    <h5 class="our-prog-title">Skillpromise Programs</h5>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="prog-img">

                                <a href="<?php echo(base_url() . "sana-for-school"); ?>">
                                    <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/' . 'SANA-for-s.jpg'); ?>" alt=""/>
                                </a>

                            </div>
                            <div class="prog-content margin-bottom">
                                <a href="<?php echo(base_url() . "sana-for-school"); ?>">
                                    <span class="">Self Assessment and Development Need Analysis (SANA) for School Students</span>
                                </a>

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="prog-img">

                                <a href="<?php echo(base_url() . "sana-for-higher"); ?>">
                                    <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/' . 'SANA-for-h.jpg'); ?>" alt=""/>
                                </a>

                            </div>
                            <div class="prog-content margin-bottom">
                                <a href="<?php echo(base_url() . "sana-for-higher"); ?>">
                                    <span class="">Self Assessment and Development Need Analysis (SANA) for Higher Education Students</span>
                                </a>

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="prog-img">

                                <a href="<?php echo(base_url() . "sana-for-professionals"); ?>">
                                    <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/' . 'SANA-for-p.jpg'); ?>" alt=""/>
                                </a>

                            </div>
                            <div class="prog-content margin-bottom">
                                <a href="<?php echo(base_url() . "sana-for-professionals"); ?>">
                                    <span class="">Self-Assessment and Development Need Analysis (SANA) for Professionals</span>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-md-4 nopadding-left">

                <h5 class="sidebar-title">Testimonials</h5>

                <div class="t-tab">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#student" aria-controls="student" role="tab" data-toggle="tab">Student</a></li>
                        <li role="presentation"><a href="#parent" aria-controls="parent" role="tab" data-toggle="tab">Parent</a></li>
                        <li role="presentation"><a href="#academia" aria-controls="academia" role="tab" data-toggle="tab">Academia</a></li>
                        <li role="presentation"><a href="#corporate" aria-controls="corporate" role="tab" data-toggle="tab">Corporate</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="student">
                            <!--testimonial detail-->
                            <div id="" class="testimoni-owl owl-carousel">
                                <div class="item">
                                    <div class="img-cover">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <img class="pull-left" src="<?php echo(base_url() . 'assets/img/' . 'test1.jpg'); ?>" />
                                            </div>
                                            <div class="col-md-6">
                                                <h4>Vikas Mehra</h4>
                                                <span class="text-left"><small>Founder & CEO,<br>Skillpromise.com</small></span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="content-wrap">
                                        <span class="testimonial-icon"></span>
                                        <p>
                                            Self-Assessment Program is a great tool to discover yourself, make meaningful goals and chase self-improvement scientifically. I think this program is a must for every student and professional as it provides a meaningful direction to you.
                                        </p>

                                    </div>
                                </div>
                                <div class="item">
                                    <div class="img-cover">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <img class="pull-left" src="<?php echo(base_url() . 'assets/img/' . 'test2.jpg'); ?>" />
                                            </div>
                                            <div class="col-md-6">
                                                <h4>Vikas Mehra</h4>
                                                <span class="text-left"><small>Founder & CEO,<br>Skillpromise.com</small></span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="content-wrap">
                                        <span class="testimonial-icon"></span>
                                        <p>
                                            Self-Assessment Program is a great tool to discover yourself, make meaningful goals and chase self-improvement scientifically. I think this program is a must for every student and professional as it provides a meaningful direction to you.
                                        </p>

                                    </div>
                                </div>
                            </div>
                            <!--testimonial detail end-->

                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="parent">
                            <!--testimonial detail-->
                            <div id="" class="testimoni-owl owl-carousel">
                                <div class="item">
                                    <div class="img-cover">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <img class="pull-left" src="<?php echo(base_url() . 'assets/img/' . 'test1.jpg'); ?>" />
                                            </div>
                                            <div class="col-md-6">
                                                <h4>Vikas Mehra</h4>
                                                <span class="text-left"><small>Founder & CEO,<br>Skillpromise.com</small></span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="content-wrap">
                                        <span class="testimonial-icon"></span>
                                        <p>
                                            Self-Assessment Program is a great tool to discover yourself, make meaningful goals and chase self-improvement scientifically. I think this program is a must for every student and professional as it provides a meaningful direction to you.
                                        </p>

                                    </div>
                                </div>
                            </div>
                            <!--testimonial detail end-->
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="academia">
                            <!--testimonial detail-->
                            <div id="" class="testimoni-owl owl-carousel">
                                <div class="item">
                                    <div class="img-cover">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <img class="pull-left" src="<?php echo(base_url() . 'assets/img/' . 'test1.jpg'); ?>" />
                                            </div>
                                            <div class="col-md-6">
                                                <h4>Vikas Mehra</h4>
                                                <span class="text-left"><small>Founder & CEO,<br>Skillpromise.com</small></span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="content-wrap">
                                        <span class="testimonial-icon"></span>
                                        <p>
                                            Self-Assessment Program is a great tool to discover yourself, make meaningful goals and chase self-improvement scientifically. I think this program is a must for every student and professional as it provides a meaningful direction to you.
                                        </p>

                                    </div>
                                </div>
                            </div>
                            <!--testimonial detail end-->
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="corporate">
                            <!--testimonial detail-->
                            <div id="" class="testimoni-owl owl-carousel">
                                <div class="item">
                                    <div class="img-cover">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <img class="pull-left" src="<?php echo(base_url() . 'assets/img/' . 'test1.jpg'); ?>" />
                                            </div>
                                            <div class="col-md-6">
                                                <h4>Vikas Mehra</h4>
                                                <span class="text-left"><small>Founder & CEO,<br>Skillpromise.com</small></span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="content-wrap">
                                        <span class="testimonial-icon"></span>
                                        <p>
                                            Self-Assessment Program is a great tool to discover yourself, make meaningful goals and chase self-improvement scientifically. I think this program is a must for every student and professional as it provides a meaningful direction to you.
                                        </p>

                                    </div>
                                </div>
                            </div>
                            <!--testimonial detail end-->
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <?php
        $this->load->view('home_footer');
        ?>
    </div>
</div>
<style>
    .nopadding {
        padding: 0 !important;
        margin: 0 !important;
    }
</style>