<?php

@ob_start();
session_start();
require 'PHPMailer-master/PHPMailerAutoload.php';


//    $to = $_POST[''];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $name = $_POST['name'];
    $email = $_POST['email']; // Sender's Email
// Message lines should not exceed 70 characters (PHP rule), so wrap it
    $message = $_POST['message'];

            $mail = new PHPMailer;


//$mail->SMTPDebug = 3;                               // Enable verbose debug output

            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'angelsnilda05@gmail.com';                 // SMTP username
            $mail->Password = 'christein';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            $mail->setFrom($email,'@FMAfrica');
//$mail->addAddress('ijeeglo@gmail.com', 'Ijey');     // Add a recipient
            $mail->addAddress($email, $name);               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
            $mail->isHTML(true);                                  // Set email format to HTML

            $mail->Subject = $subject;
            $mail->Body    = $name . ' just sent a message <p>' . $message .'</p><br><br> To send a reply to '.$name .', email to ' .$email;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            if(!$mail->send()){
                $mail->Port = 25;
                if (!$mail->send()) {
                    echo "Mailer Error: " . $mail->ErrorInfo;
                }else{
                    echo "Your Message has been sent!";
                }

            }else{
                echo "Your Message has been sent!";
            }


//echo $status;

