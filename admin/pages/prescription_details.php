<?php
if (isset($_POST['btn'])) {
    $value = $_POST['medicine_number'];
}
if (isset($_POST['btn2'])) {
    $obj_admin->add_prescription($_POST);
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
                        <!-- text input -->
                        <div class="form-group">
                            <label>Select Patient</label>
                            
                            <select class="form-control select2" name="patient_id">
                                <option selected="selected">Select Patient ....</option>
                                <?php
                                $select_all_patient = $obj_admin->select_all_patient();
                                while ($row = mysql_fetch_assoc($select_all_patient)) {
                                    echo '<option value=' . $row['patient_id'] . '>' . $row['patient_name'] . '</option>';
                                }
                                ?>
                            </select>
                        </div><!-- /.form-group -->

                        <!-- textarea -->
                        <div class="form-group">
                            <label>History</label>
                            <textarea class="form-control" name="patient_histroy" rows="3" placeholder="Enter ..."></textarea>
                        </div>
                        <div class="form-group">
                            <label>Blood Pressure&nbsp; : &nbsp;</label>
                            <input type="text" name="patient_blood_pressure" placeholder="up/down" /><?php echo $space_1; ?>
                            <label>Temperature&nbsp; : &nbsp;</label>
                            <input type="text" name="patient_tempetature" placeholder="Temperature" /><?php echo $space_1; ?>
                            <label>Weight&nbsp; : &nbsp;</label>
                            <input type="text" name="patient_weight" placeholder="Weight" />
                        </div>
                        <label>Medicine Details</label><br>
                        <?php
                        for ($i = 0; $i < $value; $i++) {
                            ?>
                            <div class="form-group">
                                <span><?php echo $i + 1; ?></span><?php echo $space_1; ?>
                                <input type="text" name="patient_drug_name[]" placeholder="Drug Name" /><?php echo $space_2; ?>
                                <input type="text" name="patient_drug_unit[]" placeholder="Unit (tablet or syrup)" /><?php echo $space_2; ?>
                                <input type="text" name="patient_drug_dosage[]" placeholder="1+1+1" /><?php echo $space_2; ?>
                                <select name="patient_drug_time[]">
                                    <option >Select Time ....</option>
                                    <option>After Meal</option>
                                    <option>Before Meal</option>
                                </select><?php echo $space_2; ?>
                                <input type="text" name="patient_drug_expire_days[]" placeholder="how many days" />
                            </div>
                        <?php } ?>
                        <div class="box-footer">
                            <button type="submit" name="btn2" class="btn btn-primary btn-lg">Save</button>
                        </div>
                    </form>
                </div><!-- /.box-body -->

            </div><!-- /.box -->

        </div><!--/.col (right) -->
    </div>   <!-- /.row -->
</section><!-- /.content -->