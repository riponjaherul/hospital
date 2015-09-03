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
    public function select_doctor_by_single_dept($value) {
        $sql = "SELECT `doctor_id`,`doctor_title`,`doctor_first_name`,`doctor_last_name` 
                FROM `tbl_doctor` 
                WHERE `department_id`='$value'";
        return mysql_query($sql);
    }

    public function add_prescription($data) {
//        print_r($data);
//        exit();
        $patient_id = $data['patient_id'];
        $patient_history = $data['patient_histroy'];
        $patient_blood_pressure = $data['patient_blood_pressure'];
        $patient_temperature = $data['patient_tempetature'];
        $patient_weight = $data['patient_weight'];
        $patient_drug_name = serialize($data['patient_drug_name']);
        $patient_drug_unit = serialize($data['patient_drug_unit']);
        $patient_drug_dosage = serialize($data['patient_drug_dosage']);
        $patient_drug_time = serialize($data['patient_drug_time']);
        $patient_drug_expire_days = serialize($data['patient_drug_expire_days']);

        $sql = "INSERT INTO tbl_prescription(patient_id,patient_histroy,patient_blood_pressure,	
                patient_tempetature,patient_weight,patient_drug_name,patient_drug_unit,
                patient_drug_dosage,patient_drug_time,patient_drug_expire_days)
                VALUES('$patient_id','$patient_history','$patient_blood_pressure',"
                . "'$patient_temperature','$patient_weight','$patient_drug_name',"
                . "'$patient_drug_unit','$patient_drug_dosage','$patient_drug_time','$patient_drug_expire_days')";
        if (!mysql_query($sql)) {
            die('do not insert ' . mysql_error());
        } else {
            $_SESSION['message'] = '<span style="color:green;">Data Inserted Successfully</span>';
            header('Location:?page=make_prescriprion');
        }
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

    public function sign_out() {
        session_destroy();
        session_start();
        $_SESSION['message'] = '<span style="color:green;">You are Successfully Logout</span>';
        header('Location:index.php');
    }

}
