<?php

require_once 'database.php';

class Admin {

    public function __construct() {
        $obj_db = new Database();
    }

    public function select_all_patient() {
        $sql = "SELECT patient_id,patient_name
                FROM tbl_patient
                WHERE deletion_status = '0'";
        return mysql_query($sql);
    }

    public function select_all_test_category() {
        $sql = "SELECT test_category_id,test_category_name
                FROM tbl_test_category
                WHERE deletion_status = '0'";
        return mysql_query($sql);
    }

    public function select_test_by_category($value_id) {
        $sql = "SELECT test_id,test_category_id,test_name
                FROM tbl_test
                WHERE test_category_id = '$value_id'";
        return mysql_query($sql);
    }
    public function select_all_department() {
        $sql = "SELECT `department_id`,`department_name` "
                . "FROM `tbl_department` "
                . "ORDER BY `department_name`";
        return mysql_query($sql);
    }
    public function get_all_nurse() {
        $sql = "SELECT `nurse_id`,`nurse_name` "
                . "FROM `tbl_nurse` "
                . "ORDER BY `nurse_name`";
        return mysql_query($sql);
    }
    public function select_doctor_by_single_dept($value) {
        $sql = "SELECT `doctor_id`,`doctor_title`,`doctor_first_name`,`doctor_last_name` 
                FROM `tbl_doctor` 
                WHERE `department_id`='$value'";
        return mysql_query($sql);
    }
    public function select_all_shift() {
        $sql = "SELECT `shift_id`,`shift_name` 
                FROM `tbl_shift`
                ORDER BY `shift_id` ASC";
        return mysql_query($sql);
    }

    public function save_prescription_suggest_test($data) {
        $test_id = serialize($data['test_id']);
        $sql = "INSERT INTO tbl_prescription_test(patient_id,test_id)
                VALUES('$data[patient_id]','$test_id')";
        if (!mysql_query($sql)) {
            die('do not insert ' . mysql_error());
        } else {
            $_SESSION['message'] = '<span style="color:green;">Data Inserted Successfully</span>';
            header('Location:?page=suggest_report');
        }
    }
    function get_medicine_time(){
        $sql = "SELECT `medicine_time_id`,`medicine_time_name` 
                FROM `tbl_medicine_time`
                ORDER BY `medicine_time_id` ASC";
        return mysql_query($sql);
    }
    function get_report_department(){
        $sql = "SELECT `test_category_id`,`test_category_name` FROM `tbl_report_department`";
        return mysql_query($sql);
    }
    function get_report_request_by_report_d_id($id){
        $sql = "SELECT `test_id`,`test_name` FROM `tbl_report_request` WHERE `test_category_id`='$id'";
        return mysql_query($sql);
    }
    function get_all_test($id){
        $sql = "SELECT r.`test_name` 
                FROM `tbl_report_request` AS r,`tbl_prescription_doctor_test` AS p
                WHERE r.`test_id` = p.`test_id`  AND p.`prescription_nurse_id` = '$id'";
        return mysql_query($sql);
    }
    function get_medisine_time($time){
        $sql = "SELECT `medicine_time_name` FROM `tbl_medicine_time` WHERE `medicine_time_id` = '$time'";
        $query_result = mysql_query($sql);
        return mysql_fetch_assoc($query_result);
    }
    function get_all_test_for_report_manager(){
        $sql = "SELECT DISTINCT a.`prescription_nurse_id`,d.`doctor_id`,d.`doctor_title`,d.`doctor_first_name`,d.`doctor_last_name`,p.`patient_id`,p.`patient_name`,n.`appointment_date`,p.`patient_reg_id`
                FROM `tbl_prescription_doctor_test` AS a, `tbl_prescription_nurse` AS n, `tbl_doctor` AS d,`tbl_patient` AS p
                WHERE a.`prescription_nurse_id` = n.`prescription_nurse_id` AND n.`doctor_id` = d.`doctor_id` AND p.`patient_id`=n.`patient_id`";
        return mysql_query($sql);
    }
    function get_test_by_pid($pres_nurse_id){
        $sql = "SELECT pt.`test_id`,rr.`test_name` 
                FROM `tbl_prescription_doctor_test` AS pt, `tbl_report_request` AS rr  
                WHERE pt.`prescription_nurse_id` = '$pres_nurse_id' AND pt.`test_id` = rr.`test_id`";
        return mysql_query($sql);
    }

    public function sign_out() {
        session_destroy();
        session_start();
        $_SESSION['message'] = '<span style="color:green;">You are Successfully Logout</span>';
        header('Location:index.php');
    }

}
