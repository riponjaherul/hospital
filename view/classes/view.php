<?php

require_once 'database.php';

class View {

    public function __construct() {
        $obj_view = new Database();
    }

    public function select_all_department() {
        $sql = "SELECT `department_id`,`department_name` "
                . "FROM `tbl_department` "
                . "ORDER BY `department_name`";
        return mysql_query($sql);
    }

    public function select_doctor_by_single_dept($value) {
        $sql = "SELECT `doctor_id`,`doctor_title`,`doctor_first_name`,`doctor_last_name` 
                FROM `tbl_doctor` 
                WHERE `department_id`='$value'";
        return mysql_query($sql);
    }

    public function single_doctor_data($doctor_id) {
        $sql = "SELECT `doctor_qualification`,`doctor_general_description`,`doctor_image` 
                FROM `tbl_doctor` 
                WHERE `doctor_id` = '$doctor_id'";
        return mysql_query($sql);
    }

    public function select_all_shift() {
        $sql = "SELECT `shift_id`,`shift_name` 
                FROM `tbl_shift`
                ORDER BY `shift_id` ASC";
        return mysql_query($sql);
    }

    public function select_all_time_slot_by_shift($shift_id) {
        $sql = "SELECT `time_slot_id`,`time_slot_time` 
                FROM `tbl_time_slot` 
                WHERE `shift_id` = '$shift_id'";
        return mysql_query($sql);
    }

    public function get_name_by_reg_id($patient_reg_id) {
        $sql = "SELECT `patient_name`,`patient_phone_number` 
                FROM `tbl_patient` 
                WHERE `patient_reg_id`= '$patient_reg_id'";
        return mysql_query($sql);
    }

    public function select_total_time_slot($shift_id) {
        $sql = "SELECT `time_slot_id` 
                FROM `tbl_time_slot` 
                WHERE `shift_id` = '$shift_id' 
                ORDER BY `time_slot_id`";
        return mysql_query($sql);
    }

    public function select_use_time_slot($shift_id,$doctor_id,$date) {
        $sql = "SELECT `time_slot_id` 
                FROM `tbl_appointment` 
                WHERE `doctor_id` = '$doctor_id' AND `appointment_date` = '$date' AND `shift_id`='$shift_id'
                UNION 
                SELECT `time_slot_id` 
                FROM `tbl_appointment_temp` 
                WHERE `doctor_id` = '$doctor_id' AND `appointment_date` = '$date' AND `shift_id`='$shift_id'
                ORDER BY `time_slot_id` ";
        return mysql_query($sql);
    }
    public function remaining_time_slot($available_time_slot) {
        $time_slot_time = array();
        foreach ($available_time_slot as $value) {
            $sql="SELECT `time_slot_id`,`time_slot_time` 
                FROM `tbl_time_slot` 
                WHERE `time_slot_id` = '$value' ";
            $query_result = mysql_query($sql);
            $time_slot_time[] = mysql_fetch_assoc($query_result);
        }
        return $time_slot_time;
    }

}
