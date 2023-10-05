<?php
$this->load->view('header_view');
$this->load->view('manager_left_view');
//echo $sheet_id;
?>
<!--content panel start -->
<section class="col-md-9">
    <h1 class="page-header">Add Sheet Content</h1>
    <!-- add-program-form content -->
    <div class="row">
        <div class="col-md-12">

            <form id="mainForm" enctype="multipart/form-data" class="form-horizontal" role="form" action=" <?php echo base_url() . 'set/sheet_values'; ?>" method="POST">
               <input type="hidden" name="sheet_id" value = "<?php echo $sheet_id ;?>">
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-3 control-label">Description</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="description" name="description" placeholder="Description" required></textarea>
<!--                        <input type="text" class="form-control" id="description" name="description" placeholder="Description">-->
                    </div>
                </div>
                <div class="form-group">
                    <label for="tool_tip" class="col-sm-3 control-label">Tool Tip</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="tool_tip" name="tool_tip" placeholder="" required></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="category" class="col-sm-3 control-label">Category</label>
                    <div class="col-sm-9">
                        <select class="form-control" id="category" name="category" required>
                            <?php echo $this->main_model->fill_select('actionsheet_category', 'name', 1); ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-10">
                        <button type="submit" value="Submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

</div><!-- end main -->
<?php $this->load->view('footer_view'); ?>
<?php $this->load->view('html_end_view'); ?>
