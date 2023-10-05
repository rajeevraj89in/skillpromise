<?php
$this->load->view('header_view');
//$this->load->view('user_left_view');
//echo "<pre>";
//print_r($add_more_type_details);
//die;
echo '<div class="container main_container">
<div class="main_body">
	<div class="row" id="bigCallout">';
$nav_type ='program';
$id = '2049';
$return = $this->custom->get_nav_node_crumb($id, $nav_type);


//            1.check for last id .
$child_node_id = $this->main_model->get_name_from_id('node', 'id', $id, $id_name = "parent_id");
//            echo '<pre>';
//                    print_r($return);
//                    die;
if (!$child_node_id) {
	$parent_id = $this->main_model->get_name_from_id('node', 'parent_id', $id, $id_name = "id");


	$this->custom->get_side_navigation_panel_new($parent_id, $nav_type);
} else {
	$this->custom->get_side_navigation_panel_new($id, $nav_type);
}
?>
</aside>
<style>
	#formID .form-group{
		vertical-align: middle;
    	justify-content: center;
    	align-items: center;
    	display: flex;
	}
	.form-horizontal .control-label {
		padding-top: 7px;
		margin-bottom: 0;
		text-align: left;
	}
</style>
<!--content panel start -->
<section class="col-md-9">
    <h1 class="header_text"><?php
        $name = $this->main_model->get_name_from_id('sheets', 'name', $sheet_id, 'id');
        echo "$name";
        ?>
    </h1>
    <div class="row">
	   <div class="col-md-12">
			<?php echo $instruction; ?>
	   </div>
       <div class="col-md-9">
				   <form id="formID" class="form-horizontal" role="form" action="<?php echo base_url() . 'cover_letter_save'; ?>" method="POST">
					 <input type="hidden" name="template_instruction_id" value="<?php echo $template_instruction_id; ?>">
					 <input type="hidden" name="sheet_id" value="<?php echo $sheet_id; ?>">
					 <input type="hidden" name="sheet_section_id" value="<?php echo $sheet_section_id; ?>">
					 <input type="hidden" name="id" value="<?php echo (isset($cover_letter[0]['id']) ? $cover_letter[0]['id'] : "") ?>">
					  <div class="form-group">
					    <label for="from" class="col-sm-2 control-label">From</label>
					    <div class="col-sm-10">
					      <input type="text" value="<?php echo (isset($cover_letter[0]['sent_from']) ? $cover_letter[0]['sent_from'] : ""); ?>" name="send_from" class="form-control" id="from" placeholder="">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="To" class="col-sm-2 control-label">To</label>
					    <div class="col-sm-10">
					      <input type="text" value="<?php echo (isset($cover_letter[0]['sent_to']) ? $cover_letter[0]['sent_to'] : ""); ?>" name="send_to" class="form-control" id="To" placeholder="">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="subject" class="col-sm-2 control-label">Subject</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="subject" value="<?php echo (isset($cover_letter[0]['subject']) ? $cover_letter[0]['subject'] : ""); ?>" name="subject" placeholder="Source/ Job Title/ Job Code/ Referred by/ Your Name/ Certification">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="salut" class="col-sm-2 control-label">Salutation</label>
					    <div class="col-sm-10">
					      <input type="text" value="<?php echo (isset($cover_letter[0]['salutation']) ? $cover_letter[0]['salutation'] : ""); ?>" name="salutation" class="form-control" id="salut" placeholder="Dear Mr. Last Name, Dear Recruiter, Dear Hiring Manager, Dear First Name">
					    </div>
					  </div>
					  <div class="form-group">
						<label for=" " class="col-sm-2 control-label">Body</label>
						<div class="col-sm-10"></div>
					  </div>

					  <div class="form-group">
					    <label for="pg1" class="col-sm-2 control-label">Paragraph 1</label>
					    <div class="col-sm-10">
							<textarea class="form-control" name="paragraph1" id="pg1" rows="4" cols="50" placeholder="Source from where you got to know about the job / Job title / Job code / Your general qualifications for the job"><?php echo (isset($cover_letter[0]['paragraph1']) ? $cover_letter[0]['paragraph1'] : ""); ?></textarea>
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="pg1" class="col-sm-2 control-label">Paragraph 2</label>
					    <div class="col-sm-10">
						<textarea class="form-control" name="paragraph2" id="pg2" rows="4" cols="50" placeholder="Qualification / Internship / Experience / Relevent Co-curricular participations / certifications"><?php echo (isset($cover_letter[0]['paragraph2']) ? $cover_letter[0]['paragraph2'] : ""); ?></textarea>
						</div>
                       </div>
					<div class="form-group">
					    <label for="pg1" class="col-sm-2 control-label">Paragraph 3</label>
					    <div class="col-sm-10">
						<textarea class="form-control" name="paragraph3" id="pg3" rows="4" cols="50" placeholder="Match Qualification / Internship/ work experience with job requirments. Talk about your openness for relocation and immediate/ early availability for joining"><?php echo (isset($cover_letter[0]['paragraph3']) ? $cover_letter[0]['paragraph3'] : ""); ?></textarea>
						</div>
					</div>
					
					<div class="form-group">
					    <label for="pg1" class="col-sm-2 control-label">Closing</label>
					    <div class="col-sm-10">
						  <textarea class="form-control" name="closing" id="closing" rows="4" cols="50" placeholder="Conclude with an expression of willingness to appear for an interview, provide more information and a thank you note for the reader for his/her time and Consideration. End with Best Regards." ><?php echo (isset($cover_letter[0]['closing']) ? $cover_letter[0]['closing'] : ""); ?></textarea>
						</div>
					</div>
					<div class="form-group">
					    <label for="pg1" class="col-sm-2 control-label">Signature</label>
					    <div class="col-sm-10">
					        <input type='text' placeholder="Regards/ Best Regards" class='form-control' name='signature' id='signature' value="<?php echo (isset($cover_letter[0]['signature']) ? $cover_letter[0]['signature'] : ""); ?>"><br>
					        <input type='text' placeholder="First Name Middle Name Last Name" class='form-control' name='signature2' id='signature2' value="<?php echo (isset($cover_letter[0]['signature2']) ? $cover_letter[0]['signature2'] : ""); ?>"><br>
					         <input type='text' placeholder="Email Address:" class='form-control' name='signature3' id='signature3' value="<?php echo (isset($cover_letter[0]['signature3']) ? $cover_letter[0]['signature3'] : ""); ?>"><br>
					          <input type='text' placeholder="Mobile Number:" class='form-control' name='signature4' id='signature4' value="<?php echo (isset($cover_letter[0]['signature4']) ? $cover_letter[0]['signature4'] : ""); ?>"><br>
						  <!--<textarea class="form-control" name="signature" id="signature" rows="4" cols="50" placeholder="First Name Last Name, Full Address with Pincode, Landline, Handheld and  Personal Email Address" ><?php //echo (isset($cover_letter[0]['signature']) ? $cover_letter[0]['signature'] : ""); ?></textarea>-->
						</div>
					</div>
					  <!-- <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					      <button type="submit" class="btn btn-default">Submit</button>
					    </div>
					  </div> -->
					  <div class="row">
					  <center>
                        <button type="submit" class="btn btn-success save_draft">Save as Draft</button>&nbsp;
                        <button type="button" class="btn btn-success print_PDF">Save as PDF</button>&nbsp;
                        <!--<button type="submit" name="is_submit" class="btn btn-success" value="1">Submit</button>-->
					  </center>
                    </div>
				</form>
       </div>
    </div>
</section><!-- end col-md-9 -->
<!--end content panel start -->
</div><!-- end bigCallout-->
<!-- End Content and Sidebar
===================================================== -->
</div><!-- end main -->
<?php $this->load->view('footer_view'); ?>


<?php $this->load->view('html_end_view'); ?>
<script>
	$(document.body).on("click", ".save_draft", function () {
        var form = new FormData($('#formID')[0]);
        console.log(form);
        $.ajax({
            url: "<?php echo base_url(); ?>cover_letter_save",
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
                console.log(data);
                //location.reload();
                // window.location.replace(data);


            },
            error: function () {
                alert('Failed...');
            }
        });
    });
    
    $(document.body).on("click", ".print_PDF", function () {
        var form = new FormData($('#formID')[0]);
        //console.log(form);
        $.ajax({
            url: "<?php echo base_url(); ?>cover_letter_save_ajax",
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
                if(data ==1){
                    $.unblockUI();
//                  alert(data);
                    //console.log(data);
                    window.location="<?php echo base_url() ?>"+"cover_letter_save_PDF";
                    //location.reload();
                    // window.location.replace(data);
                }
            },
            error: function () {
                alert('Failed...');
                $.unblockUI();
            }
        });
    });
</script>

