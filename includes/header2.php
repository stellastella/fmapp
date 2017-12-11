<?php
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
    <title>FM-AFRICA</title>
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

    <link rel="stylesheet" type="text/css" href="pagination/styles.css" />
    <link rel="stylesheet" href="styles/form_style.css">
<!--     for the data tables  the js is in footer2 -->
<!--    <link rel="stylesheet" type="text/css" href="DataTables-1.10.4/media/css/jquery.dataTables.css">-->



    <link rel="stylesheet" type="text/css" href="DataTables-1.10.4/media/css/jquery.dataTables.css">
    <script type="text/javascript" language="javascript" src="DataTables-1.10.4/media/js/jquery.js"></script>
    <script type="text/javascript" language="javascript" src="DataTables-1.10.4/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" language="javascript" src="DataTables-1.10.4/extensions/Responsive/js/dataTables.responsive.js"></script>
    <script type="text/javascript" language="javascript" src="DataTables-1.10.4/extensions/TableTools/js/dataTables.tableTools.min.js"></script>








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

<body id="body" background="/img/slider/watering-watering-can-man-vietnam-162637.jpeg">
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
                <a href="index.php"><img src="img/fmafricalogo.png"></a>
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
                }else {
                    ?>
                    <li><a href="loginform.php">Login</a></li>
                    <?php
                }
                ?>
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


    <!--Modal Div-- Login -->
    <div class="remodal" data-remodal-id="login_popup" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
        <div class="result"></div>
        <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
        <form class="login_form" id="login">
            <input type="hidden" name="redirect" value="<?php   if(isset($_GET["service_name"])) {
                $url = "services_inarea.php=".$_GET["service_name"];  echo urlencode($url); }?>" />
            <input placeholder="Username" id="login_username"  type="text" />
            <input placeholder="Password" id="login_password" type="password" />
            <input type="submit" value="Sign in"/>
        </form>

    </div>
    <!--Modal Div-->
    <!--Modal Div-- Sign-up -->

    <div class="remodal" data-remodal-id="error_popup" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
        <div class="result"></div>
        <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
        <form class="login_form" id="login">
            <a href="#login_popup"> <h3 style="color: white">Please Login</h3></a> <br>OR
            <a href="signupform.php"> <h3 style="color: white">Please Sign up</h3></a>
        </form>
    </div>

    <div class="remodal" data-remodal-id="signup_popup" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">

        <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
        <input type="hidden" name="redirect" value="<?php echo urlencode($url); ?>" />
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

    </div>
    <!--end of the display logged in-->



</header>


