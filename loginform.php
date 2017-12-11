<?php
@ob_start();
session_start();


include 'bin/db_config.php';
include 'bin/selector.php';
include 'bin/insertor.php';
include('bin/instantiate_objects.php');
//var_dump($services);
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

    <!--    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="sign-up-login-form/css/style.css">
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="sign-up-login-form/js/index.js"></script>

    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
    ================================================== -->

    <!--    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>-->

    <!--        <link rel="stylesheet" type="text/css" href="style/bootstrap/css/bootstrap.css">-->
    <!--    <link rel="stylesheet" type="text/css" href="styles/style.css">-->

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
    <!--    <script src="js/modernizr-2.6.2.min.js"></script>-->
    <script src='https://www.google.com/recaptcha/api.js'></script>

    <script src="js/jquery-1.11.1.min.js" ></script>
    <!--    <script src="js/reload.js" ></script>-->

    <!--    <script src='https://www.google.com/recaptcha/api.js'></script>-->
    <!--    Css for modal-->

    <!--    <link rel="stylesheet" type="text/css" href="styles/style.css">-->
<!--    <link rel="stylesheet" href="styles/bootstrap.min.css">-->

    <!--    <link rel="stylesheet" type="text/css" href="pagination/styles.css"/>-->
    <!--    <link rel="stylesheet" href="styles/form_style.css"/>-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/2.3.1/css/flag-icon.min.css" rel="stylesheet"/>
    <style>
        main{
            background-image: url('./img/slider/road%20view.gif');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            /*width:100%;*/
        }
    </style>

<!--    <style>-->
<!--        .hidden-input {-->
<!--            display: none;-->
<!--        }-->
        <!--    </style>-->
    <!--    <link rel="stylesheet" href="Remodal-1.1.1/dist/remodal.css">-->
    <!--    <link rel="stylesheet" href="Remodal-1.1.1/dist/remodal-default-theme.css">-->

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
<?php
if(isset($_GET["v"]) == "verified" ){
    echo "<p> User Verified";
}

?>

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

        <nav class="collapse navbar-collapse navbar-right" >

            <ul  class="nav navbar-nav">

                <li><a href="index.php">Home</a></li>
                <li><a href="all_services.php">All Services</a></li>
                <?php
                if(isset($_SESSION["username"])){
                    ?>
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="logout.php">Logout</a></li>
                    <?php
                }
                //                        ?>
                <a href="services_nigeria.php" name="nigeria" title="Services in Nigeria"><li class="flag-icon flag-icon-ng"></li></a>
                <a href="services_liberia.php" name="liberia" title="Services in Liberia"><li class="flag-icon flag-icon-lr"></li></a>
                <a href="services_ghana.php" name="ghana" title="Services in Ghana"><li class="flag-icon flag-icon-gh"></li></a>
                <a href="services_sierraleone.php" name="sierraleone" title="Services in Sierra Leone"><li class="flag-icon flag-icon-sl"></li></a>
                <a href="services_gambia.php" name="gambia" title="Services in Gambia"><li class="flag-icon flag-icon-gm"></li></a>


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


        <?php
    }
    ?>
</header>

<body>
<main>
    <div class="form">

        <!--<ul class="tab-group">-->
        <!--<li class="tab active"><a href="#signup">Sign Up</a></li>-->
        <!--<li class="tab"><a href="#login">Log In</a></li>-->
        <!--</ul>-->

        <div class="tab-content">
            </div><br><br>
            <div>
                <h1 style="color:white">Login</h1><br><br>
                <form method="post" action="login.php">

<!--                    <input type="hidden" name="redirect" value="--><?php //echo urlencode($url); ?><!--" />-->
                    <div class="field-wrap">
<!--                        <label>-->
<!--                            Email Address<span class="req">*</span>-->
<!--                            </label>-->
                    <input placeholder="Username" name="username" type="text" />
                    </div>
                            <div class="field-wrap">
<!--                                <label>-->
<!--                                    Password<span class="req">*</span>-->
<!--                                    </label>-->
                    <input placeholder="Password" name="password" type="password" />
                            </div>
<!--                    <input type="submit" value="Sign in"/>-->


                    <button class="button button-block" type="submit" value="Sign in">Log In</button><br>
                    <button class="button button-block"><a href="forgot_password.php" class="text-center" style="color:red">Forgot Password?</a></button>

                </form>

            </div>


        </div><!-- tab-content -->

    </div> <!-- /form -->

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
                    <a href="services_nigeria.php" name="nigeria" title="Services in Nigeria"><li class="flag-icon flag-icon-ng"></li></a>
                    <a href="services_liberia.php" name="liberia" title="Services in Liberia"><li class="flag-icon flag-icon-lr"></li></a>
                    <a href="services_ghana.php" name="ghana" title="Services in Ghana"><li class="flag-icon flag-icon-gh"></li></a>
                    <a href="services_sierraleone.php" name="sierraleone" title="Services in Sierra Leone"><li class="flag-icon flag-icon-sl"></li></a>
                    <a href="services_gambia.php" name="gambia" title="Services in Gambia"><li class="flag-icon flag-icon-gm"></li></a>


                </div>

                <p> <a href="http://FM-AFRICA-ng.com/">FM-AFRICA Limited</a> &copy; . All rights Reserved</p>
            </div>
        </div>
    </div>
</footer>


<!-- Essential jQuery Plugins
================================================== -->
<!-- Main jQuery -->
<script src="/js/jquery-1.11.1.min.js"></script>
<!-- Twitter Bootstrap -->
<script src="/js/bootstrap.min.js"></script>
<!-- Single Page Nav -->
<script src="/js/jquery.singlePageNav.min.js"></script>
<!-- jquery.fancybox.pack -->
<script src="/js/jquery.fancybox.pack.js"></script>
<!-- Google Map API -->
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<!-- Owl Carousel -->
<script src="/js/owl.carousel.min.js"></script>
<!-- jquery easing -->
<script src="/js/jquery.easing.min.js"></script>
<!-- Fullscreen slider -->
<script src="/js/jquery.slitslider.js"></script>
<script src="/js/jquery.ba-cond.min.js"></script>
<!-- onscroll animation -->
<script src="/js/wow.min.js"></script>
<!-- Custom Functions -->
<script src="/js/main.js"></script>
<!--<script src="/Remodal-1.1.1/dist/remodal.js"></script>-->

<script type="text/javascript" src="../js/jquery-1.11.1.min.js"></script>

<script type="text/javascript" src="/pagination/script.js"></script>


</body>
</html>
