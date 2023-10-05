<?php
$this->load->view('header_view');
if ($_SESSION['role_name'] == "Student") {

    $this->load->view('home_left_view');
} else {
    $this->load->view('manager_left_view');
}
?>

<section class="col-md-9">
    <h1 class="page-header">Error Report</h1>
    <!-- add-program-form content -->
    <div class="row">
        <div class="col-md-12">

            <div class="col-md-12">
                <form role="form" enctype="multipart/form-data" method="post" class="form-horizontal" action="<?php ?>">
                    <div class="row top-space">
                        <div class="row row_style">
                            <div class="col-md-12">
                                <div class="row top-space">
                                    <div class="col-md-3"><label for="numberOfdata">Insert row is</label></div>
                                    <div class="col-md-3"><input type="text" value="<?php echo $success; ?>" readonly=""></div>
                                    <div class="col-md-3"><label for="numberOfdataRejected">Rejected row is</label></div>
                                    <div class="col-md-3"><input type="text" value="<?php echo $failed; ?>" readonly=""></div>
                                </div><hr>
                                <!-- Table content -->
                                <div class="row">
                                    <div class="col-md-12">

                                        <table class="table table-condensed" id="my_table">
                                            <thead>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Email</th>
                                                    <th>Name</th>
                                                    <th>Error</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $tbl_str = "";
                                                $i = 1;

                                                foreach ($failed_data as $rec) {
                                                    $tbl_str.='<tr>';
                                                    $tbl_str.='<td>' . $i++ . '</td>';
                                                    if (isset($rec['email'])) {
                                                        $tbl_str.='<td>' . $rec['email'] . '</td>';
                                                    } else {
                                                        $tbl_str.='<td>No Name Available</td>';
                                                    }
                                                    if (isset($rec['name'])) {
                                                        $tbl_str.='<td>' . $rec['name'] . '</td>';
                                                    } else {
                                                        $tbl_str.='<td>No Name Available</td>';
                                                    }
                                                    if (isset($rec['error'])) {
                                                        $tbl_str.='<td>' . $rec['error'] . '</td>';
                                                    } else {
                                                        $tbl_str.='<td>......</td>';
                                                    }
                                                    $tbl_str.='</tr>';
                                                }
                                                echo $tbl_str;
                                                ?>
                                            </tbody>
                                        </table>
                                        <!--                                        <div class="text-center">
                                                                                    <form role="form" enctype="multipart/form-data" method="post" action="<?php echo base_url() . 'excel_upload/excel_error_download'; ?>">
                                                                                        <input type="hidden" name="error_array" value="<?php echo base64_encode(serialize($failed_data)); ?>">
                                                                                        <button type="submit" class="btn btn-success">Download</button>
                                                                                        <input type="button" value="Print" class=" btn btn-success" id="prnt_btn" onclick="myFun()">
                                                                                    </form>

                                                                                </div>-->
                                    </div>
                                </div><!-- end Table content -->
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
</div><!-- end bigCallout-->

<!-- End Content and Sidebar
===================================================== -->
</div><!-- end main -->
<?php $this->load->view('footer_view'); ?>
<script>
    function myFun() {
        var divToPrint = document.getElementById("my_table");
        newWin = window.open("");
        newWin.document.write(divToPrint.outerHTML);
        newWin.print();
        newWin.close();
    }
</script>
<?php $this->load->view('html_end_view'); ?>
