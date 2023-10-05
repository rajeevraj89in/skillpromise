<?php
$this->load->view('header_view');
//$this->load->view('home_left_view');
?>
<style>
    .header_text {
    color: #f67043 !important;
    font-size: 17px;
    text-align: left;
}
</style>
<!--cv content-->
<div class="container">
<!-- <div class="col-md-2">
</div> -->
<div class="col-md-12">
    <div class="row">
        <h1 class="page-header" style="color:#25897a; font-size:22px;">Curriculum Vitae Builder</h1>
        <p>Please Save your information after every section by clicking on “Save as Draft”</p>

        <div class="col-md-12">
            <form id="formID" enctype="multipart/form-data" class="form-horizontal" role="form" action="<?php echo base_url() . 'set_cv_data'; ?>" method="POST">
                <?php
                if ((isset($id)))
                    echo '<input type="hidden" name="id" value="' . $id . '"  >';
                ?>
                <div class="panel">
                    <h5 class="header_text">Basic Information</h5>
                </div>
                <div class="row">
                    <!--set -->
                    <div class="form-group col-md-12">
                        <label for="">Name</label>
                        <input type="text" class="form-control" id="" name="name" placeholder="Full Name" value="<?php echo (isset($name) ? $name : "") ?>">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="">Handheld/ Mobile Number</label>
                        <input type="text" class="form-control" id="" name="mobile" placeholder="Contact Number" value="<?php echo (isset($mobile) ? $mobile : "") ?>">
                    </div>
                    <!--set end-->
                    <!--set -->
                    <div class="form-group col-md-12">
                        <label for="">Email Address</label>
                        <input type="email" class="form-control" name="email" id="" placeholder="Email" value="<?php echo (isset($email) ? $email : "") ?>">
                    </div>
                    <!--set end-->
                    <div class="col-md-12">
                        <button type="button" class="btn btn-success save_draft">Save as Draft</button>
                    </div>

                </div>
                <br><br>


                <div class="panel">
                    <h5 class="header_text">Professional Snapshot/ Career Objective</h5>
                </div>
                <div class="row">
                    <!--set -->
                    <div class="col-md-12">
                        <div class="radio">
                            <label>
                                <input type="radio" onclick="show(this.value)" class="obj" name="candidate_type" id="optionsRadios1" value="Experienced" <?php echo ((isset($candidate_type) && ($candidate_type == 'Experienced')) ? "checked" : "") ?>>
                                Professional Snapshot (for people with work experience)
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" onclick="show(this.value)" class="obj" name="candidate_type" id="optionsRadios2" value="Fresher" <?php echo ((isset($candidate_type) && ($candidate_type == 'Fresher')) ? "checked" : "") ?>>
                                Career Objective (for fresher’s)
                            </label>
                        </div>
                        <br>
                    </div>
                    <!--set end-->


                    <!-- Show hide div-->
                    <div class="col-md-12" id="obj_type" <?php echo ((isset($candidate_type) && ($candidate_type == 'Experienced')) ? '' : 'style="display:none;"') ?>>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="radio">
                                    <label>
                                        <input type="radio" class="obj_type" name="candidate_data_type" id="optionsRadios1" value="paragraph" <?php echo ((isset($candidate_data_type) && ($candidate_data_type == 'paragraph')) ? "checked" : "") ?>>
                                        Paragraph Form
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" class="obj_type" name="candidate_data_type" id="optionsRadios2" value="bullet" <?php echo ((isset($candidate_data_type) && ($candidate_data_type == 'bullet')) ? "checked" : "") ?>>
                                        Bullet Points
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <br><br>
                                    <ul>
                                        <li>Please adhere to the following points while writting your Professional snap shot</li>
                                        <li>Your Professional Title along with number of years of work experience. Talk about relevant certifications, if any</li>
                                        <li>Two or Three Achievements with numbers and details</li>
                                        <li>Customized as per the Job Description</li>
                                        <li>Add measurements to your achievements</li>
                                        <li>Mention the name of the company you are applying for</li>
                                    </ul>
                                <br><br>
                            </div>
                            
                        </div>
                    </div>
                    <!-- Show hide div end-->
                   
                    <div class="col-md-12" id="paragraph" <?php echo ((isset($candidate_data_type) && ($candidate_data_type == 'paragraph')) ? '' : 'style="display:none;"') ?>>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <textarea  class="form-control" name="paragraph_data"><?php echo ((isset($paragraph_data)) ? $paragraph_data : ""); ?></textarea>
                            </div>


                        </div>
                    </div>
                    <div class="col-md-12" id="bullet" <?php echo ((isset($candidate_data_type) && ($candidate_data_type == 'bullet')) ? '' : 'style="display:none;"') ?>>
                        <div class="row">

                            <?php
                            $c = 1;
                            if (!empty($obj_data)) {
                                foreach ($obj_data as $v) {
                                    echo '<div class="form-group col-md-12">';
                                    echo '<input type="text" name="obj_points[]" class="form-control" id="" placeholder="" value="' . $v['data'] . '">';
                                    echo '</div>';
                                    $c = 0;
                                }
                            }

                            if ($c == 1) {
                                echo '<div class="form-group col-md-12">';
                                echo '<input type="text" name="obj_points[]" class="form-control" id="" placeholder="">';
                                echo '</div>';
                            }
                            ?>




                            <div class="form-group col-md-12" id="obj_points" style="display:none">
                                <input type="text" name="obj_points[]" class="form-control" id="" placeholder="">


                            </div>
                            <div class=" col-md-12">
                                <span class="help-block"><a href="#!" class="addMore" data-name="obj_points[]" data-src="obj_points">Add More...</a></span>
                            </div>



                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <br>
                        <button type="button" class="btn btn-success save_draft">Save as Draft</button>
                    </div>

                </div>
                <br><br>



                <div class="row">
                    <!--set -->
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="exp_int" name="work_exp" id="optionsRadios1" value="1" <?php echo ((isset($work_exp) && ($work_exp == '1')) ? "checked" : "") ?>>
                                Work Experience
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="exp_int" name="internship" id="optionsRadios2" value="1" <?php echo ((isset($internship) && ($internship == '1')) ? "checked" : "") ?>>
                                Internships
                            </label>
                        </div>
                        <p>You can select both also. If you have a few of years of work experience, then you may like to take internship experience out of your CV, unless it is augmenting your relevant experience</p>
                    </div>
                    <!--set end-->

                    <!-- Show hide div-->
                    <div class="col-md-12" id="exp_div" style="<?php echo ((isset($work_exp) && ($work_exp == '1')) ? "" : "display:none") ?>">
                        <div class="panel">
                            <h5 class="header_text">Work Experience</h5>
                        </div>
                        <p>Please mention your work experience in Reverse Chronological Order</p>
                        <?php
                        if (!empty($workexp)) {
                            $c = 1;
                            foreach ($workexp as $v) {
                                echo '<div class="row well">
                            <a class="pull-right btn btn-sm remove btn-danger"><i class="fa fa-remove"></i></a>
                            <!--set -->
                            <div class="form-group col-md-12">
                                <label for="">Name of the Organization</label>
                                <input type="text" class="form-control name" name="org[' . $c . '][org]" value="' . $v['org'] . '" id="" placeholder="">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Duration</label>
                                <input type="text" class="form-control duration" id=""  placeholder=""  name="org[' . $c . '][duration]" value="' . $v['duration'] . '">
                            </div>
                            <!--set end-->
                            <!--set -->
                            <div class="form-group col-md-12">
                                <label for="">Designation</label>
                                <input type="text" class="form-control designation" id="" placeholder=""  name="org[' . $c . '][designation]" value="' . $v['designation'] . '">
                            </div>
                            <!--set end-->
                            <!--set -->
                            <div class="form-group col-md-12">
                                <label for="">Location</label>
                                <input type="text" class="form-control loc" id="" placeholder=""  name="org[' . $c . '][loc]" value="' . $v['loc'] . '">
                            </div>';

                                $ct = 1;
                                if (!empty($v['Responsibility'])) {
                                    foreach ($v['Responsibility'] as $val) {
                                        echo '<div class="form-group col-md-12">';
                                        if ($ct == 1)
                                            echo ' <label for="">Key Responsibilities (Suggested: Mention upto 5)</label>';
                                        echo ' <input type="text" class="form-control" id="" placeholder="" name="org[' . $c . '][res][]" value="' . $val['data'] . '">';

                                        echo '</div>';
                                        $ct = 0;
                                    }
                                }

                                if ($ct == 1) {
                                    echo ' <div class="form-group col-md-12">
                                <label for="">Key Responsibilities (Suggested: Mention upto 5)</label>
                                <input type="text" class="form-control" id="" placeholder="" name="org[' . $c . '][res][]">
                                <!--<span class="help-block"><a href="#!">Add More...</a></span>-->
                                </div>';
                                }
                                echo '<div class="form-group col-md-12" id="res' . $c . '" style="display:none">
                                <!--<label for="">Key Responsibilities (Suggested: Mention upto 5)</label>-->
                                <input type="text" class="form-control" id="" placeholder="" name="org[' . $c . '][res][]">
                                <!--<span class="help-block"><a href="#!">Add More...</a></span>-->
                            </div>
                            <div class=" col-md-12">
                                <span class="help-block"><a href="#!" class="addMore" data-src="res' . $c . '"  >Add More...</a></span>
                            </div>';



                                $ct = 1;
                                if (!empty($v['Achievement'])) {
                                    foreach ($v['Achievement'] as $val) {
                                        echo '<div class="form-group col-md-12">';
                                        if ($ct == 1)
                                            echo ' <label for="">Achievements (Suggested: Mention upto 5)</label>';
                                        echo ' <input type="text" class="form-control" id="" placeholder="" name="org[' . $c . '][ach][]" value="' . $val['data'] . '">';

                                        echo '</div>';
                                        $ct = 0;
                                    }
                                }

                                if ($ct == 1) {
                                    echo ' <div class="form-group col-md-12">
                                <label for="">Achievements (Suggested: Mention upto 5)</label>
                                <input type="text" class="form-control" id="" placeholder="" name="org[' . $c . '][ach][]">
                                <!--<span class="help-block"><a href="#!">Add More...</a></span>-->
                                </div>';
                                }
                                echo '<div class="form-group col-md-12" id="ach' . $c . '" style="display:none">
                                <!--<label for="">Key Responsibilities (Suggested: Mention upto 5)</label>-->
                                <input type="text" class="form-control" id="" placeholder="" name="org[' . $c . '][ach][]">
                                <!--<span class="help-block"><a href="#!">Add More...</a></span>-->
                            </div>
                            <div class=" col-md-12">
                                <span class="help-block"><a href="#!" class="addMore" data-src="ach' . $c . '"  >Add More...</a></span>
                            </div>';

                                echo'</div>';
                                $c++;
                            }
                        } else {
                            ?>

                            <div class="row well">
                                <a class="pull-right btn btn-sm remove btn-danger"><i class="fa fa-remove"></i></a>
                                <!--set -->
                                <div class="form-group col-md-12">
                                    <label for="">Name of the Organization</label>
                                    <input type="text" class="form-control name" name="org[1][org]" id="" placeholder="">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="">Duration</label>
                                    <input type="text" class="form-control duration" id=""  placeholder=""  name="org[1][duration]">
                                </div>
                                <!--set end-->
                                <!--set -->
                                <div class="form-group col-md-12">
                                    <label for="">Designation</label>
                                    <input type="text" class="form-control designation" id="" placeholder=""  name="org[1][designation]">
                                </div>
                                <!--set end-->
                                <!--set -->
                                <div class="form-group col-md-12">
                                    <label for="">Location</label>
                                    <input type="text" class="form-control loc" id="" placeholder=""  name="org[1][loc]">
                                </div>
                                <!--set end-->
                                <!--set -->
                                <div class="form-group col-md-12">
                                    <label for="">Key Responsibilities (Suggested: Mention upto 5)</label>
                                    <input type="text" class="form-control" id="" placeholder="" name="org[1][res][]">
                                    <!--<span class="help-block"><a href="#!">Add More...</a></span>-->
                                </div>
                                <div class="form-group col-md-12" id="res" style="display:none">
                                    <!--<label for="">Key Responsibilities (Suggested: Mention upto 5)</label>-->
                                    <input type="text" class="form-control" id="" placeholder="" name="org[1][res][]">
                                    <!--<span class="help-block"><a href="#!">Add More...</a></span>-->
                                </div>
                                <div class=" col-md-12">
                                    <span class="help-block"><a href="#!" class="addMore" data-src="res"  >Add More...</a></span>
                                </div>
                                <!--set end-->
                                <!--set -->
                                <div class="form-group col-md-12">
                                    <label for="">Achievements (Suggested: Mention upto 5)</label>
                                    <input type="text" class="form-control" id="" placeholder=""  name="org[1][ach][]">
                                    <!--<span class="help-block"><a href="#!">Add More...</a></span>-->
                                </div>
                                <div class="form-group col-md-12" id="ach" style="display:none">
                                    <!--<label for="">Achievements (Suggested: Mention upto 5)</label>-->
                                    <input type="text" class="form-control" id="" placeholder="" name="org[1][ach][]">
                                    <!--<span class="help-block"><a href="#!">Add More...</a></span>-->
                                </div>
                                <div class=" col-md-12">
                                    <span class="help-block"><a href="#!" class="addMore" data-src="ach" >Add More...</a></span>
                                </div>
                                <!--set end-->
                            </div>
                        <?php } ?>



                        <div class="row well" style="display:none;" id="org_div">
                            <!--set -->
                            <a class="pull-right btn btn-sm btn-danger remove"><i class="fa fa-remove"></i></a>
                            <!--set -->
                            <div class="form-group col-md-12">
                                <label for="">Name of the Organization</label>
                                <input type="text" class="form-control name"  id="" placeholder="">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Duration</label>
                                <input type="text" class="form-control duration" id=""  placeholder="" >
                            </div>
                            <!--set end-->
                            <!--set -->
                            <div class="form-group col-md-12">
                                <label for="">Designation</label>
                                <input type="text" class="form-control designation" id="" placeholder="" >
                            </div>
                            <!--set end-->
                            <!--set -->
                            <div class="form-group col-md-12">
                                <label for="">Location</label>
                                <input type="text" class="form-control loc" id="" placeholder="" >
                            </div>
                            <!--set end-->
                            <!--set -->
                            <div class="form-group col-md-12">
                                <label for="">Key Responsibilities (Suggested: Mention upto 5)</label>
                                <input type="text" class="form-control firstres" id="" placeholder="" >
                                <!--<span class="help-block"><a href="#!">Add More...</a></span>-->
                            </div>
                            <div class="form-group col-md-12 res" id="" style="display:none">
                                <!--<label for="">Key Responsibilities (Suggested: Mention upto 5)</label>-->
                                <input type="text" class="form-control" id="" placeholder="">
                                <!--<span class="help-block"><a href="#!">Add More...</a></span>-->
                            </div>
                            <div class=" col-md-12 addMoreres">
                                <span class="help-block"><a href="#!" class="addMore" data-src="res">Add More...</a></span>
                            </div>
                            <!--set end-->
                            <!--set -->
                            <div class="form-group col-md-12">
                                <label for="">Achievements (Suggested: Mention upto 5)</label>
                                <input type="text" class="form-control firstach" id="" placeholder=""  >
                                <!--<span class="help-block"><a href="#!">Add More...</a></span>-->
                            </div>
                            <div class="form-group col-md-12 ach" id="" style="display:none">
                                <!--<label for="">Achievements (Suggested: Mention upto 5)</label>-->
                                <input type="text" class="form-control" id="" placeholder="">
                                <!--<span class="help-block"><a href="#!">Add More...</a></span>-->
                            </div>
                            <div class=" col-md-12 addMoreach">
                                <span class="help-block"><a href="#!" class="addMore" data-src="ach">Add More...</a></span>
                            </div>
                            <!--set end-->
                        </div>

                        <div class="row">
                            <div class=" col-md-12">
                                <span class="help-block"><a href="#!" class="addMoreOrg" data-src="org_div">Add More Organisation</a></span>
                            </div>
                            <div class="col-md-12">
                                <br><br>
                                <button type="button" class="btn btn-success save_draft">Save as Draft</button>
                                <br><br>
                            </div>
                        </div>
                        <hr>
                    </div>

                    <!-- Show hide div end-->


                    <!-- Show hide div-->
                    <div class="col-md-12" id="int_exp" style="<?php echo ((isset($internship) && ($internship == '1')) ? "" : "display:none") ?>">
                        <div class="panel">
                            <h5 class="header_text">Internships</h5>
                        </div>
                        <p>Please mention your Internships in Reverse Chronological Order</p>
                        <?php
                            if (!empty($int)) {
                                $intv = 1;
                                foreach($int as $key => $value){
                                    ?>
                                    <div class="row well">
                                        <a class="pull-right btn btn-sm btn-danger remove"><i class="fa fa-remove"></i></a>
                                        <div class="form-group col-md-12">
                                            <label for="">Name of the Organization</label>
                                            <input type="text" class="form-control" name="int[<?php echo $intv ?>][org]" value="<?php echo $value['org'] ?>" id="" placeholder="">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="">Duration</label>
                                            <input type="text" class="form-control" id="" name="int[<?php echo $intv ?>][duration]" value="<?php echo $value['duration']; ?>" placeholder="">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="">Designation</label>
                                            <input type="text" class="form-control" id="" name="int[<?php echo $intv ?>][designation]" value="<?php echo $value['designation']; ?>" placeholder="">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="">Location</label>
                                            <input type="text" class="form-control" name="int[<?php echo $intv ?>][loc]" id="" value="<?php echo $value['loc']; ?>" placeholder="">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="">Project Title</label>
                                            <input type="text" class="form-control" name="int[<?php echo $intv ?>][project]" value="<?php echo $value['project']; ?>" id="" placeholder="Start with To. For Example: To Study/ To Identify/ To Design/ To Sell/ To Improvise/ To find/ To Support/ To Understand/ To Create etc.">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="">Brief Methodology</label>
                                            <input type="text" class="form-control" id="" name="int[<?php echo $intv ?>][method]" value="<?php echo $value['method']; ?>" placeholder="Mention briefly about how you approached your internship. This section deals with the strategy behind your internship">
                                        </div>
                                        <?php
                                            $c = 1;
                                            if (!empty($value['Responsibility'])) {
                                                foreach ($value['Responsibility'] as $v) {
                                                    echo '<div class="form-group col-md-12">';
                                                    if ($c == 1)
                                                        echo ' <label for="">Key Responsibilities (Suggested: Mention upto 5)</label>';
                                                    echo ' <input type="text" class="form-control" name="int['.$intv.'][res][]" id="" placeholder="" value="' . $v['data'] . '">';
                
                                                    echo '</div>';
                                                    $c = 0;
                                                }
                                            }
                
                                            if ($c == 1) {
                                                echo ' <div class="form-group col-md-12">
                                                <label for="">Key Responsibilities (Suggested: Mention upto 5)</label>
                                                <input type="text" class="form-control" name="int['.$intv.'][res][]" id="" placeholder="">
                                                <!--<span class="help-block"><a href="#!">Add More...</a></span>-->
                                            </div>';
                                            }
                                        ?>
                                        <div class="form-group col-md-12" id="int_res<?php echo $intv ?>" style="display:none">
                                            <!--<label for="">Key Responsibilities (Suggested: Mention upto 5)</label>-->
                                            <input type="text" class="form-control" name="int[<?php echo $intv ?>][res][]" id="" placeholder="">
                                            <!--<span class="help-block"><a href="#!">Add More...</a></span>-->
                                        </div>
                                        <div class=" col-md-12">
                                            <span class="help-block"><a href="#!" class="addMore" data-src="int_res<?php echo $intv ?>">Add More...</a></span>
                                        </div>
                                        <?php
                                            $c = 1;
                                            if (!empty($value['Achievement'])) {
                                                foreach ($value['Achievement'] as $v) {
                                                    echo '<div class="form-group col-md-12">';
                                                    if ($c == 1)
                                                        echo '<label for="">Achievements (Suggested: Mention upto 5)</label>';
                                                    echo ' <input type="text" class="form-control" name="int['.$intv.'][ach][]" id="" placeholder="" value="' . $v['data'] . '">';
                
                                                    echo '</div>';
                                                    $c = 0;
                                                }
                                            }
                
                                            if ($c == 1) {
                                                echo '<div class="form-group col-md-12">
                                                <label for="">Achievements (Suggested: Mention upto 5)</label>
                                                <input type="text" class="form-control" name="int['.$intv.'][ach][]" id="" placeholder="">
                                                <!--<span class="help-block"><a href="#!">Add More...</a></span>-->
                                            </div>';
                                            }
                                        ?>
                                            <div class="form-group col-md-12" id="int_ach<?php echo $intv ?>" style="display:none">
                                                <!--<label for="">Achievements (Suggested: Mention upto 5)</label>-->
                                                <input type="text" class="form-control" name="int[<?php echo $intv ?>][ach][]" id="" placeholder="">
                                                <!--<span class="help-block"><a href="#!">Add More...</a></span>-->
                                            </div>
                                            <div class=" col-md-12">
                                                <span class="help-block"><a href="#!" class="addMore" data-src="int_ach<?php echo $intv ?>">Add More...</a></span>
                                            </div>
                                    </div>
                                    <?php
                                 $intv++; 
                                }
                            }else{
                                ?>
                                <div class="row well">
                                    <!--set -->
                                    <a class="pull-right btn btn-sm btn-danger remove"><i class="fa fa-remove"></i></a>
                                    <div class="form-group col-md-12">
                                        <label for="">Name of the Organization</label>
                                        <input type="text" class="form-control" name="int[1][org]" value="" id="" placeholder="">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="">Duration</label>
                                        <input type="text" class="form-control" id="" name="int[1][duration]" value="" placeholder="">
                                    </div>
                                    <!--set end-->
                                    <!--set -->
                                    <div class="form-group col-md-12">
                                        <label for="">Designation</label>
                                        <input type="text" class="form-control" id="" name="int[1][designation]" value="" placeholder="">
                                    </div>
                                    <!--set end-->
                                    <!--set -->
                                    <div class="form-group col-md-12">
                                        <label for="">Location</label>
                                        <input type="text" class="form-control" name="int[1][loc]" id="" value="" placeholder="">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="">Project Title</label>
                                        <input type="text" class="form-control" name="int[1][project]" value="" id="" placeholder="Start with To. For Example: To Study/ To Identify/ To Design/ To Sell/ To Improvise/ To find/ To Support/ To Understand/ To Create etc.">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="">Brief Methodology</label>
                                        <input type="text" class="form-control" id="" name="int[1][method]" value="" placeholder="Mention briefly about how you approached your internship. This section deals with the strategy behind your internship">
                                    </div>
                                    <!--set end-->
                                    <!--set -->
                                    <div class="form-group col-md-12">
                                        <label for="">Key Responsibilities (Suggested: Mention upto 5)</label>
                                        <input type="text" class="form-control" name="int[1][res][]" id="" placeholder="">
                                        <!--<span class="help-block"><a href="#!">Add More...</a></span>-->
                                    </div>
                                    <div class="form-group col-md-12" id="int_res" style="display:none">
                                        <!--<label for="">Key Responsibilities (Suggested: Mention upto 5)</label>-->
                                        <input type="text" class="form-control" name="int[1][res][]" id="" placeholder="">
                                        <!--<span class="help-block"><a href="#!">Add More...</a></span>-->
                                    </div>
                                    <div class=" col-md-12">
                                        <span class="help-block"><a href="#!" class="addMore" data-src="int_res">Add More...</a></span>
                                    </div>
                                    <!--set end-->
                                    <!--set -->
                                    <div class="form-group col-md-12">
                                        <label for="">Achievements (Suggested: Mention upto 5)</label>
                                        <input type="text" class="form-control" name="int[1][ach][]" id="" placeholder="">
                                        <!--<span class="help-block"><a href="#!">Add More...</a></span>-->
                                    </div>
                                    <div class="form-group col-md-12" id="int_ach" style="display:none">
                                        <!--<label for="">Achievements (Suggested: Mention upto 5)</label>-->
                                        <input type="text" class="form-control" name="int[1][ach][]" id="" placeholder="">
                                        <!--<span class="help-block"><a href="#!">Add More...</a></span>-->
                                    </div>
                                    <div class=" col-md-12">
                                        <span class="help-block"><a href="#!" class="addMore" data-src="int_ach">Add More...</a></span>
                                    </div>
                                    <!--set end-->
                                </div>
                                <?php
                            }
                        ?>
                        
                        <div class="row well" style="display:none;" id="int_div">
                            <!--set -->
                            <a class="pull-right btn btn-sm btn-danger remove"><i class="fa fa-remove"></i></a>
                            <div class="form-group col-md-12">
                                <label for="">Name of the Organization</label>
                                <input type="text" class="form-control nameInt" id="" placeholder="">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Duration</label>
                                <input type="text" class="form-control durationInt" id="" placeholder="">
                            </div>
                            <!--set end-->
                            <!--set -->
                            <div class="form-group col-md-12">
                                <label for="">Designation</label>
                                <input type="text" class="form-control designationInt" id="" placeholder="">
                            </div>
                            <!--set end-->
                            <!--set -->
                            <div class="form-group col-md-12">
                                <label for="">Location</label>
                                <input type="text" class="form-control locationInt" id="" placeholder="">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Project Title</label>
                                <input type="text" class="form-control projecttitleInt" id="" placeholder="Start with To. For Example: To Study/ To Identify/ To Design/ To Sell/ To Improvise/ To find/ To Support/ To Understand/ To Create etc.">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Brief Methodology</label>
                                <input type="text" class="form-control brief_methodologyInt" id="" placeholder="Mention briefly about how you approached your internship. This section deals with the strategy behind your internship">
                            </div>
                            <!--set end-->
                            <!--set -->
                            <div class="form-group col-md-12">
                                <label for="">Key Responsibilities (Suggested: Mention upto 5)</label>
                                <input type="text" class="form-control firstresInt" id="" placeholder="">
                                <!--<span class="help-block"><a href="#!">Add More...</a></span>-->
                            </div>
                            <div class="form-group col-md-12 int_res" id="" style="display:none">
                                <!--<label for="">Key Responsibilities (Suggested: Mention upto 5)</label>-->
                                <input type="text" class="form-control" id="" placeholder="">
                                <!--<span class="help-block"><a href="#!">Add More...</a></span>-->
                            </div>
                            <div class=" col-md-12 addMoreres">
                                <span class="help-block"><a href="#!" class="addMore" data-src="int_res">Add More...</a></span>
                            </div>
                            <!--set end-->
                            <!--set -->
                            <div class="form-group col-md-12">
                                <label for="">Achievements (Suggested: Mention upto 5)</label>
                                <input type="text" class="form-control firstachInt" id="" placeholder="">
                                <!--<span class="help-block"><a href="#!">Add More...</a></span>-->
                            </div>
                            <div class="form-group col-md-12 int_ach" id="" style="display:none">
                                <!--<label for="">Achievements (Suggested: Mention upto 5)</label>-->
                                <input type="text" class="form-control" id="" placeholder="">
                                <!--<span class="help-block"><a href="#!">Add More...</a></span>-->
                            </div>
                            <div class=" col-md-12 addMoreach">
                                <span class="help-block"><a href="#!" class="addMore" data-src="int_ach">Add More...</a></span>
                            </div>
                            <!--set end-->
                        </div>
                        
                        <div class="row">
                            <div class=" col-md-12">
                                <span class="help-block"><a href="#!" class="addMoreInt" data-src="int_div">Add More Internship</a></span>
                            </div>
                            <div class="col-md-12">
                                <br><br>
                                <button type="button" class="btn btn-success save_draft">Save as Draft</button>
                                <br><br>
                            </div>
                        </div>
                    </div>
                    <!-- Show hide div end-->
                   


                    <div class="col-md-12">
                        <div class="panel">
                            <h5 class="header_text">Education</h5>
                        </div>
                        <p>Please mention your Educational Qualifications in Reverse Chronological Order. Fill whatever is applicable</p>
                        <div class="row">
                            <!--set -->
                            <div class="form-group col-md-12">
                                <label for="">Doctorate</label>
                                <input type="text" class="form-control" name="edu[doc]" id="" placeholder="Course/ College/ University/ Year of Education/ Grade Point Average (GPA)/ % of Marks" value="<?php echo ((!empty($edu) ? $edu['doc'] : "")); ?>">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Post - Graduation</label>
                                <input type="text" class="form-control" name="edu[pg]" id="" placeholder="Course/ College/ University/ Year of Education/ Grade Point Average (GPA)/ % of Marks" value="<?php echo ((!empty($edu) ? $edu['pg'] : "")); ?>">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Graduation</label>
                                <input type="text" class="form-control" id="" name="edu[graduation]" placeholder="Course/ College/ University/ Year of Education/ Grade Point Average (GPA)/ % of Marks" value="<?php echo ((!empty($edu) ? $edu['graduation'] : "")); ?>">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">XIIth</label>
                                <input type="text" class="form-control" id="" name="edu[xiith]" placeholder="Class/ Board/ Year of Education/ Grade Point Average (GPA)/ Percentage of Marks" value="<?php echo ((!empty($edu) ? $edu['xiith'] : "")); ?>">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Xth</label>
                                <input type="text" class="form-control" id="" name="edu[xth]" placeholder="Class/ Board/ Year of Education/ Grade Point Average (GPA)/ Percentage of Marks" value="<?php echo ((!empty($edu) ? $edu['xth'] : "")); ?>">
                            </div>

                        </div>
                    </div>

                    <div class="col-md-12">
                        <br><br>
                        <button type="button" class="btn btn-success save_draft">Save as Draft</button>
                        <br><br>
                    </div>


                    <div class="col-md-12">
                        <div class="panel">
                            <h5 class="header_text">Professional Enhancements</h5>
                        </div>
                        <p>In this section, talk about courses, technical and soft skills related, that you have done to
                            improve your performance at work. Mention courses that are relevant to the job that you
                            have applied for</p>
                        <div class="row">
                            <!--set -->
                            <?php
                            $c = 1;
                            if (!empty($proenc)) {
                                foreach ($proenc as $v) {
                                    echo '<div class="form-group col-md-12">';
                                    echo '<input type="text" class="form-control" name="proenc[]" id="" placeholder="For Example: Green belt certification in Six Sigma by KPMG in MM/ YY" value="' . $v['data'] . '">';
                                    echo '</div>';
                                    $c = 0;
                                }
                            }

                            if ($c == 1) {
                                echo '<div class="form-group col-md-12">
                                <input type="text" class="form-control" name="proenc[]" id="" placeholder="For Example: Green belt certification in Six Sigma by KPMG in MM/ YY">

                            </div>
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" name="proenc[]" id="" placeholder="For Example: JAVA training and certification by Oracle in MM/ YY">

                            </div>
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" name="proenc[]" id="" placeholder="For Example: Communication Skills training conducted at &quot;Place&quot; in MM/ YY">

                            </div>';
                            }
                            ?>


                            <div class="form-group col-md-12" id="proenc" style="display:none">
                                <input type="text" name="proenc[]" class="form-control" id="" placeholder="">
                                <!--<span class="help-block"><a href="#!">Add More...</a></span>-->
                            </div>
                            <div class=" col-md-12">
                                <span class="help-block"><a href="#!" class="addMore" data-src="proenc">Add More...</a></span>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-12">
                        <br><br>
                        <button type="button" class="btn btn-success save_draft">Save as Draft</button>
                        <br><br>
                    </div>



                    <div class="col-md-12">
                        <div class="panel">
                            <h5 class="header_text">Languages Known</h5>
                        </div>
                        <p>Write about Languages that you can Read, Write and/ or Speak. Talk about Foreign
                            Languages that you know, along with the proficiency level. Avoid talking about regional
                            languages unless and until, the language of the area where the job posting is, is known to
                            you</p>
                        <div class="row">
                            <!--set -->
                            <?php
                            $c = 1;
                            if (!empty($lang)) {
                                foreach ($lang as $v) {
                                    echo '<div class="form-group col-md-12">';
                                    echo '<input type="text" class="form-control" id=""  name="lang[]" placeholder="Regional Language, If relevant" value="' . $v['data'] . '">';

                                    echo '</div>';
                                    $c = 0;
                                }
                            }

                            if ($c == 1) {
                                echo ' <div class="form-group col-md-12">
                                <input type="text" class="form-control" id="" name="lang[]" placeholder="Languages that you can Read, Speak and Write">

                            </div>
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" id="" name="lang[]" placeholder="Foreign Language with Proficiency Level">

                            </div>
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" id=""  name="lang[]" placeholder="Regional Language, If relevant">

                            </div>';
                            }
                            ?>

                            <div class="form-group col-md-12" id="lang" style="display:none">
                                <input type="text" class="form-control" name="lang[]" id="" placeholder="">
                                <!--<span class="help-block"><a href="#!">Add More...</a></span>-->
                            </div>
                            <div class=" col-md-12">
                                <span class="help-block"><a href="#!" class="addMore" data-src="lang">Add More...</a></span>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-12">
                        <br><br>
                        <button type="button" class="btn btn-success save_draft">Save as Draft</button>
                        <br><br>
                    </div>



                    <div class="col-md-12">
                        <div class="panel">
                            <h5 class="header_text">Computer Skills</h5>
                        </div>
                        <p style="text-align: justify;">In Computer Skills section talk about your proficiency levels in Operating systems (Windows
                            and MacOS), Office suites (Microsoft Office, G Suite), Presentation software (PowerPoint,
                            Keynote), Spreadsheets (Excel, Google Spreadsheets, etc.), Communication and
                            collaboration tools (Slack, Skype, Zoom etc.), Accounting software (QuickBooks,
                            FreshBooks, Xero, etc.), Social media (Twitter, Facebook, Instagram, etc.), Data
                            visualisation Tools (Tools built into spreadsheet programs like Excel, Tableau, Datawrapper
                            etc.)</p>
                        <div class="row">
                            <!--set -->

                            <?php
                            $c = 1;
                            if (!empty($compskill)) {
                                foreach ($compskill as $v) {
                                    echo '<div class="form-group col-md-12">';
                                    echo '<input type="text" class="form-control" name="compskill[]" id="" placeholder="" value="' . $v['data'] . '">';

                                    echo '</div>';
                                    $c = 0;
                                }
                            }

                            if ($c == 1) {
                                echo ' <div class="form-group col-md-12">
                                <input type="text" class="form-control" name="compskill[]" id="" placeholder="">

                            </div>';
                            }
                            ?>


                            <div class="form-group col-md-12" id="comp" style="display:none">
                                <input type="text" class="form-control" name="compskill[]" id="" placeholder="">
                                <!--<span class="help-block"><a href="#!">Add More...</a></span>-->
                            </div>
                            <div class=" col-md-12">
                                <span class="help-block"><a href="#!" class="addMore" data-src="comp">Add More...</a></span>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-12">
                        <br><br>
                        <button type="button" class="btn btn-success save_draft">Save as Draft</button>
                        <br><br>
                    </div>




                    <div class="col-md-12">
                        <div class="panel">
                            <h5 class="header_text">Achievements and Awards (Suggested: List upto 10)</h5>
                        </div>
                        <p>Mention one or two key achievements in each of these areas in reverse chronological order.
                            Mention achievements like participated in, volunteered for etc. only when you do not have
                            anything significant to mention</p>
                        <div class="row">
                            <!--set -->
                            <?php
                            $c = 1;
                            if (!empty($ach['Academics'])) {
                                foreach ($ach['Academics'] as $v) {
                                    echo '<div class="form-group col-md-12">';
                                    if ($c == 1)
                                        echo ' <label for="">Academics</label>';
                                    echo ' <input type="text" class="form-control" name="achievements[Academics][]" id="" placeholder="" value="' . $v['data'] . '">';

                                    echo '</div>';
                                    $c = 0;
                                }
                            }

                            if ($c == 1) {
                                echo ' <div class="form-group col-md-12">
                                <label for="">Academics</label>
                                <input type="text" class="form-control" name="achievements[Academics][]" id="" placeholder="">

                            </div>';
                            }
                            ?>


                            <div class="form-group col-md-12" id="Academics" style="display:none">
                                <input type="text" class="form-control" name="achievements[Academics][]" id="" placeholder="">
                                <!--<span class="help-block"><a href="#!">Add More...</a></span>-->
                            </div>
                            <div class=" col-md-12">
                                <span class="help-block"><a href="#!" class="addMore" data-src="Academics">Add More...</a></span>
                            </div>


                            <?php
                            $c = 1;
                            if (!empty($ach['Sports'])) {
                                foreach ($ach['Sports'] as $v) {
                                    echo '<div class="form-group col-md-12">';
                                    if ($c == 1)
                                        echo ' <label for="">Sports</label>';
                                    echo ' <input type="text" class="form-control" name="achievements[Sports][]" id="" placeholder="" value="' . $v['data'] . '">';

                                    echo '</div>';
                                    $c = 0;
                                }
                            }

                            if ($c == 1) {
                                echo '<div class="form-group col-md-12">
                                <label for="">Sports</label>
                                <input type="text" class="form-control" id="" name="achievements[Sports][]" placeholder="">

                            </div>';
                            }
                            ?>



                            <div class="form-group col-md-12" id="Sports" style="display:none">
                                <input type="text" class="form-control" name="achievements[Sports][]" id="" placeholder="">
                                <!--<span class="help-block"><a href="#!">Add More...</a></span>-->
                            </div>
                            <div class=" col-md-12">
                                <span class="help-block"><a href="#!" class="addMore" data-src="Sports">Add More...</a></span>
                            </div>

                            <?php
                            $c = 1;
                            if (!empty($ach['pos_res'])) {
                                foreach ($ach['pos_res'] as $v) {
                                    echo '<div class="form-group col-md-12">';
                                    if ($c == 1)
                                        echo ' <label for="">Positions of Responsibilities held</label>';
                                    echo ' <input type="text" class="form-control" name="achievements[pos_res][]" id="" placeholder="" value="' . $v['data'] . '">';

                                    echo '</div>';
                                    $c = 0;
                                }
                            }

                            if ($c == 1) {
                                echo '<div class="form-group col-md-12">
                                <label for="">Positions of Responsibilities held</label>
                                <input type="text" class="form-control" id="" name="achievements[pos_res][]" placeholder="">

                            </div>';
                            }
                            ?>


                            <div class="form-group col-md-12" id="pos_res" style="display:none">
                                <input type="text" class="form-control" name="achievements[pos_res][]" id="" placeholder="">
                                <!--<span class="help-block"><a href="#!">Add More...</a></span>-->
                            </div>
                            <div class=" col-md-12">
                                <span class="help-block"><a href="#!" class="addMore" data-src="pos_res">Add More...</a></span>
                            </div>

                            <?php
                            $c = 1;
                            if (!empty($ach['hob_res'])) {
                                foreach ($ach['hob_res'] as $v) {
                                    echo '<div class="form-group col-md-12">';
                                    if ($c == 1)
                                        echo ' <label for="">Hobbies</label>';
                                    echo ' <input type="text" class="form-control" name="achievements[hob_res][]" id="" placeholder="" value="' . $v['data'] . '">';

                                    echo '</div>';
                                    $c = 0;
                                }
                            }

                            if ($c == 1) {
                                echo '<div class="form-group col-md-12">
                                <label for="">Hobbies</label>
                                <input type="text" class="form-control" id="" name="achievements[hob_res][]" placeholder="">

                            </div>';
                            }
                            ?>
                            <div class="form-group col-md-12" id="hobbies_ach" style="display:none">
                                <input type="text" class="form-control" name="achievements[hob_res][]" id="" placeholder="">
                                <!--<span class="help-block"><a href="#!">Add More...</a></span>-->
                            </div>
                            <div class=" col-md-12">
                                <span class="help-block"><a href="#!" class="addMore" data-src="hobbies_ach">Add More...</a></span>
                            </div>
                            <?php
                            $c = 1;
                            if (!empty($ach['ex_act'])) {
                                foreach ($ach['ex_act'] as $v) {
                                    echo '<div class="form-group col-md-12">';
                                    if ($c == 1)
                                        echo ' <label for="">Extracurricular Activities</label>';
                                    echo ' <input type="text" class="form-control" name="achievements[ex_act][]" id="" placeholder="" value="' . $v['data'] . '">';

                                    echo '</div>';
                                    $c = 0;
                                }
                            }

                            if ($c == 1) {
                                echo '<div class="form-group col-md-12">
                                <label for="">Extracurricular Activities</label>
                                <input type="text" class="form-control" id="" name="achievements[ex_act][]" placeholder="">

                            </div>';
                            }
                            ?>



                            <div class="form-group col-md-12" id="ex_act" style="display:none">
                                <input type="text" class="form-control" name="achievements[ex_act][]" id="" placeholder="">
                                <!--<span class="help-block"><a href="#!">Add More...</a></span>-->
                            </div>
                            <div class=" col-md-12">
                                <span class="help-block"><a href="#!" class="addMore" data-src="ex_act">Add More...</a></span>
                            </div>


                            <!--                            <div class="form-group col-md-12">
                                                            <label for="">Hobbies</label>
                                                            <input type="text" class="form-control" id="" placeholder="">

                                                        </div>

                                                        <div class="form-group col-md-12" id="Hobbies" style="display:none">
                                                            <input type="text" class="form-control" id="" placeholder="">
                                                            <span class="help-block"><a href="#!">Add More...</a></span>
                                                        </div>
                                                        <div class=" col-md-12">
                                                            <span class="help-block"><a href="#!" class="addMore" data-src="Hobbies">Add More...</a></span>
                                                        </div>-->




                            <?php
                            $c = 1;
                            if (!empty($ach['Social'])) {
                                foreach ($ach['Social'] as $v) {
                                    echo '<div class="form-group col-md-12">';
                                    if ($c == 1)
                                        echo ' <label for="">Social</label>';
                                    echo ' <input type="text" class="form-control" name="achievements[Social][]" id="" placeholder="" value="' . $v['data'] . '">';

                                    echo '</div>';
                                    $c = 0;
                                }
                            }

                            if ($c == 1) {
                                echo '<div class="form-group col-md-12">
                                <label for="">Social</label>
                                <input type="text" class="form-control" id="" name="achievements[Social][]" placeholder="">

                            </div>';
                            }
                            ?>



                            <div class="form-group col-md-12" id="Social" style="display:none">
                                <input type="text" class="form-control" name="achievements[Social][]" id="" placeholder="">
                                <!--<span class="help-block"><a href="#!">Add More...</a></span>-->
                            </div>
                            <div class=" col-md-12">
                                <span class="help-block"><a href="#!" class="addMore" data-src="Social">Add More...</a></span>
                            </div>


                            <?php
                            $c = 1;
                            if (!empty($ach['Spiritual'])) {
                                foreach ($ach['Spiritual'] as $v) {
                                    echo '<div class="form-group col-md-12">';
                                    if ($c == 1)
                                        echo '  <label for="">Spiritual</label>';
                                    echo ' <input type="text" class="form-control" name="achievements[Spiritual][]" id="" placeholder="" value="' . $v['data'] . '">';

                                    echo '</div>';
                                    $c = 0;
                                }
                            }

                            if ($c == 1) {
                                echo '<div class="form-group col-md-12">
                                <label for="">Spiritual</label>
                                <input type="text" class="form-control" id="" name="achievements[Spiritual][]" placeholder="">

                            </div>';
                            }
                            ?>




                            <div class="form-group col-md-12" id="Spiritual" style="display:none">
                                <input type="text" class="form-control" id="" name="achievements[Spiritual][]" placeholder="">
                                <!--<span class="help-block"><a href="#!">Add More...</a></span>-->
                            </div>
                            <div class=" col-md-12">
                                <span class="help-block"><a href="#!" class="addMore" data-src="Spiritual">Add More...</a></span>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-12">
                        <br><br>
                        <button type="button" class="btn btn-success save_draft">Save as Draft</button>
                        <br><br>
                    </div>


                    <div class="col-md-12">
                        <div class="panel">
                            <h5 class="header_text">Hobbies</h5>
                        </div>
                        <p>Mention your Passionate Pursuits in the Hobbies section. Talk about hobbies where you have achievements. Talk about hobbies where you can correlate learnings with the job requirements. Write about Sports Hobbies, Adventure Hobbies, Creative Hobbies, Performing arts etc. Ensure that you write about hobbies you are incisive about. Do not talk about activities like Going for Long drives, watching movies, watching night sky, Shopping etc. as your hobbies, as they do not highlight any mentionable qualities</p>
                        <div class="row">
                            <!--set -->

                            <?php
                            $c = 1;
                            if (!empty($hobby)) {
                                foreach ($hobby as $v) {
                                    echo '<div class="form-group col-md-12">';
                                    echo '<input type="text" class="form-control" name="hobby[]" id="" placeholder="" value="' . $v['data'] . '">';

                                    echo '</div>';
                                    $c = 0;
                                }
                            }

                            if ($c == 1) {
                                echo ' <div class="form-group col-md-12">
                                <input type="text" class="form-control" name="hobby[]" id="" placeholder="">

                            </div>';
                            }
                            ?>


                            <div class="form-group col-md-12" id="hob" style="display:none">
                                <input type="text" name="hobby[]" class="form-control" id="" placeholder="">
                                <!--<span class="help-block"><a href="#!">Add More...</a></span>-->
                            </div>
                            <div class=" col-md-12">
                                <span class="help-block"><a href="#!" class="addMore" data-src="hob">Add More...</a></span>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-12">
                        <br><br>
                        <button type="button" class="btn btn-success save_draft">Save as Draft</button>
                        <br><br>
                    </div>




                    <div class="col-md-12">
                        <div class="panel">
                            <h5 class="header_text">Personal Details</h5>
                        </div>
                        <p>Provide the following Personal details:</p>
                        <div class="row">
                            <!--set -->
                            <div class="form-group col-md-12">
                                <label for="">Date of Birth: Month Date, Year</label>
                                <input type="text" class="form-control" id="" name="per_detail[dob]" placeholder="Month Date, Year. For Example: October 16, 1971" value="<?php echo ((!empty($per_detail) ? $per_detail['dob'] : "")); ?>">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Fathers Name: Mr. First Name Last Name</label>
                                <input type="text" class="form-control" id="" name="per_detail[fname]" value="<?php echo ((!empty($per_detail) ? $per_detail['fname'] : "")); ?>" placeholder="Mr. First Name Last Name. For Example: Mr. Vijay Mehra">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Address: Provide complete address with Pin code</label>
                                <textarea class="form-control" rows="3" id="" name="per_detail[address]"><?php echo ((!empty($per_detail) ? $per_detail['address'] : "")); ?></textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Nationality</label>
                                <input type="text" class="form-control" id="" placeholder="" name="per_detail[nationality]" value="<?php echo ((!empty($per_detail) ? $per_detail['nationality'] : "")); ?>">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Sex</label>
                                <select class="form-control" id="sel1" name="per_detail[sex]">
                                    <option <?php echo (((!empty($per_detail) && $per_detail['sex'] == "Male") ? "selected" : "")); ?>>Male</option>
                                    <option <?php echo (((!empty($per_detail) && $per_detail['sex'] == "Female") ? "selected" : "")); ?>>Female</option>
                                    <option <?php echo (((!empty($per_detail) && $per_detail['sex'] == "Other") ? "selected" : "")); ?>>Other</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Marital Status</label>
                                <select class="form-control" id="sel1" name="per_detail[maritial_status]">
                                    <option <?php echo (((!empty($per_detail) && $per_detail['maritial_status'] == "Married") ? "selected" : "")); ?>>Married</option>
                                    <option <?php echo (((!empty($per_detail) && $per_detail['maritial_status'] == "Unmarried") ? "selected" : "")); ?>>Unmarried</option>
                                    <option <?php echo (((!empty($per_detail) && $per_detail['maritial_status'] == "Other") ? "selected" : "")); ?>>Other</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Linkedin Address</label>
                                <input type="text" class="form-control" name="per_detail[linkedin]" value="<?php echo ((!empty($per_detail) ? $per_detail['linkedin'] : "")); ?>" id="" placeholder="Example: http://linkedin.com/in/vikas-mehra-226b6820/">
                            </div>

                        </div>
                    </div>

                    <div class="col-md-12">
                        <br><br>
                        <button type="button" class="btn btn-success save_draft">Save as Draft</button>
                        <br><br>
                    </div>




                    <div class="col-md-12">
                        <div class="panel">
                            <h5 class="header_text">References</h5>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" class="reference" name="reference" id="optionsRadios1" value="Not Asked" <?php echo ((isset($reference) && $reference == "Not Asked") ? "checked" : "") ?>>
                                Recruiter has not asked for references
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" class="reference" name="reference" id="optionsRadios2" value="Asked" <?php echo ((isset($reference) && $reference == "Asked") ? "checked" : "") ?>>
                                Recruiter has asked for references
                            </label>
                        </div>
                        <br><br>

                        <div class="row"  id="ref_req" style="<?php echo ((isset($reference) && $reference == "Asked") ? "display:none" : "") ?>">

                            <div class="form-group col-md-12">
                                <label for="">Recruiter has not asked for references then write:</label>
                                <input type="text" class="form-control" id="" name="req_detail" placeholder="Available on request" value="<?php echo ((isset($reference) && $reference == "Not Asked") ? $req_detail : "") ?>">

                            </div>



                        </div>
                        <div class="row"  id="ref_detail" style="<?php echo ((isset($reference) && $reference == "Not Asked") ? "display:none" : "") ?>">
                            <div class="col-md-12">
                                <p>Recruiter has asked for references then provide the following details about your
                                    references:</p>
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" name="reff[name]" id="" value="<?php echo ((isset($reff)) ? $reff['name'] : "") ?>" placeholder="" >

                                </div>
                                <div class="form-group">
                                    <label for="">Designation</label>
                                    <input type="text" class="form-control"  name="reff[designation]" value="<?php echo ((isset($reff)) ? $reff['designation'] : "") ?>" id="" placeholder="">

                                </div>
                                <div class="form-group">
                                    <label for="">Organization</label>
                                    <input type="text" class="form-control" name="reff[org]" value="<?php echo ((isset($reff)) ? $reff['org'] : "") ?>" id="" placeholder="">

                                </div>
                                <div class="form-group">
                                    <label for="">Mobile Number</label>
                                    <input type="number" class="form-control" name="reff[mobile]" value="<?php echo ((isset($reff)) ? $reff['mobile'] : "") ?>" id="" placeholder="">

                                </div>
                                <div class="form-group">
                                    <label for="">Email Address</label>
                                    <input type="email" class="form-control" name="reff[email]" value="<?php echo ((isset($reff)) ? $reff['email'] : "") ?>" id="" placeholder="">

                                </div>

                            </div>

                        </div>
                        <div class="col-md-12">
                        <br><br>
                        <button type="button" class="btn btn-success save_draft">Save as Draft</button>
                        <br><br>
                    </div>
					</div>
					<div class="col-md-12">
						<div class="panel">
							<h5 class="header_text">Image Upload</h5>
						</div>
						<div class="col-md-2 col-lg-2">
							<img style="height: auto; width: 100%;" src="<?php echo base_url($photo_path); ?>" id="uploaded_image"><br><br>
                            <input type="file" name="upload" id="id_image" onchange="reupload(this.files[0].size)">
                            <input type="hidden" value="<?php echo (isset($photo_path) ? $photo_path : "") ?>" name='db_photo'>
                        </div>
                        <div class="col-md-10 col-lg-10"></div>
                        <div class="col-md-12 col-lg-12">
                            <span class="span" style="font-size:17px;" id="img_error">Please upload the logo of your college/ university or photograph. The size of image can be upto 300kb.</span>
                        </div>
                        <div class="col-md-12">
                            <br><br>
                            <button type="button" class="btn btn-success save_draft">Save as Draft</button>
                            <br><br>
                        </div>
					</div>

                    <div class="col-md-12">
                        <center>
                            <!-- <button type="button" class="btn btn-success save_draft">Save as Draft</button>&nbsp; -->
                            <!-- <button type="button" class="btn btn-success save_draft_pdf">Save as Pdf</button>&nbsp; -->
                            <button type="submit" name="is_submit" class="btn btn-success" value="1">Submit</button>
                        </center>
                    </div>







                </div>


            </form>
        </div>
    </div>

</div>
<!-- <div class="col-md-2"></div>
</div> -->
<!--cv content end-->

<?php
$this->load->view('footer_view');
?>
<script>

    // $(document.body).on("click", ".obj", function () {
    //     //alert("jyoti");
    //     $("#obj_type").show();
    // });
    function show(val){
        if(val == "Experienced"){
            $("#obj_type").show();
            $("#paragraph").hide();
        }else{
            $("#obj_type").hide();
            $("#bullet").hide();
            $("#paragraph").show();
        }
    }
    $(document.body).on("click", ".obj_type", function () {
        //  alert($(this).val());
        if ($(this).val() == "bullet") {
            $("#bullet").show();
            $("#paragraph").hide();
        } else {
            $("#paragraph").show();
            $("#bullet").hide();
        }
    });
    
    var childRows = 0;
    $(document.body).on('click', '.addMore', function () {

        var src = $(this).attr('data-src');
        var html = $("#" + src).clone();
        $("#" + src).before(html);
        childRows++;
        var new_id = src + childRows;
        $("#" + src).before().attr('id', new_id);
        $("#" + new_id).attr("style", "");
    });

// for work experience 
    var orgchildRows = <?php echo ((!empty($workexp)) ? count($workexp) : 1) ?>;
  //  alert(orgchildRows);
    $(document.body).on('click', '.addMoreOrg', function () {

        var src = $(this).attr('data-src');
        var html = $("#" + src).clone();
        $("#" + src).before(html);
        orgchildRows++;
        var new_id = src + orgchildRows;
        $("#" + src).before().attr('id', new_id);
        $("#" + new_id).attr("style", "");
        $("#" + new_id).find(".name").attr('name', "org[" + orgchildRows + "][org]");
        $("#" + new_id).find(".duration").attr('name', "org[" + orgchildRows + "][duration]");
        $("#" + new_id).find(".designation").attr('name', "org[" + orgchildRows + "][designation]");
        $("#" + new_id).find(".loc").attr('name', "org[" + orgchildRows + "][loc]");
        $("#" + new_id).find(".firstach").attr('name', "org[" + orgchildRows + "][ach][]");
        $("#" + new_id).find(".firstres").attr('name', "org[" + orgchildRows + "][res][]");
        $("#" + new_id).find(".ach").attr('id', "achorg" + orgchildRows);
        $("#" + new_id).find(".addMoreach").find(".addMore").attr('data-src', "achorg" + orgchildRows);
        $("#" + new_id).find(".ach").find("input").attr('name', "org[" + orgchildRows + "][ach][]");
        $("#" + new_id).find(".res").attr('id', "resorg" + orgchildRows);
        $("#" + new_id).find(".res").find("input").attr('name', "org[" + orgchildRows + "][res][]");
        $("#" + new_id).find(".addMoreres").find(".addMore").attr('data-src', "resorg" + orgchildRows);
    });
// end of work experience
    // using the const insted of the var example at below code modify by
    let IntChildRow = <?php echo ((!empty($int)) ? count($int):1) ?>;
    //alert(IntChildRow);
    
    $(document.body).on('click', '.addMoreInt', function(){
        var src = $(this).attr('data-src');
        var html = $("#" + src).clone();
        $("#" + src).before(html);
        IntChildRow++;
        var new_id = src + IntChildRow;
        $("#" + src).before().attr('id', new_id);
        $("#" + new_id).attr("style", "");
        $("#" + new_id).find(".nameInt").attr('name', "int[" + IntChildRow + "][org]");
        $("#" + new_id).find(".durationInt").attr('name', "int[" + IntChildRow + "][duration]");
        $("#" + new_id).find(".designationInt").attr('name', "int[" + IntChildRow + "][designation]");
        $("#" + new_id).find(".locationInt").attr('name', "int[" + IntChildRow + "][loc]");
        $("#" + new_id).find(".projecttitleInt").attr('name', "int[" + IntChildRow + "][project]");
        $("#" + new_id).find(".brief_methodologyInt").attr('name', "int[" + IntChildRow + "][method]");
        $("#" + new_id).find(".firstachInt").attr('name', "int[" + IntChildRow + "][ach][]");
        $("#" + new_id).find(".firstresInt").attr('name', "int[" + IntChildRow + "][res][]");
        $("#" + new_id).find(".int_ach").attr('id', "int_ach" + IntChildRow);
        $("#" + new_id).find(".addMoreach").find(".addMore").attr('data-src', "int_ach" + IntChildRow);
        $("#" + new_id).find(".int_ach").find("input").attr('name', "int[" + IntChildRow + "][ach][]");
        $("#" + new_id).find(".int_res").attr('id', "int_res" + IntChildRow);
        $("#" + new_id).find(".int_res").find("input").attr('name', "int[" + IntChildRow + "][res][]");
        $("#" + new_id).find(".addMoreres").find(".addMore").attr('data-src', "int_res" + IntChildRow);
    });
// for internship

// end of internship
    $('.exp_int').change(function () {
//        alert($(this).attr('name'));
        if ($(this).is(":checked")) {
            if ($(this).attr('name') == "work_exp") {
                $("#exp_div").show();
            } else {
                $("#int_div").show();
            }

        } else {

            if ($(this).attr('name') == "work_exp") {
                $("#exp_div").hide();
            } else {
                $("#int_div").hide();
            }
        }
    });
    $(document.body).on("click", ".remove", function () {
        //alert("jyoti");

        $(this).parent().remove();
    });
    $(document.body).on("click", ".reference", function () {
        //  alert($(this).val());
        if ($(this).val() == "Asked") {
            $("#ref_detail").show();
            $("#ref_req").hide();
        } else {
            $("#ref_req").show();
            $("#ref_detail").hide();
        }
    });
    $(document.body).on("click", ".save_draft", function () {
        var form = new FormData($('#formID')[0]);
        console.log(form);
        $.ajax({
            url: "<?php echo base_url(); ?>set_cv_data",
            type: "POST",
            data: form,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $.blockUI({css: {
                        border: 'none',
                        padding: '15px',
                        backgroundColor: '#000',
                        '-webkit-border-radius': '10px',
                        '-moz-border-radius': '10px',
                        opacity: .5,
                        color: '#fff'
                    }});
            },
            success: function (data) {
                $.unblockUI();
//                alert(data);
                //console.log(data);
                location.reload();
                // window.location.replace(data);


            },
            error: function () {
                alert('Failed...');
            }
        });
    });

    $(document.body).on("click", ".save_draft_pdf", function () {
        var form = new FormData($('#formID')[0]);
        console.log(form);
        $.ajax({
            url: "<?php echo base_url(); ?>set_cv_data",
            type: "POST",
            data: form,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $.blockUI({css: {
                        border: 'none',
                        padding: '15px',
                        backgroundColor: '#000',
                        '-webkit-border-radius': '10px',
                        '-moz-border-radius': '10px',
                        opacity: .5,
                        color: '#fff'
                    }});
            },
            success: function (data) {
                $.unblockUI();
                window.location="printPdf";
//                alert(data);
                //console.log(data);
                //location.reload();
                // window.location.replace(data);


            },
            error: function () {
                alert('Failed...');
            }
        });
    });

	$("#id_image").change(function(){
		readURL(this);
	});

	function readURL(input) {
    var size = input.files[0].size;
    var type = input.value.split('.').pop().toLowerCase();
     if(size<=307200)
     {
       document.getElementById('img_error').innerHTML="";
             if(type=='jpg' || type=='jpeg' || type=='png' || type=='gif')
             {
              document.getElementById('img_error').innerHTML="";
               if (input.files && input.files[0]) {
              var reader = new FileReader();

              reader.onload = function (e) {
                  $('#uploaded_image').attr('src', e.target.result);
              }

              reader.readAsDataURL(input.files[0]);
          }

       }
       else
       {
        document.getElementById('img_error').innerHTML=" * Please Upload photo jpg,jpeg,png,gif format only";
          $('#id_image').val('');
          return false;

       }

     }
     else
     {
          document.getElementById('img_error').innerHTML=" * Photo Not More Than 300 kb";
          $('#id_image').val('');
          return false;
     }
}
</script>