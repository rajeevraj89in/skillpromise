<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="generator" content="Nicepage 3.24.4, nicepage.com">
    <meta name="theme-color" content="#ff7043">
    <title>Home</title>
   <link rel="stylesheet" type="text/css"  href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
   
<link rel="stylesheet" type="text/css"  href="<?= base_url() . 'assets/home/css/' . 'bootstrap.min.css'; ?>"   media="all"/>
<link rel="stylesheet" type="text/css"  href="<?= base_url() . 'assets/home/css/' . 'custom.css'; ?>"  media="all"/>
<link rel="stylesheet" type="text/css"  href="<?= base_url() . 'assets/home/css/' . 'owl.carousel.min.css'; ?>"   media="all"/>
<link href="<?php echo(base_url() . 'assets/img/animated_favicon.gif'); ?>" rel="icon" type="image/x-icon" />
<script src="http://getbootstrap.com/2.3.2/assets/js/bootstrap-tooltip.js"></script>

<script src='<?= base_url('assets/home/js/bootstrap.bundle.min.js'); ?>'> </script>
<script src="<?= base_url() . 'assets/home/js/' . 'custom.js'; ?>"></script>
<script src="<?= base_url() . 'assets/home/js/' . 'jquery-3.5.1.slim.min.js'; ?>"></script>
<script src="<?= base_url() . 'assets/home/js/' . 'owl.carousel.min.js'; ?>"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>

      .home-banner-video {
    position: absolute;
    left: 50%;
    top: 50%;
    min-width: 100%;
    min-height: 100%;
    -webkit-transform: translate(-50%,-50%);
    -moz-transform: translate(-50%,-50%);
    -ms-transform: translate(-50%,-50%);
    transform: translate(-50%,-50%);
    z-index: 0;
}
.home-banner-btn  a{
    text-decoration:none;
}
@media screen and (max-width: 680px) {
    .home-banner-video-bg {
    position: absolute !important;
    left: 0;
    top: 0;
    width: 6200px;
    height: 100%;
    background-size:cover;
    filter: brightness(0.5);
    overflow: hidden;
}
 .home-banner-video {
    position: absolute;
    width: 500px;
    left: -39%;
    height: 578%;
    top: -39%;
    pointer-events: none;
    display: block;
    padding: 0;
    overflow: hidden;
}

}
.nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover{
    background:#25897a;
}
.nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active{
    background-color:!important;
}
</style>
<script>
  $(document).ready(function() {
            $("#listcat li a").on('click', function() {
            alert('hhh');
            var cat= $(this).attr("data-id");
            alert(cat);
         }   


});
</script>


<script>
  
 
                                        </script>
    </head>
<body class="body">
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
    </header>
<!-- Content Row -->
<div class="container main_container">
    <div class="main_body">
        <div class="row">
            <div class="testimonial-tabbs">
                <div class="w-100 border">
                    <div class="tab-content">
                        <?php
                            $db = mysqli_connect("localhost", "coskillp_db", "(R#@6p=9-]0j", "coskillp_admin");
                            $tab_query = "SELECT * FROM testimonial_category ORDER BY id ASC";
                            $tab_result = mysqli_query($db, $tab_query);
                                $i=0;
                                $li = "";
                                $array = array();
                                while($trow = mysqli_fetch_array($tab_result)){
                                    $array[] = $trow; 
                                    if($i == 0 ){
                                
                                        
                                        $li.=  '<li class="nav-item test-li active " style="margin-bottom:10px;" ><a data-id="'.$trow['id'].'" class=" nav-link test-btn" href="#'.$trow['id'].'" data-toggle="tab">'.$trow['category'].'</a></li>';
                                  
                                    }else{
                                        $li.=  '<li class="nav-item test-li" style="margin-bottom:10px;"><a data-id="'.$trow['id'].'" class="nav-link test-btn" href="#'.$trow['id'].'" data-toggle="tab">'.$trow['category'].'</a></li>';
                                    
                                    
                                    }
                                    $i++;
                                }
                         ?>
                        <br>
                        <ul class="nav nav-tabs" id="listcat">
                            <?php echo $li; ?>
                        </ul>
                        <?php
                          foreach($array as $key => $value){
                               if($key == 0){
                                   ?>
                                        <div id="<?php echo $value['id'];?>" class="tab-pane fade active in">
                                            <div id="myCarousel<?php echo $key; ?>" class="carousel slide" data-ride="carousel">
                                                <?php
                                                    $id = $value['id'];
                                                    $product_query = "SELECT * FROM testimonials WHERE cat_id =$id";
                                                    //   echo $product_query;
                                                    $product_result = mysqli_query($db, $product_query);
                                                    ?>
                                                    <ol class="carousel-indicators">
                                                    <?php
                                                    $j=0;
                                                    while($sub_row = mysqli_fetch_array($product_result)){
                                                        if($j == 0){
                                                            ?>
                                                                <li data-target="#myCarousel<?php echo $key; ?>" data-slide-to="<?php echo $j; ?>" ></li>
                                                            <?php
                                                        }else{
                                                            ?>
                                                                <li data-target="#myCarousel<?php echo $key; ?>" data-slide-to="<?php echo $j; ?>"></li>
                                                            <?php
                                                        }
                                                        $j++;
                                                    }
                                                    ?>
                                                    
                                                    </ol>
                                                    <div class="carousel-inner">
                                                        <?php
                                                           
                                                    $product_query = "SELECT * FROM testimonials WHERE cat_id =$id";
                                                    //   echo $product_query;
                                                    $product_result = mysqli_query($db, $product_query);
                                                            $k=0;
                                                            while($sub_rowk = mysqli_fetch_array($product_result)){
                                                                if($k==0)
                                                                {
                                                                    ?>
                                                                    <div class="item active">
                                                                        <img src="assets/img/uploads/<?= $sub_rowk["image_file"];?>" alt="assets/img/uploads/<?= $sub_rowk["image_file"];?>" style="width:100%;height:400px;">
                                                                  
                                                                      <h3><?= $sub_rowk["full_name"];?></h3>
                                                                      <p><?= $sub_rowk["detailed_desc"];?></p>
                                                                    
                                                                    </div>
                                                                    <?php
                                                                }else{
                                                                    ?>
                                                                    <div class="item">
                                                                       <img src="assets/img/uploads/<?= $sub_rowk["image_file"];?>" alt="assets/img/uploads/<?= $sub_rowk["image_file"];?>" style="width:100%;height:400px;">
                                                                   
                                                                      <h3><?= $sub_rowk["full_name"];?></h3>
                                                                      <p><?= $sub_rowk["detailed_desc"];?></p>
                                                                   
                                                                   </div>
                                                                    <?php
                                                                }
                                                                $k++;
                                                            }
                                                        ?>
                                                    </div>
                                                     <a class="left carousel-control" href="#myCarousel<?php echo $key; ?>" data-slide="prev">
                                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                                    <span class="sr-only">Previous</span>
                                                         </a>
                                                    
                                                    <a class="right carousel-control" href="#myCarousel<?php echo $key; ?>" data-slide="next">
                                                      <span class="glyphicon glyphicon-chevron-right"></span>
                                                      <span class="sr-only">Next</span>
                                                    </a>
                                            </div>
                                        </div>
                                   <?php
                               }else{
                                   ?>
                                   <div id="<?php echo $value['id']; ?>" class="tab-pane fade in">
                                       <div id="<?php echo $value['id']; ?>" class="tab-pane fade  in">
                                            <div id="myCarousel<?php echo $key; ?>" class="carousel slide" data-ride="carousel">
                                                <?php
                                                    $id = $value['id'];
                                                    $product_query = "SELECT * FROM testimonials WHERE cat_id =$id";
                                                    //   echo $product_query;
                                                    $product_result = mysqli_query($db, $product_query);
                                                    ?>
                                                    <ol class="carousel-indicators">
                                                    <?php
                                                    $j=0;
                                                    while($sub_row = mysqli_fetch_array($product_result)){
                                                        if($j == 0){
                                                            ?>
                                                                <li data-target="#myCarousel<?php echo $key; ?>" data-slide-to="<?php echo $j; ?>" class="active"></li>
                                                            <?php
                                                        }else{
                                                            ?>
                                                                <li data-target="#myCarousel<?php echo $key; ?>" data-slide-to="<?php echo $j; ?>"></li>
                                                            <?php
                                                        }
                                                        $j++;
                                                    }
                                                    ?>
                                                    </ol>
                                                    <div class="carousel-inner">
                                                    <?php
                                                    $product_query = "SELECT * FROM testimonials WHERE cat_id =$id";
                                                    //   echo $product_query;
                                                    $product_result = mysqli_query($db, $product_query);
                                                            $k=0;
                                                            while($sub_rowk = mysqli_fetch_array($product_result)){
                                                                if($k==0)
                                                                {
                                                                    ?>
                                                                    <div class="item active">
                                                                        <img src="assets/img/uploads/<?= $sub_rowk["image_file"];?>" alt="assets/img/uploads/<?= $sub_rowk["image_file"];?>" style="width:100%;height:400px;">
                                                                    <div class="carousel-caption">
                                                                      <h3><?= $sub_rowk["full_name"];?></h3>
                                                                      <p><?= $sub_rowk["detailed_desc"];?></p>
                                                                    </div>
                                                                    </div>
                                                                    <?php
                                                                }else{
                                                                    ?>
                                                                    <div class="item">
                                                                       <img src="assets/img/uploads/<?= $sub_rowk["image_file"];?>" alt="assets/img/uploads/<?= $sub_rowk["image_file"];?>" style="width:100%;height:400px;">
                                                                    <div class="carousel-caption">
                                                                      <h3><?= $sub_rowk["full_name"];?></h3>
                                                                      <p><?= $sub_rowk["detailed_desc"];?></p>
                                                                    </div>
                                                                   </div>
                                                                    <?php
                                                                }
                                                                $k++;
                                                            }
                                                        ?>
                                                    </div>
                                                     <a class="left carousel-control" href="#myCarousel<?php echo $key; ?>" data-slide="prev">
                                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                                    <span class="sr-only">Previous</span>
                                                         </a>
                                                    
                                                    <a class="right carousel-control" href="#myCarousel<?php echo $key; ?>" data-slide="next">
                                                      <span class="glyphicon glyphicon-chevron-right"></span>
                                                      <span class="sr-only">Next</span>
                                                    </a>
                                            </div>
                                        </div>
                                    </div>
                                   <?php
                               }
                           }
                         
                        ?>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



                                