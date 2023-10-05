<?php $this->load->view('home_header_view'); ?> 


<!-- Content Row --><br><br>
<div class="container main_container">
    <div class="main_body">
        <div class="row"> 


            <section class="col-md-12" style="min-height: 395px;">

                <div class="panel">
                        <h1 class="header_text">Contact Us</h1>
                </div> 


                <div class="text-justify"> 

                    <div class="row">
                        <div class="col-md-6">
                    <img style="width: 848px;" class="img-responsive" src="<?php echo(base_url() . 'assets/img/' . 'contact.jpg'); ?>" >

                    </div>
                    <div class="col-md-6">
                    <!-- form start-->
                    <div class="contact-form">
                        <p><strong>Please indicate your Enquiry Type</strong></p>
                        <div class="row">
                            <form action="<?php echo base_url(); ?>contact_us_action" method="post">

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label required sr-only" for="select"></label>
                                        <select class="form-control" name="enq_type">
                                            <option>Enquiry Type </option>
                                            <option>I need some Information</option>
                                            <option>I seek permission to reproduce some content</option>
                                            <option>I want to report an error in the content</option>
                                            <option>I want to report a technical problem</option>
					   <option>I would like to write an Article for Blog</option>
                                            <option>I would like to advertise with Skillpromise.com</option>
                                            <option>I want to enquire about a corporate tie up</option>
                                            <option>I want to enquire about an institutional tie up</option>
					
                                             
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label sr-only " for="Name"></label>
                                        <input id="name" type="text" name="name" placeholder="Name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label sr-only " for="email"></label>
                                        <input id="email" type="email" name="email" placeholder="Email" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label sr-only " for="Phone"></label>
                                        <input id="phone" type="text" name="phone" placeholder="Phone" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb20">
                                    <div class="form-group">
                                        <label class="control-label sr-only" for="textarea"></label>
                                        <textarea class="form-control pdt20" name="msg" id="textarea" name="textarea" rows="4" placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                    <button class="btn btn-success btn-sm ">Send message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- form end-->
                    </div>

                    </div>

                    <p>We will keep your information confidential. See Our <a href="privacy-policy" title="">Privacy Policy</a> for more details</p>
                    <br>
                    <div class="well">
                        <p><strong>Legal Information</strong></p>
                        <p>Skillpromise.com is owned and operated by Sana Skillpromise Education Private Limited, which is registered in India under Corporate Identity Number U74999DL2017PTC322230</p>

                        <div class="row">
                            <div class="col-sm-6">
                                <p><strong>Registered Address</strong></p>
                                <p>J – 7/ 123, Third Floor<br>
                                    Rajouri Garden, New Delhi, India</p>
                                    Pin code: 110027<br>
                                    </p>
                            </div>
                            <div class="col-sm-6">
                                <p><strong>Mailing Address</strong></p>
                                <p>2c,Shree Sai Tower<br>Burdwan Compound<br>
                                Ranchi-834001<br>
                                Jharkhand<br>
                                    </p>
                            </div>
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
