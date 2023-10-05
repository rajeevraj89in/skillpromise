<?php $this->load->view('home_header_view'); ?>


<!-- Content Row -->
<div class="container main_container">
    <div class="main_body">
        <div class="row">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="blog-tab">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <?php
                                foreach ($category_details as $key => $category) {
//                                    print_r($category);
//                                    die;

                                    if ($category['id'] == $category_id) {
                                        $active = 'class = "active"';
                                    } else {
                                        $active = '';
                                    };
                                    echo '<li role="presentation"' . $active . ' ><a href="' . base_url() . 'blogList/' . $category['id'] . '" >' . $category['name'] . '</a></li>';
                                }
                                ?>
                                <!--                                <li role="presentation" class="active"><a href="blog#communication" >Communication Skills</a></li>
                                                                <li><a href="blog#cnt">Computers and Technology</a></li>
                                                                <li><a href="blog#css">Customer Service Skills</a></li>
                                                                <li><a href="blog#es">Employability Skills</a></li>
                                                                <li><a href="blog#eng">Engineering</a></li>
                                                                <li><a href="blog#fin">Finance</a></li>
                                                                <li><a href="blog#ca">Current Affairs</a></li>
                                                                <li><a href="blog#hel">Health</a></li>
                                                                <li><a href="blog#hr">Human Resources</a></li>
                                                                <li><a href="blog#lif">Lifestyle</a></li>
                                                                <li><a href="blog#ms">Managerial Skills</a></li>
                                                                <li><a href="blog#mar">Marketing</a></li>
                                                                <li><a href="blog#pps">Personal Productivity Skills</a></li>
                                                                <li><a href="blog#ss">Selling Skills</a></li>
                                                                <li><a href="blog#snh">Sports and Hobbies</a></li>-->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <aside class="col-md-3">
                <!--program menu start -->
                <div class="panel panel-primary border">
                    <h4 class="quickpanelhead quiz_head">Programs</h4>
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
                <!--                <div id="newsletter">

                                    <div class="dooble-border">

                                        <div class="well fre_news" style="margin-left: 0;">
                                            <h3 id="free_news">Subscribe to our FREE Email Newsletter </h3>


                                            <div class="row">
                                                <div class="col-md-9" style=" padding: 0 6px 0 15px;">
                                                    <div class="input-group">
                                                        <form action="<?php echo base_url() . 'subscribNewsLetter/user'; ?>" id="news_letter" method="POST">
                                                            <input id="first_name" name="first_name" class="form-control inputbox" placeholder="First Name" type="text" data-validation-required-message="Please enter your first name." required="" aria-invalid="false"/>
                                                            <input id="email" name="email" class="form-control inputbox" placeholder="Email" type="email" data-validation-required-message="Please enter your email address." required="" aria-invalid="false"/>

                                                            <button type="submit" class="bttn btn btn-primary inputbox">Subscribe</button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="col-md-3" style="padding: 8px 9px 0 0;">
                                                    <img class="img-responsive" src="<?php echo(base_url() . 'assets/img/' . 'art-of-building.png'); ?>" >
                                                </div>
                                            </div>

                                            <p class="textstyle">Signup for our free email newsletter and get our Art of Building Credibility e-Book FREE as the Subscription bonus<br><br><small class="text-right block"><a href="<?php echo(base_url() . "privacy-policy"); ?>" class="text-right">Our Privacy Policy</a></small></p>
                                             /.input-group
                                        </div>
                                    </div>

                                </div>-->
                <!--news letter inner end-->

            </aside>



            <section class="col-md-9" style="min-height: 395px;">

                <div class="panel">
                    <h1 class="header_text"><?php echo $name; ?></h1>
                </div>


                <div class="text-justify">
                    <div class="blog-author">
                        <span class="name">By <?php echo $written_by; ?></span>
                        <span class="date"><?php echo date('F d, Y', strtotime($article_datetime)); ?></span>
                    </div>
                    <img style="width: 848px;" class="img-responsive" src="<?php echo base_url() . '/assets/img/uploads/' . $image_file; ?>" ><br>
                    <!--<small class="block">Picture Courtesy: Pixabay.com</small>  <br>-->
                    <?php echo $description; ?>

                    <div id="disqus_thread"></div>
                    <script>

                        /**
                         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

                        var disqus_config = function () {
                            this.page.url = "<?php echo base_url() . 'blogDetail/' . $id; ?>"; // Replace PAGE_URL with your page's canonical URL variable


                            this.page.identifier = "<?php echo "BLOG-" . $id; ?>"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                            this.page.title = "<?php echo $name; ?>";
                        };

                        (function () { // DON'T EDIT BELOW THIS LINE
                            var d = document, s = d.createElement('script');
                            s.src = 'https://skillpromise.disqus.com/embed.js';
                            s.setAttribute('data-timestamp', +new Date());
                            (d.head || d.body).appendChild(s);
                            console.log(d.body);
                        })();
                    </script>
                </div>


                <!--<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>-->
            </section><!-- end col-md-9 -->


        </div>

        <?php
        $this->load->view('home_footer');
        ?>
    </div>
</div>