<?php
$this->load->view('header_view');
$this->load->view('home_left_view');
?>

<!--content panel start -->
<section class="col-md-9">
    <h1 class="page-header">
        Values Expected from you as a School student
    </h1>
    <div class="row">
        <div class="col-md-12">
            <div class="row row_style">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <?php
                                            foreach ($added_data as $value) {
                                                echo '<th class="text-center">' . $this->main_model->get_name_from_id("value_for_add_more_type", "name", $value['section_id']) . '</th>';
                                            }
//                                            echo '<pre>';
//                                            print_r($added_data);
//                                            die;
                                            ?>
<!--                                            <th class="text-center">School</th>
                                            <th class="text-center">Home</th>
                                            <th class="text-center">Role Model</th>
                                            <th class="text-center">Books/Movies/Stories</th>
                                            <th class="text-center">Social</th>
                                            <th class="text-center">Spiritual</th>-->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $tbl_str = "";
                                        foreach ($added_data as $rec) {
                                            $tbl_str.='<tr class="post">'
                                                    . "<td>" . $rec['key_values'] . "</td>"
                                                    . '<td>'
                                                    . "</tr>";
                                        }
                                        echo $tbl_str;
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view('footer_view'); ?>
<?php $this->load->view('html_end_view'); ?>