<?php
$this->load->view('header_view');
$this->load->view('user_left_view');
?>
<section class="col-md-9">
    <h1 class="header_text"><?php
        $name = $this->main_model->get_name_from_id('sheets', 'name', $sheet_id, 'id');
        ?></h1>

    <!-- Table content -->
    <div class="row">
        <div class="col-md-12">
            <form id="mainForm" enctype="multipart/form-data" class="form-horizontal" role="form" action="<?php echo base_url() . 'set_data/save_data_dropdown_with_multi_addmore'; ?>" method="POST">
                <div> <?php echo $instruction; ?></div>
                <input type="hidden" value="<?php echo $sheet_id; ?>" id="sheet_id" name="sheet_id">
                <input type="hidden" value="<?php echo $sheet_section_id; ?>" id="sheet_section_id" name="sheet_section_id">
                <input type="hidden" value="<?php echo $checkbox; ?>" id="checkbox" >


                <div class="row">
                    <div class="col-md-12">
                        <!--EXTERNAL-->
                        <div id="ext_add_earn">
                            <div id="ext_earn" class="ext_etype" style="display: none;">
                                <div class="well">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label for="" class="col-sm-3 control-label"><?php echo $cat_label ?></label>
                                                <div class="col-sm-7">
                                                    <select class="form-control category">
                                                        <?php
                                                        echo $this->main_model->fill_select('dropdown_with_multi_addmore', 'category', '0', 'template_instruction_id', $sheet_section_id);
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="row cat_label">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label for="statement" class="col-lg-3 control-label"><?php echo $cat_label ?></label>
                                                <div class="col-lg-7">
                                                    <input type="text" class="form-control statement" placeholder="<?php echo $cat_label ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <legend class="scheduler-border text-center">Key Action Items</legend>

                                    <!--INTERNAL-->
                                    <div id="add_earn" class="internal_main_div">
                                        <div id="earn" class="etype col-md-12" style="display:none;">
                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    <label for="" class="col-sm-3 control-label"><?php echo $act_label ?></label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control action_value" placeholder="Add Action Items">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <span class="btn btn-xs btn-danger remove_earn" id="remove_earn0_0" onclick="removediv(this);">Remove Values</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group text-center">
                                        <span class="btn btn-sm btn-default inter_add_more_button" id="add_earn_div">Add Action Item</span>
                                    </div>

                                </div>

                                <!--<div class="row">-->
                                    <div class="form-group"> 
                                        
                                            <div class="col-md-2">
                                                <span class="btn btn-sm btn-danger ext_remove_earn" id="" onclick="ext_removediv(this)">Remove</span>
                                            </div>
                                            <div class="col-md-2"><span class="btn btn-sm btn-primary ext_add_more_button" id="ext_add_earn_div">Add More</span></div> 
                                    </div>


                            </div>
                        </div> 




                        <div class="row form-group">
                            <div class="col-sm-3">
                                <button type="submit" value="1" name="draft" class="btn btn-success">Save as Draft</button>
                            </div>
                            <div class="col-sm-3">
                                <button type="submit" value="0" name="draft" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div><!-- end Table content -->
                <!--        </div>
                    </div>-->
                </section><!-- end col-md-9 -->
                <!--end content panel start -->

        </div><!-- end bigCallout-->

        <!-- End Content and Sidebar
        ===================================================== -->
    </div><!-- end main -->
    <?php $this->load->view('footer_view'); ?>

    <script>
        var type = 0;
        function clone_add(ext_div_id) {

            var newId = "earn" + ext_div_id + "_" + type;
            var removeId = "remove_earn" + ext_div_id + "_" + type;

            $("#earn").clone().appendTo("#add_earn" + ext_div_id);
            //$(".etype").filter(':last').find(".ename").attr('id', "ename");
//            $(".etype").filter(':last').find(".amount").attr('id', "amount" + type);
            $(".etype").filter(':last').find(".action_value").attr('name', "impovement[" + ext_div_id + "][action_value][" + type + "]");
            $(".etype").filter(':last').find(".action_value").prop('required', true);
//            $(".etype").filter(':last').find(".amount").attr('name', "earn[" + type + "][amount]");
            // $(".etype").filter(':last').find(".amount").prop('required', true);
//            $(".etype").filter(':last').find(".amount").val("");
            $(".etype").filter(':last').find(".remove_earn").attr("id", removeId);
            // $(".etype" + ext_div_id).filter(':last').attr("id", newId);
            $(".etype").filter(':last').attr("id", newId);
            $(".etype").filter(':last').attr("style", "");
            //$("audio" + type).val(type);
            type++;

        }
//        function resetearnDivElementsAfterRemove(optionNumber, ext_opt) {
//            var optNumber = parseInt(optionNumber);
//            var ext_optNumber = parseInt(ext_opt);
//            for (i = optNumber; i <= type; i++) {
//                var targetIdNumber = i + 1;
//                var newId = "earn" + i;
//                var removeId = "remove_earn" + i;
//                //$('#' + 'earn' + targetIdNumber).find(".ename").attr('id', "ename");
////                $('#' + 'earn' + targetIdNumber).find(".amount").attr('id', "amount" + i);
////                $('#' + 'earn' + targetIdNumber).find(".ename").attr('name', "earn[" + i + "][name]");
////                $('#' + 'earn' + targetIdNumber).find(".amount").attr('name', "earn[" + i + "][amount]");
//                $('#' + 'earn' + targetIdNumber).find(".remove_earn").attr("id", removeId);
//                $('#' + 'earn' + targetIdNumber).attr("id", newId);
//            }
//        }
        function removediv(e) {
            if (type <= 1) {
                return;
            }
            var divId = $(e).parent().parent().attr('id');
            //alert(divId);
            var number = parseInt(divId.substring(6));
            var ext_number = parseInt(divId.substring(4));
            $("#" + divId).remove();
            type--;
//            if (number > 1) {//if removed div was not last one
//                resetearnDivElementsAfterRemove(number,ext_number);
//            }
        }


    </script>

    <script>
        var ext_type = 0;
        function ext_clone_add() {
            var newId = "ext_earn" + ext_type;
            var removeId = "ext_remove_earn" + ext_type;

            $("#ext_earn").clone().appendTo("#ext_add_earn");
            $(".ext_etype").filter(':last').find(".category").attr('name', "impovement[" + ext_type + "][category]");
            $(".ext_etype").filter(':last').find(".statement").attr('name', "impovement[" + ext_type + "][statement]");
            $(".ext_etype").filter(':last').find(".category").prop('required', true);
            $(".ext_etype").filter(':last').find(".ext_remove_earn").attr("id", removeId);
            $(".ext_etype").filter(':last').attr("id", newId);

            $(".ext_etype").filter(':last').find(".inter_add_more_button").attr("id", "add_earn_div" + ext_type);//set different id of internal add more button
            $(".ext_etype").filter(':last').find(".remove_earn").attr("id", "remove_earn0_" + ext_type);//set different id of internal remove button

            $(".ext_etype").filter(':last').find(".internal_main_div").attr("id", "add_earn" + ext_type);//set different id of internal div (main)
            //$(".ext_etype").filter(':last').find(".etype").addClass("etype" + ext_type);
            //$(".ext_etype").filter(':last').find(".etype" + ext_type).removeClass(".etype0_0");
            $(".ext_etype").filter(':last').attr("style", "");
            ext_type++;

            //clone_add(0);
        }
        function ext_resetearnDivElementsAfterRemove(optionNumber) {
            var optNumber = parseInt(optionNumber);
            for (i = optNumber; i <= ext_type; i++) {
                var targetIdNumber = i + 1;
                var newId = "ext_earn" + i;
                var removeId = "ext_remove_earn" + i;
                //$('#' + 'earn' + targetIdNumber).find(".ename").attr('id', "ename");
//                $('#' + 'ext_earn' + targetIdNumber).find(".amount").attr('id', "amount" + i);
                $('#' + 'ext_earn' + targetIdNumber).find(".category").attr('name', "impovement[" + i + "][category]");
                $('#' + 'ext_earn' + targetIdNumber).find(".statement").attr('name', "impovement[" + i + "][statement]");
                $('#' + 'ext_earn' + targetIdNumber).find(".ext_remove_earn").attr("id", removeId);
                $('#' + 'ext_earn' + targetIdNumber).attr("id", newId);
            }
        }
        function ext_removediv(e) {
            if (ext_type <= 1) {
                return;
            }
            var divId = $(e).parent().parent().attr('id');
            ///alert (divId);
            var number = parseInt(divId.substring(4));
            $("#" + divId).remove();
            ext_type--;
            if (number > 1) {//if removed div was not last one
                ext_resetearnDivElementsAfterRemove(number);
            }
        }
        $(document).ready(function () {
            ext_clone_add();
            clone_add(0);
            $('#ext_add_earn_div').click(function () {
                ext_clone_add();

            });

        });
        $(document.body).on('click', '.inter_add_more_button', function () {
            var id = $(this).attr('id'); // $(this) refers to button that was clicked
            var number = parseInt(id.substring(12));
            //alert(number);
            clone_add(number);
        });


        $(document.body).on("change", ".category", function () {
            var c = 0;
            var selectId = $(this).attr("id");
            var getValue = $(this).val();
            $(".category").each(function () {
                var val = $(this).val();
                if (val == getValue) {
                    c++
                }
            });
            if (c == 2) {
                alert("You select a duplicate value.... pls select another");
                $(this).val("");
            }
        });

        $(document).ready(function () {
            var checkbox = $("#checkbox").val();
            if (checkbox == "unchecked") {
                $(".cat_label").hide();
            } else {
                $("#cat_label").show();
            }
        });
    </script>

    <?php $this->load->view('html_end_view'); ?>
