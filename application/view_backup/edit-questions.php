
<?php
$this->load->view('header_view');
$this->load->view('manager_left_view');
?>
<!--content panel start -->
<section class="col-md-9">
    <h1 class="page-header">Edit Question</h1>
    <div class="row">
        <div class="col-md-12">
            <form method="post" class="form-horizontal" role="form" autocomplete="off" id="mainForm" action="<?php echo base_url(); ?>set/questions">
                <input type="hidden" name="id" value = "<?php echo $id; ?>">
                <input type="hidden" name="quiz_id" value = "<?php echo $quiz_id; ?>">
                <input type="hidden" name="child_table" value = "options">
                <input type="hidden" name="foreign_id" value = "question_id">

                <div class="form-group">
                    <label class="col-sm-3 control-label">Quiz Name</label>
                    <div class="col-sm-9">
                        <p class="form-control-static"><?php echo $this->main_model->get_name_from_id('quiz', 'name', $quiz_id); ?> </p>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-inline">
                        <label for="no_of_options" class="col-sm-3 control-label">No. Of Options</label>
                        <div class="col-sm-3">
                            <input type="text" name="no_of_options" readonly="readonly" class="form-control" id="no_of_options" placeholder="No. Of Options" min="2" max="25" value ="<?php echo $no_of_options; ?>">
                        </div>
                    </div>

                    <div class="form-inline">
                        <label for="maxMarks" class="col-sm-3 control-label">Maximum Marks</label>
                        <div class="col-sm-3">
                            <input type="number" name="question_weight" class="form-control" id="maxMarks" placeholder="Maximum Marks" min="1" max="100" value ="<?php echo $question_weight; ?>">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-inline">
                        <label class="col-sm-3 control-label">Selection Type</label>
                        <div class="col-sm-3">
                            <label class="radio-inline">
                                <input type="radio" name="select_type" id="singleSelect" value="Single" <?php
                                if ($select_type == "Single") {
                                    echo 'checked';
                                }
                                ?>> Single
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="select_type" id="multipleSelect" value="Multiple" <?php
                                if ($select_type != "Single") {
                                    echo 'checked';
                                }
                                ?>> Multiple
                            </label>
                        </div>
                    </div>

                    <div class="form-inline">
                        <label class="col-sm-3 control-label weighted_option_element">Weighted Options</label>
                        <div class="col-sm-3  weighted_option_element">
                            <label class="checkbox-inline">
                                <input name="is_weighted" type="checkbox" id="ifWeighted" value="<?php echo $is_weighted; ?>"> Enable
                            </label>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label for="category" class="col-sm-3 control-label">Question Category</label>
                    <div class="col-sm-9">
                        <select class="form-control" id="category" name="category" required>
                            <?php echo $this->main_model->fill_select('category', 'name', $category); ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="story" class="col-sm-3 control-label">Question Story</label>
                    <div class="col-sm-9">
                        <select class="form-control" id="story" name="story">
                            <?php echo $this->main_model->fill_select('quiz_story', 'name', $story, 'quiz_id', $quiz_id); ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="question" class="col-sm-3 control-label">Question Text</label>
                    <div class="col-sm-9">
                        <textarea class="skill_editor" id="question" name="question_text"><?php echo $question_text; ?></textarea>
                    </div>
                </div>
                <hr />
                <div class="form-group option_container_div" id="option_container_div">

                    <div class="col-xs-12 option_div" id="option_div0" style="display:none">
                        <input type="hidden" class="option_number" value = "0">
                        <label for="Option" class="col-sm-3 control-label opt_label">Option</label>
                        <div class="well col-sm-9">
                            <div class="form-group">
                                <label for="option_text" class="col-sm-3 control-label opt_text">Option Text1</label>
                                <div class="col-sm-9">
                                    <textarea class="skill_editor_2"></textarea>

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Correct Answer</label>
                                <div class="col-sm-3">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="correctBox" value="0" class="correct" onclick="checkCorrectOption(this);"> &nbsp;
                                    </label>
                                </div>


                                <label for ="weight" class="col-sm-3 control-label weight_text weight_elements">Option Weight</label>
                                <div class="col-sm-3 weight_elements">
                                    <input type="number" class="form-control weight_text weight_box" id="weight-0" placeholder="Option Weight" min="0" max="100" value="0">
                                </div>
                            </div>

                            <div class="form-group">
                                <hr />
                                <div class="col-md-offset-10 col-md-2">
                                    <!-- Remove option btn -->
                                    <button type="button" class="btn btn-danger remove" id="remove" onclick="removeDiv(this);" >Remove</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!--input type="button" value="Add option" id="addoption"-->
                <div class="form-group">
                    <div class="col-md-offset-10 col-md-2">
                        <!-- Add more option btn -->
                        <button type="button" class="btn btn-primary" id="addoption">Add Options</button>
                    </div>
                </div>

                <hr />
                <div class="form-group">
                    <label for="answer_text" class="col-sm-3 control-label">Answer & Explanation</label>
                    <div class="col-sm-9">
                        <textarea name="answer_text" class="skill_editor" id="answer_text"><?php echo $answer_text; ?></textarea>
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-10">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="reset" class="btn btn-default">Clear</button>
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

<script type="text/javascript">
    var options = 0;

    function cutStr(str, delimiter, postion) {
        var url = "";
        var array = str.split(delimiter);
        if (postion == 1) {
            url = (array.splice(array.length - 1, 1));
        } else {
            url = (array.splice(0, array.length - 1));
        }
        url = (array.join("/"));
        return url;
    }


    function getTotalWeight() {
        var totalWeight = 0;
        for (i = 1; i <= options; i++) {
            totalWeight = totalWeight + parseInt($("#" + "weight-" + i).val());
        }
        return totalWeight;
    }


    function cloneDiv() {
        $("#option_div0").clone().appendTo("#option_container_div");
        options++;
        var maxWeight = parseInt($("#maxMarks").val());
        var newId = "option_div" + options;
        var opt_text = "Option Text " + options;
        var opt_label = "Option " + options;
        var removeId = "remove" + options;
        var weightId = "weight-" + options;
        var correctBoxId = "correctBox-" + options;
        $(".option_div").filter(':last').find(".option_number").attr('name', "children[" + options + "][option_number]");
        $(".option_div").filter(':last').find(".option_number").val(options);
        $(".option_div").filter(':last').find(".skill_editor_2").attr('name', "children[" + options + "][option_text]");
        $(".option_div").filter(':last').find(".skill_editor_2").attr('id', "skill_editor_2" + options);
        $(".option_div").filter(':last').find(".weight_box").attr("name", "children[" + options + "][option_weight]");
        $(".option_div").filter(':last').find(".weight_box").attr('max', maxWeight);
        $(".option_div").filter(':last').find(".correct").attr("name", "children[" + options + "][is_correct]");
        $(".option_div").filter(':last').attr("id", newId);
        $(".option_div").filter(':last').find(".opt_label").text(opt_label);
        $(".option_div").filter(':last').find(".opt_text").text(opt_text);
        $(".option_div").filter(':last').find(".weight_box").attr("id", weightId);
        $(".option_div").filter(':last').find(".remove").attr("id", removeId);
        $(".option_div").filter(':last').find("#correctBox").attr("id", correctBoxId);
        $(".option_div").filter(':last').attr("style", "");
        $("#no_of_options").val(options);
    }


    function fill_options(JSONobject) {
        //alert(JSONobject.toSource());
        //alert('obj.toJSON(JSONobject)');
        var i = 1;
        $.each(JSONobject, function () {

            cloneDiv();

            //alert(this.option_text);
            $("#skill_editor_2" + i).code(this.option_text);
            //$("#skill_editor" + i).val(this.option_text);
            $("#weight-" + i).val(this.option_weight);
            $("#correctBox-" + i).attr("value", this.is_correct);
            if (parseInt(this.is_correct) == 1) {
                $("#correctBox-" + i).prop('checked', true);
            }
            $('.skill_editor_2').summernote();
            i++;
        });
    }


    function updateFromDb() {
        var no_of_options = <?php echo $no_of_options; ?>;
        var childData = '<?php echo json_encode($this->custom->object_to_array($child_data)); ?>';
        childData = $.trim(childData).replace(/<\/?[^>]+>/g, '').replace(/<\/span>/g,'');
//        alert(childData);
        JSONobject = eval("(" + childData + ")");
//        alert(JSONobject);
        fill_options(JSONobject);
    }


    function removeDiv(e) {
        if (options <= 2) {
            return;
        }
        var divId = $(e).parent().parent().parent().parent().attr('id');
        var number = parseInt(divId.substring(10));
        $("#" + divId).remove();
        $("#no_of_options").val(--options);
        if (number <= options) {//if removed div was not last one
            resetDivElementsAfterRemove(number);
        }
    }


    function resetDivElementsAfterRemove(optionNumber) {
        var optNumber = parseInt(optionNumber);
        for (i = optNumber; i <= options; i++) {
            var targetIdNumber = i + 1;
            var newId = "option_div" + i;
            var opt_text = "Option Text " + i;
            var opt_label = "Option " + i;
            var removeId = "remove" + i;
            var weightId = "weight-" + i;
            var correctBoxId = "correctBox-" + i;
            $('#' + 'option_div' + targetIdNumber).find(".option_number").attr('name', "option_number[" + i + "]");
            $('#' + 'option_div' + targetIdNumber).find(".option_number").val(i);
            $('#' + 'option_div' + targetIdNumber).find(".skill_editor_2").attr('name', "option_text[" + i + "]");
            $('#' + 'option_div' + targetIdNumber).find(".weight_box").attr("name", "option_weight[" + i + "]");
            $('#' + 'option_div' + targetIdNumber).find(".correct").attr("name", "is_correct[" + i + "]");
            $('#' + 'option_div' + targetIdNumber).find(".opt_label").text(opt_label);
            $('#' + 'option_div' + targetIdNumber).find(".opt_text").text(opt_text);
            $('#' + 'option_div' + targetIdNumber).find(".weight_box").attr("id", weightId);
            $('#' + 'option_div' + targetIdNumber).find(".remove").attr("id", removeId);
            $('#' + 'option_div' + targetIdNumber).find(".correct").attr("id", correctBoxId);
            $('#' + 'option_div' + targetIdNumber).attr("id", newId);
        }
    }


    $(document.body).on('change', '.weight_box', function () {
        $(".weight_box").bind('change', function (e) {
            var weighted = ($("#ifWeighted").is(':checked')); //is weighted options selected
            var maxWeight = parseInt($("#maxMarks").val());
            var weightBoxId = e.target.id;
            var weight = parseInt($("#" + weightBoxId).val());
            var totalWeight = 0;
            for (i = 1; i <= options; i++) {
                totalWeight = totalWeight + parseInt($("#" + "weight-" + i).val());
            }
            if ((weighted) && (totalWeight > maxWeight)) {
                $("#" + weightBoxId).val(--weight)
//                return false;
            }
        });
    });


    $(document.body).on('change', '#maxMarks', function () {
        var maxWeight = parseInt($("#maxMarks").val());
        $(".weight_box").attr('max', maxWeight);
    });

    $(document.body).on('change', '.correct', function (e) {
        var maxWeight = parseInt($("#maxMarks").val());
        var single; //single selected or not
        var CorrectBoxId = e.target.id; //get id of clicked check box
        var weighted = ($("#ifWeighted").is(':checked')); //is weighted options selected
        var correctChecked = ($("#" + CorrectBoxId).is(':checked')); //if checked selected
        var idNumber = cutStr(CorrectBoxId, "-", 2); //option number
        var weightBoxId = "weight-" + idNumber; //corresponding weightBoxId id of clicked checkbox

        if ($('input[name=select_type]:checked', '#mainForm').val() == "Single") {//read option type status as single true
            single = true;
        } else {
            single = false;
        }//initializers----end
//        $(e).attr('value', e.checked ? 1 : 0);//setting value of check box
        if (correctChecked) {//check box selected

            if (single) {
                $(".correct").prop('checked', false); //uncheck all check box
                $(".correct").val("0");
                $("#" + CorrectBoxId).attr("value", "1");
                $("#" + CorrectBoxId).prop('checked', true); //select clicked check box
                if (weighted) {
                    $("#" + weightBoxId).val(maxWeight);
                } else {
                    $(".weight_box").val("0");
                    $("#" + weightBoxId).val(maxWeight);
                }
            } else {//multiple selected
                $("#" + CorrectBoxId).attr("value", "1");
                $("#" + weightBoxId).val(maxWeight);
                $("#maxMarks").val(getTotalWeight());
            }
        } else {//check box unchecked
            $("#" + CorrectBoxId).attr("value", "0");
            $("#" + weightBoxId).val("0");
        }
    });


    $(document.body).on('click', '#addoption', function () {
        $('.skill_editor_2').summernote();
    });

    $(document).ready(function () {
        $('.skill_editor_2').summernote();
        updateFromDb();

        $("#addoption").button().click(function () {
            cloneDiv();
        });

        $("#ifWeighted").change(function () {
            if ($(this).is(':checked')) {
                $(".weight_elements").show();
            } else {
                $(".weight_elements").hide();
            }
        });

        $('input:radio[name=select_type]').change(
                function () {
                    if ($('#singleSelect').is(':checked')) {
                        $(".correct").prop('checked', false);
                        $('.weighted_option_element').show();
                        $('#maxMarks').attr('readonly', false);
                    } else {//multiple select
                        $("#ifWeighted").attr('checked', false);
                        $('.weighted_option_element').hide();
                        $(".weight_elements").hide();
                        $('#maxMarks').attr('readonly', true);
                        $('#maxMarks').val(getTotalWeight());
                    }
                });

        $("#mainForm").submit(function () {//form validation
            var optionWeight = 0;
            var selectedCorrectweight = 0;
            var correctSelected = false;
            var validate = true;
            var errorMessage = "";
            var maxWeight = parseInt($("#maxMarks").val());
            var questionText = "";
            questionText = $('.note-editable').filter(':first').text();

            for (i = 1; i <= options; i++) {
                if ($("#correctBox-" + i).val() == "1") {
                    selectedCorrectweight = parseInt($("#weight-" + i).val());
                    correctSelected = true;
                }
            }
            ;
            //initializer----end
            // submit rule----start

            if (questionText == '') {
                validate = false;
                errorMessage = errorMessage + 'Add Question Text.\n';
            }
            ;

            if ($('input[name=select_type]:checked', '#mainForm').val() == "Single") {
                if (maxWeight != selectedCorrectweight) {
                    validate = false;
                    errorMessage = errorMessage + "Weight Mismatch\n";
                }
            } else {//multiple selected
                if (getTotalWeight() != maxWeight) {
                    validate = false;
                    errorMessage = errorMessage + "Total Weight Mismatch.\n";
                }
            }
            ;

            if (!correctSelected) {//no correct answer selected
                validate = false;
                errorMessage = errorMessage + "Correct Answer Not Selected\n";
            }
            ;


            for (i = 1; i <= options; i++) {//no option weight should be greater than max marks

                optionWeight = parseInt($("#weight-" + i).val());
                if (optionWeight > maxWeight) {
                    validate = false;
                    errorMessage = errorMessage + "Option Weight more than Maximum Marks for question.\n";
                }
            }
            ;

            if (!validate) {
                alert(errorMessage);
            }
            ;
            return validate;
        });
    });

</script>

<?php $this->load->view('html_end_view'); ?>