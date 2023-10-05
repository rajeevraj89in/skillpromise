<?php $this->load->view('home_header_view'); ?>

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
                                <form action="<?php echo base_url(); ?>/subscribNewsLetter/user" id="news_letter" method="POST">
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
                    <h1 class="header_text">How good are your Credibility Building Skills?</h1>
                </div>


                <div class="text-justify">
                    <p class="para18">
                        Building credibility is creating an environment of harmony, consonance, agreement, or accord through carefully planned and executed activities that encourage this result.
                    </p>
                    <img style="width: 848px;" class="img-responsive" src="<?php echo(base_url() . 'assets/img/' . 'hand-sec.jpg'); ?>" >

                    <br>
                    <blockquote>
                        The ability to establish, grow, extend and restore trust is the key professional and personal competency of our time

                        <small class="text-right"><em>Stephan Covey</em></small>
                    </blockquote>
                    <br>


                </div>
            </section><!-- end col-md-9 -->





            <section class="col-md-9">

                <div class="row">
                    <div class="col-md-12">


                        <form id="mainForm" enctype="multipart/form-data" class="form-horizontal" role="form" action="<?php echo base_url() . 'set_data_home'; ?>" method="POST">

                            <div> <?php echo $instruction; ?></div>
                            <input type="hidden" value="<?php echo $sheet_id; ?>" name="sheet_id">
                            <input type="hidden" value="<?php echo $sheet_section_id; ?>" name="sheet_section_id">


                            <div class="panel panel-default">
                                <div class="table-responsive" style="color: black">
                                    <table class="table table-bordered" style="color: black" id="">
                                        <thead>

                                            <tr style="background-color:#ddebf6; color:black;">
                                                <?php
                                                echo'<th class="text-center unbold" style="width:7%;">S No.</th>';
                                                foreach ($headerName as $header) {
                                                    echo'<th class="text-center unbold">' . $header['header_name'] . '</th>';
                                                }
                                                ?>
                                            </tr>
                                        </thead>
                                        </tbody>
                                        <?php
                                        foreach ($question_data as $k => $val) {
                                            echo'<tr class="text-center"><td>' . ($k + 1) . '</td><td class="text-left" id=' . $val['id'] . '>' . $val['name'] . '</td>';
                                            echo'<input type="hidden" name="items[' . $k . '][question_id]" value=' . $val['id'] . ' >';
                                            foreach ($headerName as $k2 => $val_header) {
                                                if ($val_header['header_type'] == 'option_header') {
                                                    echo '<td id=' . $val_header['id'] . ' class="text-center"><input type="radio"  name="items[' . $k . '][option_id]" value=' . $val_header['id'] . ' ></td>';
                                                }
                                            }
                                            echo '</tr>';
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-3">
                                    <button type="submit" value="0" name="draft" class="btn btn-success">Submit</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </section>




            <?php $this->load->view('home_footer'); ?>
        </div>
    </div>
</div>