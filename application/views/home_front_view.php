<!doctype html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="generator" content="Nicepage 3.24.4, nicepage.com">

    <meta name="theme-color" content="#ff7043">

    <title><?php if(isset($page_title)){ echo $page_title;} else { echo 'Home';} ?></title>

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

    <!--<link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'bootstrap1.min.css'); ?>">-->

    <!--<link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'owl.carousel.min.css'); ?>">-->

    <!--<link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'custom.css'); ?>">-->

    

<link rel="stylesheet" href="<?php echo(base_url() . 'assets/home/css/' . 'bootstrap.min.css'); ?>" />

<link rel="stylesheet" href="<?php echo(base_url() . 'assets/home/css/' . 'custom.css'); ?>" />

<link rel="stylesheet" href="<?php echo(base_url() . 'assets/home/css/' . 'owl.carousel.min.css'); ?>" />

<!--<script src="<?php //echo(base_url() . 'assets/home/js/' . 'jquery-3.5.1.slim.min.js'); ?>"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src='<?php echo base_url(); ?>assets/home/js/bootstrap.bundle.min.js'></script>

<script src="<?php echo(base_url() . 'assets/home/js/' . 'custom.js'); ?>"></script>



<script src="<?php echo(base_url() . 'assets/home/js/' . 'owl.carousel.min.js'); ?>"></script>
	<link rel="stylesheet" type="text/css"  href="<?= base_url() . 'assets/home/css/' . 'style.css'; ?>"  media="all"/>

</head>

<body>
<header id="header">
	<div class="toggle-btn"><span></span></div>
	<div class="bg-overlay">&nbsp;</div>
	<nav class="navbar navbar-expand-md">
		<div class="container d-flex align-items-center">
			<a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url('assets/home/images/logo.png');?>" class="logo-image" alt="Logo"></a>
			<div class="collapse navbar-collapse justify-content-center" id="navbar">
				<ul class="navbar-nav text-uppercase">
					<li class="nav-item"><a class="nav-link active" href="<?php echo base_url(); ?>">Home</a></li>
					<li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>about-us">About Us</a></li>
					<li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>blogList">Blog</a></li>
					<li class="nav-item"><a href="tel:+91-9811032026" data-toggle="tooltip" data-placement="top" title="+91-9811032026" class="nav-link phone-icon"><i class="fa fa-phone"></i></a></li>
				</ul>
			</div>
			<div class="social-icon">
				<ul>
					<li><a class="facebook" title="facebook" target="_blank" href="https://www.facebook.com/skillpromisetool"><i class="fa fa-facebook"></i></a></li>
					<li><a class="twitter" title="twitter" target="_blank" href="https://twitter.com/skillpromise"><i class="fa fa-twitter"></i></a></li>
					<li><a class="instagram" title="instagram" target="_blank" href="http://skillpromise.co/set_data_home"><i class="fa fa-instagram"></i></a></li>
					<li><a class="linkedIn" target="_blank" title="LinkedIn" href="https://www.linkedin.com/company/skill-promise/"><i class="fa fa-linkedin"></i></a></li>
				</ul>
			</div>
			<div class="phone-mobile"></div>
			<a class="login-btn" href="<?php echo base_url(); ?>signin">LOGIN</a>
		</div>
  </nav>
</header>
<script>
$(document).ready(function(){
$('.toggle-btn').click(function(e){ 
		e.stopPropagation();
		$('#navbar').fadeIn().toggleClass('open');
		$('.toggle-btn').toggleClass('active');
		$('body').toggleClass('no-scroll');
		$('.bg-overlay').toggleClass('active');		
	});
	$('.bg-overlay').click(function(){ 
		$('body').removeClass('no-scroll');
		$('.toggle-btn, .bg-overlay').removeClass('active');
		$('#navbar').removeClass('open');
	});
	
	
});	
</script>
<?php /*?>

<header class="header-bg">

        <div class="container">

            <div class="h-social-icons">

                <a class="h-facebook" title="facebook" target="_blank" href="https://www.facebook.com/skillpromisetool">

                    <i class="fa fa-facebook" aria-hidden="true"></i>

                </a>

                <a class="h-twitter" title="twitter" target="_blank" href="https://twitter.com/skillpromise">

                    <i class="fa fa-twitter" aria-hidden="true"></i>

                </a>

                <a class="h-instagram" title="instagram" target="_blank" href="http://skillpromise.co/set_data_home">

                    <i class="fa fa-instagram" aria-hidden="true"></i>

                </a>

                <a class="h-linkedIn" target="_blank" title="LinkedIn" href="https://www.linkedin.com/company/skill-promise/">

                    <i class="fa fa-linkedin" aria-hidden="true"></i>

                </a>

            </div>

            <div class="main-logo">

                <a href="#">

                    <img src="<?php echo base_url('assets/home/images/logo.png');?>" class="logo-image" alt="Logo">

                </a>

            </div>

            <nav class="main-menu">

                <div class="menu-close"><i class="fa fa-times" aria-hidden="true"></i></div>

                <ul class="main-ul">

                    <li class="nav-item">

                        <a class="active" href="<?php echo base_url(); ?>">Home</a>

                    </li>

                    <li class="nav-item">

                        <a href="<?php echo base_url(); ?>about-us">About Us</a>

                    </li>

                    <li class="nav-item">

                        <a href="<?php echo base_url(); ?>blogList">Blog</a>

                    </li>

                    <!-- <li class="nav-item">

                        <a href="#">Contact Us</a>

                    </li> -->

                    <li class="nav-item">

                        <a href="tel:#" class="icons"><i class="fa fa-phone h-icons" aria-hidden="true"></i></a>

                    </li>

                    <li class="nav-item">

                        <a href="mailto:#" class="icons"><i class="fa fa-envelope h-icons envelope" aria-hidden="true"></i></a>

                    </li>

                </ul>

            </nav>

            <div class="h-login-bg">

                <a href="<?php echo base_url(); ?>signin" class="h-login">LOGIN</a>

                <a href="#" class="mobile-tigger"><i class="fa fa-bars" aria-hidden="true"></i></a>

            </div>



        </div><!-- Container End -->

    </header><?php */?>

