<?php
$this->load->view('header_view');
$this->load->view('manager_left_view');
?>


<!--<script src="../assets_bck/js/jquery.timepicker.min.js" type="text/javascript"></script>-->
<section class="col-md-9">
    <h1 class="page-header">Add Blog</h1>
    <div class="row">
        <div class="col-md-12">
            <form enctype="multipart/form-data" class="form-horizontal" role="form" action=" <?php echo base_url() . 'add_blog'; ?>" method="POST">

                <div class="form-group">
                    <label for="title" class="col-sm-3 control-label">Title</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Title" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="category_id" class="col-sm-3 control-label">Category</label>
                    <div class="col-sm-9"><select name="category_id" class="form-control" required>
                            <?php echo $this->main_model->fill_select('blog_category', 'name', ''); ?>
                        </select></div></div>

                <div class="form-group">
                    <label for="image_file" class="col-sm-3 control-label">Article Picture</label>
                    <div class="col-md-9">
                        <input type="file" id="image_file" name="image_file">
                        <p class="help-block">File size would be between 1KB to 14MB</p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description" class="col-sm-3 control-label"> Description</label>
                    <div class="col-sm-9">
                        <textarea id="description" class="skill_editor"  name="description" placeholder="Category Description"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="written_by" class="col-sm-3 control-label">Written By</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="written_by" name="written_by" placeholder="Name of Writer" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="article_datetime" class="col-sm-3 control-label">Article Datetime</label>
                    <div class="col-sm-9">

                        <div class='input-group date datetimepicker'>
                            <input id="article_datetime" class=" form-control" type="text" name="article_datetime" required value="">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>


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
                </div><br>


                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-4">
                        <button type="submit" value="Submit" class="btn btn-primary">Add</button>
                    </div>



                </div>
            </form>


            <!-- end add-program-form content -->

        </div>

    </div>
</section>
<!-- end col-md-9 -->
<!--end content panel start -->

</div><!-- end bigCallout-->


<!-- End Content and Sidebar
===================================================== -->
</div><!-- end main -->
<?php $this->load->view('footer_view'); ?>

<script type="text/javascript">
    $('.datetimepicker').datetimepicker({
        allowInputToggle: true
    });


</script>
