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
        <form method="post" action="<?php echo base_url() . 'makePayment' ?>" class="needs-validation" novalidate>
            <div class="row">
                <div class="col-md-4 order-md-2 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Your cart</span>
                        <span class="badge badge-secondary badge-pill"><?php echo $product_count; ?></span>
                    </h4>
                    <ul class="list-group mb-3">
                        <?php
                        if (!empty($products)) {
                            $total = 0;
                            foreach ($products as $key => $value) {
                                $total = $total + $value['price'];
                                ?>
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <h6 class="my-0"><?php echo $value['name']; ?></h6>
                                        <!--                                    <small class="text-muted">Brief description</small>-->
                                    </div>
                                    <span class="text-muted"><?php echo $value['price']; ?></span>
                                </li>
                                <?php
                            }
                        }
                        ?>
                        <!--                    <li class="list-group-item d-flex justify-content-between bg-light">-->
                        <!--                        <div class="text-success">-->
                        <!--                            <h6 class="my-0">Promo code</h6>-->
                        <!--                            <small>EXAMPLECODE</small>-->
                        <!--                        </div>-->
                        <!--                        <span class="text-success">-$5</span>-->
                        <!--                    </li>-->
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total (RS)</span>
                            <strong>Rs. <?php echo number_format($total, 2); ?></strong>
                        </li>
                    </ul>
                    <input type="hidden" name="total" value="<?php echo number_format($total, 2);  ?>"/>
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now</button>
                    <!--                <form class="card p-2">-->
                    <!--                    <div class="input-group">-->
                    <!--                        <input type="text" class="form-control" placeholder="Promo code">-->
                    <!--                        <div class="input-group-append">-->
                    <!--                            <button type="submit" class="btn btn-secondary">Redeem</button>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <!--                </form>-->
                </div>
                <div class="col-md-8 order-md-1">
                    <h4 class="mb-3">Billing Address</h4>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="fname">First name</label>
                            <input type="text" class="form-control" id="fname" placeholder="First Name" name="fname"
                                   required>
                            <div class="invalid-feedback">
                                Please provide your first name.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lname">Last name</label>
                            <input type="text" class="form-control" id="lname" placeholder="Last Name" name="lname">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="email">Email</label>
                            <div class="input-group">
                                <input type="email" class="form-control" id="email" name="email"
                                       placeholder="you@example.com" required>
                            </div>
                            <div class="invalid-feedback">
                                Please provide your email address.
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                   placeholder="Password" required>
                            <div class="invalid-feedback">
                                Please provide the password.
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="user_name">Username</label>
                            <input type="text" class="form-control" id="user_name" name="user_name"
                                   placeholder="Username" required>
                            <div class="invalid-feedback">
                                Please provide username.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="phone">Phone Number</label>
                            <input type="number" class="form-control" id="phone" name="phone"
                                   placeholder="Phone Number" required>
                            <div class="invalid-feedback">
                                Please provide phone number.
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="dob">Date Of Birth</label>
                            <input type="date" class="form-control" id="dob" name="dob" placeholder="Date Of Birth"
                                   required>
                            <div class="invalid-feedback">
                                Please provide date of birth.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="category">Category</label>
                            <select class="custom-select d-block w-100" id="category" name="category">
                                <option value="" disabled>Select Category</option>
                                <option value="School">School</option>
                                <option value="College">College</option>
                                <option value="Professionals">Professionals</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select the category.
                            </div>
                        </div>
                    </div>

                    <div class="row" id="school">
                        <div class="col-md-6 mb-3">
                            <label for="class">Class</label>
                            <select class="custom-select d-block w-100" id="class" name="class">
                                <option value="">Class</option>
                                <option value="5">v</option>
                                <option value="6">vi</option>
                                <option value="7">vii</option>
                                <option value="8">viii</option>
                                <option value="9">ix</option>
                                <option value="10">x</option>
                                <option value="11">xi</option>
                                <option value="12">xii</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select the class.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="stream">Stream</label>
                            <select class="custom-select d-block w-100" id="stream" name="stream">
                                <option value="">Stream</option>
                                <option value="Commerce">Commerce</option>
                                <option value="Humanities">Humanities</option>
                                <option value="Science">Science</option>
                                <option value="Others">Others</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select stream.
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="other_stream">Other Stream</label>
                            <input type="text" class="form-control" id="other_stream" name="other_stream"
                                   placeholder="Specify other stream">
                        </div>
                    </div>
                    <div class="row" id="college">
                        <div class="col-md-6 mb-3">
                            <label for="specialization_area_parent">Stream</label>
                            <select class="custom-select d-block w-100 stream" id="specialization_area_parent"
                                    name="specialization_area_parent">
                                <option value="0">Stream</option>
                                <option value="1">Engineering</option>
                                <option value="2">Management</option>
                                <option value="3">Science</option>
                                <option value="4">Humanities</option>
                                <option value="5">Law</option>
                                <option value="6">Healthcare</option>
                                <option value="7">Hotel Management</option>
                                <option value="8">Commerce</option>
                                <option value="9">Journalism and Mass Communication</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="other_stream">Other Stream</label>
                            <input type="text" class="form-control" id="other_stream" name="other_stream"
                                   placeholder="Specify other stream">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="course">Course</label>
                            <select class="custom-select d-block w-100 course" id="course" name="course">
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="other_course">Other courses</label>
                            <input type="text" class="form-control" id="other_course" name="other_course"
                                   placeholder="Specify other course">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="specialization_area_child">Area of Specialization</label>
                            <select class="custom-select d-block w-100" id="specialization_area_child"
                                    name="specialization_area_child">
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="other_specialization_area">Other Specialization Area</label>
                            <input type="text" class="form-control" id="other_specialization_area"
                                   name="other_specialization_area"
                                   placeholder="Specify Specialization if Other!">
                        </div>
                    </div>
                    <div class="row" id="professionals">
                        <div class="col-md-6 mb-3">
                            <label for="designation">Designation</label>
                            <input type="text" class="form-control" id="designation" name="designation"
                                   placeholder="Designation">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="work_exp">Work Experience</label>
                            <input type="text" class="form-control" id="work_exp" name="work_exp"
                                   placeholder="Working Experience in Years">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="work_area">Working Area</label>
                            <select class="custom-select d-block w-100" id="work_area" name="work_area">
                                <option value="">Working Area</option>
                                <option value="administartion">Administartion</option>
                                <option value="customercare">Customer Care</option>
                                <option value="engineering">Engineering</option>
                                <option value="facilities">Facilities</option>
                                <option value="finance">Finance</option>
                                <option value="hotelmanagement">Hotel Management</option>
                                <option value="hr">HR</option>
                                <option value="legal">Legal</option>
                                <option value="market6ing">Marketing</option>
                                <option value="operations">Operations</option>
                                <option value="programming">Programming</option>
                                <option value="sales">Sales</option>
                                <option value="servicedelivery">Service Delivery</option>
                                <option value="testing">Testing</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="work_area">Other Work Area</label>
                            <input type="text" class="form-control" id="work_area" name="work_area"
                                   placeholder="Specify Work Area if Other!">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="country">Country</label>
                            <select class="custom-select d-block w-100" id="country" required>
                                <option value="Afghanistan">Afghanistan</option>
                                <option value="Åland Islands">Åland Islands</option>
                                <option value="Albania">Albania</option>
                                <option value="Algeria">Algeria</option>
                                <option value="American Samoa">American Samoa</option>
                                <option value="Andorra">Andorra</option>
                                <option value="Angola">Angola</option>
                                <option value="Anguilla">Anguilla</option>
                                <option value="Antarctica">Antarctica</option>
                                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                <option value="Argentina">Argentina</option>
                                <option value="Armenia">Armenia</option>
                                <option value="Aruba">Aruba</option>
                                <option value="Australia">Australia</option>
                                <option value="Austria">Austria</option>
                                <option value="Azerbaijan">Azerbaijan</option>
                                <option value="Bahamas">Bahamas</option>
                                <option value="Bahrain">Bahrain</option>
                                <option value="Bangladesh">Bangladesh</option>
                                <option value="Barbados">Barbados</option>
                                <option value="Belarus">Belarus</option>
                                <option value="Belgium">Belgium</option>
                                <option value="Belize">Belize</option>
                                <option value="Benin">Benin</option>
                                <option value="Bermuda">Bermuda</option>
                                <option value="Bhutan">Bhutan</option>
                                <option value="Bolivia">Bolivia</option>
                                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                <option value="Botswana">Botswana</option>
                                <option value="Bouvet Island">Bouvet Island</option>
                                <option value="Brazil">Brazil</option>
                                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                <option value="Brunei Darussalam">Brunei Darussalam</option>
                                <option value="Bulgaria">Bulgaria</option>
                                <option value="Burkina Faso">Burkina Faso</option>
                                <option value="Burundi">Burundi</option>
                                <option value="Cambodia">Cambodia</option>
                                <option value="Cameroon">Cameroon</option>
                                <option value="Canada">Canada</option>
                                <option value="Cape Verde">Cape Verde</option>
                                <option value="Cayman Islands">Cayman Islands</option>
                                <option value="Central African Republic">Central African Republic</option>
                                <option value="Chad">Chad</option>
                                <option value="Chile">Chile</option>
                                <option value="China">China</option>
                                <option value="Christmas Island">Christmas Island</option>
                                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                <option value="Colombia">Colombia</option>
                                <option value="Comoros">Comoros</option>
                                <option value="Congo">Congo</option>
                                <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of
                                    The
                                </option>
                                <option value="Cook Islands">Cook Islands</option>
                                <option value="Costa Rica">Costa Rica</option>
                                <option value="Cote D'ivoire">Cote D'ivoire</option>
                                <option value="Croatia">Croatia</option>
                                <option value="Cuba">Cuba</option>
                                <option value="Cyprus">Cyprus</option>
                                <option value="Czech Republic">Czech Republic</option>
                                <option value="Denmark">Denmark</option>
                                <option value="Djibouti">Djibouti</option>
                                <option value="Dominica">Dominica</option>
                                <option value="Dominican Republic">Dominican Republic</option>
                                <option value="Ecuador">Ecuador</option>
                                <option value="Egypt">Egypt</option>
                                <option value="El Salvador">El Salvador</option>
                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                <option value="Eritrea">Eritrea</option>
                                <option value="Estonia">Estonia</option>
                                <option value="Ethiopia">Ethiopia</option>
                                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                <option value="Faroe Islands">Faroe Islands</option>
                                <option value="Fiji">Fiji</option>
                                <option value="Finland">Finland</option>
                                <option value="France">France</option>
                                <option value="French Guiana">French Guiana</option>
                                <option value="French Polynesia">French Polynesia</option>
                                <option value="French Southern Territories">French Southern Territories</option>
                                <option value="Gabon">Gabon</option>
                                <option value="Gambia">Gambia</option>
                                <option value="Georgia">Georgia</option>
                                <option value="Germany">Germany</option>
                                <option value="Ghana">Ghana</option>
                                <option value="Gibraltar">Gibraltar</option>
                                <option value="Greece">Greece</option>
                                <option value="Greenland">Greenland</option>
                                <option value="Grenada">Grenada</option>
                                <option value="Guadeloupe">Guadeloupe</option>
                                <option value="Guam">Guam</option>
                                <option value="Guatemala">Guatemala</option>
                                <option value="Guernsey">Guernsey</option>
                                <option value="Guinea">Guinea</option>
                                <option value="Guinea-bissau">Guinea-bissau</option>
                                <option value="Guyana">Guyana</option>
                                <option value="Haiti">Haiti</option>
                                <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands
                                </option>
                                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                <option value="Honduras">Honduras</option>
                                <option value="Hong Kong">Hong Kong</option>
                                <option value="Hungary">Hungary</option>
                                <option value="Iceland">Iceland</option>
                                <option value="India" selected="true">India</option>
                                <option value="Indonesia">Indonesia</option>
                                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                <option value="Iraq">Iraq</option>
                                <option value="Ireland">Ireland</option>
                                <option value="Isle of Man">Isle of Man</option>
                                <option value="Israel">Israel</option>
                                <option value="Italy">Italy</option>
                                <option value="Jamaica">Jamaica</option>
                                <option value="Japan">Japan</option>
                                <option value="Jersey">Jersey</option>
                                <option value="Jordan">Jordan</option>
                                <option value="Kazakhstan">Kazakhstan</option>
                                <option value="Kenya">Kenya</option>
                                <option value="Kiribati">Kiribati</option>
                                <option value="Korea, Democratic People's Republic of">Korea, Democratic People's
                                    Republic of
                                </option>
                                <option value="Korea, Republic of">Korea, Republic of</option>
                                <option value="Kuwait">Kuwait</option>
                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                <option value="Lao People's Democratic Republic">Lao People's Democratic Republic
                                </option>
                                <option value="Latvia">Latvia</option>
                                <option value="Lebanon">Lebanon</option>
                                <option value="Lesotho">Lesotho</option>
                                <option value="Liberia">Liberia</option>
                                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                <option value="Liechtenstein">Liechtenstein</option>
                                <option value="Lithuania">Lithuania</option>
                                <option value="Luxembourg">Luxembourg</option>
                                <option value="Macao">Macao</option>
                                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former
                                    Yugoslav Republic of
                                </option>
                                <option value="Madagascar">Madagascar</option>
                                <option value="Malawi">Malawi</option>
                                <option value="Malaysia">Malaysia</option>
                                <option value="Maldives">Maldives</option>
                                <option value="Mali">Mali</option>
                                <option value="Malta">Malta</option>
                                <option value="Marshall Islands">Marshall Islands</option>
                                <option value="Martinique">Martinique</option>
                                <option value="Mauritania">Mauritania</option>
                                <option value="Mauritius">Mauritius</option>
                                <option value="Mayotte">Mayotte</option>
                                <option value="Mexico">Mexico</option>
                                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                <option value="Moldova, Republic of">Moldova, Republic of</option>
                                <option value="Monaco">Monaco</option>
                                <option value="Mongolia">Mongolia</option>
                                <option value="Montenegro">Montenegro</option>
                                <option value="Montserrat">Montserrat</option>
                                <option value="Morocco">Morocco</option>
                                <option value="Mozambique">Mozambique</option>
                                <option value="Myanmar">Myanmar</option>
                                <option value="Namibia">Namibia</option>
                                <option value="Nauru">Nauru</option>
                                <option value="Nepal">Nepal</option>
                                <option value="Netherlands">Netherlands</option>
                                <option value="Netherlands Antilles">Netherlands Antilles</option>
                                <option value="New Caledonia">New Caledonia</option>
                                <option value="New Zealand">New Zealand</option>
                                <option value="Nicaragua">Nicaragua</option>
                                <option value="Niger">Niger</option>
                                <option value="Nigeria">Nigeria</option>
                                <option value="Niue">Niue</option>
                                <option value="Norfolk Island">Norfolk Island</option>
                                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                <option value="Norway">Norway</option>
                                <option value="Oman">Oman</option>
                                <option value="Pakistan">Pakistan</option>
                                <option value="Palau">Palau</option>
                                <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                <option value="Panama">Panama</option>
                                <option value="Papua New Guinea">Papua New Guinea</option>
                                <option value="Paraguay">Paraguay</option>
                                <option value="Peru">Peru</option>
                                <option value="Philippines">Philippines</option>
                                <option value="Pitcairn">Pitcairn</option>
                                <option value="Poland">Poland</option>
                                <option value="Portugal">Portugal</option>
                                <option value="Puerto Rico">Puerto Rico</option>
                                <option value="Qatar">Qatar</option>
                                <option value="Reunion">Reunion</option>
                                <option value="Romania">Romania</option>
                                <option value="Russian Federation">Russian Federation</option>
                                <option value="Rwanda">Rwanda</option>
                                <option value="Saint Helena">Saint Helena</option>
                                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                <option value="Saint Lucia">Saint Lucia</option>
                                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines
                                </option>
                                <option value="Samoa">Samoa</option>
                                <option value="San Marino">San Marino</option>
                                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                <option value="Saudi Arabia">Saudi Arabia</option>
                                <option value="Senegal">Senegal</option>
                                <option value="Serbia">Serbia</option>
                                <option value="Seychelles">Seychelles</option>
                                <option value="Sierra Leone">Sierra Leone</option>
                                <option value="Singapore">Singapore</option>
                                <option value="Slovakia">Slovakia</option>
                                <option value="Slovenia">Slovenia</option>
                                <option value="Solomon Islands">Solomon Islands</option>
                                <option value="Somalia">Somalia</option>
                                <option value="South Africa">South Africa</option>
                                <option value="South Georgia and The South Sandwich Islands">South Georgia and The South
                                    Sandwich Islands
                                </option>
                                <option value="Spain">Spain</option>
                                <option value="Sri Lanka">Sri Lanka</option>
                                <option value="Sudan">Sudan</option>
                                <option value="Suriname">Suriname</option>
                                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                <option value="Swaziland">Swaziland</option>
                                <option value="Sweden">Sweden</option>
                                <option value="Switzerland">Switzerland</option>
                                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                                <option value="Tajikistan">Tajikistan</option>
                                <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                <option value="Thailand">Thailand</option>
                                <option value="Timor-leste">Timor-leste</option>
                                <option value="Togo">Togo</option>
                                <option value="Tokelau">Tokelau</option>
                                <option value="Tonga">Tonga</option>
                                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                <option value="Tunisia">Tunisia</option>
                                <option value="Turkey">Turkey</option>
                                <option value="Turkmenistan">Turkmenistan</option>
                                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                <option value="Tuvalu">Tuvalu</option>
                                <option value="Uganda">Uganda</option>
                                <option value="Ukraine">Ukraine</option>
                                <option value="United Arab Emirates">United Arab Emirates</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="United States">United States</option>
                                <option value="United States Minor Outlying Islands">United States Minor Outlying
                                    Islands
                                </option>
                                <option value="Uruguay">Uruguay</option>
                                <option value="Uzbekistan">Uzbekistan</option>
                                <option value="Vanuatu">Vanuatu</option>
                                <option value="Venezuela">Venezuela</option>
                                <option value="Viet Nam">Viet Nam</option>
                                <option value="Virgin Islands, British">Virgin Islands, British</option>
                                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                <option value="Wallis and Futuna">Wallis and Futuna</option>
                                <option value="Western Sahara">Western Sahara</option>
                                <option value="Yemen">Yemen</option>
                                <option value="Zambia">Zambia</option>
                                <option value="Zimbabwe">Zimbabwe</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid country.
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="state">State</label>
                            <select class="custom-select d-block w-100" id="state" required>
                                <option value="">State</option>
                                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                <option value="Assam">Assam</option>
                                <option value="Bihar">Bihar</option>
                                <option value="Chandigarh">Chandigarh</option>
                                <option value="Chhattisgarh">Chhattisgarh</option>
                                <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                <option value="Daman and Diu">Daman and Diu</option>
                                <option value="Delhi">Delhi</option>
                                <option value="Goa">Goa</option>
                                <option value="Gujarat">Gujarat</option>
                                <option value="Haryana">Haryana</option>
                                <option value="Himachal Pradesh">Himachal Pradesh</option>
                                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                <option value="Jharkhand">Jharkhand</option>
                                <option value="Karnataka">Karnataka</option>
                                <option value="Kerala">Kerala</option>
                                <option value="Lakshadweep">Lakshadweep</option>
                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                <option value="Maharashtra">Maharashtra</option>
                                <option value="Manipur">Manipur</option>
                                <option value="Meghalaya">Meghalaya</option>
                                <option value="Mizoram">Mizoram</option>
                                <option value="Nagaland">Nagaland</option>
                                <option value="Orissa">Orissa</option>
                                <option value="Pondicherry">Pondicherry</option>
                                <option value="Punjab">Punjab</option>
                                <option value="Rajasthan">Rajasthan</option>
                                <option value="Sikkim">Sikkim</option>
                                <option value="Tamil Nadu">Tamil Nadu</option>
                                <option value="Tripura">Tripura</option>
                                <option value="Uttaranchal">Uttaranchal</option>
                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                <option value="West Bengal">West Bengal</option>
                            </select>
                            <div class="invalid-feedback">
                                Please provide a valid state.
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="zip">City</label>
                            <input type="text" class="form-control" id="zip" placeholder="" required>
                            <div class="invalid-feedback">
                                Zip code required.
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now</button>

                </div>
            </div>
        </form>
    </div>
</section>
<br>
<?php $this->load->view('home_footer'); ?>
<style>
    .program-video-tour video {
        width: 100%;
    }
</style>
<script>

    $(document).ready(function () {
        $("#school").removeClass("d-none");
        $("#college").addClass("d-none");
        $("#professionals").addClass("d-none");
    });

    $("#category").on("change", function () {
        let category = $('#category :selected').val();
        if (category == 'School') {
            $("#college").addClass("d-none");
            $("#professionals").addClass("d-none");
            $("#school").removeClass("d-none");
        }
        if (category == 'College') {
            $("#school").addClass("d-none");
            $("#professionals").addClass("d-none");
            $("#college").removeClass("d-none");
        }
        if (category == 'Professionals') {
            $("#school").addClass("d-none");
            $("#college").addClass("d-none");
            $("#professionals").removeClass("d-none");
        }
    });

    $(".stream").change(function () {
        var stream1 = $("#specialization_area_parent option:selected").text();
        var series1 = [
            {stream: 'Engineering', course: 'B.Tech. Computer Science'},
            {stream: 'Engineering', course: 'B.Tech. Electronics & Communication'},
            {stream: 'Engineering', course: 'B.Tech. Electrical'},
            {stream: 'Engineering', course: 'B.Tech. Mechanical'},
            {stream: 'Engineering', course: 'B.Tech. Civil'},
            {stream: 'Engineering', course: 'B.Tech. Biotechnology'},
            {stream: 'Engineering', course: 'B.Tech. Aeronautical'},
            {stream: 'Engineering', course: 'B.Tech. Instrumentation & Control'},
            {stream: 'Engineering', course: 'B.Tech. Instrumentation & Control'},
            {stream: 'Law', course: 'LLB'},
            {stream: 'Law', course: 'LLM'},
            {stream: 'Law', course: 'PhD'},
            {stream: 'Management', course: 'BBA'},
            {stream: 'Management', course: 'BCA'},
            {stream: 'Management', course: 'MCA'},
            {stream: 'Management', course: 'MBA Marketing'},
            {stream: 'Management', course: 'MBA Finance'},
            {stream: 'Management', course: 'MBA Human Resources'},
            {stream: 'Management', course: 'MBA Analytics'},
            {stream: 'Management', course: 'MBA Retail'},
            {stream: 'Management', course: 'MBA International Business'},
            {stream: 'Management', course: 'MBA Operations'},
            {stream: 'Management', course: 'PGDM Marketing'},
            {stream: 'Management', course: 'PGDM Finance'},
            {stream: 'Management', course: 'PGDM Human Resources'},
            {stream: 'Management', course: 'PGDM Analytics'},
            {stream: 'Management', course: 'PGDM Retail'},
            {stream: 'Management', course: 'PGDM International Business'},
            {stream: 'Management', course: 'PGDM Operations'},
            {stream: 'Science', course: 'BSc Physics'},
            {stream: 'Science', course: 'BSc Chemistry'},
            {stream: 'Science', course: 'BSc Botany'},
            {stream: 'Science', course: 'BSc Zoology'},
            {stream: 'Science', course: 'BSc Biochemistry'},
            {stream: 'Science', course: 'BSc Statistics'},
            {stream: 'Science', course: 'BSc Environmental Science'},
            {stream: 'Science', course: 'BSc Agriculture'},
            {stream: 'Science', course: 'BSc Horticulture'},
            //{stream: 'Science', course: 'PhD'},
            {stream: 'Humanities', course: 'BA Pass'},
            {stream: 'Humanities', course: 'BA Psychology'},
            {stream: 'Humanities', course: 'BA Philosophy'},
            {stream: 'Humanities', course: 'BA Sociology'},
            {stream: 'Humanities', course: 'BA Political Science'},
            {stream: 'Humanities', course: 'BA Language & Literature'},
            {stream: 'Humanities', course: 'BA Economics'},
            {stream: 'Humanities', course: 'BA History'},
            {stream: 'Humanities', course: 'BA Geography'},
            //{stream: 'Hotel Management', course: 'Bachelor’s in Hotel Management'},
            //{stream: 'Hotel Management', course: 'Bachelor’s in Hotel Management and Catering Technology'},
            //{stream: 'Hotel Management', course: 'Master’s in Hotel Management'},
            //{stream: 'Hotel Management', course: 'Master’s in Hotel Management and Catering Technology'},
            //{stream: 'Hotel Management', course: 'PhD in Hotel Management'},
            {stream: 'Hotel Management', course: 'BA Hotel Management'},
            {stream: 'Hotel Management', course: 'BHM'},
            {stream: 'Healthcare', course: 'MBBS'},
            {stream: 'Healthcare', course: 'B. Pharm'},
            {stream: 'Healthcare', course: 'M. Pharm'},
            {stream: 'Healthcare', course: 'MD'},
            {stream: 'Healthcare', course: 'PhD'},
            {stream: 'Healthcare', course: 'MBBS'},
            {stream: 'Healthcare', course: 'B. Sc. Nursing'},
            {stream: 'Healthcare', course: 'B. Sc. Nutrition & Dietetics'},
            {stream: 'Healthcare', course: 'B. Sc. Physiotherapy'},
            {stream: 'Commerce', course: 'B. Com'},
            {stream: 'Commerce', course: 'M. Com'},
            {stream: 'Journalism and Mass Communication', course: 'BA Journalism & Mass Communication'},
            {stream: 'Journalism and Mass Communication', course: 'B.J.M.C'}
        ]

        var series2 = [
            {stream: 'Engineering', aos: 'Aeronautical'},
            {stream: 'Engineering', aos: 'Biotechnology'},
            {stream: 'Engineering', aos: 'Chemical'},
            {stream: 'Engineering', aos: 'Civil'},
            {stream: 'Engineering', aos: 'CS & IT'},
            {stream: 'Engineering', aos: 'ECE'},
            {stream: 'Engineering', aos: 'Electrical & Electronics'},
            {stream: 'Engineering', aos: 'Instrumentation'},
            {stream: 'Engineering', aos: 'Mechanical'},
            {stream: 'Engineering', aos: 'Metallurgy'},
            {stream: 'Engineering', aos: 'Nanotechnology'},
            {stream: 'Engineering', aos: 'Other'},
            {stream: 'Law', aos: 'Civil'},
            {stream: 'Law', aos: 'Corporate'},
            {stream: 'Law', aos: 'Criminal'},
            {stream: 'Law', aos: 'General'},
            {stream: 'Law', aos: 'International'},
            {stream: 'Law', aos: 'Labor'},
            {stream: 'Law', aos: 'Patent'},
            {stream: 'Law', aos: 'Real Estate'},
            {stream: 'Law', aos: 'Tax '},
            {stream: 'Law', aos: 'Other'},
            {stream: 'Management', aos: 'Agri-Business'},
            {stream: 'Management', aos: 'Entrepreneurship'},
            {stream: 'Management', aos: 'Finance'},
            {stream: 'Management', aos: 'Health care'},
            {stream: 'Management', aos: 'Hospitality, Travel and Tourism'},
            {stream: 'Management', aos: 'Hospital'},
            {stream: 'Management', aos: 'Hotel Management'},
            {stream: 'Management', aos: 'Human Resources'},
            {stream: 'Management', aos: 'International Business'},
            {stream: 'Management', aos: 'IT'},
            {stream: 'Management', aos: 'Marketing'},
            {stream: 'Management', aos: 'Operations'},
            {stream: 'Management', aos: 'Retail'},
            {stream: 'Management', aos: 'Rural Management'},
            {stream: 'Management', aos: 'Supply Chain Management'},
            {stream: 'Management', aos: 'Other'},
            {stream: 'Science', aos: 'Agriculture'},
            {stream: 'Science', aos: 'Animation'},
            {stream: 'Science', aos: 'Aquaculture'},
            {stream: 'Science', aos: 'Aviation'},
            {stream: 'Science', aos: 'Biochemistry'},
            {stream: 'Science', aos: 'Bioinformatics'},
            {stream: 'Science', aos: 'Biology'},
            {stream: 'Science', aos: 'Botany'},
            {stream: 'Science', aos: 'Chemistry'},
            {stream: 'Science', aos: 'Computer Science'},
            {stream: 'Science', aos: 'Dietetics'},
            {stream: 'Science', aos: 'Electronics'},
            {stream: 'Science', aos: 'Fashion Technology'},
            {stream: 'Science', aos: 'Food Technology'},
            {stream: 'Science', aos: 'Forensic Science'},
            {stream: 'Science', aos: 'Forestry'},
            {stream: 'Science', aos: 'Genetics'},
            {stream: 'Science', aos: 'Home Science'},
            {stream: 'Science', aos: 'Horticulture'},
            {stream: 'Science', aos: 'Hospitality and Hotel Administration'},
            {stream: 'Science', aos: 'Hospitality and Tourism Management'},
            {stream: 'Science', aos: 'Information Technology'},
            {stream: 'Science', aos: 'Interior Design'},
            {stream: 'Science', aos: 'Mathematics'},
            {stream: 'Science', aos: 'Medical Technology'},
            {stream: 'Science', aos: 'Microbiology'},
            {stream: 'Science', aos: 'Multimedia'},
            {stream: 'Science', aos: 'Nautical Science'},
            {stream: 'Science', aos: 'Nursing'},
            {stream: 'Science', aos: 'Physics'},
            {stream: 'Science', aos: 'Physiotherapy'},
            {stream: 'Science', aos: 'Psychology'},
            {stream: 'Science', aos: 'Statistics'},
            {stream: 'Science', aos: 'Zoology'},
            {stream: 'Science', aos: 'Other'},
            {stream: 'Humanities', aos: 'Archeology'},
            {stream: 'Humanities', aos: 'Economics'},
            {stream: 'Humanities', aos: 'General'},
            {stream: 'Humanities', aos: 'Geography'},
            {stream: 'Humanities', aos: 'History'},
            {stream: 'Humanities', aos: 'Hotel Management'},
            {stream: 'Humanities', aos: 'Library Sciences'},
            {stream: 'Humanities', aos: 'Literature'},
            {stream: 'Humanities', aos: 'Philosophy'},
            {stream: 'Humanities', aos: 'Political Science'},
            {stream: 'Humanities', aos: 'Psephology'},
            {stream: 'Humanities', aos: 'Psychology'},
            {stream: 'Humanities', aos: 'Public Administration'},
            {stream: 'Humanities', aos: 'Sociology'},
            {stream: 'Humanities', aos: 'Statistics'},
            {stream: 'Humanities', aos: 'Other'},
            {stream: 'Hotel Management', aos: 'Accommodation'},
            {stream: 'Hotel Management', aos: 'Bakery and Confectionary '},
            {stream: 'Hotel Management', aos: 'Food and Beverage'},
            {stream: 'Hotel Management', aos: 'Food Production'},
            {stream: 'Hotel Management', aos: 'Front Office'},
            {stream: 'Hotel Management', aos: 'General'},
            {stream: 'Hotel Management', aos: 'Housekeeping'},
            {stream: 'Hotel Management', aos: 'Other'},
            {stream: 'Healthcare', aos: 'Anesthesiology'},
            {stream: 'Healthcare', aos: 'Cardio-Thoracic surgery'},
            {stream: 'Healthcare', aos: 'Cardiology'},
            {stream: 'Healthcare', aos: 'Clinical Hematology'},
            {stream: 'Healthcare', aos: 'Craniologist'},
            {stream: 'Healthcare', aos: 'Dermatology'},
            {stream: 'Healthcare', aos: 'Endocrinology'},
            {stream: 'Healthcare', aos: 'ENT'},
            {stream: 'Healthcare', aos: 'Gastroenterology'},
            {stream: 'Healthcare', aos: 'General'},
            {stream: 'Healthcare', aos: 'General Medicine'},
            {stream: 'Healthcare', aos: 'General Surgery'},
            {stream: 'Healthcare', aos: 'Immunology'},
            {stream: 'Healthcare', aos: 'Nephrology'},
            {stream: 'Healthcare', aos: 'Neuro Surgery'},
            {stream: 'Healthcare', aos: 'Obstetrics and Gynecology'},
            {stream: 'Healthcare', aos: 'Oncology'},
            {stream: 'Healthcare', aos: 'Ophthalmology'},
            {stream: 'Healthcare', aos: 'Orthopedics'},
            {stream: 'Healthcare', aos: 'Pathologist'},
            {stream: 'Healthcare', aos: 'Pediatric surgery'},
            {stream: 'Healthcare', aos: 'Pediatrics'},
            {stream: 'Healthcare', aos: 'Plastic Surgery'},
            {stream: 'Healthcare', aos: 'Psychiatry'},
            {stream: 'Healthcare', aos: 'Rheumatology'},
            {stream: 'Healthcare', aos: 'Other'},
            {stream: 'Commerce', aos: 'Accounts and Finance'},
            {stream: 'Commerce', aos: 'Banking and Insurance'},
            {stream: 'Commerce', aos: 'Economics'},
            {stream: 'Commerce', aos: 'Entrepreneurship'},
            {stream: 'Commerce', aos: 'Financial Market'},
            {stream: 'Commerce', aos: 'General'},
            {stream: 'Commerce', aos: 'Investment Management'},
            {stream: 'Commerce', aos: 'Taxation'},
            {stream: 'Commerce', aos: 'Other'}
        ]


        switch (stream1) {
            case 'Engineering':

                var options = '<option value=""><strong>Course</strong></option>'; //create your "title" option
                $(series1).each(function (index, value) { //loop through your elements
                    if (value.stream == 'Engineering') { //check the company
                        options += '<option value="' + value.course + '">' + value.course + '</option>'; //add the option element as a string
                    }
                });

                $('#course').html(options);

                var options = '<option value=""><strong>Area of Specialization</strong></option>'; //create your "title" option
                $(series2).each(function (index, value2) { //loop through your elements
                    if (value2.stream == 'Engineering') { //check the company
                        options += '<option value="' + value2.aos + '">' + value2.aos + '</option>'; //add the option element as a string
                    }
                });

                $('#specialization_area_child').html(options);


                break;
            case 'Law':

                var options = '<option value=""><strong>Course</strong></option>'; //create your "title" option
                $(series1).each(function (index, value) { //loop through your elements
                    if (value.stream == 'Law') { //check the company
                        options += '<option value="' + value.course + '">' + value.course + '</option>'; //add the option element as a string
                    }
                });

                $('.course').html(options);

                var options = '<option value=""><strong>Area of Specialization</strong></option>'; //create your "title" option
                $(series2).each(function (index, value2) { //loop through your elements
                    if (value2.stream == 'Law') { //check the company
                        options += '<option value="' + value2.aos + '">' + value2.aos + '</option>'; //add the option element as a string
                    }
                });

                $('#specialization_area_child').html(options);

                break;
            case 'Management':

                var options = '<option value=""><strong>Course</strong></option>'; //create your "title" option
                $(series1).each(function (index, value) { //loop through your elements
                    if (value.stream == 'Management') { //check the company
                        options += '<option value="' + value.course + '">' + value.course + '</option>'; //add the option element as a string
                    }
                });

                $('#course').html(options);

                var options = '<option value=""><strong>Area of Specialization</strong></option>'; //create your "title" option
                $(series2).each(function (index, value2) { //loop through your elements
                    if (value2.stream == 'Management') { //check the company
                        options += '<option value="' + value2.aos + '">' + value2.aos + '</option>'; //add the option element as a string
                    }
                });

                $('#specialization_area_child').html(options);

                break;
            case 'Science':

                var options = '<option value=""><strong>Course</strong></option>'; //create your "title" option
                $(series1).each(function (index, value) { //loop through your elements
                    if (value.stream == 'Science') { //check the company
                        options += '<option value="' + value.course + '">' + value.course + '</option>'; //add the option element as a string
                    }
                });

            case 'Journalism and Mass Communication':

                var options = '<option value=""><strong>Course</strong></option>'; //create your "title" option
                $(series1).each(function (index, value) { //loop through your elements
                    if (value.stream == 'Journalism and Mass Communication') { //check the company
                        options += '<option value="' + value.course + '">' + value.course + '</option>'; //add the option element as a string
                    }
                });

                $('#course').html(options);

                var options = '<option value=""><strong>Area of Specialization</strong></option>'; //create your "title" option
                $(series2).each(function (index, value2) { //loop through your elements
                    if (value2.stream == 'Science') { //check the company
                        options += '<option value="' + value2.aos + '">' + value2.aos + '</option>'; //add the option element as a string
                    }
                });

                $('#specialization_area_child').html(options);

                break;
            case 'Humanities':

                var options = '<option value=""><strong>Course</strong></option>'; //create your "title" option
                $(series1).each(function (index, value) { //loop through your elements
                    if (value.stream == 'Humanities') { //check the company
                        options += '<option value="' + value.course + '">' + value.course + '</option>'; //add the option element as a string
                    }
                });

                $('#course').html(options);

                var options = '<option value=""><strong>Area of Specialization</strong></option>'; //create your "title" option
                $(series2).each(function (index, value2) { //loop through your elements
                    if (value2.stream == 'Humanities') { //check the company
                        options += '<option value="' + value2.aos + '">' + value2.aos + '</option>'; //add the option element as a string
                    }
                });

                $('#specialization_area_child').html(options);

                break;
            case 'Hotel Management':

                var options = '<option value=""><strong>Course</strong></option>'; //create your "title" option
                $(series1).each(function (index, value) { //loop through your elements
                    if (value.stream == 'Hotel Management') { //check the company
                        options += '<option value="' + value.course + '">' + value.course + '</option>'; //add the option element as a string
                    }
                });

                $('#course').html(options);

                var options = '<option value=""><strong>Area of Specialization</strong></option>'; //create your "title" option
                $(series2).each(function (index, value2) { //loop through your elements
                    if (value2.stream == 'Hotel Management') { //check the company
                        options += '<option value="' + value2.aos + '">' + value2.aos + '</option>'; //add the option element as a string
                    }
                });

                $('#specialization_area_child').html(options);

                break;
            case 'Healthcare':

                var options = '<option value=""><strong>Course</strong></option>'; //create your "title" option
                $(series1).each(function (index, value) { //loop through your elements
                    if (value.stream == 'Healthcare') { //check the company
                        options += '<option value="' + value.course + '">' + value.course + '</option>'; //add the option element as a string
                    }
                });

                $('#course').html(options);

                var options = '<option value=""><strong>Area of Specialization</strong></option>'; //create your "title" option
                $(series2).each(function (index, value2) { //loop through your elements
                    if (value2.stream == 'Healthcare') { //check the company
                        options += '<option value="' + value2.aos + '">' + value2.aos + '</option>'; //add the option element as a string
                    }
                });

                $('#specialization_area_child').html(options);

                break;
            case 'Commerce':

                var options = '<option value=""><strong>Course</strong></option>'; //create your "title" option
                $(series1).each(function (index, value) { //loop through your elements
                    if (value.stream == 'Commerce') { //check the company
                        options += '<option value="' + value.course + '">' + value.course + '</option>'; //add the option element as a string
                    }
                });

                $('#course').html(options);

                var options = '<option value=""><strong>Area of Specialization</strong></option>'; //create your "title" option
                $(series2).each(function (index, value2) { //loop through your elements
                    if (value2.stream == 'Commerce') { //check the company
                        options += '<option value="' + value2.aos + '">' + value2.aos + '</option>'; //add the option element as a string
                    }
                });

                $('#specialization_area_child').html(options);

                break;

            default :
                break;
        }
    });

    (function () {
        'use strict'

        window.addEventListener('load', function () {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation')

            // Loop over them and prevent submission
            Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        }, false)
    })()

</script>
<?php
?>
</body>
</html>