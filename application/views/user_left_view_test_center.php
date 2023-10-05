<!-- Content and Sidebar
======================================================= -->
<div class="container main_container">
    <div class="main_body">
        <div class="row" id="bigCallout">
            <?php 
			    if(!isset($nav_type)){
					$nav_type = "";
				}
                if($_SESSION['role_name'] == 'Student'){
					
                    //echo '<aside class = "col-md-3">';
                   //echo $nav_type."===";
                    //1.check for last id .
                    if($nav_type == '' ){ // if navigation type is nond
                     $user_id = $_SESSION['user_id'];
                        $data = $this->main_model->test_center_node($user_id);
                        $ApptitudePreAssessment = $this->main_model->ApptitudePreAssessment_node($user_id);
                        $ApptitudePostAssessment = $this->main_model->ApptitudePostAssessment_node($user_id);
                        $SubjectPreAssessment = $this->main_model->SubjectPreAssessment_node($user_id);
                        $SubjectPostAssessment = $this->main_model->SubjectPostAssessment_node($user_id);
                        //echo $this->db->last_query();die;
						//print_r($data);
						
                        $nav_type = 'test_centre';
                        $return = $this->custom->get_nav_node_crumb($data->test_center_head, $nav_type);
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
                        $node_package2 = $this->main_model->select_with_in($assign_package2);
                        //echo $this->db->last_query();
                        // echo "<pre>";
                        // print_r($node_package2);die;
                        ?>
                        
                        
                        <!--------------------------------------------------------------------------------------------------------------------------->
                        
                        <div class="panel panel-primary border">
                            <!--<h4 class="quickpanelhead quiz_head"><?php // echo $data->name; ?></h4>-->
							<?php if(!empty($ApptitudePreAssessment) ){ ?>
                            <h4 class="quickpanelhead quiz_head">Apptitude Pre-Assessment</h4>
                            <ul id="my_left_accordion" class="my_left_accordion nav nav-pills nav-stacked nav-sidebar">
                            <?php
                        //     echo "<pre>";
                        // print_r($node_package);die;
                        //|| $value->id == 2281 || $value->id == 2289
                        foreach($ApptitudePreAssessment as $key => $value){
                            if($value->id){
                                
                                ?>
                                <li>
                                    <a href="<?php echo base_url().'node'.'/'.$nav_type."/".$value->id; ?>"><?php echo $value->name; ?></a>
                                </li>
                                <?php

                            }else{
                                ?>
                                <li>
                                    <a href="#"><?php echo $value->name; ?></a>
                                </li>
                            <?php
                            }
                            
                        }
                        ?>
                        </ul>
							<?php  }  ?>
                            <!--<h4 class="quickpanelhead quiz_head"><?php // echo $data->name; ?></h4>-->
							<?php if(!empty($ApptitudePostAssessment) ){ ?>
                            <h4 class="quickpanelhead quiz_head">Apptitude Post-Assessment</h4>
                            <ul id="my_left_accordion" class="my_left_accordion nav nav-pills nav-stacked nav-sidebar">
                            <?php
                        //     echo "<pre>";
                        // print_r($node_package);die;
                        //|| $value->id == 2281 || $value->id == 2289
                        foreach($ApptitudePostAssessment as $key => $value){
                            if($value->id){
                                
                                ?>
                                <li>
                                    <a href="<?php echo base_url().'node'.'/'.$nav_type."/".$value->id; ?>"><?php echo $value->name; ?></a>
                                </li>
                                <?php

                            }else{
                                ?>
                                <li>
                                    <a href="#"><?php echo $value->name; ?></a>
                                </li>
                            <?php
                            }
                            
                        }
                        ?>
                        </ul>
							<?php  }  ?>
                            <!--<h4 class="quickpanelhead quiz_head"><?php // echo $data->name; ?></h4>-->
							
							<?php if(!empty($SubjectPreAssessment) ){ ?>
                            <h4 class="quickpanelhead quiz_head">Subject Pre-Assessment</h4>
                            <ul id="my_left_accordion" class="my_left_accordion nav nav-pills nav-stacked nav-sidebar">
                            <?php
                        //     echo "<pre>";
                        // print_r($node_package);die;
                        //|| $value->id == 2281 || $value->id == 2289
                        foreach($SubjectPreAssessment as $key => $value){
                            if($value->id){
                                
                                ?>
                                <li>
                                    <a href="<?php echo base_url().'node'.'/'.$nav_type."/".$value->id; ?>"><?php echo $value->name; ?></a>
                                </li>
                                <?php

                            }else{
                                ?>
                                <li>
                                    <a href="#"><?php echo $value->name; ?></a>
                                </li>
                            <?php
                            }
                            
                        }
                        ?>
                        </ul>
						<?php  }  ?>
                        
                            <!--<h4 class="quickpanelhead quiz_head"><?php // echo $data->name; ?></h4>-->
							<?php if(!empty($SubjectPostAssessment) ){ ?>
                            <h4 class="quickpanelhead quiz_head">Subject Post-Assessment</h4>
                            <ul id="my_left_accordion" class="my_left_accordion nav nav-pills nav-stacked nav-sidebar">
                            <?php
                        //     echo "<pre>";
                        // print_r($node_package);die;
                        //|| $value->id == 2281 || $value->id == 2289
                        foreach($SubjectPostAssessment as $key => $value){
                            if($value->id){
                                
                                ?>
                                <li>
                                    <a href="<?php echo base_url().'node'.'/'.$nav_type."/".$value->id; ?>"><?php echo $value->name; ?></a>
                                </li>
                                <?php

                            }else{
                                ?>
                                <li>
                                    <a href="#"><?php echo $value->name; ?></a>
                                </li>
                            <?php
                            }
                            
                        }
                        ?>
                        </ul>
						<?php  }  ?>
                        </div>
                        
                        <!--------------------------------------------------------->
                        
                        <div class="panel panel-primary border" style="display:none;">
                            <h4 class="quickpanelhead quiz_head">Domain/ Subject Assessment Center</h4>
                            <ul id="my_left_accordion2" class="my_left_accordion nav nav-pills nav-stacked nav-sidebar">
                            
                        <?php
                        foreach($node_package2 as $key2 => $value2){
                            if($value2->id){
                                
                                ?>
                                <li>
                                    <a href="<?php echo base_url().'node'.'/'.$nav_type."/".$value2->id; ?>"><?php echo $value2->name; ?></a>
                                </li>
                                <?php

                            }else{
                                ?>
                                <li>
                                    <a href="##"><?php echo $value2->name; ?></a>
                                </li>
                            <?php
                            }
                            
                        }

                    }
					else if($nav_type =='test_centre'){
                         $user_id = $_SESSION['user_id'];
                        $data = $this->main_model->test_center_node($user_id);
                        $ApptitudePreAssessment = $this->main_model->ApptitudePreAssessment_node($user_id);
                        $ApptitudePostAssessment = $this->main_model->ApptitudePostAssessment_node($user_id);
                        $SubjectPreAssessment = $this->main_model->SubjectPreAssessment_node($user_id);
                        $SubjectPostAssessment = $this->main_model->SubjectPostAssessment_node($user_id);
                        //echo $this->db->last_query();die;
                        $nav_type = 'test_centre';
                        $return = $this->custom->get_nav_node_crumb(@$data->head_node, $nav_type);
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
                        $node_package2 = $this->main_model->select_with_in($assign_package2);
                        //echo $this->db->last_query();
                        // echo "<pre>";
                        // print_r($node_package2);die;
                        ?>
                        
                        
                        <!--------------------------------------------------------------------------------------------------------------------------->
                        
                        <div class="panel panel-primary border">
                            <!--<h4 class="quickpanelhead quiz_head"><?php // echo $data->name; ?></h4>-->
                            <h4 class="quickpanelhead quiz_head">Apptitude Pre-Assessment</h4>
                            <ul id="my_left_accordion" class="my_left_accordion nav nav-pills nav-stacked nav-sidebar">
                            <?php
                        //     echo "<pre>";
                        // print_r($node_package);die;
                        //|| $value->id == 2281 || $value->id == 2289
                        foreach($ApptitudePreAssessment as $key => $value){
                            if($value->id){
                                
                                ?>
                                <li>
                                    <a href="<?php echo base_url().'node'.'/'.$nav_type."/".$value->id; ?>"><?php echo $value->name; ?></a>
                                </li>
                                <?php

                            }else{
                                ?>
                                <li>
                                    <a href="#"><?php echo $value->name; ?></a>
                                </li>
                            <?php
                            }
                            
                        }
                        ?>
                        </ul>
                        
                            <!--<h4 class="quickpanelhead quiz_head"><?php // echo $data->name; ?></h4>-->
                            <h4 class="quickpanelhead quiz_head">Apptitude Post-Assessment</h4>
                            <ul id="my_left_accordion" class="my_left_accordion nav nav-pills nav-stacked nav-sidebar">
                            <?php
                        //     echo "<pre>";
                        // print_r($node_package);die;
                        //|| $value->id == 2281 || $value->id == 2289
                        foreach($ApptitudePostAssessment as $key => $value){
                            if($value->id){
                                
                                ?>
                                <li>
                                    <a href="<?php echo base_url().'node'.'/'.$nav_type."/".$value->id; ?>"><?php echo $value->name; ?></a>
                                </li>
                                <?php

                            }else{
                                ?>
                                <li>
                                    <a href="#"><?php echo $value->name; ?></a>
                                </li>
                            <?php
                            }
                            
                        }
                        ?>
                        </ul>
                        
                            <!--<h4 class="quickpanelhead quiz_head"><?php // echo $data->name; ?></h4>-->
                            <h4 class="quickpanelhead quiz_head">Subject Pre-Assessment</h4>
                            <ul id="my_left_accordion" class="my_left_accordion nav nav-pills nav-stacked nav-sidebar">
                            <?php
                        //     echo "<pre>";
                        // print_r($node_package);die;
                        //|| $value->id == 2281 || $value->id == 2289
                        foreach($SubjectPreAssessment as $key => $value){
                            if($value->id){
                                
                                ?>
                                <li>
                                    <a href="<?php echo base_url().'node'.'/'.$nav_type."/".$value->id; ?>"><?php echo $value->name; ?></a>
                                </li>
                                <?php

                            }else{
                                ?>
                                <li>
                                    <a href="#"><?php echo $value->name; ?></a>
                                </li>
                            <?php
                            }
                            
                        }
                        ?>
                        </ul>
                       
                            <!--<h4 class="quickpanelhead quiz_head"><?php // echo $data->name; ?></h4>-->
                            <h4 class="quickpanelhead quiz_head">Subject Post-Assessment</h4>
                            <ul id="my_left_accordion" class="my_left_accordion nav nav-pills nav-stacked nav-sidebar">
                            <?php
                        //     echo "<pre>";
                        // print_r($node_package);die;
                        //|| $value->id == 2281 || $value->id == 2289
                        foreach($SubjectPostAssessment as $key => $value){
                            if($value->id){
                                
                                ?>
                                <li>
                                    <a href="<?php echo base_url().'node'.'/'.$nav_type."/".$value->id; ?>"><?php echo $value->name; ?></a>
                                </li>
                                <?php

                            }else{
                                ?>
                                <li>
                                    <a href="#"><?php echo $value->name; ?></a>
                                </li>
                            <?php
                            }
                            
                        }
                        ?>
                        </ul>
                        </div>
                        
                        <!--------------------------------------------------------->
                        
                        <div class="panel panel-primary border" style="display:none;">
                            <h4 class="quickpanelhead quiz_head">Domain/ Subject Assessment Center</h4>
                            <ul id="my_left_accordion2" class="my_left_accordion nav nav-pills nav-stacked nav-sidebar">
                            
                        <?php
                        foreach($node_package2 as $key2 => $value2){
                            if($value2->id){
                                
                                ?>
                                <li>
                                    <a href="<?php echo base_url().'node'.'/'.$nav_type."/".$value2->id; ?>"><?php echo $value2->name; ?></a>
                                </li>
                                <?php

                            }else{
                                ?>
                                <li>
                                    <a href="##"><?php echo $value2->name; ?></a>
                                </li>
                            <?php
                            }
                            
                        }

                    }
                    
                    else{ // if nav_type is not 
                       //echo $id."-------";
                        $return = $this->custom->get_nav_node_crumb($id, $nav_type);
						$child_node_id = $this->main_model->get_name_from_id('node', 'id', $id, $id_name = "parent_id");

						if (!$child_node_id) {
							$parent_id = $this->main_model->get_name_from_id('node', 'parent_id', $id, $id_name = "id");

						 $this->custom->get_side_navigation_panel_new_student_test_center($parent_id, $nav_type);
							
							//$this->custom->get_side_navigation_panel_new_student($id, $nav_type);
						} else {
							$this->custom->get_side_navigation_panel_new_student_test_center($id, $nav_type);
						}
					}
                    
                    echo "</aside>";
                }else{
                    $return = $this->custom->get_nav_node_crumb($id, $nav_type);


        //            1.check for last id .
                    $child_node_id = $this->main_model->get_name_from_id('node', 'id', $id, $id_name = "parent_id");
        //            echo '<pre>';print_r($return);die;
		
                    if (!$child_node_id) {
                        $parent_id = $this->main_model->get_name_from_id('node', 'parent_id', $id, $id_name = "id");

                        
                        $this->custom->get_side_navigation_panel_new($parent_id, $nav_type);
                    } else {
						//echo $id." -- ".$nav_type; exit;
                        $this->custom->get_side_navigation_panel_new($id, $nav_type);
                    }
                }
                echo "</aside>";
            ?>
            <!-- end col-md-3 -->
            <!-- end sidebar panel -->
