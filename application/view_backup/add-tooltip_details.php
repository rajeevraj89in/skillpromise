<?php
//Created:Dewangshu, 5-0ct -17 for Toottip details insert view
$this->load->view('header_view');
$this->load->view('manager_left_view');
?>
<!--content panel start -->
<section class="col-md-9">
    <h1 class="header_text">Add Tooltip Details</h1>
    <!-- add-program-form content -->
    <div class="row">
        <div class="col-md-12">

            <form id="mainForm" enctype="multipart/form-data" class="form-horizontal" role="form" action=" <?php echo base_url() . 'set/tooltip_details'; ?>" method="POST">

                <?php
                $section_name = $this->main_model->get_name_from_id('template_instruction', 'section_name', $template_instruction_id, 'id');
                $sheet_id = $this->main_model->get_name_from_id('template_instruction', 'sheet_id', $template_instruction_id, 'id');
                $sheet_name = $this->main_model->get_name_from_id('sheets', 'name', $sheet_id, 'id');
                echo '<center><h4>' . $sheet_name . ' / ' . $section_name . '</h4></center>';
                ?>
                <div class="form-group top-margin">
                    <div class="col-lg-8">
                        <input type="hidden" name="template_instruction_id" value="<?php echo $template_instruction_id; ?>" />
                        <div class="row form-group">
                            <div class="col-lg-3">
                                <label for="popup_title">Popup Title:</label>
                            </div>
                            <div class="col-lg-9">
                                <textarea class="form-control" name="popup_title" rows="4" placeholder="Title of Popup/Model"></textarea>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-lg-3">
                                <label for="popup_title">Popup Placeholder:</label>
                            </div>
                            <div class="col-lg-9">
                                <textarea class="form-control" name="popup_placeholder" rows="4" placeholder="Placeholder of Popup/Model"></textarea>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-lg-3">
                                <label for="popup_title">Popup Tooltip:</label>
                            </div>
                            <div class="col-lg-9">
                                <textarea class="form-control" name="popup_tooltip" rows="4" placeholder="Tooltip when mousover or click on event"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-10">
                        <button type="submit" value="Submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

</div><!-- end main -->
<?php $this->load->view('footer_view'); ?>
<script>


</script>
<?php $this->load->view('html_end_view'); ?>
