<?php $this->load->view('home_header_view'); ?>



<!-- Content Row -->
<div class="container main_container">
    <div class="main_body">
        <div class="row">

            <aside class="col-md-3">
                <!--program menu start -->
                <div class="panel panel-primary border">
                    <h4 class="quickpanelhead quiz_head">Program</h4>
                    <ul id="my_left_accordion" class="my_left_accordion nav nav-pills nav-stacked nav-sidebar">
                        <li class="">
                            <a href="<?php echo(base_url() . "sana-for-school"); ?>">Aptitude Development Program</a>
                        </li>
                    </ul>
                </div>


                <!--news letter inner page-->
                <div id="newsletter">

                    <div class="dooble-border">

                        <div class="well fre_news" style="margin-left: 0;">
                            <h3 id="free_news">Subscribe to our FREE Email Newsletter </h3>
                            <div class="row">
                                <div class="col-md-9" style=" padding: 0 6px 0 15px;">
                                    <div class="input-group">
                                        <form action="<?php echo base_url() . 'subscribNewsLetter/user'; ?>" id="news_letter" method="POST">
                                            <input id="first_name" name="first_name" class="form-control inputbox" placeholder="First Name" type="text" data-validation-required-message="Please enter your first name." required="" aria-invalid="false"/>
                                            <input id="email" name="email" class="form-control inputbox" placeholder="Email" type="email" data-validation-required-message="Please enter your email address." required="" aria-invalid="false"/>

                                            <button type="submit" class="bttn btn btn-primary inputbox"><b>Subscribe</b></button>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-3" style="padding: 8px 9px 0 0;">
                                    <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/' . 'art-of-building.png'); ?>" >
                                </div>
                            </div>

                            <p class="textstyle">Signup for our free email newsletter and get our Art of Building Credibility e-Book FREE as the Subscription bonus<br><br><small class="text-right block"><a href="<?php echo(base_url() . "privacy-policy"); ?>" class="text-right">Our Privacy Policy</a></small></p>
                            <!-- /.input-group -->
                        </div>
                    </div>

                </div>
                <!--news letter inner end-->

            </aside>


            <section class="col-md-9" style="min-height: 395px;">

                <div class="panel">
                    <h1 class="header_text">Course Content</h1>
                </div>

                <img style="width: 848px;" class="img-responsive" src="<?php echo(base_url() . 'assets/img/' . 'Content Aptitude Development Program.jpg'); ?>" ><br>
                <small class="block">Picture Courtesy: Pixabay.com</small>

                <br>
                <h2 class="header_text">Sections Covered in Aptitude Development Program</h2>
                <!-- end col-md-9 -->


                <div class="table-responsive">
                    <table class="table" border="1">
                        <!--<table>-->
                        <tr>
                            <th colspan="2" class="quickpanelhead quiz_head" style="text-align: center;padding: 8px">Quantative Aptitude</th>
                        </tr>
                        <tr>
                            <td style="padding: 8px;text-align: center;text-align: center">Alligations and Mixtures<br>
                                Averages<br>
                                Boats and Streams<br>
                                Clocks and Calendars<br>
                                Compound Interest<br>
                                HCF and LCM of Numbers<br>
                                Height and Distance<br>
                                Logarithms<br>
                                Mensuration<br>
                                Numbers<br>
                                Partnership<br>
                                Percentages<br>
                                Permutation and Combination</td>
                            <td style="padding: 8px;text-align: center">Pipes and Cisterns<br>
                                Probability<br>
                                Problems on Ages<br>
                                Problems on Trains<br>
                                Profit and Loss<br>
                                Ratio and Proportion<br>
                                Simple Interest<br>
                                Simplification<br>
                                Stocks and Shares<br>
                                Surds and Indices<br>
                                Time and Distance<br>
                                Time and Work<br>
                                True and Banker's Discount
                            </td>
                        </tr>

                    </table>
                    <br><br>



                    <table class="table" border="1">
                        <tr>
                            <th colspan="3" class="quickpanelhead quiz_head" style="text-align: center;padding: 8px">Reasoning Aptitude</th>
                        </tr>

                        <tr>
                            <td style="text-align: center;background-color: gray;color: white;padding: 8px">Logical Reasoning</td>
                            <td style="text-align: center;background-color: gray;color: white;padding: 8px">Non–Verbal Reasoning</td>
                            <td style="text-align: center;background-color: gray;color: white;padding: 8px">Verbal Reasoning</td>
                        </tr>
                        <tr>
                            <td style="text-align: center">Blood Relations<br>
                                Coding & Decoding<br>
                                Decision Making<br>
                                Direction Sense<br>
                                Distribution<br>
                                Letter Series<br>
                                Logical Connectives<br>
                                Logical Puzzles<br>
                                Number Analogies<br>
                                Number Series<br>
                                Odd One Out<br>
                                Operators<br>
                                Selections<br>
                                Sequences<br>
                                Sequencing & Arrangements<br>
                                Symbols & Notations<br>
                                Word Analogy</td>
                            <td style="text-align: center">Analogy
                                Classification<br>
                                Completion of Figures<br>
                                Counting of Figures<br>
                                Cubes & Dices<br>
                                Dot Situation<br>
                                Embedded Figures<br>
                                Figure Matrix<br>
                                Formation of Figures<br>
                                Grouping of Figures<br>
                                Input Output<br>
                                Mirror Image<br>
                                Paper Cutting<br>
                                Paper Folding<br>
                                Picture Series<br>
                                Rule Detection<br>
                                Square Completion<br>
                                Venn Diagram<br>
                                Water Image</td>
                            <td style="text-align: center">Assertion & Reason<br>
                                Data Sufficiency<br>
                                Drawing Inference<br>
                                Inserting the missing number<br>
                                Logical Arrangement of Words<br>
                                Sitting Arrangement<br>
                                Situation Reaction Test<br>
                                Statements & Assumptions<br>
                                Syllogism</td>
                        </tr>
                    </table>
                    <br><br>

                    <table class="table" border="1">
                        <th colspan="2" class="quickpanelhead quiz_head" style="text-align: center;padding: 8px">Data Interpretation and Verbal Ability</th>
                        <tr><td style="text-align: center;background-color: gray;color: white;padding: 8px">Data Interpretation</td>
                            <td style="text-align: center;background-color: gray;color: white;padding: 8px">Verbal Ability</td>
                        </tr>
                        <tr>
                            <td style="padding: 8px;text-align: center">Line Charts<br>
                                Pie Charts<br>
                                Table Charts<br>
                                Case Lets<br>
                                Bar charts</td>
                            <td style="padding: 8px;text-align: center">
                                &nbsp;&nbsp;Antonyms<br>
                                &nbsp;&nbsp;Critical Reasoning<br>
                                &nbsp;&nbsp;Spotting Errors<br>
                                &nbsp;&nbsp;One Word Substitutes<br>
                                &nbsp;&nbsp;Spellings<br>
                                &nbsp;&nbsp;Sentence Formation<br>
                                &nbsp;&nbsp;Paragraph Jumbles<br>
                                &nbsp;&nbsp;Closet Test<br>
                                &nbsp;&nbsp;Text Completion<br>
                                &nbsp;&nbsp;Sentence Correction<br>
                                &nbsp;&nbsp;Selecting Words<br>
                                &nbsp;&nbsp;Reading Comprehension<br>
                                &nbsp;&nbsp;Synonyms<br>
                            </td>
                        </tr>
                    </table><br><br>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center"><form>
                            <input class="btn btn-success" type="button" value="Back" onclick="history.go(-1)">
                        </form></div>
                </div>

                <!--</div>-->
            </section>
        </div>

        <?php
        $this->load->view('home_footer');
        ?>
    </div>
</div>

