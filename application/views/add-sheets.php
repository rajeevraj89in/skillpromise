<?php
$this->load->view('header_view');
$this->load->view('manager_left_view');
?>
<!--content panel start -->
<section class="col-md-9">
    <h1 class="page-header">Add Sheets</h1>
    <!-- add-program-form content -->
    <div class="row">
        <div class="col-md-12">

            <form id="mainForm" enctype="multipart/form-data" class="form-horizontal" role="form" action=" <?php echo base_url() . 'set/sheets'; ?>" method="POST">
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
                    <label for="name" class="col-sm-3 control-label">Sheet Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Sheet Name" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="template_type" class="col-sm-3 control-label">Select Template Type</label>
                    <div class="col-sm-9">
                        <select type="text" class="form-control" id="template_type" name="template_type" required>
                            <!--                            <option value="">- Select a Type -</option>
                                                        <option value="1">Multiple choice and add more</option>
                                                        <option value="2">Multiple choice with no tooltip</option>
                                                        <option value="3">Single Tick</option>
                                                        <option value="4">List type</option>
                                                        <option value="5">Descriptive type</option>
                                                        <option value="6">Marking type</option>
                                                        <option value="7">Give Range</option>-->
                            <?php echo $this->main_model->select_template_types(""); ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="details" class="col-sm-3 control-label">Details</label>
                    <div class="col-sm-9">
<!--                        <input type="text-area" class="form-control" id="" name="details" placeholder="Sheet Details" required>-->
                        <textarea class="skill_editor" name="details" id="page_content"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="max_value" class="col-sm-3 control-label">Sheet Max Value</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="" name="max_value" placeholder="Enter overall maximum key values to select. " >
                    </div>
                </div>
                <div class="form-group">
                    <label for="max_value" class="col-sm-3 control-label">Analytics Image</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" name="image_file" id="image_file">
                    </div>
                </div>
                <div class="form-group">
                    <label for="max_value" class="col-sm-3 control-label">Image Comment</label>
                    <div class="col-sm-9">
                        <textarea class="skill_editor" name="image_comment" id="image_comment"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="max_value" class="col-sm-3 control-label">Analytics Comment</label>
                    <div class="col-sm-9">
                        <textarea class="skill_editor" name="analytics_comment" id="analytics_comment"></textarea>
                    </div>
                </div>


                <div class="form-group" id="cat_label">
                    <label for="cat_label" class="col-sm-3 control-label">Add Category Label</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="" name="cat_label" placeholder="Enter Label for Category. " >
                    </div>
                </div>

                <div class="form-group" id="act_label">
                    <label for="act_label" class="col-sm-3 control-label">Add Action Label</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="" name="act_label" placeholder="Enter Label for Action. " >
                    </div>
                </div>
              <div class="form-group" id="act_label">
                    <label for="button_label" class="col-sm-3 control-label">Add Button Label</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="" name="button_label" placeholder="Enter Label for Button. " >
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
                    <label class="col-sm-3 control-label">Show in Frontend</label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" name="show_in_frontend" id="show_in_frontend0" value="0" checked >  No
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="show_in_frontend" id="show_in_frontend1" value="1" >  Yes
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

    $(document).ready(function () {
        $("#cat_label").hide();
        $("#act_label").hide();
    });

    $(document.body).on("change", "#template_type", function () {
        var template_type = $("#template_type option:selected").text();
        if (template_type == "Dropdown with multi add_more") {
            $("#cat_label").show();
            $("#act_label").show();
        }
    });

</script>
<?php $this->load->view('html_end_view'); ?>
