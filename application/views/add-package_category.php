<?php
$this->load->view('header_view');
$this->load->view('manager_left_view');
?>
<!--content panel start -->
<section class="col-md-9">
    <h1 class="page-header">Add Package Category</h1>

    <!-- add-program-form content -->
    <div class="row">
        <div class="col-md-12">
            <form enctype="multipart/form-data" class="form-horizontal" role="form" action=" <?php echo base_url() . 'set/package_category'; ?>" method="POST">
                <div id ="select_level_outer">
                    <div class="form-group level-div" id="leveldiv1">
                        <label for="level1" class="col-sm-3 control-label">Parent Category Level-1</label>
                        <div class="col-sm-9">
                            <select class="form-control node-select" id="level1" name="parent_id" required>
                                <?php // echo $this->main_model->fill_node_select_2(0, $_SESSION['customer'], 0, 'package_category'); ?>
                                <?php echo $this->main_model->fill_select('package_category', "name"); ?>
                            </select>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Category Name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="desc" class="col-sm-3 control-label">Description</label>
                    <div class="col-sm-9">
                        <textarea class="form-control skill_editor" id="desc" name="desc" placeholder="Description"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="image_file" class="col-sm-3 control-label">Select Icon Image</label>
                    <div class="col-sm-9">
                        <p class="help-block"><img onchange="readURL(this);
                                        src ="src="<?php echo (base_url() . 'assets/img/uploads/package_category/no-image.jpg'); ?>" id="currrentImg1" width="100" height="100" style="" alt="Current Image Show"></p>
                        <input type="file" id="icon_img" name="icon_img" accept="image/*"  onchange="showMyImage(this, 'currrentImg1')">
                        <p class="help-block">dimension(w*h):100*100</p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="image_file" class="col-sm-3 control-label">Select Banner Image</label>
                    <div class="col-sm-9">
                        <p class="help-block"><img onchange="readURL(this);
                                        src ="src="<?php echo (base_url() . 'assets/img/uploads/package_category/no-image.jpg'); ?>" id="currrentImg2" width="300" height="100" style="" alt="Current Image Show"></p>
                        <input type="file" id="image_file" name="image_file" accept="image/*"  onchange="showMyImage(this, 'currrentImg2')">
                        <p class="help-block">dimension(w*h):900*245</p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="image_file" class="col-sm-3 control-label">Select Slider Image</label>
                    <div class="col-sm-9">
                        <p class="help-block"><img onchange="readURL(this);
                                        src ="src="<?php echo (base_url() . 'assets/img/uploads/package_category/no-image.jpg'); ?>" id="currrentImg3" width="200" height="100" style="" alt="Current Image Show"></p>
                        <input type="file" id="slider_img" name="slider_img" accept="image/*"  onchange="showMyImage(this, 'currrentImg3')">
                        <p class="help-block">dimension(w*h):257*227</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Is Slider</label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" name="is_slider" id="Active" value="0" checked> No
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="is_slider" id="Inactive" value="1"> Yes
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
    function showMyImage(fileInput, currrentImg) {
        var files = fileInput.files;
        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var imageType = /image.*/;
            if (!file.type.match(imageType)) {
                continue;
            }
            var img = document.getElementById(currrentImg);
            img.file = file;
            var reader = new FileReader();
            reader.onload = (function (aImg) {
                return function (e) {
                    aImg.src = e.target.result;
                };
            })(img);
            reader.readAsDataURL(file);
        }
    }
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
            $("#leveldiv" + max_level).find(".control-label").text("Parent Category Level-" + max_level);
            $("#leveldiv" + max_level).find(".control-label").attr('for', "level" + max_level);
            $("#leveldiv" + max_level).find(".node-select").attr('id', "level" + max_level);
            $("#leveldiv" + max_level).find(".node-select").attr('name', "parent_id");
            $("#leveldiv" + max_level).show();
            initiateAjax('package_category', 'parent_id', id, ['id', 'name'], fillNodeSelect, 'level' + max_level);
        }
    }


    function updateSelect(parentId) {

        requestAjax('no_of_childs_package_category', parentId, createSelect);
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
//        alert(selectId);
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
<?php $this->load->view('html_end_view'); ?>