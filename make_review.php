
<?php
@ob_start();
session_start();
require 'PHPMailer-master/PHPMailerAutoload.php';
include 'bin/db_config.php';
include 'bin/selector.php';
include 'bin/insertor.php';
include('bin/instantiate_objects.php');

if(isset($_POST['submit_review'])) {
    $redirect = "location: ".urldecode($_POST['redirect']);
    $review = $_POST['review'];
    $publisher = $_POST['publisher'];
    $service_id = $_POST['service_id'];
    $user_id = $_POST['user_id'];
    $rating = $_POST['rating'];


    $table = 'service_review';
    $query_string = "INSERT INTO " . $table . " (review, publisher, service_id, user_id, rating) VALUES
     ('" . $review . "','" . $publisher. "','" . $service_id . "','" . $user_id . "','" . $rating . "')";

    $queryit = mysqli_query($conn,$query_string);

    if ($queryit) {
        $status = "success";

//                header("Location: http://localhost/qfm-ng/view_services=");
                header($redirect);

    } else {
        $status = "failed";
    }

}
echo $status;
?>




























