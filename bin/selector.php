<?php
/**
 * Created by PhpStorm.
 * User: adebola
 * Date: 11/11/2014
 * Time: 5:15 AM
 */

class selector {

    var $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }
    public function select_it($table,$where = "1=1", $data="*"){
        $query = "SELECT ".$data." FROM ".$table. " WHERE ".$where;
        $connect = mysqli_query($this->conn, $query);
        return $connect;
    }
    public function select_with_fetch($table,$where = " 1=1 ", $data="*")
    {
        $list_array = $this->select_it($table,$where,$data);
        $tab_array = array();
        $i = 0;
        while($fetch = mysqli_fetch_assoc($list_array)){
            $tab_array[$i] = $fetch;
            $i++;
        }
        return $tab_array;
    }
    public function select_with_fetch_count($table,$where= " 1=1 ", $data="*")
    {
        $data_array = $this->select_with_fetch($table,$where, $data="*");
        return count($data_array);
    }

    public function select_distinct($table, $where = "1=1", $data="*"){
        $query = "SELECT ".$data." FROM ".$table. " WHERE ".$where." LIMIT 1";
        $connect = mysqli_query($this->conn, $query);
//        print_r($query);
        while($fetched  = mysqli_fetch_assoc($connect)){
            return $fetched;
        }
    }

    public function test(){
        echo 'I am here ';
    }
    public function select_and_join($table1,$table2,$table1_selector,$table2_selector,$table2_where, $data =' table1.* ".","." table2.*'){

        $selector = "SELECT $data
            FROM ";
        $selector .= $table1." table1
            LEFT JOIN (SELECT *
            FROM ";
        $selector .= $table2."
            WHERE ";
        $selector .= $table2_where.") AS table2 ON ";
        $selector .= 'table1'.".".$table1_selector ." = ".'table2'.".".$table2_selector;
        $selector .=" WHERE ".$table2_where;
        $connect = mysqli_query($this->conn, $selector);
        return $connect;
    }
    public function select_and_join_it($table1,$table2,$table1_selector,$table2_selector,$table1_where='1=1',$table2_where='1=1', $data1 ='*' , $data2='*'){

        $selector = "SELECT ".$table1.'.'.$data1.' , '.$table2.'.'.$data2.
            " FROM ";
        $selector .= $table1.
            " LEFT JOIN ";
        $selector .= $table2;
        $selector .= " ON ";
        $selector .= $table1.".".$table1_selector ." = ".$table2.".".$table2_selector;
        $selector .=" WHERE ".$table1.".".$table1_where;
//        return $selector;
        $connect = mysqli_query($this->conn, $selector);
        $i = 0;
        $fetched = array();
        while($fetched[$i]  = mysqli_fetch_assoc($connect)){
            $i++;
        }

        return $fetched;
    }
    public function select_and_join_new($table1,$table2,$table1_selector,$table2_selector,$table1_where='1=1',$table2_where='1=1', $data =' table1.* , table2.*'){

        $selector = "SELECT $data
            FROM ";
        $selector .= $table1." table1
            LEFT JOIN (SELECT *
            FROM ";
        $selector .= $table2."
            WHERE ";
        $selector .= $table2_where.") AS table2 ON ";
        $selector .= 'table1'.".".$table1_selector ." = ".'table2'.".".$table2_selector;
        $selector .=" WHERE ".$table1_where;
        return $selector;
//        $connect = mysqli_query($this->conn, $selector);
//        $i = 0;
//        $fetched = array();
//        while($fetched[$i]  = mysqli_fetch_assoc($connect)){
//            $i++;
//        }
//
//        return $fetched;
    }
    public function select_and_join_dinstinct($table1,$table2,$table1_selector,$table2_selector,$table1_where='1=1',$table2_where='1=1'){

        $selector = "SELECT
            FROM ";
        $selector .= $table1." table1
            LEFT JOIN (SELECT *
            FROM ";
        $selector .= $table2."
            WHERE ";
        $selector .= $table2_where.") AS table2 ON ";
        $selector .= 'table1'.".".$table1_selector ." = ".'table2'.".".$table2_selector;
        $selector .=" WHERE ".$table1_where;
        $connect = mysqli_query($this->conn, $selector);
        $i = 0;
        $fetched = array();
        while($fetched[$i]  = mysqli_fetch_assoc($connect)){
            $i++;
        }

        return $fetched;
    }

    public function get_annual_report_sheet($year,$student_id){
        $report_subjects = $this->select_and_join_new('report_cards',
            'term_result',
            'report_card_id',
            'report_id',
            ' year='.$year.' AND student_id='.$student_id.' ',
            '1=1 ',
            'DISTINCT table2.subject_id');

        $annual_report_table ='<table id="main-table">
            <thead>
            <td>SN</td>
            <td>Subject</td>
            <td>First Term</td>
            <td>Second Term</td>
            <td>Third Term</td>
            <td>Total</td>
            </thead>';

            for($i=0; $i<=(count($report_subjects)-2); $i++){
                $this_subject = $this->select_distinct("subjects","subject_id ='".$report_subjects[$i]['subject_id']."'", "subject");

                $term_result = array();
                for($m=1; $m<=3; $m++) {
                    $term_result[$m] = $this->select_and_join_new('report_cards',
                        'term_result',
                        'report_card_id',
                        'report_id',
                        ' year= '.$year.' AND term = '.$m.' AND student_id='.$student_id.' ',
                        ' subject_id=' . $report_subjects[$i]['subject_id'],
                        ' table2.*');
                }
                $no = $i+1;
                $annual_report_table .='<tr>
                <td>' .$no . '</td>
                <td>' . $this_subject['subject'] . '</td>';

                $annual_total = 0;
                foreach($term_result AS $key){
                    $term_exam = $key[0]['exam'];
                    $term_ca = $key[0]['ca'];
                    $term_total = $term_exam + $term_ca;
                    $annual_report_table .= '<td>' .$term_total. '</td>';
                    $annual_total += $term_total;

                }
                $annual_report_table .= '<td>'.$annual_total.'</td> </tr>';
            }
        $annual_report_table .='</table>';

    return $annual_report_table;
    }
    public function select_last_id($table,$id = 'id'){
        $rows_inserted_query = "SELECT ".$id." AS last_id FROM ".$table." WHERE ".$id."= @@Identity";
        $connect = mysqli_query($this->conn, $rows_inserted_query);
        $last_id  = mysqli_fetch_assoc($connect);
        return $last_id;
    }
    public function select_amount_used($status){

        $select_amount_used = $this->select_with_fetch('admin','1=1', 'balance');
        $amount = 0;
        foreach ($select_amount_used as $amount_used)
        {
            $amount = $amount + $amount_used['balance'];
        }
        return $amount;
    }



}



