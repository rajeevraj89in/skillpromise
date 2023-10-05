<?php
$this->load->view('header_view');
$this->load->view('home_left_view');
//echo "<pre>"; print_r($max);die;
?>

<!--content panel start -->
<section class="col-md-9">
    <h1 class="page-header"><?php
        $name = $this->main_model->get_name_from_id('sheets', 'name', $sheet_id, 'id');
        echo "$name";
        ?></h1>

    <!-- Table content -->
    <div class="row">
        <div class="col-md-12">

            <form id="mainForm" enctype="multipart/form-data" class="form-horizontal" role="form" action="<?php echo base_url() . 'set/action_sheets'; ?>" method="POST">
                <div> <?php echo $data['details']; ?></div>
                <input type="hidden" value="<?php echo $sheet_id; ?>" name="sheet_id">
                <?php
                foreach ($category_name as $category) {
                    echo '<div class="panel panel-success">
                     <div class="panel-heading">

    <h3 class="panel-title" style="text-align:center;">' . $this->main_model->get_name_from_id('actionsheet_category', 'name', $category['category']) . '</h3>
                    </div>
                 <div class="table-responsive">
                <table class="table table-bordered" id="content">
                    <thead>
                        <tr>';
                    //$value = '$' . $category['category'];
                    //echo $value;die;
                    $i = 0;
                    foreach ($data[$category['category']] as $rec) {
                        if (($i % 3) == 0) {

                            echo '<tr>';
                        }
                        $i++;
                        echo '<td><input data-content="' . $rec['description'] . '" type="checkbox" class="check" data-category="' . $category['category'] . '" id="' . $rec['id'] . '">'
                        . '<span class="tool" data-toggle="tooltip" title="Click me to know more" data-content="' . $rec['tool_tip'] . '"> '
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
                    <div class="col-sm-3">
                        <button type="submit" value="1" name="draft" class="btn btn-primary">Save as Draft</button>
                    </div>
                    <div class="col-sm-3">
                        <button type="submit" value="0" name="draft" class="btn btn-primary">Submit</button>
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
//            var content=$(this).data('content');

                var a = parseInt(this.id.substr(0));
                var b = (document.getElementById(a).checked);
                if (b) {

                    displayImport(content, a);
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

    $(document).ready(function () {
        $('.tool').on('click', function () {
            //console.log("ragini");

            var content = $(this).data('content');
            //alert(" hii Ragini ");
            displayTooltip(content);

//}, function(){
//
//  //  $('#importModal').modal('hide');
        });
    });

</script>

<?php $this->load->view('html_end_view'); ?>
