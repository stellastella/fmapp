<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<!--<link rel="stylesheet" href="styles/form_style.css">-->
<?php
/**
 * Created by PhpStorm.
 * User: Star
 * Date: 6/15/2017
 * Time: 1:48 PM
 *
 */
include("includes/header3.php");
?>
    <main class="site-content" role="main">
        <section id="about" >

            <br><br><br><br><br>
            <div class="container text-center">
                <div class="row">
                    <div class="col-md-offset-5 col-md-4">
                    <div class="form-login">
                <form action="change_password.php" method="post">
                        <h4>Enter Email Address</h4>
                    <input type="text" name="email" id="email" value="" class="form-control input-sm chat-input " placeholder="email">
                    <br>
                        <div class="wrapper">
                            <span class="group-btn">
                              <input type="submit" class="form-control btn btn-primary btn-md" value="Submit">
                            </span>
                </form>
                    </div>
                </div>
                </div>
            </div>
            <br><br>
        </section>
    </main>
<?php

include("includes/footer.php");
?>