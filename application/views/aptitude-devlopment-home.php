<?php $this->load->view('home_front_view');

?>

<!-- Content Row -->
<div class="container main_container">
    <div class="main_body">
        <div class="row">


            <aside class="col-md-3">
                <?php
                $this->load->view('ProgramSideView');
                ?>
                <br>
                <?php
                $this->load->view('newsLetterSubscription');
                ?>

            </aside>


            <section class="col-md-9" style="min-height: 395px;">

                <div class="panel">
                    <h2 class="header_text">Employee Readiness Programs Management</h2>
                </div>

                <div class="text-justify">
                    <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/' . 'aptitude_devlopment_home.jpg'); ?>" ><br>
                    <small class="block">Picture Courtesy: www.Pixabay.com</small><br>
                    <p>An Aptitude Assessment is a systematic means of testing a candidate's abilities to perform specific tasks and react to a range of different situations. Aptitude tests are not only used by employers to measure a candidate's work-related cognitive capacity but they are also used by Management colleges to access MBA aspirants. Aptitude tests are one of the most commonly used assessments in measuring candidates’ suitability for a role or for an academic course. The most commonly used set of cognitive tests includes – Abstract/Conceptual Reasoning, Verbal Reasoning, Data Interpretation and Numerical/ Quantitative reasoning. The tests have a standardized method of administration and scoring, with the results quantified and compared with all other test takers</p>
                    <h3 class="header_text">What do Aptitude Assessments measure?</h3>
                    <p>Aptitude tests can typically be grouped according to the type of cognitive ability they measure:</p>
                    <h3 class="header_text">Fluid Intelligence</h3>
                    <p>Fluid intelligence is the ability to think and reason abstractly, effectively solve problems and think strategically. It’s more commonly known as ‘street smarts’ or the ability to ‘quickly think on your feet’. Examples of what employers can learn from your fluid intelligence about your suitability for the role you are applying</p>
                    <h3 class="header_text">Crystallized Intelligence</h3>
                    <p>Crystallized intelligence is the ability to learn from past experiences and to apply this learning to work-related situations. Work situations that require crystallized intelligence include producing and analyzing written reports, comprehending work instructions, using numbers as a tool to make effective decisions, etc.</p>

                    <h3 class="header_text">What Aptitude Tests tell Companies about a Candidate</h3>
                    <ul class="custom">
                        <li>Ability to solve Problems</li>
                        <li>The ability to analyze situations</li>
                        <li>The ability to reason</li>
                        <li>The ability to think logically</li>
                        <li>To take decisions based on data</li>
                        <li>To take decisions based on past trends</li>
                        <li>Ability to understand graphs, tables and charts</li>
                        <li>The ability to comprehend written and verbal communication</li>
                        <li>The ability to communicate well (verbal and written)</li>
                        <li>Language and Grammar skills</li>
                        <li>The ability to write coherently</li>
                        <li>Basic numeric skills</li>
                        <li>The ability to learn new things quickly</li>
                        <li>The ability to detect patterns and establish relationships</li>
                        <li>The ability to plan and strategize</li>
                        <li>The ability to comprehend complex issues</li>
                        <li>The ability to detect patterns and establish relationships</li>
                        <li>The ability to visualize</li>
                        <li>The ability to concentrate without getting distracted</li>
                        <li>The use of working memory</li>
                        <li>Attention to Detail</li>
                    </ul><br>


                    <div class="row">
                        <div class="col-md-4 text-center"><a href="learning-objectives-school" class="btn btn-warning">Learning Objectives</a></div>
                        <div class="col-md-4 text-center"><a href="program-benefits-school" class="btn btn-warning">Program Benefits</a></div>
                        <div class="col-md-4 text-center"><a href="course-content-school" class="btn btn-warning">Course Content</a></div>
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
                        $id = $ids;
                        $data = $this->main_model->get_records_from_id('packages', $id, "id");
//                        echo "<pre>";
//                        print_r($data);
//                        die;
//                        $name = "Self-Assessment and Development Need Analysis Program (SANA) for School Students:";
                        $name = $data["name"];
                        $price = $data["price"];
                        $product_image = base_url($data["image_file"]);
                        $package = $this->main_model->get_name_from_id('package_master', 'name', $data['package_master_id'], 'id');
                        echo '
                        <div class="col-md-4 text-center"><a href="#!" class="btn btn-success">INR ' . $price . '</a></div>';
                        // Create form and send values in 'main/add_cart' function.
                        echo form_open('add_cart');
                        echo form_hidden('id', $id);
                        echo form_hidden('name', $name);
                        echo form_hidden('program_type', 'normal');
                        echo form_hidden('package_name', $package);
                        echo form_hidden('product_image', $product_image);
                        echo form_hidden('price', $price);
                        ?>
                        <div class="col-md-4 text-center"></div>
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
<br>
        <?php
        $this->load->view('home_footer');
        ?>
    </div>
</div>