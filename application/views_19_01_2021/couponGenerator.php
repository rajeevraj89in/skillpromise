<?php
$this->load->view('header_view');
$this->load->view('manager_left_view');
//echo"<pre>";
//var_dump($data);die;
//var_dump($expression);
?>
<!--content panel start -->
<section class="col-md-9">
    <h1 class="page-header">Coupon Code</h1>
    <div class="row text-center">
        <div class="col-md-12">
            <form enctype="multipart/form-data"  class="form-horizontal" autocomplete="off" role="form"  action="<?php echo base_url(); ?>couponGenerator/set" method="POST" onsubmit="return check()">


                <div class="form-group">
                    <label for="no_of_code" class="col-sm-2 control-label">No.Of Coupons</label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control" id="packages" name="no_of_code" placeholder="No of Coupons" required>
                    </div>
                    <label for="type" class="col-sm-2 control-label">type</label>
                    <div class="col-sm-4">
                        <label class="radio-inline">
                            <input type="radio" name="type" id="Percentage" value="Percentage" checked> Percentage
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="type" id="Fixed" value="Fixed"> Fixed
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="amount" class="col-sm-2 control-label">amount</label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control" id="amount" name="amount" placeholder="amount" required>
                    </div>
                    <label for="validity" class="col-sm-2 control-label">Valid Up To</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control" id="validity" name="validity" placeholder="validity" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit"  class="btn btn-primary">Save</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
    <hr>
    <!-- Table content -->
    <div class="row">


        <hr>
        <div class="col-md-12">

            <div class="table-responsive">
                <table class="table table-bordered" id="content">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Code</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Amount</th>
                            <th>Validity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $tbl_str = "";
                        foreach ($data as $key => $rec) {
                            $tbl_str .= '<tr class="post">'
                                    . "<td>" . $rec['id'] . "</td>"
                                    . "<td>" . $rec['code'] . "</td>"
                                    . "<td>" . $rec['type'] . "</td>"
                                    . "<td>" . $rec['status'] . "</td>"
                                    . "<td>" . $rec['amount'] . "</td>"
                                    . "<td>" . $rec['validity'] . "</td>" . "</tr>";
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

        $("#sureDelete").attr("href", $(this).data('url'));
        $('#update_info').modal('show');

    });
</script>
<?php $this->load->view('html_end_view'); ?>
