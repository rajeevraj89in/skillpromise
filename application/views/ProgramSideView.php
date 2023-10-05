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


<div class="panel panel-primary border" style="  border: 1px solid;

  box-shadow: 0px 1px 1px 1px #888888;">
    <h4 class="quickpanelhead quiz_head" style="background:#3e7010;color:#fff;text-align:center;margin-top:10px;padding:10px">Programs</h4>
    <ul id="my_left_accordion" class="my_left_accordion nav nav-pills nav-stacked nav-sidebar" style="text-align:center;">
        <!--        <li class="">
                    <a href="<?php // echo(base_url() . "sana-for-higher");  ?>">Self Assessment and Development Need Analysis (SANA) for Higher Education Students</a>
                </li>
                <li class="">
                    <a href="<?php // echo(base_url() . "sana-for-professionals");  ?>">Self Assessment and Development Need Analysis (SANA) for Professionals</a>
                </li>
                <li class="">
                    <a href="<?php // echo(base_url() . "sana-for-school");  ?>">Self Assessment and Development Need Analysis (SANA) for School Students</a>
                </li>-->
        <li class="" style="text-align:center;margin-bottom:10px;margin-left:6px;">
            <a href="<?php echo(base_url() . "sana-for-school"); ?>" style="text-align:center;">Aptitude Development Program</a>
        </li>
    </ul>
</div>

