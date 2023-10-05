<?php $this->load->view('home_header_view'); ?>


<!-- Content Row -->
<div class="container main_container">
    <div class="main_body">
        <div class="row">


            <aside class="col-md-3">
                <?php $this->load->view('ProgramSideView'); ?>
                <?php
                $this->load->view('newsLetterSubscription');
                ?>


            </aside>



            <section class="col-md-9" style="min-height: 395px;">

                <div class="panel">
                    <h1 class="header_text">Self-Assessment and Development Need Analysis (SANA) for Higher Education Students</h1>
                </div>


                <div class="text-justify">
                    <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/' . 'SANA-for-h.jpg'); ?>" ><br>
                    <small class="block">Picture Courtesy: Pixabay.com</small><br>

                    <p>Self-Assessment is the is the process of gathering information about yourself in order to make informed and intelligent Life decisions.</p>
                    <p>Self-Assessment helps you find the right direction for your life. Right direction in life is very important to channelize your efforts and resources. It is very important for Higher Education students to ask themselves the following questions:</p>
                    <ul class="custom">
                        <li>Do I know my needs?
                        <li>Do I know what motivates me?</li>
                        <li>Do I have the right direction in life? Do I have  well defined Goals for my life?</li>
                        <li>Do I have an action plan and the required resources to pursue my Goals?</li>
                        <li>Are my Goals in line with my Values, Skills, Strengths, Attitude, Intelligence mix, and Areas of Improvement?</li>
                        <li>Do I Operate with any Limiting beliefs about Learning, Relationships and about my Capabilities?</li>
                        <li>Do I know what excites me the most and keeps me sleepless?</li>
                        <li>Are my efforts Informed and Channelized? How am I performing in my Endeavours?</li>
                        <li>Do I need to Reengineer myself? What do I need to do to reengineer myself?</li>
                        <li>Do I know the reasons of stress in my life and how well am I coping with that?</li>

                        <li>Am I able to understand others and make myself understood, to get the desired response?</li>
                        <li>How good am I at solving problems? Am I process oriented?</li>
                        <li>How good is my decision making? </li>
                        <li>Do I know what actions I need to take to obtain my first job?</li>
                        <li>Am is prepared for various types of Interviews like Technical, Behavioural, Telephonic etc. </li>
                        <li>Do I respect People and Protocols?</li>
                        <li>Do I know what my Parents, Friends and Professors think about me? </li>

                    </ul><br>
                    <p>All the above mentioned questions ultimately bring out the need of a blue print for life. A blue print for life can also be defined as a Life plan. Self-Assessment forms the base for Life Planning. Life Planning is dynamic activity, in which, you requires constant Aiming and Shooting. This makes Self-Assessment a periodic activity. Self-Assessment frequency completely depends on the agility levels that you define, to be current on knowledge on self. </p>
                    <p>Self-Assessment and Development Need Analysis Program (SANA) will help Higher Education students Learn about their Qualities, find outtheir areas of improvement, understand their Intelligence Mix and External environment around them. Knowledge about their Intelligence Mix will help Higher Education students answer the following questions:</p>
                    <ul class="custom">
                        <li>What is the right career to opt for?</li>
                        <li>What kind of job they should apply for? </li>
                        <li>What type of Intelligence they need to improve to perform better? </li>
                    </ul>
                    <br>
                    <p>Self-Assessment and Development Need Analysis Program (SANA) will help Higher Education students explore information about Self, create action plans for their Areas of Improvement, document all this information on Action Sheets and retrieve it laterfrom the analytics section of www.skillpromise.com in the form of a document titled Self-Assessment Summary Sheet. Please click on the icons below to know more about Self-Assessment and Development Need Analysis Program (SANA).</p>

                    <div class="row">
                        <div class="col-md-4 text-center"><a href="learning-objectives-higher" class="btn btn-warning">Learning Objectives</a></div>
                        <div class="col-md-4 text-center"><a href="program-benefits-higher" class="btn btn-warning">Program Benefits</a></div>
                        <div class="col-md-4 text-center"><a href="course-content-higher" class="btn btn-warning">Course Content</a></div>
                    </div>
                    <hr>
                    <div class="row">

                        <!--<div class="col-md-4 text-center"><a href="my-cart" class="btn btn-success">Add to Cart</a></div>-->

                        <?php
                        $id = 2;
                        $data = $this->main_model->get_records_from_id('packages', $id, "id");
//                        $name = "Self-Assessment and Development Need Analysis Program (SANA) for School Students:";
                        $name = $data["name"];
                        $price = $data["price"];
                        echo '<div class="col-md-4 text-center"><a href="#!" class="btn btn-success">USD 15</a></div>
                        <div class="col-md-4 text-center"><a href="#!" class="btn btn-success">INR ' . $price . '</a></div>';
                        // Create form and send values in 'main/add_cart' function.
                        echo form_open('add_cart');
                        echo form_hidden('id', $id);
                        echo form_hidden('name', $name);
                        echo form_hidden('price', $price);
                        ?>
                        <div class="col-md-4 text-center">
                            <?php
                            $btn = array(
                                'class' => 'btn btn-success',
                                'value' => 'Add to Cart',
                                'name' => 'action'
                            );

                            // Submit Button.
                            echo form_submit($btn);
                            echo form_close();
                            ?>
                        </div>
                    </div>

                </div>
            </section><!-- end col-md-9 -->


        </div>

        <?php
        $this->load->view('home_footer');
        ?>
    </div>
</div>
