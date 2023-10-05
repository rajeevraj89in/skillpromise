<?php $this->load->view('home_header_view'); ?>


<!-- Content Row -->
<div class="container main_container">
    <div class="main_body">

        <div class="testimonial-title">
            <h2>Testimonials</h2>
        </div>


        <div class="testimonial-tab">

              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                <?php
                    foreach ($testimonials as $key => $value) {
                        ?>
                        <li role="presentation" class="<?php if($value->name == 'Student'){echo 'active';} ?>"><a href="#<?php echo $value->name; ?>" aria-controls="<?php echo $value->name; ?>" role="tab" data-toggle="tab"><?php echo $value->name; ?></a></li>        
                        <?php
                    }
                ?>
                <!-- <li role="presentation" class="active"><a href="#corp" aria-controls="corp" role="tab" data-toggle="tab">Corporate</a></li>
                <li role="presentation"><a href="#stud" aria-controls="stud" role="tab" data-toggle="tab">Student</a></li>
                <li role="presentation"><a href="#acad" aria-controls="acad" role="tab" data-toggle="tab">Academia</a></li> -->
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <?php
                    foreach ($testimonials as $key1 => $value1) {
                        ?>
                        <div role="tabpanel" class="tab-pane <?php if($value1->name == 'Student'){echo 'active';} ?>" id="<?php echo $value1->name; ?>">

                        <div class="row">
                            <div class="col-lg-12 col-sm-12">

                            <!--Owl slider-->
                            <div class="owl-carousel testimoni-owl">
                                <!--Item -->
                                <div class="item">
                                    <div class="card hovercard">
                                    <div class="cardheader">

                                     </div>
                                        <div class="avatar">
                                            <img alt="" src="<?php echo base_url("assets/img/uploads/".$value1->image_file); ?>">
                                        </div>
                                        <div class="info">
                                            <p>
                                                <?php echo $value1->detailed_desc; ?>
                                            </p>
                                            
 
                                            
                                    <div class="title" style="color: #ff7043;">
                                        <?php echo $value1->author; ?>
                                    </div>
                                            <!-- <div class="desc">Head - CR Relation</div>
                                            <div class="desc">IMT Hyderabad</div> -->
                                        </div>
                                    </div>
                                </div>
                                <!--Item end-->
                            </div>
                            <!--Owl end-->
                            </div>
                        </div>


                </div>
                        <?php
                    }
                ?>
                <!-- <div role="tabpanel" class="tab-pane active" id="corp">

                        <div class="row">
                            <div class="col-lg-12 col-sm-12">

                            Owl slider
                            <div class="owl-carousel testimoni-owl">
                                Item
                                <div class="item">
                                    <div class="card hovercard">
                                    <div class="cardheader">

                                     </div>
                                        <div class="avatar">
                                            <img alt="" src="<?php //echo base_url("assets/img/uploads/".$testimonials->image_file); ?>">
                                        </div>
                                        <div class="info">
                                            <p>
                                                <?php //echo $testimonials->detailed_desc; ?>
                                            </p>
                                            
 
                                            
                                    <div class="title" style="color: #ff7043;">
                                        <?php //echo $testimonials->author; ?>
                                    </div>
                                            <div class="desc">Head - CR Relation</div>
                                            <div class="desc">IMT Hyderabad</div>
                                        </div>
                                    </div>
                                </div>
                                Item end
                            </div>
                            Owl end
                            </div>
                        </div>


                </div> -->
                <!-- <div role="tabpanel" class="tab-pane" id="stud">
                    <div class="row">
                            <div class="col-lg-12 col-sm-12">
                                <div class="card hovercard">
                                <div class="cardheader">

                                 </div>
                                    <div class="avatar">

                                    </div>
                                    <div class="info">
                                        <p>
                                           Comming Soon !


                                        </p>
                                        <div class="title">

                                        </div>
                                        <div class="desc"> </div>
                                        <div class="desc"> </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                </div> -->
            <!--<div role="tabpanel" class="tab-pane" id="acad">

                   <div class="row">
                            <div class="col-lg-12 col-sm-12">
                                <div class="card hovercard">
                                <div class="cardheader">

                                 </div>
                                    <div class="avatar">

                                    </div>
                                    <div class="info">
                                        <p>
                                           Comming Soon !


                                        </p>
                                        <div class="title">

                                        </div>
                                        <div class="desc"> </div>
                                        <div class="desc"> </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                </div> -->
              </div>

        </div>





            <!--===========================================
                Old code commented By Arun on 28 May 2020
             ===========================================-->


            <!--div class="row">
            <section class="col-md-12" style="min-height: 395px;">

                <div class="panel">
                    <?php /**
                    $filter[0]['id'] = 'id';
                    $filter[0]['value'] = $category;
                    $req = array("*");
                    $records = $this->main_model->get_many_records("testimonials", $filter, $req, 'id');
                   // print_r($records);die;
                    foreach ($records as $key => $value) {
                        $limited_word = ($value['detailed_desc']);
                        echo '<h2> ' . $value['name'] . '</h2><hr>';
                    if($value['image_file'] != ""){
                        echo '<div class="row">';
                                      $url=base_url()."assets/img/uploads/".$value['image_file'];
                                     echo $img=' <div class="col-md-3 well"><div class="img-cover text-center_">
                                        <img src="'.$url.'" style="width: 200px;
    height: 200px;" />
                                    </div>
                                    <p style="font-size: 14px;margin: 13px 0;"><strong>'.$value['author'].'</strong></P>
                                    </div>';
                                  }
                          echo ' <div class="col-md-9"> <p class="text-justify">' . $limited_word . '</p>
                          </div>';
                    }
                    echo '</div>';
                    **/?>

                </div>
            </section>

            </div-->

             <!--============================================
                Old code commented By Arun on 28 May 2020 end
             ================================================-->


        <?php
        $this->load->view('home_footer');
        ?>
    </div>
</div>