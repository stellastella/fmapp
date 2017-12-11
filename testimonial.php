<?php
@ob_start();
session_start();
require 'PHPMailer-master/PHPMailerAutoload.php';

if(isset($_POST["message"])) {
    $recipient = "angelsnilda05@gmail.com"; //Enter your mail address;
    $senderEmail = $_POST["email"];
    $message = $_POST["message"];
    mail($recipient, $message);
    sleep(1);
    echo "Your testimonial has been sent for review";
    header("Location:profile.php"); // Set here redirect page or destination page

    $mail = new PHPMailer;

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'angelsnilda05@gmail.com';                 // SMTP username
    $mail->Password = 'christein';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    $mail->setFrom('angelsnilda05@gmail.com', 'Qfm');
//$mail->addAddress('ijeeglo@gmail.com', 'Ijey');     // Add a recipient
    $mail->addAddress('angelsnilda05@gmail.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Qfm Testimonial Notification';
    $mail->Body = $message;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if (!$mail->send()) {
        $mail->Port = 25;
        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo "Message sent!";
        }}

    } else {
        echo "Your testimonial has been sent for review";
    }

