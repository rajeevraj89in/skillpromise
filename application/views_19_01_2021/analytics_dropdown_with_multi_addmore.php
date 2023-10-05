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
<section class="col-md-9" id="printarea">
    <h1 class="header_text">My Key Values:<font color="green"><?php
        echo $sheet_name;
        ?></font></h1>

    <!--banner image-->
    <?php if (isset($image_file) && !empty($image_file)) { ?>

        <div class="row my-2">
            <div class="col-md-12">

                <img src = "<?php echo(base_url() . 'assets/img/uploads/' . $image_file); ?>" class = "img-responsive">
            </div>
        </div> 
    <?php }
    ?>

    <!--banner image end-->
    <!--box content-->
    <?php if (isset($image_comment) && !empty($image_comment)) { ?>
        <div class="well my-2">
            <?php echo $image_comment; ?>

        </div>
    <?php }
    ?>

    <?php if (isset($analytics_comment) && !empty($analytics_comment)) { ?>
        <div class="border py-2 px-2">
            <?php echo $analytics_comment; ?>


        </div>
    <?php }
    ?>
    <!--box content enc-->
    <!-- Table content -->

    <?php
    foreach ($list as $key => $data) {

        echo '<div class="row">';
        echo '<div class="col-md-12">';

        $title = $this->main_model->get_name_from_id("dropdown_with_multi_addmore", "category", $key);

        echo '<h4>' . $title . '</h4>';
        echo '</div>';
        echo '<div class="col-md-12">';
        $i = 0;
        foreach ($data as $k => $val) {
            echo '<p>' . ($i + 1) . '.' . $val['action_values'] . '</p>';
            $i++;
        }

        echo '</div>';
        echo '</div>';
        echo '<hr>';
    }
    ?>

</section>
<input type='button' id='btn'class="btn btn-success" value='Print' onclick='printDiv();'>
</div><!-- end bigCallout-->

<!-- End Content and Sidebar
===================================================== -->
</div><!-- end main -->
<?php $this->load->view('footer_view'); ?>
<?php $this->load->view('html_end_view'); ?>

<script>

    function printDiv()
    {

        var Printarea = document.getElementById('printarea');

        var newWin = window.open('', 'Print-Window');

        newWin.document.write('<html><body onload="window.print()">' + Printarea.innerHTML + '</body></html>');

        newWin.document.close();

    }


</script>