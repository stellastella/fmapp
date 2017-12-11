<html>

<form method="post" id="make_review">
    Review:<br/><textarea name="review" placeholder=""></textarea>
    <input type="text" name="publisher" placeholder="Name*"/>
    <input type="hidden" name="redirect" value="<?php echo urlencode($url); ?>" />
    <input type="hidden" name="service_id" value="<?php echo $this_service["id"]; ?>"/>
    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>"/>

    <ul id="rating"  class="stars">
        <li><label for="rating_1"><i class="fa fa-star" aria-hidden="true"></i></label><input name="rating1" type="hidden" id="rating" value=""/></li>
        <li><label for="rating_2"><i class="fa fa-star" aria-hidden="true"></i></label><input name="rating2" type="hidden" id="rating"  value=""/></li>
        <li><label for="rating_3"><i class="fa fa-star" aria-hidden="true"></i></label><input name="rating3" type="hidden" id="rating" value=""/></li>
        <li><label for="rating_4"><i class="fa fa-star" aria-hidden="true"></i></label><input name="rating4" type="hidden" id="rating" value=""/></li>
        <li><label for="rating_5"><i class="fa fa-star" aria-hidden="true"></i></label><input name="rating5" type="hidden" id="rating" value=""/></li>
    </ul>

    <!--                    <input type="submit" value="submit" name="submit_review"/> <br><br>-->
    <div id="submit_review">SUBMIT</div>

</form>

</html>