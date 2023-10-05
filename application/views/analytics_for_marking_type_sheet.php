<?php

$this->load->view('header_view');
$this->load->view('user_left_view');
?>

            <section class="col-md-9">
                <div class="panel">
              
                <h1 style="color:#25897a; text-align: left;" class="header_text">
                 <?php $sheet_name = strtolower($sheets_record->name); echo ucwords($sheet_name)." Analysis";   ?> 
                </h1>
            
                   
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr style="background-color: #01897b; color:#fff;">
                                    <th class="unbold">S.No.</th>
                                    <th class="unbold">Type</th>
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
                            if($sheet_name=='wellness' || $sheet_name=='etiquette'){
                                foreach ($list as $key_cat => $value) {
									$total_ques = sizeof($value);
									$total_max_marks = ($total_ques * $max_marks);
                                    echo '<tr>';
                                    echo '<td class="text-center">' . ($i + 1) . '</td>';
                                    echo '<td>' . $this->main_model->get_name_from_id('actionsheet_category', 'name', $key_cat) . '</td>';
                                    echo '<td class="text-center">' . $total_ques  . '</td>';
                                    $TOATL_QUESTIONS += $total_ques;
                                    echo '<td class="text-center">' . $total_max_marks . '</td>';
                                    $TOTAL_MAX_MARKS += $total_max_marks;
                                    $total_marks_obtained = 0;

                                    foreach ($value as $value_sheet_data) {
                                        if (isset($value_sheet_data['marking_type_header_id'])) {
                                            $each_ques_marks = $this->main_model->get_name_from_id('marking_type_header', 'marks', $value_sheet_data['marking_type_header_id']);
                                            $total_marks_obtained += $each_ques_marks;
                                        }
                                    }
                                    echo '<td class="text-center">' . ($total_marks_obtained) . '</td>';
                                    $TOTAL_MARKS_OBTAINED += $total_marks_obtained;
                                    echo '<td class="text-center">' . round($percentage = (($total_marks_obtained / $total_max_marks) * 100)) . '</td>';
                                    echo '</tr>';
                                    $i++;
                                }
							}
                            else{
								$score_data = array();
								$score_with_name = array();
                                foreach ($list as $key_cat => $value) {
									$score_item = array();
									$total_ques = sizeof($value);
									$score_item['total_ques'] = $total_ques;
									$total_max_marks = $total_ques * $max_marks;
									$score_item['total_max_marks'] = $total_max_marks;
									$score_item['index'] = $i + 1;
									$item_name = $this->main_model->get_name_from_id('actionsheet_category', 'name', $key_cat);
									$score_item['item_name'] = $item_name;
                                    
                                    $TOATL_QUESTIONS += $total_ques;
                                    
                                    $TOTAL_MAX_MARKS += $total_max_marks;
                                    $total_marks_obtained = 0;

                                    foreach ($value as $value_sheet_data) {
                                        if (isset($value_sheet_data['marking_type_header_id'])) {
                                            $each_ques_marks = $this->main_model->get_name_from_id('marking_type_header', 'marks', $value_sheet_data['marking_type_header_id']);
                                            $total_marks_obtained += $each_ques_marks;
                                        }
                                    }
									$score_item['total_marks_obtained'] = $total_marks_obtained;
                                    
                                    $TOTAL_MARKS_OBTAINED += $total_marks_obtained;
                                    
									$percentage = round(($total_marks_obtained / $total_max_marks) * 100);
									$score_item['percentage'] = $percentage;
                                    									
									$score_data[$item_name] = $score_item;
									$score_with_name[$item_name] = $percentage;
                                    $i++;
                                }
								
								arsort($score_with_name);
								$k = 1;
								$overall_total_questions = 0;
								$overall_max_marks = 0;
								$overall_marks_obtained = 0;
								//$overall_percentage = 0;
								foreach ($score_with_name as $item_name => $percentage) {
									$data_item = $score_data[$item_name];
									$overall_total_questions += $data_item['total_ques'];
									$overall_max_marks += $data_item['total_max_marks'];
									$overall_marks_obtained += $data_item['total_marks_obtained'];
									//$overall_percentage += $data_item['percentage'];
                                    echo '<tr>';
                                    echo '<td class="text-center">' . $k . '</td>';
                                    echo '<td>' . $data_item['item_name'] . '</td>';
                                    echo '<td class="text-center">' . $data_item['total_ques']  . '</td>';
                                    
                                    echo '<td class="text-center">' . $data_item['total_max_marks']  . '</td>';
                                    
                                    echo '<td class="text-center">' . $data_item['total_marks_obtained'] . '</td>';
                                    
                                    echo '<td class="text-center">' . $data_item['percentage'] . '</td>';
                                    echo '</tr>';
									$k = $k + 1;
                                }
								$overall_percentage = round(($overall_marks_obtained/$overall_max_marks)*100);
								echo '<tr>';
                                    echo '<td class="text-center">' . $k . '</td>';
                                    echo '<td>Overall</td>';
                                    echo '<td class="text-center">' . $overall_total_questions  . '</td>';
                                    
                                    echo '<td class="text-center">' . $overall_max_marks  . '</td>';
                                    
                                    echo '<td class="text-center">' . $overall_marks_obtained . '</td>';
                                    
                                    echo '<td class="text-center">' . $overall_percentage . '</td>';
                                    echo '</tr>';
								
							}
							
                                ?>
                            </tbody>
                            <tbody>
							<?php  if($sheet_name=='wellness' || $sheet_name=='etiquette'){  ?>
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
							<?php }  ?>
                            </tbody>
                        </table>
                    </div>
                </div>


                
                <div class="row">
                    <div class="col-md-12" id ='columnchart_values'>

                    </div>
                </div>

                <div class="row top-margin">
                        <?php  $graph_name = "Score Percentage"; ?>
                        <div class="col-md-12" ><h5 style="padding: 10px 10px; background-color: #01897b; color: #fff;">Overall Score Analysis</h5></div>
                        <div class="col-md-12 ">
                        <div class="table-responsive">
                        <table class="table table-bordered" id="">
                            <tbody>
                                <tr>
                                    <td style="color: #25897a !important; font-weight: bold; width:25%;">More Than 75%</td>
                                    <td style="text-align: justify;">Congratulations! You display good efficiency in this skill.</td>
                                </tr>
                                <tr>
                                    <td style="color: #f67043 !important; font-weight: bold;">51 - 75 %</td>
                                    <td style="text-align: justify;">You display some traits of this skill but there is scope for improvement.</td>
                                </tr>
                                <tr>
                                    <td style="color: #dc1515 !important; font-weight: bold;">50% or less</td>
                                    <td style="text-align: justify;">You have immense opportunity in improving your effectiveness in this skill.</td>
                                </tr>
                            </tbody>
                        </table>
                        </div>
                        </div>
						

              </div>

            </section>
        
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

//if($sheet_name=='wellness' || $sheet_name=='etiquette'){
if(true){
	$color = array("#ffc001", "#fe0002", "#4e94d6", "#4e94d6", "#ffc001");
	foreach ($list as $key_cat => $value) {

		$eq_name = $this->main_model->get_name_from_id('actionsheet_category', 'name', $key_cat);
		$eq_name = substr($eq_name, 0, strpos($eq_name, ' '));
		$total_marks_obtained = 0;
		$total_ques = sizeof($value);
		$total_max_marks = ($total_ques * $max_marks);
		foreach ($value as $key2 => $value_sheet_data) {
			if (isset($value_sheet_data['marking_type_header_id'])) {
				$each_ques_marks = $this->main_model->get_name_from_id('marking_type_header', 'marks', $value_sheet_data['marking_type_header_id']);
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
}
else{
	 $i = 0;
	 foreach($score_with_name as $item_name => $percentage){
		if ($i < 5) {
			echo '["' . $item_name . '", ' . $percentage . ',"#24b04f"],';
		} else {
			echo '["' . $item_name . '", ' . $percentage . ',"#f7c004"],';
		}
		$i++;
	}
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
                title: "<?php echo $graph_name; ?>",
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


<?php $this->load->view('footer_view'); ?>

<?php $this->load->view('html_end_view'); ?>
