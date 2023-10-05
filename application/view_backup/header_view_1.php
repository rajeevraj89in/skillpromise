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
        <nav class="navbar" role="navigation">
         <div class="container">
          <div class="row">
            <div class="col-lg-12 top-margin">
            </div>
          </div>
         <nav class="navbar navbar-default _containerfluid">      
            <img class="logo" alt="" src="<?php echo(base_url() . 'assets/img/' . 'logo_.png'); ?>">
           <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
              
            </div> 
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            
                <ul class="nav navbar-nav navbar-right">
                    
                    <li class="dropdown li_border">
                        <a href="<?php echo(base_url()); ?>">HOME</a>
                    </li>
                            <li class="dropdown li_border">
                                <a href="" class="dropdown-toggle " data-toggle="dropdown">ABOUT <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li class=""><a href="">About1</a></li>
                                        <li><a href="">About2</a></li>
                                    </ul>
                            </li>
                            <li class="dropdown ">
                                <a href="" class="dropdown-toggle" data-toggle="dropdown">PROGRAMS <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <?php //echo $this->main_model->fill_node_li('node', 'name', 0, "parent_id", 0); ?>
                                        <?php echo $this->main_model->fill_nav_node_li('node', 'quiz', 'id','node', 'LEFT', 'program'); ?>
                                    </ul>
                           </li>
                           
                           <?php
                                if (!($_SESSION['role_name'] == "Guest")) {
                                    echo '<li class="dropdown analytics">
                                    <a href="" class="dropdown-toggle" data-toggle="dropdown">TEST CENTRE <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">'.
                                    $this->main_model->fill_nav_node_li('node', 'quiz', 'id','node', 'LEFT','test_centre')
                                            .'</ul></li>';
                                    
                                    
                                    echo '<li class = "dropdown">
                                          <a href = "" class = "dropdown-toggle analytics" data-toggle = "dropdown">ANALYTICS <span class = "caret"></span></a>
                                          <ul class = "dropdown-menu" role = "menu">';
                                           if (!($_SESSION['role_name'] == "Student")){
                                                echo '<li><a href = "'. base_url().'analytics/testsheet">Test Sheet</a></li>';
                                                echo '<li><a href = "'. base_url().'analytics/scorecard">Score Card</a></li>';
                                            } else {
                                                echo '<li><a href = "'. base_url().'score_card/">Score Card</a></li>';
                                            }                           
                                            echo  '</ul></li>';
                                }
                             ?>     
                              <li class="dropdown link">
                                    <?php
                                    if ($_SESSION['user_name'] == 'Anonymous') {
                                        echo '<a href="" class="dropdown-toggle link_margin" data-toggle="dropdown"><span class="fa fa-lock fa-2x lock"></span> </a>';
                                    } else {
                                        echo '<a href="" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user lock"></span><div class="user_name">' . $_SESSION['user_name'] . '</div>';
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
                              </li>
                </ul>
            </div>
         </nav>
        </div>
       </nav>
      </header>
     </body>
</html>