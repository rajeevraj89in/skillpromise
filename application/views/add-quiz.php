<?php
$this->load->view('header_view');
$this->load->view('manager_left_view');
?>
<!--content panel start -->
<section class="col-md-9">
    <h1 class="page-header">Add Quiz</h1>
    <!-- add-program-form content -->
    <div class="row">
        <div class="col-md-12">

            <form id="mainForm" name="mainForm" enctype="multipart/form-data" class="form-horizontal" role="form" action=" <?php echo base_url() . 'set/quiz'; ?>" method="POST" onsubmit="return validateForm()">
                <div id ="select_level_outer">
                    <div class="form-group level-div" id="leveldiv1">
                        <label for="level1" class="col-sm-3 control-label">Select Connect Node</label>
                        <div class="col-sm-9">
                            <select class="form-control node-select" id="level1" name="node" required>
                                <?php echo $this->main_model->fill_node_select(); ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Quiz Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Quiz Name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-3 control-label">Quiz Description</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="description" name="description" placeholder="Quiz Description"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="page_content" class="col-sm-3 control-label">Page Content</label>
                    <div class="col-sm-9">
                        <textarea class="skill_editor" name="page_content" id="page_content"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="time_limit" class="col-sm-3 control-label">Select Time Limit</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="time_limit" name="time_limit" placeholder="Time Limit">
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



                <!--Choose if the quiz is topic type or Comprehensive type-->
                <div class="form-group">
                    <label for="quiz_category" class="col-sm-3 control-label">Select Quiz Category</label>
                    <div class="col-sm-9">
                        <select class="form-control" id="quiz_category" name="quiz_category">
                            <option value="">Select Quiz Category</option>
                            <option value="TopicWise">Topic Wise</option>
                            <option value="Comprehensive">Comprehensive</option>
                        </select>
                    </div>
                </div>

                <!--Choose if the quiz is topic type or Comprehensive type-->




                <div class="form-group" id="per_page">
                    <label for="pagination" class="col-sm-3 control-label">No. Of Questions(Per Page)</label>
                    <div class="col-sm-9">
                        <input type="number" id="pagination" name="pagination" class="form-control" value="5" title="Pls enter a number greater than 0." required="">
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
                    <label for="option_numbering" class="col-sm-3 control-label">Options Naming</label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" name="option_numbering" id="option_name" value="1" checked> Show Option Name
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="option_numbering" id="no-option-name" value="0"> Without Option Name
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Status</label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" name="status" id="Active" value="Active" checked> Active
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="status" id="Inactive" value="Inactive"> Inactive
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-10">
                        <button type="submit" value="Submit" class="btn btn-primary">Add</button>
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
    var parent_id = 0;
    var max_level = 1;
    var parentlevel = 0;
    $(document).ready(function () {
        $('#time_limit').timepicker({'step': '05', 'timeFormat': 'H:i:s', 'scrollDefault': '00:00:00'});
        $("#per_page").hide();
    });

    function createSelect(parentId, noOfChild) {
        noOfChild = parseInt(noOfChild);
        if (noOfChild > 0) {
            var id = parseInt(parentId);
            $("#leveldiv1").clone().appendTo("#select_level_outer");
            max_level++;
            parentlevel = max_level - 1;
            $(".level-div").filter(':last').attr('id', "leveldiv" + max_level);
            $("#leveldiv" + parentlevel).find(".node-select").removeAttr('name');
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
            reset_select_name_field();
        }
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
        if ((type == "Practice") || (type == "Subjective")) {
            $("#per_page").show();
        } else {
            $("#per_page").hide();
        }
    });

    $(document).ready(function () {
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
        if (page < 0 || page == 0) {
            alert("Pls enter a no greater than 0.");
            return false;
        }
    }
</script>
<?php $this->load->view('html_end_view'); ?>