<?php

//$category_detail = array();
function get_category_details($questions, $category) {
    $category_done = array();
    foreach ($questions as $q_no => $ques) {
        foreach ($category as $key => $value) {
            if (($ques['category'] == $value['category_id']) && (!in_array($value['category_id'], $category_done))) {
                $category_detail[$key]['id'] = $value['category_id'];
                $category_detail[$key]['name'] = $value['category_name'];
                $category_detail[$key]['no_of_questions'] = $value['no_of_questions'];
                $category_detail[$key]['first_question'] = ++$q_no;
                array_push($category_done, $value['category_id']);
            }
        }
    }
    return $category_detail;
}

function inject_panel_buttons($questions) {
    foreach ($questions as $key => $value) {
        $i = ++$key;
        echo'<div class="col-xs-2 col-sm-2 col-md-2 show-grid">
            <button class="btn btn-custom q-button" type="button" id="q-button' . $i . '">' . $i . ' <span class="tick fa"></span></button>
                            </div>';
    }
}

function insert_question($questions, $options, $category) {

    foreach ($questions as $key => $question) {
        $question_no = ++$key;
        echo '<div class = "row border-black questions" id="question-' . $question_no . '">
        <!--quiz-question-header-->
        <div class = "row quiz-q-header border-bottom">
        <div class = "col-md-4 question-no">
        <strong>Question No. <span>' . $question_no . '</span></strong>
        </div>
        <div class = "col-md-8 text-right">
        <span class = "form-inline">
        <div class = "form-group">
        <label for = "sel1">View in</label>
        <select id = "sel1" class = "form-control input-sm">
        <option>English</option>
        <option>Hindi</option>
        </select>
        </div>
        <strong class = "right-mark">Right Mark: <span class = "text-success">' . $question['question_weight'] . '</span></strong>
        <!--<strong class = "wrong-mark">Negative Mark: <span class = "text-danger">0.25</span></strong>-->
        </span>
        </div>
        </div>
        <!--quiz-question-header end-->
        <!--quiz-question-content-->
        <div class = "row quiz-q-content">';
        if ($question['story']) {
            $CI_Model = & get_instance();
            $CI_Model->load->model('main_model');
            echo '<div class = "col-md-6 left-question-div">' . $CI_Model->main_model->get_name_from_id('quiz_story', 'story_content', $question['story'], "id") . '</div>
        <div class = "col-md-6 right-question-div">';
        } else {
            echo '<div style = "display:none" class = "col-md-6 left-question-div"><p>comprehension text</p></div>
        <div class = "col-md-12 right-question-div">';
        }


        echo'<span class = "form-horizontal">
        <div class = "form-group">
        <div class = "col-sm-12">
        <div class = "form-control-static" id = "question' . $question['id'] . '">' . $question['question_text'] . '</div>
        <input id="question-no-' . $question_no . '" type="hidden" name="answers[' . $question['id'] . '][question_no]" value = "' . $question_no . '">
        <input id="select_type-' . $question_no . '" type="hidden" name="answers[' . $question['id'] . '][select_type]" value = "' . $question['select_type'] . '">
                <input id="time-taken-' . $question_no . '" type="hidden" name="answers[' . $question['id'] . '][question_time_taken]" value = "0">
        <input id="visited-' . $question_no . '" type="hidden" name="answers[' . $question['id'] . '][visited]" value = "0">
        <input id="marked-' . $question_no . '" type="hidden" name="answers[' . $question['id'] . '][marked]" value = "0">
        <input id="answered-' . $question_no . '" type="hidden" name="answers[' . $question['id'] . '][answered]" value = "0">
        <input id="category-' . $question_no . '" type="hidden" name="answers[' . $question['id'] . '][category]" value = "' . $question['category'] . '">
        </div>
        </div>';


        foreach ($options[$question['id']] as $option) {


            if ($option['option_number'] % 2) {
                echo '<div class="form-group">';
            }
            echo'<div class = "col-xs-1 col-sm-1 col-md-1 col-lg-1 quet-answ-img-correct">' . $option['option_number'] . '. </div>
            <div class = "col-xs-5 col-sm-5 col-md-5 col-lg-5">';

            if ($question['select_type'] == 'Single') {
                echo '<label class = "radio-inline">
                <input class = "input" type = "radio" value = "' . $option['option_id'] . '" id = "" name = "answers[' . $question['id'] . '][selected]">' . $option['option_text'];
            } else {
                echo '<label class = "checkbox-inline">
                    <input class = "input" type = "checkbox" value = "' . $option['option_id'] . '" id = "" name = "answers[' . $question['id'] . '][options][' . $option['option_number'] . ']">' . $option['option_text'];
            }
            echo '</label>
        </div>';

            if (!($option['option_number'] % 2)) {
                echo '</div>'; //form-group div
            }
            if (($question['no_of_options'] % 2) && ($option['option_number'] == $question['no_of_options'])) {
                echo '</div>'; //form-group div in case of odd no of options
            }
        }


        echo '</span>
        </div>
        </div>
        <!--quiz-question-content end-->
        <!--quiz-question-footer-->
        <div class = "row quiz-main-btn border-top">
        <div class = "col-md-9">
        <button class = "btn btn-sm btn-default mark" type = "button">Mark For Review &amp; Next</button>
        <button class = "btn btn-sm btn-default clear" type = "button">Clear Response</button>
        </div>
        <div class = "col-md-3 text-right">
        <button class = "btn btn-sm btn-primary next-button" type = "button">Save &amp; Next</button>
        </div>
        </div>
        <!--quiz-question-footer end-->
        </div>';
    }
}

//var_dump($questions);
//die;
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="IE=edge" http-equiv="X-UA-Compatible">
        <meta content="width=device-width, initial-scale=1" name="viewport">

        <link rel="shortcut icon" href="<?php echo(base_url() . 'assets/img/'); ?>animated_favicon.gif" type="image/x-icon">
        <link rel="icon" href="<?php echo(base_url() . 'assets/img/'); ?>animated_favicon.gif" type="image/x-icon">

        <title>:: Online Quiz ::</title>
        <link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'bootstrap.min.css'); ?>" />
        <link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'board_quiz.css'); ?>" />
        <link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'jquery.countdown.css'); ?>" />
        <link rel="stylesheet" href="<?php echo(base_url() . 'assets/fonts/' . 'font-awesome-4.2.0/css/font-awesome.min.css'); ?>" />

        <script src="<?php echo(base_url() . 'assets/js/' . 'jquery-1.11.1.min.js'); ?>"></script>
        <script src="<?php echo(base_url() . 'assets/js/' . 'bootstrap.min.js'); ?>"></script>
        <script src="<?php echo(base_url() . 'assets/js/' . 'jquery.plugin.min.js'); ?>"></script>
        <script src="<?php echo(base_url() . 'assets/js/' . 'jquery.countdown.min.js'); ?>"></script>
    </head>
    <body class="question-palet login">

        <div id="main" class="container">
            <header>
                <nav role="navigation" id="navBarTop" class="navbar navbar-default navbar-fixed-top">
                    <div class="container">
                        <div class="navbar-header">
                            <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand"><img alt="skillpromise" src="<?php echo(base_url() . 'assets/img/' . 'quiz_logo.png'); ?>"></a>
                        </div>

                    </div><!--nav Container end-->

                </nav><!-- navBarTop end -->
            </header>
            <div id="bigCallout" class="row">
                <!--quiz-content-main-->
                <section class="col-md-9">
                    <!--question paper-->
                    <div id="question-paper" class="row border-black" style="display:none">
                        <div class="border">
                            <?php
                            echo '<div class="table-responsive">
                                <table class="table">
                                <thead>
                                <tr class="info">
                                <th class="info text-center" colspan="2"><button class="btn btn-default btn-sm pull-right question-back">Back</button>Question Paper</th>
                                </tr>
                                </thead><tbody>';
                            foreach ($questions as $key => $question) {
                                echo '<tr>'
                                . "<td class='info'><span class='qpoint'>Q " . ($key + 1) . "</span></td>"
                                . "<td>" . $question['question_text'] . "</td>"
                                . '</tr>';
                            }
                            echo '</tbody>
                                <tfoot>
                                <tr class="info">
                                <th class="info text-center" colspan="2"><button class="btn btn-default btn-sm question-back">Back</button></th>
                                </tr>
                                </tfoot>
                                </table>
                                </div>';
                            ?>
                        </div>
                    </div>
                    <!--question paper end-->
                    <!--quiz-title-->
                    <div class="row text-center">
                        <h4><?php echo $quiz_detail->name; ?></h4>
                    </div>
                    <!--quiz-title end-->
                    <!--quiz-topbtn-->
                    <div class="row border-black">
                        <form>
                            <?php
                            $cat_detail = get_category_details($questions, $category);
//                            var_dump($cat_detail);
//                            die;
                            foreach ($cat_detail as $value) {
                                echo '<button class = "btn btn-sm btn-primary text-uppercase btn-category" type = "button" id = "' . $value['first_question'] . '">' . $value['name'] . '</button>';
                            }
                            ?>
                        </form>
                    </div>
                    <form action = "<?php echo base_url() . 'submit/quiz'; ?>" method = "POST">
                        <input type="hidden" name="quiz_id" value = "<?php echo $quiz_detail->id; ?>">
                        <input type="hidden" name="start_time" value = "<?php echo date('Y-m-d H:i:s'); ?>">
                        <input type="hidden" name="user_id" value = "<?php echo $_SESSION['user_id']; ?>">
                        <input type="hidden" name="client_time_taken" value = "">
                        <input type="hidden" name="id" value = "<?php echo $quiz_result_id ?>">
                        <!--quiz-topbtn end-->
                        <!--quiz-question-main-->
                        <?php insert_question($questions, $options, $category); ?>
                        <!--quiz-question-main end-->
                        <button id="quizsubmit" type="submit" style="display:none">Submit</button>
                    </form>
                </section>
                <!--quiz-content-main end-->
                <!--quiz-pallet-->
                <aside class="col-md-3">
                    <!--Question pallet timing & contestant name-->
                    <div class="row">
                        <p><strong>Time Remaining : <span class="countdown-row countdown-amount" id="timer1"></span> minutes</strong></p>
                        <p class="text-uppercase"><strong><?php echo $_SESSION['user_name']; ?></strong></p>
                    </div>
                    <!--Question pallet timing & contestant name end-->
                    <div class="row">
                        <!-- question-palet-region start -->
                        <div id="question-palet" class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Question Palette</h3>
                            </div>
                            <!-- panel-body -->
                            <div class="panel-body">
                                <!--btn row -->
                                <div class="row">
                                    <?php inject_panel_buttons($questions); ?>
                                </div>
                                <!--btn row end-->

                            </div>
                            <!-- panel-body end-->
                            <!-- panel-footer -->
                            <div class="panel-footer">
                                <h5>Legend :</h5>
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-5 col-lg-6"><button type="button" class="btn btn-answered btn-dummy"></button><small>Answered</small></div>
                                    <div class="col-xs-6 col-sm-6 col-md-5 col-lg-6"><button type="button" class="btn btn-not-answered btn-dummy"></button><small>Not Answered</small></div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-5 col-lg-6"><button type="button" class="btn btn-marked btn-dummy"></button><small>Marked</small></div>
                                    <div class="col-xs-6 col-sm-6 col-md-5 col-lg-6"><button type="button" class="btn btn-custom btn-dummy"></button><small>Not Visited</small></div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><button type="button" class="btn btn-answered-marked btn-dummy"><span class="fa fa-check"></span></button><small>Answered &amp; Marked for Review</small></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <form class="form-inline">
                                            <div class="form-group">
                                                <label for="filter-button">Filter :</label>
                                                <select id="filter-button" class="form-control input-sm">
                                                    <option value="all">All</option>
                                                    <option value="answered">Answered</option>
                                                    <option value="not-answered">Not Answered</option>
                                                    <option value="marked">Marked</option>
                                                    <option value="not-visited">Not Visited</option>
                                                    <option value="answered-marked">Answered &amp; Marked</option>
                                                </select>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="row text-center function-btn-section">
                                    <div class="col-md-6 show-grid"><button class="btn btn-sm btn-primary" id="paper" type="button">Question Paper</button></div>
                                    <div class="col-md-6 show-grid"><button class="btn btn-sm btn-primary" id="instruction" type="button">Instruction</button></div>
                                    <div class="col-md-6 show-grid"><button class="btn btn-sm btn-primary" id="profile" type="button">Profile</button></div>
                                    <div class="col-md-6 show-grid"><button class="btn btn-sm btn-primary" id="submit" type="button">Submit</button></div>
                                </div>
                            </div>
                            <!-- panel-footer end -->
                        </div>
                        <!-- end question-palet-region -->
                    </div>
                </aside>
                <!--quiz-pallet end-->
            </div><!-- end bigCallout-->

            <!-- End Content and Sidebar
   ===================================================== -->
        </div><!-- end main -->

        <!-- Footer
===================================================== -->
        <footer id="footer">
            <div class="container">
                <div id="copy_right" class="col-md-12">
                    &copy; by Skillcrop Pvt. Ltd. | All Rights Reserved. | Disclaimer<br>
                    Powered by <a href="http://www.lexiconconsultants.com/" id="myToolTip" data-toggle="tooltip" data-placement="top" title="Lexicon Consultants Pvt. Ltd.">Lexicon Consultants Pvt. Ltd.</a>
                </div>
            </div>
        </footer>

        <!-- End Footer
===================================================== -->
        <!-- JS section
===================================================== -->
        <script type="text/javascript">
            var noOfQuestions = <?php echo sizeof($questions); ?>;
            var currentquestion = 1;
            var first_category_button_id = <?php echo $cat_detail[0]['first_question']; ?>;

            //
            function switchQuestion(id) {
                currentquestion = id;
                if (((!$("#q-button" + currentquestion).hasClass("btn-answered")) && (!$("#q-button" + currentquestion).hasClass("btn-marked")) && (!$("#q-button" + currentquestion).hasClass("btn-answered-marked")))) {
                    $("#q-button" + currentquestion).removeClass("btn-answered btn-marked btn-answered-marked");
                    $("#q-button" + currentquestion).addClass("btn-not-answered");
                }

                $(".questions").hide();
                $("#question-" + currentquestion).show();
                if (currentquestion == noOfQuestions) {
                    $('.next-button').attr('disabled', 'disabled');
                } else {
                    $('.next-button').removeAttr('disabled');
                }
            }

            function time_out() {
                alert('Time out !');
//                var wait = setInterval(function () {
//                    $("#submit").trigger("click");
//                }, 50000);

                $("#submit").trigger("click");
            }

            function fill_quiz_data() {
                $(".questions").each(function () {
                    var qid = parseInt($(this).attr("id").substring(9));
                    if (($("#q-button" + qid).hasClass("btn-marked")) || ($("#q-button" + qid).hasClass("btn-answered-marked"))) {
                        $("#marked-" + qid).val(1);
                    }
                    if (($("#q-button" + qid).hasClass("btn-answered")) || ($("#q-button" + qid).hasClass("btn-answered-marked"))) {
                        $("#answered-" + qid).val(1);
                    }
                    if (($("#q-button" + qid).hasClass("btn-marked")) || ($("#q-button" + qid).hasClass("btn-answered-marked")) || ($("#q-button" + qid).hasClass("btn-answered")) || ($("#q-button" + qid).hasClass("btn-not-answered"))) {
                        $("#visited-" + qid).val(1);
                    }
                    //alert(parseInt(substr($(this).attr("id"), 9))); $("#visited-" + qid).val(1);
                });
            }

            function get_seconds(time_str) {
                var time_parts = time_str.split(":");

                time_parts[0] = (typeof time_parts[0] === 'undefined') ? 0 : time_parts[0];
                time_parts[1] = (typeof time_parts[1] === 'undefined') ? 0 : time_parts[1];
                time_parts[2] = (typeof time_parts[2] === 'undefined') ? 0 : time_parts[2];

                var startTime = (parseInt(time_parts[0]) * 3600) + (parseInt(time_parts[1]) * 60) + (parseInt(time_parts[2]));
                return startTime;
            }

            function secondsTimeSpanToHMS(s) {
                var h = Math.floor(s / 3600); //Get whole hours
                s -= h * 3600;
                var m = Math.floor(s / 60); //Get remaining minutes
                s -= m * 60;
                return h + ":" + (m < 10 ? '0' + m : m) + ":" + (s < 10 ? '0' + s : s); //zero padding on minutes and seconds
            }



            $(document).ready(function () {
                var time_limit = "<?php echo $quiz_detail->time_limit; ?>";
                var timer_time = get_seconds(time_limit);
                var date_time = new Date($.now());
                date_time.setSeconds(date_time.getSeconds() + timer_time);
                $("#timer1").countdown({until: date_time, onExpiry: time_out, compact: true, format: 'dHMS'});
                //                $('#myToolTip').tooltip();
                $(".q-button").click(function () {
                    var button_id = $(this).attr("id");
                    var number = parseInt(button_id.substring(8));
                    switchQuestion(number);
                });




                $(".mark").click(function () {
                    if (($("#q-button" + currentquestion).hasClass("btn-answered")) || ($("#q-button" + currentquestion).hasClass("btn-not-answered"))) {
                        if ($("#q-button" + currentquestion).hasClass("btn-answered")) {//answered
                            $("#q-button" + currentquestion).removeClass("btn-answered btn-marked btn-answered-marked btn-not-answered");
                            $("#q-button" + currentquestion).addClass("btn-answered-marked");
                            $("#q-button" + currentquestion).find(".tick").addClass("fa-check");
                        } else {//btn-not-answered
                            $("#q-button" + currentquestion).removeClass("btn-answered btn-marked btn-answered-marked btn-not-answered");
                            $("#q-button" + currentquestion).addClass("btn-marked");
                        }
                    } else {//already marked
                        if ($("#q-button" + currentquestion).hasClass("btn-marked")) {//not answered
                            $("#q-button" + currentquestion).removeClass("btn-answered btn-marked btn-answered-marked btn-not-answered");
                            $("#q-button" + currentquestion).addClass("btn-not-answered");
                        } else {//btn-answered-marked
                            $("#q-button" + currentquestion).removeClass("btn-answered btn-marked btn-answered-marked btn-not-answered");
                            $("#q-button" + currentquestion).addClass("btn-answered");
                            $("#q-button" + currentquestion).find(".tick").removeClass("fa-check");
                        }
                    }

                    $("#question-" + currentquestion).find(".mark").text(function (i, text) {
                        return text === 'Mark For Review & Next' ? 'Unmark & Next' : 'Mark For Review & Next';
                    });
                });

                $(".next-button").click(function () {
                    switchQuestion(currentquestion + 1);
                });

                $(".input").change(function () {
                    if ($(this).prop("checked")) {//option select
                        if ($("#q-button" + currentquestion).hasClass("btn-marked")) {
                            $("#q-button" + currentquestion).removeClass("btn-answered btn-marked btn-answered-marked btn-not-answered");
                            $("#q-button" + currentquestion).addClass("btn-answered-marked");
                            $("#q-button" + currentquestion).find(".tick").addClass("fa-check");
                        } else {
                            if ($("#q-button" + currentquestion).hasClass("btn-not-answered")) {
                                $("#q-button" + currentquestion).removeClass("btn-answered btn-marked btn-answered-marked btn-not-answered");
                                $("#q-button" + currentquestion).addClass("btn-answered");
                            }
                        }
                    } else {//checkbox unselected
                        var selectedcount = $("#question-" + currentquestion + " .input:checked").length;
                        if (!parseInt(selectedcount)) {
                            if ($("#q-button" + currentquestion).hasClass("btn-answered-marked")) {//marked
                                $("#q-button" + currentquestion).removeClass("btn-answered btn-marked btn-answered-marked btn-not-answered");
                                $("#q-button" + currentquestion).find(".tick").removeClass("fa-check");
                                $("#q-button" + currentquestion).addClass("btn-marked");
                            } else {//btn-answered(not marked)
                                $("#q-button" + currentquestion).removeClass("btn-answered btn-marked btn-answered-marked btn-not-answered");
                                $("#q-button" + currentquestion).addClass("btn-not-answered");
                            }

                        }
                    }
                });

                $(".clear").click(function () {
                    $("#question-" + currentquestion).find(".input").prop("checked", false);
                    if ($("#q-button" + currentquestion).hasClass("btn-answered")) {
                        $("#q-button" + currentquestion).removeClass("btn-answered btn-marked btn-answered-marked btn-not-answered");
                        $("#q-button" + currentquestion).addClass("btn-not-answered");
                    }
                    if ($("#q-button" + currentquestion).hasClass("btn-answered-marked")) {
                        $("#q-button" + currentquestion).removeClass("btn-answered btn-marked btn-answered-marked btn-not-answered");
                        $("#q-button" + currentquestion).addClass("btn-marked");
                        $("#q-button" + currentquestion).find(".tick").removeClass("fa-check");
                    }
                });

                $("#submit").click(function () {
                    var remaining_time = $("#timer1 span").html();
                    remaining_time = get_seconds(remaining_time);
                    var time_limit = "<?php echo $quiz_detail->time_limit; ?>";
                    time_limit = get_seconds(time_limit);
                    var client_time_taken = (time_limit - remaining_time);
                    client_time_taken = secondsTimeSpanToHMS(client_time_taken);
                    // alert(client_time_taken);

                    $('input[name="client_time_taken"]').val(client_time_taken);
                    //alert(time);
                    fill_quiz_data();
                    $("#quizsubmit").trigger("click");
                });

                $(".btn-category").click(function () {
                    // alert($(this).attr('id'));
                    $(".btn-category").removeClass("btn-default");
                    $(".btn-category").addClass("btn-primary");
                    $(this).removeClass("btn-primary");
                    $(this).addClass("btn-default");
                    switchQuestion(parseInt($(this).attr('id')));
                });

                $("#filter-button").change(function () {
                    switch ($(this).val()) {
                        case "all":
                            $(".q-button").show();
                            break;
                        case "answered":
                            $(".q-button").css('display', 'none');
                            $(".btn-answered").show();
                            break;
                        case "not-answered":
                            $(".q-button").css('display', 'none');
                            $(".btn-not-answered").show();
                            break;
                        case "marked":
                            $(".q-button").css('display', 'none');
                            $(".btn-marked").show();
                            break;
                        case "not-visited":
                            $(".q-button").show();
                            $(".q-button.btn-answered").css('display', 'none');
                            $(".q-button.btn-not-answered").css('display', 'none');
                            $(".q-button.btn-marked").css('display', 'none');
                            $(".q-button.btn-answered-marked").css('display', 'none');
                            break;
                        case "answered-marked":
                            $(".q-button").css('display', 'none');
                            $(".btn-answered-marked").show();
                            break;
                        default:
                    }
                });

                $('#paper').click(function () {
                    $("#question-paper").show();
                });

                $('.question-back').click(function () {
                    $("#question-paper").hide();
                });

                $("#" + first_category_button_id).trigger("click");
            });

        </script>
        <!-- end JS section
===================================================== -->
    </body>
</html>