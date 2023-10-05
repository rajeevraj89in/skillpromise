<?php
//echo '<pre>';
//print_r($_POST);die;
$this->load->view('home_header_view');
?>
<br><br>
<div class="container main_container">
    <div class="main_body">
        <div class="row">
             <aside class="col-md-3">
            
            </aside>
            <!--content panel start -->

            <?php
            $template_instruction_id = $_POST['sheet_section_id'];
            ?>

            <section class="col-md-9">
                <div class="panel">
              
                <h1 style="color:#25897a; text-align: left;" class="header_text">
               Etiquette Analysis
                </h1>
            
                   
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr style="background-color: #01897b; color:#fff;">
                                    <th class="unbold">S.No.</th>
                                    <th class="unbold">Etiquette Techniques</th>
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
                                    <th class="text-center unbold">Score %</th>
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
									//print('<pre>'); print_r($value);
									$total_ques = count($value);
									$total_max_marks = ($total_ques * $max_marks);
                                   if(($i+1)!=5){
                                        echo '<tr>';
                                    if(($i+1)=='6'){
                                        echo '<td class="text-center">' . ($i) . '</td>';
                                    }else{
                                        echo '<td class="text-center">' . ($i + 1) . '</td>';
                                    }
                                    echo '<td>' . $this->main_model->get_name_from_id('actionsheet_category', 'name', $key_cat) . '</td>';
                                    echo '<td class="text-center">' . $total_ques . '</td>';
                                    $TOATL_QUESTIONS += $total_ques;
                                    echo '<td class="text-center">' . $total_max_marks  . '</td>';
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
                                    echo '<td class="text-center">' . round($percentage = (($total_marks_obtained / $total_max_marks) * 100)) . '</td>';
                                    echo '</tr>';
                                    
                                   }
                                   $i++;
                                }
                                ?>
                            </tbody>
                            <tbody>
                                <tr style="background-color: #01897b; color:#fff;">
                                    <td colspan="2"><b>Overall Score</b></td>
                                    <td class="text-center"><b><?php echo $TOATL_QUESTIONS; ?></b></td>
                                    <td class="text-center"><b><?php echo $TOTAL_MAX_MARKS; ?></b></td>
                                    <td class="text-center"><b><?php echo $TOTAL_MARKS_OBTAINED; ?></b></td>
                                    <td class="text-center"><b><?php 
                                     $TOTAL_PERCENTAGE = (($TOTAL_MARKS_OBTAINED / $TOTAL_MAX_MARKS) * 100);
                                     echo round($TOTAL_PERCENTAGE);  
                                    ?></b></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>


                <br><br>
                <div class="row">
                    <div class="col-md-12" id ='columnchart_values'>

                    </div>
                </div>

                <div class="row top-margin">

                        <div class="col-md-12"><h5 style="padding: 10px 10px; background-color: #01897b; color: #fff;">Etiquette   overall Score Analysis</h5></div>
                        <div class="col-md-12 ">
                        <div class="table-responsive">
                        <table class="table table-bordered" id="">
                            <tbody>
                                <tr>
                                    <td style="color: #25897a !important; font-weight: bold; width:25%;">More Than 75%</td>
                                    <td style="text-align: justify;">Congratulations! You display good efficiency in different types of Etiquette. Skillpromise recommends that you go through traits under different types of Etiquette. Learn about the gaps that you identify and inculcate them in your personality through practice.</td>
                                </tr>
                                <tr>
                                    <td style="color: #f67043 !important; font-weight: bold;">51 - 75 %</td>
                                    <td style="text-align: justify;">You display some traits of different types of Etiquettes but there is scope for improvement. Skillpromise recommends that you go through traits under different types of Etiquette. Learn about the gaps that you identify and inculcate them in your personality through practice.</td>
                                </tr>
                                <tr>
                                    <td style="color: #dc1515 !important; font-weight: bold;">50% or less</td>
                                    <td style="text-align: justify;">You have immense opportunity to improve your effectiveness in various types of Etiquette. Skillpromise recommends that you go through traits under different types of Etiquette. Learn about the gaps that you identify and inculcate them in your personality through practice.</td>
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
	$eq_name = substr($eq_name, 0, strpos($eq_name, ' '));
    $total_marks_obtained = 0;
    $total_ques = sizeof($value);
    $total_max_marks = ($total_ques * $max_marks);
    foreach ($value as $key2 => $value_sheet_data) {
        if (isset($value_sheet_data['option_id'])) {
            $each_ques_marks = $this->main_model->get_name_from_id('marking_type_header', 'marks', $value_sheet_data['option_id']);
            $total_marks_obtained += $each_ques_marks;
        }
    }

    $percentage = round(($total_marks_obtained / $total_max_marks) * 100);
    if ($percentage > 75) {
        echo '["' . $eq_name . '", ' . $percentage . ',"#24b04f"],';
    } elseif ($percentage < 51) {
        echo '["' . $eq_name . '", ' . $percentage . ',"#f61a00"],';
    } else {
        echo '["' . $eq_name . '", ' . $percentage . ',"#f7c004"],';
    }


    $i++;
}

$TOTAL_PERCENTAGE = round(($TOTAL_MARKS_OBTAINED / $TOTAL_MAX_MARKS) * 100);
if ($TOTAL_PERCENTAGE > 75) {
    echo '["Overall", ' . $TOTAL_PERCENTAGE . ',"#24b04f"],';
} elseif ($TOTAL_PERCENTAGE < 51) {
    echo '["Overall", ' . $TOTAL_PERCENTAGE . ',"#f61a00"],';
} else {
    echo '["Overall", ' . $TOTAL_PERCENTAGE . ',"#f7c004"],';
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
                title: "Etiquette Score Percentage",
                left: 100, top: 0, height: 280, width: 825,
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
   
</div>
 <?php $this->load->view('home_footer'); ?>

