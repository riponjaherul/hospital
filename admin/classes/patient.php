<?php

class Patient extends Admin {
    public function __construct() {
        parent::__construct();
    }
    function get_patient_id_nurse_pres_id($pres_nurse_id){
        $sql = "SELECT `patient_id` FROM `tbl_prescription_nurse` WHERE `prescription_nurse_id`='$pres_nurse_id'";
        $query_result = mysql_query($sql);
        return mysql_fetch_assoc($query_result);
    }
    function get_patient_info_patient_id($patient_id){
        $sql = "SELECT `patient_reg_id`,`patient_name`,`patient_gender` FROM `tbl_patient` WHERE `patient_id`='$patient_id'";
        $query_result = mysql_query($sql);
        return mysql_fetch_assoc($query_result);
    }
    function get_patient_info($patient_id){
        $sql = "SELECT d.`doctor_title`,d.`doctor_first_name`,`doctor_last_name`,p.`patient_name`,p.`patient_gender`,p.`patient_dob` 
                FROM `tbl_patient` AS p,`tbl_doctor` AS d 
                WHERE `patient_id`='$patient_id' AND d.`doctor_id` = p.`doctor_id`";
        $query_result = mysql_query($sql);
        return mysql_fetch_assoc($query_result);
    }
}
