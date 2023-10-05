<?php
$this->load->view('header_view');
$this->load->view('manager_left_view');
//echo '<pre>';
//print_r($id);die;
?>
<!--content panel start -->
<section class="col-md-9">
    <h1 class="header_text">Edit Sheet Content:<font color="green"><?php
        echo $this->main_model->get_name_from_id('template_instruction', 'section_name', $template_instruction_id);
        ?></font></h1>
    <!-- add-program-form content -->
    <div class="row">
        <div class="col-md-12">
            <form id="mainForm" enctype="multipart/form-data" class="form-horizontal" role="form" action=" <?php echo base_url() . 'set/paragraph_type'; ?>" method="POST">
                <input type="hidden" name="template_instruction_id" value = "<?php echo $template_instruction_id; ?>" />
				<input type="hidden" class="form-control" name="id" value = "<?php echo $id; ?>" />
               
                <div class="form-group">
                    <label for="header_name" class="col-sm-3 control-label">Header Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="header_name" required="" value="<?php echo $header_name; ?>">
                    </div>
                </div>
                  
				<div class="form-group">
                    <label for="content" class="col-sm-3 control-label">Content</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="content" required="" ><?php echo $content; ?></textarea>
                    </div>
                </div>  
				  
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-10">
                        <button type="submit" value="Submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

</div><!-- end main -->
<?php $this->load->view('footer_view'); ?>

<?php $this->load->view('html_end_view'); ?>
