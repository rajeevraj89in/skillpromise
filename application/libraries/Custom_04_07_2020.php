<?php

//        $post = array();
//        foreach ($_POST as $key => $value) {
//            $post[$key] = $this->input->post($key);
//        }
//        var_dump($post);
//        DIE;
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Custom {

    public function __construct() {
//        $CI_Model = & get_instance();
//        $CI_Model->load->model('main_model');
    }

    function object_to_array($data) {
        if (is_array($data) || is_object($data)) {
            $result = array();

            foreach ($data as $key => $value) {
                $result[$key] = $this->object_to_array($value);
            }
            return $result;
        }
        return $data;
    }

//    function array_to_object($array) {
//        if (!is_array($array)) {
//            return $array;
//        }
//
//        $object = new stdClass();
//        if (is_array($array) && count($array) > 0) {
//            foreach ($array as $name => $value) {
//                $name = strtolower(trim($name));
//                if (!empty($name)) {
//                    $object->$name = $this->array_to_object($value);
//                }
//            }
//            return $object;
//        } else {
//            return FALSE;
//        }
//    }
//
//}

    function is_permitted($node_id) {
        $CI_Model = & get_instance();
        $CI_Model->load->model('main_model');
        $filter[0]['id'] = "users";
        $filter[0]['value'] = $_SESSION['user_id'];
        $filter[1]['id'] = "node";
        $filter[1]['value'] = $node_id;
        $req_field = array("id");
        $permission_node_id = $CI_Model->main_model->get_many_records("node-users", $filter, $req_field);
        //var_dump($permission_node_id);die;
        if ($permission_node_id) {
            return true;
        } else {
            //$parent_list = array('0','0');
            $parent_list = $this->get_parent_id($node_id);
            if (isset($parent_list[0])) {

//         echo $node_id;
                $parent_list = array_reverse($parent_list);
                $node_id = $parent_list['0'];
//             echo "<pre>";
//         var_dump($parent_list);die;
//         echo "<pre>";
                //echo $parent_list[0];
                $filter[0]['id'] = "users";
                $filter[0]['value'] = $_SESSION['user_id'];
                $filter[1]['id'] = "node";
                $filter[1]['value'] = $node_id;
                $req_field = array("id");
                $permission_node_id = $CI_Model->main_model->get_many_records("node-users", $filter, $req_field);
                if ($permission_node_id) {
                    return true;
                } else {

                    return false;
                }
            } else {

                return false;
            }
        }
    }

    function get_access_permit($node_id) { //============================== this fuction check chield node access =============
        //$node_id = 204;
        $CI_Model = & get_instance();
        $CI_Model->load->model('main_model');
        //$assign_node = $_SESSION['assign_node'];

        $assign_node = $CI_Model->main_model->get_name_from_id("node-users", "node", $_SESSION['user_id'], "users");
        $parent_list = $this->get_parent_id($node_id);

//       echo "<pre>";
//       print_r($parent_list);die;

        if (in_array($assign_node, $parent_list)) {
            //echo "allow";
            return true;
        } else {
            //echo "not allow";
            return false;
        }
    }

    function get_access_permit_parent($node_id) { //========================= this function check parent node access =====================
        //$node_id = 71;
        $CI_Model = & get_instance();
        $CI_Model->load->model('main_model');
        //$assign_node = $_SESSION['assign_node'];


        $assign_node = $CI_Model->main_model->get_name_from_id("node-users", "node", $_SESSION['user_id'], "users");
        if ($assign_node == $node_id) {
            return true;
        } else {
            $parent_list = $this->get_parent_id($assign_node);
            //var_dump($parent_list);die;
            if (in_array($node_id, $parent_list)) {
                //echo "allow";
                return true;
            } else {
                //echo "not allow";
                return false;
            }
        }
    }

    function get_parent_id($node_id = '0', $parent_list = array(0)) {
        $CI_Model = & get_instance();
        $CI_Model->load->model('main_model');
        //echo "$node_id";
        $parent_id = $CI_Model->main_model->get_name_from_id("node", "parent_id", $node_id, "id");
        //die($parent_id);
        if ($parent_id != 0) {
            $parent_list_ = array_push($parent_list, $parent_id);
            $parent_list = $this->get_parent_id($parent_id, $parent_list);
            return $parent_list;
        } else {

            return $parent_list;
        }
    }

    function get_marks($question_id, $selection = 0, $options = array()) {
        $CI_Model = & get_instance();
        $CI_Model->load->model('main_model');
        $fields1 = array("question_weight", "is_weighted");
        $question = $CI_Model->main_model->get_selected_records("questions", "id", $question_id, $fields1);
//        var_dump($question);
//        die;
        if ($selection) {//Single type
            if ($question[0]['is_weighted']) {
                $fields2 = array("option_id", "option_weight", "is_correct");
                $options1 = $CI_Model->main_model->get_selected_records("options", "question_id", $question_id, $fields2);
                foreach ($options1 as $value) {
                    if ($value['option_id'] == $selection) {
                        return $value['option_weight'];
                    }
                }
                return 0;
            } else {//not weighted
                $correct = $CI_Model->main_model->get_name_from_id("options", "is_correct", $selection, "option_id");
                if ($correct == 1) {
                    return $question[0]['question_weight'];
                } else {
                    return 0;
                }
            }
        } else {//multiple type
            $filter[0]['id'] = "question_id";
            $filter[0]['value'] = $question_id;
            $filter[1]['id'] = "is_correct";
            $filter[1]['value'] = 1;
            $fields3 = array("option_id", "option_weight", "is_correct");
            $options2 = $CI_Model->main_model->get_many_records("options", $filter, $fields3, "option_id");

            $i = 0;
            $matched_options = 0;
            sort($options);
            $keys = array_keys($options);
//            var_dump($options);
//            die;
            foreach ($options2 as $opt) {
                if ($opt['option_id'] == $options[$keys[$i++]]) {
                    $matched_options++;
                }
            }
            if ($matched_options == count($options2)) {
                return $question[0]['question_weight'];
            } else {
                return 0;
            }
        }
    }

    function get_quiz_type_from_node($node) {
        $CI_Model = & get_instance();
        $CI_Model->load->model('main_model');
        $quiz_id = $this->main_model->get_name_from_id('quiz', 'id', $node, 'node');
        $quiz_type = $CI_Model->main_model->get_name_from_id('quiz', 'quiz_type', $quiz_id, "id");
        return $quiz_type;
    }

    function get_node_from_quiz_id($quiz_id) {
        $quiz_type = $CI_Model->main_model->get_name_from_id('quiz', 'node', $quiz_id, "id");
    }

    function is_quiz_attempted($quiz_id = 0, $user_id = 0) {
        $CI_Model = & get_instance();
        $CI_Model->load->model('main_model');
        $filter[0]['id'] = "quiz_id";
        $filter[0]['value'] = $quiz_id;
        $filter[1]['id'] = "user_id";
        $filter[1]['value'] = $user_id;
        $req_fields = array("id");
        $result = $CI_Model->main_model->get_many_records("quiz_result", $filter, $req_fields, "");
        if (empty($result)) {
            return 0;
        } else {
            return $result[0]['id'];
        }
    }

    function is_quiz_submited($quiz_result_id = 0) {
        $CI_Model = & get_instance();
        $CI_Model->load->model('main_model');
        $filter[0]['id'] = "id";
        $filter[0]['value'] = $quiz_result_id;
        $req_fields = array("submit_time");
        $result = $CI_Model->main_model->get_many_records("quiz_result", $filter, $req_fields, "");

        if (empty($result)) {
            return 0;
        } else {
            return $result[0]['submit_time'];
        }
    }

    function is_sheet_submited($sheet_id = 0) {
        $CI_Model = & get_instance();
        $CI_Model->load->model('main_model');

        $req = array('*');
        $filter[0]['id'] = 'sheet_id';
        $filter[0]['value'] = $sheet_id;
        $filter[1]['id'] = 'user_id';
        $filter[1]['value'] = $_SESSION['user_id'];
//        $filter[2]['id'] = 'is_submit';
//        $filter[2]['value'] = '0';

        $result = $CI_Model->main_model->get_many_records("sheet_user", $filter, $req, '');
        //var_dump($submit_data);die;

        if (empty($result)) {
            return false;
        } else {
            return $result;
        }
    }

    function array_to_object($d) {
        if (is_array($d)) {
            /*
             * Return array converted to object
             * Using __FUNCTION__ (Magic constant)
             * for recursive call
             */
            return (object) array_map(__FUNCTION__, $d);
        } else {
// Return object
            return $d;
        }
    }

    function quiz_result($result_for = '', $req_id = '') {
        $CI_Model = & get_instance();
        $CI_Model->load->model('main_model');

        $quiz_result = array();

        switch ($result_for) {
            case'student_id':
                $user_id = $req_id;

                $filter[0]['id'] = "user_id";
                $filter[0]['value'] = $user_id;
                $req_field = array("id", "quiz_id");
                $result = $CI_Model->main_model->get_many_records("quiz_result", $filter, $req_field);
                foreach ($result as $key => $row) {
                    $quiz_id = $row['quiz_id'];

                    //====================== get quiz name ==============================
                    $quiz_name = $CI_Model->main_model->get_name_from_id('quiz', 'name', $quiz_id, 'id');

                    //===================== get mark obtain ==============================
                    $query_str1 = 'SELECT  sum(`marks`) as marks_obtain
                                FROM  `quiz_result_answers`
                                WHERE  `quiz_result_id` =' . $row['id'];
                    $marks_obtain = $CI_Model->db->query($query_str1)->row_array();

                    //================================ get total marks ===========================
                    $query_str2 = 'SELECT SUM(`question_weight`) as total_marks
                                FROM `questions` WHERE quiz_id =' . $quiz_id;
                    $total_marks = $CI_Model->db->query($query_str2)->row_array();
                    //var_dump($total_marks);
                    //echo $total_marks['total_marks'];
                    // echo '<pre>';
                    //print_r($total_marks);die;
                    $quiz_result[$key]['quiz_id'] = $quiz_id;
                    $quiz_result[$key]['quiz_name'] = $quiz_name;
                    $quiz_result[$key]['total_marks'] = $total_marks['total_marks'];
                    $quiz_result[$key]['marks_obtain'] = $marks_obtain['marks_obtain'];
                }

                break;
            case 'quiz_id':

                $quiz_id = $req_id;
                //====================== get quiz name =======================================
                $quiz_name = $CI_Model->main_model->get_name_from_id('quiz', 'name', $quiz_id, 'id');

                $filter[0]['id'] = "quiz_id";
                $filter[0]['value'] = $quiz_id;
                $req_field = array("id", "user_id");
                $result = $CI_Model->main_model->get_many_records("quiz_result", $filter, $req_field);

                foreach ($result as $key => $row) {

                    $user_id = $row['user_id'];

                    //====================== get user name ======================================
                    $user_name = $CI_Model->main_model->get_name_from_id('users', 'name', $user_id, 'id');
                    //===================== get mark obtain ======================================
                    $query_str1 = 'SELECT  sum(`marks`) as marks_obtain
                                FROM  `quiz_result_answers`
                                WHERE  `quiz_result_id` =' . $row['id'];
                    $marks_obtain = $CI_Model->db->query($query_str1)->row_array();
                    //================================ get total marks ===========================
                    $query_str2 = 'SELECT SUM(`question_weight`) as total_marks
                                FROM `questions` WHERE quiz_id =' . $quiz_id;
                    $total_marks = $CI_Model->db->query($query_str2)->row_array();

                    $quiz_result[$key]['user_id'] = $user_id;
                    $quiz_result[$key]['quiz_name'] = $user_name;
                    $quiz_result[$key]['total_marks'] = $total_marks['total_marks'];
                    $quiz_result[$key]['marks_obtain'] = $marks_obtain['marks_obtain'];
                }

            case 'entity_id':


                break;
            default:

                break;
        }

        return $quiz_result;
    }

    function get_side_navigation_panel($node = "", $order_by = "name") {//For node system
        $CI_Model = & get_instance();
        $CI_Model->load->model('main_model');
        $quiz = '<div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Quiz</h3>
            </div>
            <ul class="nav nav-pills nav-stacked nav-sidebar" id="accordion">';

        $module = '<div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">';

        $name = $CI_Model->main_model->get_name_from_id('node', 'name', $node, "id");
        if ($node) {
            $module .= $name;
        } else {
            $module .= 'Programs';
        }
        $module .= '</h3>
            </div>
            <ul class="nav nav-pills nav-stacked nav-sidebar" id="accordion">';

        $result = $CI_Model->main_model->get_records('node', 'parent_id', $node, 'name');
        $module_count = 0;
        $quiz_count = 0;
        foreach ($result->result() as $rec) {
            $node_type = $CI_Model->main_model->get_name_from_id('node', 'type', $node, 'id');
            switch ($node_type) {
                case "Module":
                    $module .= '<li><a href="' . base_url() . "node/$rec->id" . '">' . "$rec->name</a></li>";
                    $module_count++;
                    break;
                case "Quiz" :
                    $quiz .= '<li><a href="' . base_url() . "node/" . get_quiz_type_from_node($rec->id) . '">' . "$rec->name</a></li>";
                    $quiz_count++;
                    break;
                default:
                    break;
            }
        }

        $module .= '</ul>
        </div>';
        $quiz .= '</ul>
        </div>';
        if ($module_count) {
            echo $module;
        }
        if ($quiz_count) {
            echo $quiz;
        }
    }

    function get_side_navigation_panel_new_20190220($node = "", $nav_type = '', $order_by = "name") {//For node system
        $CI_Model = & get_instance();
        $CI_Model->load->model('main_model');

        $sheet = '<div class="panel panel-primary border">
                <h4 class="quickpanelhead quiz_head">Action Sheet</h4>
            <ul class="nav nav-pills nav-stacked nav-sidebar" id="accordion">';

        $module = '<div class="panel panel-primary border">
                <h4 class="quickpanelhead quiz_head">';

        $name = $CI_Model->main_model->get_name_from_id('node', 'name', $node, "id");

        if ($node) {
            $module .= $name;
        } else {
            $module .= 'Programs';
        }

        $module .= '</h4>';
        $module .= '<ul id="my_left_accordion" class="my_left_accordion nav nav-pills nav-stacked nav-sidebar">';

        $result = $CI_Model->main_model->get_records('node', 'parent_id', $node, 'sort_order, name');
//        echo "<pre>";
//        print_r($result->result());
//        die;


        $module_count = 0;
        $quiz_count = 0;
        $sheet_count = 0;

        if ($nav_type == 'test_centre') {

            foreach ($result->result() as $rec) {

                //$is_dashboard_quiz_attached = $this->is_dashboard_quiz_attached($rec->id); //============== this is check for attache dashboard quiz(temp)
                //if ($is_dashboard_quiz_attached) {
                $node_type = $rec->type;
                switch ($node_type) {
                    case "Module":
                        $module .= '<li><a href = "' . base_url() . "node/$nav_type/$rec->id" . '">' . "$rec->name</a>";
                        $module .= $this->is_child_exist($node_type, $rec->id, $nav_type);
                        $module .= "</li>";
                        $module_count++;
                        break;
                    case "Sheet":
                        $sheet_id = $CI_Model->main_model->get_name_from_id('sheets', 'id', $rec->id, 'node');
                        if (!$sheet_id) {
                            break;
                        }
                        $sheet .= '<li><a href = "' . base_url() . "sheets/sheets/$sheet_id" . '">' . "$rec->name</a>";
                        $sheet .= $this->is_child_exist($node_type, $sheet_id, 'sheets');
                        $sheet .= "</li>";
                        $sheet_count++;
                        break;

                    case "Quiz":
                        $quiz_details = $CI_Model->main_model->get_records_from_id('quiz', $rec->id, 'node', array('id', 'quiz_type'));
                        $quiz_type = $quiz_details['quiz_type'];
                        $quiz_id = $quiz_details['id'];

                        //$quiz_type = 'Practice';&& $nav_type =='program' && $quiz_type == 'Practice'
                        if ($quiz_id && $nav_type == 'program' && $quiz_type == 'Practice') {
                            // $quiz.= '<li><a href = "' . base_url() . "node/" . get_quiz_type_from_node($rec->id) . '">' . "$rec->name</a></li>";
                            $module .= '<li><a href = "' . base_url() . "node/$nav_type/$rec->id" . '">' . "$rec->name</a>";
                            $module .= $this->is_child_exist($node_type, $rec->id, $nav_type);
                            $module .= "</li>";
                            $module_count++;
                        }
                        if ($quiz_id && $nav_type == 'program' && $quiz_type == 'Subjective') {
                            //echo "testing";
                            // $quiz.= '<li><a href = "' . base_url() . "node/" . get_quiz_type_from_node($rec->id) . '">' . "$rec->name</a></li>";
                            $module .= '<li><a href = "' . base_url() . "node/$nav_type/$rec->id" . '">' . "$rec->name</a>";
                            $module .= $this->is_child_exist($node_type, $rec->id, $nav_type);
                            $module .= "</li>";
                            $module_count++;
                        }
                        if ($quiz_id && $nav_type == 'test_centre' && $quiz_type != 'Practice') {
                            // $quiz.= '<li><a href = "' . base_url() . "node/" . get_quiz_type_from_node($rec->id) . '">' . "$rec->name</a></li>";
                            $module .= '<li><a href = "' . base_url() . "node/$nav_type/$rec->id" . '">' . "$rec->name</a>";
                            $module .= $this->is_child_exist($node_type, $rec->id, $nav_type);
                            $module .= "</li>";
                            $module_count++;
                        }


                        break;
                    default:
                        break;
                }
                // }
            }
        } else {
            foreach ($result->result() as $rec) {

                $node_type = $rec->type;

                switch ($node_type) {
                    case "Module":
                        $module .= '<li><a href = "' . base_url() . "node/$nav_type/$rec->id" . '">' . "$rec->name</a>";
                        $module .= $this->is_child_exist($node_type, $rec->id, $nav_type);
                        $module .= "</li>";
                        $module_count++;
                        break;
                    case "Sheet":
                        $sheet_id = $CI_Model->main_model->get_name_from_id('sheets', 'id', $rec->id, 'node');
                        if (!$sheet_id) {
                            break;
                        }
                        $sheet .= '<li><a href = "' . base_url() . "sheets/sheets/$sheet_id" . '"><u><font color="blue">' . "$rec->name</font></u></a>";
                        //$sheet.= $this->is_child_exist($node_type, $sheet_id, 'sheets');
                        $sheet .= "</li>";
                        $sheet_count++;
                        break;
                    case "Quiz":
                        $quiz_details = $CI_Model->main_model->get_records_from_id('quiz', $rec->id, 'node', array('id', 'quiz_type'));
                        $quiz_type = $quiz_details['quiz_type'];
                        $quiz_id = $quiz_details['id'];

                        //$quiz_type = 'Practice';&& $nav_type =='program' && $quiz_type == 'Practice'
                        if ($quiz_id && $nav_type == 'program' && $quiz_type == 'Practice') {
                            // $quiz.= '<li><a href = "' . base_url() . "node/" . get_quiz_type_from_node($rec->id) . '">' . "$rec->name</a></li>";
                            $module .= '<li><a href = "' . base_url() . "node/$nav_type/$rec->id" . '">' . "$rec->name</a>";
                            $module .= $this->is_child_exist($node_type, $rec->id, $nav_type);
                            $module .= "</li>";
                            $module_count++;
                        }
                        if ($quiz_id && $nav_type == 'program' && $quiz_type == 'Subjective') {
                            //echo "testing";
                            // $quiz.= '<li><a href = "' . base_url() . "node/" . get_quiz_type_from_node($rec->id) . '">' . "$rec->name</a></li>";
                            $module .= '<li><a href = "' . base_url() . "node/$nav_type/$rec->id" . '">' . "$rec->name</a>";
                            $module .= $this->is_child_exist($node_type, $rec->id, $nav_type);
                            $module .= "</li>";
                            $module_count++;
                        }
                        if ($quiz_id && $nav_type == 'test_centre' && $quiz_type != 'Practice') {
                            // $quiz.= '<li><a href = "' . base_url() . "node/" . get_quiz_type_from_node($rec->id) . '">' . "$rec->name</a></li>";
                            $module .= '<li><a href = "' . base_url() . "node/$nav_type/$rec->id" . '">' . "$rec->name</a>";
                            $module .= $this->is_child_exist($node_type, $rec->id, $nav_type);
                            $module .= "</li>";
                            $module_count++;
                        }


                        break;
                    default:
                        break;
                }
            }
        }

        $module .= '</ul>
        </div>';

        $sheet .= '</ul>
        </div>';
        switch ($nav_type) {
            case "program":
                if ($module_count) {
                    echo $module;
                }
                if ($sheet_count) {
                    echo $sheet;
                }
                break;
            case "sheets":
                if ($module_count) {
                    echo $module;
                }
                if ($sheet_count) {
                    echo $sheet;
                }
                break;
            case "test_centre":
                if ($module_count) {
                    echo $module;
                }
                if ($sheet_count) {
                    echo $sheet;
                }
                break;
        }
    }

    function get_side_navigation_panel_new($node = "", $nav_type = '', $order_by = "name") {//For node system
        $CI_Model = & get_instance();
        $CI_Model->load->model('main_model');

       // echo "<pre>";
       // print_r($node);
       // die;

        $sheet = '<div class="panel panel-primary border">
                <h4 class="quickpanelhead quiz_head">Action Sheet</h4>
            <ul class="nav nav-pills nav-stacked nav-sidebar" id="accordion">';


        $module = '<div class="panel panel-primary border">
                <h4 class="quickpanelhead quiz_head">';
        $name = $CI_Model->main_model->get_name_from_id('node', 'name', $node, "id");

        if ($node) {
            $module .= $name;
        } else {
            $module .= 'Programs';
        }


        $module .= '</h4>';
        $module .= '<ul id="my_left_accordion" class="my_left_accordion nav nav-pills nav-stacked nav-sidebar">';


        $result = $CI_Model->main_model->get_records('node', 'parent_id', $node, 'sort_order, name');

        $nodes = $result->result();

        if (($_SESSION['role_name'] != 'Manager') && ($_SESSION['role_name'] != 'Super Admin')) {
            foreach ($nodes as $key => $value) {
                $is_grant = $this->is_associated_with_package($value->id);
                if (!$is_grant) {
                    unset($nodes[$key]);
                }
            }
        }

        $module_count = 0;
        $quiz_count = 0;
        $sheet_count = 0;
        if ($nav_type == 'test_centre') {
            echo "test_center";die;
            foreach ($nodes as $rec) {
                $node_type = $rec->type;
                switch ($node_type) {
                    case "Quiz":
                        $quiz_details = $CI_Model->main_model->get_records_from_id('quiz', $rec->id, 'node', array('id', 'quiz_type'));
                        if (isset($quiz_details) && !empty($quiz_details)) {
                            $quiz_type = $quiz_details['quiz_type'];
                            $quiz_id = $quiz_details['id'];
                        }

//=====================================CHECKING IF THE QUIZ_ID IS EMPTY OR NOT=====================================
                        if (isset($quiz_id)) {
                            $module .= '<li><a href = "' . base_url() . "node/$nav_type/$rec->id" . '">' . "$rec->name</a>";
                            $module .= $this->is_child_exist($node_type, $rec->id, $nav_type);
                            $module .= "</li>";
                            $module_count++;
                        } else {
                            $module .= '<li><a href = "' . base_url() . "node/$nav_type/$rec->id" . '">' . "$rec->name</a>";
                            $module .= $this->is_child_exist($node_type, $rec->id, $nav_type);
                            $module .= "</li>";
                            $module_count++;
                        }
                        break;
                    default:
                        break;
                }
            }
        } elseif ($nav_type == 'analytics') {
            $childsecond = '';
            foreach ($nodes as $rec) {

                $CI = & get_instance();
//                $totalt = $CI->topicandcomprehchildtwo($rec->id);
                $totalt = $CI->get_node_child($rec->id);
                $endtotal = $CI->endchild($rec->id);
                $quantchild = $totalt + $childsecond;

                $node_type = $rec->type;

                switch ($node_type) {

                    case "Module":
                        $module .= '<li><a href = "' . base_url() . "node/$nav_type/$rec->id" . '">' . "$rec->name($quantchild)</a>";
                        $module .= $this->is_child_exist($node_type, $rec->id, $nav_type);
                        $module .= "</li>";
                        $module_count++;
                        break;

                    case "Sheet":
                        $sheet_id = $CI_Model->main_model->get_name_from_id('sheets', 'id', $rec->id, 'node');
                        if (!$sheet_id) {
                            break;
                        }
                        $sheet .= '<li><a href = "' . base_url() . "sheets/sheets/$sheet_id" . '"><u><font color="blue">' . "$rec->name</font></u></a>";
                        $sheet .= "</li>";
                        $sheet_count++;
                        break;



                    case "Quiz":
                        $quiz_details = $CI_Model->main_model->get_records_from_id('quiz', $rec->id, 'node', array('id', 'quiz_type'));
                        if (isset($quiz_details) && !empty($quiz_details)) {
                            $quiz_type = $quiz_details['quiz_type'];
                            $quiz_id = $quiz_details['id'];
                        } else {
                            $quiz_type = '';
                            $quiz_id = '';
                        }
//
//============================Checking if quiz is empty or not=======================
                        if (isset($quiz_type) == '') {
                            $module .= '<li><a href = "' . base_url() . "node/$nav_type/$rec->id" . '">' . "$rec->name($totalt)</a>";
                            $module .= $this->is_child_exist($node_type, $rec->id, $nav_type);
                            $module .= "</li>";
                            $module_count++;
                        }
                        if (isset($quiz_id) && $quiz_type != 'Practice') {
                            $module .= '<li><a href = "' . base_url() . "node/$nav_type/$rec->id" . '">' . "$rec->name ($totalt)</a>";
                            $module .= $this->is_child_exist($node_type, $rec->id, $nav_type);
                            $module .= "</li>";
                            $module_count++;
                        }

                        if (isset($quiz_id) && $quiz_type == 'Practice') {
                            $module .= '<li><a href = "' . base_url() . "node/$nav_type/$rec->id" . '">' . "$rec->name ($totalt)</a>";
                            $module .= $this->is_child_exist($node_type, $rec->id, $nav_type);
                            $module .= "</li>";
                            $module_count++;
                        }
                        break;
                    default:
                        break;
                }
            }
        } else {
            foreach ($nodes as $rec) {
                $node_type = $rec->type;

                switch ($node_type) {

                    case "Module":
                        $module .= '<li><a href = "' . base_url() . "node/$nav_type/$rec->id" . '">' . "$rec->name</a>";
                        $module .= $this->is_child_exist($node_type, $rec->id, $nav_type);
                        $module .= "</li>";
                        $module_count++;
                        break;

                    case "Sheet":
                        $sheet_id = $CI_Model->main_model->get_name_from_id('sheets', 'id', $rec->id, 'node');
                        if (!$sheet_id) {
                            break;
                        }
                        $sheet .= '<li><a href = "' . base_url() . "sheets/sheets/$sheet_id" . '"><u><font color="blue">' . "$rec->name</font></u></a>";
                        $sheet .= "</li>";
                        $sheet_count++;
                        break;

                    case "Quiz":
                        $quiz_details = $CI_Model->main_model->get_records_from_id('quiz', $rec->id, 'node', array('id', 'quiz_type'));
                        if (isset($quiz_details) && !empty($quiz_details)) {
                            $quiz_type = $quiz_details['quiz_type'];
                            $quiz_id = $quiz_details['id'];
                        } else {
                            $quiz_type = '';
                            $quiz_id = '';
                        }

//==================Checking if quiz is empty or not=======================
                        if ($quiz_id == '') {
                            $module .= '<li><a href = "' . base_url() . "node/$nav_type/$rec->id" . '">' . "$rec->name</a>";
                            $module .= $this->is_child_exist($node_type, $rec->id, $nav_type);
                            $module .= "</li>";
                            $module_count++;
                        }

                        if ($quiz_id && $quiz_type == 'Practice') {
                            $module .= '<li><a href = "' . base_url() . "node/$nav_type/$rec->id" . '">' . "$rec->name</a>";
                            $module .= $this->is_child_exist($node_type, $rec->id, $nav_type);
                            $module .= "</li>";
                            $module_count++;
                        }

//                        if ($quiz_id && $quiz_type != 'Practice') {
//                            $module .= '<li><a href = "' . base_url() . "node/$nav_type/$rec->id" . '">' . "$rec->name</a>";
//                            $module .= $this->is_child_exist($node_type, $rec->id, $nav_type);
//                            $module .= "</li>";
//                            $module_count++;
//                        }

                        if ($quiz_id && $quiz_type == 'Subjective') {
                            $module .= '<li><a href = "' . base_url() . "node/$nav_type/$rec->id" . '">' . "$rec->name</a>";
                            $module .= $this->is_child_exist($node_type, $rec->id, $nav_type);
                            $module .= "</li>";
                            $module_count++;
                        }
                        break;

                    case "Group Discussion":

                        $quiz_details = $CI_Model->main_model->get_records_from_id('quiz', $rec->id, 'node', array('id', 'quiz_type'));
                        if (isset($quiz_details) && !empty($quiz_details)) {
                            $quiz_type = $quiz_details['quiz_type'];
                            $quiz_id = $quiz_details['id'];
                        } else {
                            $quiz_type = '';
                            $quiz_id = '';
                        }

                        if ($quiz_id && $quiz_type == 'Practice') {
                            $module .= '<li><a href = "' . base_url() . "node/$nav_type/$rec->id" . '">' . "$rec->name</a>";
                            $module .= $this->is_child_exist($node_type, $rec->id, $nav_type);
                            $module .= "</li>";
                            $module_count++;
                        } else {

                        }
                        break;
                    default:
                        break;
                }
            }
        }

        $module .= '</ul>
        </div>';

        $sheet .= '</ul>
        </div>';


        switch ($nav_type) {

            case "test_centre":
                if ($module_count) {
                    echo $module;
                }
                if ($sheet_count) {
                    echo $sheet;
                }
                break;

            case "program":
                if ($module_count) {
                    echo $module;
                }
                if ($sheet_count) {
                    echo $sheet;
                }

                break;

            case "analytics":
                if ($module_count) {
                    echo $module;
                }
                if ($sheet_count) {
                    echo $sheet;
                }
                break;

            case "sheets":
                if ($module_count) {
                    echo $module;
                }
                if ($sheet_count) {
                    echo $sheet;
                }
                break;
        }
    }

    function get_side_navigation_panel_new_student($node = "", $nav_type = '', $order_by = "name") {//For node system
        $CI_Model = & get_instance();
        $CI_Model->load->model('main_model');

       //echo "<pre>";
       //print_r($node);
       //die;

        $sheet = '<div class="panel panel-primary border">
                <h4 class="quickpanelhead quiz_head">Action Sheet</h4>
            <ul class="nav nav-pills nav-stacked nav-sidebar" id="accordion">';


        $module = '<div class="panel panel-primary border">
                <h4 class="quickpanelhead quiz_head">';
        $name = $CI_Model->main_model->get_name_from_id('node', 'name', $node, "id");
        //echo $CI_Model->db->last_query();die;
        if ($node) {
            $module .= $name;
        } else {
            $module .= 'Programs';
        }
		//echo $name;die;

        $module .= '</h4>';
        $module .= '<ul id="my_left_accordion" class="my_left_accordion nav nav-pills nav-stacked nav-sidebar">';


        $result = $CI_Model->main_model->get_records('node', 'parent_id', $node, 'sort_order, name');
		//echo $CI_Model->db->last_query();die;
        $nodes = $result->result();

        if (($_SESSION['role_name'] != 'Manager') && ($_SESSION['role_name'] != 'Super Admin')) {
            foreach ($nodes as $key => $value) {
                $is_grant = $this->is_associated_with_package($value->id);
                if (!$is_grant) {
                    unset($nodes[$key]);
                }
            }
        }

        $module_count = 0;
        $quiz_count = 0;
        $sheet_count = 0;
        if ($nav_type == 'test_centre') {
            foreach ($nodes as $rec) {
                $node_type = $rec->type;
                switch ($node_type) {
                    case "Quiz":
                        $quiz_details = $CI_Model->main_model->get_records_from_id('quiz', $rec->id, 'node', array('id', 'quiz_type'));
                        if (isset($quiz_details) && !empty($quiz_details)) {
                            $quiz_type = $quiz_details['quiz_type'];
                            $quiz_id = $quiz_details['id'];
                        }

//=====================================CHECKING IF THE QUIZ_ID IS EMPTY OR NOT=====================================
                        if (isset($quiz_id)) {
                            $module .= '<li><a href = "' . base_url() . "node/$nav_type/$rec->id" . '">' . "$rec->name</a>";
                            $module .= $this->is_child_exist($node_type, $rec->id, $nav_type);
                            $module .= "</li>";
                            $module_count++;
                        } else {
                            $module .= '<li><a href = "' . base_url() . "node/$nav_type/$rec->id" . '">' . "$rec->name</a>";
                            $module .= $this->is_child_exist($node_type, $rec->id, $nav_type);
                            $module .= "</li>";
                            $module_count++;
                        }
                        break;
                    default:
                        break;
                }
            }
        } elseif ($nav_type == 'analytics') {
            $childsecond = '';
            foreach ($nodes as $rec) {

                $CI = & get_instance();
//                $totalt = $CI->topicandcomprehchildtwo($rec->id);
                $totalt = $CI->get_node_child($rec->id);
                $endtotal = $CI->endchild($rec->id);
                $quantchild = $totalt + $childsecond;

                $node_type = $rec->type;

                switch ($node_type) {

                    case "Module":
                        $module .= '<li><a href = "' . base_url() . "node/$nav_type/$rec->id" . '">' . "$rec->name($quantchild)</a>";
                        $module .= $this->is_child_exist($node_type, $rec->id, $nav_type);
                        $module .= "</li>";
                        $module_count++;
                        break;

                    case "Sheet":
                        $sheet_id = $CI_Model->main_model->get_name_from_id('sheets', 'id', $rec->id, 'node');
                        if (!$sheet_id) {
                            break;
                        }
                        $sheet .= '<li><a href = "' . base_url() . "sheets/sheets/$sheet_id" . '"><u><font color="blue">' . "$rec->name</font></u></a>";
                        $sheet .= "</li>";
                        $sheet_count++;
                        break;



                    case "Quiz":
                        $quiz_details = $CI_Model->main_model->get_records_from_id('quiz', $rec->id, 'node', array('id', 'quiz_type'));
                        if (isset($quiz_details) && !empty($quiz_details)) {
                            $quiz_type = $quiz_details['quiz_type'];
                            $quiz_id = $quiz_details['id'];
                        } else {
                            $quiz_type = '';
                            $quiz_id = '';
                        }
//
//============================Checking if quiz is empty or not=======================
                        if (isset($quiz_type) == '') {
                            $module .= '<li><a href = "' . base_url() . "node/$nav_type/$rec->id" . '">' . "$rec->name($totalt)</a>";
                            $module .= $this->is_child_exist($node_type, $rec->id, $nav_type);
                            $module .= "</li>";
                            $module_count++;
                        }
                        if (isset($quiz_id) && $quiz_type != 'Practice') {
                            $module .= '<li><a href = "' . base_url() . "node/$nav_type/$rec->id" . '">' . "$rec->name ($totalt)</a>";
                            $module .= $this->is_child_exist($node_type, $rec->id, $nav_type);
                            $module .= "</li>";
                            $module_count++;
                        }

                        if (isset($quiz_id) && $quiz_type == 'Practice') {
                            $module .= '<li><a href = "' . base_url() . "node/$nav_type/$rec->id" . '">' . "$rec->name ($totalt)</a>";
                            $module .= $this->is_child_exist($node_type, $rec->id, $nav_type);
                            $module .= "</li>";
                            $module_count++;
                        }
                        break;
                    default:
                        break;
                }
            }
        } else {
            foreach ($nodes as $rec) {
                $node_type = $rec->type;

                switch ($node_type) {

                    case "Module":
                        $module .= '<li><a href = "' . base_url() . "node/$nav_type/$rec->id" . '">' . "$rec->name</a>";
                        $module .= $this->is_child_exist($node_type, $rec->id, $nav_type);
                        $module .= "</li>";
                        $module_count++;
                        break;

                    case "Sheet":
                        $sheet_id = $CI_Model->main_model->get_name_from_id('sheets', 'id', $rec->id, 'node');
                        if (!$sheet_id) {
                            break;
                        }
                        $sheet .= '<li><a href = "' . base_url() . "sheets/sheets/$sheet_id" . '"><u><font color="blue">' . "$rec->name</font></u></a>";
                        $sheet .= "</li>";
                        $sheet_count++;
                        break;

                    case "Quiz":
                        $quiz_details = $CI_Model->main_model->get_records_from_id('quiz', $rec->id, 'node', array('id', 'quiz_type'));
                        if (isset($quiz_details) && !empty($quiz_details)) {
                            $quiz_type = $quiz_details['quiz_type'];
                            $quiz_id = $quiz_details['id'];
                        } else {
                            $quiz_type = '';
                            $quiz_id = '';
                        }

//==================Checking if quiz is empty or not=======================
                        if ($quiz_id == '') {
                            $module .= '<li><a href = "' . base_url() . "node/$nav_type/$rec->id" . '">' . "$rec->name</a>";
                            $module .= $this->is_child_exist($node_type, $rec->id, $nav_type);
                            $module .= "</li>";
                            $module_count++;
                        }

                        if ($quiz_id && $quiz_type == 'Practice') {
                            $module .= '<li><a href = "' . base_url() . "node/$nav_type/$rec->id" . '">' . "$rec->name</a>";
                            $module .= $this->is_child_exist($node_type, $rec->id, $nav_type);
                            $module .= "</li>";
                            $module_count++;
                        }

//                        if ($quiz_id && $quiz_type != 'Practice') {
//                            $module .= '<li><a href = "' . base_url() . "node/$nav_type/$rec->id" . '">' . "$rec->name</a>";
//                            $module .= $this->is_child_exist($node_type, $rec->id, $nav_type);
//                            $module .= "</li>";
//                            $module_count++;
//                        }

                        if ($quiz_id && $quiz_type == 'Subjective') {
                            $module .= '<li><a href = "' . base_url() . "node/$nav_type/$rec->id" . '">' . "$rec->name</a>";
                            $module .= $this->is_child_exist($node_type, $rec->id, $nav_type);
                            $module .= "</li>";
                            $module_count++;
                        }
                        break;

                    case "Group Discussion":

                        $quiz_details = $CI_Model->main_model->get_records_from_id('quiz', $rec->id, 'node', array('id', 'quiz_type'));
                        if (isset($quiz_details) && !empty($quiz_details)) {
                            $quiz_type = $quiz_details['quiz_type'];
                            $quiz_id = $quiz_details['id'];
                        } else {
                            $quiz_type = '';
                            $quiz_id = '';
                        }

                        if ($quiz_id && $quiz_type == 'Practice') {
                            $module .= '<li><a href = "' . base_url() . "node/$nav_type/$rec->id" . '">' . "$rec->name</a>";
                            $module .= $this->is_child_exist($node_type, $rec->id, $nav_type);
                            $module .= "</li>";
                            $module_count++;
                        } else {

                        }
                        break;
                    default:
                        break;
                }
            }
        }

        $module .= '</ul>
        </div>';

        $sheet .= '</ul>
        </div>';


        switch ($nav_type) {

            case "test_centre":
                if ($module_count) {
                    echo $module;
                }
                if ($sheet_count) {
                    echo $sheet;
                }
                break;

            case "program":
                if ($module_count) {
                    echo $module;
                }
                if ($sheet_count) {
                    echo $sheet;
                }

                break;

            case "analytics":
                if ($module_count) {
                    echo $module;
                }
                if ($sheet_count) {
                    echo $sheet;
                }
                break;

            case "sheets":
                if ($module_count) {
                    echo $module;
                }
                if ($sheet_count) {
                    echo $sheet;
                }
                break;
        }
    }
	
	function get_side_navigation_panel_new_student_test_center($node = "", $nav_type = '', $order_by = "name") {//For node system
        $CI_Model = & get_instance();
        $CI_Model->load->model('main_model');

       //echo "<pre>";
       //print_r($node);
       //die;

        $sheet = '<div class="panel panel-primary border">
                <h4 class="quickpanelhead quiz_head">Action Sheet</h4>
            <ul class="nav nav-pills nav-stacked nav-sidebar" id="accordion">';


        $module = '<div class="panel panel-primary border">
                <h4 class="quickpanelhead quiz_head">';
        $name = $CI_Model->main_model->get_name_from_id('node', 'name', $node, "id");
        //echo $CI_Model->db->last_query();die;
        if ($node) {
            $module .= $name;
        } else {
            $module .= 'Assessment Center';
        }
		//echo $name;die;

        $module .= '</h4>';
        $module .= '<ul id="my_left_accordion" class="my_left_accordion nav nav-pills nav-stacked nav-sidebar">';

		if($node == 0){
			//echo "is 0";die;
			$nodes = $CI_Model->main_model->fill_nav_node_li_quiz_type_two_new_design_test_center();
			//echo "<pre>";
			//print_r($result);die;
		}else{
			$result = $CI_Model->main_model->get_records('node', 'parent_id', $node, 'sort_order, name');
			//echo $CI_Model->db->last_query();die;
            $nodes = $result->result();
		}
        
		
		//echo "<pre>";
	    //print_r($nodes);die;

        if (($_SESSION['role_name'] != 'Manager') && ($_SESSION['role_name'] != 'Super Admin')) {
            foreach ($nodes as $key => $value) {
				//echo $value->id;die;
                $is_grant = $this->is_associated_with_package($value->id);
                if (!$is_grant) {
                    unset($nodes[$key]);
                }
            }
        }
		/*echo "<pre>";
	    print_r($nodes);die;*/
        $module_count = 0;
        $quiz_count = 0;
        $sheet_count = 0;
		//echo $nav_type;die;
        if ($nav_type == 'test_center') {
            foreach ($nodes as $rec) {
                $node_type = $rec->type;
				//echo $node_type;die;
                switch ($node_type) {
                    case "Quiz":
                        $quiz_details = $CI_Model->main_model->get_records_from_id('quiz', $rec->id, 'node', array('id', 'quiz_type'));
                        if (isset($quiz_details) && !empty($quiz_details)) {
                            $quiz_type = $quiz_details['quiz_type'];
                            $quiz_id = $quiz_details['id'];
                        }

//=====================================CHECKING IF THE QUIZ_ID IS EMPTY OR NOT=====================================
                        if (isset($quiz_id)) {
                            $module .= '<li><a href = "' . base_url() . "node/$nav_type/$rec->id" . '">' . "$rec->name</a>";
                            $module .= $this->is_child_exist($node_type, $rec->id, $nav_type);
                            $module .= "</li>";
                            $module_count++;
                        } else {
                            $module .= '<li><a href = "' . base_url() . "node/$nav_type/$rec->id" . '">' . "$rec->name</a>";
                            $module .= $this->is_child_exist($node_type, $rec->id, $nav_type);
                            $module .= "</li>";
                            $module_count++;
                        }
                        break;
                    default:
                        break;
                }
            }
        } elseif ($nav_type == 'analytics') {
            $childsecond = '';
            foreach ($nodes as $rec) {

                $CI = & get_instance();
//                $totalt = $CI->topicandcomprehchildtwo($rec->id);
                $totalt = $CI->get_node_child($rec->id);
                $endtotal = $CI->endchild($rec->id);
                $quantchild = $totalt + $childsecond;

                $node_type = $rec->type;

                switch ($node_type) {

                    case "Module":
                        $module .= '<li><a href = "' . base_url() . "node/$nav_type/$rec->id" . '">' . "$rec->name($quantchild)</a>";
                        $module .= $this->is_child_exist($node_type, $rec->id, $nav_type);
                        $module .= "</li>";
                        $module_count++;
                        break;

                    case "Sheet":
                        $sheet_id = $CI_Model->main_model->get_name_from_id('sheets', 'id', $rec->id, 'node');
                        if (!$sheet_id) {
                            break;
                        }
                        $sheet .= '<li><a href = "' . base_url() . "sheets/sheets/$sheet_id" . '"><u><font color="blue">' . "$rec->name</font></u></a>";
                        $sheet .= "</li>";
                        $sheet_count++;
                        break;



                    case "Quiz":
                        $quiz_details = $CI_Model->main_model->get_records_from_id('quiz', $rec->id, 'node', array('id', 'quiz_type'));
                        if (isset($quiz_details) && !empty($quiz_details)) {
                            $quiz_type = $quiz_details['quiz_type'];
                            $quiz_id = $quiz_details['id'];
                        } else {
                            $quiz_type = '';
                            $quiz_id = '';
                        }
//
//============================Checking if quiz is empty or not=======================
                        if (isset($quiz_type) == '') {
                            $module .= '<li><a href = "' . base_url() . "node/$nav_type/$rec->id" . '">' . "$rec->name($totalt)</a>";
                            $module .= $this->is_child_exist($node_type, $rec->id, $nav_type);
                            $module .= "</li>";
                            $module_count++;
                        }
                        if (isset($quiz_id) && $quiz_type != 'Practice') {
                            $module .= '<li><a href = "' . base_url() . "node/$nav_type/$rec->id" . '">' . "$rec->name ($totalt)</a>";
                            $module .= $this->is_child_exist($node_type, $rec->id, $nav_type);
                            $module .= "</li>";
                            $module_count++;
                        }

                        if (isset($quiz_id) && $quiz_type == 'Practice') {
                            $module .= '<li><a href = "' . base_url() . "node/$nav_type/$rec->id" . '">' . "$rec->name ($totalt)</a>";
                            $module .= $this->is_child_exist($node_type, $rec->id, $nav_type);
                            $module .= "</li>";
                            $module_count++;
                        }
                        break;
                    default:
                        break;
                }
            }
        } else {
            foreach ($nodes as $rec) {
                $node_type = $rec->type;

                switch ($node_type) {

                    case "Module":
                        $module .= '<li><a href = "' . base_url() . "node/$nav_type/$rec->id" . '">' . "$rec->name</a>";
                        $module .= $this->is_child_exist($node_type, $rec->id, $nav_type);
                        $module .= "</li>";
                        $module_count++;
                        break;

                    case "Sheet":
                        $sheet_id = $CI_Model->main_model->get_name_from_id('sheets', 'id', $rec->id, 'node');
                        if (!$sheet_id) {
                            break;
                        }
                        $sheet .= '<li><a href = "' . base_url() . "sheets/sheets/$sheet_id" . '"><u><font color="blue">' . "$rec->name</font></u></a>";
                        $sheet .= "</li>";
                        $sheet_count++;
                        break;

                    case "Quiz":
                        $quiz_details = $CI_Model->main_model->get_records_from_id('quiz', $rec->id, 'node', array('id', 'quiz_type'));
                        if (isset($quiz_details) && !empty($quiz_details)) {
                            $quiz_type = $quiz_details['quiz_type'];
                            $quiz_id = $quiz_details['id'];
                        } else {
                            $quiz_type = '';
                            $quiz_id = '';
                        }

//==================Checking if quiz is empty or not=======================
                        if ($quiz_id == '') {
                            $module .= '<li><a href = "' . base_url() . "node/$nav_type/$rec->id" . '">' . "$rec->name</a>";
                            $module .= $this->is_child_exist($node_type, $rec->id, $nav_type);
                            $module .= "</li>";
                            $module_count++;
                        }

                        if ($quiz_id && $quiz_type == 'Practice') {
                            $module .= '<li><a href = "' . base_url() . "node/$nav_type/$rec->id" . '">' . "$rec->name</a>";
                            $module .= $this->is_child_exist($node_type, $rec->id, $nav_type);
                            $module .= "</li>";
                            $module_count++;
                        }

//                        if ($quiz_id && $quiz_type != 'Practice') {
//                            $module .= '<li><a href = "' . base_url() . "node/$nav_type/$rec->id" . '">' . "$rec->name</a>";
//                            $module .= $this->is_child_exist($node_type, $rec->id, $nav_type);
//                            $module .= "</li>";
//                            $module_count++;
//                        }

                        if ($quiz_id && $quiz_type == 'Subjective') {
                            $module .= '<li><a href = "' . base_url() . "node/$nav_type/$rec->id" . '">' . "$rec->name</a>";
                            $module .= $this->is_child_exist($node_type, $rec->id, $nav_type);
                            $module .= "</li>";
                            $module_count++;
                        }
                        break;

                    case "Group Discussion":

                        $quiz_details = $CI_Model->main_model->get_records_from_id('quiz', $rec->id, 'node', array('id', 'quiz_type'));
                        if (isset($quiz_details) && !empty($quiz_details)) {
                            $quiz_type = $quiz_details['quiz_type'];
                            $quiz_id = $quiz_details['id'];
                        } else {
                            $quiz_type = '';
                            $quiz_id = '';
                        }

                        if ($quiz_id && $quiz_type == 'Practice') {
                            $module .= '<li><a href = "' . base_url() . "node/$nav_type/$rec->id" . '">' . "$rec->name</a>";
                            $module .= $this->is_child_exist($node_type, $rec->id, $nav_type);
                            $module .= "</li>";
                            $module_count++;
                        } else {

                        }
                        break;
                    default:
                        break;
                }
            }
        }

        $module .= '</ul>
        </div>';

        $sheet .= '</ul>
        </div>';


        switch ($nav_type) {

            case "test_centre":
                if ($module_count) {
                    echo $module;
                }
                if ($sheet_count) {
                    echo $sheet;
                }
                break;

            case "program":
                if ($module_count) {
                    echo $module;
                }
                if ($sheet_count) {
                    echo $sheet;
                }

                break;

            case "analytics":
                if ($module_count) {
                    echo $module;
                }
                if ($sheet_count) {
                    echo $sheet;
                }
                break;

            case "sheets":
                if ($module_count) {
                    echo $module;
                }
                if ($sheet_count) {
                    echo $sheet;
                }
                break;
        }
    }

//    function get_side_navigation_panel_new($node = "", $nav_type = '', $order_by = "name") {//For node system
//        $CI_Model = & get_instance();
//        $CI_Model->load->model('main_model');
//
//        $sheet = '<div class="panel panel-primary border">
//                <h4 class="quickpanelhead quiz_head">Action Sheet</h4>
//            <ul class="nav nav-pills nav-stacked nav-sidebar" id="accordion">';
//
//
//        $module = '<div class="panel panel-primary border">
//                <h4 class="quickpanelhead quiz_head">';
//
//        $name = $CI_Model->main_model->get_name_from_id('node', 'name', $node, "id");
//
//
//        if ($node) {
//            $module .= $name;
//        } else {
//            $module .= 'Programs';
//        }
//
//
//        $module .= '</h4>';
//        $module .= '<ul id="my_left_accordion" class="my_left_accordion nav nav-pills nav-stacked nav-sidebar">';
//
//
//        $result = $CI_Model->main_model->get_records('node', 'parent_id', $node, 'sort_order, name');
//
//
//        $module_count = 0;
//        $quiz_count = 0;
//        $sheet_count = 0;
//
//
//
//        if ($nav_type == 'test_centre') {
//
//            foreach ($result->result() as $rec) {
//
//                $node_type = $rec->type;
//
//
//                switch ($node_type) {
//                    case "Quiz":
//                        $quiz_details = $CI_Model->main_model->get_records_from_id('quiz', $rec->id, 'node', array('id', 'quiz_type'));
//                        if (isset($quiz_details) && !empty($quiz_details)) {
//                            $quiz_type = $quiz_details['quiz_type'];
//                            $quiz_id = $quiz_details['id'];
//                        }
//
////=====================================CHECKING IF THE QUIZ_ID IS EMPTY OR NOT=====================================
//                        if (isset($quiz_id)) {
//                            $module .= '<li><a href = "' . base_url() . "node/$nav_type/$rec->id" . '">' . "$rec->name</a>";
//                            $module .= $this->is_child_exist($node_type, $rec->id, $nav_type);
//                            $module .= "</li>";
//                            $module_count++;
//                        } else {
//                            $module .= '<li><a href = "' . base_url() . "node/$nav_type/$rec->id" . '">' . "$rec->name</a>";
//                            $module .= $this->is_child_exist($node_type, $rec->id, $nav_type);
//                            $module .= "</li>";
//                            $module_count++;
//                        }
//                        break;
//                    default:
//                        break;
//                }
//            }
//        } elseif ($nav_type == 'analytics') {
//            $childsecond = '';
//            foreach ($result->result() as $rec) {
//
//                $CI = & get_instance();
////                $totalt = $CI->topicandcomprehchildtwo($rec->id);
//                $totalt = $CI->get_node_child($rec->id);
//                $endtotal = $CI->endchild($rec->id);
//                $quantchild = $totalt + $childsecond;
//
//                $node_type = $rec->type;
//
//                switch ($node_type) {
//
//                    case "Module":
//                        $module .= '<li><a href = "' . base_url() . "node/$nav_type/$rec->id" . '">' . "$rec->name($quantchild)</a>";
//                        $module .= $this->is_child_exist($node_type, $rec->id, $nav_type);
//                        $module .= "</li>";
//                        $module_count++;
//                        break;
//
//                    case "Sheet":
//                        $sheet_id = $CI_Model->main_model->get_name_from_id('sheets', 'id', $rec->id, 'node');
//                        if (!$sheet_id) {
//                            break;
//                        }
//                        $sheet .= '<li><a href = "' . base_url() . "sheets/sheets/$sheet_id" . '"><u><font color="blue">' . "$rec->name</font></u></a>";
//                        $sheet .= "</li>";
//                        $sheet_count++;
//                        break;
//
//
//
//                    case "Quiz":
//                        $quiz_details = $CI_Model->main_model->get_records_from_id('quiz', $rec->id, 'node', array('id', 'quiz_type'));
//                        if (isset($quiz_details) && !empty($quiz_details)) {
//                            $quiz_type = $quiz_details['quiz_type'];
//                            $quiz_id = $quiz_details['id'];
//                        } else {
//                            $quiz_type = '';
//                            $quiz_id = '';
//                        }
////
////============================Checking if quiz is empty or not=======================
//                        if (isset($quiz_type) == '') {
//                            $module .= '<li><a href = "' . base_url() . "node/$nav_type/$rec->id" . '">' . "$rec->name($totalt)</a>";
//                            $module .= $this->is_child_exist($node_type, $rec->id, $nav_type);
//                            $module .= "</li>";
//                            $module_count++;
//                        }
//                        if (isset($quiz_id) && $quiz_type != 'Practice') {
//                            $module .= '<li><a href = "' . base_url() . "node/$nav_type/$rec->id" . '">' . "$rec->name ($totalt)</a>";
//                            $module .= $this->is_child_exist($node_type, $rec->id, $nav_type);
//                            $module .= "</li>";
//                            $module_count++;
//                        }
//
//                        if (isset($quiz_id) && $quiz_type == 'Practice') {
//                            $module .= '<li><a href = "' . base_url() . "node/$nav_type/$rec->id" . '">' . "$rec->name ($totalt)</a>";
//                            $module .= $this->is_child_exist($node_type, $rec->id, $nav_type);
//                            $module .= "</li>";
//                            $module_count++;
//                        }
//                        break;
//                    default:
//                        break;
//                }
//            }
//        } else {
//
//            foreach ($result->result() as $rec) {
////                echo '<pre>';
////                print_r($rec);
////                die;
//                $node_type = $rec->type;
//
//                switch ($node_type) {
//
//                    case "Module":
//                        $module .= '<li><a href = "' . base_url() . "node/$nav_type/$rec->id" . '">' . "$rec->name</a>";
//                        $module .= $this->is_child_exist($node_type, $rec->id, $nav_type);
//                        $module .= "</li>";
//                        $module_count++;
//                        break;
//
//                    case "Sheet":
//                        $sheet_id = $CI_Model->main_model->get_name_from_id('sheets', 'id', $rec->id, 'node');
//                        if (!$sheet_id) {
//                            break;
//                        }
//                        $sheet .= '<li><a href = "' . base_url() . "sheets/sheets/$sheet_id" . '"><u><font color="blue">' . "$rec->name</font></u></a>";
//                        $sheet .= "</li>";
//                        $sheet_count++;
//                        break;
//
//                    case "Quiz":
//                        $quiz_details = $CI_Model->main_model->get_records_from_id('quiz', $rec->id, 'node', array('id', 'quiz_type'));
//                        if (isset($quiz_details) && !empty($quiz_details)) {
//                            $quiz_type = $quiz_details['quiz_type'];
//                            $quiz_id = $quiz_details['id'];
//                        } else {
//                            $quiz_type = '';
//                            $quiz_id = '';
//                        }
//
////==================Checking if quiz is empty or not=======================
//                        if ($quiz_id == '') {
//                            $module .= '<li><a href = "' . base_url() . "node/$nav_type/$rec->id" . '">' . "$rec->name</a>";
//                            $module .= $this->is_child_exist($node_type, $rec->id, $nav_type);
//                            $module .= "</li>";
//                            $module_count++;
//                        }
//
//                        if ($quiz_id && $quiz_type == 'Practice') {
//                            $module .= '<li><a href = "' . base_url() . "node/$nav_type/$rec->id" . '">' . "$rec->name</a>";
//                            $module .= $this->is_child_exist($node_type, $rec->id, $nav_type);
//                            $module .= "</li>";
//                            $module_count++;
//                        }
//
////                        if ($quiz_id && $quiz_type != 'Practice') {
////                            $module .= '<li><a href = "' . base_url() . "node/$nav_type/$rec->id" . '">' . "$rec->name</a>";
////                            $module .= $this->is_child_exist($node_type, $rec->id, $nav_type);
////                            $module .= "</li>";
////                            $module_count++;
////                        }
//
//                        if ($quiz_id && $quiz_type == 'Subjective') {
//                            $module .= '<li><a href = "' . base_url() . "node/$nav_type/$rec->id" . '">' . "$rec->name</a>";
//                            $module .= $this->is_child_exist($node_type, $rec->id, $nav_type);
//                            $module .= "</li>";
//                            $module_count++;
//                        }
//                        break;
//                    default:
//                        break;
//                }
//            }
//        }
//
//        $module .= '</ul>
//        </div>';
//
//        $sheet .= '</ul>
//        </div>';
//
//
//        switch ($nav_type) {
//
//            case "test_centre":
//                if ($module_count) {
//                    echo $module;
//                }
//                if ($sheet_count) {
//                    echo $sheet;
//                }
//                break;
//
//            case "program":
//                if ($module_count) {
//                    echo $module;
//                }
//                if ($sheet_count) {
//                    echo $sheet;
//                }
//
//                break;
//
//            case "analytics":
//                if ($module_count) {
//                    echo $module;
//                }
//                if ($sheet_count) {
//                    echo $sheet;
//                }
//                break;
//
//            case "sheets":
//                if ($module_count) {
//                    echo $module;
//                }
//                if ($sheet_count) {
//                    echo $sheet;
//                }
//                break;
//        }
//    }

    function is_child_exist_20190220($node_type, $id, $nav_type) {

        $CI_Model = & get_instance();
        $CI_Model->load->model('main_model');

        $filter[0]['id'] = 'parent_id';
        $filter[0]['value'] = $id;

        $req = array('id', 'name', 'type');
        $child_data = $CI_Model->main_model->get_many_records('node', $filter, $req, 'sort_order, name');

        $module = '';

        if (!empty($child_data)) {
            $module .= '<div class = "my_left_link"><i class = "fa fa-chevron-down"></i></div>';
            $module .= '<ul class = "submenu">';

            foreach ($child_data as $child_data_value) {
                $node_type = $child_data_value['type'];
                switch ($node_type) {
                    case "Module":
                        //$module.='<li><a href = "' . base_url() . 'node/' . $nav_type . '/' . $child_data_value['id'] . '">' . $child_data_value['name'] . '</a></li>';
                        $sheet_id = $CI_Model->main_model->get_name_from_id('sheets', 'id', $child_data_value['id'], 'node');
                        if (empty($sheet_id)) {
                            $module .= '<li><a href = "' . base_url() . 'node/' . $nav_type . '/' . $child_data_value['id'] . '">' . $child_data_value['name'] . '</a></li>';
                        } else {
                            $module .= '<li><a href = "' . base_url() . 'node/' . $nav_type . '/' . $child_data_value['id'] . '"><u><font color="blue">' . $child_data_value['name'] . '</font></u></a></li>';
                        }
                        break;
                    case "Sheet":
                        $sheet_id = $CI_Model->main_model->get_name_from_id('sheets', 'id', $id, 'node');
                        if (!$sheet_id) {
                            break;
                        }
                        $module .= '<li><a href = "' . base_url() . 'sheets/sheets/' . $sheet_id . '><u><font color="blue">' . $child_data_value['name'] . '</font></u></a></li>';
                        break;
                    case "Quiz":
                        $quiz_details = $CI_Model->main_model->get_records_from_id('quiz', $child_data_value['id'], 'node', array('id', 'quiz_type'));
                        $quiz_type = $quiz_details['quiz_type'];
                        $quiz_id = $quiz_details['id'];

                        //$quiz_type = 'Practice';&& $nav_type =='program' && $quiz_type == 'Practice'
                        if ($quiz_id && $nav_type == 'program' && $quiz_type == 'Practice') {
                            $module .= '<li><a href = "' . base_url() . 'node/' . $nav_type . '/' . $child_data_value['id'] . '">' . $child_data_value['name'] . '</a></li>';
                        }
                        if ($quiz_id && $nav_type == 'program' && $quiz_type == 'Subjective') {
                            $module .= '<li><a href = "' . base_url() . 'node/' . $nav_type . '/' . $child_data_value['id'] . '">' . $child_data_value['name'] . '</a></li>';
                        }
                        if ($quiz_id && $nav_type == 'test_centre' && $quiz_type != 'Practice') {
                            $module .= '<li><a href = "' . base_url() . 'node/' . $nav_type . '/' . $child_data_value['id'] . '">' . $child_data_value['name'] . '</a></li>';
                        }


                        break;
                    default:
                        //$module.='<li><a href = "">test</a></li>';
                        break;
                }
            }
            $module .= '</ul>';
        }

        return $module;
    }

    function is_child_exist($node_type, $id, $nav_type) {
        $CI_Model = & get_instance();
        $CI_Model->load->model('main_model');

        $filter[0]['id'] = 'parent_id';
        $filter[0]['value'] = $id;


        $req = array('id', 'name', 'type');

        $child_data = $CI_Model->main_model->get_many_records('node', $filter, $req, 'sort_order, name');

        $module = '';


        if (!empty($child_data)) {
            $module .= '<div class = "my_left_link"><i class = "fa fa-chevron-down"></i></div>';
            $module .= '<ul class = "submenu">';

            $childsecond = '';
            foreach ($child_data as $child_data_value) {

//===================Calling function from Controller================
                $CI = & get_instance();
//                $totalt = $CI->topicandcomprehchildtwo($child_data_value['id']);
                $totalt = $CI->get_node_child($child_data_value['id']);
                $endtotal = $CI->endchild($child_data_value['id']);
                $quantchild = $totalt + $childsecond;
//===================Calling function from Controller================
                $node_type = $child_data_value['type'];


                if ($nav_type == 'analytics') {
//                    die("1");
                    switch ($node_type) {

                        case "Module":
                            $sheet_id = $CI_Model->main_model->get_name_from_id('sheets', 'id', $child_data_value['id'], 'node');


                            if (empty($sheet_id)) {

                                $module .= '<li><a href = "' . base_url() . 'node/' . $nav_type . '/' . $child_data_value['id'] . '">' . $child_data_value['name'] . '(' . $quantchild . ')' . '</a></li>';
                            } else {

                                $module .= '<li><a href = "' . base_url() . 'node/' . $nav_type . '/' . $child_data_value['id'] . '"><u><font color = "blue">' . $child_data_value['name'] . '(' . $quantchild . ')' . '</font></u></a></li>';
                            }
                            break;

                        case "Sheet":
                            $sheet_id = $CI_Model->main_model->get_name_from_id('sheets', 'id', $id, 'node');
                            if (!$sheet_id) {
                                break;
                            }

                            $module .= '<li><a href = "' . base_url() . 'sheets/sheets/' . $sheet_id . '><u><font color="blue">' . $child_data_value['name'] . '(' . $quantchild . ')' . '</font></u></a></li>';
                            break;


                        case "Quiz":
                            $quiz_details = $CI_Model->main_model->get_records_from_id('quiz', $child_data_value['id'], 'node', array('id', 'quiz_type'));
                            if (isset($quiz_details) && !empty($quiz_details)) {
                                $quiz_type = $quiz_details['quiz_type'];
                                $quiz_id = $quiz_details['id'];
                            } else {
                                $quiz_type = '';
                                $quiz_id = '';
                            }
//                            $totalt = $CI->topicandcomprehchildtwo($child_data_value['id']);
                            $totalt = $CI->get_node_child($child_data_value['id']);

                            $endchild = $CI->endchild($child_data_value['id']);

                            if (isset($quiz_id) == '') {

                                $module .= '<li><a href = "' . base_url() . 'node/' . $nav_type . '/' . $child_data_value['id'] . '">' . $child_data_value['name'] . '(' . $totalt . ')' . '</a></li>';
                            }

                            if (isset($quiz_id) && $quiz_type != 'Practice') {

                                $module .= '<li><a href = "' . base_url() . 'node/' . $nav_type . '/' . $child_data_value['id'] . '">' . $child_data_value['name'] . '(' . $totalt . ')' . '</a></li>';
                            }

                            if (isset($quiz_id) && $quiz_type == 'Practice') {

                                $module .= '<li><a href = "' . base_url() . 'node/' . $nav_type . '/' . $child_data_value['id'] . '">' . $child_data_value['name'] . '(' . $totalt . ')' . '</a></li>';
                            }
                            break;

                        default:
                            break;
                    }
                } elseif ($nav_type == 'program') {
//                    die("2");
                    switch ($node_type) {

                        case "Module":
//$module.='<li><a href = "' . base_url() . 'node/' . $nav_type . '/' . $child_data_value['id'] . '">' . $child_data_value['name'] . '</a></li>';
                            $sheet_id = $CI_Model->main_model->get_name_from_id('sheets', 'id', $child_data_value['id'], 'node');


                            if (empty($sheet_id)) {

                                $module .= '<li><a href = "' . base_url() . 'node/' . $nav_type . '/' . $child_data_value['id'] . '">' . $child_data_value['name'] . '</a></li>';
                            } else {

                                $module .= '<li><a href = "' . base_url() . 'node/' . $nav_type . '/' . $child_data_value['id'] . '"><u><font color = "blue">' . $child_data_value['name'] . '</font></u></a></li>';
                            }
                            break;

                        case "Sheet":
                            $sheet_id = $CI_Model->main_model->get_name_from_id('sheets', 'id', $id, 'node');
                            if (!$sheet_id) {
                                break;
                            }

                            $module .= '<li><a href = "' . base_url() . 'sheets/sheets/' . $sheet_id . '><u><font color="blue">' . $child_data_value['name'] . '</font></u></a></li>';
                            break;

                        case "Quiz":
                            $quiz_details = $CI_Model->main_model->get_records_from_id('quiz', $child_data_value['id'], 'node', array('id', 'quiz_type'));
                            $quiz_type = $quiz_details['quiz_type'];
                            $quiz_id = $quiz_details['id'];

                            if ($quiz_id == '') {

                                $module .= '<li><a href = "' . base_url() . 'node/' . $nav_type . '/' . $child_data_value['id'] . '">' . $child_data_value['name'] . '</a></li>';
                            }

                            if ($quiz_id && $quiz_type == 'Practice') {

                                $module .= '<li><a href = "' . base_url() . 'node/' . $nav_type . '/' . $child_data_value['id'] . '">' . $child_data_value['name'] . '</a></li>';
                            }

                            if ($quiz_id && $quiz_type != 'Practice') {

                                $module .= '<li><a href = "' . base_url() . 'node/' . $nav_type . '/' . $child_data_value['id'] . '">' . $child_data_value['name'] . '</a></li>';
                            }


                            break;

                        default:
                            break;
                    }
                } else {
                    switch ($node_type) {
                        case "Quiz":
//                            $child_data_value['id'] = '2169';
                            $quiz_details = $CI_Model->main_model->get_records_from_id('quiz', $child_data_value['id'], 'node', array('id', 'quiz_type'));
                            if (isset($quiz_details) && !empty($quiz_details)) {
                                $quiz_type = $quiz_details['quiz_type'];
                                $quiz_id = $quiz_details['id'];
//                                echo '<pre>';
//                                print_r($quiz_type);
//                                print_r($quiz_id);
//                                die;
                            }

                            if (isset($quiz_id) == '') {
                                $module .= '<li><a href = "' . base_url() . 'node/' . $nav_type . '/' . $child_data_value['id'] . '">' . $child_data_value['name'] . '</a></li>';
                            }


                            if (isset($quiz_id) && $nav_type == 'test_centre' && $quiz_type != 'Practice') {

                                $module .= '<li><a href = "' . base_url() . 'node/' . $nav_type . '/' . $child_data_value['id'] . '">' . $child_data_value['name'] . '</a></li>';
                            }

                            if (isset($quiz_id) && $nav_type == 'test_centre' && $quiz_type == 'Practice') {

                                $module .= '<li><a href = "' . base_url() . 'node/' . $nav_type . '/' . $child_data_value['id'] . '">' . $child_data_value['name'] . '</a></li>';
                            }

                            break;
                        default:
                            break;
                    }
                }
            }
            //die;

            $module .= '</ul>';
        }

        return $module;
    }

//     function is_child_exist($node_type, $id, $nav_type) {
//         $CI_Model = & get_instance();
//         $CI_Model->load->model('main_model');
//         $filter[0]['id'] = 'parent_id';
//         $filter[0]['value'] = $id;
//         $req = array('id', 'name', 'type');
//         $child_data = $CI_Model->main_model->get_many_records('node', $filter, $req, 'sort_order, name');
//         $module = '';
//         if (!empty($child_data)) {
//             $module .= '<div class = "my_left_link"><i class = "fa fa-chevron-down"></i></div>';
//             $module .= '<ul class = "submenu">';
//             foreach ($child_data as $child_data_value) {
//                 $node_type = $child_data_value['type'];
//                 if ($nav_type != 'test_centre') {
//                     switch ($node_type) {
//                         case "Module":
//                             $sheet_id = $CI_Model->main_model->get_name_from_id('sheets', 'id', $child_data_value['id'], 'node');
//                             if (empty($sheet_id)) {
//                                 $module .= '<li><a href = "' . base_url() . 'node/' . $nav_type . '/' . $child_data_value['id'] . '">' . $child_data_value['name'] .  '</a></li>';
//                             } else {
//                                 $module .= '<li><a href = "' . base_url() . 'node/' . $nav_type . '/' . $child_data_value['id'] . '"><u><font color = "blue">' . $child_data_value['name'] .  '</font></u></a></li>';
//                             }
//                             break;
//                         case "Sheet":
//                             $sheet_id = $CI_Model->main_model->get_name_from_id('sheets', 'id', $id, 'node');
//                             if (!$sheet_id) {
//                                 break;
//                             }
//                             $module .= '<li><a href = "' . base_url() . 'sheets/sheets/' . $sheet_id . '><u><font color="blue">' . $child_data_value['name'] . '</font></u></a></li>';
//                             break;
//                         case "Quiz":
//                             $quiz_details = $CI_Model->main_model->get_records_from_id('quiz', $child_data_value['id'], 'node', array('id', 'quiz_type'));
//                             $quiz_type = $quiz_details['quiz_type'];
//                             $quiz_id = $quiz_details['id'];
//                         if ($quiz_id == '') {
//                             $module .= '<li><a href = "' . base_url() . 'node/' . $nav_type . '/' . $child_data_value['id'] . '">' . $child_data_value['name'] . '</a></li>';
//                         }
//                             if ($quiz_id && $nav_type == 'program' && $quiz_type == 'Practice') {
//                                 $module .= '<li><a href = "' . base_url() . 'node/' . $nav_type . '/' . $child_data_value['id'] . '">' . $child_data_value['name'] . '</a></li>';
//                             }
//                             if ($quiz_id && $nav_type == 'program' && $quiz_type == 'Subjective') {
//                                 $module .= '<li><a href = "' . base_url() . 'node/' . $nav_type . '/' . $child_data_value['id'] . '">' . $child_data_value['name'] .'</a></li>';
//                             }
//                             if ($quiz_id && $nav_type == 'analytics' && $quiz_type != 'Practice') {
//                             $module .= '<li><a href = "' . base_url() . 'node/' . $nav_type . '/' . $child_data_value['id'] . '">' . $child_data_value['name'] . '</a></li>';
//                             }
//                              if ($quiz_id && $nav_type == 'analytics' && $quiz_type == 'Practice') {
//                             $module .= '<li><a href = "' . base_url() . 'node/' . $nav_type . '/' . $child_data_value['id'] . '">' . $child_data_value['name'] . '</a></li>';
//                             }
//                             break;
//                         default:
// //$module.='<li><a href = "">test</a></li>';
//                             break;
//                     }
//                 } else {
//                     switch ($node_type) {
//                         case "Quiz":
//                             $quiz_details = $CI_Model->main_model->get_records_from_id('quiz', $child_data_value['id'], 'node', array('id', 'quiz_type'));
//                             $quiz_type = $quiz_details['quiz_type'];
//                             $quiz_id = $quiz_details['id'];
//                         if ($quiz_id == '') {
//                             $module .= '<li><a href = "' . base_url() . 'node/' . $nav_type . '/' . $child_data_value['id'] . '">' . $child_data_value['name'] . '</a></li>';
//                         }
//                             if ($quiz_id && $nav_type == 'program' && $quiz_type == 'Practice') {
//                                 $module .= '<li><a href = "' . base_url() . 'node/' . $nav_type . '/' . $child_data_value['id'] . '">' . $child_data_value['name'] .'</a></li>';
//                             }
//                             if ($quiz_id && $nav_type == 'program' && $quiz_type == 'Subjective') {
//                                 $module .= '<li><a href = "' . base_url() . 'node/' . $nav_type . '/' . $child_data_value['id'] . '">' . $child_data_value['name'] . '</a></li>';
//                             }
//                             if ($quiz_id && $nav_type == 'test_centre' && $quiz_type != 'Practice') {
//                                 $module .= '<li><a href = "' . base_url() . 'node/' . $nav_type . '/' . $child_data_value['id'] . '">' . $child_data_value['name'] . '</a></li>';
//                             }
//                             if ($quiz_id && $nav_type == 'test_centre' && $quiz_type == 'Practice') {
//                                 $module .= '<li><a href = "' . base_url() . 'node/' . $nav_type . '/' . $child_data_value['id'] . '">' . $child_data_value['name'] . '</a></li>';
//                             }
//                             if ($quiz_id && $nav_type == 'analytics' && $quiz_type != 'Practice') {
//                           $module .= '<li><a href = "' . base_url() . 'node/' . $nav_type . '/' . $child_data_value['id'] . '">' . $child_data_value['name'] . '</a></li>';
//                             }
//                             if ($quiz_id && $nav_type == 'analytics' && $quiz_type == 'Practice') {
//                          $module .= '<li><a href = "' . base_url() . 'node/' . $nav_type . '/' . $child_data_value['id'] . '">' . $child_data_value['name'] .'</a></li>';
//                             }
//                             break;
//                         default:
// //$module.='<li><a href = "">test</a></li>';
//                             break;
//                     }
//                 }
//             }
//             $module .= '</ul>';
//         }
//         return $module;
//     }



    function get_home_side_navigation_panel($id, $nav_type) {
        echo '<ul class = "nav navbar-nav side-nav">';

        $CI_Model = & get_instance();
        $CI_Model->load->model('main_model');



        echo '<li class = "dropdown">
        <a href = "#" class = "dropdown-toggle text" data-toggle = "dropdown"> Aptitude Development <b class = "fa fa-chevron-down li_caret"></b></a>
        <ul class = "dropdown-menu dropdown_box" role = "menu">
        <li><a href = ""> Quantitative </a></li>
        <li><a href = ""> Reasoning </a></li>
        </ul>
        </li>';

        echo '</ul>';
    }

    function create_side_navigation_panel($table = 'programs', $id_name = "", $id_val = 0, $order_by = "name", $header = "") {//for older format of programs
        echo '<div class = "panel panel-primary">
        <div class = "panel-heading">
        <h3 class = "panel-title">';
        echo $header;
        echo '</h3>
        </div>
        <ul class = "nav nav-pills nav-stacked nav-sidebar" id = "accordion">';
        $CI_Model = & get_instance();
        $CI_Model->load->model('main_model');
        if ($id_name) {
            $query['data'] = $CI_Model->main_model->get_records($table, $id_name, $id_val, $order_by);
        } else {
            $query['data'] = $CI_Model->main_model->get_records($table);
//$str = $CI_Model->db->last_query();
//echo $str;
        }
        foreach ($query['data']->result() as $rec) {
            echo '<li><a href = "' . base_url() . "show/$table/$rec->id" . '">' . "$rec->name</a></li>";
        };
        echo '</ul>
        </div>';
    }

    function get_node_crumb($id = 0) {

        static $crumb_array;
        $crumb_array[0]['id'] = 0;
        $crumb_array[0]['name'] = "Home";
        $crumb_array[0]['url'] = base_url();

        function get_crumb_array($id = 0, $i = 0) {
//            global $crumb_array;
//            echo 2132123;
//            use($crumb_array);
//            var_dump($crumb_array);
//            die;
            if ((!$id) || ($id == "0")) {
                $crumb_array[$i]['id'] = 0;
                $crumb_array[$i]['name'] = "Home";
                $crumb_array[$i]['url'] = base_url();
                return 1;
            } else {
                $crumb_array[$i]['id'] = $id;
                $CI_Model = & get_instance();
                $CI_Model->load->model('main_model');
                $crumb_array[$i]['name'] = $CI_Model->main_model->get_name_from_id("node", "name", $id);
                $crumb_array[$i]['url'] = base_url() . 'node/' . $id;
                $parent_id = $CI_Model->main_model->get_name_from_id("node", "parent_id", $id);
                return get_crumb_array($parent_id, --$i);
            }
        }

        echo ' <!--breadcrumb region start--> 
        <div class = "col-md-12">
        <ul class = "breadcrumb">';


        $CI_Model = & get_instance();
        $CI_Model->load->model('main_model');
        $level = $CI_Model->main_model->get_node_level($id);
        $top = $id;
        for ($i = $level; $i > 0; $i--) {
            $crumb_array[$i]['id'] = $top;
            $CI_Model = & get_instance();
            $CI_Model->load->model('main_model');
            $crumb_array[$i]['name'] = $CI_Model->main_model->get_name_from_id("node", "name", $top);
            $crumb_array[$i]['url'] = base_url() . 'node/' . $top;
            $top = $CI_Model->main_model->get_name_from_id("node", "parent_id", $top);
        }

        $crumb_array[0]['id'] = 0;
        $crumb_array[0]['name'] = "Home";
        $crumb_array[0]['url'] = base_url();

        for ($j = 0; $j <= $level; $j++) {
            echo '<li ';
            if ($j == $level) {
                echo 'class = "active" ';
            }
            echo '>';
            if ($j != $level) {
                echo '<a href = "' . $crumb_array[$j]['url'] . '">';
            }
            echo $crumb_array[$j]['name'];
            if ($j != $level) {
                echo '</a>';
            }
            if ($j != $level) {
                echo ' <span class = "divider"></span>';
            }
            echo '</li>';
        }

        echo '</ul>
        </div> 
        <!--breadcrumb region end-->
        <!--sidebar panel start -->
        <aside class = "col-md-3">
        <!--program menu start -->';
    }

    function get_nav_node_crumb($id = 0, $nav_type = '') {

        static $crumb_array;
        $crumb_array[0]['id'] = 0;
        $crumb_array[0]['name'] = "Home";
        $crumb_array[0]['url'] = base_url();

        function get_nav_crumb_array($id = 0, $i = 0) {
//            global $crumb_array;
//            echo 2132123;
//            use($crumb_array);
//            var_dump($crumb_array);
//            die;
            if ((!$id) || ($id == "0")) {
                $crumb_array[$i]['id'] = 0;
                $crumb_array[$i]['name'] = "Home";
                $crumb_array[$i]['url'] = base_url();
                return 1;
            } else {
                $crumb_array[$i]['id'] = $id;
                $CI_Model = & get_instance();
                $CI_Model->load->model('main_model');
                $crumb_array[$i]['name'] = $CI_Model->main_model->get_name_from_id("node", "name", $id);
                $crumb_array[$i]['url'] = base_url() . 'node/' . $nav_type . '/' . $id;
                $parent_id = $CI_Model->main_model->get_name_from_id("node", "parent_id", $id);
                return get_nav_crumb_array($parent_id, --$i);
            }
        }

        echo ' <!--breadcrumb region start--> 
        <div class = "col-md-12">
        <ul class = "breadcrumb breadcrumb_background">';


        $CI_Model = & get_instance();
        $CI_Model->load->model('main_model');
        $level = $CI_Model->main_model->get_node_level($id);
        $top = $id;
        for ($i = $level; $i > 0; $i--) {
            $crumb_array[$i]['id'] = $top;
            $CI_Model = & get_instance();
            $CI_Model->load->model('main_model');
            $crumb_array[$i]['name'] = $CI_Model->main_model->get_name_from_id("node", "name", $top);
            $crumb_array[$i]['url'] = base_url() . 'node/' . $nav_type . '/' . $top;
            $top = $CI_Model->main_model->get_name_from_id("node", "parent_id", $top);
        }

        $crumb_array[0]['id'] = 0;
        $crumb_array[0]['name'] = "Home";
        $crumb_array[0]['url'] = base_url();

        for ($j = 0; $j <= $level; $j++) {
            echo '<li ';
            if ($j == $level) {
                echo 'class = "active" ';
            }
            echo '>';
            if ($j != $level) {
                echo '<a href = "' . $crumb_array[$j]['url'] . '">';
            }
            echo $crumb_array[$j]['name'];
            if ($j != $level) {
                echo '</a>';
            }
            if ($j != $level) {
                echo ' <span class = "divider"></span>';
            }
            echo '</li>';
        }

        echo '</ul>
        </div> 
        <!--breadcrumb region end-->
        <!--sidebar panel start -->
        <aside class = "col-md-3">
        <!--program menu start -->';
    }

    function get_nav_node_crumb_student($id = 0, $nav_type = '') {

        static $crumb_array;
        $crumb_array[0]['id'] = 0;
        $crumb_array[0]['name'] = "Home";
        $crumb_array[0]['url'] = base_url();

        function get_nav_crumb_array($id = 0, $i = 0) {
//            global $crumb_array;
//            echo 2132123;
//            use($crumb_array);
//            var_dump($crumb_array);
//            die;
            if ((!$id) || ($id == "0")) {
                $crumb_array[$i]['id'] = 0;
                $crumb_array[$i]['name'] = "Home";
                $crumb_array[$i]['url'] = base_url();
                return 1;
            } else {
                $crumb_array[$i]['id'] = $id;
                $CI_Model = & get_instance();
                $CI_Model->load->model('main_model');
                $crumb_array[$i]['name'] = $CI_Model->main_model->get_name_from_id("node", "name", $id);
                $crumb_array[$i]['url'] = base_url() . 'node/' . $nav_type . '/' . $id;
                $parent_id = $CI_Model->main_model->get_name_from_id("node", "parent_id", $id);
                return get_nav_crumb_array($parent_id, --$i);
            }
        }

        echo ' <!--breadcrumb region start--> 
        <div class = "col-md-12">
        <ul class = "breadcrumb breadcrumb_background">';


        $CI_Model = & get_instance();
        $CI_Model->load->model('main_model');
        $level = $CI_Model->main_model->get_node_level($id);
        $top = $id;
        for ($i = $level; $i > 0; $i--) {
            $crumb_array[$i]['id'] = $top;
            $CI_Model = & get_instance();
            $CI_Model->load->model('main_model');
            $crumb_array[$i]['name'] = $CI_Model->main_model->get_name_from_id("node", "name", $top);
            $crumb_array[$i]['url'] = base_url() . 'node/' . $nav_type . '/' . $top;
            $top = $CI_Model->main_model->get_name_from_id("node", "parent_id", $top);
        }

        $crumb_array[0]['id'] = 0;
        $crumb_array[0]['name'] = "Home";
        $crumb_array[0]['url'] = base_url();

        for ($j = 0; $j <= $level; $j++) {
            echo '<li ';
            if ($j == $level) {
                echo 'class = "active" ';
            }
            echo '>';
            if ($j != $level) {
                echo '<a href = "' . $crumb_array[$j]['url'] . '">';
            }
            echo $crumb_array[$j]['name'];
            if ($j != $level) {
                echo '</a>';
            }
            if ($j != $level) {
                echo ' <span class = "divider"></span>';
            }
            echo '</li>';
        }

        echo '</ul>
        </div> 
        <!--breadcrumb region end-->
        <!--sidebar panel start -->
        <!--<aside class = "col-md-3"> -->
        <!--program menu start -->';
    }

    function insert_breadcrumbs($table, $id) {
        $CI_Model = & get_instance();
        $CI_Model->load->model('main_model');

        function get_parent_name($table, $id) {
            $CI_Model = & get_instance();
            $CI_Model->load->model('main_model');
            switch ($table) {
                case "programs":
                    $rec['table'] = $table;
                    $rec['name'] = 0;
                    return;
                    break;
                case "subprograms":
//                    $requested_fields = array("program_id");
//                    $result = $CI_Model->main_model->get_selected_records("subprograms", "id", $id, $requested_fields);
//                    $rec['id'] = $result[0]['program_id'];
                    $rec['id'] = $CI_Model->main_model->get_name_from_id('subprograms', 'program_id', $id);
                    $rec['name'] = $CI_Model->main_model->get_name_from_id('programs', 'name', $rec['id']);
                    $rec['url'] = base_url() . "show/programs/" . $rec['id'];
                    $rec['table'] = "programs";
                    return $rec;
                    break;
                case "quiz":
//                    $requested_fields = array("subprogram_id");
//                    $result = $CI_Model->main_model->get_selected_records("quiz", "id", $id, $requested_fields);
//                    $rec['id'] = $result[0]['subprogram_id'];
                    $rec['id'] = $CI_Model->main_model->get_name_from_id('quiz', 'subprogram_id', $id);
                    $rec['name'] = $CI_Model->main_model->get_name_from_id('subprograms', 'name', $rec['id']);
                    $rec['url'] = base_url() . "show/subprograms/" . $rec['id'];
                    $rec['table'] = "subprograms";
                    return $rec;
                    break;
                case "lessons":
//                    $requested_fields = array("subprogram_id");
//                    $result = $CI_Model->main_model->get_selected_records("lessons", "id", $id, $requested_fields);
//                    $rec['id'] = $result[0]['subprogram_id'];
                    $rec['id'] = $CI_Model->main_model->get_name_from_id('lessons', 'subprogram_id', $id);
                    $rec['name'] = $CI_Model->main_model->get_name_from_id('subprograms', 'name', $rec['id']);
                    $rec['url'] = base_url() . "show/subprograms/" . $rec['id'];
                    $rec['table'] = "subprograms";
                    return $rec;
                    break;
                case "pages":
//                    $requested_fields = array("lesson_id");
//                    $result = $CI_Model->main_model->get_selected_records("pages", "id", $id, $requested_fields);
//                    $rec['id'] = $result[0]['lesson_id'];
                    $rec['id'] = $CI_Model->main_model->get_name_from_id('pages', 'lesson_id', $id);
                    $rec['name'] = $CI_Model->main_model->get_name_from_id('lessons', 'name', $rec['id']);
//                    var_dump($rec['name']);
                    $rec['url'] = base_url() . "show/lessons/" . $rec['id'];
                    $rec['table'] = "lessons";
                    return $rec;
                    break;
                default:
                    break;
            }
        }

        echo ' <!--breadcrumb region start--> 
        <div class = "col-md-12">
        <ul class = "breadcrumb">';

//      defining last/active element of breadcrumb
        $crumbs[0]['name'] = $CI_Model->main_model->get_name_from_id($table, 'name', $id);
        $crumbs[0]['url'] = "";
//        echo $crumbs[0]['url'];
        $parent['id'] = $id;

        $i = 1; //just to start loop from index 1
        $parent['table'] = $table;
        while ($parent['id']) {
            $parent = get_parent_name($parent['table'], $parent['id']);
            $crumbs[$i]['name'] = $parent['name'];
            $crumbs[$i]['url'] = $parent['url'];
            $i++;
        }
        $crumbs[--$i]['name'] = "Home";
        $crumbs[$i]['url'] = base_url();
// var_dump($crumbs);
        for ($i; $i >= 0; $i--) {
            echo '<li ';
            if ($i == 0) {
                echo 'class = "active"';
            }
            echo '>';
            if ($i) {
                echo '<a href = "' . $crumbs[$i]['url'] . '">';
            }
            echo $crumbs[$i]['name'];
            if ($i) {
                echo '</a>';
            }
            if ($i != 0) {
                echo ' <span class = "divider"></span>';
            }
            echo '</li>';
        }

//        <li><a href = "' . base_url() . '">Home</a></li>
//        <span class = "divider">/</span></li>
//        <li><a href = "#">Library</a> <span class = "divider">/</span></li>
//        <li class = "active">Data</li>

        echo '</ul>
        </div> 
        <!--breadcrumb region end-->
        <!--sidebar panel start -->
        <aside class = "col-md-3">
        <!--program menu start -->';

        return $crumbs;
    }

    function load_user_acl($id = 0) {
        $CI_Model = & get_instance();
        $CI_Model->load->model('main_model');
        $i = 0;
        $filters1[0]['id'] = 'id';
        $filters1[0]['value'] = $id;
        $fields1[0] = 'role';
        $result1 = $CI_Model->main_model->get_many_records('users', $filters1, $fields1, '');

        foreach ($result1 as $role) {
            $role_id = ltrim($role['role'], '0');
            $rol_id = $CI_Model->main_model->get_name_from_id('users', 'role', $id, "id");
            $_SESSION['role_name'] = $CI_Model->main_model->get_name_from_id('roles', 'name', $rol_id);
            $filters2[0]['id'] = 'roles';
            $filters2[0]['value'] = $role_id;
            $fields2[0] = 'permission_groups';
            $result2 = $CI_Model->main_model->get_many_records('permission_groups-roles', $filters2, $fields2, '');

            foreach ($result2 as $pg) {
                $filters3[0]['id'] = 'permission_groups';
                $filters3[0]['value'] = $pg['permission_groups'];
                $fields3[0] = 'control_points';
                $result3 = $CI_Model->main_model->get_many_records('control_points-permission_groups', $filters3, $fields3, '');

                foreach ($result3 as $cp) {
                    $fields4[0] = 'controller';
                    $fields4[1] = 'page';
                    $result4 = $CI_Model->main_model->get_selected_records('control_points', 'id', $cp['control_points'], $fields4);
                    $_SESSION['acl'][$i]['controller'] = $result4[0]['controller'];
                    $_SESSION['acl'][$i]['page'] = $result4[0]['page'];
                    $_SESSION['acl'][$i]['resource'] = 0; //minus one indicate no resource, zero indicate all resources
                    $i++;
                }
            }
        }
    }

    function validate_permissions($controller = "", $page = "", $resource_id = 0) {
        $controller_bit = 0;
        $page_bit = 0;
        $resource_bit = 0;
        if ($controller) {//not home page - controller present
            foreach ($_SESSION['acl'] as $control_point) {

                if ($control_point['controller'] == $controller) {
                    $controller_bit = 1;
                    if ($page) {
                        if ($control_point['page'] == $page) {
                            $page_bit = 1;
                        }
                        switch ($control_point['controller']) {
                            case -1 : {
                                    $resource_bit = 0;
                                    break;
                                }
                            case 0 : {
                                    $resource_bit = 1;
                                    break;
                                }
                            default: {
                                    if ($control_point['resource'] == $resource_id) {
                                        $resource_bit = 1;
                                    }
                                    break;
                                }
                        }
                    }//page & resource not present in url/segment
                }
            }return bindec("$controller_bit" . "$page_bit" . "$resource_bit"); //three bit binary permission in octal presentation
        } else {// no controller in segment - home page
            return 7;
        }
    }

    function initialise_session() {
        session_start();
        if (!isset($_SESSION['msg_str'])) {
            $_SESSION['msg_str'] = "";
        }
        if (!isset($_SESSION['user_id'])) {
            $_SESSION['user_id'] = 5;
        }
        if (!isset($_SESSION['user_name'])) {
            $_SESSION['user_name'] = "Anonymous";
        }
        if (!isset($_SESSION['role_name'])) {
            $_SESSION['role_name'] = "Guest";
        }
        if (!isset($_SESSION['acl'])) {
            $_SESSION['acl'][0]['controller'] = "";
            $_SESSION['acl'][0]['page'] = "";
        }
    }

    public function get_comments($question_id = '') {
//        $comment['comment_text'] = $this->main_model->get_records('comments', 'id', $quiz_id)->row();
        $CI_Model = & get_instance();

        $filters[0]['id'] = 'question_id';
        $filters[0]['value'] = $question_id;
        $comment = $CI_Model->main_model->get_many_records('comments', $filters, '', 'id');
        // $this->load->view('insert_options_view',$comment);
        return $comment;
    }

    public function like_counts($question_id = '') {
        $CI_Model = & get_instance();
        $query = "SELECT COUNT(`records`)as likes FROM `likes_dislikes` where `records`= 1 AND `question_id`=" . $question_id;
        $likecount = $CI_Model->db->query($query)->result_array();
//        echo "<pre>";print_r($likecount[0]);die;
        if (!isset($likecount[0]['likes']) && empty($likecount[0]['likes'])) {
            $likecount[0]['likes'] = '';
        }
        return $likecount[0]['likes'];
    }

    public function dislike_counts($question_id = '') {
        $CI_Model = & get_instance();

        $query = "SELECT COUNT(`records`)as dislikes FROM `likes_dislikes` where `records`= '-1' AND `question_id`=" . $question_id;
        $dislikecount = $CI_Model->db->query($query)->result_array();
//        echo "<pre>";print_r($dislikecount[0]);die;
        if (!isset($dislikecount[0]['dislikes']) && empty($dislikecount[0]['dislikes'])) {
            $dislikecount[0]['dislikes'] = '';
        }
        return $dislikecount[0]['dislikes'];
    }

    public function like_counts_for_node($node_id = '') {
        $CI_Model = & get_instance();
        $query = "SELECT COUNT(`records`)as likes FROM `likes_dislikes` where `records`= 1 AND `node_id`=" . $node_id;
        $likecount = $CI_Model->db->query($query)->result_array();
//        echo "<pre>";print_r($likecount[0]);die;
        if (!isset($likecount[0]['likes']) && empty($likecount[0]['likes'])) {
            $likecount[0]['likes'] = '';
        }
        return $likecount[0]['likes'];
    }

    public function dislike_counts_for_node($node_id = '') {
        $CI_Model = & get_instance();
        $query = "SELECT COUNT(`records`)as dislikes FROM `likes_dislikes` where `records`= '-1' AND `node_id`=" . $node_id;
        $dislikecount = $CI_Model->db->query($query)->result_array();
//        echo "<pre>";print_r($dislikecount[0]);die;
        if (!isset($dislikecount[0]['dislikes']) && empty($dislikecount[0]['dislikes'])) {
            $dislikecount[0]['dislikes'] = '';
        }
        return $dislikecount[0]['dislikes'];
    }

    public function is_dashboard_quiz_attached($node_id) {
        //echo $node_id;die;
        $CI_Model = & get_instance();
        $CI_Model->load->model('main_model');
        $is_dashboard = false;
        //$node_id = 216;
        $node_type = $CI_Model->main_model->get_name_from_id("node", "type", $node_id); //===============================
        if ($node_type == 'Quiz') {
            $quiz_type = $CI_Model->main_model->get_name_from_id("quiz", "quiz_type", $node_id, 'node'); //============================
            if ($quiz_type == 'Dashboard') {
                //echo $quiz_type;
                $is_dashboard = true;
            }
        }

        $res = $CI_Model->main_model->get_child("node", 'parent_id', $node_id);
        foreach ($res as $key => $node) {
            $node_type = $CI_Model->main_model->get_name_from_id("node", "type", $node); //===============================
            if ($node_type == 'Quiz') {
                $quiz_type = $CI_Model->main_model->get_name_from_id("quiz", "quiz_type", $node, 'node'); //============================

                if ($quiz_type == 'Dashboard') {
                    //echo $quiz_type;
                    $is_dashboard = true;
                    break;
                }
            }

            //
        }
        // var_dump ($is_dashboard);die;
        return $is_dashboard;
    }

    function check_node_on_package($node_id) {
        $CI_Model = & get_instance();
        $CI_Model->load->model('main_model');
        $filter[0]['id'] = "packages";
        $filter[0]['value'] = $_SESSION['packages'];
        $filter[1]['id'] = "node";
        $filter[1]['value'] = $node_id;
        $req_field = array("id");
        $package_node_id = $CI_Model->main_model->get_many_records("packages-node", $filter, $req_field);
        if ($package_node_id) {
            return true;
        } else {
            return false;
        }
    }

    function is_all_section_submit($sheet_id = '') { //Created:Dewangshu ,18/8/17 for all section submitted or not
        $CI_Model = & get_instance();
        $CI_Model->load->model('main_model');


        $req_data = array('*');
        $fil_dat[0]['id'] = 'sheet_id';
        $fil_dat[0]['value'] = $sheet_id;
        $fil_dat[1]['id'] = 'user_id';
        $fil_dat[1]['value'] = $_SESSION['user_id'];
        $sheet_user_data = $CI_Model->main_model->get_many_records("sheet_user", $fil_dat, $req_data, '');


        $req_data = array('id', 'section_name');
        $fil_data[0]['id'] = 'sheet_id';
        $fil_data[0]['value'] = $sheet_id;
        $template_instruction_data = $CI_Model->main_model->get_many_records("template_instruction", $fil_data, $req_data, 'sort_order ');
        foreach ($template_instruction_data as $value) {
            $req1 = array('id', 'is_submit');
            $filters[0]['id'] = 'section';
            $filters[0]['value'] = $value['id'];
            $filters[1]['id'] = 'sheet_user_id';
            $filters[1]['value'] = $sheet_user_data[0]['id'];
            $sheet_section_data = $CI_Model->main_model->get_many_records("sheet_section", $filters, $req1, '');
//            echo '<pre>';
//            print_r($sheet_section_data);die;
            $all_submit = '';
            if ($sheet_section_data[0]['is_submit'] == 1) {
                $all_submit = 1;
            } else {
                $all_submit = 0;
            }
        }
        return $all_submit;
    }

//class end
    public function is_associated_with_package($node = '') {
        $CI_Model = & get_instance();
        $CI_Model->load->model('main_model');
        $userId = $_SESSION['user_id'];
        $filter[0]['id'] = "users";
        $filter[0]['value'] = $_SESSION['user_id'];
        $req = array("package");
        $user_package = $CI_Model->main_model->get_many_records('users-package', $filter, $req, 'id');
        $CI_Model->db->last_query();
        // echo "<pre>";
        // print_r($user_package);die;
        $packages = "";
        foreach ($user_package as $key => $values) {
            $packages[] = $values['package'];
        }
        // echo "<pre>";
        // print_r($packages);die;
        $filter1[0]['id'] = "node";
        $filter1[0]['value'] = $node;
        $filters_where_in[0] = $packages;
        // echo "<pre>";
        // print_r($filter1);
        // print_r($filters_where_in);die;
        $nodeDetails = $CI_Model->main_model->get_many_data_with_where_in('packages-node', array('id'), $filter1, $filters_where_in, 'packages');
        if ($nodeDetails) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function is_associated_with_package_test($node = '') {
        $CI_Model = & get_instance();
        $CI_Model->load->model('main_model');
        $userId = $_SESSION['user_id'];
        $filter[0]['id'] = "users";
        $filter[0]['value'] = $_SESSION['user_id'];
        $req = array("package");
        $user_package = $CI_Model->main_model->get_many_records('users-package', $filter, $req, 'id');

        foreach ($user_package as $key => $value) {
            $packages[] = $value['package'];
        }
        $filter1[0]['id'] = "node";
        $filter1[0]['value'] = $node;
        $filters_where_in[0] = $packages;
        // echo "<pre>";
        // print_r($filter1);
        // print_r($filters_where_in);die;
        $nodeDetails = $CI_Model->main_model->get_many_data_with_where_in('packages-node', array('id'), $filter1, $filters_where_in, 'packages');
        // echo $CI_Model->db->last_query();
        // echo "<pre>";
        // print_r($nodeDetails);
        // die;
        if ($nodeDetails) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function get_node_by_role($user_id = "") {
        $CI_Model = & get_instance();
        $CI_Model->load->model('main_model');
        $role = $_SESSION['role_name'];
        switch ($role) {
            case Student:
                $filter[0]['id'] = "users";
                $filter[0]['value'] = $user_id;
                $req = array("package");
                $user_package = $CI_Model->main_model->get_many_records('users-package', $filter, $req, 'id');
                $node_id = array();
                foreach ($user_package as $key => $value) {
                    $node_id[] = $CI_Model->main_model->get_name_from_id('packages-node', 'node', $value['package'], 'packages');
                }
                return $node_id;
                break;
        }
    }

    public function get_node_child($node_id = 0) {
        $user_id = $_SESSION['user_id'];
        $filter[0]['id'] = 'parent_id';
        $filter[0]['value'] = $node_id;
        $filter[1]['id'] = 'is_deleted';
        $filter[1]['value'] = 0;
        $filter[2]['id'] = 'type';
        $filter[2]['value'] = "Quiz";


        $req = array('id');
        $child_node = $this->main_model->get_many_records('node', $filter, $req);

        if (!empty($child_node)) {
            $AllChildNode = $child_node;
            $NextParentNode = $child_node;
        } else {
            $filter3[0]['id'] = 'node';
            $filter3[0]['value'] = $node_id;
            $filter3[1]['id'] = 'is_deleted';
            $filter3[1]['value'] = 0;


            $req = array('id');
            $quiz_ids = $this->main_model->get_many_records('quiz', $filter3, $req);

            $quiz_result_id = 0;
            if (!empty($quiz_ids) && isset($quiz_ids)) {
                foreach ($quiz_ids as $quiz_id) {

                    $sql = "SELECT id from quiz_result where quiz_id = $quiz_id[id]  and user_id=$user_id and is_deleted = 0 and submit_time!=''";
                    $quiz_result_id += $this->db->query($sql)->num_rows;
                }
            }

            return $quiz_result_id;
        }

        while (!empty($NextParentNode) && isset($NextParentNode)) {
            foreach ($NextParentNode as $key => $nextChild) {
                $filter2[0]['id'] = 'parent_id';
                $filter2[0]['value'] = $nextChild['id'];
                $filter2[1]['id'] = 'is_deleted';
                $filter2[1]['value'] = 0;
                $filter2[2]['id'] = 'type';
                $filter2[2]['value'] = "Quiz";


                $req = array('id');
                $Nextchild_node = $this->main_model->get_many_records('node', $filter2, $req);

                if (!empty($Nextchild_node)) {
                    $AllChildNode = array_merge($AllChildNode, $Nextchild_node);
                    $NextParentNode = array_merge($Nextchild_node, $NextParentNode);
                }
                unset($NextParentNode[$key]);
            }
        }
        $sortedChilds = array_values(array_unique($AllChildNode, SORT_REGULAR));

        $quiz_ids = array();
        if (!empty($sortedChilds) && isset($sortedChilds)) {

            foreach ($sortedChilds as $node) {

                $filter3[0]['id'] = 'node';
                $filter3[0]['value'] = $node['id'];
                $filter3[1]['id'] = 'is_deleted';
                $filter3[1]['value'] = 0;


                $req = array('id');
                $r = $this->main_model->get_many_records('quiz', $filter3, $req);
                if (!empty($r)) {
                    $quiz_ids[] = $r[0];
                }
            }
        }
        $quiz_result_id = 0;
        if (!empty($quiz_ids) && isset($quiz_ids)) {
            foreach ($quiz_ids as $quiz_id) {

                $sql = "SELECT id from quiz_result where quiz_id = $quiz_id[id]  and user_id=$user_id and is_deleted = 0 and submit_time!=''";
                $quiz_result_id += $this->db->query($sql)->num_rows;
            }
        }
        return $quiz_result_id;
    }

    public function endchild($nodeid = 0) {
//================To get all quizzes given by the user===============
        $user_id = $_SESSION['user_id'];
        $sql4 = "SELECT count(id) as childs from quiz_result where quiz_id = $nodeid and user_id = $user_id and is_deleted = 0";
        $childs = $this->db->query($sql4)->result_array();

//================Checking if the array is empty or not=================
        if ($childs != '') {
            return $childs[0]['childs'];
        } else {
            return 0;
        }
    }

}

/* End of class Custom.php */
?>
