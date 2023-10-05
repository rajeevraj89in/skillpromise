<?php
$this->load->view('header_view');
if ($_SESSION['role_name'] == "Student") {

    $this->load->view('home_left_view');
} else {
    $this->load->view('manager_left_view');
}
?>

<section class="col-md-9">
    <h1 class="page-header">Add Users by excel sheet</h1>
    <!-- add-program-form content -->
    <div class="row">
        <div class="col-md-12">

            <div class="col-md-12">
                <form role="form" enctype="multipart/form-data" method="post" class="form-horizontal" action="<?php echo base_url(); ?>upload_application">
                    <div class="row top-space">
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <div class="form-group right"><label for="application_data">upload File</label></div>
                            </div>
                            <div class="col-md-4">
                                <input type="file"  name="application_data"><p class="help-block">upload Excel file</p>
                            </div>
                            <div class="col-md-4"><button type="submit" class="btn btn-success">Upload</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
</div><!-- end bigCallout-->

<!-- End Content and Sidebar
===================================================== -->
</div><!-- end main -->
<?php $this->load->view('footer_view'); ?>
<script>

</script>
<?php $this->load->view('html_end_view'); ?>
