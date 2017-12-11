
<style>
    main{
        background-image: url('./img/slider/pexels-photo-345123.jpeg');
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        /*width:100%;*/
    }
</style><?php
include("includes/header3.php");   ?>
?>
<main>
    <div class="body" style="background-color: rgba(0, 0, 0, 0.68)">

    <div class="container">
        <div class="row">
            <br><h4 class="text-center" style="font-style: italic; color: white">We will be glad to hear from you</h4><br>
<form class="login_form" action="testimonial.php" method="post" id="business_owners">

    <textarea name="message" value="message" rows="6" cols="70"></textarea>
    <!--        <input placeholder="category" name="cat_name" type="text" />-->
    <input type="submit" value="submit"/>
</form><br><br>
</div></div>
</div>
    </main>
<?php
include("includes/footer.php");   ?>


