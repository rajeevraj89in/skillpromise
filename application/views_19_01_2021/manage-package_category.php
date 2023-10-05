<?php
$this->load->view('header_view');
$this->load->view('manager_left_view');
//echo"<pre>";
//var_dump($data);die;
//var_dump($expression);
?>
<!--content panel start -->
<section class="col-md-9">
    <h1 class="page-header">Manage Package Category</h1>
    <div class="row text-center">
        <div class="col-md-12">
            <a class="btn btn-primary" href="<?php echo base_url() . 'add/package_category'; ?>">Add Package Category</a>
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
                            <th>#</th>
                            <th>Name</th>
                            <th>Parent</th>
                            <th>Status</th>
                            <th class="text-center" colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $tbl_str = "";
                        foreach ($data as $key => $rec) {
                            $tbl_str .= '<tr class="post">'
                                    . "<td>" . $rec['id'] . "</td>"
                                    . "<td>" . $rec['name'] . "</td>"
                                    . "<td>" . (($rec['parent_id'] == 0) ? "Root Category" : $this->main_model->get_name_from_id('package_category', 'name', $rec['parent_id'])) . "</td>"
                                    . "<td>" . $rec['status'] . "</td>"
                                    . '<td class="text-center"><a href="' . base_url() . 'edit/package_category/' . $rec['id'] . '" title="Edit a Package Category"><span class="glyphicon glyphicon-pencil"></span></a></td>'
                                    . '<td class="text-center"><a  title="Delete Package Category."><span class="glyphicon glyphicon-trash delete" data-id=' . $rec['id'] . '></span></a></td>'
                                    . "</tr>";
                        }

                        echo $tbl_str;
                        ?>
                    </tbody>
                </table>
            </div>
            <ul id="pagination" class="pagination light-theme simple-pagination"><li class="active"><span class="current prev">Prev</span></li><li class="active"><span class="current">1</span></li><li><a class="page-link" href="#page-2">2</a></li><li><a class="page-link" href="#page-3">3</a></li><li><a class="page-link next" href="#page-2">Next</a></li></ul>
        </div>
    </div><!--end Table content -->
</section><!--end col-md-9 -->
<!--end content panel start -->

</div><!--end bigCallout-->

<!--End Content and Sidebar
===================================================== -->
</div><!--end main -->

<div class="modal fade" id="update_info" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">
                    Alert!
                </h4>
            </div>
            <div class="modal-body">Do You want to delete?
            </div>
            <div class="modal-footer">
                <a  id="sureDelete"><button type="button" class="btn btn-danger" >Yes</button></a>
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>

            </div>
        </div>
    </div>
</div>


<?php $this->load->view('footer_view');
?>
<script>
    $(document.body).on("click", ".delete", function () {
        var url = "<?php echo base_url() . 'delete/package_category/' ?>";
        var Id = $(this).attr('data-id');
        var href = url + Id;
        $("#sureDelete").attr("href", href);
        $('#update_info').modal('show');

    });
</script>
<?php $this->load->view('html_end_view'); ?>