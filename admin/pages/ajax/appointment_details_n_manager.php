<?php
session_start();
require_once '../../classes/admin.php';
require_once '../../classes/doctor.php';
require_once '../../classes/nurse.php';
$obj_admin = new Admin();
$obj_doctor = new Doctor();
$obj_nurse = new Nurse();
$result = $_SESSION['result'];
if (isset($_GET['doctor_id'])) {
    $doctor_id = $_GET['doctor_id'];
    ?>
    <select onchange="get_shift_id_for_appointment_list(this.value,<?php echo $doctor_id ?>, 'appointment_list')">
        <option>Select Shift...</option>
        <?php
        $all_shift = $obj_admin->select_all_shift();
        while ($row = mysql_fetch_assoc($all_shift)) {
            ?>
            <option value="<?php echo $row['shift_id']; ?>"><?php echo $row['shift_name']; ?></option>
            <?php
        }
        ?>
    </select>
    <?php
//            unset($_SESSION['doctor_id']);
}
if (isset($_GET['shift_id'])) {
    $shift_id = $_GET['shift_id'];
    $doctor_id = $_GET['doc_id'];
    $date = new DateTime();
    $current_date = $date->format('Y-m-d');
//    $current_date = "2015-09-07";
    ?>
    <div class="box-body table-responsive col-lg-12">
        <table class="table table-hover table-bordered" >
            <tr>
                <th>Serial No</th>
                <th>ID</th>
                <th>Name</th>
                <th>Phone Number</th>
                <th>Time</th>
                <th>Status</th>
            </tr>
            <?php
            $all_appointment_list = $obj_nurse->get_appointment_list_for_prescription($doctor_id, $shift_id, $current_date);
            while ($row1 = mysql_fetch_assoc($all_appointment_list)) {
                ?>
                <tr>
                    <td align="center"><?php echo $row1['time_slot_serial']; ?></td>
                    <td><?php echo $row1['patient_reg_id']; ?></td>
                    <td><?php echo $row1['patient_name']; ?></td>
                    <td><?php echo $row1['patient_phone_number']; ?></td>
                    <td><?php echo $row1['time_slot_time']; ?></td>
                    <td>
                        <?php
                        $patient_id_n_pres = $obj_nurse->get_all_patient_id_n_prescription($doctor_id, $current_date);
                        $patient_id_n_pres_array = array();
                        while ($row2 = mysql_fetch_assoc($patient_id_n_pres)) {
                            $patient_id_n_pres_array[] = $row2['patient_id'];
                        }
                        if (in_array($row1['patient_id'], $patient_id_n_pres_array)) {
                            $prescription_nurse_id_doctor_array = array();
                            $prescription_nurse_id_nurse = $obj_nurse->get_prescription_nurse_id_nurse($doctor_id,$row1['patient_id'],$result['nurse_id'],$current_date);
                            $prescription_nurse_id_doctor = $obj_doctor->get_prescription_nurse_id_doctor();
                            while ($row3 = mysql_fetch_assoc($prescription_nurse_id_doctor)) {
                                $prescription_nurse_id_doctor_array[] = $row3['prescription_nurse_id'];
                            }
                            if(in_array($prescription_nurse_id_nurse['prescription_nurse_id'], $prescription_nurse_id_doctor_array)){
                                echo '<a href="?page=view_prescription&pnid='.$prescription_nurse_id_nurse['prescription_nurse_id'].'"><b style="color: #000">View Prescription</b></a>';
                            }else{
                                echo '<b style="color: #006600">View Prescription</b>';
                            }
                        } else {
                            ?>
                            <b style="color: #ff0000">Make Prescription</b>&nbsp;&nbsp;&nbsp;
                            <a href="?page=add_prescription_p&id=<?php echo $row1['patient_id']; ?>&did=<?php echo $doctor_id; ?>&nid=<?php echo $result['nurse_id']; ?>&ad=<?php echo $current_date; ?>" class="glyphicon glyphicon-link"></a>
                            <?php
                        }
                        ?>

                    </td>
                </tr>
            <?php } ?>
        </table>
        <?php
    }