<?php
//Created :Dewangshu Pandit , 26/aug-17 , for Save as Draft for range_type
$this->load->view('header_view');
$this->load->view('user_left_view');
?>

<!--content panel start -->
<section class="col-md-9">
    <h1 class="header_text"><?php
        $name = $this->main_model->get_name_from_id('sheets', 'name', $sheet_id, 'id');
        echo "$name";
        ?>.</h1>

    <!-- Table content -->
    <div class="row">
        <div class="col-md-12">
            <form id="mainForm" enctype="multipart/form-data" class="form-horizontal" role="form" action="<?php echo base_url() . 'set_data/save_data_range_type'; ?>" method="POST">
                <div> <?php echo $instruction; ?></div>
                <input type="hidden" value="<?php echo $sheet_id; ?>" name="sheet_id">
                <input type="hidden" value="<?php echo $sheet_section_id; ?>" name="sheet_section_id">
                <?php
                $i = 0;
                foreach ($data as $key_cat => $each_cat_value) {
                    echo '<div class="panel panel-success">
                     <div class="panel-heading">
                        <h3 class="panel-title" style="text-align:center;">' . $this->main_model->get_name_from_id('actionsheet_category', 'name', $key_cat) . '</h3>
                    </div>
                 <div class="table-responsive">
                <table class="table table-bordered" id="">
                <thead>
                    <td>Name</td>
                    <td>Your Result</td>
                    <td>Normal Range</td>
                </thead>';
                    foreach ($each_cat_value as $key_row => $rec) {
                        //-----for prev data
                        $ch = 0;
                        $prev_content = '';
                        foreach ($draft_data as $key_d => $val_draft) {
                            if ($val_draft['range_type_id'] == $rec['id']) {
                                $ch = 1;
                                $prev_content = $val_draft['your_ans'];
                                break;
                            }
                        }
                        //-----
                        echo '<tr>';
                        echo '<td style="width:30%"><label>' . $rec['name'] . '</label>'
                        . '<input type="hidden" name="list[' . $i . '][range_type_id]" value=' . $rec['id'] . '></td>';
                        if ($ch) {
                            echo '<td style="width:40%;"><input type="text" class="form-control" id="" name="list[' . $i . '][your_ans]" value="' . $prev_content . '"></td>';
                        } else {
                            echo '<td style="width:40%;"><input type="text" class="form-control" id="" name="list[' . $i . '][your_ans]"></td>';
                        }
                        echo '<td style="width:30%;"><label>' . $rec['normal_range'] . '</label></td>';
                        echo '</tr>';
                        $i++;
                    }

                    echo '</tbody>
                </table>
                </div>
                </div>';
                }
                ?>
                <div class="form-group">
                    <div class="col-sm-3">
                        <button type="submit" value="1" name="draft" class="btn btn-primary">Save as Draft</button>
                    </div>
                    <div class="col-sm-3">
                        <button type="submit" value="0" name="draft" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
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
