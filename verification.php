<?php
@ob_start();
session_start();
include 'bin/db_config.php';
include 'bin/selector.php';
include 'bin/insertor.php';
include('bin/instantiate_objects.php');

?>
<html>
<head>

</head>
<body>
    <div id="header">
    </div>
     <div id="wrap">
        <!-- start PHP code -->
        <?php

        if(isset($_GET['email']) AND isset($_GET['token'])){

            if(isset($_GET["r"])){
                $redirect = urldecode($_GET["r"]);
            }else{
                $redirect = "index.html";
            }



            if(!empty($_GET['email']) && !empty($_GET['token'])){

            // Verify data
            $email = mysqli_escape_string($conn, $_GET['email']); // Set email variable
            $token = mysqli_escape_string($conn, $_GET['token']); // Set token variable
            $select = $selector->select_with_fetch("user"," email='".$email."' AND token='".$token."'");

//                echo var_dump($select);
            if(!empty($select)){
                $user_type = $select[0]["user_type"];
                if($user_type == 0){
                    $level = 2;
                }else{
                    $level = 3;
                }

                $update_query = "UPDATE user SET level = '".$level."' where token='".$token."'";
                $query = mysqli_query($conn,$update_query);
                if($query){
                    echo "USer Verified";
                    $header_location = "Location: http://localhost/qfm-ng/".$redirect."&v=verified";
//                    $header_location = "Location: http://localhost/qfm-ng/$redirect";
                    header($header_location);
                }else{
                    echo "USer not verified";
                }

            }else{
                echo "User not found";
            }

             // Display how many matches have been found -> remove this when done with testing ;)
        }else{

            }
        }else{

        }
        ?>
<!-- stop PHP Code -->


</div>
<!-- end wrap div -->
</body>
</html>
