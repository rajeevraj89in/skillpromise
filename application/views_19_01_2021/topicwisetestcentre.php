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
    <!--    ?>"></script>-->
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


             <div class="row" id="bigCallout">
        <!--quiz-content-main-->


<!--        <section class="col-md-12">-->
        <div class="row">
            <div class="col-md-4">
                <h5 class="">Test Output<font color=""></font></h5>
            </div>
            <div class="col-md-4 col-md-offset-4">
                <h5><a href="<?php echo(base_url() . 'quiz/result/' . $quiz_id); ?>" class="btn btn-primary" role="button" style="border-radius: 0px;">
                        View Assessment with Solutions
                    </a></h5>
            </div>
        </div>
        <!--        </section>-->
        <!--        <hr>
        -->        <br>

        <?php
        $total_question = 0;
        $total_answered = 0;
        $TOTAL_MAX_MARKS = 0;
        $TOTAL_MARKS_OBTAINED = 0;
        $total_correct_answer = 0;
        $TOTAL_PERCENTAGE2=0;

        foreach ($category as $key => $answer) {

            $total_question = $total_question + $answer['no_of_question'];
            $total_answered = $total_answered + $answer['answer'];
            $total_correct_answer = $total_correct_answer + $answer['correct'];
//                echo '<pre>';
//                print_r($total_question);
//                die;
            //--------find all questions related to quiz and category------
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
//=======================end find all questions related to quiz and category=========================
            $TOTAL_MAX_MARKS += $cat_total_marks;
            $TOTAL_MARKS_OBTAINED += $total_marks_obtained;
             $TOTAL_PERCENTAGE2 = round((($TOTAL_MARKS_OBTAINED / $TOTAL_MAX_MARKS) * 100), 2);
        }

        $name = $this->main_model->get_name_from_id('quiz', 'name', $quiz_id, 'id');
        ?>

        <?php
        $CI = & get_instance();
        $wq = $CI->wrongquestions($quiz_id); //Calling Function from controller that give No.of wrong attempted questions given by the user
        ?>
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
                        <td width="40%"><h5>Marks Obtained</h5></td>
                        <td width="30%"> :  </td>
                        <td width=""><?php echo $TOTAL_MARKS_OBTAINED; ?></td>
                    </tr>
                     <tr>
                        <td width="40%"><h5>Marks Obtained % </h5></td>
                        <td width="30%"> :  </td>
                        <td width=""><?php echo $TOTAL_PERCENTAGE2; ?> %</td>
                    </tr>
                    <tr>
                        <td width="40%"><h5>Negative Marking </h5></td>
                        <td width="30%"> :  </td>
                        <td width=""><?php echo 'Nil'; ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class = "row">
            <div class = "col-md-12 top-margin">
                <div class = "table-responsive">

                    <h2 class="quickpanelhead quiz_head">Test Analytics Box<font color=""></font></h2>
                    <table class = "table table-bordered" id = "">
                        <tbody>
                            <tr>
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
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <?php
        $this->load->view('footer_view');
        ?>
    </div><!-- end main -->
</body>

<?php
$this->load->view('html_end_view');
?>

