<?php
$this->load->view('header_view');
$this->load->view('manager_left_view');
?>
<!--content panel start -->
<section class="col-md-9">
    <h1 class="page-header">Manage Packages</h1>
    <div class="row text-center">
        <div class="col-md-12">
            <a class="btn btn-primary" href="<?php echo base_url() . 'add/packages'; ?>">Add Package</a>
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
                            <th>Sl. No.</th>
                            <th>Package Name</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            <!--<th class="text-center" colspan="2">Action</th>-->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $tbl_str = "";
                        $count = 1;
                        foreach ($data as $rec) {
                            $tbl_str .= '<tr class="post">'
                                    . "<td>" . $count++ . "</td>"
                                    . "<td>" . $rec['name'] . "</td>"
                                    . "<td>" . $rec['description'] . "</td>"
                                    . "<td>" . $rec['status'] . "</td>"
                                    . '<td class="text-center"><a href=' . base_url() . "edit/packages/" . $rec['id'] . '><span class="glyphicon glyphicon-pencil"></span></a></td>'
                                    . '<td class="text-center"><a href="#" class="delete" data-url="' . base_url() . "delete/packages/" . $rec['id'] . '"><span class="glyphicon glyphicon-trash"></span></a></td>'
                                    . "</tr>";
                        }
                        echo $tbl_str;
                        ?>
                    </tbody>
                </table>
            </div>
            <!--<ul id="pagination" class="pagination light-theme simple-pagination"><li class="active"><span class="current prev">Prev</span></li><li class="active"><span class="current">1</span></li><li><a class="page-link" href="#page-2">2</a></li><li><a class="page-link" href="#page-3">3</a></li><li><a class="page-link next" href="#page-2">Next</a></li></ul>-->
        </div>
    </div><!-- end Table content -->
</section><!-- end col-md-9 -->
<!--end content panel start -->

</div><!-- end bigCallout-->

<!-- End Content and Sidebar
===================================================== -->
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
    $(document).ready(function () {
        $("#content").DataTable();
    });
    $(document.body).on("click", ".delete", function () {

        $("#sureDelete").attr("href", $(this).data('url'));
        $('#update_info').modal('show');

    });
</script>
<?php $this->load->view('html_end_view'); ?>