<?php
//echo '<pre>';
//print_r($_POST);die;
$this->load->view('home_header_view');
?>

<div class="container main_container">
    <div class="main_body">
        <div class="row">
             <aside class="col-md-3">
            <?php $this->load->view('ProgramSideView'); ?>
                <?php
                $this->load->view('newsLetterSubscription');
                ?>

            </aside>
            <!--content panel start -->

            <?php
            $template_instruction_id = $_POST['sheet_section_id'];
            ?>

            <section class="col-md-9">
                <div class="panel">
                    <h1 class="header_text">Your Credibility Building Skills Analysis</h1>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-responsive">
                            <thead>
                                <tr style="background-color: #01897b; color:#fff;">
                                    <th class="unbold">S.No.</th>
                                    <th class="unbold">Building Credibility Technique</th>
                                    <th class="text-center unbold">Questions #</th>
                                    <th class="text-center unbold">Maximum Marks</th>
                                    <?php
                                    $this->db->select_max('marks', 'marks');
                                    $this->db->where('template_instruction_id', $template_instruction_id);
                                    $this->db->where('header_type', 'option_header');
                                    $result = $this->db->get('marking_type_header');
                                    $max_marks = $result->row()->marks;
                                    //                    echo $max_marks;die;
                                    ?>
                                    <th class="text-center unbold">Marks Obtained</th>
                                    <th class="text-center unbold">Building Credibility Score %</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                //Note: Capital Letters variables are for final total/sum data of all cetogory
                                $TOATL_QUESTIONS = 0;
                                $TOTAL_MAX_MARKS = 0;
                                $TOTAL_MARKS_OBTAINED = 0;

                                foreach ($list as $key_cat => $value) {
                                    echo '<tr>';
                                    echo '<td class="text-center">' . ($i + 1) . '</td>';
                                    echo '<td>' . $this->main_model->get_name_from_id('actionsheet_category', 'name', $key_cat) . '</td>';
                                    echo '<td class="text-center">' . $total_ques = sizeof($value) . '</td>';
                                    $TOATL_QUESTIONS += $total_ques;
                                    echo '<td class="text-center">' . $total_max_marks = ($total_ques * $max_marks) . '</td>';
                                    $TOTAL_MAX_MARKS += $total_max_marks;
                                    $total_marks_obtained = 0;

                                    foreach ($value as $value_sheet_data) {
                                        if (isset($value_sheet_data['option_id'])) {
                                            $each_ques_marks = $this->main_model->get_name_from_id('marking_type_header', 'marks', $value_sheet_data['option_id']);
                                            $total_marks_obtained += $each_ques_marks;
                                        }
                                    }
                                    echo '<td class="text-center">' . ($total_marks_obtained) . '</td>';
                                    $TOTAL_MARKS_OBTAINED += $total_marks_obtained;
                                    echo '<td class="text-center">' . $percentage = (($total_marks_obtained / $total_max_marks) * 100) . '</td>';
                                    echo '</tr>';
                                    $i++;
                                }
                                ?>
                            </tbody>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td><b>Building Credibility Score</b></td>
                                    <td class="text-center"><b><?php echo $TOATL_QUESTIONS; ?></b></td>
                                    <td class="text-center"><b><?php echo $TOTAL_MAX_MARKS; ?></b></td>
                                    <td class="text-center"><b><?php echo $TOTAL_MARKS_OBTAINED; ?></b></td>
                                    <td class="text-center"><b><?php echo $TOTAL_PERCENTAGE = (($TOTAL_MARKS_OBTAINED / $TOTAL_MAX_MARKS) * 100); ?></b></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>



                <div class="row">
                    <div class="col-md-12" id ='columnchart_values'>

                    </div>
                </div>

                <div class="row top-margin">
                    <div class="col-md-12"><h5 style="padding: 10px 10px; background-color: #01897b; color: #fff;">Building Credibility Overall Score Analysis</h5></div>
                    <div class="col-md-12 top-margin_">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="">
                                <tbody>
                                    <tr>
                                        <td class="col-md-4"><span style="color: #24b04f; text-align: center;">More Than 75%</span></td>
                                        <td class="col-md-8 text-justify">Congratulations ! You display good efficiency in these Building Credibility Areas. <u><a href="<?php echo(base_url() . "news-letter"); ?>">Subscribe</a></u> to our Monthly Newsletter and Improve your Rapport Building Skills, by downloading 'Art of Building Credibility e-Book' as a subscription bonus</td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-4"><span style="color: #f7c004; text-align: center;">51 - 75 %</span></td>
                                        <td class="col-md-8 text-justify">You display some traits of these Building Credibility Areas but there is scope for improvement.  <u><a href="<?php echo(base_url() . "news-letter"); ?>">Subscribe</a></u> to our Monthly Newsletter and Improve your Rapport Building Skills, by downloading 'Art of Building Credibility e-Book' as a subscription bonus</td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-4"><span style="color: #f61a00; text-align: center;">50% or less</span></td>
                                        <td class="col-md-8 text-justify">You have immense opportunity in improving your effectiveness in these Building Credibility Areas.  <u><a href="<?php echo(base_url() . "news-letter"); ?>">Subscribe</a></u> to our Monthly Newsletter and Improve your Rapport Building Skills, by downloading 'Art of Building Credibility e-Book' as a subscription bonus </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>


            </section>
        </div><!-- end bigCallout-->

        <!-- End Content and Sidebar
        ===================================================== -->
    </div><!-- end main -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {packages: ['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ["Element", "Density", {role: "style"}],
                //    ["Copper", 8.94, "#b87333"],
                //    ["Silver", 10.49, "silver"],
                //    ["Gold", 19.30, "gold"],
                //    ["Platinum", 21.45, "color: #e5e4e2"]
<?php
//             echo '["Email Equitee", "89"],';
//             echo '["Telephone Equitee", "67"],';
$i = 0;

$color = array("#ffc001", "#fe0002", "#4e94d6", "#4e94d6", "#ffc001");
foreach ($list as $key_cat => $value) {

    $eq_name = $this->main_model->get_name_from_id('actionsheet_category', 'name', $key_cat);
    $total_marks_obtained = 0;
    $total_ques = sizeof($value);
    $total_max_marks = ($total_ques * $max_marks);
    foreach ($value as $key2 => $value_sheet_data) {
        if (isset($value_sheet_data['option_id'])) {
            $each_ques_marks = $this->main_model->get_name_from_id('marking_type_header', 'marks', $value_sheet_data['option_id']);
            $total_marks_obtained += $each_ques_marks;
        }
    }

    $percentage = (($total_marks_obtained / $total_max_marks) * 100);
    if ($percentage > 75) {
        echo '["' . $eq_name . '", ' . $percentage . ',"#24b04f"],';
    } elseif ($percentage < 51) {
        echo '["' . $eq_name . '", ' . $percentage . ',"#f61a00"],';
    } else {
        echo '["' . $eq_name . '", ' . $percentage . ',"#f7c004"],';
    }


    $i++;
}

$TOTAL_PERCENTAGE = (($TOTAL_MARKS_OBTAINED / $TOTAL_MAX_MARKS) * 100);
if ($TOTAL_PERCENTAGE > 75) {
    echo '["Building Credibility Score %", ' . $TOTAL_PERCENTAGE . ',"#24b04f"],';
} elseif ($TOTAL_PERCENTAGE < 51) {
    echo '["Building Credibility Score %", ' . $TOTAL_PERCENTAGE . ',"#f61a00"],';
} else {
    echo '["Building Credibility Score %", ' . $TOTAL_PERCENTAGE . ',"#f7c004"],';
}
//echo '["Building Credibility Score %", ' . $TOTAL_PERCENTAGE . ',"#FFC300"],';
?>
            ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
                {calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation"},
                2]);

            var options = {
                title: "Building Credibility Score %",
                left: 100, top: 0, height: 280, width: 860,
                bar: {groupWidth: '40%'},
                legend: {position: 'none'},
                hAxis: {showTextEvery: 0, slantedText: false, textStyle: {color: 'white'}},
                vAxis: {
                    textStyle: {color: 'white'}
                },
                titleTextStyle: {color: 'white'},
                backgroundColor: '#535353',
                annotations: {alwaysOutside: true},
            };
//            var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
//            chart.draw(view, options);

            var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
            google.visualization.events.addListener(chart, 'ready', Title_center);
            chart.draw(view, options);
        }

        function Title_center() {
            var title_chart = $("#columnchart_values svg g").find('text').html();
            $("#columnchart_values svg").find('g:first').html('<text fill="#ffffff" stroke-width="0" stroke="none" font-weight="bold" font-size="14" font-family="Arial" y="37.9" x="300" text-anchor="start">' + title_chart + '</text>');
        }
    </script>
    <?php $this->load->view('home_footer'); ?>
</div>


