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
                            <form action="<?php echo base_url();?>/subscribNewsLetter/user" id="news_letter" method="POST">
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


<section class="col-md-9">
<!--    <h1 class="header_text"><?php
//        $name = $this->main_model->get_name_from_id('sheets', 'name', $sheet_id, 'id');
//        echo "$name";
        ?></h1>-->
    <div class="row">
        <div class="col-md-12">
            
            
            <form id="mainForm" enctype="multipart/form-data" class="form-horizontal" role="form" action="<?php echo base_url() . 'set_data_home'; ?>" method="POST">
<!--                <div><h3><center>
                            <?php // echo $this->main_model->get_name_from_id('template_instruction', 'section_name', $sheet_section_id, 'id'); ?>
                        </center> </h3>
                </div>-->
                <div> <?php echo $instruction; ?></div>
                <input type="hidden" value="<?php echo $sheet_id; ?>" name="sheet_id">
                <input type="hidden" value="<?php echo $sheet_section_id; ?>" name="sheet_section_id">
                

                <div class="panel panel-default">
                    <div class="table-responsive" style="color: black">
                        <table class="table table-bordered" style="color: black" id="">
                            <thead>
                                <tr style="background-color:#ddebf6; color:black;">
                                    <th class="text-center"></th>
                                    <th class="text-center"></th>
                                    <th class="text-center" colspan="<?php echo sizeof($headerName) - 1; ?>">Marks</th>
                                </tr>
                                <tr style="background-color:#ddebf6; color:black;">
<!--                                    <th class="text-center"></th>
                                    <th class="text-center"></th>-->
                                    <?php
//                                    foreach ($headerName as $header) {
//                                        if ($header['header_type'] == 'option_header') {
//                                            echo'<th class="text-center">' . $header['marks'] . '</th>';
//                                        }
//                                     }
                                    ?>
                                </tr>
                                <tr style="background-color:#ddebf6; color:black;">
                                    <?php
                                    echo'<th class="text-center">S No.</th>';
                                    foreach ($headerName as $header) {
                                        echo'<th class="text-center">' . $header['header_name'] . '</th>';
                                    }
                                    ?>
                                </tr>
                            </thead>
                            </tbody>
                            <?php
                            foreach ($question_data as $k => $val) {
                                echo'<tr><th>' . ($k + 1) . '</th><th class="text-left" id=' . $val['id'] . '>' . $val['name'] . '</th>';
                                echo'<input type="hidden" name="items[' . $k . '][question_id]" value=' . $val['id'] . ' >';
                                foreach ($headerName as $k2 => $val_header) {
                                    if ($val_header['header_type'] == 'option_header') {
                                        echo '<th id=' . $val_header['id'] . ' class="text-center"><input type="radio"  name="items[' . $k . '][option_id]" value=' . $val_header['id'] . ' ></th>';
                                    }
                                }
                                echo '</tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div><br

                <p>Strongly Agree (SA)/ Agree (A)/ Neither Agree nor Disagree (NAND)/ Disagree (D)/ Strongly Disagree (SD)</p>
                <div class="form-group">
                    <div class="col-sm-3">
                        <button type="submit" value="0" name="draft" class="btn btn-success">Submit</button>
                       
                    </div>
                    <div class="col-sm-3">
                         <!--<button type="submit" value="1" name="draft" class="btn btn-primary">Save as Draft</button>-->
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<?php  $this->load->view('home_footer'); ?>
        </div>
    </div>
</div>