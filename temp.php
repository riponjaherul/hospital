<?php
//$value = array('RIPON','Amit','Touhid','Kafi');
//$s_value = array('RIPON','Touhid','Kafi');
//
//$t_value = in($value, $s_value);
////print_r($t_value);
//if($t_value == NULL){
//    echo 'not found';
//}else{
//    echo 'found';
//}
require_once './admin/classes/appointment.php';
$obj_appointment = new Appointment();
$doctor_id = 2;
//$patient_id_appointment = $obj_appointment->get_parient_id_for_appointment(2, '2015-09-07');
//$patient_id_bill = $obj_appointment->get_parient_id_for_bill($doctor_id, $get_date);
$patient_id_appointment = $obj_appointment->get_parient_id_for_appointment('R0179001');
$patient_id_bill = $obj_appointment->get_parient_id_for_bill($doctor_id,$patient_id_appointment, '2015-09-07');
//if ($target_array != NULL) {
