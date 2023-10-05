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

                <?php //exit("quiz_id: ".$quiz_id." == ".$_SESSION['user_id']);
                $page_name = '';
                if (isset($header)) {
                    $page_name = $header;
                } else {
                    $page_name = $name;
                }
				
				if (!isset($type)) {
                    $type = "";
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
                                <a href = "' . base_url() . "add_request/$attempt" . '" class = "btn btn-primary btn-lg">  Reset & Continue Test </a>
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
                                <a href = "' . base_url() . "add_request/$attempt" . '" class = "btn btn-primary btn-lg"> Reset & Continue Test </a>
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
                
    <?php
        if($id == 3808){
            $data_self = $this->main_model->selectsingleData('self_introduction_save_data','*',array('user_id' => $_SESSION['user_id'],'is_deleted' => '0'));
            // echo $this->db->last_query();
            // echo "<pre>";
            // print_r($data_self);
            
           ?>
           <form action="<?php echo base_url('self_introduction_data_save'); ?>" method="POST">
               <input type="hidden" name='node_id' value="<?php echo $id; ?>"/>
               <div class="row">
                   <div class="col-md-12">
                       <label style="font-weight: normal;">Place you belong to</label><br>
                       <?php
                        if(!empty($data_self->data)){
                            ?>
                            <textarea class="form-control" rows="10" name="data" placeholder="If your father is in a transferable job, then talk about that, along with the qualities you have acquired because of living at multiple locations. Only talk about unique and interesting things about your city, if there is any. It is not mandatory to speak about the place you belong to, if you cannot talk about something interesting about your city"><?php if(!empty($data_self->data)){echo $data_self->data;} ?></textarea>
                            <?php
                        }else{
                           ?>
                           <textarea class="form-control" rows="10" name="data" placeholder="If your father is in a transferable job, then talk about that, along with the qualities you have acquired because of living at multiple locations. Only talk about unique and interesting things about your city, if there is any. It is not mandatory to speak about the place you belong to, if you cannot talk about something interesting about your city"></textarea>
                           <?php
                        }
                       ?>
                       <br><br>
                    </div>
                    
                    <div class="col-md-12">
                       <label style="font-weight: normal;">Family</label>
                       <?php
                        if(!empty($data_self->data2)){
                            ?>
                            <textarea class="form-control" rows="10" name="data2" placeholder="Keep your family introduction very brief. Talk about qualities, that match with the recruiter’s requirement, that you have acquired from your family. Integrity, Hard work, Respect, Frugality, Teamwork, ability to multitask etc. are a few qualities that people acquire from their family
"><?php if(!empty($data_self->data2)){echo $data_self->data2;} ?></textarea>
                            <?php
                        }else{
                           ?>
                           <textarea class="form-control" rows="10" name="data2" placeholder="Keep your family introduction very brief. Talk about qualities, that match with the recruiter’s requirement, that you have acquired from your family. Integrity, Hard work, Respect, Frugality, Teamwork, ability to multitask etc. are a few qualities that people acquire from their family
"></textarea>
                           <?php
                        }
                       ?>
                       <br><br>
                    </div>
                    
                    <div class="col-md-12">
                       <label style="font-weight: normal;">Education/ Academic Achievements/ Associated qualities</label>
                       <?php
                        if(!empty($data_self->data3)){
                            ?>
                            <textarea class="form-control" rows="10" name="data3" placeholder="Talk about your education briefly. Talk about your academic achievements and qualities that you have acquired because of your academic participation. Focus, Eye for detail, Analytical skills, Research skills etc. are a few qualities that people acquire because of their academic participation"><?php if(!empty($data_self->data3)){echo $data_self->data3;} ?></textarea>
                            <?php
                        }else{
                           ?>
                           <textarea class="form-control" rows="10" name="data3" placeholder="Talk about your education briefly. Talk about your academic achievements and qualities that you have acquired because of your academic participation. Focus, Eye for detail, Analytical skills, Research skills etc. are a few qualities that people acquire because of their academic participation"></textarea>
                           <?php
                        }
                       ?>
                       <br><br>
                    </div>
                    
                    <div class="col-md-12">
                       <label style="font-weight: normal;">Sports/ Co-curricular Activities/ Achievements/ Associated Qualities</label>
                       <?php
                        if(!empty($data_self->data4)){
                            ?>
                            <textarea class="form-control" rows="10" name="data4" placeholder="Talk about your School, College, Zonal, Regional and National level participation in Sports/ co-curricular activities along with achievements. Talk about the qualities that you have acquired because of your sports and co-curricular participations. Strategy, Competitiveness, Focus, Ambition, Process Orientation, Teamwork, Creativity and Time Management are a few qualities that people acquire because of their sports/ co-curricular participations"><?php if(!empty($data_self->data4)){echo $data_self->data4;} ?></textarea>
                            <?php
                        }else{
                           ?>
                           <textarea class="form-control" rows="10" name="data4" placeholder="Talk about your School, College, Zonal, Regional and National level participation in Sports/ co-curricular activities along with achievements. Talk about the qualities that you have acquired because of your sports and co-curricular participations. Strategy, Competitiveness, Focus, Ambition, Process Orientation, Teamwork, Creativity and Time Management are a few qualities that people acquire because of their sports/ co-curricular participations"></textarea>
                           <?php
                        }
                       ?>
                       <br><br>
                    </div>
                    
                    <div class="col-md-12">
                       <label style="font-weight: normal;">Positions of Responsibility Held/ Achievements/ Associated Qualities</label>
                       <?php
                        if(!empty($data_self->data5)){
                            ?>
                            <textarea class="form-control" rows="10" name="data5" placeholder="Talk about positions of responsibilities held at School, College, Residential society, a club and at work. Talk about the qualities that you have acquired because of managing positions of responsibility. Team work, organizing skills, Delegation, Time Management, Communication Skills, Negotiation Skills, Financial Management and Execution skills are a few qualities that people acquire because of holding positions of responsibility"><?php if(!empty($data_self->data5)){echo $data_self->data5;} ?></textarea>
                            <?php
                        }else{
                           ?>
                           <textarea class="form-control" rows="10" name="data5" placeholder="Talk about positions of responsibilities held at School, College, Residential society, a club and at work. Talk about the qualities that you have acquired because of managing positions of responsibility. Team work, organizing skills, Delegation, Time Management, Communication Skills, Negotiation Skills, Financial Management and Execution skills are a few qualities that people acquire because of holding positions of responsibility"></textarea>
                           <?php
                        }
                       ?>
                       <br><br>
                    </div>
                    
                    <div class="col-md-12">
                       <label style="font-weight: normal;">Hobbies/ Achievements/ Associated Qualities</label>
                       <?php
                        if(!empty($data_self->data6)){
                            ?>
                            <textarea class="form-control" rows="10" name="data6" placeholder="Talk about hobbies you are passionate and incisive about. Talk about achievements related to your hobbies. Talk about your proficiency levels in your hobby areas. For example, please mention, if you are a black belt in Karate. Talk about the qualities that you have acquired because of your hobbies. Please see the hobbies section to know more about qualities that  people acquire because of hobby persuasion"><?php if(!empty($data_self->data6)){echo $data_self->data6;} ?></textarea>
                            <?php
                        }else{
                           ?>
                           <textarea class="form-control" rows="10" name="data6" placeholder="Talk about hobbies you are passionate and incisive about. Talk about achievements related to your hobbies. Talk about your proficiency levels in your hobby areas. For example, please mention, if you are a black belt in Karate. Talk about the qualities that you have acquired because of your hobbies. Please see the hobbies section to know more about qualities that  people acquire because of hobby persuasion"></textarea>
                           <?php
                        }
                       ?>
                       <br><br>
                    </div>
                    
                    <div class="col-md-12">
                       <label style="font-weight: normal;">Work Experience/ Achievements/ Associated Qualities</label>
                       <?php
                        if(!empty($data_self->data7)){
                            ?>
                            <textarea class="form-control" rows="10" name="data7" placeholder="Talk about your work experience in terms of accountabilities, qualities acquired and achievements. Talk about additional courses done along with work. Talk about courses your company sponsored you for. Talk about achievements at work in terms of promotions, awards, quota attainment, KRA achievement, best practices initiation, process design, innovation at work etc."><?php if(!empty($data_self->data7)){echo $data_self->data7;} ?></textarea>
                            <?php
                        }else{
                           ?>
                           <textarea class="form-control" rows="10" name="data7" placeholder="Talk about your work experience in terms of accountabilities, qualities acquired and achievements. Talk about additional courses done along with work. Talk about courses your company sponsored you for. Talk about achievements at work in terms of promotions, awards, quota attainment, KRA achievement, best practices initiation, process design, innovation at work etc."></textarea>
                           <?php
                        }
                       ?>
                       <br><br>
                    </div>
                    
                    <div class="col-md-12">
                       <label style="font-weight: normal;">Internship</label>
                       <?php
                        if(!empty($data_self->data8)){
                            ?>
                            <textarea class="form-control" rows="10" name="data8" placeholder="Talk about your internship in terms of accountabilities, learnings and achievements. Talk about methodology you followed during your internship. Talk about the domain area associated with your internship. Talk about achievements during internship in terms of pre-placement offer, quota attainment, KRA achievement, best practices initiation, process design, innovation at work, Linkedin recommendations etc."><?php if(!empty($data_self->data8)){echo $data_self->data8;} ?></textarea>
                            <?php
                        }else{
                           ?>
                           <textarea class="form-control" rows="10" name="data8" placeholder="Talk about your internship in terms of accountabilities, learnings and achievements. Talk about methodology you followed during your internship. Talk about the domain area associated with your internship. Talk about achievements during internship in terms of pre-placement offer, quota attainment, KRA achievement, best practices initiation, process design, innovation at work, Linkedin recommendations etc."></textarea>
                           <?php
                        }
                       ?>
                       <br><br>
                    </div>
                    
                    <div class="col-md-12">
                       <label style="font-weight: normal;">Conclusion</label>
                       <?php
                        if(!empty($data_self->data9)){
                            ?>
                            <textarea class="form-control" rows="10" name="data9" placeholder="Congratulate the panel for some recent achievement of the company. Share with them how you value their company as a dream company. Give a concluding summary assuring them that if you are selected then how you will come up to their expectations in terms of performance and team work. Conclude with Thank you"><?php if(!empty($data_self->data9)){echo $data_self->data9;} ?></textarea>
                            <?php
                        }else{
                           ?>
                           <textarea class="form-control" rows="10" name="data9" placeholder="Congratulate the panel for some recent achievement of the company. Share with them how you value their company as a dream company. Give a concluding summary assuring them that if you are selected then how you will come up to their expectations in terms of performance and team work. Conclude with Thank you"></textarea>
                           <?php
                        }
                       ?>
                       <br><br>
                    </div>
                </div>
               <br>
               <center>
                   <button class="btn btn-success" type="submit">Save as Draft</button>&nbsp;<a class="btn btn-success" href="<?php echo base_url('self_introduction_data_pdf'); ?>">Download as PDF</a>
               </center>
           </form>
           <?php
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
