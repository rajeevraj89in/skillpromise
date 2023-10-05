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
					$package_id = $_SESSION['packages']; 
					$package = $this->main_model->get_records_new("packages", array("id" => $package_id), "*", array(), True );
					                    
                    if($nav_type == '' ){ // if navigation type is nond
                     $user_id = $_SESSION['user_id'];
					 
					   $nav_type = 'program';
                        $return = $this->custom->get_nav_node_crumb($package->resource_center_head, $nav_type);
                        
                        $resource_center_nodes = $this->main_model->select_with_in($package->resource_center_nodes);
                        //echo $this->db->last_query();
                        // echo "<pre>";
                        // print_r($node_package2);die;
                        ?>
                        
                        
                        
                        <div class="panel panel-primary border">
                            <!--<h4 class="quickpanelhead quiz_head"><?php // echo $data->name; ?></h4>-->
							<?php if(!empty($resource_center_nodes) ){ ?>
                            <h4 class="quickpanelhead quiz_head">Resource Center</h4>
                            <ul id="my_left_accordion" class="my_left_accordion nav nav-pills nav-stacked nav-sidebar">
                            <?php
                        
                        foreach($resource_center_nodes as $key => $value){
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
                        
                        <?php
                        

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
