<?php
$this->load->view('header_view');
if ($_SESSION['role_name'] == "Student") {
    
    $this->load->view('home_left_view');
}
else{
    $this->load->view('manager_left_view');    
}
?>

<section class="col-md-9">
    <h1 class="page-header">Sheets</h1>
    <!-- add-program-form content -->
    <div class="row">
        <div class="col-md-12">

            <form id="mainForm" enctype="multipart/form-data" class="form-horizontal" role="form" action=" <?php echo base_url().'analytics/key_values'  ?>" method="POST">
                <div id ="select_level_outer">
                    <div class="form-group level-div" id="leveldiv1">
                        <label for="level1" class="col-sm-3 control-label">Select Sheet</label>
                        <div class="col-sm-9">
                            <select class="form-control node-select" id="sheet_id" name="sheet_id" required>
                                <?php echo $this->main_model->fill_select("sheets","name"); ?>
                            </select>
                        </div>
                    </div>
                </div>
                
                
<!--  FOR ON CHANGING SHEET DISPLAY THEIR SECTIONS-->
<div class="row-fluid" id="dew" style="display: none;">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Select a Section:</label>
                    <div id="all_section" class="col-sm-9">
                        
                    </div>
                    </div>
                </div>
                
<!--      END  FOR ON CHANGING SHEET DISPLAY THEIR SECTIONS-->
                
                <div class = "row-fluid space-bootom ">
                    <div class = "span4 offset4 text-center">
                        <button type = "submit" id = "show" class = "btn btn-success">Show</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </section>  
</div><!-- end bigCallout-->

<!-- End Content and Sidebar
===================================================== -->
</div><!-- end main -->
<?php $this->load->view('footer_view'); ?>
<script>
     $(document).ready(function () {
        $('#sheet_id').change(function () {
            var sheet_id = $(this).val();
            //alert(sheet_id);
            if(sheet_id){
                $("#dew").css("display","block");
            }else{
                $("#dew").css("display","none");
            }
            $.ajax({
                type: "POST",
                 url: "<?php echo base_url() . 'show_sections/'; ?>",
                data: {
                    sheet_id: sheet_id

                },
                success: function (data)
                {
                    //alert(data);
                    var $subType = $('#all_section');
                    var JSONobject = eval("(" + data + ")");
//                    alert(JSONobject);
                    $subType.empty();
                    $.each(JSONobject, function () {
                        $subType.append(" ");
                        $subType.append($('<input type="radio" name="section_id" checked>').attr("value", this.id).text(this.section_name));
                        $subType.append(" ");
                        $subType.append(this.section_name);
                    });
                },
                error: function () {

                    // alert("ajax error");
                }
            });
        });
    });

</script>
<?php $this->load->view('html_end_view'); ?>
