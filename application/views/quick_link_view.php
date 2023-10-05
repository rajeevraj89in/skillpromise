
<div class="col-md-3 quic_col">
    <!--        <ul class="nav navbar-nav side-nav new_well">-->
    <div class="col-md-12 quickpanelhead"><h4>Quick Link</h4></div>
    <ul class="nav side-nav new_well">
        <?php
        $filter[0]['id'] = "parent_id";
        $filter[0]['value'] = 0;
        $filter[1]['id'] = "status";
        $filter[1]['value'] = 'Active';
        $filter[2]['id'] = "type";
        $filter[2]['value'] = 'Module';

        $req_field = array("id", "name");
        $result = $this->main_model->get_many_records("node", $filter, $req_field, 'name');

        //print_r($result);//die;

        foreach ($result as $rec) {
            ?>
            <li class="dropdown quicklink_li rotate-lr">
                <a href="" class="dropdown-toggle" data-toggle="dropdown"><?php echo $rec['name']; ?>  <b class="fa fa-chevron-right pull-right"></b></a>
                <ul role="menu" class="dropdown-menu col-md-12">
                    <?php
                    $filter_2[0]['id'] = "parent_id";
                    $filter_2[0]['value'] = $rec['id'];
                    $filter_2[1]['id'] = "status";
                    $filter_2[1]['value'] = 'Active';
                    $filter_2[2]['id'] = "type";
                    $filter_2[2]['value'] = 'Module';

                    $req_field_2 = array("id", "name");
                    $result_2 = $this->main_model->get_many_records("node", $filter_2, $req_field_2, 'name');

                    foreach ($result_2 as $rec_2) {
                        echo '<li><a href="' . base_url() . 'node/program/' . $rec_2['id'] . '">' . $rec_2['name'] . '</a></li>';
                    }
                    ?>

                </ul>
            </li>


        <?php } ?>


    </ul>
</div>

</div>
</div>
<!-- end bigCallout-->

