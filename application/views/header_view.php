
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="shortcut icon" href="<?php echo(base_url() . 'assets/img/' . 'animated_favicon.gif'); ?>" type="image/x-icon">
<link rel="icon" href="<?php echo(base_url() . 'assets/img/' . 'animated_favicon.gif'); ?>" type="image/x-icon">

<title>:: Skill Promise ::</title>

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
<script src="<?php echo(base_url() . 'assets/js/' . 'bootstrap-datetimepicker.js'); ?>"></script>
<script> var base_url = "<?php echo base_url(); ?>";</script>
<script src='<?php echo base_url(); ?>assets/Plugin/calendar/js/moment.min.js'></script>
<script src="<?php echo(base_url() . 'assets/js/' . 'chosen.jquery'); ?>"></script>
<script src="<?php echo(base_url() . 'assets/js/' . 'jquery.blockUI.js'); ?>"></script>
<script src="<?php echo base_url(); ?>assets/Plugin/bootstrapdatetimepiceker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() . 'assets/js/'; ?>jquery-ui-1.11.4.dtpicker.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!--<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>-->

<link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'bootstrap-duallistbox.min.css'); ?>" />
<link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'jquery.calculator.css'); ?>" />
<link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'jquery.countdown.css'); ?>" />
<link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'jquery.timepicker.css'); ?>" />
<link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'bootstrap.min.css'); ?>" />
<link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'owl.carousel.min.css'); ?>" />
<link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'owl.theme.default.min.css'); ?>" />
<link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'style.css'); ?>" />
<link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'summernote.css'); ?>" />
<link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'font-awesome.min.css'); ?>" />
<link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'modern-business.css'); ?>" />
<link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'bootstrap.min.css'); ?>" />
<link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'jquery.dataTables.min.css'); ?>" />
<link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'bootstrap-datetimepicker.css'); ?>" />
<link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'chosen.css'); ?>" />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/Plugin/bootstrapdatetimepiceker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="<?php echo base_url() . 'assets/css/'; ?>bootstrap-datetimepicker.css" />
<link rel="stylesheet" href="<?php echo base_url() . 'assets/css/'; ?>jquery-ui-timepicker-addon.css" /> <!-- for timppicker  addon  -->
	<link rel="stylesheet" type="text/css"  href="<?= base_url() . 'assets/css/' . 'n-style.css'; ?>"  media="all"/>
	<script>
	$(document).ready(function(){
		var Wwidth = $(window).width();
		if (Wwidth < 992) {	
			$( ".mobile-social" ).append( $( ".social-icon" ) );
		}
	});
	</script>
</head>
<body class="manager-home login">
<header id="header">
	<div class="toggle-btn"><span></span></div>
	<div class="bg-overlay">&nbsp;</div>
	<div class="mobile-social"></div>
	<nav class="navbar">
		<div class="container">
			<a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url('assets/home/images/logo.png');?>" class="logo-image" alt="Logo"></a>
			<!--collapse--><div class=" navbar-collapse" id="bs-example-navbar-collapse-1">
			<div class="main-nav">
				<ul class="navbar-nav text-uppercase">
					<li class="nav-item"><a class="nav-link" href="<?php echo(base_url()); ?>">Home</a></li>
					<li class="nav-item"><a class="nav-link" href="<?php echo(base_url()); ?>about-us">About Us</a></li>
					<li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>work_with_us">Work With Us</a></li>
					<li class="nav-item"><a class="nav-link active" href="<?php echo(base_url()); ?>blogList">Blog</a></li>
					<li class="nav-item"><a href="tel:+91-9811032026" data-toggle="tooltip" data-placement="top" title="+91-9811032026" class="nav-link phone-icon"><i class="fa fa-phone"></i></a></li>
				</ul>
			</div>
      
      <ul class="nav navbar-nav navbar-right">
        <li>
		  <div class="social-icon">
				<ul>
					<li><a class="facebook" title="facebook" target="_blank" href="https://www.facebook.com/skillpromisetool"><i class="fa fa-facebook"></i></a></li>
					<li><a class="twitter" title="twitter" target="_blank" href="https://twitter.com/skillpromise"><i class="fa fa-twitter"></i></a></li>
					<li><a class="instagram" title="instagram" target="_blank" href="http://skillpromise.co/set_data_home"><i class="fa fa-instagram"></i></a></li>
					<li><a class="linkedIn" target="_blank" title="LinkedIn" href="https://www.linkedin.com/company/skill-promise/"><i class="fa fa-linkedin"></i></a></li>
				</ul>
			</div>
		  </li>
        <li class="dropdown">
			<?php
			if ($_SESSION['user_name'] == 'Anonymous') {
				echo '<a href="" class="dropdown-toggle login-btn-new link_margin" data-toggle="dropdown">LOGIN</a>';
			} else {
				echo '<a href="" class="dropdown-toggle" data-toggle="dropdown"><span class=""></span><div class="login-btn"><i class="fa fa-user"></i> ' . $_SESSION['user_name'] . '<span class="caret"></span></div>';}
			echo '<ul class="dropdown-menu user-dropdown" role="menu">';
			if ($_SESSION['user_name'] == 'Anonymous') {
				echo '<li><a href="' . base_url() . 'register"><span class="glyphicon glyphicon-plus"></span> New User </a></li>';} else {
				echo '<li><a href="' . base_url() . 'change_password"><span class="glyphicon glyphicon-refresh"></span> Change Password </a></li>';
			}
			//echo '<li class = "divider"></li>';
			if ($_SESSION['user_name'] == 'Anonymous') {
				echo '<li><a href = "' . base_url() . 'signin"><span class = "glyphicon glyphicon-off"></span> Login</a></li>';
			} else {
				echo '<li><a href="' . base_url() . 'logout"><span class="glyphicon glyphicon-off"></span> Logout </a></li>';
			}
			//----dew
			//echo '<li class = "divider"></li>';
			if ($_SESSION['role_name'] == 'Super Admin' || $_SESSION['role_name'] == 'Administrator' || $_SESSION['role_name'] == 'Content Creator') {
				echo '<li><a href="' . base_url() . 'add_excel_user"><span class="glyphicon glyphicon-upload"></span> Upload Excel user </a></li>';
				echo '<li><a href="' . base_url() . 'export_user_data"><span class="glyphicon glyphicon-upload"></span> Download Users List</a></li>';
			} else {
			}
			//echo '<li class = "divider"></li>';
			if ($_SESSION['role_name'] == 'Super Admin' || $_SESSION['role_name'] == 'Administrator' || $_SESSION['role_name'] == 'Content Creator') {
				echo '<li><a href="' . base_url() . 'assets/skill_user_excel.csv"><span class="glyphicon glyphicon-download"></span> Download Excel Sample </a></li>';
			} else {
			}
			//----?>
		  </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
	
	
</header>

<header class="header <?php echo $blog_header = isset($page_type)?(($page_type=='blog')?'blog-header':''):''; ?>">
    <nav class="navbar" role="navigation">
        <div class="container">
            <?php /*?><div class="row">
                <div class="col-md-6">
                    <img class="logo" alt="" src="<?php echo(base_url() . 'assets/img/' . 'logo.png'); ?>">
                </div>
                <div class="col-md-6 social_icon">
                    <div class="row">
                        <div class="col-md-7">
                            <ul class="list-unstyled list-inline text-right user-login">
                                <li>
                                    <?php
                                    if ($_SESSION['user_name'] == 'Anonymous') {
                                        echo '<a href="" class="dropdown-toggle link_margin" data-toggle="dropdown">Login</a>';
                                    } else {
                                        echo '<a href="" class="dropdown-toggle" data-toggle="dropdown"><span class=""></span><div class="user_name">' . $_SESSION['user_name'] . '</div>';
                                    }

                                    echo '<ul class="dropdown-menu" role="menu"  style="margin-left: 180px;">';


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
                                    //----dew
                                    echo '<li class = "divider"></li>';
                                    if ($_SESSION['role_name'] == 'Super Admin' || $_SESSION['role_name'] == 'Administrator' || $_SESSION['role_name'] == 'Content Creator') {
                                        echo '<li><a href="' . base_url() . 'add_excel_user"><span class="glyphicon glyphicon-upload"></span> Upload Excel user </a></li>';
                                    } else {

                                    }

                                    echo '<li class = "divider"></li>';
                                    if ($_SESSION['role_name'] == 'Super Admin' || $_SESSION['role_name'] == 'Administrator' || $_SESSION['role_name'] == 'Content Creator') {
                                        echo '<li><a href="' . base_url() . 'assets/skill_user_excel.xlsx"><span class="glyphicon glyphicon-download"></span> Download Excel Sample </a></li>';
                                    } else {

                                    }
                                    //----
                                    ?>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-5">
                            <ul class="list-unstyled list-inline">

                                Follow
                                <li><a href="https://www.facebook.com/skillpromisetool" target="_blank"><img class="" alt="" src="<?php echo(base_url() . 'assets/img/' . 'facebook.png'); ?>"></a></li>
                                <li><a href="https://twitter.com/skillpromise" target="_blank"><img class="" alt="" src="<?php echo(base_url() . 'assets/img/' . 'tweeter.png'); ?>"></a></li>
                                <li><a href="https://www.linkedin.com/company/skill-promise/" target="_blank"><img class="" alt="" src="<?php echo(base_url() . 'assets/img/' . 'instagram.png'); ?>"></a></li>
                               

                            </ul>
                        </div>
                    </div>
                </div>
            </div><?php */?>
            <nav class="navbar navbar-default _containerfluid">
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
                        <?php
                            if($_SESSION['role_name'] == 'Student'){

                            }else{
                               ?>
                               <li class="dropdown li_border">
                                    <a href="<?php echo(base_url()); ?>">Home </a>
                                </li>
                                <li class="dropdown li_border">
                                    <a href="" class="dropdown-toggle " data-toggle="dropdown">About</a>
                                    <!--                                    <ul class="dropdown-menu" role="menu">-->
                                </li>
                               <?php 
                            }
                        ?>
                        <?php
                            if($_SESSION['role_name'] == "Student"){
                                $user_id = $_SESSION['user_id'];
                                $data = $this->main_model->programe_node($user_id);
								if( !empty($data) ){
                                ?>
                                <li class="dropdown li_border">
                                    <a href="<?php echo base_url(); ?>"><?php echo $data->name; ?></a>
                                </li>
                                <?php }
                              // echo $this->main_model->fill_nav_node_li('node', 'quiz', 'id', 'node', 'LEFT', 'program');
                            }else{
                                ?>
                                <li class="dropdown ">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown">Programs</a>
                            <ul class="dropdown-menu" role="menu">
                                <?php
                                //echo $this->main_model->fill_node_li('node', 'name', 0, "parent_id", 0);
                                if (!($_SESSION['role_name'] == "Student")) {
                                    ?>
                                    <?php echo $this->main_model->fill_nav_node_li_admin('node', 'quiz', 'id', 'node', 'LEFT', 'program'); ?>
                                <?php } else {
                                    ?>
                                    <?php echo $this->main_model->fill_nav_node_li('node', 'quiz', 'id', 'node', 'LEFT', 'program'); ?>
                                <?php } ?>
                            </ul>
                        </li>
                                <?php
                            }
                        ?>
                        <!--                    <li class="dropdown ">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown">Action Sheets</a>
                        <ul class="dropdown-menu" role="menu">
                        <?php //echo $this->main_model->fill_li('sheets', 'name', '');   ?>
                                                    </ul>
                                            </li>-->
                        <?php
                            if($_SESSION['role_name'] == "Student"){

                            }else{
                                ?>
                                <li class="dropdown li_border">
                                    <a href="#">Forum</a>
                                </li>
                                <?php
                            }
                        ?>
                        <?php
                            //if($_SESSION['role_name'] == "Student"){-->
                            
                            //    <li class="dropdown li_border">-->
                            //        <a href="<?php echo base_url('blogs'); 
                            ?>
                            <!--">Blog</a>-->
                                <!--</li>-->
                        <?php
                        //    }
                        ?>
                         <!-- <li class="dropdown li_border">
                            <a href="<?php echo(base_url().'cv'); ?>">CV</a>
                        </li>-->
                        <?php
                        if (!($_SESSION['role_name'] == "Guest") && !($_SESSION['role_name'] == "Student")) {
                            echo '<li class="dropdown analytics">
                          <a href="" class="dropdown-toggle" data-toggle="dropdown">Action Sheets</a>
                          <ul class="dropdown-menu" role="menu">' .
                            $this->main_model->fill_node_new('node', 'name', '', 'sheets')
                            . '</ul></li>';
                        }
                        ?>



                        <?php
                        if (($_SESSION['role_name'] == "Student")) {
							$package_id = $_SESSION['packages']; 
							$package = $this->main_model->get_records_new("packages", array("id" => $package_id), "*", array(), True );
							if(!empty($package->resource_center_head) && $package->resource_center_head!=0){
                            ?>
							    <li class="dropdown li_border">
                                    <a href="<?php echo base_url('resource_center'); ?>">Resource Center</a>
                                </li>
							<?php } ?>
                                <li class="dropdown li_border">
                                    <a href="<?php echo base_url('test_center'); ?>">Assessment Center</a>
                                </li>
							<?php if($package->package_master_id==6){ ?>	
							     <li class="dropdown li_border">
                                    <a href="<?php echo base_url('dashboard'); ?>">Dashboard</a>
                                </li>
							<?php } ?>	
								
                            <?php
                            /*echo '<li class="dropdown analytics">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown">Test Center <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">' .
                            //$this->main_model->fill_nav_node_li('node', 'quiz', 'id', 'node', 'LEFT', 'test_centre')
                            $this->main_model->fill_nav_node_li_quiz_type_two('node', 'id', 'test_centre')
                            . '</ul></li>';*/
                        }
                        if (!($_SESSION['role_name'] == "Guest") && !($_SESSION['role_name'] == "Student")) {
                            echo '<li class="dropdown analytics">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown">Test Center <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">' .
                            //$this->main_model->fill_nav_node_li('node', 'quiz', 'id', 'node', 'LEFT', 'test_centre')
                            $this->main_model->fill_nav_node_li_quiz_type_two_admin('node', 'id', 'test_centre')
                            . '</ul></li>';
                        }
                        if($_SESSION['role_name']== "Student"){
                            ?>
                               <!--<li class="dropdown li_border">-->
                               <!--     <a href="<?php echo base_url('Student_dashboard'); ?>">Dashboard</a>-->
                               <!-- </li>-->
                            <?php
                        }
                        if(!($_SESSION['role_name'] == "Student")){
                          echo '<li class = "dropdown">
                                  <a href = "" class = "dropdown-toggle analytics" data-toggle = "dropdown">Analytics <span class = "caret"></span></a>
                                  <ul class = "dropdown-menu" role = "menu">';  

                                  if (!($_SESSION['role_name'] == "Guest") && !($_SESSION['role_name'] == "Student")) {

                            echo $this->main_model->fill_nav_node_li_quiz_type_analytics_admin('node', 'id', 'analytics');
                            echo '</ul></li>';
                        }
                         if (($_SESSION['role_name'] == "Student")) {

                            echo $this->main_model->fill_nav_node_li_quiz_type_analytics('node', 'id', 'analytics');
                            echo '</ul></li>';
                        }
                        }
                        

                        
//                                }
                       

//                                    if (!($_SESSION['role_name'] == "Student")) {
//                                        echo '<li><a href = "' . base_url() . 'analytics/testsheet">Test Sheet</a></li>';
//                                        echo '<li><a href = "' . base_url() . 'analytics/scorecard">Score Card</a></li>';
//                                        echo '<li><a href = "' . base_url() . 'analytics/SummaryReport">Summary Report</a></li>';
//                                        echo '<li><a href = "' . base_url() . 'showsheet/">Action Sheet Values</a></li>';
//                                    } else {
//                                        echo '<li><a href = "' . base_url() . 'score_card/">Score Card</a></li>';
//                                        echo '<li><a href = "' . base_url() . 'showsheet/">Action Sheet Values</a></li>';
//                                    }
//                                    echo '</ul></li>';
//                                }


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
