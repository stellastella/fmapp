
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
    <meta name="description" content="Facility Management services">
    <meta name="keywords" content="facilitymanagers, facility, management, cleaners, propertymanagement, services">
    <meta name="author" content="Interstellar">

    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
    ================================================== -->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>



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

    <!-- Modernizer Script for old Browsers -->
    <script src="js/modernizr-2.6.2.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>

    <script src="js/jquery-1.11.1.min.js" ></script>
    <script src="js/reload.js" ></script>

    <script src='https://www.google.com/recaptcha/api.js'></script>
    <!--    Css for modal-->

    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link rel="stylesheet" href="styles/bootstrap.min.css">

    <link rel="stylesheet" href="styles/form_style.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/2.3.1/css/flag-icon.min.css" rel="stylesheet"/>

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
                <a href="#body"><img src="img/fmafricalogo.png" height="80" width="270" shadow="0 0 5px white;" alt=""></a>
            </h1>
            <!-- /logo -->

        </div>

        <!-- main nav -->

        <nav class="collapse navbar-collapse navbar-right">
            <ul  class="nav navbar-nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="all_services.php">All Services</a></li>
                <li><a href="#contact">contact</a></li>
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
                ?>
            </ul>

        </nav>
        <!-- /main nav -->


    </div>

    <!--MOdal BUtton-->






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
<br><br>
    <!-- about section -->
    <section id="about" style="margin:90px; border-radius: 20px;">
        <div class="container">
            <div class="row">

                    <div class="welcome-block">
                        <h3>Welcome To QFM</h3>
                        <div class="message-body">
                            <img src="img/member-1.jpg" class="pull-left" alt="member">
                            <p>The home of all facility managers with high rating. We are glad you are here, it will be dream come true one you use the join button to have full access to all information on this site. Joining us as a vendor or seeking services is one of the best choice you ever made
                                The home of all facility managers with high rating. We are glad you are here, it will be dream come true one you use the join button to have full access to all information on this site. Joining us as a vendor or seeking services is one of the best choice you ever made
                                The home of all facility managers with high rating. We are glad you are here, it will be dream come true one you use the join button to have full access to all information on this site. Joining us as a vendor or seeking services is one of the best choice you ever made
                                The home of all facility managers with high rating. We are glad you are here, it will be dream come true one you use the join button to have full access to all information on this site. Joining us as a vendor or seeking services is one of the best choice you ever made
                                The home of all facility managers with high rating. We are glad you are here, it will be dream come true one you use the join button to have full access to all information on this site. Joining us as a vendor or seeking services is one of the best choice you ever made</p>
                        </div>
                            <div class="col-md-5 wow animated fadeInRight">
                               <strong> <a href="#signup_popup" style="color:white">Join Us</a></strong></div>
                                <a href="index.php" style="color:white">Back</a>
                            </div>
                    </div>
                </div>
    </section>
    <!-- end about section -->

    <section id="contact" class="parallax">
        <div class="overlay">
            <div class="container">
                <div class="row">

                    <div class="sec-title text-center wow animated fadeInDown">
                        <h2>Leave a Message</h2>
                    </div>


                    <div class="col-md-7 contact-form wow animated fadeInLeft">
                        <form action="#" method="post">
                            <div class="input-field">
                                <input type="text" name="name" class="form-control" placeholder="Your Name...">
                            </div>
                            <div class="input-field">
                                <input type="email" name="email" class="form-control" placeholder="Your Email...">
                            </div>
                            <div class="input-field">
                                <input type="text" name="subject" class="form-control" placeholder="Subject...">
                            </div>
                            <div class="input-field">
                                <textarea name="message" class="form-control" placeholder="Messages..."></textarea>
                            </div>
                            <button type="submit" id="submit" class="btn btn-blue btn-effect">Send</button>
                        </form>
                    </div>

                    <div class="col-md-5 wow animated fadeInRight">
                        <address class="contact-details">
                            <h3>Contact Us</h3>
                            <p><i class="fa fa-pencil"></i>FM-AFRICA<span>71b Mainland Way Dolphin Estate Ikoyi</span><span>Lagos, Nigeria</span></p><br>
                            <p><i class="fa fa-phone"></i>Phone: 08034341145   </p>
                            <p><i class="fa fa-globe"></i>www.fm-africa.com</p>
                        </address>
                    </div>

                </div>
            </div>
        </div>
    </section>
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
