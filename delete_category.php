<?php
include("includes/header3.php");


if(isset($_SESSION['level'])) {
    if ($_SESSION['level'] > 3) {

        $id = $_GET['id'];
        $table = 'categories';
        //deleting the row from table
        $result = mysqli_query($conn, "DELETE FROM $table WHERE id=$id");

        //redirecting to the display page (index.php in our case)
        header("Location:admin.php");
            }
    }
?>
<?php
include("includes/footer.php");
?>
