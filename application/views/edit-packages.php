<?php
$this->load->view('header_view');
$this->load->view('manager_left_view');
$details = $this->main_model->get_records_from_id("packages", $id, 'id');
$node_data = $this->main_model->select('node','id,header,name','id',array('parent_id'=>'0', 'is_deleted'=>'0', 'type'=>'Module'));
$programe_node = explode(',',$details['programe_node']);
$programe_node = explode(',',$details['programe_node']);
$faqCore = explode(',',$details['FAQsCoreDomain']);
$resource_center_nodes = (!empty( $details['resource_center_nodes'] ))?explode(',', $details['resource_center_nodes']):array();

$assessment_data = $this->main_model->select('node', 'id,header,name', 'id', array( 'is_deleted'=>'0', 'type'=>'Quiz') );

$action_sheets_data = $this->main_model->get_package_action_sheets();
$assessment_data = array_merge($assessment_data,$action_sheets_data);
//$assessment_data = $this->main_model->select('node', 'id,header,name', 'id', array( 'is_deleted'=>'0'), "type", array('quiz', 'sheet') );

$assessment_node = explode(',',$details['test_center_node']);
$ApptitudePreAssessment = explode(',',$details['ApptitudePreAssessment']);
$ApptitudePostAssessment = explode(',',$details['ApptitudePostAssessment']);
$SubjectPreAssessment = explode(',',$details['SubjectPreAssessment']);
$SubjectPostAssessment = explode(',',$details['SubjectPostAssessment']);

$assessment_center_home_data = $this->main_model->get_assessment_center_options();

//$assessment_data = $this->main_model->select('node','id,header,name','id',array('parent_id'=>'0', 'is_deleted'=>'0', 'type'=>'Quiz'));
$test_center_node2 = explode(',',$details['test_center_node2']);
// echo "<pre>";
// print_r($details);
// print_r($programe_node);
?>
<!--content panel start -->
<section class="col-md-9">
    <h1 class="page-header">Edit Package</h1>

    <!-- add-program-form content -->
    <div class="row">
        <div class="col-md-12">
            <form enctype="multipart/form-data"  class="form-horizontal" autocomplete="off" role="form"  action="<?php echo base_url(); ?>set/packages" method="POST" onsubmit="return check()">
            <input type="hidden" id="edit_id" name="id" value = "<?php echo $id; ?>" />
			
            <input type="hidden" id="test_center_node" name="test_center_node" value = "" />
            <input type="hidden" id="test_center_node2" name="test_center_node2" value = "" /> 
                
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Select Package Master</label>
                    <div class="col-sm-9">
                        <select name="package_master_id" id="package_master_id" onchange="get_subID(this.value)" class="form-control" required>
                            <option value="">Select Package Master</option>
                            <?php
                                if($package_master){
                                    foreach($package_master as $key => $value){
                                        ?>
                                        <option <?php if($value->id == $package_master_id){echo "selected";} ?> value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>
                                        <?php
                                    }
                                }
                            ?>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Select Sub Package Master</label>
                    <div class="col-sm-9">
                        <select name="package_sub_master_id" id="package_sub_master_id" class="form-control" required>
                            
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Package Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Package Name" required value = "<?php echo $details['name']; ?>">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Select Programes HomePage</label>
                    <div class="col-sm-9">
                       <select class="form-control" name="head_node" required>
                           <option value="">Select Home Page</option>
                           <?php
                            if(!empty($node_data)){
                                foreach($node_data as $nkey => $nvalue){
                                    ?>
                                    <option <?php if($nvalue->id == $details['head_node']){echo "selected";} ?> value="<?php echo $nvalue->id; ?>"><?php echo $nvalue->name; ?></option>
                                    <?php
                                }
                            }
                           ?>
                       </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Select Programes</label>
                    <div class="col-sm-9">
                         
                       <select class="form-control chosen-select" name="programe_node[]" id="programe_node" multiple required>
                          <?php
						    $programe_node_arr =  array();
                            if(!empty($node_data)){
                                foreach($node_data as $nkey => $nvalue){
									 if(in_array($nvalue->id, $programe_node)){
										 $temp_arr = array();
										 $temp_arr['id'] = $nvalue->id;
										 $temp_arr['text'] = $nvalue->name;
										$programe_node_arr[] = $temp_arr; 
									 }
                                    /*if(in_array($nvalue->id,$programe_node)){
                                        ?>
                                        <option value="<?php echo $nvalue->id; ?>" selected='selected'><?php echo $nvalue->name; ?></option>
                                        <?php
                                    }else{*/
                                       ?>
                                        <option value="<?php echo $nvalue->id; ?>"><?php echo $nvalue->name; ?></option>
                                    <?php 
                                    //}
                                    
                                }
                            }
                          ?>
                       </select>
                    </div>
                </div>
				
				
				<div class="form-group">
                    <label for="resource_center_head" class="col-sm-3 control-label" >Select Resource Center HomePage</label>
                    <div class="col-sm-9">
                       <select class="form-control" name="resource_center_head" >
                           <option value="">Select Resource Center Home Page</option>
                           <?php
                            if(!empty($node_data)){
                                foreach($node_data as $nkey => $nvalue){
                                    ?>
                                    <option <?php if($nvalue->id == $details['resource_center_head']){echo "selected";} ?> value="<?php echo $nvalue->id; ?>"><?php echo $nvalue->name; ?></option>
                                    <?php
                                }
                            }
                           ?>
                       </select>
                    </div>
                </div>
				
				
				<div class="form-group">
                    <label for="resource_center_nodes" class="col-sm-3 control-label" >Select Resource Center Nodes</label>
                    <div class="col-sm-9">
                         
                       <select class="form-control chosen-select" name="resource_center_nodes[]" id="resource_center_nodes" multiple >
                          <?php
						    $resource_center_nodes_arr =  array();
                            if(!empty($node_data)){
                                foreach($node_data as $nkey => $nvalue){
									 if(in_array($nvalue->id, $resource_center_nodes)){
										 $temp_arr = array();
										 $temp_arr['id'] = $nvalue->id;
										 $temp_arr['text'] = $nvalue->name;
										$resource_center_nodes_arr[] = $temp_arr; 
									 }
                                    /*if(in_array($nvalue->id,$programe_node)){
                                        ?>
                                        <option value="<?php echo $nvalue->id; ?>" selected='selected'><?php echo $nvalue->name; ?></option>
                                        <?php
                                    }else{*/
                                       ?>
                                        <option value="<?php echo $nvalue->id; ?>"><?php echo $nvalue->name; ?></option>
                                    <?php 
                                    //}
                                    
                                }
                            }
                          ?>
                       </select>
                    </div>
                </div>
				
                
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">FAQs Core Domain</label>
                    <div class="col-sm-9">
                         
                       <select class="form-control chosen-select" name="FAQsCoreDomain[]" multiple >
                          <?php
                            if(!empty($node_data)){
                                foreach($node_data as $nkey => $nvalue){
                                    if(in_array($nvalue->id,$faqCore)){
                                        ?>
                                        <option value="<?php echo $nvalue->id; ?>" selected='selected'><?php echo $nvalue->name; ?></option>
                                        <?php
                                    }else{
                                       ?>
                                        <option value="<?php echo $nvalue->id; ?>"><?php echo $nvalue->name; ?></option>
                                    <?php 
                                    }
                                    
                                }
                            }
                          ?>
                       </select>
                    </div>
                </div>
                
                 <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">FAQs Non Core Domain</label>
                    <div class="col-sm-9">
                         
                       <select class="form-control chosen-select" name="FAQsNonCoreDomain[]" multiple >
                          <?php
                            if(!empty($node_data)){
                                foreach($node_data as $nkey => $nvalue){
                                    if(in_array($nvalue->id,$faqNonCore)){
                                        ?>
                                        <option value="<?php echo $nvalue->id; ?>" selected='selected'><?php echo $nvalue->name; ?></option>
                                        <?php
                                    }else{
                                       ?>
                                        <option value="<?php echo $nvalue->id; ?>"><?php echo $nvalue->name; ?></option>
                                    <?php 
                                    }
                                    
                                }
                            }
                          ?>
                       </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Select Assessment Center HomePage</label>
                    <div class="col-sm-9">
                       <select class="form-control" name="test_center_head" >
                           <option value="0">Select Home Page</option>
                           <?php
                            if(!empty($assessment_center_home_data)){
                                foreach($assessment_center_home_data as $akey => $avalue){
                                    ?>
                                    <option <?php if($avalue->id == $details['test_center_head']){echo "selected";} ?> value="<?php echo $avalue->id; ?>"><?php echo $avalue->name; ?></option>
                                    <?php
                                }
                            }
                           ?>
                       </select>
                    </div>
                </div>
                <?php /*
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Select Test</label>
                    <div class="col-sm-9">
                         
                       <select class="form-control chosen-select" name="test_center_node[]" multiple required>
                          <?php
                            if(!empty($assessment_data)){
                                foreach($assessment_data as $akey => $avalue){
                                    if(in_array($avalue->id,$assessment_node)){
                                        ?>
                                        <option value="<?php echo $avalue->id; ?>" selected='selected'><?php echo $avalue->name; ?></option>
                                        <?php
                                    }else{
                                       ?>
                                        <option value="<?php echo $avalue->id; ?>"><?php echo $avalue->name; ?></option>
                                    <?php 
                                    }
                                }
                            }
                          ?>
                       </select>
                    </div>
                </div> */  ?>
                
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Apptitude Pre Assessment</label>
                    <div class="col-sm-9">
                         
                       <select class="form-control chosen-select" name="ApptitudePreAssessment[]" multiple >
                          <?php
                            if(!empty($assessment_data)){
                                foreach($assessment_data as $akey => $avalue){
                                    if(in_array($avalue->id,$ApptitudePreAssessment)){
                                        ?>
                                        <option value="<?php echo $avalue->id; ?>" selected='selected'><?php echo $avalue->name; ?></option>
                                        <?php
                                    }else{
                                       ?>
                                        <option value="<?php echo $avalue->id; ?>"><?php echo $avalue->name; ?></option>
                                    <?php 
                                    }
                                }
                            }
                          ?>
                       </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Apptitude Post Assessment</label>
                    <div class="col-sm-9">
                         
                       <select class="form-control chosen-select" name="ApptitudePostAssessment[]" multiple >
                          <?php
                            if(!empty($assessment_data)){
                                foreach($assessment_data as $akey => $avalue){
                                    if(in_array($avalue->id,$ApptitudePostAssessment)){
                                        ?>
                                        <option value="<?php echo $avalue->id; ?>" selected='selected'><?php echo $avalue->name; ?></option>
                                        <?php
                                    }else{
                                       ?>
                                        <option value="<?php echo $avalue->id; ?>"><?php echo $avalue->name; ?></option>
                                    <?php 
                                    }
                                }
                            }
                          ?>
                       </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Subject Pre Assessment</label>
                    <div class="col-sm-9">
                         
                       <select class="form-control chosen-select" name="SubjectPreAssessment[]" multiple >
                          <?php
                            if(!empty($assessment_data)){
                                foreach($assessment_data as $akey => $avalue){
                                    if(in_array($avalue->id,$SubjectPreAssessment)){
                                        ?>
                                        <option value="<?php echo $avalue->id; ?>" selected='selected'><?php echo $avalue->name; ?></option>
                                        <?php
                                    }else{
                                       ?>
                                        <option value="<?php echo $avalue->id; ?>"><?php echo $avalue->name; ?></option>
                                    <?php 
                                    }
                                }
                            }
                          ?>
                       </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Subject Post Assessment</label>
                    <div class="col-sm-9">
                         
                       <select class="form-control chosen-select" name="SubjectPostAssessment[]" multiple >
                          <?php
                            if(!empty($assessment_data)){
                                foreach($assessment_data as $akey => $avalue){
                                    if(in_array($avalue->id,$SubjectPostAssessment)){
                                        ?>
                                        <option value="<?php echo $avalue->id; ?>" selected='selected'><?php echo $avalue->name; ?></option>
                                        <?php
                                    }else{
                                       ?>
                                        <option value="<?php echo $avalue->id; ?>"><?php echo $avalue->name; ?></option>
                                    <?php 
                                    }
                                }
                            }
                          ?>
                       </select>
                    </div>
                </div>
                <?php /*
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Domain/ Subject Assessment Center</label>
                    <div class="col-sm-9">
                         
                       <select class="form-control chosen-select" name="test_center_node2[]" multiple required>
                          <?php
                            if(!empty($assessment_data)){
                                foreach($assessment_data as $akey => $avalue){
                                    if(in_array($avalue->id,$test_center_node2)){
                                        ?>
                                        <option value="<?php echo $avalue->id; ?>" selected='selected'><?php echo $avalue->name; ?></option>
                                        <?php
                                    }else{
                                       ?>
                                        <option value="<?php echo $avalue->id; ?>"><?php echo $avalue->name; ?></option>
                                    <?php 
                                    }
                                }
                            }
                          ?>
                       </select>
                    </div>
                </div> */  ?>
                
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Add YouTube Video Link</label>
                    <div class="col-sm-9">
                       <textarea class="form-control" name="video_link"><?php echo $details['video_link']; ?></textarea>
                    </div>
                </div>
               
                <div class="form-group">
                    <label for="detailed_desc" class="col-sm-3 control-label">Package Description</label>
                    <div class="col-sm-9">
                        <textarea class="form-control editor" id="detailed_desc"  name="detailed_desc" placeholder="Description" ><?php echo $details['detailed_desc']; ?></textarea>
                    </div>
                </div>
				<div class="form-group">
                    <label for="heading" class="col-sm-3 control-label">Heading</label>
                    <div class="col-sm-9">
                        <textarea class="form-control editor" id="heading"  name="heading" placeholder="Heading" ><?php echo $details['heading']; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="detailed_desc" class="col-sm-3 control-label">Learning Objectives</label>
                    <div class="col-sm-9">
                        <textarea class="form-control editor" id="learning_objectives"  name="learning_objectives" placeholder="Learning Objectives" ><?php echo $details['learning_objectives']; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="detailed_desc" class="col-sm-3 control-label">Program Benefits</label>
                    <div class="col-sm-9">
                        <textarea class="form-control editor" id="program_benefits"  name="program_benefits" placeholder="Program Benefits" ><?php echo $details['program_benefits']; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="detailed_desc" class="col-sm-3 control-label">Course Content</label>
                    <div class="col-sm-9">
                        <textarea class="form-control editor" id="course_content"  name="course_content" placeholder="Course Content" ><?php echo $details['course_content']; ?></textarea>
                    </div>
                </div>
				
				<div class="form-group">
                    <label for="heading_plus" class="col-sm-3 control-label">Heading (Plus)</label>
                    <div class="col-sm-9">
                        <textarea class="form-control editor" id="heading_plus"  name="heading_plus" placeholder="Heading" ><?php echo $details['heading_plus']; ?></textarea>
                    </div>
                </div> 
                <div class="form-group">
                    <label for="learning_objectives_plus" class="col-sm-3 control-label">Learning Objectives (Plus)</label>
                    <div class="col-sm-9">
                        <textarea class="form-control editor" id="learning_objectives_plus"  name="learning_objectives_plus" placeholder="Learning Objectives" ><?php echo $details['learning_objectives_plus']; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="program_benefits_plus" class="col-sm-3 control-label">Program Benefits (Plus)</label>
                    <div class="col-sm-9">
                        <textarea class="form-control editor" id="program_benefits_plus"  name="program_benefits_plus" placeholder="Program Benefits" ><?php echo $details['program_benefits_plus']; ?></textarea>
                    </div>
                </div>
               
               <div class="form-group">
                    <label for="image_file" class="col-sm-3 control-label">Slider Image 1</label>
                    <div class="col-sm-9">
                        <p class="help-block"><img onchange="readURL(this);" src="<?php echo base_url($slider_1); ?>" id="slider1" width="100" height="100" style="" alt="Slider 1"></p>
                        <input type="file" id="slider1_image" name="slider1_image" accept="image/*"  onchange="showMyslider1(this)">
                        <p class="help-block">dimension(w*h):490*275</p>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="image_file" class="col-sm-3 control-label">Slider Image 2</label>
                    <div class="col-sm-9">
                        <p class="help-block"><img onchange="readURL(this);" src="<?php echo base_url($slider_2); ?>" id="slider2" width="100" height="100" style="" alt="Slider 2"></p>
                        <input type="file" id="slider2_image" name="slider2_image" accept="image/*"  onchange="showMyslider2(this)">
                        <p class="help-block">dimension(w*h):490*275</p>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="image_file" class="col-sm-3 control-label">Slider Image 3</label>
                    <div class="col-sm-9">
                        <p class="help-block"><img onchange="readURL(this);" src="<?php echo base_url($slider_3); ?>" id="slider3" width="100" height="100" style="" alt="Slider 3"></p>
                        <input type="file" id="slider3_image" name="slider3_image" accept="image/*"  onchange="showMyslider3(this)">
                        <p class="help-block">dimension(w*h):490*275</p>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="image_file" class="col-sm-3 control-label">Slider Image 4</label>
                    <div class="col-sm-9">
                        <p class="help-block"><img onchange="readURL(this);" src="<?php echo base_url($slider_4); ?>" id="slider4" width="100" height="100" style="" alt="Slider 4"></p>
                        <input type="file" id="slider4_image" name="slider4_image" accept="image/*"  onchange="showMyslider4(this)">
                        <p class="help-block">dimension(w*h):490*275</p>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="image_file" class="col-sm-3 control-label">Slider Image 5</label>
                    <div class="col-sm-9">
                        <p class="help-block"><img onchange="readURL(this);" src="<?php echo base_url($slider_5); ?>" id="slider5" width="100" height="100" style="" alt="Slider 5"></p>
                        <input type="file" id="slider5_image" name="slider5_image" accept="image/*"  onchange="showMyslider5(this)">
                        <p class="help-block">dimension(w*h):490*275</p>
                    </div>
                </div>
               
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Price</label>
                    <div class="col-sm-9 input-group input-group-custom">
                        <div class="input-group-addon"><i class="fa fa-inr"></i></div>
                        <input type="text" class="form-control groupOfTexbox" id="price" name="price" placeholder="Price" value = "<?php echo $details['price']; ?>">
                        <!--<div class="input-group-addon">.00</div>-->
                    </div>
                </div>
				
				<div class="form-group">
                    <label for="price_plus" class="col-sm-3 control-label">Price Plus</label>
                    <div class="col-sm-9 input-group input-group-custom">
                        <div class="input-group-addon"><i class="fa fa-inr"></i></div>
                        <input type="text" class="form-control groupOfTexbox" id="price_plus" name="price_plus" placeholder="Price" value = "<?php echo $details['price_plus']; ?>">
                        <!--<div class="input-group-addon">.00</div>-->
                    </div>
                </div>

                <div class="form-group">
                    <label for="image_file" class="col-sm-3 control-label">Select Image</label>
                    <div class="col-sm-9">
                        <p class="help-block"><img onchange="readURL(this);"src ="<?php echo base_url($image_file); ?>" id="currrentImg" width="100" height="100" style="" alt="Current Image Show"></p>
                        <input type="file" id="image_file" name="image_file" accept="image/*"  onchange="showMyImage(this)">
                        <p class="help-block">dimension(w*h):490*275</p>
                    </div>
                </div>

                

                <div class="form-group">
                    <label class="col-sm-3 control-label">Status</label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" name="status" id="Active" value="Active" checked> Active
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="status" id="Inactive" value="Inactive"> Inactive
                        </label>
                    </div>
                </div>



                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-10">
                        <button type="submit"  class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div><!-- end add-program-form content -->
</section><!-- end col-md-9 -->
<!--end content panel start -->

</div><!-- end bigCallout-->

<!-- End Content and Sidebar
===================================================== -->
</div><!-- end main -->


<?php $this->load->view('footer_view'); ?>
<?php $this->load->view('html_end_view'); ?>
<script>
    $(".chosen-select").select2({
        placeholder: 'Select Programe',
		insertTag: function (data, tag) {
			// Insert the tag at the end of the results
			data.push(tag);
	    }
    });
	
	var program_node = <?php echo json_encode($programe_node); ?>;
	var programe_node_arr = <?php echo json_encode($programe_node_arr); ?>;
	var resource_center_nodes = <?php echo json_encode($resource_center_nodes); ?>;
	//$("#programe_node").val(program_node);
	//$('#programe_node').trigger('change');
	var data = {
	  "id": 2207,
	  "text": "Personal Interview"
	};
	
	$( window ).load(function() {
	    $("#programe_node").val(program_node).trigger('change');
	    $("#resource_center_nodes").val(resource_center_nodes).trigger('change');
	});
    
   $(".chosen-select").on("select2:select", function (evt) {
  /*
  var element = evt.params.data.element;
  var $element = $(element);
  
  $element.detach();
  $(this).append($element);
  $(this).trigger("change");
  */
  ///////////////---
  var element = evt.params.data.element;
          var $element = $(element);

          if ($(this).find(":selected").length > 1) {
            var $second = $(this).find(":selected").eq(-1);
            $second.after($element);
          } else {
            $element.detach();
            $(this).prepend($element);
          }

          $(this).trigger("change");
  
  
});

    $(document).ready(function(){
        var package_master_id = $('#package_master_id').val();
        if(package_master_id != ''){
            get_subID(package_master_id);
        }
    });

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
            ['Misc', ['fullscreen', 'codeview', 'undo', 'redo', 'help', 'print']]
        ], height: 280,
    });
    
    function get_subID(val){
        let div_data = '<option value="">Select Sub Package Master</option>';
        let package_sub_master_id = <?php echo isset($package_sub_master_id)?$package_sub_master_id:0 ?>;
        //alert(package_sub_master_id);
        if(val != ''){
            //alert(val);
            $.ajax({
                url: "<?php echo base_url('get_subMasterData'); ?>",
                method: "POST",
                data: {val:val},
                //contentType: "application/json",
                dataType: "json",
                
                success:function(response){
                    console.log(response);
                    $.each(response,(key,values) =>{
                        if(values.id == package_sub_master_id){
                            div_data += '<option selected value="'+values.id+'">'+values.name+'</option>';
                        }else{
                           div_data += '<option value="'+values.id+'">'+values.name+'</option>'; 
                        }
                        
                    });
                    $('#package_sub_master_id').html(div_data);
                },
                error:function(error){
                    
                },
            });
        }else{
            $('#package_sub_master_id').html(div_data);
        }
    }
    
    
    function showMyImage(fileInput) {
        var files = fileInput.files;
        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var imageType = /image.*/;
            if (!file.type.match(imageType)) {
                continue;
            }
            var img = document.getElementById("currrentImg");
            img.file = file;
            var reader = new FileReader();
            reader.onload = (function (aImg) {
                return function (e) {
                    aImg.src = e.target.result;
                };
            })(img);
            reader.readAsDataURL(file);
        }
    }
    
    function showMyslider1(fileInput) {
        var files = fileInput.files;
        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var imageType = /image.*/;
            if (!file.type.match(imageType)) {
                continue;
            }
            var img = document.getElementById("slider1");
            img.file = file;
            var reader = new FileReader();
            reader.onload = (function (aImg) {
                return function (e) {
                    aImg.src = e.target.result;
                };
            })(img);
            reader.readAsDataURL(file);
        }
    }
    
    function showMyslider2(fileInput) {
        var files = fileInput.files;
        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var imageType = /image.*/;
            if (!file.type.match(imageType)) {
                continue;
            }
            var img = document.getElementById("slider2");
            img.file = file;
            var reader = new FileReader();
            reader.onload = (function (aImg) {
                return function (e) {
                    aImg.src = e.target.result;
                };
            })(img);
            reader.readAsDataURL(file);
        }
    }
    
     function showMyslider3(fileInput) {
        var files = fileInput.files;
        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var imageType = /image.*/;
            if (!file.type.match(imageType)) {
                continue;
            }
            var img = document.getElementById("slider3");
            img.file = file;
            var reader = new FileReader();
            reader.onload = (function (aImg) {
                return function (e) {
                    aImg.src = e.target.result;
                };
            })(img);
            reader.readAsDataURL(file);
        }
    }
    
    function showMyslider4(fileInput) {
        var files = fileInput.files;
        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var imageType = /image.*/;
            if (!file.type.match(imageType)) {
                continue;
            }
            var img = document.getElementById("slider4");
            img.file = file;
            var reader = new FileReader();
            reader.onload = (function (aImg) {
                return function (e) {
                    aImg.src = e.target.result;
                };
            })(img);
            reader.readAsDataURL(file);
        }
    }
    
    function showMyslider5(fileInput) {
        var files = fileInput.files;
        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var imageType = /image.*/;
            if (!file.type.match(imageType)) {
                continue;
            }
            var img = document.getElementById("slider5");
            img.file = file;
            var reader = new FileReader();
            reader.onload = (function (aImg) {
                return function (e) {
                    aImg.src = e.target.result;
                };
            })(img);
            reader.readAsDataURL(file);
        }
    }
    
    function isNumber(evt, element) {
        var intputElements = element.id;
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (
                //(charCode != 45 || $(element).val().indexOf('-') != -1) &&      // “-” CHECK MINUS, AND ONLY ONE.
                        (charCode != 46 || $(element).val().indexOf('.') != -1) && // “.” CHECK DOT, AND ONLY ONE.
                        (charCode < 48 || charCode > 57)) {
            $("#" + intputElements).attr('placeholder', "Digit only...");
            $("#" + intputElements).parent().parent().addClass("has-warning");
            return false;
        } else {
            $("#" + intputElements).parent().parent().removeClass("has-warning");
            return true;
        }
    }

    function isNumberint(evt, element) {
        var intputElements = element.id;
        var charCode = (evt.which) ? evt.which : event.keyCode

        if (
                //(charCode != 45 || $(element).val().indexOf('-') != -1) &&      // “-” CHECK MINUS, AND ONLY ONE.
                        // (charCode != 46 || $(element).val().indexOf('.') != -1) && // “.” CHECK DOT, AND ONLY ONE.
                                (charCode < 48 || charCode > 57)) {
                    $("#" + intputElements).attr('placeholder', "Digit only...");
                    $("#" + intputElements).parent().parent().addClass("has-warning");
                    return false;
                } else {
                    $("#" + intputElements).parent().parent().removeClass("has-warning");
                    return true;
                }
            }
            $(document.body).on("keypress", ".groupOfTexbox", function (event) {
                return isNumber(event, this)

            });
            $(document.body).on("focusout", ".groupOfTexbox", function (event) {
                var intputElements = this.id;
                $("#" + intputElements).parent().parent().removeClass("has-warning");

            });
            $(document.body).on("keypress", ".groupOfint", function (event) {
                return isNumberint(event, this)

            });
            $(document.body).on("focusout", ".groupOfint", function (event) {
                var intputElements = this.id;
                $("#" + intputElements).parent().parent().removeClass("has-warning");

            });

            var parent_id = 0;
            var max_level = 1;
            var parentlevel = 0;
            function createSelect(parentId, noOfChild) {
                noOfChild = parseInt(noOfChild);
                if (noOfChild > 0) {
                    var id = parseInt(parentId);
                    $("#leveldiv1").clone().appendTo("#select_level_outer");
                    max_level++;
                    parentlevel = max_level - 1;
                    $(".level-div").filter(':last').attr('id', "leveldiv" + max_level);
                    $("#leveldiv" + parentlevel).find(".node-select").removeAttr('name');
                    $("#leveldiv" + max_level).find(".control-label").text("Package Category Level-" + max_level);
                    $("#leveldiv" + max_level).find(".control-label").attr('for', "level" + max_level);
                    $("#leveldiv" + max_level).find(".node-select").attr('id', "level" + max_level);
                    $("#leveldiv" + max_level).find(".node-select").attr('name', "category");
                    $("#leveldiv" + max_level).show();
                    initiateAjax('package_category', 'parent_id', id, ['id', 'name'], fillNodeSelect, 'level' + max_level);
                }
            }


            function updateSelect(parentId) {

                requestAjax('no_of_childs_package_category', parentId, createSelect);
//            alert(no_of_childs);
//            no_of_childs = parseInt(no_of_childs);
            }

            function destroy_lower_select(levelId) {
                for (; max_level > levelId; ) {
                    $("#leveldiv" + max_level).remove();
                    max_level--;
                    reset_select_name_field();
                }
            }

            function reset_select_name_field() {
                if (max_level > 1) {
                    for (i = 1; i < max_level; i++) {
                        $("#leveldiv" + i).find(".node-select").removeAttr('name');
                    }
                }
                $("#level" + max_level).attr('name', "parent_id");
            }

            $(document.body).on("change", ".node-select", function () {

                var selectId = $(this).attr("id");
//                alert(selectId);
                var level = parseInt(selectId.substring(5));
                destroy_lower_select(level);

                if ($("#" + selectId)[0].selectedIndex != 0) {
                    var getValue = parseInt($(this).val());
                    parent_id = getValue;
                    updateSelect(getValue);
                } else {
                    //                $('#subprograms option:eq(0)').attr("selected", true);
//                $('#quiz option:eq(0)').attr("selected", true);
                }
            });

            $(document).ready(function () {
                $("#package_form").submit(function (e) {
                    var selected_parent = $("#level" + max_level).val();
                    alert(selected_parent);
                    return 0;

                    if ((selected_parent = 0) && (max_level > 1)) {
                        alert("Select Parent Node");
                        e.preventDefault(e);
                        return 0;
                    } else {
                        return 1;
                    }
                });
            });

            function check() {
                var selected_parent = $("#level" + max_level).val();
                if (selected_parent == 0) {
                    alert("Select Package Category");
                    return false;
                } else if ($("#name").val() == "") {
                    alert("Please Enter Name");
                    return false;
                } else if ($("#duration").val() == "") {
                    alert("Please Enter Duration");
                    return false;
                } else if ($("#no_of_quiz").val() == "") {
                    alert("Please Enter No. of quiz");
                    return false;
                } else if ($("#price").val() == "") {
                    alert("Please Enter Price");
                    return false;
                } else {
                    return true;
                }

            }
</script>