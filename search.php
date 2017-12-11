<!---->
<!--<script src="js/jquery-1.11.1.min.js"></script>-->
<!---->
<!--<script>-->
<!--    (function ($) {-->
<!--        jQuery.expr[':'].Contains = function(a,i,m){-->
<!--            return (a.textContent || a.innerText || "").toUpperCase().indexOf(m[3].toUpperCase())>=0;-->
<!--        };-->
<!---->
<!--        function listFilter(header, list) {-->
<!--            var form = $("<form>").attr({"class":"filterform","action":"#"}),-->
<!--                input = $("<input>").attr({"class":"filterinput","type":"text"});-->
<!--            $(form).append(input).appendTo(header);-->
<!---->
<!--            $(input)-->
<!--                .change( function () {-->
<!--                    var filter = $(this).val();-->
<!--                    if(filter) {-->
<!--                        $(list).find("a:not(:Contains(" + filter + "))").parent().slideUp();-->
<!--                        $(list).find("a:Contains(" + filter + ")").parent().slideDown();-->
<!--                    } else {-->
<!--                        $(list).find("li").slideDown();-->
<!--                    }-->
<!--                    return false;-->
<!--                })-->
<!--                .keyup( function () {-->
<!--                    $(this).change();-->
<!--                });-->
<!--        }-->
<!---->
<!--        $(function () {-->
<!--            listFilter($("#header"), $("#list"));-->
<!--        });-->
<!--    }(jQuery));-->
<!--</script>-->

<?php
include("includes/header.php");?>
<main class="site-content" role="main">

    <section id="about" >
        <div class="container">
            <div class="row center-block">
                <div class="col-md-4 wow animated fadeInLeft">

                </div>
                <div class="col-md-6 wow animated fadeInRight">
                    <div class="welcome-block">
                       <br><br><br><br>

                        <h1 id="header"></h1>
                        <?php
//                if(isset($_SESSION["username"])){

                        if(isset($_GET["searchterm"])) {

                        $search = mysqli_real_escape_string($conn, trim($_GET['searchterm']));

                            echo "<br/>";

                        $find3 = mysqli_query($conn, "SELECT * FROM services WHERE service_name LIKE '%$search%' || keywords LIKE '%$search%' || location LIKE '%$search%' || details LIKE '%$search%'");
                            $row_num= mysqli_num_rows($find3);
                            echo " <h3> $row_num Search Results found</h3> </br> </br>";
                            if (($find3->num_rows) > 0) {

                               ?>
                            <table id="maintable" class="maintable">

                            <thead>
                            <td> Service Name</td>
                            <td> Service Details</td>
                            </thead>
                                <?php
                            while ($row3 = mysqli_fetch_assoc($find3)) {
                            $service_name = $row3['service_name'];
                            $service_details = $row3['details'];
                            $service_id = $row3['id'];
                            $keywords = $row3['keywords'];?>

                           <?php
//                                echo '<div id="wrap"><ul id="list">'. "<li id='list'><a href='view_services.php?service=".$service_id."'style='color:black'>".$service_name." ".$service_details."</a></br ></li>".'</div>';

                                echo "<tr>
                                <td><a href='view_services.php?service=".$service_id."'style='color:black'>".$service_name."</td>
                                <td style='color:green'>".$service_details."</td>
                                </tr>";

                            }
                            echo "</table>";
                        } else {
                        echo "No Entry found with the search - " . $_GET["searchterm"];
                        }
                        }else{

                        }
                        ?>
                       <br><br><br><br>   <?php
//                        if(isset($_SESSION["username"])){
//
//                            echo '<a href="all_services.php" class="btn btn-blue btn-effect">All Services</a><br>';
//                        }else {
//                            ?>
<!--                            <a href="#signup_popup" class="btn btn-blue btn-effect">Join US</a>-->
<!--                            --><?php
//                        }
//                    }else {
//                    echo '<a href="index.html#error_popup" class="btn btn-blue btn-effect"> Join US</a> or <a href="index.html#error_popup" class="btn btn-blue btn-effect">Login</a> ';
//                     header("Location:index.php");
                        echo"please sign in to view more";
//                }
                 ?>
                        <div class="center">
                        <a href="index.php" style="color:white">back to home page</a>
                      </div>
                    </div>
                </div>
            </div>
    </section>

</main>

<script>
    $(document).ready(function() {
        $('#maintable').DataTable({
                responsive: true
            }
        );
    });
</script>
<?php
include("includes/footer.php");   ?>


































<!---->
<?php
//include("includes/header.php");?>
<!--<!--End Fixed Navigation-->-->
<!--<!--==================================== -->-->
<!---->
<!--<main class="site-content" role="main">-->
<!---->
<!--    <!---->
<!--    Home Slider-->
<!--    ==================================== -->-->
<!---->
<!---->
<!--    <!-- about section -->-->
<!--    <section id="about" >-->
<!--        <div class="container">-->
<!--            <div class="row">-->
<!--                <div class="col-md-4 wow animated fadeInLeft">-->
<!--                    <div class="recent-works">-->
<!---->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-md-7 col-md-offset-1 wow animated fadeInRight">-->
<!--                    <div class="welcome-block">-->
<!--                        <br><br><br><br>-->
<!--                        <h3>Search Result</h3>-->
<!--                        --><?php
//                        //if(isset($_POST['search'])){
//
//                        //    $business_name = mysqli_escape_string($conn, $_GET['business_name']); // Set business_name variable
//                        if(isset($_SESSION["username"])){
//
//                            if(isset($_GET["searchterm"])) {
//                                $search = mysqli_real_escape_string($conn, trim($_GET['searchterm']));
//                                //        echo "<br/>---------------BUsiness Owners------------------<br/>";
//                                //        $find = mysqli_query($conn, "SELECT * FROM business_owners WHERE business_name LIKE '%$search%'");
//                                //        if (($find->num_rows) > 0) {
//                                //            while ($row = mysqli_fetch_assoc($find)) {
//                                //                $business_name = $row['business_name'];
//                                //                echo "$business_name</br >";
//                                //            }
//                                //        } else {
//                                //            echo "No Entry found with the search - " . $_GET["searchterm"];
//                                //        }
//                                //
////
////                                    echo "<br/>---------------location------------------<br/>";
////                            $find = mysqli_query($conn, "SELECT * FROM business_owners WHERE location LIKE '%$search%'");
////                                    if (($find->num_rows) > 0) {
////                                        while ($row = mysqli_fetch_assoc($find)) {
////                                            $business_name = $row['business_name'];
////                                            echo "$business_name</br >";
////                                        }
////                                    } else {
////                                        echo "No Entry found with the search - " . $_GET["searchterm"];
////                                    }
//
//                                //        echo "<br/>---------------Categories------------------<br/>";
//                                //        $find2 = mysqli_query($conn, "SELECT * FROM categories WHERE cat_name LIKE '%$search%'");
//                                //        if (($find2->num_rows) > 0) {
//                                //            while ($row2 = mysqli_fetch_assoc($find2)) {
//                                //                $cat_name = $row2['cat_name'];
//                                //                echo "$cat_name</br >";
//                                //            }
//                                //        } else {
//                                //            echo "No Entry found with the search - " . $_GET["searchterm"];
//                                //        }
//
////                        echo "<br/>---------------Services------------------<br/>";
//                                echo "<br/>";
//                                $find3 = mysqli_query($conn, "SELECT * FROM services WHERE service_name LIKE '%$search%' || keywords LIKE '%$search%' || location LIKE '%$search%' || details LIKE '%$search%'");
//                                if (($find3->num_rows) > 0) {
//                                    while ($row3 = mysqli_fetch_assoc($find3)) {
//                                        $service_name = $row3['service_name'];
//                                        $service_id = $row3['id'];
//                                        $keywords = $row3['keywords'];
//                                        echo "<a href='view_services.php?service=".$service_id."'style='color:white'>".$service_name."</a></br >";
//
//                                    }
//                                } else {
//                                    echo "No Entry found with the search - " . $_GET["searchterm"];
//                                }
//                            }else{
//
//                            }
//                            ?>
<!--                            <br><br><br><br>   --><?php
////                        if(isset($_SESSION["username"])){
////
////                            echo '<a href="all_services.php" class="btn btn-blue btn-effect">All Services</a><br>';
////                        }else {
////                            ?>
<!--                            <!--                            <a href="#signup_popup" class="btn btn-blue btn-effect">Join US</a>-->-->
<!--                            <!--                            -->--><?php
////                        }
//                        }else {
////                    echo '<a href="index.html#error_popup" class="btn btn-blue btn-effect"> Join US</a> or <a href="index.html#error_popup" class="btn btn-blue btn-effect">Login</a> ';
//                            header("Location:index.html#error_popup");
//                            echo"please sign in";
//                        }
//                        //                        ?>
<!--                        <div class="center">-->
<!--                            <a href="index.html" style="color:white">back to home page</a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--    </section>-->
<!--    <!-- end about section -->-->
<!---->
<!---->
<!--</main>-->
<?php
//include("includes/footer.php");   ?>


