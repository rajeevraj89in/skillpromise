<?php
$this->load->view('header_view');
$this->load->view('user_left_view');
?>
<section class="col-md-9">
    <h1 class="header_text"><?php
        $name = $this->main_model->get_name_from_id('sheets', 'name', $sheet_id, 'id');
        echo "$name";
        ?></h1>
    <div class="row">
        <div class="col-md-12">
            <form id="mainForm" enctype="multipart/form-data" class="form-horizontal" role="form" action="<?php echo base_url() . 'set_data/save_data_tickmark_type'; ?>" method="POST">
                <div> <?php echo $instruction; ?></div>
                <input type="hidden" value="<?php echo $sheet_id; ?>" name="sheet_id">
                <input type="hidden" value="<?php echo $sheet_section_id; ?>" name="sheet_section_id">


                <div class="panel panel-success">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="content">
                            <thead>
                                <tr style="background-color:#dff0d8; color:#3c763d;">
                                    <?php
                                    foreach ($headerName as $header) {
                                        echo'<th class="text-center">' . $header['header_name'] . '</th>';
                                    }
                                    ?>
                                </tr>
                            </thead>
                                </tbody>
                                    <?php
                                    foreach ($question_data as $k=>$val) {
                                        echo'<tr><th class="text-center" id='.$val['id'].'>' . $val['name'] . '</th>';
                                        echo'<input type="hidden" name="items['.$k.'][question_id]" value='.$val['id'].' >';
                                        foreach ($headerName as $k2 => $val_header) {
                                            if($val_header['header_type']=='option_header'){
                                                echo '<th id='.$val_header['id'].' class="text-center"><input type="radio"  name="items['.$k.'][option_id]" value='.$val_header['id'].' ></th>';
                                            }
                                        }
                                        echo '</tr>';
                                    }
                                    ?>
                                </tbody>
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
            </form>
        </div>
    </div>
</section>
<?php $this->load->view('footer_view'); ?>
<script>

</script>
<?php $this->load->view('html_end_view'); ?>