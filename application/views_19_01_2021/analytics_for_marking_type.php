<?php
//echo "<pre>";
//print_r($data);die;
// Created:Dewangshu, 17/8/16 , for analytics report of marking type action sheets.
$this->load->view('header_view');
if ($_SESSION['role_name'] == "Student") {
    echo '<div class="container main_container">
    <div class="main_body">

        <div class="row" id="bigCallout">
            <!--sidebar panel start -->';
    //$this->load->view('home_left_view');
} else {
    $this->load->view('manager_left_view');
}
?>
<?php 
    $sheet_data =  $this->main_model->select('sheets', '*',id,array('id'=>$sheet_id));
?>
<!--content panel start -->
<?php
    if($_SESSION['role_name'] == "Student"){
        echo '<section class="col-md-12">';
    }else{
        echo '<section class="col-md-9">';
    }
?>
<input type="hidden" value="<?php echo $sheet_id; ?>" />
<div id="printarea">
    <style>
    .aling{
        text-align: center !important;
    }
    .table{
        border-collapse: collapse;
        width: 100% !important;
    }
    #columnchart_values{
        width:100% !important;
    }
</style>
    <!--<h1 class="header_text">My Key Values:<font color="green"><?php
       // echo $sheet_name;
        ?></font></h1>-->
    <!--banner image-->
    <?php if (isset($image_file) && !empty($image_file)) { ?>

        <div class="row my-2">
            <div class="col-md-12">

                <!--<img src = "<?php echo(base_url() . 'assets/img/uploads/' . $image_file); ?>" class = "img-responsive">-->
            </div>
        </div> 
    <?php }
    ?>

    <!--banner image end-->
    <!--box content-->
    <?php if (isset($image_comment) && !empty($image_comment)) { ?>
        <!--<div class="well my-2">-->
        <!--    <?php //echo $image_comment; ?>-->

        <!--</div>-->
    <?php }
    ?>

    <?php if (isset($analytics_comment) && !empty($analytics_comment)) { ?>
        <!--<div class="border py-2 px-2">-->
        <!--    <?php //echo $analytics_comment; ?>-->
        <!--</div>-->
    <?php }
    ?>
    <!--box content enc-->
    <div class="row">
        <center><h3 style="color:#25897a;"><?php echo $sheet_data[0]->pdf_header; ?></h3></center><br>
        <table class="table table-bordered table-responsive" border="1">
            <thead>
                <tr>
                    <th class="aling">S No.</th>
                    <th>Type</th>
                    <th class="aling">Questions#</th>
                    <th class="aling">Max. Marks</th>
                    <?php
                    $this->db->select_max('marks', 'marks');
                    $this->db->where('template_instruction_id', $template_instruction_id);
                    $this->db->where('header_type', 'option_header');
                    $result = $this->db->get('marking_type_header');
                    $max_marks = $result->row()->marks;
//echo $max_marks;die;
                    ?>
                    <th class="aling">Marks Obtained</th>
                    <th class="aling">Score %</th>
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
                    echo '<td class="aling">' . ($i + 1) . '</td>';
                    echo '<td>' . $this->main_model->get_name_from_id('actionsheet_category', 'name', $key_cat) . '</td>';
                    echo '<td class="aling">' . $total_ques = sizeof($value) . '</td>';
                    $TOATL_QUESTIONS += $total_ques;
                    echo '<td class="aling">' . $total_max_marks = ($total_ques * $max_marks) . '</td>';
                    $TOTAL_MAX_MARKS += $total_max_marks;
                    $total_marks_obtained = 0;
                    foreach ($value as $key2 => $value_sheet_data) {
                        $each_ques_marks = $this->main_model->get_name_from_id('marking_type_header', 'marks', $value_sheet_data['marking_type_header_id']);
                        $total_marks_obtained += $each_ques_marks;
                    }
                    echo '<td class="aling">' . ($total_marks_obtained) . '</td>';
                    $TOTAL_MARKS_OBTAINED += $total_marks_obtained;
                    echo '<td class="aling">' . round($percentage = (($total_marks_obtained / $total_max_marks) * 100)) . '</td>';
                    echo '</tr class="aling">';
                    $i++;
                }
                ?>
            </tbody>
            <tbody>
                <tr>
                    <td class="aling"></td>
                    <td><b>Overall Score</b></td>
                    <td class="aling"><b><?php echo $TOATL_QUESTIONS; ?></b></td>
                    <td class="aling"><b><?php echo $TOTAL_MAX_MARKS; ?></b></td>
                    <td class="aling"><b><?php echo $TOTAL_MARKS_OBTAINED; ?></b></td>
                    <td class="aling"><b><?php
                        $TOTAL_PERCENTAGE = (($TOTAL_MARKS_OBTAINED / $TOTAL_MAX_MARKS) * 100);
                        echo round($TOTAL_PERCENTAGE); 
                    ?></b></td>
                </tr>
            </tbody>
        </table>

    </div>

    <br><br>
    <center>
       <div class="row" id ='columnchart_values'></div> 
    </center>
    





    <div class="row top-margin">

        <?php
        $table_type = '';
        $sheet = strtolower($sheet_name);
        if (strpos($sheet, 'wellness') !== false) {
            $table_type = "wellness";
        } else if (strpos($sheet, 'etiquette') !== false) {
            $table_type = "etiquette";
        } else {
            
        }





        if ($table_type == 'wellness') {
            ?>
            <div class="col-md-12" style="background-color: #87CEEB; width: 98%"><h5><b>Wellness Overall Score Analysis</b></h5></div>
            <div class="col-md-12 top-margin">
                <div class="table-responsive">
                    <table class="table table-bordered" id="">
                        <tbody>
                            <tr>
                                <td>More Than 75%</td>
                                <td>Congratulations ! You display good efficiency in this this wellness area. Skillpromise recommeds that you work on inculcating the traits that you do not have or that you need to improve upon in these Etiquette categories</td>
                            </tr>
                            <tr>
                                <td>51 - 75 %</td>
                                <td>You display some traits of these Etiquettes but there is scope for improvement. Skillpromise recommeds that you work on inculcating the traits that you do not have or that you need to improve upon in these Etiquette categories</td>
                            </tr>
                            <tr>
                                <td>50% or less</td>
                                <td>You have immense opportunity in improving your effectiveness in these Etiquettes.  Skillpromise recommeds that you work on inculcating the traits that you do not have or that you need to improve upon in these Etiquette categories  </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        <?php } else if ($table_type == 'etiquette') {
            ?>
            <div class="col-md-12" style="background-color: #87CEEB; "><h5><b>Etiquette Overall Score Analysis</b></h5></div>
            <div class="col-md-12 top-margin">
                <div class="table-responsive">
                    <table class="table table-bordered" id="">
                        <tbody>
                            <tr>
                                <td>More Than 75%</td>
                                <td>Congratulations ! You have good understanding of these Etiquettes. Skillpromise recommeds that you work on inculcating the traits that you do not have or that you need to improve upon in these Etiquette categories</td>
                            </tr>
                            <tr>
                                <td>51 - 75 %</td>
                                <td>You display some traits of these Etiquettes but there is scope for improvement. Skillpromise recommeds that you work on inculcating the traits that you do not have or that you need to improve upon in these Etiquette categories</td>
                            </tr>
                            <tr>
                                <td>50% or less</td>
                                <td>You have immense opportunity in improving your effectiveness in these Etiquettes.  Skillpromise recommeds that you work on inculcating the traits that you do not have or that you need to improve upon in these Etiquette categories  </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php }
        ?>
    </div>
</div>
<center><!--<input type='button' id='btn'class="btn btn-success" value='Print' onclick='printDiv();'>--><a href="<?php echo base_url('sheets/sheets/'.$sheet_id); ?>" class="btn btn-success">Back</a></center>

</section>

</div><!-- end bigCallout-->

<!-- End Content and Sidebar
===================================================== -->
</div><!-- end main -->
<?php $this->load->view('footer_view'); ?>
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

$color = array("#25897a", "#25897a", "#25897a", "#25897a", "#25897a", "#25897a","#25897a","#25897a","#25897a","#25897a","#25897a");
foreach ($list as $key_cat => $value) {
    $eq_name = $this->main_model->get_name_from_id('actionsheet_category', 'name', $key_cat);
    $total_marks_obtained = 0;
    $total_ques = sizeof($value);
    $total_max_marks = ($total_ques * $max_marks);
    foreach ($value as $key2 => $value_sheet_data) {
        $each_ques_marks = $this->main_model->get_name_from_id('marking_type_header', 'marks', $value_sheet_data['marking_type_header_id']);
        $total_marks_obtained += $each_ques_marks;
    }
    $percentage = (($total_marks_obtained / $total_max_marks) * 100);
    if (isset($color[$i])) {
        echo '["' . $eq_name . '", ' . round($percentage) . ',"' . $color[$i] . '"],';
    } else {
        echo '["' . $eq_name . '", ' . round($percentage) . ',"purple"],'; //set static color if not found in array
    }
    $i++;
}
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
            title: "",
            left: 0, top: 0, height: 280, width: 950,
            bar: {groupWidth: '16%'},
            legend: {position: 'none'},
            hAxis: {showTextEvery: 0, slantedText: false},
            backgroundColor: '#FBF5EF',
            //background:'radial-gradient(circle,#fff,#e1c6c1, rgb(226, 199, 194))',
        };
        var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
        chart.draw(view, options);
    }
</script>
<?php $this->load->view('html_end_view'); ?>

<script>

    function printDiv()
    {

        var Printarea = document.getElementById('printarea');

        var newWin = window.open('', 'Print-Window');

        newWin.document.write('<html><body onload="window.print()">' + Printarea.innerHTML + '</body></html>');

        newWin.document.close();

    }


</script>