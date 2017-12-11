<?php

if($rating_average==5){
    echo  '<ul class="ratedstar">
                            <li><label for="rating_1"><i class="fa fa-star" aria-hidden="true"></i></label><input type="radio" value="1"/></li>
                            <li><label for="rating_2"><i class="fa fa-star" aria-hidden="true"></i></label><input type="radio" value="2"/></li>
                            <li><label for="rating_3"><i class="fa fa-star" aria-hidden="true"></i></label><input type="radio" value="3"/></li>
                            <li><label for="rating_4"><i class="fa fa-star" aria-hidden="true"></i></label><input type="radio" value="4"/></li>
                            <li><label for="rating_5"><i class="fa fa-star" aria-hidden="true"></i></label><input type="radio" value="5"/></li>
                           </ul>';
}elseif($rating_average==4){
    echo '
                    <ul class="ratedstar">
                            <li><label for="rating_1"><i class="fa fa-star" aria-hidden="true"></i></label><input type="radio" value="1"/></li>
                            <li><label for="rating_2"><i class="fa fa-star" aria-hidden="true"></i></label><input type="radio" value="2"/></li>
                            <li><label for="rating_3"><i class="fa fa-star" aria-hidden="true"></i></label><input type="radio" value="3"/></li>
                            <li><label for="rating_4"><i class="fa fa-star" aria-hidden="true"></i></label><input type="radio" value="4"/></li>
                            <li><label for="rating_4" style="color:white;"><i class="fa fa-star" aria-hidden="true"></i></label><input type="radio" value="0"/></li>
                           </ul>';
}elseif($rating_average==3){
    echo '
                    <ul class="ratedstar">
                            <li><label for="rating_1"><i class="fa fa-star" aria-hidden="true"></i></label><input type="radio" value="1"/></li>
                            <li><label for="rating_2"><i class="fa fa-star" aria-hidden="true"></i></label><input type="radio" value="2"/></li>
                            <li><label for="rating_3"><i class="fa fa-star" aria-hidden="true"></i></label><input type="radio" value="3"/></li>
                            <li><label for="rating_4" style="color:white;"><i class="fa fa-star" aria-hidden="true"></i></label><input type="radio" value="0"/></li>
                            <li><label for="rating_4" style="color:white;"><i class="fa fa-star" aria-hidden="true"></i></label><input type="radio" value="0"/></li>
                           </ul>';
}elseif($rating_average==2){
    echo '
                    <ul class="ratedstar">
                            <li><label for="rating_1"><i class="fa fa-star" aria-hidden="true"></i></label><input type="radio" value="1"/></li>
                            <li><label for="rating_2"><i class="fa fa-star" aria-hidden="true"></i></label><input type="radio" value="2"/></li>
                            <li><label for="rating_4" style="color:white;"><i class="fa fa-star" aria-hidden="true"></i></label><input type="radio" value="0"/></li>
                            <li><label for="rating_4" style="color:white;"><i class="fa fa-star" aria-hidden="true"></i></label><input type="radio" value="0"/></li>
                            <li><label for="rating_4" style="color:white;"><i class="fa fa-star" aria-hidden="true"></i></label><input type="radio" value="0"/></li>
                           </ul>';
}elseif($rating_average==1){
    echo '
                    <ul class="ratedstar">
                            <li><label for="rating_1"><i class="fa fa-star" aria-hidden="true"></i></label><input type="radio" value="1"/></li>
                            <li><label for="rating_4" style="color:white;"><i class="fa fa-star" aria-hidden="true"></i></label><input type="radio" value="0"/></li>
                            <li><label for="rating_4" style="color:white;"><i class="fa fa-star" aria-hidden="true"></i></label><input type="radio" value="0"/></li>
                            <li><label for="rating_4" style="color:white;"><i class="fa fa-star" aria-hidden="true"></i></label><input type="radio" value="0"/></li>
                            <li><label for="rating_4" style="color:white;"><i class="fa fa-star" aria-hidden="true"></i></label><input type="radio" value="0"/></li>
                           </ul>';
}else{
    echo '
                    <ul class="ratedstar">
                            <li><label for="rating_4" style="color:white;"><i class="fa fa-star" aria-hidden="true"></i></label><input type="radio" value="0"/></li>
                            <li><label for="rating_4" style="color:white;"><i class="fa fa-star" aria-hidden="true"></i></label><input type="radio" value="0"/></li>
                            <li><label for="rating_4" style="color:white;"><i class="fa fa-star" aria-hidden="true"></i></label><input type="radio" value="0"/></li>
                            <li><label for="rating_4" style="color:white;"><i class="fa fa-star" aria-hidden="true"></i></label><input type="radio" value="0"/></li>
                            <li><label for="rating_4" style="color:white;"><i class="fa fa-star" aria-hidden="true"></i></label><input type="radio" value="0"/></li>
                           </ul>';
}
?>
</div>