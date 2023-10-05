<?php
$this->load->view('header_view');
if (!$_SESSION['user_id']) {
    $this->load->view('slider_view');
}
?>
<head>
    <style>
        .border {
            /*                border-style: solid !important;
                            border-color: black !important;*/
            background-color: #fee84f !important;
        }
        .head1 {
            border-style: solid !important;
            border-color: black !important;
            color : black !important;
            font-size: 16px !important;
        }
        .head2 {
            /*                border-style: solid !important;
                            border-color: black !important;*/
            color : black !important;
            font-size: 14px !important;
        }
        .top{
            background-color:#fefc56 !important;
            border-style: initial !important;
            border-color: black  !important;
            margin-top: 1px !important;
            margin-bottom: 1px !important;
            padding-top: 5px !important;
            padding-bottom: 5px !important;
            color : grey !important;

        }
        .bottom{
            background-color:#757171 !important;
            border-style: initial !important;
            border-color: black  !important;
            margin-top: 1px !important;
            margin-bottom: 1px !important;
            padding-top: 5px !important;
            padding-bottom: 5px !important;
            color : grey !important;
        }
        .bottom a{
            color:white !important;
        }

        .text-center{
            text-align: center;
        }
        .text-right{
            text-align: right;
        }
    </style>
    <script src="<?php echo(base_url() . 'assets/js/' . 'jquery.table2excel.min.js'); ?>"></script>
    <!--    <meta charset="utf-8">
        <meta content="IE=edge" http-equiv="X-UA-Compatible">
        <meta content="width=device-width, initial-scale=1" name="viewport">

        <link rel="shortcut icon" href="<?php // echo(base_url() . 'assets/img/');                                                                     ?>animated_favicon.gif" type="image/x-icon">
        <link rel="icon" href="<?php // echo(base_url() . 'assets/img/');                                                                     ?>animated_favicon.gif" type="image/x-icon">

        <title>:: Quiz Summary ::</title>
        <link rel="stylesheet" href="<?php // echo(base_url() . 'assets/css/' . 'bootstrap.min.css');                                                                     ?>" />
        <link rel="stylesheet" href="<?php // echo(base_url() . 'assets/css/' . 'board_quiz.css');                                                                     ?>" />
        <link rel="stylesheet" href="<?php // echo(base_url() . 'assets/fonts/' . 'font-awesome-4.2.0/css/font-awesome.min.css');                                                                     ?>" />

        <script src="<?php // echo(base_url() . 'assets/js/' . 'jquery-1.11.1.min.js');                                                                     ?>"></script>
        <script src="<?php // echo(base_url() . 'assets/js/' . 'bootstrap.min.js');                                                                     ?>"></script>-->
</head>
<body class="question-palet login">

    <div class="container" id="main">
        <!--            <header>
                        <nav class="navbar navbar-default navbar-fixed-top" id="navBarTop" role="navigation">
                            <div class="container">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                    <a class="navbar-brand" href="index.htm"><img style="height:50px;width:130px" src="<?php echo(base_url() . 'assets/img/' . 'logo.png'); ?>" alt="skillpromise"/></a>
                                </div>

                            </div>nav Container end

                        </nav> navBarTop end
                    </header>-->
        <div class="row" id="bigCallout">
            <!--quiz-content-main-->
            <section class="col-md-12">
                <h2 class="header_text">Summary Report of <font color=""><?= $quiz_name; ?></font></h2>
                <hr>
                <!--quiz-title-->
                <!--                    <div class="row text-center">
                                        <h4>Summary of Section(s) Answered</h4>
                                        <p><?php // echo $quiz_name;                                                                                                                                                                                                ?></p>
                                    </div>-->
                <!--quiz-title end-->
                <!--quiz-question-main-->
                <div class="table-responsive">
                    <table class="table table-bordered" id="tblId" >
                        <thead>
                            <tr class="info">
                                <th class="info"><b>S. No.</b></th>
                                <th class="info"><b>User Id</b></th>
                                <th class="info"><b>Address</b></th>
                                <th class="info text-center"><b>Status</b> </th>
                                <?php
                                $TOTAL_MAX_MARKS = 0;
                                $cat_id = array();
                                foreach ($cat as $key => $value) {
                                    $cat_id[] = $value['id'];

                                    $filter4[0]['id'] = "quiz_id";
                                    $filter4[0]['value'] = $quiz_id;
                                    $filter4[1]['id'] = "category";
                                    $filter4[1]['value'] = $value['id'];
                                    $req_field = array("*");
                                    $each_cat_quest = $this->main_model->get_many_records("questions", $filter4, $req_field);
//                                    echo '<pre>';
//                                    print_r($each_cat_quest);die;
                                    $cat_total_marks[$value['id']] = 0;




                                    foreach ($each_cat_quest as $key_q => $q_value) {
                                        $cat_total_marks[$value['id']] += $q_value['question_weight'];
                                    }
                                    $TOTAL_MAX_MARKS += $cat_total_marks[$value['id']];
                                    echo '<th class="info text-center"><b>' . $value['name'] . '<br>(Marks out of ' . $cat_total_marks[$value['id']] . ')</b></th>';
                                    echo '<th class="info text-center"><b>' . $value['name'] . '<br>(Marks as Percentage)</b></th>';
                                }
                                ?>
                                <th class="info text-center"><b>Total Marks<br>(Out of <?= $TOTAL_MAX_MARKS ?>)</b></th>
                                <th class="info text-center"><b>Total Marks as Percentage</b></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        //    print_r($total_marks_obtained);
                        //    die;
                            $i = 1;
                            foreach ($user as $val) {
                                echo '<tr>';
                                echo '<td class=" ">' . $i++ . '</td>';
                                echo '<td class=" ">' . $val['email'] . '</td>';
                                echo '<td class=" ">' . $val['address'] . '</td>';
                                echo '<td class="text-center ">' . $val['status'] . '</td>';
                                $total_question = 0;
                                $total_answered = 0;
                                $TOTAL_MARKS = 0;
                                foreach ($cat_id as $v) {
                                    if ($val['status'] == "Completed") {
                                        $filter4[0]['id'] = "quiz_id";

                                        echo '<td class="text-center">' . $total_marks_obtained = $val['category'][$v]['marks'] . '</td>';
                                        echo '<td class="text-center">' . $percentage = round((($total_marks_obtained / $cat_total_marks[$v]) * 100), 2) . '%' . '</td>';
                                        $TOTAL_MARKS = $TOTAL_MARKS + $val['category'][$v]['marks'];
                                    } else {
                                        echo '<td class="text-center ">0</td>';
                                        echo '<td class="text-center ">0%</td>';
                                    }
                                }
                                if(($val['status'] == "Completed") && $TOTAL_MARKS == 0)
                                $stu[]= $val['name'];
                                echo '<td class=" text-center">' . $TOTAL_MARKS . '</td>';
                                echo '<td class=" text-center">' . round(($TOTAL_MARKS / $TOTAL_MAX_MARKS * 100), 2) . '%' . '</td>';
                                echo '</tr>';
                            }
                            ?>

                        </tbody>
                    </table>
                </div>

                <hr>
                <div class="form-group">
                    <button class="btn btn-info" onclick="fnExcelReport();"> EXPORT </button>
                </div>
                <!--quiz-question-main end-->
                <!--quiz-bottom-->

                <!--quiz-bottom end-->
            </section>
            <!--quiz-content-main end-->
        </div><!-- end bigCallout-->

        <!-- End Content and Sidebar
===================================================== -->

    </div>
    <?php
    //echo "<pre>";
    //print_r($stu);
    $this->load->view('footer_view');
    ?>
</div><!-- end main -->
</body>
<script>
    function fnExcelReport() {
        $("#tblId").table2excel({
            exclude: ".noExl",
            name: "Excel Document Name",
            filename: "SummaryReport-<?= $quiz_name; ?>.xls",
            fileext: ".xls",
            exclude_img: true,
            exclude_links: true,
            exclude_inputs: true
        });
//        var tab_text = '<table border="1px" style="font-size:20px" ">';
//        var textRange;
//        var j = 0;
//        var tab = document.getElementById('tblId'); // id of table
//        var lines = tab.rows.length;
//
//        // the first headline of the table
//        if (lines > 0) {
//            tab_text = tab_text + '<tr bgcolor="#DFDFDF">' + tab.rows[0].innerHTML + '</tr>';
//        }
//
//        // table data lines, loop starting from 1
//        for (j = 1; j < lines; j++) {
//            tab_text = tab_text + "<tr>" + tab.rows[j].innerHTML + "</tr>";
//        }
//        tab_text = tab_text + "</table>";
//        tab_text = tab_text.replace(/<A[^>]*>|<\/A>/g, "");             //remove if u want links in your table
//        tab_text = tab_text.replace(/<img[^>]*>/gi, "");                 // remove if u want images in your table
//        tab_text = tab_text.replace(/<input[^>]*>|<\/input>/gi, "");    // reomves input params
//        // console.log(tab_text); // aktivate so see the result (press F12 in browser)
//
//        var ua = window.navigator.userAgent;
//        var msie = ua.indexOf("MSIE ");
//
//        // if Internet Explorer
//        if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
//            txtArea1.document.open("txt/html", "replace");
//            txtArea1.document.write(tab_text);
//            txtArea1.document.close();
//            txtArea1.focus();
//            sa = txtArea1.document.execCommand("SaveAs", true, "DataTableExport.xls");
//        } else // other browser not tested on IE 11
//            sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));
//
//        return (sa);
    }
</script>

</script>

<?php
$this->load->view('html_end_view');
?>

