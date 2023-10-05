<?php
$this->load->view('header_view');
$this->load->view('manager_left_view');
?>
<section class="col-md-9">
    <h1 class="page-header">Edit Questions</h1>
    <form id="mainForm" enctype="multipart/form-data" class="form-horizontal" role="form" action=" <?php echo base_url() . 'set/tickmark_adv_content'; ?>" method="POST">
        <!--<input type="hidden" name="template_instruction_id" value = "<?php //echo $template_instruction_id; ?>">--> 

        <div class="form-group">
            <label for="" class="col-sm-3 control-label">ID</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="id" value = "<?php echo $id; ?>" readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-3 control-label">Template Instruction Id:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="template_instruction_id" value = "<?php echo $template_instruction_id; ?>" readonly>
            </div>
        </div>

        <?php
        $filter[0]["id"] = "template_instruction_id";
        $filter[0]["value"] = $template_instruction_id;
        $filter[1]["id"] = "id";
        $filter[1]["value"] = $id;
        $data = $this->main_model->get_many_records('tickmark_adv_content', $filter, '', '');
//            echo '<pre>';
//            print_r($data);die;


        foreach ($data as $key => $value) {

            echo '<div class="col-md-12">
                <div class="row form-group">
                    <div class="col-md-3">
            <label for="header1" name="header1" class="control-label" value="' . $this->main_model->get_name_from_id('tickmark_adv_header', 'header_name', $value["header1"]) . '">';
            echo $this->main_model->get_name_from_id('tickmark_adv_header', 'header_name', $value["header1"]);

            echo '</label>
                    </div>
                </div>
                    <div class="col-md-9">
                        <input type="text" name="content1" required="" class="form-control" value="' . $value["content1"] . '">
                    </div>
                </div>
                
                <div class="col-md-12">
                <div class="row form-group">
                    <div class="col-md-3">
                        <label for="header2" name="header2" class="control-label">';
                       echo $this->main_model->get_name_from_id('tickmark_adv_header', 'header_name', $value["header2"]);

            echo ' </label>
                    </div>
                </div>
                    <div class="col-md-9">
                        <input type="text" name="content2" required="" class="form-control" value="' . $value["content2"] . '">
                    </div>
                </div>';

//                echo '<pre>';
//            print_r($value);die;
        }
        ?>

        <div class="row col-md-12">
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-10">
                    <button type="submit" value="Submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
        </div>
    </form>
</section>
<?php $this->load->view('footer_view'); ?>
<?php $this->load->view('html_end_view'); ?>
