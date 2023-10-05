<?php
$this->load->view('header_view');
$this->load->view('user_left_view');
?>
<section class="col-md-9">
    <h1 class="header_text"><?php
        $name = $this->main_model->get_name_from_id('sheets', 'name', $sheet_id, 'id');
        echo "$name";
        ?></h1>

    <!-- Table content -->
    <div class="row">
        <div class="col-md-12">
            <form id="mainForm" enctype="multipart/form-data" class="form-horizontal" role="form" action="<?php echo base_url() . 'set_data/save_data_dropdown_with_multi_addmore'; ?>" method="POST">
                <div> <?php echo $instruction; ?></div>
                <input type="hidden" value="<?php echo $sheet_id; ?>" name="sheet_id">
                <input type="hidden" value="<?php echo $sheet_section_id; ?>" name="sheet_section_id">



                <div class="row">
                    <div class="col-md-12">
                        <!--EXTERNAL-->
                        <div id="ext_add_earn">
                            
                            <?php
                            // echo "<pre>";
                            // print_r($draft_data);die;
                            if (isset($draft_data)) {
                                $i = 0;
                                foreach ($draft_data as $key => $value) {
                                    
                                    foreach($value as $kk => $kvalue){
                                        ?>
                                        <div id="ext_earn<?php echo $i; ?>" class="ext_etype" style="">
                                            <div class="well">
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <div class="form-group">
                                                            <div class="col-sm-3 control-label">
                                                                <label for="" ><?php echo $cat_label ?></label>
                                                            </div>
                                                            
                                                            <div class="col-sm-8">
                                                                <select class="form-control category" name="category[]">
                                                                    <option value=""> -- Select a option -- </option>
                                                                    <?php
                                                                      $select_dta1 = $this->main_model->select('dropdown_with_multi_addmore','*','id',array('template_instruction_id' => $sheet_section_id,'is_deleted' => 0,'status' => "Active" ));
                                                                      foreach($select_dta1 as $key1 => $value1){
                                                                          ?>
                                                                          <option value="<?php echo $value1->id; ?>" <?php if($value1->id == $key){echo "selected";} ?> ><?php echo $value1->category; ?></option>
                                                                          <?php
                                                                      }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <div class="form-group">
                                                            <div class="col-lg-3 control-label">
                                                                <label for="statement">Mention Area of Improvement / Mention Dream (Goals section)</label>
                                                            </div>
                                                            
                                                            <?php
                                                            // $statement = '';
                                                            // foreach ($value as $tem) {
                                                            //     $statement = $tem['statement'];
                                                            //     break;
                                                            // }
                                                            ?>
                                                            <div class="col-lg-8">
                                                                <input type="text" class="form-control statement" placeholder="Statement" value="<?php echo $kvalue['statement']; ?>" name="statement[]">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" id="add_earn<?php echo $i; ?>" class="internal_main_div">
                                                    <div id="earn<?php echo $i; ?>" class="etype col-md-12" style="">
                                                        <div class="col-md-10">
                                                            <div class="form-group">
                                                                <div class="col-sm-3 control-label">
                                                                    <label for="statement">Plan of Action (up to 200 words)</label>
                                                                </div>
                                                                
                                                                <div class="col-sm-8">
                                                                    <!--<input type="text" class="form-control action_value" name="impovement[<?php //echo $i; ?>][action_value][<?php// echo $j; ?>]" placeholder="Action Value" value="<?php// echo $value_row['action_values'] ?>">-->
                                                                    <textarea rows='10' cols='50' class="form-control action_value" name="action_value[]"><?php echo $kvalue['action_values'] ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
    
                                                        <!--<div class="col-md-2">-->
                                                        <!--    <span class="btn btn-sm btn-danger remove_earn" id="remove_earn<?php //echo $i; ?>_<?php echo $j; ?>" onclick="removediv(this);"><i class="fa fa-trash"></i></span>-->
                                                        <!--</div>-->
                                                    </div>
                                                </div>
                                            </div>
                                    
                                            <!--<div class="row">-->
                                            <div class="col-md-3">
                                                <span class="btn btn-sm btn-danger ext_remove_earn" id="ext_remove_earn<?php echo $i; ?>" onclick="ext_removediv(this);">Remove <?php echo $button_label; ?></span>
                                            </div><br><br>    
                                        </div>
                                        <?php
                                        $i++;
                                    }
                                    //$i++;
                                }
                            }
                            ?>
                        </div>
						
						<div id="ext_earn" class="ext_etype mt-2" >
                                <div class="well">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label for="" class="col-sm-3 control-label"><?php echo $cat_label ?></label>
                                                <div class="col-sm-8">
                                                    <select class="form-control category" name="category[]" >
                                                        <?php //echo $this->main_model->fill_select_action_sheets('dropdown_with_multi_addmore', 'category', '1', 'template_instruction_id', $sheet_section_id); ?>
                                                        <option value=""> -- Select a option -- </option>
                                                        <?php
                                                          $select_dta = $this->main_model->select('dropdown_with_multi_addmore','*','id',array('template_instruction_id' => $sheet_section_id,'is_deleted' => 0,'status' => "Active" ));
                                                          foreach($select_dta as $key => $value){
                                                              ?>
                                                              <option value="<?php echo $value->id; ?>"><?php echo $value->category; ?></option>
                                                              <?php
                                                          }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label for="statement" class="col-lg-3 control-label">Mention Area of Improvement / Mention Dream (Goals section)</label>
                                                <div class="col-lg-8">
                                                    <input type="text" class="form-control statement" placeholder="<?php echo $button_label ?>" name="statement[]" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <legend class="scheduler-border text-center">Plan of Action for Development or Improvisation</legend> -->

                                    <!--INTERNAL-->
                                    <div class="row" id="add_earn" class="internal_main_div">
                                        <div id="earn" class="etype col-md-12">
                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    <label for="" class="col-sm-3 control-label">Plan of Action (up to 200 words)</label>
                                                    <div class="col-sm-8">
                                                        <!--<input type="text" class="form-control action_value" placeholder="Action Value">-->
                                                        <textarea rows='10' cols='50' name="action_value[]" class="form-control action_value"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--<div class="col-md-2">-->
                                            <!--    <span class="btn btn-sm btn-danger remove_earn" id="remove_earn0_0" onclick="removediv(this);"><i class="fa fa-trash"></i></span>-->
                                            <!--</div>-->
                                        </div>
                                    </div>
                                    <!--<div class="form-group text-center">-->
                                    <!--    <span class="btn btn-sm btn-default inter_add_more_button" id="add_earn_div">Add Action Item</span>-->
                                    <!--</div>-->

                                </div>

                                <!--<div class="row">-->
                                <div class="col-md-3">
                                    <span class="btn btn-sm btn-danger ext_remove_earn" id="" onclick="ext_removediv(this)">Remove <?php echo $button_label; ?></span>
                                </div><br><br>
                            </div>
						
                        <div class="row text-center">
                            <div class="" style="margin-top: -4rem;  float: right;  margin-right: 4rem;">
                                <span class="btn btn-sm btn-primary ext_add_more_button" id="ext_add_earn_div">Add <?php echo $button_label; ?></span>
                            </div>
                        </div>




                        <div class="row form-group mt-2">
                            <div class="col-sm-12">
                                <center>
                                    <button type="submit" value="0" name="draft" class="btn btn-success">Save as Draft</button>&nbsp;
                                    <button type="submit" value="1" name="draft" class="btn btn-success">Submit</button>
                                </center>
                            </div>
                            <!--<div class="col-sm-3">-->
                            <!--    <button type="submit" value="0" name="draft" class="btn btn-success">Submit</button>-->
                            <!--</div>-->
                        </div>
                        </form>
                    </div>
                </div><!-- end Table content -->
                </section><!-- end col-md-9 -->
                <!--end content panel start -->

        </div><!-- end bigCallout-->

        <!-- End Content and Sidebar
        ===================================================== -->
    </div><!-- end main -->
    <?php $this->load->view('footer_view'); ?>

    <script>
        var type = <?php echo $j; ?>;
        // function clone_add(ext_div_id) {

        //     var newId = "earn" + ext_div_id + "_" + type;
        //     var removeId = "remove_earn" + ext_div_id + "_" + type;
        //     $("#earn").clone().appendTo("#add_earn" + ext_div_id);
        //     $(".etype").filter(':last').find(".action_value").attr('name', "impovement[" + ext_div_id + "][action_value][" + type + "]");
        //     $(".etype").filter(':last').find(".action_value").prop('required', true);
        //     $(".etype").filter(':last').find(".remove_earn").attr("id", removeId);
        //     $(".etype").filter(':last').attr("id", newId);
        //     $(".etype").filter(':last').attr("style", "");
        //     type++;
        // }
        function removediv(e) {
            if (type <= 1) {
                return;
            }
            var divId = $(e).parent().parent().attr('id');
            var number = parseInt(divId.substring(6));
            var ext_number = parseInt(divId.substring(4));
            $("#" + divId).remove();
            type--;
        }


    </script>

    <script>
        var ext_type = <?php echo $i; ?>;
        function ext_clone_add() {
            var newId = "ext_earn" + ext_type;
            var removeId = "ext_remove_earn" + ext_type;

            $("#ext_earn").clone().appendTo("#ext_add_earn");
            $(".ext_etype").filter(':last').find(".category").attr('name', "category[]");
            $(".ext_etype").filter(':last').find(".statement").attr('name', "statement[]");
            $(".ext_etype").filter(':last').find(".action_value").attr('name', "action_value[]");
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
            //alert(divId);
            var number = parseInt(divId.substring(4));
            $("#" + divId).remove();
            ext_type--;
            if (number > 1) {//if removed div was not last one
                ext_resetearnDivElementsAfterRemove(number);
            }
        }



        $(document).ready(function () {
            $('#ext_add_earn_div').click(function () {
                ext_clone_add();

            });

        });


        $(document.body).on('click', '.inter_add_more_button', function () {
            var id = $(this).attr('id'); // $(this) refers to button that was clicked
            var number = parseInt(id.substring(12));
            //            alert(id);
            clone_add(number);
        });


        // $(document.body).on("change", ".category", function () {
        //     var c = 0;
        //     var selectId = $(this).attr("id");
        //     var getValue = $(this).val();
        //     $(".category").each(function () {
        //         var val = $(this).val();
        //         if (val == getValue) {
        //             c++;
        //         }
        //     });
        //     if (c == 2) {
        //         alert("You select a duplicate value.... pls select another");
        //         $(this).val("");
        //     }
        // });

    </script>

    <?php $this->load->view('html_end_view'); ?>
