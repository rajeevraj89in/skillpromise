<?php
$this->load->view('header_view');
$this->load->view('manager_left_view');
//echo '<pre>';
//print_r($result);die;


?>
<!--content panel start -->
<section class="col-md-9">
    <h1 class="page-header">Test Report</h1>
    <!-- Table content -->
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered table-custom">
                    <thead>
                        <tr>
                            <th>&nbsp;</th>
                            <th>Test Universe</th>
                            <th>Test In Progress</th>
                            <th>Test Completed</th>
                            <th>Test Pending</th>
                            <th>Test Score card Download</th>
                            <th>Test Score card Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                <?php  
                
                
                foreach ($result as $key => $row) {
                    
                
                    echo  '<tr>'
                           . '<td>'.$row['name'].'</td>'
                           . '<td>'.$row['total'].'</td>'
                            . '<td>'.$row['in_progress'].'</td>'
                            . '<td>'.$row['completed'].'</td>'
                            . '<td>'.$row['pending'].'</td>'
                            . '<td>0</td>'
                            . '<td>0</td>'
                            .  '</tr>';
                            
                  
                    
                    }
                    ?>     
                        
                        
                    </tbody>
                </table>
            </div>
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

</script>
<?php $this->load->view('html_end_view'); ?>