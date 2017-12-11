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
    $business_name = $_POST['business_name'];
    $contact_person = $_POST['contact_person'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    $profile_pic = $_POST['profile_pic'];
//    $category = $_POST['cat_name'];
    $details = $_POST['details'];

    $con = new mysqli("localhost", "root", "");
    $con->select_db('qfm');

if ($level = 3) {

        $table = 'business_owners';
        $query_string = "INSERT INTO " . $table . " (business_name, contact_person, phone, email,  description, location, profile_pic) VALUES
    ('" . $business_name . "','" . $contact_person . "','" . $phone . "','" . $email . "','" . $description . "','" . $location . "','" . $profile_pic . "' )";
        $queryit = mysqli_query($con,$query_string);

        if ($queryit) {
            $status = "success";
                   $mail = new PHPMailer;

            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'angelsnilda05@gmail.com';                 // SMTP username
            $mail->Password = 'christein';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            $mail->setFrom('angelsnilda05@gmail.com','qfm');
            //$mail->addAddress('ijeeglo@gmail.com', 'Ijey');     // Add a recipient
            $mail->addAddress($email, $full_name1   );               // Name is optional
            $mail->Subject = 'Business added';
            $mail->Body    = 'business added by'. " " .($full_name);
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            if(!$mail->send()) {
                $mail->Port = 25;
                if (!$mail->send()) {
                    echo "Mailer Error: " . $mail->ErrorInfo;
                }else{
                    echo "Message sent!";
                }

            }else{
                echo "your business has been added";
                header("Location: http://localhost/qfm-ng/index.html");
            }

        } else {
            $status = "failed";
        }
echo "please sign up as corporate";}

echo $status;

