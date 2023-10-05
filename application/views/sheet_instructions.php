<?php
$this->load->view('header_view');
$this->load->view('home_left_view');
//echo "<pre>"; print_r($max);die;
?>

<!--content panel start -->
<section class="col-md-9">
    <h1 class="page-header"><?php
        $name = $this->main_model->get_name_from_id('sheets', 'name', $sheet_id, 'id');
        echo "$name";
        ?></h1>

    <!-- Table content -->
    <div class="row">
        <div class="col-md-12">
            <u>Values Action Sheet has two sections:</u><br>
            <a href="">Section I: Identify your Key Values</a><br>
            <a href="">Section II: Identify Values that you would like to develop</a><br>

        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <b>Section-I</b>
            <div>
                <?php echo $data['details']; ?>
            </div>
        </div>
    </div><!-- end Table content -->
</section><!-- end col-md-9 -->
<!--end content panel start -->

</div><!-- end bigCallout-->

<!-- End Content and Sidebar
===================================================== -->
</div><!-- end main -->
<?php $this->load->view('footer_view'); ?>
<?php $this->load->view('html_end_view'); ?>
