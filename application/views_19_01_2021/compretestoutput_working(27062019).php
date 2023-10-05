<?php
if (!$_SESSION['user_id']) {
    $this->load->view('slider_view');
}
?>


<?php
$total_question = 0;
$total_answered = 0;
$TOTAL_MAX_MARKS = 0;
$TOTAL_MARKS_OBTAINED = 0;
$total_correct_answer = 0;


foreach ($category as $key => $answer) {

    $total_question = $total_question + $answer['no_of_question'];
    $total_answered = $total_answered + $answer['answer'];
    $total_correct_answer = $total_correct_answer + $answer['correct'];

    //===============find all questions related to quiz and category=====================
    $filter4[0]['id'] = "quiz_id";
    $filter4[0]['value'] = $quiz_id;
    $filter4[1]['id'] = "category";
    $filter4[1]['value'] = $key;

    $req_field = array("*");
    $each_cat_quest = $this->main_model->get_many_records("questions", $filter4, $req_field);

    $cat_total_marks = 0;
    $total_marks_obtained = 0;
    $total_marks_obtained += $answer['correct'];

    foreach ($each_cat_quest as $key_q => $q_value) {
        $cat_total_marks += $q_value['question_weight'];
    }

//=============End find all questions related to quiz and category===========
    $TOTAL_MAX_MARKS += $cat_total_marks;
    $TOTAL_MARKS_OBTAINED += $total_marks_obtained;
}
$name = $this->main_model->get_name_from_id('quiz', 'name', $quiz_id, 'id');
?>


<?php
//===========Calling functions from the controller======
$CI = & get_instance();
$markscandidate = $CI->candidatemarks($quiz_id);
$avgcity = $CI->overallscorecity($quiz_id);
$avgclg = $CI->overallscorecollege($quiz_id);
$avgstate = $CI->overallscorestate($quiz_id);
$avgnational = $CI->overallscorenation($quiz_id);
$submarks = $CI->subnodeslist($quiz_id);
$wq = $CI->wrongquestions($quiz_id);

//Counting the index of overall marks array
$i = count($submarks);
?>
<!--=================Calling functions from the controller==============-->
<font color=""></h3></font>
<h5><b>Assessment Score <?php echo $TOTAL_MARKS_OBTAINED; ?><font color=""></h5></b></font><hr>
    <h4>Test Name <?php echo str_repeat("&nbsp;", 50) ?>: <?php echo str_repeat("&nbsp;", 40) . $name; ?><font color=""></font></h4><hr>
    <h4>Total Questions <?php echo str_repeat("&nbsp;", 42) ?>: <?php echo str_repeat("&nbsp;", 40) . $total_question; ?><font color=""></font></h4><hr>
    <h4>Correct Answers <?php echo str_repeat("&nbsp;", 40) ?>: <?php echo str_repeat("&nbsp;", 40) . $total_correct_answer; ?><font color=""></font></h4><hr>
    <h4>Wrong Answers <?php echo str_repeat("&nbsp;", 41) ?>: <?php echo str_repeat("&nbsp;", 40) . $wq; ?><font color=""></font></h4><hr>
    <h4>Maximum Marks <?php echo str_repeat("&nbsp;", 40) ?>: <?php echo str_repeat("&nbsp;", 40) . $TOTAL_MAX_MARKS; ?><font color=""></font></h4><hr>
    <h4>Marks Obtained % <?php echo str_repeat("&nbsp;", 37) ?>: <?php echo str_repeat("&nbsp;", 40) . $TOTAL_MARKS_OBTAINED; ?><font color=""></font></h4><hr>
    <h4>Negative Marking <?php echo str_repeat("&nbsp;", 39) ?>: <?php echo str_repeat("&nbsp;", 40) . 'Nil'; ?><font color=""></font></h4><hr><br>
    <h5><u><b>Comparative Performance College, City, State and National Level</b></u></h5>


    <!--Google chart code for forming a bar graph-->
    <script type = "text/javascript" src = "https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

        google.charts.load("current", {packages: ['corechart', 'bar']});
        google.charts.setOnLoadCallback(drawChart);



//#6495ed ->Blue colour
        function drawChart() {
            var data1 = google.visualization.arrayToDataTable([
                ['Type', 'Assessment Score', {role: 'style'}],
                ['Candidate', parseInt('<?php echo $TOTAL_MARKS_OBTAINED ?>'), 'color: #6495ed'],
                ['College', parseInt('<?php echo $avgclg ?>'), 'color: #6495ed'],
                ['City', parseInt('<?php echo $avgcity ?>'), 'color: #6495ed'],
                ['State', parseInt('<?php echo $avgstate ?>'), 'color: #6495ed'],
                ['National', parseInt('<?php echo $avgnational ?>'), 'color: #6495ed']
            ]);

            var data2 = google.visualization.arrayToDataTable([
                ["Object", "Assessment Score", {role: "style"}],

<?php
$total_question1 = 0;
$total_answered1 = 0;

foreach ($category as $key_cat => $answer) {
    $cat_name = $this->main_model->get_name_from_id('category', 'name', $key_cat);
    $total_question1 = $total_question1 + $answer['no_of_question'];
    $total_answered1 = $total_answered1 + $answer['answer'];

//-------------find all questions related to quiz and category
    $filter4[0]['id'] = "quiz_id";
    $filter4[0]['value'] = $quiz_id;
    $filter4[1]['id'] = "category";
    $filter4[1]['value'] = $key_cat;
    $req_field = array("*");
    $each_cat_quest = $this->main_model->get_many_records("questions", $filter4, $req_field);


    $cat_total_marks = 0;

    $total_marks_obtained = 0;
    $total_marks_obtained += $answer['correct'];

    foreach ($each_cat_quest as $key_q => $q_value) {

        $cat_total_marks += $q_value['question_weight'];
    }
    $percentage = round((($total_marks_obtained / $cat_total_marks) * 100), 2);


//=========================Topic wise marks bar chart graph========================
    if ($percentage > 75) {
        //Green colour#54803f
        echo '["' . $cat_name . '", ' . $percentage . ',"#54803f"],';
        //Red colour#ff001b
    } elseif (($percentage >= 51) && ($percentage <= 75)) {
        echo '["' . $cat_name . '", ' . $percentage . ',"#ffbb39"],';
        //Yellow colour#ffbb39
    } else {
        echo '["' . $cat_name . '", ' . $percentage . ',"#ff001b"],';
    }
    $overall_sum += $percentage;
}



if (!empty($submarks['cat_total'])) {
    $cat_total = $submarks['cat_total'];
    $TOTAL_PERCENTAGE2 = round($overall_sum / $cat_total);
}

if ($TOTAL_PERCENTAGE2 > 75) {
    echo '["Overall Score", ' . $TOTAL_PERCENTAGE2 . ',"#548235"],';
} elseif (($TOTAL_PERCENTAGE2 >= 51) && ($TOTAL_PERCENTAGE2 <= 75)) {
    echo '["Overall Score", ' . $TOTAL_PERCENTAGE2 . ',"#ffc006"],';
} else {
    echo '["Overall Score", ' . $TOTAL_PERCENTAGE2 . ',"#ff0400"],';
}
?>]);

            var view1 = new google.visualization.DataView(data1);
            var view2 = new google.visualization.DataView(data2);


            view1.setColumns([0, 1,
                {
                    calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation"},
                2]);


            view2.setColumns([0, 1,
                {
                    calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation"},
                2]);


            var options1 = {
                title: '<?php echo $name ?> Overall Score',
                width: 550,
                height: 350,
                legend: {position: 'none'},
                theme: 'material',
                bar: {groupWidth: '75%'},
                hAxis: {
                    titleTextStyle: {fontSize: 2},
                    slantedText: true,
                    slantedTextAngle: 90,
                },
            };


            var options2 = {
                title: 'Topic wise Analysis for both Aptitude as well as Domain',
                width: 550,
                height: 350,
                legend: {position: 'none'},
                theme: 'material',
                bar: {groupWidth: '75%'},
                hAxis: {
                    titleTextStyle: {fontSize: 2},
                    slantedText: true,
                    slantedTextAngle: 90,
                },
            };


            var chart1 = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
            chart1.draw(view1, options1);
            var chart2 = new google.visualization.ColumnChart(document.getElementById("columnchart_valuess"));
            chart2.draw(view2, options2);
        }
    </script>


    <div id="columnchart_values" style="width: 900px; height: 300px;"></div><br><br><br>
    <h5><b><u>Topic wise Analysis for both Aptitude as well as Domain(Comprehensive Tests)</u></b></h5>
    <div id="columnchart_valuess" style="width: 900px; height: 300px;"></div><br><br>



    <h5><font color=""></font></h5>
    <div class = "row top-margin">
        <div class = "col-md-12 top-margin">
            <div class = "table-responsive">
                <table width="100%">
                    <tr style="height:10;">
                        <td style="background-color:#54803f;color:white;font-size:20px;"><strong><?php echo $name ?> Overall Score <?php echo $TOTAL_PERCENTAGE2 ?> %</strong></td>
                    </tr>
                </table>
                <br>
                <table class = "table table-bordered" id = "">
                    <tbody>
                        <tr>
                            <td class = "col-md-4"><span style="color:#54803f;text-align:center;">More Than 75%</span></td>
                            <td class = "col-md-8">Congratulations!You display good efficiency in Promoter Assessment Areas. Please refer to the Learning Board below to read about various Promoter Assessment Areas</td>
                        </tr>
                        <tr>
                            <td class = "col-md-4"><span style="color:#ffbb39;text-align:center;">51 - 75 %</span></td>
                            <td class = "col-md-8">You display some traits of these Promoter Assessment Areas but there is scope for improvement.Please refer to the Learning Board below to read about various Promoter Assessment Areas</td>
                        </tr>
                        <tr>
                            <td class = "col-md-4"><span style="color:#ff001b;text-align:center;">50% or less</span></td>
                            <td class = "col-md-8">You have immense opportunity in improving your effectiveness in Promoter Assessment Areas. Please refer to the Learning Board below to read about various Promoter Assessment Areas</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class = "row top-margin">
        <div class = "col-md-12 top-margin">
            <table width="100%">
                <tr style="height:40;">
                    <td style="background-color:#54803f;color:white;font-size:20px;"><strong><?php echo $name ?> Topic wise Analysis </strong></td>
                </tr>
            </table>
            <br>
            <div class = "table-responsive">
                <table class = "table table-bordered" id = "">
                    <tbody>

                        <tr>
                            <td class = "col-md-4"><span style="color:#54803f;text-align:center;">More Than 75%<br>Practice Recommended</span></td>
                            <td class = "col-md-8"><?php
                                foreach ($submarks['category'] as $value) {
                                    //============If marks is greater than 75================
                                    if ($percentage > 75) {
                                        echo $value['category_name'];
                                        echo ",";
                                    }
                                }
                                ?></td>
                        </tr>


                        <tr>
                            <td class = "col-md-4"><span style="color:#ffbb39;text-align:center;">51-75 %<br>Rigorous Practice Recommended</span></td>
                            <td class = "col-md-8"><?php
                                foreach ($submarks['category'] as $value) {
                                    //===========If marks is greater than or equal to 51 and less than or equal to 75==========
                                    if ($percentage >= 51 && $percentage <= 75) {
                                        echo $value['category_name'];
                                        echo ",";
                                    }
                                }
                                ?></td>
                        </tr>


                        <tr>
                            <td class = "col-md-4"><span style="color:#ff001b;text-align:center;">50% or less<br>Indepth Study & Rigorous Practice Recommended</span></td>
                            <td class = "col-md-8"><?php
                                foreach ($submarks['category'] as $value) {
                                    //=============If marks is less than or equal to 50================
                                    if ($percentage <= 50) {
                                        echo $value['category_name'];
                                        echo ",";
                                    }
                                }
                                ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <h5><a href="<?php echo(base_url() . 'quiz/result/' . $quiz_id); ?>">View Full Assessment with Solutions</a></h5>

