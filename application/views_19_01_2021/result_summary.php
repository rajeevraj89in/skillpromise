<?php
$this->load->view('header_view');
if (!$_SESSION['user_id']) {
    $this->load->view('slider_view');
}
?>

<head>
    <style>
        .border {
            /*                border-style: solid !important;
                            border-color: black !important;*/
            background-color: #fee84f !important;
        }
        .head1 {
            border-style: solid !important;
            border-color: black !important;
            color : black !important;
            font-size: 16px !important;
        }
        .head2 {
            /*                border-style: solid !important;
                            border-color: black !important;*/
            color : black !important;
            font-size: 14px !important;
        }
        .top{
            background-color:#fefc56 !important;
            border-style: initial !important;
            border-color: black  !important;
            margin-top: 1px !important;
            margin-bottom: 1px !important;
            padding-top: 5px !important;
            padding-bottom: 5px !important;
            color : grey !important;

        }
        .bottom{
            background-color:#757171 !important;
            border-style: initial !important;
            border-color: black  !important;
            margin-top: 1px !important;
            margin-bottom: 1px !important;
            padding-top: 5px !important;
            padding-bottom: 5px !important;
            color : grey !important;
        }
        .bottom a{
            color:white !important;
        }

        .text-center{
            text-align: center;
        }
        .text-right{
            text-align: right;
        }
    </style>
    <!--    <meta charset="utf-8">
        <meta content="IE=edge" http-equiv="X-UA-Compatible">
        <meta content="width=device-width, initial-scale=1" name="viewport">

        <link rel="shortcut icon" href="<?php // echo(base_url() . 'assets/img/');                                                                                      ?>animated_favicon.gif" type="image/x-icon">
        <link rel="icon" href="<?php // echo(base_url() . 'assets/img/');                                                                                      ?>animated_favicon.gif" type="image/x-icon">

        <title>:: Quiz Summary ::</title>
        <link rel="stylesheet" href="<?php // echo(base_url() . 'assets/css/' . 'bootstrap.min.css');                                                                                      ?>" />
        <link rel="stylesheet" href="<?php // echo(base_url() . 'assets/css/' . 'board_quiz.css');                                                                                      ?>" />
        <link rel="stylesheet" href="<?php // echo(base_url() . 'assets/fonts/' . 'font-awesome-4.2.0/css/font-awesome.min.css');                                                                                      ?>" />

        <script src="<?php // echo(base_url() . 'assets/js/' . 'jquery-1.11.1.min.js');                                                                                      ?>"></script>
        <script src="<?php // echo(base_url() . 'assets/js/' . 'bootstrap.min.js');                                                                                      ?>"></script>-->
</head>
<body class="question-palet login">

    <div class="container" id="main">
        <!--            <header>
                        <nav class="navbar navbar-default navbar-fixed-top" id="navBarTop" role="navigation">
                            <div class="container">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                    <a class="navbar-brand" href="index.htm"><img style="height:50px;width:130px" src="<?php echo(base_url() . 'assets/img/' . 'logo.png'); ?>" alt="skillpromise"/></a>
                                </div>

                            </div>nav Container end

        <div class="row" id="bigCallout">
                        </nav> navBarTop end
                    </header>-->

        <div class="row" id="bigCallout">
            <!--quiz-content-main-->
            <section class="col-md-12">
                <h2 class="header_text">Test Layout<font color=""></font></h2>
                <hr>
                <!--quiz-title-->
                <!--                    <div class="row text-center">
                                        <h4>Summary of Section(s) Answered</h4>
                                        <p><?php // echo $quiz_name;                                                                                                                                                                                                                 ?></p>
                                    </div>-->
                <!--quiz-title end-->
                <!--quiz-question-main-->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="info">
                                <th class="info">Topic</th>
                                <th class="info text-center">Questions #</th>
                                <th class="info text-center">Max. Marks</th>
                                <th class="info text-center">Marks Obtained</th>
                                <th class="info text-center">Marks Obtained %</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $total_question = 0;
                            $total_answered = 0;
                            $TOTAL_MAX_MARKS = 0;

//                            echo '<pre>';
//                            print_r($category);
//                            die;
                            $TOTAL_MARKS_OBTAINED = 0;
                            foreach ($category as $key => $answer) {

                                $total_question = $total_question + $answer['no_of_question'];
                                $total_answered = $total_answered + $answer['answer'];


                                //-------------find all questions related to quiz and category
                                $filter4[0]['id'] = "quiz_id";
                                $filter4[0]['value'] = $quiz_id;
                                $filter4[1]['id'] = "category";
                                $filter4[1]['value'] = $key;
                                $req_field = array("*");
                                $each_cat_quest = $this->main_model->get_many_records("questions", $filter4, $req_field);
//                                    echo '<pre>';
//                                    print_r($each_cat_quest);die;
                                $cat_total_marks = 0;

                                $total_marks_obtained = 0;
                                $total_marks_obtained += $answer['correct'];


                                foreach ($each_cat_quest as $key_q => $q_value) {
                                    $cat_total_marks += $q_value['question_weight'];
                                }
                                //------------end-find all questions related to quiz and category
                                $TOTAL_MAX_MARKS += $cat_total_marks;
                                $TOTAL_MARKS_OBTAINED += $total_marks_obtained;

                                echo '<tr>';
                                echo '<td class=" ">' . $answer['name'] . '</td>';
                                echo '<td class="text-center">' . $total_question . '</td>';
                                echo '<td class="text-center">' . $TOTAL_MAX_MARKS . '</td>';
                                echo '<td class="text-center">' . $TOTAL_MARKS_OBTAINED . '</td>';
                                echo '<td class="text-center">' . $percentage = round((($TOTAL_MARKS_OBTAINED / $TOTAL_MARKS_OBTAINED) * 100), 2) . '%' . '</td>';
                                echo '</tr>';
//                                    $percentage1 += $percentage;
//                                    print_r($percentage);
                            }
                            ?>

                        </tbody>
                        <tfoot>
                            <tr class="warning">
                                <th class="warning text-right">Overall Score</th>
                                <th class="warning text-center"><?= $total_question; ?></th>
                                <th class="warning text-center"><?= $TOTAL_MAX_MARKS; ?></th>
                                <th class="warning text-center"><?= $TOTAL_MARKS_OBTAINED; ?></th>
                                <th class="warning text-center"><?= $TOTAL_PERCENTAGE = round((($TOTAL_MARKS_OBTAINED / $TOTAL_MAX_MARKS) * 100), 2); ?>%</th>
                                <!--<th class="warning"><?= $percentage1; ?>%</th>-->

                            </tr>
                        </tfoot>
                    </table>
                </div>


                <div>
                    <h2 class="header_text">Time Taken<font color=""></font></h2><hr>
                    <?php
                    $filter4[0]['id'] = "quiz_id";
                    $filter4[0]['value'] = $quiz_id;
                    $filter4[1]['id'] = "user_id";
                    $filter4[1]['value'] = $_SESSION['user_id'];
                    $req_field = array("*");
                    $quiz_result_id = $this->main_model->get_many_records("quiz_result", $filter4, $req_field);
                    $in_time = ($quiz_result_id[0]["start_time"]);
                    $out_time = ($quiz_result_id[0]["submit_time"]);
                    $new_in = date('H:i:s', strtotime($in_time . '+ 24 hours'));
                    $new_out = date('H:i:s', strtotime($out_time . '+ 24 hours'));
                    $formated_new_in = new DateTime($new_in);
                    $formated_new_out = new DateTime($new_out);
                    $dteDiff = $formated_new_in->diff($formated_new_out);
                    $hour = $dteDiff->format("%H");
                    $min = $dteDiff->format("%i");
                    $sec = $dteDiff->format("%s");
                    echo $updatedata['time_in_minutes'] = floor(($hour * 60) + $min + ($sec / 60)) . " " . "Minutes";
                    ?>

                </div>
                <h2 class="header_text">Test Result Graphical<font color=""></font></h2>
                <hr>
                <!--quiz-question-main end-->
                <!--quiz-bottom-->

                <!--quiz-bottom end-->
            </section>
            <!--quiz-content-main end-->
        </div><!-- end bigCallout-->

        <!-- End Content and Sidebar
===================================================== -->

        <div class="row" id ='columnchart_values'>

        </div><br>

        <h2 class="header_text">Promoter Assessment - Overall Score Analysis<font color=""></font></h2>
        <hr>
        <div class="row top-margin">
            <div class="col-md-12 top-margin">
                <div class="table-responsive">
                    <table class="table table-bordered" id="">
                        <tbody>
                            <tr>
                                <td class="col-md-6">More Than 75%</td>
                                <td class="col-md-6">Congratulations ! You display good efficiency in Promoter Assessment Areas. Please refer to the Learning Board below to read about various Promoter Assessment Areas</td>
                            </tr>
                            <tr>
                                <td class="col-md-6">51 - 75 %</td>
                                <td class="col-md-6">You display some traits of these Promoter Assessment Areas but there is scope for improvement.Please refer to the Learning Board below to read about various Promoter Assessment Areas</td>
                            </tr>
                            <tr>
                                <td class="col-md-6">50% or less</td>
                                <td class="col-md-6">You have immense opportunity in improving your effectiveness in Promoter Assessment Areas. Please refer to the Learning Board below to read about various Promoter Assessment Areas</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <!--            <h2 class="header_text">Learning Board<font color=""></font></h2>
                    <hr><br>-->

        <!-- Learning board Start
<h1>Learning Board</h1>
<hr><br>
<div class="panel panel-default">
<div class="table-responsive" style="">
    <table class="table table-bordered  " style="color: black" id="">
        <thead>
            <tr style="background-color:#e1efdb;">
                <th class="text-center head1" colspan="2">Learning Board</th>
            </tr>
            <tr style="background-color:#fee84f;">
                <th class="text-center head2" colspan="1">Product</th>
                <th class="text-center head2" colspan="1">Skills</th>
            </tr>
            <tr>
                <th class="text-center border" colspan="1"><div class="top col-md-10 col-md-offset-1">L’Oréal Paris Casting Crème Gloss Hair Color</div><br><div class="bottom col-md-10 col-md-offset-1"><a href="<?php echo(base_url() . 'node/program/1763'); ?>">Click here to read more</div></th>
        <th class="text-center border" colspan="1"><div class="top col-md-10 col-md-offset-1">Rapport Building - Properness</div><br><div class="bottom col-md-10 col-md-offset-1"><a href="<?php echo(base_url() . 'node/program/1769'); ?>">Click here to read more</div></th>

        </tr>
        <tr>
            <th class="text-center border" colspan="1"><div class="top col-md-10 col-md-offset-1">Garnier Color Naturals</div><br><div class="bottom col-md-10 col-md-offset-1"><a href="<?php echo(base_url() . 'node/program/1764'); ?>">Click here to read more</div></th>
        <th class="text-center border" colspan="1"><div class="top col-md-10 col-md-offset-1">Rapport Building - Intent</div><br><div class="bottom col-md-10 col-md-offset-1"><a href="<?php echo(base_url() . 'node/program/1770'); ?>">Click here to read more</div></th>
        </tr>
        <tr>
            <th class="text-center border" colspan="1"><div class="top col-md-10 col-md-offset-1">Garnier Face Wash</div><br><div class="bottom col-md-10 col-md-offset-1"><a href="<?php echo(base_url() . 'node/program/1765'); ?>">Click here to read more</div></th>
        <th class="text-center border" colspan="1"><div class="top col-md-10 col-md-offset-1">Rapport Building - Explore Common Ground</div><br><div class="bottom col-md-10 col-md-offset-1"><a href="<?php echo(base_url() . 'node/program/1771'); ?>">Click here to read more</div></th>
        </tr>
        <tr>
            <th class="text-center border" colspan="1"><div class="top col-md-10 col-md-offset-1">Garnier Skin Natural Products</div><br><div class="bottom col-md-10 col-md-offset-1"><a href="<?php echo(base_url() . 'node/program/1766'); ?>">Click here to read more</div></th>
        <th class="text-center border" colspan="1"><div class="top col-md-10 col-md-offset-1">Rapport Building - Tips</div><br><div class="bottom col-md-10 col-md-offset-1"><a href="<?php echo(base_url() . 'node/program/1772'); ?>">Click here to read more</div></th>
        </tr>
        <tr>
            <th class="text-center border" colspan="1"><div class="top col-md-10 col-md-offset-1">Garneir Ultra Blends Shampoo & Conditioner</div><br><div class="bottom col-md-10 col-md-offset-1"><a href="<?php echo(base_url() . 'node/program/1767'); ?>">Click here to read more</div></th>
        <th class="text-center border" colspan="1"><div class="top col-md-10 col-md-offset-1">Selling Skills</div><br><div class="bottom col-md-10 col-md-offset-1"><a href="<?php echo(base_url() . 'node/program/1773'); ?>">Click here to read more</div></th>
        </tr>
        <tr>
            <th class="text-center border" colspan="1"><div class="top col-md-10 col-md-offset-1">Maybelline NY Mass Cosmetics</div><br><div class="bottom col-md-10 col-md-offset-1"><a href="<?php echo(base_url() . 'node/program/1768'); ?>">Click here to read more</div></th>
        <th class="text-center border" colspan="1"></th>
        </tr>
        </thead>
        </tbody>

        </tbody>
    </table>
</div>
</div><br>

Learning board end -->

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load("current", {packages: ['corechart']});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ["Element", "Density", {role: "style"}],
<?php
$i = 0;
$color = array("#5EB712", "#FFC300", "#FFC300", "#5EB712", "#F81717", "#FFC300");


$total_question1 = 0;
$total_answered1 = 0;

foreach ($category as $key_cat => $answer) {
    $eq_name = $this->main_model->get_name_from_id('category', 'name', $key_cat);
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
//    echo $per;


    foreach ($each_cat_quest as $key_q => $q_value) {
        $cat_total_marks += $q_value['question_weight'];
    }

    $percentage = round((($total_marks_obtained / $cat_total_marks) * 100), 2);

//    $percentage = 51;


    if ($percentage > 75) {
        echo '["' . $eq_name . '", ' . $percentage . ',"#548235"],';
    } elseif ($percentage < 51) {
        echo '["' . $eq_name . '", ' . $percentage . ',"#ff0400"],';
    } else {
        echo '["' . $eq_name . '", ' . $percentage . ',"#ffc006"],';
    }

//if (isset($color[$i])) {
//    echo '["' . $eq_name . '", ' . $percentage . ',"' . $color[$i] . '"],';
//    } else {
//      echo '["' . $eq_name . '", ' . $percentage . ',"purple"],'; //set static color if not found in array
//    }
    $i++;
}


$TOTAL_PERCENTAGE2 = round((($TOTAL_MARKS_OBTAINED / $TOTAL_MAX_MARKS) * 100), 2);

if ($TOTAL_PERCENTAGE2 > 75) {
    echo '["Overall Score", ' . $TOTAL_PERCENTAGE2 . ',"#548235"],';
} elseif ($TOTAL_PERCENTAGE2 < 51) {
    echo '["Overall Score", ' . $TOTAL_PERCENTAGE2 . ',"#ff0400"],';
} else {
    echo '["Overall Score", ' . $TOTAL_PERCENTAGE2 . ',"#ffc006"],';
}

//$TOTAL_PERCENTAGE2 = $percentage1;
//echo '["Overall Score", ' . $TOTAL_PERCENTAGE2 . ',"#FFC300"],';
?>
                ]);

                var view = new google.visualization.DataView(data);
                view.setColumns([0, 1,
                    {calc: "stringify",
                        sourceColumn: 1,
                        type: "string",
                        role: "annotation"},
                    2]);

                var options = {
                    title: "Promoter Assessment",
                    left: 100, top: 0, height: 330, width: 1152,
                    bar: {groupWidth: '40%'},
                    legend: {position: 'none'},
                    hAxis: {showTextEvery: 0, slantedText: false, textStyle: {color: 'white'}},
                    vAxis: {
                        textStyle: {color: 'white'}
                    },
                    titleTextStyle: {color: 'white'},
                    backgroundColor: '#535353',
                    annotations: {alwaysOutside: true},
                };

                var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
                google.visualization.events.addListener(chart, 'ready', Title_center);
                chart.draw(view, options);

            }
            function Title_center() {
                var title_chart = $("#columnchart_values svg g").find('text').html();
                $("#columnchart_values svg").find('g:first').html('<text fill="#ffffff" stroke-width="0" stroke="none" font-weight="bold" font-size="14" font-family="Arial" y="37.9" x="500" text-anchor="start">' + title_chart + '</text>');
            }
        </script>
        <!--                <div class="row text-center">
                                <a href="<?php // echo(base_url());                                                                                                                                                                                                                ?>" class="btn btn-default"title="">Back</a>
                            </div>-->
        <?php
        $this->load->view('footer_view');
        ?>
    </div><!-- end main -->
</body>

<?php
$this->load->view('html_end_view');
?>

