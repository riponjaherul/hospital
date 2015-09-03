<?php

require_once 'database.php';

class Appointment {

    public function __construct() {
        $obj_db = new Database();
    }

    public function select_all_appointment_list($get_date, $doctor_id) {
        $sql = "SELECT a.`appointment_id`,a.`patient_reg_id`,p.`patient_name`,p.`patient_phone_number`,
                a.`appointment_status`,t.`time_slot_time`,t.`time_slot_serial`,s.`shift_name` 
                FROM `tbl_appointment` as a, `tbl_patient` as p, `tbl_time_slot` AS t,`tbl_shift` as s 
                WHERE a.`appointment_date` = '$get_date' AND a.`doctor_id` = '$doctor_id' AND a.`deletion_status` ='0'
                AND a.`patient_reg_id`=p.`patient_reg_id` 
                AND a.`time_slot_id` = t.`time_slot_id` AND s.`shift_id`=a.`shift_id` 
                UNION 
                SELECT a.`appointment_temp_id`,a.`patient_reg_id`,a.`patient_name`,a.`patient_phone_number`,
                a.`appointment_status`,t.`time_slot_time`,t.`time_slot_serial`,s.`shift_name` 
                FROM `tbl_appointment_temp` As a,`tbl_time_slot` AS t ,`tbl_shift` as s 
                WHERE a.`appointment_date` = '$get_date' AND a.`doctor_id` = '$doctor_id' AND a.`deletion_status` ='0'
                AND a.`time_slot_id` = t.`time_slot_id` 
                AND s.`shift_id`=a.`shift_id` 
                ORDER BY `shift_name` DESC,`time_slot_serial` ASC";
        return mysql_query($sql);
    }
    public function get_single_new_appointment($id) {
        $sql = "SELECT * FROM `tbl_appointment_temp` WHERE `appointment_temp_id` = '$id'";
        return mysql_query($sql);
    }
    public function update_registration_id($data,$appointment_data) {
        $sql = "INSERT INTO tbl_appointment(doctor_id,patient_reg_id,appointment_date,shift_id,time_slot_id)
                VALUES('$appointment_data[doctor_id]','$data[patient_reg_id]','$appointment_data[appointment_date]','$appointment_data[shift_id]','$appointment_data[time_slot_id]')";
        if(!mysql_query($sql)){
            die('Do not insert '.mysql_error());
        }else{
            $_SESSION['message'] = '<span style="color:green">Your Appointment Update Successfully</span>';
            header('Location:?page=view_appointment');
        }
    }
    public function update_appointment_temp($temp_appointment_id){
        $sql = "UPDATE tbl_appointment_temp SET deletion_status = '1'
                WHERE `appointment_temp_id` = '$temp_appointment_id'";
        mysql_query($sql);
    }

}
