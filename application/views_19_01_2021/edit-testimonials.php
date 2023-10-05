<?php
$this->load->view('header_view');
$this->load->view('manager_left_view');
$details = $this->main_model->get_records_from_id("testimonials", $id, 'id');
?>
<!--content panel start -->
<section class="col-md-9">
    <h1 class="page-header">Edit Testimonials</h1>

    <!-- add-program-form content -->
    <div class="row">
        <div class="col-md-12">
            <form enctype="multipart/form-data"  class="form-horizontal" autocomplete="off" role="form"  action="<?php echo base_url(); ?>set/testimonials" method="POST" onsubmit="return check()">



                <!--                <div id ="select_level_outer">
                                    <div class="form-group level-div" id="leveldiv1">
                                        <label for="level1" class="col-sm-3 control-label">Package Category Level-1</label>
                                        <div class="col-sm-9">
                                            <select class="form-control node-select" id="level1" name="category" required>
                <?php //echo $this->main_model->fill_select('package_category', "name"); ?>
                <?php // echo $this->main_model->fill_node_select_2(0, $_SESSION['customer'], 0, 'package_category'); ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>-->
                <input type="hidden" id="edit_id" name="id" value = "<?php echo $id; ?>">
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Category</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Package Name" required value = "<?php echo $details['name']; ?>">
                    </div>
                </div>
                <!--                <div class="form-group">
                                    <label for="address" class="col-sm-3 control-label">Brief Description(include-1)</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" id="address" name="brief_desc" placeholder="Description"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="quiz_desc" class="col-sm-3 control-label">Quiz Description(include-2)</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" id="quiz_desc"  name="quiz_desc" placeholder="Description"></textarea>
                                    </div>
                                </div>-->
                                <div class="form-group">
                    <label for="detailed_desc" class="col-sm-3 control-label">Content</label>
                    <div class="col-sm-9">
                        <textarea class="form-control editor" id="detailed_desc"  name="detailed_desc" placeholder="Testimonials Description"><?php echo $details['detailed_desc']; ?></textarea>
                    </div>
                </div>
                
               <div class="form-group">
                    <label for="author" class="col-sm-3 control-label">Author</label>
                    <div class="col-sm-9">
                        <textarea class="form-control editor_" id="author"  name="author" placeholder="Description"><?php echo $details['author'];?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="detailed_desc" class="col-sm-3 control-label">Imane File</label>
                    <div class="col-sm-9">
                        <input type="file" name="image_file" id="image_file"> 
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
                        <button type="submit"  class="btn btn-primary">Update</button>
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
<?php $this->load->view('html_end_view'); ?>
<script>
    $('.editor').summernote({
        toolbar: [
            ['style', ['style', 'bold', 'italic', 'underline', 'clear', ]],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontname', ['fontname']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['insert', ['picture', 'link', 'video', 'table']],
            ['inse', [, 'hr']],
            ['Misc', ['fullscreen', 'undo', 'redo', 'help', 'print']]
        ], height: 280,
    });
    function showMyImage(fileInput) {
        var files = fileInput.files;
        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var imageType = /image.*/;
            if (!file.type.match(imageType)) {
                continue;
            }
            var img = document.getElementById("currrentImg");
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
    function isNumber(evt, element) {
        var intputElements = element.id;
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (
                //(charCode != 45 || $(element).val().indexOf('-') != -1) &&      // “-” CHECK MINUS, AND ONLY ONE.
                        (charCode != 46 || $(element).val().indexOf('.') != -1) && // “.” CHECK DOT, AND ONLY ONE.
                        (charCode < 48 || charCode > 57)) {
            $("#" + intputElements).attr('placeholder', "Digit only...");
            $("#" + intputElements).parent().parent().addClass("has-warning");
            return false;
        } else {
            $("#" + intputElements).parent().parent().removeClass("has-warning");
            return true;
        }
    }

    function isNumberint(evt, element) {
        var intputElements = element.id;
        var charCode = (evt.which) ? evt.which : event.keyCode

        if (
                //(charCode != 45 || $(element).val().indexOf('-') != -1) &&      // “-” CHECK MINUS, AND ONLY ONE.
                        // (charCode != 46 || $(element).val().indexOf('.') != -1) && // “.” CHECK DOT, AND ONLY ONE.
                                (charCode < 48 || charCode > 57)) {
                    $("#" + intputElements).attr('placeholder', "Digit only...");
                    $("#" + intputElements).parent().parent().addClass("has-warning");
                    return false;
                } else {
                    $("#" + intputElements).parent().parent().removeClass("has-warning");
                    return true;
                }
            }
            $(document.body).on("keypress", ".groupOfTexbox", function (event) {
                return isNumber(event, this)

            });
            $(document.body).on("focusout", ".groupOfTexbox", function (event) {
                var intputElements = this.id;
                $("#" + intputElements).parent().parent().removeClass("has-warning");

            });
            $(document.body).on("keypress", ".groupOfint", function (event) {
                return isNumberint(event, this)

            });
            $(document.body).on("focusout", ".groupOfint", function (event) {
                var intputElements = this.id;
                $("#" + intputElements).parent().parent().removeClass("has-warning");

            });

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
                    $("#leveldiv" + max_level).find(".control-label").text("Package Category Level-" + max_level);
                    $("#leveldiv" + max_level).find(".control-label").attr('for', "level" + max_level);
                    $("#leveldiv" + max_level).find(".node-select").attr('id', "level" + max_level);
                    $("#leveldiv" + max_level).find(".node-select").attr('name', "category");
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
//                alert(selectId);
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
                $("#package_form").submit(function (e) {
                    var selected_parent = $("#level" + max_level).val();
                    alert(selected_parent);
                    return 0;

                    if ((selected_parent = 0) && (max_level > 1)) {
                        alert("Select Parent Node");
                        e.preventDefault(e);
                        return 0;
                    } else {
                        return 1;
                    }
                });
            });

            function check() {
                var selected_parent = $("#level" + max_level).val();
                if (selected_parent == 0) {
                    alert("Select Package Category");
                    return false;
                } else if ($("#name").val() == "") {
                    alert("Please Enter Name");
                    return false;
                } else if ($("#duration").val() == "") {
                    alert("Please Enter Duration");
                    return false;
                } else if ($("#no_of_quiz").val() == "") {
                    alert("Please Enter No. of quiz");
                    return false;
                } else if ($("#price").val() == "") {
                    alert("Please Enter Price");
                    return false;
                } else {
                    return true;
                }

            }
</script>