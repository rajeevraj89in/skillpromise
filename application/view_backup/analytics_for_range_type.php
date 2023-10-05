<?php
//echo "<pre>";
//print_r($data);die;
// Created:Dewangshu, 16/8/16 , for analytics report of range type action sheets.
$this->load->view('header_view');
if ($_SESSION['role_name'] == "Student") {

    $this->load->view('home_left_view');
} else {
    $this->load->view('manager_left_view');
}
?>
<!--content panel start -->
<section class="col-md-9">
    <h1 class="header_text">My Key Values:<font color="green"><?php
        echo $sheet_name;
        ?></font></h1>
    <!-- Table content -->

    <?php
    foreach ($list as $key => $data) {

        echo '<div class="row">';
        echo '<div class="col-md-12">';

        $title = $this->main_model->get_name_from_id("actionsheet_category", "name", $key);

        echo '<h4><b>' . $title . '</b></h4>';
        echo '</div>';
        echo '<div class="col-md-12">';
        $i = 0;
        echo '<table class="table table-responsive">';
        echo '<thead><tr><th>Name</th><th>Your Result</th><th>Normal Range</th></tr></thead>';
        foreach ($data as $k => $val) {
            echo '<tr>';
            echo '<td style="width:30%">' . $this->main_model->get_name_from_id('range_type', 'name', $val['range_type_id'], 'id') . '</td>';
            echo '<td style="width:40%">' . $val['your_ans'] . '</td>';
            echo '<td style="width:30%">' . $this->main_model->get_name_from_id('range_type', 'normal_range', $val['range_type_id'], 'id') . '</td>';
            echo '</tr>';
            $i++;
        }
        echo '</table>';
        echo '</div>';
        echo '</div>';
        echo '<hr>';
    }
    ?>

</section>
</div><!-- end bigCallout-->

<!-- End Content and Sidebar
===================================================== -->
</div><!-- end main -->
<?php $this->load->view('footer_view'); ?>
<?php $this->load->view('html_end_view'); ?>

