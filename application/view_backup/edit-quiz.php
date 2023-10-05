<?php
//echo $node;
//die;
$this->load->view('header_view');
$this->load->view('manager_left_view');
?>
<!--content panel start -->
<section class="col-md-9">
    <h1 class="page-header">Edit Quiz</h1>
    <!-- add-program-form content -->
    <div class="row">
        <div class="col-md-12">

            <form name="mainForm" enctype="multipart/form-data" class="form-horizontal" role="form" action=" <?php echo base_url() . 'set/quiz'; ?>" method="POST" onsubmit="return validateForm()">
                <input type="hidden" name="id" value = "<?php echo $id; ?>">
                <div id ="select_level_outer">

                    <?php
                    if (!$max_level) {//if quiz at root level, or level not defined
                        echo '<div class="form-group level-div" id="leveldiv1">
                            <label for = "level1" class = "col-sm-3 control-label">Select Connect Node</label>
                            <div class = "col-sm-9">
                            <select class = "form-control node-select" id = "level1" ';
                        echo 'name = "node" required >';
                        echo $this->main_model->fill_node_select(0);
                        echo '</select>
                    </div>
                     </div>';
                    } else {
                        $nodes = array_reverse($baseNodes);
                        foreach ($nodes as $key => $value) {
                            echo '<div class="form-group level-div" id="leveldiv' . ($key + 1) . '">
                            <label for = "level' . ($key + 1) . '" class = "col-sm-3 control-label">Select Connect Node</label>
                            <div class = "col-sm-9">
                            <select class = "form-control node-select" id = "level' . ($key + 1) . '" ';
                            if (($key + 1) == count($nodes)) {
                                echo 'name = "node" required ';
                            }
                            echo ' >';
                            echo $this->main_model->fill_node_select($value['parent_id'], $value['id']);
                            echo '</select>
                    </div>
                     </div>';
                        }
                    }
                    ?>

                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Quiz Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Quiz Name" value = "<?php echo $name; ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-3 control-label">Quiz Description</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="description" name="description" placeholder="Quiz Description"><?php echo $description; ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="page_content" class="col-sm-3 control-label">Page Content</label>
                    <div class="col-sm-9">
                        <textarea class="skill_editor" name="page_content" id="page_content" ><?php echo $page_content; ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="time_limit" class="col-sm-3 control-label">Select Time Limit</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="time_limit" name="time_limit" placeholder="Time Limit" value="<?php
                        if ($time_limit != '00:00:00') {
                            echo $time_limit;
                        }
                        ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="quiz_type" class="col-sm-3 control-label">Select Quiz Type</label>
                    <div class="col-sm-9">
                        <select class="form-control" id="quiz_type" name="quiz_type" required>
                            <option value="Practice">Practice Quiz</option>
                            <option value="Subjective">Subjective Quiz</option>
                            <option value="Dashboard" selected>Dashboard Quiz</option>
                            <option value="Flex">Flexi Dashboard Quiz</option>
                            <option value="Scoring">Normal Scoring Quiz</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group" id="per_page">
                    <label for="pagination" class="col-sm-3 control-label">No. Of Questions(Per Page)</label>
                    <div class="col-sm-9">
                        <input type="number" id="pagination" name="pagination" class="form-control" value="<?php echo $pagination; ?>" title="Pls enter a number greater than 0." required="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="image_file" class="col-sm-3 control-label">Select Image</label>
                    <div class="col-sm-9">
                        <input type="file" id="image_file" name="image_file">
                        <p class="help-block">File size would be between 1KB to 14MB</p>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="quesn_numbering" class="col-sm-3 control-label">Options Naming</label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" name="option_numbering" id="numbered" value="1" <?php
                            if (($option_numbering) == '1') {
                                echo 'checked';
                            }
                            ?>> Show Option Name
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="option_numbering" id="unnumbered" value="0" <?php
                            if (($option_numbering) == '0') {
                                echo 'checked';
                            }
                            ?>> Without Option Name
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Status</label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" name="status" id="Active" value="Active" <?php
                            if (($status) == 'Active') {
                                echo 'checked';
                            }
                            ?>> Active
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="status" id="Inactive" value="Inactive" <?php
                            if (($status) == 'Inactive') {
                                echo 'checked';
                            }
                            ?>> Inactive
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-10">
                        <button type="submit" value="Submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div><!-- end add-program-form content -->
</section><!-- end col-md-9 -->
<!--end content panel start -->

</div><!-- end bigCallout-->

<!-- End Content and Sidebar
===================================================== -->
</div><!-- end main -->
<?php $this->load->view('footer_view'); ?>
<script>
    var max_level = <?php
if ($max_level) {
    echo $max_level;
} else {
    echo 1;
}
?>;
    
    var parent_id = <?php echo $node; ?>;
    var quiz_type = "<?php echo $quiz_type; ?>";

    function createSelect(parentId, noOfChild) {
        noOfChild = parseInt(noOfChild);
        if (noOfChild > 0) {
            var id = parseInt(parentId);
            $("#leveldiv1").clone().appendTo("#select_level_outer");
            max_level++;
            $(".level-div").filter(':last').attr('id', "leveldiv" + max_level);
            $("#leveldiv" + (max_level - 1)).find(".node-select").removeAttr('name');
            $("#leveldiv" + max_level).find(".control-label").text("Select Connect Node");
            $("#leveldiv" + max_level).find(".control-label").attr('for', "level" + max_level);
            $("#leveldiv" + max_level).find(".node-select").attr('id', "level" + max_level);
            $("#leveldiv" + max_level).find(".node-select").attr('name', "node");
            $("#leveldiv" + max_level).show();
            initiateAjax('node', 'parent_id', id, ['id', 'name'], fillNodeSelect, 'level' + max_level);
        }
    }

    function updateSelect(parentId) {
        requestAjax('no_of_childs', parentId, createSelect);
    }

    function destroy_lower_select(levelId) {
        for (; max_level > levelId; ) {
            $("#leveldiv" + max_level).remove();
            max_level--;
        }
        reset_select_name_field();
    }

    function reset_select_name_field() {
        if (max_level > 1) {
            for (i = 1; i < max_level; i++) {
                $("#leveldiv" + i).find(".node-select").removeAttr('name');
            }
        }
        $("#level" + max_level).attr('name', "node");
    }

    $(document.body).on("change", ".node-select", function () {
        var selectId = $(this).attr("id");
        var level = parseInt(selectId.substring(5));
        destroy_lower_select(level);
        if ($("#" + selectId)[0].selectedIndex != 0) {
            var getValue = parseInt($(this).val());
            parent_id = getValue;
            updateSelect(getValue);
        } else {
            //                $('#subprograms option:eq(0)').attr("selected", true);
            //                $('#quiz option:eq(0)').attr("selected", true);
        }
    });
    
    $(document.body).on("change", "#quiz_type", function () {
      var type = $(this).val();
      if((type == "Practice") || (type == "Subjective")){
          $("#per_page").show();
      }else{
          $("#per_page").hide();
      }
    });
    
    $(document).ready(function () {
        if((quiz_type == "Practice") || (quiz_type == "Subjective")){
          $("#per_page").show();
      }
        $('#time_limit').timepicker({'step': '05', 'timeFormat': 'H:i:s', 'scrollDefault': '00:00:00'});
        $("#quiz_type").val(quiz_type);
        $("#mainForm").submit(function (e) {
            var selected_parent = $("#level" + max_level).val();
            if (selected_parent == 0) {
                alert("Select Connect Node");
                e.preventDefault(e);
                return 0;
            } else {
                return 1;
            }
        });
    });


</script>
<script>
   function validateForm() {
    var page = document.forms["mainForm"]["pagination"].value;
    if (page < 0  || page == 0) {
        alert("Pls enter a no greater than 0.");
        return false;
    }
}
</script>

<?php $this->load->view('html_end_view'); ?>