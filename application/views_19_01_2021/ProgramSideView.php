<!--program menu start -->
<!--<div class="panel panel-primary border">
    <h4 class="quickpanelhead quiz_head">Programs</h4>-->

<!--    <?php
//    $sql = "SELECT * from packages WHERE is_deleted = '0'";
//    $data = $this->db->query($sql)->result_array();
//    foreach ($data as $key => $value) {
?>
        <a href="<?php // echo(base_url() . "get_package" . "/" . $value["id"])     ?>"><?php // echo $value["name"]     ?></a><br><br>
<?php
//    }
?></div>-->


<div class="panel panel-primary border">
    <h4 class="quickpanelhead quiz_head">Programs</h4>
    <ul id="my_left_accordion" class="my_left_accordion nav nav-pills nav-stacked nav-sidebar">
        <!--        <li class="">
                    <a href="<?php // echo(base_url() . "sana-for-higher");  ?>">Self Assessment and Development Need Analysis (SANA) for Higher Education Students</a>
                </li>
                <li class="">
                    <a href="<?php // echo(base_url() . "sana-for-professionals");  ?>">Self Assessment and Development Need Analysis (SANA) for Professionals</a>
                </li>
                <li class="">
                    <a href="<?php // echo(base_url() . "sana-for-school");  ?>">Self Assessment and Development Need Analysis (SANA) for School Students</a>
                </li>-->
        <li class="">
            <a href="<?php echo(base_url() . "sana-for-school"); ?>">Aptitude Development Program</a>
        </li>
    </ul>
</div>

