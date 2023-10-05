<?php $this->load->view('home_header_view'); ?> 


<!-- Content Row -->
<div class="container main_container">
    <div class="main_body">
        <div class="row">


            <aside class="col-md-3">
            <!--program menu start -->
            <div class="panel panel-primary border">
                <h4 class="quickpanelhead quiz_head">Programme</h4>
                <ul id="my_left_accordion" class="my_left_accordion nav nav-pills nav-stacked nav-sidebar">
                    <li class="">
                        <a href="#!">Self Assessment and Development Need Analysis (SANA) for Higher Education Students</a>
                    </li> 
                    <li class="">
                        <a href="#!">Self Assessment and Development Need Analysis (SANA) for Professionals</a>
                    </li> 
                    <li class="">
                        <a href="#!">Self Assessment and Development Need Analysis (SANA) for School Students</a>
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
                        <h1 class="header_text">Essentials of Employability</h1>
                </div> 


                <div class="text-justify">
                    <p class="para18">
                        Employability is the ability of a person to do Intelligent Self-Assessment with an objective of exploring personal assets (Skills, Values, Strengths, motivations etc.), explore opportunities in the market, make informed career related decisions, identify and bridge training gaps in terms of assets required for the desired jobs and current inventory of personal assets, create a compelling action plan (Effective resume, Covering letter, Preparation for Personal Interview etc.), Gain the first employment, ensure self-development throughout professional career, grow in an organization and gain subsequent employments.
                    </p>
                    <img style="width: 848px;" class="img-responsive" src="<?php echo(base_url() . 'assets/img/' . 'wc.jpg'); ?>" >

                    <br>   
                        <h5 class="sub-title">What are Employability Skills?</h5>
                        <p>Employability skills have been defined as: "A set of achievements, understandings and personal attributes that make individuals more likely to gain employment and to be successful in their chosen occupations". Following are basic qualities/ skills required to be Employable:</p>
                        <ul class="custom">
                            <li>Desire to Learn</li>
                            <li>Coach ability</li>
                            <li>Desire to Contribute</li>
                            <li>Ability to Innovate</li>
                            <li>Integrity</li>
                            <li>Physical Fitness</li>
                            <li>Respect for Protocol</li>
                            <li>Process Orientation</li>
                            <li>Problem Solving</li>
                            <li>Analytical Skills</li>
                            <li>Interpersonal Skills</li>
                            <li>Communication Skills</li>
                            <li>Domain Skills</li>
                            <li>Planning and Organizing Skills</li> 
                        </ul>
                        <br>
                        <h5 class="sub-title">Employability Scenario in India</h5>
                        <p>Employability is a huge challenge our education system is facing today. Employability is a huge challenge our education system is facing today. According to NSS, only 25% of Engineers, 22% of MBA’s and only 10-15% of college graduates are employable. Only 17.91% of engineers are employable for the software services sector, 3.67% for software products and 40.57% for a non-functional role such as Business Process Outsourcing (Source: National Employability Report, Engineers by Aspiring Minds.)</p>
                        <br>
                        <h5 class="sub-title">Employability Essentials</h5>
                        <p>Following are the key Employability Essentials:</p>
                        

                        <ul class="custom green">
                            <li>Ability to do Accurate Self-Assessment
                            <li>Ability to take Informed Decisions</li>
                            <li>Ability to create a SMART Plan of Action</li>
                            <li>Ability to Gain the first Employment </li>
                            <li>Ability to Perform Well and Grow</li>
                            <li>Ability to Ensure self-development </li>
                            <li>Ability to Gain subsequent employment with other companies in the same industry or a different industry</li>

                        </ul>

                        <br>
                        <p>Let us understand these Employability Essentials one by one</p>
                        

                        <h5 class="sub-title text-underline">Ability to do Accurate Self-Assessment</h5>
                        <p>
                            This is also referred to as ability to reflect. The quality of your reflection depends largely on your Intrapersonal Intelligence. You Reflection skills will help you do the following:
                        </p>
                        <h5 class="sub-sub-title">Self-Assessment</h5>
                        <p>To explore personal assets like Skills, Values, Motivations, Strengths, and Areas of Improvement etc.</p>
                        <h5 class="sub-sub-title">Academic Assessment</h5>
                        <p>This is relevant for First Job Seekers. This refers to assessment of Domain Knowledge, Quantitative Aptitude, Reasoning, General Awareness etc. Once you are aware of the gaps, you can create an action plan</p>
                        <h5 class="sub-sub-title">Market Assessment</h5>
                        <p>This is relevant for First Job Seekers and experienced professionals. This refers to assessment of Industry, Companies, Departments, Compensation etc. </p>
                        <h5 class="sub-title text-underline">Ability to take Informed Decisions</h5>
                        <p>Your Assessment of Self and Market will unearth a lot of data for you. This data will provide you with all the necessary base you need to make informed decisions. Your Intuition also plays a major role in your decision making</p>
                        <h5 class="sub-title text-underline">Ability to create a SMART Plan of Action</h5>
                        <p>If you are a First Job Seeker or experienced professional then, post decision making, you would like to take the following actions:</p>
                        <ul class="custom">
                            <li>Create a convincing CV</li>
                            <li>Post CV on Job sites with a good Covering Note</li>
                            <li>Identify Consultants who recruit for companies you are interested in. Share your CV with them</li>
                            <li>Study Job Description</li>
                            <li>Create Resume and Cover Letter in line with the Job Requirement</li>
                            <li>Preparation as per the selection procedure in terms of Written Test, Group Discussions, Personal Interview etc.</li>
                        </ul>
                        <h5 class="sub-title text-underline">Ability to Gain the first Employment </h5>
                        <p>This refers to your ability to get employment in the desired industry, company, department, role and salary</p>
                        <h5 class="sub-title text-underline">Ability to Perform Well and Grow</h5>
                        <p>This refers to your ability to meet/ exceed your Targets, KPI’s, KRA’s, adhere to systems/ processes, display required skills and successful people management (Peers, Subordinates, Seniors, Stakeholders, Vendors, Clients etc.)</p>

                        <p>It also refers to your ability to get promoted to the next level with more responsibility in terms of Territory, Team size and Revenue
                        </p>
                        <h5 class="sub-title text-underline">Ability to Ensure self-development </h5> 
                        <p>
                            This refers to your ability to: 
                        </p>
                        <ul class="custom"> 
                            <li>Acquire skills required for the assigned role</li> 
                            <li>Acquire knowledge of Company Products, Competition, Systems, Processes and People</li>
                            <li>Improvise on areas of improvement</li>
                        </ul>
                        <h5 class="sub-title text-underline">Ability to Gain subsequent employment with other companies in the same industry or a different industry</h5>
                        <p>This refers to your ability to gain employment in another company at the same level or higher level. This means that you are capable of convincing another company about your capabilities and how you can add value to them</p>

                    
                </div> 
            </section><!-- end col-md-9 --> 


        </div>
       
<?php
        $this->load->view('home_footer');
        ?>
    </div>
</div>