<?php //
//echo"<pre>";
//print_r($data);
//die;

$this->load->view('header_view');
$this->load->view('manager_left_view');
?>
<!--content panel start -->


<section class="col-md-9">
    <h1 class="page-header">Add Program Category</h1>
    <!--div class="row text-center">
    <div class="col-md-12">
            <a href="" class="btn btn-primary">Add Program</a>
    </div>
    </div>
    <hr /-->
    <!-- add-program-form content -->
    <div class="row">
        <div class="col-md-12">
            <form enctype="multipart/form-data" class="form-horizontal" role="form" action=" <?php echo base_url() . 'set/program_category'; ?>" method="POST">
                                  <div class="form-group">
                    <label for="category_id" class="col-sm-3 control-label">Program Category</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="name" value = "<?php echo $name; ?>" placeholder="Program Category Name" required>
                    </div>
                    </div>
                <div class="form-group">
                    <label for="image_file" class="col-sm-3 control-label">Program Image</label>
                    <div class="col-md-9">
                        <input type="hidden" name="image" value="<?php echo $image ?>"><input type="file" name="image">
                        <!--<image src="<?php echo base_url() . './assets/sub_package_image/' . $image; ?>" height=80 width=70 class='img img-responsive' />-->
                        <p class="help-block">File size would be between 1KB to 14MB</p>
                    </div>
                </div>
                
                 <div class="form-group">
                    <label for="description" class="col-sm-3 control-label">Category Description</label>
                    <div class="col-sm-9">
                        <textarea id="description" class="skill_editor form-control"  name="description" placeholder="Category Description"><?php echo $description; ?></textarea>
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
                <!--<div class="form-group">-->
                <!--    <label for="category_id" class="col-sm-3 control-label">Program Category</label>-->
                <!--    <div class="col-sm-9"><select name="name" class="form-control" required>-->
                <!--            <?php echo $this->main_model->fill_select('program_category', 'name', ''); ?>-->
                <!--        </select></div></div>-->
                        
                <!--<div class="form-group">-->
                <!--    <label for="name" class="col-sm-3 control-label">Category Name</label>-->
                <!--    <div class="col-sm-9">-->
                <!--        <input type="text" class="form-control" id="name" name="name" placeholder="Category Name" required>-->
                <!--    </div>-->
                <!--</div><br>-->
                <!--<div class="form-group">-->
                <!--    <label for="description" class="col-sm-3 control-label"> Category Description</label>-->
                <!--    <div class="col-sm-9">-->
                <!--        <textarea class="form-control" id="description" name="description" placeholder="Category Description"></textarea>-->
                <!--    </div>-->
                <!--</div><br>-->


                <!--<div class="form-group">-->
                <!--    <label class="col-sm-3 control-label">Status</label>-->
                <!--    <div class="col-sm-9">-->
                <!--        <label class="radio-inline">-->
                <!--            <input type="radio" name="status" id="Active" value="Active" checked> Active-->
                <!--        </label>-->
                <!--        <label class="radio-inline">-->
                <!--            <input type="radio" name="status" id="Inactive" value="Inactive"> Inactive-->
                <!--        </label>-->
                <!--    </div>-->
                <!--</div>-->
                <br>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <button type="submit" value="Submit" class="btn btn-primary">Add</button>
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
 
<?php
        $this->load->view('home_footer');
        ?>
