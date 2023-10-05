<?php
$this->load->view('header_view');
$this->load->view('manager_left_view');
?>
<!--content panel start -->
<section class="col-md-9">
    <h1 class="page-header">Add Quiz Story</h1>
    <!-- add-program-form content -->
    <div class="row">
        <div class="col-md-12">

            <form id="mainForm" enctype="multipart/form-data" class="form-horizontal" role="form" action=" <?php echo base_url() . 'set/quiz_story'; ?>" method="POST">
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
                    <label for="name" class="col-sm-3 control-label">Quiz Story Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Quiz Story Name" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="page_content" class="col-sm-3 control-label">Story Content</label>
                    <div class="col-sm-9">
                        <textarea class="skill_editor" name="story_content" id="page_content"></textarea>
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
<?php $this->load->view('html_end_view'); ?>