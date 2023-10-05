<?php
// Created By:Dewangshu Pandit
// Created Date: 14-aug-2017
//Purpose : add data  (UI) FOR  "Range Type " Section/T.I.
$this->load->view('header_view');
$this->load->view('manager_left_view');
//echo $sheet_id;
?>
<!--content panel start -->
<section class="col-md-9">
    <h1 class="header_text">Edit Sheet Content:<font color="green"><?php 
    echo $this->main_model->get_name_from_id('template_instruction', 'section_name', $template_instruction_id);
    ?></font></h1>
    <!-- add-program-form content -->
    <div class="row">
        <div class="col-md-12">

            <form id="mainForm" enctype="multipart/form-data" class="form-horizontal" role="form" action=" <?php echo base_url() . 'set/range_type'; ?>" method="POST">
                <input type="hidden" name="template_instruction_id" value = "<?php echo $template_instruction_id; ?>" >
                
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
                    <label for="name" class="col-sm-3 control-label">Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="normal_range" class="col-sm-3 control-label">Normal Range</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="normal_range" name="normal_range" placeholder="" required><?php echo $normal_range; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="category" class="col-sm-3 control-label">Category</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="category" name="category" value="<?php echo $category; ?>" readonly>
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
