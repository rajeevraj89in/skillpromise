<?php

$this->load->view('header_view');
$this->load->view('home_left_view');




//echo '<pre>';
//print_r($quiz_result);die;

?>
<!--content panel start -->
<section class="col-md-9">
    <h1 class="page-header"><?php  ?> Score details of all quizzes</h1>
    <!-- Table content -->
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered table-custom">
                    <thead>
                        <tr>
                            <th>Serial No.</th>
                            <th>Program Name</th>
                            <th>Total Marks</th>
                            <th>Mark Obtain </th>
                                                       
                        </tr>
                    </thead>
                    <tbody>
                     <?php  
                       foreach ($quiz_result as $key =>  $result) {
                           echo "<tr>";
                           echo' <td> '.($key + 1).' </td>';
                           echo' <td>'.$result['quiz_name'].'</td>';
                           echo' <td>'.$result['total_marks'].'</td>';
                           echo' <td>'.$result['marks_obtain'].'</td>';
                           echo '</tr>';
                        
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