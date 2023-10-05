<?php $this->load->view('home_header_view'); ?>
<br><br>
<div class="container main_container">
    <div class="main_body">
        <div class="row">


            




            <section class="col-md-12" style="min-height: 395px;">

                <div class="panel">
                    <h1 class="header_text" style="font-size:30px">How are You feeling today ?</h1>
                    <!--<hr style="height:1px;background-color:black;">-->
                </div>


                <div class="text-justify" style="">
                   
                   <p class="para18">
                      Wellness is defined as the active pursuit of activities, choices and lifestyles that lead to a state of holistic health

                    </p>
                   
                    <img style="width:100%;" class="img-responsive" src="<?php echo(base_url() . 'assets/img/' . 'Wellness1.jpeg'); ?>" >
                  
                    <br>
                    <!--<p class="para18">-->
                    <!--“Wellness is a state of complete physical, mental, and social well-being, and not merely the absence of disease or infirmity.” – The World Health Organization.-->
                    <!--</p>-->
                    <blockquote>
                        Health is a state of body. Wellness is a state of being		 


                        <small class="text-right" style="float:right"><em> J. Stanford
</em></small>
                    </blockquote>
                    <!--<br>-->
                    <!--<p style="text-align: justify; "><span style="font-size: 14px;">-->
                    <!--Wellness is an active process of becoming aware of and making choices towards a healthy life.&nbsp;&nbsp;-->
                    <!--It is more than being free from illness</span></p>-->
                    <!--<p style="text-align: justify;"><span style="font-size: 14px;">A person’s age, size, shape or look is secondary. &nbsp;It is wellness that defines quality of life. -->
                    <!--Our wellness determines how we ultimately look, feel, interact with others and thrive in life and work</span></p>-->
                    <!--<p style="text-align: justify;"><span style="font-size: 14px;">It is absolutely crucial to maintain optimal level of wellness to live a higher quality life. Wellness is very important because everything we do and every emotion we feel relates to our well-being. In turn, our wellness levels directly affect our actions and emotions. -->
                    <!--Therefore, optimal wellness in essential to reduce stress and reduce the risk of illness</span></p>-->
                    <!--<p style="text-align: justify;"><span style="font-size: 14px;">This section will cover-->
                    <!-- the following dimensions of Wellness:</span></p>-->
                    <!-- <ul><li style="text-align: justify;">-->
                    <!-- <span style="font-size: 14px;">Physical Wellness</span></li>-->
                    <!-- <li style="text-align: justify;"><span style="font-size: 14px;">Intellectual Wellness</span></li>-->
                    <!-- <li style="text-align: justify;"><span style="font-size: 14px;">Emotional Wellness</span></li>-->
                    <!-- <li style="text-align: justify;"><span style="font-size: 14px;">Environmental Wellness</span></li><li style="text-align: justify;"><span style="font-size: 14px;">Financial Wellness</span></li><li style="text-align: justify;"><span style="font-size: 14px;">Occupational Wellness</span></li><li style="text-align: justify;"><span style="font-size: 14px;">Social Wellness</span></li>-->
                    <!-- <li style="text-align: justify;"><span style="font-size: 14px;">Spiritual&nbsp;Wellness</span></li></ul>-->
     
                    <!--<br>-->


                </div>
           

                <div class="row">
                    <div class="col-md-12">


                        <form id="mainForm" enctype="multipart/form-data" class="form-horizontal" role="form" action="<?php echo base_url() . 'set_data_home_wellness'; ?>" method="POST">

                            <!--<div> <?php echo $instruction; ?></div>-->
                            <div>
                                <h2>
                                    Instructions for WELLNESS Assessment Sheet

                                </h2><br>
                                <ul style="padding-left:15px;">
                                    <li style="font-size:14px;">
                                        For each statement, click the button in the column that best describes you. Please answer questions as you actually are (rather than how you think you should be), and don't worry if some answer makes you feel that you might score less.
                                    </li><br>
                                    <li style="font-size:14px;">
                                        Choose the option that is most relevant to you from the following options - Strongly Agree (SA)/ Agree (A)/ Neither Agree nor Disagree (NAND)/ Disagree (D)/ Strongly Disagree (SD)

                                    </li><br>
                                    <li style="font-size:14px;">
                                        When you are finished, please click the “Submit” button at the bottom of the assessment to get your WELLNESS Assessment Score

                                   </li><br>
                                    <li  style="font-size:14px;">
                                        Your assessment score will be on the following components of Wellness – Physical, Intellectual, Emotional, Financial, Environment, Social and Spiritual. Get to know more about Wellness in the Self-Assessment program, which is further a part of the INTERVIEW READINESS PROGAM

                                    </li>
                                </ul><br><br>
                            </div>
                            <input type="hidden" value="<?php echo $sheet_id; ?>" name="sheet_id">
                            <input type="hidden" value="<?php echo $sheet_section_id; ?>" name="sheet_section_id">


                            <div class="panel panel-default">
                                <div class="table-responsive" style="color: black">
                                    <table class="table table-bordered" style="color: black" id="">
                                        <thead>

                                            <tr style="background-color:#f27052; color: #ffffff; border-color: #fff;">
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
                                    <button type="submit" value="0" name="draft"  style="border: 2px solid #ff7043;
    color: #ff7043;
    background-color: #fff;
    padding: 10px 25px;
    border-radius: 30px;
    font-weight: bold;
    text-transform: uppercase;cursor: pointer;
    text-decoration: none;
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    transition: all 0.5s ease;">Submit</button>
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