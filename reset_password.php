<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="styles/form_style.css">
<?php
/**
 * Created by PhpStorm.
 * User: Star
 * Date: 6/16/2017
 * Time: 7:38 AM
 */
include("includes/header.php");

    //start PHP code
?>

<main class="site-content" role="main">
    <section id="about" >

        <br><br><br><br>
        <div class="container">
            <div class="row">
                <div class="">
                    <div class="mssg">

                        <?php

    if(isset($_POST['password']) ) {

        $email = $_POST["email"];
        $token = $_POST["token"];
        $user_details = $selector->select_with_fetch("user", " email='" . $email . "'");
        $token_in_db = $user_details[0]["token"];
        $user_id = $user_details[0]["id"];

        if ($token_in_db == $token) {
            $password = $_POST['password'];
            $con_password = $_POST['con_password'];

            if (!empty($password)) {
                $email = mysqli_escape_string($conn, $email); // Set email variable


                    if ($password == $con_password) {
                        $enc_password = md5($password);
                        $update_query = "UPDATE user SET password = '" . $enc_password . "' where id ='".$user_id."'";
                        $query = mysqli_query($conn, $update_query);
                        if ($query) {
                            print "Your change of password was successful. Please <a href=\" http://localhost/qfm-ng/index.html#login_popup\" >login </a> with your new password to continue";
//                            header("Location: http://localhost/qfm-ng/index.html#login_popup");
                        } else {

                            echo "Change of password was not successful";
                        }

                    } else {
                        echo"Password do not match";
                    }

                   // Display how many matches have been found -> remove this when done with testing ;)
                }else{

                    echo"Password Empty";
                }
        }else{
            echo"token does not match mail";
        }
    } else {
          echo"NO value in password";
    }

                        ?>

                    </div>
                </div>

            </div>

        </div>
    </section>
</main>
<?php

include("includes/footer.php");
    ?>
    <!-- stop PHP Code -->

