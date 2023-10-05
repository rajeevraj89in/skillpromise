<?php $this->load->view('home_front_view');

?>

<div class="container">
	<div class="row mt-5">
		<div class="col-md-4">
			
				<div class="program-video-tour mb-2">
					<video style="width:100%;" controls="" autoplay="" muted="" playsinline="">
					  <source src="http://www.skillpromise.co/assets/img/program/video_skillpromise.mp4" type="video/mp4">
					  
					  Your browser does not support the video tag.
					</video>
				</div>
			
			<div class="card card-program-details">
				<div class="card-header text-center">
					<a href="#" data-toggle="modal" data-target="#program_details"><h3>Program Details</h3></a>
				</div>	
				<div class="card-body">
					<div class="price">₹ <?php echo $price = ($package_feature=='normal')?$package->price:$package->price_plus;  ?></div>
					<div class="row grid-5 mb-3">
						<div class="col-6">
						    <?php 
							    echo form_open('add_cart', array('id' => 'add-to-cart-form'));
								echo form_hidden('id', $package->id);
								echo form_hidden('name', $package->name);
								echo form_hidden('program_type', $package_feature);
								echo form_hidden('price', $price);
								echo form_submit(
								       array(
											'class' => 'btn btn-orange btn-block',
											'value' => 'Add to Cart',
											'name' => 'action'
										)
							       );
                                echo form_close();
							?>
							<script>
							$(document).ready(function(){
							  $('#add-to-cart-form').submit(function(e){
								  e.preventDefault();
								  $.ajax({
									  url: "/add_cart",
                                      type: 'POST',									  
                                      data: $("#add-to-cart-form").serialize(),
									  success: function(result){
									      if(result=='1'){
											  //alert('Item added to cart successfully.');
											  $('#message-boxd').html('<div class="alert alert-success">Item added to cart successfully.</div><a href="/checkout" class="btn btn-success pull-right">Proceed to Checkout</a>'); 
										  }
										  else{
											  //alert('Add to cart failed.');
											  $('#message-boxd').html('<div class="alert alert-danger">Item add to cart failed.</div>');
										  }
										  $('#message-boxd-modal').modal('show');
								      }
								  });
							  });
						    });
							</script>
						</div>
						<div class="col-6">
						    <?php 
							    echo form_open('add_cart', array('id' => 'buy-now-form'));
								echo form_hidden('id', $package->id);
								echo form_hidden('name', $package->name);
								echo form_hidden('program_type', $package_feature);
								echo form_hidden('price', $price);
								echo form_submit(
								       array(
											'class' => 'btn btn-green btn-block',
											'value' => 'Buy Now',
											'name' => 'action'
										)
							       );
                                echo form_close();
							?>
						</div>
					</div>
					
					<div class="course-includes">
						<h4>This Course Includes:</h4>
						<?php echo $program_benefits = ($package_feature=='normal')?$package->program_benefits:$package->program_benefits_plus;  ?>
						
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<header class="header-title black-bg">
				<?php echo $heading = ($package_feature=='normal')?$package->heading:$package->heading_plus;  ?>
				<div class="row">
					<div class="col-md-6"><span>Last Updated: <?php echo date('F d, Y', strtotime($package->modify_date) );  ?>  </span></div>
					<div class="col-md-6"><span class="english-icon"><img src="<?php echo(base_url() . 'assets/img/' . 'english.jpg'); ?>" /></span>English</div>
				</div>
			</header>
			
			<div class="card learning-card">
				<div class="card-body">
					<h3>Learning Objectives</h3>
					<?php echo $learning_objectives = ($package_feature=='normal')?$package->learning_objectives:$package->learning_objectives_plus;  ?>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div id="message-boxd-modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">&nbsp;</h4>
		<button type="button" class="close pull-right"  data-dismiss="modal">&times;</button>
      </div>
      <div id="message-boxd" class="modal-body">
        <p >&nbsp;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div class="container">

        <?php
        $this->load->view('home_footer');
        ?>
    </div>



<div class="modal fade" id="program_details" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">
      <!--<div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Program Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>-->
      <div class="modal-body">
	  
		
		<div class="row align-items-center justify-content-center">
			<div class="col-md-6">
				<ul class="nav nav-tabs program-tab" id="myTab" role="tablist">
				  <li class="nav-item">
					<a class="nav-link active" id="home-tab" data-toggle="tab" href="#interview-preparation-program">Placement PREP Program</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" id="profile-tab" data-toggle="tab" href="#interview-preparation-program-plus">Placement PREP Program PLUS</a>
				  </li>
				</ul>
				<div class="tab-content" id="myTabContent">
				  <div class="tab-pane fade show active" id="interview-preparation-program" role="tabpanel" aria-labelledby="home-tab">
					<div class="program-details-slider owl-carousel owl-theme">
					<div class="item">
						<div class="program-slider green-bg">
							<div class="program-name">Placement <br> PREP <br>Program</div>
							<div class="program-img">
								<figure>
									<img src="<?php echo(base_url() . 'assets/img/program/' . 'get_job_ready.png'); ?>" />
									<figcaption>Get Job Ready</figcaption>
								</figure>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="program-slider green-bottom ">
							<figure><img src="<?php echo(base_url() . 'assets/img/program/' . 'interview-preparation-program.jpg'); ?>" /></figure>
							
							<div class="content broun-content p-m-12" style="padding:0 15px;">
								<p><strong>Placement PREP Program</strong> is a carefully crafted, incisive online program. This program helps you equip yourself with the science and art that goes behind acing your job interview</p>
								<p><strong>Placement PREP Program</strong> provides you with Strategic and Tactical inputs on various components of the selection process like Aptitude Assessment, Guesstimation problems, Case Study Analysis, Group Discussions, Extempore, Essay Writing, Self-Assessment, Employment Documentation and Personal Interview</p>
								<p><strong>Placement PREP Program</strong> offers Value Adds like an Assessment Centre, Blog, Dashboard for performance management and a resource center, to help you optimize your learning and realize your full potential</p>
								<p class="border-style">Let us take a quick look at the <strong>CONCEPT OF EMPLOYABILITY and EMPLOYABILITY SCENARIO IN INDIA</strong> before getting into details of the Placement PREP Program</p>
							</div>
							
						</div>
					</div>
					<div class="item">
						<div class="program-slider green-bg">
							<div class="program-name">Placement <br> PREP <br>Program</div>
							<div class="program-img">
								<figure>
									<img src="<?php echo(base_url() . 'assets/img/program/' . 'what-is-employability.jpg'); ?>" />
									<figcaption>What is Employability?</figcaption>
								</figure>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="program-slider green-bottom what-is-employabilityslider">
							<figure><img src="<?php echo(base_url() . 'assets/img/program/' . 'what-is-employability-banner.jpg'); ?>" /></figure>
							<div class="program-name">What is Employability?</div>
							<div class="content broun-content">
								<p><strong>Your Employability</strong> is your Ability to do accurate assessment which includes Self-Assessment in terms of your key Skills, Values, Areas of improvement etc., Academic assessment in terms of Marks/ CGPA obtained and domain knowledge and Industry assessment in terms of Industries of choice, companies of choice, departments of choice and roles of choice</p>
								<p><strong>Your Employability </strong> is your Ability to effectively deal with ambiguity in the job market and take informed decisions. This means that you can accurately identify the Industry, Company and Department of your interest, you can accurately identify the job opportunities that match with your education and personality attributes</p>
								<p><strong>Your Employability</strong> is your ability to make a smart action plan in terms of preparation for various components of the interview process like Aptitude assessment, Guesstimation, Curriculum Vitae, Cover Letter, Case Study Analysis, Group discussion, Extempore, Essay Writing and Personal Interview</p>
								<p><strong>Your Employability</strong> is your ability to gain the first and subsequent employment in the desired industry, company, department & role  at the desired compensation</p>
							</div>
							
						</div>
					</div>
					<div class="item">
						<div class="program-slider green-bg">
							<div class="program-name">Placement <br> PREP <br>Program</div>
							<div class="program-img">
								<figure>
									<img src="<?php echo(base_url() . 'assets/img/program/' . 'employability-scenario-in-india.jpg'); ?>" />
									<figcaption>Employability Scenario <br> in India</figcaption>
								</figure>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="program-slider green-content-box-height">
							
							<div class="program-name">Employability Scenario in <br><strong>INDIA</strong></div>
							<div class="content broun-content">
								<table class="table table-striped">
									<thead>
										<tr>
											<th>Year</th>
											<th>2015</th>
											<th>2016</th>
											<th>2017</th>
											<th>2018</th>
											<th>2019</th>
											<th>2020</th>
											<th>2021</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<th>B.E./ B.Tech.</th>
											<td>54.00%</td>
											<td>52.58%</td>
											<td>50.69%</td>
											<td>51.52%</td>
											<td>57.09%</td>
											<td>49%</td>
											<td>46.82%</td>
										</tr>
										<tr>
											<th>MBA</th>
											<td>43.99%</td>
											<td>44.56%</td>
											<td>42.28%</td>
											<td>39.40%</td>
											<td>36.44%</td>
											<td>54%</td>
											<td>46.59%</td>
										</tr>
										<tr>
											<th>B.A</th>
											<td>29.82%</td>
											<td>27.11%</td>
											<td>35.66%</td>
											<td>37.39%</td>
											<td>29.30%</td>
											<td>48%</td>
											<td>42.72%</td>
										</tr>
										<tr>
											<th>BCom</th>
											<td>26.45%</td>
											<td>20.58%</td>
											<td>37.98%</td>
											<td>33.93%</td>
											<td>30.06%</td>
											<td>47%</td>
											<td>40.30%</td>
										</tr>
										<tr>
											<th>B.Sc.</th>
											<td>38.41%</td>
											<td>35.24%</td>
											<td>31.76%</td>
											<td>33.62%</td>
											<td>47.37%</td>
											<td>34%</td>
											<td>30.34%</td>
										</tr>
										<tr>
											<th>MCA</th>
											<td>45.00%</td>
											<td>39.81%</td>
											<td>31.36%</td>
											<td>43.85%</td>
											<td>43.19%</td>
											<td>25%</td>
											<td>22.42%</td>
										</tr>
										<tr>
											<th>ITI</th>
											<td>44.00%</td>
											<td>40.90%</td>
											<td>42.22%</td>
											<td>29.46%</td>
											<td>NA</td>
											<td>NA</td>
											<td>NA</td>
										</tr>
										<tr>
											<th>Polytechnic</th>
											<td>10.14%</td>
											<td>15.89%</td>
											<td>25.77%</td>
											<td>32.67%</td>
											<td>18.05%</td>
											<td>32%</td>
											<td>25.02%</td>
										</tr>
										<tr>
											<th>B.Pharma</th>
											<td>56.00%</td>
											<td>40.62%</td>
											<td>42.30%</td>
											<td>47.78%</td>
											<td>36.29%</td>
											<td>45%</td>
											<td>37.24%</td>
										</tr>
									</tbody>
								</table>
								<p class="source-text">Source: Wheebox India Skills Report 2021</p>
							</div>
							<div class="green-bg-content">
								<p>Employment percentage of fresh Graduates is VERY LOW and ranges between <strong>22.42 to 46.82</strong> in 2021 which includes graduates who are underemployed (Not in the right role, not at the right package, not at the right designation and not in the right company)</p>
								<p>Employers want to see specific skills and behaviors <strong>BEFORE</strong> they hire people. If you <strong>CAN’T</strong> demonstrate you have these skills and behaviors, you may NEVER get placed in the job you want </p>
								<p>Let us understand with the help of <strong>BOTTLES & FUNNEL CONCEPT<sup>TM</sup></strong> of Employability, how Skillpromise will help you be successful in <strong>JOB INTERVIEW</strong></p>
							</div>
							
						</div>
					</div>
					<div class="item">
						<div class="program-slider green-bg">
							<div class="program-name">Placement <br> PREP <br>Program</div>
							<div class="program-img">
								<figure>
									<img src="<?php echo(base_url() . 'assets/img/program/' . 'bottles-and-funnel.jpg'); ?>" />
									<figcaption>Bottles and Funnel  <br> Concept<sup>TM</sup></figcaption>
								</figure>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="program-slider green-content-box-height-bottel">
							<div class="program-name2 text-center " style="font-weight:600;">Skillpromise Bottles & Funnel Concept<sup>TM</sup>  <span>of Employability</span></div>
							<figure class="bottles-img mt-4"><img src="<?php echo(base_url() . 'assets/img/program/' . 'skillpromise-bottles.jpg'); ?>" /></figure>
							<div class="green-bg-content">
								<p>Placement PREP Program is based on the <strong>Skillpromise Bottles & Funnel Concept<sup>TM</sup></strong>. In this concept, Employer and the Candidate are represented by bottles and the funnel represents the Interview Process that the candidate needs to go through for selection in the company. Skillpromise prepares you on all the components of the selection process represented by the funnel. Skillpromise helps you explore information about yourself through an incisive Self – Assessment program and helps you present this information in such a manner that you are able to highlight your qualities that match will Employer’s requirement. This way you are able to present yourself as the <strong>RIGHT FIT</strong> for the job. </p>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="program-slider p-0">
							<div class="program-name2 text-center m-0" style="font-weight:600; line-height:1.1; padding:8px 0 5px;">Skillpromise Bottles & Funnel Concept<sup>TM</sup>  <span>of Employability</span></div>
							<figure class="m-0"><img src="<?php echo(base_url() . 'assets/img/program/' . 'information-about-the-candidate.jpg'); ?>" /></figure>
							<div class="green-bg-content green-bg-slider9">
								<p>Placement PREP Program is a <strong>STRONG and EFFECTIVE</strong> tool that helps you <strong>CUSTOMIZE</strong> information about yourself as per the requirements of the Employer. Placement PREP Program not only prepares you for the written assessments but also mentors you on how to give meaningful answers to HR, Behavioral, Technical and Guesstimate Questions. The result is a WIN-WIN, where you are able to make the Interviewers do, what you want them to do, in a way, they would like to do it WELL and WILLINGLY </p>
								<p>Let us now look at how <strong>Skillpromise Bottles and Funnel Concept<sup>TM</sup></strong> has helped our existing users </p>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="program-slider green-bg">
							<div class="program-name">Placement <br> PREP <br>Program</div>
							<div class="program-img">
								<figure>
									<img src="<?php echo(base_url() . 'assets/img/program/' . 'testimonials.jpg'); ?>" />
									<figcaption>Testimonials</figcaption>
								</figure>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="program-slider p-0">
							<div class="program-name3 pt-4 text-center" style="font-weight:600;">Placement PREP Program <br><strong style="font-weight:600; display:block; padding-top:10px;">Making News….</strong></div>
							<div class="content slider11 pt-3">
								<p>Skillpromise has been successfully mentored students from leading B-Schools like <strong>MICA, IMT, BIMTech</strong> etc. on various aspects of Interview Preparation and helped them crack interviews with their dream companies at excellent packages. Skillpromise was the official training partner for MICA for the 2021 – 2023 batch. The article below is from Indian Express talking about 100% summer internship placement at MICA with highest stipend at Rs. 3.5 lakhs</p>
							</div>
							<div class="graybg-content">
								“MICA Ahmedabad has recorded a 100% summer placement for the 28th batch of PGDM-C and PGDM programs. As many as 67 firms virtually participated in the summer placement process. The FMCG sector offered the highest stipend at Rs 3.5 lakh followed by the IT sector, offering Rs 2.5 lakh. The media and advertising sector recorded the highest stipend at Rs 1.6 lakh”
							</div>
							<p class="subline">Indian Express Careers Desk, New Delhi. November 13, 2021</p>
							<div class="graybg-content">
								“Leading strategic marketing and communications institute MICA Ahmedabad has registered a 35 per cent rise in the average salary package to Rs 19 lakh per annum even as it concludes the final placements process for the 2022 batch. Placing the entire 27th batch of its PGDM-Communications program, MICA Ahmedabad also posted a 16 per cent rise in the highest domestic package at Rs 57.51 lakh per annum.”
							</div>
							<p class="subline">Business Standard, Ahmedabad, March 02, 2022</p>
							
							<!--<figure class="mb-1"><img src="<?php echo(base_url() . 'assets/img/program/' . 'making-news.jpg'); ?>" /></figure>-->
							<div class="green-bg-content slider-11" style="padding:14.5px 8px;">
								<p>Let us now look at what our customers - leaders at colleges and students, have to say about quality and efficacy of our Placement PREP Program</p>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="program-slider p-0">
							<div class="program-name2 text-center" style="font-weight:600;"><figure class="test-icon"><img src="<?php echo(base_url() . 'assets/img/program/' . 'testimonial-icon-img.jpg'); ?>" /></figure> Testimonials - College</div>
							<div class="green-bg-content testimonial-content2">
								<div class="row align-items-center">
									<div class="col-md-3"><img src="<?php echo(base_url() . 'assets/img/program/' . 'chetna-gandhi.jpg'); ?>" /></div>
									<div class="col-md-9">
										<h2>Chetna Gandhi -  Corporate Relations Manager, MICA Ahmedabad</h2>
										<p>We collaborated with Skill promise to impart employment readiness training to our 1st-year students for their summer internship program and 2nd Year students who were to be graduated in the year 2022 for their final placements. Mr. Vikas Mehra, founder of skill promise, and his team of mentors have conducted various sessions with the batch, which helped our students to stay positive, confident and perform better in their placement processes. They received valuable inputs on their CVs, internships, introductions. The overall activities, like Mock PI, GDs, etc., were very incisive. Skill promise understands the placement preparation process well and offers a great value proposition</p>
									</div>
								</div>
							</div>
							<div class="green-bg-content testimonial-content2">
								<div class="row align-items-center">
									<div class="col-md-3"><img src="<?php echo(base_url() . 'assets/img/program/' . 'prakash-pathak.jpg'); ?>" /></div>
									<div class="col-md-9">
										<h2>Prakash Pathak   -   Head – Placements, IMT Hyderabad</h2>
										<p>Skillpromise had conducted a training program for students of IMT Hyderabad. The program helped the students to prepare themselves for interviews and the students were able to secure jobs with some leading corporates. The students gained immensely out of the program and appreciated the program for it being well-designed and delivered professionally. The program also helped students in their overall professional grooming and preparing them for the corporate world. In short, the program was a big success.</p>
									</div>
								</div>
							</div>
							<div class="green-bg-content testimonial-content2">
								<div class="row align-items-center">
									<div class="col-md-3"><img src="<?php echo(base_url() . 'assets/img/program/' . 'victor-gambhir.jpg'); ?>" /></div>
									<div class="col-md-9">
										<h2>Victor Gambhir   -   Vice Chancellor, JECRC University</h2>
										<p>Skillpromise approach is very holistic and covers various aspects of employability in a very comprehensive manner. Content is very effective in terms of its reach and depth. Placement PREP Program is very well structured and is a good amalgamation of learning and testing. Skillpromise Dashboard is a great tool for performance tracking and information management. Case study analysis and Guesstimation sections of Placement PREP Program make it a very robust tool of preparation for consulting companies</p>
									</div>
								</div>
							</div>
							
							
						</div>
					</div>
					<div class="item">
						<div class="program-slider green-bottom">
							<div class="program-name2 text-center" style="font-weight:600;"><figure class="test-icon"><img src="<?php echo(base_url() . 'assets/img/program/' . 'testimonial-icon-img.jpg'); ?>" /></figure> Testimonials - Students</div>
							<div class="green-bg-content testimonial-content2">
								<div class="row">
									
									<div class="col-md-12">
										<figure class="left-img"><img src="<?php echo(base_url() . 'assets/img/program/' . 'sanchita-gupta.jpg'); ?>" /></figure>
										<h2>Sanchita Gupta   -   IIFT, Delhi, 2020 – 2022 Intern, Microsoft</h2>
										<p>I am Sanchita Gupta, currently pursuing MBA in International Business from IIFT, Delhi. Throughout my MBA stint and also prior to that, I have often leveraged the content on Skillpromise platform for preparation at different stages. Though all the sections have been hugely beneficial for me, based on my interest and aspirations. Two segments from which I have personally benefitted a lot from are those of Guesstimates and Cast Study Analysis. Anyone pursuing a career in Consulting would know that there are plenty of resources on the internet which teach us about Consulting frameworks and methodologies. But what is really important while solving case studies or guesstimate questions during an interview is how well you break down the given problem into smaller bits to reach a solution and how you structure the approach and this is what Skillpromise has helped me a lot with. </p>
									</div>
								</div>
							</div>
							<div class="green-bg-content testimonial-content2">
								<div class="row">
									
									<div class="col-md-12">
									<figure class="left-img"><img src="<?php echo(base_url() . 'assets/img/program/' . 'sakshi-jha.jpg'); ?>" /></figure>
										<h2>Sakshi Jha -   MICA, Ahmedabad,  2021 - 2023</h2>
										<p>I am Sakshi Jha. I am a first-year student at MICA. For our summer placements, we received the guidance from Skillpromise for refining our employment readiness skills. They gave us pro tips on organizing our CVs, trained us to create an impact in group discussions and taught us to keep our cool in the interviews. The online and one-on-one mentoring given on aspects like CV building, internship pitch, self-introduction was very effective. The LMS resources also guided me to project the best version of myself in Behavioural questions, HR questions and guesstimates.  After getting trained by Skillpromise, I felt a significant rise in my confidence level, and I would give them a large share of the credit for my successful Summer Internship. I am really grateful to Skillpromis</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="program-slider green-bottom">
							<div class="program-name2 text-center" style="font-weight:600;"><figure class="test-icon"><img src="<?php echo(base_url() . 'assets/img/program/' . 'testimonial-icon-img.jpg'); ?>" /></figure> Testimonials - Students</div>
							<div class="green-bg-content testimonial-content2">
								<div class="row">
									
									<div class="col-md-12">
									<figure class="left-img"><img src="<?php echo(base_url() . 'assets/img/program/' . 'anubhav-das.jpg'); ?>" /></figure>
										<h2>Anubhav Das   -   IMT Hyderabad, 2018 - 2020 Compliance Analyst, D E Shaw Group, CTC: INR 20 Lakhs</h2>
										<p>I am Anubhav Das from IMT Hyderabad. I would like to acknowledge the role skillpromise.com played in my selection with “D. E. Shaw Group". I found the Self-Assessment section very helpful as it helped me understand my strengths, values, skills and areas of improvement in detail. Skillpromise CV section provided me with very valuable inputs on CV building and helped me create a convincing CV. Group discussions section of Skillpromise is very effective as it not only tells you about the basics of Group discussions but also incisive information about things like Economic Indicators, Employment Statistics, Population Statistics, Corruption statistics, Budget details etc. Overall, Skillpromise is a very powerful and focused interview preparation tool. </p>
									</div>
								</div>
							</div>
							<div class="green-bg-content testimonial-content2">
								<div class="row">
									
									<div class="col-md-12">
									<figure class="left-img"><img src="<?php echo(base_url() . 'assets/img/program/' . 'muskan-nankani.jpg'); ?>" /></figure>
										<h2>Muskan Nankani   -   IMT Hyderabad, 2019 – 2021 <br>Analyst, Deloitte. CTC: INR 7.5 Lakhs </h2>
										<p>I am Muskan from IMT Hyderabad. I am placed with Deloitte as an Analyst, thanks to the offline and online support provided by Skillpromise. The Learning Management System is very robust and complements the offline training very well. I found the Aptitude Development and Guesstimation sections great in terms of reach and depth. Bottles and Funnels concept of Skillpromise was an eye opener and helped me prepare for my interview in a very focused manner. Skillpromise helped me make me a compelling introduction and video CV on the FAB principle of sales. I strongly recommend Skillpromise to all the job seekers at various MBA colleges, as this great tool demystifies many myths about the interview preparation process.</p>
									</div>
								</div>
							</div>
							
						</div>
					</div>
					<div class="item">
						<div class="program-slider green-bottom">
							<div class="program-name2 text-center" style="font-weight:600;"><figure class="test-icon"><img src="<?php echo(base_url() . 'assets/img/program/' . 'testimonial-icon-img.jpg'); ?>" /></figure> Testimonials - Students</div>
							<div class="green-bg-content testimonial-content2">
								<div class="row">
									
									<div class="col-md-12">
									<figure class="left-img"><img src="<?php echo(base_url() . 'assets/img/program/' . 'abhinav-srivastava.jpg'); ?>" /></figure>
										<h2>Abhinav Srivastava   -  IMT, Hyderabad, 2018 – 2020 <br>Team Lead, FactSet, CTC: INR 8 Lakhs</h2>
										<p>My name is Abhinav Srivastava and I am second year MBA student at IMT, Hyderabad. I liked working on Skillpromise.com for my interview preparation. It is a very comprehensive with immense relevance. The aptitude section covers all the relevant topics in detail with  nicely explained solutions. Skillpromise helped me in creating an impactful CV, Introduction and video CV which helped me with a great start  with my interview at FactSet. Skillpromise will always have a substantial role in giving a great start to my career</p>
									</div>
								</div>
							</div>
							<div class="green-bg-content testimonial-content2">
								<div class="row">
									
									<div class="col-md-12">
									<figure class="left-img"><img src="<?php echo(base_url() . 'assets/img/program/' . 'aman-khan.jpg'); ?>" /></figure>
										<h2>Aman Khan   -   IMT Dubai, 2017 – 2019 <br>Management Trainee, Khaleej Times, UAE</h2>
										<p>This is Aman Khan from IMT Dubai. I am student of second year. Skillpromise imparted us the Interview Preparation Training. Skillpromise has helped me develop some of the key skills required to make an individual Industry Ready. Skillpromise modules have helped me a lot throughout my Recruitment procedure. I benefited a lot from the HR and Behavioral FAQs section. Brushing up my technical knowledge through the Technical FAQ section helped me do well in the Technical Round. I successfully secured a final placement with Khaleej Times, Dubai.</p>
									</div>
								</div>
							</div>
							<div class="contant text-center">
								<p class="bottom-text-green">Let us now look at the structure of the <strong>Placement PREP Program</strong></p>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="program-slider green-bg">
							<div class="program-name">Placement <br> PREP <br>Program</div>
							<div class="program-img">
								<figure>
									<img src="<?php echo(base_url() . 'assets/img/program/' . 'program-structure.jpg'); ?>" />
									<figcaption>Program Structure</figcaption>
								</figure>
							</div>
						</div>
					</div>
					
					<div class="item">
						<div class="program-slider">
							<div class="program-name2 text-center" style="font-weight:600;">Placement PREP Program</div>
							<p class="bottom-text text-center">Placement PREP Program has two parts <strong>CORE SECTIONS & VALUE ADD SECTIONS</strong></p>
							<div class="green-bg-content core-section" style="padding:20px 15px;">
								<div class="row">
									<div class="col-6">
									<span class="core-title">CORE</span>
									<ul class="core-list">
										<li class="aptitude-development icon">Aptitude Development </li>
										<li class="guesstimation icon">Guesstimates</li>
										<li class="employment-documentation icon">Employment Documentation</li>
										<li class="group-discussions icon">Group Discussions</li>
										<li class="case-study-analysis icon">Case Study Analysis</li>
										<li class="self-assessment icon">Self - Assessment</li>
										<li class="personal-interview icon">Personal Interview</li>
									</ul>
									</div>
									<div class="col-6">
									<span class="core-title">VALUE ADD</span>
									<ul class="core-list">
										<li class="assessment-centre icon">Assessment Centre</li>
										<li class="dashboard icon">Dashboard</li>
										<li class="blog icon">Blog</li>
										<li class="newsletter-list icon">Newsletter</li>
										<li class="resource-centre icon">Resource Centre</li>
										
									</ul>
									</div>
								</div>
							</div>
							
							<div class="content text-center pt-3">
								<p class="bottom-text">Let us now understand key topis covered under the <strong>CORE SECTIONS & VALUE ADD SECTIONS</strong></p>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="program-slider p-0">
							<div class="program-name2 text-center" style="font-weight:600;">Placement PREP Program</div>
							<p class="orange-title mb-0 text-center">CORE SECTIONS</p>
							<div class="green-bg-content core-section" style="padding:10px 15px 64px;">
								<h3 class="title-sm text-center">Online</h3>
								<div class="row align-items-center">
									<div class="col-md-12">
										<ul class="core-list online">
											<li class="assessment-centre icon"><strong>PERSONAL INTERVIEW PREPARATION:</strong> Self-Introduction, Video Introduction, FAQs-HR, FAQs-Behavioral, FAQs-Technical, Attire, How to Communicate effectively,  Researching an employer and Art of Rapport Building during Interview</li>
											<li class="dashboard icon"><strong>SELF-ASSESSMENT:</strong> Incisive assessment of Values, Skills, Strengths, Attitude, Intelligence, Hobbies, Work Motivations, Wellness, Areas of Improvement, Etiquette, SWOT and PEST</li>
											<li class="blog icon"><strong>GROUP DISCUSSIONS (GD):</strong> What is a GD?, Why a GD?, Parameters evaluated during a GD,  How to initiate & conclude a GD?, What are the leadership roles during a GD?, Dos and Don'ts during a GD, 150+ GD Topics with Content</li>
											<li class="newsletter-list icon"><strong>EMPLOYMENT DOCUMENTATION:</strong> Components of a  Curriculum Vitae (CV) and Cover Letter, How to build an impactful CV and Cover Letter, Create your CV & Cover Letter using the builder, Dos & Don’ts of CV Building</li>
											<li class="resource-centre icon"><strong>CASE STUDY ANALYSIS:</strong> How to solve a case study?, What are the various tools to solve case studies? What are different types of case studies asked in a GD and Interview?</li>
											<li class="resource-centre icon"><strong>GUESSTIMATES:</strong>  Covers Data required for Guesstimates, Approaches to Solve Guesstimation problems and Solved Guesstimate problems</li>
											<li class="resource-centre icon"><strong>APTITUDE DEVELOPMENT:</strong> Covers  Quantitative Aptitude, Reasoning Aptitude, Data Interpretation and Verbal Ability, 5000+ solved problem with detailed solutions</li>
										</ul>
									</div>
									<!--<div class="col-md-2">
										<img src="<?php echo(base_url() . 'assets/img/program/' . 'online-img2.png'); ?>" style="width:20px;" />
									</div>-->
								</div>
							</div>
							
							<!--<img src="<?php echo(base_url() . 'assets/img/program/' . 'online-img.jpg'); ?>" />-->
						</div>
					</div>
					<div class="item">
						<div class="program-slider p-0">
							<div class="program-name2 text-center" style="font-weight:600;">Placement PREP Program</div>
							<p class="orange-title text-center">VALUE ADD SECTIONS</p>
							<div class="green-bg-content core-section" style="padding: 20px 8px;">
								<ul class="core-list online">
									<li class="assessment-centre icon"><strong>ASSESSMENT CENTRE:</strong> Assessment Centre gives you access to MCQs assessments on Aptitude and Domain Subjects. There are two types of assessments in every course for Aptitude and Domain Subjects – Pre - Assessment and Post – Assessment.  Assessment Centre gives you detailed Analytics of tests that you take</li>
									<li class="dashboard icon"><strong>BLOG:</strong> Blog offers informative articles on topics related to  Communication, Customer Service, Employability, Finance, Health, Lifestyle, Managerial Skills, Personal Productivity, Selling Skills and Philosophy</li>
									<li class="blog icon"><strong>DASHBOARD:</strong> Dashboard is an information management tool that gives you access to detailed Analytics of assessments taken by you. Dashboard also gives you access to worksheets that you fill during the program. You can download the worksheets filled by you in PDF format</li>
									<li class="resource-centre icon"><strong>RESOURCE CENTRE:</strong> Resource Centre offers you coaching on topics like How to make a Statement of Purpose (SOP)?, How to write an Essay?, How to create an impactful LinkedIn Profile?, How to perform well in Extempore?, etc.</li>
									<li class="newsletter-list icon"><strong>NEWSLETTER:</strong> Newsletter is monthly. Newsletter is a great tool that gives you access to articles on skills, industry insights and updates on contests/ new initiatives at Skillpromise</li>
								</ul>
							</div>
							<!--<img src="<?php echo(base_url() . 'assets/img/program/' . 'value-img.jpg'); ?>" />-->
							<div class="bottom-text-2 pt-5"><p class="bottom-text text-center" style="padding:0 8px;">Placement PREP Program deep dives into topics under <br><strong>CORE sections and VALUE ADD sections</strong>in terms of Reach and Depth. Let us now look at the highlights of each of these sections</p></div>
						</div>
					</div>
					<div class="item">
						<div class="program-slider green-bg">
							<div class="program-name">Placement <br> PREP <br>Program</div>
							<div class="program-img">
								<figure>
									<img src="<?php echo(base_url() . 'assets/img/program/' . 'program-highlights.jpg'); ?>" />
									<figcaption>Program Highlights <br><small>CORE SECTIONS</small></figcaption>
								</figure>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="program-slider p-0">
						<div class="component-container">
							<div class="row align-items-center">
								<div class="col-md-5">
									<div class="online-component-logo">
										<figure class="component-img">
											<img src="<?php echo(base_url() . 'assets/img/program/' . 'component.png'); ?>" />
											<figcaption>Online Component <strong>Aptitude Development</strong></figcaption>
										</figure>
									</div>
								</div>
								<div class="col-md-7">
									<div class="program-name2"><span class="highlight-text">Highlights of</span>Placement PREP Program </div>
								</div>
							</div>
							<div class="component-text">
								<p>An Aptitude Assessment is a systematic means of testing a job candidate's ability to solve problems, ability to analyze situations, ability to reason, ability to think logically, ability to take decisions based on data, ability to take decisions based on past trends, ability to understand graphs, tables and charts, ability to detect patterns and establish relationships, ability to visualize and ability to pay attention to details. </p>
							</div>
							<div class="highlights-bg">
								<h2>Highlights</h2>
								<ul>
									<li>5000+ solved Questions of various difficulty levels with detailed solutions: Quantitative (1954),  Reasoning (1326), Data Interpretation (367) and Verbal Ability (677)</li>
									<li>Comprehensive Aptitude Assessments for Quantitative, Reasoning, Verbal Ability and Data Interpretation </li>
									<li>5 Mock Assessments of 75 Questions each with questions from all the sections of Aptitude</li>
									<li>Every topic is dealt with incisively covering the following components: Formulas, Video Tutorials, Practice Questions with solutions (Low, Medium and High difficulty level), Questions asked in MBA entrance exams, GATE, GMAT, Bank PO and Campus Recruitment Test questions to give students exposure to different ways questions can be asked from a topic</li>
								</ul>
							</div>
							<div class="online-component">
								<img style="width:150px;" src="<?php echo(base_url() . 'assets/img/program/' . 'online-component.png'); ?>" />
							</div>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="program-slider p-0">
						<div class="component-container">
							<div class="row align-items-center">
								<div class="col-md-5">
									<div class="online-component-logo">
										<figure class="component-img">
											<img src="<?php echo(base_url() . 'assets/img/program/' . 'guesstimation-icon.png'); ?>" />
											<figcaption>Online Component <strong>Guesstimates</strong></figcaption>
										</figure>
									</div>
								</div>
								<div class="col-md-7">
									<div class="program-name2"><span class="highlight-text">Highlights of</span>Placement PREP Program </div>
								</div>
							</div>
							<div class="component-text">
								<p>A Guesstimate is a rough approximation or an educated guess at something. Guesstimates have become an important part of interview process. Guesstimate questions help interviewer’s access candidate’s Ability to deal with Ambiguity, Process Orientation, Analytical Skills, Problem Solving Ability, Eye for Detail and Decision Making </p>
							</div>
							<div class="highlights-bg">
								<h2>Highlights</h2>
								<ul>
									<li>Learn various approaches for solving Guesstimate problems:  Demand/ Supply, Mathematical Approach, Top-Down and Bottom-Up Approach</li>
									<li>Get access to comprehensive data and Important Formulas required for solving Guesstimate problems </li>
									<li>Learn the Steps involved in solving a Guesstimate problem</li>
									<li>50+ solved Guesstimate problems with all the required steps</li>

									<!--<li>Learn various approaches for solving Guesstimate problems:  Demand/ Supply, Mathematical Approach, Top-Down and Bottom-Up Approach</li>
									<li>Get access to comprehensive data and Important Formulas required for solving Guesstimate problems</li>
									<li>Learn the Steps involved in solving a Guesstimate problem</li>
									<li>50+ solved Guesstimate problems with all the required steps</li>-->
								</ul>
							</div>
							<div class="online-component">
								<img style="width:150px;" src="<?php echo(base_url() . 'assets/img/program/' . 'guesstimation.png'); ?>" />
							</div>
						</div>
						</div>
					</div>
					<div class="item">
						<div class="program-slider p-0">
						<div class="component-container">
							<div class="row align-items-center">
								<div class="col-md-5">
									<div class="online-component-logo">
										<figure class="component-img">
											<img src="<?php echo(base_url() . 'assets/img/program/' . 'employment-documentation.png'); ?>" />
											<figcaption>Online Component <strong>Employment Documentation</strong></figcaption>
										</figure>
									</div>
								</div>
								<div class="col-md-7">
									<div class="program-name2"><span class="highlight-text">Highlights of</span>Placement PREP Program </div>
								</div>
							</div>
							<div class="component-text">
								<p>Getting an interview opportunity completely depends on the quality of documents submitted by the candidate. The process of seeking employment begins with writing down details about yourself that you think will help your position yourself well in front of the prospective employer. A Curriculum Vitae is a detailed account of your Personal/ Professional information and your Achievements</p>
								<p>A cover letter for your Curriculum Vitae, or covering note is an introductory message that accompanies your CV when you apply for a job. The purpose of the cover letter is to persuade the employer to go through your Curriculum Vitae</p>
							</div>
							<div class="highlights-bg">
								<h2>Highlights</h2>
								<ul>
									<li>Learn about various sections of Curriculum Vitae (CV) & Cover letter</li> 
									<li>Learn how to represent information in each section of the CV</li>
									<li>Learn how to use ‘Action Verbs’ effectively in a CV</li>
									<li>Learn about how to answer questions from various sections of the CV</li>
									<li>Build your CV on the Website using the CV builder</li>
									<li>Learn how to create a video CV</li>

								</ul>
							</div>
							<div class="online-component">
								<img style="width:150px;" src="<?php echo(base_url() . 'assets/img/program/' . 'employment-documentation-img.png'); ?>" />
							</div>
						</div>
						</div>
					</div>
					<div class="item">
						<div class="program-slider p-0">
						<div class="component-container">
							<div class="row align-items-center">
								<div class="col-md-5">
									<div class="online-component-logo">
										<figure class="component-img">
											<img src="<?php echo(base_url() . 'assets/img/program/' . 'group-discussion-icon.png'); ?>" />
											<figcaption>Online Component <strong>Group Discussion</strong></figcaption>
										</figure>
									</div>
								</div>
								<div class="col-md-7">
									<div class="program-name2"><span class="highlight-text">Highlights of</span>Placement PREP Program </div>
								</div>
							</div>
							<div class="component-text">
								<p>Corporate use Group Discussion's to access candidates Analytical Skills, Leadership Qualities, Communication, Flexibility, Knowledge and Teamwork. In this methodology, a group of candidates is given a topic or a case study, a few minutes to think about the topic and then 20 – 30 minutes to discuss the topic among themselves. Group Discussions help in short listing the candidates for the final interview, so it is necessary for the candidates to not only know the Dos and Don’ts but also thoroughly understand the procedure` and the ways of participating in a group discussions effectively</p>
							</div>
							<div class="highlights-bg">
								<h2>Highlights</h2>
								<ul>
								<li>Why is a Group Discussion Conducted?</li>
 								<!--<li>What are different types of Group Discussions?</li>-->
 								<li>What are various phases of a Group Discussion?</li>
								<li>What personality traits are accessed in a Group Discussion?</li>
								<li>What are various roles played during a Group Discussion?</li>
								<li>How to deal with tricky situations in a group discussion like how to initiate, how to conclude, how to deal with an unfamiliar topic and how to deal with a fish market situation?</li>
								<!--<li>What are the Do's and Don'ts of a Group Discussion?</li>-->
								<li>175+ GD topics with content from 13 categories like Social, Business, Abstract, Sports, Aphorisms, Technology, Legal, Environment etc.</li>

								<!--
									<li>Why is a Group Discussion Conducted?</li>
									<li>What are the personality traits accessed in a Group Discussion?</li>
									<li>What are various phases of a Group Discussion?</li>
									<li>What are various roles played during a Group Discussion?</li>
									<li>How do you Initiate and conclude a Group Discussion?</li>
									<li>How to deal with a fish market situation?</li>
									<li>100+ GD topics with content from categories like General, Social, Business, Abstract, Sports, Aphorisms etc.</li>
									-->

								</ul>
							</div>
							<div class="online-component">
								<img style="width: 150px;" src="<?php echo(base_url() . 'assets/img/program/' . 'group-discussion.png'); ?>" />
							</div>
						</div>
						</div>
					</div>
					<div class="item">
						<div class="program-slider p-0">
						<div class="component-container">
							<div class="row align-items-center">
								<div class="col-md-5">
									<div class="online-component-logo">
										<figure class="component-img">
											<img src="<?php echo(base_url() . 'assets/img/program/' . 'case-study-analysis-icon.png'); ?>" />
											<figcaption>Online Component <strong>Case Study Analysis</strong></figcaption>
										</figure>
									</div>
								</div>
								<div class="col-md-7">
									<div class="program-name2"><span class="highlight-text">Highlights of</span>Placement PREP Program </div>
								</div>
							</div>
							<div class="component-text">
								<p>A case is a hypothetical business situation with limited data and ambiguity where you are asked to be in the decision maker’s shoes and provide resolution. Case studies are used by employers to access interviewees on their domain expertise, analytical skills, problem-solving abilities, communication skills, cognitive flexibility and structured thinking. These exercises also help to determine how you prioritize and organize your work.</p>
							</div>
							<div class="highlights-bg">
								<h2>Highlights</h2>
								<ul>
									<li>Learn about various steps involved in Case Study Analysis</li>

									<li>Learn about the tools used in Case Study Analysis like Root Cause Analysis, 5 Why Technique, Fishbone Analysis, Pareto’s Rule and Control-Impact Matrix</li>

									<li>Learn about Case Study Analysis – Terminologies and Concepts</li>

									<li>Learn about different types of Case Study Analysis Frameworks – Profitability Framework, Market Sizing Framework, New Market Entry Framework,  Mergers & Acquisition Framework, Pricing Case Framework, 4 Ps Framework, 3 Cs Framework, Porter’s 5 forces, BCG Growth Share Matrix and McKinsey 7s Framework</li>

									<li>Case Studies and Caselets with Suggested Solutions</li>

								
									<!--<li>Learn about various steps involved in Case Study Analysis</li>

									<li>Learn about the tools used in Case Study Analysis like Root Cause Analysis, 5 Why Technique, Fishbone Analysis, Pareto’s Rule and Control-Impact Matrix</li>

									<li>Learn about different types of cases – Profitability Cases, Market Sizing Cases, Business Operations Cases, Business Strategy Cases, HR Cases, Marketing Cases, Finance Cases, Operations Cases etc.</li>

									<li>25+ Solved Case Studies</li>

									<li>Practice case studies</li>-->


								</ul>
							</div>
							<div class="online-component">
								<img style="width:150px;" src="<?php echo(base_url() . 'assets/img/program/' . 'case-study-analysis.png'); ?>" />
							</div>
						</div>
						</div>
					</div>
					<div class="item">
						<div class="program-slider p-0">
						<div class="component-container">
							<div class="row align-items-center">
								<div class="col-md-5">
									<div class="online-component-logo">
										<figure class="component-img">
											<img src="<?php echo(base_url() . 'assets/img/program/' . 'self-assessment-icon.png'); ?>" />
											<figcaption>Online Component <strong>Self - Assessment</strong></figcaption>
										</figure>
									</div>
								</div>
								<div class="col-md-7">
									<div class="program-name2"><span class="highlight-text">Highlights of</span>Placement PREP Program </div>
								</div>
							</div>
							<div class="component-text">
								<p>Self-Assessment is the process of gathering information about yourself in order to make informed career decisions. Self–Assessment is the most important exercise in career planning. Ability to do meaningful Self– Assessment is dependent on a person’s Intra-personal intelligence. This program will help you do a thorough assessment of your Values, Skills, Strengths, Areas of Improvement, Etiquettes, Attitude, Hobbies, Wellness, Intelligence, Work Motivations, Personal SWOT and PEST Analysis</p>
							</div>
							<div class="highlights-bg">
								<h2>Highlights</h2>
								<ul>
									<li>Do a detailed Assessment of your Values, Skills, Strengths, Areas of Improvement, Intelligence, Etiquette, Attitude, Wellness, Hobbies, Work Motivations and Goals </li>
									<li>Identify your strengths and areas of improvement in various sub-sections like values, skills, strengths, attitude, etiquette, intelligence and wellness</li>
									<li>Do a detailed swot and pest analysis</li>
									<li>Prepare your responses to FAQs asked from various sub-sections during the interview</li>
									<li>Retrieve your self-assessment data from the dashboard Section of Skillpromise</li>

								<!--
									<li>Detailed Assessment of Values, Skills, Strengths, Areas of Improvement, Intelligence, Etiquette's, Attitude, Wellness, Hobbies, Work Motivations, Goals and Personal SWOT Analysis through Action Sheets </li>
									<li>Self-Assessment data retrieval from the Analytics Section of Skillpromise</li>
									<li>Learn about Interview Questions asked on various parameters of Self-Assessment</li>
									
								-->


								</ul>
							</div>
							<div class="online-component">
								<img  style="width:150px;" src="<?php echo(base_url() . 'assets/img/program/' . 'self-assessment.png'); ?>" />
							</div>
						</div>
						</div>
					</div>
					<div class="item">
						<div class="program-slider p-0">
						<div class="component-container">
							<div class="row align-items-center">
								<div class="col-md-5">
									<div class="online-component-logo">
										<figure class="component-img">
											<img src="<?php echo(base_url() . 'assets/img/program/' . 'personal-interview-icon.png'); ?>" />
											<figcaption>Online Component <strong>Personal Interview</strong></figcaption>
										</figure>
									</div>
								</div>
								<div class="col-md-7">
									<div class="program-name2"><span class="highlight-text">Highlights of</span>Placement PREP Program </div>
								</div>
							</div>
							<div class="component-text">
								<p>Placement PREP (PI) is a tool used by corporate to access the suitability of a candidate for a particular role.  The company is looking for a candidate who matches their requirements and the closer a fit, the more competitive a student will be. Interviewers access candidates by asking them CV based questions, HR questions, Behavioural questions, Domain/ Subject questions, Case based questions and Guesstimate questions. Some employers use extempore as a technique to access creativity, structured thinking and communication</p>
							</div>
							<div class="highlights-bg">
								<h2>Highlights</h2>
								<ul>
									<li>Learn how to master communication for a Face-to-fact Interview, Telephonic Interview and Video Interview</li>
									<!--<li>Get in depth insights on mental preparation required for a Personal Interview</li>-->
									<li>Learn about interview essentials like Body Language, Etiquette and Attire required for a Personal Interview</li>
									<li>Learn how to make an impactful Self-Introduction on FAB principle</li>
									<!--<li>Learn the art of rapport building during an interview</li>-->
									<li>Get access to 100+ HR/ Behavioral Questions with Answers </li>
									<li>Get access to 15000+ Technical/ Domain Questions with answers from Engineering (6627), Management (1825), Humanities (2903), Science (2209), Healthcare (764), Commerce (300), Law (166), Hotel Management (264) and Journalism & Mass Communication (200)</li>
									
									<!--
									<li>Learn how to master communication for a Face-to-fact Interview, Telephonic Interview and Video Interview</li>
									<li>Learn about Body Language, Etiquette and Attire required for a Personal Interview</li>
									<li>Learn how to make an impactful Self-Introduction and an effective Curriculum Vitae, including a video CV</li>
									<li>100+ HR/ Behavioral Questions with Answers </li>
									<li>15000+ Technical/ Domain Questions with answers from Engineering, Management, Humanities, Science, Healthcare, Commerce, Law, Hotel Management and Journalism & Mass Communication</li>
									-->
								
								</ul>
							</div>
							<div class="online-component">
								<img style="width:150px;" src="<?php echo(base_url() . 'assets/img/program/' . 'personal-interview.png'); ?>" />
							</div>
						</div>
						</div>
					</div>
					<div class="item">
						<div class="program-slider green-bg">
							<div class="program-name">Placement <br> PREP <br>Program</div>
							<div class="program-img">
								<figure>
									<img src="<?php echo(base_url() . 'assets/img/program/' . 'value-add-sections.png'); ?>" />
									<figcaption>Program Highlights <br><small>VALUE ADD SECTIONS</small></figcaption>
								</figure>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="program-slider p-0">
						<div class="component-container">
							<div class="row align-items-center">
								<div class="col-md-5">
									<div class="online-component-logo">
										<figure class="component-img">
											<img src="<?php echo(base_url() . 'assets/img/program/' . 'assessment-centre-icon.png'); ?>" />
											<figcaption>Value Adds <strong>Assessment Centre</strong></figcaption>
										</figure>
									</div>
								</div>
								<div class="col-md-7">
									<div class="program-name2"><span class="highlight-text">Highlights of</span>Placement PREP Program </div>
								</div>
							</div>
							<div class="component-text pt-3 pb-4">
								<p>Employers use assessments to test skills not readily assessable from an interview alone. Skillpromise Assessment center is created keeping this in mind. Skillpromise assessment center has Aptitude assessments and Domain/ Subject assessments. All the assessments are in the form of MCQs. Skillpromise Assessment Center has Comprehensive Assessments with multiple topics. Detailed Assessment Analytics helps you identify your strong and weak areas. There are two types of assessments for every subject – Pre - Assessment and Post - Assessment</p>
							</div>
							<img src="<?php echo(base_url() . 'assets/img/program/' . 'assessment-centre.png'); ?>" />
						</div>	
						</div>
					</div>
					<div class="item">
						<div class="program-slider p-0">
						<div class="component-container">
							<div class="row align-items-center">
								<div class="col-md-5">
									<div class="online-component-logo">
										<figure class="component-img">
											<img src="<?php echo(base_url() . 'assets/img/program/' . 'blog-icon.png'); ?>" />
											<figcaption>Value Adds <strong>Blog</strong></figcaption>
										</figure>
									</div>
								</div>
								<div class="col-md-7">
									<div class="program-name2"><span class="highlight-text">Highlights of</span>Placement PREP Program </div>
								</div>
							</div>
							<div class="component-text">
								<p><span>Skillpromise Blog</span> gives you access to informative articles from the following topics:</p>
								<ul>
									<li>Communication</li>
									<li>Customer Service</li>
									<li>Employability</li>
									<li>Finance</li>
									<li>Health</li>
									<li>Lifestyle</li>
									<li>Managerial Skills</li>
									<li>Personal Productivity</li>
									<li>Selling Skills </li>
									<li>Philosophy</li>
								</ul>
								<p>These are <span>INTERACTIVE BLOGS</span> that allow you to share your opinion and give your inputs on the articles. Blogs are designed with an objective of developing your skills and personality. Also, information in the blogs can help you present yourself better in an interview</p>
							</div>
							
							<img style="max-width:300px;" src="<?php echo(base_url() . 'assets/img/program/' . 'blog-img.png'); ?>" />
						</div>	
						</div>
					</div>
					<div class="item">
						<div class="program-slider green-bottom">
						<div class="component-container">
							<div class="row align-items-center">
								<div class="col-md-5">
									<div class="online-component-logo">
										<figure class="component-img">
											<img src="<?php echo(base_url() . 'assets/img/program/' . 'dashboard-icon.png'); ?>" />
											<figcaption>Value Adds <strong>Dashboard</strong></figcaption>
										</figure>
									</div>
								</div>
								<div class="col-md-7">
									<div class="program-name2"><span class="highlight-text">Highlights of</span>Placement PREP Program </div>
								</div>
							</div>
							<div class="component-text pt-4">
								<p><span>Skillpromise Dashboard</span> is an information management tool that provides you access to the following:</p>
								<ul>
									<li>Detailed Analysis of the Assessments taken by you </li>
									<li>Information about assessments not taken by you</li>
									<li>PDF downloads of the work sheets filled by you in various sections of the program</li>
									
									
								</ul>
								
							</div>
							
							
						</div>	
						<img style="width:100%; margin-top:35px;" src="<?php echo(base_url() . 'assets/img/program/' . 'dashboard-img.jpg'); ?>" />
						</div>
					</div>
					
					<div class="item">
						<div class="program-slider p-0">
						<div class="component-container">
							<div class="row align-items-center">
								<div class="col-md-5">
									<div class="online-component-logo">
										<figure class="component-img">
											<img src="<?php echo(base_url() . 'assets/img/program/' . 'dashboard-icon.png'); ?>" />
											<figcaption>Value Adds <strong>Resource Centre</strong></figcaption>
										</figure>
									</div>
								</div>
								<div class="col-md-6">
									<div class="program-name2"><span class="highlight-text">Highlights of</span>Placement PREP Program </div>
								</div>
							</div>
							
							<div class="green-bg-content recouce-program">
								<div class="row grid-5">
									<div class="col-md-3"><img src="<?php echo(base_url() . 'assets/img/program/' . 'statement-of-purpose.png'); ?>" /></div>
									<div class="col-md-9">
										<h2>Statement of Purpose (SOP)</h2>
										<p>A Statement of Purpose is a description of who you are as a student and what you are looking for in your career. You are required to make an SOP  when you apply for admission to a college. As an interviewee, you can be probed about your career aspirations and goals, by the employer. This section will mentor you on how to make an impactful SOP</p>
									</div>
								</div>
							</div>
							
							<div class="green-bg-content recouce-program">
								<div  class="resource-centre">
								<div class="row grid-5">
									<div class="col-md-3"><img src="<?php echo(base_url() . 'assets/img/program/' . 'extempore.png'); ?>" /></div>
									<div class="col-md-9">
										<h2>Extempore</h2>
										<p>An <span>Extempore</span> speech is an impromptu speech which the candidate is required to make on a topic given there and then. You are expected to start speaking about the topic as soon the topic is announced by the interviewer. Extempore is used by some employers to check your creativity, thought speed, communication and thought process. Learn how to successfully approach extempore on different types of topics</p>
									</div>
								</div>
								</div>
							</div>
							<div class="green-bg-content recouce-program">
								<div class="row grid-5">
									<div class="col-md-3"><img src="<?php echo(base_url() . 'assets/img/program/' . 'essay-writing.png'); ?>" /></div>
									<div class="col-md-9">
										<h2>Essay Writing</h2>
										<p>Essay writing is a tool required equally by students and professionals. Essay writing helps in evaluation of creativity, writing skills, persuasion skills, intelligence, though speed, critical thinking and communication. Learn how to take a deep dive into a topic, analyze it, share your thoughts, and supplement them with facts.</p>
									</div>
								</div>
							</div>
							
							<div class="green-bg-content recouce-program" style="padding:4px;">
								<div class="resource-centre">
								<div class="row grid-5">
									<div class="col-md-3"><img src="<?php echo(base_url() . 'assets/img/program/' . 'linkedIn.png'); ?>" /></div>
									<div class="col-md-9">
										<h2>Essentials of LinkedIn Profile</h2>
										<p><span>LinkedIn</span> is world’s largest professional network. Whether you are an experienced professional or just getting started, having a great LinkedIn profile is an absolute must. Learn about essential components of a LinkedIn profile like how to write professional summary, how to present internships, projects and work experience, how to manage endorsements and recommendations, how to join relevant groups etc.</p>
									</div>
								</div>
								</div>
							</div>
							
							
						</div>	
						</div>
					</div>
					
					<div class="item">
						<div class="program-slider green-bottom">
						<div class="component-container">
							<div class="row align-items-center mt-2">
								<div class="col-md-5">
									<div class="online-component-logo">
										<figure class="component-img">
											<img src="<?php echo(base_url() . 'assets/img/program/' . 'newsletter.png'); ?>" />
											<figcaption>Value Adds <strong>Newsletter</strong></figcaption>
										</figure>
									</div>
								</div>
								<div class="col-md-7">
									<div class="program-name2"><span class="highlight-text">Highlights of</span>Placement PREP Program </div>
								</div>
							</div>
							<div class="row mb-2 align-items-center">
								<div class="col-md-8">
									<div class="component-text" style="line-height:1.1;">
										<p>Learn new skills with Skillpromise email  Newsletter every month and get your free downloadable <span>Art of Building Credibility eBook</span> when you subscribe to Skillpromise Newsletter. Following are the contents of the newsletter:</p>
										<ul style="margin:0">
											<li>A career skill article</li>
											<li>An Employability article</li>
											<li>An Industry Profile</li>
											<li>Expert opinions from Academic and Corporate world</li>
											<li>A Lifestyle Article</li>
											<li>Information about our new programs and initiatives</li>
										</ul>
										
									</div>
								</div>
								<div class="col-md-4">
									<img src="<?php echo(base_url() . 'assets/img/program/' . 'ebook.png'); ?>" />
								</div>
							</div>
							
							
							<img style="width:100%;" src="<?php echo(base_url() . 'assets/img/program/' . 'newsletter-img.jpg'); ?>" />
						</div>
												
						</div>
						</div>
					<div class="item">
						<div class="program-slider green-bg">
							<!--<div class="sana-text">
								<img src="<?php echo(base_url() . 'assets/img/program/' . 'sana-text.png'); ?>" />
							</div>-->
							<div class="program-name">Placement <br> PREP <br>Program</div>
							<div class="program-img">
								<figure>
									<img src="<?php echo(base_url() . 'assets/img/program/' . 'sana.png'); ?>" />
									<figcaption>Skillpromise Introduction & <br> Methodology</figcaption>
								</figure>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="program-slider p-0">
							<div class="component-container">
							<div class="program-name4">Skillpromise Introduction</div>
							<div class="green-bg-content skillpromise-program">
								<p>Incorporated in August 2017, Skillpromise.com, a part of Sana Skillpromise Education Private Limited, is an e -learning platform that helps School students, Higher Education Students and Professionals, engage in skill development programs.</p>
								<p>Skillpromise programs integrate self-assessment and development need analysis, with an objective of continuous improvement</p>
								<p>Skillpromise.com has team members from both, Corporate and Academic world, all of whom are focused on developing skill enhancement programs, with world class, incisive and comprehensive content to help you reach optimal levels of your efficiency.</p>
								<p>Skillpromise.com has created “Learning Accountability Loops” that tightly integrate Self-monitoring, Self-Evaluation, and Self-Improvisation. </p>
							</div>
							<div class="program-name4" style="margin-top:8px;">Skillpromise Methodology</div>
							<div class="green-bg-content skillpromise-program">
							<div class="row align-items-center">
								<div class="col-md-5"><figure><img src="<?php echo(base_url() . 'assets/img/program/' . 'sana-2.png'); ?>" /></figure></div>
								<div class="col-md-7">
								<div class="d-flex sana-title align-items-center">
									<h3>Sana</h3> <p>The Skillpromise Way<sup>TM</sup></p>
									</div>
								</div>
							</div>
								
								<p>Self-Assessment & Development Need Analysis (SANA) is the methodology used in all Skillpromise programs. Students are encouraged to introspect and access their strength areas and areas of improvement in various sections of employability. This is followed by creation of a plan for improvisation with clearly defined timelines with the help of Work/ Action sheets </p>
								<p>Employment Readiness program encourages students to focus on their academic, personal and professional growth so they learn how to thrive in a rapidly changing world. </p>
							</div>
						</div>
						</div>
					</div>
					<div class="item">
						<div class="program-slider green-bg">
							
							<div class="program-name">Placement <br> PREP <br>Program</div>
							<div class="program-img">
								<figure>
									<img src="<?php echo(base_url() . 'assets/img/program/' . 'why-choose.png'); ?>" />
									<figcaption>Why Choose <br>Placement PREP <br>Program?</figcaption>
								</figure>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="program-slider green-bottom h-20">
							<img src="<?php echo(base_url() . 'assets/img/program/' . 'why-choose-banner.png'); ?>" />
							<div class="component-container">
							<div class="program-name2 text-center" style="margin-bottom:5px; padding-top:5px;">Why Choose Placement PREP Program?</div>
							<div class="component-text why-choose">
								<!--<div class="arrow-text">
									
									<img src="<?php echo(base_url() . 'assets/img/program/' . 'arrow.png'); ?>" />
								</div>-->
								<p><strong>CONVENIENCE:</strong> Placement PREP Program is a Self-Paced, Online Program. You can complete the coaching material and assignments at your own pace, in the comfort of your home. This program is a great enabler in current pandemic situation</p>
								<p><strong>ENHANCED CONFIDENCE LEVELS:</strong> Placement PREP Program will help you understand yourself in terms of your Values, Skills, Areas of Improvement, Goals, Intelligence Mix, Hobbies, Work Motivations, Etiquettes, Attitude and External environment. This program will also help you understand the Employment process holistically which will enhance your confidence and give you the feeling of being in control</p>
								<p><strong>INFORMED DECISION MAKING:</strong> Placement PREP Program will equip you with a clear picture about your  Personality, Work Motivations, Future aspirations, Resources at hand and Action plans. In light of all this well researched information, you will be able to make informed decisions</p>
								<p><strong>INSTANT RETURN ON LEARNING:</strong>  Placement PREP Program will enable you to use your learning immediately. As soon as you finish a section, you know the impact of your learnings on your future communication and behavior. This will enable you to make a course correction immediately</p>
								<p><strong>EASY INFORMATION ACCESS:</strong> Placement PREP Program will enable you to document your learnings and your action plans, by making you fill action sheets, at the end of every section. You can retrieve this information from the Analytics section of Skillpromise.com, at your convenience</p>
								<!--<p><strong>COMPREHENSIVENESS OF CONTENT:</strong> Placement PREP Program offers Incisive, Accurate and Comprehensive content. You don’t have to refer to additional resources, online or offline</p>-->
								<p><strong>PRIVACY:</strong> Reflective learning in a classroom  environment  may make you uncomfortable as you won’t like to share your values, skills, strengths or areas of improvement with everybody. You do not have to worry about all these things when you are taking the program online.</p>
							</div>
							</div>
							
						</div>
					</div>
					<div class="item">
						<div class="program-slider green-bottom">
							
							<div class="component-container">
							<div class="program-name4 mb-5">Contact Us</div>
								<div class="component-text mb-4">
									<p style="font-size:14px;">Feel free to get in touch with us, in case you have any Queries, Requests or Suggestions</p>
								</div>
							</div>
								<div class="contact-slider" style="background-image:url(<?php echo(base_url() . 'assets/img/program/' . 'contact-bg.png'); ?>)">
									<p><span><img src="<?php echo(base_url() . 'assets/img/program/' . 'phone-icon.png'); ?>" /></span> +91 98110 32026</p>
									<p><span><img src="<?php echo(base_url() . 'assets/img/program/' . 'email-icon.png'); ?>" /></span> vikas@skillpromise.com</p>
								</div>
								<div class="component-container">
								<div class="text-center copyright">
								<p>© 2021 Sana Skillpromise Education Private Limited. All rights reserved.</p>
								<p>Skillpromise is a registered trademark of Sana Skillpromise Education Pvt. Ltd.</p>
								<p>Address: J – 7/123, Third Floor, Rajouri Garden, New Delhi – 110027</p>
								<p>Company Identity Number U74999DL2017PTC322230 </p>
								<p>PAN Number AAZCS0922P</p></div>
								</div>
							
						</div>
					</div>
					
				 </div>
				  </div>
				  
				  <div class="tab-pane fade" id="interview-preparation-program-plus" role="tabpanel" aria-labelledby="profile-tab">
					<div class="program-details-slider owl-carousel owl-theme">
					<div class="item">
						<div class="program-slider green-bg">
							<div class="program-name">Placement <br> PREP <br>Program <span class="plus">PLUS</span></div>
							<div class="program-img">
								<figure>
									<img src="<?php echo(base_url() . 'assets/img/program/' . 'get_job_ready.png'); ?>" />
									<figcaption>Get Job Ready</figcaption>
								</figure>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="program-slider green-bottom ">
							<figure><img src="<?php echo(base_url() . 'assets/img/program/' . 'interview-preparation-program.jpg'); ?>" /></figure>
							
							<div class="content broun-content" style="padding:0 15px;">
								<p><strong>Placement PREP Program PLUS</strong> is a carefully crafted, incisive program that optimally amalgamates Online and Face-to-Face learning. This program helps you equip yourself with the science and art that goes behind acing your job interview</p>
								<p><strong>Placement PREP Program PLUS</strong> provides you with Strategic and Tactical inputs on various components of the selection process like Aptitude Assessment, Guesstimation problems, Case Study Analysis, Group Discussions, Extempore, Essay Writing, Self-Assessment, Employment Documentation and Personal Interview</p>
								<p><strong>Placement PREP Program PLUS</strong> not only provides you with a comprehensive Online Learning Tool but also, coaching from Industry and Academia experts through a One-on-One session and Mock Interview</p>
								<p><strong>Placement PREP Program PLUS</strong> offers Value Adds like an Assessment Centre, Blog, Dashboard for performance management and a resource center, to help you optimize your learning and realize your full potential</p>
								<p class="border-style">Let us take a quick look at the  <strong>CONCEPT OF EMPLOYABILITY and EMPLOYABILITY SCENARIO </strong>IN INDIA before getting into details of the Placement PREP Program PLUS</p>
							</div>
							
						</div>
					</div>
					<div class="item">
						<div class="program-slider green-bg">
							<div class="program-name">Placement <br> PREP <br>Program <span class="plus">PLUS</span></div>
							<div class="program-img">
								<figure>
									<img src="<?php echo(base_url() . 'assets/img/program/' . 'what-is-employability.jpg'); ?>" />
									<figcaption>What is Employability?</figcaption>
								</figure>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="program-slider green-bottom what-is-employabilityslider">
							<figure><img src="<?php echo(base_url() . 'assets/img/program/' . 'what-is-employability-banner.jpg'); ?>" /></figure>
							<div class="program-name">What is Employability?</div>
							<div class="content broun-content">
								<p><strong>Your Employability</strong> is your Ability to do accurate assessment which includes Self-Assessment in terms of your key Skills, Values, Areas of improvement etc., Academic assessment in terms of Marks/ CGPA obtained and domain knowledge and Industry assessment in terms of Industries of choice, companies of choice, departments of choice and roles of choice</p>
								<p><strong>Your Employability </strong> is your Ability to effectively deal with ambiguity in the job market and take informed decisions. This means that you can accurately identify the Industry, Company and Department of your interest, you can accurately identify the job opportunities that match with your education and personality attributes</p>
								<p><strong>Your Employability</strong> is your ability to make a smart action plan in terms of preparation for various components of the interview process like Aptitude assessment, Guesstimation, Curriculum Vitae, Cover Letter, Case Study Analysis, Group discussion, Extempore, Essay Writing and Personal Interview</p>
								<p><strong>Your Employability</strong> is your ability to gain the first and subsequent employment in the desired industry, company, department & role  at the desired compensation</p>
							</div>
							
						</div>
					</div>
					<div class="item">
						<div class="program-slider green-bg">
							<div class="program-name">Placement <br> PREP <br>Program <span class="plus">PLUS</span></div>
							<div class="program-img">
								<figure>
									<img src="<?php echo(base_url() . 'assets/img/program/' . 'employability-scenario-in-india.jpg'); ?>" />
									<figcaption>Employability Scenario <br> in India</figcaption>
								</figure>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="program-slider green-content-box-height">
							
							<div class="program-name">Employability Scenario in <br><strong>INDIA</strong></div>
							<div class="content broun-content">
								<table class="table table-striped">
									<thead>
										<tr>
											<th>Year</th>
											<th>2015</th>
											<th>2016</th>
											<th>2017</th>
											<th>2018</th>
											<th>2019</th>
											<th>2020</th>
											<th>2021</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<th>B.E./ B.Tech.</th>
											<td>54.00%</td>
											<td>52.58%</td>
											<td>50.69%</td>
											<td>51.52%</td>
											<td>57.09%</td>
											<td>49%</td>
											<td>46.82%</td>
										</tr>
										<tr>
											<th>MBA</th>
											<td>43.99%</td>
											<td>44.56%</td>
											<td>42.28%</td>
											<td>39.40%</td>
											<td>36.44%</td>
											<td>54%</td>
											<td>46.59%</td>
										</tr>
										<tr>
											<th>B.A</th>
											<td>29.82%</td>
											<td>27.11%</td>
											<td>35.66%</td>
											<td>37.39%</td>
											<td>29.30%</td>
											<td>48%</td>
											<td>42.72%</td>
										</tr>
										<tr>
											<th>BCom</th>
											<td>26.45%</td>
											<td>20.58%</td>
											<td>37.98%</td>
											<td>33.93%</td>
											<td>30.06%</td>
											<td>47%</td>
											<td>40.30%</td>
										</tr>
										<tr>
											<th>B.Sc.</th>
											<td>38.41%</td>
											<td>35.24%</td>
											<td>31.76%</td>
											<td>33.62%</td>
											<td>47.37%</td>
											<td>34%</td>
											<td>30.34%</td>
										</tr>
										<tr>
											<th>MCA</th>
											<td>45.00%</td>
											<td>39.81%</td>
											<td>31.36%</td>
											<td>43.85%</td>
											<td>43.19%</td>
											<td>25%</td>
											<td>22.42%</td>
										</tr>
										<tr>
											<th>ITI</th>
											<td>44.00%</td>
											<td>40.90%</td>
											<td>42.22%</td>
											<td>29.46%</td>
											<td>NA</td>
											<td>NA</td>
											<td>NA</td>
										</tr>
										<tr>
											<th>Polytechnic</th>
											<td>10.14%</td>
											<td>15.89%</td>
											<td>25.77%</td>
											<td>32.67%</td>
											<td>18.05%</td>
											<td>32%</td>
											<td>25.02%</td>
										</tr>
										<tr>
											<th>B.Pharma</th>
											<td>56.00%</td>
											<td>40.62%</td>
											<td>42.30%</td>
											<td>47.78%</td>
											<td>36.29%</td>
											<td>45%</td>
											<td>37.24%</td>
										</tr>
									</tbody>
								</table>
								<p class="source-text">Source: Wheebox India Skills Report 2021</p>
							</div>
							<div class="green-bg-content">
								<p>Employment percentage of fresh Graduates is VERY LOW and ranges between <strong>22.42 to 46.82</strong> in 2021 which includes graduates who are underemployed (Not in the right role, not at the right package, not at the right designation and not in the right company)</p>
								<p>Employers want to see specific skills and behaviors <strong>BEFORE</strong> they hire people. If you <strong>CAN’T</strong> demonstrate you have these skills and behaviors, you may NEVER get placed in the job you want </p>
								<p>Let us understand with the help of <strong>BOTTLES & FUNNEL CONCEPT<sup>TM</sup></strong> of Employability, how Skillpromise will help you be successful in <strong>JOB INTERVIEW</strong></p>
							</div>
							
						</div>
					</div>
					<div class="item">
						<div class="program-slider green-bg">
							<div class="program-name">Placement <br> PREP <br>Program <span class="plus">PLUS</span></div>
							<div class="program-img">
								<figure>
									<img src="<?php echo(base_url() . 'assets/img/program/' . 'bottles-and-funnel.jpg'); ?>" />
									<figcaption>Bottles and Funnel  <br> Concept<sup>TM</sup></figcaption>
								</figure>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="program-slider green-content-box-height-bottel">
							<div class="program-name2 text-center " style="font-weight:600;">Skillpromise Bottles & Funnel Concept<sup>TM</sup>  <span>of Employability</span></div>
							<figure class="bottles-img mt-4"><img src="<?php echo(base_url() . 'assets/img/program/' . 'skillpromise-bottles.jpg'); ?>" /></figure>
							<div class="green-bg-content">
								<p>Placement PREP Program is based on the <strong>Skillpromise Bottles & Funnel Concept<sup>TM</sup></strong>. In this concept, Employer and the Candidate are represented by bottles and the funnel represents the Interview Process that the candidate needs to go through for selection in the company. Skillpromise prepares you on all the components of the selection process represented by the funnel. Skillpromise helps you explore information about yourself through an incisive Self – Assessment program and helps you present this information in such a manner that you are able to highlight your qualities that match will Employer’s requirement. This way you are able to present yourself as the <strong>RIGHT FIT</strong> for the job. </p>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="program-slider p-0">
							<div class="program-name2 text-center m-0" style="font-weight:600; line-height:1.1; padding:8px 0 5px;">Skillpromise Bottles & Funnel Concept<sup>TM</sup>  <span>of Employability</span></div>
							<figure class="m-0"><img src="<?php echo(base_url() . 'assets/img/program/' . 'information-about-the-candidate.jpg'); ?>" /></figure>
							<div class="green-bg-content green-bg-slider9">
								<p>Placement PREP Program is a <strong>STRONG and EFFECTIVE</strong> tool that helps you <strong>CUSTOMIZE</strong> information about yourself as per the requirements of the Employer. Placement PREP Program not only prepares you for the written assessments but also mentors you on how to give meaningful answers to HR, Behavioral, Technical and Guesstimate  Questions. The result is a WIN-WIN, where you are able to make the Interviewers do, what you want them to do, in a way, they would like to do it WELL and WILLINGLY </p>
								<p>Let us now look at how <strong>Skillpromise Bottles and Funnel Concept<sup>TM</sup></strong> has helped our existing users </p>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="program-slider green-bg">
							<div class="program-name">Placement <br> PREP <br>Program <span class="plus">PLUS</span></div>
							<div class="program-img">
								<figure>
									<img src="<?php echo(base_url() . 'assets/img/program/' . 'testimonials.jpg'); ?>" />
									<figcaption>Testimonials</figcaption>
								</figure>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="program-slider p-0">
							<div class="program-name3 pt-4 text-center" style="font-weight:600;">Placement PREP Program <span class="plus">PLUS</span><br><strong style="font-weight:600; display:block; padding-top:10px;">Making News….</strong></div>
							<div class="content slider11 pt-3">
								<p>Skillpromise has been successfully mentored students from leading B-Schools like <strong>MICA, IMT, BIMTech</strong> etc. on various aspects of Interview Preparation and helped them crack interviews with their dream companies at excellent packages. Skillpromise was the official training partner for MICA for the 2021 – 2023 batch. The article below is from Indian Express talking about 100% summer internship placement at MICA with highest stipend at Rs. 3.5 lakhs</p>
							</div>
							<div class="graybg-content">
								“MICA Ahmedabad has recorded a 100% summer placement for the 28th batch of PGDM-C and PGDM programs. As many as 67 firms virtually participated in the summer placement process. The FMCG sector offered the highest stipend at Rs 3.5 lakh followed by the IT sector, offering Rs 2.5 lakh. The media and advertising sector recorded the highest stipend at Rs 1.6 lakh”
							</div>
							<p class="subline">Indian Express Careers Desk, New Delhi. November 13, 2021</p>
							<div class="graybg-content">
								“Leading strategic marketing and communications institute MICA Ahmedabad has registered a 35 per cent rise in the average salary package to Rs 19 lakh per annum even as it concludes the final placements process for the 2022 batch. Placing the entire 27th batch of its PGDM-Communications program, MICA Ahmedabad also posted a 16 per cent rise in the highest domestic package at Rs 57.51 lakh per annum.”
							</div>
							<p class="subline">Business Standard, Ahmedabad, March 02, 2022</p>
							
							<!--<figure class="mb-1"><img src="<?php echo(base_url() . 'assets/img/program/' . 'making-news.jpg'); ?>" /></figure>-->
							<div class="green-bg-content slider-11" style="padding:14.5px 8px;">
								<p>Let us now look at what our customers - leaders at colleges and students, have to say about quality and efficacy of our Placement PREP Program</p>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="program-slider p-0">
							<div class="program-name2 text-center" style="font-weight:600;"><figure class="test-icon"><img src="<?php echo(base_url() . 'assets/img/program/' . 'testimonial-icon-img.jpg'); ?>" /></figure> Testimonials - College</div>
							<div class="green-bg-content testimonial-content2">
								<div class="row align-items-center">
									<div class="col-md-3"><img src="<?php echo(base_url() . 'assets/img/program/' . 'chetna-gandhi.jpg'); ?>" /></div>
									<div class="col-md-9">
										<h2>Chetna Gandhi -  Corporate Relations Manager, MICA Ahmedabad</h2>
										<p>We collaborated with Skill promise to impart employment readiness training to our 1st-year students for their summer internship program and 2nd Year students who were to be graduated in the year 2022 for their final placements. Mr. Vikas Mehra, founder of skill promise, and his team of mentors have conducted various sessions with the batch, which helped our students to stay positive, confident and perform better in their placement processes. They received valuable inputs on their CVs, internships, introductions. The overall activities, like Mock PI, GDs, etc., were very incisive. Skill promise understands the placement preparation process well and offers a great value proposition</p>
									</div>
								</div>
							</div>
							<div class="green-bg-content testimonial-content2">
								<div class="row">
									<div class="col-md-3"><img src="<?php echo(base_url() . 'assets/img/program/' . 'prakash-pathak.jpg'); ?>" /></div>
									<div class="col-md-9">
										<h2>Prakash Pathak   -   Head – Placements, IMT Hyderabad</h2>
										<p>Skillpromise had conducted a training program for students of IMT Hyderabad. The program helped the students to prepare themselves for interviews and the students were able to secure jobs with some leading corporates. The students gained immensely out of the program and appreciated the program for it being well-designed and delivered professionally. The program also helped students in their overall professional grooming and preparing them for the corporate world. In short, the program was a big success.</p>
									</div>
								</div>
							</div>
							<div class="green-bg-content testimonial-content2">
								<div class="row">
									<div class="col-md-3"><img src="<?php echo(base_url() . 'assets/img/program/' . 'victor-gambhir.jpg'); ?>" /></div>
									<div class="col-md-9">
										<h2>Victor Gambhir   -   Vice Chancellor, JECRC University</h2>
										<p>Skillpromise approach is very holistic and covers various aspects of employability in a very comprehensive manner. Content is very effective in terms of its reach and depth. Placement PREP Program is very well structured and is a good amalgamation of learning and testing. Skillpromise Dashboard is a great tool for performance tracking and information management. Case study analysis and Guesstimation sections of Placement PREP Program make it a very robust tool of preparation for consulting companies</p>
									</div>
								</div>
							</div>
							<!--<div class="green-bg-content testimonial-content2">
								<div class="row">
									<div class="col-md-3"><img src="<?php echo(base_url() . 'assets/img/program/' . 'sunil-malik.jpg'); ?>" /></div>
									<div class="col-md-9">
										<h2>Sunil Malik   -   Director – T & P, <br>Gyan Vihar University</h2>
										<p>Skillpromise training is very well structured and comprehensive. It was a good mix of a robust LMS and Online lectures. Skillpromise training helped students prepare themselves well on Aptitude, Curriculum Vitae building, Group discussions, Personal Interview, Self – Introduction, Guesstimation and Case Study analysis.  Skillpromise helped students at Gyan Vihar University in understanding various components of the interview process. Self-Assessment program helped students with exploring their values, skills, areas of improvement etc. which helped them perform well in the HR interview. </p>
									</div>
								</div>
							</div>-->
							
						</div>
					</div>
					<div class="item">
						<div class="program-slider green-bottom">
							<div class="program-name2 text-center" style="font-weight:600;"><figure class="test-icon"><img src="<?php echo(base_url() . 'assets/img/program/' . 'testimonial-icon-img.jpg'); ?>" /></figure> Testimonials - Students</div>
							<div class="green-bg-content testimonial-content2">
								<div class="row">
									
									<div class="col-md-12">
										<figure class="left-img"><img src="<?php echo(base_url() . 'assets/img/program/' . 'sanchita-gupta.jpg'); ?>" /></figure>
										<h2>Sanchita Gupta   -   IIFT, Delhi, 2020 – 2022 Intern, Microsoft</h2>
										<p>I am Sanchita Gupta, currently pursuing MBA in International Business from IIFT, Delhi. Throughout my MBA stint and also prior to that, I have often leveraged the content on Skillpromise platform for preparation at different stages. Though all the sections have been hugely beneficial for me, based on my interest and aspirations. Two segments from which I have personally benefitted a lot from are those of Guesstimates and Cast Study Analysis. Anyone pursuing a career in Consulting would know that there are plenty of resources on the internet which teach us about Consulting frameworks and methodologies. But what is really important while solving case studies or guesstimate questions during an interview is how well you break down the given problem into smaller bits to reach a solution and how you structure the approach and this is what Skillpromise has helped me a lot with. </p>
									</div>
								</div>
							</div>
							<div class="green-bg-content testimonial-content2">
								<div class="row">
									
									<div class="col-md-12">
									<figure class="left-img"><img src="<?php echo(base_url() . 'assets/img/program/' . 'sakshi-jha.jpg'); ?>" /></figure>
										<h2>Sakshi Jha -   MICA, Ahmedabad,  2021 - 2023</h2>
										<p>I am Sakshi Jha. I am a first-year student at MICA. For our summer placements, we received the guidance from Skillpromise for refining our employment readiness skills. They gave us pro tips on organizing our CVs, trained us to create an impact in group discussions and taught us to keep our cool in the interviews. The online and one-on-one mentoring given on aspects like CV building, internship pitch, self-introduction was very effective. The LMS resources also guided me to project the best version of myself in Behavioural questions, HR questions and guesstimates.  After getting trained by Skillpromise, I felt a significant rise in my confidence level, and I would give them a large share of the credit for my successful Summer Internship. I am really grateful to Skillpromis</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="program-slider green-bottom">
							<div class="program-name2 text-center" style="font-weight:600;"><figure class="test-icon"><img src="<?php echo(base_url() . 'assets/img/program/' . 'testimonial-icon-img.jpg'); ?>" /></figure> Testimonials - Students</div>
							<div class="green-bg-content testimonial-content2">
								<div class="row">
									
									<div class="col-md-12">
									<figure class="left-img"><img src="<?php echo(base_url() . 'assets/img/program/' . 'anubhav-das.jpg'); ?>" /></figure>
										<h2>Anubhav Das   -   IMT Hyderabad, 2018 - 2020 Compliance Analyst, D E Shaw Group, CTC: INR 20 Lakhs</h2>
										<p>I am Anubhav Das from IMT Hyderabad. I would like to acknowledge the role skillpromise.com played in my selection with “D. E. Shaw Group". I found the Self-Assessment section very helpful as it helped me understand my strengths, values, skills and areas of improvement in detail. Skillpromise CV section provided me with very valuable inputs on CV building and helped me create a convincing CV. Group discussions section of Skillpromise is very effective as it not only tells you about the basics of Group discussions but also incisive information about things like Economic Indicators, Employment Statistics, Population Statistics, Corruption statistics, Budget details etc. Overall, Skillpromise is a very powerful and focused interview preparation tool. </p>
									</div>
								</div>
							</div>
							<div class="green-bg-content testimonial-content2">
								<div class="row">
									
									<div class="col-md-12">
									<figure class="left-img"><img src="<?php echo(base_url() . 'assets/img/program/' . 'muskan-nankani.jpg'); ?>" /></figure>
										<h2>Muskan Nankani   -   IMT Hyderabad, 2019 – 2021 <br>Analyst, Deloitte. CTC: INR 7.5 Lakhs </h2>
										<p>I am Muskan from IMT Hyderabad. I am placed with Deloitte as an Analyst, thanks to the offline and online support provided by Skillpromise. The Learning Management System is very robust and complements the offline training very well. I found the Aptitude Development and Guesstimation sections great in terms of reach and depth. Bottles and Funnels concept of Skillpromise was an eye opener and helped me prepare for my interview in a very focused manner. Skillpromise helped me make me a compelling introduction and video CV on the FAB principle of sales. I strongly recommend Skillpromise to all the job seekers at various MBA colleges, as this great tool demystifies many myths about the interview preparation process.</p>
									</div>
								</div>
							</div>
							
						</div>
					</div>
					<div class="item">
						<div class="program-slider green-bottom">
							<div class="program-name2 text-center" style="font-weight:600;"><figure class="test-icon"><img src="<?php echo(base_url() . 'assets/img/program/' . 'testimonial-icon-img.jpg'); ?>" /></figure> Testimonials - Students</div>
							<div class="green-bg-content testimonial-content2">
								<div class="row">
									
									<div class="col-md-12">
									<figure class="left-img"><img src="<?php echo(base_url() . 'assets/img/program/' . 'abhinav-srivastava.jpg'); ?>" /></figure>
										<h2>Abhinav Srivastava   -  IMT, Hyderabad, 2018 – 2020 <br>Team Lead, FactSet, CTC: INR 8 Lakhs</h2>
										<p>My name is Abhinav Srivastava and I am second year MBA student at IMT, Hyderabad. I liked working on Skillpromise.com for my interview preparation. It is a very comprehensive with immense relevance. The aptitude section covers all the relevant topics in detail with  nicely explained solutions. Skillpromise helped me in creating an impactful CV, Introduction and video CV which helped me with a great start  with my interview at FactSet. Skillpromise will always have a substantial role in giving a great start to my career</p>
									</div>
								</div>
							</div>
							<div class="green-bg-content testimonial-content2">
								<div class="row">
									
									<div class="col-md-12">
									<figure class="left-img"><img src="<?php echo(base_url() . 'assets/img/program/' . 'aman-khan.jpg'); ?>" /></figure>
										<h2>Aman Khan   -   IMT Dubai, 2017 – 2019 <br>Management Trainee, Khaleej Times, UAE</h2>
										<p>This is Aman Khan from IMT Dubai. I am student of second year. Skillpromise imparted us the Interview Preparation Training. Skillpromise has helped me develop some of the key skills required to make an individual Industry Ready. Skillpromise modules have helped me a lot throughout my Recruitment procedure. I benefited a lot from the HR and Behavioral FAQs section. Brushing up my technical knowledge through the Technical FAQ section helped me do well in the Technical Round. I successfully secured a final placement with Khaleej Times, Dubai.</p>
									</div>
								</div>
							</div>
							<div class="contant text-center">
								<p class="bottom-text-green">Let us now look at the structure of the <strong>Placement PREP Program</strong></p>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="program-slider green-bg">
							<div class="program-name">Placement <br> PREP <br>Program <span class="plus">PLUS</span></div>
							<div class="program-img">
								<figure>
									<img src="<?php echo(base_url() . 'assets/img/program/' . 'program-structure.jpg'); ?>" />
									<figcaption>Program Structure</figcaption>
								</figure>
							</div>
						</div>
					</div>
					
					<div class="item">
						<div class="program-slider p-0">
							<div class="program-name2 text-center" style="font-weight:600;">Placement PREP Program <span class="plus">PLUS</span></div>
							<p class="bottom-text text-center">Placement PREP Program PLUS has two parts <strong>CORE SECTIONS & VALUE ADD SECTIONS</strong></p>
							<div class="green-bg-content core-section" style="padding:20px 15px;">
								<div class="row">
									<div class="col-6">
									<span class="core-title">CORE</span>
									<ul class="core-list">
										<li class="aptitude-development icon">Aptitude Development </li>
										<li class="guesstimation icon">Guesstimates</li>
										<li class="employment-documentation icon">Employment Documentation</li>
										<li class="group-discussions icon">Group Discussions</li>
										<li class="case-study-analysis icon">Case Study Analysis</li>
										<li class="self-assessment icon">Self - Assessment</li>
										<li class="personal-interview icon">Personal Interview</li>
										<li class="personal-interview icon">One-on-One Mentoring</li>
										<li class="personal-interview icon">Mock Interview with Feedback</li>
									</ul>
									</div>
									<div class="col-6">
									<span class="core-title">VALUE ADD</span>
									<ul class="core-list">
										<li class="assessment-centre icon">Assessment Centre</li>
										<li class="dashboard icon">Dashboard</li>
										<li class="blog icon">Blog</li>
										<li class="newsletter-list icon">Newsletter</li>
										<li class="resource-centre icon">Resource Centre</li>
										
									</ul>
									</div>
								</div>
							</div>
							
							<div class="content text-center pt-2">
								<p class="bottom-text">Let us now understand key topis covered under the <strong>CORE SECTIONS & VALUE ADD SECTIONS</strong></p>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="program-slider p-0">
							<div class="program-name2 text-center" style="font-weight:600; margin:0; padding:0">Placement PREP Program <span class="plus">PLUS</span></div>
							<p class="orange-title text-center" style=" margin:0">CORE SECTIONS</p>
							
							<div class="green-bg-content core-section" style="padding:4px 5px 28px;">
								<h3 class="title-sm text-center" style="font-size:16px; font-weight:700; margin:6px;">Face-to-face</h3>
								<ul class="core-list online">
									<li class="assessment-centre icon"><strong>INCISIVE MOCK INTERVIEW WITH MENTORING:</strong> Covers HR, Behavioral and Technical Questions, Self – Introduction, Curriculumm Vitae Evaluation, Evaluation and Mentoring on Work Experience, Internships and Live Projects</li>
									<li class="dashboard icon"><strong>ONE-ON-ONE MENTORING SESSION:</strong> Covers CV Building, Self – Introduction, how to talk about Internships/ Live Projects and how to answer HR/ Behavioural questions</li>
								</ul>
								<h3 class="title-sm text-center" style="font-size: 16px; margin:6px;  font-weight:700;">Online</h3>
								
										<ul class="core-list online">
											<li class="assessment-centre icon"><strong>PERSONAL INTERVIEW PREPARATION:</strong> Self-Introduction, Video Introduction, FAQs-HR, FAQs-Behavioral, FAQs-Technical, Attire, How to Communicate effectively,  Researching an employer and Art of Rapport Building during Interview</li>
											<li class="dashboard icon"><strong>SELF-ASSESSMENT:</strong> Incisive assessment of Values, Skills, Strengths, Attitude, Intelligence, Hobbies, Work Motivations, Wellness, Areas of Improvement, Etiquette, SWOT and PEST</li>
											<li class="blog icon"><strong>GROUP DISCUSSIONS (GD):</strong> What is a GD?, Why a GD?, Parameters evaluated during a GD,  How to initiate & conclude a GD?, What are the leadership roles during a GD?, Dos and Don'ts during a GD, 150+ GD Topics with Content</li>
											<li class="newsletter-list icon"><strong>EMPLOYMENT DOCUMENTATION:</strong> Components of a  Curriculum Vitae (CV) and Cover Letter, How to build an impactful CV and Cover Letter, Create your CV & Cover Letter using the builder, Dos & Don’ts of CV Building</li>
											<li class="resource-centre icon"><strong>CASE STUDY ANALYSIS:</strong> How to solve a case study?, What are the various tools to solve case studies? What are different types of case studies asked in a GD and Interview?</li>
											<li class="resource-centre icon"><strong>GUESSTIMATES:</strong> Covers Information & Data required for Guesstimates, Approaches to Solve Guesstimation problems and Solved Guesstimate problems</li>
											<li class="resource-centre icon"><strong>APTITUDE DEVELOPMENT:</strong> Covers  Quantitative Aptitude, Reasoning Aptitude, Data Interpretation and Verbal Ability, 5000+ solved problem with detailed solutions</li>
										</ul>
									
							</div>
							
							<!--<img src="<?php echo(base_url() . 'assets/img/program/' . 'online-img.jpg'); ?>" />-->
						</div>
					</div>
					<div class="item">
						<div class="program-slider p-0">
							<div class="program-name2 text-center" style="font-weight:600;">Placement PREP Program <span class="plus">PLUS</span></div>
							<p class="orange-title text-center">VALUE ADD SECTIONS</p>
							<div class="green-bg-content core-section" style="padding: 20px 8px;">
								<ul class="core-list online">
									<li class="assessment-centre icon"><strong>ASSESSMENT CENTRE:</strong> Assessment Centre gives you access to MCQs assessments on Aptitude and Domain Subjects. There are two types of assessments in every course for Aptitude and Domain Subjects – Pre - Assessment and Post – Assessment.  Assessment Centre gives you detailed Analytics of tests that you take</li>
									<li class="dashboard icon"><strong>BLOG:</strong> Blog offers informative articles on topics related to  Communication, Customer Service, Employability, Finance, Health, Lifestyle, Managerial Skills, Personal Productivity, Selling Skills and Philosophy</li>
									<li class="blog icon"><strong>DASHBOARD:</strong> Dashboard is an information management tool that gives you access to detailed Analytics of assessments taken by you. Dashboard also gives you access to worksheets that you fill during the program. You can download the worksheets filled by you in PDF format</li>
									<li class="resource-centre icon"><strong>RESOURCE CENTRE:</strong> Resource Centre offers you coaching on topics like How to make a Statement of Purpose (SOP)?, How to write an Essay?, How to create an impactful LinkedIn Profile?, How to perform well in Extempore?, etc.</li>
									<li class="newsletter-list icon"><strong>NEWSLETTER:</strong> Newsletter is monthly. Newsletter is a great tool that gives you access to articles on skills, industry insights and updates on contests/ new initiatives at Skillpromise</li>
								</ul>
							</div>
							<!--<img src="<?php echo(base_url() . 'assets/img/program/' . 'value-img.jpg'); ?>" />-->
							<div class="bottom-text-2 pt-5"><p class="bottom-text text-center" style="padding:0 8px;">Placement PREP Program deep dives into topics under <br><strong>CORE sections and VALUE ADD sections</strong>in terms of Reach and Depth. Let us now look at the highlights of each of these sections</p></div>
						</div>
					</div>
					<div class="item">
						<div class="program-slider green-bg">
							<div class="program-name">Placement <br> PREP <br>Program <span class="plus">PLUS</span></div>
							<div class="program-img">
								<figure>
									<img src="<?php echo(base_url() . 'assets/img/program/' . 'program-highlights.jpg'); ?>" />
									<figcaption>Program Highlights <br><small>CORE SECTIONS</small></figcaption>
								</figure>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="program-slider p-0">
						<div class="component-container">
							<div class="row align-items-center">
								<div class="col-md-5">
									<div class="online-component-logo">
										<figure class="component-img">
											<img src="<?php echo(base_url() . 'assets/img/program/' . 'component.png'); ?>" />
											<figcaption>Online Component <strong>Aptitude Development</strong></figcaption>
										</figure>
									</div>
								</div>
								<div class="col-md-7">
									<div class="program-name2"><span class="highlight-text">Highlights of</span>Placement PREP Program <span class="plus">PLUS</span></div>
								</div>
							</div>
							<div class="component-text">
								<p>An Aptitude Assessment is a systematic means of testing a job candidate's ability to solve problems, ability to analyze situations, ability to reason, ability to think logically, ability to take decisions based on data, ability to take decisions based on past trends, ability to understand graphs, tables and charts, ability to detect patterns and establish relationships, ability to visualize and ability to pay attention to details. </p>
							</div>
							<div class="highlights-bg">
								<h2>Highlights</h2>
								<ul>
									<li>5000+ solved Questions of various difficulty levels with detailed solutions: Quantitative (1954),  Reasoning (1326), Data Interpretation (367) and Verbal Ability (677)</li>
									<li>Comprehensive Aptitude Assessments for Quantitative, Reasoning, Verbal Ability and Data Interpretation </li>
									<li>5 Mock Assessments of 75 Questions each with questions from all the sections of Aptitude</li>
									<li>Every topic is dealt with incisively covering the following components: Formulas, Video Tutorials, Practice Questions with solutions (Low, Medium and High difficulty level), Questions asked in MBA entrance exams, GATE, GMAT, Bank PO and Campus Recruitment Test questions to give students exposure to different ways questions can be asked from a topic</li>
								</ul>
							</div>
							<div class="online-component">
								<img style="width:150px;" src="<?php echo(base_url() . 'assets/img/program/' . 'online-component.png'); ?>" />
							</div>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="program-slider p-0">
						<div class="component-container">
							<div class="row align-items-center">
								<div class="col-md-5">
									<div class="online-component-logo">
										<figure class="component-img">
											<img src="<?php echo(base_url() . 'assets/img/program/' . 'guesstimation-icon.png'); ?>" />
											<figcaption>Online Component <strong>Guesstimates</strong></figcaption>
										</figure>
									</div>
								</div>
								<div class="col-md-7">
									<div class="program-name2"><span class="highlight-text">Highlights of</span>Placement PREP Program <span class="plus">PLUS</span></div>
								</div>
							</div>
							<div class="component-text">
								<p>A Guesstimate is a rough approximation or an educated guess at something. Guesstimates have become an important part of interview process. Guesstimate questions help interviewer’s access candidate’s Ability to deal with Ambiguity, Process Orientation, Analytical Skills, Problem Solving Ability, Eye for Detail and Decision Making </p>
							</div>
							<div class="highlights-bg">
								<h2>Highlights</h2>
								<ul>
									<li>Learn various approaches for solving Guesstimate problems:  Demand/ Supply, Mathematical Approach, Top-Down and Bottom-Up Approach</li>
									<li>Get access to comprehensive data and Important Formulas required for solving Guesstimate problems </li>
									<li>Learn the Steps involved in solving a Guesstimate problem</li>
									<li>50+ solved Guesstimate problems with all the required steps</li>
								</ul>
							</div>
							<div class="online-component">
								<img style="width:150px;" src="<?php echo(base_url() . 'assets/img/program/' . 'guesstimation.png'); ?>" />
							</div>
						</div>
						</div>
					</div>
					<div class="item">
						<div class="program-slider p-0">
						<div class="component-container">
							<div class="row align-items-center">
								<div class="col-md-5">
									<div class="online-component-logo">
										<figure class="component-img">
											<img src="<?php echo(base_url() . 'assets/img/program/' . 'employment-documentation.png'); ?>" />
											<figcaption>Online Component <strong>Employment Documentation</strong></figcaption>
										</figure>
									</div>
								</div>
								<div class="col-md-7">
									<div class="program-name2"><span class="highlight-text">Highlights of</span>Placement PREP Program <span class="plus">PLUS</span></div>
								</div>
							</div>
							<div class="component-text">
								<p>Getting an interview opportunity completely depends on the quality of documents submitted by the candidate. The process of seeking employment begins with writing down details about yourself that you think will help your position yourself well in front of the prospective employer. A Curriculum Vitae is a detailed account of your Personal/ Professional information and your Achievements</p>
								<p>A cover letter for your Curriculum Vitae, or covering note is an introductory message that accompanies your CV when you apply for a job. The purpose of the cover letter is to persuade the employer to go through your Curriculum Vitae</p>
							</div>
							<div class="highlights-bg">
								<h2>Highlights</h2>
								<ul>
									<li>Learn about various sections of Curriculum Vitae (CV) & Cover letter</li> 
									<li>Learn how to represent information in each section of the CV</li>
									<li>Learn how to use ‘Action Verbs’ effectively in a CV</li>
									<li>Learn about how to answer questions from various sections of the CV</li>
									<li>Build your CV on the Website using the CV builder</li>
									<li>Learn how to create a video CV</li>

								</ul>
							</div>
							<div class="online-component">
								<img style="width:150px;" src="<?php echo(base_url() . 'assets/img/program/' . 'employment-documentation-img.png'); ?>" />
							</div>
						</div>
						</div>
					</div>
					<div class="item">
						<div class="program-slider p-0">
						<div class="component-container">
							<div class="row align-items-center">
								<div class="col-md-5">
									<div class="online-component-logo">
										<figure class="component-img">
											<img src="<?php echo(base_url() . 'assets/img/program/' . 'group-discussion-icon.png'); ?>" />
											<figcaption>Online Component <strong>Group Discussion</strong></figcaption>
										</figure>
									</div>
								</div>
								<div class="col-md-7">
									<div class="program-name2"><span class="highlight-text">Highlights of</span>Placement PREP Program <span class="plus">PLUS</span></div>
								</div>
							</div>
							<div class="component-text">
								<p>Corporate use Group Discussion's to access candidates Analytical Skills, Leadership Qualities, Communication, Flexibility, Knowledge and Teamwork. In this methodology, a group of candidates is given a topic or a case study, a few minutes to think about the topic and then 20 – 30 minutes to discuss the topic among themselves. Group Discussions help in short listing the candidates for the final interview, so it is necessary for the candidates to not only know the Dos and Don’ts but also thoroughly understand the procedure` and the ways of participating in a group discussions effectively</p>
							</div>
							<div class="highlights-bg">
								<h2>Highlights</h2>
								<ul>
									<li>Why is a Group Discussion Conducted?</li>
									<!--<li>What are different types of Group Discussions?</li>-->
									<li>What are various phases of a Group Discussion?</li>
									<li>What personality traits are accessed in a Group Discussion?</li>
									<li>What are various roles played during a Group Discussion?</li>
									<li>How to deal with tricky situations in a group discussion like how to initiate, how to conclude, how to deal with an unfamiliar topic and how to deal with a fish market situation?</li>
									<!--<li>What are the Do's and Don'ts of a Group Discussion?</li>-->
									<li>175+ GD topics with content from 13 categories like Social, Business, Abstract, Sports, Aphorisms, Technology, Legal, Environment etc.</li>

									
									
									<!--<li>Why is a Group Discussion Conducted?</li>
									<li>What are the personality traits accessed in a Group Discussion?</li>
									<li>What are various phases of a Group Discussion?</li>
									<li>What are various roles played during a Group Discussion?</li>
									<li>How do you Initiate and conclude a Group Discussion?</li>
									<li>How to deal with a fish market situation?</li>
									<li>100+ GD topics with content from categories like General, Social, Business, Abstract, Sports, Aphorisms etc.</li>-->

								</ul>
							</div>
							<div class="online-component">
								<img style="width: 150px;" src="<?php echo(base_url() . 'assets/img/program/' . 'group-discussion.png'); ?>" />
							</div>
						</div>
						</div>
					</div>
					<div class="item">
						<div class="program-slider p-0">
						<div class="component-container">
							<div class="row align-items-center">
								<div class="col-md-5">
									<div class="online-component-logo">
										<figure class="component-img">
											<img src="<?php echo(base_url() . 'assets/img/program/' . 'case-study-analysis-icon.png'); ?>" />
											<figcaption>Online Component <strong>Case Study Analysis</strong></figcaption>
										</figure>
									</div>
								</div>
								<div class="col-md-7">
									<div class="program-name2"><span class="highlight-text">Highlights of</span>Placement PREP Program <span class="plus">PLUS</span> </div>
								</div>
							</div>
							<div class="component-text">
								<p>A case is a hypothetical business situation with limited data and ambiguity where you are asked to be in the decision maker’s shoes and provide resolution. Case studies are used by employers to access interviewees on their domain expertise, analytical skills, problem-solving abilities, communication skills, cognitive flexibility and structured thinking. These exercises also help to determine how you prioritize and organize your work.</p>
							</div>
							<div class="highlights-bg">
								<h2>Highlights</h2>
								<ul>
									<li>Learn about various steps involved in Case Study Analysis</li>

									<li>Learn about the tools used in Case Study Analysis like Root Cause Analysis, 5 Why Technique, Fishbone Analysis, Pareto’s Rule and Control-Impact Matrix</li>

									<li>Learn about Case Study Analysis – Terminologies and Concepts</li>

									<li>Learn about different types of Case Study Analysis Frameworks – Profitability Framework, Market Sizing Framework, New Market Entry Framework,  Mergers & Acquisition Framework, Pricing Case Framework, 4 Ps Framework, 3 Cs Framework, Porter’s 5 forces, BCG Growth Share Matrix and McKinsey 7s Framework</li>

									<li>Case Studies and Caselets with Suggested Solutions</li>
									<!--<li>Learn about various steps involved in Case Study Analysis</li>

									<li>Learn about the tools used in Case Study Analysis like Root Cause Analysis, 5 Why Technique, Fishbone Analysis, Pareto’s Rule, MECE Framework, Mind Mapping etc.</li>

									<li>Learn about different types of cases – Profitability Cases, Market Sizing Cases, Business Operations Cases, Business Strategy Cases, HR Cases, Marketing Cases, Finance Cases, Operations Cases etc.</li>

									<li>25+ Solved Case Studies</li>

									<li>Practice case studies</li>-->


								</ul>
							</div>
							<div class="online-component">
								<img style="width:150px;" src="<?php echo(base_url() . 'assets/img/program/' . 'case-study-analysis.png'); ?>" />
							</div>
						</div>
						</div>
					</div>
					<div class="item">
						<div class="program-slider p-0">
						<div class="component-container">
							<div class="row align-items-center">
								<div class="col-md-5">
									<div class="online-component-logo">
										<figure class="component-img">
											<img src="<?php echo(base_url() . 'assets/img/program/' . 'self-assessment-icon.png'); ?>" />
											<figcaption>Online Component <strong>Self - Assessment</strong></figcaption>
										</figure>
									</div>
								</div>
								<div class="col-md-7">
									<div class="program-name2"><span class="highlight-text">Highlights of</span>Placement PREP Program <span class="plus">PLUS</span></div>
								</div>
							</div>
							<div class="component-text">
								<p>Self-Assessment is the process of gathering information about yourself in order to make informed career decisions. Self–Assessment is the most important exercise in career planning. Ability to do meaningful Self– Assessment is dependent on a person’s Intra-personal intelligence. This program will help you do a thorough assessment of your Values, Skills, Strengths, Areas of Improvement, Etiquettes, Attitude, Hobbies, Wellness, Intelligence, Work Motivations, Personal SWOT and PEST Analysis</p>
							</div>
							<div class="highlights-bg">
								<h2>Highlights</h2>
								<ul>
									<li>Do a detailed Assessment of your Values, Skills, Strengths, Areas of Improvement, Intelligence, Etiquette, Attitude, Wellness, Hobbies, Work Motivations and Goals </li>
									<li>Identify your strengths and areas of improvement in various sub-sections like values, skills, strengths, attitude, etiquette, intelligence and wellness</li>
									<li>Do a detailed swot and pest analysis</li>
									<li>Prepare your responses to FAQs asked from various sub-sections during the interview</li>
									<li>Retrieve your self-assessment data from the dashboard Section of Skillpromise</li>

									<!--<li>Detailed Assessment of Values, Skills, Strengths, Areas of Improvement, Intelligence, Etiquette's, Attitude, Wellness, Hobbies, Work Motivations, Goals and Personal SWOT Analysis through Action Sheets </li>
									<li>Self-Assessment data retrieval from the Analytics Section of Skillpromise</li>
									<li>Learn about Interview Questions asked on various parameters of Self-Assessment</li>-->


								</ul>
							</div>
							<div class="online-component">
								<img  style="width:150px;" src="<?php echo(base_url() . 'assets/img/program/' . 'self-assessment.png'); ?>" />
							</div>
						</div>
						</div>
					</div>
					<div class="item">
						<div class="program-slider p-0">
						<div class="component-container">
							<div class="row align-items-center">
								<div class="col-md-5">
									<div class="online-component-logo">
										<figure class="component-img">
											<img src="<?php echo(base_url() . 'assets/img/program/' . 'personal-interview-icon.png'); ?>" />
											<figcaption>Online Component <strong>Personal Interview</strong></figcaption>
										</figure>
									</div>
								</div>
								<div class="col-md-7">
									<div class="program-name2"><span class="highlight-text">Highlights of</span>Placement PREP Program <span class="plus">PLUS</span></div>
								</div>
							</div>
							<div class="component-text">
								<p>Personal Interview (PI) is a tool used by corporate to access the suitability of a candidate for a particular role.  The company is looking for a candidate who matches their requirements and the closer a fit, the more competitive a student will be. Interviewers access candidates by asking them CV based questions, HR questions, Behavioural questions, Domain/ Subject questions, Case based questions and Guesstimation questions. Some employers use extempore as a technique to access creativity, structured thinking and communication</p>
							</div>
							<div class="highlights-bg">
								<h2>Highlights</h2>
								<ul>
								<li>Learn how to master communication for a Face-to-fact Interview, Telephonic Interview and Video Interview</li>
								<!--<li>Get in depth insights on mental preparation required for a Personal Interview</li>-->
								<li>Learn about interview essentials like Body Language, Etiquette and Attire required for a Personal Interview</li>
								<li>Learn how to make an impactful Self-Introduction on FAB principle</li>
								<!--<li>Learn the art of rapport building during an interview</li>-->
								<li>Get access to 100+ HR/ Behavioral Questions with Answers </li>
								<li>Get access to 15000+ Technical/ Domain Questions with answers from Engineering (6627), Management (1825), Humanities (2903), Science (2209), Healthcare (764), Commerce (300), Law (166), Hotel Management (264) and Journalism & Mass Communication (200)</li>

									<!--<li>Learn how to master communication for a Face-to-fact Interview, Telephonic Interview and Video Interview</li>
									<li>Learn about Body Language, Etiquette and Attire required for a Personal Interview</li>
									<li>Learn how to make an impactful Self-Introduction and an effective Curriculum Vitae, including a video CV</li>
									<li>100+ HR/ Behavioral Questions with Answers </li>
									<li>15000+ Technical/ Domain Questions with answers from Engineering, Management, Humanities, Science, Healthcare, Commerce, Law, Hotel Management and Journalism & Mass Communication</li>
									-->
								
								</ul>
							</div>
							<div class="online-component">
								<img style="width:150px;" src="<?php echo(base_url() . 'assets/img/program/' . 'personal-interview.png'); ?>" />
							</div>
						</div>
						</div>
					</div>
					
					<div class="item">
						<div class="program-slider p-0">
						<div class="component-container">
							<div class="row align-items-center">
								<div class="col-md-5">
									<div class="online-component-logo">
										<figure class="component-img">
											<img src="<?php echo(base_url() . 'assets/img/program/' . 'personal-interview-icon.png'); ?>" />
											<figcaption>Face-to-face Component <strong>One-on-One Mentoring</strong></figcaption>
										</figure>
									</div>
								</div>
								<div class="col-md-7">
									<div class="program-name2"><span class="highlight-text">Highlights of</span>Placement PREP Program <span class="plus">PLUS</span></div>
								</div>
							</div>
							<div class="component-text">
								<p>30 MINUTES of mentoring session by an expert, with incisive experience in Corporate and Academia at leadership roles, covering the following:</p>
							</div>
							<div class="highlights-bg">
								<!--<h2>Highlights</h2>-->
								<ul>
									<li>Curriculum Vitae (CV) review and feedback for improvement</li>
									<li>How to mention Work Experience, Internships, Live Projects, Tools, Certifications, Positions of Responsibilities held and accomplishments on the CV</li>
									<li>Introduction review and feedback for improvement</li>
									<li>How to answer key HR questions, behavioral questions and domain/ technical questions?</li>
									<li>Hygiene and Attire tips for the interview</li>
									<li>Verbal & Non-verbal communication tips for the interview</li>
									<li>Questions that can be asked by the interviewee during the interview</li>
									<li>One-on-one will be a Recorded session. Recording will beshared at the end of one-on-one</li>
									<li>One-on-one report shared with the candidate</li>
									
								
								</ul>
							</div>
							<div class="online-component">
								<img style="width:150px;" src="<?php echo(base_url() . 'assets/img/program/' . 'face-to-face.png'); ?>" />
							</div>
						</div>
						</div>
					</div>
					
					<div class="item">
						<div class="program-slider p-0">
						<div class="component-container">
							<div class="row align-items-center">
								<div class="col-md-5">
									<div class="online-component-logo">
										<figure class="component-img">
											<img src="<?php echo(base_url() . 'assets/img/program/' . 'personal-interview-icon.png'); ?>" />
											<figcaption>Face-to-face Component <strong>Mock Interview</strong></figcaption>
										</figure>
									</div>
								</div>
								<div class="col-md-7">
									<div class="program-name2"><span class="highlight-text">Highlights of</span>Placement PREP Program <span class="plus">PLUS</span></div>
								</div>
							</div>
							<div class="component-text">
								<p>AN EMULATION OF A JOB INTERVIEW, for 30 minutes, with an expert having rich Corporate and Academia experience. The purpose of Mock Interview is to help the candidate understand what is expected out of him/ her during a real job interview and how performance can be improvised. Mock interview will be recorded and video will be shared with the candidate. Candidate also gets an Interview Assessment Score Sheet giving the candidate a feedback on his or her performance in HR, Behavioral and Technical round. Candidate also gets evaluated for his confidence, thought speed, communication and honesty. Mock interview covers the following:</p>
							</div>
							<div class="highlights-bg">
								<!--<h2>Highlights</h2>-->
								<ul>
									<li>Evaluation and Feedback on Curriculum Vitae</li>
									<li>Evaluation and Feedback on Self-Introduction</li>
									<li>Evaluation of Communication – Verbal and Non-verbal, Confidence, Presence of mind, Though speed, honesty, Problem Solving abilities, Process Orientation, Creativity and Teamwork</li>
									<li>Evaluation of answers to HR, Behavioral and Technical questions followed by feedback</li>
									
								
								</ul>
							</div>
							<div class="online-component">
								<img style="width:150px;" src="<?php echo(base_url() . 'assets/img/program/' . 'mock-interview.png'); ?>" />
							</div>
						</div>
						</div>
					</div>
					
					<div class="item">
						<div class="program-slider green-bg">
							<div class="program-name">Placement <br> PREP <br>Program <span class="plus">PLUS</span></div>
							<div class="program-img">
								<figure>
									<img src="<?php echo(base_url() . 'assets/img/program/' . 'value-add-sections.png'); ?>" />
									<figcaption>Program Highlights <br><small>VALUE ADD SECTIONS</small></figcaption>
								</figure>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="program-slider p-0">
						<div class="component-container">
							<div class="row align-items-center">
								<div class="col-md-5">
									<div class="online-component-logo">
										<figure class="component-img">
											<img src="<?php echo(base_url() . 'assets/img/program/' . 'assessment-centre-icon.png'); ?>" />
											<figcaption>Value Adds <strong>Assessment Centre</strong></figcaption>
										</figure>
									</div>
								</div>
								<div class="col-md-7">
									<div class="program-name2"><span class="highlight-text">Highlights of</span>Placement PREP Program <span class="plus">PLUS</span></div>
								</div>
							</div>
							<div class="component-text pt-3 pb-4">
								<p>Employers use assessments to test skills not readily assessable from an interview alone. Skillpromise Assessment center is created keeping this in mind. Skillpromise assessment center has Aptitude assessments and Domain/ Subject assessments. All the assessments are in the form of MCQs. Skillpromise Assessment Center has Comprehensive Assessments with multiple topics. Detailed Assessment Analytics helps you identify your strong and weak areas. There are two types of assessments for every subject – Pre - Assessment and Post - Assessment</p>
							</div>
							<img src="<?php echo(base_url() . 'assets/img/program/' . 'assessment-centre.png'); ?>" />
						</div>	
						</div>
					</div>
					<div class="item">
						<div class="program-slider p-0">
						<div class="component-container">
							<div class="row align-items-center">
								<div class="col-md-5">
									<div class="online-component-logo">
										<figure class="component-img">
											<img src="<?php echo(base_url() . 'assets/img/program/' . 'blog-icon.png'); ?>" />
											<figcaption>Value Adds <strong>Blog</strong></figcaption>
										</figure>
									</div>
								</div>
								<div class="col-md-7">
									<div class="program-name2"><span class="highlight-text">Highlights of</span>Placement PREP Program <span class="plus">PLUS</span></div>
								</div>
							</div>
							<div class="component-text">
								<p><span>Skillpromise Blog</span> gives you access to informative articles from the following topics:</p>
								<ul>
									<li>Communication</li>
									<li>Customer Service</li>
									<li>Employability</li>
									<li>Finance</li>
									<li>Health</li>
									<li>Lifestyle</li>
									<li>Managerial Skills</li>
									<li>Personal Productivity</li>
									<li>Selling Skills </li>
									<li>Philosophy</li>
								</ul>
								<p>These are <span>INTERACTIVE BLOGS</span> that allow you to share your opinion and give your inputs on the articles. Blogs are designed with an objective of developing your skills and personality. Also, information in the blogs can help you present yourself better in an interview</p>
							</div>
							
							<img style="max-width:300px;" src="<?php echo(base_url() . 'assets/img/program/' . 'blog-img.png'); ?>" />
						</div>	
						</div>
					</div>
					<div class="item">
						<div class="program-slider green-bottom">
						<div class="component-container">
							<div class="row align-items-center">
								<div class="col-md-5">
									<div class="online-component-logo">
										<figure class="component-img">
											<img src="<?php echo(base_url() . 'assets/img/program/' . 'dashboard-icon.png'); ?>" />
											<figcaption>Value Adds <strong>Dashboard</strong></figcaption>
										</figure>
									</div>
								</div>
								<div class="col-md-7">
									<div class="program-name2"><span class="highlight-text">Highlights of</span>Placement PREP Program <span class="plus">PLUS</span></div>
								</div>
							</div>
							<div class="component-text pt-3">
								<p><span>Skillpromise Dashboard</span> is an information management tool that provides you access to the following:</p>
								<ul>
									<li>Detailed Analysis of the Assessments taken by you </li>
									<li>Information about assessments not taken by you</li>
									<li>PDF downloads of the work sheets filled by you in various sections of the program</li>
									<li>One-on-one Report</li>
									<li>Mock Interview Marksheet</li>

									
								</ul>
								
							</div>
							
							
						</div>	
						<img style="width:100%; margin-top:0px;" src="<?php echo(base_url() . 'assets/img/program/' . 'dashboard-img.jpg'); ?>" />
						</div>
					</div>
					
					<div class="item">
						<div class="program-slider p-0">
						<div class="component-container">
							<div class="row align-items-center">
								<div class="col-md-5">
									<div class="online-component-logo">
										<figure class="component-img">
											<img src="<?php echo(base_url() . 'assets/img/program/' . 'dashboard-icon.png'); ?>" />
											<figcaption>Value Adds <strong>Resource Centre</strong></figcaption>
										</figure>
									</div>
								</div>
								<div class="col-md-6">
									<div class="program-name2"><span class="highlight-text">Highlights of</span>Placement PREP Program <span class="plus">PLUS</span></div>
								</div>
							</div>
							
							<div class="green-bg-content recouce-program">
								<div class="row grid-5">
									<div class="col-md-3"><img src="<?php echo(base_url() . 'assets/img/program/' . 'statement-of-purpose.png'); ?>" /></div>
									<div class="col-md-9">
										<h2>Statement of Purpose (SOP)</h2>
										<p>A Statement of Purpose is a description of who you are as a student and what you are looking for in your career. You are required to make an SOP  when you apply for admission to a college. As an interviewee, you can be probed about your career aspirations and goals, by the employer. This section will mentor you on how to make an impactful SOP</p>
									</div>
								</div>
							</div>
							
							<div class="green-bg-content recouce-program">
								<div  class="resource-centre">
								<div class="row grid-5">
									<div class="col-md-3"><img src="<?php echo(base_url() . 'assets/img/program/' . 'extempore.png'); ?>" /></div>
									<div class="col-md-9">
										<h2>Extempore</h2>
										<p>An <span>Extempore</span> speech is an impromptu speech which the candidate is required to make on a topic given there and then. You are expected to start speaking about the topic as soon the topic is announced by the interviewer. Extempore is used by some employers to check your creativity, thought speed, communication and thought process. Learn how to successfully approach extempore on different types of topics</p>
									</div>
								</div>
								</div>
							</div>
							<div class="green-bg-content recouce-program">
								<div class="row grid-5">
									<div class="col-md-3"><img src="<?php echo(base_url() . 'assets/img/program/' . 'essay-writing.png'); ?>" /></div>
									<div class="col-md-9">
										<h2>Essay Writing</h2>
										<p>Essay writing is a tool required equally by students and professionals. Essay writing helps in evaluation of creativity, writing skills, persuasion skills, intelligence, though speed, critical thinking and communication. Learn how to take a deep dive into a topic, analyze it, share your thoughts, and supplement them with facts.</p>
									</div>
								</div>
							</div>
							
							<div class="green-bg-content recouce-program" style="padding:4px;">
								<div class="resource-centre">
								<div class="row grid-5">
									<div class="col-md-3"><img src="<?php echo(base_url() . 'assets/img/program/' . 'linkedIn.png'); ?>" /></div>
									<div class="col-md-9">
										<h2>Essentials of LinkedIn Profile</h2>
										<p><span>LinkedIn</span> is world’s largest professional network. Whether you are an experienced professional or just getting started, having a great LinkedIn profile is an absolute must. Learn about essential components of a LinkedIn profile like how to write professional summary, how to present internships, projects and work experience, how to manage endorsements and recommendations, how to join relevant groups etc.</p>
									</div>
								</div>
								</div>
							</div>
							
							
						</div>	
						</div>
					</div>
					
					<div class="item">
						<div class="program-slider green-bottom">
						<div class="component-container">
							<div class="row align-items-center mt-2">
								<div class="col-md-5">
									<div class="online-component-logo">
										<figure class="component-img">
											<img src="<?php echo(base_url() . 'assets/img/program/' . 'newsletter.png'); ?>" />
											<figcaption>Value Adds <strong>Newsletter</strong></figcaption>
										</figure>
									</div>
								</div>
								<div class="col-md-7">
									<div class="program-name2"><span class="highlight-text">Highlights of</span>Placement PREP Program <span class="plus">PLUS</span></div>
								</div>
							</div>
							<div class="row mb-2 align-items-center">
								<div class="col-md-8">
									<div class="component-text" style="line-height:1.1;">
										<p>Learn new skills with Skillpromise email  Newsletter every month and get your free downloadable <span>Art of Building Credibility eBook</span> when you subscribe to Skillpromise Newsletter. Following are the contents of the newsletter:</p>
										<ul style="margin:0">
											<li>A career skill article</li>
											<li>An Employability article</li>
											<li>An Industry Profile</li>
											<li>Expert opinions from Academic and Corporate world</li>
											<li>A Lifestyle Article</li>
											<li>Information about our new programs and initiatives</li>
										</ul>
										
									</div>
								</div>
								<div class="col-md-4">
									<img src="<?php echo(base_url() . 'assets/img/program/' . 'ebook.png'); ?>" />
								</div>
							</div>
							
							
							<img style="width:100%;" src="<?php echo(base_url() . 'assets/img/program/' . 'newsletter-img.jpg'); ?>" />
						</div>
												
						</div>
						</div>
					<div class="item">
						<div class="program-slider green-bg">
							<!--<div class="sana-text">
								<img src="<?php echo(base_url() . 'assets/img/program/' . 'sana-text.png'); ?>" />
							</div>-->
							<div class="program-name">Placement <br> PREP <br>Program <span class="plus">PLUS</span></div>
							<div class="program-img">
								<figure>
									<img src="<?php echo(base_url() . 'assets/img/program/' . 'sana.png'); ?>" />
									<figcaption>Skillpromise Introduction & <br> Methodology</figcaption>
								</figure>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="program-slider p-0">
							<div class="component-container">
							<div class="program-name4">Skillpromise Introduction</div>
							<div class="green-bg-content skillpromise-program">
								<p>Incorporated in August 2017, Skillpromise.com, a part of Sana Skillpromise Education Private Limited, is an e -learning platform that helps School students, Higher Education Students and Professionals, engage in skill development programs.</p>
								<p>Skillpromise programs integrate self-assessment and development need analysis, with an objective of continuous improvement</p>
								<p>Skillpromise.com has team members from both, Corporate and Academic world, all of whom are focused on developing skill enhancement programs, with world class, incisive and comprehensive content to help you reach optimal levels of your efficiency.</p>
								<p>Skillpromise.com has created “Learning Accountability Loops” that tightly integrate Self-monitoring, Self-Evaluation, and Self-Improvisation. </p>
							</div>
							<div class="program-name4" style="margin-top:8px;">Skillpromise Methodology</div>
							<div class="green-bg-content skillpromise-program">
							<div class="row align-items-center">
								<div class="col-md-5"><figure><img src="<?php echo(base_url() . 'assets/img/program/' . 'sana-2.png'); ?>" /></figure></div>
								<div class="col-md-7">
								<div class="d-flex sana-title align-items-center">
									<h3>Sana</h3> <p>The Skillpromise Way<sup>TM</sup></p>
									</div>
								</div>
							</div>
								
								<p>Self-Assessment & Development Need Analysis (SANA) is the methodology used in all Skillpromise programs. Students are encouraged to introspect and access their strength areas and areas of improvement in various sections of employability. This is followed by creation of a plan for improvisation with clearly defined timelines with the help of Work/ Action sheets </p>
								<p>Employment Readiness program encourages students to focus on their academic, personal and professional growth so they learn how to thrive in a rapidly changing world. </p>
							</div>
						</div>
						</div>
					</div>
					<div class="item">
						<div class="program-slider green-bg">
							
							<div class="program-name">Placement <br> PREP <br>Program <span class="plus">PLUS</span></div>
							<div class="program-img">
								<figure>
									<img src="<?php echo(base_url() . 'assets/img/program/' . 'why-choose.png'); ?>" />
									<figcaption>Why Choose <br>Placement PREP <br>Program?</figcaption>
								</figure>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="program-slider green-bottom h-20">
							<img src="<?php echo(base_url() . 'assets/img/program/' . 'why-choose-banner.png'); ?>" />
							<div class="component-container">
							<div class="program-name2 text-center" style="margin-bottom:5px; padding-top:5px; font-weight:600; font-size:16px;">Why Choose Placement PREP Program PLUS?</div>
							<div class="component-text why-choose">
								<!--<div class="arrow-text">
									
									<img src="<?php echo(base_url() . 'assets/img/program/' . 'arrow.png'); ?>" />
								</div>-->
								<p><strong>CONVENIENCE:</strong> Placement PREP Program is a Self-Paced, Online Program. You can complete the coaching material and assignments at your own pace, in the comfort of your home. This program is a great enabler in current pandemic situation</p>
								<p><strong>ENHANCED CONFIDENCE LEVELS:</strong> Placement PREP Program will help you understand yourself in terms of your Values, Skills, Areas of Improvement, Goals, Intelligence Mix, Hobbies, Work Motivations, Etiquettes, Attitude and External environment. This program will also help you understand the Employment process holistically which will enhance your confidence and give you the feeling of being in control</p>
								<p><strong>INFORMED DECISION MAKING:</strong> Placement PREP Program will equip you with a clear picture about your  Personality, Work Motivations, Future aspirations, Resources at hand and Action plans. In light of all this well researched information, you will be able to make informed decisions</p>
								<p><strong>INSTANT RETURN ON LEARNING:</strong>  Placement PREP Program will enable you to use your learning immediately. As soon as you finish a section, you know the impact of your learnings on your future communication and behavior. This will enable you to make a course correction immediately</p>
								<p><strong>EASY INFORMATION ACCESS:</strong> Placement PREP Program will enable you to document your learnings and your action plans, by making you fill action sheets, at the end of every section. You can retrieve this information from the Analytics section of Skillpromise.com, at your convenience</p>
								<!--<p><strong>COMPREHENSIVENESS OF CONTENT:</strong> Placement PREP Program offers Incisive, Accurate and Comprehensive content. You don’t have to refer to additional resources, online or offline</p>-->
								<p><strong>PRIVACY:</strong> Reflective learning in a classroom  environment  may make you uncomfortable as you won’t like to share your values, skills, strengths or areas of improvement with everybody. You do not have to worry about all these things when you are taking the program online.</p>
							</div>
							</div>
							
						</div>
					</div>
					<div class="item">
						<div class="program-slider green-bottom">
							
							<div class="component-container">
							<div class="program-name4 mb-5">Contact Us</div>
								<div class="component-text mb-4">
									<p style="font-size:14px;">Feel free to get in touch with us, in case you have any Queries, Requests or Suggestions</p>
								</div>
							</div>
								<div class="contact-slider" style="background-image:url(<?php echo(base_url() . 'assets/img/program/' . 'contact-bg.png'); ?>)">
									<p><span><img src="<?php echo(base_url() . 'assets/img/program/' . 'phone-icon.png'); ?>" /></span> +91 98110 32026</p>
									<p><span><img src="<?php echo(base_url() . 'assets/img/program/' . 'email-icon.png'); ?>" /></span> vikas@skillpromise.com</p>
								</div>
								<div class="component-container">
								<div class="text-center copyright">
								<p>© 2021 Sana Skillpromise Education Private Limited. All rights reserved.</p>
								<p>Skillpromise is a registered trademark of Sana Skillpromise Education Pvt. Ltd.</p>
								<p>Address: J – 7/123, Third Floor, Rajouri Garden, New Delhi – 110027</p>
								<p>Company Identity Number U74999DL2017PTC322230 </p>
								<p>PAN Number AAZCS0922P</p></div>
								</div>
							
						</div>
					</div>
					
				 </div>
				  </div>
				  
				</div>
			</div>
			<div class="col-md-5">
				<div class="program-content green-bg-content">
					<p>Skillpromise Placement Preparation Program is an incisive, comprehensive, and credible placement Preparation program that helps you equip yourself with the science and art that goes behind acing your job interview by providing you intensive coaching on various selection tools used by companies during the selection process like Aptitude Development, Guesstimates, Case Study Analysis, CV Building, Group Discussion, Self-Assessment, Personal Interview, Extempore and Essay Writing </p>
					<p>Skillpromise offers two types of Placement Preparation Programs:</p>
					<ol>
						<li>Placement PREP Program</li>
						<li>Placement PREP Program PLUS</li>
					</ol>
					<p>Placement PREP Program mentors’ job seekers online only whereas Placement PREP Program PLUS, in addition to the online mentoring, offers 30 minutes of one-on-one coaching and 30 minutes of Mock Interview with feedback from mentors with rich corporate and academia experience</p>
				</div>
				<div class="text-center mt-2">
				<button type="button" class="btn btn-orange" data-dismiss="modal" aria-label="Close">Close</button></div>
			</div>
		</div>
		
		
		
         
      </div>
    </div>
  </div>
</div>
