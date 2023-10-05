<?php
$this->load->view('header_view');
$this->load->view('manager_left_view');
?>
<!--content panel start -->
<section class="col-md-9">
    <h1 class="page-header">Add Node</h1>

    <!-- add-program-form content -->
    <div class="row">
        <div class="col-md-12">
            <form enctype="multipart/form-data" class="form-horizontal" role="form" action=" <?php echo base_url() . 'set/node'; ?>" method="POST">
                <div id ="select_level_outer">
                    <div class="form-group level-div" id="leveldiv1">
                        <label for="level1" class="col-sm-3 control-label">Select Level 1</label>
                        <div class="col-sm-9">
                            <select class="form-control node-select" id="level1" name="parent_id" required>
                                <?php echo $this->main_model->fill_node_select(); ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="type" class="col-sm-3 control-label">Select Node Type</label>
                    <div class="col-sm-9">
                        <select class="form-control node_type" id="type" name="type" required>
                            <option value="Module" selected>Module</option>
                            <option value="Quiz">Quiz</option>
                            <option value="Content">Content</option>
                            <option value="Sheet">Sheet</option>
                        </select>
                    </div>
                </div>
                <div class="package_class" style="display: none;">
                    <?php
                    echo '<input type="hidden" name="child_table" value = "packages-node">';
                    echo '<input type="hidden" name="foreign_id" value = "node">';
                    $request_fields = array('*');
                    $package_ids = $this->main_model->get_selected_records('packages', '', '', $request_fields);

                    echo '<div class="form-group" id="">';
                    echo '<label for="level1" class="col-sm-3 control-label">Package Name</label>';
                    foreach ($package_ids as $key => $rec) {

                        echo '<div class="col-sm-3">';
                        echo '<label class="checkbox-inline">';
                        echo '<input name="children[' . ($key + 1) . '][packages]" type="checkbox" id="" value="' . $rec['id'] . '">' . $rec['name'];
                        echo '</label>';
                        echo '</div>';

                        if ((($key + 1) % 3) == 0)
                            echo'<div class="col-sm-3"> </div>';
                    }
                    echo "</div>";
                    ?>
                </div>

                <div class="form-group">
                    <label for="header" class="col-sm-3 control-label">Node Header</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="header" name="header" placeholder="Node Header">
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Node Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Node Name" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="sort_order" class="col-sm-3 control-label">List Order</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="sort_order" name="sort_order" placeholder="Sort Order Number" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description" class="col-sm-3 control-label">Node Description</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="inputName4" name="description" placeholder="Node Description"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="page_content" class="col-sm-3 control-label">Page Content</label>
                    <div class="col-sm-9">
                        <textarea class="skill_editor" name="page_content"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="node_image" class="col-sm-3 control-label">Select Image</label>
                    <div class="col-sm-9">
                        <input type="file" id="image_file" name="image_file">
                        <p class="help-block">File size would be between 1KB to 14MB</p>
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
                        <button type="submit" value="Submit" id="submit_form" class="btn btn-primary">Add</button>
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
    function createSelect(parentId, noOfChild) {
        noOfChild = parseInt(noOfChild);
        if (noOfChild > 0) {
            var id = parseInt(parentId);
            $("#leveldiv1").clone().appendTo("#select_level_outer");
            max_level++;
            parentlevel = max_level - 1;
            $(".level-div").filter(':last').attr('id', "leveldiv" + max_level);
            $("#leveldiv" + parentlevel).find(".node-select").removeAttr('name');
            $("#leveldiv" + max_level).find(".control-label").text("Select Level " + max_level);
            $("#leveldiv" + max_level).find(".control-label").attr('for', "level" + max_level);
            $("#leveldiv" + max_level).find(".node-select").attr('id', "level" + max_level);
            $("#leveldiv" + max_level).find(".node-select").attr('name', "parent_id");
            $("#leveldiv" + max_level).show();
            initiateAjax('node', 'parent_id', id, ['id', 'name'], fillNodeSelect, 'level' + max_level);
        }
    }


    function updateSelect(parentId) {

        requestAjax('no_of_childs', parentId, createSelect);
//            alert(no_of_childs);
//            no_of_childs = parseInt(no_of_childs);
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
        $("#level" + max_level).attr('name', "parent_id");
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
            if ((selected_parent = 0) && (max_level > 1)) {
                alert("Select Parent Node");
                e.preventDefault(e);
                return 0;
            } else {
                return 1;
            }
        });
    });
//    $(document).ready(function () {
//        $(".node-select").change(function () {
//            var getValue = $(this).val();
//            initiateAjax('subprograms', 'program_id', getValue, ['id', 'name'], fillSelect, 'subprograms');
//        });
//    });

</script>
<script>
    $(document.body).on("change", ".node_type", function () {
        var node_type = $("#type").val();
        if (node_type == 'Sheet') {
            $('.package_class').show();
        } else {
            $('.package_class').hide();
        }
    });
</script>
<?php $this->load->view('html_end_view'); ?>