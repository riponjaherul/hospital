<?php

require_once 'view.php';

class Appointment extends View {

    public function save_appointment_old($data) {
//        echo '<pre>';
//        print_r($data);
//        exit();
        $sql = "INSERT INTO tbl_appointment(doctor_id,patient_reg_id,appointment_date,shift_id,time_slot_id)
                VALUES('$data[doctor_id]','$data[patient_reg_id]','$data[appointment_date]','$data[shift_id]','$data[time_slot_id]')";
        if(!mysql_query($sql)){
            die('Do not insert '.mysql_error());
        }else{
            $_SESSION['message'] = "Your Appointment Save Successfully";
        }
    }
    public function save_appointment_new($data) {
//        echo '<pre>';
//        print_r($data);
//        exit();
        $sql = "INSERT INTO tbl_appointment_temp(doctor_id,appointment_date,time_slot_id,shift_id,patient_name,patient_phone_number)
                VALUES('$data[doctor_id]','$data[appointment_date]','$data[time_slot_id]','$data[shift_id]','$data[patient_name]','$data[patient_phone_number]')";
        if(!mysql_query($sql)){
            die('Do not insert '.mysql_error());
        }else{
            $_SESSION['message'] = "Your Appointment Save Successfully";
        }
    }

}
