<?php
//require_once 'admin.php';
class Nurse extends Admin {
    public function __construct() {
        parent::__construct();
    }
    
    public function add_managing_nurse($data) {
        $sql = "INSERT INTO `tbl_nurse_manager`(department_id,nurse_id)
                    VALUES('$data[department_id]','$data[nurse_id]')";
        mysql_query($sql);
        $_SESSION['message'] = '<span style="color:green">Manage Nurse Successfully</span>';
    }
    function get_department_n_manager($id){
        $sql = "SELECT d.`department_id`,d.`department_name` 
                FROM `tbl_department` AS d, `tbl_nurse_manager` AS n
                WHERE d.`department_id`=n.`department_id` AND n.`nurse_id` = '$id'";
        return mysql_query($sql);
    }
    function get_appointment_list_for_prescription($doctor_id,$shift_id,$current_date){
        $sql  = "SELECT t.`time_slot_serial`,a.`patient_reg_id`,p.`patient_id`,p.`patient_name`,
                    p.`patient_phone_number`,t.`time_slot_time` 
                 FROM `tbl_appointment` AS a, `tbl_time_slot` AS t ,`tbl_patient` AS p,`tbl_appointment_bill` AS ab
                 WHERE a.`appointment_date`='$current_date' AND t.`time_slot_id`=a.`time_slot_id` AND a.`shift_id`='$shift_id'  AND p.`patient_reg_id`=a.`patient_reg_id` AND a.`doctor_id` = '$doctor_id' AND p.`patient_id` = ab.`patient_id`
                 ORDER BY `time_slot_serial` ASC";
        return mysql_query($sql);
    }
    function make_prescription_for_nurse($data){
        $d_id = $_SESSION['d_id'];
        $sql = "INSERT INTO `tbl_prescription_nurse`(`patient_suger`,`doctor_id`,`patient_id`,`nurse_id`,`appointment_date`,`patient_blood_pressure`,`patient_tempetature`,`patient_weight`)
                                              VALUES('$data[patient_suger]','$data[doctor_id]','$data[patient_id]','$data[nurse_id]','$data[appointment_date]','$data[patient_blood_pressure]','$data[patient_tempetature]','$data[patient_weight]')";
        if(!mysql_query($sql)){
            $_SESSION['message'] = '<span style="color:red">Does not save data</span>'.  mysql_error();
        }else{
            $_SESSION['message'] = '<span style="color:green">Make Prescription Successfully</span>';
            header('Location:?page=view_appointment_n&did='.$d_id);
        }
    }
    function get_all_patient_id_n_prescription($doctor_id,$current_date){
        $sql = "SELECT `patient_id` "
                . "FROM `tbl_prescription_nurse` "
                . "WHERE `doctor_id` = '$doctor_id' AND `appointment_date`='$current_date'";
        return mysql_query($sql);
    }
    function get_nurse_prescription($doctor_id,$patient_id,$appointment_data){
        $sql = "SELECT `prescription_nurse_id`,`patient_suger`,`patient_blood_pressure`,`patient_tempetature`,`patient_weight` 
                FROM `tbl_prescription_nurse` 
                WHERE `doctor_id` ='$doctor_id' AND `patient_id` = '$patient_id' AND `appointment_date` = '$appointment_data'";
        $query_result = mysql_query($sql);
        return mysql_fetch_assoc($query_result);
    }
    function get_prescription_nurse_id_nurse($doctor_id,$patient_id,$nurse_id,$current_date){
        $sql = "SELECT `prescription_nurse_id` "
                . "FROM `tbl_prescription_nurse` "
                . "WHERE `doctor_id`='$doctor_id' AND `patient_id` = '$patient_id' AND `nurse_id` = '$nurse_id' AND `appointment_date` = '$current_date'";
        $query_result = mysql_query($sql);
        return mysql_fetch_assoc($query_result);
    }
    function get_nurse_pres_info($pres_nurse_id){
        $sql = "SELECT `patient_suger`,`patient_blood_pressure`,`patient_tempetature`,`patient_weight` FROM `tbl_prescription_nurse` WHERE `prescription_nurse_id` = '$pres_nurse_id'";
        $query_result = mysql_query($sql);
        return mysql_fetch_assoc($query_result);
    }
}
