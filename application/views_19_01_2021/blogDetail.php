<?php // $this->load->view('home_header_view');                 ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:og="http://ogp.me/ns#"
      xmlns:fb="http://www.facebook.com/2008/fbml">
    <head>
        <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                    <meta property="og:title" content="<?php echo $name; ?>"/>
                    <!--<meta property="og:url" content="http://www.sharethis.com" />-->
                    <meta property="og:image" content="<?php echo base_url() . 'assets/img/uploads/' . $image_file; ?>" />
                    <meta property="og:description" content="<?php echo $this->main_model->get_name_from_id('blog_category', 'name', $category_id, 'id') . "- " . $name; ?>" />
                    <meta property="og:site_name" content=":: Skill Promise ::" />
                    <script src="//platform-api.sharethis.com/js/sharethis.js#property=5c331decca77ad0011af6830&product=inline-share-buttons"></script>
                    <!--ALTER TABLE `blog_comments` CHANGE `parent` `name` VARCHAR(255) NOT NULL, CHANGE `user_id` `email` VARCHAR(255) NOT NULL, CHANGE `question_id` `status` ENUM('Pending','Approve','Reject') NOT NULL DEFAULT 'Pending';-->



                    <link rel="shortcut icon" href="<?php echo(base_url() . 'assets/img/' . 'animated_favicon.gif'); ?>" type="image/x-icon">
                        <link rel="icon" href="<?php echo(base_url() . 'assets/img/' . 'animated_favicon.gif'); ?>" type="image/x-icon">

                            <title>:: Skill Promise ::</title>
                            <link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'bootstrap-duallistbox.min.css'); ?>" />
                            <link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'jquery.calculator.css'); ?>" />
                            <link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'jquery.countdown.css'); ?>" />
                            <link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'jquery.timepicker.css'); ?>" />
                            <link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'bootstrap.min.css'); ?>" />
                            <link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'owl.carousel.min.css'); ?>" />
                            <link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'owl.theme.default.min.css'); ?>" />
                            <link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'summernote.css'); ?>" />
                            <link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'font-awesome-4.7.0/css/font-awesome.min.css'); ?>" />
                            <link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'modern-business.css'); ?>" />
                            <link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'bootstrap.min.css'); ?>" />
                            <link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'jquery.dataTables.min.css'); ?>" />
                            <link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'style.css'); ?>" />



                            <script src="<?php echo(base_url() . 'assets/js/' . 'jquery-1.11.1.min.js'); ?>"></script>
                            <script src="<?php echo(base_url() . 'assets/js/' . 'owl.carousel.min.js'); ?>"></script>
                            <script src="<?php echo(base_url() . 'assets/js/' . 'bootstrap.min.js'); ?>"></script>
                            <script src="<?php echo(base_url() . 'assets/js/' . 'jquery.simplePagination.js'); ?>"></script>
                            <script src="<?php echo(base_url() . 'assets/js/' . 'custom.js'); ?>"></script>
                            <script src="<?php echo(base_url() . 'assets/js/' . 'summernote.min.js'); ?>"></script>
                            <script src="<?php echo(base_url() . 'assets/js/' . 'constants.js'); ?>"></script>
                            <script src="<?php echo(base_url() . 'assets/js/' . 'ajax.js'); ?>"></script>
                            <script src="<?php echo(base_url() . 'assets/js/' . 'jquery.plugin.min.js'); ?>"></script>
                            <script src="<?php echo(base_url() . 'assets/js/' . 'jquery.timepicker.min.js'); ?>"></script>
                            <script src="<?php echo(base_url() . 'assets/js/' . 'jquery.countdown.min.js'); ?>"></script>
                            <script src="<?php echo(base_url() . 'assets/js/' . 'jquery.calculator.min.js'); ?>"></script>
                            <script src="<?php echo(base_url() . 'assets/js/' . 'jquery.bootstrap-duallistbox.min.js'); ?>"></script>
                            <script src="<?php echo(base_url() . 'assets/js/' . 'jquery.dataTables.min.js'); ?>"></script>
                            </head>
                            <body class="manager-home login">
                                <header>
                                    <nav class="navbar" role="navigation">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <a href="#!"><img class="logo" alt="" src="<?php echo(base_url() . 'assets/img/' . 'logo.png'); ?>"></a>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-2 col-md-offset-5">
                                                            <ul class="login">
                                                                <li class="dropdown-submenu">
                                                                    <?php
                                                                    if ($_SESSION['user_name'] == 'Anonymous') {
                                                                        echo '<a href="" class="dropdown-toggle link_margin" data-toggle="dropdown">Login</a>';
                                                                    } else {
                                                                        echo '<a href="" class="dropdown-toggle" data-toggle="dropdown"><span class=""></span><div class="user_name">' . $_SESSION['user_name'] . '</div>';
                                                                    }

                                                                    echo '<ul class="dropdown-menu" role="menu"  style="margin-left: 31px; top:20px;">';


                                                                    if ($_SESSION['user_name'] == 'Anonymous') {
                                                                        echo '<li><a href="' . base_url() . 'register"><span class="glyphicon glyphicon-plus"></span> New User </a></li>';
                                                                    } else {
                                                                        echo '<li><a href="' . base_url() . 'change_password"><span class="glyphicon glyphicon-refresh"></span> Change Password </a></li>';
                                                                    }

                                                                    echo '<li class = "divider"></li>';
                                                                    if ($_SESSION['user_name'] == 'Anonymous') {
                                                                        echo '<li><a href = "' . base_url() . 'signin"><span class = "glyphicon glyphicon-off"></span> Login</a></li>';
                                                                    } else {
                                                                        echo '<li><a href="' . base_url() . 'logout"><span class="glyphicon glyphicon-off"></span> Logout </a></li>';
                                                                    }
                                                                    ?>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <ul class="social_icon">

                                                                Follow
                                                                <li><a href=""><img class="" alt="" src="<?php echo(base_url() . 'assets/img/' . 'facebook.png'); ?>"></a></li>
                                                                <li><a href=""><img class="" alt="" src="<?php echo(base_url() . 'assets/img/' . 'tweeter.png'); ?>"></a></li>
                                                                <li><a href=""><img class="" alt="" src="<?php echo(base_url() . 'assets/img/' . 'instagram.png'); ?>"></a></li>
                                                                <li><a href=""><img class="" alt="" src="<?php echo(base_url() . 'assets/img/' . 'icon.png'); ?>"></a></li>

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <nav class="navbar navbar-default" style="background-color: #ff7043;">
                                                <div class="navbar-header">
                                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                                        <span class="sr-only">Toggle navigation</span>
                                                        <span class="icon-bar"></span>
                                                        <span class="icon-bar"></span>
                                                        <span class="icon-bar"></span>
                                                    </button>

                                                </div>
                                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                                                    <ul class="nav navbar-nav navbar-left">

                                                        <li class="dropdown li_border">
                                                            <a href="<?php echo(base_url()); ?>">Home</a>
                                                        </li>
                                                        <li class="dropdown-submenu li_border">
                                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">About <span class="caret"></span></a>
                                                            <ul class="dropdown-menu">
                                                                <li><a href="<?php echo(base_url() . "about-us"); ?>" >About Us</a></li>
                                                                <li><a href="<?php echo(base_url() . "our-values"); ?>">Our Core Values</a></li>
                                                                <li><a href="<?php echo(base_url() . "our-benefits"); ?>" >Our Benefits</a></li>

                                                            </ul>



                                                        </li>
                                                        <li class="dropdown-submenu li_border">
                                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Programs<span class="caret"></span></a>
                                                            <ul class="dropdown-menu">
                                                                <li><a href="<?php echo(base_url() . "sana-for-school"); ?>">Self-Assessment & Development Need Analysis Program (SANA) for School Students</a></li>
                                                                <li><a href="<?php echo(base_url() . "sana-for-higher"); ?>" >Self-Assessment & Development Need Analysis Program (SANA) for Higher Education Students</a></li>
                                                                <li><a href="<?php echo(base_url() . "sana-for-professionals"); ?>" >Self-Assessment & Development Need Analysis Program (SANA) for Professionals</a></li>

                                                            </ul>
                                                        </li>

                                                        <li class="dropdown li_border">
                                                            <a href="<?php echo(base_url() . "news-letter"); ?>">NewsLetter</a>
                                                        </li>

                                                        <li class="dropdown li_border">
                                                            <a href="<?php echo(base_url() . "blogList"); ?>">Blog</a>
                                                        </li>
                                                        <li class="dropdown li_border">
                                                            <a href="<?php echo(base_url() . "contact-us"); ?>" >Contact Us</a>
                                                        </li>


                                                        <?php
                                                        if (!($_SESSION['role_name'] == "Guest")) {
                                                            echo '<li class="dropdown analytics">
                                    <a href="" class="dropdown-toggle" data-toggle="dropdown">Test Center <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">' .
                                                            $this->main_model->fill_nav_node_li('node', 'quiz', 'id', 'node', 'LEFT', 'test_centre')
                                                            . '</ul></li>';


                                                            echo '<li class = "dropdown">
                                          <a href = "" class = "dropdown-toggle analytics" data-toggle = "dropdown">Analytics <span class = "caret"></span></a>
                                          <ul class = "dropdown-menu" role = "menu">';
                                                            if (!($_SESSION['role_name'] == "Student")) {
                                                                echo '<li><a href = "' . base_url() . 'analytics/testsheet">Test Sheet</a></li>';
                                                                echo '<li><a href = "' . base_url() . 'analytics/scorecard">Score Card</a></li>';
                                                                echo '<li><a href = "' . base_url() . 'showsheet/">Action Sheet Values</a></li>';
                                                            } else {
                                                                echo '<li><a href = "' . base_url() . 'score_card/">Score Card</a></li>';
                                                                echo '<li><a href = "' . base_url() . 'showsheet/">Action Sheet Values</a></li>';
                                                            }
                                                            echo '</ul></li>';
                                                        }


                                                        if (!($_SESSION['role_name'] == "Guest") && !($_SESSION['role_name'] == "Student")) {

                                                            echo '<li class = "dropdown analytics">
                                          <a href = "" class = "dropdown-toggle" data-toggle = "dropdown"> Quiz Status <span class = "caret"></span></a>
                                          <ul class = "dropdown-menu" role = "menu">';

                                                            echo '<li><a href = "' . base_url() . 'remove/all">All attempted</a></li>';
                                                            echo '<li><a href = "' . base_url() . 'remove/incomplete">Incomplete</a></li>';
                                                            echo '<li><a href = "' . base_url() . 'remove/requested"> Requested</a> </li>';

                                                            echo '</ul></li>';
                                                            //---updated:dew 15/9/17 -for delete submitted quiz--
                                                            echo '<li class = "dropdown analytics">
                                          <a href = "" class = "dropdown-toggle" data-toggle = "dropdown"> Sheet Status <span class = "caret"></span></a>
                                          <ul class = "dropdown-menu" role = "menu">';

                                                            echo '<li><a href = "' . base_url() . 'remove/sheet">Completed Sheet</a></li>';

                                                            echo '</ul></li>';
                                                            //--end-updated:dew 15/9/17 -for delete submitted quiz--
                                                        }
                                                        ?>
                                                        <!--                              <li class="dropdown link">
                                                        <?php
                                                        if ($_SESSION['user_name'] == 'Anonymous') {
                                                            echo '<a href="" class="dropdown-toggle link_margin" data-toggle="dropdown"><span class="fa fa-lock fa-2x lock"></span> </a>';
                                                        } else {
                                                            echo '<a href="" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user lock"></span><div class="user_name">' . $_SESSION['user_name'] . '</div>';
                                                        }

                                                        echo '<ul class="dropdown-menu" role="menu">';


                                                        if ($_SESSION['user_name'] == 'Anonymous') {
                                                            echo '<li><a href="' . base_url() . 'register"><span class="glyphicon glyphicon-plus"></span> New User </a></li>';
                                                        } else {
                                                            echo '<li><a href="' . base_url() . 'change_password"><span class="glyphicon glyphicon-refresh"></span> Change Password </a></li>';
                                                        }

                                                        echo '<li class = "divider"></li>';
                                                        if ($_SESSION['user_name'] == 'Anonymous') {
                                                            echo '<li><a href = "' . base_url() . 'signin"><span class = "glyphicon glyphicon-off"></span> Login</a></li>';
                                                        } else {
                                                            echo '<li><a href="' . base_url() . 'logout"><span class="glyphicon glyphicon-off"></span> Logout </a></li>';
                                                        }
                                                        ?>
                                                                                      </li>-->
                                                    </ul>
                                                </div>
                                            </nav>
                                        </div>
                                    </nav>
                                </header>
                                <!--    </body>
                                </html>-->















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
                                                <?php $this->load->view('ProgramSideView'); ?>
                <?php
                $this->load->view('newsLetterSubscription');
                
               ?>
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
                                                                                        </div>
                                                                                        <div class="sharethis-inline-share-buttons"></div>
                                                                                        <div class="row">
                                                                                            <div class="col-md-12">
                                                                                                <h3 class="sub-title">Leave a Comment </h3>
                                                                                                <p>Please note that your comment will come to us for approval and if it is found not related to the topic or offensive, it will not be approved. Please note that fields marked with Asterisk (*) are mandatory:
                                                                                                </p>
                                                                                                <form class="form-horizontal" action=" <?php echo base_url() . 'SaveBlogComment'; ?>" method="POST">
                                                                                                    <input type="hidden" name="blog" value="<?php echo $id; ?>">

                                                                                                        <div class="form-group">
                                                                                                            <label class="col-sm-2 control-label" for="exampleInputEmail3">Name*</label>
                                                                                                            <div class="col-sm-10">
                                                                                                                <input type="text" class="form-control " required id="exampleInputEmail3" placeholder="Name*" name="name">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="form-group">
                                                                                                            <label class="col-sm-2 control-label" for="exampleInputEmail3">Email address*</label>
                                                                                                            <div class="col-sm-10">
                                                                                                                <input type="email" class="form-control " required id="exampleInputEmail3" placeholder="Email address*" name="email">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="form-group">
                                                                                                            <label class="col-sm-2 control-label" for="exampleInputPassword3">Comment</label>
                                                                                                            <div class="col-sm-10">
                                                                                                                <textarea  class="form-control" id="exampleInputPassword3" placeholder="Comment" name="comment_text"></textarea>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <div class="form-group"> <div class="col-sm-offset-2 col-sm-10">
                                                                                                                <p>
                                                                                                                    <small class="text-right block"><a href="<?php echo(base_url() . "privacy-policy"); ?>" class="text-right">Our Privacy Policy</a></small>
                                                                                                                </p>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="form-group">
                                                                                                            <div class="col-sm-offset-2 col-sm-10">
                                                                                                                <button type="submit" class="btn btn-success">Submit</button>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                </form>
                                                                                            </div>
                                                                                        </div><br>





                                                                                            <?php
                                                                                            if (!empty($comments)) {
                                                                                                echo ' <div class="row">';

                                                                                                foreach ($comments as $key => $value) {
                                                                                                    echo '<div class="col-md-12"><div class="bg-warning" style="padding:20px 20px;">
                        <h4 class="sub-sub-title">' . $value['name'] . '</h4>
                        <p><small>' . date('d-M-Y h:i A', strtotime($value['created_date'])) . '</small></p>
                        <h5>Comment</h5>
                        <p>' . $value['comment_text'] . '</p>
                        <hr>
                    </div></div>';
                                                                                                }
                                                                                                echo '</div>';
                                                                                            }
                                                                                            ?>


                                                                                            </section><!-- end col-md-9 -->


                                                                                            </div>

                                                                                            <?php
                                                                                            $this->load->view('home_footer');
                                                                                            ?>
                                                                                            </div>
                                                                                            </div>
