<style>
        main{
            background-image: url('./img/slider/pexels-photo-345123.jpeg');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            /*width:100%;*/
        }
</style>

<?php
include("includes/header3.php");
?>
<main>
<div class="body" style="background-color: rgba(0, 0, 0, 0.68)">
<?php
if(isset($_SESSION["uid"])) {
    $user_id = $_SESSION["uid"];
    ?>


    <?php
    $all_categories = $selector->select_with_fetch("categories");
    $select_businesses = $selector->select_with_fetch("business_owners", "user_id=" . $user_id);
    ?>

  <div class="container">
            <div class="row">
                <h3 class="text-center" style="color:white">Please Fill in To Add Your Services</h3>
    <form class="login_form" action="add_service.php" method="POST" enctype="multipart/form-data" id="services">
        <input placeholder="enter your service name" name="service_name" id="service_name" type="text"/>
        <input placeholder="details" id="details" name="details" type="text"/>
        <input placeholder="keywords" name="keywords" type="text"/>
        <!-- Select business -->
        <br><h4 style="color:White">select Business</h4>
        <select name="business_id" style="color:red">
            <?php

            foreach ($select_businesses as $this_business) {
                echo '<option value="' . $this_business['id'] . '">' . $this_business['business_name'] . '</option>';
            }

            ?>
        </select>

        <br><h4 style="color:white">select Category</h4>
        <select name="category_id" style="color:red">
            <?php

            foreach ($all_categories as $this_category) {
                echo '<option value="' . $this_category["id"] . '">' . $this_category["cat_name"] . '</option>';
            }

            ?>
        </select>
        <!--        <input placeholder="category" name="cat_name" type="text" />-->
        <input type="file" name="service_image" value="service_image" style="color:white;">
        <input type="submit" name="add_service" value="Add Service"/>
    </form>
            <br></div>
    </div>
</div>
</main>
    <?php



    include("includes/footer.php");

}
?>