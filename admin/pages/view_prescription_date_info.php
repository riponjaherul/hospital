<?php
if ($_GET['date']) {
    $patient_id = $_GET['pid'];
    $appointment_data = $_GET['date'];
    if ($_GET['rstatus'] == 0) {
        $obj_appointment->set_read_status($_GET['pnid']);
    }
    ?>
    <section class="content-header">
        <h1>
            View Prescription
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Appointment Manager</a></li>
            <li class="active">View Prescription</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="invoice">
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                <?php
                $doctor_id = $obj_doctor->get_doctor_id_appointment_date($patient_id, $appointment_data);
                $doctor_info = $obj_doctor->get_doctor_info_doctor_id($doctor_id['doctor_id']);
                ?>
                Department of <span><?php echo $doctor_info['department_name']; ?></span>
                <address>
                    <strong style="font-size: 18px;"><?php echo $doctor_info['doctor_title'] . ' ' . $doctor_info['doctor_first_name'] . ' ' . $doctor_info['doctor_last_name'] ?></strong><br>
                    <?php echo $doctor_info['doctor_qualification']; ?><br>
                    Email: <?php echo $doctor_info['doctor_email_address']; ?>
                </address>
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">

            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <?php
//                $patient_id = $obj_patient->get_patient_id_nurse_pres_id($pres_nurse_id);
                $patient_info = $obj_patient->get_patient_info_patient_id($patient_id);
                ?>
                Date : 
                <address>
                    <strong style="font-size: 18px;"><?php echo $patient_info['patient_name']; ?></strong><br>
                    ID : <?php echo $patient_info['patient_reg_id']; ?><br>
                    Gender : <?php echo $patient_info['patient_gender']; ?><br>
                </address>
            </div><!-- /.col -->
        </div><!-- /.row -->

        <div class="row">
            <?php
            $doctor_pres_info = $obj_doctor->get_doctor_pres_info($doctor_id['prescription_nurse_id']);
            ?>
            <!-- accepted payments column -->
            <div class="col-xs-6">
                <h4 class="lead">Clinical History</h4>
                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                    <?php echo $doctor_pres_info['patient_history']; ?>
                </p>
            </div><!-- /.col -->
            <div class="col-xs-6">
            </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row">
            <?php
            $pres_nurse_info = $obj_nurse->get_nurse_pres_info($doctor_id['prescription_nurse_id']);
            ?>
            <!-- accepted payments column -->
            <div class="col-xs-3">
                <h4>Weight : <span style="font-weight: bold;"><?php echo $pres_nurse_info['patient_weight']; ?></span></h4>
            </div><!-- /.col -->
            <div class="col-xs-3">
                <h4>Diabetics : <span style="font-weight: bold;"><?php echo $pres_nurse_info['patient_suger']; ?></span></h4>
            </div><!-- /.col -->
            <div class="col-xs-3">
                <h4>Temperature : <span style="font-weight: bold;"><?php echo $pres_nurse_info['patient_tempetature']; ?></span></h4>
            </div><!-- /.col -->
            <div class="col-xs-3">
                <h4>Blood Pressure : <span style="font-weight: bold;"><?php echo $pres_nurse_info['patient_blood_pressure']; ?></span></h4>
            </div><!-- /.col -->
        </div><!-- /.row -->
        <!-- Table row -->
        <div class="row" style="padding-top: 20px;">
            <div class="col-xs-12 table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Unit</th>
                            <th>Dosage</th>
                            <th>Time</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <?php
                    $drug_name = unserialize($doctor_pres_info['drug_name']);
                    $drug_unit = unserialize($doctor_pres_info['drug_unit']);
                    $drug_dosage = unserialize($doctor_pres_info['drug_dosage']);
                    $drug_time = unserialize($doctor_pres_info['drug_time']);
                    $drug_expire = unserialize($doctor_pres_info['drug_expire']);
                    ?>
                    <tbody>
                        <?php
                        for ($i = 0; $i < count($drug_name); $i++) {
                            ?>
                            <tr>
                                <td><?php echo $i + 1; ?></td>
                                <td><?php echo $drug_name[$i]; ?></td>
                                <td><?php echo $drug_unit[$i]; ?></td>
                                <td><?php echo $drug_dosage[$i]; ?></td>
                                <td><?php
                                    $medisine_time = $obj_admin->get_medisine_time($drug_time[$i]);
                                    echo $medisine_time['medicine_time_name'];
                                    ?></td>
                                <td><?php echo $drug_expire[$i]; ?> Days</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div><!-- /.col -->
        </div><!-- /.row -->
        <?php
        if ($doctor_pres_info['test_status'] == 1) {
            ?>
            <div class="row">
                <!-- accepted payments column -->
                <div class="col-xs-6">
                    <h4 class="lead">Request Report</h4>
                    <ol>
                        <?php
                        $all_test = $obj_admin->get_all_test($doctor_id['prescription_nurse_id']);
                        while ($row = mysql_fetch_assoc($all_test)) {
                            echo '<li>' . $row['test_name'] . '</li>';
                        }
                        ?>
                    </ol>
                </div><!-- /.col -->
                <div class="col-xs-6">
                </div><!-- /.col -->
            </div><!-- /.row -->
        <?php } ?>
        <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-6">
                <h4 class="lead">Diet</h4>
                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                    <?php echo $doctor_pres_info['diet_request']; ?>
                </p>
            </div><!-- /.col -->
            <div class="col-xs-6">
                <h4 class="lead">Comments</h4>
                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                    <?php echo $doctor_pres_info['doctor_comments']; ?>
                </p>
            </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-6">
                <h4 class="lead">Signature</h4>
                <span><img src="uploads/<?php echo $doctor_info['doctor_signature']; ?>" height="50" width="100"></span>
                <h4><?php echo $doctor_info['doctor_title'] . ' ' . $doctor_info['doctor_first_name'] . ' ' . $doctor_info['doctor_last_name'] ?></h4>
            </div><!-- /.col -->
            <div class="col-xs-6">
            </div><!-- /.col -->
        </div><!-- /.row -->

        <!-- this row will not appear when printing -->
        <div class="row no-print" style="padding-top: 20px;">
            <div class="col-xs-12">
                <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>
            </div>
        </div>
    </section><!-- /.content -->
    <div class="clearfix"></div>
    <?php
}