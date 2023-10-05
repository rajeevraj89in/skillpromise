<?php
$this->load->view('header_view');
if (!$_SESSION['user_id']) {
    $this->load->view('slider_view');
}
?>

<div class="container">
    <?php
    $total_question = 0;
    $total_answered = 0;
    $TOTAL_MAX_MARKS = 0;
    $TOTAL_MARKS_OBTAINED = 0;
    $total_correct_answer = 0;
	$TOTAL_PERCENTAGE2 = 0;
    
    foreach ($category as $key => $answer) {
        $total_question = $total_question + $answer['no_of_question'];
        $total_answered = $total_answered + $answer['answer'];
        $total_correct_answer = $total_correct_answer + $answer['correct'];
        //-----------find all questions related to quiz and category
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
        $percentage = round((($total_marks_obtained / $cat_total_marks) * 100), 2);

        //------------end-find all questions related to quiz and category
        $TOTAL_MAX_MARKS += $cat_total_marks;
        $TOTAL_MARKS_OBTAINED += $total_marks_obtained;
        $TOTAL_PERCENTAGE2 = round((($TOTAL_MARKS_OBTAINED / $TOTAL_MAX_MARKS) * 100), 2);
    }

//    echo '<pre>';
//    print_r($total_marks_obtained);
//    die;

    $quiz_id = $this->uri->segment(3);
    $name = $this->main_model->get_name_from_id('quiz', 'name', $quiz_id, 'id');
    ?>


    <?php
//===============Calling functions from the controller=============
    $CI = & get_instance();
    $avgcity = $CI->overallscorecity($quiz_id);
    $avgclg = $CI->overallscorecollege($quiz_id);
    $avgstate = $CI->overallscorestate($quiz_id);
    $avgnational = $CI->overallscorenation($quiz_id);
    $submarks = $CI->subnodeslist($quiz_id);
    $markscandidate = $CI->candidatemarks($quiz_id);
    $wq = $CI->wrongquestions($quiz_id);


//Counting the index of overall marks array
    $i = count($submarks);
//    echo '<pre>';
//    print_r($submarks);
//    die;
    ?>
    <!--====================Calling functions from the controller==============-->
    <font color=""></h3></font>
    <div class="row">
        <div class="col-md-4">
            <h5><b>Assessment Score <?php echo $TOTAL_PERCENTAGE2; ?> %<font color=""></h5></b></font></div>
        <div class="col-md-4 col-md-offset-4">
            <h5><a href="<?php echo(base_url() . 'quiz/result/' . $quiz_id); ?>" class="btn btn-primary" role="button" style="border-radius: 0px;">
                    View Answers with Solutions
                </a></h5>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <table width="100%">
                <tr>
                    <td width="40%"><h5>Test Name </h5></td>
                    <td width="30%"> :  </td>
                    <td width=""><?php echo $name; ?></td>
                </tr>
                <tr>
                    <td width="40%"><h5>Total Questions </h5></td>
                    <td width="30%"> :  </td>
                    <td width=""><?php echo $total_question; ?></td>
                </tr>
                <tr>
                    <td width="40%"><h5>Correct Answers </h5></td>
                    <td width="30%"> :  </td>
                    <td width=""><?php echo $total_correct_answer; ?></td>
                </tr>
                <tr>
                    <td width="40%"><h5>Wrong Answers </h5></td>
                    <td width="30%"> :  </td>
                    <td width=""><?php echo $wq; ?></td>
                </tr>
                <tr>
                    <td width="40%"><h5>Maximum Marks </h5></td>
                    <td width="30%"> :  </td>
                    <td width=""><?php echo $TOTAL_MAX_MARKS; ?></td>
                </tr>
                <tr>
                    <td width="40%"><h5>Marks Obtained </h5></td>
                    <td width="30%"> :  </td>
                    <td width=""><?php echo $TOTAL_MARKS_OBTAINED; ?></td>
                </tr>
                 <tr>
                    <td width="40%"><h5>Marks Obtained % </h5></td>
                    <td width="30%"> :  </td>
                    <td width=""><?php echo $TOTAL_PERCENTAGE2; ?>%</td>
                </tr>
                <tr>
                    <td width="40%"><h5>Negative Marking </h5></td>
                    <td width="30%"> :  </td>
                    <td width=""><?php echo 'Nil'; ?></td>
                </tr>
            </table>
        </div>
    </div>
    <br><br>
    <!--        <h5><u><b>Comparative Performance College, City, State and National Level</b></u></h5>-->




    <!--Google chart code for forming a bar graph-->
    <script type = "text/javascript" src = "https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

        google.charts.load("current", {packages: ['corechart', 'bar']});
        google.charts.setOnLoadCallback(drawChart);


        function drawChart() {

            //                var data1 = google.visualization.arrayToDataTable([
            //                    ['Type', 'Assessment Score', {role: 'style'}],
            //                    ['Candidate', parseInt('<?php echo $TOTAL_MARKS_OBTAINED ?>'), 'color: #6495ed'],
            //                    ['College', parseInt('<?php echo $avgclg ?>'), 'color: #6495ed'],
            //                    ['City', parseInt('<?php echo $avgcity ?>; ?>'), 'color: #6495ed'],
            //                    ['State', parseInt('<?php echo $avgstate ?>'), 'color: #6495ed'],
            //                    ['National', parseInt('<?php echo $avgnational ?>'), 'color: #6495ed']
            //                ]);
            var data2 = google.visualization.arrayToDataTable([
                ["Object", "Assessment Score", {role: "style"}],

<?php
$total_question1 = 0;
$total_answered1 = 0;
$green=$red=$yellow="";
$overall_sum = 0;

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
$green .=$cat_name.",";
        echo '["' . $cat_name . '", ' . $percentage . ',"#54803f"],';
//Red colour#ff001b
    } elseif (($percentage >= 51) && ($percentage <= 75)) {
        $yellow .=$cat_name.",";
        echo '["' . $cat_name . '", ' . $percentage . ',"#ffbb39"],';
//Yellow colour#ffbb39
    } else {
        $red .=$cat_name.",";
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

            //                var view1 = new google.visualization.DataView(data1);
            var view2 = new google.visualization.DataView(data2);


            //                view1.setColumns([0, 1,
            //                    {
            //                        calc: "stringify",
            //                        sourceColumn: 1,
            //                        type: "string",
            //                        role: "annotation"},
            //                    2]);


            view2.setColumns([0, 1,
                {
                    calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation"},
                2]);

            //                var options1 = {
            //                    title: '<?php echo $name ?> Overall Score',
            //                    width: 550,
            //                    height: 350,
            //                    legend: {position: 'none'},
            //                    theme: 'material',
            //                    bar: {groupWidth: '75%'},
            //                    hAxis: {
            //                        titleTextStyle: {fontSize: 2},
            //                        slantedText: true,
            //                        slantedTextAngle: 90,
            //                    },
            //                };

            var options2 = {
               // title: '<?php echo $name ?> Overall Score <?php echo $TOTAL_PERCENTAGE2 ?>% ',
				title: '',
               // width: 550,
                //height: 350,
                legend: {position: 'none'},
                theme: 'material',
                bar: {groupWidth: '75%'},
                hAxis: {
                    //titleTextStyle: {fontSize: 2},
                    //slantedText: true,
                    slantedTextAngle: 90,
                },
            };

            //                var chart1 = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
            //                chart1.draw(view1, options1);
            var chart2 = new google.visualization.ColumnChart(document.getElementById("columnchart_valuess"));
            chart2.draw(view2, options2);
        }
    </script>


    <!--        <div id="columnchart_values" style="width: 900px; height: 300px;"></div><br><br><br>-->
    <h5 class="quickpanelhead quiz_head"><?php echo $name ?> Graphical Analysis</h5>
    <div id="columnchart_valuess" style="height: 900px;"></div><br><br>


    <h5><font color=""></font></h5>
    <div class = "row top-margin_">
        <div class = "col-md-12 top-margin">
            <table width="100%">
                <tr>
                    <td class="quickpanelhead quiz_head"><?php echo $name ?> Marks Obtained <?php echo $TOTAL_PERCENTAGE2 ?>%</td>
                </tr>
            </table>
            <br>
            <div class = "table-responsive">
                <table class = "table table-bordered" id = "">
                    <tbody>
					 <tr>
                        <td class = "col-md-4"><span style="color:#54803f;text-align:center;">More Than 75%</span></td>
                        <td class = "col-md-8 text-justify">Congratulations! You have good understanding of the Subject. Skillpromise recommends that in order to maintain your effectiveness keep revising and practicing the topics where your score is more than 75%. Do rigorous practice of topics where your score is between 51 - 75%. Do indepth study and rigorous practice of topics where you have scored less than 50%</td>
                    </tr>
                    <tr>
                        <td class = "col-md-4"><span style="color:#ffbb39;text-align:center;">51 - 75 %</span></td>
                        <td class = "col-md-8 text-justify">You are good in some topics of this Subject but there is scope for improvement. Skillpromise recommends that keep revising and practicing the topics where your score is more than 75%. Do rigorous practice of topics where your score is between 51 - 75%. Do indepth study and rigorous practice of topics where you have scored less than 50%</td>
                    </tr>
                    <tr>
                        <td class = "col-md-4"><span style="color:#ff001b;text-align:center;">50% or less</span></td>
                        <td class = "col-md-8 text-justify">You have immense opportunity in improving your effectiveness in the Subject. Skillpromise recommends that keep revising and practicing the topics where your score is more than 75%. Do rigorous practice of topics where your score is between 51 - 75%. Do indepth study and rigorous practice of topics where you have scored less than 50%</td>
                    </tr>
                  <!--      <tr>
                            <td class = "col-md-4"><span style="color:#54803f;text-align:center;">More Than 75%</span></td>
                            <td class = "col-md-8">Congratulations! You have good understanding of the subject. Skillpromise recommends you to keep revising and practicing questions on the subject to maintain your effectiveness</td>
                        </tr>
                        <tr>
                            <td class = "col-md-4"><span style="color:#ffbb39;text-align:center;">51 - 75 %</span></td>
                            <td class = "col-md-8">You are good in the subject but there is scope for improvement. Skillpromise recommends you to do rigorous practice to improve your effectiveness in the subject</td>
                        </tr>
                        <tr>
                            <td class = "col-md-4"><span style="color:#ff001b;text-align:center;">50% or less</span></td>
                            <td class = "col-md-8">You have immense opportunity to improve your effectiveness in the subject. Skillpromise recommends you to do in depth study and rigorous practice to improve your effectiveness in the subject</td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>


            <div class = "row">
                <div class = "col-md-12">
                    <table width="100%">
                        <tr>
                            <td class="quickpanelhead quiz_head"><?php echo $name ?> Topic wise Analysis </td>
                        </tr>
                    </table>
                    <br>
                    <div class = "table-responsive">
                       <table class = "table table-bordered" id = "">
                    <tbody>

                    <tr>
                        <td class = "col-md-4"><span style="color:#54803f;text-align:center;">More Than 75%<br>Practice Recommended</span></td>
                        <td class = "col-md-8"><?php echo substr($green, 0, -1);;
                            ?></td>
                    </tr>


                    <tr>
                        <td class = "col-md-4"><span style="color:#ffbb39;text-align:center;">51-75 %<br>Rigorous Practice Recommended</span></td>
                        <td class = "col-md-8"><?php echo substr($yellow, 0, -1);;
                            ?></td>
                    </tr>


                    <tr>
                        <td class = "col-md-4"><span style="color:#ff001b;text-align:center;">50% or less<br>Indepth Study & Rigorous Practice Recommended</span></td>
                        <td class = "col-md-8"> <?php echo substr($red, 0, -1);;
                            ?></td>
                    </tr>
                </tbody>
                        </table>
</div>
</div>
</div>






<?php
$this->load->view('footer_view');
?>
</div>
</div><!-- end main -->
</body>

<?php
$this->load->view('html_end_view');
?>