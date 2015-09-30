<?php

class Patient extends Admin {

    public function __construct() {
        parent::__construct();
    }

    function get_patient_id_nurse_pres_id($pres_nurse_id) {
        $sql = "SELECT `patient_id` FROM `tbl_prescription_nurse` WHERE `prescription_nurse_id`='$pres_nurse_id'";
        $query_result = mysql_query($sql);
        return mysql_fetch_assoc($query_result);
    }

    function get_patient_info_patient_id($patient_id) {
        $sql = "SELECT `patient_reg_id`,`patient_name`,`patient_gender` FROM `tbl_patient` WHERE `patient_id`='$patient_id'";
        $query_result = mysql_query($sql);
        return mysql_fetch_assoc($query_result);
    }

    function get_patient_info($patient_id) {
        $sql = "SELECT d.`doctor_title`,d.`doctor_first_name`,`doctor_last_name`,p.`patient_name`,p.`patient_gender`,p.`patient_dob` 
                FROM `tbl_patient` AS p,`tbl_doctor` AS d 
                WHERE `patient_id`='$patient_id' AND d.`doctor_id` = p.`doctor_id`";
        $query_result = mysql_query($sql);
        return mysql_fetch_assoc($query_result);
    }
// change read_status is 0
    function get_no_of_unread_prescription($patient_id) {
        $sql = "SELECT count(`read_status`) AS total_read_status
                FROM `tbl_prescription_doctor` AS pd, `tbl_prescription_nurse` AS pn
                WHERE pd.`prescription_nurse_id` = pn.`prescription_nurse_id` AND pn.`patient_id`='$patient_id' AND pd.`read_status` = '1'";
        $query_result = mysql_query($sql);
        return mysql_fetch_assoc($query_result);
    }
// change read_status is 0
    function get_unread_prescription($patient_id) {
        $sql = "SELECT  d.`doctor_title`,d.`doctor_first_name`,d.`doctor_last_name`,pn.`appointment_date`,pd.`prescription_nurse_id`,pd.`read_status` 
                FROM `tbl_prescription_doctor` AS pd, `tbl_prescription_nurse` AS pn,`tbl_doctor` As d
                WHERE pd.`prescription_nurse_id` = pn.`prescription_nurse_id` AND pn.`doctor_id`=d.`doctor_id` AND pn.`patient_id`='$patient_id' AND pd.`read_status` = '1'
                ORDER BY `prescription_nurse_id` DESC";
        return mysql_query($sql);
    }

}
