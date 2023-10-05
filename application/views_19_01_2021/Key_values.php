<?php
$this->load->view('header_view');
if ($_SESSION['role_name'] == "Student") {

    $this->load->view('home_left_view');
} else {
    $this->load->view('manager_left_view');
}
?>

<section class="col-md-9">
    <h1 class="page-header">Sheets</h1>
    <!-- add-program-form content -->


    <form id="mainForm" enctype="multipart/form-data" class="form-horizontal" role="form" action=" <?php echo base_url() . 'analytics/key_values' ?>" method="POST">
        <div class="row">
            <div class="col-md-12">
                <div id ="select_level_outer">
                    <div class="form-group space-bootom level-div" id="leveldiv" style="display:none">
                        <label for="" class="col-sm-3 control-label"></label>
                        <div class="col-sm-9">
                            <select class="form-control node-select">

                            </select>
                        </div>
                    </div>
                    <div class="form-group space-bootom level-div1" id="leveldiv1">
                        <label for="" class="col-sm-3 control-label">Level-1</label>
                        <div class="col-sm-9">
                            <select class="form-control node-select" id="level1" name="node" required>
                                <?php echo $this->main_model->fill_node_select(); ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <!--        </div>-->

        <!--        <div class = "row-fluid space-bootom ">
                    <div class = "span4 offset4 text-center">
                        <button type = "button" id = "show_node" class = "btn btn-success pull-right">Show Sheet</button>
                    </div>
                </div>-->




        <!--        </div>-->

        <div class="row">
            <div class="col-md-12">
                <!--                <div class="col-md-6">-->
                <!--                    <div id ="select_level_outer">
                                        <div class="form-group level-div" id="leveldiv1">-->
                <label for="level1" class="col-sm-3 control-label">Select Sheet</label>
                <div class="col-sm-9">
                    <br><select class="form-control sheet_id" id="sheet_id" name="sheet_id" required>
                    </select>
                </div>
            </div>
        </div>
        <!--        </div>-->
        <!--                <div class="col-md-6">
                            <div id ="select_level_outer">
                                <div class="form-group level-div" id="leveldiv1">
                                    <label for="level1" class="col-sm-3 control-label">Select Sheet</label>
                                    <div class="col-sm-9">
                                        <select class="form-control node-select" id="sheet_id" name="sheet_id" required>
        <?php // echo $this->main_model->fill_select("sheets", "name"); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>-->
        <!--            </div>
                </div>-->

        <!--  FOR ON CHANGING SHEET DISPLAY THEIR SECTIONS-->
        <div class="row-fluid" id="dew" style="display: none;">
            <div class="form-group">
                <label class="col-sm-3 control-label">Select a Section:</label>
                <div id="all_section" class="col-sm-9">

                </div>
            </div>
        </div>

        <!--      END  FOR ON CHANGING SHEET DISPLAY THEIR SECTIONS-->

        <div class = "row-fluid space-bootom ">
            <div class = "span4 offset4 text-center">
                <button type = "submit" id = "show" class = "btn btn-success pull-right">Show Result</button>
            </div>
        </div>
    </form>

</section>
</div><!-- end bigCallout-->

<!-- End Content and Sidebar
===================================================== -->
</div><!-- end main -->
<?php $this->load->view('footer_view'); ?>
<script>


    $('#sheet_id').change(function () {
        var sheet_id = $(this).val();
        //alert(sheet_id);
        if (sheet_id) {
            $("#dew").css("display", "block");
        } else {
            $("#dew").css("display", "none");
        }
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() . 'show_sections/'; ?>",
            data: {
                sheet_id: sheet_id

            },
            success: function (data)
            {
                //alert(data);
                var $subType = $('#all_section');
                var JSONobject = eval("(" + data + ")");
//                    alert(JSONobject);
                $subType.empty();
                $.each(JSONobject, function () {
                    $subType.append(" ");
                    $subType.append($('<input type="radio" name="section_id" checked>').attr("value", this.id).text(this.section_name));
                    $subType.append(" ");
                    $subType.append(this.section_name);
                });
            },
            error: function () {

                // alert("ajax error");
            }
        });
    });



</script>

<script>
    var max_level = 1;
    var parent_id = 0;
    function createselect(parentId, noOfChild) {
        noOfChild = parseInt(noOfChild);
        if (noOfChild > 0) {
            var id = parseInt(parentId);
            $("#leveldiv").clone().appendTo("#select_level_outer");
            max_level++;
            $(".level-div").filter(':last').attr('id', "leveldiv" + max_level);
            $("#leveldiv" + max_level).find(".control-label").text("Level-" + max_level);
            $("#leveldiv" + max_level).find(".control-label").attr('for', "level" + max_level);
            $("#leveldiv" + max_level).find(".node-select").attr('id', "level" + max_level);
//            $("#leveldiv" + max_level).find(".node-select").attr('name', "node[]");
            $("#leveldiv" + max_level).show();
            initiateAjax('node', 'parent_id', id, ['id', 'name'], fillNodeSelect, 'level' + max_level);
        }
    }

    function updateSelect(parentId) {
        requestAjax('no_of_childs', parentId, createselect);
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
//            alert(level);
        destroy_lower_select(level);
        if ($("#" + selectId)[0].selectedIndex != 0) {
            var getValue = parseInt($(this).val());
            parent_id = getValue;
            //alert(parent_id);
            $.ajax({
                type: "POST",
                url: "<?php echo base_url() . 'show_sheets/'; ?>",
                data: {
                    node: parent_id

                },

                success: function (data)
                {
//                    console.log(data);
                    var $subType = $('#sheet_id');
                    var JSONobject = eval("(" + data + ")");
//                    console.log(JSONobject);
                    $subType.empty();
                    $subType.append($('<option></option>').attr("value", "").text("--Select a Sheet--"));
                    $.each(JSONobject, function (i, v) {
//                        console.log(v);
                        $.each(v, function () {
                            $subType.append($('<option></option>').attr("value", this.id).text(this.name));
                        });
                    });
                },
                error: function () {

                    alert("ajax error");
                }
            });

            updateSelect(getValue);
        } else {

        }
    });

//    $(document).ready(function () {
//        $('#package_id').hide();
//        $("#mainForm").submit(function (e) {
//            var selected_parent = $("#level" + max_level).val();
//            if ((selected_parent = 0) && (max_level > 1)) {
//                alert("Select Parent Node");
//                e.preventDefault(e);
//                return 0;
//            } else {
//                return 1;
//            }
//        });
//    });
//




//    $(document).ready(function () {
//        $('#sheet_id').change(function () {
//            var sheet_id = $(this).val();
//            //alert(sheet_id);
//            if (sheet_id) {
//                $("#dew").css("display", "block");
//            } else {
//                $("#dew").css("display", "none");
//            }
//            $.ajax({
//                type: "POST",
//                url: "<?php // echo base_url() . 'show_sections/';                                                                                                                                                   ?>",
//                data: {
//                    sheet_id: sheet_id
//
//                },
//                success: function (data)
//                {
//                    //alert(data);
//                    var $subType = $('#all_section');
//                    var JSONobject = eval("(" + data + ")");
////                    alert(JSONobject);
//                    $subType.empty();
//                    $.each(JSONobject, function () {
//                        $subType.append(" ");
//                        $subType.append($('<input type="radio" name="section_id" checked>').attr("value", this.id).text(this.section_name));
//                        $subType.append(" ");
//                        $subType.append(this.section_name);
//                    });
//                },
//                error: function () {
//
//                    // alert("ajax error");
//                }
//            });
//        });
//    });


</script>
<?php $this->load->view('html_end_view'); ?>
