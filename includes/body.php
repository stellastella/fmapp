<?php
/**
 * Created by PhpStorm.
 * User: Star
 * Date: 4/5/2017
 * Time: 3:33 PM
 */
@ob_start();
session_start();
include 'bin/db_config.php';
include 'bin/selector.php';
include 'bin/insertor.php';
include('bin/instantiate_objects.php');

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
    <title></title>
    <!-- Meta Description -->
    <meta name="description" content="Blue One Page Creative HTML5 Template">
    <meta name="keywords" content="one page, single page, onepage, responsive, parallax, creative, business, html5, css3, css3 animation">
    <meta name="author" content="Muhammad Morshed">

    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
    ================================================== -->

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>

    <!-- Fontawesome Icon font -->
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

    <!-- Modernizer Script for old Browsers -->
    <script src="js/modernizr-2.6.2.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>

    <script src="js/jquery.1.11.1.js" ></script>
    <script src="js/reload.js" ></script>

    <script src='https://www.google.com/recaptcha/api.js'></script>
    <!--    Css for modal-->

    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link rel="stylesheet" href="styles/bootstrap.min.css">

    <!--    Css for modal-->
    <style>
        .hidden-input {
            display: none;
        }
    </style>
    <link rel="stylesheet" href="Remodal-1.1.1/dist/remodal.css">
    <link rel="stylesheet" href="Remodal-1.1.1/dist/remodal-default-theme.css">

    <script type="text/javascript">
        $(document).ready(function(){
            $("select.states_signup").change(function(){

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
                <a href="#body"><img src="img/new-logo.png" height="80" width="270" shadow="0 0 5px white;" alt=""></a>
            </h1>
            <!-- /logo -->

        </div>

        <!-- main nav -->

        <nav class="collapse navbar-collapse navbar-right" >
            <a href="#login_popup">Login</a>
            <ul  class="nav navbar-nav">
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
                <li><a href="index.php">Home</a></li>
                <li><a href="#how_itworks">How it works</a></li>
                <!--                <li><a href="#top_services">top services</a></li>-->
                <!--                <li><a href="#testimonials">Testimonial</a></li>-->
                <!--                <li><a href="#statistics">statistics</a></li>-->
                <li><a href="category.php">Categories</a></li>

            </ul>

        </nav>
        <!-- /main nav -->

    </div>

    <!--MOdal BUtton-->


    <?php
    if(!isset($_SESSION["username"])) {


    ?>


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

    <!--    to display feilds for the selected options-->



    <script>

        $(document).ready(function(){
            $("#login").submit(function(){
                var login_username = $("#login_username").val();
                var login_password = $("#login_password").val();



                $.ajax({
                    type:"POST",
                    url:"login.php",
                    data:"username="+ login_username+"&password="+login_password,
                    success: function(data){
                        if(data == "100"){
                            $(".result").html("Successful Login");
//                        location.reload();

                            window.location.href = 'dashboard.php';
//                        reload_this(1000);




                        }else{
                            $(".result").html(data);
                        }

                    }
                });
            });
        });
        //for sign up using ajax
        //    $(document).ready(function(){
        //        $("#signup").click(function(){
        //           var email = $("#email").val();
        //            var password = $("#password").val();
        //            var con_password = $("#con_password").val();
        //            var full_name = $("#full_name").val();
        //            var location = $("#location").val();
        //            var phone_number= $("#phone_number").val();
        //                   var data = "email=" + email + "&password=" + password + "&con_password="; //+ con_password + "&full_name=" + full_name + "&location=" + location + "&phone=" + phone;
        //            $.ajax({
        //                method: "post",
        //                url:"sign_up.php",
        //                data: data,
        //                success: function(data)
        //                {
        //                    $("#signup_output").html(data);
        //                }
        //            });
        //
        //
        //
        //        });
        //    });

    </script>


    <!--Modal Div-- Login -->
    <div class="remodal" data-remodal-id="login_popup" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
        <div class="result"></div>
        <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
        <form class="login_form" id="login">
            <input placeholder="Username" id="login_username"  type="text" />
            <input placeholder="Password" id="login_password" type="password" />
            <input type="submit" value="Sign in"/>
        </form>

    </div>
    <!--Modal Div-->


    <!--Modal Div-- Sign-up -->

    <div class="remodal" data-remodal-id="signup_popup" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">

        <h2>Sign up</h2>
        <?php
        if(isset($msg)){  // Check if $msg is not empty
            echo '<div class="statusmsg">'.$msg.'</div>'; // Display our message and wrap it with a div with the class "statusmsg".
        }
        ?>
        <p><div id="signup_output"></div></p>


        <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
        <form class="login_form" action="sign_up.php" method="post" id="signup">
            <input placeholder="enter your email" name="email"   id="email" type="text" />
            <input placeholder="Password" id="password" name="password" type="password" />
            <input placeholder="confirm password" name="con_password" type="password" />
            <input placeholder="Full Name" name="full_name" type="text" />
            <input placeholder="address" name="address" type="text" />
            <input placeholder="area" name="area" type="text" />
            <!--Change this to your states-->
            <!-------------------------------------        -->
            <!-------------------------------------        -->
            <!-------------------------------------        -->

            <select class="states_signup">
                <option>Select State</option>
                <option value="Abia">Abia</option>
                <option value="Adamawa">Adamawa</option>
                <option value="Akwa-ibom">Akwa-Ibom</option>
                <option value="Anambra">Anambra</option>
                <option value="Bauchi">Bauchi</option>
                <option value="Bayelsa">Bayelsa</option>
                <option value="Benue">Benue</option>
                <option value="Borno">Borno</option>
                <option value="Cross-river">Cross-river</option>
                <option value="Delta">Delta</option>
                <option value="Ebonyi">Ebonyi</option>
                <option value="Edo">Edo</option>
                <option value="Enugu">Enugu</option>
                <option value="Ekiti">Ekiti</option>
                <option value="FCT">FCT</option>
                <option value="Gombe">Gombe</option>
                <option value="Imo">Imo</option>
                <option value="Jigawa">Jigawa</option>
                <option value="Kaduna">Kaduna</option>
                <option value="Kano">Kano</option>
                <option value="Katsina">Katsina</option>
                <option value="Kebbi">Kebbi</option>
                <option value="Kogi">Kogi</option>
                <option value="Kwara">Kwara</option>
                <option value="Lagos">Lagos</option>
                <option value="Nasarawa">Nasarawa</option>
                <option value="Niger">Niger</option>
                <option value="Ondo">Ondo</option>
                <option value="Ogun">Ogun</option>
                <option value="Oyo">Oyo</option>
                <option value="Osun">Osun</option>
                <option value="Plateau">Plateau</option>
                <option value="Rivers">Rivers</option>
                <option value="Sokoto">Sokoto</option>
                <option value="Taraba">Taraba</option>
                <option value="Yobe">Yobe</option>
                <option value="Zamfara">Zamfara</option>
                <option value="FCT">FCT</option>
            </select>

            <div id="local_govt_div">
                <!--Response will be inserted here-->
            </div>

            <select onchange="yesnoCheck(this);">
                <option value="">Select</option>
                <option value="Individual">Individual</option>
                <option value="Corporate">Corporate</option>
            </select>

            <div id="ifYes" style="display: none;">

                <label for="individual"></label> <input type="text" placeholder="Name of organization" id="organization" name="organization" /><br />
                <label for="individual"></label> <input type="text" placeholder="contact person's name" id="contact_person" name="contact_person" /><br />
                <label for="individual"></label> <input type="text" placeholder="website (if applicable)" id="website" name="website" /><br />

                <script>
                    function yesnoCheck(that) {
                        if (that.value == "Corporate") {
                            document.getElementById("ifYes").style.display = "block";
                        }
                        else {
                            document.getElementById("ifYes").style.display = "none";
                        }
                    }
                </script>

            </div>

            <input placeholder="Phone number" name="phone_number" type="text" />
            <br>
            <br>
            <div class="g-recaptcha" data-sitekey="6LfUrRkUAAAAAODDGLXDtaJMpFRf5TqpDu0K0a6q"></div>

            <input type="submit" value="Sign up"/>
        </form>

        <!-- here i removed the div then at above too for container and top bar-->
        <!--Modal Div-->

        <!--eND OF MODAL-->


        <?php

        }else{
            echo '<a href="logout.php">Logout</a><br>';
        }

        ?>


        <div class="details_username">
            <?php
            if(isset($_SESSION["full_name"])){
                echo "<p> hi " .$_SESSION["full_name"]."</p>";
            }
            ?>
        </div>

    </div>
    <!--end of the display logged in-->
</header>
<!--
End Fixed Navigation
==================================== -->

<main class="site-content" role="main">

    <!--
    Home Slider
    ==================================== -->


    <!-- about section -->
    <section id="about" >
        <div class="container">
            <div class="row">
                <div class="col-md-4 wow animated fadeInLeft">
                    <div class="recent-works">
                        <!--                        <h3></h3>-->
                        <!--                        <br><br><div id="works">-->
                        <!--                            <div class="work-item">-->
                        <!--                                <p>Our Vendors are of High Standard <br> <br> All Business offered on this platform are highly. Our Vendors are of High Standard. All Business offered on this platform are highly.</p>-->
                        <!---->
                        <!--                            </div>-->
                        <!--                            <div class="work-item">-->
                        <!--                                <p>Our Vendors are of High Standard <br> <br> All Business offered on this platform are highly.</p>-->
                        <!--                            </div>-->
                        <!--                            <div class="work-item">-->
                        <!--                                <p>Our Vendors are of High Standard <br> <br> All Business offered on this platform are highly.</p>-->
                        <!--                            </div>-->
                        <!--                        </div>-->
                    </div>
                </div>
                <div class="col-md-7 col-md-offset-1 wow animated fadeInRight">
                    <div class="welcome-block">
                        <br><br><br><br> <h3>Search Result</h3>
                        <?php
                        //if(isset($_POST['search'])){

                        //    $business_name = mysqli_escape_string($conn, $_GET['business_name']); // Set business_name variable

                        if(isset($_GET["searchterm"])) {
                            $search = mysqli_real_escape_string($conn, trim($_GET['searchterm']));
                            //        echo "<br/>---------------BUsiness Owners------------------<br/>";
                            //        $find = mysqli_query($conn, "SELECT * FROM business_owners WHERE business_name LIKE '%$search%'");
                            //        if (($find->num_rows) > 0) {
                            //            while ($row = mysqli_fetch_assoc($find)) {
                            //                $business_name = $row['business_name'];
                            //                echo "$business_name</br >";
                            //            }
                            //        } else {
                            //            echo "No Entry found with the search - " . $_GET["searchterm"];
                            //        }
                            //
                            //        echo "<br/>---------------Categories------------------<br/>";
                            //        $find2 = mysqli_query($conn, "SELECT * FROM categories WHERE cat_name LIKE '%$search%'");
                            //        if (($find2->num_rows) > 0) {
                            //            while ($row2 = mysqli_fetch_assoc($find2)) {
                            //                $cat_name = $row2['cat_name'];
                            //                echo "$cat_name</br >";
                            //            }
                            //        } else {
                            //            echo "No Entry found with the search - " . $_GET["searchterm"];
                            //        }

//                        echo "<br/>---------------Services------------------<br/>";
                            $find3 = mysqli_query($conn, "SELECT * FROM services WHERE service_name LIKE '%$search%' || keywords LIKE '%$search%'");
                            if (($find3->num_rows) > 0) {
                                while ($row3 = mysqli_fetch_assoc($find3)) {
                                    $service_name = $row3['service_name'];
                                    $keywords = $row3['keywords'];
                                    echo "$service_name</br >";

                                }
                            } else {
                                echo "No Entry found with the search - " . $_GET["searchterm"];
                            }


                        }else{

                        }


                        ?>
                        <!--                        <div class="message-body">-->
                        <!--                            <img src="img/member-1.jpg" class="pull-left" alt="member">-->
                        <!--                             </div>-->
                        <!--                        <a href="#" class="btn btn-border btn-effect pull-right">Read More</a>-->
                        <br><br><br><br> <a href="#signup_popup" class="btn btn-blue btn-effect">Join US</a><br><br><br>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end about section -->


</main>

<footer id="footer">
    <div class="container">
        <div class="row text-center">
            <div class="footer-content">
                <!--<div class="wow animated fadeInDown">-->
                <!--<p>newsletter signup</p>-->
                <!--<p>Get Cool Stuff! We hate spam!</p>-->
                <!--</div>-->
                <!--<form action="#" method="post" class="subscribe-form wow animated fadeInUp">-->
                <!--<div class="input-field">-->
                <!--<input type="email" class="subscribe form-control" placeholder="Enter Your Email...">-->
                <!--<button type="submit" class="submit-icon">-->
                <!--<i class="fa fa-paper-plane fa-lg"></i>-->
                <!--</button>-->
                <!--</div>-->
                <!--</form>-->
                <div class="footer-social">
                    <ul>
                        <!--								<li class="wow animated zoomIn"><a href="#"><i class="fa fa-thumbs-up fa-3x"></i></a></li>-->
                        <li class="wow animated zoomIn" data-wow-delay="0.3s"><br><br><br><br><a href="#"><i class="fa fa-twitter fa-3x"></i></a></li>
                        <li class="wow animated zoomIn" data-wow-delay="0.6s"><a href="#"><i class="fa fa-skype fa-3x"></i></a></li>
                        <li class="wow animated zoomIn" data-wow-delay="0.9s"><a href="#"><i class="fa fa-facebook fa-3x"></i></a></li>
                        <!--								<li class="wow animated zoomIn" data-wow-delay="1.2s"><a href="#"><i class="fa fa-youtube fa-3x"></i></a></li>-->
                    </ul>
                </div>

                <p> <a href="http://qfm-ng.com/">QFM Limited</a> &copy; . All rights Reserved</p>
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




