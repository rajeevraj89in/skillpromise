
<?php
  $story_questions = array();

foreach ($subquestions as $key => $value) {

    if ($value['story'] != 0) {
        array_push($story_questions, $subquestions[$key]);
        unset($subquestions[$key]);
    }
}

if(isset($start)){
  $i=$start;  
  $k=$start;  
}else{
$i = 0;
$k=0; 
}
//print_r($questions);
foreach ($subquestions as $question) {
    $i++;
    echo '<div class = "row question_div">'
    . '<div class = "col-xs-12 answer_spacing">'
    . '<label for = "inputOption4" class = "col-sm-1 control-label">' . $i . '.</label>'
    . '<div class = "col-sm-11">'
    . '<div class = "form-group">'
    . '<div class="form-control-static" id = "' . $question['id'] . '">' . $question['question_text'] . '</div>'
    . '</div>'
    . '</div>'
    . '</div>'
    . '<div class = "col-xs-12">'        
    . '<label for = "inputOption4" class = "col-sm-1 control-label">Ans.</label>'
    . '<div class = "col-sm-11">'
    . '<div class = "form-group">'        
    . '<div class="form-control-static" id = "' . $question['id'] . '">' . $question['answer_text'] . '</div>'        
      
    . '</div>';

     $data=$this->custom->get_comments($question['id']);
//          var_dump($data);die;
     $comment="";
     foreach($data as $value){
         $user = $this->main_model->get_name_from_id("users", "name", $value['user_id']);
         $comment .='<span class="comment_text">'.$user.'</span> said: <span class="date_color">('.date('D, M d, Y h:i:s a',  strtotime($value['created_date'])).')</span><div class="user-comments">'.$value['comment_text'].'</div><hr/><br>';
        
     }//echo $comment;
     //die;
     //like_counts
     $likes=$this->custom->like_counts($question['id']);
     $dislikes=$this->custom->dislike_counts($question['id']);
//          var_dump($likes);die;
     
     $filter[0]['id']="question_id";
        $filter[0]['value']=$question['id'];
        $filter[1]['id']="user_id";
        $filter[1]['value']=$_SESSION['user_id'];
        $row=$this->main_model->get_many_records('likes_dislikes', $filter, '');
         $f="";
         $g="";
         if(!empty($row)){
             if ($row[0]['records'] == 1){
                 $f="like-color";
                 
             }
             if ($row[0]['records'] == -1){
                 $g="dislike-color";
             }
         }

    echo '<!--Answer and Explanation region start-->
        <div class = "form-group">
        <!--Workspace-outer-row region start-->
        <div id = "workspace-outer" class = "row">
        
        <!--like and dislike icon-->
        <div class = "col-xs-2 col-sm-2 col-md-2 col-lg-2">
        <span class="likebadge" id="likebadge">'.$likes.'</span><span class="unlikebadge" id="unlikebadge">'.$dislikes.'</span>
          <span class="glyphicon glyphicon-thumbs-up icon_size like_btn '.$f.'" id='.$question['id'].' data-id="1"></span>   
          <span class="glyphicon glyphicon-thumbs-down icon_size dislike_btn '.$g.'" id='.$question['id'].' data-id="-1"></span>
        </div>

        <!--workspace region-column start-->
        <!--workspace region-column start-->
        <div class = "col-xs-3 col-sm-3 col-md-3 col-lg-3">
        <div class = "toolbar-text" data-toggle = "collapse" data-target = "#workspace' . $question['id'] . '">
        Workspace
        </div>


        </div>
        <!--workspace region-column start-->

        <!--workspace region-column start-->
        <div class = "col-xs-3 col-sm-3 col-md-3 col-lg-3">
        <div class = "toolbar-text" data-toggle = "collapse" data-target = "#report' . $question['id'] . '">
        Report
        </div>


        </div>
        
        <!--comment region-column start-->
        <div class = "col-xs-4 col-sm-4 col-md-4 col-lg-4">
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
                <div class = "col-xs-4 col-sm-4 col-md-4 col-lg-4 calc-button calculator-trigger toolbar-text" type="button">Show Calculator</div>
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
        <p>'.$comment.'</p>
        </div>
        <p>Provide your inputs in the box below:</p>
        <textarea class = "skill_editor form-control input_comment" id = "comment_area"></textarea>
        <div class="row">
        <div class="col-sm-12 text-center">
            <button class = "skill btn btn-success" type="button" id='.$question['id'].'  onclick="getid(this);">Submit</button>
        </div>
        </div>
        <div class="row col-md-12" id="div_'.$question['id'].'">
       
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



  //============================== print story content  ===========================
//$count =1;
if (isset($story)) {

//    $special = array('#','^', '~', '$', '&', '@');
   // $k = 0;

    foreach ($story as $key => $rec) {
//        if ($k > 4){
//            $k = 0;
//        }
        //echo $rec['story_content'];die;
        //echo "r";
       $k++;
        echo '<div class = "row question_div">'
        . '<div class = "col-xs-12">'
        . '<hr>'
        . '<label for = "inputOption4" class = "col-sm-1 control-label ques_symbol">'. $k .'.</label>'
        . '<div class = "col-sm-10">'
        . '<div class = "form-group">'
        . '<div class = "col-sm-12">'
        . '<div class="form-control-static">' . $rec['story_content'] . '</div>'
        . '</div>'  . '</div>'. '</div>'  . '</div>' 
        . '</div>';




        //============================== print question related story ==================

        foreach ($story_questions as $key => $question) {


            if ($question['story'] == $rec['id']) {
                echo '<div class = "row question_div">'
                . '<div class = "col-xs-12 answer_spacing">'
                . '<label for = "inputOption4" class = "col-sm-2 control-label"><span class="symbol_color"></span>Q.</label>'
                . '<div class = "col-sm-10">'
                . '<div class = "form-group">'
                . '<div class="form-control-static" id = "' . $question['id'] . '">' . $question['question_text'] . '</div>'
                . '</div>'
                . '</div>'
                . '</div>'
                . '<div class = "col-xs-12">'       
                . '<label for = "inputOption4" class = "col-sm-2 control-label">Ans.</label>'
                . '<div class = "col-sm-10">'
                . '<div class = "form-group">' 
                . '<div class="form-control-static" id = "' . $question['id'] . '">' . $question['answer_text'] . '</div>' 
                
                . '</div>';

                $data=$this->custom->get_comments($question['id']);
          //var_dump($data);die;
        $comment="";
        foreach($data as $value){
            $user = $this->main_model->get_name_from_id("users", "name", $value['user_id']);
            $comment .='<span class="comment_text">'.$user.'</span> said: <span class="date_color">('.date('D, M d, Y h:i:s a',  strtotime($value['created_date'])).')</span><div class="user-comments">'.$value['comment_text'].'</div><hr/><br>';

        }
        $likes=$this->custom->like_counts($question['id']);
        $dislikes=$this->custom->dislike_counts($question['id']);
        
        $filter[0]['id']="question_id";
        $filter[0]['value']=$question['id'];
        $filter[1]['id']="user_id";
        $filter[1]['value']=$_SESSION['user_id'];
        $row=$this->main_model->get_many_records('likes_dislikes', $filter, '');
         $f="";
         $g="";
         if(!empty($row)){
             if ($row[0]['records'] == 1){
                 $f="like-color";
                 
             }
             if ($row[0]['records'] == -1){
                 $g="dislike-color";
             }
         }

                echo '<!--Answer and Explanation region start-->
        <div class = "form-group">
        <!--Workspace-outer-row region start-->
        <div id = "workspace-outer" class = "row">
        
        <!--like and dislike icon-->
        <div class = "col-xs-2 col-sm-2 col-md-2 col-lg-2">
          <span class="likebadge" id="likebadge">'.$likes.'</span><span class="unlikebadge" id="unlikebadge">'.$dislikes.'</span>
          <span class="glyphicon glyphicon-thumbs-up icon_size like_btn '.$f.'" id='.$question['id'].' data-id="1"></span>
          <span class="glyphicon glyphicon-thumbs-down icon_size dislike_btn '.$g.'" id='.$question['id'].' data-id="-1"></span>
        </div>

        <!--workspace region-column start-->
        <!--workspace region-column start-->
        <div class = "col-xs-3 col-sm-3 col-md-3 col-lg-3">
        <div class = "toolbar-text" data-toggle = "collapse" data-target = "#workspace' . $question['id'] . '">
        Workspace
        </div>


        </div>
        <!--workspace region-column start-->

        <!--workspace region-column start-->
        <div class = "col-xs-3 col-sm-3 col-md-3 col-lg-3">
        <div class = "toolbar-text" data-toggle = "collapse" data-target = "#report' . $question['id'] . '">
        Report
        </div>


        </div>
        <!--comment region-column start-->
        <div class = "col-xs-4 col-sm-4 col-md-4 col-lg-4">
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
                <div class = "col-xs-4 col-sm-4 col-md-4 col-lg-4 calc-button calculator-trigger toolbar-text" type="button">Show Calculator</div>
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
        <p>'.$comment.'</p>
        </div>
        <p>Provide your inputs in the box below:</p>
        <textarea class = "input_comment skill_editor form-control" name="content" id = "mytest_'.$key.'"></textarea>
        <div class="row">
        
        </div>
        <div class="row">
        <div class="col-sm-12 text-center">
            <button class = "skill btn btn-success" type="button" id='.$question['id'].'  onclick="getid(this);">Submit</button>
        </div>
        </div>
        <div class="row col-md-12" id="div_'.$question['id'].'">
       
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
        }
//     $k++;   
    }
}
?>
<script>

function getid(abc){
    
    var attrname=$(abc).attr("id");
   // alert(attrname);
    $(document.body).on("click", "#"+attrname, function () {
        
        var id=("#comment"+attrname);
//        alert(id);
//        alert('ragini');
     var data1 = $("#comment"+attrname).find('.note-editable').text();
     //alert(data1);

    $.ajax({
               type: "POST",
               url: "<?php echo base_url() . 'set_comments/' ; ?>",
               data: {
//                   user_id: $_SESSION['user_id'],
                   question_id: attrname,
                   comment: data1
               },
               success: function (data)
               {
                   var test='abc';
//                   alert(test);
                   document.getElementById("div_"+attrname).innerHTML = data;
                   $("#comment"+attrname).find('.note-editable').text("");
    
               },
               error: function () {

                    alert("ajax error");
               }
           });
    
});

}
$(document).ready(function () {  
//alert('hii');
  $('.like_btn').on('click', function (){  
          var number = parseInt($(this).parent().find('.likebadge').text()); //alert(number);
//          number+=1;
//          $('#likebadge').text(number);
           
      if($(this).hasClass("like-color")){//============================when like button is selected remove like============
         $(this).removeClass("like-color");
         number-=1;
         //alert(number);
         $(this).parent().find('.likebadge').text(number);
      }else{
          if($(this).next().hasClass("dislike-color")){//========================when unlike button is selected on like click
            var number2 = parseInt($(this).parent().find('.unlikebadge').text());
            //alert(number2);
            number2-=1;
           $(this).parent().find('.unlikebadge').text(number2);
          }
                                                    //======================add like and remove unlike
            $(this).next().removeClass("dislike-color")
            $(this).addClass("like-color");
            number+=1;
            //alert(number);
           $(this).parent().find('.likebadge').text(number);
          
      }
      var question_id = $(this).attr('id');//alert(question_id);
//      var records = $(this).attr('data-id');alert(records);

      var fieldHTML = '<input type="hidden" name="question_id" value="' +question_id+ '"/>'; 

        $.ajax({
               type: "POST",
               url: "<?php echo base_url() . 'set_like/' ; ?>",
               data: {
                   question_id: question_id
//                   records: records
               },
               success: function (data){
              
               },
               error: function () {

                    alert("ajax error");
               }
           });
          
  });
  });
//$(document).ready(function () {  
//  $('.dislike_btn').on('click', function () 
 $(document.body).on('click', '.dislike_btn', function (){
       
      var question_id = $(this).attr('id');//alert(question_id);
      var number = parseInt($('#unlikebadge').text());
      if($(this).hasClass("dislike-color")){
         $(this).removeClass("dislike-color");
         number-=1;
//         $('#unlikebadge').text(number);
        $(this).parent().find('.unlikebadge').text(number);
      }else{
         if($(this).prev().hasClass("like-color")){//========================
            var number2 = parseInt($(this).parent().find('.likebadge').text());
            number2-=1;
           $(this).parent().find('.likebadge').text(number2);
          }
        $(this).prev().removeClass("like-color");
        $(this).addClass("dislike-color");
        number+=1;
        $(this).parent().find('.unlikebadge').text(number);
      }
      
      
      
        $.ajax({
               type: "POST",
               url: "<?php echo base_url() . 'set_dislike/' ; ?>",
               data: {
                   question_id: question_id
               },
               success: function (data){

               },
               error: function () {

                    alert("ajax error");
                    console.log("nhi ho rha");
               }
           });
  });

</script>
