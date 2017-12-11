<?php
/**
 * Created by PhpStorm.
 * User: Star
 * Date: 3/7/2017
 * Time: 3:32 PM
 */

include("includes/header3.php");?>

<br><br><br><br><br><br><br><br>
    <a href="admin.php">Back to Admin Page</a>
    <table width='80%' border=0>
        <tr bgcolor='#CCCCCC'>
            <td>Service Id</td>
            <td>Service name</td>
            <td>Update</td>
        </tr>
<?php
$table = 'services';
//var_dump($categories); echo"<br>";
$result = mysqli_query($conn, "SELECT * FROM $table ORDER BY id ASC");
while($res = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>".$res['id']."</td>";
    echo "<td>".$res['service_name']."</td>";
    echo "<td><a href=\"edit_services.php?id=$res[id]\">Edit</a> | <a href=\"delete_services.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
}



?>