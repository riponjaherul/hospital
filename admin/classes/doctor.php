<?php

class Doctor extends Admin {

    public function __construct() {
        parent::__construct();
    }

    function get_all_appointment_list($doctor_id, $s_id, $current_date) {
        /* Previous uses for list of 
           appointment with 
           interconnect appointmnet Manager  */
       /* $sql = "SELECT t.`time_slot_serial`,a.`patient_reg_id`,p.`patient_id`,p.`patient_name`,
                    p.`patient_phone_number`,t.`time_slot_time` 
                 FROM `tbl_appointment` AS a, `tbl_time_slot` AS t ,`tbl_patient` AS p,`tbl_appointment_bill` AS ab
                 WHERE a.`appointment_date`='$current_date' AND t.`time_slot_id`=a.`time_slot_id` AND a.`shift_id`='$s_id' "
                . " AND p.`patient_reg_id`=a.`patient_reg_id` AND a.`doctor_id` = '$doctor_id' AND p.`patient_id` = ab.`patient_id`
                 ORDER BY `time_slot_serial` ASC"; */
        
        /* Previous uses for list of 
           appointment with 
           interconnect appointmnet Manager  */
        
        $sql = "SELECT t.`time_slot_serial`,a.`patient_reg_id`,p.`patient_id`,p.`patient_name`,
                    p.`patient_phone_number`,t.`time_slot_time` 
                 FROM 
					  `tbl_appointment` AS a, 
					  `tbl_time_slot` AS t ,
					  `tbl_patient` AS p
                 WHERE 
					  a.`appointment_date`='$current_date' 
					  AND t.`time_slot_id`=a.`time_slot_id` 
					  AND a.`shift_id`='$s_id' 
                 AND p.`patient_reg_id`=a.`patient_reg_id` 
					  AND a.`doctor_id` = '$doctor_id' 
                 ORDER BY `time_slot_serial` ASC";
        return mysql_query($sql);
    }

    function save_prescription_doctor($data, $test_status,$shift_id) {
//        echo '<pre>';
//        print_r($data);
//        echo $test_status;
        $drug_name = serialize($data['drug_name']);
        $drug_unit = serialize($data['drug_unit']);
        $drug_dosage = serialize($data['drug_dosage']);
        $drug_time = serialize($data['drug_time']);
        $drug_expire = serialize($data['drug_expire']);

        $sql = "INSERT INTO `tbl_prescription_doctor`(`prescription_nurse_id`,`patient_history`,`drug_name`,`drug_unit`,`drug_dosage`,`drug_time`,`drug_expire`,`diet_request`,`doctor_comments`,`test_status`)
                VALUES('$data[prescription_nurse_id]','$data[patient_history]','$drug_name','$drug_unit','$drug_dosage','$drug_time','$drug_expire','$data[diet_request]','$data[doctor_comments]','$test_status');";
        if($test_status==1){
            mysql_query($sql);
        }else{
            mysql_query($sql);
            header('Location:?page=view_appointment_d&sid='.$shift_id);
        }
    }

    function save_prescription_doctor_with_test($data,$shift_id) {
        $test_id = $data['test_id'];
        for ($i = 0; $i < count($test_id); $i++) {
            mysql_query("INSERT INTO `tbl_prescription_doctor_test`(`prescription_nurse_id`,`test_id`)
                VALUES('$data[prescription_nurse_id]','$test_id[$i]')");
        }
        header('Location:?page=view_appointment_d&sid='.$shift_id);
    }
    function get_prescription_nurse_id_doctor(){
        $sql = "SELECT `prescription_nurse_id` FROM `tbl_prescription_doctor`";
        return mysql_query($sql);
    }

    function get_doctor_id_nurse_pres_id($pres_nurse_id){
        $sql = "SELECT `doctor_id` FROM `tbl_prescription_nurse` WHERE `prescription_nurse_id`='$pres_nurse_id'";
        $query_result = mysql_query($sql);
        return mysql_fetch_assoc($query_result);
    }
    function get_doctor_info_doctor_id($doctor_id){
        $sql = "SELECT d.`department_name`,doc.`doctor_title`,doc.`doctor_first_name`,doc.`doctor_last_name`,doc.`doctor_qualification`,doc.`doctor_email_address`,doc.`doctor_signature`
                FROM `tbl_department` AS d, `tbl_doctor` As doc 
                WHERE d.`department_id` = doc.`department_id` AND doc.`doctor_id` = '$doctor_id'";
        $query_result = mysql_query($sql);
        return mysql_fetch_assoc($query_result);
    }
    function get_doctor_pres_info($pres_nurse_id){
        $sql = "SELECT `patient_history`,`drug_name`,`drug_unit`,`drug_dosage`,`drug_time`,`drug_expire`,`diet_request`,`doctor_comments`,`test_status` "
                . "FROM `tbl_prescription_doctor` "
                . "WHERE `prescription_nurse_id`='$pres_nurse_id' ";
        $query_result = mysql_query($sql);
        return mysql_fetch_assoc($query_result);
    }
    function get_doctor_id_appointment_date($patient_id,$appointment_data){
        $sql = "SELECT `doctor_id`,`prescription_nurse_id` FROM `tbl_prescription_nurse` WHERE `patient_id`='$patient_id' AND `appointment_date` = '$appointment_data'";
        $query_result = mysql_query($sql);
        return mysql_fetch_assoc($query_result);
    }
}
