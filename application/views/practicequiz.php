<?php
//echo "<pre>";
//print_r($comments);die;
$this->load->view('header_view');
$this->load->view('user_left_view');
//print_r($quiz_detail);
//die;
?>
<section class="col-md-9">
    <div class="dooble-border" style="margin-top: -20px;">
        <!--<div class="page-header">-->
        <p class="page-header header_text"><?php echo $quiz_detail->name; ?></p>
        <div class="row">
            <div class="col-md-12">
                <form class="form-horizontal" role="form">
                    <div class="row">
                        <div class="col-xs-12">
                                                        <!--<div class="row">-->
                                                        <!--    <div class="col-md-6"><div   class="col-md-3" id="timer1_"></div><div class="col-md-9"></div></div>-->
                                                        <!--    <div class="col-md-6">Time Taken / Marks obtain</div>-->
                                                        <!--</div>-->

                        </div>
                    </div>

                    <div  id="question-content456">
                        <!--Question answer content block start-->
                        <!--calling a sub view to inject / manage questions-->
                        <?php $this->load->view('insert_options_view'); ?>
                        <!--Question answer content block end-->
                    </div>
                    <hr />
                    <div class="row">
                        <!--                        <div class="col-sm-12 text-center">
                                                    <button class="btn btn-danger">Finish</button>
                                                </div>-->
                        <div class="col-md-12">
                           <nav>
                                <ul class="pagination">
                                    <li class="page-item <?php if ($prev_link == "#") echo "disabled"; ?>">
                                        <a class="page-link" href="<?php echo $prev_link; ?>" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <?php
                                    for ($j = 1; $j <= $total_pages; $j++) {
                                        ?>


                                        <li class="page-item <?php if ($current == $j) echo "active"; ?>">
                                            <a class="page-link" href="<?php echo $link . $j . '/' . $nav_type . '/' . $id; ?>"><?php echo $j; ?></a>
                                        </li>

                                    <?php } ?>
                                    <li class="page-item <?php if ($next_link == "#") echo "disabled"; ?>">
                                        <a class="page-link" href="<?php echo $next_link; ?>" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav> 

                        </div>

                    </div>
                </form>
                    </div><!-- end Questin block content -->
    </div>
    <!-- end col-md-9 -->
    <!--end content panel start -->
    <!---end row---!>
    <!-- end bigCallout-->

</section><!-- End Content and Sidebar
===================================================== -->
<!-- end main -->

<?php $this->load->view('footer_view'); ?>
</div>
<script>
    $(document.body).on('change', '.option-select', function () {
        if ($(this).is(':checked')) {
            if ($(this).attr('type') == "radio") {
                $(this).parent().parent().parent().parent().parent().parent().find(".option-image").hide();
            }
            $(this).parent().parent().parent().find(".option-image").show();
        } else {
            $(this).parent().parent().parent().find(".option-image").hide();
        }

    });

    $(document).ready(function () {
        $(".calc-div").calculator({showOn: 'button'});
        $(".calc-div").hide();
        $(".skill_editor").summernote();
        $(".option-image").hide();
//        $("#timer").countdown({until: liftoffTime, compact: true,
//            layout: '<b>{dn} {dl} {hnn}{sep}{mnn}{sep}{snn}</b> {desc}',
//            description: 'time remaining'});
        $("#timer1").countdown({since: "0", compact: true, format: 'dHMS'});
    });

    $(document).ready(function () {
        $(".calc-button").click(function () {
            $(".calc-div").toggle(300);
            $(".calc-button").text(function (i, text) {
                return text === "Show Calculator" ? "Hide Calculator" : "Show Calculator";
            })
        });
    });

</script>
<?php $this->load->view('html_end_view'); ?>
</div>
