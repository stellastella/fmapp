<?php

//var_dump($_POST);

$msg= "";

if(isset($_GET['business_id'])) {

    $business_id = $_GET['business_id'];


    if ($level = 3) {
        $table = 'business_owners';
        $query_string = "DELETE FROM " . $table . " (business_id) VALUES ('" . $business_id . "')";

//        $select = $selector->select_with_fetch("services"," service_name='".$service_name."' AND details='".$details."'
//        AND keywords='".$keywords."' AND category_id='".$category_id."' AND img='".$img."'");

        $queryit = mysqli_query($conn,$query_string);

        if ($queryit) {
            $msg = "success";
            $msg= " entries uploaded successfully";
            header("Location: http://localhost/qfm-ng/admin.php");
        }else {
            $msg= "There was a problem";
        }
    } else {
        echo "You are not signed up as corporate";
    }
}else{
    $msg = "please enter the required fields";
}

?>






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
    $select_businesses = $selector->select_with_fetch("business_owners");
    ?>

    <div class="container">
        <div class="row">
            <form class="login_form" action="delete_business.php" method="POST" enctype="multipart/form-data" id="services">
                <!-- Select business -->
                <br><h4 style="color:White">select business</h4>
                <select name="business_id" style="color:red">
                    <?php

                    foreach ($select_businesses as $this_business) {
                        echo '<option value="' . $this_business['id'] . '">' . $this_business['business_name'] . '</option>';
                    }
                    ?>
                </select>

                <!--        <input placeholder="category" name="cat_name" type="text" />-->
                <input type="submit" name="delete_service" value="delete_service"/>
            </form>
            <br></div>
    </div>
    </div>
    </main>
    <?php



    include("includes/footer.php");

}
?>