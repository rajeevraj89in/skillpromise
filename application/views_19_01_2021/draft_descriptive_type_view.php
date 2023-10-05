<?php
//Created:Dewangshu , 26/08/2017 for edit/Save as Draft data of "descriptive_type"
$this->load->view('header_view');
$this->load->view('user_left_view');
?>
<section class="col-md-9">
<h1 class="header_text"><?php
$name = $this->main_model->get_name_from_id('sheets', 'name', $sheet_id, 'id');
echo "$name";
?>
</h1>
<div class="row">
<div class="col-md-12">
<div class="row row_style">
<div class="col-md-12">
    <form id="mainForm" enctype="multipart/form-data" class="form-horizontal" role="form" action="<?php echo base_url() . 'set_data/save_data_descriptive_type'; ?>" method="POST">
        <input type="hidden" value="<?php echo $sheet_id; ?>" id="sheet_section_id" name="sheet_id">
        <div class="row">
            <div class="col-md-12">
                <div> <?php echo $instruction; ?></div>
                <input type="hidden" value="<?php echo $sheet_section_id; ?>" id="sheet_section_id" name="sheet_section_id">
                <?php
                foreach ($listing_type_data as $value) {
                    ?>
                    <!--                                    <fieldset class="scheduler-border top-space hide_tag" style="width: 96%;">
                                                            <legend class="scheduler-border" id="charges"></legend>-->
                    <div class="panel panel-success">
                        <div class="panel-heading" style="color: #ffffff; background-color: #01897b; border-color: #01897b;">
                            <h3 class="panel-title"><?php echo $value['header_name']; ?></h3>
                        </div>
                        <?php
                        $filter[0]['id'] = 'descriptive_type_id';
                        $filter[0]['value'] = $value['id'];
                        $data1 = $this->main_model->get_many_records("descriptive_type_details", $filter, '', '');
                        foreach ($data1 as $childData) {
                            //-----for prev data
                            $ch = 0;
                            $prev_content = '';
                            foreach ($draft_data as $key_d => $val_draft) {
                                if ($val_draft['description_details_id'] == $childData['id']) {
                                    $ch = 1;
                                    $prev_content = $val_draft['value'];
                                    break;
                                }
                            }
                            //-----
                            echo '<div class="panel-body"><b style="background: #505050; display: block; border: 1px solid #505050; color:#fff; padding:6px;">
                                        ' . $childData['answer_header_text'] . '</b>';
                            if ($ch) {
                                echo '<textarea class="form-control skill_editor_2" rows="5" id="description" name="list[' . $childData['id'] . ']" >' . $prev_content . '</textarea>';
                            } else {
                                echo '<textarea class="form-control skill_editor_2" rows="5" id="description" name="list[' . $childData['id'] . ']" ></textarea>';
                            }
                            echo'</div>';
                        }
                        ?>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        <hr/>
        <div class="form-group">
            <div class="col-sm-12">
                <center>
                    <button type="submit" value="1" name="draft" class="btn btn-success">Save as Draft</button>
                    &nbsp;<a class="btn btn-success" href="<?php echo base_url('sheets_pdf/sheets/'.$sheet_id); ?>">Download as PDF</a>
                </center>
                
            </div>
            <!--<div class="col-sm-3">-->
            <!--    <button type="submit" value="0" name="draft" class="btn btn-success">Submit</button>-->
            <!--</div>-->
        </div>
    </form>
</div>
</div>
</div>
</div>
<hr/>

</section><!-- end col-md-9 -->
<!--end content panel start -->
</div><!-- end bigCallout-->
<!-- End Content and Sidebar
===================================================== -->
</div><!-- end main -->
<?php $this->load->view('footer_view'); ?>
<script>

$(document).ready(function () {
$('.skill_editor_2').summernote();
});

</script>
<?php $this->load->view('html_end_view'); ?>