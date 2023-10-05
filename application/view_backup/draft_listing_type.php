<?php
//Created:Dewangshu , 25/08/2017 for edit/Save as Draft data of "listing_type"
$this->load->view('header_view');
$this->load->view('user_left_view');
?>

<!--content panel start -->
<section class="col-md-9">
    <h1 class="header_text"><?php
        $name = $this->main_model->get_name_from_id('sheets', 'name', $sheet_id, 'id');
        echo "$name";
        ?>
        .</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="row row_style">
                <div class="col-md-12">
                    <form id="mainForm" enctype="multipart/form-data" class="form-horizontal" role="form" action="<?php echo base_url() . 'set_data/save_data_listing_type'; ?>" method="POST">
                        <div class="row">
                            <div class="col-md-12">
                                <div> <?php echo $instruction; ?></div>
                                <input type="hidden" value="<?php echo $sheet_section_id; ?>" id="sheet_section_id" name="sheet_section_id">
                                <input type="hidden" value="<?php echo $sheet_id; ?>" id="" name="sheet_id">
                                <?php
                                $i = 1;
                                foreach ($listing_type_data as $value) {
                                    //-----for prev data
                                    $ch = 0;
                                    $prev_content = array();
                                    foreach ($draft_data as $key_d => $val_draft) {
                                        if ($val_draft['listing_type_id'] == $value['id']) {
                                            $ch = 1;
                                            $prev_content[] = $val_draft['key_answers'];
                                            //break;
                                        }
                                    }
                                    //-----
                                    ?>
                                    <fieldset class="scheduler-border top-space hide_tag" style="width: 96%;">
                                        <legend class="scheduler-border" id="charges"><?php echo $value['name']; ?></legend>
                                        <div class="table-responsive">
                                            <table class="table <?php echo $value['id']; ?>" id="<?php echo "id_" . $value['id']; ?>">
                                                <input type="hidden" name="list[<?php echo $i; ?>][listing_type_id]" value="<?php echo $value['id']; ?>" />
                                                <thead><?php echo $value['description']; ?> </thead>
                                                <tbody id="<?php echo 'table_' . $i; ?>">
                                                    <tr>
                                                        <td style="width: 10px;">1.</td>
                                                        <td class='name checkEmpty' contenteditable="">
                                                            <?php
                                                            if ($ch) {
                                                                echo '<input class="form-control" type="text" name="list[' . $i . '][key_value][1]" value="' . $prev_content[0] . '" />';
                                                            } else {
                                                                ?>
                                                                <input class="form-control" type="text" name="list[<?php echo $i; ?>][key_value][1]" />
    <?php } ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 10px;">2.</td>
                                                        <td class='name checkEmpty' contenteditable="">
                                                            <?php
                                                            if ($ch) {
                                                                echo '<input class="form-control" type="text" name="list[' . $i . '][key_value][2]" value="' . $prev_content[1] . '" />';
                                                            } else {
                                                                ?>
                                                                <input class="form-control" type="text" name="list[<?php echo $i; ?>][key_value][2]" />
    <?php } ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 10px;">3.</td>
                                                        <td class='name checkEmpty' contenteditable="">
                                                            <?php
                                                            if ($ch) {
                                                                echo '<input class="form-control" type="text" name="list[' . $i . '][key_value][3]" value="' . $prev_content[2] . '" />';
                                                            } else {
                                                                ?>
                                                                <input class="form-control" type="text" name="list[<?php echo $i; ?>][key_value][3]" />
                                    <?php } ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </fieldset>
    <?php
    $i++;
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
<?php $this->load->view('html_end_view'); ?>

