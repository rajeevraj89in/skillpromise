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
    <h1 class="header_text">My Key Values:<font color="green"><?php 
    echo $sheet_name;
    ?></font></h1>
    <!-- Table content -->
    
    <?php    foreach ($list as $key=>$data){
    
            echo '<div class="row">';
            echo '<div class="col-md-12">';
            
            $title = $this->main_model->get_name_from_id("value_for_add_more_type", "name", $key);
            
            echo '<h4>'.$title.'</h4>';  
            echo '</div>';
            echo  '<div class="col-md-12">';
            foreach ($data as $k=>$val) {
                echo  '<p>'.($k+1).'.'.$val['key_values'].'</p>'; 
            }
            
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

