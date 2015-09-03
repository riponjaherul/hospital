<?php
$id = $_GET['id'];
$patient_id = $_GET['rid'];
if ($patient_id == 0) {
    $query_result2 = $obj_appointment->get_single_new_appointment($id);
    
    $appointment_data = mysql_fetch_assoc($query_result2);
    $_SESSION['appointment_data'] = $appointment_data;
    $temp_appointment_id = $appointment_data['appointment_temp_id'];
    $obj_appointment->update_appointment_temp($temp_appointment_id);
}

if (isset($_POST['btn_update'])) {
    $sess_appointment_data = $_SESSION['appointment_data'];
    $obj_appointment->update_registration_id($_POST, $appointment_data);
}
?>
<div class="col-sm-6 col-sm-offset-2">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Update Appointment</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal" method="post" action="">
            <div class="box-body">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Registration ID</label>
                    <div class="col-sm-8">
                        <input type="text" name="patient_reg_id" class="form-control" id="inputEmail3" placeholder="Registration ID">
                    </div>
                </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" name="btn_update" class="btn btn-info pull-right">Update</button>
            </div><!-- /.box-footer -->
        </form>
    </div><!-- /.box -->
</div>