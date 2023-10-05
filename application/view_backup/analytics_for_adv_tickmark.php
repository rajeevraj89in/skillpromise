<?php
//echo "<pre>";
//print_r($data);die;

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
//    echo '<pre>';
//    print_r($list);
//    die;
    foreach ($list as $key => $data) {

        echo '<div class="row">';
        echo '<div class="col-md-12">';

        $title1 = $this->main_model->get_name_from_id("tickmark_adv_header", "header_name", $key);

        echo '<h4>' . $title1 . '</h4>';
        echo '</div>';
        echo '<div class="col-md-12">';
        $i = 0;

        foreach ($data as $k => $val) {

            $temp = $this->main_model->get_records('tickmark_adv_content', 'id', $val['tickmark_adv_content_id']);
            $dd = $temp->result_array();
//            echo '<pre>';
//            print_r($dd);
//            die;
            if ($dd[0]['header1'] == $val['tickmark_adv_header_id']) {
                $ques = $dd[0]['content1'];
            } else if ($dd[0]['header2'] == $val['tickmark_adv_header_id']) {
                $ques = $dd[0]['content2'];
            }
            echo '<p>' . ($i + 1) . '.' . $ques . '</p>';
//                 echo  '<p>'.($i+1).'.'.$ques1.'</p>';
            $i++;
        }

        echo '</div>';
        echo '</div>';
        echo '<hr>';


//            echo '<pre>';
//            print_r($title1 );die;
    }
    ?>

</section>
</div><!-- end bigCallout-->

<!-- End Content and Sidebar
===================================================== -->
</div><!-- end main -->
<?php $this->load->view('footer_view'); ?>
<?php $this->load->view('html_end_view'); ?>

