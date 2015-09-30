<?php
if (isset($_GET['did']) && isset($_SESSION['user_access_for_nurse_manager'])) {
    $d_id = $_GET['did'];
    if (isset($_POST['btn'])) {
        $doctor_id = $_POST['doctor_id'];
        $shift_id = $_POST['shift_id'];
        $date = new DateTime();
        $current_date = $date->format('Y-m-d');
        $all_appointment_list = $obj_nurse->get_appointment_list_for_prescription($doctor_id, $shift_id, $current_date);
    }
    ?>
    <section class="content-header">
        <h1>
            Appointment
            <small>Appointment View</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Appointment Manager</a></li>
            <li class="active">Appointment View</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div >
                        </div><br>
                        <div class="col-lg-12">
                            <form method="post" action="">
                                <div class="col-lg-4">
                                    <select name="doctor_id">
                                        <?php
                                        if (isset($_POST[btn])) {
                                            $doctor_name = $obj_admin->get_single_doctor_name($doctor_id);
                                            echo '<option value="' . $doctor_id . '">' . $doctor_name['doctor_title'] . ' ' . $doctor_name['doctor_first_name'] . ' ' . $doctor_name['doctor_last_name'] . '</option>';
                                            $doctor_single_dept = $obj_admin->select_doctor_by_single_dept($d_id);
                                            while ($row = mysql_fetch_assoc($doctor_single_dept)) {
                                                ?>
                                                <option value="<?php echo $row['doctor_id']; ?>"><?php echo $row['doctor_title'] . ' ' . $row['doctor_first_name'] . ' ' . $row['doctor_last_name']; ?></option>
                                                <?php
                                            }
                                        } else {
                                            echo '<option>Select Doctor...</option>';
                                            $doctor_single_dept = $obj_admin->select_doctor_by_single_dept($d_id);
                                            while ($row = mysql_fetch_assoc($doctor_single_dept)) {
                                                ?>
                                                <option value="<?php echo $row['doctor_id']; ?>"><?php echo $row['doctor_title'] . ' ' . $row['doctor_first_name'] . ' ' . $row['doctor_last_name']; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <select name="shift_id">
                                        <?php
                                        if (isset($_POST['btn'])) {
                                            $shift_name = $obj_admin->get_single_shift_name($shift_id);
                                            echo '<option value="' . $shift_id . '">' . $shift_name['shift_name'] . '</option>';
                                            $all_shift = $obj_admin->select_all_shift();
                                            while ($row = mysql_fetch_assoc($all_shift)) {
                                                ?>
                                                <option value="<?php echo $row['shift_id']; ?>"><?php echo $row['shift_name']; ?></option>
                                                <?php
                                            }
                                        } else {
                                            echo '<option>Select Shift...</option>';
                                            $all_shift = $obj_admin->select_all_shift();
                                            while ($row = mysql_fetch_assoc($all_shift)) {
                                                ?>
                                                <option value="<?php echo $row['shift_id']; ?>"><?php echo $row['shift_name']; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <button type="submit" name="btn" value="filter">Filter</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!-- /.box-header -->
                <?php
                if (isset($_POST['btn'])) {
                    ?>
                    <div id="appointment_list">
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
                                                $prescription_nurse_id_nurse = $obj_nurse->get_prescription_nurse_id_nurse($doctor_id, $row1['patient_id'], $result['nurse_id'], $current_date);
                                                $prescription_nurse_id_doctor = $obj_doctor->get_prescription_nurse_id_doctor();
                                                while ($row3 = mysql_fetch_assoc($prescription_nurse_id_doctor)) {
                                                    $prescription_nurse_id_doctor_array[] = $row3['prescription_nurse_id'];
                                                }
                                                if (in_array($prescription_nurse_id_nurse['prescription_nurse_id'], $prescription_nurse_id_doctor_array)) {
                                                    echo '<a href="?page=view_prescription&pnid=' . $prescription_nurse_id_nurse['prescription_nurse_id'] . '" target="_blank"><b style="color: #000">View Prescription</b></a>';
                                                } else {
                                                    echo '<b style="color: #006600">View Prescription</b>';
                                                }
                                            } else {
                                                ?>
                                                <b style="color: #ff0000">Make Prescription</b>&nbsp;&nbsp;&nbsp;
                                                <a href="?page=add_prescription_p&id=<?php echo $row1['patient_id']; ?>&did=<?php echo $doctor_id; ?>&nid=<?php echo $result['nurse_id']; ?>&ad=<?php echo $current_date; ?>" target="_blank" class="glyphicon glyphicon-link"></a>
                                                <?php
                                            }
                                            ?>

                                        </td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                <?php } ?>
            </div><!-- /.box -->
    </section>
    <?php
}