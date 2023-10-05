<?php
$this->load->view('header_view');
$this->load->view('manager_left_view');
?>
<!--content panel start -->
<section class="col-md-9">
    <h1 class="page-header">Edit Category</h1>
    <!--div class="row text-center">
    <div class="col-md-12">
            <a href="" class="btn btn-primary">Add Program</a>
    </div>
    </div>
    <hr /-->
    <!-- add-program-form content -->
    <div class="row">
        <div class="col-md-12">
            <form enctype="multipart/form-data" class="form-horizontal" role="form" action=" <?php echo base_url() . 'set/category'; ?> " method="POST">
                <input type="hidden" name="id" value = "<?php echo $id; ?> ">
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Category Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="name" value = "<?php echo $name; ?>" placeholder="Category Name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-3 control-label">Category Description</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="description" name="description" placeholder="Category Description"><?php echo $description; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="page_content" class="col-sm-3 control-label">Page Content</label>
                    <div class="col-sm-9">
                        <textarea class="skill_editor" name="page_content" id="page_content"><?php echo $page_content; ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Program Image</label>
                    <div class="col-sm-9">
                        <img height="75px" width="75px" src="<?php
                        echo (base_url() . 'assets/img/' . 'uploads/');
                        if (empty($image_file)) {
                            echo 'no-image.jpg';
                        } else {
                            echo $image_file;
                        }
                        ?>"/>

                    </div>
                </div>

                <div class="form-group">
                    <label for="image_file" class="col-sm-3 control-label">Select Image</label>
                    <div class="col-sm-9">
                        <input type="file" id="image_file" name="image_file">
                        <p class="help-block">File size would be between 1KB to 14MB</p>
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