<?php
session_start();
require_once '../../../view/classes/view.php';
$obj_view = new View();

if (isset($_GET['value_id'])) {
    $value = intval($_GET['value_id']);
    ?>
    <td>Doctor Name  </td>
    <td>
        <select name="doctor_id" onchange="get_doctor_id_for_shift(this.value);
                ">
            <option value=" ">Select Doctor...</option>
            <?php
            $select_doctor_by_single_dept = $obj_view->select_doctor_by_single_dept($value);
            while ($row = mysql_fetch_assoc($select_doctor_by_single_dept)) {
                ?>
                <option value="<?php echo $row['doctor_id']; ?>"><?php echo $row['doctor_title'] . ' ' . $row['doctor_first_name'] . ' ' . $row['doctor_last_name']; ?></option>
                <?php
            }
            ?>
        </select>
    </td>
    <?php
}
?>

<?php
if (isset($_GET['get_doctor_id'])) {
    $doctor_id = $_GET['get_doctor_id'];
    $_SESSION['doctor_id'] = $doctor_id;
    $single_doctor_data = $obj_view->single_doctor_data($doctor_id);
    $result_single_data = mysql_fetch_assoc($single_doctor_data);
    ?>
    <br><br><br><td colspan="2" style="width: 200px;"><?php print_r($result_single_data); ?></td>
    <?php
}

if (isset($_GET['get_doctor_id_for_shift'])) {
    ?>
    <td> Shift Name </td>
    <td>
        <select name="shift_id" onchange="get_time_slot(this.value)" >
            <option value=" ">Select Shift...</option>
            <?php
            $select_all_shift = $obj_view->select_all_shift();
            while ($row1 = mysql_fetch_assoc($select_all_shift)) {
                ?>
                <option value="<?php echo $row1['shift_id']; ?>"><?php echo $row1['shift_name']; ?></option>
                <?php
            }
            ?>
        </select>
    </td>
    <?php
}

if (isset($_GET['get_shift_id'])) {
    $shift_id = $_GET['get_shift_id'];
    ?>
    <td> Select Time </td>
    <td>
        <select name="time_slot_id" onchange="get_time_slot_id(this.value)">
            <option value=" ">Select Time...</option>
            <?php
            $total_time_slot = $obj_view->select_total_time_slot($shift_id);
            $total_slot_array = array();
            while ($row = mysql_fetch_assoc($total_time_slot)) {
                $total_slot_array[] = $row['time_slot_id'];
            }
            $doctor_id_by_sess = $_SESSION['doctor_id'];
            $appointment_date_by_sess = $_SESSION['user_date'];
            $total_use_time_slot = $obj_view->select_use_time_slot($shift_id,$doctor_id_by_sess,$appointment_date_by_sess);
            $total_use_slot_array = array();
            while ($row1 = mysql_fetch_assoc($total_use_time_slot)) {
                $total_use_slot_array[] = $row1['time_slot_id'];
            }
            $available_time_slot = array_diff($total_slot_array, $total_use_slot_array);
            $remaining_time_slot = $obj_view->remaining_time_slot($available_time_slot);
            foreach ($remaining_time_slot as $time_slot) {
                ?>
                <option value="<?php echo $time_slot['time_slot_id']; ?>"><?php echo $time_slot['time_slot_time']; ?></option>
                <?php
            }
            ?>
        </select>
    </td>
    <?php
        unset($_SESSION['doctor_id']);
        unset($_SESSION['user_date']);
}

if (isset($_GET['get_time_slot_id'])) {
    ?>
    <td>Patient Reg ID</td>
    <td><input type="text" name="patient_reg_id" value="" onblur="get_patient_name(this.value)"></td>
    <?php
}

if (isset($_GET['patient_reg_id'])) {
    $patient_reg_id = $_GET['patient_reg_id'];
    $get_name_by_reg_id = $obj_view->get_name_by_reg_id($patient_reg_id);
    $result_patient_data = mysql_fetch_assoc($get_name_by_reg_id);
    if ($result_patient_data != NULL) {
        ?>
        <td>
            <table>
                <tr>
                    <td>Patient Name </td>
                    <td><?php
                        echo $result_patient_data['patient_name'];
                        ?></td>
                </tr>
                <tr>
                    <td>Patient Mobile Number </td>
                    <td><?php
                        echo $result_patient_data['patient_phone_number'];
                        ?></td>
                </tr>
                <td><input type="submit" name="btn" value="Make Appointment"></td>
            </table>
        </td>
        <?php
    } else {
        echo '<span style="color:red">Not match Reg ID</span>';
    }
}
?>