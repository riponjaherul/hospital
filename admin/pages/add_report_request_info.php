<section class="content-header">
        <h1>
            Make Prescription
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Prescription Manager</a></li>
            <li class="active">Make prescription</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->

            <!-- right column -->
            <div class="col-md-10 col-md-offset-1">
                <!-- Horizontal Form -->
                <div class="box box-warning">
                    <div class="box-header with-border">
                    </div><!-- /.box-header -->

                    <div class="box-body">
                        <form role="form" method="post" action="">
                            <div class="col-md-10">
                                <h4>Patient Information</h4>
                                <div class="col-md-2">
                                    <h4 style="font-size: 16px;">Reg ID</h4>
                                    <h4 style="font-size: 16px;">Name</h4>
                                </div>
                                <div class="col-md-10">
                                    <?php
                                    $patient_info = $obj_appointment->get_patient_info_for_appointment($patient_id);
                                    ?>
                                    <h4 style="font-size: 15px; color: #006600;"><?php echo $patient_info['patient_reg_id'] ?></h4>
                                    <h4 style="font-size: 15px; color: #006600;"><?php echo $patient_info['patient_name'] ?></h4>
                                </div>
                            </div>
                            <div class="col-md-10" style="padding-top: 20px;">
                                <h4>Primary Test Results</h4>
                                <?php
                                $nurse_prescription = $obj_nurse->get_nurse_prescription($doctor_id, $patient_id, $appointment_data);
                                ?>
                                <div class="col-md-6">
                                    <div class="col-md-4 col-md-offset-2">
                                        <span><strong>Weight</strong></span><br>
                                        <span><strong>Diabetics</strong></span>
                                    </div>
                                    <div class="col-md-6">
                                        <span style="color: #006600;"><strong><?php echo $nurse_prescription['patient_weight']; ?></strong></span><br>
                                        <span style="color: #006600;"><strong><?php echo $nurse_prescription['patient_suger']; ?></strong></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-5 col-md-offset-1">
                                        <span><strong>Temperature</strong></span><br>
                                        <span><strong>Blood Pressure</strong></span>
                                    </div>
                                    <div class="col-md-6">
                                        <span style="color: #006600;"><strong><?php echo $nurse_prescription['patient_tempetature']; ?></strong></span><br>
                                        <span style="color: #006600;"><strong><?php echo $nurse_prescription['patient_blood_pressure']; ?></strong></span>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="prescription_nurse_id" value="<?php echo $nurse_prescription['prescription_nurse_id'] ?>">
                            <div class="col-md-10" style="padding-top: 20px;">
                                <h4>Patient History</h4>
                                <div class="form-group col-md-8">
                                    <textarea class="form-control" name="patient_history" rows="5" cols="4" placeholder="Enter ..."></textarea>
                                </div>
                            </div>
                            <div class="col-md-12" style="padding-top: 20px;">
                                <div class="form-group">
                                    <h4>Medicine Information</h4>
                                    <table id="mytable" class="table table-bordered table-responsive">
                                        <tr>
                                            <th>Name</th>
                                            <th>Unit</th>
                                            <th>Dosage</th>
                                            <th>Time</th>
                                            <th>Total Days</th>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="drug_name[]" placeholder="Drug Name" /></td>
                                            <td><input type="text" name="drug_unit[]" placeholder="Unit (tablet or syrup)" /></td>
                                            <td><input type="text" name="drug_dosage[]" placeholder="1+1+1" /></td>
                                            <td id="select_medicine">
                                                <select name="drug_time[]">
                                                    <option value=" ">Select Time ....</option>
                                                    <?php
                                                    $medicine_time = $obj_admin->get_medicine_time();
                                                    while ($row = mysql_fetch_assoc($medicine_time)) {
                                                        echo '<option value="' . $row['medicine_time_id'] . '">' . $row['medicine_time_name'] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                            <td><input type="text" name="drug_expire[]" placeholder="how many days" /></td>
                                        </tr>
                                    </table>
                                    <div class="col-md-2">
                                        <button type="button" onclick="add_medicine()" class="btn btn-block btn-default">Add Medicine&nbsp;&nbsp;&nbsp;+</button>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <button type="submit" name="btn_test" class="btn btn-block btn-social btn-twitter">
                                            <i class="fa fa-twitter"></i> Add Test
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-10" style="padding-top: 20px;">
                                <div class="box-footer">
                                    <button type="submit" name="btn_save" class="btn btn-primary btn-lg">Save</button>
                                </div>
                            </div>
                        </form>
                    </div><!-- /.box-body -->

                </div><!-- /.box -->

            </div><!--/.col (right) -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->