
<?php
@ob_start();
session_start();
if(isset($_SESSION['level'])){
    if($_SESSION['level'] > 3) {

        include 'bin/db_config.php';
        include 'bin/selector.php';
        include 'bin/insertor.php';
        include('bin/instantiate_objects.php');


//$services = $selector->select_with_fetch("services"," status = '1' ORDER BY category_id" );

        ?>
        <!DOCTYPE html>
        <!--[if lt IE 7]>
        <html lang="en" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
        <!--[if IE 7]>
        <html lang="en" class="no-js lt-ie9 lt-ie8"> <![endif]-->
        <!--[if IE 8]>
        <html lang="en" class="no-js lt-ie9"> <![endif]-->
        <!--[if gt IE 8]><!-->
        <html lang="en" class="no-js"> <!--<![endif]-->
        <head>
            <!-- meta character set -->
            <meta charset="utf-8">
            <!-- Always force latest IE rendering engine or request Chrome Frame -->
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
            <title>FM-AFRICA</title>
            <!-- Meta Description -->
            <meta name="description" content="Facility Management services">
            <meta name="keywords"
                  content="facilitymanagers, facility, management, cleaners, propertymanagement, services">
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

            <script src="js/jquery-1.11.1.min.js"></script>
            <script src="js/reload.js"></script>

            <script src='https://www.google.com/recaptcha/api.js'></script>
            <!--    Css for modal-->
            <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/2.3.1/css/flag-icon.min.css"
                  rel="stylesheet"/>
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
            <script src="DataTables/media/js/jquery.dataTables.js"></script>
            <link href="DataTables/media/css/jquery.dataTables.css" rel="stylesheet" type="text/css"/>


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

                function checkForm(form) {
                ...

                    if(!form.captcha.value.match(/^\d{5}$/))
                    {
                        alert('Please enter the CAPTCHA digits in the box provided');
                        form.captcha.focus();
                        return false;
                    }

                ...

                    return
                    true;
                }

            </script>
            <!---->
            <!--        for states and local government drop down-->
            <script type="text/javascript">
                $(document).ready(function () {
                    $(".states_signup").change(function () {
                        var selectedState = $(".states_signup option:selected").val();
                        $.ajax({
                            type: "POST",
                            url: "php/process-request.php",
                            data: {state: selectedState}
                        }).done(function (data) {
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
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
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

                            <?php
                            if (isset($_SESSION["username"])) {
                                ?>
                                <li><a href="profile.php">Profile</a></li>
                                <li><a href="logout.php">Logout</a></li>
                                <?php
                            } else {
                                ?>
                                <li><a href="loginform.php">Login</a></li>
                                <?php
                            }
                            //
                            ?>
                            <li><a href="index.php">Home</a></li>
                              <li><a href="#category">Categories</a></li>
                            <li><a href="all_services.php">All services</a></li>
                        </ul>


                        <a href="services_nigeria.php" name="nigeria" title="Services in Nigeria">
                            <li class="flag-icon flag-icon-ng"></li>
                        </a>
                        <a href="services_liberia.php" name="liberia" title="Services in Liberia">
                            <li class="flag-icon flag-icon-lr"></li>
                        </a>
                        <a href="services_ghana.php" name="ghana" title="Services in Ghana">
                            <li class="flag-icon flag-icon-gh"></li>
                        </a>
                        <a href="services_sierraleone.php" name="sierraleone" title="Services in Sierra Leone">
                            <li class="flag-icon flag-icon-sl"></li>
                        </a>
                        <a href="services_gambia.php" name="gambia" title="Services in Gambia">
                            <li class="flag-icon flag-icon-gm"></li>
                        </a>

                    </nav>
                </div>
            </div>
            <!--    to display feilds for the selected options-->

        </header>
        <!--End Fixed Navigation
        ==================================== -->

        <main class="site-content" role="main">
            <section class=" text ceenter">
                <div><br><br>
                    <h3>Category</h3>:<a href="admin_category.php" class="btn btn-blue btn-effect">Manage Categories</a>
<!--                    <a href="delete_category.php" class="btn btn-blue btn-effect">Delete category</a><a href="edit_category.php" class="btn btn-blue btn-effect">Editcategory</a>-->

                    <h3>Services</h3>:<a href="admin_services.php" class="btn btn-blue btn-effect">Manage Services</a>

<!--                    <h3>Business</h3>:<a href="delete_business.php" class="btn btn-blue btn-effect">Delete Business</a>-->
<!---->
<!--                    <h3>Top Services</h3>:<a href="#login_popup" class="btn btn-blue btn-effect">Change</a><a-->
<!--                        href="#login_popup" class="btn btn-blue btn-effect">Edit</a>-->
<!---->

<!--                    --><?php
//                    $counter = 0;
//                    $services = $selector->select_with_fetch("services", "id = '" . $service_id . "' ORDER by priority DESC");
//
//                    foreach ($services as $this_services) {
//                        $counter++;
//                        echo $counter;
//                    }
//
//                    ?>
<!--                    <br>Total Count of services:-->
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
                    <div><a href="disclaimer.php" style="color:white">Disclaimer</a></div>

                    <div class="footer-content">

                        <div class="footer-social">

                            <ul>
                                <li class="wow animated zoomIn" data-wow-delay="0.3s"><a href="#"><i
                                            class="fa fa-twitter fa-3x"></i></a></li>
                                <li class="wow animated zoomIn" data-wow-delay="0.6s"><a href="#"><i
                                            class="fa fa-skype fa-3x"></i></a></li>
                                <li class="wow animated zoomIn" data-wow-delay="0.9s"><a href="#"><i
                                            class="fa fa-facebook fa-3x"></i></a></li>

                            </ul>
                            <ul>
                                <a href="services_nigeria.php" name="nigeria" title="Services in Nigeria">
                                    <li class="flag-icon flag-icon-ng"></li>
                                </a>
                                <a href="services_liberia.php" name="liberia" title="Services in Liberia">
                                    <li class="flag-icon flag-icon-lr"></li>
                                </a>
                                <a href="services_ghana.php" name="ghana" title="Services in Ghana">
                                    <li class="flag-icon flag-icon-gh"></li>
                                </a>
                                <a href="services_sierraleone.php" name="sierraleone" title="Services in Sierra Leone">
                                    <li class="flag-icon flag-icon-sl"></li>
                                </a>
                                <a href="services_gambia.php" name="gambia" title="Services in Gambia">
                                    <li class="flag-icon flag-icon-gm"></li>
                                </a>
                            </ul>
                        </div>

                        <p><a href="http://FM-AFRICA-ng.com/">FM-AFRICA Limited</a> &copy; . All rights Reserved</p>
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

        <?php

    }else{
        header("location:index.php");
    }
}else{
    header("location:index.php");
}

?>