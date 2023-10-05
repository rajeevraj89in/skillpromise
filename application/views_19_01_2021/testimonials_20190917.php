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
                            <a href="#!">Aptitude Development Program</a>
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
                    <?php
                    $records = $this->main_model->get_records_from_id("testimonials", $id, 'id');
                    $limited_word = ($records['detailed_desc']);
                    echo '<h2> ' . $records['name'] . '</h2><hr>
                            <p>' . $limited_word . '</p>';
                    ?>

                </div>
            </section><!-- end col-md-9 -->


        </div>

        <?php
        $this->load->view('home_footer');
        ?>
    </div>
</div>