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
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<!--cv content-->
<div class="container">
<!-- <div class="col-md-2">
</div> -->
<div class="row">
<div class="col-md-12">
    
        <div class="border-bottom">
            <h1 class="title-md">Curriculum Vitae Action Sheet</h1>
            <br>
            <img src="<?php echo base_url().'assets/images/cv_header_image.jpeg';?>" height="450px"></img>
        </div>
        <br>
        <!--<p>Please Save your information after every section by clicking on "Save as Draft". </p>-->
		    
			<?php $successMsg =  $this->session->flashdata('successMsg'); ?>
			<?php if(!empty($successMsg)){  ?>
			<div class="alert alert-success" role="alert"><?php echo $successMsg;  ?></div>
			<?php }  ?>
			
			<?php $errorMsg =  $this->session->flashdata('errorMsg'); ?>
			<?php if(!empty($errorMsg)){  ?>
			<div class="alert alert-danger" role="alert"><?php echo $errorMsg;  ?></div>
			<?php }  ?>
        
            <form id="formID" enctype="multipart/form-data" class="cv-form" role="form" action="<?php //echo base_url() . 'set_cv_data'; ?>" method="POST">
                <?php
                if ((isset($id)))
                    echo '<input type="hidden" name="id" value="' . $id . '"  >';
                ?>
				<div class="border-bottom">
                <h5 class="title-sm">Basic Information</h5>
				</div>
				<p style="text-align: justify;">Instructions: The basic information section of a CV serves as the starting point for introducing yourself to potential employers. It should include your full name, as this helps create a personal connection right from the beginning. Alongside your name, you need to provide your contact information, such as your phone number and email address. Another valuable addition to the basic information section is your LinkedIn address or URL. Last component in basic information is your date of birth</p>
                <div class="row">
                    <!--set -->
					<div class="col-md-12">
                    <div class="form-group <?php if( !empty(form_error('name') ) ){  echo 'has-error'; } ?>">
                        <label for="" class="<?php if( !empty(form_error('name') ) ){  echo 'text-danger'; } ?>" >Name<span class="required">*</span></label>
                        <input type="text" class="form-control" id="" name="name" placeholder="First Name Last Name. For Example: Vikas Mehra" value="<?php echo set_value('name', $name); ?>">
						<?php echo form_error('name'); ?>
                    </div>
					</div>
					<div class="col-md-12">
                    <div class="form-group  <?php if( !empty(form_error('mobile') ) ){  echo 'has-error'; } ?>">
                        <label for="" class="<?php if( !empty(form_error('mobile') ) ){  echo 'text-danger'; } ?>">Handheld/ Mobile Number<span class="required">*</span></label>
                        <input type="text" class="form-control" id="" name="mobile" placeholder="Contact Number" value="<?php echo set_value('mobile', $mobile); ?>">
						<?php echo form_error('mobile'); ?>
                    </div>
					</div>
                    <!--set end-->
                    <!--set -->
					<div class="col-md-12">
                    <div class="form-group  <?php if( !empty(form_error('email') ) ){  echo 'has-error'; } ?>">
                        <label for="" class="<?php if( !empty(form_error('email') ) ){  echo 'text-danger'; } ?>">Email Address<span class="required">*</span></label>
                        <input type="email" class="form-control" name="email" id="" placeholder="Email" value="<?php echo set_value('email', $email); ?>">
						<?php echo form_error('email'); ?>
                    </div>
					</div>
					<div class="col-md-12">
                    <div class="form-group   <?php if( !empty(form_error('linkedin') ) ){  echo 'has-error'; } ?>">
                        <label for="" class="<?php if( !empty(form_error('linkedin') ) ){  echo 'text-danger'; } ?>" >LinkedIn Profile URL</label>
                                <input type="text" class="form-control" name="linkedin" value="<?php echo set_value('linkedin', $linkedin); ?>" id="" placeholder="Example: http://linkedin.com/in/vikas-mehra-226b6820/">
								<?php echo form_error('linkedin'); ?>
                    </div>
					</div>
					<div class="col-md-12">
                    <div class="form-group  <?php if( !empty(form_error('dob') ) ){  echo 'has-error'; } ?>">
                        <label for="datepicker"  class="<?php if( !empty(form_error('dob') ) ){  echo 'text-danger'; } ?>" >Date of Birth</label>
						<input type="text" class="form-control" name="dob" value="<?php echo set_value('dob', $dob); ?>" id="datepicker" placeholder="DD–MM-YYYY. Example: 1971-10-16">
						<?php echo form_error('dob'); ?>
                    </div>
					</div>
					<!--<div class="col-md-12">
                    <div class="form-group">
                        <label for="">Upload Your Photograph</label>
						<input type="file" name="photo" id="upload-photo" />
						<?php //if(!empty($photo_error)){ echo '<div class="text-danger" style="font-weight: bold;font-size: 16px;">'; echo strip_tags(print_r($photo_error, true)); echo '</div>';  }  ?>
						<?php //if(!empty($photo_path)){ ?>
						<img src="<?php echo $photo_path; ?>" alt="" width="250px"/>
						<br/><button type="submit" name="submitbtn" value="3" title="Remove" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
						<?php //}  ?>
                    </div>
					</div>-->
					
					<div class="col-md-12">
                    <div class="form-group">
                        <label for="">Upload College Logo (Optional)</label>
						<input type="file" name="college_logo" id="college-logo" />
						<?php if(!empty($college_logo_error)){ echo '<div class="text-danger"  style="font-weight: bold;font-size: 16px;">';  echo strip_tags(print_r($college_logo_error, true)); echo '</div>';  }  ?>
						<?php if(!empty($college_logo)){ ?>
						<img src="<?php echo $college_logo; ?>" alt="" width="250px" />
						<br/><button type="submit" name="submitbtn" value="4" title="Remove" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
						<?php }  ?>
                    </div>
					</div>
                    <!--set end-->
					<?php  if($is_submit!="1"){ ?>
                    <div class="col-md-12">
                        <button type="submit" name="submitbtn" value="2" class="btn btn-success">Save as Draft</button>
                    </div>
                    <?php  }  ?>
                </div>
                <br><br>

				<div class="border-bottom">
                <h5 class="title-sm">Professional Snapshot/ Career Objective</h5>
				</div>
                <p style="text-align: justify;">Instructions: For candidates with work experience, a professional snapshot is a concise summary that provides an overview of their professional background. It typically includes key information such as their years of experience, areas of expertise, notable achievements, and skills relevant to the desired position. This section is important because it allows recruiters and hiring managers to quickly grasp the candidate's qualifications and determine if they align with the job requirements. It serves as a snapshot of the candidate's career highlights and provides an immediate impression of their suitability for the role. Please go through the components of CV section to see some examples</p>
                <p style="text-align: justify;">Career Objective: For freshers or individuals who are just starting their careers, a career objective is a statement that outlines their professional goals and aspirations. It highlights the type of position they are seeking and expresses their enthusiasm and eagerness to contribute to a particular industry or organization. A well-crafted career objective demonstrates the candidate's motivation, passion, and alignment with the job they are applying for. While freshers may not have extensive work experience to showcase, a compelling career objective can capture the attention of recruiters and emphasize their potential and willingness to learn and grow in their chosen field. Please go through the components of CV section to see some examples</p>
                <div class="row">
                    <!--set -->
                    <div class="col-md-12">
                        <div class="btn-radio">
						    <?php $candidate_type_checked = set_value('candidate_type', $candidate_type);  ?>
                            <input type="radio" onclick="show(this.value)" class="obj" name="candidate_type" id="optionsRadios1" value="Experienced" <?php echo (( $candidate_type_checked == 'Experienced') ? "checked" : "") ?> />
							<label for="optionsRadios1">Professional Snapshot (For people with work experience)</label>
						</div>
                        <div class="btn-radio">
							<input type="radio" onclick="show(this.value)" class="obj" name="candidate_type" id="optionsRadios2" value="Fresher"  <?php echo (( $candidate_type_checked == 'Fresher') ? "checked" : "") ?> >
                            <label for="optionsRadios2"> Career Objective (For Fresher’s)</label>
                        </div>
                        <br>
						<?php echo form_error('candidate_type'); ?>
                    </div>
                    <!--set end-->
					

                    <!-- Show hide div-->
                    <div class="col-md-12" id="obj_type" <?php echo ($candidate_type_checked == 'Experienced') ? '' : ' style="display:none;" ' ?>>
                        <div class="row">
                            <div class="col-md-12">
							<?php $candidate_data_type_checked = set_value('candidate_data_type', $candidate_data_type);  ?>
							<p style="font-size:18px; color:#000;">If Professional Snapshot is Selected:</p>
                                <div class="btn-radio">
									<input type="radio" class="obj_type" name="candidate_data_type" id="optionsRadios4" value="paragraph" <?php echo ($candidate_data_type_checked == 'paragraph') ? "checked" : "" ?>>
                                    <label for="optionsRadios4">Paragraph Form</label>
                                </div>
                                <div class="btn-radio">
									<input type="radio" class="obj_type" name="candidate_data_type" id="optionsRadios3" value="bullet" <?php echo ($candidate_data_type_checked == 'bullet' ) ? "checked" : "" ?>>
                                    <label for="optionsRadios3">Bullet Points</label>
                                </div>
								<?php echo form_error('candidate_data_type'); ?>
                            </div>
                            <div class="col-md-12">
								<ul class="bullet-points">
									<li>Your Professional Title along with number of years of work experience. Talk about relevant certifications, if any</li>
                                    <li>Two or Three Achievements with numbers and details</li>
                                    <li>Customized as per the Job Description</li>
                                    <li>Add measurements to your achievements</li>
                                    <li>Mention the name of the company you are applying for</li>
                                </ul>
                                
                            </div>
                            
                        </div>
						
                    </div>
                    <!-- Show hide div end-->
                   
                    <div class="col-md-12" id="paragraph" <?php echo ( $candidate_data_type_checked == 'paragraph' ) ? '' : 'style="display:none;"' ?>>
                        <div class="row">
                            <div class="form-group col-md-12 <?php if( !empty(form_error('paragraph_data') ) ){  echo 'has-error'; } ?>">
                                <textarea  class="form-control" name="paragraph_data" placeholder=""><?php echo set_value('paragraph_data', $paragraph_data); ?></textarea>
								<?php echo form_error('paragraph_data'); ?>
                            </div>


                        </div>
                    </div>
                    <div class="col-md-12" id="bullet" <?php echo ( $candidate_data_type_checked == 'bullet' ) ? '' : 'style="display:none;"' ?>>
                        <div class="row">

                            <?php
                           
                            if (!empty($obj_points)) {
								 $c = 0;
                                foreach ($obj_points as $v) { ?>
                                    <div class="form-group col-md-12  <?php if( !empty(form_error('obj_points['.$c.']') ) ){  echo 'has-error'; } ?>" >
									    <div class="amc">
                                             <input type="text" name="obj_points[]" class="form-control" id="" placeholder="" value="<?php echo set_value('obj_points['.$c.']', $v); ?>">
										     <?php echo form_error('obj_points['.$c.']'); ?>
										</div>
                                    </div>
                              <?php $c++;  }  }else  { ?>
                                <div class="form-group col-md-12   <?php if( !empty(form_error('obj_points[0]') ) ){  echo 'has-error'; } ?>">
								   <div class="amc">
                                   <input type="text" name="obj_points[]" class="form-control" id="" placeholder="" value="<?php echo set_value('obj_points[0]'); ?>" >
								   <?php echo form_error('obj_points[0]'); ?>
								   </div>
                                </div>
                        <?php } ?>


                            <div class=" col-md-12">
                                <span class="help-block"><a href="javascript:void(0)" class="addMore1" data-name="obj_points[]" data-src="obj_points">Add More...</a></span>
                            </div>



                        </div>
                    </div>
                    
                    <?php  if($is_submit!="1"){ ?>
                    <div class="col-md-12">
					    <br/>
                        <button type="submit" name="submitbtn" value="2" class="btn btn-success">Save as Draft</button>
                    </div>
                    <?php  }  ?>

                </div>
                <br><br>



                <div class="row">
                    

                    <!-- Show hide div-->
                    <div class="col-md-12"  >
                        <div class="border-bottom">
							<h5 class="title-sm">Work Experience</h5>
						</div>
						<p style="text-align: justify;">Instructions: In the work experience section of a CV, it is important to provide a detailed account of your previous employment history. Begin with your most recent position, listing the job title, company name, location, and dates of employment. Briefly describe the organization and its industry to provide context. Next, outline your accountabilities and accomplishments in each role, highlighting key projects, initiatives, and notable achievements. Quantify your contributions whenever possible to demonstrate the impact you made. It is crucial to provide accurate information in this section, not only to maintain integrity but also from a reference check perspective. Prospective employers often verify the accuracy of your work experience, reaching out to previous employers for verification and insights. Please mention accomplishments related to work experience in the accomplishments section</p>
						<!--<p>Please mention your work experience in Reverse Chronological Order</p>-->
						
						<?php  //print_r($work_exp);
                        if (!empty($work_exp)) {
                            $c = 0;
                            foreach ($work_exp as $v) {  ?>
							 <div class="row well" style="<?php if($c>0) echo ' margin-top:15px; '; ?>" id="work_exp_div_<?php echo $c; ?>">
								<!--set -->
								<?php if($c >0 ){ ?>
								    <a class="pull-right btn btn-sm btn-danger remove2"><i class="fa fa-remove"></i></a>
								<?php }  ?>
								<!--set -->
								<div class="form-group col-md-12 <?php if( !empty(form_error('work_exp['.$c.'][org]') ) ){  echo 'has-error'; } ?>">
									<label for="" class="<?php if( !empty(form_error('work_exp['.$c.'][org]') ) ){  echo 'text-danger'; } ?>" >Name of the Organization</label>
									<input type="text" class="form-control name" id="" placeholder="Name of the Organization. For Example: Dell Computers" name="work_exp[<?php echo $c; ?>][org]" value="<?php echo set_value('work_exp['.$c.'][org]', $v['org']); ?>" >
									<?php echo form_error('work_exp['.$c.'][org]'); ?>
								</div>
								<div class="form-group col-md-12 <?php if( !empty(form_error('work_exp['.$c.'][duration]') ) ){  echo 'has-error'; } ?>">
									<label for="" class="<?php if( !empty(form_error('work_exp['.$c.'][duration]') ) ){  echo 'text-danger'; } ?>" >Duration</label>
									<input type="text" class="form-control duration" id="" placeholder="From MM YYYY To MM YYYY" name="work_exp[<?php echo $c; ?>][duration]" value="<?php echo set_value('work_exp['.$c.'][duration]', $v['duration']); ?>" >
									<?php echo form_error('work_exp['.$c.'][duration]'); ?>
								</div>
								<!--set end-->
								<!--set -->
								<div class="form-group col-md-12 <?php if( !empty(form_error('work_exp['.$c.'][designation]') ) ){  echo 'has-error'; } ?>">
									<label for="" class="<?php if( !empty(form_error('work_exp['.$c.'][designation]') ) ){  echo 'text-danger'; } ?>" >Designation</label>
									<input type="text" class="form-control designation" id="" placeholder="Mention your Designation. For Example: Assistant Manager – Customer Care" name="work_exp[<?php echo $c; ?>][designation]"  value="<?php echo set_value('work_exp['.$c.'][designation]', $v['designation']); ?>" />
									<?php echo form_error('work_exp['.$c.'][designation]'); ?>
								</div>
								<!--set end-->
								
								<!--set -->
								<div class="form-group col-md-12 <?php if( !empty(form_error('work_exp['.$c.'][tenure]') ) ){  echo 'has-error'; } ?>">
									<label for="" class="<?php if( !empty(form_error('work_exp['.$c.'][tenure]') ) ){  echo 'text-danger'; } ?>" >Location</label>
									<input type="text" class="form-control designation" id="" placeholder="City, Country" name="work_exp[<?php echo $c; ?>][tenure]" value="<?php echo set_value('work_exp['.$c.'][tenure]', $v['tenure']); ?>">
									<?php echo form_error('work_exp['.$c.'][tenure]'); ?>
								</div>
								<!--set end-->
								
								<!--set -->
								<?php if( array_filter($v["res"]) ){
								  $k = 0;
								foreach($v["res"] as $res){	?>
								<div class="form-group col-md-12 <?php if( !empty(form_error('work_exp['.$c.'][res]['.$k.']') ) ){  echo 'has-error'; } ?>">
									<?php if($k == 0){ ?>
									     <label for="">Key Accountabilities (Suggested: Mention up to 5)</label>
									<?php } ?>
									<div class="amc">
										<input type="text" class="form-control" name="work_exp[<?php echo $c; ?>][res][]" id="" placeholder="" value="<?php echo set_value('work_exp['.$c.'][res]['.$k.']', $res); ?>" /> 
										<?php echo form_error('work_exp['.$c.'][res]['.$k.']'); ?> 
									</div>
								</div>
								<?php $k++; }  } else{  ?>
									<div class="form-group col-md-12 <?php if( !empty(form_error('work_exp['.$c.'][res][0]') ) ){  echo 'has-error'; } ?>">
										<label for="">Key Accountabilities (Suggested: Mention up to 5)</label>
										<div class="amc">
											<input type="text" class="form-control" name="work_exp[<?php echo $c; ?>][res][]" id="" placeholder="" value="<?php echo set_value('work_exp['.$c.'][res][0]'); ?>" >
											<?php echo form_error('work_exp['.$c.'][res][0]'); ?> 
										</div>
									</div>
								<?php }  ?>
								
								<div class=" col-md-12 addMore">
									<span class="help-block"><a href="javascript:void(0)" class="addMore1" data-src="resorg2">Add More...</a></span>
								</div>
								<!--set end-->
								
								<!--set -->
								<?php //if(isset($v["accomplsmnt"]) && array_filter($v["accomplsmnt"]) ){
								  //$k = 0;
								//foreach($v["accomplsmnt"] as $res){	?>
								<!--<div class="form-group col-md-12 <?php //if( !empty(form_error('work_exp['.$c.'][accomplsmnt]['.$k.']') ) ){  echo 'has-error'; } ?>">
									<?php if($k == 0){ ?>
									     <label for="">Accomplishments (Suggested: Mention up to 3)</label>
									<?php } ?>
									<div class="amc">
										<input type="text" class="form-control" name="work_exp[<?php echo $c; ?>][accomplsmnt][]" id="" placeholder="" value="<?php //echo set_value('work_exp['.$c.'][accomplsmnt]['.$k.']', $res); ?>" /> 
										<?php //echo form_error('work_exp['.$c.'][accomplsmnt]['.$k.']'); ?> 
									</div>
								</div>
								<?php //$k++; }  } else{  ?>
									<div class="form-group col-md-12 <?php //if( !empty(form_error('work_exp['.$c.'][accomplsmnt][0]') ) ){  //echo 'has-error'; } ?>">
										<label for="">Accomplishments (Suggested: Mention up to 3)</label>
										<div class="amc">
											<input type="text" class="form-control" name="work_exp[<?php //echo $c; ?>][accomplsmnt][]" id="" placeholder="" value="<?php //echo set_value('work_exp['.$c.'][accomplsmnt][0]'); ?>" >
											<?php //echo form_error('work_exp['.$c.'][accomplsmnt][0]'); ?> 
										</div>
									</div>
								<?php //}  ?>
								
								<div class=" col-md-12 addMore">
									<span class="help-block"><a href="javascript:void(0)" class="addMore1" data-src="resorg2">Add More...</a></span>
								</div>-->
								<!--set end-->
								
							</div>
						<?php $c++; }  }else{ ?>
						    <div class="row well" style="" id="work_exp_div_0">
								
								<div class="form-group col-md-12 <?php if( !empty(form_error('work_exp[0][org]') ) ){  echo 'has-error'; } ?>">
									<label for=""  class="<?php if( !empty(form_error('work_exp[0][org]') ) ){  echo 'text-danger'; } ?>" >Name of the Organization</label>
									<input type="text" class="form-control name" id="" placeholder="Name of the Organization. For Example: Dell Computers" name="work_exp[0][org]" value="<?php echo set_value('work_exp[0][org]'); ?>" >
									<?php echo form_error('work_exp[0][org]'); ?>
								</div>
								<div class="form-group col-md-12 <?php if( !empty(form_error('work_exp[0][duration]') ) ){  echo 'has-error'; } ?>">
									<label for=""   class="<?php if( !empty(form_error('work_exp[0][duration]') ) ){  echo 'text-danger'; } ?>"  >Duration</label>
									<input type="text" class="form-control duration" id="" placeholder="From MM YYYY To MM YYYY" name="work_exp[0][duration]" value="<?php echo set_value('work_exp[0][duration]'); ?>" >
									<?php echo form_error('work_exp[0][duration]'); ?>
								</div>
								<!--set end-->
								<!--set -->
								<div class="form-group col-md-12 <?php if( !empty(form_error('work_exp[0][designation]') ) ){  echo 'has-error'; } ?>">
									<label for=""  class="<?php if( !empty(form_error('work_exp[0][designation]') ) ){  echo 'text-danger'; } ?>" >Designation</label>
									<input type="text" class="form-control designation" id="" placeholder="Mention your Designation. For Example: Assistant Manager – Customer Care" name="work_exp[0][designation]" value="<?php echo set_value('work_exp[0][designation]'); ?>" />
									<?php echo form_error('work_exp[0][designation]'); ?>
								</div>
								<!--set end-->
								<!--set -->
								<div class="form-group col-md-12 <?php if( !empty(form_error('work_exp[0][tenure]') ) ){  echo 'has-error'; } ?>">
									<label for=""  class="<?php if( !empty(form_error('work_exp[0][tenure]') ) ){  echo 'text-danger'; } ?>" >Location</label>
									<input type="text" class="form-control loc" id="" placeholder="City, Country" name="work_exp[0][tenure]" value="<?php echo set_value('work_exp[0][tenure]'); ?>">
									<?php echo form_error('work_exp[0][tenure]'); ?>
								</div>
								<!--set end-->
								<!--set -->
								<div class="form-group col-md-12 <?php if( !empty(form_error('work_exp[0][res][0]') ) ){  echo 'has-error'; } ?>">
									<label for="">Key Accountabilities (Suggested: Mention up to 5)</label>
									<div class="amc">
									    <input type="text" class="form-control firstres" id="" placeholder="" name="work_exp[0][res][]">
										<?php echo form_error('work_exp[0][res][0]'); ?>
									</div>
									<!--<span class="help-block"><a href="#!">Add More...</a></span>-->
								</div>
								
								<div class=" col-md-12 addMore">
									<span class="help-block"><a href="javascript:void(0)" class="addMore1" data-src="resorg2">Add More...</a></span>
								</div>
								<!--set end-->
								
								<!--set -->
								<!--<div class="form-group col-md-12 <?php //if( !empty(form_error('work_exp[0][accomplsmnt][0]') ) ){  echo 'has-error'; } ?>">
									<label for="">Accomplishments (Suggested: Mention up to 3)</label>
									<div class="amc">
									    <input type="text" class="form-control firstres" id="" placeholder="" name="work_exp[0][accomplsmnt][]">
										<?php //echo form_error('work_exp[0][accomplsmnt][0]'); ?>
									</div>-->
									<!--<span class="help-block"><a href="#!">Add More...</a></span>-->
								<!--</div>-->
								
								<!--<div class=" col-md-12 addMore">-->
								<!--	<span class="help-block"><a href="javascript:void(0)" class="addMore1" data-src="resorg2">Add More...</a></span>-->
								<!--</div>-->
								<!--set end-->
								
							</div>
						<?php }  ?>
						 </div>
                            <div class=" col-md-12">
                                <span class="help-block"><a href="javascript:void(0)" class="addMore2" data-src="org_div">Add More Organisation</a></span>
                            </div>
							
                            <?php  if($is_submit!="1"){ ?>
							<div class="col-md-12">
							    <br/><br/>
								<button type="submit" name="submitbtn" value="2" class="btn btn-success">Save as Draft</button>
								<br/><br/>
							</div>
							<?php  }  ?>
                        
                        <hr>
                   

                    <!-- Show hide div end-->


                    <!-- Show hide div-->
                    <div class="col-md-12" id="int_exp" >
                        <div class="border-bottom">
							<h5 class="title-sm">Internships</h5>
						</div>
						
                        <p style="text-align: justify;">Instructions: In the internship section of a CV, it is important to present your internships in reverse chronological order, starting with the most recent. Begin by mentioning the title of each internship, the organization, and the department you worked in. Provide a concise overview of the industry the company operates in, highlighting any notable industry trends. Next, provide details of the specific department you interned in, explaining its role within the organization and the nature of its work. Describe your accountabilities and tasks during each internship, highlighting any significant projects or initiatives you were involved in. Explain the methodologies or approaches you utilized to accomplish your tasks, showcasing your problem-solving and analytical skills. Clearly outline your accountabilities, demonstrating your ability to take ownership of projects and contribute to team objectives. Highlight the valuable learnings you gained from each internship, such as technical skills, industry knowledge, and teamwork abilities. If you received a pre-placement offer (PPO) or a recommendation on LinkedIn from your internship supervisor, mention these achievements to showcase your exceptional performance and professional recognition. Please mention accomplishments related to internship in the accomplishments section</p>
                        <?php
                            if (!empty($internship) ) {
                                $c = 0;
                                foreach($internship as $intern){							  
                          ?>
						 
						 <div class="row well" style="<?php if($c>0) echo ' margin-top: 15px; '; ?>" >
                                    <!--set -->
									<?php if($c>0){ ?>
                                        <a class="pull-right btn btn-sm btn-danger remove2"><i class="fa fa-remove"></i></a>
									<?php } ?>
                                    <div class="form-group col-md-12 <?php if( !empty(form_error('internship['.$c.'][org]') ) ){  echo 'has-error'; } ?> ">
                                        <label for="" class="<?php if( !empty(form_error('internship['.$c.'][org]') ) ){  echo 'text-danger'; } ?>"  >Name of the Organization</label>
                                        <input type="text" class="form-control" name="internship[<?php echo $c; ?>][org]" value="<?php echo set_value('internship['.$c.'][org]', $intern['org']); ?>" id="" placeholder="Name of the Organization. For Example: Dell Computers">
										<?php echo form_error('internship['.$c.'][org]'); ?>
                                    </div>
                                    <div class="form-group col-md-12 <?php if( !empty(form_error('internship['.$c.'][duration]') ) ){  echo 'has-error'; } ?> ">
                                        <label for=""  class="<?php if( !empty(form_error('internship['.$c.'][duration]') ) ){  echo 'text-danger'; } ?>" >Duration</label>
                                        <input type="text" class="form-control" id="" name="internship[<?php echo $c; ?>][duration]" value="<?php echo set_value('internship['.$c.'][duration]', $intern['duration']); ?>" placeholder="From MM YYYY to MM YYYY">
										<?php echo form_error('internship['.$c.'][duration]'); ?>
                                    </div>
                                    <!--set end-->
                                    <!--set -->
                                    <div class="form-group col-md-12 <?php if( !empty(form_error('internship['.$c.'][designation]') ) ){  echo 'has-error'; } ?> ">
                                        <label for=""  class="<?php if( !empty(form_error('internship['.$c.'][designation]') ) ){  echo 'text-danger'; } ?>" >Designation</label>
                                        <input type="text" class="form-control" id="" name="internship[<?php echo $c; ?>][designation]" value="<?php echo set_value('internship['.$c.'][designation]', $intern['designation']); ?>" placeholder="Mention your Designation. For Example: Management Trainee">
										<?php echo form_error('internship['.$c.'][designation]'); ?>
                                    </div>
                                    <!--set end-->
									<div class="form-group col-md-12 <?php if( !empty(form_error('internship['.$c.'][tenure]') ) ){  echo 'has-error'; } ?>">
											<label for=""  class="<?php if( !empty(form_error('internship['.$c.'][tenure]') ) ){  echo 'text-danger'; } ?>" >Location</label>
											<input type="text" class="form-control designation" id="" placeholder="City, Country" name="internship[<?php echo $c; ?>][tenure]" value="<?php echo set_value('internship['.$c.'][tenure]', $intern['tenure']); ?>">
											<?php echo form_error('internship['.$c.'][tenure]'); ?> 
										</div>
                                   
                                    <div class="form-group col-md-12 <?php if( !empty(form_error('internship['.$c.'][project]') ) ){  echo 'has-error'; } ?>">
                                        <label for=""  class="<?php if( !empty(form_error('internship['.$c.'][project]') ) ){  echo 'text-danger'; } ?>" >Project Title</label>
                                        <input type="text" class="form-control" name="internship[<?php echo $c; ?>][project]" value="<?php echo set_value('internship['.$c.'][project]', $intern['project']); ?>" id="" placeholder="To Enhance Customer Engagement and Retention through Data Analysis and CRM Optimization at ABC Company">
										<?php echo form_error('internship['.$c.'][project]'); ?> 
                                    </div>
                                    
                                    <!-- <div class="form-group col-md-12 <?php //if( !empty(form_error('internship['.$c.'][brief_method]') ) ){  echo 'has-error'; } ?>">
                                        <label for=""  class="<?php //if( !empty(form_error('internship['.$c.'][brief_method]') ) ){  echo 'text-danger'; } ?>" >Brief Methodology</label>
                                       <textarea class="form-control" name="internship[<?php echo $c; ?>][brief_method]" rows="20" id="" placeholder="The methodology employed in the project &quot;To Enhance Customer Engagement and Retention through Data Analysis and CRM Optimization at ABC Company&quot; involved a multi-step approach. Initially, an extensive analysis of customer data was conducted, encompassing demographic details, purchase history, and engagement patterns. Various data analysis techniques such as segmentation and predictive modeling were utilized to gain valuable insights into customer behavior and preferences.

Following the data analysis, a comprehensive evaluation of the existing Customer Relationship Management (CRM) system was carried out. This evaluation aimed to identify areas for improvement and gaps in functionality, data integrity, and integration with other marketing tools. Based on the findings, recommendations were provided to enhance the CRM system and align it with the company's objectives of improving customer engagement and retention.

Subsequently, a strategic plan was developed, encompassing personalized marketing campaigns targeted at specific customer segments, the utilization of automation tools for efficient communication, and the optimization of customer touchpoints across different channels. Key performance indicators (KPIs) were defined to measure the success of the project, including customer satisfaction scores, repeat purchase rates, and customer lifetime value.

Throughout the project, close collaboration was maintained with cross-functional teams, including marketing, IT, and sales, to ensure smooth implementation. Regular monitoring and analysis of campaign performance allowed for ongoing optimization and adjustments to maximize customer engagement and retention.

By following this methodology, the project aimed to enhance the company's understanding of its customer base, optimize CRM processes, and ultimately strengthen customer engagement and retention efforts for sustainable business growth.
"><?php //echo set_value('internship['.$c.'][brief_method]', $intern['brief_method']); ?></textarea>
										<?php //echo form_error('internship['.$c.'][brief_method]'); ?> 
<!--                                    </div>-->
                                    <!--set -->
									<?php if( array_filter($intern["res"]) ){
                                      $k = 0;
									foreach($intern["res"] as $res){	?>
                                    <div class="form-group col-md-12 <?php if( !empty(form_error('internship['.$c.'][res]['.$k.']') ) ){  echo 'has-error'; } ?>">
									    <?php if($k == 0){ ?>
                                        <label for="">Key Responsibilities (Suggested: Mention up to 5)</label>
										<?php } ?>
										<div class="amc">
                                            <input type="text" class="form-control" name="internship[<?php echo $c; ?>][res][]" id="" placeholder="" value="<?php echo set_value('internship['.$c.'][res]['.$k.']', $res); ?>" >
											<?php echo form_error('internship['.$c.'][res]['.$k.']'); ?> 
                                        </div>
                                    </div>
									<?php $k++; }  } else{  ?>
									    <div class="form-group col-md-12 <?php if( !empty(form_error('internship['.$c.'][res][0]') ) ){  echo 'has-error'; } ?>">
											<label for="">Key Responsibilities (Suggested: Mention up to 5)</label>
											<div class="amc">
												<input type="text" class="form-control" name="internship[<?php echo $c; ?>][res][]" id="" placeholder="" value="<?php echo set_value('internship['.$c.'][res][0]'); ?>" >
												<?php echo form_error('internship['.$c.'][res][0]'); ?> 
											</div>
										</div>
									<?php }  ?>
                                    
                                    <div class=" col-md-12">
                                        <span class="help-block"><a href="javascript:void(0)" class="addMore1" data-src="int_res">Add More Responsibilities</a></span>
                                    </div>
                                    <!--set end-->
                                    
                                    <!--set -->
									<?php 
									//if(isset($intern["accomplsmnt"]) && array_filter($intern["accomplsmnt"]) ){
                                    //$k = 0;
									//foreach($intern["accomplsmnt"] as $res){	?>
                                    <!--<div class="form-group col-md-12 <?php //if( !empty(form_error('internship['.$c.'][accomplsmnt]['.$k.']') ) ){  echo 'has-error'; } ?>">
									    <?php if($k == 0){ ?>
                                        <label for="">Accomplishments (Suggested: Mention up to 3)</label>
										<?php } ?>
										<div class="amc">
                                            <input type="text" class="form-control" name="internship[<?php //echo $c; ?>][accomplsmnt][]" id="" placeholder="" value="<?php //echo set_value('internship['.$c.'][accomplsmnt]['.$k.']', $res); ?>" >
											<?php //echo form_error('internship['.$c.'][accomplsmnt]['.$k.']'); ?> 
                                        </div>
                                    </div>-->
									<?php //$k++; }  } else{  ?>
									    <!--<div class="form-group col-md-12 <?php //if( !empty(form_error('internship['.$c.'][accomplsmnt][0]') ) ){  echo 'has-error'; } ?>">
											<label for="">Accomplishments (Suggested: Mention up to 3)</label>
											<div class="amc">
												<input type="text" class="form-control" name="internship[<?php //echo $c; ?>][accomplsmnt][]" id="" placeholder="" value="<?php //echo set_value('internship['.$c.'][accomplsmnt][0]'); ?>" >
												<?php //echo form_error('internship['.$c.'][accomplsmnt][0]'); ?> 
											</div>
										</div>-->
									<?php //}  ?>
                                    
                                    <!--<div class=" col-md-12">
                                        <span class="help-block"><a href="javascript:void(0)" class="addMore1" data-src="int_res">Add More Achievements</a></span>
                                    </div>-->
                                    <!--set end-->
                                    
                                </div>
								<?php } } else { ?>
							          <div class="row well">
										<div class="form-group col-md-12 <?php if( !empty(form_error('internship[0][org]') ) ){  echo 'has-error'; } ?> ">
											<label for="" class="<?php if( !empty(form_error('internship[0][org]') ) ){  echo 'text-danger'; } ?>"  >Name of the Organization</label>
											<input type="text" class="form-control" name="internship[0][org]" value="<?php echo set_value('internship[0][org]' ); ?>" id="" placeholder="Name of the Organization. For Example: Dell Computers">
											<?php echo form_error('internship[0][org]'); ?>
										</div>
										<div class="form-group col-md-12 <?php if( !empty(form_error('internship[0][duration]') ) ){  echo 'has-error'; } ?> ">
											<label for=""  class="<?php if( !empty(form_error('internship[0][duration]') ) ){  echo 'text-danger'; } ?>" >Duration</label>
											<input type="text" class="form-control" id="" name="internship[0][duration]" value="<?php echo set_value('internship[0][duration]'); ?>" placeholder="From MM YYYY to MM YYYY">
											<?php echo form_error('internship[0][duration]'); ?>
										</div>
										<!--set end-->
										<!--set -->
										<div class="form-group col-md-12 <?php if( !empty(form_error('internship[0][designation]') ) ){  echo 'has-error'; } ?> ">
											<label for=""  class="<?php if( !empty(form_error('internship[0][designation]') ) ){  echo 'text-danger'; } ?>" >Designation</label>
											<input type="text" class="form-control" id="" name="internship[0][designation]" value="<?php echo set_value('internship[0][designation]'); ?>" placeholder="Mention your Designation. For Example: Management Trainee">
											<?php echo form_error('internship[0][designation]'); ?>
										</div>
										<!--set end-->
										<div class="form-group col-md-12 <?php if( !empty(form_error('internship[0][tenure]') ) ){  echo 'has-error'; } ?>">
												<label for=""  class="<?php if( !empty(form_error('internship[0][tenure]') ) ){  echo 'text-danger'; } ?>" >Location</label>
												<input type="text" class="form-control designation" id="" placeholder="City, Country" name="internship[0][tenure]" value="<?php echo set_value('internship[0][tenure]'); ?>">
												<?php echo form_error('internship[0][tenure]'); ?> 
											</div>
									   
										<div class="form-group col-md-12 <?php if( !empty(form_error('internship[0][project]') ) ){  echo 'has-error'; } ?>">
											<label for=""  class="<?php if( !empty(form_error('internship[0][project]') ) ){  echo 'text-danger'; } ?>" >Project Title</label>
											<input type="text" class="form-control" name="internship[0][project]" value="<?php echo set_value('internship[0][project]'); ?>" id="" placeholder="To Enhance Customer Engagement and Retention through Data Analysis and CRM Optimization at ABC Company">
											<?php echo form_error('internship[0][project]'); ?> 
										</div>
										
										<!--<div class="form-group col-md-12 <?php //if( !empty(form_error('internship[0][brief_method]') ) ){  echo 'has-error'; } ?>">
											<label for=""  class="<?php //if( !empty(form_error('internship[0][brief_method]') ) ){  echo 'text-danger'; } ?>" >Brief Methodology</label>
											<textarea class="form-control" name="internship[0][brief_method]" id="" rows="20" placeholder="The methodology employed in the project &quot;To Enhance Customer Engagement and Retention through Data Analysis and CRM Optimization at ABC Company&quot; involved a multi-step approach. Initially, an extensive analysis of customer data was conducted, encompassing demographic details, purchase history, and engagement patterns. Various data analysis techniques such as segmentation and predictive modeling were utilized to gain valuable insights into customer behavior and preferences.

Following the data analysis, a comprehensive evaluation of the existing Customer Relationship Management (CRM) system was carried out. This evaluation aimed to identify areas for improvement and gaps in functionality, data integrity, and integration with other marketing tools. Based on the findings, recommendations were provided to enhance the CRM system and align it with the company's objectives of improving customer engagement and retention.

Subsequently, a strategic plan was developed, encompassing personalized marketing campaigns targeted at specific customer segments, the utilization of automation tools for efficient communication, and the optimization of customer touchpoints across different channels. Key performance indicators (KPIs) were defined to measure the success of the project, including customer satisfaction scores, repeat purchase rates, and customer lifetime value.

Throughout the project, close collaboration was maintained with cross-functional teams, including marketing, IT, and sales, to ensure smooth implementation. Regular monitoring and analysis of campaign performance allowed for ongoing optimization and adjustments to maximize customer engagement and retention.

By following this methodology, the project aimed to enhance the company's understanding of its customer base, optimize CRM processes, and ultimately strengthen customer engagement and retention efforts for sustainable business growth.
"><?php //echo set_value('internship[0][brief_method]'); ?></textarea>
											<?php //echo form_error('internship[0][project]'); ?> 
										</div>-->
										
										<!--set -->
										
											<div class="form-group col-md-12 <?php if( !empty(form_error('internship[0][res][0]') ) ){  echo 'has-error'; } ?>">
												
												<label for="">Key Responsibilities (Suggested: Mention up to 5)</label>
												<div class="amc">
													<input type="text" class="form-control" name="internship[0][res][]" id="" placeholder="" value="<?php echo set_value('internship[0][res][0]'); ?>" >
													<?php echo form_error('internship[0][res][0]'); ?> 
												</div>
											</div>
										
										<div class=" col-md-12">
											<span class="help-block"><a href="javascript:void(0)" class="addMore1" data-src="int_res">Add More Responsibilities</a></span>
										</div>
										<!--set end-->
										
										<!--set -->
										
											<!--<div class="form-group col-md-12 <?php //if( !empty(form_error('internship[0][accomplsmnt][0]') ) ){  echo 'has-error'; } ?>">
												
												<label for="">Accomplishments (Suggested: Mention up to 3)</label>
												<div class="amc">
													<input type="text" class="form-control" name="internship[0][accomplsmnt][]" id="" placeholder="" value="<?php //echo set_value('internship[0][accomplsmnt][0]'); ?>" >
													<?php //echo form_error('internship[0][accomplsmnt][0]'); ?> 
												</div>
											</div>
										
										<div class=" col-md-12">
											<span class="help-block"><a href="javascript:void(0)" class="addMore1" data-src="int_res">Add More Achievements</a></span>
										</div>-->
										<!--set end-->
									</div> 
							   <?php } ?>
                        
                        </div>
						<div class=" col-md-12">
							<span class="help-block"><a href="javascript:void(0)" class="addMore2" data-src="int_div">Add More Internship</a></span>
						</div>
						
						<?php  if($is_submit!="1"){ ?>
						<div class="col-md-12">
						    <br><br>
							<button type="submit" name="submitbtn" value="2" class="btn btn-success">Save as Draft</button>
							<br><br>
						</div>
						<?php  }  ?>
                    
                    <!-- Show hide div end-->
                   <div class="col-md-12">
					    <div class="border-bottom">
							<h5 class="title-sm">Live Projects</h5>
						</div>
						
                        <p>Please mention your Live Projects in Reverse Chronological Order</p>
						<?php if(!empty($projects)){
							     $c = 0;
                                 foreach($projects as $proj){
							?>
						          <div class="row well" style="<?php if($c>0) echo ' margin-top: 15px; '; ?>" >
								        <?php if($c > 0){ ?>
										     <a class="pull-right btn btn-sm btn-danger remove2"><i class="fa fa-remove"></i></a>
										<?php }  ?>
										<div class="form-group col-md-12 <?php if( !empty(form_error('projects['.$c.'][org]') ) ){  echo 'has-error'; } ?>">
											<label  class="<?php if( !empty(form_error('projects['.$c.'][org]') ) ){  echo 'text-danger'; } ?>" >Name of the Organization</label>
											<input type="text" class="form-control" name="projects[<?php echo $c; ?>][org]" id="" placeholder="Name of the Organization. For Example: Dell Computers" value="<?php echo set_value('projects['.$c.'][org]', $proj['org']); ?>">
											<?php echo form_error('projects['.$c.'][org]'); ?>
										</div>
										<div class="form-group col-md-12 <?php if( !empty(form_error('projects['.$c.'][duration]') ) ){  echo 'has-error'; } ?>">
											<label  class="<?php if( !empty(form_error('projects['.$c.'][duration]') ) ){  echo 'text-danger'; } ?>">Duration</label>
											<input type="text" class="form-control" name="projects[<?php echo $c; ?>][duration]" id="" placeholder="From mm/yy to mm/yy" value="<?php echo set_value('projects['.$c.'][duration]', $proj['duration']); ?>">
											<?php echo form_error('projects['.$c.'][duration]'); ?>
										</div>
										<div class="form-group col-md-12 <?php if( !empty(form_error('projects['.$c.'][designation]') ) ){  echo 'has-error'; } ?>">
											<label   class="<?php if( !empty(form_error('projects['.$c.'][designation]') ) ){  echo 'text-danger'; } ?>" >Designation</label>
											<input type="text" class="form-control" name="projects[<?php echo $c; ?>][designation]" id="" placeholder="Mention your Designation. For Example: Management Trainee" value="<?php echo set_value('projects['.$c.'][designation]', $proj['designation']); ?>">
											<?php echo form_error('projects['.$c.'][designation]'); ?>
										</div>
										<div class="form-group col-md-12 <?php if( !empty(form_error('projects['.$c.'][tenure]') ) ){  echo 'has-error'; } ?>">
											<label  class="<?php if( !empty(form_error('projects['.$c.'][tenure]') ) ){  echo 'text-danger'; } ?>" >Tenure in months</label>
											<input type="text" class="form-control" name="projects[<?php echo $c; ?>][tenure]" id="" placeholder="In months" value="<?php echo set_value('projects['.$c.'][tenure]', $proj['tenure']); ?>">
											<?php echo form_error('projects['.$c.'][tenure]'); ?>
										</div>
										<div class="form-group col-md-12 <?php if( !empty(form_error('projects['.$c.'][project]') ) ){  echo 'has-error'; } ?>">
											<label  class="<?php if( !empty(form_error('projects['.$c.'][project]') ) ){  echo 'text-danger'; } ?>" >Project Title</label>
											<input type="text" class="form-control" name="projects[<?php echo $c; ?>][project]" id="" placeholder="Start with To. For Example: To Study/ To Identify/ To Design/ To Sell/ To Improvise/ To find/ To Support/ To Understand/ To Create etc." value="<?php echo set_value('projects['.$c.'][project]', $proj['project']); ?>">
											<?php echo form_error('projects['.$c.'][project]'); ?>
										</div>
										<div class="form-group col-md-12 <?php if( !empty(form_error('projects['.$c.'][res]') ) ){  echo 'has-error'; } ?>">
											<label  class="<?php if( !empty(form_error('projects['.$c.'][res]') ) ){  echo 'text-danger'; } ?>" >Key Accountability</label>
											<input type="text" class="form-control" name="projects[<?php echo $c; ?>][res]" id="" placeholder="Start with To. For Example: To Study/ To Identify/ To Design/ To Sell/ To Improvise/ To find/ To Support/ To Understand/ To Create etc." value="<?php echo set_value('projects['.$c.'][res]', $proj['res']); ?>">
											<?php echo form_error('projects['.$c.'][res]'); ?>
										</div>
										</div>
								 <?php $c++;  } } else {  ?>
						<div class="row well">
										<div class="form-group col-md-12 <?php if( !empty(form_error('projects[0][org]') ) ){  echo 'has-error'; } ?>">
											<label  class="<?php if( !empty(form_error('projects[0][org]') ) ){  echo 'text-danger'; } ?>" >Name of the Organization</label>
											<input type="text" class="form-control" name="projects[0][org]" id="" placeholder="Name of the Organization. For Example: Dell Computers" value="<?php echo set_value('projects[0][org]'); ?>">
											<?php echo form_error('projects[0][org]'); ?>
										</div>
										<div class="form-group col-md-12 <?php if( !empty(form_error('projects[0][duration]') ) ){  echo 'has-error'; } ?>">
											<label  class="<?php if( !empty(form_error('projects[0][duration]') ) ){  echo 'text-danger'; } ?>">Duration</label>
											<input type="text" class="form-control" name="projects[0][duration]" id="" placeholder="From mm/yy to mm/yy" value="<?php echo set_value('projects[0][duration]'); ?>">
											<?php echo form_error('projects[0][duration]'); ?>
										</div>
										<div class="form-group col-md-12 <?php if( !empty(form_error('projects[0][designation]') ) ){  echo 'has-error'; } ?>">
											<label   class="<?php if( !empty(form_error('projects[0][designation]') ) ){  echo 'text-danger'; } ?>" >Designation</label>
											<input type="text" class="form-control" name="projects[0][designation]" id="" placeholder="Mention your Designation. For Example: Management Trainee" value="<?php echo set_value('projects[0][designation]'); ?>">
											<?php echo form_error('projects[0][designation]'); ?>
										</div>
										<div class="form-group col-md-12 <?php if( !empty(form_error('projects[0][tenure]') ) ){  echo 'has-error'; } ?>">
											<label  class="<?php if( !empty(form_error('projects[0][tenure]') ) ){  echo 'text-danger'; } ?>" >Tenure in months</label>
											<input type="text" class="form-control" name="projects[0][tenure]" id="" placeholder="In months" value="<?php echo set_value('projects[0][tenure]'); ?>">
											<?php echo form_error('projects[0][tenure]'); ?>
										</div>
										<div class="form-group col-md-12 <?php if( !empty(form_error('projects[0][project]') ) ){  echo 'has-error'; } ?>">
											<label  class="<?php if( !empty(form_error('projects[0][project]') ) ){  echo 'text-danger'; } ?>" >Project Title</label>
											<input type="text" class="form-control" name="projects[0][project]" id="" placeholder="Start with To. For Example: To Study/ To Identify/ To Design/ To Sell/ To Improvise/ To find/ To Support/ To Understand/ To Create etc." value="<?php echo set_value('projects[0][project]'); ?>">
											<?php echo form_error('projects[0][project]'); ?>
										</div>
										<div class="form-group col-md-12 <?php if( !empty(form_error('projects[0][res]') ) ){  echo 'has-error'; } ?>">
											<label  class="<?php if( !empty(form_error('projects[0][res]') ) ){  echo 'text-danger'; } ?>" >Key Accountability</label>
											<input type="text" class="form-control" name="projects[0][res]" id="" placeholder="Start with To. For Example: To Study/ To Identify/ To Design/ To Sell/ To Improvise/ To find/ To Support/ To Understand/ To Create etc." value="<?php echo set_value('projects[0][res]'); ?>">
											<?php echo form_error('projects[0][res]'); ?>
										</div>
										</div>
						<?php } ?>
						</div>
						
						
						<div class=" col-md-12">
							<span class="help-block"><a href="javascript:void(0)" class="addMore2" data-src="int_div">Add More Live Projects</a></span>
							<br>
							<?php  if($is_submit!="1"){ ?>
								<button type="submit" name="submitbtn" value="2" class="btn btn-success">Save as Draft</button>
								<br><br><br>
							<?php  }  ?>
                        </div>

                    <div class="col-md-12">
						<div class="border-bottom">
							<h5 class="title-sm">Education <span class="required">*</span></h5>
						</div>
                        
                        <p style="text-align: justify;">Instructions: In the education section of a CV, list your academic qualifications in reverse chronological order. Include the degree or diploma earned, institution name, location, board, and dates of attendance. Emphasize your field of study or major, aligning it with the desired position. If your marks or grades were particularly strong, you may mention them. It is important to present reliable and truthful information in this section, as potential employers may conduct reference checks to verify your educational background.</p>
                        <div class="row">
                            <!--set -->
                            <div class="form-group col-md-12 <?php if( !empty(form_error('edu[doc]') ) ){  echo 'has-error'; } ?>">
							    <?php $edu_doc = (isset($edu['doc']))?$edu['doc']:"";  ?>
                                <label for="" class="<?php if( !empty(form_error('edu[doc]') ) ){  echo 'text-danger'; } ?>"  >Doctorate</label>
                                <input type="text" class="form-control" name="edu[doc]" id="" placeholder="Course/ College/ University/ Year of Education/ Grade Point Average (GPA)/ % of" value="<?php echo set_value('edu[doc]', $edu_doc); ?>">
								<?php echo form_error('edu[doc]'); ?>
                            </div>
                            <div class="form-group col-md-12 <?php if( !empty(form_error('edu[pg]') ) ){  echo 'has-error'; } ?>">
							    <?php $edu_pg = (isset($edu['pg']))?$edu['pg']:"";  ?>
                                <label for=""  class="<?php if( !empty(form_error('edu[pg]') ) ){  echo 'text-danger'; } ?>" >Post - Graduation</label>
                                <input type="text" class="form-control" name="edu[pg]" id="" placeholder="MBA from Symbiosis Institute of International Business, Pune University in 1995 – 97, with a CGPA of 7.8" value="<?php echo set_value('edu[pg]', $edu_pg); ?>">
								<?php echo form_error('edu[pg]'); ?>
                            </div>
                            <div class="form-group col-md-12 <?php if( !empty(form_error('edu[graduation]') ) ){  echo 'has-error'; } ?>">
							    <?php $edu_graduation = (isset($edu['graduation']))?$edu['graduation']:"";  ?>
                                <label for=""  class="<?php if( !empty(form_error('edu[graduation]') ) ){  echo 'text-danger'; } ?>" >Graduation</label>
                                <input type="text" class="form-control" id="" name="edu[graduation]" placeholder="BSc (H) in Biochemistry from Venkateswara College, Delhi University (1989 – 1992) with 87% markets" value="<?php echo set_value('edu[graduation]', $edu_graduation); ?>">
								<?php echo form_error('edu[graduation]'); ?>
                            </div>
                            <div class="form-group col-md-12 <?php if( !empty(form_error('edu[xiith]') ) ){  echo 'has-error'; } ?>">
							    <?php $edu_xiith = (isset($edu['xiith']))?$edu['xiith']:"";  ?>
                                <label for=""  class="<?php if( !empty(form_error('edu[xiith]') ) ){  echo 'text-danger'; } ?>"  >XII<sup>th</sup></label>
                                <input type="text" class="form-control" id="" name="edu[xiith]" placeholder="Twelfth Class from KV INA Colony, CBSE board (1989) with 89% marks" value="<?php echo set_value('edu[xiith]', $edu_xiith); ?>">
								<?php echo form_error('edu[xiith]'); ?>
                            </div>
                            <div class="form-group col-md-12 <?php if( !empty(form_error('edu[xth]') ) ){  echo 'has-error'; } ?>">
							    <?php $edu_xth = (isset($edu['xth']))?$edu['xth']:"";  ?>
                                <label for=""  class="<?php if( !empty(form_error('edu[xth]') ) ){  echo 'text-danger'; } ?>" >X<sup>th</sup></label>
                                <input type="text" class="form-control" id="" name="edu[xth]" placeholder="Tenth Class from KV INA Colony, CBSE Board (1987) with 87% marks" value="<?php echo set_value('edu[xth]', $edu_xth); ?>">
								<?php echo form_error('edu[xth]'); ?>
                            </div>

                        </div>
                    </div>

					<?php  if($is_submit!="1"){ ?>
					  <div class="col-md-12">
							<br><br>
							<button type="submit" name="submitbtn" value="2" class="btn btn-success">Save as Draft</button>
							<br><br>
						</div>
					<?php  }  ?>
					
					<div class="col-md-12">
						<div class="border-bottom">
							<h5 class="title-sm">Tools & Technologies <span class="required">*</span></h5>
						</div>
						<p style="text-align: justify;">Instructions: When mentioning tools and technologies on your CV, organizing them into categories can help create a clear and structured presentation. Start by categorizing your tools and technologies based on relevance to the job you are applying for. For example, you can have categories such as "Programming Languages," "Database Management," "Web Development," "Version Control," and "Cloud Platforms. Within each category, list the specific tools and technologies you are proficient in. For instance, under "Programming Languages," you may include Python, Java, and C++. Under "Database Management," mention SQL, MySQL, and Oracle. Indicate your proficiency level for each tool or technology using terms like "proficient," "advanced," or "expert." This provides employers with a clear understanding of your skill level. To enhance the impact, consider adding concrete examples or achievements related to each tool or technology. For instance, mention projects where you utilized Python to develop machine learning models or websites built using HTML, CSS, and JavaScript.</p>
					    <div class="row">
					        <?php
                                if(!empty($tools_technology)){
                                    foreach($tools_technology as $value){
                                        echo '<div class="form-group col-md-12">';
                                        echo '<div class="amc">';
                                        echo '<input type="text" class="form-control" name="tools_technology[]" id="" placeholder="" value="'.set_value('toolntech', $value).'" placeholder="Operating Systems: Windows 10, macOS, Linux"/>';
                                        echo '</div>';
                                        echo '</div>';
                                        echo form_error('tools_technology['.$value.']');
                                    }
                                }else{
                                    echo '<div class="form-group col-md-12">';
                                    echo '<div class="amc">';
                                    echo '<input type="text" class="form-control" name="tools_technology[]" id="" placeholder="" value="" placeholder="Operating Systems: Windows 10, macOS, Linux"/>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo form_error('tools_technology[0]');
                                }
                            ?>
    						<div class=" col-md-12">
                                <span class="help-block"><a href="javascript:void(0)" class="addMore1" data-src="int_res">Add more Tools & Technologies</a></span>
                            </div>
                        </div>
					</div>
					
					<?php  if($is_submit!="1"){ ?>
					  <div class="col-md-12">
							<br><br>
							<button type="submit" name="submitbtn" value="2" class="btn btn-success">Save as Draft</button>
							<br><br>
						</div>
					<?php  }  ?>

                    <div class="col-md-12">
						<div class="border-bottom">
							<h5 class="title-sm">Professional Enhancements</h5>
						</div>
                        
                        <p style="text-align: justify;">Instructions: When it comes to showcasing professional enhancements on your CV, it's important to highlight the certifications, and training you have acquired to demonstrate your commitment to professional development and your ability to stay updated in your field. List the name of the certification, the issuing organization, and the date of certification. This demonstrates your dedication to expanding your knowledge and expertise in your field. Also, highlight any additional training programs, workshops, or courses you have completed to enhance your professional skills. Include the name of the training program or course, the institution or provider, and the completion date. While listing your enhancements, ensure they are relevant to the job or industry you are targeting. Focus on the ones that have made a significant impact on your skills, knowledge, or career progression. If possible, quantify the impact or describe how you have applied these enhancements in your professional experience. If you are currently pursuing any certifications or training programs, mention them as "In Progress" with the anticipated completion date. This shows your dedication to ongoing learning and professional development.</p>
                        <div class="row">
                            <!--set -->
                            <?php
                            if (!empty($proenc)) {
								$c = 0;
                                foreach ($proenc as $v) { ?>
                                   <div class="form-group col-md-12 <?php if( !empty(form_error('proenc['.$c.']') ) ){  echo 'has-error'; } ?>">
										<div class="amc">
											<input type="text" class="form-control" name="proenc[]" id="" placeholder="Certification Example: Google Analytics Individual Qualification - Google - 2020" value="<?php echo set_value('proenc['.$c.']', $v); ?>" />
											<?php echo form_error('proenc['.$c.']'); ?>
										</div>
									</div>
                             <?php   $c++; }   }
                                else { ?>
                                <div class="form-group col-md-12 <?php if( !empty(form_error('proenc[0]') ) ){  echo 'has-error'; } ?>">
								    <div class="amc">
									    <input type="text" class="form-control" name="proenc[]" id="" placeholder="Certification Example: Google Analytics Individual Qualification - Google - 2020" value="<?php echo set_value('proenc[0]'); ?>"  >
										<?php echo form_error('proenc[0]'); ?>
									</div>
								</div>
								<?php } ?>
                            <div class=" col-md-12">
                                <span class="help-block"><a href="javascript:void(0)" class="addMore1" data-src="proenc">Add More...</a></span>
                            </div>

                        </div>
                    </div>

					<?php  if($is_submit!="1"){ ?>
					  <div class="col-md-12">
							<br><br>
							<button type="submit" name="submitbtn" value="2" class="btn btn-success">Save as Draft</button>
							<br><br>
						</div>
					<?php  }  ?>



                    <div class="col-md-12">
						<div class="border-bottom">
							<h5 class="title-sm">Languages Known <span class="required">*</span></h5>
						</div>
                        
                        <p style="text-align: justify;">Instructions: Provide a list of languages you are proficient in. Start with the languages you are most fluent in and work your way down the list. If you are multilingual, you can organize the languages by proficiency level. If relevant, you can provide additional details about your language skills, such as your ability to read, write, speak, or understand the language. This gives employers a better understanding of your language capabilities. If language skills are particularly relevant to the job you are applying for, highlight any specific experience or work-related tasks you have performed using those languages. This could include translation work, customer service in a specific language, or conducting business negotiations. Only include languages on your CV that you are genuinely proficient in. It's important to accurately represent your language abilities, as employers may assess your language skills during interviews or other assessments.</p>
                        <div class="row">
                            <!--set -->
                            <?php
                                if(!empty($languages_known)){
                                    foreach($languages_known as $value){
                                        echo '<div class="form-group col-md-12">';
                                        echo '<div class="amc">';
                                        echo '<input type="text" class="form-control" name="languages_known[]" id="" placeholder="" value="'.set_value('languages_known', $value).'" placeholder="Languages that you can Read, Speak and Write"/>';
                                        echo '</div>';
                                        echo '</div>';
                                        echo form_error('languages_known['.$value.']');
                                    }
                                }else{
                                    echo '<div class="form-group col-md-12">';
                                    echo '<div class="amc">';
                                    echo '<input type="text" class="form-control" name="languages_known[]" id="" placeholder="" value="" placeholder="Languages that you can Read, Speak and Write"/>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo form_error('languages_known[0]');
                                }
                            ?>
                            <div class=" col-md-12">
                                <span class="help-block"><a href="javascript:void(0)" class="addMore1" data-src="int_res">Add more</a></span>
                            </div>
                        </div>
                        
                    </div>

                    <?php  if($is_submit!="1"){ ?>
					  <div class="col-md-12">
							<br><br>
							<button type="submit" name="submitbtn" value="2" class="btn btn-success">Save as Draft</button>
							<br><br>
						</div>
					<?php  }  ?>
                   

                    <div class="col-md-12">
						<div class="border-bottom">
							<h5 class="title-sm">Hobbies <span class="required">*</span></h5>
						</div>
                        
                        <p style="text-align: justify;">Instructions: Choose hobbies that are relevant to the job or industry you are applying for. Focus on activities that showcase desirable skills or qualities, such as teamwork, leadership, creativity, or problem-solving. Try to avoid generic hobbies like "reading" or "listening to music" unless they have a unique twist or relate to the position in a meaningful way. Instead, emphasize hobbies that set you apart and demonstrate your passion and dedication. Also, do not talk about activities like Going for Long drives, watching movies, watching night sky, Shopping etc. as your hobbies. They do not highlight any effort or learning. Highlight any transferable skills or qualities that your hobbies have helped you develop. For example, if you enjoy playing team sports, mention how it has improved your collaboration and communication skills. If your hobbies have led to significant achievements or milestones, include them. For instance, if you've won awards, completed challenging projects, or participated in competitions related to your hobbies, mention them briefly. Consider the job requirements and company culture when selecting which hobbies to include. If the position requires creativity, mention hobbies like painting or writing. If teamwork is essential, highlight team sports or collaborative activities.</p>
                        <div class="row">
                            <!--set -->
                                
                                    <?php
                                    if(!empty($hobby)){
                                        foreach($hobby as $value){
                                            echo '<div class="form-group col-md-12">';
                                            echo '<div class="amc">';
                                            echo '<input type="text" class="form-control" name="hobby[]" id="" placeholder="" value="'.set_value('hobby', $value).'" />';
                                            echo '</div>';
                                            echo '</div>';
                                            echo form_error('hobby['.$value.']');
                                        }
                                    }else{
                                        echo '<div class="form-group col-md-12">';
                                        echo '<div class="amc">';
                                        echo '<input type="text" class="form-control" name="hobby[]" id="" placeholder="" value="" />';
                                        echo '</div>';
                                        echo '</div>';
                                        echo form_error('hobby[0]');
                                    }
                                    ?>
								
                            <div class=" col-md-12">
                                <span class="help-block"><a href="javascript:void(0)" class="addMore1" data-src="int_res">Add more</a></span>
                            </div>
                        </div>
                    </div>

                   <?php  if($is_submit!="1"){ ?>
					  <div class="col-md-12">
							<br><br>
							<button type="submit" name="submitbtn" value="2" class="btn btn-success">Save as Draft</button>
							<br><br>
						</div>
					<?php  }  ?>

					<div class="col-md-12">
						<div class="border-bottom">
							<h5 class="title-sm">Positions of Responsibility</h5>
						</div>
						<p style="text-align: justify;">Instructions: A position of responsibility as a student on a fresher's CV for a job refers to any relevant leadership, involvement, or extracurricular roles held during the individual's time as a student. Information required here is Title, Role, Level (School, Graduation, Post Graduation, Diploma etc.), Accountability & Accomplishment. Highlight your leadership and management skills, providing specific examples of how you led teams, delegated tasks, and managed projects. Emphasize your achievements and the positive outcomes resulting from your responsibilities, quantifying them whenever possible. Please mention accomplishments related to Positions of Responsibility in the accomplishments section</p>
						<?php if(!empty($position) ){
                               $c = 0;
							   foreach($position as $pos){
							?>
						<div class="row well" style="<?php if($c>0) echo ' margin-top: 15px; '; ?>" > 
						    <?php if($c>0){ ?>
							    <a class="pull-right btn btn-sm btn-danger remove2"><i class="fa fa-remove"></i></a>
							<?php  }  ?>
							<div class="form-group col-md-12 <?php if( !empty(form_error('position['.$c.'][title]') ) ){  echo 'has-error'; } ?>">
								<label class="<?php if( !empty(form_error('position['.$c.'][title]') ) ){  echo 'text-danger'; } ?>" >Title</label>
								<input type="text" class="form-control" name="position[<?php echo $c; ?>][title]" id="" placeholder="Title" value="<?php echo set_value('position['.$c.'][title]', $pos['title']); ?>">
								<?php echo form_error('position['.$c.'][title]'); ?>
							</div>
							<div class="form-group col-md-12 <?php if( !empty(form_error('position['.$c.'][year]') ) ){  echo 'has-error'; } ?>">
								<label class="<?php if( !empty(form_error('position['.$c.'][year]') ) ){  echo 'text-danger'; } ?>">Name of the Institution – School/ College</label>
								<input type="text" class="form-control" name="position[<?php echo $c; ?>][year]" id="" placeholder="Name of the Institution – School/ College" value="<?php echo set_value('position['.$c.'][year]', $pos['year']); ?>">
								<?php echo form_error('position['.$c.'][year]'); ?>
							</div>
							<div class="form-group col-md-12 <?php if( !empty(form_error('position['.$c.'][level]') ) ){  echo 'has-error'; } ?>">
								<label class="<?php if( !empty(form_error('position['.$c.'][level]') ) ){  echo 'text-danger'; } ?>" >Level ((School, Graduation, Post Graduation, Diploma etc.)</label>
								<input type="text" class="form-control" name="position[<?php echo $c; ?>][level]" id="" placeholder="Level" value="<?php echo set_value('position['.$c.'][level]', $pos['level']); ?>">
								<?php echo form_error('position['.$c.'][level]'); ?>
							</div>
							<div class="form-group col-md-12 <?php if( !empty(form_error('position['.$c.'][accountability]') ) ){  echo 'has-error'; } ?>">
								<label class="<?php if( !empty(form_error('position['.$c.'][accountability]') ) ){  echo 'text-danger'; } ?>" >Accountability</label>
								<input type="text" class="form-control" name="position[<?php echo $c; ?>][accountability]" id="" placeholder="Accountability" value="<?php echo set_value('position['.$c.'][accountability]', $pos['accountability']); ?>">
								<?php echo form_error('position['.$c.'][accountability]'); ?>
							</div>
						</div>
					    <?php $c++; }  } else { ?>
						        <div class="row well"> 
								<div class="form-group col-md-12 <?php if( !empty(form_error('position[0][title]') ) ){  echo 'has-error'; } ?>">
									<label class="<?php if( !empty(form_error('position[0][title]') ) ){  echo 'text-danger'; } ?>" >Title</label>
									<input type="text" class="form-control" name="position[0][title]" id="" placeholder="Title" value="<?php echo set_value('position[0][title]'); ?>">
									<?php echo form_error('position[0][title]'); ?>
								</div>
								<div class="form-group col-md-12 <?php if( !empty(form_error('position[0][year]') ) ){  echo 'has-error'; } ?>">
									<label class="<?php if( !empty(form_error('position[0][year]') ) ){  echo 'text-danger'; } ?>" >Name of the Institution – School/ College</label>
									<input type="text" class="form-control" name="position[0][year]" id="" placeholder="Name of the Institution – School/ College" value="<?php echo set_value('position[0][year]'); ?>">
									<?php echo form_error('position[0][year]'); ?>
								</div>
								<div class="form-group col-md-12 <?php if( !empty(form_error('position[0][level]') ) ){  echo 'has-error'; } ?>">
									<label class="<?php if( !empty(form_error('position[0][level]') ) ){  echo 'text-danger'; } ?>" >Level ((School, Graduation, Post Graduation, Diploma etc.)</label>
									<input type="text" class="form-control" name="position[0][level]" id="" placeholder="Level" value="<?php echo set_value('position[0][level]'); ?>">
									<?php echo form_error('position[0][level]'); ?>
								</div>
								<div class="form-group col-md-12 <?php if( !empty(form_error('position[0][accountability]') ) ){  echo 'has-error'; } ?>">
									<label class="<?php if( !empty(form_error('position[0][accountability]') ) ){  echo 'text-danger'; } ?>" >Accountability</label>
									<input type="text" class="form-control" name="position[0][accountability]" id="" placeholder="Accountability" value="<?php echo set_value('position[0][accountability]'); ?>">
									<?php echo form_error('position[0][accountability]'); ?>
								</div>
							</div>
						<?php }  ?>
					</div>
					<div class=" col-md-12">
						<span class="help-block"><a href="javascript:void(0)" class="addMore2" data-src="hob">Add more Position of Responsibility</a></span>
					</div>
					<?php  if($is_submit!="1"){ ?>
					  <div class="col-md-12">
							<br><br>
							<button type="submit" name="submitbtn" value="2" class="btn btn-success">Save as Draft</button>
							<br><br>
						</div>
					<?php  }  ?>

					 <div class="col-md-12">
						<div class="border-bottom">
							<h5 class="title-sm">Accomplishments (Suggested: List up to 10)</h5>
						</div>
                        <p style="text-align: justify;">Instructions: List your accomplishments in reverse chronological order, starting with the most recent or significant achievements first. This helps recruiters quickly see your recent accomplishments. Whenever possible, quantify your accomplishments by using specific numbers, percentages, or other measurable metrics. This adds credibility and impact to your achievements. Additionally, qualify the accomplishments by mentioning any relevant context or impact. Begin each accomplishment with a strong action verb to describe the achievement. Group your accomplishments into relevant categories, such as "Academics", "Sports", "Extracurricular", "Work Experience", "Internship", "Positions of Responsibility", "Hobbies", "Social" and "Spiritual". List your accomplishments under each category by giving the description starting with an action verb and the year of accomplishment. The Following is an example of description and year in Internship category:</p>
                        <p style="text-align: justify;">Description: Completed a highly competitive internship at XYZ Corporation, where I developed and implemented a social media marketing strategy, resulting in a 20% increase in online engagement and brand visibility </p>
                        <p>Year: 2021</p>
                        <!--<p>Mention one or two key achievements in each of these areas in reverse chronological order.-->
                        <!--    Mention achievements like participated in, volunteered for etc. only when you do not have-->
                        <!--    anything significant to mention</p>-->
                            
                        <div >
                            <!--set -->
                            <?php
                            if(isset($accomplishments['academics'])) {
								$c = 0;
                                foreach($accomplishments['academics'] as $acd) { ?>
								   <div class="row well" <?php if($c > 0){ ?> style="mergin-top:10px;" <?php } ?> >
								      <?php if($c>0){ ?>
								        <a href="javascript:void(0);" class="pull-right btn btn-sm btn-danger remove2"><i class="fa fa-remove"></i></a>
									  <?php  }  ?>
                                      <label >Academics</label>
                                        <div class="form-group col-md-12 <?php if( !empty(form_error('accomplishments[academics]['.$c.'][input]') ) ){  echo 'has-error'; } ?>">
									      <?php $accomp_val = isset($acd['input'])?$acd['input']:""; ?>
                                         <input type="text" class="form-control" name="accomplishments[academics][<?php echo $c; ?>][input]" id="" placeholder="Description" value="<?php echo set_value('accomplishments[academics]['.$c.'][input]', $accomp_val); ?>">
									   <?php echo form_error('accomplishments[academics]['.$c.'][input]'); ?>
                                       </div>
									   
									   <div class="form-group col-md-12 <?php if( !empty(form_error('accomplishments[academics]['.$c.'][year]') ) ){  echo 'has-error'; } ?>">
									      <?php $accomp_val = isset($acd['input'])?$acd['year']:""; ?>
                                         <input type="text" class="form-control" name="accomplishments[academics][<?php echo $c; ?>][year]" id="" placeholder="Year" value="<?php echo set_value('accomplishments[academics]['.$c.'][year]', $accomp_val); ?>">
									   <?php echo form_error('accomplishments[academics]['.$c.'][year]'); ?>
                                       </div>
                                    </div>
                               <?php  
							   $c++;
                                }
                            }
                            else { ?>
							  <div class="row well" >
							        <label  >Academics</label>
                                    <div class="form-group col-md-12 <?php if( !empty(form_error('accomplishments[academics][0][input]') ) ){  echo 'has-error'; } ?>">
                                     <input type="text" class="form-control" name="accomplishments[academics][0][input]" id="" placeholder="Description" value="<?php echo set_value('accomplishments[academics][0][input]'); ?>">
									 <?php echo form_error('accomplishments[academics][0][input]'); ?>
                                    </div>
									
									 <div class="form-group col-md-12 <?php if( !empty(form_error('accomplishments[academics][0][year]') ) ){  echo 'has-error'; } ?>">
                                         <input type="text" class="form-control" name="accomplishments[academics][0][year]" id="" placeholder="Year" value="<?php echo set_value('accomplishments[academics][0][year]'); ?>">
									   <?php echo form_error('accomplishments[academics][0][year]'); ?>
                                     </div>
                                </div>
                           <?php } ?>
					</div>
					
					<div class="col-md-12">
                                <span class="help-block">
								<a href="javascript:void(0)" class="addMore3" data-src="Academics">Add More...</a></span>
                            </div>
					<br/><br/>		
				    <div  >
                            <!--set -->
                            <?php
                            if(isset($accomplishments['sports'])) {
								$c = 0;
                                foreach($accomplishments['sports'] as $acd) { ?>
								   <div class="row well" <?php if($c > 0){ ?> style="mergin-top:10px;" <?php } ?> >
								      <?php if($c>0){ ?>
								        <a href="javascript:void(0);" class="pull-right btn btn-sm btn-danger remove2"><i class="fa fa-remove"></i></a>
									  <?php  }  ?>
                                      <label >Sports</label>
                                        <div class="form-group col-md-12 <?php if( !empty(form_error('accomplishments[sports]['.$c.'][input]') ) ){  echo 'has-error'; } ?>">
									      <?php $accomp_val = isset($acd['input'])?$acd['input']:""; ?>
                                         <input type="text" class="form-control" name="accomplishments[sports][<?php echo $c; ?>][input]" id="" placeholder="Description" value="<?php echo set_value('accomplishments[sports]['.$c.'][input]', $accomp_val); ?>">
									   <?php echo form_error('accomplishments[sports]['.$c.'][input]'); ?>
                                       </div>
									   
									   <div class="form-group col-md-12 <?php if( !empty(form_error('accomplishments[sports]['.$c.'][year]') ) ){  echo 'has-error'; } ?>">
									      <?php $accomp_val = isset($acd['input'])?$acd['year']:""; ?>
                                         <input type="text" class="form-control" name="accomplishments[sports][<?php echo $c; ?>][year]" id="" placeholder="Year" value="<?php echo set_value('accomplishments[sports]['.$c.'][year]', $accomp_val); ?>">
									   <?php echo form_error('accomplishments[sports]['.$c.'][year]'); ?>
                                       </div>
                                    </div>
                               <?php  
							   $c++;
                                }
                            }
                            else { ?>
							  <div class="row well" >
							        <label  >Sports</label>
                                    <div class="form-group col-md-12 <?php if( !empty(form_error('accomplishments[sports][0][input]') ) ){  echo 'has-error'; } ?>">
                                     <input type="text" class="form-control" name="accomplishments[sports][0][input]" id="" placeholder="Description" value="<?php echo set_value('accomplishments[sports][0][input]'); ?>">
									 <?php echo form_error('accomplishments[sports][0][input]'); ?>
                                    </div>
									
									 <div class="form-group col-md-12 <?php if( !empty(form_error('accomplishments[sports][0][year]') ) ){  echo 'has-error'; } ?>">
                                         <input type="text" class="form-control" name="accomplishments[sports][0][year]" id="" placeholder="Year" value="<?php echo set_value('accomplishments[sports][0][year]'); ?>">
									   <?php echo form_error('accomplishments[sports][0][year]'); ?>
                                     </div>
                                </div>
                           <?php } ?>
					</div>
					<div class="col-md-12">
                                <span class="help-block">
								<a href="javascript:void(0)" class="addMore3" data-src="Academics">Add More...</a></span>
                            </div>
					<br/><br/>
					
					<div >
                            <!--set -->
                            <?php
                            if(isset($accomplishments['extracurricular'])) {
								$c = 0;
                                foreach($accomplishments['extracurricular'] as $acd) { ?>
								   <div class="row well" <?php if($c > 0){ ?> style="mergin-top:10px;" <?php } ?> >
								      <?php if($c>0){ ?>
								        <a href="javascript:void(0);" class="pull-right btn btn-sm btn-danger remove2"><i class="fa fa-remove"></i></a>
									  <?php  }  ?>
                                      <label>Co-curricular activities</label>
                                        <div class="form-group col-md-12 <?php if( !empty(form_error('accomplishments[extracurricular]['.$c.'][input]') ) ){  echo 'has-error'; } ?>">
									      <?php $accomp_val = isset($acd['input'])?$acd['input']:""; ?>
                                         <input type="text" class="form-control" name="accomplishments[extracurricular][<?php echo $c; ?>][input]" id="" placeholder="Description" value="<?php echo set_value('accomplishments[extracurricular]['.$c.'][input]', $accomp_val); ?>">
									   <?php echo form_error('accomplishments[extracurricular]['.$c.'][input]'); ?>
                                       </div>
									   
									   <div class="form-group col-md-12 <?php if( !empty(form_error('accomplishments[extracurricular]['.$c.'][year]') ) ){  echo 'has-error'; } ?>">
									      <?php $accomp_val = isset($acd['input'])?$acd['year']:""; ?>
                                         <input type="text" class="form-control" name="accomplishments[extracurricular][<?php echo $c; ?>][year]" id="" placeholder="Year" value="<?php echo set_value('accomplishments[extracurricular]['.$c.'][year]', $accomp_val); ?>">
									   <?php echo form_error('accomplishments[extracurricular]['.$c.'][year]'); ?>
                                       </div>
                                    </div>
                               <?php  
							   $c++;
                                }
                            }
                            else { ?>
							  <div class="row well" >
							        <label>Co-curricular activities</label>
                                    <div class="form-group col-md-12 <?php if( !empty(form_error('accomplishments[extracurricular][0][input]') ) ){  echo 'has-error'; } ?>">
                                     <input type="text" class="form-control" name="accomplishments[extracurricular][0][input]" id="" placeholder="Description" value="<?php echo set_value('accomplishments[extracurricular][0][input]'); ?>">
									 <?php echo form_error('accomplishments[extracurricular][0][input]'); ?>
                                    </div>
									
									 <div class="form-group col-md-12 <?php if( !empty(form_error('accomplishments[extracurricular][0][year]') ) ){  echo 'has-error'; } ?>">
                                         <input type="text" class="form-control" name="accomplishments[extracurricular][0][year]" id="" placeholder="Year" value="<?php echo set_value('accomplishments[extracurricular][0][year]'); ?>">
									   <?php echo form_error('accomplishments[extracurricular][0][year]'); ?>
                                     </div>
                                </div>
                           <?php } ?>
					</div>
					
					<div class="col-md-12">
                                <span class="help-block">
								<a href="javascript:void(0)" class="addMore3" data-src="Academics">Add More...</a></span>
                            </div>
					<br/><br/>
					
					<div >
                            <!--set -->
                            <?php
                            if(isset($accomplishments['work'])) {
								$c = 0;
                                foreach($accomplishments['work'] as $acd) { ?>
								   <div class="row well" <?php if($c > 0){ ?> style="mergin-top:10px;" <?php } ?> >
								      <?php if($c>0){ ?>
								        <a href="javascript:void(0);" class="pull-right btn btn-sm btn-danger remove2"><i class="fa fa-remove"></i></a>
									  <?php  }  ?>
                                      <label>Work Experience</label>
                                        <div class="form-group col-md-12 <?php if( !empty(form_error('accomplishments[work]['.$c.'][input]') ) ){  echo 'has-error'; } ?>">
									      <?php $accomp_val = isset($acd['input'])?$acd['input']:""; ?>
                                         <input type="text" class="form-control" name="accomplishments[work][<?php echo $c; ?>][input]" id="" placeholder="Description" value="<?php echo set_value('accomplishments[work]['.$c.'][input]', $accomp_val); ?>">
									   <?php echo form_error('accomplishments[work]['.$c.'][input]'); ?>
                                       </div>
									   
									   <div class="form-group col-md-12 <?php if( !empty(form_error('accomplishments[work]['.$c.'][year]') ) ){  echo 'has-error'; } ?>">
									      <?php $accomp_val = isset($acd['input'])?$acd['year']:""; ?>
                                         <input type="text" class="form-control" name="accomplishments[work][<?php echo $c; ?>][year]" id="" placeholder="Year" value="<?php echo set_value('accomplishments[work]['.$c.'][year]', $accomp_val); ?>">
									   <?php echo form_error('accomplishments[work]['.$c.'][year]'); ?>
                                       </div>
                                    </div>
                               <?php  
							   $c++;
                                }
                            }
                            else { ?>
							  <div class="row well" >
							        <label>Work Experience</label>
                                    <div class="form-group col-md-12 <?php if( !empty(form_error('accomplishments[work][0][input]') ) ){  echo 'has-error'; } ?>">
                                     <input type="text" class="form-control" name="accomplishments[work][0][input]" id="" placeholder="Description" value="<?php echo set_value('accomplishments[work][0][input]'); ?>">
									 <?php echo form_error('accomplishments[work][0][input]'); ?>
                                    </div>
									
									 <div class="form-group col-md-12 <?php if( !empty(form_error('accomplishments[work][0][year]') ) ){  echo 'has-error'; } ?>">
                                         <input type="text" class="form-control" name="accomplishments[work][0][year]" id="" placeholder="Year" value="<?php echo set_value('accomplishments[work][0][year]'); ?>">
									   <?php echo form_error('accomplishments[work][0][year]'); ?>
                                     </div>
                                </div>
                           <?php } ?>
					</div>
					
					<div class="col-md-12">
                                <span class="help-block">
								<a href="javascript:void(0)" class="addMore3" data-src="Academics">Add More...</a></span>
                            </div>
					<br/><br/>
					
					<div >
                            <!--set -->
                            <?php
                            if(isset($accomplishments['internship'])) {
								$c = 0;
                                foreach($accomplishments['internship'] as $acd) { ?>
								   <div class="row well" <?php if($c > 0){ ?> style="mergin-top:10px;" <?php } ?> >
								      <?php if($c>0){ ?>
								        <a href="javascript:void(0);" class="pull-right btn btn-sm btn-danger remove2"><i class="fa fa-remove"></i></a>
									  <?php  }  ?>
                                      <label>Internship</label>
                                        <div class="form-group col-md-12 <?php if( !empty(form_error('accomplishments[internship]['.$c.'][input]') ) ){  echo 'has-error'; } ?>">
									      <?php $accomp_val = isset($acd['input'])?$acd['input']:""; ?>
                                         <input type="text" class="form-control" name="accomplishments[internship][<?php echo $c; ?>][input]" id="" placeholder="Description" value="<?php echo set_value('accomplishments[internship]['.$c.'][input]', $accomp_val); ?>">
									   <?php echo form_error('accomplishments[internship]['.$c.'][input]'); ?>
                                       </div>
									   
									   <div class="form-group col-md-12 <?php if( !empty(form_error('accomplishments[internship]['.$c.'][year]') ) ){  echo 'has-error'; } ?>">
									      <?php $accomp_val = isset($acd['input'])?$acd['year']:""; ?>
                                         <input type="text" class="form-control" name="accomplishments[internship][<?php echo $c; ?>][year]" id="" placeholder="Year" value="<?php echo set_value('accomplishments[internship]['.$c.'][year]', $accomp_val); ?>">
									   <?php echo form_error('accomplishments[internship]['.$c.'][year]'); ?>
                                       </div>
                                    </div>
                               <?php  
							   $c++;
                                }
                            }
                            else { ?>
							  <div class="row well" >
							        <label>Internship</label>
                                    <div class="form-group col-md-12 <?php if( !empty(form_error('accomplishments[internship][0][input]') ) ){  echo 'has-error'; } ?>">
                                     <input type="text" class="form-control" name="accomplishments[internship][0][input]" id="" placeholder="Description" value="<?php echo set_value('accomplishments[internship][0][input]'); ?>">
									 <?php echo form_error('accomplishments[internship][0][input]'); ?>
                                    </div>
									
									 <div class="form-group col-md-12 <?php if( !empty(form_error('accomplishments[internship][0][year]') ) ){  echo 'has-error'; } ?>">
                                         <input type="text" class="form-control" name="accomplishments[internship][0][year]" id="" placeholder="Year" value="<?php echo set_value('accomplishments[internship][0][year]'); ?>">
									   <?php echo form_error('accomplishments[internship][0][year]'); ?>
                                     </div>
                                </div>
                           <?php } ?>
					</div>
					
					<div class="col-md-12">
                                <span class="help-block">
								<a href="javascript:void(0)" class="addMore3" data-src="Academics">Add More...</a></span>
                            </div>
					<br/><br/>
					
					<div >
                            <!--set -->
                            <?php
                            if(isset($accomplishments['position_of_responsibility'])) {
								$c = 0;
                                foreach($accomplishments['position_of_responsibility'] as $acd) { ?>
								   <div class="row well" <?php if($c > 0){ ?> style="mergin-top:10px;" <?php } ?> >
								      <?php if($c>0){ ?>
								        <a href="javascript:void(0);" class="pull-right btn btn-sm btn-danger remove2"><i class="fa fa-remove"></i></a>
									  <?php  }  ?>
                                      <label>Positions of Responsibility</label>
                                        <div class="form-group col-md-12 <?php if( !empty(form_error('accomplishments[position_of_responsibility]['.$c.'][input]') ) ){  echo 'has-error'; } ?>">
									      <?php $accomp_val = isset($acd['input'])?$acd['input']:""; ?>
                                         <input type="text" class="form-control" name="accomplishments[position_of_responsibility][<?php echo $c; ?>][input]" id="" placeholder="Description" value="<?php echo set_value('accomplishments[position_of_responsibility]['.$c.'][input]', $accomp_val); ?>">
									   <?php echo form_error('accomplishments[position_of_responsibility]['.$c.'][input]'); ?>
                                       </div>
									   
									   <div class="form-group col-md-12 <?php if( !empty(form_error('accomplishments[position_of_responsibility]['.$c.'][year]') ) ){  echo 'has-error'; } ?>">
									      <?php $accomp_val = isset($acd['input'])?$acd['year']:""; ?>
                                         <input type="text" class="form-control" name="accomplishments[position_of_responsibility][<?php echo $c; ?>][year]" id="" placeholder="Year" value="<?php echo set_value('accomplishments[position_of_responsibility]['.$c.'][year]', $accomp_val); ?>">
									   <?php echo form_error('accomplishments[position_of_responsibility]['.$c.'][year]'); ?>
                                       </div>
                                    </div>
                               <?php  
							   $c++;
                                }
                            }
                            else { ?>
							  <div class="row well">
							        <label>Positions of Responsibility</label>
                                    <div class="form-group col-md-12 <?php if( !empty(form_error('accomplishments[position_of_responsibility][0][input]') ) ){  echo 'has-error'; } ?>">
                                     <input type="text" class="form-control" name="accomplishments[position_of_responsibility][0][input]" id="" placeholder="Description" value="<?php echo set_value('accomplishments[position_of_responsibility][0][input]'); ?>">
									 <?php echo form_error('accomplishments[position_of_responsibility][0][input]'); ?>
                                    </div>
									
									 <div class="form-group col-md-12 <?php if( !empty(form_error('accomplishments[position_of_responsibility][0][year]') ) ){  echo 'has-error'; } ?>">
                                         <input type="text" class="form-control" name="accomplishments[position_of_responsibility][0][year]" id="" placeholder="Year" value="<?php echo set_value('accomplishments[position_of_responsibility][0][year]'); ?>">
									   <?php echo form_error('accomplishments[position_of_responsibility][0][year]'); ?>
                                     </div>
                                </div>
                           <?php } ?>
					</div>
					
					<div class="col-md-12">
                                <span class="help-block">
								<a href="javascript:void(0)" class="addMore3" data-src="Academics">Add More...</a></span>
                            </div>
					<br/><br/>
					
					
					<div >
                            <!--set -->
                            <?php
                            if(isset($accomplishments['hobbies'])) {
								$c = 0;
                                foreach($accomplishments['hobbies'] as $acd) { ?>
								   <div class="row well" <?php if($c > 0){ ?> style="mergin-top:10px;" <?php } ?> >
								      <?php if($c>0){ ?>
								        <a href="javascript:void(0);" class="pull-right btn btn-sm btn-danger remove2"><i class="fa fa-remove"></i></a>
									  <?php  }  ?>
                                      <label >Hobbies</label>
                                        <div class="form-group col-md-12 <?php if( !empty(form_error('accomplishments[hobbies]['.$c.'][input]') ) ){  echo 'has-error'; } ?>">
									      <?php $accomp_val = isset($acd['input'])?$acd['input']:""; ?>
                                         <input type="text" class="form-control" name="accomplishments[hobbies][<?php echo $c; ?>][input]" id="" placeholder="Description" value="<?php echo set_value('accomplishments[hobbies]['.$c.'][input]', $accomp_val); ?>">
									   <?php echo form_error('accomplishments[hobbies]['.$c.'][input]'); ?>
                                       </div>
									   
									   <div class="form-group col-md-12 <?php if( !empty(form_error('accomplishments[hobbies]['.$c.'][year]') ) ){  echo 'has-error'; } ?>">
									      <?php $accomp_val = isset($acd['input'])?$acd['year']:""; ?>
                                         <input type="text" class="form-control" name="accomplishments[hobbies][<?php echo $c; ?>][year]" id="" placeholder="Year" value="<?php echo set_value('accomplishments[hobbies]['.$c.'][year]', $accomp_val); ?>">
									   <?php echo form_error('accomplishments[hobbies]['.$c.'][year]'); ?>
                                       </div>
                                    </div>
                               <?php  
							   $c++;
                                }
                            }
                            else { ?>
							  <div class="row well">
							        <label>Hobbies</label>
                                    <div class="form-group col-md-12 <?php if( !empty(form_error('accomplishments[hobbies][0][input]') ) ){  echo 'has-error'; } ?>">
                                     <input type="text" class="form-control" name="accomplishments[hobbies][0][input]" id="" placeholder="Description" value="<?php echo set_value('accomplishments[hobbies][0][input]'); ?>">
									 <?php echo form_error('accomplishments[hobbies][0][input]'); ?>
                                    </div>
									
									 <div class="form-group col-md-12 <?php if( !empty(form_error('accomplishments[hobbies][0][year]') ) ){  echo 'has-error'; } ?>">
                                         <input type="text" class="form-control" name="accomplishments[hobbies][0][year]" id="" placeholder="Year" value="<?php echo set_value('accomplishments[hobbies][0][year]'); ?>">
									   <?php echo form_error('accomplishments[hobbies][0][year]'); ?>
                                     </div>
                                </div>
                           <?php } ?>
					</div>
					
					<div class="col-md-12">
                                <span class="help-block">
								<a href="javascript:void(0)" class="addMore3" data-src="Academics">Add More...</a></span>
                            </div>
					<br/><br/>
					
					
					<div >
                            <!--set -->
                            <?php
                            if(isset($accomplishments['social'])) {
								$c = 0;
                                foreach($accomplishments['social'] as $acd) { ?>
								   <div class="row well" <?php if($c > 0){ ?> style="mergin-top:10px;" <?php } ?> >
								      <?php if($c>0){ ?>
								        <a href="javascript:void(0);" class="pull-right btn btn-sm btn-danger remove2"><i class="fa fa-remove"></i></a>
									  <?php  }  ?>
                                      <label>Social</label>
                                        <div class="form-group col-md-12 <?php if( !empty(form_error('accomplishments[social]['.$c.'][input]') ) ){  echo 'has-error'; } ?>">
									      <?php $accomp_val = isset($acd['input'])?$acd['input']:""; ?>
                                         <input type="text" class="form-control" name="accomplishments[social][<?php echo $c; ?>][input]" id="" placeholder="Description" value="<?php echo set_value('accomplishments[social]['.$c.'][input]', $accomp_val); ?>">
									   <?php echo form_error('accomplishments[social]['.$c.'][input]'); ?>
                                       </div>
									   
									   <div class="form-group col-md-12 <?php if( !empty(form_error('accomplishments[social]['.$c.'][year]') ) ){  echo 'has-error'; } ?>">
									      <?php $accomp_val = isset($acd['input'])?$acd['year']:""; ?>
                                         <input type="text" class="form-control" name="accomplishments[social][<?php echo $c; ?>][year]" id="" placeholder="Year" value="<?php echo set_value('accomplishments[social]['.$c.'][year]', $accomp_val); ?>">
									   <?php echo form_error('accomplishments[social]['.$c.'][year]'); ?>
                                       </div>
                                    </div>
                               <?php  
							   $c++;
                                }
                            }
                            else { ?>
							  <div class="row well">
							        <label>Social</label>
                                    <div class="form-group col-md-12 <?php if( !empty(form_error('accomplishments[social][0][input]') ) ){  echo 'has-error'; } ?>">
                                     <input type="text" class="form-control" name="accomplishments[social][0][input]" id="" placeholder="Description" value="<?php echo set_value('accomplishments[social][0][input]'); ?>">
									 <?php echo form_error('accomplishments[social][0][input]'); ?>
                                    </div>
									
									 <div class="form-group col-md-12 <?php if( !empty(form_error('accomplishments[social][0][year]') ) ){  echo 'has-error'; } ?>">
                                         <input type="text" class="form-control" name="accomplishments[social][0][year]" id="" placeholder="Year" value="<?php echo set_value('accomplishments[social][0][year]'); ?>">
									   <?php echo form_error('accomplishments[social][0][year]'); ?>
                                     </div>
                                </div>
                           <?php } ?>
					</div>
					
					<div class="col-md-12">
                                <span class="help-block">
								<a href="javascript:void(0)" class="addMore3" data-src="Academics">Add More...</a></span>
                            </div>
					<br/><br/>
					
					<div >
                            <!--set -->
                            <?php
                            if(isset($accomplishments['spiritual'])) {
								$c = 0;
                                foreach($accomplishments['spiritual'] as $acd) { ?>
								   <div class="row well" <?php if($c > 0){ ?> style="mergin-top:10px;" <?php } ?> >
								      <?php if($c>0){ ?>
								        <a href="javascript:void(0);" class="pull-right btn btn-sm btn-danger remove2"><i class="fa fa-remove"></i></a>
									  <?php  }  ?>
                                      <label>Spiritual</label>
                                        <div class="form-group col-md-12 <?php if( !empty(form_error('accomplishments[spiritual]['.$c.'][input]') ) ){  echo 'has-error'; } ?>">
									      <?php $accomp_val = isset($acd['input'])?$acd['input']:""; ?>
                                         <input type="text" class="form-control" name="accomplishments[spiritual][<?php echo $c; ?>][input]" id="" placeholder="Description" value="<?php echo set_value('accomplishments[spiritual]['.$c.'][input]', $accomp_val); ?>">
									   <?php echo form_error('accomplishments[spiritual]['.$c.'][input]'); ?>
                                       </div>
									   
									   <div class="form-group col-md-12 <?php if( !empty(form_error('accomplishments[spiritual]['.$c.'][year]') ) ){  echo 'has-error'; } ?>">
									      <?php $accomp_val = isset($acd['input'])?$acd['year']:""; ?>
                                         <input type="text" class="form-control" name="accomplishments[spiritual][<?php echo $c; ?>][year]" id="" placeholder="Year" value="<?php echo set_value('accomplishments[spiritual]['.$c.'][year]', $accomp_val); ?>">
									   <?php echo form_error('accomplishments[spiritual]['.$c.'][year]'); ?>
                                       </div>
                                    </div>
                               <?php  
							   $c++;
                                }
                            }
                            else { ?>
							  <div class="row well">
							        <label>Spiritual</label>
                                    <div class="form-group col-md-12 <?php if( !empty(form_error('accomplishments[spiritual][0][input]') ) ){  echo 'has-error'; } ?>">
                                     <input type="text" class="form-control" name="accomplishments[spiritual][0][input]" id="" placeholder="Description" value="<?php echo set_value('accomplishments[spiritual][0][input]'); ?>">
									 <?php echo form_error('accomplishments[spiritual][0][input]'); ?>
                                    </div>
									
									 <div class="form-group col-md-12 <?php if( !empty(form_error('accomplishments[spiritual][0][year]') ) ){  echo 'has-error'; } ?>">
                                         <input type="text" class="form-control" name="accomplishments[spiritual][0][year]" id="" placeholder="Year" value="<?php echo set_value('accomplishments[spiritual][0][year]'); ?>">
									   <?php echo form_error('accomplishments[spiritual][0][year]'); ?>
                                     </div>
                                </div>
                           <?php } ?>
					</div>
					
					<div class="col-md-12">
                                <span class="help-block">
								<a href="javascript:void(0)" class="addMore3" data-src="Academics">Add More...</a></span>
                            </div>
					<br/><br/>
					
                    </div>
                    <?php  if($is_submit!="1"){ ?>
					  <div class="col-md-12">
							<br><br>
							<button type="submit" name="submitbtn" value="2" class="btn btn-success">Save as Draft</button>
							<br><br>
						</div>
					<?php  }  ?>

                    <div class="col-md-12" >
                        <center>
                            <!-- <button type="button" class="btn btn-success save_draft">Save as Draft</button>&nbsp; -->
                            <!-- <button type="button" class="btn btn-success save_draft_pdf">Save as Pdf</button>&nbsp; -->
                            <button type="submit" name="submitbtn" value="1" class="btn btn-success" value="1"><?php  if($is_submit=="1"){ ?>Update<?php } else { ?>Submit<?php } ?></button>
							<?php  if($is_submit=="1"){ ?>
							   <a href="<?php echo base_url() . 'cvprintPdf'; ?>" class="btn btn-success">Download as Pdf</a>
							<?php }  ?>
                        </center>
                    </div>







                </div>


            </form>
        
		
    </div>

</div>
<!-- <div class="col-md-2"></div>
</div> -->
<!--cv content end-->

<?php
$this->load->view('footer_view');
?>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd',changeMonth: true, changeYear: true, yearRange: "1950:+nn" });
  } );
  </script>
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
            $("#paragraph textarea").attr("placeholder", "Results-driven finance professional seeking a challenging role in financial analysis. Equipped with a CFA Level 2 certification and proficiency in financial modeling and valuation techniques. Committed to providing accurate financial insights, optimizing investment strategies, and driving business growth. Seeking opportunities to leverage analytical skills and contribute to the success of an esteemed financial institution.");
        }
    }
    $(document.body).on("click", ".obj_type", function () {
        //  alert($(this).val());
        if ($(this).val() == "bullet") {
            $("#bullet").show();
            $("#paragraph").hide();
        } else {
            $("#paragraph").show();
            $("#paragraph textarea").attr("placeholder", "Experienced graphic designer with 5+ years of industry expertise. Proficient in Adobe Creative Suite, specializing in Photoshop and Illustrator. Recognized for creating visually stunning designs that effectively convey brand messages. Adept at collaborating with cross-functional teams and meeting tight deadlines. Certified in UX/UI Design, ensuring user-centric and intuitive interfaces. Strong attention to detail, creative problem-solving skills, and a passion for delivering visually impactful solutions that exceed client expectations.");
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
        if(confirm("Are you sure to remove?") == true){
            $(this).parent().parent().remove();
		}
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
                //location.reload();
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

$(document).ready(function(){
		$("body").on("click", ".addMore1", function(){
			var clon = $(this).parent().parent().prev().find(".amc").eq(0).clone();
			if(!this.parentElement.parentElement.previousElementSibling.firstElementChild.classList.contains('input-group')){
			    clon.addClass("input-group").append('<span class="input-group-addon" id="basic-addon1"><button type="button" class="btn btn-sm remove btn-danger"><i class="fa fa-remove"></i></button></span>');
    			clon.find("input").val("");
    			clon.css("margin-top", "10px")
    			$(this).parent().parent().prev().append(clon);
			}else{
			    clon.find("input").val("");
    			clon.css("margin-top", "10px")
    			$(this).parent().parent().prev().append(clon);
			}
		});
		
		function getPosition(string, subString, index) {
		  return string.split(subString, index).join(subString).length;
		}
		
		$("body").on("click", ".addMore2", function(){
			var clon = $(this).parent().parent().prev().find(".well").eq(0).clone();
			clon.css("margin-top", "20px")
			$( '<a href="javascript:void(0);" class="pull-right btn btn-sm btn-danger remove2"><i class="fa fa-remove"></i></a>' ).insertBefore( clon.find(".form-group").eq(0) );
			clon.find("input").val("");
			$(this).parent().parent().prev().append(clon);
			var i = 0;
			var name_attr_text = "";
			var name_attr_text2 = "";
			$(this).parent().parent().prev().find(".well").each(function(){
			    //console.log(this);
			    let count = 1;
				$(this).find("input").each(function(){
				    name_attr_text = 'work_exp['+ i +'][res][]';
				    name_attr_text2 = 'internship['+ i +'][res][]';
					var text = $(this).attr("name");
					var name = text.substring(0, text.indexOf("[")+1) + i + text.substring(text.indexOf("]"), text.length);
					if(name == name_attr_text){
					    if(count > 1){
					        if(!this.parentElement.classList.contains('input-group')){
					            $(this).parent().addClass("input-group").append('<span class="input-group-addon" id="basic-addon1"><button type="button" class="btn btn-sm remove btn-danger"><i class="fa fa-remove"></i></button></span>');
					        }
					    }
					    count++;
					}
					if(name == name_attr_text2){
					    if(count > 1){
					        if(!this.parentElement.classList.contains('input-group')){
					            $(this).parent().addClass("input-group").append('<span class="input-group-addon" id="basic-addon1"><button type="button" class="btn btn-sm remove btn-danger"><i class="fa fa-remove"></i></button></span>');
					        }
					    }
					    count++;
					}
					$(this).attr("name", name);
				});
				i++;
			});
		});
		
		$("body").on("click", ".addMore3", function(){
			var clon = $(this).parent().parent().prev().find(".well").eq(0).clone();
			clon.css("margin-top", "20px")
			$( '<a href="javascript:void(0);" class="pull-right btn btn-sm btn-danger remove2"><i class="fa fa-remove"></i></a>' ).insertBefore( clon.find("label").eq(0) );
			clon.find("input").val("");
			$(this).parent().parent().prev().append(clon);
			var i = 0;
			$(this).parent().parent().prev().find(".well").each(function(){
				$(this).find("input").each(function(){  
					var text = $(this).attr("name");
					var name = text.substring(0, getPosition(text, "[", 2) +1) + i + text.substring(getPosition(text, "]", 2), text.length);
					$(this).attr("name", name);
				});
				i++;
			});
		});
		
		$(document.body).on("click", ".remove2", function () {
			if(confirm("Are you sure to remove?") == true){
			   var parent_div = $(this).parent().parent();	
			   $(this).parent().remove();
			   var i = 0;
			   parent_div.find(".well").each(function(){
					$(this).find("input").each(function(){  
						var text = $(this).attr("name");
						var name = text.substring(0, text.indexOf("[")+1) + i + text.substring(text.indexOf("]"), text.length);
						$(this).attr("name", name);
					});
					i++;
				});
			}
       });
	});
</script>

