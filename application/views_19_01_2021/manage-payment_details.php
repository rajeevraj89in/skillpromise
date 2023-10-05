<?php
$this->load->view('header_view');
$this->load->view('manager_left_view');
?>



</style>
</style>
<!--content panel start -->
<section class="col-md-9">
    <h1 class="page-header">Payment Details</h1>
    <!--    <div class="row text-center">
            <div class="col-md-12">
            </div>
        </div>-->
    <!--    <hr>-->
    <!-- Table content -->
    <form enctype="multipart/form-data" class="form-horizontal" role="form">
        <div class="row">
            <div class="col-md-12 form-group">
                <div class="col-md-4">
                    <input type="date" class="form-control" placeholder="From Date" id="from_date" ui-date-format="dd/mm/yy" ui-date="dateOptions">
                </div>
                <div class="col-md-4">
                    <input type="date" class="form-control" placeholder="To Date" id="to_date">
                </div>

                <div class="col-md-4">
                    <button type="button" id="submit" class="btn btn-primary">Get</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered" id="content">
                        <thead>
                            <tr>
                                <th>Sl. No.</th>
                                <th>Name</th>
                                <th>Transcation Id</th>
                                <th>Coupon Id</th>
                                <th>Online Payment Amount</th>
                                <th>Coupon Payment Amount</th>
                                <th>Status</th>
                                <th>Payment_date</th>
                            </tr>
                        </thead>
                        <tbody id = "body">
                            <?php
//                            $tbl_str = "";
//                            $count = 1;
//                            foreach ($data as $rec) {
//                                $name = $this->main_model->get_name_from_id("registration", "fname", $rec["participant_id"], "id");
//                                $tbl_str .= '<tr class="post">'
//                                        . "<td>" . $count++ . "</td>"
//                                        . "<td>" . $name . "</td>"
//                                        . "<td>" . $rec['atom_txn_id'] . "</td>"
//                                        . "<td>" . $rec['coupon_id'] . "</td>"
//                                        . "<td>" . $rec['amt'] . "</td>"
//                                        . "<td>" . $rec['coupon_amt'] . "</td>"
//                                        . "<td>" . $rec['description'] . "</td>"
//                                        . "<td>" . $rec['date'] . "</td>"
//                                        . "</tr>";
//                            }
//                            echo $tbl_str;
                            ?>
                        </tbody>
                    </table>
                </div>
                <!--<ul id="pagination" class="pagination light-theme simple-pagination"><li class="active"><span class="current prev">Prev</span></li><li class="active"><span class="current">1</span></li><li><a class="page-link" href="#page-2">2</a></li><li><a class="page-link" href="#page-3">3</a></li><li><a class="page-link next" href="#page-2">Next</a></li></ul>-->
            </div>
        </div>
    </form>
    <!-- end Table content -->
</section><!-- end col-md-9 -->
<!--end content panel start -->

</div><!-- end bigCallout-->

<!-- End Content and Sidebar
===================================================== -->
</div><!-- end main -->
<!--<div class="modal fade" id="update_info" role="dialog">
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
</div>-->
<?php $this->load->view('footer_view'); ?>
<script>
//    $(document).ready(function () {
//        $("#content").DataTable();
//    });
//    $(document.body).on("click", ".delete", function () {
//
//        $("#sureDelete").attr("href", $(this).data('url'));
//        $('#update_info').modal('show');
//
//    });


//    $("#from_date").datepicker({
//        dateFormat: "dd-mm-yy",
////        altField: "#entry_date",
//        altFormat: "yy-mm-dd"
//    });
//    $("#to_date").datepicker({
//        dateFormat: "dd-mm-yy",
////        altField: "#invoice_date",
//        altFormat: "yy-mm-dd"
//    });

    $("#submit").click(function () {
        var from_date = $("#from_date").val();
        var to_date = $("#to_date").val();
        $.ajax
                ({
                    type: "POST",
                    url: "<?php echo base_url() . "report_date_range"; ?>",
                    data: {
                        from_date: from_date,
                        to_date: to_date
                    },

                    beforeSend: function () {

//                        $.blockUI({message: '<span class="waiting"><img src="../assets/images/loading.gif" width="32" height="32" /> <br /> Please wait...</span>', css: {width: '18%', left: '40%'}});
                    },
                    success: function (data)
                    {
//                        alert(data);
                        $("#content").DataTable().destroy();
                        $('#body').html(data);
                        $("#content").DataTable();
                    },
                    error: function () {
                        //$.unblockUI();
                        alert("ajax error");
                    }
                });

    });
</script>
<?php $this->load->view('html_end_view'); ?>