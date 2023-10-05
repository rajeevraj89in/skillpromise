<?php 
$this->load->view('header_view');
$this->load->view('manager_left_view');
?>
<!--content panel start -->
<section class="col-md-9">
    <h1 class="page-header">Manage Testimonial Category</h1>
    <div class="row text-center">
  
        
        
        <div class="col-md-12">
            <a class="btn btn-primary" href="<?php echo base_url() . 'add/testimonial_category'; ?>">Add Testimonial Category</a>
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
                            <th>Id</th>
                            <th>Category Name</th>
                           
                            <th class="text-center" colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $tbl_str = "";
                        $count = 1;
                        foreach ($data as $rec) {
                            $tbl_str.='<tr class="post">'
                                    . "<td>" . $count++ . "</td>"
                                    . "<td>" . $rec['category'] . "</td>"
                                    
                                    . '<td class="text-center"><a href=' . base_url() . "edit/testimonial_category/" . $rec['id'] . '><span class="glyphicon glyphicon-pencil"></span></a></td>'
                                    . '<td class="text-center"><a href=' . base_url() . "delete/testimonial_category/" . $rec['id'] . '><span class="glyphicon glyphicon-trash"></span></a></td>'
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
<?php  $this->load->view('footer_view'); ?>