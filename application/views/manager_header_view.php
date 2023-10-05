<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" href="<?php echo(base_url() . 'assets/img/' . 'animated_favicon.gif'); ?>" type="image/x-icon">
        <link rel="icon" href="<?php echo(base_url() . 'assets/img/' . 'animated_favicon.gif'); ?>" type="image/x-icon">

        <title>:: Skill Promise ::</title>
        <link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'bootstrap-duallistbox.css'); ?>" />
        <link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'jquery.calculator.css'); ?>" />
        <link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'jquery.countdown.css'); ?>" />
        <link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'bootstrap.min.css'); ?>" />
        <link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'style.css'); ?>" />
        <link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'summernote.css'); ?>" />
        <link rel="stylesheet" href="<?php echo(base_url() . 'assets/fonts/' . 'font-awesome-4.2.0/css/font-awesome.min.css'); ?>" />


        <script src="<?php echo(base_url() . 'assets/js/' . 'jquery-1.11.1.min.js'); ?>"></script>
        <script src="<?php echo(base_url() . 'assets/js/' . 'bootstrap.js'); ?>"></script>
        <script src="<?php echo(base_url() . 'assets/js/' . 'jquery.simplePagination.js'); ?>"></script>
        <script src="<?php echo(base_url() . 'assets/js/' . 'custom.js'); ?>"></script>
        <script src="<?php echo(base_url() . 'assets/js/' . 'summernote.min.js'); ?>"></script>
        <script src="<?php echo(base_url() . 'assets/js/' . 'constants.js'); ?>"></script>
        <script src="<?php echo(base_url() . 'assets/js/' . 'ajax.js'); ?>"></script>
        <script src="<?php echo(base_url() . 'assets/js/' . 'jquery.plugin.min.js'); ?>"></script>
        <script src="<?php echo(base_url() . 'assets/js/' . 'jquery.countdown.min.js'); ?>"></script>
        <script src="<?php echo(base_url() . 'assets/js/' . 'jquery.calculator.min.js'); ?>"></script>
        <script src="<?php echo(base_url() . 'assets/js/' . 'jquery.bootstrap-duallistbox.min.js'); ?>"></script>

    </head>
    <body class="manager-home login">

        <div class="container" id="main">
            <header>
                <nav class="navbar navbar-default navbar-fixed-top" id="navBarTop" role="navigation">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="<?php echo(base_url()); ?>"><img src="<?php echo(base_url() . 'assets/img/' . 'logo.png'); ?>" alt="skillpromise"/></a>
                        </div>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-left">
                                <li><a href="<?php echo(base_url()); ?>">Home</a></li>
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle" data-toggle="dropdown">About <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li class="active"><a href="">About1</a></li>
                                        <li><a href="">About2</a></li>
                                    </ul>
                                </li>
                                <!--                                <li class="dropdown">
                                                                    <a href="" class="dropdown-toggle" data-toggle="dropdown">Old Programs <span class="caret"></span></a>
                                                                    <ul class="dropdown-menu" role="menu">
                                <?php // echo $this->main_model->fill_li('programs', 'name'); ?>
                                                                        <li class="divider"></li>
                                                                        <li class="dropdown-header">Tests</li>
                                                                        <li><a href="">Hard Skills</a></li>
                                                                        <li><a href="">Managerial Skills</a></li>
                                                                        <li><a href="">Personal Productivity Skills</a></li>
                                                                    </ul>
                                                                </li>-->
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle" data-toggle="dropdown">Programs <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <?php echo $this->main_model->fill_node_li('node', 'name', 0, "parent_id", 0); ?>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle" data-toggle="dropdown">Test Centre <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <?php echo $this->main_model->fill_node_li('node', 'name', 0, "parent_id", 0); ?>
                                    </ul>
                                </li>
                            </ul><!-- navbar end -->

                            <form class="navbar-form navbar-left" role="search" id="searchInput">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Search">
                                </div>
                                <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                            </form><!--end navbar-form-->

                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> Manager <strong class="caret"></strong></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li class="active"><a href=""><span class="glyphicon glyphicon-wrench"></span> Setting</a></li>
                                        <li><a href=""><span class="glyphicon glyphicon-refresh"></span> Update Profile</a></li>
                                        <li class="divider"></li>
                                        <li><a href="index.htm"><span class="glyphicon glyphicon-off"></span> Sign out</a></li>
                                    </ul>
                                </li>
                            </ul><!--end nav pull-right-->
                        </div>
                    </div><!--nav Container end-->

                </nav><!-- navBarTop end -->
            </header>