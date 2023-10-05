<?php
$this->load->view('header_view');
$this->load->view('manager_left_view');
?>
<!--content panel start -->
<section class="col-md-9">
    <h1 class="page-header">Edit Permission Group</h1>
    <!--div class="row text-center">
    <div class="col-md-12">
            <a href="" class="btn btn-primary">Add Program</a>
    </div>
    </div>
    <hr /-->
    <!-- add-program-form content -->
    <div class="row">
        <div class="col-md-12">
            <form enctype="multipart/form-data" class="form-horizontal" role="form" action=" <?php echo base_url() . 'set/permission_groups'; ?> " method="POST">
                <input type="hidden" name="id" value = "<?php echo $id; ?> ">
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Permission Group Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="name" value = "<?php echo $name; ?>" placeholder="Permission Group Name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-3 control-label">Permission Group Description</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="description" name="description" placeholder="Permission Group Description"><?php echo $description; ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Status</label>
                    <div class="col-sm-9">

                        <label class="radio-inline">
                            <input type="radio" name="status" id="Active" value="Active"  <?php
                            if (($status) == 'Active') {
                                echo 'checked';
                            }
                            ?>> Active
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="status" id="Inactive" value="Inactive" <?php
                            if (($status) == 'Inactive') {
                                echo 'checked';
                            }
                            ?>> Inactive
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-10">
                        <button type="submit" value="Submit" class="btn btn-primary">Update</button>
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