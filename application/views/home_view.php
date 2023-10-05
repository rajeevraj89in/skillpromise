<?php
$this->load->view('home_header_view');
?>

<style>
    .panel-default>.panel-heading {
        color: #fdfafa !important;
        background-color: #25897a !important;
        border-color: #ddd;
    }
</style>
<!-- Content Row -->
<div class="container main_container">
    <div class="row">
        <div class="col-md-6">
            <h5 class="sidebar-title">Testimonials</h5>
                <div class="t-tab">
<?php
$filter[0]['id']="is_deleted";
$filter[0]['value']=0;
 $records = $this->main_model->get_records_group_by("testimonials", $filter, "name,id",array("name","id"),"id");
// echo "<pre>";
                    //print_r($records);die;
                    $str=""

?>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <?php
                        $i=1;
                        foreach($records as $val){
                            if($i == 1)
                        echo '<li role="presentation" class="active"><a href="#'.$val['name'].'" aria-controls="'.$val['name'].'" role="tab" data-toggle="tab">'.$val['name'].'</a></li>';
                        else
                        echo '<li role="presentation" class=""><a href="#'.$val['name'].'" aria-controls="'.$val['name'].'" role="tab" data-toggle="tab">'.$val['name'].'</a></li>';
                        $i++;
                    }
                        ?>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">

                        <?php
                        $i=1;
                        foreach($records as $val){
                            if($i == 1)
                            echo '<div role="tabpanel" class="tab-pane active" id="'.$val['name'].'">';
                            else
                            echo '<div role="tabpanel" class="tab-pane" id="'.$val['name'].'">';
                            echo '<div id="testimoni-owl'.$i++.'" class="owl-carousel testimoni-owl">';
                            $filter[0]['id'] = 'name';
                           $filter[0]['value'] = $val['name'];
                           $req = array("*");
                           $rec = $this->main_model->get_many_records("testimonials", $filter, $req, 'id');
                            foreach($rec as $v){
                                 $limited_word = word_limiter(strip_tags($v['detailed_desc']));
                                 $read_more=base_url()."testimonials/".$v['id'];
                                  $img="";
                                  if($v['image_file'] != ""){
                                      $url=base_url()."assets/img/uploads/".$v['image_file'];
                                      $img=' <div class="img-cover">
                                        <img src="'.$url.'" />
                                    </div>';
                                  }
                                echo '<div class="item">
                                <div class="row">

                                    <div class="col-md-8">
                                        <div class="content-wrap">
                                            <!--<h4>'.$val['name'].'</h4>
                                             <span class="testimonial-icon"></span>-->
                                            <p>'.$limited_word.'

                                            </p>
                                            <span class="text-center" style="display:none;"><a class="btn btn-success" href="'.$read_more.'">Read more</a></span>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="author d-flex justify-content-between align-item-center flex-direction-col">'.$img.'<p> <span></span>'.$v['author'].'</p></div>
                                    </div>

                                </div>

                                </div>';
                            }

                            echo '</div>';
                            echo '</div>';
                        }
                        ?>







                    </div>
                    <!-- Tab panes end-->




                </div>
        </div>
        <div class="col-md-6">
            
        </div>
    </div>
    <div class="main_body">
        <div class="row">
            <div class="col-md-7 sliderimg">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="border: 1px solid  #e6e6e6;">
                     <div style="border:1px solid green;padding:1% 5% 3% 5%;width:100% !important;font-size:20px;height:43px !important;background-color:green;color:white;text-align:center;">FREE Assessment Center</div>
                    <!-- Indicators -->
                    <!--ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active">Skill Center</li>
                        <li data-target="#carousel-example-generic" data-slide-to="1">Assessment center</li>
                        <li data-target="#carousel-example-generic" data-slide-to="2">Employment Center</li>
                    </ol-->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>


                    <div class="carousel-inner" >
                        <div class="item active" style="border:0px solid #e8dcdc;">

                            <span class="slider-title"></span>
                            <div class="FlexSlider">
                                
                                <div class="header-text hidden-xs">
                                    <div class="" style="padding-left:7% !important;padding-right:7% !important;">
                                       
                                        <h3 style="color:black;">How are Feeling today ?</h3>
                                           <p class="text-justify" style="font-size:15px;">Wellness Assessment will help you improve your awareness about your wellness and also help you to reflect on components of Wellness that you may not have considered before
</p>
                                        <div class="slider_btn text-right" >
                                            <!--<a href="<?php echo(base_url() . "skill-talk-slider"); ?>">Know More</a>-->
                                            <a href="<?php echo(base_url() . "home_sheets_wellness/sheets/43"); ?>" style="background-color:white;border:1px solid black;color:black;border-radius:0px;">  Learn More  </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="sliderImage">
                                    <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/' . 'Wellness.jpeg'); ?>" width="100%" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="item" style="border:0px solid #e8dcdc;">
                            <span class="slider-title"></span>
                            <div class="FlexSlider">
                                <div class="header-text hidden-xs">
                                    <div class="" style="padding-left:7%;padding-right:7%;">
                                                                                <!--<span style="border:1px solid green;padding:4% 5% 3% 5%;width:300px;font-size:20px;height:43px;background-color:green;color:white;text-align:center;margin:6% 5% 3% 0%">FREE Assessment Center</span>-->
                                        <h3  style="color:black;">How good are your CREDIBILITY BUILDING Skills?</h3>
                                      <p class="text-justify" style="font-size:15px;">Take this quick assessment to explore your understanding of various techniques of CREDIBILITY BUILDING. </p>
                                        <div class="slider_btn text-right" >
                                            <a href="<?php  echo(base_url() . "home_sheets/sheets/61"); ?>" style="background-color:white;border:1px solid black;color:black;border-radius:0px;">  Learn More  </a>
                                              <!--<a href="<?php //echo(base_url() . "creative"); ?>">Know More</a>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="sliderImage">
                                    <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/' . 'bannerNew2.jpg'); ?>" width="100%" alt="">
                                </div>
                            </div>
                        </div>

                          <div class="item" style="border:0px solid #e8dcdc;">
                            <span class="slider-title"></span>
                            <div class="FlexSlider">
                                <div class="header-text hidden-xs">
                                    <div class="" style="padding-left:7%;padding-right:7%;">
                                                                                <!--<span style="border:1px solid green;padding:4% 5% 3% 5%;width:300px;font-size:20px;height:43px;background-color:green;color:white;text-align:center;margin:6% 5% 3% 0%">FREE Assessment Center</span>-->
                                        <h3  style="color:black;">Mind your ETIQUETTE</h3>
                                      <p class="text-justify" style="font-size:15px;">Take this assessment to explore your understanding of various types of ETIQUETTE like Email Etiquette, Social Etiquette, Dining Etiquette, Telephone Etiquette and Business Etiquette</p>
                                        <div class="slider_btn text-right" >
                                            <a href="<?php  echo(base_url() . "home_sheets/sheets/45"); ?>" style="background-color:white;border:1px solid black;color:black;border-radius:0px;">  Learn More  </a>
                                              <!--<a href="<?php //echo(base_url() . "creative"); ?>">Know More</a>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="sliderImage">
                                    <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/' . 'etiquette.png'); ?>" width="100%" alt="">
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Wrapper for slides -->
                    <!--div class="carousel-inner" >
                        <div class="item active">
                            <div class="header-text hidden-xs">
                                <div class="slider-content">
                                    <h4 class="title">How to develop a Sense of Urgency?</h4>
                                    <p class="text-justify">Act with a Sense of Urgency to make the best use of opportunities available to you in this rapidly changing world</p>
                                    <div class="slider_btn text-left" >
                                        <a href="<?php //echo(base_url() . "skill-talk-slider"); ?>">Know More</a>
                                    </div>
                                </div>
                            </div>
                            <img class="img-responsive" src="<?php //echo(base_url() . 'assets/img/' . 'bannerNew1.jpg'); ?>" width="100%" alt="">
                        </div>
                        <div class="item">
                            <div class="header-text hidden-xs" >
                                <div class="slider-content">
                                    <h4 class="title">How good are your Credibility Building Skills?</h4>
                                    <p class="text-justify">Take the quick self-test to explore your understanding of various techniques of Credibility Building. Subscribe to the Monthly Newsletter and get our Art of Building Credibility e-Book FREE</p>
                                    <div class="slider_btn text-left" >
                                        <a href="<?php //echo(base_url() . "home_sheets/sheets/61"); ?>">Get started</a>
                                    </div>
                                </div>
                            </div>
                            <img class="img-responsive" src="<?php //echo(base_url() . 'assets/img/' . 'bannerNew2.jpg'); ?>" width="100%" alt="">
                        </div>
                        <div class="item">
                            <div class="header-text hidden-xs">
                                <div class="slider-content">
                                    <h4 class="title">Essentials of Employability</h4>
                                    <p class="text-justify">Learn about Employability scenario in India. Understand what Employability is and how you can work on enhancing your Employability.</p>
                                    <div class="slider_btn text-left" >
                                        <a href="<?php //echo(base_url() . "employability-zone-slider"); ?>">Know More</a>
                                    </div>
                                </div>
                            </div>
                            <img class="img-responsive" src="<?php //echo(base_url() . 'assets/img/' . 'bannerNew3.jpg'); ?>" width="100%" alt="">
                        </div>
                    </div-->

                    <!--a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a-->
                </div>
            </div>



            <div class="col-md-5 nopadding-left" style="border:1px solid #e8dcdc;padding:0px 5px 0px 5px !important;width:443px;">
                <?php
                    $this->load->view('newsLetterSubscription');

                ?>
            </div>


                <!-- Modal -->
                <div class="modal fade" id="newLetter_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <!--h4 class="modal-title" id="myModalLabel">Modal title</h4-->
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h4>Thank you for subscribing to our Email Newsletter. Please follow the following steps to complete your signup process:</h4>
                                        <ul class="custom">
                                            <li>Check for our Email in your Inbox and in case it is not there, check your Spam folder.</li>
                                            <li>Click the link “Confirm” in the Email that you will receive from us.</li>
                                            <li>Download your Art of Building e-Book.</li>

                                        </ul>
                                    </div>
                                    <div class="col-md-4">
                                        <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/' . 'art-of-building.png'); ?>" ><br>

                                    </div>
                                </div>
                            </div>
                            <!--div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary">Save changes</button>
                            </div-->
                        </div>
                    </div>
                </div>

                <!--Modal Start-->
                <div class="modal fade" id="sucess_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h4>Thank you for your Registration on Skillpromise.com. Please follow the following steps to complete your registration process:</h4>
                                        <ul class="custom">
                                            <li>Check for our Email in your Inbox.</li>
                                            <li>Click the link “Confirm” in the Email that you will receive from us</li>
                                            <li>Download your Art of Building e-Book</li>
                                            <li>If you do not receive our Email, please contact </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-4">
                                        <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/' . 'art-of-building.png'); ?>" ><br>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal  end-->

        </div>

        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-12">
                <div class="dooble-border">
                    <h5 class="our-prog-title">Skillpromise Programs</h5>
                            
                            <!--Accordion -->
                            <div class="panel-group" id="accordion">
                                <?php
                                    if($home_package){
                                        $i = 1;
                                        foreach($home_package as $dv => $ddv){
                                        ?>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i; ?>">
                                                            <?php echo $dv; ?></a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapse<?php echo $i; ?>" class="panel-collapse collapse <?php if($i ==1){echo 'in';} ?>">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <?php
                                                                    foreach($ddv as $ddvkey => $ddvalue){
                                                                       ?>
                                                                       <div class="col-xs-12 col-sm-6 col-md-3">
                                                                            <div class="prog-img">
                                                                                <a href = "<?php echo base_url('Programs/'.$ddvalue->id); ?>">
                                                                                    <img class="img-responsive" style="height: 120px !important;" src="<?php echo base_url($ddvalue->image); ?>" alt = "Image"/>
                                                                                </a>
                                                                            </div>
                                                                            <div class="prog-content margin-bottom">
                                                                                <a class="title" href = "<?php echo base_url('Programs/'.$ddvalue->id); ?>">
                                                                                    <?php echo $ddvalue->name; ?>
                                                                                </a>
                                                                            </div>
                                            
                                                                        </div>
                                                                       <?php
                                                                    }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            $i++;
                                        }
                                    }else{
                                        ?>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                                    Programme</a>
                                                </h4>
                                            </div>
                                            <div id="collapse1" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                    <div class="row">
                                                       <div class="col-xs-12 col-sm-6 col-md-6">
                                                            <div class="prog-img">
                                                                <a href = "#!">
                                                                    <img class="img-responsive"  src="<?php echo(base_url() . 'assets/img/' . 'erp-er.jpg'); ?>" alt = "Image"/>
                                                                </a>
                                                            </div>
                                                            <div class="prog-content margin-bottom">
                                                                <a class="title" href = "#!">
                                                                    Comming soon..
                                                                </a>
                                                            </div>
                            
                                                        </div>
                                                               
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                ?>
                              <!--<div class="panel panel-default">-->
                              <!--  <div class="panel-heading">-->
                              <!--    <h4 class="panel-title">-->
                              <!--      <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">-->
                              <!--      Interview Preparation/ Employment Readiness Programs</a>-->
                              <!--    </h4>-->
                              <!--  </div>-->
                              <!--  <div id="collapse1" class="panel-collapse collapse in">-->
                              <!--      <div class="panel-body">-->
                              <!--          <div class="row">-->
                              <!--              <div class="col-xs-12 col-sm-6 col-md-4">-->
                              <!--                  <div class="prog-img">-->
                              <!--                      <a href = "#!">-->
                              <!--                          <img class = "img-responsive" src = "<?php echo(base_url() . 'assets/img/' . 'erp-er.jpg'); ?>" alt = ""/>-->
                              <!--                      </a>-->
                              <!--                  </div>-->
                              <!--                  <div class="prog-content margin-bottom">-->
                              <!--                      <a class="title" href = "#!">-->
                              <!--                          Employment Readiness Program-->
                              <!--                      </a>-->
                                                    <!--<p class="text-center nopadding">Engineering Graduates</p>-->
                                                    <!--<p class="price">Program Cost : Rs 2500</p>-->
                
                                                    <!--<div class="prog-btn">-->
                                                    <!--    <a href="#!" class="btn btn-success" title="">Buy Now</a><a class="btn btn-default" data-toggle="modal" data-target="#program_modal2" title="">Know More</a>-->
                                                    <!--</div>-->
                              <!--                  </div>-->
                
                              <!--              </div>-->
                              <!--              <div class="col-xs-12 col-sm-6 col-md-4">-->
                              <!--                  <div class="prog-img">-->
                              <!--                      <a href = "#!">-->
                              <!--                          <img class = "img-responsive" src = "<?php echo(base_url() . 'assets/img/' . 'erp-mg.jpg'); ?>" alt = ""/>-->
                              <!--                      </a>-->
                              <!--                  </div>-->
                              <!--                  <div class="prog-content margin-bottom">-->
                              <!--                      <a class="title" href = "#!">-->
                              <!--                          Employment Readiness Program-->
                              <!--                      </a>-->
                                                    <!--<p class="text-center nopadding">Management Graduates</p>-->
                                                    <!--<p class="price">Program Cost : Rs 2500</p>-->
                
                                                    <!--<div class="prog-btn">-->
                                                    <!--    <a href="<?php //echo(base_url() . "programedetails".'/'.'4'); ?>" class="btn btn-success" title="">Buy Now</a><a class="btn btn-default" data-toggle="modal" data-target="#program_modal3" title="">Know More</a>-->
                                                    <!--</div>-->
                              <!--                  </div>-->
                
                              <!--              </div>-->
                              <!--              <div class="col-xs-12 col-sm-6 col-md-4">-->
                              <!--                  <div class="prog-img">-->
                              <!--                      <a href = "#!">-->
                              <!--                          <img class = "img-responsive" src = "<?php echo(base_url() . 'assets/img/' . 'erp-mg.jpg'); ?>" alt = ""/>-->
                              <!--                      </a>-->
                              <!--                  </div>-->
                              <!--                  <div class="prog-content margin-bottom">-->
                              <!--                      <a class="title" href = "#!">-->
                              <!--                          Employment Readiness Program-->
                              <!--                      </a>-->
                                                    <!--<p class="text-center nopadding">Management Graduates</p>-->
                                                    <!--<p class="price">Program Cost : Rs 2500</p>-->
                
                                                    <!--<div class="prog-btn">-->
                                                    <!--    <a href="<?php //echo(base_url() . "programedetails".'/'.'4'); ?>" class="btn btn-success" title="">Buy Now</a><a class="btn btn-default" data-toggle="modal" data-target="#program_modal3" title="">Know More</a>-->
                                                    <!--</div>-->
                              <!--                  </div>-->
                
                              <!--              </div>-->
                              <!--          </div>-->
                              <!--      </div>-->
                              <!--  </div>-->
                              <!--</div>-->
                              <!--<div class="panel panel-default">-->
                              <!--  <div class="panel-heading">-->
                              <!--    <h4 class="panel-title">-->
                              <!--      <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">-->
                              <!--      Collapsible Group 2</a>-->
                              <!--    </h4>-->
                              <!--  </div>-->
                              <!--  <div id="collapse2" class="panel-collapse collapse">-->
                              <!--    <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,-->
                              <!--    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad-->
                              <!--    minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea-->
                              <!--    commodo consequat.</div>-->
                              <!--  </div>-->
                              <!--</div>-->
                              <!--<div class="panel panel-default">-->
                              <!--  <div class="panel-heading">-->
                              <!--    <h4 class="panel-title">-->
                              <!--      <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">-->
                              <!--      Collapsible Group 3</a>-->
                              <!--    </h4>-->
                              <!--  </div>-->
                              <!--  <div id="collapse3" class="panel-collapse collapse">-->
                              <!--    <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,-->
                              <!--    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad-->
                              <!--    minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea-->
                              <!--    commodo consequat.</div>-->
                              <!--  </div>-->
                              <!--</div>-->
                            </div>
                            <!-- End of Accordion -->
                        

                </div>
            </div>


            <!--Modal programs Start-->
                <div class="modal fade" id="program_modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">

                                <div id="program-owl2" class="owl-carousel program-owl">
                                    <div class="item">
                                        <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/slide/emp-er/' . 'slide1.jpg'); ?>" >
                                    </div>
                                    <div class="item">
                                        <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/slide/emp-er/' . 'slide2.jpg'); ?>" >
                                    </div>
                                    <div class="item">
                                        <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/slide/emp-er/' . 'slide3.jpg'); ?>" >
                                    </div>
                                    <div class="item">
                                        <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/slide/emp-er/' . 'slide4.jpg'); ?>" >
                                    </div>
                                    <div class="item">
                                        <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/slide/emp-er/' . 'slide5.jpg'); ?>" >
                                    </div>
                                    <div class="item">
                                        <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/slide/emp-er/' . 'slide6.jpg'); ?>" >
                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal programs  end-->
                <!--Modal programs Start-->
<div class="modal fade" id="program_modal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <div id="program-owl2" class="owl-carousel program-owl">
                    <div class="item">
                        <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/slide/emp-mg/' . 'slide1.jpg'); ?>" >
                    </div>
                    <div class="item">
                        <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/slide/emp-mg/' . 'slide2.jpg'); ?>" >
                    </div>
                    <div class="item">
                        <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/slide/emp-mg/' . 'slide3.jpg'); ?>" >
                    </div>
                    <div class="item">
                        <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/slide/emp-mg/' . 'slide4.jpg'); ?>" >
                    </div>
                    <div class="item">
                        <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/slide/emp-mg/' . 'slide5.jpg'); ?>" >
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
<!-- Modal programs  end-->

            <!--Modal programs Start-->
                <div class="modal fade" id="program_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">

                                <div id="program-owl" class="owl-carousel program-owl">
                                    <div class="item">
                                        <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/slide/' . 'slide1.jpg'); ?>" >
                                    </div>
                                    <div class="item">
                                        <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/slide/' . 'slide2.jpg'); ?>" >
                                    </div>
                                    <div class="item">
                                        <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/slide/' . 'slide3.jpg'); ?>" >
                                    </div>
                                    <div class="item">
                                        <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/slide/' . 'slide4.jpg'); ?>" >
                                    </div>
                                    <div class="item">
                                        <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/slide/' . 'slide5.jpg'); ?>" >
                                    </div>
                                    <div class="item">
                                        <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/slide/' . 'slide6.jpg'); ?>" >
                                    </div>
                                    <div class="item">
                                        <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/slide/' . 'slide7.jpg'); ?>" >
                                    </div>
                                    <!--div class="item">
                                        <div class="text-center"><img class="img-responsive" src="<?php //echo(base_url() . 'assets/img/slide/' . 'slide8-1.jpg'); ?>" ></div>
                                        <div class="d-flex">
                                            <div style="width: 27%;">
                                                <ul class="list-group">
                                                  <li class="list-group-item"><a href="#!" title="">Employment Readiness Program for Engineering Graduates</a></li>
                                                  <li class="list-group-item"><a href="#!" title="">Employment Readiness Program for Management Graduates</a></li>
                                                  <li class="list-group-item"><a href="#!" title="">MBA Entrance Examination Readiness Program</a></li>
                                                </ul>
                                            </div>
                                            <div style="width: 42%; margin-left: 4rem;">
                                                    <div class="prog-img">
                                                        <a href="http://skillpromise.com/sana-for-school">
                                                            <img class="img-responsive" src="http://skillpromise.com/assets/img/aptitude_devlopment_home.jpg" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="prog-content margin-bottom">
                                                        <a class="title" href="http://skillpromise.com/sana-for-school">
                                                            Aptitude Development Program
                                                        </a>

                                                        <div class="prog-btn">
                                                            <a href="#!" class="btn btn-success" title="">Buy Now</a><span class="price">Rs 3000</span>
                                                        </div>
                                                    </div>

                                            </div>
                                        </div>
                                    </div-->

                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal programs  end-->


            
        </div>
        <?php
        $this->load->view('home_footer');
        ?>
    </div>
</div>
<!--
-->

<style>
    .nopadding {
        padding: 0 !important;
        margin: 0 !important;
    }
</style>



<script>

    $(document).ready(function () {


        $('#subs').click(function (e) {

            var datastr = {};
            datastr['first_name'] = $('#first_name').val();
            datastr['email'] = $('#email').val();

            $.ajax({

                type: "POST",
                url: "<?php echo base_url(); ?>subscribNewsLetter/",
                data: datastr,
                //                url: "<?php //echo base_url();                                                                                                                                                                                                                                                                                                                                                                                                        ?>/subscribNewsLetter/user",
                success: function (data) {
                    //                    alert(data);
                    $('#newLetter_modal').modal('show');
                }

            });

        }
        );
    });

    $(document).on('ready', function () {
        if (<?php echo $_SESSION['modal_flag']; ?> == 1) {
            $('#sucess_modal').modal('show');
        }
    });
    $(document).on("click",".disabled",function () {
            alert('dd');
        });
    //<?php
        //$str = '';
        //if ($_SESSION['modal_flag'] != 0) {
        //
//    echo " $(document).on('ready', function () {";
        //
//    echo " $('#sucess_modal2').modal('show');});";
        //
//    $_SESSION['modal_flag'] = 0;
        //}
        //
        ?>
</script>


