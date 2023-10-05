<?php
//
$this->load->view('header_view');
$this->load->view('user_left_view');
?>


<!--content panel start-->
<section class="col-md-9" style="min-height: 395px;">
    <div class="dooble-border">
        <div class="page-header">
            <div class="panel">

                <?php
                $page_name = '';
                if (isset($header)) {
                    $page_name = $header;
                } else {
                    $page_name = $name;
                }

                echo "<h1 class='header_text'>$page_name</h1>
            </div><!-- end page header -->";

                $pages = explode("--|DIV|--", $page_content);
                $no_of_pages = (count($pages));
                if ($no_of_pages > 1) {
                    foreach ($pages as $key => $value) {
                        echo '<div class="page" id="page' . ($key + 1) . '" style="display:none">';
                        echo $value;
                        echo '</div>';
                    }

                    echo '<div class = "row">
                        <div class = "col-md-2">
                        <button class = "btn btn-primary btn-lg" id = "prev"> Previous </button>
                        </div><div class = "col-md-8"></div>
                        <div class = "col-md-2">
                        <button class = "btn btn-primary btn-lg" id = "next"> Next </button>
                        </div>
                        </div>';
                } else {//if single page to be displayed
                    echo '<div class="text-justify">' . $page_content . '</div>';
                }

                if (isset($quiz_type)) {

                    switch ($quiz_type) {

                        case "Practice":
                            echo '<div class = "col-md-12">
                        <a href = "' . base_url() . "quiz/practice/$quiz_id/1" . '" class = "btn btn-primary btn-lg"> Practice Quiz </a>
                        </div>';
                            break;

                        case "Subjective":
                            echo '<div class = "col-md-12">
                        <a href = "' . base_url() . "quiz/subjective/$quiz_id/1" . '" class = "btn btn-primary btn-lg"> Subjective Quiz </a>
                        </div>';
                            break;

                        case "Scoring":
                            break;

                        case "Flex":
//                    <a href="' . base_url() . "quiz/flex/$quiz_id" . '" class="btn btn-primary btn-lg"> Flex Quiz </a>
                            break;



                        case "Dashboard":
                            if ($nav_type != "test_centre") {
                                //===================Checking if the quiz is of Topic Wise category or not==============
                                if ($quiz_category == "TopicWise") {

                                    $summary['quiz_name'] = $this->main_model->get_name_from_id("quiz", "name", $quiz_id);
                                    $filter4[0]['id'] = "quiz_id";
                                    $filter4[0]['value'] = $quiz_id;
                                    $filter4[1]['id'] = "user_id";
                                    $filter4[1]['value'] = $_SESSION['user_id'];
                                    $req_field = array("id");
                                    $quiz_result_id = $this->main_model->get_many_records("quiz_result", $filter4, $req_field);

                                    $filter5[0]['id'] = "quiz_result_id";
                                    $filter5[0]['value'] = $quiz_result_id[0]['id'];
                                    $summary['quiz_result'] = $this->main_model->get_many_records("quiz_result_answers", $filter5, "", "question_no");
                                    $str = "Select";
//=================================================================================================================
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
                                            $category[$id]['no_of_question'] = 1;
                                            $category[$id]['visited'] = ($answer['visited'] == 1) ? 1 : 0;
                                            $category[$id]['answer'] = ($answer['answered'] == 1) ? 1 : 0;
                                            $category[$id]['marked_for_review'] = ($answer['marked'] == 1) ? 1 : 0;
                                            $category[$id]['correct'] = ($answer['marks'] > 0) ? 1 : 0;
                                        }
                                    }

                                    $summary['category'] = $category;
                                    $summary['quiz_id'] = $quiz_id;
//                                    echo '<pre>';
//                                    print_r($summary);
//                                    die;
//====================================================================================================================
                                    $this->load->view('topictestoutput', $summary);
//===================================Checking if the quiz is of Comprehensive category or not=========================
                                } elseif ($quiz_category == "Comprehensive") {
                                    $summary['quiz_name'] = $this->main_model->get_name_from_id("quiz", "name", $quiz_id);
                                    $filter4[0]['id'] = "quiz_id";
                                    $filter4[0]['value'] = $quiz_id;
                                    $filter4[1]['id'] = "user_id";
                                    $filter4[1]['value'] = $_SESSION['user_id'];
                                    $req_field = array("id");
                                    $quiz_result_id = $this->main_model->get_many_records("quiz_result", $filter4, $req_field);
                                    $filter5[0]['id'] = "quiz_result_id";
                                    $filter5[0]['value'] = $quiz_result_id[0]['id'];
                                    $summary['quiz_result'] = $this->main_model->get_many_records("quiz_result_answers", $filter5, "", "question_no");
                                    $str = "Select";
//=================================================================================================================
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
                                            $category[$id]['no_of_question'] = 1;
                                            $category[$id]['visited'] = ($answer['visited'] == 1) ? 1 : 0;
                                            $category[$id]['answer'] = ($answer['answered'] == 1) ? 1 : 0;
                                            $category[$id]['marked_for_review'] = ($answer['marked'] == 1) ? 1 : 0;
                                            $category[$id]['correct'] = ($answer['marks'] > 0 ) ? 1 : 0;
                                        }
                                    }

                                    $summary['category'] = $category;
                                    $summary['quiz_id'] = $quiz_id;

//===========================================================================================
                                    $this->load->view('compretestoutput', $summary);
                                } else {
                                    $attempt = $this->custom->is_quiz_attempted($quiz_id, $_SESSION['user_id']);
//                        var_dump($attempt);
//                        die;

                                    if ($attempt) {
                                        $submited = $this->custom->is_quiz_submited($attempt);
                                        if ($submited) {
                                            echo '<div class = "col-md-12">
                                   <a href = "' . base_url() . "quiz/result/$quiz_id" . '" class = "btn btn-primary btn-lg"> Quiz Result </a>
                                   </div>';
                                        } else {
                                            echo '<div class = "col-md-12">
                                <a href = "' . base_url() . "add_request/$attempt" . '" class = "btn btn-primary btn-lg"> Send Request </a>
                                </div>';
                                        }
                                    } else {
                                        echo '<div class = "col-md-12">
                                      <a href = "" class = "btn btn-primary btn-lg" id = "board-quiz"> Start Quiz </a>
                                      </div > ';
                                    }
                                }
                            } else {
                                $attempt = $this->custom->is_quiz_attempted($quiz_id, $_SESSION['user_id']);

                                if ($attempt) {
                                    $submited = $this->custom->is_quiz_submited($attempt);
                                    if ($submited) {
                                        echo '<div class = "col-md-12">
                                   <a href = "' . base_url() . "quiz/summary/$quiz_id" . '" class = "btn btn-primary btn-lg"> Quiz Result </a>
                                   </div>';
                                    } else {
                                        echo '<div class = "col-md-12">
                                <a href = "' . base_url() . "add_request/$attempt" . '" class = "btn btn-primary btn-lg"> Send Request </a>
                                </div>';
                                    }
                                } else {
                                    echo '<div class = "col-md-12">
                                      <a href = "" class = "btn btn-primary btn-lg" id = "board-quiz"> Start Quiz </a>
                                      </div > ';
                                }
                            }

                            break;
                    }
                }
                ?>

            </div><!--end well-->
            <!--        </div> 2nd end well
                </div> 3nd end well-->
            </section> <!--end col-md-9-->
            <?php
//            $this->load->view('quick_link_view');
            ?>

            <!--end content panel start-->

            <!--end bigCallout-->

            <!--End Content and Sidebar-->
            <!--=================================================-->
            <!--end main-->

            <?php $this->load->view('footer_view'); ?>

            <script type="text/javascript">
                var no_of_pages = <?php echo $no_of_pages; ?>;
                var current_page = 1;

<?php
if (isset($quiz_type) && ($quiz_type == "Dashboard")) {
    echo 'function open_win() {
            window.open("' . base_url() . 'quiz/board/' . $quiz_id . '", "_blank", "toolbar = yes, scrollbars = yes, resizable = yes, top = 0, left = 0, width = 1350px, height = 655px");
            }
            $(document).ready(function () {
            $("#board-quiz").click(function () {
                open_win();
            });
                });';
}
?>
                function show_page(page) {
                    page = parseInt(page);
                    if (page) {
                        $(".page").hide();
                        $("#page" + page).show();
                    }
                }

                $(document).ready(function () {

                    if (no_of_pages) {
                        $("#prev").addClass("disabled");
                        show_page(current_page);
                    }

                    $("#next").click(function () {
                        if (no_of_pages > current_page) {
                            current_page++;
                            show_page(current_page);
                        }
                        $("#prev").removeClass("disabled");
                        if (no_of_pages == current_page) {
                            $("#next").addClass("disabled");
                        }
                    });

                    $("#prev").click(function () {
                        if (current_page > 1) {
                            current_page--;
                            show_page(current_page);
                        }
                        $("#next").removeClass("disabled");
                        if (current_page == 1) {
                            $("#prev").addClass("disabled");
                        }
                    });
                });
            </script>


            <?php $this->load->view('html_end_view'); ?>


            <!--ALTER TABLE `quiz` CHANGE `quiz_category` `quiz_category` ENUM('TopicWise','Comprehensive','','') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL;-->
