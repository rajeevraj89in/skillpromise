<?php
$this->load->view('header_view');
$this->load->view('manager_left_view');
$permission_group_name = $this->main_model->get_name_from_id('permission_groups', 'name', end($this->uri->segment_array()));
//echo '["' . implode('", "', $cp) . '"]';
//die;
?>
<!--content panel start -->
<section class="col-md-9">
    <h1 class="page-header">Assign Control Points to <?php echo $permission_group_name; ?></h1>
    <!--div class="row text-center">
    <div class="col-md-12">
            <a href="" class="btn btn-primary">Add Program</a>
    </div>
    </div>
    <hr /-->
    <!-- add-program-form content -->
    <div class="row">
        <div class="col-md-12">
            <form id="mainForm" enctype="multipart/form-data" class="form-horizontal" role="form" action=" <?php echo base_url() . 'set_many/control_points-permission_groups/' . end($this->uri->segments); ?>" method="POST">
                <input type="hidden" name="" value="<?php echo end($this->uri->segments); ?>">
                <!--permission_groups-->
                <div class="form-group">
                    <select  class ="cp_pg" multiple="multiple" id='control_points' autofocus>
                        <?php echo $this->main_model->fill_select('control_points', 'name'); ?>
                    </select>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-5 col-sm-8">
                        <button type="submit" class="btn btn-primary">Assign</button>
                    </div>
                </div>

            </form>
        </div>
    </div><!-- end add-program-form content -->
</section><!-- end col-md-9 -->
<!--end content panel start -->

</div><!-- end bigCallout-->

<!-- End Content and Sidebar
===================================================== -->
</div><!-- end main -->


<?php $this->load->view('footer_view'); ?>
<script>
//    $(document).ready(function () {
//        $('#btnRight').click(function (e) {
//            var selectedOpts = $('#lstBox1 option:selected');
//            if (selectedOpts.length == 0) {
//                alert("Nothing to move.");
//                e.preventDefault();
//            }
//
//            $('#lstBox2').append($(selectedOpts).clone());
//            $(selectedOpts).remove();
//            e.preventDefault();
//        });
//
//        $('#btnLeft').click(function (e) {
//            var selectedOpts = $('#lstBox2 option:selected');
//            if (selectedOpts.length == 0) {
//                alert("Nothing to move.");
//                e.preventDefault();
//            }
//
//            $('#lstBox1').append($(selectedOpts).clone());
//            $(selectedOpts).remove();
//            e.preventDefault();
//        });
//    });
//
//    $("#lstBox1 option[value='0']").remove();
//    $("#lstBox2").width($("#lstBox1").width());
//    $("#lstBox1").width($("#lstBox2").width());
    $(document).ready(function () {
        $('#control_points option:eq(0)').remove(); //deleting -- select an option --

        var dualListbox = $('.cp_pg').bootstrapDualListbox({
            nonSelectedListLabel: 'Control Points',
            selectedListLabel: '<?php echo $permission_group_name; ?>',
            helperSelectNamePostfix: 'control_points[]',
            preserveSelectionOnMove: 'moved',
            moveOnSelect: false,
        });
        var selectedOptions = [];
        selectedOptions = <?php echo '["' . implode('", "', $source_data) . '"]' ?>;
        if (selectedOptions) {
            var arrayLength = selectedOptions.length;
//             var numericalArrayValue = arrayValue.split(',').map(Number);
            for (var i = 0; i < arrayLength; i++) {
                var arrayValue = parseInt(selectedOptions[i]);
                $("select[name~='control_points[]1'] option[value='" + arrayValue + "']").prop('selected', true);
            }
            $(".box1").find(".move").trigger("click");
            $("select[name~='control_points[]1'] option").prop('selected', false); //deselecting first list options before sumitting form
            $("select[name~='control_points[]2'] option").prop('selected', false); //deselecting second list options before sumitting form
        }

        $("#mainForm").submit(function () {//form validation
            dualListbox.trigger('bootstrapDualListbox.refresh');
            $("select[name~='control_points[]1'] option").prop('selected', false); //deselecting first list options before sumitting form
            $("select[name~='control_points[]2'] option").prop('selected', true); //selecting all options of second list before sumitting form
            return true;
        });
    });
    $(document).ready(function () {


    });
</script>
<?php $this->load->view('html_end_view'); ?>