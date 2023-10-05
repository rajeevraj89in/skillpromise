<?php

$this->load->view('header_view');
 $this->load->view('home_left_view');
?>

   <!--cv content-->
   <div class="col-md-8">
   		<div class="row">
   			<h1 class="page-header">Curriculum Vitae Action Sheet</h1>
   			<p>Please Save your information after every section by clicking on “Save as Draft”</p>
 
   			<div class="col-md-12">
   				<form>
   					<div class="panel">
		                <h5 class="header_text">Basic Information</h5>
		            </div>
   					<div class="row">
   						<!--set -->
						  <div class="form-group col-md-6">
						    <label for="">Name</label>
						    <input type="text" class="form-control" id="" placeholder="Full Name">
						  </div> 
						  <div class="form-group col-md-6">
						    <label for="">Handheld/ Mobile Number</label>
						    <input type="text" class="form-control" id="" placeholder="Contact Number">
						  </div>
						 <!--set end-->
						 <!--set -->
						  <div class="form-group col-md-6">
						    <label for="">Email Address</label>
						    <input type="email" class="form-control" id="" placeholder="Email">
						  </div>  
						 <!--set end-->
							<div class="col-md-12">
							  <button type="submit" class="btn btn-success">Save as Draft</button>
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
								    <input type="radio" class="obj" name="optionsRadios" id="optionsRadios1" value="option1">
								    Professional Snapshot (For people with work experience)
								  </label>
								</div>
								<div class="radio">
								  <label>
								    <input type="radio" class="obj" name="optionsRadios" id="optionsRadios2" value="option2">
								    Career Objective (For Fresher’s)
								  </label>
								</div>
							</div> 
							 <!--set end-->


							 <!-- Show hide div-->
							 <div class="col-md-12" id="obj_type" style="display:none;">
							 	<div class="row">
									<div class="col-md-12">
									  <div class="radio">
										  <label>
										    <input type="radio" class="obj_type" name="obj_type" id="optionsRadios1" value="Paragraph">
										    Paragraph Form
										  </label>
										</div>
										<div class="radio">
										  <label>
										    <input type="radio" class="obj_type" name="obj_type" id="optionsRadios2" value="bullet">
										    Bullet Points
										  </label>
										</div>
									</div> 


								</div>
							</div>
							 <!-- Show hide div end-->
							 
							 
							 <div class="col-md-12" id="paragraph" style="display:none;">
							 	<div class="row">
								 <div class="form-group col-md-12">
									  <textarea  class="form-control"></textarea>
									</div> 


								</div>
							</div>
							<div class="col-md-12" id="bullet" style="display:none;">
							 	<div class="row">
									  <div class="form-group col-md-12">
									    <input type="text" class="form-control" id="" placeholder="">
									    <span class="help-block"><a href="#!">Add More...</a></span>
									  </div>  
									


								</div>
							</div>

								<div class="col-md-12">
								  <button type="submit" class="btn btn-success">Save as Draft</button>
								</div>

						</div> 
						<br><br>


						<div class="panel">
		                	<h5 class="header_text">Work Experience</h5>
			            </div>
	   					<div class="row">
	   						<!--set -->
	   						<div class="col-md-12">
							  <div class="checkbox">
								  <label>
								    <input type="checkbox" name="optionsRadios" id="optionsRadios1" value="option1" checked>
								    Work Experience
								  </label>
								</div>
								<div class="checkbox">
								  <label>
								    <input type="checkbox" name="optionsRadios" id="optionsRadios2" value="option2">
								    Internships
								  </label>
								</div>
							</div> 
							 <!--set end-->

							 <!-- Show hide div-->
							 <div class="col-md-12">
							 	<p>Please mention your work experience in Reverse Chronological Order</p>
							 	<div class="row">
							 		<!--set -->
									  <div class="form-group col-md-12">
									    <label for="">Name of the Organization</label>
									    <input type="text" class="form-control" id="" placeholder="">
									  </div> 
									  <div class="form-group col-md-12">
									    <label for="">Duration</label>
									    <input type="text" class="form-control" id="" placeholder="">
									  </div>
									 <!--set end-->
									 <!--set -->
									  <div class="form-group col-md-12">
									    <label for="">Designation</label>
									    <input type="text" class="form-control" id="" placeholder="">
									  </div>  
									 <!--set end-->
									 <!--set -->
									  <div class="form-group col-md-12">
									    <label for="">Location</label>
									    <input type="text" class="form-control" id="" placeholder="">
									  </div>  
									 <!--set end-->
									 <!--set -->
									  <div class="form-group col-md-12">
									    <label for="">Key Responsibilities (Suggested: Mention upto 5)</label>
									    <input type="text" class="form-control" id="" placeholder="">
									    <span class="help-block"><a href="#!">Add More...</a></span>
									  </div>   
									  <!--set end-->
									 <!--set -->
									  <div class="form-group col-md-12">
									    <label for="">Achievements (Suggested: Mention upto 5)</label>
									    <input type="text" class="form-control" id="" placeholder="">
									    <span class="help-block"><a href="#!">Add More...</a></span>
									  </div>  
									 <!--set end-->  
							 	</div>
							 </div>
							 <!-- Show hide div end--> 

							<div class="col-md-12">
							  <button type="submit" class="btn btn-success">Save as Draft</button>
							</div>

						</div>


				</form>
   			</div>
   		</div>

   </div>
   <!--cv content end--> 

<?php
$this->load->view('footer_view');
?>
<script>
    
     $(document.body).on("click", ".obj", function () {
         //alert("jyoti");
                $("#obj_type").show();

            });
            
     $(document.body).on("click", ".obj_type", function () {
       //  alert($(this).val());
         if($(this).val() == "bullet"){
               $("#bullet").show();
               $("#paragraph").hide();
         }
       
         else{
         $("#paragraph").show();
          $("#bullet").hide();
         }
            });
</script>