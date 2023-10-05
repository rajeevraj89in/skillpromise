<?php
$this->load->view('header_view');
$this->load->view('manager_left_view');
?>

<!--content panel start -->
<section class="col-md-9">
    <h1 class="page-header">Add Testimonial Category</h1>

    <!-- add-program-form content -->
    <div class="row">
        <div class="col-md-12">
            <form enctype="multipart/form-data"  class="form-horizontal" autocomplete="off" role="form"  action="<?php echo base_url(); ?>set/testimonial_category" method="POST" onsubmit="return check()">
                <div class="form-group">
                    <label for="category" class="col-sm-3 control-label">Category</label>
                    <div class="col-sm-9">
                       <input type="text" name="category" id="category" class="form-control" placeholder="Testimonial Category" >
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
                        <button type="submit"  class="btn btn-primary">Save</button>
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

