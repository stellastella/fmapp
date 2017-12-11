 <!--Modal Div-- Login -->
    <div class="remodal" data-remodal-id="login_popup" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
        <div class="result"></div>
        <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
        <form class="login_form" id="login">
            <input placeholder="Username" id="login_username"  type="text" />
            <input placeholder="Password" id="login_password" type="password" />
            <input type="submit" value="Sign in"/>
        </form>

    </div>
    <!--Modal Div-->
    <!--Modal Div-- Sign-up -->
 <!--Modal Div-- Login -->
 <div class="remodal" data-remodal-id="login_popup" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
     <div class="result"></div>
     <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
     <form class="login_form" id="login">
         <input placeholder="Username" id="login_username"  type="text" />
         <input placeholder="Password" id="login_password" type="password" />
         <input type="submit" value="Sign in"/>
     </form>

 </div>

 <div class="remodal" data-remodal-id="error_popup" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
     <div class="result"></div>
     <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
     <form class="login_form" id="login">
         <a href="#login_popup"> <h3 style="color: white">Please Login</h3></a> <br>OR
         <a href="#signup_popup"> <h3 style="color: white">Please Sign up</h3></a>
     </form>
 </div>
 <div class="remodal" data-remodal-id="signup_popup" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">

     <!--        <h2>Sign up</h2>-->
     <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
     <form class="login_form" action="sign_up.php" method="post" id="signup">
         <input type="hidden" name="redirect" value="<?php echo $url;?>" />
         <input placeholder="enter your email" name="email"   id="email" type="text" />
         <input placeholder="Password" id="password" name="password" type="password" />
         <input placeholder="confirm password" name="con_password" type="password" />
         <input placeholder="Full Name" name="full_name" type="text" />
         <input placeholder="address" name="address" type="text" />
         <input placeholder="area" name="area" type="text" />
         <!--Change this to your states-->
         <!-------------------------------------        -->
         <!-------------------------------------        -->
         <!-------------------------------------        -->

         <select class="states_signup" name="state">
             <option>Select State</option>
             <option value="Abia">Abia</option>
             <option value="Adamawa">Adamawa</option>
             <option value="Akwa-ibom">Akwa-Ibom</option>
             <option value="Anambra">Anambra</option>
             <option value="Bauchi">Bauchi</option>
             <option value="Bayelsa">Bayelsa</option>
             <option value="Benue">Benue</option>
             <option value="Borno">Borno</option>
             <option value="Cross-river">Cross-river</option>
             <option value="Delta">Delta</option>
             <option value="Ebonyi">Ebonyi</option>
             <option value="Edo">Edo</option>
             <option value="Enugu">Enugu</option>
             <option value="Ekiti">Ekiti</option>
             <option value="FCT">FCT</option>
             <option value="Gombe">Gombe</option>
             <option value="Imo">Imo</option>
             <option value="Jigawa">Jigawa</option>
             <option value="Kaduna">Kaduna</option>
             <option value="Kano">Kano</option>
             <option value="Katsina">Katsina</option>
             <option value="Kebbi">Kebbi</option>
             <option value="Kogi">Kogi</option>
             <option value="Kwara">Kwara</option>
             <option value="Lagos">Lagos</option>
             <option value="Nasarawa">Nasarawa</option>
             <option value="Niger">Niger</option>
             <option value="Ondo">Ondo</option>
             <option value="Ogun">Ogun</option>
             <option value="Oyo">Oyo</option>
             <option value="Osun">Osun</option>
             <option value="Plateau">Plateau</option>
             <option value="Rivers">Rivers</option>
             <option value="Sokoto">Sokoto</option>
             <option value="Taraba">Taraba</option>
             <option value="Yobe">Yobe</option>
             <option value="Zamfara">Zamfara</option>
             <option value="FCT">FCT</option>
         </select>

         <div id="local_govt_div" name="local_govt">
             <!--Response will be inserted here-->
         </div>

         <select onchange="yesnoCheck(this);" name="user_type">
             <option value="">Select</option>
             <option value="0">Individual</option>
             <option value="1">Corporate</option>
         </select>


         <div id="ifYes" style="display: none;">
             <input type="text" placeholder="Name of organization" id="organization" name="organization" />
             <input type="text" placeholder="contact person's name" id="contact_person" name="contact_person" />
             <input type="text" placeholder="website (if applicable)" id="website" name="website" />

             <script>
                 function yesnoCheck(that) {
                     if (that.value == "1") {
                         document.getElementById("ifYes").style.display = "block";
                     }
                     else {
                         document.getElementById("ifYes").style.display = "none";
                     }
                 }
             </script>

         </div>

         <input placeholder="Phone number" name="phone_number" type="text" />
         <br>
         <br>
         <div class="g-recaptcha" data-sitekey="6LfUrRkUAAAAAODDGLXDtaJMpFRf5TqpDu0K0a6q"></div>

         <input type="submit" value="Sign up"/>
     </form>
 </div>


 <!--eND OF MODAL-->


 <div class="remodal" data-remodal-id="signup_popup" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">

        <h2>Sign up</h2>
        <?php
        if(isset($msg)){  // Check if $msg is not empty
            echo '<div class="statusmsg">'.$msg.'</div>'; // Display our message and wrap it with a div with the class "statusmsg".
        }
        ?>
        <p><div id="signup_output"></div></p>


        <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
        <form class="login_form" action="sign_up.php" method="post" id="signup">
            <input placeholder="enter your email" name="email"   id="email" type="text" />
            <input placeholder="Password" id="password" name="password" type="password" />
            <input placeholder="confirm password" name="con_password" type="password" />
            <input placeholder="Full Name" name="full_name" type="text" />
            <input placeholder="address" name="address" type="text" />
            <input placeholder="area" name="area" type="text" />
            <select class="states_signup">
                <option>Select State</option>
                <option value="Abia">Abia</option>
                <option value="Adamawa">Adamawa</option>
                <option value="Akwa-ibom">Akwa-Ibom</option>
                <option value="Anambra">Anambra</option>
                <option value="Bauchi">Bauchi</option>
                <option value="Bayelsa">Bayelsa</option>
                <option value="Benue">Benue</option>
                <option value="Borno">Borno</option>
                <option value="Cross-river">Cross-river</option>
                <option value="Delta">Delta</option>
                <option value="Ebonyi">Ebonyi</option>
                <option value="Edo">Edo</option>
                <option value="Enugu">Enugu</option>
                <option value="Ekiti">Ekiti</option>
                <option value="FCT">FCT</option>
                <option value="Gombe">Gombe</option>
                <option value="Imo">Imo</option>
                <option value="Jigawa">Jigawa</option>
                <option value="Kaduna">Kaduna</option>
                <option value="Kano">Kano</option>
                <option value="Katsina">Katsina</option>
                <option value="Kebbi">Kebbi</option>
                <option value="Kogi">Kogi</option>
                <option value="Kwara">Kwara</option>
                <option value="Lagos">Lagos</option>
                <option value="Nasarawa">Nasarawa</option>
                <option value="Niger">Niger</option>
                <option value="Ondo">Ondo</option>
                <option value="Ogun">Ogun</option>
                <option value="Oyo">Oyo</option>
                <option value="Osun">Osun</option>
                <option value="Plateau">Plateau</option>
                <option value="Rivers">Rivers</option>
                <option value="Sokoto">Sokoto</option>
                <option value="Taraba">Taraba</option>
                <option value="Yobe">Yobe</option>
                <option value="Zamfara">Zamfara</option>
                <option value="FCT">FCT</option>
            </select>

            <div id="local_govt_div">
                <!--Response will be inserted here-->
            </div>

            <select onchange="yesnoCheck(this);">
                <option value="">Select</option>
                <option value="Individual">Individual</option>
                <option value="Corporate">Corporate</option>
            </select>

            <div id="ifYes" style="display: none;">

                <label for="individual"></label> <input type="text" placeholder="Name of organization" id="organization" name="organization" /><br />
                <label for="individual"></label> <input type="text" placeholder="contact person's name" id="contact_person" name="contact_person" /><br />
                <label for="individual"></label> <input type="text" placeholder="website (if applicable)" id="website" name="website" /><br />

                <script>
                    function yesnoCheck(that) {
                        if (that.value == "Corporate") {
                            document.getElementById("ifYes").style.display = "block";
                        }
                        else {
                            document.getElementById("ifYes").style.display = "none";
                        }
                    }
                </script>

            </div>

            <input placeholder="Phone number" name="phone_number" type="text" />
            <br>
            <br>
            <div class="g-recaptcha" data-sitekey="6LfUrRkUAAAAAODDGLXDtaJMpFRf5TqpDu0K0a6q"></div>

            <input type="submit" value="Sign up"/>
        </form>



    </div>
    <!--end of the display logged in-->
