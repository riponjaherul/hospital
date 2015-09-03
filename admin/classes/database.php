<?php

class Database {
    public function __construct() {
        $host_name = "localhost";
        $user_name = "root";
        $password = "";
        $db_name = "db_hospital_management";
        
        $conn = mysql_connect($host_name, $user_name, $password);
        if(!$conn){
            die("Could not Connect DB ".mysql_error());
        }else{
            mysql_select_db($db_name);
        }
    }
    
}
