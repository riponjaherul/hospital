<?php

require_once 'database.php';

class Appointment {

    public function __construct() {
        $obj_db = new Database();
    }

    public function get_all_appointment_list($doctor_id,$get_date) {
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

    public function update_registration_id($data, $appointment_data) {
        $sql = "INSERT INTO tbl_appointment(doctor_id,patient_reg_id,appointment_date,shift_id,time_slot_id,appointment_status)
                VALUES('$appointment_data[doctor_id]','$data[patient_reg_id]','$appointment_data[appointment_date]','$appointment_data[shift_id]','$appointment_data[time_slot_id]',$appointment_data[appointment_status])";
        if (!mysql_query($sql)) {
            die('Do not insert ' . mysql_error());
        } else {
            $_SESSION['message'] = '<span style="color:green">Your Appointment Update Successfully</span>';
            header('Location:?page=view_appointment');
        }
    }

    public function update_appointment_temp($temp_appointment_id) {
        $sql = "UPDATE tbl_appointment_temp SET deletion_status = '1'
                WHERE `appointment_temp_id` = '$temp_appointment_id'";
        mysql_query($sql);
    }

    function get_patient_reg_id_by_app_date($current_date, $previous_date) {
        $sql = "SELECT `patient_reg_id` 
                FROM `tbl_appointment`
                WHERE `appointment_date` BETWEEN '$previous_date' AND '$current_date'";
        return mysql_query($sql);
    }

    function get_patient_id($reg_id) {
        $sql = "SELECT `patient_id` FROM `tbl_patient` WHERE `patient_reg_id` = '$reg_id'";
        $query_result = mysql_query($sql);
        $result = mysql_fetch_assoc($query_result);
        return $result['patient_id'];
    }

    function add_appointment_bill($data) {
        $sql = "INSERT INTO tbl_appointment_bill(doctor_id,patient_id,discount_status,appointment_bill_amount,appointment_date)
                VALUES('$data[doctor_id]','$data[patient_id]','$data[discount_status]','$data[appointment_bill_amount]','$data[appointment_date]')";
        if (!mysql_query($sql)) {
            die('Do not insert ' . mysql_error());
        } else {
            $_SESSION['message'] = '<span style="color:green">Your Appointment Bill Add Successfully</span>';
            header('Location:?page=view_appointment');
        }
    }

    function change_appointment_new_status($id) {
        $sql = "UPDATE `tbl_appointment_temp`
                SET `appointment_status` = '1'
                WHERE `appointment_temp_id` = '$id'";
        mysql_query($sql);
        header('Location:?page=view_appointment');
    }

    function change_appointment_status($id) {
        $sql = "UPDATE `tbl_appointment`
                SET `appointment_status` = '1'
                WHERE `appointment_id` = '$id'";
        mysql_query($sql);
        header('Location:?page=view_appointment');
    }

    function get_parient_id_for_appointment($patient_reg_id) {
        $sql = "SELECT `patient_id` FROM `tbl_patient` WHERE `patient_reg_id`='$patient_reg_id'";
        $query_result = mysql_query($sql);
        $result = mysql_fetch_assoc($query_result);
        return $result['patient_id'];
    }

    function get_parient_id_for_bill($doctor_id, $patient_id, $appoint_date) {
        $sql = "SELECT `patient_id` 
                FROM `tbl_appointment_bill`
                WHERE `doctor_id`='$doctor_id' AND `patient_id` = '$patient_id' AND `appointment_date`='$appoint_date'";
        $query_result = mysql_query($sql);
        $result = mysql_fetch_assoc($query_result);
        return $result['patient_id'];
    }

    function get_patient_info_for_appointment($patient_id) {
        $sql = "SELECT `patient_reg_id`,`patient_name`,`patient_phone_number` "
                . "FROM `tbl_patient` "
                . "WHERE `patient_id`='$patient_id'";
        $query_result = mysql_query($sql);
        return mysql_fetch_assoc($query_result);
    }

    function get_all_appointment_patinet_id($patient_id) {
        $sql = "SELECT pn.`appointment_date`,d.`doctor_title`,d.`doctor_first_name`,d.`doctor_last_name`,pd.`prescription_nurse_id`,pd.`test_status`,pd.`read_status`
                FROM `tbl_prescription_doctor` AS pd, `tbl_prescription_nurse` AS pn, `tbl_doctor` AS d
                WHERE pd.`prescription_nurse_id` = pn.`prescription_nurse_id` AND pn.`patient_id` = '$patient_id' AND d.`doctor_id` = pn.`doctor_id`
                ORDER BY `appointment_date` DESC";
        return mysql_query($sql);
    }

    function set_read_status($pnid) {
        $sql = "UPDATE `tbl_prescription_doctor`
                SET `read_status` = '1'
                WHERE `prescription_nurse_id` = '$pnid'";
        mysql_query($sql);
    }

}
