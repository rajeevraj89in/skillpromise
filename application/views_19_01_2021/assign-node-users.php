<?php
$this->load->view('header_view');
$this->load->view('manager_left_view');
$user_name = $this->main_model->get_name_from_id('users', 'name', end($this->uri->segment_array()));
//echo '["' . implode('", "', $cp) . '"]';
//if (empty($source_data)) {
//    echo "empty";
//}
//print_r($source_data);
//die;
?>
<!--content panel start -->
<section class="col-md-9">
    <h1 class="page-header">Select Users to give permissions for programs</h1>
    <div class="row text-center">
    <div class="col-md-12">
           <div class="form-group">
                <label for="users" class="col-sm-3 control-label">Select Users</label>
                <div class="col-sm-6">
                    <select class="form-control" id="user_list" name="users" required="true">
                        <?php echo $this->main_model->fill_select('users', 'name',$users,'role',6); ?>
                    </select>
                </div>
                <div class="col-sm-3">
                    <a type="save" id="select_user" href="<?php echo base_url() . 'assign/node-users/'. end($this->uri->segments) ?>" class="btn btn-primary"> OK </a>
                </div>
            </div>
    </div>
    </div>
    <hr />
    <!-- add-program-form content -->
    <div class="row">
        <div class="col-md-12">
            <form id="mainForm" enctype="multipart/form-data" class="form-horizontal" role="form" action=" <?php echo base_url() . 'set_many/node-users/' . end($this->uri->segments); ?>" method="POST">
                <input type="hidden" name="users" value="<?php echo end($this->uri->segments); ?>">
                <!--permission_groups-->
                <div class="form-group">
                    <select  class ="users-node" multiple="multiple" id='permission_groups' autofocus>
                        <?php echo $this->main_model->fill_select('node', 'name','','parent_id',0); ?>
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
        $('#permission_groups option:eq(0)').remove(); //deleting first option ' -- select an option -- '

        var dualListbox = $('.users-node').bootstrapDualListbox({
            nonSelectedListLabel: 'Nodes',
            selectedListLabel: '<?php echo 'Programe List'; ?>',
            helperSelectNamePostfix: 'node[]',
            preserveSelectionOnMove: 'moved',
            moveOnSelect: false,
        });
        var selectedOptions = [];
        selectedOptions = <?php
if (!empty($source_data)) {
    echo '["' . implode('", "', $source_data) . '"]';
} else {
    echo 0;
}
?>;
//         var numericalArrayValue = selectedOptions.split(',').map(Number);
        if (selectedOptions) {
            var arrayLength = selectedOptions.length;
            for (var i = 0; i < arrayLength; i++) {
                var arrayValue = parseInt(selectedOptions[i]);



                $("select[name~='node[]1'] option[value='" + arrayValue + "']").prop('selected', true);
            }
            $(".box1").find(".move").trigger("click");
            $("select[name~='node[]1'] option").prop('selected', false); //deselecting first list all options on load
            $("select[name~='node[]2'] option").prop('selected', false); //deselecting all second list options on load
        }

        $("#mainForm").submit(function () {//form validation
            dualListbox.trigger('bootstrapDualListbox.refresh');
            $("select[name~='node[]1'] option").prop('selected', false); //deselecting first list all options before sumitting form
            $("select[name~='node[]2'] option").prop('selected', true); //selecting all options of second list before sumitting form
            return true;
        });
    });
    $(document).ready(function () {
    $('#user_list').on('change',function(){
     // alert("I m working ");  
       var user_id = $(this).val();
       var href_val = base_url + 'assign/node-users/' + user_id ;
     //  alert(href_val);
       $('#select_user').attr("href", href_val); 
    })

    });
</script>
<?php $this->load->view('html_end_view'); ?>