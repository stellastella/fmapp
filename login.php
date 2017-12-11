<?php
/**
 * Created by PhpStorm.
 * User: Star
 * Date: 3/7/2017
 * Time: 3:32 PM
 */
@ob_start();
session_start();
include 'bin/db_config.php';
include 'bin/selector.php';
include 'bin/insertor.php';
include('bin/instantiate_objects.php');



if(isset($_POST["username"]) && isset($_POST["password"])){
    if(isset($_POST['redirect'])){
        $redirect_url = "location: ".urldecode($_POST['redirect']);
    }else{
        $redirect_url = "location: ".urldecode('index.php');
    }
    $username= $_POST["username"];
    $password = $_POST["password"];
    $get_user = $selector->select_with_fetch("user","email ='".$username."' AND password = md5('".$password."')");
    $maximum_tries_allowed = 3;

    if(!empty($get_user)){
        $error_counter = $get_user[0]["error_counter"];
        $user_id = $get_user[0]["id"];
        if($error_counter < $maximum_tries_allowed){
            echo "100";
            $_SESSION["username"] = $get_user[0]["email"];
            $_SESSION["level"] = $get_user[0]["level"];
            $_SESSION["uid"] = $get_user[0]["id"];
            $error_counter = 0;
            $update_query = "UPDATE user SET error_counter = '" . $error_counter . "' where id ='" . $user_id . "'";
            $query = mysqli_query($conn, $update_query);
            echo $redirect_url;
            header($redirect_url);
        }else{
            echo "<div style ='font:15px/29px Arial,tahoma,sans-serif;color:#ff0000'>Maximum Login tries of ".$maximum_tries_allowed." Exceeded contact the admin</div>";
        }
    }else{

        $get_user2 = $selector->select_with_fetch("user"," email ='".$username."'");
        if(!empty($get_user2)) {
            $user_id = $get_user2[0]["id"];
            if (!empty($username)) {
                $old_error_counter  = $get_user2[0]["error_counter"];
                $new_error_counter = $old_error_counter + 1;
                $update_query = "UPDATE user SET error_counter = '" . $new_error_counter . "' where id ='" . $user_id . "'";
                $user_updated_details = $selector->select_with_fetch("user","id ='" . $user_id . "'");
                if($user_updated_details[0]["error_counter"] < $maximum_tries_allowed) {
                    echo "<div style ='font:15px/29px Arial,tahoma,sans-serif;color:#ff0000'>User details not valid
                    <br/><br/>". $user_updated_details[0]["error_counter"] . " Out of " . $maximum_tries_allowed . " Login Tries Used.</div>";
                }else{
                    echo "<div style ='font:15px/29px Arial,tahoma,sans-serif;color:#e10a05'> <b>Invalid Details <br/>
                      Maximum Login tries of ".$maximum_tries_allowed." Exceeded Contact the admin</b> </div>";
                }
                $query = mysqli_query($conn, $update_query);
            }else{
                echo "<div style ='font:15px/29px Arial,tahoma,sans-serif;color:#e10a05'> <b>No username was entered </b> </div>";
            }
        }else{
            echo "<div style ='font:15px/29px Arial,tahoma,sans-serif;color:#e10a05'> <b>Invalid Details </b> </div>";
        }
    }

}else{
    echo "<div style ='font:15px/29px Arial,tahoma,sans-serif;color:#e10a05'>No Value was sent</div>";
}

?>