


<?php
include("includes/header2.php");?>


<br><br><br><br><br><br>
<section>
    <br><br><br><br><br>

<div id="demo"></div>
    <br><br><br><br><br><br><br><br>
    <a href="index.php" class="text-center">back to home page</a>

</section>
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

            var client = new HttpClient();
            client.get(location_url, function (response) {
                var location_array = $.parseJSON(response);
                var my_location = location_array.results[0]["address_components"][2]["long_name"];//

//                alert("your location is " + my_location);
                $.ajax({
                    type: "POST",
                    url: "search_location.php",
                    data: "location=" + my_location,
                    success: function (data) {
                        var loc = $.parseJSON(data);
                        length = ($.parseJSON(data)).length;
                        var biz_html = "";
                        biz_html = biz_html +"<h3><td>Services in </td>"+ my_location +"</h3><table class='maintable' id='maintable'><thead>" +
                            "<td>Service Name</td>" +
                            "<td>Service Details</td>" +
                            "</thead>";
                        for (var i = 0; i < length; i++) {
                            biz_html = biz_html + "<tr>";
                            biz_html = biz_html + "<td>" + loc[i]["service_name"] + "</td>";
                            biz_html = biz_html + "<td><a href="+"'"+"view_services.php?service="+loc[i]["id"]+"'>" + loc[i]["details"] + "</a></td>";
                            biz_html = biz_html + "</tr>";
                        }

                        var tabledata = encodeURI(biz_html);
                        var table_url = "table-tester.php?table="+tabledata;
                        $("#demo").load(table_url);

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
//var demo_value = $("#demo").html();
    });
</script>

<script>
    $(document).ready(function() {
        $('#maintable').DataTable({
                responsive: true
            }
        );
    });
</script>
<?php
include("includes/footer.php");?>
