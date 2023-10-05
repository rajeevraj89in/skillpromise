<!-- Content and Sidebar
======================================================= -->
<div class="container main_container">
    <div class="main_body">
        <div class="row" id="bigCallout">
            <?php
                if($_SESSION['role_name'] == 'Student'){
                    //echo '<aside class = "col-md-3">';

                    //1.check for last id .
                    if($nav_type == ''){ // if navigation type is nond
                    
                        $user_id = $_SESSION['user_id'];
                        $data = $this->main_model->test_center_node($user_id);
                        //echo $this->db->last_query();die;
                        $nav_type = 'test_centre';
                        $return = $this->custom->get_nav_node_crumb($data->head_node, $nav_type);
                        $_SESSION['student_test_center_id'] = $data->test_center_head;
                        $assign_package = $data->test_center_node;
                        $assign_package2 = $data->test_center_node2;
                        $node_package = $this->main_model->select_with_in($assign_package);
                        $node_package2 = $this->main_model->select_with_in($assign_package2);
                        //echo $this->db->last_query();
                        // echo "<pre>";
                        // print_r($node_package2);die;
                        ?>
                        <div class="panel panel-primary border">
                            <h4 class="quickpanelhead quiz_head"><?php echo $data->name; ?></h4>
                            <ul id="my_left_accordion" class="my_left_accordion nav nav-pills nav-stacked nav-sidebar">
                            <?php
                        //     echo "<pre>";
                        // print_r($node_package);die;
                        //|| $value->id == 2281 || $value->id == 2289
                        foreach($node_package as $key => $value){
                            if($value->id == 2270 || $value->id == 2271 || $value->id == 2281 || $value->id == 2289 || $value->id == 3773 || $value->id == 3772 || $value->id == 3775 || $value->id == 3776 || $value->id == 2578 || $value->id == 2465 || $value->id == 2303 || $value->id == 2517){
                                
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
                        <div class="panel panel-primary border">
                            <h4 class="quickpanelhead quiz_head">Aptitude and Management</h4>
                            <ul id="my_left_accordion2" class="my_left_accordion nav nav-pills nav-stacked nav-sidebar">
                            
                        <?php
                        foreach($node_package2 as $key2 => $value2){
                            if($value2->id == 3772 || $value2->id == 3775 || $value2->id == 3776 || $value2->id == 3773){
                                
                                ?>
                                <li>
                                    <a href="<?php echo base_url().'node'.'/'.$nav_type."/".$value2->id; ?>"><?php echo $value2->name; ?></a>
                                </li>
                                <?php

                            }else{
                                ?>
                                <li>
                                    <a href="#"><?php echo $value2->name; ?></a>
                                </li>
                            <?php
                            }
                            
                        }

                    }else{ // if nav_type is not 
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
        //            echo '<pre>';
        //                    print_r($return);
        //                    die;
                    if (!$child_node_id) {
                        $parent_id = $this->main_model->get_name_from_id('node', 'parent_id', $id, $id_name = "id");


                        $this->custom->get_side_navigation_panel_new($parent_id, $nav_type);
                    } else {
                        $this->custom->get_side_navigation_panel_new($id, $nav_type);
                    }
                }
                echo "</aside>";
            ?>
            <!-- end col-md-3 -->
            <!-- end sidebar panel -->
