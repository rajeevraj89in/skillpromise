<?php
//echo '<pre>';
//print_r($page_title);
//print_r($product_count);
//print_r($products);
//die("Code Stopped Here");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="generator" content="Nicepage 3.24.4, nicepage.com">
    <meta name="theme-color" content="#ff7043">
    <title>Home</title>
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/home/css/' . 'bootstrap.min.css'; ?>"
          media="all"/>
    <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/home/css/' . 'custom.css'; ?>" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/home/css/' . 'owl.carousel.min.css'; ?>"
          media="all"/>
    <link href="<?php echo(base_url() . 'assets/img/animated_favicon.gif'); ?>" rel="icon" type="image/x-icon"/>


    <script src="<?= base_url() . 'assets/home/js/' . 'jquery-3.5.1.slim.min.js'; ?>"></script>
    <script src="https://getbootstrap.com/2.3.2/assets/js/bootstrap-tooltip.js"></script>


    <script src="<?= base_url() . 'assets/home/js/' . 'custom.js'; ?>"></script>

    <script src="<?= base_url() . 'assets/home/js/' . 'owl.carousel.min.js'; ?>"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">-->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>-->
    <script src='<?= base_url('assets/home/js/bootstrap.bundle.min.js'); ?>'></script>
    <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/home/css/' . 'style.css'; ?>" media="all"/>
    <style>
        /*@media only screen and (max-width:667px) {*/
        /*.testimonials-img {*/
        /*       margin-left:120px;*/
        /*    }*/
        /*    #listcat{*/
        /*        margin-left:30px;*/
        /*    }*/
        /*}*/
        @media only screen and (max-width: 667px) {
            #list-cat {
                margin-left: 150px;
            }
        }

        .testimonial-imgs {
            height: 120px;
            width: 120px;
            min-height: 120px;
            display: block;
            margin-top: 10px;
            margin-left: 65px;
        }

        a:hover {
            text-decoration: none;
        }

        .carousel-indicators .active {
            background-color: #ff7043;
            /* margin-top:150px;*/
        }

        .carousel-indicators li {
            /*margin-top:150px;*/
            background: #25897a;
        }

        .nav {
            padding-left: 45px;
        }

        .bs-tooltip-left .arrow::before {
            border-left-color: #000;

        }

        .bs-tooltip-right .arrow::before {
            border-right-color: #000;

        }

        .bs-tooltip-bootom .arrow::before {
            border-right-color: #000;

        }

        .bs-tooltip-top .arrow::before {
            border-top-color: #000;

        }

        .tooltip-inner {
            max-width: 500px;
            color: #000;
            margin-bottom: 50px;
            border: 1px solid #000;
            opacity: 1.0;
            filter: alpha(opacity=100);
            padding: 8px;
            text-align: justify;
            background-color: white;
            background: white;
        }

        .tooltip.show {
            opacity: 1;
        }

        .mySlides {
            display: none;
        }

        .nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover {
            background: #25897a;
        }

        .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
            background: #25897a;
        }

        .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link:hover {
            background: #25897a;
        }

        .home-banner-video {
            position: absolute;
            left: 50%;
            top: 50%;
            min-width: 100%;
            min-height: 100%;
            -webkit-transform: translate(-50%, -50%);
            -moz-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            z-index: 0;
        }

        .home-banner-btn a {
            text-decoration: none;
        }

        @media screen and (max-width: 680px) {
            .home-banner-video-bg {
                position: absolute !important;
                left: 0;
                top: 0;
                width: 6200px;
                height: 100%;
                background-size: cover;
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

        .form-img img {
            height: 296px;
            width: 100%;
        }

        .carousel-caption p {
            display: -webkit-box;
            overflow: hidden;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
        }

        .carousel-caption span {
            display: -webkit-box;
            overflow: hidden;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
        }

        /*.tab-content>.active{*/
        /*    height:430px;*/
        /*}*/
        .carousel-control.left {
            background-image: none !important;
        }

        .carousel-control.right {
            background-image: none !important;
        }

        body {
            margin-top: 20px;
            /*background:#eee;*/
        }

        h3 {
            font-size: 16px;
        }

        .text-navy {
            color: #1ab394;
        }

        .cart-product-imitation {
            text-align: center;
            /*padding-top: 30px;*/
            height: 80px;
            width: 80px;
            background-color: #f8f8f9;
        }

        .product-imitation.xl {
            padding: 120px 0;
        }

        .product-desc {
            padding: 20px;
            position: relative;
        }

        .ecommerce .tag-list {
            padding: 0;
        }

        .ecommerce .fa-star {
            color: #d1dade;
        }

        .ecommerce .fa-star.active {
            color: #f8ac59;
        }

        .ecommerce .note-editor {
            border: 1px solid #e7eaec;
        }

        table.shoping-cart-table {
            margin-bottom: 0;
        }

        table.shoping-cart-table tr td {
            border: none;
            text-align: right;
        }

        table.shoping-cart-table tr td.desc,
        table.shoping-cart-table tr td:first-child {
            text-align: left;
        }

        table.shoping-cart-table tr td:last-child {
            width: 80px;
        }

        .ibox {
            clear: both;
            margin-bottom: 25px;
            margin-top: 0;
            padding: 0;
        }

        .ibox.collapsed .ibox-content {
            display: none;
        }

        .ibox:after,
        .ibox:before {
            display: table;
        }

        .ibox-title {
            -moz-border-bottom-colors: none;
            -moz-border-left-colors: none;
            -moz-border-right-colors: none;
            -moz-border-top-colors: none;
            background-color: #ffffff;
            border-color: #e7eaec;
            border-image: none;
            border-style: solid solid none;
            border-width: 3px 0 0;
            color: inherit;
            margin-bottom: 0;
            padding: 14px 15px 7px;
            min-height: 48px;
        }

        .ibox-content {
            background-color: #ffffff;
            color: inherit;
            padding: 15px 20px 20px 20px;
            border-color: #e7eaec;
            border-image: none;
            border-style: solid solid none;
            border-width: 1px 0;
        }

        .ibox-footer {
            color: inherit;
            border-top: 1px solid #e7eaec;
            font-size: 90%;
            background: #ffffff;
            padding: 10px 15px;
        }
    </style>
    <script>
        $(document).ready(function () {
            //initializing tooltip
            $('[data-toggle="tooltip"]').tooltip();

        });

    </script>
</head>
<body class="body">
<header id="header">
    <div class="toggle-btn"><span></span></div>
    <div class="bg-overlay">&nbsp;</div>
    <nav class="navbar navbar-expand-md">
        <div class="container d-flex align-items-center">
            <a class="navbar-brand" href="<?php echo base_url(); ?>"><img
                        src="<?php echo base_url('assets/home/images/logo.png'); ?>" class="logo-image" alt="Logo"></a>
            <div class="collapse navbar-collapse justify-content-center" id="navbar">
                <ul class="navbar-nav text-uppercase">
                    <li class="nav-item"><a class="nav-link active" href="<?php echo base_url(); ?>">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>about-us">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>work_with_us">Work With
                            Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>blogList">Blog</a></li>
                    <li class="nav-item"><a href="tel:+91-9811032026" data-toggle="tooltip" data-placement="top"
                                            title="+91-9811032026" class="nav-link phone-icon"><i
                                    class="fa fa-phone"></i></a></li>
                </ul>
            </div>
            <div class="social-icon">
                <ul>
                    <li><a class="facebook" title="facebook" target="_blank"
                           href="https://www.facebook.com/skillpromisetool"><i class="fa fa-facebook"></i></a></li>
                    <li><a class="twitter" title="twitter" target="_blank" href="https://twitter.com/skillpromise"><i
                                    class="fa fa-twitter"></i></a></li>
                    <li><a class="instagram" title="instagram" target="_blank"
                           href="http://skillpromise.co/set_data_home"><i class="fa fa-instagram"></i></a></li>
                    <li><a class="linkedIn" target="_blank" title="LinkedIn"
                           href="https://www.linkedin.com/company/skill-promise/"><i class="fa fa-linkedin"></i></a>
                    </li>
                </ul>
            </div>
            <div class="phone-mobile"></div>
            <a class="login-btn" href="<?php echo base_url(); ?>signin">LOGIN</a>
        </div>
    </nav>
</header>
<section class="testimonials-grp-bg" style="padding:40px 0;">
    <div class="container">
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-md-9">
                    <div class="ibox">
                        <div class="ibox-title">
                            <span class="pull-right">(<strong><?php echo (!empty($products)) ? count($products): 0; ?></strong>) items</span>
                            <h5>Items in your cart</h5>
                        </div>
                        <?php
                        $total = 0;
                        if (!empty($products)) {
                            foreach ($products as $key => $value) {
                                $total = $total + $value['price'];
                                ?>
                                <div class="ibox-content">
                                    <div class="table-responsive">
                                        <table class="table shoping-cart-table">
                                            <tbody>
                                            <tr>
                                                <td width="90">
                                                    <div class="cart-product-imitation">
                                                        <img src="<?php echo $value['product_image']; ?>"/>
                                                    </div>
                                                </td>
                                                <td class="desc">
                                                    <h3>
                                                        <a href="<?php echo base_url('programedetails/' . $value['id']); ?>"
                                                           class="text-navy">
                                                            <?php echo $value['name']; ?>
                                                        </a>
                                                    </h3>
                                                    <dl class="small m-b-none">
                                                        <dt><?php echo $value['package_name']; ?></dt>
                                                    </dl>

                                                    <div class="m-t-sm">
                                                        <a data-id="<?php echo $value['rowid'] ?>"
                                                           class="remove text-muted"><i class="fa fa-trash"
                                                                                        style="color: red;"></i>
                                                            Remove
                                                            item</a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h4>
                                                        <?php echo $value['price']; ?>
                                                    </h4>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>

                        <div class="ibox-content">
                            <a href="<?php echo base_url('checkout'); ?>" class="btn btn-primary pull-right"><i
                                        class="fa fa fa-shopping-cart"></i> Checkout</a>
                            <a href="<?php echo base_url(); ?>" class="btn btn-white"><i class="fa fa-arrow-left"></i>
                                Continue shopping</a>

                        </div>
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Cart Summary</h5>
                        </div>
                        <div class="ibox-content">
                    <span>
                        Total
                    </span>
                            <h2 class="font-bold">
                                Rs <?php echo number_format($total, 2); ?>
                            </h2>

                            <hr>
                            <span class="text-muted small">
<!--                        *For United States, France and Germany applicable sales tax will be applied-->
                    </span>
                            <div class="m-t-sm">
                                <div class="btn-group">
                                    <a href="<?php echo base_url('checkout'); ?>" class="btn btn-primary btn-sm"><i
                                                class="fa fa-shopping-cart"></i> Checkout</a>
                                    <a href="<?php echo base_url(); ?>" class="btn btn-white btn-sm"> Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Support</h5>
                        </div>
                        <div class="ibox-content text-center">
                            <h3><i class="fa fa-phone"></i> +43 100 783 001</h3>
                            <span class="small">
                        Please contact with us if you have any questions. We are avalible 24h.
                    </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<br>
<?php $this->load->view('home_footer'); ?>
<script>
    let BASE_URL = "<?php echo base_url(); ?>";
    $('.remove').on('click', function () {
        let rowid = $(this).data('id');
        console.log(rowid)
        $.ajax({
            url: BASE_URL + "deleteItem",
            type: 'POST',
            data: {
                rowid: rowid,
                qty: 0
            },
            success: function (result) {
                location.reload();
            }
        });
    });
</script>
<?php
?>
</body>
</html>