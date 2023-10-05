<!-- Content and Sidebar
======================================================= -->
<div class="container main_container">
    <div class="main_body">
        <div class="row" id="bigCallout"> 
            <?php  //$action_sheet_type = $this->custom->get_action_sheet_type(1578);
                if($_SESSION['role_name'] == 'Student'){
                // echo '<aside class = "col-md-3">';
                    if(!isset($nav_type)){
						$nav_type = "";
					}
					//echo "<<<<<<<<<<<<".$nav_type.">>>>>>>>>>";
                    //1.check for last id .
                    if($nav_type == ''){ // if navigation type is none
                        // echo "<pre>";
                        // print_r($_SESSION);
                        $user_id = $_SESSION['user_id'];
                        $data = $this->main_model->programe_node($user_id);
                        $dataC = $this->main_model->faq_core_node($user_id);
                        $dataNC = $this->main_model->faq_non_core_node($user_id);
                        $nav_type = 'program';
						$_SESSION['student_package_id'] = "";
						$node_package = array();
						if(!empty($data) ){
							$return = $this->custom->get_nav_node_crumb($data->head_node, $nav_type);
							$_SESSION['student_package_id'] = $data->head_node;
							$assign_package = $data->programe_node;
							$node_package = $this->main_model->select_with_in($assign_package);
					   }
					   $assign_packageC = null;
					   if(!empty($dataC) ){
                        $assign_packageC = $dataC->FAQsCoreDomain;
					   }
					   $assign_packageNC = null;
					   if(!empty($dataNC) ){
                        $assign_packageNC = $dataNC->FAQsNonCoreDomain;
					   }
                        
                        if($assign_packageC != null && $assign_packageNC != null ){
                            $node_packageC = $this->main_model->select_with_in($assign_packageC);
                        $node_packageNC = $this->main_model->select_with_in($assign_packageNC);
                        }else{
                            $node_packageC =[];
                        $node_packageNC = [];
                        }
                        //echo $this->db->last_query();
                        // echo "<pre>";
                        //print_r($node_packageC);die;  
                        ?>
                        <div class="panel panel-primary border">
						    
                            <h4 class="quickpanelhead quiz_head"><?php echo (isset($data->name))?$data->name:""; ?></h4>
                            <ul id="my_left_accordion" class="my_left_accordion nav nav-pills nav-stacked nav-sidebar">
                          <?php
                           
                                foreach($node_package as $key => $value){
                                        ?>
                                        <li>
                                            <a href="<?php echo base_url().'node'.'/'.$nav_type."/".$value->id; ?>"><?php echo $value->name; ?></a>
                                        </li>
                                        <?php  
                                }
                            ?>
                               
                            </ul>
							<?php if(!empty($node_packageC)){ ?>
                              <h4 class="quickpanelhead quiz_head">FAQs - Domain (Core)</h4>
                            <ul id="my_left_accordion" class="my_left_accordion nav nav-pills nav-stacked nav-sidebar">
                          <?php
                           
                                foreach($node_packageC as $key => $value){
                                        ?>
                                        <li>
                                            <a href="<?php echo base_url().'node'.'/'.$nav_type."/".$value->id; ?>"><?php echo $value->name; ?></a>
                                        </li>
                                        <?php  
                                }
                            ?>
                               
                            </ul>
							<?php  }  ?>
							
							<?php if(!empty($node_packageNC)){ ?>
                                                        <h4 class="quickpanelhead quiz_head">FAQs - Domain (Non-Core)</h4>
                            <ul id="my_left_accordion" class="my_left_accordion nav nav-pills nav-stacked nav-sidebar">
                          <?php
                           
                                foreach($node_packageNC as $key => $value){
                                        ?>
                                        <li>
                                            <a href="<?php echo base_url().'node'.'/'.$nav_type."/".$value->id; ?>"><?php echo $value->name; ?></a>
                                        </li>
                                        <?php  
                                }
                            ?>
                               
                            </ul>
							<?php  }  ?>
                        </div>
                        
                        
                        
                         
                        <?php


                        
                        // $id = $this->main_model->fill_nav_node_li_program('node', 'quiz', 'id', 'node', 'LEFT', 'program');
                        // $nav_type = 'program';
                        // $_SESSION['student_package_id'] = $id;
                        // $return = $this->custom->get_nav_node_crumb($id, $nav_type);
						
						// $child_node_id = $this->main_model->get_name_from_id('node', 'id', $id, $id_name = "parent_id");

						// if (!$child_node_id) {
						// 	$parent_id = $this->main_model->get_name_from_id('node', 'parent_id', $id, $id_name = "id");

						// 	//$this->custom->get_side_navigation_panel_new_student($parent_id, $nav_type);
							
						// 	$this->custom->get_side_navigation_panel_new_student($id, $nav_type);
						// } else {
						// 	$this->custom->get_side_navigation_panel_new_student($id, $nav_type);
						// }

                    }
					else{
						// if nav_type is not none
						//echo ">>>>>>>>>>>>>>>>>>>>";
                        $return = $this->custom->get_nav_node_crumb($id, $nav_type);
                         if($nav_type == "sheets"){
                            $nav_type = "program";
                        }else{
                            $nav_type = $nav_type;
                        }
						$child_node_id = $this->main_model->get_name_from_id('node', 'id', $id, $id_name = "parent_id");
                        // echo "<pre>";
                        // print_r($child_node_id);die;
						if (!$child_node_id) {
							$parent_id = $this->main_model->get_name_from_id('node', 'parent_id', $id, $id_name = "id");

							$this->custom->get_side_navigation_panel_new_student($parent_id, $nav_type);
							//$this->custom->get_side_navigation_panel_new($parent_id, $nav_type);
							
							//$this->custom->get_side_navigation_panel_new_student($id, $nav_type);
						} else {
							$this->custom->get_side_navigation_panel_new_student($id, $nav_type);
						}
					}
                }else{
                    $return = $this->custom->get_nav_node_crumb($id, $nav_type);


        //            1.check for last id .
                    if($nav_type == "sheets"){
                        $nav_type = "program";
                    }else{
                        $nav_type = $nav_type;
                    }
                    $child_node_id = $this->main_model->get_name_from_id('node', 'id', $id, $id_name = "parent_id");
                    // echo '<pre>';
                    // print_r($child_node_id);
                    // die;
                    if (!$child_node_id) {
                        $parent_id = $this->main_model->get_name_from_id('node', 'parent_id', $id, $id_name = "id");
                        
                        // echo "<pre>";
                        // print_r($parent_id);die;

                        //echo "dd"die;
                        $this->custom->get_side_navigation_panel_new($parent_id, $nav_type);
                    } else {
                       // echo "dd";die;
                        $this->custom->get_side_navigation_panel_new($id, $nav_type);
                    }
                }
            ?>
            </aside>
            <!-- end col-md-3 -->
            <!-- end sidebar panel -->
