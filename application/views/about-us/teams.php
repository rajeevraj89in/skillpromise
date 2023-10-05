<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1" />
  <!-- This site is optimized with the Yoast SEO plugin v19.11 - https://yoast.com/wordpress/plugins/seo/ -->
  <title>About us</title>
  <meta property="og:locale" content="en_GB" />
  <meta property="og:type" content="article" />
  <meta property="article:modified_time" content="2022-11-17T16:08:10+00:00" />
  <meta name="twitter:card" content="summary_large_image" />

  <!-- carousel -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/about-us/bootstrap.min.css" media="all" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/about-us/custom.css" media="all" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/about-us/style.css" media="all" />
</head>

<body>
  <header id="header">
    <div class="toggle-btn"><span></span></div>
    <div class="bg-overlay">&nbsp;</div>
    <nav class="navbar navbar-expand-md">
      <div class="container d-flex align-items-center">
        <a class="navbar-brand" href="http://www.skillpromise.co/"><img src="http://www.skillpromise.co/assets/home/images/logo.png" class="logo-image" alt="Logo"></a>
        <div class="collapse navbar-collapse justify-content-center" id="navbar">
          <ul class="navbar-nav text-uppercase">
            <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>">Home</a></li>
            <li class="nav-item"><a class="nav-link active" href="<?php echo base_url(); ?>about-us">About Us</a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>work_with_us">Work With Us</a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>blogList">Blog</a></li>
            <li class="nav-item"><a href="tel:+91-9811032026" data-toggle="tooltip" data-placement="top" title="" class="nav-link phone-icon" data-original-title="+91-9811032026"><i class="fa fa-phone"></i></a></li>
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
        <a class="login-btn" href="http://www.skillpromise.co/signin">LOGIN</a>
      </div>
    </nav>
  </header>
  <div class="profile-container">
    <div class="profile-container container">
      <div class="profile-containt-wraper">
        <img src="<?php echo base_url(); ?>assets/about-us/teams/vikas-mehra.jpg" alt="" />
        <h4>Vikas Mehra</h4>
        <div class="cta-block__button-wrapper">
          <a href="#" style="font-size: 16px;" class="cta-block__button cta-block__button--orange" data-toggle="modal" data-target="#myModal" onClick="viewTeamDetails(0)">View Profile</a>
        </div>
      </div>

      <div class="profile-containt-wraper">
        <img src="<?php echo base_url(); ?>assets/about-us/teams/sanjay-dwivedi.jpg" alt="" />
        <h4>Sanjay Dwivedi</h4>
        <div class="cta-block__button-wrapper">
          <a href="#" style="font-size: 16px;" class="cta-block__button cta-block__button--orange" data-toggle="modal" data-target="#myModal" onClick="viewTeamDetails(1)">View Profile</a>
        </div>
      </div>

      <div class="profile-containt-wraper">
        <img src="<?php echo base_url(); ?>assets/about-us/teams/archana-krishnamurthy.jpg" alt="" />
        <h4>Archana Krishnamurthy</h4>
        <div class="cta-block__button-wrapper">
          <a href="#" style="font-size: 16px;" class="cta-block__button cta-block__button--orange" data-toggle="modal" data-target="#myModal" onClick="viewTeamDetails(2)">View Profile</a>
        </div>
      </div>

      <div class="profile-containt-wraper">
        <img src="<?php echo base_url(); ?>assets/about-us/teams/chand-narayan.jpg" alt="" />
        <h4>Chand Narayan</h4>
        <div class="cta-block__button-wrapper">
          <a href="#" style="font-size: 16px;" class="cta-block__button cta-block__button--orange" data-toggle="modal" data-target="#myModal" onClick="viewTeamDetails(3)">View Profile</a>
        </div>
      </div>

      <div class="profile-containt-wraper">
        <img src="<?php echo base_url(); ?>assets/about-us/teams/hitesh-kakkar.jpg" alt="" />
        <h4>Hitesh Kakkar</h4>
        <div class="cta-block__button-wrapper">
          <a href="#" style="font-size: 16px;" class="cta-block__button cta-block__button--orange" data-toggle="modal" data-target="#myModal" onClick="viewTeamDetails(4)">View Profile</a>
        </div>
      </div>

      <div class="profile-containt-wraper">
        <img src="<?php echo base_url(); ?>assets/about-us/teams/deepak-s.-mundada.jpg" alt="" />
        <h4>Deepak S. Mundada</h4>
        <div class="cta-block__button-wrapper">
          <a href="#" style="font-size: 16px;" class="cta-block__button cta-block__button--orange" data-toggle="modal" data-target="#myModal" onClick="viewTeamDetails(5)">View Profile</a>
        </div>
      </div>

      <div class="profile-containt-wraper">
        <img src="<?php echo base_url(); ?>assets/about-us/teams/aditya-kuchibhotla.jpg" alt="" />
        <h4>Aditya Kuchibhotla</h4>
        <div class="cta-block__button-wrapper">
          <a href="#" style="font-size: 16px;" class="cta-block__button cta-block__button--orange" data-toggle="modal" data-target="#myModal" onClick="viewTeamDetails(6)">View Profile</a>
        </div>
      </div>

      <div class="profile-containt-wraper">
        <img src="<?php echo base_url(); ?>assets/about-us/teams/ajay-garg.jpg" alt="" />
        <h4>Ajay Garg</h4>
        <div class="cta-block__button-wrapper">
          <a href="#" style="font-size: 16px;" class="cta-block__button cta-block__button--orange" data-toggle="modal" data-target="#myModal" onClick="viewTeamDetails(7)">View Profile</a>
        </div>
      </div>

      <div class="profile-containt-wraper">
        <img src="<?php echo base_url(); ?>assets/about-us/teams/harish-bhardwaj.jpg" alt="" />
        <h4>Harish Bhardwaj</h4>
        <div class="cta-block__button-wrapper">
          <a href="#" style="font-size: 16px;" class="cta-block__button cta-block__button--orange" data-toggle="modal" data-target="#myModal" onClick="viewTeamDetails(8)">View Profile</a>
        </div>
      </div>

      <div class="profile-containt-wraper">
        <img src="<?php echo base_url(); ?>assets/about-us/teams/jyotsna-l.jpg" alt="" />
        <h4>Jyotsna L</h4>
        <div class="cta-block__button-wrapper">
          <a href="#" style="font-size: 16px;" class="cta-block__button cta-block__button--orange" data-toggle="modal" data-target="#myModal" onClick="viewTeamDetails(9)">View Profile</a>
        </div>
      </div>

      <div class="profile-containt-wraper">
        <img src="<?php echo base_url(); ?>assets/about-us/teams/anuradha-chawla-.png" alt="" />
        <h4>Anuradha Chawla</h4>
        <div class="cta-block__button-wrapper">
          <a href="#" style="font-size: 16px;" class="cta-block__button cta-block__button--orange" data-toggle="modal" data-target="#myModal" onClick="viewTeamDetails(10)">View Profile</a>
        </div>
      </div>

      <div class="profile-containt-wraper">
        <img src="<?php echo base_url(); ?>assets/about-us/teams/milind-patil.jpg" alt="" />
        <h4>Milind Patil</h4>
        <div class="cta-block__button-wrapper">
          <a href="#" style="font-size: 16px;" class="cta-block__button cta-block__button--orange" data-toggle="modal" data-target="#myModal" onClick="viewTeamDetails(11)">View Profile</a>
        </div>
      </div>

      <div class="profile-containt-wraper">
        <img src="<?php echo base_url(); ?>assets/about-us/teams/ashish-bharadwaj.jpg" alt="" />
        <h4>Ashish Bharadwaj</h4>
        <div class="cta-block__button-wrapper">
          <a href="#" style="font-size: 16px;" class="cta-block__button cta-block__button--orange" data-toggle="modal" data-target="#myModal" onClick="viewTeamDetails(12)">View Profile</a>
        </div>
      </div>

      <div class="profile-containt-wraper">
        <img src="<?php echo base_url(); ?>assets/about-us/teams/aparajeeta-parmah.jpg" alt="" />
        <h4>Aparajeeta Sarmah</h4>
        <div class="cta-block__button-wrapper">
          <a href="#" style="font-size: 16px;" class="cta-block__button cta-block__button--orange" data-toggle="modal" data-target="#myModal" onClick="viewTeamDetails(13)">View Profile</a>
        </div>
      </div>

      <div class="profile-containt-wraper">
        <img src="<?php echo base_url(); ?>assets/about-us/teams/siddharth-Idnani.jpg" alt="" />
        <h4>Siddharth Idnani</h4>
        <div class="cta-block__button-wrapper">
          <a href="#" style="font-size: 16px;" class="cta-block__button cta-block__button--orange" data-toggle="modal" data-target="#myModal" onClick="viewTeamDetails(14)">View Profile</a>
        </div>
      </div>
    </div>
  </div>
    <div class="content-blocks__buttons-wrapper" style="margin-top:15px;margin-bottom:15px;justify-content:center;">
        <a href="<?php echo base_url(); ?>about-us" id="" class="content-blocks__button content-blocks__button--orange">
          Go Back
        </a>
    </div>

  <footer class="footer-bg">
    <div class="container">
      <div class="footer-links">
        <div class="row">
          <div class="col-md-auto">
            <h3>About Skill Promise</h3>
            <ul>
              <li><a href="#">About Us</a></li>
              <li><a href="#">Contact Us</a></li>
            </ul>
          </div>
          <div class="col-md-auto">
            <h3>Programs</h3>
            <ul>
              <li><a href="#">Aptitude Development Program</a></li>
            </ul>
          </div>
          <div class="col-md-auto">
            <h3>Privacy</h3>
            <ul>
              <li><a href="#">Privacy Policy</a></li>
              <li><a href="#">Terms of Use</a></li>
            </ul>
          </div>
          <div class="col-md-auto">
            <h3>Testimonials</h3>
            <ul>
              <li><a href="#">Academia</a></li>
              <li><a href="#">Corporate</a></li>
              <li><a href="#">Student</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row copyright">
        <div class="col-auto mr-auto">
          <p>© by Sana Skillpromise Education Private Limited. | All Rights Reserved. | Disclaimer</p>
        </div>
        <!--<div class="col-auto">-->
        <!--  <p>Powered by </p>-->
        <!--</div>-->
      </div>
    </div>
    <!-- <div class="footer-bottom text-center">
            <p>
                <a class="u-link" href="https://nicepage.com/website-templates" target="_blank">Website Templates</a>
                <span>created with</span>
                <a class="u-link" href="https://nicepage.com/" target="_blank">Website Builder Software</a>.
            </p>
        </div> -->
  </footer>
  <!-- Modal -->
  <div id="myModal" class="modal fade modal-lg profile-container-modal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">
            &times;
          </button>
          <!-- <h4 class="modal-title">Modal Header</h4> -->
        </div>
        <div class="modal-body">
          <div class="external-pages team-member-details" id="teamDetailsModal">

          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="<?php echo base_url(); ?>assets/about-us/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/about-us/js/teams.js"></script>
</body>

</html>