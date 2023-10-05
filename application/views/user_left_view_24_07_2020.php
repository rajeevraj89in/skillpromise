<!-- Content and Sidebar
======================================================= -->
<div class="container main_container">
    <div class="main_body">
        <div class="row" id="bigCallout">
            <?php
                if($_SESSION['role_name'] == 'Student'){
                    //echo '<aside class = "col-md-3">';

                    //1.check for last id .
                    if($nav_type == ''){ // if navigation type is none
                        // echo "<pre>";
                        // print_r($_SESSION);
                        $user_id = $_SESSION['user_id'];
                        $data = $this->main_model->programe_node($user_id);
                        $nav_type = 'program';
                        $return = $this->custom->get_nav_node_crumb($data->head_node, $nav_type);
                        $_SESSION['student_package_id'] = $data->head_node;
                        $assign_package = $data->programe_node;
                        $node_package = $this->main_model->select_with_in($assign_package);
                        //echo $this->db->last_query();
                       // echo "<pre>";
                        //print_r($node_package);die;
                        ?>
                        <div class="panel panel-primary border">
                            <h4 class="quickpanelhead quiz_head"><?php echo $data->name; ?></h4>
                            <ul id="my_left_accordion" class="my_left_accordion nav nav-pills nav-stacked nav-sidebar">
                            <?php
                           // echo "<pre>";
                        //print_r($node_package);die;
                                foreach($node_package as $key => $value){
                                    if($value->id == 15 || $value->id == 2310){
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
                                <!-- <li>
                                    <a href = "#">Aptitude Development</a>
                                    <div class = "my_left_link"><i class = "fa fa-chevron-down"></i></div>
                                    <ul class='submenu'>
                                        <li><a href="">ddd</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href = "#">Employment Documentation</a>
                                    <div class = "my_left_link"><i class = "fa fa-chevron-down"></i></div>
                                </li>
                                <li>
                                    <a href = "#">Self-Assessment</a>
                                    <div class = "my_left_link"><i class = "fa fa-chevron-down"></i></div>
                                </li>
                                <li>
                                    <a href = "#">Personal Interview</a>
                                    <div class = "my_left_link"><i class = "fa fa-chevron-down"></i></div>
                                </li> -->
                            </ul>
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

                    }else{ // if nav_type is not none
                        $return = $this->custom->get_nav_node_crumb($id, $nav_type);
						$child_node_id = $this->main_model->get_name_from_id('node', 'id', $id, $id_name = "parent_id");

						if (!$child_node_id) {
							$parent_id = $this->main_model->get_name_from_id('node', 'parent_id', $id, $id_name = "id");

							$this->custom->get_side_navigation_panel_new_student($parent_id, $nav_type);
							
							//$this->custom->get_side_navigation_panel_new_student($id, $nav_type);
						} else {
							$this->custom->get_side_navigation_panel_new_student($id, $nav_type);
						}
					}
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
            ?>
            </aside>
            <!-- end col-md-3 -->
            <!-- end sidebar panel -->
