<?php
$this->load->view('header_view');
$this->load->view('user_left_view');
?>
<section class="col-md-9">
    <h1 class="header_text"><?php
        $name = $this->main_model->get_name_from_id('sheets', 'name', $sheet_id, 'id');
        echo "$name";
        ?></h1>

    <!-- Table content -->
    <div class="row">
        <div class="col-md-12">
            <form id="mainForm" enctype="multipart/form-data" class="form-horizontal" role="form" action="<?php echo base_url() . 'set_data/save_data_checkbox_with_no_tooltip'; ?>" method="POST">
                <div> <?php echo $instruction; ?></div>
                <input type="hidden" value="<?php echo $sheet_id; ?>" name="sheet_id">
                <input type="hidden" value="<?php echo $sheet_section_id; ?>" name="sheet_section_id">
                <?php
                foreach ($category_id as $category) {
                    echo '<div class="panel panel-success" style="border-color: #fff; border-radius: 0; box-shadow: none; border: none;">
                     <div class="panel-heading" style="color: #ffffff; background-color:#01897b;  border-color: #01897b;">
                        <h3 class="panel-title" style="text-align:center;">' . $this->main_model->get_name_from_id('actionsheet_category', 'name', $category['category']) . '</h3>
                    </div><br>
                    <!--<div class="panel-body" style="background: #505050; border: 1px solid #dcdcdc;  margin: 1rem 0;"><p style="color:#fff;">' . $this->main_model->get_name_from_id('actionsheet_category', 'description', $category['category']) . '</p></div>-->
                 <div class="table-responsive">
                <table class="table table-bordered" id="">
                    <thead>
                        <tr>';
                    $i = 0;
                    foreach ($data[$category['category']] as $rec) {
                        if (($i % 3) == 0) {

                            echo '<tr>';
                        }
                        $i++;
                        echo '<td  width="33.33%" style="background: #fff; padding: 0 0px 0 9px; margin: 0; border: 4px solid #fff;"><input data-content="' . $rec['description'] . '" type="checkbox" class="check" data-category="' . $category['category'] . '" id="' . $rec['id'] . '">'
                        . '<span  style="display: inline-block; padding: 12px 10px; width: 91.3%; background: #01897b;  margin: 0px 0 0 10px; color: #fff;"> '
                        . $rec['name'] . '</span></td>';

                        if (($i % 3) == 0) {
                            echo '</tr>';
                        }
                    }
                    echo '</tbody>
                </table>
                </div>
                </div>';
                }
                ?>
                <div class="form-group">
                    
                    <div class="col-sm-12">
                        <center>
                            <button type="submit" value="0" name="draft" class="btn btn-success">Save as Draft</button>
							<button type="submit" value="1" name="draft" class="btn btn-success">Submit</button>
                        </center>
                    </div>
                    <div class="col-sm-3">
                        <!--<button type="submit" value="0" name="draft" class="btn btn-success">Submit</button>-->
                        
                        <!--<a href="<?php //echo base_url('sheets_pdf/sheets/'.$sheet_id); ?>" class="btn btn-success">Save as Pdf</a>-->
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
<script>
    var category_max = [];
    category_current = [];
<?php
foreach ($max as $key => $rec) {
    echo 'category_max["' . $key . '"] = "' . $rec . '" ;';
    echo 'category_current["' . $key . '"] = 0 ;';
}
?>
    //var a = category["Personal"];
    //`alert(a);
    $(document).ready(function () {
        $('.check').on('click', function () {

            var category_name = $(this).data('category');
            var max = category_max[category_name];
            var cat = category_current[category_name];
            //=========================  if sheet max =========================







            //========================= if cat max != 0 ===================
            if (category_max[category_name] > category_current[category_name]) {
                category_current[category_name]++;
                //================== sheet max =================
                var content = $(this).data('content');

                var popup_title = <?php echo json_encode($this->main_model->get_name_from_id('tooltip_details', 'popup_title', $sheet_section_id, 'template_instruction_id')); ?>;
                var popup_placeholder = <?php echo json_encode($this->main_model->get_name_from_id('tooltip_details', 'popup_placeholder', $sheet_section_id, 'template_instruction_id')); ?>;
                var a = parseInt(this.id.substr(0));
                var b = (document.getElementById(a).checked);
                if (b) {

                    //displayImport(content, a);
                    displayImport1(popup_title, popup_placeholder, a);
                    $('#' + a).attr('name', "sheetvalue_id[" + a + "]");
                } else {
                    $('#' + a).removeattr('name', '');
                }

            } else {

                var a = parseInt(this.id.substr(0));
                var b = (document.getElementById(a).checked);
                if (b) {
                    alert("Please select only " + category_max[category_name]);
                    $(this).removeAttr('checked');
                } else {
                    category_current[category_name] = category_current[category_name] - 1;
                    $(this).attr('name', '');

                }

            }
        });

        //========================== sheet max value ====================

    });
    //------------for custom tooltip-----
    function displayImport1(popup_title, popup_placeholder, target) {
        var modelHtmlStr = '<div class="modal" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importTextModel">'
                + '<div class="modal-dialog" role="document">'
                + '<div class="modal-content">'
                + '<div class="modal-header" style="background-color: #01897b; color: #fff;">'
                + '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'
                + '<h5 class="modal-title">' + popup_title + '</h5>'
                + '</div>'
                + '<div class="modal-body">'
                + '<div class="form-group">'
                + '<label for="message-text" id="" class="control-label"></label>'
                + '<textarea class="form-control legacy" rows="12" id="legacy_text" placeholder="' + popup_placeholder + '"></textarea>'
                + '</div>'
                + '</div>'
                + '<div class="modal-footer">'
                + '<button type="button" id="importBtn" class="btn btn-success"  data-dismiss="modal">Save</button>'
                + '</div>'
                + '</div>'
                + '</div>'
                + '</div>';

        $('body').prepend(modelHtmlStr);
        $('#importModal').modal('show');
        $('#importBtn').click(function () {
            var input_text = $("#legacy_text").val();
            $('#' + target).attr("value", input_text);

//        alert(input_text);
        });
    }
//------------end for custom tooltip-----
</script>

<?php $this->load->view('html_end_view'); ?>
