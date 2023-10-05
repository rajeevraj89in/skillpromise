
<div class="row">
    <div class="col-md-4">
        <h5 class="">Test Output<font color=""></font></h5>
    </div>
    <div class="col-md-4 col-md-offset-4">
        <h5><a href="<?php echo(base_url() . 'quiz/result/' . $quiz_id); ?>" class="btn btn-primary" role="button" style="border-radius: 0px;">
                View Assessment with Solutions
            </a>
        </h5>
    </div>
</div>

<?php
$total_question = 0;
$total_answered = 0;
$TOTAL_MAX_MARKS = 0;
$TOTAL_MARKS_OBTAINED = 0;
$total_correct_answer = 0;
$TOTAL_PERCENTAGE2=0;
//            echo '<pre>';
//            print_r($category);
//            die;
foreach ($category as $key => $answer) {

    $total_question = $total_question + $answer['no_of_question'];
    $total_answered = $total_answered + $answer['answer'];
    $total_correct_answer = $total_correct_answer + $answer['correct'];
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
//===================end-find all questions related to quiz and category============
    $TOTAL_MAX_MARKS += $cat_total_marks;
    $TOTAL_MARKS_OBTAINED += $total_marks_obtained;
     $TOTAL_PERCENTAGE2 = round((($TOTAL_MARKS_OBTAINED / $TOTAL_MAX_MARKS) * 100), 2);
}
//            echo '<pre>';
//            print_r($each_cat_quest);
//            die;
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


