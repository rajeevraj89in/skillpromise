<?php
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
                                        <div class="panel-heading">
                                            <h3 class="panel-title"><?php echo $value['header_name']; ?></h3>
                                        </div>
                                        <?php
                                        $filter[0]['id'] = 'descriptive_type_id';
                                        $filter[0]['value'] = $value['id'];
                                        $data1 = $this->main_model->get_many_records("descriptive_type_details", $filter, '', '');
                                        foreach ($data1 as $childData) {
                                            echo '<div class="panel-body"><b>
                                                        ' . $childData['answer_header_text'] . '</b>';
                                            echo '<textarea class="form-control skill_editor_2" rows="5" id="description" name="list[' . $childData['id'] . ']" ></textarea>';
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
        </div>
    </div>
    <hr/>
    <div class="modal fade" id="sucess_message" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">
                        Information
                    </h4>
                </div>
                <div class="modal-body"> Data has been saved
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
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