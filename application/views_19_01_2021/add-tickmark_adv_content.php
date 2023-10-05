<?php
$this->load->view('header_view');
$this->load->view('manager_left_view');
?>
<section class="col-md-9">
    <h1 class="page-header">Add Questions</h1>
    <form id="mainForm" enctype="multipart/form-data" class="form-horizontal" role="form" action=" <?php echo base_url() . 'set_data/tickmark_adv_content'; ?>" method="POST">
        <input type="hidden" name="template_instruction_id" value = "<?php echo $template_instruction_id; ?>">
        <!--<input type="hidden" name="tickmark_adv_header_id" value = "<?php // echo $tickmark_adv_header_id;   ?>">-->
        <div class="row">
            <!--<div class="col-md-12">-->
            <?php
//                echo '<pre>';
//                print_r($return_data);die;
//                if (!empty($return_data)) {
//                    $str = "";
//                    foreach ($return_data as $k=>$return_data_value) {
//                        echo '<input type="hidden" name="data['.$k.'][tickmark_adv_header_id]" value = "'.$return_data_value['id'].'">';
//                        echo '<input type="hidden" name="data['.$k.'][template_instruction_id]" value = "'.$template_instruction_id.'">';
//                        $str.='<div class="form-group">
//                <label for="name" class="col-sm-3 control-label">' . $return_data_value["header_name"] . '<br>Question Data:</label>
//                <div class="col-sm-9">
//                    <input type="text" class="form-control"  name="data['.$k.'][question_text]" placeholder="" required><br>
//                </div>
//            </div>';
//                    }
//                    echo $str;
//
//                }
//
//                   echo '<pre>';
//                   print_r($return_data);die;
            ?>
            <div class="col-md-12">
                <div class="row form-group">
                    <div class="col-md-3">
                        <label for="header1" class="control-label"><?php echo $return_data[0]['header_name']; ?></label>
                        <input type="hidden" name="header1" value="<?php echo $return_data[0]['id']; ?>"
                    </div>
                </div>
                <div class="col-md-9">
                    <input type="text" name="content1" required="" class="form-control" >
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="row form-group">
                <div class="col-md-3">
                    <label for="header2" name="header2" class="control-label"><?php echo $return_data[1]['header_name']; ?></label>
                    <input type="hidden"  name="header2" value="<?php echo $return_data[1]['id']; ?>"
                </div>
            </div>
            <div class="col-md-9">
                <input type="text" name="content2" required="" class="form-control" >
            </div>
        </div>
        </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-10">
                <button type="submit" value="Submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        <!--</div>-->
        </div>
    </form>
</section>
<?php $this->load->view('footer_view'); ?>
<?php $this->load->view('html_end_view'); ?>
