<?php
$this->load->view('header_view');
$this->load->view('home_left_view');
?>

<section class="col-md-9">
    <!--<h class="page-header">Attitude Action Sheet</h1>-->
    <h1 class="header_text"><?php
        $name = $this->main_model->get_name_from_id('sheets', 'name', $sheet_id, 'id');
        echo "$name";
        ?>.</h1>
    <form id="mainForm" enctype="multipart/form-data" class="form-horizontal" role="form" action="<?php echo base_url() . 'set_data/save_data_adv_tickmark'; ?>" method="post">
        <div> <?php echo $instruction; ?></div>
        <input type="hidden" value="<?php echo $sheet_id; ?>" name="sheet_id">
        <input type="hidden" value="<?php echo $sheet_section_id; ?>" name="sheet_section_id">

        <div class="">
            <div class="">
                <!--<div class="col-md-12">-->
                <!--<div class="col-sm-9">-->
                <div class="panel panel-success">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr style="background-color:#dff0d8; color:#3c763d;">

                                    <?php
                                    foreach ($headerName as $header) {
                                        echo '<th>' . '</th>';
                                        echo'<th class="text-center">' . $header['header_name'] . '</th>';
                                    }
                                    ?>
                                </tr>
                            </thead>
                            <?php
                            echo '<tr>';
                            $i = "0";
                            foreach ($question_data as $key => $value) {

                                if ($i % 1 === 0) {
                                    echo '</tr><tr>';
                                }
                                $ch = 0;
                                $prev_content = '';
                                foreach ($draft_data as $d_key => $draft_val) {
                                    if ($draft_val['tickmark_adv_content_id'] == $value['id']) {
                                        if ($draft_val['tickmark_adv_header_id'] == $value['header1']) {
                                            $prev_content = "checked h1";
                                        } else if ($draft_val['tickmark_adv_header_id'] == $value['header2']) {

                                            $prev_content = "checked h2";
                                        }
                                        $ch = 1;
                                        break;
                                    }
                                }
                                if ($ch) {
                                    if ($prev_content == 'checked h1') {

                                        echo "<td>" . '<input type="radio" checked name="arr[' . $key . '][tickmark_adv_header_id]" value="' . $value['header1'] . '">' . "</td>";
                                        echo '<input type="hidden" name="arr[' . $key . '][tickmark_adv_content_id]" value="' . $value['id'] . '">';
                                        echo "<td>" . $value['content1'] . "</td>";
                                        echo "<td>" . '<input type="radio" name="arr[' . $key . '][tickmark_adv_header_id]" value="' . $value['header2'] . '">' . "</td>";
                                        echo "<td>" . $value['content2'] . "</td>";
                                    } else if ($prev_content == 'checked h2') {
                                        echo "<td>" . '<input type="radio" name="arr[' . $key . '][tickmark_adv_header_id]" value="' . $value['header1'] . '">' . "</td>";
                                        echo '<input type="hidden" name="arr[' . $key . '][tickmark_adv_content_id]" value="' . $value['id'] . '">';
                                        echo "<td>" . $value['content1'] . "</td>";
                                        echo "<td>" . '<input type="radio" checked name="arr[' . $key . '][tickmark_adv_header_id]" value="' . $value['header2'] . '">' . "</td>";
                                        echo "<td>" . $value['content2'] . "</td>";
                                    }
                                } else {
                                    echo "<td>" . '<input type="radio" name="arr[' . $key . '][tickmark_adv_header_id]" value="' . $value['header1'] . '">' . "</td>";
                                    echo '<input type="hidden" name="arr[' . $key . '][tickmark_adv_content_id]" value="' . $value['id'] . '">';
                                    echo "<td>" . $value['content1'] . "</td>";
                                    echo "<td>" . '<input type="radio" name="arr[' . $key . '][tickmark_adv_header_id]" value="' . $value['header2'] . '">' . "</td>";
                                    echo "<td>" . $value['content2'] . "</td>";
                                }
                                $i++;
                            }

                            echo '</tr>';
                            ?>
                        </table>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-3">
                        <button type="submit" value="1" name="draft" class="btn btn-primary">Save as Draft</button>
                    </div>
                    <div class="col-sm-3">
                        <button type="submit" value="0" name="draft" class="btn btn-primary">Submit</button>
                    </div>
                </div>

            </div>
        </div>
        </div>
        </div>
        <?php $this->load->view('footer_view'); ?>
        <?php $this->load->view('html_end_view'); ?>
