<?php $this->load->view('header_view', array('page_type' => 'blog') );?>
<!-- Content Row -->
<div class="container main_container">
    <div class="main_body">
        <div class="row">
            <section class="col-md-12" style="min-height: 395px;">
                <div class="text-justify">
                    <!--Blog categorie tab-->
                    <div class="blog-tab">
                        <!-- Nav tabs -->
						<div class="blog-nav">
                        <ul class="nav nav-tabs" role="tablist">
                            <?php
                            foreach ($category_details as $key => $category) {
                                if ($category['id'] == $act) {
                                    $active = 'class = "active"';
                                } else {
                                    $active = '';
                                };
                                echo '<li role="presentation"' . $active . ' ><a href="#' . $category['id'] . '" aria-controls="' . $category['id'] . '" role="tab" data-toggle="tab">' . $category['name'] . '</a></li>';
                            }
                            ?>
                            <!--                            <li role="presentation" class="active"><a href="#communication" aria-controls="communication" role="tab" data-toggle="tab">Communication Skills</a></li>
                                                        <li role="presentation"><a href="#cnt" aria-controls="cnt" role="tab" data-toggle="tab">Computers and Technology</a></li>
                                                        <li role="presentation"><a href="#css" aria-controls="css" role="tab" data-toggle="tab">Customer Service Skills</a></li>
                                                        <li role="presentation"><a href="#es" aria-controls="es" role="tab" data-toggle="tab">Employability Skills</a></li>
                                                        <li role="presentation"><a href="#eng" aria-controls="eng" role="tab" data-toggle="tab">Engineering</a></li>
                                                        <li role="presentation"><a href="#fin" aria-controls="fin" role="tab" data-toggle="tab">Finance</a></li>
                                                        <li role="presentation"><a href="#ca" aria-controls="ca" role="tab" data-toggle="tab">Current Affairs</a></li>
                                                        <li role="presentation"><a href="#hel" aria-controls="hel" role="tab" data-toggle="tab">Health</a></li>
                                                        <li role="presentation"><a href="#hr" aria-controls="hr" role="tab" data-toggle="tab">Human Resources</a></li>
                                                        <li role="presentation"><a href="#lif" aria-controls="lif" role="tab" data-toggle="tab">Lifestyle</a></li>
                                                        <li role="presentation"><a href="#ms" aria-controls="ms" role="tab" data-toggle="tab">Managerial Skills</a></li>
                                                        <li role="presentation"><a href="#mar" aria-controls="mar" role="tab" data-toggle="tab">Marketing</a></li>
                                                        <li role="presentation"><a href="#pps" aria-controls="pps" role="tab" data-toggle="tab">Personal Productivity Skills</a></li>
                                                        <li role="presentation"><a href="#ss" aria-controls="ss" role="tab" data-toggle="tab">Selling Skills</a></li>
                                                        <li role="presentation"><a href="#snh" aria-controls="snh" role="tab" data-toggle="tab">Sports and Hobbies</a></li>-->


                        </ul>
						</div>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <?php
                            foreach ($blog_details as $k => $v) {
                                if ($k == $act) {
                                    $active = 'active';
                                } else {
                                    $active = '';
                                };
                                echo '<div role="tabpanel" class="tab-pane ' . $active . '" id="' . $k . '">
                                <div class="container-fluied">
                                    <div class="row">
                                     <div class="wrap-div">
                                    ';
                                $i = 0;
                                foreach ($v as $category) {
                                    $i++;
                                    $limited_word = word_limiter($category['description'], 35);
									//echo ' <p>' . $limited_word . ' ...</p>';
//                                                        echo $limited_word;
                                    echo '<div class="col-md-4 margin-bottom">
										
                                              <!--  <div class="blog-box" >
                                                    <img class="img-responsive" height=500 width=500 src="' . base_url() . '/assets/img/uploads/' . $category["image_file"] . ' " />  <br>
                                                    <small class="block">' . date('d-M-Y', strtotime($category['article_datetime'])) . '</small>
                                                    <h6 style="text-align: left;
                                                            line-height: normal;
                                                            color: #ff7043;"> ' . $category['name'] . '</h6>
                                                    <span class="text-left"><small>By ' . $category['written_by'] . '</small></span>

                                                    <p class="text-center"><a href = "' . base_url() . 'blogDetail/' . $category['id'] . '"type="button" class="btn btn-green">Read more</a></p>
                                                </div>-->
												<a href = "' . base_url() . 'blogDetail/' . $category['id'] .'" class="blog-nav-link">
                                                <div class="blog-box" >
                                                    <div class="blog-img"><img class="img-responsive" height=500 width=500 src="' . base_url() . '/assets/img/uploads/' . $category["image_file"] . ' " /> </div>
                                                    <div class="blog-content"><small class="block">' . date('d-M-Y', strtotime($category['article_datetime'])) . '</small>
                                                    <h6 class="title"> ' . $category['name'] . '</h6>
                                                    <span class="text-left"><small>By ' . $category['written_by'] . '</small></span>
													</div>
                                                    <!--<p class="text-center"><a href = "' . base_url() . 'blogDetail/' . $category['id'] . '"type="button" class="btn btn-green">Read more</a></p>-->
                                                </div>
										</a>
                                            </div>
											
											
											
											';
                                }
                                if ($i < 1) {
                                    echo '...';
                                }
                                echo '
                                     </div>
                                </div>
                                        <!--flex-box end-->
                                    </div>
                                    <!--row  end-->
                                </div>';
                            }
                            ?>
                            <!--                            <div role="tabpanel" class="tab-pane active" id="communication">
                                                            <div class="container-fluied">
                                                                <div class="row">
                                                                    flex-box
                                                                    <div class="wrap-div">
                                                                        <div class="col-md-4 margin-bottom">
                                                                            <div class="blog-box" >
                                                                                <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/' . 'Comm.jpg'); ?>" />  <br>
                                                                                <small class="block">Picture Courtesy: Pixabay.com</small>
                                                                                <h4>Five Signs of Internal Communication Breakdown in The Workplace</h4>
                                                                                <span class="text-left"><small>By FifiArisandi</small></span>
                                                                                <p>Research by Deloitte and Touche Hvuman Capital showed that 95% of CEOs agreed that effective ...</p>
                                                                                <button onclick="location.href = 'blog-detail'" type="button" class="btn btn-green pull-right">Read more</button>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 margin-bottom">
                                                                            <div class="blog-box" >
                                                                                <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/' . 'Way.jpg'); ?>" />  <br>
                                                                                <small class="block">Picture Courtesy: Pixabay.com</small>
                                                                                <h4>Ways to Improve Business Communication</h4>
                                                                                <span class="text-left"><small>By Ralph Waldo</small></span>
                                                                                <p>Effective communication is very important to run a business successfully. Good communication can endear you among ...</p>
                                                                                <button onclick="location.href = 'blog-detail'" type="button" class="btn btn-green pull-right">Read more</button>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 margin-bottom">
                                                                            <div class="blog-box" >
                                                                                <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/' . 'workp.jpg'); ?>" />  <br>
                                                                                <small class="block">Picture Courtesy: Pixabay.com</small>
                                                                                <h4>How to Deal with Workplace Gossips</h4>
                                                                                <span class="text-left"><small>By Sandy Dsouza</small></span>
                                                                                <p>Human beings are social animals and often give their opinions on various topics even if it is not asked ...</p>
                                                                                <button onclick="location.href = 'blog-detail'" type="button" class="btn btn-green pull-right">Read more</button>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 margin-bottom">
                                                                            <div class="blog-box" >
                                                                                <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/' . 'workp.jpg'); ?>" />  <br>
                                                                                <small class="block">Picture Courtesy: Pixabay.com</small>
                                                                                <h4>How to Deal with Workplace Gossips</h4>
                                                                                <span class="text-left"><small>By Sandy Dsouza</small></span>
                                                                                <p>Human beings are social animals and often give their opinions on various topics even if it is not asked ...</p>
                                                                                <button onclick="location.href = 'blog-detail'" type="button" class="btn btn-green pull-right">Read more</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    flex-box end
                                                                </div>
                                                                row  end
                                                            </div>



                                                        </div>
                                                        <div role="tabpanel" class="tab-pane" id="cnt">...</div>
                                                        <div role="tabpanel" class="tab-pane" id="css">...</div>
                                                        <div role="tabpanel" class="tab-pane" id="es">...</div>
                                                        <div role="tabpanel" class="tab-pane" id="eng">...</div>
                                                        <div role="tabpanel" class="tab-pane" id="fin">...</div>
                                                        <div role="tabpanel" class="tab-pane" id="ca">...</div>
                                                        <div role="tabpanel" class="tab-pane" id="hel">...</div>
                                                        <div role="tabpanel" class="tab-pane" id="hr">...</div>
                                                        <div role="tabpanel" class="tab-pane" id="lif">...</div>
                                                        <div role="tabpanel" class="tab-pane" id="ms">...</div>
                                                        <div role="tabpanel" class="tab-pane" id="mar">...</div>
                                                        <div role="tabpanel" class="tab-pane" id="pps">...</div>
                                                        <div role="tabpanel" class="tab-pane" id="ss">...</div>
                                                        <div role="tabpanel" class="tab-pane" id="snh">...</div>-->
                        </div>

                    </div>
                    <!--Blog categorie tab end-->



                </div>
            </section><!-- end col-md-9 -->


        </div>

        
    </div>
</div>

                <?php $this->load->view('html_end_view'); ?>