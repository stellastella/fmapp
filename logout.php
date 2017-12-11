<?php
/**
 * Created by PhpStorm.
 * User: Star
 * Date: 3/7/2017
 * Time: 4:15 PM
 */

@ob_start();
session_start();
session_destroy();

header("location:index.php");