<?php
$this->load->view('header_view');
$this->load->view('manager_left_view');
?>
<!--content panel start -->
<section class="col-md-9">
    <h1 class="page-header">Add Control Point</h1>
    <!--div class="row text-center">
    <div class="col-md-12">
            <a href="" class="btn btn-primary">Add Program</a>
    </div>
    </div>
    <hr /-->
    <!-- add-program-form content -->
    <div class="row">
        <div class="col-md-12">
            <form enctype="multipart/form-data" class="form-horizontal" role="form" action=" <?php echo base_url() . 'set/control_points'; ?>" method="POST">

                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Control Point Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Control Point Name" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description" class="col-sm-3 control-label">Control Point Description</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="description" name="description" placeholder="Control Point Description"></textarea>
                    </div>
                </div>

                <div class="form-group" style="display:none">
                    <label for="entity" class="col-sm-3 control-label">Entity</label>
                    <div class="col-sm-9">
                        <select class="form-control" id="entity" name="entity">
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="controller" class="col-sm-3 control-label">Function</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="controller" name="controller" placeholder="Enter Function like manage, add, edit, delete." title="Function shoud be a valid function in main controller." required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="page" class="col-sm-3 control-label">Page</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="page" name="page" placeholder="Enter Page" title="Page should be a valid page related to a valid table(first parameter in controller function) corresponding to a valid view." required>
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


<?php $this->load->view('footer_view'); ?>
<?php $this->load->view('html_end_view'); ?>