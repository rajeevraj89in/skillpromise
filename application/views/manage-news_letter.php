<?php
$this->load->view('header_view');
$this->load->view('manager_left_view');
//var_dump($expression);
?>
<!--content panel start -->
<section class="col-md-9">
    <h3 class="page-header">Manage News Letter Subscription and Unsubscription</h3>
<!--    <div class="row text-center">
        <div class="col-md-12">
            <a class="btn btn-primary" href="<?php //echo base_url() . 'add/'; ?>">Add news letter</a>
        </div>
    </div>-->
<a href="<?= base_url()?>exportsubscribe"><button class="btn btn-primary">Export Subscribe</button></a><a href="<?= base_url()?>exportunsubscribe" style="float:right;"><button class="btn btn-primary">Export Unsubscribe</button></a>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered" id="content">
                    <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Reason</th>
                            <th class="text-center" colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $tbl_str = "";
                        foreach ($data as $key => $rec) {
                            $tbl_str.= '<tr class="post">'
                                    . "<td>" . $rec['first_name'] . "</td>"
                                    . "<td>" . $rec['email'] . "</td>"
                                    . "<td>" . $rec['status'] . "</td>"
                                    . "<td>" . $rec['reason'] . "</td>"
                                   // . '<td class="text-center"><a href="' . base_url() . "edit/news_letter/" . $rec['id'] . '" title="Edit a Quiz Story"><span class="glyphicon glyphicon-pencil"></span></a></td>'
                                    . '<td class="text-center"><a href="' . base_url() . "delete/news_letter/" . $rec['id'] . '" title="Delete Quiz Story"><span class="glyphicon glyphicon-trash"></span></a></td>'
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
<?php $this->load->view('footer_view');
?>

<?php $this->load->view('html_end_view'); ?>