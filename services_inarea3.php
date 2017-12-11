<link rel="stylesheet" type="text/css" href="DataTables-1.10.4/media/css/jquery.dataTables.css">
<script type="text/javascript" language="javascript" src="DataTables-1.10.4/media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="DataTables-1.10.4/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" language="javascript" src="DataTables-1.10.4/extensions/Responsive/js/dataTables.responsive.js"></script>
<script type="text/javascript" language="javascript" src="DataTables-1.10.4/extensions/TableTools/js/dataTables.tableTools.min.js"></script>



<?php
include("includes/header.php");?>

<script>
</script>
<script>

    $(document).ready(function () {


        var location_url;

        function getLocation() {
            alert("allow application to use your location");
            if (navigator.geolocation) {
                navigator.geolocation.watchPosition(showPosition);
            } else {
//                    x.innerHTML = "Geolocation is not supported by this browser.";}
                alert("Geolocation is not supported by this browser.");
            }
        }





        function showPosition(position) {

            var long = position.coords.longitude;
            var lat = position.coords.latitude;
            location_url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=" + lat + "," + long + "&key=AIzaSyDojDDyh9iivU4AFJc_94ZCAVlrEl3QArg";
            $("#demo").html(location_url);

            var client = new HttpClient();
            client.get(location_url, function (response) {
                var location_array = $.parseJSON(response);
                var my_location = location_array.results[0]["address_components"][2]["long_name"];//

                alert("your location is " + my_location);
                $.ajax({
                    type: "POST",
                    url: "search_location.php",
                    data: "location=" + my_location,
                    success: function (data) {
                        var loc = $.parseJSON(data);
                        length = ($.parseJSON(data)).length;
                        console.log(data);
                        var biz_html = "";
                        biz_html = biz_html + "<table class='maintable' id='maintable2'><thead>" +
                            "<td>Service Name</td>" +
                            "<td>Service Details</td>" +
                            "</thead>";
                        for (var i = 0; i < length; i++) {
                            biz_html = biz_html + "<tr>"
                            biz_html = biz_html + "<td>" + loc[i]["service_name"] + "</td>";
                            biz_html = biz_html + "<td>" + loc[i]["details"] + "</td>";
                            biz_html = biz_html + "</tr>";
                        }

                        biz_html = biz_html + "</table>";
                        $("#demo").html(biz_html);

                    }
                });
            });
        }

        var HttpClient = function () {
            this.get = function (aUrl, aCallback) {
                var anHttpRequest = new XMLHttpRequest();
                anHttpRequest.onreadystatechange = function () {
                    if (anHttpRequest.readyState == 4 && anHttpRequest.status == 200)
                        aCallback(anHttpRequest.responseText);
                }

                anHttpRequest.open("GET", aUrl, true);
                anHttpRequest.send(null);
            }
        }
        getLocation();
        var demo_value = $("#demo").html();
    });



</script>
<script>
</script>

    <main class="site-content" role="main">

    <!-- about section -->
    <section id="about" >
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-md-offset-1 wow animated fadeInRight">
                    <div class="welcome-block">
                        <?php


                        if(isset($_SESSION["username"])){ ?>
                            <br><br><br><br>
                        <div class="sec-title text-center">
                            <h2 class="wow animated bounceInLeft">Services In Your Area</h2>
                        </div>
                        <div id="demo"></div>  <?php
                        }else {

                        header("Location:index.html#error_popup");
                        }
                        ?>




                        <table class="maintable" id="maintable">
                            <thead>
                            <td>S/N</td>
                            <td>TITLE</td>
                            <td>DATE</td>
                            <td>TIME</td>
                            <td>DESCRIPTION</td>
                            </thead>
                            <tr>
                                <td>twye</td>
                                <td>wehwe</td>
                                <td>iiewueiwe</td>
                                <td>wehwe</td>
                                <td>ghejw</td>
                            </tr>
                            <tr>
                                <td>hjds</td>
                                <td>dsjh</td>
                                <td>djss</td>
                                <td>dsbjn</td>
                                <td>adebola</td>
                            </tr>

                        </table>

            </div>

    </section>
    <!-- end about section -->

        <script>
            $(document).ready(function() {
                $('#maintable').DataTable({
                        responsive: true
                    }
                );
            });
        </script>

</main>
   <?php

include("includes/footer.php");
?>