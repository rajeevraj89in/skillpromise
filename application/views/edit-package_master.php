<?php
$this->load->view('header_view');
$this->load->view('manager_left_view');
$details = $this->main_model->get_records_from_id("packages", $id, 'id');
?>
<!--content panel start -->
<section class="col-md-9">
    <h1 class="page-header">Edit Package Master</h1>

    <!-- add-program-form content -->
    <div class="row">
        <div class="col-md-12">
            <form  class="form-horizontal" autocomplete="off" role="form"  action="<?php echo base_url(); ?>save_add_package_master" method="POST">
								<input type="hidden" id="edit_id" name="id" value = "<?php echo $id; ?>">
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Package Master Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Package Name" required value = "<?php echo $name; ?>">
                    </div>
                </div>
				<div class="form-group">
                    <label for="description" class="col-sm-3 control-label">Package Master Description</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="description" name="description" placeholder="Package Description" required value = "<?php echo $description; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Status</label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" name="is_deleted" id="Active" value="0" <?php if($is_deleted == 0){echo "checked";} ?>> Active
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="is_deleted" id="Inactive" value="1" <?php if($is_deleted == 1){echo "checked";} ?> > Inactive
                        </label>
                    </div>
                </div>



                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-10">
                        <button type="submit"  class="btn btn-primary">Update</button>
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
<?php $this->load->view('html_end_view'); ?>
