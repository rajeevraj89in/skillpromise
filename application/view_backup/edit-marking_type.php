<?php
$this->load->view('header_view');
$this->load->view('manager_left_view');
?>
<!--content panel start -->
<section class="col-md-9">
    <h1 class="header_text">Edit Sheet Content:<font color="green"><?php 
    echo $this->main_model->get_name_from_id('template_instruction', 'section_name', $template_instruction_id);
    ?></font></h1>
    <!-- add-program-form content -->
    <div class="row">
        <div class="col-md-12">

            <form id="mainForm" enctype="multipart/form-data" class="form-horizontal" role="form" action=" <?php echo base_url() . 'set/marking_type'; ?>" method="POST">
                <!--<input type="hidden" name="template_instruction_id" value = "<?php // echo $template_instruction_id; ?>">-->
                
                
                  <div class="form-group">
                    <label for="" class="col-sm-3 control-label">ID</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="id" value = "<?php echo $id; ?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Template Instruction Id:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="template_instruction_id" value = "<?php echo $template_instruction_id; ?>" readonly>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-lg-12">
                        <div class="row">
                            <label for="category" class="col-sm-3 control-label">Category</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="category" value = "<?php  echo $category; ?>" readonly>
                            </div>
                        </div>
                        <hr>
                         <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Edit Question</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control header_name" placeholder="Question Text/Name" name="name" value = "<?php  echo $name; ?>">
                    </div>
                </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-10">
                        <button type="submit" value="Submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
        </div>
    </div>
</section>

</div><!-- end main -->
<?php $this->load->view('footer_view'); ?>
<script>
    var docRows = 0;
    function cloneDocDiv() {
        $("#enclo_row").clone().appendTo("#enclosures_container");
        docRows++;
        var newId = "enclo_row" + docRows;
        var removeId = "removedoc" + docRows;
        $(".enclo_row").filter(':last').find(".header_name").attr('id', "header_name" + docRows);

        $(".enclo_row").filter(':last').find(".header_name").attr('name', "doc[" + docRows + "][header_name]");

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

            $('#' + 'enclo_row' + targetIdNumber).find(".removedoc").attr("id", removeId);
            $('#' + 'enclo_row' + targetIdNumber).attr("id", newId);
        }
    }
    function removeEnclo(e) {
        if (docRows <= 1) {
            return;
        }
        var divId = $(e).parent().parent().parent().attr('id');//alert(divId);
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
<?php $this->load->view('html_end_view'); ?>
