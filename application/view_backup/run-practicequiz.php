<?php
$this->load->view('header_view');
//print_r($quiz_detail);
//die;
?>
<div class="row" id="bigCallout">
    <!--content panel start -->
    <section class="col-md-12">
        <h1 class="page-header"><?php echo $quiz_detail->name; ?></h1>
        <!--div class="row text-center">
        <div class="col-md-12">
                <a href="" class="btn btn-primary">Add Program</a>
        </div>
        </div>
        <hr /-->
        <!-- Questin block content -->
        <div class="row">
            <div class="col-md-12">
                <form class="form-horizontal" role="form">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="row">
                                <div class="col-md-6"><div   class="col-md-3" id="timer1"></div><div class="col-md-9"></div></div>
                                <div class="col-md-6">Time Taken / Marks obtain</div>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div  id="question-content">
                        <!--Question answer content block start-->
                        <!--calling a sub view to inject / manage questions-->
                        <?php $this->load->view('insert_options_view'); ?>
                        <!--Question answer content block end-->
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <button class="btn btn-danger">Submit</button>
                        </div>
                        <div class="col-md-12">
                            <ul class="pagination" id="paginationQ"></ul>
                        </div>

                    </div>
                </form>
            </div>
        </div><!-- end Questin block content -->
    </section><!-- end col-md-9 -->
    <!--end content panel start -->

</div><!-- end bigCallout-->

<!-- End Content and Sidebar
===================================================== -->
</div><!-- end main -->

<?php $this->load->view('footer_view'); ?>

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