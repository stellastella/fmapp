<?php
//include("includes/header3.php");
//
//
//if(isset($_POST['update']))
//{
//$id_service = $_POST['id'];
//
//$service_name=$_POST['service_name'];
////$details=$_POST['details'];
////$keywords=$_POST['keywords'];
//
//// checking empty fields
//if(empty($service_name) ) {
//echo "<font color='red'>Name field is empty.</font><br/>";
//} else {
////updating the table
//$result = mysqli_query($conn, "UPDATE services SET service_name='$service_name' WHERE id=$service_id");
//
////redirectig to the display page. In our case, it is index.php
//header("Location: admin.php");
//}
//}
//?>
<?php
////getting id from url
//$service_id = $_GET['id'];
//$service_name = $_GET['service_name'];
////$details = $_GET['details'];
////$keywords = $_GET['keywords'];
////selecting data associated with this particular id
//$result = mysqli_query($conn, "SELECT * FROM services WHERE id=$service_id");
//
//while($res = mysqli_fetch_array($result))
//{
//    $service_name = $res['service_name'];
//    $details = $res['details'];
//    $keywords = $res['keywords'];
//}
//?>
<!--<html>-->
<!--<head>-->
<!--    <title>Edit Data</title>-->
<!--</head>-->
<!---->
<!--<body><br><br><br><br><br><br><br><br>-->
<!--<a href="index.php">Home</a>-->
<!--<br/><br/><br><br><br><br><br><br><br><br><br><br>-->
<!---->
<!--<form name="form" method="post" action="edit_services.php">-->
<!--    <table border="0">-->
<!--        <tr>-->
<!--            <td>Name</td>-->
<!--            <td><input type="text" name="service_name" value="--><?php //echo $service_name;?><!--"></td>-->
<!--        </tr>-->
<!---->
<!--        <tr>-->
<!--            <td><input type="hidden" name="id" value=--><?php //echo $_GET['id'];?><!--></td>-->
<!--            <td><input type="submit" name="update" value="Update"></td>-->
<!--        </tr>-->
<!--    </table>-->
<!--</form>-->
<!--</body>-->
<!--</html>-->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<?php //include("includes/footer.php");?>
<!---->

















<?php
include("includes/header3.php");
//include("includes/header3.php");

echo "adebola oyenuga1";
if (isset($_POST['update'])) {
    $service_id = $_POST['id'];
    $service_name = $_POST['service_name'];
    $details = $_POST['details'];
    $keywords = $_POST['keywords'];
    $location = $_POST['location'];
    $country = $_POST['country'];
//    $img = $_POST['img'];
    $priority = $_POST['priority'];

    $table = 'services';

// checking empty fields
    if (empty($service_name) || empty($details) ||
        empty($keywords) || empty($location) || empty($country)
    ) {
        if (empty($service_name)) {
            echo "<font color='red'>service_name field is empty.</font><br/>";
        }
        if (empty($details)) {
            echo "<font color='red'>details field is empty.</font><br/>";
        }
        if (empty($keywords)) {
            echo "<font color='red'>keywords field is empty.</font><br/>";
        }
        if (empty($location)) {
            echo "<font color='red'>location field is empty.</font><br/>";
        }
        if (empty($country)) {
            echo "<font color='red'>country field is empty.</font><br/>";
        }

    } else {
//updating the table



        if (empty($priority)) {
            $priority = 0;
        }

        $update_string = "UPDATE $table SET
        service_name='$service_name',
        details='$details',
        keywords='$keywords',
        location='$location',
        country='$country',
        priority='$priority'
        WHERE id='$service_id'";



        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";




        echo $update_string;

        $result = mysqli_query($conn, $update_string);


//redirectig to the display page. In our case, it is index.php
        header("Location: admin_services.php");
    }
}
?>
<?php
if(isset($_GET["id"])){

//getting id from url

$service_id = $_GET['id'];

$table = 'services';
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM $table WHERE id=$service_id");

while ($res = mysqli_fetch_array($result)) {
    $service_id = $res['id'];
    $service_name = $res['service_name'];
    $details = $res['details'];
    $keywords = $res['keywords'];
    $location = $res['location'];
    $country = $res['country'];
    $priority = $res['priority'];
}
?>
<br><br><br>
<html>
<head>
    <title>Edit Category</title>
</head>

<body><br><br><br><br><br><br>
<br/><br/>
<a href="admin.php">Back to Admin Page</a>
<br/><br/>

<form name="form1" method="post" action="edit_services.php">
    <table border="0">


        <tr>
            <td>service_name</td>
            <td><input type="text" name="service_name" value="<?php echo $service_name; ?>"></td>
        </tr>
        <tr>
            <td>details</td>
            <td><input type="text" name="details" value="<?php echo $details; ?>"></td>
        </tr>
        <tr>
            <td>keywords</td>
            <td><input type="text" name="keywords" value="<?php echo $keywords; ?>"></td>
        </tr>
        <tr>
            <td>location</td>
            <td><input type="text" name="location" value="<?php echo $location; ?>"></td>
        </tr>
        <tr>
            <td>country</td>
            <td><input type="text" name="country" value="<?php echo $country; ?>"></td>
        </tr>
        <tr>
            <td>priority</td>
            <td><input type="text" name="priority" value="<?php echo $priority; ?>"></td>
        </tr>
        <tr>
            <td><input type="hidden" name="id" value=<?php echo $service_id; ?></td>
            <td><input type="submit" name="update" value="Update"></td>
        </tr>
    </table>
</form>
</body>

<?php
}else{

}

?>




































