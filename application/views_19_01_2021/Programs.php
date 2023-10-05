<?php $this->load->view('home_header_view'); ?>


<!-- Content Row -->
<div class="program container">

    <section class="row">
        <div class="col-md-12">
                <div class="dooble-border">
                    <h5 class="our-prog-title">Skillpromise Programs</h5>
                        <div class="row">

                            <div class="col-xs-12 col-sm-4 col-md-3">
                                <div class="prog-img">
                                    <a href = "#!">
                                        <img class = "img-responsive" src = "<?php echo(base_url() . 'assets/img/' . 'erp-er.jpg'); ?>" alt = ""/>
                                    </a>
                                </div>
                                <div class="prog-content margin-bottom">
                                    <a class="title" href = "#!">
                                        Employment Readiness Program
                                    </a>
                                    <p class="text-center nopadding">Engineering Graduates</p>
                                    <p class="price">Program Cost : Rs 2500</p>

                                    <div class="prog-btn">
                                        <a href="#!" class="btn btn-success" title="">Buy Now</a><a class="btn btn-default" data-toggle="modal" data-target="#program_modal2" title="">Know More</a>
                                    </div>
                                </div>

                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-3">
                                <div class="prog-img">
                                    <a href = "#!">
                                        <img class = "img-responsive" src = "<?php echo(base_url() . 'assets/img/' . 'erp-mg.jpg'); ?>" alt = ""/>
                                    </a>
                                </div>
                                <div class="prog-content margin-bottom">
                                    <a class="title" href = "#!">
                                        Employment Readiness Program
                                    </a>
                                    <p class="text-center nopadding">Management Graduates</p>
                                    <p class="price">Program Cost : Rs 2500</p>

                                    <div class="prog-btn">
                                        <a href="#!" class="btn btn-success" title="">Buy Now</a><a class="btn btn-default" data-toggle="modal" data-target="#program_modal3" title="">Know More</a>
                                    </div>
                                </div>

                            </div>




                            <!--div class="col-xs-12 col-sm-4 col-md-3">
                                <div class="prog-img">
                                    <a href = "#! <?php //echo(base_url() . "sana-for-school"); ?>">
                                        <img class = "img-responsive" src = "<?php //echo(base_url() . 'assets/img/' . 'aptitude_devlopment_home.jpg'); ?>" alt = ""/>
                                    </a>
                                </div>
                                <div class="prog-content margin-bottom">
                                    <a class="title" href = "#!">
                                        Aptitude Development Program
                                    </a>
                                    <p class="text-center nopadding"> </p>
                                    <p class="price">Program Cost : Rs 3000</p>

                                    <div class="prog-btn">
                                        <a href="#!" class="btn btn-success" title="">Buy Now</a><a href="#!" class="btn btn-default" title="">Know More</a>
                                    </div>
                                </div>

                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-3">
                                <div class="prog-img">
                                    <a href = "#! <?php //echo(base_url() . "sana-for-school"); ?>">
                                        <img class = "img-responsive" src = "<?php //echo(base_url() . 'assets/img/' . 'mba-entrance.jpg'); ?>" alt = ""/>
                                    </a>
                                </div>
                                <div class="prog-content margin-bottom">
                                    <a class="title" href = "#!">
                                        MBA Entrance Examination
                                    </a>
                                    <p class="text-center nopadding">Basic Readiness Program</p>
                                    <p class="price">Program Cost : Rs 3000</p>

                                    <div class="prog-btn">
                                        <a href="#!" class="btn btn-success" title="">Buy Now</a><a class="btn btn-default" data-toggle="modal" data-target="#program_modal" title="">Know More</a>
                                    </div>
                                </div>

                            </div-->

                        </div>

                </div>
            </div>

            <!--Modal Section -->
                <!--Modal programs Start-->
                <div class="modal fade" id="program_modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">

                                <div id="program-owl2" class="owl-carousel program-owl">
                                    <div class="item">
                                        <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/slide/emp-er/' . 'slide1.jpg'); ?>" >
                                    </div>
                                    <div class="item">
                                        <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/slide/emp-er/' . 'slide2.jpg'); ?>" >
                                    </div>
                                    <div class="item">
                                        <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/slide/emp-er/' . 'slide3.jpg'); ?>" >
                                    </div>
                                    <div class="item">
                                        <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/slide/emp-er/' . 'slide4.jpg'); ?>" >
                                    </div>
                                    <div class="item">
                                        <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/slide/emp-er/' . 'slide5.jpg'); ?>" >
                                    </div>
                                    <div class="item">
                                        <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/slide/emp-er/' . 'slide6.jpg'); ?>" >
                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal programs  end-->
                <!--Modal programs Start-->
                <div class="modal fade" id="program_modal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">

                                <div id="program-owl2" class="owl-carousel program-owl">
                                    <div class="item">
                                        <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/slide/emp-mg/' . 'slide1.jpg'); ?>" >
                                    </div>
                                    <div class="item">
                                        <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/slide/emp-mg/' . 'slide2.jpg'); ?>" >
                                    </div>
                                    <div class="item">
                                        <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/slide/emp-mg/' . 'slide3.jpg'); ?>" >
                                    </div>
                                    <div class="item">
                                        <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/slide/emp-mg/' . 'slide4.jpg'); ?>" >
                                    </div>
                                    <div class="item">
                                        <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/slide/emp-mg/' . 'slide5.jpg'); ?>" >
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal programs  end-->

            <!--Modal programs Start-->
                <div class="modal fade" id="program_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">

                                <div id="program-owl" class="owl-carousel program-owl">
                                    <div class="item">
                                        <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/slide/' . 'slide1.jpg'); ?>" >
                                    </div>
                                    <div class="item">
                                        <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/slide/' . 'slide2.jpg'); ?>" >
                                    </div>
                                    <div class="item">
                                        <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/slide/' . 'slide3.jpg'); ?>" >
                                    </div>
                                    <div class="item">
                                        <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/slide/' . 'slide4.jpg'); ?>" >
                                    </div>
                                    <div class="item">
                                        <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/slide/' . 'slide5.jpg'); ?>" >
                                    </div>
                                    <div class="item">
                                        <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/slide/' . 'slide6.jpg'); ?>" >
                                    </div>
                                    <div class="item">
                                        <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/slide/' . 'slide7.jpg'); ?>" >
                                    </div>
                                    <!--div class="item">
                                        <div class="text-center"><img class="img-responsive" src="<?php //echo(base_url() . 'assets/img/slide/' . 'slide8-1.jpg'); ?>" ></div>
                                        <div class="d-flex">
                                            <div style="width: 27%;">
                                                <ul class="list-group">
                                                  <li class="list-group-item"><a href="#!" title="">Employment Readiness Program for Engineering Graduates</a></li>
                                                  <li class="list-group-item"><a href="#!" title="">Employment Readiness Program for Management Graduates</a></li>
                                                  <li class="list-group-item"><a href="#!" title="">MBA Entrance Examination Readiness Program</a></li>
                                                </ul>
                                            </div>
                                            <div style="width: 42%; margin-left: 4rem;">
                                                    <div class="prog-img">
                                                        <a href="http://skillpromise.com/sana-for-school">
                                                            <img class="img-responsive" src="http://skillpromise.com/assets/img/aptitude_devlopment_home.jpg" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="prog-content margin-bottom">
                                                        <a class="title" href="http://skillpromise.com/sana-for-school">
                                                            Aptitude Development Program
                                                        </a>

                                                        <div class="prog-btn">
                                                            <a href="#!" class="btn btn-success" title="">Buy Now</a><span class="price">Rs 3000</span>
                                                        </div>
                                                    </div>

                                            </div>
                                        </div>
                                    </div-->

                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal programs  end-->
            <!--Modal Section End-->

    </section>



</div>

<div class="container">

        <?php
        $this->load->view('home_footer');
        ?>
    </div>

