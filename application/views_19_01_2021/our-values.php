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
