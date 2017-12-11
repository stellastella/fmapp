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
    <meta name="description" content="Blue One Page Creative HTML5 Template">
    <meta name="keywords" content="one page, single page, onepage, responsive, parallax, creative, business, html5, css3, css3 animation">
    <meta name="author" content="Muhammad Morshed">

    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
    ================================================== -->

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>

    <!--    <link rel="stylesheet" type="text/css" href="style/bootstrap/css/bootstrap.css">-->
    <link rel="stylesheet" type="text/css" href="styles/style.css">

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

    <link rel="stylesheet" type="text/css" href="pagination/styles.css"/>
    <link rel="stylesheet" href="styles/form_style.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/2.3.1/css/flag-icon.min.css" rel="stylesheet"/>
    <style>
        main{
            background-image: url('./img/slider/pexels-photo-345123.jpeg');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            /*width:100%;*/
        }
    </style>

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
    if(isset($_GET["i"])) {
        $url = "category.php?i=".$_GET["i"];
    }
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

        <div class="remodal" data-remodal-id="error_popup" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
            <div class="result"></div>
            <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
            <form class="login_form">
                <a href="#login_popup"> <h3 style="color: white">Please Login</h3></a> <br>OR
                <a href="#signup_popup"> <h3 style="color: white">Please Sign up</h3></a>
            </form>
        </div>

        <!--eND OF MODAL-->
        <?php
    }
    ?>
</header>

<?php

    if(isset($_GET["service"])) {
        $url = "view_services.php?service=".$_GET["service"];
    }
$services = $selector->select_with_fetch("services", "1=1 ORDER by priority DESC");
$ad_services = $selector->select_with_fetch("services", "priority>0 ORDER by priority DESC");
//var_dump($ad_services);
$ad_services_group = $selector->select_with_fetch("services", "1=1 ORDER by priority DESC ,id DESC LIMIT 6");
//var_dump($ad_services_group);
//
//foreach ($ad_services_group as $this_service) {
//    echo "<a href='all_services.php?i=" . $this_service["id"] . "' > " . $this_service["service_name"] . "</a>";
//}
//?>

<main class="site-content" role="main">
    <div class="body" style="background-color: rgba(0, 0, 0, 0.68)">
            <h3 class="text-center" style="margin: 80px; color:#fbfffe">All Services</h3>
        <div id="main" style="margin:80px">

    <ul id="holder">
    <?php
        foreach ($services as $this_service) {
            $service_details = "";
            $service_details = $selector->select_with_fetch("services", " id = " . $this_service["business_id"]);
            $service_id = $service_details[0]["id"];

                if(isset($_SESSION["username"])) {
                $user_id = $_SESSION["uid"];
                //                        to display average rating
                $if_users_has_review = 0;
                $if_user = $selector->select_with_fetch("service_review","service_id = '".$this_service["id"]."' AND user_id='".$user_id."'");
                }
                if(!empty($if_user)){
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
                    //            $numofpeople = $counter;
                }
    ?>
            <li>
                    <h3><?php echo $service_details[0]["service_name"]; ?></h3>
                    <p><?php echo $service_details[0]["details"]; ?></p>
                    <p>Average Rating :<?php echo $rating_average?></p>
                        <?php if(isset($_SESSION["username"])){ ?>
                            <a href="view_services.php?service=<?php echo $this_service["id"]; ?>">View Details </a>
                            <?php
                        }else {?>
                            <a href="view_services.php?service=<?php echo $this_service["id"]; ?>"> Please sign up or login to have full access</a>
                        <?php
                        }
        }
                        ?>
            </li>
            </ul>
</div>

<br><br><br>
<div class="text-center">
    <a href="index.php"  class="text-center" style="color:#fbfffe">back to home page</a>
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
                       <a href="#login_popup" class="btn btn-blue btn-effect">Login</a>
                       <?php
                   }?>
</div></div></div>
    </main>

<footer id="footer">
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
                        <li class="wow animated zoomIn" data-wow-delay="0.3s"><br><br><br><br><a href="#"><i class="fa fa-twitter fa-3x"></i></a></li>
                        <li class="wow animated zoomIn" data-wow-delay="0.6s"><a href="#"><i class="fa fa-skype fa-3x"></i></a></li>
                        <li class="wow animated zoomIn" data-wow-delay="0.9s"><a href="#"><i class="fa fa-facebook fa-3x"></i></a></li>
                    </ul>
                        <a href="services_nigeria.php" name="nigeria" title="Services in Nigeria"><li class="flag-icon flag-icon-ng"></li></a>
                        <a href="services_liberia.php" name="liberia" title="Services in Liberia"><li class="flag-icon flag-icon-lr"></li></a>
                        <a href="services_ghana.php" name="ghana" title="Services in Ghana"><li class="flag-icon flag-icon-gh"></li></a>
                        <a href="services_sierraleone.php" name="sierraleone" title="Services in Sierra Leone"><li class="flag-icon flag-icon-sl"></li></a>
                        <a href="services_gambia.php" name="gambia" title="Services in Gambia"><li class="flag-icon flag-icon-gm"></li></a>

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
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="pagination/script.js"></script>


</html>





