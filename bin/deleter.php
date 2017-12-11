<?php
/**
 * Created by PhpStorm.
 * User: adebola
 * Date: 11/20/2014
 * Time: 12:28 AM
 */

class deleter {
    var $conn;
    function __construct($conn)
    {
        $this->conn = $conn;
    }
    public function delete_it($table,$where = "1=1", $data="*"){
        $query = "DELETE ".$data." FROM ".$table. " WHERE ".$where;
        $connect = mysqli_query($this->conn, $query);
        return $connect;
    }

    public function delete_with_fetch($table,$where = " 1=1 ", $data="*")
    {
        $list_array = $this->delete_it($table,$where,$data);
        $tab_array = array();
        $i = 0;
        while($fetch = mysqli_fetch_assoc($list_array)){
            $tab_array[$i] = $fetch;
            $i++;
        }
        return $tab_array;
    }
} 