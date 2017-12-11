<?php
@ob_start();
session_start();


include 'bin/db_config.php';
include 'bin/selector.php';
include 'bin/insertor.php';
include('bin/instantiate_objects.php');



//$services = $selector->select_with_fetch("services"," status = '1' ORDER BY category_id" );

?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html lang="en" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html lang="en" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html lang="en" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
    <!-- meta character set -->
    <meta charset="utf-8">
    <!-- Always force latest IE rendering engine or request Chrome Frame -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>FM-AFRICA</title>
    <!-- Meta Description -->
    <meta name="description" content="Facility Management services">
    <meta name="keywords" content="facilitymanagers, facility, management, cleaners, propertymanagement, services">
    <meta name="author" content="Interstellar">

    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
    ================================================== -->
    <!-- Fontawesome Icon font -->
    <link rel="stylesheet" href="styles/form_style.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- bootstrap.min -->
    <link rel="stylesheet" href="css/jquery.fancybox.css">
    <!-- bootstrap.min -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- bootstrap.min -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <!-- bootstrap.min -->
    <link rel="stylesheet" href="css/slit-slider.css">
    <!-- bootstrap.min -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="css/main.css">
    <link href='https://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet' type='text/css'>
    <!-- Modernizer Script for old Browsers -->
    <script src="js/modernizr-2.6.2.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>

    <script src="js/jquery-1.11.1.min.js" ></script>
    <script src="js/reload.js" ></script>

    <script src='https://www.google.com/recaptcha/api.js'></script>
    <!--    Css for modal-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/2.3.1/css/flag-icon.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link rel="stylesheet" href="styles/bootstrap.min.css">
    <style>
        .hidden-input {
            display: none;
        }
        </style>

    <!--    Css for modal-->
    <style>
        .hidden-input {
            display: none;
        }
    </style>
    <link rel="stylesheet" href="Remodal-1.1.1/dist/remodal.css">
    <link rel="stylesheet" href="Remodal-1.1.1/dist/remodal-default-theme.css">




    <!--    Datatable-->
    <script src="DataTables/media/js/jquery.dataTables.js" ></script>
    <link href="DataTables/media/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />



    <!--    Datatable-->

    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 100%;
        }
        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

    </style>

    <!--    for captcha-->

    <!--    -->
    <script type="text/javascript">

        function checkForm(form)
        {
        ...

            if(!form.captcha.value.match(/^\d{5}$/)) {
            alert('Please enter the CAPTCHA digits in the box provided');
            form.captcha.focus();
            return false;
        }

        ...

            return true;
        }

    </script>
    <!---->
    <!--        for states and local government drop down-->
    <script type="text/javascript">
        $(document).ready(function(){
            $(".states_signup").change(function(){
                var selectedState = $(".states_signup option:selected").val();
                $.ajax({
                    type: "POST",
                    url: "php/process-request.php",
                    data: { state : selectedState }
                }).done(function(data){
                    $("#local_govt_div").html(data);
                });
            });
        });
    </script>


</head>

<body id="body">

<!-- preloader -->
<div id="preloader">
    <div class="loder-box">
        <div class="battery"></div>
    </div>
</div>
<!-- end preloader -->

<!--
Fixed Navigation
==================================== -->
<header id="navigation" class="navbar-inverse navbar-fixed-top animated-header">
    <div class="container">
        <div class="container-fluid">
        <div class="navbar-header">
            <!-- responsive nav button -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- /responsive nav button -->

            <!-- logo -->
            <h1 class="navbar-brand">
                <a href="#body"><img src="img/fmafricalogo.png"></a>
            </h1>
            <!-- /logo -->
        </div>

        <!-- main nav -->
        <nav class="collapse navbar-collapse navbar-right" role="navigation">
            <ul class="nav navbar-nav ">

                <li><a href="#body">Home</a></li>
                <li><a href="#how_itworks">How it works</a></li>
                <li><a href="#testimonials">Testimonial</a></li>
                <li><a href="#top_services">top services</a></li>
                <li><a href="#category">Categories</a></li>
<!--                <li><a href="#contact">Contact</a></li>-->

                <?php
                if(isset($_SESSION["username"])){
                    ?>
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="logout.php">Logout</a></li>
                    <?php
                }else {
                    ?>
                    <li><a href="#login_popup">Login</a></li>
                    <?php
                }
                //                        ?>
                <?php
                if(isset($_SESSION['level'])){
                    if($_SESSION['level'] == 4){
                    ?>
                <li><a href="admin.php">admin</a></li>
                <?php }
                }?>
            </ul>


            <div class="tooltip">Hover over me
                <span class="tooltiptext">Tooltip text</span>
            </div>


            <a href="services_nigeria.php" name="nigeria" title="Services in Nigeria"><li class="flag-icon flag-icon-ng"></li></a>
            <a href="services_liberia.php" name="liberia" title="Services in Liberia"><li class="flag-icon flag-icon-lr"></li></a>
            <a href="services_ghana.php" name="ghana" title="Services in Ghana"><li class="flag-icon flag-icon-gh"></li></a>
            <a href="services_sierraleone.php" name="sierraleone" title="Services in Sierra Leone"><li class="flag-icon flag-icon-sl"></li></a>
            <a href="services_gambia.php" name="gambia" title="Services in Gambia"><li class="flag-icon flag-icon-gm"></li></a>

        </nav>
</div>
    </div>
    <!--    to display feilds for the selected options-->

    <?php

        $url = "index.php";

    ?>


    <!--Modal Div-- Login -->
    <div class="remodal" data-remodal-id="login_popup" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
        <div class="result"></div>
        <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
        <form class="login_form" id="login" method="post" action="login.php">
            <input type="hidden" name="redirect" value="<?php echo urlencode($url); ?>" />
            <input placeholder="Username" id="login_username" name="username" type="text" />
            <input placeholder="Password" id="login_password" name="password" type="password" />
            <input type="submit" value="Sign in"/>
        </form>

    </div>
    <!--Modal Div-->
<!--    error pop_up-->
    <div class="remodal" data-remodal-id="error_popup" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
        <div class="result"></div>
        <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
        <form class="login_form">
           <a href="#login_popup"> <h3 style="color: white">Please Login</h3></a> <br>OR
            <a href="signupform.php"> <h3 style="color: white">Please Sign up</h3></a>
        </form>
    </div>

    <!--Modal Div-- Sign-up -->

<!--    <div class="remodal" data-remodal-id="signup_popup" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">-->
<!---->
<!--        <!--        <h2>Sign up</h2>-->
<!--        <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>-->
<!--        <form class="login_form" action="sign_up.php" method="post" id="signup">-->
<!--            <input type="hidden" name="redirect" value="--><?php //echo urlencode($url); ?><!--" />-->
<!--            <input placeholder="enter your email" name="email"   id="email" type="text" />-->
<!--            <input placeholder="Password" id="password" name="password" type="password" />-->
<!--            <input placeholder="confirm password" name="con_password" type="password" />-->
<!--            <input placeholder="Full Name" name="full_name" type="text" />-->
<!--            <input placeholder="address" name="address" type="text" />-->
<!--            <input placeholder="area" name="area" type="text" />-->
<!--            <!--Change this to your states-->
<!--            <select onchange="yesNo(this);" name="country">-->
<!--                <option>Select Country</option>-->
<!--                <option value="Nigeria">Nigeria</option>-->
<!--                <option value="Gambia">Gambia</option>-->
<!--                <option value="Ghana">Ghana</option>-->
<!--                <option value="Liberia">Liberia</option>-->
<!--                <option value="Sierra Leone">Sierra Leone</option>-->
<!---->
<!--                </select>-->
<!---->
<!--            <select  class="states_signup" name="state" id="ifyes" style="display: none;">-->
<!--                <option>Select State</option>-->
<!--                <option value="Abia">Abia</option>-->
<!--                <option value="Adamawa">Adamawa</option>-->
<!--                <option value="Akwa-ibom">Akwa-Ibom</option>-->
<!--                <option value="Anambra">Anambra</option>-->
<!--                <option value="Bauchi">Bauchi</option>-->
<!--                <option value="Bayelsa">Bayelsa</option>-->
<!--                <option value="Benue">Benue</option>-->
<!--                <option value="Borno">Borno</option>-->
<!--                <option value="Cross-river">Cross-river</option>-->
<!--                <option value="Delta">Delta</option>-->
<!--                <option value="Ebonyi">Ebonyi</option>-->
<!--                <option value="Edo">Edo</option>-->
<!--                <option value="Enugu">Enugu</option>-->
<!--                <option value="Ekiti">Ekiti</option>-->
<!--                <option value="FCT">FCT</option>-->
<!--                <option value="Gombe">Gombe</option>-->
<!--                <option value="Imo">Imo</option>-->
<!--                <option value="Jigawa">Jigawa</option>-->
<!--                <option value="Kaduna">Kaduna</option>-->
<!--                <option value="Kano">Kano</option>-->
<!--                <option value="Katsina">Katsina</option>-->
<!--                <option value="Kebbi">Kebbi</option>-->
<!--                <option value="Kogi">Kogi</option>-->
<!--                <option value="Kwara">Kwara</option>-->
<!--                <option value="Lagos">Lagos</option>-->
<!--                <option value="Nasarawa">Nasarawa</option>-->
<!--                <option value="Niger">Niger</option>-->
<!--                <option value="Ondo">Ondo</option>-->
<!--                <option value="Ogun">Ogun</option>-->
<!--                <option value="Oyo">Oyo</option>-->
<!--                <option value="Osun">Osun</option>-->
<!--                <option value="Plateau">Plateau</option>-->
<!--                <option value="Rivers">Rivers</option>-->
<!--                <option value="Sokoto">Sokoto</option>-->
<!--                <option value="Taraba">Taraba</option>-->
<!--                <option value="Yobe">Yobe</option>-->
<!--                <option value="Zamfara">Zamfara</option>-->
<!--                <option value="FCT">FCT</option>-->
<!--                <script>-->
<!--                    function yesNo(that) {-->
<!--                        if (that.value == "Nigeria") {-->
<!--                            document.getElementById("ifyes").style.display = "block";-->
<!--                        }-->
<!--                        else {-->
<!--                            document.getElementById("ifyes").style.display = "none";-->
<!--                        }-->
<!--                    }-->
<!--                </script>-->
<!--            </select>-->
<!---->
<!--            <div id="local_govt_div" name="local_govt">-->
<!--                <!--Response will be inserted here-->
<!--            </div>-->
<!---->
<!--            <select onchange="yesnoCheck(this);" name="user_type">-->
<!--                <option value="">Select</option>-->
<!--                <option value="0">Individual</option>-->
<!--                <option value="1">Corporate</option>-->
<!--            </select>-->
<!---->
<!---->
<!--            <div id="ifYes" style="display: none;">-->
<!--                <input type="text" placeholder="Name of organization" id="organization" name="organization" />-->
<!--                <input type="text" placeholder="contact person's name" id="contact_person" name="contact_person" />-->
<!--                <input type="text" placeholder="website (if applicable)" id="website" name="website" />-->
<!---->
<!--                <script>-->
<!--                    function yesnoCheck(that) {-->
<!--                        if (that.value == "1") {-->
<!--                            document.getElementById("ifYes").style.display = "block";-->
<!--                        }-->
<!--                        else {-->
<!--                            document.getElementById("ifYes").style.display = "none";-->
<!--                        }-->
<!--                    }-->
<!--                </script>-->
<!---->
<!--            </div>-->
<!---->
<!--            <input placeholder="Phone number" name="phone_number" type="text" />-->
<!--            <br>-->
<!--            <br>-->
<!--            <div class="g-recaptcha" data-sitekey="6LfUrRkUAAAAAODDGLXDtaJMpFRf5TqpDu0K0a6q"></div>-->
<!---->
<!--            <input type="submit" value="Sign up"/>-->
<!--        </form>-->
<!--    </div>-->
    <!-- here i removed the div then at above too for container and top bar-->
    <!--Modal Div-->

    <!--eND OF MODAL-->
    <div class="remodal" data-remodal-id="business_popup" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
        <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
        <form class="login_form" action="add_business.php" method="post" id="business_owners">
            <input placeholder="enter your business name" name="business_name"   id="business_name" type="text" />
            <input placeholder="contact person" id="contact_person" name="contact_person" type="text" />
            <input placeholder="phone" name="phone" type="text" />
            <input placeholder="email" name="email" type="text" />
            <input placeholder="business decription" name="description" type="text" />
            <input placeholder="location" name="location" type="text" />
            <input placeholder="details" name="c" type="text" />
            <!--        <input placeholder="category" name="cat_name" type="text" />-->
            <input type="submit" value="Add Business"/>
        </form>
    </div>

</header>
<!--End Fixed Navigation
==================================== -->

<main class="site-content" role="main">

    <!--Home Slider==================================== -->
   <section id="home-slider" style="height:50%">
       <div class="slide-caption">
           <div class="caption-content"><br><br><br><br>
               <h2 class="animated fadeInDown">Your Link to Maintenance Services</h2>
               <form class="form-wrapper cf" action="search.php" method="get" name="search">
                   <input type="text" name="searchterm"  placeholder="Search services by keywords or location...." required>
                   <button type="submit" value="search">Search</button>
               </form><span>
                            <?php if(isset($_SESSION["username"])){
                            }else {
                                ?>
                                <a href="signupform.php"  class="btn btn-blue btn-effect">Join US</a>
                                <?php
                            }
                            ?>
                            <a href="services_inarea.php" class="btn btn-blue btn-effect">See Services in your Area</a>
                   <?php if(isset($_SESSION["username"])){
                   }else {
                       ?>
                       <a href="#login_popup"  class="btn btn-blue btn-effect">Login</a>
                       <?php
                   }
                   ?></span>
               <div id="ad"><h3 style="height: 60%;"><a href="http://sth-ng.com" target="_blank"><img src="img/LOGO_2013.png" alt="softwaretesting house" style="height: 70px"></a><a href="http://qfm-ng.com" target="_blank"><img src="img/new-logo.png" alt="qfm limited" style="height: 70px"></a>Contact <u><a href="mailto:advertise@fm-africa.com">advertise@fm-africa.com </a></u> for this space</h3>
                   </div>
               <div class="example1"><br>
<!--<!--                   <h3>Contact <u><a href="mailto:advertise@fm-africa.com">advertise@fm-africa.com</a></u>for this space</h3> br> <br>-->
                   <h3><a href="http://sth-ng.com" target="_blank"><img src="img/LOGO_2013.png" height="90" width="230"></a><a href="http://qfm-ng.com" target="_blank"><img src="img/new-logo.png"  height="80" width="230"></a>Contact <u><a href="mailto:advertise@fm-africa.com">advertise@fm-africa.com </a></u> for this space</h3>
<!--                    <br> <br><br><br><div><h5 style="height: 50px"><a href="http://sth-ng.com" target="_blank"><img src="img/LOGO_2013.png" alt="softwaretesting house" style="height: 40px"></a><a href="http://qfm-ng.com" target="_blank"><img src="img/new-logo.png" alt="qfm limited" style="height: 40px"></a>Contact <u><a href="mailto:advertise@fm-africa.com">advertise@fm-africa.com </a></u> for this space</h5>-->
<!--                        <br>-->
                    </div>
           </div>


           </div>
       <div class="fullscreen-bg">
           <video id="myvideo" loop muted autoplay poster="img/slider/pexels-photo-345135.jpeg" class="fullscreen-bg__video">
               <source src="img/Fmvideo.webm" type="video/webm">
               <source class="active" src="img/Fmvideo.mp4" type="video/mp4">
               <source src="img/Fmvideo.ogg" type="video/ogg">
           </video>
       </div>
   </section>


    <section id="category" class="">
        <div class="container side_bar">
            <div class="row">
                <div class="sec-title text-center">
                   <br> <br> <br> <h2 class="wow animated bounceInLeft">Categories</h2>
                </div>
                <div class="col-md-12 text-center wow animated zoomIn" data-wow-delay="0.3s">
                    <?php
                    //to display the categories
                    $categories = $selector->select_with_fetch("categories");
                    foreach($categories as $this_category){
                        $services_in_categories = $selector->select_with_fetch_count("services","category_id=".$this_category["id"]);
                        echo "<a href='category.php?i=".$this_category["id"]."' > ".$this_category["cat_name"]."<br>    <div style='font-family: 'Orbitron', sans-serif;'> ".$services_in_categories."</div>"."</a>";
                    }
                    ?>
                </div>
            </div></div>
    </section>


    <!---->
    <!--			&lt;!&ndash; Service section &ndash;&gt;-->
    <section id="how_itworks">
        <div class="container">
            <div class="row">

                <div class="sec-title text-center">
                    <h2 class="wow animated bounceInLeft">How It Works</h2>
                    <p class="wow animated bounceInRight">Individual Membership</p>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12 text-center wow animated zoomIn">
                    <div class="service-item">
                        <div class="service-icon">
                            <i class="fa fa-sign-in fa-3x"></i>
                        </div>
                        <h3>Sign Up</h3>
                        <p>Begin membership by using the <a href="#signup_popup">JOIN US</a> button and sign up as individual user. </p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12 text-center wow animated zoomIn" data-wow-delay="0.3s">
                    <div class="service-item">
                        <div class="service-icon">
                            <i class="fa fa-search fa-3x"></i>
                        </div>
                        <h3>Search Services</h3>
                        <p>Search facility management services that suits your needs. </p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12 text-center wow animated zoomIn" data-wow-delay="0.6s">
                    <div class="service-item">
                        <div class="service-icon">
                            <i class="fa fa-clock-o fa-3x"></i>
                        </div>
                        <h3>Select Services</h3>
                        <p>Select Services and look up directory of facility managers.  </p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12 text-center wow animated zoomIn" data-wow-delay="0.9s">
                    <div class="service-item">
                        <div class="service-icon">
                            <i class="fa fa-heart fa-3x"></i>
                        </div>

                        <h3>Share your Experience</h3>
                        <p>Write us a feedback or testimonial. </p>
                    </div><br><br>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="sec-title text-center">
                    <h2 class="wow animated bounceInLeft">***</h2>
                    <p class="wow animated bounceInRight">Cooperate Membership</p>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12 text-center wow animated zoomIn">
                    <div class="service-item">
                        <div class="service-icon">
                            <i class="fa fa-sign-in fa-3x"></i>
                        </div>
                        <h3>Sign Up</h3>
                        <p>Begin membership by using the <a href="#signup_popup">JOIN US</a> button and sign up as servic provider. </p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12 text-center wow animated zoomIn" data-wow-delay="0.3s">
                    <div class="service-item">
                        <div class="service-icon">
                            <i class="fa fa-briefcase fa-3x"></i>
                        </div>
                        <h3>Add Business</h3>
                        <p> Create business. Members can add more than one business.</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12 text-center wow animated zoomIn" data-wow-delay="0.6s">
                    <div class="service-item">
                        <div class="service-icon">
                            <i class="fa fa-tasks fa-3x"></i>
                        </div>
                        <h3>Add Services</h3>
                        <p>Add services for the business created </p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12 text-center wow animated zoomIn" data-wow-delay="0.9s">
                    <div class="service-item">
                        <div class="service-icon">
                            <i class="fa fa-tasks fa-3x"></i>
                       </div>

                        <h3>Promote your Services</h3>
                        <p>Promote your services by filling in the form via your profile</p>
                    </div><br>
                </div>

            </div>
            <div class="row">
                <div class="sec-title text-center">
                    <a href="video_view.php"> <button class="wow animated bounceInLeft">WATCH VIDEO</button></a>
                </div>
            </div>
        </div>

    </section>

    <section id="testimonials" class="parallax">
        <div class="overlay">
            <div class="container">
                <div class="row">

                    <div class="sec-title text-center white wow animated fadeInDown">
                         <h2>What people say</h2>
                    </div>

                    <div id="testimonial" class=" wow animated fadeInUp">
                        <div class="testimonial-item text-center">
                            <img src="img/member-1.jpg" alt="Our Clients">
                            <div class="clearfix">
                                <span>Jerry</span>
                                <p>This is a great time saving platform with friendly prices. I must thank to the brains behind this and I sincerely commend on their on time delivery</p>
                            </div>
                    </div>
                    <div class="testimonial-item text-center">
                        <img src="img/member-1.jpg" alt="Our Clients">
                        <div class="clearfix">
                            <span>Jerry</span>
                            <p>This is a great time saving platform with friendly prices. I must thank to the brains behind this and I sincerely commend on their on time delivery</p>
                        </div>
                    </div>
                    <div class="testimonial-item text-center">
                        <img src="img/member-1.jpg" alt="Our Clients">
                        <div class="clearfix">
                            <span>Jerry</span>
                            <p>This is a great time saving platform with friendly prices. I must thank to the brains behind this and I sincerely commend on their on time delivery</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>



    <section id="top_services">
        <div class="container">
            <div class="row">

                <div class="sec-title text-center wow animated fadeInDown">

                    <h2>Top Services</h2>

                    <?php
                    $ad_services_group = $selector->select_with_fetch("services", "1=1 ORDER by priority DESC ,id DESC LIMIT 3");
                    foreach ($ad_services_group as $this_service) {
                    if(isset($_SESSION["username"])) {
                        $user_id = $_SESSION["uid"];
//                        to display average rating
                        $if_users_has_review = 0;
                        $if_user = $selector->select_with_fetch("service_review", "service_id = '" . $this_service["id"] . "' AND user_id='" . $user_id . "'");
                    }if(!empty($if_user)){
                        $if_users_has_review = 1;
                    }

                    $ratings = $selector->select_with_fetch("service_review","service_id = '".$this_service["id"]."' ORDER by id DESC");

                    $sum = 0;
                    $counter = 0;
                    foreach($ratings as $this_rating){
                        $sum = $sum + $this_rating["rating"];
                        $counter++;
                    }
                    if($counter == 0){
                        $rating_average = 0;
                    }else{
                        $rating_average = $sum/$counter;
                    }
                    $service_details = "";
                    $service_details = $selector->select_with_fetch("services", " id = " . $this_service["business_id"]);
                    $business_details = $selector->select_with_fetch("business_owners", " id = " . $this_service["business_id"]);
                     $service_id = $service_details[0]["id"];
                   ?>
                </div>
                <div class="col-md-4 wow animated fadeInUp">
                    <div class="price-table text-center">
                        <h3><?php echo $service_details[0]["service_name"]; ?></h3>
                        <div class="value">
                            <span><div class="vendor_picture" style="background: url('images/vendors/<?php echo $service_details[0]["img"]?>'); margin:auto; background-size: cover;">
                                </div></span>
                                    <br>
                            <span><?php echo $business_details[0]["description"]; ?>
                                <br>
                                <p>Average Rating :<?php echo $rating_average?></p>
                            </span>
                        </div>
                            <br>
                        <ul>
                            <li><a href="view_services.php?service=<?php echo $this_service["id"]; ?>">View Details </a></li>
                        </ul>
                    </div>
                        <?php } ?>
                </div>
            </div>

            <div class="price-table text-center">
                <ul>
                    <li> <a href="all_services.php">All Services</a></li>
                </ul>
        </div>
    </div>
</section>



    <!-- about section -->
    <section id="about" >
        <div class="container">
            <div class="row">
                <div class="col-md-4 wow animated fadeInLeft">
                    <div class="recent-works">
                        <h3></h3>
                        <br><br><div id="works">
                            <div class="work-item">
                                <p>Our Vendors are of High Standard <br> <br> All Business offered on this platform are highly. Our Vendors are of High Standard. All Business offered on this platform are highly.</p>

                            </div>
                            <div class="work-item">
                                <p>Our Vendors are of High Standard <br> <br> All Business offered on this platform are highly.</p>
                            </div>
                            <div class="work-item">
                                <p>Our Vendors are of High Standard <br> <br> All Business offered on this platform are highly.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-md-offset-1 wow animated fadeInRight">
                    <div class="welcome-block">
                        <h3>About FMAFRICA</h3>
                        <div class="message-body">
                            <img src="img/member-1.jpg" class="pull-left" alt="member">
                            <p>The home of all facility managers with high rating. We are glad you are here, it will be dream come true once you use the join button to have full access to all information on this site. Joining us as a vendor or seeking services is one of the best choice you ever made </p>
                        </div>
                        <a href="about.php" class="btn btn-border btn-effect pull-right">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!---->
<!--    <section id="contact" class="parallax">-->
<!--        <div class="overlay">-->
<!--        <div class="container">-->
<!--            <div class="row">-->
<!---->
<!--                <div class="sec-title text-center wow animated fadeInDown">-->
<!--                   <h2>Leave a Message</h2>-->
<!--                </div>-->
<!---->
<!---->
<!--                <div class="col-md-7 contact-form wow animated fadeInLeft">-->
<!--                    <form action="contact_submit.php" method="post">-->
<!--                        <div class="input-field">-->
<!--                            <input type="text" name="name" class="form-control" placeholder="Your Name..." required>-->
<!--                        </div>-->
<!--                        <div class="input-field">-->
<!--                            <input type="email" name="email" class="form-control" placeholder="Your Email..." required>-->
<!--                        </div>-->
<!--                        <div class="input-field">-->
<!--                            <input type="text" name="subject" class="form-control" placeholder="Subject..." required>-->
<!--                        </div>-->
<!--                        <div class="input-field">-->
<!--                            <textarea name="message" class="form-control" placeholder="Messages..." required></textarea>-->
<!--                        </div>-->
<!--                        <button type="submit" id="submit" class="btn btn-blue btn-effect">Send</button>-->
<!--                    </form>-->
<!--                </div>-->
<!---->
<!--                <div class="col-md-5 wow animated fadeInRight">-->
<!--                    <address class="contact-details">-->
<!--                        <h3>Contact Us</h3>-->
<!--                        <p><i class="fa fa-pencil"></i>FM-AFRICA<span>71b Mainland Way Dolphin Estate Ikoyi</span><span>Lagos, Nigeria</span></p><br>-->
<!--                        <p><i class="fa fa-phone"></i>Phone: 08034341145 </p>-->
<!--                        <p><i class="fa fa-globe"></i>www.fm-africa.com</p>-->
<!--                    </address>-->
<!--                </div>-->
<!---->
<!--            </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </section>-->
    <!-- end about section -->


</main>

<footer id="footer">
    <br><br>
    <div class="container">
        <div class="row text-center">
            <div class="col-md-4 wow animated fadeInUp">
                <a href="contact.php" style="color:white">Contact Us</a></div>
            <div class="col-md-4 wow animated fadeInUp">
                <a href="about.php" style="color:white">About Us</a></div>
            <div><a href="disclaimer.php"  style="color:white">Disclaimer</a></div>

            <div class="footer-content">

                <div class="footer-social">

                    <ul>
                        <li class="wow animated zoomIn" data-wow-delay="0.3s"><a href="#"><i class="fa fa-twitter fa-3x"></i></a></li>
                        <li class="wow animated zoomIn" data-wow-delay="0.6s"><a href="#"><i class="fa fa-skype fa-3x"></i></a></li>
                        <li class="wow animated zoomIn" data-wow-delay="0.9s"><a href="#"><i class="fa fa-facebook fa-3x"></i></a></li>

                    </ul>
                    <ul>
                        <a href="services_nigeria.php" name="nigeria" title="Services in Nigeria"><li class="flag-icon flag-icon-ng"></li></a>
                        <a href="services_liberia.php" name="liberia" title="Services in Liberia"><li class="flag-icon flag-icon-lr"></li></a>
                        <a href="services_ghana.php" name="ghana" title="Services in Ghana"><li class="flag-icon flag-icon-gh"></li></a>
                        <a href="services_sierraleone.php" name="sierraleone" title="Services in Sierra Leone"><li class="flag-icon flag-icon-sl"></li></a>
                        <a href="services_gambia.php" name="gambia" title="Services in Gambia"><li class="flag-icon flag-icon-gm"></li></a>
                     </ul>
                </div>

                <p> <a href="http://FM-AFRICA-ng.com/">FM-AFRICA Limited</a> &copy; . All rights Reserved</p>
            </div>
        </div>
    </div>
</footer>

    <!-- Essential jQuery Plugins
    ================================================== -->

    <!-- Main jQuery -->
    <script src="js/jquery-1.11.1.min.js"></script>
    <!-- Twitter Bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Single Page Nav -->
    <script src="js/jquery.singlePageNav.min.js"></script>
    <!-- jquery.fancybox.pack -->
    <script src="js/jquery.fancybox.pack.js"></script>
    <!-- Google Map API -->
    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <!-- Owl Carousel -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- jquery easing -->
    <script src="js/jquery.easing.min.js"></script>
    <!-- Fullscreen slider -->
    <script src="js/jquery.slitslider.js"></script>
    <script src="js/jquery.ba-cond.min.js"></script>
    <!-- onscroll animation -->
    <script src="js/wow.min.js"></script>
    <!-- Custom Functions -->
    <script src="js/main.js"></script>
</body>
<script src="Remodal-1.1.1/dist/remodal.js"></script>
</html>
