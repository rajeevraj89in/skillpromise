<?php
$this->load->view('header_view');
$this->load->view('manager_left_view');
//echo $sheet_id;
?>
<!--content panel start -->
<section class="col-md-9">
    <h1 class="page-header">Edit Sheet Content:<font color="green"><?php 
    echo $this->main_model->get_name_from_id('template_instruction', 'section_name', $template_instruction_id);
    ?></font></h1>
    <!-- add-program-form content -->
    <div class="row">
        <div class="col-md-12">

            <form id="mainForm" enctype="multipart/form-data" class="form-horizontal" role="form" action=" <?php echo base_url() . 'set/values_for_checkbox_with_tooltip'; ?>" method="POST">

                <!--FOR DATABASE SAVE VALUE ONLY --AS DEVELOPER-->
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
                <!--END -FOR DATABASE SAVE VALUE ONLY --AS DEVELOPER-->
                
                
                
                
                
                
                
                
                
                
                
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="name" required value="<?php echo $name; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-3 control-label">Description</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="description" name="description" placeholder="Description" required><?php echo $description; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="tool_tip" class="col-sm-3 control-label">Tool Tip</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="tool_tip" name="tool_tip" placeholder="" required><?php echo $tool_tip; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="category" class="col-sm-3 control-label">Category</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="category" name="category" required value="<?php echo $category; ?>" readonly>
<!--                        <select class="form-control" id="category" name="category" required>
                            <?php // echo $this->main_model->fill_select('actionsheet_category', 'name', $category); ?>
                        </select>-->
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
</section>

</div><!-- end main -->
<?php $this->load->view('footer_view'); ?>
<?php $this->load->view('html_end_view'); ?>
