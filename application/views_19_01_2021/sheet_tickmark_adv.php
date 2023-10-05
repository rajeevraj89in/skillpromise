<?php
$this->load->view('header_view');
$this->load->view('user_left_view');
?>

<section class="col-md-9">
    <!--<h class="page-header">Attitude Action Sheet</h1>-->
    <h1 class="header_text"><?php
        $name = $this->main_model->get_name_from_id('sheets', 'name', $sheet_id, 'id');
        echo "$name";
        ?></h1>
    <form id="mainForm" enctype="multipart/form-data" class="form-horizontal" role="form" action="<?php echo base_url() . 'set_data/save_data_adv_tickmark'; ?>" method="post">
        <div> <?php echo $instruction; ?></div>
        <input type="hidden" value="<?php echo $sheet_id; ?>" name="sheet_id">
        <input type="hidden" value="<?php echo $sheet_section_id; ?>" name="sheet_section_id">

        <div class="">
            <div class="">
                <!--                <div class="col-md-12">
                                    <div class="col-sm-9">-->
                <div class="">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
<!--                                            <td></td>
                                    <td>Attitudinal Strengths</td>
                                    <td></td>
                                    <td>Attitudinal Area of Improvements</td>-->

                                    <?php
                                    foreach ($headerName as $header) {
                                        echo'<th colspan="2" class="text-center" style="background-color: #01897b; color: #fff; border-color: #fff; border-right-width: 8px;">' . $header['header_name'] . '</th>';
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
                                echo "<td style='background-color: #fff; border: 7px solid #fff; border-right-width: 0px !important; border-left-width: 0px;'>" . '<input type="radio" name="arr[' . $key . '][tickmark_adv_header_id]" value="' . $value['header1'] . '">' . "</td>";
                                echo '<input type="hidden" name="arr[' . $key . '][tickmark_adv_content_id]" value="' . $value['id'] . '">';
                                echo "<td style='background-color: #01897b; border: 7px solid #fff; color: #fff; border-left-width: 0px !important;'>" . $value['content1'] . "</td>";
                                echo "<td style='background-color: #fff; border: 7px solid #fff;border-right-width: 0px !important; border-left-width: 0px;'>" . '<input type="radio" name="arr[' . $key . '][tickmark_adv_header_id]" value="' . $value['header2'] . '">' . "</td>";
                                echo "<td style='background-color: #01897b; border: 7px solid #fff; color: #fff; border-left-width: 0px !important;'>" . $value['content2'] . "</td>";
                                $i++;
                            }

                            echo '</tr>';
//
                            ?>
<!--                              <tr>
                             <td><input type="radio" name="tick"></td>
                             <td>You are curious</td>
                             <td><input type="radio" name="tick"></td>
                             <td>You need to more curious</td>
                         </tr>-->
                        </table>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-12">
                        <center>
                            <button type="submit" value="1" name="draft" class="btn btn-success">Save as Draft</button>
                        </center>
                        
                    </div>
                    <!--<div class="col-sm-3">-->
                    <!--    <button type="submit" value="0" name="draft" class="btn btn-success">Submit</button>-->
                    <!--</div>-->
                </div>

            </div>
        </div>
    </form>
</section>
<?php $this->load->view('footer_view'); ?>
<?php $this->load->view('html_end_view'); ?>
