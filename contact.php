
<?php
include("includes/header3.php");

?>
<script src="js/jquery.js" ></script>

<style>
    /*#about-me{*/
        /*display:none;*/
    /*}*/
    #submit{
        width:12em;
        height:3em;
        background: #cc741b;
    }
</style>


<section id="about" >

<!--    <div id="about-me">Adebola Oyenuga</div>-->
    <script>
//            $("#about-me").show();
        function contact(){

//            alert("here");

                    var name = $("#name").val();
                    var email = $("#email").val();
                    var subject = $("#subject").val();
                    var message = $("#message").val();
            var to_send = "name=" + name + "&email=" + email + "&subject=" + subject + "&message=" + message;
//            alert(to_send);
                    $.ajax({
                        type: "POST",
                        url: "contact_submit.php",
                        data: to_send,
                        success: function (result) {
                            $("#resultdiv").html(result);
//                            alert(result);
                        }
                    });
        }
    </script>

    <div class="container">
        <div class="row">

            <div class="sec-title text-center wow animated fadeInDown">
                <br><br><h2>Leave a Message</h2>
            </div>



            <div class="col-md-7 contact-form wow animated fadeInLeft">
                <div id="resultdiv" class="text-center" style="color:red"></div>
                <form id="contactform" action="contact_submit.php" method="post">

<!--                    <input type="hidden" name="redirect" value="--><?php //echo urlencode($url); ?><!--" />-->
                    <div class="input-field">
                        <input type="text" id="name" name="name" class="form-control" placeholder="Your Name..." required>
                    </div>
                    <div class="input-field">
                        <input type="email" id="email" name="email" class="form-control" placeholder="Your Email..." required>
                    </div>
                    <div class="input-field">
                        <input type="text" id="subject" name="subject" class="form-control" placeholder="Subject..." required>
                    </div>
                    <div class="input-field">
                        <textarea name="message" id="message" class="form-control" placeholder="Messages..." required></textarea>
                    </div>
                    <div id="submit" class="btn btn-blue btn-effect" onclick="contact()" >Send</div>









                </form>

            </div>


            <div class="col-md-5 wow animated fadeInRight">
                <address class="contact-details">
                    <h3>Contact Us</h3>
                    <p><i class="fa fa-pencil"></i>FM-AFRICA<span>71b Mainland Way Dolphin Estate Ikoyi</span><span>Lagos, Nigeria</span></p><br>
                    <p style="color:white"><i class="fa fa-phone"></i>Phone: 08034341145  </p>
                    <p style="color:white"><i class="fa fa-globe"></i>www.fm-africa.com</p>
                </address>
            </div>

        </div>
    </div>
</section>
<!--&lt;!&ndash; end Contact section &ndash;&gt;-->


<?php
include("includes/footer.php");

?>

