<?php
session_start();
require_once '../../classes/admin.php';
require_once '../../classes/appointment.php';
$obj_admin = new Admin();
$obj_appointment = new Appointment();


if (isset($_GET['department_id'])) {
    $value = intval($_GET['department_id']);
    ?>
<select name="doctor_id" onchange="get_doctor_id(this.value, 'date_select')">
        <option>Select Doctor...</option>
        <?php
        $select_doctor_by_single_dept = $obj_admin->select_doctor_by_single_dept($value);
        while ($row = mysql_fetch_assoc($select_doctor_by_single_dept)) {
            ?>
            <option value="<?php echo $row['doctor_id']; ?>"><?php echo $row['doctor_title'] . ' ' . $row['doctor_first_name'] . ' ' . $row['doctor_last_name']; ?></option>
            <?php
        }
        ?>
    </select>
    <?php
}

if (isset($_GET['doctor_id'])) {
    $_SESSION['doctor_id'] = intval($_GET['doctor_id']);
    ?>
    <input type="date" name="selected_date" value="" placeholder="MM-DD-YYYY" onblur="get_selected_date(this.value, 'appointment_list')">
    <?php
}

if (isset($_GET['get_date'])) {
    $get_date = $_GET['get_date'];
    $doctor_id = $_SESSION['doctor_id'];
    ?>
    <div class="box-body table-responsive col-lg-12">
        <table class="table table-hover table-bordered" >
            <tr>
                <th>Serial No</th>
                <th>Shift Name</th>
                <th>ID</th>
                <th>Name</th>
                <th>Phone Number</th>
                <th>Time</th>
                <th>Confirmation</th>
                <th>Payment</th>
                <th>Action</th>
            </tr>
            <?php
            $appointment_list = $obj_appointment->select_all_appointment_list($get_date, $doctor_id);
            while ($row1 = mysql_fetch_assoc($appointment_list)) {
//               
                ?>
                <tr>
                    <td align="center"><?php echo $row1['time_slot_serial']; ?></td>
                    <td ><?php
                        if ($row1['shift_name'] == 'Morning') {
                            echo '<button class="btn btn-block btn-primary btn-xs">' . $row1['shift_name'] . '</button>';
                        } else {
                            echo '<button class="btn btn-block btn-warning btn-xs">' . $row1['shift_name'] . '</button>';
                        }
                        ?></td>
                    <td><?php
                        if ($row1['patient_reg_id'] == '0') {
                            echo '<button class="btn btn-block btn-xs" style="background-color:#33FFD6">New</button>';
                        } else {
                            echo '<button class="btn btn-block btn-default btn-xs">' . $row1['patient_reg_id'] . '</button>';
                        }
                        ?></td>
                    <td><b><?php echo $row1['patient_name']; ?></b></td>
                    <td><?php echo $row1['patient_phone_number']; ?></td>
                    <td><b style="color: #006666"><?php echo $row1['time_slot_time']; ?></b></td>
                    <td><?php
                        if ($row1['appointment_status'] == 0) {
                            echo '<b style="color: #ff0000">Pending</b>&nbsp;&nbsp;'
                            . '<a href="?option=change_appointment_status&id=' . $row1['appointment_id'] . '&rid=' . $row1['patient_reg_id'] . '" class="glyphicon glyphicon-link"></a>';
                        } else {
                            echo '<b style="color: #006600">Confirm</b>';
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($row1['appointment_status'] == 1) {
                            if ($row1['patient_reg_id'] == '0') {
                                echo '<b style="color: #ff0000">DUE</b>';
                            } else {
                                $patient_id_appointment = $obj_appointment->get_parient_id_for_appointment($row1['patient_reg_id']);
                                $patient_id_bill = $obj_appointment->get_parient_id_for_bill($doctor_id, $patient_id_appointment, $get_date);
                                if ($patient_id_bill != NULL) {
                                    ?>
                                    <b style="color: #006600">PAID</b>
                                    <?php
                                } else {
                                    ?>
                                    <b style="color: #ff0000">DUE</b>&nbsp;&nbsp;&nbsp;
                                    <a href="?page=appointment_payment&id=<?php echo $row1['patient_reg_id']; ?>&did=<?php echo $doctor_id; ?>" class="glyphicon glyphicon-link"></a>
                                    <?php
                                }
                            }
                        } else {
                            echo '<b style="color: #ff0000">Confirm First</b>';
                        }
                        ?>
                    </td>
                    <td>

                        <?php
                        if ($row1['appointment_status'] == 1) {
                            if ($row1['patient_reg_id'] == '0') {
                                echo '<a href="?page=edit_appointment&id=' . $row1['appointment_id'] . '&rid=' . $row1['patient_reg_id'] . '"><button class="btn btn-sm glyphicon glyphicon-edit" ></button></a>';
                            } else {
                                echo '<button class="btn btn-sm glyphicon glyphicon-edit disabled" ></button>';
                            }
                        } else {
                            echo '<button class="btn btn-sm glyphicon glyphicon-edit disabled" ></button>';
                        }
                        ?>
                        <a href="?option=pending_patient&id=<?php echo $row1['appointment_id']; ?>&rid=<?php echo $row1['patient_reg_id']; ?>"><button class="btn btn-sm glyphicon glyphicon-trash"></button></a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div><!-- /.box-body -->
    <?php
//            unset($_SESSION['doctor_id']);
}

