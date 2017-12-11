<?php
/**
 * Created by PhpStorm.
 * User: Star
 * Date: 3/7/2017
 * Time: 3:32 PM
 */
@ob_start();
session_start();
require 'PHPMailer-master/PHPMailerAutoload.php';

include 'bin/db_config.php';
include 'bin/selector.php';
include 'bin/insertor.php';
include('bin/instantiate_objects.php');


//var_dump($_POST);

$msg= "";

if(isset($_POST['add_service'])) {

    $service_name = $_POST['service_name'];
    $details = $_POST['details'];
    $keywords = $_POST['keywords'];
    $category_id = $_POST['category_id'];
	$business_id = $_POST["business_id"];
    $img = $_FILES['service_image']['name'];
    $target = "images/" . basename($_FILES['service_image']['name']);


    if ($level = 3) {
        $table = 'services';
        $query_string = "INSERT INTO " . $table . " (service_name, details, keywords, category_id, business_id, img) VALUES
    ('" . $service_name . "','" . $details . "','" . $keywords . "','" . $category_id . "','". $business_id . "','" . $img . "')";

        $select = $selector->select_with_fetch("services"," service_name='".$service_name."' AND details='".$details."'
        AND keywords='".$keywords."' AND category_id='".$category_id."' AND img='".$img."'");


        if(move_uploaded_file($_FILES['service_image']['tmp_name'], $target)){
            $queryit = mysqli_query($conn,$query_string);

            if ($queryit) {
                $msg = "success";
            $msg= " entries uploaded successfully";
            header("Location: http://localhost/qfm-ng/profile.php");
        }else {
            $msg= "There was a problem uploading the entries";
        }

        } else {
            $msg = "failed";
        }
    } else {
        echo "You are not signed up as corporate";
    }
}else{
    $msg = "please enter the required fields";
}
