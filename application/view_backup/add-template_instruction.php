<?php
$this->load->view('header_view');
$this->load->view('manager_left_view');
?>
<!--content panel start -->
<section class="col-md-9">
    <h1 class="header_text">Add Template Instructions:<font color="green"><?php 
    echo $this->main_model->get_name_from_id('sheets', 'name', $sheet_id);
    ?></font></h1>
    <div class="row">
        <div class="col-md-12">
            <form id="mainForm" enctype="multipart/form-data" class="form-horizontal" role="form" action=" <?php echo base_url() . 'set_data/template_instruction'; ?>" method="POST">
                <input type="hidden" name="sheet_id" value = "<?php echo $sheet_id; ?>">
                <input type="hidden" name="template_id" value = "<?php echo $template_id; ?>">
                <div class="form-group section_container_div" id="section_container_div">
                    <div class="col-xs-12 section_div" id="section_div0" style="">
                        <div class="well col-sm-12">
                            <div class="form-group">
                                <label for="section_text" class="col-sm-3 control-label section_text">Section Name </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control section_text" name="section_name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="section_type" class="col-sm-3 control-label">Section Type </label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="section_type" name="section_type">
                                        <?php echo $this->main_model->select_section_types(""); ?>
                                    </select>
                                </div>
                            </div>
                          
                            <div class="form-group">
                                <label for="order" class="col-sm-3 control-label">Sort order </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="order" name="sort_order">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="instruction_text" class="col-sm-3 control-label instruction_text">Section Instruction </label>
                                <div class="col-sm-9">
                                    <textarea id="" class="skill_editor_2" name="instruction_text"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                
                <!-- MUSARRAT : FOR TICKMARK ADVANCE TYPE ONLY-->
                <div class="form-group" id="tick_mark_main_div1" style="display: none;">
                    <div class="col-xs-12" id="" style="">
                        <div class="well col-sm-12" id="">
                            <label for="" class="col-sm-6">Table Header Name 1 </label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control " name="header_name1" placeholder="Header1 i.e, Attitudinal Strengths."><br>
                            </div>

                            <label for="" class="col-sm-6">Table Header Name 2 </label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control " name="header_name2" placeholder="Header2 i.e, Attitudinal Area of Improvement.">
                            </div>
                        </div>
                    </div>
                </div>
                <!--end MUSARRAT TICKMARK ADVANCE TYPE-->
                
                
                <!-- DEWANGSHU : FOR TICKMARK TYPE ONLY-->
                <div class="form-group" id="tick_mark_main_div" style="display: none;">
                    <div class="col-xs-12" id="" style="">
                        <div class="well col-sm-12" id="enclosures_container">
                            <div class="form-group enclo_row" id="enclo_row" style="display: none;">
                                <label for="" class="col-sm-3 control-label">Table Header Name and Type </label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control header_name" id="" placeholder="Header Text/Name">
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control header_type" id="" >
                                        <option value="question_header" >Question Header</option>
                                        <option value="option_header" >Option Header</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <input type="button" class="removedoc btn btn-danger btn-sm" onclick="removeEnclo(this);" value="Remove" id="removedoc1">
                                </div>
                            </div> 
                            
                        </div>
                        <div class="form-group text-center">
                                <button class="btn btn-sm btn-success" type="button" id="addEnclo">Add More</button>
                        </div>
                    </div>
                </div>
                <!--end DEWANGSHU TICKMARK TYPE-->
                
                
                
                <!-- DEWANGSHU : FOR MARKING TYPE ONLY(for save the ques. header,ans header,marks-->
                <div class="form-group" id="marking_main_div" style="display: none;">
                    <div class="col-xs-12" id="" style="">
                        <div class="well col-sm-12" id="m_enclosures_container">
                            <div class="form-group m_enclo_row" id="m_enclo_row" style="display: none;">
                                <label for="" class="col-sm-3 control-label">Marking Type Data: </label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control m_header_name" id="" placeholder="Header Text/Name">
                                </div>
                                <div class="col-sm-2">
                                    <select class="form-control m_header_type" id="" >
                                        <option value="question_header" >Question Header</option>
                                        <option value="option_header" >Option Header</option>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control m_marks" id="" placeholder="Marks">
                                </div>
                                <div class="col-sm-2">
                                    <input type="button" class="m_removedoc btn btn-danger btn-sm" onclick="m_removeEnclo(this);" value="Remove" id="m_removedoc1">
                                </div>
                            </div> 
                            
                        </div>
                        <div class="form-group text-center">
                                <button class="btn btn-sm btn-success" type="button" id="m_addEnclo">Add More</button>
                        </div>
                    </div>
                </div>
                <!--end DEWANGSHU : FOR MARKING TYPE ONLY(for save the ques. header,ans header,marks-->
                
                
                <hr />
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-10">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</section><!-- end col-md-9 -->
<!--end content panel start -->

</div><!-- end bigCallout-->

<!-- End Content and Sidebar
===================================================== -->
</div><!-- end main -->
<?php $this->load->view('footer_view'); ?>

<script>
    //-----------FOR TICK MARK ADVANCE TPYE----
    $("#section_type").on("change", function () {
        section_type_id = $(this).val();
        if (section_type_id == 9) {
            $("#tick_mark_main_div1").css("display", "block");
        } else {
            $("#tick_mark_main_div1").css("display", "none");
        }
    });

</script>
<script>
    $(document).ready(function () {
        $('.skill_editor_2').summernote();
    });
    $("#section_type").on("change",function(){
        section_type_id=$(this).val();
        //if value == 4 ; ie Tick Mark then add extra data for tickmark_header table
        if(section_type_id==4){
            $("#tick_mark_main_div").css("display","block");
        }else{
            $("#tick_mark_main_div").css("display","none");
        }
        
        if(section_type_id==7){
            $("#marking_main_div").css("display","block");
        }else{
            $("#marking_main_div").css("display","none");
        }
    });
</script>
<script>
    //-----------FOR TICK MARK TPYE----
    var docRows = 0;
    function cloneDocDiv() {
        $("#enclo_row").clone().appendTo("#enclosures_container");
        docRows++;
        var newId = "enclo_row" + docRows;
        var removeId = "removedoc" + docRows;
        $(".enclo_row").filter(':last').find(".header_name").attr('id', "header_name" + docRows);
        $(".enclo_row").filter(':last').find(".header_name").attr('name', "doc[" + docRows + "][header_name]");
        $(".enclo_row").filter(':last').find(".header_type").attr('id', "header_type" + docRows);
        $(".enclo_row").filter(':last').find(".header_type").attr('name', "doc[" + docRows + "][header_type]");

        $(".enclo_row").filter(':last').attr("id", newId);
        $(".enclo_row").filter(':last').find(".removedoc").attr("id", removeId);
        $(".enclo_row").filter(':last').attr("style", "");
    }

    function resetDocDivElementsAfterRemove(optionNumber) {
        var optNumber = parseInt(optionNumber);
        for (i = optNumber; i <= docRows; i++) {
            var targetIdNumber = i + 1;
            var newId = "enclo_row" + i;
            var removeId = "removedoc" + i;
            $(".enclo_row").filter(':last').find(".header_name").attr('id', "header_name" + i);
            $(".enclo_row").filter(':last').find(".header_name").attr('name', "doc[" + i + "][header_name]");
            $(".enclo_row").filter(':last').find(".header_type").attr('id', "header_type" + i);
            $(".enclo_row").filter(':last').find(".header_type").attr('name', "doc[" + i + "][header_type]");

            $('#' + 'enclo_row' + targetIdNumber).find(".removedoc").attr("id", removeId);
            $('#' + 'enclo_row' + targetIdNumber).attr("id", newId);
        }
    }
    function removeEnclo(e) {
        if (docRows <= 1) {
            return;
        }
        var divId = $(e).parent().parent().attr('id');//alert(divId);
        var number = parseInt(divId.substring(9));
        $("#" + divId).remove();
        docRows--;
        if (number <= docRows) {//if removed div was not last one
            resetDocDivElementsAfterRemove(number);
        }
    }
    $(document).ready(function () {
        $('#addEnclo').click(function () {
            cloneDocDiv();
        });
        $('#addEnclo').trigger('click');
    });

</script>

<script>
    //-----------FOR MARKING TPYE----
    var m_docRows = 0;
    function m_cloneDocDiv() {
        $("#m_enclo_row").clone().appendTo("#m_enclosures_container");
        m_docRows++;
        var newId = "m_enclo_row" + m_docRows;
        var removeId = "m_removedoc" + m_docRows;
        $(".m_enclo_row").filter(':last').find(".m_header_name").attr('id', "m_header_name" + m_docRows);
        $(".m_enclo_row").filter(':last').find(".m_header_name").attr('name', "m_doc[" + m_docRows + "][header_name]");
        $(".m_enclo_row").filter(':last').find(".m_header_type").attr('id', "m_header_type" + m_docRows);
        $(".m_enclo_row").filter(':last').find(".m_header_type").attr('name', "m_doc[" + m_docRows + "][header_type]");
        $(".m_enclo_row").filter(':last').find(".m_marks").attr('id', "m_marks" + m_docRows);
        $(".m_enclo_row").filter(':last').find(".m_marks").attr('name', "m_doc[" + m_docRows + "][marks]");
        
        $(".m_enclo_row").filter(':last').attr("id", newId);
        $(".m_enclo_row").filter(':last').find(".m_removedoc").attr("id", removeId);
        $(".m_enclo_row").filter(':last').attr("style", "");
    }

    function m_resetDocDivElementsAfterRemove(optionNumber) {
        var optNumber = parseInt(optionNumber);
        for (i = optNumber; i <= m_docRows; i++) {
            var targetIdNumber = i + 1;
            var newId = "m_enclo_row" + i;
            var removeId = "m_removedoc" + i;
            $(".m_enclo_row").filter(':last').find(".m_header_name").attr('id', "m_header_name" + i);
            $(".m_enclo_row").filter(':last').find(".m_header_name").attr('name', "m_doc[" + i + "][header_name]");
            $(".m_enclo_row").filter(':last').find(".m_header_type").attr('id', "m_header_type" + i);
            $(".m_enclo_row").filter(':last').find(".m_header_type").attr('name', "m_doc[" + i + "][header_type]");
            $(".m_enclo_row").filter(':last').find(".m_marks").attr('id', "m_marks" + i);
            $(".m_enclo_row").filter(':last').find(".m_marks").attr('name', "m_doc[" + i + "][marks]");

            $('#' + 'm_enclo_row' + targetIdNumber).find(".m_removedoc").attr("id", removeId);
            $('#' + 'm_enclo_row' + targetIdNumber).attr("id", newId);
        }
    }
    function m_removeEnclo(e) {
        if (m_docRows <= 1) {
            return;
        }
        var divId = $(e).parent().parent().attr('id');//alert(divId);
        var number = parseInt(divId.substring(11));
        $("#" + divId).remove();
        m_docRows--;
        if (number <= m_docRows) {//if removed div was not last one
            m_resetDocDivElementsAfterRemove(number);
        }
    }
    $(document).ready(function () {
        $('#m_addEnclo').click(function () {
            m_cloneDocDiv();
        });
        $('#m_addEnclo').trigger('click');
    });

</script>
<?php $this->load->view('html_end_view'); ?>