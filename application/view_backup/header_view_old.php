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
        <link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'jquery.timepicker.css'); ?>" />
        <link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'bootstrap.min.css'); ?>" />
        <link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'style.css'); ?>" />
        <link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'summernote.css'); ?>" />
        <link rel="stylesheet" href="<?php echo(base_url() . 'assets/fonts/' . 'font-awesome-4.2.0/css/font-awesome.min.css'); ?>" />
        <link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'modern-business.css'); ?>" />
        <link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'bootstrap.min.css'); ?>" />
        
       
        
        <script src="<?php echo(base_url() . 'assets/js/' . 'jquery-1.11.1.min.js'); ?>"></script>
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
        <script> var base_url = "<?php echo base_url(); ?>";</script>
      
    </head>
    <body class="manager-home login">
        <header>
        
        <!-- Navigation -->
    <nav class="navbar" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
                <div class="row">
                        <div class="col-lg-12 top-margin">

                            <div class="pull-left"><img src="<?php echo(base_url() . 'assets/img/' . 'skillcrop_logo.png'); ?>" width="200px"></div>
                            <div class="pull-right"><img src="<?php echo(base_url() . 'assets/img/' . 'f-link.jpg'); ?>" width="100px"></div>
                        </div>
                </div>
        <!-- /.row -->
            
           
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
              
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse menu" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-left">
                    
                    <li><a class="text" href="<?php echo(base_url()); ?>">Home</a></li>
                            <li class="dropdown">
                                <a href="" class="dropdown-toggle text" data-toggle="dropdown">About <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li class="active"><a href="">About1</a></li>
                                        <li><a href="">About2</a></li>
                                    </ul>
                            </li>
                            <li class="dropdown">
                                <a href="" class="dropdown-toggle text" data-toggle="dropdown">Programs <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <?php //echo $this->main_model->fill_node_li('node', 'name', 0, "parent_id", 0); ?>
                                        <?php echo $this->main_model->fill_nav_node_li('node', 'quiz', 'id','node', 'LEFT', 'program'); ?>
                                    </ul>
                           </li>
                           <li class="dropdown">
                               <a href="" class="dropdown-toggle text" data-toggle="dropdown">Test Centre <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                      <?php  echo $this->main_model->fill_nav_node_li('node', 'quiz', 'id','node', 'LEFT','test_centre'); ?>  
                                    </ul>
                           </li>
                           <?php
                                if (!($_SESSION['role_name'] == "Guest")) {
                                    echo '<li class = "dropdown">
                                          <a href = "" class = "dropdown-toggle" data-toggle = "dropdown">Analytics <span class = "caret"></span></a>
                                          <ul class = "dropdown-menu" role = "menu">';
                                           if (!$_SESSION['role_name'] == "Student"){
                                                echo '<li><a href = "'. base_url().'analytics/testsheet">Test Sheet</a></li>';
                                                echo '<li><a href = "'. base_url().'analytics/scorecard">Score Card</a></li>';
                                            }else{
                                                echo '<li><a href = "'. base_url().'score_card/">Score Card</a></li>';
                                            }                           
                                            echo  '</ul></li>';
                                }
                                /*
                                 if ($_SESSION['role_name'] == "Student") {
                                    echo '<li class = "dropdown">
                                <a href = "" class = "dropdown-toggle" data-toggle = "dropdown">Analytics <span class = "caret"></span></a>
                                <ul class = "dropdown-menu" role = "menu">

                                
                                </ul>
                                </li>';
                                }
                                                            
                                */
                               
                                
                                ?>     

                </ul>
                <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown">
                                    <?php
                                    if ($_SESSION['user_name'] == 'Anonymous') {
                                        echo '<a href="" class="dropdown-toggle text" data-toggle="dropdown"><span class="glyphicon glyphicon-user text"></span> Sign in  <strong class="caret text"></strong></a>';
                                    } else {
                                        echo '<a href="" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> ' . $_SESSION['user_name'] . ' <strong class="caret"></strong></a>';
                                    }

                                    echo '<ul class="dropdown-menu" role="menu">';


                                    if ($_SESSION['user_name'] == 'Anonymous') {
                                        echo '<li><a href=""><span class="glyphicon glyphicon-plus"></span> New User </a></li>';
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
                    </ul>
                   
                               
                               
               
                
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

<!--     Page Content 
    <div class="container">

         Page Heading/Breadcrumbs 
        <div class="row">
            <div class="col-lg-12">
                
                <ol class="breadcrumb">
                    <li><a href="<?php echo(base_url()); ?>">Home</a>
                    </li>
                </ol>
            </div>
        </div>
         /.row 
        </div>     -->
        
           </header>
       </body>
</html>