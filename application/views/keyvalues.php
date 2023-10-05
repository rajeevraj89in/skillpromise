<?php
//echo "<pre>";
//print_r($data);die;

$this->load->view('header_view');
    if ($_SESSION['role_name'] == "Student") {

        $this->load->view('home_left_view');
    }
    else{
        $this->load->view('manager_left_view');    
    }

?>
<!--content panel start -->
<section class="col-md-9">
    <h1 class="page-header"> My Key Values</h1>
    <!-- Table content -->
    
    <?php    foreach ($data as $key => $rec){
    
            echo '<div class="row">';
            echo '<div class="col-md-12">';
            
            $title = $this->main_model->get_name_from_id("sheet_values", "name", $rec['sheetvalue_id']);
            
            echo '<h4>'.($key + 1).'.'.$title.'</h4>';  
            echo '</div>';
            echo  '<div class="col-md-12">';
            echo  '<p>'.$rec['reason'].'</p>'; 
            echo '</div>';       
            echo '</div>';
            echo '<hr>';
    
     }?>
    
</section>  
</div><!-- end bigCallout-->

<!-- End Content and Sidebar
===================================================== -->
</div><!-- end main -->
<?php $this->load->view('footer_view'); ?>
<?php $this->load->view('html_end_view'); ?>

