<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

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
         <script src="<?php echo(base_url() . 'assets/js/' . 'jquery.blockUI.js'); ?>"></script>
    </head>
    <body class="manager-home not-login">
        <header>
            <nav class="navbar" role="navigation">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="#!"><img class="logo" alt="" src="<?php echo(base_url() . 'assets/img/' . 'logo.png'); ?>"></a>
                        </div>
                        <div class="col-md-6">
                            <div class="row d-flex align-item-center">
                                <div class="col-xs-3 col-sm-2 col-md-3 col-md-offset-2">
                                    <a href="#!" class="btn btn-success">Institutional User</a>
                                </div>
                                <div class="col-xs-3 col-sm-2 col-md-3">
                                    <?php
                                        if ($_SESSION['user_name'] == 'Anonymous') {
                                            ?>
                                            <a href="<?php echo base_url('signin'); ?>" class="btn btn-block" style="color: #f67043; background-color: #f67043; color: #fff;">Login</a>
                                            <?php
                                        }
                                    ?>
                                    <ul class="login">
                                        <li class="dropdown-submenu">
                                            <?php
                                            if ($_SESSION['user_name'] == 'Anonymous') {
                                                //echo '<a href="' . base_url() . 'signin" class="dropdown-toggle link_margin" data-toggle="dropdown">Login</a>';
                                                //echo '<a href="' . base_url() . 'signin" class="btn btn-success">Login</a>';
                                            } else {
                                                echo '<a href="" class="dropdown-toggle" data-toggle="dropdown"><span class=""></span><div class="user_name">' . $_SESSION['user_name'] . '</div>';
                                            }

                                            echo '<ul class="dropdown-menu" role="menu"  style="margin-left: 31px; top:20px;">';


                                            if ($_SESSION['user_name'] == 'Anonymous') {
                                                //echo '<li><a href="' . base_url() . 'register"><span class="glyphicon glyphicon-plus"></span> New User </a></li>';
                                            } else {
                                                echo '<li><a href="' . base_url() . 'change_password"><span class="glyphicon glyphicon-refresh"></span> Change Password </a></li>';
                                            }

                                            //echo '<li class = "divider"></li>';
                                            if ($_SESSION['user_name'] == 'Anonymous') {
                                                //echo '<li><a href = "' . base_url() . 'signin"><span class = "glyphicon glyphicon-off"></span> Login</a></li>';
                                            } else {
                                                echo '<li><a href="' . base_url() . 'logout"><span class="glyphicon glyphicon-off"></span> Logout </a></li>';
                                            }
                                            ?>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-xs-6 col-sm-8 col-md-4">
                                    <ul class="social_icon">
                                        <li class="fab"><a href="https://www.facebook.com/skillpromisetool" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li class="twi"><a href="https://twitter.com/skillpromise" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                        <li class="lin"><a href="https://www.linkedin.com/company/skill-promise/" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    </ul>

                                    <!--ul class="social_icon">
                                        <li><a href="https://www.facebook.com/skillpromisetool" target="_blank"><img class="" alt="" src="<?php //echo(base_url() . 'assets/img/' . 'facebook.png'); ?>"></a></li>
                                        <li><a href="https://twitter.com/skillpromise" target="_blank"><img class="" alt="" src="<?php //echo(base_url() . 'assets/img/' . 'tweeter.png'); ?>"></a></li>
                                        <li><a href="https://www.linkedin.com/company/skill-promise/" target="_blank"><img class="" alt="" src="<?php //echo(base_url() . 'assets/img/' . 'instagram.png'); ?>"></a></li>
                                    </ul-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <nav class="navbar navbar-default">
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
                                <li class="sep hidden-xs hidden-sm">|</li>

                                <li class="dropdown li_border">
                                    <a href="<?php echo(base_url() . "about-us"); ?>" >About Us</a>
                                </li>

                                <!--li class="dropdown-submenu li_border">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">About <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php //echo(base_url() . "about-us"); ?>" >About Us</a></li>
                                        <li><a href="<?php// echo(base_url() . "our-values"); ?>">Our Core Values</a></li>
                                        <li><a href="<?php //echo(base_url() . "our-benefits"); ?>" >Our Benefits</a></li>

                                    </ul>

                                </li-->
                                <li class="sep hidden-xs hidden-sm">|</li>
                                <li class="dropdown li_border">
                                    <a href="<?php echo(base_url() . "Programs"); ?>" >Programs</a>
                                </li>


                                <!-- <li class="dropdown-submenu li_border">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Programs<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php //echo(base_url() . "sana-for-school"); ?>">Aptitude Development Program</a></li>
                                      <li><a href="<?php // echo(base_url() . "sana-for-higher"); ?>" >Self-Assessment & Development Need Analysis Program (SANA) for Higher Education Students</a></li>
                                        <li><a href="<?php // echo(base_url() . "sana-for-professionals"); ?>" >Self-Assessment & Development Need Analysis Program (SANA) for Professionals</a></li>

                                    </ul>
                                </li> -->
                                <li class="sep hidden-xs hidden-sm">|</li>

                                <!--li class="dropdown li_border">
                                    <a href="<?php //echo(base_url() . "news-letter"); ?>">NewsLetter</a>
                                </li>
                                <li class="sep hidden-xs hidden-sm">|</li-->

                                <li class="dropdown li_border">
                                    <a href="<?php echo(base_url() . "blogList"); ?>">Blog</a>
                                </li>
                                <li class="sep hidden-xs hidden-sm">|</li>
                                <li class="dropdown li_border">
                                    <a href="<?php echo(base_url() . "contact-us"); ?>" >Contact Us</a>
                                </li>


                                <?php
                                if (!($_SESSION['role_name'] == "Guest")) {
                                    echo '<li class="dropdown analytics">
                                    <a href="" class="dropdown-toggle" data-toggle="dropdown">Test Center <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">' .
                                    $this->main_model->fill_nav_node_li_quiz_type_two('node', 'id', 'test_centre')
                                    . '</ul></li>';
//                                    $this->main_model->fill_nav_node_li('node', 'quiz', 'id', 'node', 'LEFT', 'test_centre')
//                                    . '</ul></li>';


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
                                <li class="dropdown link">
                                    <?php
//                                    if ($_SESSION['user_name'] == 'Anonymous') {
//                                        echo '<a href="" class="dropdown-toggle link_margin" data-toggle="dropdown"><span class="fa fa-lock fa-2x lock"></span> </a>';
//                                    } else {
//                                        echo '<a href="" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user lock"></span><div class="user_name">' . $_SESSION['user_name'] . '</div>';
//                                    }

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
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </nav>
        </header>
    </body>
</html>