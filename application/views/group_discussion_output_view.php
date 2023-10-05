
<?php
$filter2[0]['id'] = "node_id";
$filter2[0]['value'] = $id;
$_req2 = array('*');
$user_comment = $this->main_model->get_many_records("comments", $filter2, $req2, "id");
$comment = "";
foreach ($user_comment as $value) {
    $user = $this->main_model->get_name_from_id("users", "name", $value['user_id']);
    $comment .= '<span class="comment_text">' . $user . '</span> said: <span class="date_color">(' . date('D, M d, Y h:i:s a', strtotime($value['created_date'])) . ')</span><div class="user-comments">' . $value['comment_text'] . '</div><hr/><br>';
}
//like_counts
$likes = $this->custom->like_counts_for_node($id);
$dislikes = $this->custom->dislike_counts_for_node($id);
// var_dump($data1);die;

$filter[0]['id'] = "node_id";
$filter[0]['value'] = $id;
$filter[1]['id'] = "user_id";
$filter[1]['value'] = $_SESSION['user_id'];
$row = $this->main_model->get_many_records('likes_dislikes', $filter, '');
$f = "";
$g = "";
if (!empty($row)) {
    if ($row[0]['records'] == 1) {
        $f = "like-color";
    }
    if ($row[0]['records'] == -1) {
        $g = "dislike-color";
    }
}
if ($question['no_of_options'] % 2) {
    echo '<div class = "col-sm-1 "></div>
        <div class = "col-sm-5"></div>
        </div>';
}
echo '<div class = "form-group">
        <!--Workspace-outer-row region start-->
        <div id = "workspace-outer" class = "row">

        <!--like and dislike icon-->
        <div class = "col-xs-2 col-sm-2 col-md-2 col-lg-2">
          <span class="likebadge" id="likebadge">' . $likes . '</span><span class="unlikebadge" id="unlikebadge">' . $dislikes . '</span>
          <span class="glyphicon glyphicon-thumbs-up icon_size like_btn ' . $f . '" id=' . $id . ' onclick="likeid(this);" data-id="1"></span>
          <span class="glyphicon glyphicon-thumbs-down icon_size dislike_btn ' . $g . '" id=' . $id . ' data-id="-1"></span>
        </div>

      <!--comment region-column start-->
        <div class = "col-xs-3 col-sm-3 col-md-3 col-lg-3">
        <div class = "toolbar-text" data-toggle = "collapse" data-target = "#comment' . $id . '">
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
        <div id = "viewanswer' . $id . '" class = "collapse panel panel-success">
        <div class = "panel-heading">Answer and Explanation</div>
        <div class = "panel-body">
        <div id = "">';
//echo $question['answer_text'];
echo '</div>
        </div>
        </div>
        </div>
        <div class = "col-md-12">
        <div id = "workspace' . $id . '" class = "collapse panel panel-success">
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
        <div id = "report' . $id . '" class = "collapse panel panel-success">
        <div class = "panel-heading">Report</div>
        <div class = "panel-body">
        <textarea class = "skill_editor form-control" id = ""></textarea>
        </div>
        </div>
        </div>
        </div>
         <div class = "col-md-12">
        <div id = "comment' . $id . '" class = "collapse panel panel-success">
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
            <button class = "skill btn btn-success" type="button" id=' . $id . '  onclick="getid(this);">Submit</button>
        </div>
        </div>
        <div class="row col-md-12" id="div_' . $id . '">

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
?>
<script>
    function getid(abc) {

        var attrname = $(abc).attr("id");
        // alert(attrname);
        $(document.body).on("click", "#" + attrname, function () {

            var id = ("#comment" + attrname);
//        alert(id);
//        alert('ragini');
            var data1 = $("#comment" + attrname).find('.note-editable').text();
            //alert(data1);

            $.ajax({
                type: "POST",
                url: "<?php echo base_url() . 'set_comments_for_node/'; ?>",
                data: {
//                   user_id: $_SESSION['user_id'],
                    node_id: attrname,
                    comment: data1
                },
                success: function (data)
                {
//                    alert(data);
                    var test = 'abc';
//                   alert(test);
                    document.getElementById("div_" + attrname).innerHTML = data;
                    $("#comment" + attrname).find('.note-editable').text("");
                    window.location.reload();

                },
                error: function () {

                    alert("ajax error");
                }
            });

        });

    }
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
            $(this).next().removeClass("dislike-color")
            $(this).addClass("like-color");
            number += 1;
            $(this).parent().find('.likebadge').text(number);

        }
        var node_id = $(this).attr('id');
//      var records = $(this).attr('data-id');alert(records);

        var fieldHTML = '<input type="hidden" name="node_id" value="' + node_id + '"/>';

        $.ajax({
            type: "POST",
            url: "<?php echo base_url() . 'set_like_for_node/'; ?>",
            data: {
                node_id: node_id
//                   records: records
            },
            success: function (data) {
//                alert(data);
            },
            error: function () {

                alert("ajax error");
            }
        });

    });
    $(document.body).on('click', '.dislike_btn', function () {

        var node_id = $(this).attr('id');//alert(question_id);
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
            url: "<?php echo base_url() . 'set_dislike_for_node/'; ?>",
            data: {
                node_id: node_id
            },
            success: function (data) {
//                alert(data);
            },
            error: function () {

                alert("ajax error");

            }
        });
    });
</script>
