<?php
$this->load->view('header_view');
$this->load->view('manager_left_view');
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<section class="col-md-9">
    <h1 class="page-header">Edit Blog</h1>
    <div class="row">
        <div class="col-md-12">
            <form enctype="multipart/form-data" class="form-horizontal" role="form" action=" <?php echo base_url() . 'set/blog'; ?>" method="POST">
                <input type="hidden" name="id" value = "<?php echo $id; ?> ">
                <div class="form-group">
                    <label for="title" class="col-sm-3 control-label">Title</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="name" value = "<?php echo $name; ?>" placeholder="Title" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="category_id" class="col-sm-3 control-label">Category</label>
                    <div class="col-sm-9"><select name="category_id"  class="form-control">
                            <option value="<?php echo $category_id; ?>"><?php echo $this->main_model->fill_select('blog_category', 'name', $category_id); ?></option>
                            <option value="">-------</option>

                        </select>


                    </div></div>
                <div class="form-group">
                    <label for="image_file" class="col-sm-3 control-label">Article Picture</label>
                    <div class="col-md-9">
                        <input type="hidden" name="image_file" value="<?php echo $image_file ?>"><input type="file" name="image_file"><image src="<?php echo base_url() . './assets/img/uploads/' . $image_file; ?>" height=40 width=30 class='img img-responsive' />
                        <p class="help-block">File size would be between 1KB to 14MB</p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description" class="col-sm-3 control-label"> Description</label>
                    <div class="col-sm-9">
                        <textarea id="description" class="skill_editor"  name="description" placeholder="Category Description"><?php echo $description; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="written_by" class="col-sm-3 control-label">Written By</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="written_by" name="written_by" value="<?php echo $written_by ?>" placeholder="Name of Writer" >
                    </div>
                </div>

                <div class="form-group">
                    <label for="article_datetime" class="col-sm-3 control-label">Article Datetime</label>
                    <div class="col-sm-9">

                        <div class='input-group date datetimepicker'>
                            <input id="article_datetime" class="form-control" type="text" name="article_datetime" required value="<?php echo date("d-m-y h:i", strtotime($article_datetime)) ?>">
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
                            <input type="radio" name="status" id="Active" value="Active" <?php
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
                </div><br>



                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-4">
                        <button type="submit" value="Submit" class="btn btn-primary">Update</button>
                    </div>

                    <!--<div class="row text-center">
                            <div class="col-sm-3">
                                <a class="btn btn-primary" href="<?php //echo base_url() . //'comment';                        ?>">For Comment </a>
                            </div></div>
                    -->
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
