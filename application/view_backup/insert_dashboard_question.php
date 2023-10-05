<?php

foreach ($questions as $key => $question) {
    $question_no = ++$key;
    echo '<div class="row question" id="question-' . $question_no . '" style="display:none">
    <div class="col-xs-12">
        <label class="col-sm-3 control-label" for="inputOption4">Question ' . $question_no . ' :</label>
        <div class="col-sm-9">
            <div class="form-group">
                <div class="col-sm-12">
                    <div id="question' . $question['id'] . '"><p class="form-control-static">' . $question['question_text'] . '</p></div>
    </div>
    </div>';
    foreach ($options[$question['id']] as $option) {
        if ($option['option_number'] % 2) {
            echo '<div class="form-group">';
        }
        echo '<div class = "col-sm-6">
    <label class = "radio-inline">';
        if ($question['select_type'] == 'Single') {
            echo '<input class = "input" type = "radio" value = "' . $option['option_id'] . '" id = "" name = "answers[' . $question['id'] . ']"><div>' . $option['option_text'] . '</div>';
        } else {
            echo '<input class = "input" type = "checkbox" value = "' . $option['option_id'] . '" id = ""  name = "answers[' . $question['id'] . '][' . $option['option_number'] . ']"><div>' . $option['option_text'] . '</div>';
        }

        echo '</label>
    </div>';

        if (!($option['option_number'] % 2)) {
            echo '</div>'; //form-group div
        }
    }

    if ($question['no_of_options'] % 2) {
        echo '</div>'; //form-group div
    }

    echo '<div class="form-group">
            <!--Workspace-outer-row region start-->
            <div class="row" id="workspace-outer">
                <!--workspace region-column start-->
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <button data-target="#workspace' . $question['id'] . '" data-toggle="collapse" class="btn btn-info" type="button">
                        Workspace
                    </button>
                </div>
                <!--workspace region-column start-->

                <!--workspace region-column start-->
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <button data-target="#report' . $question['id'] . '" data-toggle="collapse" class="btn btn-warning" type="button">
                        Report
                    </button>
                </div>
                <!--workspace region-column start-->
            </div>
            <!--Workspace-outer-row region end-->
            <!--Workspace-outer-row-result region start-->
            <div class="form-group">
                <div class="row">
                    <div class="col-md-10">
                        <div class="collapse panel panel-info" id="workspace' . $question['id'] . '">
                            <div class="panel-heading">Work Space</div>
                            <div class="panel-body">
                                <textarea class="form-control" id="workspace"></textarea>
                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <button class="btn btn-info calc-button" type="button">Show Calculator</button>
                                </div>
                                <div class="row">
                                    <div class="col-md-5 calc-div"></div>
                                    <div class="col-md-7"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="collapse panel panel-warning" id="report' . $question['id'] . '">
                            <div class="panel-heading">Report</div>
                            <div class="panel-body">
                                <textarea class="form-control" id=""></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Workspace-outer-row-result region start-->
        </div>';

    echo '</div>
    </div>
    </div>';
}
?>