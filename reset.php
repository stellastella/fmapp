<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="styles/form_style.css">
<?php

/**
 * Created by PhpStorm.
 * User: Star
 * Date: 6/15/2017
 * Time: 5:23 PM
 */

include("includes/header.php");


if(isset($_GET["email"]) && isset($_GET["token"])) {
  $email = $_GET["email"];
  $token = $_GET["token"];

  $user_details = $selector->select_with_fetch("user", " email='" . $email . "'");
 $token_in_db = $user_details[0]["token"];


  if($token_in_db == $token){
    ?>

<main class="site-content" role="main">
  <section id="about" >

<br><br><br>
      <div class="container">
        <div class="row">
<!--                  <div class="col-md-offset-5 col-md-4">-->
            <div class="form-login">
              <form action="reset_password.php" method="post">
                  <h4>Enter New Password</h4>
                  <input type="hidden" name="email" value="<?php echo $email;?>" />
                  <input type="hidden" name="token" value="<?php echo $token;?>" />
                  <input type="password" id="password" name="password" class="form-control input-sm chat-input" placeholder="password" />
                  </br>
                  <input type="password" id="con_password" name="con_password" class="form-control input-sm chat-input" placeholder="confirm password" />
                  </br>
                  <div class="wrapper">
                    <span class="group-btn">
                      <input type="submit" class="form-control btn btn-primary btn-md" value="Submit">
                    </span>
              </form>
            </div>
<!--                    </div>-->

        </div>
      </div>
  </section>
</main>
    <?php
  }
}
else {
?>
  <main class="site-content" role="main">
  <section id="about" >

<br><br><br><br>
              <div class="container">
                <div class="row">
                  <div class="">
                    <div class="mssg">
                     <p> Are you sure you requested for change of password, if so please follow the instructions sent to your email. <br>
                       <p>You can visit <a href="forgot_password.php">Change Password</a> to reset your password.</p>
                      </div>
                    </div>

                  </div>

              </div>
  </section>
</main>
<?php
}
include("includes/footer.php");

?>























<!--    <div class="container">-->
<!--      <div class="row">-->
<!--        <div class="col-md-4 wow animated fadeInLeft">-->
<!--          <div class="recent-works">-->
<!--  <br><br><br><br>-->
<!--            <div class="form_case">-->
<!--    <form action="reset_password.php" method="post">-->
<!--      Enter new password:<br>-->
<!--      <input type="hidden" name="email" value="--><?php //echo $email;?><!--" />-->
<!--      <input type="hidden" name="token" value="--><?php //echo $token;?><!--" />-->
<!--      <input type="password" id="password" name="password" value="">-->
<!--      <br>-->
<!--      Re-enter password:<br>-->
<!--      <input type="password" id="con_password" name="con_password" value="">-->
<!--      <br><br>-->
<!--      <input type="submit" value="Submit">-->
<!--    </form>-->
<!--  <div>-->
<!--  </div>-->
<!--</div>-->
<!--        </div>-->
<!--</div-->