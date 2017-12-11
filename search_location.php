<?php
/**
 * Created by PhpStorm.
 * User: Star
 * Date: 3/7/2017
 * Time: 3:32 PM
 */
@ob_start();
session_start();
include 'bin/db_config.php';
include 'bin/selector.php';
include 'bin/insertor.php';
include('bin/instantiate_objects.php');


if(isset($_POST["location"])){
    $location = strtolower($_POST["location"]);
    $get_location = $selector->select_with_fetch("services"," location LIKE '%$location%'");
	$business_in_location_json = json_encode($get_location);
	echo $business_in_location_json;
}else{
	$mssg = " No services in your area, why don't you search services in other location";
    echo $mssg;
}

?>