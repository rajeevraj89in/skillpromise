<?php
//echo " <pre>";
//print_r($data);die;
$this->load->view('header_view');
$this->load->view('manager_left_view');
?>
<!--content panel start -->
<section class="col-md-9">
    <h1 class="header_text">Manage Action Sheet Content:<font color="green"><?php 
    echo $this->main_model->get_name_from_id('template_instruction', 'section_name', $template_instruction_id);
    ?></font></h1>
    <div class="row text-center">
        <div class="col-md-12">
            <?php if (!empty($template_instruction_id)) { ?>
                <a class="btn btn-primary" href="<?php echo base_url() . 'create/tickmark_type/' . $template_instruction_id; ?>">Add sheet content</a>
            <?php } else { ?>
                <a class="btn btn-primary" href="<?php echo base_url() . 'create/tickmark_type/'; ?>">Add sheet content</a>
            <?php }
            ?>
        </div>
    </div>
    <hr>
    <!-- Table content -->
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered" id="content">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th class="text-center" colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $tbl_str = "";
                        foreach ($data as $rec) {
                            $tbl_str.='<tr class="post">'
                                    . '<td id="name'.$rec ['id'].'" val="'.$rec ['name'].'">' . $rec['name'] . '</td>'
                                    . '<td class="text-center"><a class="edit" href="#" data-id="'.$rec ['id'].'"><span class="glyphicon glyphicon-pencil"></span></a></td>'
                                    . '<td class="text-center"><a href="' . base_url() . "delete/sheet_values/" . $rec ['id'] . '"><span class="glyphicon glyphicon-trash"></span></a></td>'
                                    . "</tr>";
                        }

                        echo $tbl_str;
                        ?>
                    </tbody>
                </table>
            </div>
            <ul id="pagination" class="pagination light-theme simple-pagination"><li class="active"><span class="current prev">Prev</span></li><li class="active"><span class="current">1</span></li><li><a class="page-link" href="#page-2">2</a></li><li><a class="page-link" href="#page-3">3</a></li><li><a class="page-link next" href="#page-2">Next</a></li></ul>
        </div>
    </div><!-- end Table content -->
</section><!-- end col-md-9 -->
<!--end content panel start -->

</div><!-- end bigCallout-->

<!-- End Content and Sidebar
===================================================== -->
</div><!-- end main -->



<div class="modal fade" id="update_info" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">
                    Update
                </h4>
            </div>
            <div class="modal-body">
                <input type="text" name="" id="edited_name" value="" class="form-control" />
            </div>
            <div class="modal-footer">
                <a  id="sureDelete"><button type="button" class="btn btn-primary" >Save</button></a>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('footer_view'); ?>
<script>
$(document.body).on("click", ".edit", function () {
        
        var id=$(this).attr("data-id");
        var name=$("#name"+id).attr("val");
        $("#edited_name").val(name);
       // $("#sureDelete").attr("href", $(this).data('url'));
        $('#update_info').modal('show');

    });
</script>
<?php $this->load->view('html_end_view'); ?>
