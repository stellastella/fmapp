<?php
/**
 * Created by PhpStorm.
 * User: Star
 * Date: 3/7/2017
 * Time: 3:32 PM
 */
@ob_start();
session_start();
require 'PHPMailer-master/PHPMailerAutoload.php';


//var_dump($_POST);


if(!empty($_POST["g-recaptcha-response"])) {
    if(isset($_POST['redirect'])){
        $redirect_url = urlencode($_POST['redirect']);

    }else{
        $redirect_url = urlencode('index.html');
    }
    $email = $_POST['email'];
    $password = $_POST['password'];
    $con_password = $_POST['con_password'];
    $full_name = $_POST['full_name'];
    $address = $_POST['address'];
    $area = $_POST['area'];
    $state = $_POST['state'];
    $local_govt = $_POST['local_govt'];
    $user_type = $_POST['user_type'];
    $organization = $_POST['organization'];
    $contact_person = $_POST['contact_person'];
    $website = $_POST['website'];
    $country_code = $_POST['country_code'];
    $phone_number = $_POST['phone_number'];
   // $token = $_POST['code'];

    $con = new mysqli("localhost", "root", "");
    $con->select_db('qfm');


    if ($password == $con_password) {
//        $sel = "SELECT * FROM user WHERE email = '$email'";
//        $sel_query = mysqli_query($con, $sel);
//        if (mysqli_num_rows($sel_query) > 0) {
//            echo "email taken";
//        } else {
    $enc_password = md5($password);
        $token = md5( rand(500,1000000) );
        $table = 'user';
        $query_string = "INSERT INTO " . $table . " (email, password, full_name, address,  area, state, local_govt, user_type, organization, contact_person, website, country_code, phone_number, token) VALUES
    ('" . $email . "','" . $enc_password . "','" . $full_name . "','" . $address . "','" . $area . "','" . $state . "','" . $local_govt . "','" . $user_type . "','" . $organization . "','" . $contact_person . "','" . $website . "','" . $country_code . "','" . $phone_number . "','" . $token . "')";
   // to display entries
    //    echo $query_string;
        $queryit = mysqli_query($con,$query_string);
        if ($queryit) {
            $status = "success";
            // Return Success - Valid Email
//            $msg = 'Your account has been made, <br /> please verify it by clicking the activation link that has been send to your email.';
//            //for sending a mail


            $mail = new PHPMailer;


//$mail->SMTPDebug = 3;                               // Enable verbose debug output

            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'angelsnilda05@gmail.com';                 // SMTP username
            $mail->Password = 'christein';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            $mail->setFrom('angelsnilda05@gmail.com','Qfm');
//$mail->addAddress('ijeeglo@gmail.com', 'Ijey');     // Add a recipient
            $mail->addAddress($email, $full_name);               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
            $mail->isHTML(true);                                  // Set email format to HTML

            $mail->Subject = 'Qfm Verification';
            $mail->Body    = 'Please verify your account... see the link below<a href="http://localhost/qfm-ng/verification.php?email='.$email.'&token='.$token.'&r='.$redirect_url.';">LINK TO YOUR PAGE</a>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            if(!$mail->send()){
                $mail->Port = 25;
                if (!$mail->send()) {
                    echo "Mailer Error: " . $mail->ErrorInfo;
                }else{
                    echo "Message sent!";
                }

            }else{
                echo "A message has been sent to your email address. Please verify your account!";
            }

        } else {
            $status = "failed";
        }
    }

}else{
    $status = "Error Validating Captcha";
}

echo $status;
































//$to      = $email; // Send email to our user
//$subject = 'Signup | Verification'; // Give the email a subject
//$message = '
//
//Thanks for signing up!
//Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
//
//------------------------
//Username: '.$email.'
//Password: '.$password.'
//------------------------
//
//Please click this link to activate your account:
//localhost/qfm/index.html/verification.php?email='.$email.'&token='.$token.'
//
//'; // Our message above including the link
//
//$headers = 'From:noreply@localhost/qfm/index.html' . "\r\n"; // Set from headers
//mail($to, $subject, $message, $headers); // Send our email





//header("location:dashboard.php?status=".$status);























//if(isset($_POST["username"]) && isset($_POST["password"])){
//    $email = $_POST["email"];
//    $password = $_POST["password"];
//    $confirm_password = $_POST['confirm_password'];
//    $full_name = $_POST['full_name'];
//    $location = $_POST['location'];
//    $phone = $_POST['phone'];
//    $insert_user = $insertor->insert_it("user","email ='".$username."' AND password ='".$password."'");
//    if(!empty($insert_user)){
//        echo "100";
//        $_SESSION["username"] = $insert_user[0]["email"];
//        $_SESSION["level"] = $insert_user[0]["level"];
//
//    }else{
//        echo "User details not valid";
//    }

//}else{
//    echo "No Value was sent";
//}
//
//?>
<!---->
































<?php
//@ob_start();
//session_start();
//
//
//include 'bin/db_config.php';
//include 'bin/selector.php';
//include 'bin/insertor.php';
//include('bin/instantiate_objects.php');
//
//
//
//if(isset($_POST['sign_up'])){
//    $err = 0;
//
//    $email = $_POST['email'];
//    $password = $_POST['password'];
//    $confirm_password = $_POST['confirm_password'];
//    $full_name = $_POST['full_name'];
//    $location = $_POST['location'];
//    $phone_no = $_POST['phone_no'];
//    if($password == $confirm_password) {
//        $sel = "SELECT * FROM user WHERE email = '$username'";
//        $sel_query = mysqli_query($connection, $sel);
//        if(mysqli_num_rows($sel_query) > 0){
//            $err = 2;
//        }else{
//            if(!empty($email) && !empty($password) ){
//                $enc_password = md5($password);
//                $sel2 = "INSERT INTO user(email, password) VALUES ('$email', '$enc_password','$sex')";
//                $sel_query2 = mysqli_query($connection, $sel2);
//                ?>
<!--                --><?php
//
//                echo "inserted";
//
//            }else{
//                $err = 3;
//            }
//        }
//
//    }
//    else{
//        $err = 1;
//    }
//
//    if($err > 0){
//        header("location:index.html?err=".$err);
//    }
//}
//else{
//    header("location: dashboard_form.php");
//}
//?>