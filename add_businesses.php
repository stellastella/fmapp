<style>
    main{
        background-image: url('./img/slider/pexels-photo-345123.jpeg');
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        /*width:100%;*/
    }
</style>

<?php
include("includes/header.php");   ?>
<main>
<div class="body" style="background-color: rgba(0, 0, 0, 0.68)">

    <div class="container";>
        <div class="row"">
        <h3 class="text-center" style="color:black">Please Fill in To Add A New Business</h3>
<form class="login_form" action="add_business.php" method="post" id="business_owners">
    <input placeholder="enter your business name" name="business_name"   id="business_name" type="text" />
    <input placeholder="contact person" id="contact_person" name="contact_person" type="text" />
    <input placeholder="phone" name="phone" type="text" />
    <input placeholder="email" name="email" type="text" />
    <input placeholder="business decription" name="description" type="text" />
    <input placeholder="location" name="location" type="text" />
    <input placeholder="details" name="c" type="text" />
    <!--        <input placeholder="category" name="cat_name" type="text" />-->
    <input type="submit" value="Add Business"/>
</form>
        </div></div>
</div>
    </main>
<?php
include("includes/footer.php");   ?>