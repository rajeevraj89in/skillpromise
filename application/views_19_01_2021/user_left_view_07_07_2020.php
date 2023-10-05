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
                        $id = $this->main_model->fill_nav_node_li_program('node', 'quiz', 'id', 'node', 'LEFT', 'program');
                        $nav_type = 'program';
                        $_SESSION['student_package_id'] = $id;
                        $return = $this->custom->get_nav_node_crumb($id, $nav_type);
						
						$child_node_id = $this->main_model->get_name_from_id('node', 'id', $id, $id_name = "parent_id");

						if (!$child_node_id) {
							$parent_id = $this->main_model->get_name_from_id('node', 'parent_id', $id, $id_name = "id");

							//$this->custom->get_side_navigation_panel_new_student($parent_id, $nav_type);
							
							$this->custom->get_side_navigation_panel_new_student($id, $nav_type);
						} else {
							$this->custom->get_side_navigation_panel_new_student($id, $nav_type);
						}

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
