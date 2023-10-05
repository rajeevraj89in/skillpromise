<?php
$this->load->view('header_view');
$this->load->view('manager_left_view');
//echo $sheet_id;
?>
<!--content panel start -->
<section class="col-md-9">
    <h1 class="page-header">Add Action Sheet Category</h1>
    <!-- add-program-form content -->
    <div class="row">
        <div class="col-md-12">

            <form id="mainForm" enctype="multipart/form-data" class="form-horizontal" role="form" action=" <?php echo base_url() . 'set/actionsheet_category'; ?>" method="POST">
               <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Category Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-3 control-label">Description</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="description" name="description" placeholder="Description">
                    </div>
                </div>
                <div class="form-group">
                    <label for="max-value" class="col-sm-3 control-label">Max-value</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="" name="max" placeholder="Max value to select">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Status</label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" name="status" id="Active" value="Active" checked> Active
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="status" id="Inactive" value="Inactive"> Inactive
                        </label>
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
