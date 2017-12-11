<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="styles/form_style.css">
<?php
include("includes/header.php");
require 'PHPMailer-master/PHPMailerAutoload.php';

?>

<main class="site-content" role="main">
    <section id="about" >

        <br><br><br><br>
        <div class="container">
            <div class="row">
                <div class="">
                    <br><br><br><br>
                    <div class="mssg">

                        <?php
if(isset($_POST['email']))
{
    if (!empty($_POST['email']))
    {
            // Verify data
            $email = mysqli_escape_string($conn, $_POST['email']); // Set email variable
            $select = $selector->select_with_fetch("user", " email='" . $email . "'");
                            //for sending a mail
        if(isset($select[0]["email"]))
        {

            $token = $select[0]["token"];// Set token variable
            $token = mysqli_escape_string($conn, $token);


            $mail = new PHPMailer;
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'angelsnilda05@gmail.com';                 // SMTP username
            $mail->Password = 'christein';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            $mail->setFrom('angelsnilda05@gmail.com', 'Qfm');
            $mail->addAddress($email, $email);               // Name is optional
            $mail->isHTML(true);                                  // Set email format to HTML

            $mail->Subject = 'Password Reset';
            $mail_body = 'You requested a link to change your password. You can do this through the link below.

            <a href="http://localhost/qfm-ng/reset.php?email='.$email.'&token='.$token.'";>Change my password</a><br/>

            If you did not request this, please ignore this email.

            Your password will not change until you access the link above and create a new one.';

            $mail->Body = $mail_body;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                if (!$mail->send()) {
                    $mail->Port = 25;
                    if (!$mail->send()) {
                        ?>

                        <?php
                        echo "Mailer Error: " . $mail->ErrorInfo;
                    } else {
                        echo "Message sent!";
                    }
                } else {
                    echo "A message has been sent to your email address.";
                    //echo $token;
                }
            } else {
                //Email does not Exist
            $status = 'Email does not Exist <a href="http://localhost/qfm-ng/index.html#signup_popup">please sign up</a>';
            echo $status;
            }
    } else {
        //Email box empty
        $status = 'Email box empty <a href="index.html">back to previous page</a>';
        echo $status;
    }
}else{
//    Email box not set
    $status = 'Email box not set <a href="index.html">back to home page</a>';
    echo $status;
}
?>

                        </div>
                    <br><br><br><br><br><br>
                    </div>

                </div>

            </div>
        </section>
    </main>
<?php


include("includes/footer.php");


?>