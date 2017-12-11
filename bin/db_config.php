<?php
/**
 * Created by PhpStorm.
 * User: adebola
 * Date: 11/11/2014
 * Time: 4:21 AM
 */

define('db_user','root');
define('db_name','qfm');
define('db_pass','');
define('db_host','localhost');

$conn = mysqli_connect(db_host,db_user,db_pass) or die(mysql_error());
// select  a database
mysqli_select_db($conn,db_name) or die('could not select the database');

?>