<?php //
//echo"<pre>";
//print_r($data);
//die;

$this->load->view('header_view');
$this->load->view('manager_left_view');
?>
<!--content panel start -->


<section class="col-md-9">
    <h1 class="page-header">Add Blog Category</h1>
    <!--div class="row text-center">
    <div class="col-md-12">
            <a href="" class="btn btn-primary">Add Program</a>
    </div>
    </div>
    <hr /-->
    <!-- add-program-form content -->
    <div class="row">
        <div class="col-md-12">
            <form enctype="multipart/form-data" class="form-horizontal" role="form" action=" <?php echo base_url() . 'set/blog_category'; ?>" method="POST">

                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Category Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Category Name" required>
                    </div>
                </div><br>
                <div class="form-group">
                    <label for="description" class="col-sm-3 control-label"> Category Description</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="description" name="description" placeholder="Category Description"></textarea>
                    </div>
                </div><br>


                <div class="form-group">
                    <label class="col-sm-3 control-label">Status</label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" name="status" id="Active" value="Active" checked> Active
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="status" id="Inactive" value="Inactive"> Inactive
                        </label>
                    </div>
                </div><br>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <button type="submit" value="Submit" class="btn btn-primary">Add</button>
                    </div>
                
                </div>
            
        
       

            </form>
        </div>
     
    </div><!-- end add-program-form content -->
</section><!-- end col-md-9 -->
<!--end content panel start -->

</div><!-- end bigCallout-->

<!-- End Content and Sidebar
===================================================== -->
</div><!-- end main -->
 
<?php
        $this->load->view('home_footer');
        ?>
