<?php
$this->load->view('header_view');
$this->load->view('manager_left_view');
?>
<!--content panel start -->
<section class="col-md-9">
    <h1 class="page-header">Manage Control Points</h1>
    <div class="row text-center">
        <div class="col-md-12">
            <a class="btn btn-primary" href="<?php echo base_url() . 'add/control_points'; ?>">Add Control Point</a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <input type="text" placeholder="Control Point" id="search1">
        </div>
    </div>
    <div class="clearfix"></br></div>
    <!-- Table content -->
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered" id="content">
                    <thead>
                        <tr>
                            <th>Control Points Name</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th class="text-center" colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $tbl_str = "";
                        foreach ($data as $rec) {
                            $tbl_str.='<tr class="post">'
                                    . '<td class="col1">' . $rec['name'] . "</td>"
                                    . "<td>" . $rec['description'] . "</td>"
                                    . "<td>" . $rec['status'] . "</td>"
                                    . '<td class="text-center"><a href=' . base_url() . "edit/control_points/" . $rec['id'] . '"><span class="glyphicon glyphicon-pencil"></span></a></td>'
                                    . '<td class="text-center"><a href=' . base_url() . "delete/control_points/" . $rec['id'] . '"><span class="glyphicon glyphicon-trash"></span></a></td>'
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
<?php $this->load->view('footer_view'); ?>
<script>
    $(document).ready(function () {
        $.expr[":"].contains = $.expr.createPseudo(function (arg) {
            return function (elem) {
                return $(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
            };
        });
    });

    $(document.body).on('keyup', '#search1', function () {
        $("#content td.col1:contains('" + $(this).val() + "')").parent().show();
        $("#content td.col1:not(:contains('" + $(this).val() + "'))").parent().hide();
    });
</script>
<?php $this->load->view('html_end_view'); ?>