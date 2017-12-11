<?php
/**
 * Created by PhpStorm.
 * User: adebola
 * Date: 11/19/2014
 * Time: 9:31 AM
 */


class insertor{
var $conn;
    public function __construct($conn)
    {
        $this->conn = $conn;
    }
    public function insert_it($table, $insert_data){

        $data = array_keys($insert_data);

        $insert_string = "INSERT INTO ";
        $insert_string .= $table.'(';

        $column_count = 0;
        $values_counter = 0;

        foreach($data AS $datas){
            $values_counter++;

            $insert_string .= $datas;

            if( $values_counter != count($insert_data))
            {
                $insert_string .= ",";
            }
            else{
                $insert_string .= ')VALUES(';
            }
        }


        foreach($insert_data AS $value){
            $column_count++;
            $insert_string .= "'";
            $insert_string .= $value;
            $insert_string .= "'";
            if($column_count != count($insert_data))
            {
              $insert_string .= ",";
            }
            else{
                $insert_string .= ')';
            }
        }
//        return $insert_string;
        $connect = mysqli_query($this->conn, $insert_string);
        return $connect;
    }

    public function delete_it($table, $where)
    {
        $delete_string = "DELETE FROM ".$table." WHERE"." $where";
        $connect = mysqli_query($this->conn, $delete_string);
        return $connect;
    }
} 