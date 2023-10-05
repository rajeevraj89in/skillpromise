<?php
$this->load->view('header_view');
$this->load->view('manager_left_view');
?>

<!--content panel start -->
<section class="col-md-9">
    <h1 class="page-header">Manage Our Clients</h1>
    <div class="row text-center">
        <div class="col-md-12">
            <a class="btn btn-primary" href="<?php echo base_url() . 'add/our_clients'; ?>">Add Our Client</a>
        </div>
    </div>
    <hr>
    <!-- add-program-form content -->
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered" id="content">
                    <thead>
                        <tr>
                            <th>Sl. No.</th>
                            <th>Client Name</th>
                            <th>Client Type</th>
                            <th>Image File</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            <!--<th class="text-center" colspan="2">Action</th>-->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $tbl_str = "";
                        $count = 1;
                        foreach ($data as $rec) {
                            $tbl_str .= '<tr class="post">'
                                . "<td>" . $count++ . "</td>"
                                . "<td>" . $rec['client_name'] . "</td>"
                                . "<td>" . $rec['client_type'] . "</td>"
                                . "<td><img style='height:200px;width:180px' src='" . base_url() . "assets/img/uploads/clients/" . $rec['image_file'] . "'> </td>"
                                . "<td>" . $rec['status'] . "</td>"
                                . '<td class="text-center"><a href=' . base_url() . "edit/our_clients/" . $rec['id'] . '><span class="glyphicon glyphicon-pencil"></span></a></td>'
                                . '<td class="text-center"><a href="#" class="delete" data-url="' . base_url() . "delete/our_clients/" . $rec['id'] . '"><span class="glyphicon glyphicon-trash"></span></a></td>'
                                . "</tr>";
                        }
                        echo $tbl_str;
                        ?>
                    </tbody>
                </table>
            </div>
            <!--<ul id="pagination" class="pagination light-theme simple-pagination"><li class="active"><span class="current prev">Prev</span></li><li class="active"><span class="current">1</span></li><li><a class="page-link" href="#page-2">2</a></li><li><a class="page-link" href="#page-3">3</a></li><li><a class="page-link next" href="#page-2">Next</a></li></ul>-->
        </div>
    </div><!-- end add-program-form content -->
</section><!-- end col-md-9 -->
<!--end content panel start -->

</div><!-- end bigCallout-->
<div class="modal fade" id="update_info" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">
                    Alert!
                </h4>
            </div>
            <div class="modal-body">Are you sure, You want to delete?
            </div>
            <div class="modal-footer">
                <a id="sureDelete"><button type="button" class="btn btn-danger">Yes</button></a>
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>

            </div>
        </div>
    </div>
</div>
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
        ],
        height: 280,
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
            reader.onload = (function(aImg) {
                return function(e) {
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
    $(document.body).on("keypress", ".groupOfTexbox", function(event) {
        return isNumber(event, this)

    });
    $(document.body).on("focusout", ".groupOfTexbox", function(event) {
        var intputElements = this.id;
        $("#" + intputElements).parent().parent().removeClass("has-warning");

    });
    $(document.body).on("keypress", ".groupOfint", function(event) {
        return isNumberint(event, this)

    });
    $(document.body).on("focusout", ".groupOfint", function(event) {
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
        for (; max_level > levelId;) {
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

    $(document.body).on("change", ".node-select", function() {

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

    $(document).ready(function() {
        $("#package_form").submit(function(e) {
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

    $(document.body).on("click", ".delete", function() {

        $("#sureDelete").attr("href", $(this).data('url'));
        $('#update_info').modal('show');

    });
</script>