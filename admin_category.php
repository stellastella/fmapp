<?php
/**
 * Created by PhpStorm.
 * User: Star
 * Date: 3/7/2017
 * Time: 3:32 PM
 */

include("includes/header3.php");
//
////var_dump($_POST);
//
//$msg= "";
//
//if(isset($_POST['add_category'])) {
//
//    $cat_name = $_POST['cat_name'];
//
//
//    if ($level = 3) {
//        $table = 'categories';
//        $query_string = "INSERT INTO " . $table . " (cat_name) VALUES
//    ('" . $cat_name . "')";
//
//        $select = $selector->select_with_fetch("categories"," cat_name='".$cat_name."'");
//
//
//
//            $queryit = mysqli_query($conn,$query_string);
//
//            if ($queryit) {
//                $msg = "success";
//                $msg= " entries uploaded successfully";
//                header("Location: http://localhost/qfm-ng/admin.php");
//            }else {
//                $msg= "There was a problem";
//            }
//
//    } else {
//        echo "You are not an admin";
//    }
//}else{
//    $msg = "please enter the required fields";
//}
//?>
<!---->
<!---->
<!--<div class="container"><br><br><br><br><br><br><br><br>-->
<!--            <div class="row">-->
<!--                <h3 class="text-center" style="color:Black">Add New Category</h3>-->
<!--    <form class="login_form" action="admin_category.php" method="POST" enctype="multipart/form-data" id="add_category">-->
<!--        <input placeholder="enter category name" name="cat_name" id="cat_name" type="text"/>-->
<!---->
<!--<input type="submit" name="add_category" value="Add Category"/>-->
<!--</form>-->
<!--<br></div>-->
<!--</div>-->
<!--</div>--><br><br><br><br><br><br>
    <a href="add_category.php">Add New Category</a><br/><br/>
    <table width='80%' border=0>
    <tr bgcolor='#CCCCCC'>
        <td>Category Id</td>
        <td>Category name</td>
        <td>Update</td>
    </tr>
   <?php
$table = 'categories';
//var_dump($categories); echo"<br>";
$result = mysqli_query($conn, "SELECT * FROM $table ORDER BY id ASC");
while($res = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>".$res['id']."</td>";
    echo "<td>".$res['cat_name']."</td>";
    echo "<td><a href=\"edit_category.php?id=$res[id]\">Edit</a> | <a href=\"delete_category.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
}



?>