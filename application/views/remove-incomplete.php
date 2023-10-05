
<?php
$this->load->view('header_view');
$this->load->view('manager_left_view');
?>
<!--content panel start -->
<section class="col-md-9">
    <h1 class="page-header">All Incomplete quiz</h1>
    <div class="row">
        <div class="form-group">
            <div class="col-md-5">
                <input type="text"id="searchUser" class="form-control top-space" placeholder="Search User Name">
            </div>

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
                            <th class="text-center">Id</th>
                            <th>Quiz Name</th>
                            <th>Student Name</th>
                            <th>Start Time</th>
                            <th>Submit Time</th>
                            <th class="text-center" colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $tbl_str = "";
                        foreach ($quiz_result as $rec) {
                            $tbl_str .= '<tr class="post">'
                                    . "<td class='text-center'>" . $rec['id'] . "</td>"
                                    . "<td>" . $rec['quiz_name'] . "</td>"
                                    . "<td>" . $rec['student_name'] . "</td>"
                                    . "<td>" . $rec['start_time'] . "</td>"
                                    . "<td>" . $rec['submit_time'] . "</td>"
                                    . '<td class="text-center"><a href=' . base_url() . "delete_result/incomplete/" . $rec['id'] . '"><span class="glyphicon glyphicon-trash"></span></a></td>'
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
<?php $this->load->view('html_end_view'); ?>
<script>
    $(document).ready(function () {
        $.expr[":"].contains = $.expr.createPseudo(function (arg) {
            return function (elem) {
                return $(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
            };
        });
    });
    $(document.body).on('keyup', '#searchUser', function () {
        $("#content tbody tr td:nth-child(3):contains('" + $(this).val() + "')").parent().show();
        $("#content tbody tr td:nth-child(3):not(:contains('" + $(this).val() + "'))").parent().hide();
    });
</script>