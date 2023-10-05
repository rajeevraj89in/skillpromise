<?php
$this->load->view('header_view');
$this->load->view('manager_left_view');
?>
<!--content panel start -->
<section class="col-md-9">
    <h1 class="page-header">Add Quiz</h1>

    <!-- add-program-form content -->
    <div class="row">
        <div class="col-md-12">

            <form enctype="multipart/form-data" class="form-horizontal" role="form" action=" <?php echo base_url() . 'set/quiz'; ?>" method="POST">
                <div class="form-group">
                    <label for="programs" class="col-sm-3 control-label">Select Program</label>
                    <div class="col-sm-9">
                        <select class="form-control" id="programs" >
                            <?php echo $this->main_model->fill_select('programs', 'name'); ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="subprograms" class="col-sm-3 control-label">Select Subprogram</label>
                    <div class="col-sm-9">
                        <select class="form-control" id="subprograms" name="subprogram_id" required>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Quiz Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Quiz Name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-3 control-label">Quiz Description</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="description" name="description" placeholder="Quiz Description"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="page_content" class="col-sm-3 control-label">Page Content</label>
                    <div class="col-sm-9">
                        <textarea class="skill_editor" name="page_content" id="page_content"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="time_limit" class="col-sm-3 control-label">Select Time Limit</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="time_limit" name="time_limit" placeholder="Time Limit">
                    </div>
                </div>

                <div class="form-group">
                    <label for="quiz_type" class="col-sm-3 control-label">Select Quiz Type</label>
                    <div class="col-sm-9">
                        <select class="form-control" id="quiz_type" name="quiz_type" required>
                            <option value="Practice">Practice Quiz</option>
                            <option value="Dashboard" selected>Dashboard Quiz</option>
                            <option value="Flex">Flexi Dashboard Quiz</option>
                            <option value="Scoring">Normal Scoring Quiz</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="image_file" class="col-sm-3 control-label">Select Image</label>
                    <div class="col-sm-9">
                        <input type="file" id="image_file" name="image_file">
                        <p class="help-block">File size would be between 1KB to 14MB</p>
                    </div>
                </div>

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
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-10">
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
<?php $this->load->view('footer_view'); ?>
<script>
    $(document).ready(function () {
        $('#time_limit').timepicker({'step': '05', 'timeFormat': 'H:i:s', 'scrollDefault': '00:00:00'});
        $("#programs").change(function () {
            var getValue = $(this).val();
            initiateAjax('subprograms', 'program_id', getValue, ['id', 'name'], fillSelect, 'subprograms');
        });
    });
</script>
<?php $this->load->view('html_end_view'); ?>