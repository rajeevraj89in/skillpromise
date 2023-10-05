 <?php
//
$this->load->view('header_view');
$this->load->view('user_left_view_test_center');
?>

<!--content panel start-->
<section class="col-md-9" style="min-height: 395px;">
    <div class="dooble-border">
        <div class="page-header_">
            <div class="panel">

                <?php
				// print('<pre>'); print_r($_SESSION); print('</pre>');
				
                $id = $_SESSION['student_test_center_id']; 
                 $query = $this->main_model->get_records('node', 'id', $id);
                $row_data = $query->row();
                $row_data->nav_type = "program";
                //echo "<pre>";
                //print_r($row_data);
				$type = $row_data->type;
                $page_name = '';
                $name = $row_data->name;
                $page_content = $row_data->page_content;
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
                echo '<br>';
                if ($type == "Group Discussion") {
                    $this->load->view("group_discussion_output_view");
                    die;
                }
                echo '</div><!--end well -->';



                if (isset($quiz_type)) {

                    switch ($quiz_type) {

                        case "Practice":echo '<div class = "col-md-12">
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
//
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
                $is_checked = "";
                if ($is_checked == "Yes") {
                    echo '<!--Answer and Explanation region start-->
        <div class = "form-group">
        <!--Workspace-outer-row region start-->
        <div id = "workspace-outer" class = "row">

        <!--like and dislike icon-->
        <div class = "col-xs-2 col-sm-2 col-md-2 col-lg-2">
          <span class="likebadge" id="likebadge">' . $likes . '</span><span class="unlikebadge" id="unlikebadge">' . $dislikes . '</span>
          <span class="glyphicon glyphicon-thumbs-up icon_size like_btn ' . $f . '" id=' . $question['id'] . ' onclick="likeid(this);" data-id="1"></span>
          <span class="glyphicon glyphicon-thumbs-down icon_size dislike_btn ' . $g . '" id=' . $question['id'] . ' data-id="-1"></span>
        </div>


        <!--workspace region-column start-->
        <!--workspace region-column start-->
        <div class = "col-xs-2 col-sm-2 col-md-2 col-lg-2">
        <div class = "toolbar-text" data-toggle = "collapse" data-target = "#workspace' . $question['id'] . '">
        Workspace
        </div>


        </div>

        <!--comment region-column start-->
        <div class = "col-xs-3 col-sm-3 col-md-3 col-lg-3">
        <div class = "toolbar-text" data-toggle = "collapse" data-target = "#comment' . $question['id'] . '">
        Discuss in Community
        </div>
        </div>

        <!--workspace region-column start-->

        </div>
        <!--Answer and Explanation-outer-row region end-->
        <!--Answer and Explanation-outer-row-result region start-->
        <div class = "form-group">
        <div class = "row">
        <div class = "col-md-12">
        <div id = "viewanswer' . $question['id'] . '" class = "collapse panel panel-success">
        <div class = "panel-heading">Answer and Explanation</div>
        <div class = "panel-body">
        <div id = "">';
                    echo $question['answer_text'];
                    echo '</div>
        </div>
        </div>
        </div>
        <div class = "col-md-12">
        <div id = "workspace' . $question['id'] . '" class = "collapse panel panel-success">
        <div class = "panel-heading">Work Space</div>
        <div class = "panel-body">
        <textarea class = "skill_editor form-control" id = ""></textarea>
        </div>
        <div class = "panel-footer">
            <div class="row">
                <div class = "col-xs-3 col-sm-3 col-md-3 col-lg-3 calc-button calculator-trigger toolbar-text" type="button">Show Calculator</div>
            </div>
            <div class="row">
                <div class="col-md-4 calc-div"></div>
                <div class="col-md-8"></div>
            </div>
        </div>
        </div>
        </div>
        <div class = "col-md-12">
        <div id = "report' . $question['id'] . '" class = "collapse panel panel-success">
        <div class = "panel-heading">Report</div>
        <div class = "panel-body">
        <textarea class = "skill_editor form-control" id = ""></textarea>
        </div>
        </div>
        </div>
        </div>
         <div class = "col-md-12">
        <div id = "comment' . $question['id'] . '" class = "collapse panel panel-success">
        <div class = "panel-heading">Discuss in Community</div>
        <div class = "panel-body">
        <div class="row col-md-12">
        <p>' . $comment . '</p>
        </div>
        <p>Provide your inputs in the box below:</p>
        <textarea class = "input_comment skill_editor form-control" name="content" id = "mytest_' . $key . '"></textarea>
        <div class="row">

        </div>
        <div class="row">
        <div class="col-sm-12 text-center">
            <button class = "skill btn btn-success" type="button" id=' . $question['id'] . '  onclick="getid(this);">Submit</button>
        </div>
        </div>
        <div class="row col-md-12" id="div_' . $question['id'] . '">

        </div>
        </div>
        </div>
        </div>
        </div>
        <!--Workspace-outer-row-result region start-->
        </div>
        <!--workspace region end-->
        </div>
        </div>
        </div>';
                }
                ?>




                </section> <!--end col-md-9-->
                <?php
//            $this->load->view('quick_link_view');
                ?>

                <!--end content panel start-->

                <!--end bigCallout-->

                <!--End Content and Sidebar-->
                <!--=================================================-->
                <!--end main-->

                <?php //$this->load->view('footer_view'); ?>

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

                    $('.like_btn').on('click', function () {
                        var number = parseInt($(this).parent().find('.likebadge').text()); //alert(number);

                        if ($(this).hasClass("like-color")) {//============================when like button is selected remove like============
                            $(this).removeClass("like-color");
                            number -= 1;
                            //alert(number);
                            $(this).parent().find('.likebadge').text(number);
                        } else {
                            if ($(this).next().hasClass("dislike-color")) {//========================when unlike button is selected on like click
                                var number2 = parseInt($(this).parent().find('.unlikebadge').text());
                                //alert(number2);
                                number2 -= 1;
                                $(this).parent().find('.unlikebadge').text(number2);
                            }
                            //======================add like and remove unlike
                            $(this).next().removeClass("dislike-color");
                            $(this).addClass("like-color");
                            number += 1;
                            $(this).parent().find('.likebadge').text(number);

                        }
                        var question_id = $(this).attr('id');//alert(question_id);
//      var records = $(this).attr('data-id');alert(records);

                        var fieldHTML = '<input type="hidden" name="question_id" value="' + question_id + '"/>';

                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url() . 'set_like/'; ?>",
                            data: {
                                question_id: question_id
//                   records: records
                            },
                            success: function (data) {

                            },
                            error: function () {

                                alert("ajax error");
                            }
                        });

                    });
                    $(document.body).on('click', '.dislike_btn', function () {

                        var question_id = $(this).attr('id');//alert(question_id);
                        var number = parseInt($('#unlikebadge').text()); //alert(number);
                        if ($(this).hasClass("dislike-color")) {
                            $(this).removeClass("dislike-color");
                            number -= 1;
                            $(this).parent().find('.unlikebadge').text(number);
                        } else {
                            if ($(this).prev().hasClass("like-color")) {//========================
                                var number2 = parseInt($(this).parent().find('.likebadge').text());
                                number2 -= 1;
                                $(this).parent().find('.likebadge').text(number2);
                            }
                            $(this).prev().removeClass("like-color");
                            $(this).addClass("dislike-color");
                            number += 1;
                            $(this).parent().find('.unlikebadge').text(number);
                        }


                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url() . 'set_dislike/'; ?>",
                            data: {
                                question_id: question_id
                            },
                            success: function (data) {

                            },
                            error: function () {

                                alert("ajax error");

                            }
                        });
                    });

                    function getid(abc) {

                        var attrname = $(abc).attr("id");
                        // alert(attrname);
                        $(document.body).on("click", "#" + attrname, function () {

                            var id = ("#comment" + attrname);
                            var data1 = $("#comment" + attrname).find('.note-editable').text();

                            $.ajax({
                                type: "POST",
                                url: "<?php echo base_url() . 'set_comments/'; ?>",
                                data: {

                                    question_id: attrname,
                                    comment: data1
                                },
                                success: function (data)
                                {
                                    var test = 'abc';

                                    document.getElementById("div_" + attrname).innerHTML = data;
                                    $("#comment" + attrname).find('.note-editable').text("");

                                },
                                error: function () {

                                    alert("ajax error");
                                }
                            });

                        });

                    }

                </script>


                <?php $this->load->view('html_end_view'); ?>


                <!--ALTER TABLE `quiz` CHANGE `quiz_category` `quiz_category` ENUM('TopicWise','Comprehensive','','') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL;-->