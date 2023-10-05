<?php $this->load->view('home_header_view'); ?> 


<!-- Content Row -->
<div class="container main_container">
    <div class="main_body">
        <div class="row">


            <aside class="col-md-3">
            <!--program menu start -->
            <?php $this->load->view('ProgramSideView'); ?>
                <!--news letter inner page-->
               <?php
               $this->load->view('newsLetterSubscription');
               ?>

                
            <!--news letter inner end-->

            </aside>


            
            <section class="col-md-9" style="min-height: 395px;">

                <div class="panel">
                        <h1 class="header_text">e-Newsletter</h1>
                </div> 


                <div class="text-justify"> 
                    <img style="width: 848px;" class="img-responsive" src="<?php echo(base_url() . 'assets/img/' . 'e-Newsletter.jpg'); ?>" ><br>
                    <small class="block">Picture Courtesy: Pixabay.com</small>

                    <br>  
                    <p>We are very pleased to share that we will be sending a FREE e-Newsletter every month to our Subscribers and Registered users.</p>
                    <p>e-Newsletter is our value addition endeavor for our subscribers and registered users. This newsletter will offer the following value adds FREE to our Subscribers every month:</p>
                    <ul class="custom">
                        <li>A career skill write up</li>
                        <li>Tips on Employability</li>
                        <li>Industry Profiles</li>
                        <li>Expert opinions from Academic and Corporate world</li>
                        <li>Lifestyle Articles</li>
                        <li>Information about our new programs and initiatives</li>
                         

                    </ul>
                    <br>
                    <p>Our e-Newsletter will help you enhance your confidence, be better skilled, be more informed and hence, be more SUCCESSFUL</p>
                    <p>e-Newsletter subscribers can download our ‘Art of Building Credibility e-Book’, FREE, as the subscription bonus. We highly recommend you try out our e-Newsletter. We are sure you will find the information valuable and it is a great way for us to keep in touch with each other on important happenings. Maybe you have a family member or friend who may benefit from the information in our e-Newsletter - please share!</p>
                    <p>Our e-Newsletters will also be posted on Skillpromise.com, our Facebook Page and Twitter.</p>
                    <p>We always welcome your feedback as we strive to be your skills partner of Choice!</p>
                    <p>To subscribe to our FREE e-newsletter please provide your name and email address in the box below. Click the subscribe button and follow the instructions to download the ‘Art of building Credibility e-Book’</p>
                    <br>


                    <div class="row">
                        <div class="col-md-6">

                           <?php
               //$this->load->view('newsLetterSubscription');
               ?>
                    </div> 
                    
                </div> 
            </section><!-- end col-md-9 --> 


        </div>
       
<?php
        $this->load->view('home_footer');
        ?>
    </div>
</div>
