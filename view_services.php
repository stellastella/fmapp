<?php
    if(isset($_GET["service"])) {
        $url = "view_services.php?service=".$_GET["service"];
    }
include("includes/header.php");?>


<link rel="stylesheet" href="styles/form_style.css">

<br/>
<br/>
<br/>
<br/>
<br/>
<br/>




<?php

if(isset($_SESSION["username"])){

$service = $_GET["service"];










$user_id = $_SESSION["uid"];
$check = " user_id = '".$user_id."' AND service_visited ='" . $service . "'";

$user_views = $selector->select_with_fetch("user_views",$check);


if(empty($user_views)){
    //Insert into userviews userid, service , date_time
    $data["user_id"] = $user_id;
    $data["service_visited"] = $service;
    $data["time_visited"] = date("Y-m-d h:i:sa",time());

    $insert_service = $insertor->insert_it("user_views",$data);




}else{
    //update date and time to now

    $time_visited = date("Y-m-d h:i:sa",time());
    $result = mysqli_query($conn, "UPDATE user_views SET time_visited = '$time_visited' WHERE user_id='$user_id' AND service_visited = '$service'");
//    echo "UPDATE";
}


    if (isset($_GET['service'])) {
        $service_id = $_GET['service'];
        $services = $selector->select_with_fetch("services", "id = '" . $service_id . "' ORDER by priority DESC");
        $ad_services = $selector->select_with_fetch("services", "priority>0 ORDER by priority DESC");
        $ad_services_group = $selector->select_with_fetch("services", "1=1 ORDER by priority DESC ,id DESC LIMIT 6");
   ?>
<main>
<div id="main">
    <div class="container">
                <?php
                foreach ($services as $this_service) {
                    $if_users_has_review = 0;
                    $if_user = $selector->select_with_fetch("service_review","service_id = '".$this_service["id"]."' AND user_id='".$user_id."'");

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
                        $rating_average = round($sum/$counter);
                    }

                    $service_details = $selector->select_with_fetch("services", " id = " . $this_service["business_id"]);
                    $business_details = $selector->select_with_fetch("business_owners", " id = " . $this_service["business_id"]);
                    $service_id = $service_details[0]["id"];
                    $phone_no = $business_details[0]["phone"];

                    ?>
                    <br><br>
                    <h1 class="col-md-12 text-center"><?php echo $business_details[0]["business_name"]; ?></h1>
                    <div class="vendor_box2">
                    <div class="vendor_picture" style="background: url('images/vendors/<?php echo $service_details[0]["img"]?>'); border-radius:10px; background-size: cover;">

                    </div>
                    <div class="vendor_text">

                    <br>

                    <p><?php echo"Company Service Name". ": " .$service_details[0]["service_name"]; ?></p>
                    <p><?php echo"Service Details". ": " . $service_details[0]["details"]; ?></p>
                    <p><?php echo"call". ": " . "<a href='tel:$phone_no'>$phone_no</a>"; ?></p>
                    <p><?php echo"email". ": " . $business_details[0]["email"]; ?></p>
                    <p><?php echo"Location". ": " . $business_details[0]["location"]; ?></p>
                    <p><?php echo"Contact Person". ": " . $business_details[0]["contact_person"];?></p>
                    <p>Rating Average: <?php echo $rating_average?></p>

                    <?php include("includes/show_rating.php"); ?>
                    <?php if($if_users_has_review == 0){
                    ?>

                    <form action="make_review.php" method="post" id="make_review">
                         Review:<br/><textarea name="review" placeholder="Enter your review"></textarea>
                         <input type="hidden" name="publisher" placeholder="0" />
                         <input type="hidden" name="redirect" value="<?php echo $url; ?>" />
                         <input type="hidden" name="service_id" value="<?php echo $service_id; ?>" />
                         <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" />
                         <input type="text" value="3" id="ratingme" name="rating"/><br>
                         <input type="submit" value="submit" name="submit_review"/> <br><br>
                    </form>
                        <script>
                            $(function(){
                                $('#ratingme').rating();
                            });
                        </script>
                    </div>
                    <?php
                    }
                }
            }else{
                header("Location: http://localhost/qfm-ng/index.html#error_popup2");
                //Return to homepage
            }
        }else{
                header("Location: http://localhost/qfm-ng/index.html#error_popup");
                echo"please sign in";
            }
            ?><br>
            </div>
        </div>
    </div>

    <h3 class="text-center"><a href="all_services.php" style="margin:35px">View all services</a>
       <a href="index.php"  class="text-center" style="color:green">back to home page</a>
    </h3>
    </main>
<?php include("includes/footer.php");?>



