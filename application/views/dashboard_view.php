 <?php
//
$this->load->view('header_view');
$this->load->view('user_left_view_dashboard');
?>

<!--content panel start-->
<section class="col-md-9" style="min-height: 395px;">
    <div class="dooble-border">
        <div class="page-header_ dashboard_type-new">
			<?php if(empty($dashboard_type)){ ?>
				<div class="panel">
					 <h1 class="header_text">Dashboard is an Information Management Tool that gives you access to</h1>
				</div>
				<div class="text-justify">
				<ul>
					<li>Detailed Analytics of assessments taken by you. Apart from overall score you get graphical analysis of marks obtained by you in various topics. You also get overall score analysis and analysis of your strong and weak topics</li>
					<li>Worksheets or action sheets that you fill while going through various sections of the Placement. You can download these action sheets in the PDF format</li>
				</ul>
				<h3 class="title">Dashboard provides you analytics of assessments taken by you and action sheets filled by you from the following sections:</h3>
				
				<ul>
					<li>Aptitude Development</li>
					<li>CV Building</li>
					<li>Self-Assessment</li>
					<li>Personal Interview</li>
				</ul>
				</div>
				
			<?php } else if($dashboard_type=="aptitude-development"){  ?>
			     <?php //echo $dashboard_type; ?>
				 <!--  update here -->
				 <?php  $nav_type ='test_centre';
                         $user_id = $_SESSION['user_id'];
                        $data = $this->main_model->test_center_node($user_id);
                        $ApptitudePreAssessment = $this->main_model->ApptitudePreAssessment_node($user_id);
                        $ApptitudePostAssessment = $this->main_model->ApptitudePostAssessment_node($user_id);
                        $SubjectPreAssessment = $this->main_model->SubjectPreAssessment_node($user_id);
                        $SubjectPostAssessment = $this->main_model->SubjectPostAssessment_node($user_id);
                        //echo $this->db->last_query();die;
                        $nav_type = 'test_centre';
                        //$return = $this->custom->get_nav_node_crumb(@$data->head_node, $nav_type);
                        $_SESSION['student_test_center_id'] = $data->test_center_head;
                        $assign_package = $data->test_center_node;
                        $assign_package2 = $data->test_center_node2;
                        $assign_package3 = $ApptitudePreAssessment->ApptitudePreAssessment;
                        $assign_package4 = $ApptitudePostAssessment->ApptitudePostAssessment;
                        $assign_package5 = $SubjectPreAssessment->SubjectPreAssessment;
                        $assign_package6 = $SubjectPostAssessment->SubjectPostAssessment;
                        $node_package = $this->main_model->select_with_in($assign_package);
                        $SubjectPostAssessment = $this->main_model->select_with_in($assign_package6);
                        $ApptitudePreAssessment = $this->main_model->select_with_in($assign_package3);
                        $ApptitudePostAssessment = $this->main_model->select_with_in($assign_package4);
                        $SubjectPreAssessment = $this->main_model->select_with_in($assign_package5);
                        $node_package2 = $this->main_model->select_with_in($assign_package2); ?>
				 <div class="aptitude-card">
				    <?php if(!empty($ApptitudePreAssessment)){ ?>
					<h2 class="title">Aptitude Development Pre - Assessment</h2>
					<table class="table aptitude-table">
						<tbody>
						<?php  foreach($ApptitudePreAssessment as $key => $value){ 
						   if($value->id){ ?>
							<tr>
								<td><?php echo $value->name; ?></td>
								<td width="150" align="right"><a target="_blank" href="<?php echo base_url().'node'.'/'.$nav_type."/".$value->id; ?>" class="btn btn-green">
								<?php if(!in_array($value->id, $quiz_nodeids) ){  ?>
								   Start Quiz
								<?php } else if(in_array($value->id, $quiz_submitted)){ ?>
								   Quiz Analytics
								<?php } else { ?>
								   Reset & Continue
								<?php } ?>
								</a></td>
							</tr>
						   <?php } } ?>	
							
						</tbody>
					</table>
					<?php }  ?>
					
					<?php if(!empty($ApptitudePostAssessment)){ ?>
					<h2 class="title">Aptitude Development Post - Assessment</h2>
					<table class="table aptitude-table">
						<tbody>
						<?php  foreach($ApptitudePostAssessment as $key => $value){ 
						   if($value->id){ ?>
							<tr>
								<td><?php echo $value->name; ?></td>
								<td width="150" align="right"><a target="_blank" href="<?php echo base_url().'node'.'/'.$nav_type."/".$value->id; ?>" class="btn btn-green">
								<?php if(!in_array($value->id, $quiz_nodeids) ){  ?>
								   Start Quiz
								<?php } else if(in_array($value->id, $quiz_submitted)){ ?>
								   Quiz Analytics
								<?php } else { ?>
								   Reset & Continue
								<?php } ?>
								</a></td>
							</tr>
						   <?php } } ?>	
							
						</tbody>
					</table>
					<?php }  ?>
					
					<?php if(!empty($SubjectPreAssessment)){ ?>
					<h2 class="title">Subject Pre-Assessment</h2>
					<table class="table aptitude-table">
						<tbody>
						<?php  foreach($SubjectPreAssessment as $key => $value){ 
						   if($value->id){ ?>
							<tr>
								<td><?php echo $value->name; ?></td>
								<td width="150" align="right"><a target="_blank" href="<?php echo base_url().'node'.'/'.$nav_type."/".$value->id; ?>" class="btn btn-green">
								<?php if(!in_array($value->id, $quiz_nodeids) ){  ?>
								   Start Quiz
								<?php } else if(in_array($value->id, $quiz_submitted)){ ?>
								   Quiz Analytics
								<?php } else { ?>
								   Reset & Continue
								<?php } ?>
								</a></td>
							</tr>
						   <?php } } ?>	
							
						</tbody>
					</table>
					<?php }  ?>
					
					<?php if(!empty($SubjectPostAssessment)){ ?>
					<h2 class="title">Subject Post-Assessment</h2>
					<table class="table aptitude-table">
						<tbody>
						<?php  foreach($SubjectPostAssessment as $key => $value){ 
						   if($value->id){ ?>
							<tr>
								<td><?php echo $value->name; ?></td>
								<td width="150" align="right"><a target="_blank" href="<?php echo base_url().'node'.'/'.$nav_type."/".$value->id; ?>" class="btn btn-green">
								<?php if(!in_array($value->id, $quiz_nodeids) ){  ?>
								   Start Quiz
								<?php } else if(in_array($value->id, $quiz_submitted)){ ?>
								   Quiz Analytics
								<?php } else { ?>
								   Reset & Continue
								<?php } ?>
								</a></td>
							</tr>
						   <?php } } ?>	
							
						</tbody>
					</table>
					<?php }  ?>
					
				 </div>
			<?php } else if($dashboard_type=="employment-documentation"){  ?>
			     <div class="aptitude-card">
					<h2 class="title">Employment Documentation</h2>
					<table class="table aptitude-table">
						<tbody>
							<tr>
								<td>Email Cover Letter</td>
								<td width="150" align="right"><a target="_blank" href="<?php echo site_url("sheets/sheets/66"); ?>" class="btn btn-green">Download</a></td>  
							</tr>
							<tr>
								<td>Curriculum Vitae</td>
								<td align="right"><a target="_blank" href="<?php echo site_url("cv"); ?>" class="btn btn-green">Download</a></td>
							</tr>
						</tbody>
					</table>
					
				 </div>
			<?php } else if($dashboard_type=="self-assessment"){  ?>
			     <div class="aptitude-card">
					<h2 class="title">Self-Assessment Program</h2>
					<table class="table aptitude-table">
						<tbody>
						
							<tr>
								<td>Work Motivations</td>
								<td width="150" align="right"><a target="_blank" href="<?php if(!in_array(6, $submmitted_sheet_ids) ){ echo site_url("sheets/sheets/6"); } else { echo site_url("sheets_pdf/sheets/6");} ?>" class="btn btn-green" <?php if(!in_array(6, $submmitted_sheet_ids) ){ ?> onclick="return confirm('You have not filled your sheet. Click ok to continue?')" <?php }  ?> >Download</a></td> 
								
							</tr>
							<tr>
								<td>Values</td>
								<td width="150" align="right"><a target="_blank" href="<?php if(!in_array(35, $submmitted_sheet_ids) ){ echo site_url("sheets/sheets/35"); } else { echo site_url("sheets_pdf/sheets/35");} ?>" class="btn btn-green"  <?php if(!in_array(35, $submmitted_sheet_ids) ){ ?> onclick="return confirm('You have not filled your sheet. Click ok to continue?')" <?php }  ?> >Download</a></td> 
							</tr>
							<tr>
								<td>Values Gap</td>
								<td width="150" align="right"><a target="_blank" href="<?php if(!in_array(36, $submmitted_sheet_ids) ){ echo site_url("sheets/sheets/36"); } else { echo site_url("sheets_pdf/sheets/36");} ?>" class="btn btn-green" <?php if(!in_array(36, $submmitted_sheet_ids) ){ ?> onclick="return confirm('You have not filled your sheet. Click ok to continue?')" <?php }  ?> >Download</a></td> 
							</tr>
							<tr>
								<td>Skills</td>
								<td width="150" align="right"><a target="_blank" href="<?php if(!in_array(37, $submmitted_sheet_ids) ){ echo site_url("sheets/sheets/37"); } else { echo site_url("sheets_pdf/sheets/37");} ?>" class="btn btn-green" <?php if(!in_array(37, $submmitted_sheet_ids) ){ ?> onclick="return confirm('You have not filled your sheet. Click ok to continue?')" <?php }  ?> >Download</a></td> 
							</tr>
							<tr>
								<td>Skills Gap</td>
								<td width="150" align="right"><a target="_blank" href="<?php if(!in_array(38, $submmitted_sheet_ids) ){ echo site_url("sheets/sheets/38"); } else { echo site_url("sheets_pdf/sheets/38");} ?>" class="btn btn-green" <?php if(!in_array(38, $submmitted_sheet_ids) ){ ?> onclick="return confirm('You have not filled your sheet. Click ok to continue?')" <?php }  ?> >Download</a></td>
							</tr>
							<tr>
								<td>Strengths</td>
								<td width="150" align="right"><a target="_blank" href="<?php if(!in_array(39, $submmitted_sheet_ids) ){ echo site_url("sheets/sheets/39"); } else { echo site_url("sheets_pdf/sheets/39");} ?>" class="btn btn-green" <?php if(!in_array(39, $submmitted_sheet_ids) ){ ?> onclick="return confirm('You have not filled your sheet. Click ok to continue?')" <?php }  ?> >Download</a></td>
							</tr>
							<tr>
								<td>Strengths Gap</td>
								<td width="150" align="right"><a target="_blank" href="<?php if(!in_array(40, $submmitted_sheet_ids) ){ echo site_url("sheets/sheets/40"); } else { echo site_url("sheets_pdf/sheets/40");} ?>" class="btn btn-green" <?php if(!in_array(40, $submmitted_sheet_ids) ){ ?> onclick="return confirm('You have not filled your sheet. Click ok to continue?')" <?php }  ?> >Download</a></td>
							</tr>
							<tr>
								<td>Attitude</td>
								<td width="150" align="right"><a target="_blank" href="<?php if(!in_array(41, $submmitted_sheet_ids) ){ echo site_url("sheets/sheets/41"); } else { echo site_url("sheets_pdf/sheets/41");} ?>" class="btn btn-green" <?php if(!in_array(41, $submmitted_sheet_ids) ){ ?> onclick="return confirm('You have not filled your sheet. Click ok to continue?')" <?php }  ?> >Download</a></td>
							</tr>
							
							<tr>
								<td>Hobbies</td>
								<td width="150" align="right"><a target="_blank" href="<?php if(!in_array(4, $submmitted_sheet_ids) ){ echo site_url("sheets/sheets/4"); } else { echo site_url("sheets_pdf/sheets/4");} ?>" class="btn btn-green" <?php if(!in_array(4, $submmitted_sheet_ids) ){ ?> onclick="return confirm('You have not filled your sheet. Click ok to continue?')" <?php }  ?> >Download</a></td>
							</tr>
							<tr>
								<td>Etiquette</td>
								<td width="150" align="right"><a target="_blank" href="<?php if(!in_array(45, $submmitted_sheet_ids) ){ echo site_url("sheets/sheets/45"); } else { echo site_url("sheets_pdf/sheets/45");} ?>" class="btn btn-green" <?php if(!in_array(45, $submmitted_sheet_ids) ){ ?> onclick="return confirm('You have not filled your sheet. Click ok to continue?')" <?php }  ?> >Download</a></td>
							</tr>
							<tr>
								<td>Etiquette Gap</td>
								<td width="150" align="right"><a target="_blank" href="<?php if(!in_array(46, $submmitted_sheet_ids) ){ echo site_url("sheets/sheets/46"); } else { echo site_url("sheets_pdf/sheets/46");} ?>" class="btn btn-green" <?php if(!in_array(46, $submmitted_sheet_ids) ){ ?> onclick="return confirm('You have not filled your sheet. Click ok to continue?')" <?php }  ?> >Download</a></td>
							</tr>
							<tr>
								<td>Wellness</td>
								<td width="150" align="right"><a target="_blank" href="<?php if(!in_array(43, $submmitted_sheet_ids) ){ echo site_url("sheets/sheets/43"); } else { echo site_url("sheets_pdf/sheets/43");} ?>" class="btn btn-green"  <?php if(!in_array(43, $submmitted_sheet_ids) ){ ?> onclick="return confirm('You have not filled your sheet. Click ok to continue?')" <?php }  ?> >Download</a></td>
							</tr>
							<tr>
								<td>Wellness Gap</td>
								<td width="150" align="right"><a target="_blank" href="<?php if(!in_array(28, $submmitted_sheet_ids) ){ echo site_url("sheets/sheets/28"); } else { echo site_url("sheets_pdf/sheets/28");} ?>" class="btn btn-green" <?php if(!in_array(28, $submmitted_sheet_ids) ){ ?> onclick="return confirm('You have not filled your sheet. Click ok to continue?')" <?php }  ?> >Download</a></td>
							</tr>
							<tr>
								<td>Intelligence</td>
								<td width="150" align="right"><a target="_blank" href="<?php if(!in_array(31, $submmitted_sheet_ids) ){ echo site_url("sheets/sheets/31"); } else { echo site_url("sheets_pdf/sheets/31");} ?>" class="btn btn-green"  <?php if(!in_array(31, $submmitted_sheet_ids) ){ ?> onclick="return confirm('You have not filled your sheet. Click ok to continue?')" <?php }  ?> >Download</a></td>
							</tr>
							<tr>
								<td>Intelligence Gap</td>
								<td width="150" align="right"><a target="_blank" href="<?php if(!in_array(18, $submmitted_sheet_ids) ){ echo site_url("sheets/sheets/18"); } else { echo site_url("sheets_pdf/sheets/18");} ?>" class="btn btn-green" <?php if(!in_array(18, $submmitted_sheet_ids) ){ ?> onclick="return confirm('You have not filled your sheet. Click ok to continue?')" <?php }  ?> >Download</a></td>
							</tr>
							<tr>
								<td>Areas of Improvement</td>
								<td width="150" align="right"><a target="_blank" href="<?php if(!in_array(1262, $submmitted_sheet_ids) ){ echo site_url("sheets/sheets/1262"); } else { echo site_url("sheets_pdf/sheets/1262");} ?>" class="btn btn-green" <?php if(!in_array(1262, $submmitted_sheet_ids) ){ ?> onclick="return confirm('You have not filled your sheet. Click ok to continue?')" <?php }  ?> >Download</a></td>
							</tr>
							<tr>
								<td>Goals</td>
								<td width="150" align="right"><a target="_blank" href="<?php if(!in_array(34, $submmitted_sheet_ids) ){ echo site_url("sheets/sheets/34"); } else { echo site_url("sheets_pdf/sheets/34");} ?>" class="btn btn-green" <?php if(!in_array(34, $submmitted_sheet_ids) ){ ?> onclick="return confirm('You have not filled your sheet. Click ok to continue?')" <?php }  ?> >Download</a></td>
							</tr>
							<tr>
								<td>Personal SWOT Analysis</td>
								<td width="150" align="right"><a target="_blank" href="<?php if(!in_array(8, $submmitted_sheet_ids) ){ echo site_url("sheets/sheets/8"); } else { echo site_url("sheets_pdf/sheets/8");} ?>" class="btn btn-green" <?php if(!in_array(8, $submmitted_sheet_ids) ){ ?> onclick="return confirm('You have not filled your sheet. Click ok to continue?')" <?php }  ?> >Download</a></td>
							</tr>
							<tr>
								<td>PEST Analysis</td>
								<td width="150" align="right"><a target="_blank" href="<?php if(!in_array(65, $submmitted_sheet_ids) ){ echo site_url("sheets/sheets/65"); } else { echo site_url("sheets_pdf/sheets/65");} ?>" class="btn btn-green" <?php if(!in_array(65, $submmitted_sheet_ids) ){ ?> onclick="return confirm('You have not filled your sheet. Click ok to continue?')" <?php }  ?> >Download</a></td>  
							</tr>
							<tr>
								<td>Self-Assessment Report</td>
								<td align="right"><a target="_blank" href="<?php echo site_url("pdf_generation_action_sheet"); ?>" class="btn btn-green">Download</a></td>
							</tr>
						</tbody>
					</table>
					
				 </div>
			<?php } else if($dashboard_type=="personal-interview"){  ?>
			     <div class="aptitude-card">
					<h2 class="title">Personal Interview</h2>
					<table class="table aptitude-table">
						<tbody>
							<tr>
								<td>My Asset Inventory</td>
								<td width="150" align="right"><a target="_blank" href="<?php echo site_url("sheets/sheets/98"); ?>" class="btn btn-green">Download</a></td>  
							</tr>
							<tr>
								<td>Self-Introduction</td>
								<td align="right"><a target="_blank" href="<?php echo site_url("sheets/sheets/103"); ?>" class="btn btn-green">Download</a></td>
							</tr>
							<tr>
								<td>Domain Pre-Assessment</td>
								<td align="right"><a target="_blank" href="#<?php //echo site_url("cv"); ?>" class="btn btn-green">Download</a></td>
							</tr>
							<tr>
								<td>Domain Post-Assessment</td>
								<td align="right"><a target="_blank" href="#<?php //echo site_url("cv"); ?>" class="btn btn-green">Download</a></td>
							</tr>
						</tbody>
					</table>
					
				 </div>
			<?php }  ?>
        </div>        
    </div>
</section>
<?php $this->load->view('footer_view'); ?>
