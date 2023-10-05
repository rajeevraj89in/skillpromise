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
                        <h3 id="free_news">Free Newsletter </h3><br>
                        <p class="textstyle">Learn new skills every month and get our Personal Selling Toolkit free as the Subscription bonus.</p>
                        <div class="input-group">
                            <form action="http://122.15.239.9:5080/skillpromise/subscribNewsLetter/user" id="news_letter" method="POST">
                                <input id="first_name" name="first_name" class="form-control inputbox" placeholder="First Name" type="text" data-validation-required-message="Please enter your first name." required="" aria-invalid="false">
                                <input id="last_name" name="last_name" class="form-control inputbox" placeholder="Last Name" type="text" data-validation-required-message="Please enter your last name." required="" aria-invalid="false">
                                <input id="email" name="email" class="form-control inputbox" placeholder="Email" type="email" data-validation-required-message="Please enter your email address." required="" aria-invalid="false">

                                <button type="submit" class="bttn btn btn-primary inputbox"><b>Subscribe</b></button>
                            </form>
                        </div>
                        <br>
                        <!-- /.input-group -->
                    </div>
                </div>

            </div>
            <!--news letter inner end-->

            </aside>


            
            <section class="col-md-9" style="min-height: 395px;">

                <div class="panel">
                        <h1 class="header_text">Our Core Values</h1>
                </div> 


                <div class="text-justify">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-3"><img class="img-responsive text-left" src="<?php echo(base_url() . 'assets/img/' . 'integ.jpg'); ?>" ></div>
                            <div class="col-md-9">
                                <h5 class="sub-sub-title">Integrity</h5>
                                <p>We demonstrate sound <strong>Moral and Ethical principles</strong> at work.</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"><img class="img-responsive text-left" src="<?php echo(base_url() . 'assets/img/' . 'curi.jpg'); ?>" ></div>
                            <div class="col-md-9">
                                <h5 class="sub-sub-title">Curiosity</h5>
                                <p>We believe in exploring <strong>New Ideas</strong> and considering <strong>Fresh Perspectives</strong> to make our business thrive.</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"><img class="img-responsive text-left" src="<?php echo(base_url() . 'assets/img/' . 'resp.jpg'); ?>" ></div>
                            <div class="col-md-9">
                                <h5 class="sub-sub-title">Respect</h5>
                                <p>We foster a culture of <strong>Respect for the Individual</strong> in our organization.</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"><img class="img-responsive text-left" src="<?php echo(base_url() . 'assets/img/' . 'rela.jpg'); ?>" ></div>
                            <div class="col-md-9">
                                <h5 class="sub-sub-title">Relationships</h5>
                                <p>We work hard to build <strong>Credible Partnerships</strong> to achieve business goals.</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"><img class="img-responsive text-left" src="<?php echo(base_url() . 'assets/img/' . 'drive.jpg'); ?>" ></div>
                            <div class="col-md-9">
                                <h5 class="sub-sub-title">Drive</h5>
                                <p>We Cultivate <strong>Enthusiasm, Energy, Sense of Urgency and Ambition</strong>, in ourselves and in others.</p>
                            </div>
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