<?php
$this->load->view('header_view');
//print_r($quiz_detail);
//die;
//var_dump($questions);

  $query_str1 = 'SELECT  `quiz_result_id` , sum(`marks`) as marks_obtain 
                    FROM  `quiz_result_answers` 
                    WHERE  `quiz_result_id` 
                    IN ( SELECT  `id`  FROM  `quiz_result` WHERE  `quiz_id` = '.$quiz_result_detail[0]['quiz_id'].')
                    group by `quiz_result_id` order by marks_obtain desc ';
       
        $quiz_rank = $this->db->query($query_str1) -> result_array();         
       
        foreach ($quiz_rank as $key => $rank_list) { 
                  
            if($rank_list['quiz_result_id'] == $quiz_result_detail[0]['id']){ 
               
                $rank = ($key + 1) ;
                $marks_obtain = $rank_list['marks_obtain'] ;
            }
          }
        
        $query_str2 = 'SELECT `quiz_id`, SUM(`question_weight`) as total_marks FROM `questions` WHERE quiz_id = '.$quiz_result_detail[0]['quiz_id'] ;
        $total_marks = $this->db->query($query_str2) -> result_array(); 
        $total_marks = $total_marks[0]['total_marks'];
  

?>
<!--<div class="row" id="bigCallout">-->
<div class="container main_container">
    <!--content panel start -->
    <!--<section class="col-md-12">-->
    <div class="well main_body">
        <h1 class="page-header"><?php echo $quiz_detail->name; ?></h1>
        <!--div class="row text-center">
        <div class="col-md-12">
                <a href="" class="btn btn-primary">Add Program</a>
        </div>
        </div>
        <hr /-->
        <!-- Questin block content -->
        <div class="row">
            <div class="col-md-12">
                <form class="form-horizontal" role="form">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="row">
                               <div class="col-md-3" id="timer1"> Rank :<?=$rank ?> </div>
                                <div class="col-md-offset-5 col-md-4"> Mark Obtain: <?= $marks_obtain .'/'.$total_marks ?>  </div>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div  id="question-content">
                        <!--Question answer content block start-->
                        <!--calling a sub view to inject / manage questions-->
                        <?php $this->load->view('insert_result_options_view'); ?>
                        <!--Question answer content block end-->
                    </div>
                    <hr />
                    <div class="col-md-12">
                        <ul class="pagination" id="paginationQ"></ul>
                    </div>
            </div>
            </form>
        </div>
<!-- end Questin block content -->
<!-- end col-md-9 -->
<!--end content panel start -->

<!-- end bigCallout-->

<!-- End Content and Sidebar
===================================================== -->
</div><!-- end main -->

<?php $this->load->view('footer_view'); ?>
</div>
<?php $this->load->view('html_end_view'); ?>
