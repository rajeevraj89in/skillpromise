<?php
//Created:Dewangshu , 26/8/2017 , for save as draft for "marking_type"
$this->load->view('header_view');
/*
$student_flag = false;
if(isset($_SESSION['role_name'])){
	if($_SESSION['role_name'] == 'Student'){
		$student_flag = true;
	}
}
if($student_flag){
	$this->load->view('user_left_view_test_center');
}
else{
   $this->load->view('user_left_view'); 
}*/
$this->load->view('user_left_view');
?>
<section class="col-md-9">
    <style>
        .text-left{
            font-weight: normal !important;
        }
         .text-center{
            font-weight: normal !important;
        }
    </style>
    <h1 class="header_text"><?php
        $name = $this->main_model->get_name_from_id('sheets', 'name', $sheet_id, 'id');
        echo "$name";
        ?></h1>
    <div class="row">
        <div class="col-md-12">
            <form id="mainForm" enctype="multipart/form-data" class="form-horizontal" role="form" action="<?php echo base_url() . 'set_data/save_data_marking_type'; ?>" method="POST">
                <div><h3><center>
                            <?php echo $this->main_model->get_name_from_id('template_instruction', 'section_name', $sheet_section_id, 'id'); ?>
                        </center> </h3>
						
					<?php if(!empty($sheet_record->image_file)){ ?>
					   <img style="width:100%;" class="img-responsive" alt="" src="https://skillpromise.co/assets/img/uploads/<?php echo $sheet_record->image_file; ?>" />
					<?php } ?>
                </div>
				<br/></br/>
                <div> <?php echo $instruction; ?></div>
                <input type="hidden" value="<?php echo $sheet_id; ?>" name="sheet_id">
                <input type="hidden" value="<?php echo $sheet_section_id; ?>" name="sheet_section_id">
                 <br/></br/>

                <div class="panel panel-success">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <!--<tr style="background-color: #01897b; color: #ffffff; border-color: #fff;">-->
                                <!--    <th class="text-center"></th>-->
                                <!--    <th class="text-center"></th>-->
                                <!--    <th class="text-center" colspan="<?php echo sizeof($headerName) - 1; ?>">Marks</th>-->
                                <!--</tr>-->
                                <tr class="text-center" style="background-color:#dff0d8; color:#3c763d; ">
<!--                                    <th class="text-center"></th>
                                    <th class="text-center"></th>-->
                                    <?php
//                                    foreach ($headerName as $header) {
//                                        if ($header['header_type'] == 'option_header') {
//                                            echo'<th class="text-center">' . $header['marks'] . '</th>';
//                                        }
//                                    }
//
                                    ?>
                                </tr>
                                <tr class="text-center" style="background-color: #01897b; color: #ffffff; border-color: #fff; ">
                                    <?php
                                    echo'<th class="text-center" width="10%" style="font-weight:bold!important;font-size:16px" >S. No.</th>';
                                    foreach ($headerName as $header) {
                                        echo'<th class="text-center" style="font-weight:bold!important;font-size:16px">' . $header['header_name'] . '</th>';
                                    }
                                    ?>
                                </tr>
                            </thead>
                            </tbody>
                            <?php
                            foreach ($question_data as $k => $val) {
                                //-----for prev data
                                $ch = 0;
                                $prev_content = '';
                                foreach ($draft_data as $key_d => $val_draft) {
                                    if ($val_draft['marking_type_id'] == $val['id']) {
                                        $ch = 1;
                                        $prev_content = $val_draft['marking_type_header_id'];
                                        break;
                                    }
                                }
                                //-----
                                echo'<tr><th class="text-center">' . ($k + 1) . '</th><th class="text-left" id=' . $val['id'] . '>' . $val['name'] . '</th>';
                                echo'<input type="hidden" name="items[' . $k . '][question_id]" value=' . $val['id'] . ' >';
                                foreach ($headerName as $k2 => $val_header) {
                                    if ($ch) {
                                        if ($val_header['header_type'] == 'option_header') {
                                            if ($val_header['id'] == $prev_content) {
                                                echo '<th id=' . $val_header['id'] . ' class="text-center"><input type="radio" checked name="items[' . $k . '][option_id]" value=' . $val_header['id'] . ' ></th>';
                                            } else {
                                                echo '<th id=' . $val_header['id'] . ' class="text-center"><input type="radio"  name="items[' . $k . '][option_id]" value=' . $val_header['id'] . ' ></th>';
                                            }
                                        }
                                    } else {
                                        if ($val_header['header_type'] == 'option_header') {
                                            echo '<th id=' . $val_header['id'] . ' class="text-center"><input type="radio"  name="items[' . $k . '][option_id]" value=' . $val_header['id'] . ' ></th>';
                                        }
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
                    <div class="col-sm-12">
                        <center>
						
								 <button type="submit" value="0" name="draft" class="btn btn-success">Save as Draft</button>
								 <button type="submit" value="1" name="draft" class="btn btn-success">Submit</button>
							
                        </center>

                    </div>
                    <!--<div class="col-sm-3">-->
                    <!--    <button type="submit" value="0" name="draft" class="btn btn-success">Submit</button>-->
                    <!--</div>-->
                </div>
            </form>
        </div>
    </div>
</section>
<?php $this->load->view('footer_view'); ?>
<script>

</script>
<?php $this->load->view('html_end_view'); ?>