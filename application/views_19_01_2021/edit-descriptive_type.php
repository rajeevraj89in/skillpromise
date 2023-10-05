<?php
$this->load->view('header_view');
$this->load->view('manager_left_view');
//echo '<pre>';
//print_r($id);die;
?>
<!--content panel start -->
<section class="col-md-9">
    <h1 class="header_text">Edit Sheet Content:<font color="green"><?php
        echo $this->main_model->get_name_from_id('template_instruction', 'section_name', $template_instruction_id);
        ?></font></h1>
    <!-- add-program-form content -->
    <div class="row">
        <div class="col-md-12">
            <form id="mainForm" enctype="multipart/form-data" class="form-horizontal" role="form" action=" <?php echo base_url() . 'set/descriptive_type'; ?>" method="POST">
                <input type="hidden" name="template_instruction_id" value = "<?php echo $template_instruction_id; ?>">
                <!--<input type="hidden" name="descriptive_type_id" value = "<?php //  echo $descriptive_type_id;           ?>">-->
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Descriptive Type Id</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="id" value = "<?php echo $id; ?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Header Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="header_name" required="" value="<?php echo $header_name; ?>">
                    </div>
                </div>

                <?php
                $filter[0]["id"] = "template_instruction_id";
                $filter[0]["value"] = $template_instruction_id;
                $filter[1]["id"] = "id";
                $filter[1]["value"] = $id;
                $data = $this->main_model->get_many_records('descriptive_type', $filter, '', '');

                foreach ($child_data as $key => $value) {
                    echo
                    '<div class="form-group">
                    <label for="" class="col-sm-3 control-label">Edit Answer Header Text</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" value="' . $value['answer_header_text'] . '">
                    </div>
                </div>';
                }
                ?>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-10">
                        <button type="submit" value="Submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

</div><!-- end main -->
<?php $this->load->view('footer_view'); ?>

<?php $this->load->view('html_end_view'); ?>
