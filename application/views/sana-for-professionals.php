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
                    <h1 class="header_text">Self-Assessment and Development Need Analysis (SANA) for Professionals</h1>
                </div>


                <div class="text-justify">
                    <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/' . 'SANA-for-p.jpg'); ?>" ><br>
                    <small class="block">Picture Courtesy: Pixabay.com</small><br>

                    <p>Self-Assessment is the is the process of gathering information about yourself in order to make informed and intelligent Life decisions.</p>
                    <p>Self-Assessment can help to find the right direction for your life, if you are a young professional and if you are a tenured professional then it can help you make the required course corrections for enhanced productivity. It is very important for Professionals to ask themselves the following questions:</p>
                    <ul class="custom">
                        <li>Am I pursuing the right career?</li>
                        <li>Am I open to learning?</li>
                        <li>Am I Coachable?</li>
                        <li>Do I believe in Adding Value and Providing service?</li>
                        <li>Are my skills in line with what is expected out of me at work?</li>
                        <li>Do I live the values of my organization?</li>
                        <li>Do I display highest level of Integrity and Respect at work?</li>
                        <li>What is helping or hampering achievement of my KRA’s, KPI’s, Targets etc.?</li>
                        <li>Are my Goals in line with my Values, Skills, Strengths, and Attitude</li>
                        <li>Do I Operate with any Limiting beliefs about Learning, Relationships and about my Capabilities?</li>
                        <li>Do I take Ownership?</li>
                        <li>Do I know what excites me the most and keeps me sleepless?</li>
                        <li>Are my efforts Informed and Channelized? How am I performing in my Endeavours?</li>
                        <li>Do I need to Reengineer myself? What do I need to do to reengineer myself?</li>
                        <li>Am I aware of the professional enhancements, that I need equip myself with, to achieve my career objectives?</li>
                        <li>Do I have a well-defined Short term, Mid-term and Long term career plan?</li>


                    </ul><br>
                    <p>All the above mentioned questions ultimately bring out the need of a Blue print for  life. A blue print for life can also be defined as a Life plan. Self-Assessment forms the base for Life Planning. Life Planning is dynamic activity, in which, you requires constant Aiming and Shooting. This makes Self-Assessment a periodic activity. Self-Assessment frequency completely depends on the agility levels that you define, to be current on knowledge on self.</p>

                    <p>Self-Assessment and Development Need Analysis Program (SANA)  will help Professionals learn about their Qualities, find outtheir areas of improvement, and External environment around them</p>
                    <p>Self-Assessment and Development Need Analysis Program (SANA) will help Professionals explore information about Self, create action plans for their Areas of Improvement, Document all this informationon Action Sheets and retrieve it later in a consolidated report called Self-Assessment Summary Sheet. Please click on the icons below to know more about Self-Assessment and Development Need Analysis Program (SANA).</p>

                    <div class="row">
                        <div class="col-md-4 text-center"><a href="learning-objectives-professional" class="btn btn-warning">Learning Objectives</a></div>
                        <div class="col-md-4 text-center"><a href="program-benefits-professional" class="btn btn-warning">Program Benefits</a></div>
                        <div class="col-md-4 text-center"><a href="course-content-professional" class="btn btn-warning">Course Content</a></div>
                    </div>
                    <hr>
                    <!--                    <div class="row">
                                            <div class="col-md-4 text-center"><a href="#!" class="btn btn-success">USD 15</a></div>
                                            <div class="col-md-4 text-center"><a href="#!" class="btn btn-success">INR 999</a></div>
                                            <div class="col-md-4 text-center"><a href="my-cart" class="btn btn-success">Add to Cart</a></div>
                                        </div>-->
                    <div class="row">

                        <!--<div class="col-md-4 text-center"><a href="my-cart" class="btn btn-success">Add to Cart</a></div>-->

                        <?php
                        $id = 1;
                        $data = $this->main_model->get_records_from_id('packages', $id, "id");
//                        $price = 999.00;
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
