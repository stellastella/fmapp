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
    <link rel="stylesheet" href="styles/bootstrap.min.css">

<!--    <link rel="stylesheet" type="text/css" href="pagination/styles.css"/>-->
<!--    <link rel="stylesheet" href="styles/form_style.css"/>-->
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
    }
    ?>
</header>

<body>
<main>
<div class="form">
    <div class="tab-content">
        <div id="signup"><br>
            <h1 style="color:white;">Sign Up</h1>

            <form action="sign_up.php" method="post">

<!--                <div class="top-row">-->
<!--                    <div class="field-wrap">-->
<!--                        <label>-->
<!--                            First Name<span class="req">*</span>-->
<!--                        </label>-->
<!--                        -->
<!--                    </div>-->
<!---->
<!--                    <div class="field-wrap">-->
<!--                        <label>-->
<!--                            Last Name<span class="req">*</span>-->
<!--                        </label>-->
<!--                        <input type="text"required autocomplete="off"/>-->
<!--                    </div>-->
<!--                </div>-->

                <div class="field-wrap">
<!--                    <label>-->
<!--                        Email Address<span class="req">*</span>-->
<!--                    </label>-->
                    <input placeholder="enter your email" name="email"   id="email" type="text" />
                </div>

                <div class="top-row">
                    <div class="field-wrap">
<!--                        <label>-->
<!--                            Password<span class="req">*</span>-->
<!--                        </label>-->
                        <input placeholder="Password" id="password" name="password" type="password" />
                    </div>

                    <div class="field-wrap">
<!--                        <label>-->
<!--                            Confirm Password<span class="req">*</span>-->
<!--                        </label>-->
                        <input placeholder="confirm password" name="con_password" type="password" />
                    </div>
                </div>
                <div class="top-row">
                    <div class="field-wrap">
<!--                        <label>-->
<!--                            Full name<span class="req">*</span>-->
<!--                        </label>-->
                            <input placeholder="Full Name" name="full_name" type="text" />
                    </div>

                    <div class="field-wrap">
<!--                        <label>-->
<!--                            Area<span class="req">*</span>-->
<!--                        </label>-->
                        <input placeholder="area" name="area" type="text" />
                    </div>
                </div>
                <div class="field-wrap">
<!--                    <label>-->
<!--                        Address<span class="req">*</span>-->
<!--                    </label>-->
                    <input placeholder="address" name="address" type="text" />
                </div>

                <div class="top-row">
                    <div class="field-wrap">
                        <select onchange="yesNo(this);" name="country" style="color:red; border-radius: 10px; height: 50%; width: 12em; font-size: 20px">
                            <option>Select Country</option>
                            <option value="Nigeria">Nigeria</option>
                            <option value="Gambia">Gambia</option>
                            <option value="Ghana">Ghana</option>
                            <option value="Liberia">Liberia</option>
                            <option value="Sierra Leone">Sierra Leone</option>

                        </select></div>

                    <div class="field-wrap">
                        <select  class="states_signup" name="state" id="ifyes" style="color:red; border-radius: 10px; height: 50%; width: 12em; font-size: 20px">
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
                            <script>
                                function yesNo(that) {
                                    if (that.value == "Nigeria") {
                                        document.getElementById("ifyes").style.display = "block";
                                    }
                                    else {
                                        document.getElementById("ifyes").style.display = "none";
                                    }
                                }
                            </script>
                        </select></div></div>

                <div id="local_govt_div" name="local_govt">
                    <!--Response will be inserted here-->
                </div>
                <div class="field-wrap">
                <select onchange="yesnoCheck(this);" name="user_type" style="color:red; border-radius: 10px; height: 100%; width: 12em; font-size: 20px">
                    <option value="">Type of Membership</option>
                    <option value="0">Individual</option>
                    <option value="1">Corporate</option>
                </select></div>


                <div id="ifYes" style="display: none;">
                    <input type="text" placeholder="Name of organization" id="organization" name="organization" />
                    <input type="text" placeholder="contact person's name" id="contact_person" name="contact_person" />
                    <input type="text" placeholder="website (if applicable)" id="website" name="website" />

                    <script>
                        function yesnoCheck(that) {
                            if (that.value == "1") {
                                document.getElementById("ifYes").style.display = "block";
                            }
                            else {
                                document.getElementById("ifYes").style.display = "none";
                            }
                        }
                    </script>

                </div>

                <div class="top-row">
                    <div class="field-wrap">
                <input placeholder="Country code" name="country_code" type="text" /><br></div>
                    <div class="field-wrap">
                <input placeholder="Phone number" name="phone_number" type="text" /><br></div>
                </div>

                <div class="g-recaptcha" data-sitekey="6LfUrRkUAAAAAODDGLXDtaJMpFRf5TqpDu0K0a6q" ></div>

                <button type="submit" class="button button-block"/>Sign up</button>

            </form>

        </div>
        <div id="login">
            <!--<h1>Welcome Back!</h1>-->

            <!--<form action="/" method="post">-->

            <!--<div class="field-wrap">-->
            <!--<label>-->
            <!--Email Address<span class="req">*</span>-->
            <!--</label>-->
            <!--<input type="email"required autocomplete="off"/>-->
            <!--</div>-->

            <!--<div class="field-wrap">-->
            <!--<label>-->
            <!--Password<span class="req">*</span>-->
            <!--</label>-->
            <!--<input type="password"required autocomplete="off"/>-->
            <!--</div>-->

            <!--&lt;!&ndash;<p claforgot"><a href="#">Forgot Password?</a></p>&ndash;&gt;-->

            <!--&lt;!&ndash;<buttoass="button button-block"/>Log In</button>&ndash;&gt;-->

            <!--</form>-->

        </div>


    </div><!-- tab-content -->

</div> <!-- /form -->


<!--</body>-->
<!--<main>-->

<!--    <div class="body" style="background-color: rgba(0, 0, 0, 0.68)">-->
<!--<div class="container">-->
<!--    <div class="row">-->
<!--        <h3 class="text-center" style="color: white">Please Fill in All The Details Below</h3>-->
<!--<form class="login_form" action="sign_up.php" method="post" id="signup">-->
<!--<!--    <input type="hidden" name="redirect" value="--><?php ////echo urlencode($url); ?><!--<!--" />-->
<!--    <input placeholder="enter your email" name="email"   id="email" type="text" />-->
<!--    <input placeholder="Password" id="password" name="password" type="password" />-->
<!--    <input placeholder="confirm password" name="con_password" type="password" />-->
<!--    <input placeholder="Full Name" name="full_name" type="text" />-->
<!--    <input placeholder="address" name="address" type="text" />-->
<!--    <input placeholder="area" name="area" type="text" />-->
<!--    <!--Change this to your states-->
<!--    <select onchange="yesNo(this);" name="country" style="color:red">-->
<!--        <option>Select Country</option>-->
<!--        <option value="Nigeria">Nigeria</option>-->
<!--        <option value="Gambia">Gambia</option>-->
<!--        <option value="Ghana">Ghana</option>-->
<!--        <option value="Liberia">Liberia</option>-->
<!--        <option value="Sierra Leone">Sierra Leone</option>-->
<!---->
<!--    </select>-->
<!---->
<!--    <select  class="states_signup" name="state" id="ifyes" style="display: none; color:red">-->
<!--        <option>Select State</option>-->
<!--        <option value="Abia">Abia</option>-->
<!--        <option value="Adamawa">Adamawa</option>-->
<!--        <option value="Akwa-ibom">Akwa-Ibom</option>-->
<!--        <option value="Anambra">Anambra</option>-->
<!--        <option value="Bauchi">Bauchi</option>-->
<!--        <option value="Bayelsa">Bayelsa</option>-->
<!--        <option value="Benue">Benue</option>-->
<!--        <option value="Borno">Borno</option>-->
<!--        <option value="Cross-river">Cross-river</option>-->
<!--        <option value="Delta">Delta</option>-->
<!--        <option value="Ebonyi">Ebonyi</option>-->
<!--        <option value="Edo">Edo</option>-->
<!--        <option value="Enugu">Enugu</option>-->
<!--        <option value="Ekiti">Ekiti</option>-->
<!--        <option value="FCT">FCT</option>-->
<!--        <option value="Gombe">Gombe</option>-->
<!--        <option value="Imo">Imo</option>-->
<!--        <option value="Jigawa">Jigawa</option>-->
<!--        <option value="Kaduna">Kaduna</option>-->
<!--        <option value="Kano">Kano</option>-->
<!--        <option value="Katsina">Katsina</option>-->
<!--        <option value="Kebbi">Kebbi</option>-->
<!--        <option value="Kogi">Kogi</option>-->
<!--        <option value="Kwara">Kwara</option>-->
<!--        <option value="Lagos">Lagos</option>-->
<!--        <option value="Nasarawa">Nasarawa</option>-->
<!--        <option value="Niger">Niger</option>-->
<!--        <option value="Ondo">Ondo</option>-->
<!--        <option value="Ogun">Ogun</option>-->
<!--        <option value="Oyo">Oyo</option>-->
<!--        <option value="Osun">Osun</option>-->
<!--        <option value="Plateau">Plateau</option>-->
<!--        <option value="Rivers">Rivers</option>-->
<!--        <option value="Sokoto">Sokoto</option>-->
<!--        <option value="Taraba">Taraba</option>-->
<!--        <option value="Yobe">Yobe</option>-->
<!--        <option value="Zamfara">Zamfara</option>-->
<!--        <option value="FCT">FCT</option>-->
<!--        <script>-->
<!--            function yesNo(that) {-->
<!--                if (that.value == "Nigeria") {-->
<!--                    document.getElementById("ifyes").style.display = "block";-->
<!--                }-->
<!--                else {-->
<!--                    document.getElementById("ifyes").style.display = "none";-->
<!--                }-->
<!--            }-->
<!--        </script>-->
<!--    </select>-->
<!---->
<!--    <div id="local_govt_div" name="local_govt" style="color:red">-->
<!--        <!--Response will be inserted here-->
<!--    </div>-->
<!---->
<!--    <select onchange="yesnoCheck(this);" name="user_type" style="color:red">-->
<!--        <option value="">Select</option>-->
<!--        <option value="0">Individual</option>-->
<!--        <option value="1">Corporate</option>-->
<!--    </select>-->
<!---->
<!---->
<!--    <div id="ifYes" style="display: none;">-->
<!--        <input type="text" placeholder="Name of organization" id="organization" name="organization" />-->
<!--        <input type="text" placeholder="contact person's name" id="contact_person" name="contact_person" />-->
<!--        <input type="text" placeholder="website (if applicable)" id="website" name="website" />-->
<!---->
<!--        <script>-->
<!--            function yesnoCheck(that) {-->
<!--                if (that.value == "1") {-->
<!--                    document.getElementById("ifYes").style.display = "block";-->
<!--                }-->
<!--                else {-->
<!--                    document.getElementById("ifYes").style.display = "none";-->
<!--                }-->
<!--            }-->
<!--        </script>-->
<!---->
<!--    </div>-->
<!---->
<!--    <input placeholder="Phone number" name="phone_number" type="text" />-->
<!--    <br>-->
<!--    <br>-->
<!--    <div class="g-recaptcha" data-sitekey="6LfUrRkUAAAAAODDGLXDtaJMpFRf5TqpDu0K0a6q"></div>-->
<!---->
<!--    <input type="submit" value="Sign up"/>-->
<!--</form><br><br>-->
<!--    </div>-->
<!--</div>-->
<!--</div>-->
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
<script src="/Remodal-1.1.1/dist/remodal.js"></script>

<script type="text/javascript" src="../js/jquery-1.11.1.min.js"></script>

<script type="text/javascript" src="/pagination/script.js"></script>


</body>
</html>
