<?php
$this->load->view('header_view');
$this->load->view('manager_left_view');
?>
<!--content panel start -->
<section class="col-md-9">
    <h1 class="page-header">Edit Template Instructions/Section:<font color="green"><?php
        echo $this->main_model->get_name_from_id('sheets', 'name', $sheet_id);
        ?></font></h1>
    <div class="row">
        <div class="col-md-12">
            <form id="mainForm" enctype="multipart/form-data" class="form-horizontal" role="form" action=" <?php echo base_url() . 'set_data/template_instruction'; ?>" method="POST">
                <input type="hidden" name="id" value = "<?php echo $id; ?>">
                <input type="hidden" name="sheet_id" value = "<?php echo $sheet_id; ?>">
                <input type="hidden" name="template_id" value = "<?php echo $template_id; ?>">
                <div class="form-group section_container_div" id="section_container_div">
                    <div class="col-xs-12 section_div" id="section_div0">
                        <div class="well col-sm-12">
                            <div class="form-group">
                                <label for="section_text" class="col-sm-3 control-label section_text">Section Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control section_text" name="section_name" value="<?php echo $section_name; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="section_type" class="col-sm-3 control-label">Section Type </label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="section_type" name="section_type">
                                        <?php echo $this->main_model->select_section_types($section_type); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="order" class="col-sm-3 control-label">Sort order </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="order" name="sort_order" value="<?php echo $sort_order; ?>">
                                </div>
                            </div>

                          <!--  <div class="form-group" id="cat_label">
                                <label for="custom_label1" class="col-sm-3 control-label">Add Category Label</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="" name="custom_label1" value="<?php //echo $custom_label1; ?>" placeholder="Enter Label for Category. " >
                                </div>
                            </div>

                            <div class="form-group" id="act_label">
                                <label for="custom_label2" class="col-sm-3 control-label">Add Action Label</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="" name="custom_label2" value="<?php //echo $custom_label2; ?>" placeholder="Enter Label for Action. " >
                                </div>
                            </div> -->

                            <div class="form-group" id="checkbox">
                                <label for="checkbox" class="col-sm-3 col-sm-offset-3 control-label checkbox check-custom">
                                    <div class="col-sm-7">
                                        <input type="checkbox" name="checkbox" value="unchecked"> Hide second custom label
                                    </div>
                                </label>
                            </div>

                            <div class="form-group">
                                <label for="instruction_text" class="col-sm-3 control-label instruction_text">Section Instruction </label>
                                <div class="col-sm-9">
                                    <textarea id="" class="skill_editor" name="instruction_text"><?php echo $instruction_text; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr />
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-10">
                        <button type="submit" class="btn btn-primary">Update</button>
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
    $(document).ready(function () {
        $('.skill_editor').summernote();
    });

    $(document).ready(function () {
//        $("#cat_label").hide();
//        $("#act_label").hide();
        $("#checkbox").hide();
    });

    $(document.body).on("change", "#section_type", function () {
        var template_type = $("#section_type option:selected").text();
        if (template_type == "Dropdown with multi Addmore") {
//            $("#cat_label").show();
//            $("#act_label").show();
            $("#checkbox").show();
        } else {
//            $("#cat_label").hide();
//            $("#act_label").hide();
            $("#checkbox").hide();
        }
    });
</script>
<?php $this->load->view('html_end_view'); ?>
