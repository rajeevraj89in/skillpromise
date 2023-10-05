<?php

//die(var_dump($quiz_detail));
//var_dump($options);
//die;

function inject_panel_buttons($questions) {
    foreach ($questions as $key => $value) {
        $i = ++$key;
        if (($i % 4) == 1) {
            echo '<div class="row">';
        }
        echo '<div class="col-xs-3 col-sm-3 col-md-3">
                        <button id="q-button' . $i . '" type="button" class="btn btn-default btn-sm q-button">' . $i . ' <span id = "markspan' . $i . '" class=""></span></button>
                    </div>';
        if (($i % 4) == 0) {
            echo '</div>';
        }
    }
    if (sizeof($questions)) {
        echo '</div>';
    }
}

$this->load->view('header_view');
?>
<div class="row" id="bigCallout">
    <!--content panel start -->
    <section class="col-md-9">
        <div class="row">
            <div class="col-md-10"><h2 class="page-header"><?php echo $quiz_detail->name; ?></h2></div><div class="col-md-2" id="timer1"></div>
        </div>
        <!-- Question block content -->
        <div class="row">
            <div class="col-md-12">
                <form role="form" class="form-horizontal" action = "<?php echo base_url() . 'submit/quiz'; ?>" method = "POST">
                    <input type="hidden" name="quiz_id" value = "<?php echo $quiz_detail->id; ?>">
                    <input type="hidden" name="start_time" value = "<?php echo date('Y-m-d H:i:s'); ?>">
                    <input type="hidden" name="user_id" value = "<?php echo $_SESSION['user_id']; ?>">
                    <input type="hidden" name="client_time_taken" value = "">
                    <div id="flex-question-content">
                        <!--Question answer content block end-->
                        <?php
                        $this->load->view('insert_dashboard_question');
                        ?>
                        <!--Question answer content block end-->
                        <!--<hr>-->
                        <div class="row">
                            <div class="col-sm-4 text-left">
                                <button id = "mark" type="button" class="btn btn-primary"><span id = "span1" class="fa fa-check-square"></span> Mark for review</button>
                                <button id = "clear" type="button" class="btn btn-info"><span class="fa fa-recycle"></span> Clear answer</button>
                            </div>
                            <div class="col-sm-6 text-right">
                                <button id = "prev-button" type="button" class="btn btn-default"><span class="fa fa-angle-left"></span> Previous</button>
                                <button id = "next-button" type="button" class="btn btn-default"><span class="fa fa-angle-right"></span> Next</button>
                            </div>
                            <div class="col-sm-2 text-right">
                                <button type="submit" class="btn btn-danger">Submit</button>
                            </div>
                        </div>

                        <div class="clearfix"></br></div>
                        <!--Submit button end-->
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--end content panel start -->
    <aside class="col-md-3">
        <!-- question-pallet-region start -->
        <div id="question-palet" class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Question Pallette
                    <p><small>Click to go to question</small></p>
                </h3>
            </div>
            <!-- panel-body -->
            <div class="panel-body">
                <!--btn row -->
                <?php inject_panel_buttons($questions); ?>
                <!--btn row end-->
            </div>
            <!-- panel-body end-->
            <!-- panel-footer -->
            <div class="panel-footer">
                <h5>Legend :</h5>
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-5 col-lg-6"><button type="button" class="btn btn-default btn-sm">Not Visited<span class=""></span></button></div>
                    <div class="col-xs-6 col-sm-6 col-md-5 col-lg-6"><button type="button" class="btn btn-danger btn-sm">Not Answered<span class=""></span></button></div>
                </div>
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-5 col-lg-6"><button type="button" class="btn btn-success btn-sm">Answered<span class=""></span></button></div>
                    <div class="col-xs-6 col-sm-6 col-md-5 col-lg-6"><button type="button" class="btn btn-danger btn-sm">Marked <span class="fa fa-check-square"></span></button></div>
                </div>
            </div>
            <!-- panel-footer end -->
        </div>
        <!-- end question-pallet-region -->

    </aside>
</div><!-- end bigCallout-->

<!-- End Content and Sidebar
===================================================== -->
</div><!-- end main -->

<?php $this->load->view('footer_view'); ?>

<script>
    var currentquestion = 1;
    var noOfQuestions = <?php echo sizeof($questions); ?>

    function time_out() {
        alert('Time out !');
    }

    function switchQuestion(id) {
        currentquestion = id;
        if (!($("#q-button" + currentquestion).hasClass("btn-success"))) {
            $("#q-button" + currentquestion).removeClass("btn-default btn-danger btn-success");
            $("#q-button" + currentquestion).addClass("btn-danger");
        }

        $(".row.question").hide();
        $("#question-" + currentquestion).show();

        if ($("#markspan" + currentquestion).hasClass("fa-check-square")) {
            $("#mark").text(' Unmark');
        } else {
            $("#mark").text(' Mark for review');
        }

        if (currentquestion == 1) {
            $('#prev-button').attr('disabled', 'disabled');
        } else {
            $('#prev-button').removeAttr('disabled');
        }

        if (currentquestion == noOfQuestions) {
            $('#next-button').attr('disabled', 'disabled');
        } else {
            $('#next-button').removeAttr('disabled');
        }
    }

    function get_seconds(time_str) {
        var time_parts = time_str.split(":");

        time_parts[0] = (typeof time_parts[0] === 'undefined') ? 0 : time_parts[0];
        time_parts[1] = (typeof time_parts[1] === 'undefined') ? 0 : time_parts[1];
        time_parts[2] = (typeof time_parts[2] === 'undefined') ? 0 : time_parts[2];

        var startTime = (parseInt(time_parts[0]) * 3600) + (parseInt(time_parts[1]) * 60) + (parseInt(time_parts[2]));
        return startTime;
    }

    $(document).ready(function () {
        $(".calc-div").calculator({showOn: 'button'});
        $(".calc-div").hide();
        $(".skill_editor").summernote();
        switchQuestion(currentquestion);
        $('#prev-button').attr('disabled', 'disabled');

        var time_limit = "<?php echo $quiz_detail->time_limit; ?>";
        var timer_time = get_seconds(time_limit);
        var date_time = new Date($.now());
        date_time.setSeconds(date_time.getSeconds() + timer_time);
        $("#timer1").countdown({until: date_time, onExpiry: time_out, compact: true, format: 'dHMS'});
//        $("#timer").countdown({until: liftoffTime, compact: true,
//            layout: '<b>{dn} {dl} {hnn}{sep}{mnn}{sep}{snn}</b> {desc}',
//            description: 'time remaining'});
//        $("#timer1").countdown({since: "0", compact: true, format: 'dHMS'});
    });


    $(document).ready(function () {
        $(".q-button").click(function () {
            var but_id = $(this).attr("id");
            var number = parseInt(but_id.substring(8));
            switchQuestion(number);
        });

        $(".calc-button").click(function () {
            $(".calc-div").toggle(300);
            $(".calc-button").text(function (i, text) {
                return text === "Show Calculator" ? "Hide Calculator" : "Show Calculator";
            });
        });

        $("#mark").click(function () {
            $("#mark").text(function (i, text) {
                return text === ' Mark for review' ? ' Unmark' : ' Mark for review';
            });
            $("#markspan" + currentquestion).toggleClass("fa fa-check-square");
        });

        $("#clear").click(function () {
            $("#question-" + currentquestion).find(".input").prop("checked", false);
            $("#q-button" + currentquestion).removeClass("btn-default btn-danger btn-success");
            $("#q-button" + currentquestion).addClass("btn-danger");
        });

        $(".input").change(function () {
            if ($(this).prop("checked")) {
                var qId = $(this).closest(".question").attr("id").substring(9);
                $("#q-button" + qId).removeClass("btn-default btn-danger btn-success");
                $("#q-button" + qId).addClass("btn-success");
            } else {
                var count = $("#" + $(this).closest(".question").attr("id") + " .input:checked").length;
                if (!(parseInt(count))) {
                    $("#q-button" + currentquestion).removeClass("btn-default btn-danger btn-success");
                    $("#q-button" + currentquestion).addClass("btn-danger");
                }
            }
        });

        $("#prev-button").click(function () {
            switchQuestion(currentquestion - 1);
        });

        $("#next-button").click(function () {
            switchQuestion(currentquestion + 1);
        });

    });

</script>
<?php $this->load->view('html_end_view'); ?>