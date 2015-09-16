<?php
if (isset($_GET['id']) && isset($_GET['did']) && isset($_GET['nid']) && isset($_GET['ad'])) {
    if (isset($_POST['btn_nrs_pres'])) {
        $obj_nurse->make_prescription_for_nurse($_POST);
    }
    ?>
    <section class="content-header">
        <h1>
            Make Prescription
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Appointment Manager</a></li>
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
                            <?php
                            if (isset($_SESSION['message'])) {
                                echo $_SESSION['message'];
                                unset($_SESSION['message']);
                            }
                            ?>
                            <div class="form-group col-md-12">
                                <div class="col-md-3">
                                    <label>Sugar</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="patient_suger" placeholder="Sugar" />
                                    <input type="hidden" name="patient_id" value = "<?php echo $_GET['id']; ?>" />
                                    <input type="hidden" name="doctor_id"  value = "<?php echo $_GET['did']; ?>" />
                                    <input type="hidden" name="nurse_id"  value = "<?php echo $_GET['nid']; ?>" />
                                    <input type="hidden" name="appointment_date" value = "<?php echo $_GET['ad']; ?>" />
                                </div><br><br><br>
                                <div class="col-md-3">
                                    <label>Weight</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="patient_weight" placeholder="Weight" />
                                </div><br><br><br>
                                <div class="col-md-3">
                                    <label>Temperature</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="patient_tempetature" placeholder="Temperature" />
                                </div><br><br><br>
                                <div class="col-md-3">
                                    <label>Blood Pressure</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="patient_blood_pressure" placeholder="up/down" />
                                </div><br><br><br>
                                <div class="box-footer col-md-3 col-md-offset-4">
                                    <button type="submit" name="btn_nrs_pres" class="btn btn-primary btn-lg">Save</button>
                                </div>
                        </form>
                    </div><!-- /.box-body -->

                </div><!-- /.box -->

            </div><!--/.col (right) -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
    <?php
    unset($_SESSION['d_id']);
}