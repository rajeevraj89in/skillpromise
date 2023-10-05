<?php
$this->load->view('header_view');
$this->load->view('user_left_view');

?>
<section class="col-md-9">
<h1 class="header_text"><?php
$name = $this->main_model->get_name_from_id('sheets', 'name', $sheet_id, 'id');
echo "$name";
?>
</h1>
<div class="row">
<div class="col-md-12">
<div class="row row_style">
<div class="col-md-12">
<form id="mainForm" enctype="multipart/form-data" class="form-horizontal" role="form" action="<?php echo base_url() . 'set_data/paragraph_type'; ?>" method="POST">
<input type="hidden" value="<?php echo $sheet_id; ?>" id="sheet_section_id" name="sheet_id">
<div class="row">
    <div class="col-md-12">
        <div> <?php echo $instruction; ?></div>
        <input type="hidden" value="<?php echo $sheet_section_id; ?>" id="sheet_section_id" name="sheet_section_id">
        <?php
		$item = 0;
        foreach ($listing_type_data as $value) {
            ?>
            <div class="form-group">
				<label for="item_<?php echo $item; ?>" style="font-size: 14px;"><?php echo $value['header_name']; ?></label>
				<textarea class="form-control" placeholder="<?php echo $value['content']; ?>" rows="5" id="item_<?php echo $item; ?>" name="item[<?php echo $value['id']; ?>][content]" ><?php echo $content = isset($paragraph_values[$value['id']])?$paragraph_values[$value['id']]:""; ?></textarea>
			</div><br/>
			
            
            <?php  $item++; }  ?>
    </div>
</div>
<hr/>
<div class="form-group">
    <div class="col-sm-12">
        <center>
		        <?php if($submission_flag){ 	?>
					<?php if($final_submission == '0'){ 	?>
					   <?php if($sheet_action_type == 'edit'){ 	?>
							<input type="hidden" name="final_submission" value="1" />
							<button type="submit" value="1" name="draft" class="btn btn-success">Submit</button>
					   <?php } else{ ?>
							<a class="btn btn-success" href="<?php echo base_url('sheets/sheets/'.$sheet_id.'?action_type=edit'); ?>">Edit</a>
						<?php }  ?>
					<?php } else{ ?>
						<a class="btn btn-success" href="<?php echo base_url('sheets_pdf/sheets/'.$sheet_id); ?>">Download as PDF</a>
					<?php }  ?>
				<?php } else{  ?>
					 <button type="submit" value="0" name="draft" class="btn btn-success">Save as Draft</button>
					 <button type="submit" value="1" name="draft" class="btn btn-success">Submit</button>
				<?php }  ?>
        </center>
        
    </div>
    <!--<div class="col-sm-3">-->
    <!--    <button type="submit" value="0" name="draft" class="btn btn-success">Submit</button>-->
    <!--</div>-->
</div>
</form>
</div>
</div>
</div>
</div>
<hr/>
<div class="modal fade" id="sucess_message" role="dialog">
<div class="modal-dialog modal-sm">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">
Information
</h4>
</div>
<div class="modal-body"> Data has been saved
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
</section><!-- end col-md-9 -->
<!--end content panel start -->
</div><!-- end bigCallout-->
<!-- End Content and Sidebar
===================================================== -->
</div><!-- end main -->
<?php $this->load->view('footer_view'); ?>
<script>

$(document).ready(function () {
$('.skill_editor_2').summernote();
});

</script>
<?php $this->load->view('html_end_view'); ?>