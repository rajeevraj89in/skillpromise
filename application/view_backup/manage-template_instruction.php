<?php
$this->load->view('header_view');
$this->load->view('manager_left_view');
//if (!empty($data)) {
$sheet_id = $sheet_id;
$template_id = $template_id;
//} else {
//    $sheet_id = '';
//    $template_id = '';
//}
?>
<!--content panel start -->
<section class="col-md-9">
    <h1 class="header_text">Manage Template Instruction/Section:<font color="green"><?php
        echo $this->main_model->get_name_from_id('sheets', 'name', $sheet_id);
        ?></font></h1>
    <div class="row text-center">
        <div class="col-md-12">
            <a class="btn btn-primary" href="<?php echo base_url() . 'create/template_instruction/' . $sheet_id . '/' . $template_id; ?>">Add Template Instruction/Section</a>
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
                            <th>Sl.No</th>
                            <th>Sheet Name</th>
                            <th>Section Name</th>
                            <th>Sort Order</th>
                            <th>Instruction</th>
                            <th class="text-center" colspan="4">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $tbl_str = "";
                        $i = 1;
                        foreach ($data as $rec) {
                            $tbl_str.='<tr class="post">'
                                    . "<td>" . $i++ . "</td>"
                                    . '<td>';
                            $tbl_str.= $this->main_model->get_name_from_id('sheets', 'name', $rec['sheet_id']);
                            $tbl_str.= '</td>'
                                    . "<td>" . $rec['section_name'] . "</td>"
                                    . "<td>" . $rec['sort_order'] . "</td>"
                                    . "<td><div  class=wrapcontent>" . $rec['instruction_text'] . "</div></td>"
                                    . '<td class="text-center"><a href="' . base_url() . 'manage_sheet_values/' . $rec['id'] . '/' . $rec['section_type'] . '" title="Add sheet Values section wise"><span class="glyphicon glyphicon-plus"></span></a></td>'
                                    . '<td class="text-center"><a href="' . base_url() . 'manage/tooltip_details/' . $rec['id'] . '" title="Add Tooltip Details"><span class="glyphicon glyphicon-comment"></span></a></td>'
                                    . '<td class="text-center"><a href="' . base_url() . "edit/template_instruction/" . $rec['id'] . '"><span class="glyphicon glyphicon-pencil"></span></a></td>'
                                    . '<td class="text-center"><a href="#" class="delete" data-url="' . base_url() . "delete/template_instruction/" . $rec['id'] . '"><span class="glyphicon glyphicon-trash"></span></a></td>'
                                    . "</tr>";
                        }

                        echo $tbl_str;
                        ?>
                    </tbody>
                </table>
            </div>
            <ul id="pagination" class="pagination light-theme simple-pagination"><li class="active"><span class="current prev">Prev</span></li><li class="active"><span class="current">1</span></li><li><a class="page-link" href="#page-2">2</a></li><li><a class="page-link" href="#page-3">3</a></li><li><a class="page-link next" href="#page-2">Next</a></li></ul>
        </div>
    </div>
</section>
</div><!-- end main -->



<div class="modal fade" id="update_info" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">
                    Alert!
                </h4>
            </div>
            <div class="modal-body">Are you sure, You want to delete?
            </div>
            <div class="modal-footer">
                <a  id="sureDelete"><button type="button" class="btn btn-danger" >Yes</button></a>
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>

            </div>
        </div>
    </div>
</div>
<?php $this->load->view('footer_view'); ?>
<script>
    $(document.body).on("click", ".delete", function () {

        $("#sureDelete").attr("href", $(this).data('url'));
        $('#update_info').modal('show');

    });
</script>
<?php $this->load->view('html_end_view'); ?>