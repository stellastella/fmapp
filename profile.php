<style>
    body{padding-top:30px;}

.glyphicon {  margin-bottom: 10px;margin-right: 10px;}

small {
display: block;
line-height: 1.428571429;
color: #999;
}</style>
<?php
        include("includes/header.php");
        ?>
            <main class="site-content" role="main">
<!--                <div class="body">-->
<br>
                    <div class="container">
                                <br><br><br>
                                <?php
                                if (isset($_SESSION["uid"])){
                                $user_id = $_SESSION["uid"];
                                $user_details = $selector->select_with_fetch("user", "id=" . $user_id);
                                    $level='';

                                if (!empty($user_details)){
                                $this_user = $user_details[0];
                                //    $this_user["id"];
                                //    $this_user["username"]
                                //    Businesses by user


                                //An Array of all business owned by user
                                $select_businesses = $selector->select_with_fetch("business_owners", "user_id=" . $user_id);
                                //        Use foreach Loop to use each business
                                if (!empty($select_businesses)){

                                foreach ($select_businesses as $this_business){

                                //                                        echo "<br/>";
                                //                                        echo "<h2>Business Added</h2>";
                                //                                        echo "<br/>";

                                // to display the business name from the database for a particular corporate user
                                echo '<h3 class="text-center">' . $this_business["business_name"] . "</h3>";
                                //                                        echo "<h2>Services Added</h2>";
                                //                                        echo "<br/>";
                                $select_services = $selector->select_with_fetch("services", "business_id=" . $this_business["id"]);
                                foreach ($select_services as $this_service){
//                                    to show reviews/ rating//
                                    if (isset($_SESSION["username"])) {
                                    $user_id = $_SESSION["uid"];
                                    $if_users_has_review = 0;
                                    $if_user = $selector->select_with_fetch("service_review", "service_id = '" . $this_service["id"] . "' AND user_id='" . $user_id . "'");
                                    }
                                    if (!empty($if_user)) {
                                    $if_users_has_review = 1;
                                    }
                                    $ratings = $selector->select_with_fetch("service_review", "service_id = '" . $this_service["id"] . "' ORDER by id DESC");
                                    $sum = 0;
                                    $counter = 0;
                                    foreach ($ratings as $this_rating) {
                                    $sum = $sum + $this_rating["rating"];
                                    $counter++;
                                    }
                                    if ($counter == 0) {
                                    $rating_average = 0;
                                    } else {
                                    $rating_average = (round($sum / $counter,0));
                                    }

                                ?>
                                <div class="container centered">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-8">
            <div class="well well-sm">
                <div class="row" style="margin: auto;">
                    <div class="col-sm-6 col-md-4" style="background: url('images/<?php echo $this_service['img'] ?>'); background-repeat: no-repeat; background-size:100% auto; height:200px;">
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <h4 class="text-uppercase"><strong><?php echo $this_service["service_name"] ?></strong></h4>
                        <?php $this_category_name = $selector->select_with_fetch("categories", "id=" . $this_service["category_id"]);?>
                        <h5><?php echo 'CATEGORY :'. $this_category_name[0]["cat_name"]; ?> </h5>

                        <small><cite title="San Francisco, USA"><?php echo $this_service["details"] ?>
                        </cite></small>
                        <small><cite title="San Francisco, USA"><?php echo 'Rating :'. $rating_average.'%' ?></cite></small>
                                <?php if($rating_average==5){
                                echo '<ul class="ratedstar" style="margin-left:5px">
                                    <li><label for="rating_1"><i class="fa fa-star" aria-hidden="true"></i></label><input type="radio" value="1"/></li>
                                    <li><label for="rating_2"><i class="fa fa-star" aria-hidden="true"></i></label><input type="radio" value="2"/></li>
                                    <li><label for="rating_3"><i class="fa fa-star" aria-hidden="true"></i></label><input type="radio" value="3"/></li>
                                    <li><label for="rating_4"><i class="fa fa-star" aria-hidden="true"></i></label><input type="radio" value="4"/></li>
                                    <li><label for="rating_5"><i class="fa fa-star" aria-hidden="true"></i></label><input type="radio" value="5"/></li>
                                </ul>';
                                }elseif($rating_average==4){
                                echo '
                                <ul class="ratedstar" style="margin-left:5px">
                                    <li><label for="rating_1"><i class="fa fa-star" aria-hidden="true"></i></label><input type="radio" value="1"/></li>
                                    <li><label for="rating_2"><i class="fa fa-star" aria-hidden="true"></i></label><input type="radio" value="2"/></li>
                                    <li><label for="rating_3"><i class="fa fa-star" aria-hidden="true"></i></label><input type="radio" value="3"/></li>
                                    <li><label for="rating_4"><i class="fa fa-star" aria-hidden="true"></i></label><input type="radio" value="4"/></li>
                                    <li><label for="rating_4" style="color:white;"><i class="fa fa-star" aria-hidden="true"></i></label><input type="radio" value="0"/></li>
                                </ul>';
                                }elseif($rating_average==3){
                                echo '
                                <ul class="ratedstar" style="margin-left:5px">
                                    <li><label for="rating_1"><i class="fa fa-star" aria-hidden="true"></i></label><input type="radio" value="1"/></li>
                                    <li><label for="rating_2"><i class="fa fa-star" aria-hidden="true"></i></label><input type="radio" value="2"/></li>
                                    <li><label for="rating_3"><i class="fa fa-star" aria-hidden="true"></i></label><input type="radio" value="3"/></li>
                                    <li><label for="rating_4" style="color:white;"><i class="fa fa-star" aria-hidden="true"></i></label><input type="radio" value="0"/></li>
                                    <li><label for="rating_4" style="color:white;"><i class="fa fa-star" aria-hidden="true"></i></label><input type="radio" value="0"/></li>
                                </ul>';
                                }elseif($rating_average==2){
                                echo '
                                <ul class="ratedstar">
                                    <li><label for="rating_1"><i class="fa fa-star" aria-hidden="true"></i></label><input type="radio" value="1"/></li>
                                    <li><label for="rating_2"><i class="fa fa-star" aria-hidden="true"></i></label><input type="radio" value="2"/></li>
                                    <li><label for="rating_4" style="color:white;"><i class="fa fa-star" aria-hidden="true"></i></label><input type="radio" value="0"/></li>
                                    <li><label for="rating_4" style="color:white;"><i class="fa fa-star" aria-hidden="true"></i></label><input type="radio" value="0"/></li>
                                    <li><label for="rating_4" style="color:white;"><i class="fa fa-star" aria-hidden="true"></i></label><input type="radio" value="0"/></li>
                                </ul>';
                                }elseif($rating_average==1){
                                echo '
                                <ul class="ratedstar" style="margin-left:5px">
                                    <li><label for="rating_1"><i class="fa fa-star" aria-hidden="true"></i></label><input type="radio" value="1"/></li>
                                    <li><label for="rating_4" style="color:white;"><i class="fa fa-star" aria-hidden="true"></i></label><input type="radio" value="0"/></li>
                                    <li><label for="rating_4" style="color:white;"><i class="fa fa-star" aria-hidden="true"></i></label><input type="radio" value="0"/></li>
                                    <li><label for="rating_4" style="color:white;"><i class="fa fa-star" aria-hidden="true"></i></label><input type="radio" value="0"/></li>
                                    <li><label for="rating_4" style="color:white;"><i class="fa fa-star" aria-hidden="true"></i></label><input type="radio" value="0"/></li>
                                </ul>';
                                }else{
                                echo '
                                <ul class="ratedstar" style="margin-left:5px">
                                    <li><label for="rating_4" style="color:white;"><i class="fa fa-star" aria-hidden="true"></i></label><input type="radio" value="0"/></li>
                                    <li><label for="rating_4" style="color:white;"><i class="fa fa-star" aria-hidden="true"></i></label><input type="radio" value="0"/></li>
                                    <li><label for="rating_4" style="color:white;"><i class="fa fa-star" aria-hidden="true"></i></label><input type="radio" value="0"/></li>
                                    <li><label for="rating_4" style="color:white;"><i class="fa fa-star" aria-hidden="true"></i></label><input type="radio" value="0"/></li>
                                    <li><label for="rating_4" style="color:white;"><i class="fa fa-star" aria-hidden="true"></i></label><input type="radio" value="0"/></li>
                                </ul>';
                                }?>
                        <br> <br>
                        <button type="button" class="btn btn-primary">Delete</button>
                        <button type="button" class="btn btn-primary">Edit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
                                }
                                    }
                                    }
                                    }
                                    } else {
                                        //    redirect to home page
                                    }
                                    ?>
                                </div>
                    <?php
                    if(isset($_SESSION["username"])) {
                        //History
                        $user_id = $_SESSION["uid"];
                        $check_history = " user_id = '" . $user_id . "' ";
                        $user_history = $selector->select_with_fetch("user_views", $check_history);
                        ?>
                        <div class="container">
                            <div class="row" style="margin: auto;">
                                <div class="a col-xs-6 col-sm-6 col-md-12"
                                     style="background-color: rgba(154, 154, 154, 0.5)"><br>

                                    <div class="a col-xs-6 col-sm-6 col-md-6">
                                        <div class="well well-sm">
                                            <div class="row" style="margin: auto;">
                                                <?php echo "<table><tr><td style='font-weight: bolder'>Services visited</td><td style='font-weight: bolder'> Date Visited & Time</td></tr>";
                                                foreach ($user_history as $this_service) {
                                                    $service_details = $selector->select_with_fetch("services", "id ='" . $this_service['service_visited'] . "'");
                                                    $sv = $this_service['service_visited'];
                                                    $service_name = $service_details[0]["service_name"];
                                                    echo "<tr>
                                                        <td>you visited <a  href='view_services.php?service=$sv'>" . $service_name . "</a></td>
                                                        <td>" . $this_service["time_visited"] . "</td>
                                                    </tr>";
                                                }
                                                echo "</table>"; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="a col-xs-4 col-sm-6 col-md-6">
                                        <div class="well well-sm">
                                            <div class="row">

                                            </div>

                                        </div>
                                        <?php
                                        if (isset($_SESSION['level'])) {
                                            if ($_SESSION['level'] > 3) {
                                                ?>
                                                <a href="add_testimonial.php" class="addtest btn btn-blue btn-effect">Write us a
                                                    testimonial</a>
                                                <a href="add_services_new.php" class="btn btn-blue btn-effect">Add Services</a>
                                            <?php } elseif ($_SESSION['level'] == 3) { ?>
                                                <a href="add_services_new.php" class="btn btn-blue btn-effect">Add Services</a>
                                            <?php } else {
                                                ?>
                                                <a href="add_services_new.php" class="btn btn-blue btn-effect">Add Services</a>
                                            <?php }
                                            ?>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                        </div><br>
                <div class="row text-center">

                    <?php }?> </div>
           <br>

            </main>
<?php
include("includes/footer.php"); ?>


