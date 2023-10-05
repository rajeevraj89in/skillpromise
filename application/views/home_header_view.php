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
       
        <link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'owl.carousel.min.css'); ?>" />
        <link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'owl.theme.default.min.css'); ?>" />
        <link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'summernote.css'); ?>" />
        <link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'font-awesome-4.7.0/css/font-awesome.min.css'); ?>" />
        <link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'modern-business.css'); ?>" />
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
          <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'bootstrap1.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'owl.carousel.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'custom.css'); ?>">
    
    
     <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'owl.carousel.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo(base_url() . 'assets/css/' . 'custom.css'); ?>">
		<link rel="stylesheet" type="text/css"  href="<?= base_url() . 'assets/home/css/' . 'style.css'; ?>"  media="all"/>
    
    <style>
        .navbar{
            justify-content: space-between;
        }
		#header .navbar-brand img {height:100%;}
		.navbar-expand-md .navbar-nav .nav-link.phone-icon, .phone-icon {margin-top: 2px;}
		#header .navbar-expand-md.navbar .navbar-nav {margin: 0;}
    </style>
    </head>
    <body >
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
<?php /*?><header class="header-bg">
 
       
      
        <!--</div>-->
    <!--<div class="container">-->
       
    <!--</div>-->
<!--<div class="container">    -->
<!-- Container End -->
        <!--<nav class="main-menu">-->
        <!--    <div class="menu-close"><i class="fa fa-times" aria-hidden="true"></i></div>-->
        <!--    <ul class="main-ul">-->
        <!--        <li class="nav-item">-->
        <!--            <a class="active" href="<?php echo base_url(); ?>">Home</a>-->
        <!--        </li>-->
        <!--        <li class="nav-item">-->
        <!--            <a href="<?php echo base_url(); ?>about-us">About Us</a>-->
        <!--        </li>-->
        <!--        <li class="nav-item">-->
        <!--            <a href="<?php echo base_url(); ?>blogList">Blog</a>-->
        <!--        </li>-->
        <!--        <li class="nav-item">-->
        <!--            <a href="<?php echo base_url(); ?>contact-us">Contact Us</a>-->
        <!--        </li>-->
        <!--    </ul>-->
        <!--</nav>-->
   <nav class="container navbar navbar-expand-md navbar-light">
        <div class="main-logo">
            <a href="<?php echo base_url(); ?>">
                <img src="<?php echo(base_url() . 'assets/images/logo.png'); ?>" class="logo-image" alt="Logo">
            </a>
        </div>
          <button class="navbar-toggler"  type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
   <div class="collapse navbar-collapse" id="navbarSupportedContent">
   <nav class="main-menu">
            <!--<div class="menu-close"><i class="fa fa-times" aria-hidden="true"></i></div>-->
            <ul class="main-ul navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="active" href="<?php echo base_url(); ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>about-us">About Us</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>blogList">Blog 1</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>contact-us">Contact Us</a>
                </li>
            </ul>
       
        </nav>
    <div class="h-login-bg "  >
            <a style="float:right;" href="<?php echo base_url(); ?>signin" class="h-login">LOGIN</a>
            
            <!--<a href="#" class="mobile-tigger"><i class="fa fa-bars" aria-hidden="true"></i></a>-->
        </div>
         <div class="h-social-icons" >
            <a class="h-facebook" title="facebook" target="_blank" href="https://www.facebook.com/skillpromisetool">
                <i class="fa fa-facebook" aria-hidden="true"></i>
            </a>
            <a class="h-twitter" title="twitter" target="_blank" href="https://twitter.com/skillpromise">
                <i class="fa fa-twitter" aria-hidden="true"></i>
            </a>
            <a class="h-instagram" title="instagram" target="_blank" href="">
                <i class="fa fa-instagram" aria-hidden="true"></i>
            </a>
            <a class="h-linkedIn" target="_blank" title="LinkedIn" href="https://www.linkedin.com/company/skill-promise/">
                <i class="fa fa-linkedin" aria-hidden="true"></i>
            </a>
        </div>  
    </div>
 </nav>
</header><?php */?>
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
    </body>
</html>
