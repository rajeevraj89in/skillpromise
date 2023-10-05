<?php
$this->load->view('header_view');
$this->load->view('manager_left_view');
 foreach($package_sub_master as $package_sub_master)
 
?>

<!--content panel start -->
<section class="col-md-9">
    <h1 class="page-header">Edit Package Sub Master</h1>

    <!-- add-program-form content -->
    <div class="row">
        <div class="col-md-12">
            <form enctype="multipart/form-data"  class="form-horizontal" autocomplete="off" role="form"  action="<?php echo base_url(); ?>save_add_sub_package_master" method="POST" onsubmit="return check()">
                <input type="hidden" id="edit_id" name="id" value = "<?php echo $package_sub_master->id; ?>">
                <!--    <div class="form-group">-->
                <!--    <label for="name" class="col-sm-3 control-label">Package Sub Name</label>-->
                <!--    <div class="col-sm-9">-->
                        
                <!--        <input type="text" class="form-control" id="name" name="name" placeholder="Package Sub Name" required value = "<?php echo $package_sub_master->name; ?>">-->
                <!--    </div>-->
                <!--</div>-->
                  <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Select Package Master</label>
                    <div class="col-sm-9">
                        <select name="package_master_id" id="package_master_id" class="form-control" required>
                            <option value="">Select Package Master</option>
                            <?php
                            if($package_master){
                                foreach($package_master as $key => $value){
                                   ?>
                                   <option <?php if($value->id == $package_sub_master->package_master_id) echo 'Selected'; ?> value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>
                                   <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                
                 <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Package Name</label>
                    <div class="col-sm-9">
					     <input type="text" class="form-control" id="name" name="name" placeholder="Package Name" value="<?php echo $package_sub_master->name; ?>" required>
                         
                    </div>
                </div>
          
                <div class="form-group">
                    <label for="detailed_desc" class="col-sm-3 control-label">Package Description</label>
                    <div class="col-sm-9">
                        <textarea rows="6" class="form-control editor" id="description"  name="description" placeholder="Package Description"><?php echo $package_sub_master->description; ?></textarea>
                    </div>
                </div>
				
				<div class="form-group">
                    <label for="popup_description" class="col-sm-3 control-label">Package Pop up Description</label>
                    <div class="col-sm-9"> 
                        <textarea rows="6" class="form-control editor" id="popup_description"  name="popup_description" placeholder="Package Pop up Description"><?php echo $package_sub_master->popup_description; ?></textarea>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="image" class="col-sm-3 control-label">Image File</label>
                    <div class="col-sm-9">
                        <p class="help-block"><img onchange="readURL(this);"
                                src ="<?php echo (base_url() . $package_sub_master->image.' ')?>" id="currrentImg" width="100" height="100" style="" alt="Current Image Show">
                                </p>
                        <input type="file" id="image_file" name="image_file" accept="image/*"  onchange="showMyImage(this)">
                        <p class="help-block"></p>
                      
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
                    <label for="sort_order" class="col-sm-3 control-label">Sort Order</label>
                    <div class="col-sm-9">
					     <input type="text" class="form-control" id="sort_order" name="sort_order" placeholder="Sort Order" value="<?php echo $package_sub_master->sort_order; ?>" >
                         
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
            ['Misc', ['fullscreen', 'codeview', 'undo', 'redo', 'help', 'print']]
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