<?php
if (isset($_GET['id']) && isset($_GET['did'])) {
    $reg_id = $_GET['id'];
    $patient_id = $obj_appointment->get_patient_id($reg_id);
    $doctor_id = $_GET['did'];
    $date = new DateTime();
    $current_date = $date->format('Y-m-d');
    $date->modify('-1 day');
    $start_date = $date->format('Y-m-d');
    $date->modify('-16 day');
    $end_date = $date->format('Y-m-d');
    $patient_reg_id_by_app_date = $obj_appointment->get_patient_reg_id_by_app_date($start_date, $end_date);
    $patient_reg_id = array();
    while ($row = mysql_fetch_assoc($patient_reg_id_by_app_date)) {
        $patient_reg_id[] = $row['patient_reg_id'];
    }


if (isset($_POST['btn_add'])) {
    $obj_appointment->add_appointment_bill($_POST);
}
?>
<div class="col-sm-6 col-sm-offset-2">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Add Appointment Bill</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal" method="post" action="">
            <div class="box-body">
                <div class="form-group">
                    <span><?php
                        if(isset($_SESSION['message'])){
                            echo $_SESSION['message'];
                            unset($_SESSION['message']);
                        }
                    ?></span>
                    <label for="inputEmail3" class="col-sm-4 control-label">Enter Amount</label>
                    <div class="col-sm-8">
                        <input type="text" name="appointment_bill_amount" class="form-control" id="inputEmail3" placeholder="Amount">
                        <input type="hidden" name="patient_id" value="<?php echo $patient_id; ?>">
                        <input type="hidden" name="doctor_id" value="<?php echo $doctor_id; ?>">
                        <input type="hidden" name="appointment_date" value="<?php echo $current_date; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Discount Status</label>
                    <div class="col-sm-8">
                        <?php
                        if (in_array($reg_id, $patient_reg_id)) {
                            echo '<span style="color:#006600">Permitted</span>'
                            . '<input type="hidden" name="discount_status" value="1">';
                        } else {
                            echo '<span style="color:#ff0000">Not Permitted</span>'
                            . '<input type="hidden" name="discount_status" value="0">';
                        }
                        ?>
                    </div>
                </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" name="btn_add" class="btn btn-info pull-right">Add Amount</button>
            </div><!-- /.box-footer -->
        </form>
    </div><!-- /.box -->
</div>
<?php
}