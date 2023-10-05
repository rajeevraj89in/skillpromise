<?php
$this->load->view('header_view');
$this->load->view('manager_left_view');
?>
<!--content panel start -->
<section class="col-md-9">
    <h1 class="page-header">Add Cover Letter</h1>
    <!-- add-program-form content -->
    <div class="row">
        <!--        <div class="col-md-12">-->

        <form id="mainForm" enctype="multipart/form-data" class="form-horizontal" role="form" action=" <?php echo base_url() . 'set/cover_letter'; ?>" method="POST">

            <div class="col-md-12">
                <input type="hidden" value="<?php echo $template_instruction_id; ?>" name="template_instruction_id">
                <input type="hidden" value="<?php echo $sheet_id = $this->main_model->get_name_from_id('template_instruction', 'sheet_id', $template_instruction_id, "id"); ?>" name="sheet_id">
                <input type="hidden" value="<?php echo $sheet_section_id = $template_instruction_id; ?>" id="sheet_section_id" name="sheet_section_id">

            </div>
            <div class="col-md-10 col-md-offset-2">
                <?php
                print_r($draft_data[0]['instruction']);
//                    foreach ($draft_data as $value) {
//                        //-----for prev data
//                        $ch = 0;
//                        if (isset($draft_data)) {
//                            $prev_content = array();
//                            $prev_desc = array();
//                            foreach ($draft_data as $key_d => $val_draft) {
//                                if ($val_draft['section_id'] == $value['id']) {
//                                    $ch = 1;
//                                    $prev_content[] = $val_draft['skill_value'];
//                                    $prev_desc[] = $val_draft['skill_description'];
//                                    //break;
//                                }
//                            }
//                        }
                //-----
                ?><br>
            </div>
            <div class="col-md-12">
                <!--                        <div class="container pull-left">-->
                <fieldset class="scheduler-border top-space hide_tag" style="width: 96%;">
                    <legend class="scheduler-border" id="charges">Cover Letter Mail Contents</legend>
                    <div class="form-group">
                        <label for="sent_from" class="col-sm-3 control-label">From</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="sent_from" name="sent_from" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sent_to" class="col-sm-3 control-label">To</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="sent_to" name="sent_to" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="subject" class="col-sm-3 control-label">Subject</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="subject" name="subject" placeholder="Source/Job Title/Job Code/Referred by/Your Name/Certification">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="salutation" class="col-sm-3 control-label">Salutation</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="salutation" name="salutation" placeholder="Dear Mr. Last Name, Dear Recruiter, Dear Hiring Manager, Dear First Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="paragraph1" class="col-sm-3 control-label">Paragraph 1</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="paragraph1" name="paragraph1" placeholder="Source from where you got to know about the job / Job title/ Job code/ Your general qualifications for the job"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="paragraph2" class="col-sm-3 control-label">Paragraph 2</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="paragraph2" name="paragraph2" placeholder="Qualification/ Internships/ Experience/ Relevant co-curricular participations/ Certifications"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="paragraph3" class="col-sm-3 control-label">Paragraph 3</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="paragraph3" name="paragraph3" placeholder="Match qualification and Internship/ Work Experience with job requirements. Talk about your willingness for relocation/ Immediate/ early availability for joining"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="closing" class="col-sm-3 control-label">Closing</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="closing" name="closing" placeholder="Conclude with an expression of willingness to appear for an interview, provide more information and a thank you note for reader for his/ her time and consideration. End with Best Regards"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="signature" class="col-sm-3 control-label">Signature</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="signature" name="signature" placeholder="First Name Last Name Full Address with Pin code Landline: Handheld: +91 Personal Email Address:"></textarea>
                        </div>
                    </div><br>
                    <div class="form-group">
                        <!--                            <div class="col-sm-3">
                                                        <button type="submit" value="1"  class="btn btn-primary dew">Save as Draft</button>
                                                    </div>-->
                        <div class="col-sm-3 pull-right">
                            <center> <button type="submit" value="0"  class="btn btn-primary dew" id="save">Submit</button> </center>
                        </div>
                    </div>
                </fieldset>
                <!--                            <div>-->
                <?php // }
                ?>



    <!--                <input type="hidden" name="user_id" value = "<?php // echo $SESSION['user_id'];                                                                                    ?>">-->
                <!--                <div class="form-group">
                                    <label for="cover_letter_content" class="col-sm-3 control-label">Cover Letter Content</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control editor" id="cover_letter_content"  name="cover_letter_content" placeholder="Cover Letter Content"></textarea>
                                    </div>
                                </div>-->
                <!--                    <fieldset class="scheduler-border top-space hide_tag" style="width: 96%;">
                                        <div class="form-group">
                                            <label for="sent_from" class="col-sm-3 control-label">From</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="sent_from" name="sent_from" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="sent_to" class="col-sm-3 control-label">To</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="sent_to" name="sent_to" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="subject" class="col-sm-3 control-label">Subject</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Source/Job Title/Job Code/Referred by/Your Name/Certification">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="salutation" class="col-sm-3 control-label">Salutation</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="salutation" name="salutation" placeholder="Dear Mr. Last Name, Dear Recruiter, Dear Hiring Manager, Dear First Name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="paragraph1" class="col-sm-3 control-label">Paragraph 1</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" id="paragraph1" name="paragraph1" placeholder="Source from where you got to know about the job / Job title/ Job code/ Your general qualifications for the job"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="paragraph2" class="col-sm-3 control-label">Paragraph 2</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" id="paragraph2" name="paragraph2" placeholder="Qualification/ Internships/ Experience/ Relevant co-curricular participations/ Certifications"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="paragraph3" class="col-sm-3 control-label">Paragraph 3</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" id="paragraph3" name="paragraph3" placeholder="Match qualification and Internship/ Work Experience with job requirements. Talk about your willingness for relocation/ Immediate/ early availability for joining"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="closing" class="col-sm-3 control-label">Closing</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" id="closing" name="closing" placeholder="Conclude with an expression of willingness to appear for an interview, provide more information and a thank you note for reader for his/ her time and consideration. End with Best Regards"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="signature" class="col-sm-3 control-label">Signature</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" id="signature" name="signature" placeholder="First Name Last Name Full Address with Pin code Landline: Handheld: +91 Personal Email Address:"></textarea>
                                            </div>
                                        </div>-->
                <!--                <div class="form-group">
                                    <label class="col-sm-3 control-label">Status</label>
                                    <div class="col-sm-9">
                                        <label class="radio-inline">
                                            <input type="radio" name="status" id="Active" value="Active" checked> Active
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="status" id="Inactive" value="Inactive"> Inactive
                                        </label>
                                    </div>
                                </div>-->
                <!--                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-10">
                                                <button type="submit" value="Submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </fieldset>-->
            </div>
        </form>
        <!--        </div>-->
    </div>
</section>

</div><!-- end main -->
<?php $this->load->view('footer_view'); ?>
<?php $this->load->view('html_end_view'); ?>
<script>
    $('.editor').summernote({
        toolbar: [
            ['style', ['style', 'bold', 'italic', 'underline', 'clear', ]],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontname', ['fontname']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['insert', ['picture', 'link', 'video', 'table']],
            ['inse', [, 'hr']],
            ['Misc', ['fullscreen', 'undo', 'redo', 'help', 'print']]
        ], height: 280,
    });
</script>