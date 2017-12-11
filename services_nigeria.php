<?php
include("includes/header.php");?>

<main class="site-content" role="main">

    <section id="about" >
        <div class="container">
            <div class="row">
                <div class="col-md-4 wow animated fadeInLeft">
                    <div class="recent-works">

                    </div>
                </div>
                <div class="col-md-7 col-md-offset-1 wow animated fadeInRight">
                    <div class="welcome-block">
                        <br><br><br><br>
                        <h3>Search Result</h3>
                        <?php

                        $location = "Nigeria";

                        echo "<br/>";

                        $find3 = mysqli_query($conn, "SELECT * FROM services WHERE country LIKE '$location'");
                        if (($find3->num_rows) > 0) {
                            while ($row3 = mysqli_fetch_assoc($find3)) {
                                $service_name = $row3['service_name'];
                                $service_id = $row3['id'];
                                $keywords = $row3['keywords'];
                                echo "<a href='view_services.php?service=".$service_id."'style='color:white'>".$service_name."</a></br >";
                            }
                        } else {
                            echo "No results found for $location";
                        }
                        ?>
                        <br><br><br><br>
                        <br><br><br><br>
                        <div class="center">
                            <a href="index.php" style="color:white">back to home page</a>
                        </div>
                    </div>
                </div>
            </div>

    </section>

</main>
<?php
include("includes/footer.php");   ?>


