<?php
$this->load->view('header_view');
$this->load->view('manager_left_view');
?>
<!--content panel start -->
<section class="col-md-9">
    <h1 class="page-header">Add Question</h1>
    
    <!-- add-program-form content -->
    <div class="row">
        <div class="col-md-12">
            <form method="post" class="form-horizontal" role="form" autocomplete="off" id="mainForm" action="<?php echo base_url(); ?>set/subjectivequestions">
                <input type="hidden" name="quiz_id" value = "<?php echo $quizId; ?>">
                
                <div class="form-group">
                    <label class="col-sm-3 control-label">Quiz Name</label>
                    <div class="col-sm-9">
                        <p class="form-control-static"><?php echo $this->main_model->get_name_from_id('quiz', 'name', $quizId); ?> </p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="category" class="col-sm-3 control-label">Question Category</label>
                    <div class="col-sm-9">
                        <select class="form-control" id="category" name="category" required>
                            <?php echo $this->main_model->fill_select('category', 'name', 1); ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="story" class="col-sm-3 control-label">Question Story</label>
                    <div class="col-sm-9">
                        <select class="form-control" id="story" name="story">
                            <?php echo $this->main_model->fill_select('quiz_story', 'name', 0, 'quiz_id', $quizId); ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="question" class="col-sm-3 control-label">Question Text</label>
                    <div class="col-sm-9">
                        <textarea id="question" name="question_text" class="skill_editor"></textarea>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="inputDescription4" class="col-sm-3 control-label">Answer & Explanation</label>
                    <div class="col-sm-9">
                        <textarea name="answer_text" class="skill_editor"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-10">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </form>
            </div><!-- end add-program-form content -->
</section><!-- end col-md-9 -->
<!--end content panel start -->

</div><!-- end bigCallout-->

<!-- End Content and Sidebar
===================================================== -->
</div><!-- end main -->
<?php $this->load->view('footer_view'); ?>

<?php $this->load->view('html_end_view'); ?>
