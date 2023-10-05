<?php

$this->load->view('header_view');
$this->load->view('manager_left_view');


if(!$id){  
    $quiz_name = 'Please add any quiz with this node';   
}
else{
  $quiz_name = 'Score Card For '.$name ;
}



?>
<!--content panel start -->
<section class="col-md-9">
    <h1 class="page-header"><?php echo $quiz_name ?></h1>
    <!-- Table content -->
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered table-custom">
                    <thead>
                        <tr>
                            <th>Rank</th>
                            <th>Student Name</th>
                            <th>Total Marks</th>
                            <th>Mark Obtain </th>
                            
                           
                        </tr>
                    </thead>
                    <tbody>
                     <?php  
                        foreach ($student as $key =>  $user) {
                           echo "<tr>";
                           echo' <td>'.($key+1).'</td>';
                           echo' <td>'.$user["name"].'</td>';
                           echo' <td>'.$total_marks.'</td>';
                           echo' <td>'.$user["mark_obtain"].'</td>';
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