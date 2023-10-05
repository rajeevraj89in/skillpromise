<?php $this->load->view('home_header_view'); ?>
<br><br> 
<div class="container main_container">
    <div class="main_body">
        <div >


            




            <section  style="min-height: 395px;">

                <div class="panel">
                    <h1 class="header_text">How good are your CREDIBILITY BUILDING Skills?</h1>
                    <!--<hr style="height:1px;background-color:black;">-->
                </div>


                <div class="text-justify">
                    <p class="para18">
                        Building credibility is creating an environment of harmony, consonance, agreement, or accord through carefully planned and executed activities that encourage this result.
                    </p>
                    <img style="width:100%;" class="img-responsive" src="<?php echo(base_url() . 'assets/img/' . 'hand-sec.jpg'); ?>" >

                    <br>
                    <blockquote>
                        The ability to establish, grow, extend and restore trust is the key professional and personal competency of our time

                        <small class="text-right" style="float:right"><em>Stephan Covey</em></small>
                    </blockquote>
                    


                </div>
           

                <div class="row">
                    <div class="col-md-12">


                        <form id="mainForm" enctype="multipart/form-data" class="form-horizontal" role="form" action="<?php echo base_url() . 'set_data_home'; ?>" method="POST">

                            <!--<div> <?php echo $instruction; ?></div>-->
                            <div>
                            <h2>
                                   Instructions for CREDIBILITY BUILDING Assessment

                                </h2><br>
                                <ul style="padding-left:15px;">
                                    <li  style="font-size:14px;">
                                        For each statement, click the button in the column that best describes you. Please answer questions as you actually are (rather than how you think you should be), and don't worry if some answer makes you feel that you might score less.

                                    </li><br>
                                    <li style="font-size:14px;">
                                        Choose the option that is most relevant to you from the following options - Strongly Agree (SA)/ Agree (A)/ Neither Agree nor Disagree (NAND)/ Disagree (D)/ Strongly Disagree (SD)


                                    </li><br>
                                    <li style="font-size:14px;">
                                        When you are finished, please click the “Submit” button at the bottom of the assessment to get your CREDIBILITY BUILDING Assessment Score


                                    </li><br>
                                    <li style="font-size:14px;">
                                       Your assessment score will be on the four techniques of Building Credibility – Properness, Nobleness, Explore common ground and Competence. Get to know about these techniques in detail by signing up for our free email newsletter and get ‘Art of Building Credibility e-Book’ FREE as the Subscription bonus

                                    </li>
                                </ul><br>
                            </div>
                            <input type="hidden" value="<?php echo $sheet_id; ?>" name="sheet_id">
                            <input type="hidden" value="<?php echo $sheet_section_id; ?>" name="sheet_section_id">


                            <div class="panel panel-default">
                                <div class="table-responsive" style="color: black">
                                    <table class="table table-bordered" style="color: black" id="">
                                        <thead>

                                            <tr style="background-color:#f27052; color:white;">
                                                <?php
                                                echo'<th class="text-center unbold" style="width:7%;">S. No.</th>';
                                                foreach ($headerName as $header) {
                                                    echo'<th class="text-center unbold">' . $header['header_name'] . '</th>';
                                                }
                                                ?>
                                            </tr>
                                        </thead>
                                        </tbody>
                                        <?php
                                        foreach ($question_data as $k => $val) {
                                            echo'<tr class="text-center"><td>' . ($k + 1) . '</td><td class="text-left" id=' . $val['id'] . '>' . $val['name'] . '</td>';
                                            echo'<input type="hidden" name="items[' . $k . '][question_id]" value=' . $val['id'] . ' >';
                                            foreach ($headerName as $k2 => $val_header) {
                                                if ($val_header['header_type'] == 'option_header') {
                                                    echo '<td id=' . $val_header['id'] . ' class="text-center"><input type="radio"  name="items[' . $k . '][option_id]" value=' . $val_header['id'] . ' ></td>';
                                                }
                                            }
                                            echo '</tr>';
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-3">
                                    <button type="submit" value="0" name="draft" class="btn btn-success" style="border: 2px solid #ff7043;
                                        color: #ff7043;
                                        background-color: #fff;
                                        padding: 10px 25px;
                                        border-radius: 30px;
                                        font-weight: bold;
                                        text-transform: uppercase;">Submit</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </section>




           
        </div>
    </div>
</div>
 <?php $this->load->view('home_footer'); ?>