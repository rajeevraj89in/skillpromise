<?php

class main extends CI_Controller {

    public function __construct() {
        parent::__construct();
//        error_reporting(E_ALL);
        $this->custom->initialise_session();
        $this->custom->load_user_acl($_SESSION['user_id']);
        $controller_name = $this->uri->segment(1);
        $page_name = $this->uri->segment(2);
        $resource_id = $this->uri->segment(3);
        if ($page_name) {//to extract requested page name from #anchor tags in pagination
            $page_name_array = explode('#', $page_name);
            $page_name = $page_name_array[0];
        }



        $exempted_controllers = array('index', 'signin', 'change_password', 'do_password_change', 'login_handler', 'logout', 'set', 'update', 'set_many', 'ajax_feeder', 'ajax_fetch', 'loadGrid', 'saveImage', 'submit', 'add_request', 'node', 'score', 'subscribNewsLetter', 'registrationMail', 'register', 'value_action', 'get_records_group_by', 'manage', 'showsheet', 'edit', 'delete', 'set_comments', 'get_comments', 'set_like', 'set_dislike', 'like_counts', 'add', 'quiz');
        if (($controller_name) && !(in_array($controller_name, $exempted_controllers, true))) {

            $octal_perm_code = $this->custom->validate_permissions($controller_name, $page_name, $resource_id);

            switch ($octal_perm_code) {
                case 0: {
                        if ($controller_name) {//not home page, and permission says not allowed
                            header('Location: ' . base_url());
                        }
                        break;
                    }
                case 1: {//not permissible
                        header('Location: ' . base_url());
                        break;
                    }
                case 2: {//not permissible
                        header('Location: ' . base_url());
                        break;
                    }
                case 3: {//not permissible
                        header('Location: ' . base_url());
                        break;
                    }
                case 4: {
                        if ($page_name) {//page specified in url but permission not allowing
                            header('Location: ' . base_url()); //not permissible
                        }
                        break;
                    }
                case 5: {
                        if ($page_name) {//page specified in url but permission not allowing
                            header('Location: ' . base_url()); //not permissible
                        }
                        break;
                    }
                case 6: {
                        if ($resource_id) {//resource specified in url but permission not allowing
                            header('Location: ' . base_url()); //not permissible
                        }
                        break;
                    }
                case 7: {//allowed
                        break;
                    }

                default: //not allowing precautionary
                    {
                        header('Location: ' . base_url()); //not permissible
                        break;
                    }
            }
        }
    }

    function index() {
        switch ($_SESSION['role_name']) {
            case 'Guest': {
                    $this->load->view('signin'); // for temparory
                    //$this->load->view('home_view');
                    break;
                }
            case 'Student': {
                    $this->load->view('home_content_view');
                    break;
                }
            case 'Manager': {
                    $this->load->view('manager_content_view');
                    break;
                }
            case 'Content Creator': {
                    $this->load->view('manager_content_view');
                    break;
                }

            case 'Administrator': {
                    $this->load->view('manager_content_view');
                    break;
                }
            case 'Super Admin': {
                    $this->load->view('manager_content_view');
                    break;
                }
            default: {
                    $this->load->view('signin'); // for temparory
                    // $this->load->view('home_content_view');
                    break;
                }
        }
    }

    public function signin() {
        $this->load->view('signin');
    }

    public function showcontent($table = '', $id = "") {
        $max_level = 0;
        $node = $this->main_model->get_name_from_id('node-users', 'node', $id, 'users');
        if ($node) {

            //var_dump($node);

            $level = $this->main_model->get_node_level($node);
            $max_level = $level;
            //var_dump($level);die;
            for ($i = 1; $i <= $level; $level--) {
                $base_node[$level]['id'] = $node;
                $base_node[$level]['parent_id'] = $this->main_model->get_name_from_id('node', 'parent_id', $node, 'id');
                $node = $base_node[$level]['parent_id'];
            }
            //$row_data->node = $node;
//                echo "<pre>";
//                print_r($base_node);die;
            $data['max_level'] = $max_level;
            $data['baseNodes'] = $base_node;
        } else {
            $data['max_level'] = 0;
            $data['baseNodes'] = 0;
        }


        $this->load->view('assign-permission_sub_nodes', $data);
    }

    public function change_password() {
        $this->load->view('change_password');
    }

    public function do_password_change() {
        $this->form_validation->set_rules('old_pwd', 'old_password', 'required|alpha_numeric|trim|xss_clean|exact_length[32]');
        $this->form_validation->set_rules('new_pwd', 'new_password', 'required|alpha_numeric|trim|xss_clean|exact_length[32]|matches[cng_pwd]');
        $this->form_validation->set_rules('cng_pwd', 'cnf_password', 'required|alpha_numeric|trim|xss_clean|exact_length[32]');
        if ($this->form_validation->run() == FALSE) {
            $_SESSION['msg_str'].= 'Please Check Javascript on your Browser is enabled and updated. Please try again.';
            $_SESSION['msg_hdr'] = "Alert !";
            header('Location: ' . base_url() . 'change_password');
        } else {//validation passed
            if ($_POST['old_pwd'] == $this->main_model->get_name_from_id('users', 'password', $_SESSION['user_id'])) {//old password matches
                $data['id'] = $_SESSION['user_id'];
                $data['password'] = $_POST['new_pwd'];
                $return_id = $this->main_model->add_update_record('users', $data, 'id');
                if ($return_id == $_SESSION['user_id']) {//database update confirmation passed
                    $_SESSION['msg_str'].= 'Password updated Successfully !';
                    $_SESSION['msg_hdr'] = 'Information !';
                    header('Location: ' . base_url());
                } else {//database update confirmation failed
                    $_SESSION['msg_str'].= 'Cannot update Password. Try again or contact Website Administrator.';
                    $_SESSION['msg_hdr'] = 'Alert !';
                    header('Location: ' . base_url());
                }
            } else {//validation failed
                $_SESSION['msg_str'].= 'Wrong Old Password! Please verify and try again.';
                $_SESSION['msg_hdr'] = "Alert !";
                header('Location: ' . base_url() . 'change_password');
            }
        }
    }

    public function login_handler() {
        if (isset($_POST['email']) && isset($_POST['pwd'])) {

            $this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean|email');
            $this->form_validation->set_rules('pwd', 'Password', 'required|alpha_numeric|trim|xss_clean|exact_length[32]');
            if ($this->form_validation->run() == FALSE) {

                $_SESSION['msg_str'].= 'Please Check Javascript on your Browser is enabled and updated. Please try again.';
                $_SESSION['msg_hdr'] = "Alert !";
                header('Location: ' . base_url() . 'signin');
            } else {
                $req_fields = array("id", "name", "password");
                $result = $this->main_model->get_selected_records('users', 'email', $_POST['email'], $req_fields);
                if ($result[0]['password'] == $_POST['pwd']) {
                    $_SESSION['user_id'] = $result[0]['id'];
                    $_SESSION['user_name'] = $result[0]['name'];
                    $this->custom->load_user_acl($result[0]['id']);
                    switch ($_SESSION['role_name']) {
                        case 'Student':
                            header('Location: ' . base_url());
                            break;
                        case 'Manager':
                            header('Location: ' . base_url() . 'manage');
                            break;
                        default:header('Location: ' . base_url());
                            break;
                    }
                } else {
                    $_SESSION['msg_str'].= 'Wrong Credentials. Please Check for Valid Email and Password.';
                    $_SESSION['msg_hdr'] = 'Alert !';
                    header('Location: ' . base_url() . 'signin');
                }
            }
        }
    }

    public function logout() {
        $this->load->view('logout');
    }

    public function analytics($report_name = "", $id = "") {
        switch ($report_name) {
            case "testsheet":
                //=============================== get quiz answer details =============================
                $request_fields = array('id', 'quiz_id', 'user_id', 'start_time', 'submit_time', 'client_time_taken');
                $quiz_answer_details = $this->main_model->get_many_records('quiz_result', '', $request_fields);
                //echo"<pre>";
                // print_r($quiz_answer_details);//die;
                // ================================== get quiz details  ===================================
                //$request_fields_1 = array('id','name', 'node' ,'time_limit', 'quiz_type');
                // $filter[0]['id'] = 'quiz_type !=';
                // $filter[0]['value'] = 'Practice';
                // $quiz_details = $this->main_model->get_many_records('quiz', $filter, $request_fields_1);

                $result = array();
                $total_student = $this->main_model->get_record_count('users', 'role', 1);

                foreach ($quiz_answer_details as $key => $answer) {
                    $quiz_id = $answer['quiz_id'];
                    $user_id = $answer['user_id'];
                    $user_type = $this->main_model->get_name_from_id("users", "role", $user_id);

                    if ($user_type == 1) {

                        if (array_key_exists($quiz_id, $result)) {

                            $result[$quiz_id]['total'] = $result[$quiz_id]['total'];

                            if ($answer['submit_time']) {
                                $result[$quiz_id]['completed'] = $result[$quiz_id]['completed'] + 1;
                                $result[$quiz_id]['in_progress'] = $result[$quiz_id]['in_progress'];
                                $result[$quiz_id]['pending'] = $result[$quiz_id]['pending'];
                            } else {
                                $result[$quiz_id]['completed'] = $result[$quiz_id]['completed'];
                                $result[$quiz_id]['in_progress'] = $result[$quiz_id]['in_progress'] + 1;
                                $result[$quiz_id]['pending'] = $result[$quiz_id]['pending'];
                            }
                            $result[$quiz_id]['pending'] = $total_student - ($result[$quiz_id]['completed'] + $result[$quiz_id]['in_progress']);
                        } else {

                            $result[$quiz_id]['name'] = $this->main_model->get_name_from_id("quiz", "name", $quiz_id);
                            $result[$quiz_id]['total'] = $total_student;

                            if ($answer['submit_time']) {
                                $result[$quiz_id]['completed'] = 1;
                                $result[$quiz_id]['in_progress'] = 0;
                            } else {

                                $result[$quiz_id]['completed'] = 0;
                                $result[$quiz_id]['in_progress'] = 1;
                            }
                            $result[$quiz_id]['pending'] = $total_student - ($result[$quiz_id]['completed'] + $result[$quiz_id]['in_progress']);
                            // echo $user_type.'user_id <br><br><br><br>';
                        }
                    }
                }
                //echo '<pre>';
                //print_r($result);die;
                //var_dump($result);die;
                $data['result'] = $result;
                $this->load->view('testSheet', $data);
                break;
            case "scorecard":
                $this->load->view('scoreCard');
                break;
            case "key_values":
                $sheet_id = $_POST['sheet_id'];
                $request_fields = array('id', 'sheet_id', 'sheetvalue_id', 'user_id', 'reason', '');
                $filter[0]['id'] = 'user_id';
                $filter[0]['value'] = $_SESSION['user_id'];
                $filter[1]['id'] = 'sheet_id';
                $filter[1]['value'] = $sheet_id;
                $filter[2]['id'] = 'is_submit';
                $filter[2]['value'] = '0';

                $key_values = $this->main_model->get_many_records('action_sheets', $filter, $request_fields);
                $result['data'] = $key_values;
//                echo '<pre>';
//                print_r($data);die;
                $this->load->view('keyvalues', $result);
                break;

            default:
                break;
        }
    }

    public function showsheet() {
        $this->load->view('Key_values');
    }

    public function score_card() {

        $data['quiz_result'] = $this->custom->quiz_result('student_id', $_SESSION['user_id']);
        // var_dump($data); die;
        $this->load->view('student_score', $data);
    }

    public function quiz($quiz_mode = "practice", $quiz_id = 0, $page_no = 1, $nav_type = '', $id = '') {//$quiz_mode -> 1->scoring, 2->practice quiz , 3->result

        function is_answered($qid, $answered_array) {
            foreach ($answered_array as $val) {
                if ($val['selected_opt'] == $qid) {
                    return 1;
                }
            }
            return 0;
        }

        switch ($quiz_mode) {
            case "board" :

                //var_dump($quiz);die;
                $data['quiz_id'] = $quiz['quiz_detail']->id;
                $data['user_id'] = $_SESSION['user_id'];
                $data['start_time'] = date('Y-m-d H:m:s');
                //var_dump($data['start_time']);
                //var_dump($quiz['quiz_detail']->id);die;
                //var_dump($data);die;
                $quiz_result_id = $this->main_model->add_update_record("quiz_result", $data);
                //die();
                $quiz['quiz_result_id'] = $quiz_result_id;

                //echo '<pre>';
                //print_r($quiz);die;

                $this->load->view('boardQuiz', $quiz);
                break;
            case "scoring" : $this->load->view('scoringquiz', $quiz);
                break;
            case "flex" : $this->load->view('dashboardquiz', $quiz);
                break;
            case "result" :
                $filter[0]['id'] = 'quiz_id';
                $filter[0]['value'] = $quiz_id;
                $filter[1]['id'] = 'user_id';
                $filter[1]['value'] = $_SESSION['user_id'];
                $quiz['quiz_result_detail'] = $this->main_model->get_many_records('quiz_result', $filter, "", "");
                // print_r($quiz['quiz_result_detail']);
                $filter2[0]['id'] = 'quiz_result_id';
                $filter2[0]['value'] = $quiz['quiz_result_detail'][0]['id'];
                $filter2[1]['id'] = 'select_type';
                $filter2[1]['value'] = 'Single';
                $filter2[2]['id'] = 'answered <>';
                $filter2[2]['value'] = '0';
                $request_fields = array("answered as selected_opt");
                $quiz['single_options'] = $this->main_model->get_many_records('quiz_result_answers', $filter2, $request_fields, "question_id");

                $filter3[0]['id'] = 'quiz_result_id';
                $filter3[0]['value'] = $quiz['quiz_result_detail'][0]['id'];
                $request_fields = array("option_id as selected_opt");
                $quiz['multi_options'] = $this->main_model->get_many_records('quiz_result_options', $filter3, $request_fields, "option_id");

                $answered_options = array_merge($quiz['single_options'], $quiz['multi_options']);

                foreach ($quiz['options'] as $key1 => $q) {
                    foreach ($q as $key2 => $value) {
                        if (is_answered($value['option_id'], $answered_options)) {
                            $quiz['options'][$key1][$key2]['answered'] = 1;
                        } else {
                            $quiz['options'][$key1][$key2]['answered'] = 0;
                        }
                    }
                }

                $this->load->view('resultquiz', $quiz);
                break;

            case "summary" :
                $summary['quiz_name'] = $this->main_model->get_name_from_id("quiz", "name", $quiz_id);
                $filter4[0]['id'] = "quiz_id";
                $filter4[0]['value'] = $quiz_id;
                $filter4[1]['id'] = "user_id";
                $filter4[1]['value'] = $_SESSION['user_id'];
                $req_field = array("id");
                $quiz_result_id = $this->main_model->get_many_records("quiz_result", $filter4, $req_field);
//                var_dump($quiz_result_id);
                $filter5[0]['id'] = "quiz_result_id";
                $filter5[0]['value'] = $quiz_result_id[0]['id'];
                $summary['quiz_result'] = $this->main_model->get_many_records("quiz_result_answers", $filter5, "", "question_no");
                $str = "Select";
                //====================================================================
                $category = array();

                foreach ($summary['quiz_result'] as $key => $answer) {
                    $id = $answer['category'];
                    if (array_key_exists($id, $category)) {

                        $category[$id]['no_of_question'] ++;
                        $category[$id]['visited'] = ($answer['visited'] == 1) ? ($category[$id]['visited'] + 1) : $category[$id]['visited'];
                        $category[$id]['answer'] = ($answer['answered'] == 1) ? ($category[$id]['answer'] + 1) : $category[$id]['answer'];
                        $category[$id]['marked_for_review'] = ($answer['marked'] == 1) ? ($category[$id]['marked_for_review'] + 1) : $category[$id]['marked_for_review'];
                        $category[$id]['correct'] = ($answer['marks'] == 1) ? ($category[$id]['correct'] + 1) : $category[$id]['correct'];
                    } else {
                        $category[$id]['name'] = $this->main_model->get_name_from_id("category", "name", $id);
                        ;
                        $category[$id]['no_of_question'] = 1;
                        $category[$id]['visited'] = ($answer['visited'] == 1) ? 1 : 0;
                        $category[$id]['answer'] = ($answer['answered'] == 1) ? 1 : 0;
                        $category[$id]['marked_for_review'] = ($answer['marked'] == 1) ? 1 : 0;
                        $category[$id]['correct'] = ($answer['marks'] > 0 ) ? 1 : 0;
                    }
                }
                //echo var_dump($category);

                $summary['category'] = $category;
                //===========================================================================================
                $this->load->view('result_summary', $summary);
                break;
            case "practice" :
                $pagesize = $this->main_model->get_name_from_id('quiz', 'pagination', $quiz_id, 'id');
                $filter[0]['id'] = "quiz_id";
                $filter[0]['value'] = $quiz_id;
                $tcount = ($this->main_model->count_records('questions', $filter));
                $filter[1]['id'] = "story";
                $filter[1]['value'] = 0;
                $count = ($this->main_model->count_records('questions', $filter));
                $scount = $this->main_model->get_record_count('quiz_story', 'quiz_id', $quiz_id);
                $n = intval($count / $pagesize);
                $r = $count % $pagesize;
                if ($r > 0) {
                    $n++;
                }
                $total_pages = $n + $scount;
                $quiz["total_pages"] = $total_pages;
                $quiz["current"] = $page_no;
                $quiz["link"] = base_url() . "quiz/" . $quiz_mode . "/" . $quiz_id . "/";
                if (($page_no - 1) > 0) {
                    $quiz["prev_link"] = base_url() . "quiz/" . $quiz_mode . "/" . $quiz_id . "/" . ($page_no - 1) . '/' . $nav_type . '/' . $id;
                } else {
                    $quiz["prev_link"] = "#";
                }
                if (($page_no + 1) > $total_pages) {
                    $quiz["next_link"] = "#";
                } else {
                    $quiz["next_link"] = base_url() . "quiz/" . $quiz_mode . "/" . $quiz_id . "/" . ($page_no + 1) . '/' . $nav_type . '/' . $id;
                }
                if ($page_no > $n) {
                    $sques = $this->main_model->get_record_count('quiz_story', 'quiz_id', $quiz_id);
                    if (($page_no - $n) > 1) {
                        $start = ($page_no - $n) - 1;
                    } else {
                        $start = 0;
                    }
                    $quiz['start'] = $count + (($page_no - $n) - 1);
                    //echo $n;die;
                    $limit = 1;
                    $f[0]['id'] = "quiz_id";
                    $f[0]['value'] = $quiz_id;
                    $story_id = $this->main_model->get_records_with_limit('quiz_story', $f, $start, $limit)->result_array();
                    //var_dump($story_id);die;
                    $quiz['story'] = $story_id;

                    $filter[1]['id'] = "story";
                    $filter[1]['value'] = $story_id[0]['id'];
                    $quiz['questions'] = $this->main_model->get_records_with_limit('questions', $filter)->result_array();
                    // var_dump($quiz['questions']);die;
                } else {
                    if ($page_no > 1) {
                        $quiz['start'] = ($page_no - 1) * $pagesize;
                    } else {
                        $quiz['start'] = 0;
                    }
                    $limit = $pagesize;
                    $quiz['questions'] = $this->main_model->get_records_with_limit('questions', $filter, $quiz['start'], $limit, 'category, id')->result_array();
                }
                $quiz['quiz_detail'] = $this->main_model->get_records('quiz', 'id', $quiz_id)->row();

                $query_str1 = 'SELECT category.id as category_id, category.name as category_name, COUNT(questions.category) as no_of_questions FROM questions JOIN category ON questions.category = category.id
                       WHERE questions.quiz_id = ' . $quiz_id . ' AND questions.status = "Active" AND questions.is_deleted = 0 GROUP BY category.id';
                $quiz['category'] = $this->db->query($query_str1)->result_array();


                $options = '';
                foreach ($quiz['questions'] as $question) {
                    $options[$question['id']] = $this->main_model->get_records('options', 'question_id', $question['id'], 'option_number')->result_array();
                }
                $quiz['options'] = $options;
                //var_dump($quiz['questions']);die;
                $quiz["nav_type"] = $nav_type;
                $quiz["id"] = $id;
                $this->load->view('practicequiz', $quiz);
                break;
            case "subjective" :
                $pagesize = $pagesize = $this->main_model->get_name_from_id('quiz', 'pagination', $quiz_id, 'id');
                $filter[0]['id'] = "quiz_id";
                $filter[0]['value'] = $quiz_id;
                $tcount = ($this->main_model->count_records('subjectivequestions', $filter));
                $filter[1]['id'] = "story";
                $filter[1]['value'] = 0;
                $count = ($this->main_model->count_records('subjectivequestions', $filter));
                $scount = $this->main_model->get_record_count('quiz_story', 'quiz_id', $quiz_id);
                $n = intval($count / $pagesize);
                $r = $count % $pagesize;
                if ($r > 0) {
                    $n++;
                }
                $total_pages = $n + $scount;
                $subjectivequestions["total_pages"] = $total_pages;
                $subjectivequestions["current"] = $page_no;
                $subjectivequestions["link"] = base_url() . "quiz/" . $quiz_mode . "/" . $quiz_id . "/";
                if (($page_no - 1) > 0) {
                    $subjectivequestions["prev_link"] = base_url() . "quiz/" . $quiz_mode . "/" . $quiz_id . "/" . ($page_no - 1) . '/' . $nav_type . '/' . $id;
                } else {
                    $subjectivequestions["prev_link"] = "#";
                }
                if (($page_no + 1) > $total_pages) {
                    $subjectivequestions["next_link"] = "#";
                } else {
                    $subjectivequestions["next_link"] = base_url() . "quiz/" . $quiz_mode . "/" . $quiz_id . "/" . ($page_no + 1) . '/' . $nav_type . '/' . $id;
                }
                if ($page_no > $n) {
                    $sques = $this->main_model->get_record_count('quiz_story', 'quiz_id', $quiz_id);
                    if (($page_no - $n) > 1) {
                        $start = ($page_no - $n) - 1;
                    } else {
                        $start = 0;
                    }
                    $subjectivequestions['start'] = $count + (($page_no - $n) - 1);
                    //echo $n;die;
                    $limit = 1;
                    $f[0]['id'] = "quiz_id";
                    $f[0]['value'] = $quiz_id;
                    $story_id = $this->main_model->get_records_with_limit('quiz_story', $f, $start, $limit)->result_array();
                    //var_dump($story_id);die;
                    $subjectivequestions['story'] = $story_id;

                    $filter[1]['id'] = "story";
                    $filter[1]['value'] = $story_id[0]['id'];
                    $subjectivequestions['subquestions'] = $this->main_model->get_records_with_limit('subjectivequestions', $filter)->result_array();
                    // var_dump($quiz['questions']);die;
                    ///   working ------
//        }
                } else {
                    if ($page_no > 1) {
                        $subjectivequestions['start'] = ($page_no - 1) * $pagesize;
                    } else {
                        $subjectivequestions['start'] = 0;
                    }
                    $limit = $pagesize;
                    $subjectivequestions['subquestions'] = $this->main_model->get_records_with_limit('subjectivequestions', $filter, $subjectivequestions['start'], $limit, 'category, id')->result_array();
                }

                $subjectivequestions['quiz_detail'] = $this->main_model->get_records('quiz', 'id', $quiz_id)->row();
                $query_str2 = 'SELECT category.id as category_id, category.name as category_name, COUNT(subjectivequestions.category) as no_of_questions FROM subjectivequestions JOIN category ON subjectivequestions.category = category.id
                       WHERE subjectivequestions.quiz_id = ' . $quiz_id . ' AND subjectivequestions.status = "Active" AND subjectivequestions.is_deleted = 0 GROUP BY category.id';
                $subjectivequestions['category'] = $this->db->query($query_str2)->result_array();
                // $subjectivequestions['subquestions'] = $this->main_model->get_records('subjectivequestions', 'quiz_id', $quiz_id, 'category, id')->result_array();
//        var_dump($this->db->last_query());
                $subjectivequestions["nav_type"] = $nav_type;
                $subjectivequestions["id"] = $id;
                $this->load->view('subjectivequiz', $subjectivequestions);
                break;
            default : break;
        }
    }

    private function evaluate() {

    }

    public function score($table, $id) {

        //=============================== get quiz id ====================

        $quiz_id = $this->main_model->get_name_from_id('quiz', 'id', $id, 'node');
        //var_dump($quiz_id);die;
        if (!$quiz_id) {
            $student = array();
            $quiz['id'] = '';
            $quiz['name'] = '';
            $quiz['total_marks'] = '';
            $quiz['student'] = $student;
            $this->load->view('score_all', $quiz);
        } else {
            //=============================== get quiz name ===========================
            $quiz_name = $this->main_model->get_name_from_id('quiz', 'name', $quiz_id, 'id');

            //============================== get quiz_result_id and user_id ====================
            $filter[0]['id'] = "quiz_id";
            $filter[0]['value'] = $quiz_id;
            $req_field = array("id", "user_id");
            $student_quiz_details = $this->main_model->get_many_records("quiz_result", $filter, $req_field);
            //var_dump($student_quiz_details);die;
            if ($student_quiz_details) {
                //====================================== get all details of quiz ================
                foreach ($student_quiz_details as $key => $answer) {

                    $student[$key]['user_id'] = $answer['user_id'];
                    $student[$key]['name'] = $this->main_model->get_name_from_id('users', 'name', $answer['user_id']);
                    $student[$key]['quiz_result_id'] = $answer['id'];

                    //===================== get mark obtain ==============================
                    $query_str1 = 'SELECT  sum(`marks`) as marks_obtain
                                FROM  `quiz_result_answers`
                                WHERE  `quiz_result_id` =' . $student[$key]['quiz_result_id'];

                    $mark_obtain = $this->db->query($query_str1)->result_array();
                    $student[$key]['mark_obtain'] = $mark_obtain[0]['marks_obtain'];
                }
                //================================ get total marks ===========================
                $query_str2 = 'SELECT SUM(`question_weight`) as total_marks
                                          FROM `questions` WHERE quiz_id =' . $quiz_id;
                $total_marks = $this->db->query($query_str2)->result_array();

                //==================================== sort for rank ======================

                function b_sort($a, $b) {
                    return ($a["mark_obtain"] <= $b["mark_obtain"]) ? 1 : -1;
                }

                usort($student, "b_sort");

                //================================= set value for a array ===================

                $quiz['id'] = $quiz_id;
                $quiz['name'] = $quiz_name;
                $quiz['total_marks'] = $total_marks[0]['total_marks'];
                $quiz['student'] = $student;

                $this->load->view('score_all', $quiz);
            } else {
                $student = array();
                $quiz['id'] = $quiz_id;
                $quiz['name'] = $quiz_name;
                $quiz['total_marks'] = '';
                $quiz['student'] = $student;
                $this->load->view('score_all', $quiz);
            }
        }
    }

    public function submit($quiz_type = "") {//submit quiz
        //echo '<pre>';
        //print_r($_POST);die;
        //DIE(var_dump($_POST));
        $answers = $_POST['answers'];
//       var_dump($answers);
        $quiz_id = $_POST['quiz_id'];

        unset($_POST['answers']);
        //unset($_POST['quiz_result_id']);
        //echo '<pre>';
        // print_r($_POST);die;
        $_POST['submit_time'] = date('Y-m-d H:m:s');

        $quiz_result_id = $this->main_model->add_update_record("quiz_result", $_POST, 'id');

//        $quiz_questions = $this->main_model->get_records('questions', 'quiz_id', $quiz_id, 'id')->result_array();

        foreach ($answers as $q_no => $answer) {
            $answers[$q_no]['question_id'] = $q_no;
            if ($answer['answered']) {
                $answers[$q_no]['quiz_result_id'] = $quiz_result_id;
                if ($answer['select_type'] == "Single") {
                    $answers[$q_no]['marks'] = $this->custom->get_marks($q_no, $answer['selected'], "");
                } else {//select type - multiple
                    $answers[$q_no]['marks'] = $this->custom->get_marks($q_no, "", $answer['options']);
                    foreach ($answers[$q_no]['options'] as $key => $value) {
                        $option_set['quiz_result_id'] = $quiz_result_id;
                        $option_set['question_id'] = $q_no;
                        $option_set['option_id'] = $value;
                        $saved_option_id = $this->main_model->add_update_record("quiz_result_options", $option_set);
                    }
                    unset($answers[$q_no]["options"]);
                }
            } else {//not answered
                $answers[$q_no]['marks'] = 0;
            }
        }
//        var_dump($answers);
//        die;

        $summary['answers'] = $answers;
        $saved_question_id = $this->main_model->add_update_many_records("quiz_result_answers", $answers, "quiz_result_id", $quiz_result_id);

        header('Location: ' . base_url() . 'quiz/summary/' . $quiz_id);
    }

    public function manage($table = '', $id = 0) {


        if (empty($table)) {
            $this->load->view('manager_content_view');
        } else {
            if ($table) {
                switch ($table) {
                    case 'questions':
                        if ($id) {
                            $quiz_id = $this->main_model->get_name_from_id('quiz', 'id', $id, 'node');
                            $filter[0]['id'] = "quiz_id";
                            $filter[0]['value'] = $quiz_id;
                            $fields = array("id", "quiz_id", "question_text", "question_weight", "select_type", "status");
                            $query['data']['grid_data'] = $this->main_model->get_many_records('questions', $filter, $fields, 'category, id');
                            $query['data']['parent_id'] = $id;
                            $level = $this->main_model->get_node_level($id);
                            $query['data']['max_level'] = $level;
                            $node = $id;
                            $max_level = $level;
                            for ($i = 1; $i <= $level; $level--) {
                                $base_node[$level]['id'] = $node;
                                $base_node[$level]['parent_id'] = $this->main_model->get_name_from_id('node', 'parent_id', $node, 'id');
                                $node = $base_node[$level]['parent_id'];
                            }
                            $query['data']['basenodes'] = $base_node;
                        } else {
                            $query['data'] = 0;
                        }

                        break;
                    case 'subjectivequestions':
                        if ($id) {
                            $quiz_id = $this->main_model->get_name_from_id('quiz', 'id', $id, 'node');
                            $filter[0]['id'] = "quiz_id";
                            $filter[0]['value'] = $quiz_id;
                            $fields = array("id", "quiz_id", "question_text", "category", "status");
                            $query['data']['grid_data'] = $this->main_model->get_many_records('subjectivequestions', $filter, $fields, 'category, id');
                            $query['data']['parent_id'] = $id;
                            $level = $this->main_model->get_node_level($id);
                            $query['data']['max_level'] = $level;
                            $node = $id;
                            $max_level = $level;
                            for ($i = 1; $i <= $level; $level--) {
                                $base_node[$level]['id'] = $node;
                                $base_node[$level]['parent_id'] = $this->main_model->get_name_from_id('node', 'parent_id', $node, 'id');
                                $node = $base_node[$level]['parent_id'];
                            }
                            $query['data']['basenodes'] = $base_node;
                        } else {
                            $query['data'] = 0;
                        }

                        break;
                    case 'quiz_story':
                        $data = $this->main_model->get_records($table, "", "", "name")->result_array();
                        foreach ($data as $key => $value) {
                            $data[$key]['node'] = $this->main_model->get_name_from_id('quiz', 'node', $value['quiz_id'], 'id');
                        }
                        $query['data'] = $data;
//                        var_dump($query['data']);
//                        die;
                        break;
                    case 'users':
                        if ($_SESSION['role_name'] != 'Super Admin') {
                            $query['data'] = $this->main_model->get_records($table, "role", "1", "name")->result_array(); //allowing only stunent users to be edited by anyone other than Super Admin
                        } else {
                            $query['data'] = $this->main_model->get_records($table, "", "", "name")->result_array();
                        }
                        break;
                    case 'news_letter':
                        $query['data'] = $this->main_model->get_records($table, "", "", "")->result_array();
                        break;
                    case 'sheet_values':

                        $query['data'] = $this->main_model->get_records($table, "sheet_id", $id, "")->result_array();

                        break;
                    case 'valuesheet':
                        //$this->load->view('add-' . $table);
                        break;

                    default: $query['data'] = $this->main_model->get_records($table, "", "", "name")->result_array();
                        break;
                }
            }
            if ($id) {
                $query['selected_id'] = $id;
                //echo $id;
            } else {
                //echo $id. 'as';
                $query['selected_id'] = '';
            }
            $this->load->view('manage-' . $table, $query);
        }
    }

    public function add($table = '', $id = "0") {//getting quizid($id) as a parameter in url
        if (($table == "questions" ) && ($id != 0)) {
            $quiz_id['quizId'] = $this->main_model->get_name_from_id('quiz', 'id', $id, 'node');
            $this->load->view('add-' . $table, $quiz_id); //sending quizid to add question page in url
        } else {
            if (($table == "sheet_values" ) && ($id != 0)) {
                // $quiz_id['quizId'] = $this->main_model->get_name_from_id('quiz', 'id', $id, 'node');
                $sheet_id['sheet_id'] = $id;
                $this->load->view('add-' . $table, $sheet_id); //sending quizid to add question page in url
            } elseif (($table == "subjectivequestions" ) && ($id != 0)) {
                $quiz_id['quizId'] = $this->main_model->get_name_from_id('quiz', 'id', $id, 'node');
                $this->load->view('add-' . $table, $quiz_id); //sending quizid to add question page in url
            } else {
                $this->load->view('add-' . $table);
            }
        }
    }

    public function edit($table = '', $id = 0, $child_table = '', $foreign_key_name = 0, $order_by_id = 0) {//for add/update form
        $row_data = array();
        $query = $this->main_model->get_records($table, 'id', $id);
        $row_data = $query->row();
        $max_level = 0;
        switch ($table) {
            case "quiz":
                $node = $this->main_model->get_name_from_id('quiz', 'node', $id, 'id');
                $level = $this->main_model->get_node_level($node);
                $max_level = $level;
                for ($i = 1; $i <= $level; $level--) {
                    $base_node[$level]['id'] = $node;
                    $base_node[$level]['parent_id'] = $this->main_model->get_name_from_id('node', 'parent_id', $node, 'id');
                    $node = $base_node[$level]['parent_id'];
                }
                $row_data->node = $node;
                break;
            case "node":
                $node = $this->main_model->get_name_from_id('node', 'parent_id', $id, 'id');
                $level = $this->main_model->get_node_level($id);
                $max_level = $level;
                $level--;
                for ($i = 1; $i <= $level; $level--) {
                    $base_node[$level]['id'] = $node;
                    $base_node[$level]['parent_id'] = $this->main_model->get_name_from_id('node', 'parent_id', $node, 'id');
                    $node = $base_node[$level]['parent_id'];
                }
                break;
            case "quiz_story":
                $node = $this->main_model->get_name_from_id('quiz', 'node', $row_data->quiz_id, 'id');
                $level = $this->main_model->get_node_level($node);
                $max_level = $level;
                for ($i = 1; $i <= $level; $level--) {
                    $base_node[$level]['id'] = $node;
                    $base_node[$level]['parent_id'] = $this->main_model->get_name_from_id('node', 'parent_id', $node, 'id');
                    $node = $base_node[$level]['parent_id'];
                }
                $row_data->node = $node;

                break;
            case "sheets":
                $node = $this->main_model->get_name_from_id('sheets', 'node', $id, 'id');
                $level = $this->main_model->get_node_level($node);
                $max_level = $level;
                for ($i = 1; $i <= $level; $level--) {
                    $base_node[$level]['id'] = $node;
                    $base_node[$level]['parent_id'] = $this->main_model->get_name_from_id('node', 'parent_id', $node, 'id');
                    $node = $base_node[$level]['parent_id'];
                }
                $row_data->node = $node;
                break;

            default:
                break;
        }

        if (isset($base_node)) {
            $row_data->baseNodes = $base_node;
        }
//        var_dump($row_data);
//        die;
        $row_data->max_level = $max_level;


//conditional reading child data from linked tables
        if (!empty($child_table) && (!empty($foreign_key_name))) {
            $child_data = $this->main_model->get_records($child_table, $foreign_key_name, $id, $order_by_id)->result_array();

            $child_object = (object) $child_data; //problem in converting first array record i.e. [0]
            $row_data->child_data = $child_object;
        }//var_dump($row_data);die;
        $this->load->view('edit-' . $table, $row_data);
    }

    public function set($table = '') {//for inserting/updating database
//        echo "<pre>";
//        print_r($_POST);die;
        //die('testing');
        //print_r($table);die;
        $multiple_table = 0;
        if ($table == 'action_sheets') {
            //echo "<pre>"; print_r($_POST); die;
            $data['sheet_id'] = $_POST['sheet_id'];
            $data['user_id'] = $_SESSION['user_id'];
//          if(isset($_POST['submit'])){
//              $data['submit'] = '0';
//              unset($_POST['submit']);
//          }
            if (($_POST['draft']) == '0') {
                $data['is_submit'] = '0';
                //echo "0";
            } else {
                //echo "1";
                $data['is_submit'] = '1';
            }
            unset($_POST['draft']);

            $this->db->where('sheet_id', $_POST['sheet_id']);
            $this->db->where('user_id', $_SESSION['user_id']);
            $this->db->delete($table);

            foreach ($_POST['sheetvalue_id'] as $id => $value) {
                $data['sheetvalue_id'] = $id;
                $data['reason'] = $value;
                $return_id = $this->main_model->add_update_record($table, $data);
            }
            unset($_POST);
//         if($data['is_submit'] == 0){
//             header('Location: ' . base_url() . 'showsheet/');die;
//
//         }else{
            header('Location: ' . base_url() . 'value_action/sheets/' . $data['sheet_id']);
            die;
        }

        if ($table == 'quiz_story') {
            $quiz = $this->main_model->get_name_from_id('quiz', 'id', $_POST['node'], 'node');
            $_POST['quiz_id'] = $quiz;
            unset($_POST['node']);
        }
//        if ($table == 'users') {
//            unset($_POST['programs']);
//           // $_POST['created_date'];
//        }
//        echo "<pre>";
//        print_r($_POST);die;

        if (isset($_POST['child_table']) && $_POST['child_table'] != "") {//handling secondary table data
            $multiple_table = 1;
            $records = $_POST['children'];
            $child_table = $_POST['child_table'];
            $foreign_id = $_POST['foreign_id'];

            unset($_POST['children']);
            unset($_POST['child_table']);
            unset($_POST['foreign_id']);
        }

        if (isset($_POST['id'])) {//sending different parameters for update and insert
//            var_dump($_POST);
//            var_dump($table);
//            if ($table == "users") {
//
//                $_POST['password'] = md5($_POST['email']);
//            }
            $return_id = $this->main_model->add_update_record($table, $_POST, 'id');
        } else {
            $return_id = $this->main_model->add_update_record($table, $_POST);
        }

        if (isset($_FILES['image_file']) && !empty($_FILES['image_file']['name'])) {//managing image upload
            $extn = end(explode(".", $_FILES['image_file']['name']));
            $id = trim($return_id);
            switch ($table) {//separate image directory for user photos
                case "users":$this->saveImage('./assets/img/uploads/users/', $table . '-' . $id . '.' . $extn);
                    break;
                default:$this->saveImage('./assets/img/uploads/', $table . '-' . $id . '.' . $extn);
                    break;
            }

            $data['id'] = $id;
            $data['image_file'] = $table . '-' . $id . '.' . $extn;
            $id = $this->main_model->add_update_record($table, $data, 'id');
        }

        if ($multiple_table) {//for updating records in child table with foreign key
            $this->main_model->add_update_many_records($child_table, $records, $foreign_id, $return_id);
        }

        if (($table == 'quiz') && (!isset($_POST['id']))) {//redirecting to add questions after adding quiz
            if ((($_POST['quiz_type']) == 'Subjective')) {
                header('Location: ' . base_url() . 'add/subjectivequestions/' . $_POST['node']);
            } else {
                header('Location: ' . base_url() . 'add/questions/' . $_POST['node']);
            }
        } else if (($table == 'sheet_values') && (isset($_POST['sheet_id']))) {
            //print_r($return_id);die;
            header('Location: ' . base_url() . 'manage/sheet_values/' . $_POST['sheet_id']);
        } else {
            switch ($table) {
                case 'questions':
                    $node_id = $this->main_model->get_name_from_id('quiz', 'node', $_POST['quiz_id'], 'id');
                    header('Location: ' . base_url() . 'manage/' . $table . '/' . $node_id);
                    break;
                case 'node-users':
                    header('Location: ' . base_url());
                    break;
                default :
                    header('Location: ' . base_url() . 'manage/' . $table);
            }
        }
    }

    public function show($table = '', $id = 0) {
        $query = $this->main_model->get_records($table, 'id', $id);
        $row_data = $query->row();
        $row_data->table = $table;
        $this->load->view('show', $row_data);
    }

    public function node($nav_type = '', $id = 0) {

        $is_subscribe = 1;
        $query = $this->main_model->get_node_level($id);

        //============= check for subscription ========================
        if ($query > 2 && $_SESSION['role_name'] == 'Guest') {//page specified in url but permission not allowing
            $id = $this->main_model->get_name_from_id('node', 'parent_id', $id, 'id');
            $is_subscribe = 0;
        }


        $node_type = $this->main_model->get_name_from_id('node', 'type', $id, 'id');
        switch ($node_type) {
            case "Module":
                $query = $this->main_model->get_records('node', 'id', $id);
                $row_data = $query->row();
                break;
            case "Quiz":
                $quiz = $this->main_model->get_name_from_id('quiz', 'id', $id, 'node');
                $query = $this->main_model->get_records('quiz', 'id', $quiz);
                $row_data = $query->row();
                $row_data->quiz_id = $quiz;
                $row_data->id = $id;
                $row_data->nav_type = $nav_type;
                // var_dump ($row_data);die;
                if ($row_data->quiz_type == 'Practice') {
                    header('Location: ' . base_url() . 'quiz/practice/' . $row_data->quiz_id . '/1' . '/' . $row_data->nav_type . '/' . $row_data->id);
                    die;
                } elseif ($row_data->quiz_type == 'Subjective') {
                    header('Location: ' . base_url() . 'quiz/subjective/' . $row_data->quiz_id . '/1' . '/' . $row_data->nav_type . '/' . $row_data->id);
                }

                break;
//            case "SubjectiveQuiz":
//                $quiz = $this->main_model->get_name_from_id('quiz', 'id', $id, 'node');
//                $query = $this->main_model->get_records('quiz', 'id', $quiz);
//                $row_data = $query->row();
//                $row_data->quiz_id = $subquiz;
//                $row_data->id = $id;
//                break;
//            case "Sheet":
//                echo"testing";die;
//                $sheets = $this->main_model->get_name_from_id('sheets', 'id', $id, 'node');
//                $query = $this->main_model->get_records('sheets', 'id', $sheets);
//                $row_data = $query->row();
//                $row_data->sheet_id = $sheets;
//                $row_data->id = $id;
//                break;
//
            case "Content":
                break;
            default:
                break;
        }
        $row_data->nav_type = $nav_type;

        if ($is_subscribe == 1) { // ========= this is for subscriber ==============
            $this->load->view('show_node', $row_data);
        } else {
            $this->load->view('registration_form.php', $row_data);
        }
    }

    public function set_comments() {

//        echo 'jmd';die;
//        $data['user_id'] = $_SESSION['user_id'];
        $data['user_id'] = $_SESSION['user_id'];
        $data['question_id'] = $_POST['question_id'];
        $data['comment_text'] = $_POST['comment'];
        $data['comment_text'] = $_POST['comment'];
        $data['created_date'] = date('Y-m-d H:i:s');
        $data1 = $this->main_model->add_update_record('comments', $data, '');
//        echo 'data is inserted !!';

        $filters[0]['id'] = 'question_id';
        $filters[0]['value'] = $_POST['question_id'];


        $comment['ragini'] = $this->main_model->get_many_records('comments', $filters, '', 'id');
    }

//    public function get_comments($question_id=''){
////        $comment['comment_text'] = $this->main_model->get_records('comments', 'id', $quiz_id)->row();
//
//        $filters[0]['id'] = 'question_id';
//        $filters[0]['value'] = $question_id;
//        $comment['comments'] = $this->main_model->get_many_records('comments', $filters, '', 'id');
//       // $this->load->view('insert_options_view',$comment);
//        var_dump($comment);die;
//    }

    public function set_like() {
        $filter[0]['id'] = "question_id";
        $filter[0]['value'] = $_POST['question_id'];
        $filter[1]['id'] = "user_id";
        $filter[1]['value'] = $_SESSION['user_id'];
        $row = $this->main_model->get_many_records('likes_dislikes', $filter, '');
        if (empty($row)) {
            $data['user_id'] = $_SESSION['user_id'];
            $data['question_id'] = $_POST['question_id'];
            $data['records'] = "1";
            $data['created_date'] = date('Y-m-d H:i:s');
            $data['created_by'] = $_SESSION['user_id'];
            $this->main_model->add_update_record('likes_dislikes', $data, '');
        } else {
            if ($row[0]['records'] == 0) {
                $data['records'] = "1";
            } elseif ($row[0]['records'] == 1) {
                $data['records'] = "0";
            } else {
                $data['records'] = "1";
            }
            $data['id'] = $row[0]['id'];
            $this->main_model->add_update_record('likes_dislikes', $data, 'id');
        }
        echo $data['records'];
    }

    public function set_dislike() {
        $filter[0]['id'] = "question_id";
        $filter[0]['value'] = $_POST['question_id'];
        $filter[1]['id'] = "user_id";
        $filter[1]['value'] = $_SESSION['user_id'];
        $row = $this->main_model->get_many_records('likes_dislikes', $filter, '');
        if (empty($row)) {
            $data['user_id'] = $_SESSION['user_id'];
            $data['question_id'] = $_POST['question_id'];
            $data['records'] = "-1";
            $data['created_date'] = date('Y-m-d H:i:s');
            $data['created_by'] = $_SESSION['user_id'];
            $this->main_model->add_update_record('likes_dislikes', $data, '');
        } else {
            if ($row[0]['records'] == 0) {
                $data['records'] = "-1";
            } elseif ($row[0]['records'] == -1) {
                $data['records'] = "0";
            } else {
                $data['records'] = "-1";
            }
            $data['id'] = $row[0]['id'];
            $this->main_model->add_update_record('likes_dislikes', $data, 'id');
        }
        echo $data['records'];
    }

//    public function like_counts($question_id=''){
//        $question_id=292;
//        $total_likes = $this->main_model->get_record_count('likes_dislikes', 'records', 1);
//        echo "<pre>";print_r($total_likes);die;
////        $query="SELECT SUM(`records`)as likes FROM `likes_dislikes` where `records`= 1 AND `question_id`= 319";
////        $return = $this->db->query($query)->result_array();
////        echo "<pre>";print_r($return);die;
//    }

    public function register() {

        $this->load->view('registration_form_home.php');
    }

    public function node_old($id = 0) {
//        $query = $this->main_model->get_node_level($id, 0);
        //check permission on node level
        //check for quiz nodes
        $node_type = $this->main_model->get_name_from_id('node', 'type', $id, 'id');
        switch ($node_type) {
            case "Module":
                $query = $this->main_model->get_records('node', 'id', $id);
                $row_data = $query->row();
                break;
            case "Quiz":
                $quiz = $this->main_model->get_name_from_id('quiz', 'id', $id, 'node');
                $query = $this->main_model->get_records('quiz', 'id', $quiz);
                $row_data = $query->row();
                $row_data->quiz_id = $quiz;
                $row_data->id = $id;
                break;
            case "Content":
                break;
            default:
                break;
        }
        $this->load->view('show_node', $row_data);
    }

    public function update() {
        $table = $this->get_arguments('table');
        $this->main_model->add_update_record($table, 'id' . $_POST);
        $this->loadGrid($table);
    }

    public function delete($table = '', $id = 0, $child_table = "", $foreign_key = "") {//$id is value of primary key "id" to be deleted, - $foreign_key is the foreign key name in the child table
        $sheet_id = $this->main_model->get_name_from_id("sheet_values", "sheet_id", $id, 'id');
        $this->main_model->my_delete_record($table, 'id', $id);

        if ($child_table != "" && $foreign_key != "") {
            $this->main_model->delete_many_records($child_table, $foreign_key, $id);
        }
        if ($table == 'sheet_values') {
            header('Location: ' . base_url() . 'manage/' . $table . '/' . $sheet_id);
        } else {
            header('Location: ' . base_url() . 'manage/' . $table);
        }
    }

    public function assign($table = '', $id = 0) {
        $assigned_to_tbl = end(explode('-', $table));
        $array_values = explode('-', $table);
        $assigned_from_tbl = $array_values[0];

        $filter_fields[0]['id'] = $assigned_to_tbl;
        $filter_fields[0]['value'] = $id;

        $request_fields[0] = $assigned_from_tbl;
        $assigned_items = $this->main_model->get_many_records($table, $filter_fields, $request_fields, "");
        $source_data = array();

        if ($assigned_items) {
            foreach ($assigned_items as $key => $value) {
                $source_data[$key] = $value[$assigned_from_tbl];
            }
        }
        $data['source_data'] = $source_data;



        $this->load->view('assign-' . $table, $data);
    }

    public function set_many($table = '', $id = '') {
//echo "<pre>";
//echo $table.' '.$id;
//var_dump($_POST);die;


        $assigned_to_tbl = end(explode('-', $table));
        $array_values = explode('-', $table);
        $assigned_from_tbl = $array_values[0];
        if (isset($_POST[$assigned_from_tbl])) {
            $records = $_POST[$assigned_from_tbl];
            $i = 0;
            foreach ($records as $value) {
                $data[$i][$assigned_from_tbl] = $value;
                $data[$i][$assigned_to_tbl] = $id;
                $i++;
            }
        }
//        echo "<pre>";
//
//    var_dump($data);die;
        $this->main_model->add_update_many_records($table, $data, $assigned_to_tbl, $id); //$assigned_to_tbl--is the repititive field name in one-to-many table
        if (($table == 'node-users') && (!isset($_POST['id']))) {
            header('Location: ' . base_url());
        } else {

            header('Location: ' . base_url() . 'manage/' . end(explode('-', $table)));
        }
    }

    public function subscribNewsLetter() {

        //var_dump($_POST);

        $_POST['created_by'] = $_SESSION['user_id'];
        $_POST['created_date'] = date('Y-m-d H:m:s');

        $return_id = $this->main_model->add_update_record('news_letter', $_POST);
//        if($return_id){
////            $_SESSION['msg_str'].= 'Thanks For News letter subscription !';
////            $_SESSION['msg_hdr'] = 'Information !';
////
//            $_SESSION['msg_str'].= 'Cannot update Password. Try again or contact Website Administrator.';
//            $_SESSION['msg_hdr'] = 'Alert !';
//            header('Location: ' . base_url());
//
//
//        }else{
//            $_SESSION['msg_str'].= 'Thanks For News letter subscription !';
//            $_SESSION['msg_hdr'] = 'Alert !';
//
//        }

        header('Location: ' . base_url());
    }

    public function registrationMail() {

        //var_dump($_POST);die;

        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $contact_number = $_POST['contact_no'];
        $email = $_POST['email'];

        $massage_body = 'I want to be your subscribe user,'
                . 'Name : ' . $first_name . ' ' . $last_name
                . 'Contact Number : ' . $contact_number
                . 'Email : ' . $email
                . 'This mail is sent from' . base_url() . ' Registration form';

        $terget_email = 'biswajit.chowdhury@lexiconcpl.com';


        $this->email->from($email, $first_name . ' ' . $last_name);
        $this->email->to($terget_email);
        // $this->email->cc('another@another-example.com');
        // $this->email->bcc('them@their-example.com');

        $this->email->subject('Registration form  ');
        $this->email->message($massage_body);

        $this->email->send();

        //echo $this->email->print_debugger();
        $_SESSION['msg_str'].= 'Thanks For Contact Us !';
        $_SESSION['msg_hdr'] = 'Information !';

        header('Location: ' . base_url());
    }

    public function add_request($quiz_result_id) {

        $request['quiz_result_id'] = $quiz_result_id;

        $is_requested = $this->main_model->get_name_from_id('request_remove_answer', 'id', $quiz_result_id, 'quiz_result_id');

        if (!$is_requested) {

            $filter[0]['id'] = "id";
            $filter[0]['value'] = $request['quiz_result_id'];
            $req_field = array("quiz_id", "user_id");
            $result = $this->main_model->get_many_records("quiz_result", $filter, $req_field);

            $request['quiz_id'] = $result[0]['quiz_id'];
            $request['user_id'] = $result[0]['user_id'];

            //echo '<pre>';
            //var_dump($result);die;

            $request_id = $this->main_model->add_update_record("request_remove_answer", $request);

            header('Location: ' . base_url());
        } else { //============================= already requested for this quiz ===========================
            header('Location: ' . base_url());
        }
    }

    public function remove($type = '') {
        $quiz_result = array();

        switch ($type) {
            case "all":
                $quiz_result_details = $this->db->get('quiz_result')->result_array();

                foreach ($quiz_result_details as $key => $result) {
                    $quiz_result[$key]['id'] = $result['id'];
                    $quiz_result[$key]['student_name'] = $this->main_model->get_name_from_id('users', 'name', $result['user_id']);
                    $quiz_result[$key]['quiz_name'] = $this->main_model->get_name_from_id('quiz', 'name', $result['quiz_id']);
                    $quiz_result[$key]['start_time'] = date('d-m-y  _  h:i:s a', strtotime($result['start_time']));
                    if ($result['submit_time'])
                        $quiz_result[$key]['submit_time'] = date('d-m-y  _  h:i:s a', strtotime($result['submit_time']));
                    else
                        $quiz_result[$key]['submit_time'] = '';
                }
                break;
            case "incomplete":
                $this->db->where("submit_time IS NULL");
                $quiz_result_details = $this->db->get('quiz_result')->result_array();

                foreach ($quiz_result_details as $key => $result) {
                    $quiz_result[$key]['id'] = $result['id'];
                    $quiz_result[$key]['student_name'] = $this->main_model->get_name_from_id('users', 'name', $result['user_id']);
                    $quiz_result[$key]['quiz_name'] = $this->main_model->get_name_from_id('quiz', 'name', $result['quiz_id']);
                    $quiz_result[$key]['start_time'] = date('d-m-y _ h:i:s a', strtotime($result['start_time']));
                    if ($result['submit_time'])
                        $quiz_result[$key]['submit_time'] = date('d-m-y _ h:i:s a', strtotime($result['submit_time']));
                    else
                        $quiz_result[$key]['submit_time'] = '';
                }
                break;
            case "requested":

                $query_str1 = 'SELECT `request_remove_answer`.`id`,`request_remove_answer`.`quiz_result_id`,
                     `request_remove_answer`.`user_id`, `request_remove_answer`.`quiz_id`,`request_remove_answer`.`request_time`,
                     `quiz_result`.`start_time`,`quiz_result`.`submit_time` FROM `request_remove_answer`,`quiz_result` WHERE `request_remove_answer`.`quiz_result_id` =`quiz_result`.`id` AND
                     `request_remove_answer`.`is_deleted` = 0 ';
                $quiz_result_details = $this->db->query($query_str1)->result_array();

                foreach ($quiz_result_details as $key => $result) {
                    $quiz_result[$key]['quiz_result_id'] = $result['quiz_result_id'];
                    $quiz_result[$key]['id'] = $result['id'];
                    $quiz_result[$key]['student_name'] = $this->main_model->get_name_from_id('users', 'name', $result['user_id']);
                    $quiz_result[$key]['quiz_name'] = $this->main_model->get_name_from_id('quiz', 'name', $result['quiz_id']);
                    $quiz_result[$key]['start_time'] = date('d-m-y  h:i:s a', strtotime($result['start_time']));
                    if ($result['submit_time'])
                        $quiz_result[$key]['submit_time'] = date('d-m-y _ h:i:s a', strtotime($result['submit_time']));
                    else
                        $quiz_result[$key]['submit_time'] = '';

                    $quiz_result[$key]['request_time'] = date('d-m-y _ h:i:s a', strtotime($result['request_time']));
                }

                break;
            default :
                break;
        }
        $data['quiz_result'] = $quiz_result;
        $this->load->view('remove-' . $type, $data);
    }

    public function value_action($sheet = '', $id = '', $action = '') {

        $data['sheet_id'] = $id;
//        //echo $data['abc'] = 'mohit';
//       //echo $id;die;
        $submit = $this->custom->is_sheet_submited($id);
//        //var_dump($submit);
        if ($submit) {

            header('Location: ' . base_url() . 'showsheet/');
            die;
        }
//
        $req = array('category');
        $filter[0]['id'] = 'sheet_id';
        $filter[0]['value'] = $id;
        $data['category_name'] = $this->main_model->get_records_group_by('sheet_values', $filter, 'category', $req, 'category');


        foreach ($data['category_name'] as $key => $cat) {

            $data['max'][$cat['category']] = $this->main_model->get_name_from_id('actionsheet_category', 'max', $cat['category']);
        }
        //$this->var_print($data['max']);die;


        $req = array('name, max');
        $filter1[0]['id'] = 'id';
        $filter1[0]['value'] = $id;
//
//
//
//
//
//
//        $data['max'] = $this->main_model->get_many_records('actionsheet_category', '', $req, 'name');
        $details = $this->main_model->get_many_records('sheets', $filter1, array('details'), '');
        $data['data']['details'] = $details[0]['details'];

//        echo"<pre>";
//        print_r($details);die;

        $i = 0;
        foreach ($data['category_name'] as $key => $category) {
            $req = array('category');
            $filter[0]['id'] = 'sheet_id';
            $filter[0]['value'] = $id;
            $filter[1]['id'] = 'category';
            $filter[1]['value'] = $category['category'];
            $data['data'][$category['category']] = $this->main_model->get_many_records("sheet_values", $filter, '', '');
        }
        $data['submit'] = '';

        //if($action == 'edit'){
        $req = array('category');
        $filter[0]['id'] = 'sheet_id';
        $filter[0]['value'] = $id;
        $filter[1]['id'] = 'user_id';
        $filter[1]['value'] = $_SESSION['user_id'];
        $data['submit'] = $this->main_model->get_many_records("action_sheets", $filter, '', '');

        if (!empty($data['submit'])) {
            $action = 'edit-';
        }

        $this->load->view($action . 'values_action_sheet', $data);
    }

    public function delete_result($type = '', $quiz_result_id = 0) {
        $id = $quiz_result_id;
        $this->main_model->delete_many_records('quiz_result', 'id', $id);
        $this->main_model->delete_many_records('quiz_result_answers', 'quiz_result_id', $id);
        $this->main_model->delete_many_records('quiz_result_options', 'quiz_result_id', $id);

        if ($type == 'requested') {
            $this->main_model->my_delete_record('request_remove_answer', 'quiz_result_id', $id);
        }

        header('Location: ' . base_url() . 'remove/' . $type);
    }

    public function testing() {
        $this->load->view('testing');
    }

    public function var_print($data) {
        echo"<pre>";
        print_r($data);
    }

//----------------------------------------- main-class supporting functions starts ------------------------------------------------

    public function ajax_fetch() {
        $requested_text = file_get_contents("php://input");
        $requested_obj = json_decode($requested_text, TRUE);
        $table = $requested_obj['req_table'];
        $key = $requested_obj['search_key'];
        $value = $requested_obj['search_value'];
        $request_fields = $requested_obj['req_fields'];

        if ($_SESSION['role_name'] == 'Content Creator' && $table == 'node') {//page specified in url but permission not allowing
            $is_permitted = $this->custom->get_access_permit_parent($value); //=================== This is to check parent node =========
            if ($is_permitted) {

                $data = $this->main_model->get_selected_records($table, $key, $value, $request_fields);
            } else {
                $is_permitted = $this->custom->get_access_permit($value); //======================= this is to check chield node ===============
                if ($is_permitted) {
                    $data = $this->main_model->get_selected_records($table, $key, $value, $request_fields);
                } else {
                    //die ;
                    $data = '';
                }
            }
        } else {

            $data = $this->main_model->get_selected_records($table, $key, $value, $request_fields);
        }


        $encoded = json_encode($data, JSON_FORCE_OBJECT);
        die($encoded);
    }

    public function ajax_feeder($function) {
        $requested_text = file_get_contents("php://input");
        $requested_obj = json_decode($requested_text, TRUE);
        switch ($function) {
            case "no_of_childs":
                $node_Id = $requested_obj['data'];
                $result = $this->main_model->get_name_from_id('node', 'count(*)', $node_Id, "parent_id");
                $encoded = json_encode($result, JSON_FORCE_OBJECT);
                die($encoded);
                break;
            default:
                break;
        }
    }

    private function loadGrid($table = '') {
        $data['table_records'] = $this->main_model->get_records($table);
        $this->load->view('manage-' . $table, $data);
    }

    private function saveImage($path, $file_name) {

        $config['upload_path'] = $path;
        $config['allowed_types'] = 'gif|jpg|png|pdf|bmp|jpeg';
        $config['file_name'] = $file_name;
        $config['overwrite'] = TRUE;

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('image_file')) {
//$upload_data = $this->upload->data();
//@unlink($_FILES[$file_element_name]);
            return true;
        } else {
            die(print_r($this->upload->display_errors()));
        }
    }

    /* Not in use now, May be required
      public function get_arguments($key=0){
      $url=  $_SERVER['PHP_SELF'];
      $arg=  array_filter(explode('/', $url));
      $arg['table']=$arg[4];
      $arg['action']=$arg[2];
      if($key){
      return $arg[$key];
      }
      else{
      return $arg;
      }
      }
     *
     */
}

//class end
