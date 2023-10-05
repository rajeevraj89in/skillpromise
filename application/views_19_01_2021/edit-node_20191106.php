<?php
$this->load->view('header_view');
$this->load->view('manager_left_view');
$filter[0]['id'] = "node";
$filter[0]['value'] = $id;
$req = array("packages");
//$packages = $this->main_model->get_many_records("packages-node", $filter, $req, "id");
$packages = $this->main_model->get_name_from_id("users-package", 'package', $_SESSION['user_id'], "users");
//foreach ($packages as $key => $value) {
//    echo $packages_name = $this->main_model->get_name_from_id("packages", "name", $value['packages'], "id");
//}
?>
<!--content panel start -->
<section class="col-md-9">
    <h1 class="page-header">Edit Node</h1>

    <!-- add-program-form content -->
    <div class="row">
        <div class="col-md-12">
            <form enctype="multipart/form-data" class="form-horizontal" role="form" action=" <?php echo base_url() . 'set/node'; ?>" method="POST">
                <input type="hidden" name="id" value = "<?php echo $id; ?>">
                <div id ="select_level_outer">
                    <!--                    <div class="form-group level-div" id="leveldiv1">
                                            <label for="level1" class="col-sm-3 control-label">Select Level 1</label>
                                            <div class="col-sm-9">
                                                <select class="form-control node-select" id="level1" name="parent_id" required>

                                                </select>
                                            </div>
                                        </div>-->

                    <?php
//                    var_dump($max_level);
                    if ($max_level == 1) {//if quiz at root level, or level not defined
                        echo '<div class="form-group level-div" id="leveldiv1">
                            <label for = "level1" class = "col-sm-3 control-label">Select Level 1</label>
                            <div class = "col-sm-9">
                            <select class = "form-control node-select" id = "level1" ';
                        echo 'name = "parent_id" required >';
                        echo $this->main_model->fill_node_select(0);
                        echo '</select>
                    </div>
                     </div>';
                    } else {
                        if (isset($baseNodes)) {
                            $nodes = array_reverse($baseNodes);
                            foreach ($nodes as $key => $value) {
                                echo '<div class="form-group level-div" id="leveldiv' . ($key + 1) . '">
                            <label for = "level' . ($key + 1) . '" class = "col-sm-3 control-label">Select Level ' . ($key + 1) . '</label>
                            <div class = "col-sm-9">
                            <select class = "form-control node-select" id = "level' . ($key + 1) . '" ';
                                if (($key + 1) == count($nodes)) {
                                    echo 'name = "parent_id" required ';
                                }
                                echo ' >';
                                echo $this->main_model->fill_node_select($value['parent_id'], $value['id']);
                                echo '</select>
                    </div>
                     </div>';
                            }
                        }
                    }
                    ?>
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
                <?php if ($type == 'Sheet') { ?>
                    <div class="package_class">
                        <?php
                        $child_data = $this->main_model->get_records('packages-node', 'node', $id)->result_array();
                        $package_list = array();
                        foreach ($child_data as $val) {
                            $package_list[] = $val['packages'];
                        }
//                    echo "<pre>";
//                    print_r($child_data);die;
//
                        echo '<input type="hidden" name="child_table" value = "packages-node">';
                        echo '<input type="hidden" name="foreign_id" value = "node">';

                        $request_fields = array('*');
                        $package_ids = $this->main_model->get_selected_records('packages', '', '', $request_fields);

                        echo '<div class="form-group" id="">';
                        echo '<label for="level1" class="col-sm-3 control-label">Package Name</label>';
                        foreach ($package_ids as $key => $rec) {
                            echo '<div class="col-sm-3">';
                            echo '<label class="checkbox-inline">';
                            $checked = '';

                            if (in_array($rec['id'], $package_list))
                                $checked = 'checked';

                            echo '<input name="children[' . ($key + 1) . '][packages]" type="checkbox" id="" value="' . $rec['id'] . '" ' . $checked . ' >' . $rec['name'];
                            echo '</label>';
                            echo '</div>';

                            if ((($key + 1) % 3) == 0)
                                echo'<div class="col-sm-3"> </div>';
                        }
                        echo "</div>";
                        ?>
                    </div>
                <?php }else {
                    ?>
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
                <?php } ?>

                <div class = "form-group">
                    <label for = "header" class = "col-sm-3 control-label">Node Header</label>
                    <div class = "col-sm-9">
                        <input type = "text" class = "form-control" id = "header" name = "header" value = "<?php echo $header; ?>" placeholder = "Node Header">
                    </div>
                </div>
                <div class = "form-group">
                    <label for = "name" class = "col-sm-3 control-label">Node Name</label>
                    <div class = "col-sm-9">
                        <input type = "text" class = "form-control" id = "name" name = "name" value = "<?php echo $name; ?>" placeholder = "Node Name" required>
                    </div>
                </div>
                <div class="form-group" id="package_id">
                    <label for="package_id" class="col-sm-3 control-label">Select Package</label>
                    <div class="col-sm-9">
                        <select class="form-control package_id" id="package_id" name="children">
                            <?php echo $this->main_model->fill_select_noheader("packages", "name", $packages); ?>
                        </select>
                    </div>
                </div>
                <div class = "form-group">
                    <label for = "sort_order" class = "col-sm-3 control-label">List Order</label>
                    <div class = "col-sm-9">
                        <input type = "text" class = "form-control" id = "sort_order" name = "sort_order" value = "<?php echo $sort_order; ?>" placeholder = "Sort Order Number" required>
                    </div>
                </div>

                <div class = "form-group">
                    <label for = "description" class = "col-sm-3 control-label">Node Description</label>
                    <div class = "col-sm-9">
                        <textarea class = "form-control" id = "inputName4" name = "description" placeholder = "Node Description"><?php echo $description;
                            ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="page_content" class="col-sm-3 control-label">Page Content</label>
                    <div class="col-sm-9">
                        <textarea class="skill_editor" name="page_content"><?php echo $page_content; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Photograph</label>
                    <div class="col-sm-9">
                        <img height="75px" width="75px" src="<?php
                        echo (base_url() . 'assets/img/' . 'uploads/');
                        if (empty($image_file)) {
                            echo 'no-image.jpg';
                        } else {
                            echo $image_file;
                        }
                        ?>"/>

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
                        <button type="submit" value="Submit" id="submit_form" class="btn btn-primary">Update</button>
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
    var parent_id = <?php echo $parent_id; ?>;
    var type = "<?php echo $type; ?>";
    function createSelect(parentId, noOfChild) {
        noOfChild = parseInt(noOfChild);
        if (noOfChild > 0) {
            var id = parseInt(parentId);
            $("#leveldiv1").clone().appendTo("#select_level_outer");
            max_level++;
            $(".level-div").filter(':last').attr('id', "leveldiv" + max_level);
            $("#leveldiv" + (max_level - 1)).find(".node-select").removeAttr('name');
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
        $("#type").val(type);
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

//    $(document).ready(function () {
//        $(".chosen").chosen();
//    });
</script>
<?php $this->load->view('html_end_view'); ?>