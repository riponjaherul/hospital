<?php
if (isset($_GET['sid'])) {
    $shift_id = $_GET['sid'];
    if (isset($_POST['btn_report'])) {
        $obj_doctor->save_prescription_doctor_with_test($_POST, $shift_id);
    }
    ?>
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
                            <input type="hidden" name="prescription_nurse_id" value="<?php echo $_SESSION['prescription_nurse_id'] ?>">
                            <div class="col-md-10">
                                <h4>Patient Information</h4>
                                <div class="col-md-2">
                                    <h4 style="font-size: 16px;">Reg ID</h4>
                                    <h4 style="font-size: 16px;">Name</h4>
                                </div>
                                <div class="col-md-10">
                                    <?php
                                    $patient_info = $_SESSION['patient_info'];
                                    ?>
                                    <h4 style="font-size: 15px; color: #006600;"><?php echo $patient_info['patient_reg_id'] ?></h4>
                                    <h4 style="font-size: 15px; color: #006600;"><?php echo $patient_info['patient_name'] ?></h4>
                                </div>
                            </div>
                            <div class="col-md-12" style="padding-top: 20px;">
                                <h4>Primary Test Results</h4>
                                <?php
                                $report_department = $obj_admin->get_report_department();
                                while ($row = mysql_fetch_assoc($report_department)) {
                                    ?>
                                    <div class="col-md-6">
                                        <span class="glyphicon glyphicon-th-large" style="font-weight: bold; font-size: 14px; padding-top: 10px;">&nbsp;<?php echo $row['test_category_name']; ?></span><br><br>
                                        <?php
                                        $report_request = $obj_admin->get_report_request_by_report_d_id($row['test_category_id']);
                                        while ($row1 = mysql_fetch_assoc($report_request)) {
                                            echo '<span style="font-size: 15px; padding-left: 10px;"><input type="checkbox" name="test_id[]" value="' . $row1['test_id'] . '">&nbsp;' . $row1['test_name'] . '</span><br>';
                                        }
                                        ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="col-md-10" style="padding-top: 20px;">
                                <div class="box-footer">
                                    <button type="submit" name="btn_report" class="btn btn-primary btn-lg">Save</button>
                                </div>
                            </div>
                        </form>
                    </div><!-- /.box-body -->

                </div><!-- /.box -->

            </div><!--/.col (right) -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
    <?php
    unset($_SESSION['patient_info']);
    unset($_SESSION['prescription_nurse_id']);
}