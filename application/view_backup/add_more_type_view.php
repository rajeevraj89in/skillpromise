<?php
$this->load->view('header_view');
$this->load->view('home_left_view');
//echo "<pre>"; print_r($max);die;
?>

<!--content panel start -->
<section class="col-md-9">
    <h1 class="header_text"><?php
        $name = $this->main_model->get_name_from_id('sheets', 'name', $sheet_id, 'id');
        echo "$name";
        ?>
    </h1>
    <div class="row">
        <div class="col-md-12">
            <form id="mainForm" enctype="multipart/form-data" class="form-horizontal" role="form" action="<?php echo base_url() . ''; ?>" method="POST">
                <div> <?php echo $instruction; ?></div>
                <input type="hidden" value="<?php echo $sheet_id; ?>" name="sheet_id">
                <?php
                foreach ($add_more_type_details as $value) {
                    echo '<div class="">
                     <div class="panel-heading">
                        <h3 class="panel-title" style="text-align:center;">' . $value['name'] . '</h3>
                    </div>';
                    ?>
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group section_container_div" id="section_container_div">
                                <div class="col-xs-12 section_div" id="section_div0" style="">
                                    <input type="hidden" class="section_number" value = "0">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="section_text" class="col-sm-3 control-label section_text">Add Value 1</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control section_text">
                                            </div>
                                            <div class="col-md-2">
                                                <!-- Remove option btn -->
                                                <button type="button" class="btn btn-danger remove" id="remove" onclick="removeDiv(this);" >Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <!-- Add more option btn -->
                            <button type="button" class="btn btn-primary" id="addoption">Add Value</button>
                        </div>
                    </div>
                    <hr />

                <?php }
                ?>

            </form>
        </div>
</section><!-- end col-md-9 -->
<!--end content panel start -->

</div><!-- end bigCallout-->

<!-- End Content and Sidebar
===================================================== -->
</div><!-- end main -->
<?php $this->load->view('footer_view'); ?>
<?php $this->load->view('html_end_view'); ?>