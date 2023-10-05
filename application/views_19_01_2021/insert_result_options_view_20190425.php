<?php

function answered($id) {
    if ($id) {
        return 'checked';
    } else {
        return "";
    }
}

function option_injectr($option, $question_type, $question_id) {
    if ($option['is_correct']) {
        $image_class = "quet-answ-img-correct";
        $image_src = base_url() . 'assets/img/' . "correct.png";
        $image_alt = "Correct";
    } else {
        $image_class = "quet-answ-img-incorrect";
        $image_src = base_url() . 'assets/img/' . "incorrect.png";
        $image_alt = "Wrong";
    }

    if ($option['option_number'] % 2) {
        echo '<div class="form-group">';
    }

    echo '<div><div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 ' . $image_class . '">';
//    var_dump($option);
    if ($option['is_correct'] || $option['answered']) {
        echo '<img class="option-image" src="' . $image_src . '" alt="' . $image_alt . '" />';
    }
    echo '</div>';


    if ($question_type == 'Single') {
        echo '<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
        <label class="radio-inline"><input class="option-select" id="option-' . $option['option_id'] . '" type="radio" value="' . $option['option_id'] . '" name="selected_option_' . $question_id . '" ' . answered($option['answered']) . '>' . $option['option_text'] . '</label>
        </div>
        </div>';
    } else {
        echo '<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
        <label class="checkbox-inline">
        <input type="checkbox" class="option-select" id="option-' . $option['option_id'] . '" name="selected_option_' . $question_id . '[' . $option['option_number'] . ']" value="' . $option['option_id'] . '" ' . answered($option['answered']) . '/>' . '<div>' . $option['option_text'] . '</div>
        </label>
        </div>
        </div>';
    }

    if (!($option['option_number'] % 2)) {
        echo '</div>'; //form-group div
    }
}

$i = 0;
//print_r($questions);
foreach ($questions as $question) {
    $i++;
    echo '<div class = "row question_div">'
    . '<div class = "col-xs-12">'
    . '<label for = "" class = "col-sm-3 control-label">Question ' . $i . ':</label>'
    . '<div class = "col-sm-9">'
    . '<div class = "form-group">'
    . '<div class = "col-sm-12">'
    . '<div class="form-control-static" id = "' . $question['id'] . '">' . $question['question_text'] . '</div>'
    . '</div>'
    . '</div>';
//    print_r($options);

    foreach ($options[$question['id']] as $option) {
        option_injectr($option, $question['select_type'], $question['id']);
    }
    if ($question['no_of_options'] % 2) {
        echo '<div class = "col-sm-1 "></div>
        <div class = "col-sm-5"></div>
        </div>';
    }

    echo '</div>
</div>
</div>';
}
?>
