<?php
if (isset($_GET['sid'])) {
    $s_id = $_GET['sid'];

    $doctor_id = $result['doctor_id'];
    $date = new DateTime();
    $current_date = $date->format('Y-m-d');
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
                        <table class="table table-responsive table-hover table-bordered" >
                            <tr>
                                <th>Serial No</th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Phone Number</th>
                                <th>Time</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            <?php
                            $all_appointment_list_doctor = $obj_doctor->get_all_appointment_list($doctor_id, $s_id, $current_date);
                            while ($row = mysql_fetch_assoc($all_appointment_list_doctor)) {
                                ?>
                                <tr>
                                    <td align="center"><?php echo $row['time_slot_serial']; ?></td>
                                    <td><?php echo $row['patient_reg_id']; ?></td>
                                    <td><a href="?page=patient_details&id=<?php echo $row['patient_id']; ?>"><?php echo $row['patient_name']; ?></a></td>
                                    <td><?php echo $row['patient_phone_number']; ?></td>
                                    <td><?php echo $row['time_slot_time']; ?></td>
                                    <td>
                                        <?php
                                        $patient_id_n_pres = $obj_nurse->get_all_patient_id_n_prescription($doctor_id, $current_date);
                                        $patient_id_n_pres_array = array();
                                        while ($row2 = mysql_fetch_assoc($patient_id_n_pres)) {
                                            $patient_id_n_pres_array[] = $row2['patient_id'];
                                        }
                                        if (!in_array($row['patient_id'], $patient_id_n_pres_array)) {
                                            echo '<b style="color: #ff0000">Not Available</b>';
                                        } else {
                                            $prescription_nurse_id_doctor_array = array();
                                            $nurse_prescription_id = $obj_nurse->get_nurse_prescription($doctor_id, $row['patient_id'], $current_date);
                                            $prescription_nurse_id_doctor = $obj_doctor->get_prescription_nurse_id_doctor();
                                            while ($row3 = mysql_fetch_assoc($prescription_nurse_id_doctor)) {
                                                $prescription_nurse_id_doctor_array[] = $row3['prescription_nurse_id'];
                                            }
                                            if (in_array($nurse_prescription_id['prescription_nurse_id'], $prescription_nurse_id_doctor_array)) {
                                                echo '<a href="?page=view_prescription&pnid='.$nurse_prescription_id['prescription_nurse_id'].'"><b style="color: #000">View Prescription</b></a>';
                                            } else {
                                                ?>
                                                <b style="color: #006600">Make Prescription</b>&nbsp;&nbsp;&nbsp;
                                                <a href="?page=add_prescription_d&id=<?php echo $row['patient_id']; ?>&did=<?php echo $doctor_id; ?>&sid=<?php echo $s_id; ?>&ad=<?php echo $current_date; ?>" class="glyphicon glyphicon-link"></a>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </td>
                                    <td></td>
                                </tr>         
                                <?php
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div><!-- /.box -->
        </div>
    </section><!-- /.content -->
    <?php
}