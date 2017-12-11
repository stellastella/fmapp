<?php

include("includes/header3.php");
if(isset($_POST['update']))
{
$id = $_POST['id'];
$cat_name=$_POST['cat_name'];
$table = 'categories';

// checking empty fields
if(empty($cat_name)) {
} else {
//updating the table
$result = mysqli_query($conn, "UPDATE $table SET cat_name='$cat_name' WHERE id=$id");

//redirectig to the display page. In our case, it is index.php
header("Location: admin_category.php");
}
}
?>
<?php
//getting id from url
$id = $_GET['id'];
$table = 'categories';
$cat_name = $_GET['cat_name'];
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM $table WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
    $cat_name = $res['cat_name'];
}
?>
<html>
<head>
    <title>Edit Category</title>
</head>

<body>
<br/><br/>
<a href="admin.php">Back to Admin</a>
<br/><br/>

<form name="form1" method="post" action="edit_category.php">
    <table border="0">
        <tr>
            <td>Category Name</td>
            <td><input type="text" name="cat_name" value="<?php echo $cat_name;?>"></td>
        </tr>
        <tr>
            <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
            <td><input type="submit" name="update" value="Update"></td>
        </tr>
    </table>
</form>
</body>

<?php //include("includes/footer.php");?>






































<?php
//include("includes/header3.php");
//require 'PHPMailer-master/PHPMailerAutoload.php';
//
//if(isset($_SESSION['level'])) {
//    if ($_SESSION['level'] > 3) { ?>
<!---->
<!--        <style>-->
<!--            main {-->
<!--                background-image: url('./img/slider/pexels-photo-345123.jpeg');-->
<!--                background-position: center;-->
<!--                background-repeat: no-repeat;-->
<!--                background-size: cover;-->
<!--                /*width:100%;*/-->
<!--            }-->
<!--        </style>-->
<!---->
<!--        --><?php
//
//        if (isset($_GET["i"])) {
//            $cid = mysqli_real_escape_string($conn, $_GET["i"]);
////        $cat_name = $_GET['cat_name'];
//            $con = new mysqli("localhost", "root", "");
//            $con->select_db('qfm');
//
//            $cat_name = $_GET['cat_name'];
////        $services = $selector->select_with_fetch("services"," category_id = ".$cid);
//            $category_details = $selector->select_with_fetch("categories", " id = " . $cid);
//            $categories = $selector->select_with_fetch("categories");
////        $services_in_categories = $selector->select_with_fetch_count("services","category_id= ".$cid);
//
//            $table = $categories;
//            $query_string = "UPDATE .$table SET cat_name='cat_name' WHERE id = ' . $cid'";
//            $queryit = mysqli_query($con, $query_string);
//
//            if ($queryit) {
//                $status = "success";
//
//
//                $mail = new PHPMailer;
//
//                $mail->isSMTP();                                      // Set mailer to use SMTP
//                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
//                $mail->SMTPAuth = true;                               // Enable SMTP authentication
//                $mail->Username = 'angelsnilda05@gmail.com';                 // SMTP username
//                $mail->Password = 'christein';                           // SMTP password
//                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
//                $mail->Port = 587;                                    // TCP port to connect to
//
//                $mail->setFrom($email, '@FMAfrica');
//                $mail->addAddress($mail);               // Name is optional
//
//                $mail->isHTML(true);                                  // Set email format to HTML
//
//                $mail->Subject = $subject;
//                $mail->Body = $cat_name . ' has been deleted';
//                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
//
//                if (!$mail->send()) {
//                    $mail->Port = 25;
//                    if (!$mail->send()) {
//                        echo "Mailer Error: " . $mail->ErrorInfo;
//                    } else {
//                        echo "edited!";
//                    }
//
//                } else {
//                    echo "edited";
//                }
//                echo "edited!";
//            } else {
////            header('location:index.php');
//            }
//        }
//
//        ?>
<!--        <main>-->
<!--        <div class="body" style="background-color: rgba(0, 0, 0, 0.68)">-->
<!--        --><?php
//        if (isset($_SESSION["uid"])) {
//            $user_id = $_SESSION["uid"];
//            ?>
<!---->
<!--            --><?php
//            $all_categories = $selector->select_with_fetch("categories");
//            ?>
<!---->
<!--            <div class="container">-->
<!--                <div class="row">-->
<!--                    <form class="login_form" action="delete_category.php?=id--><?php //$_GET["i"];?><!--"  method="POST" enctype="multipart/form-data" id="categories">-->
<!---->
<!--                        <br><h4 style="color:white">select Category</h4>-->
<!--                        <select name="category_id" style="color:red">-->
<!--                            --><?php
//
//                            foreach ($all_categories as $this_category) {
//                                echo '<option value="' . $this_category["id"] . '">' . $this_category["cat_name"] . '</option>';
//                            }
//
//                            ?>
<!--                        </select>-->
<!---->
<!--                        <!--        <input placeholder="category" name="cat_name" type="text" />-->
<!--                        <input type="submit" name="edit_category" value="edit_category"/>-->
<!--                    </form>-->
<!--                    <br></div>-->
<!--            </div>-->
<!--            </div>-->
<!--            </main>-->
<!---->
<!--            --><?php
//        }
//    } else {
////        header("location:index.php");
//    }
//}
//
//?>
<?php
//
//
//
//include("includes/footer.php");
//
//?>
