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
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

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

    <!--    Css for modal-->

    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link rel="stylesheet" href="styles/bootstrap.min.css">


    <link rel="stylesheet" href="styles/form_style.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/2.3.1/css/flag-icon.min.css" rel="stylesheet"/>
    <style>
        main{
            background-image: url('../img/slider/pexels-photo-345123.jpeg');
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