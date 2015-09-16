<?php
if (isset($_SESSION['user_access_for_report_manager'])) {
    ?>
    <section class="content-header">
        <h1>
            Patient Report View
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Report View</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border" style="padding-bottom: 30px;">
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-3"></div>
                        <div class="box-tools pull-right">
                            <div class="has-feedback">
                                <input type="text" class="form-control input-sm" placeholder="Search" />
                                <span class="glyphicon glyphicon-search form-control-feedback"></span>
                            </div>
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                        <div class="mailbox-controls">
                            <!-- Check all button -->
                            <button class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>
                            <div class="btn-group">
                                <button class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                                <button class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                                <button class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                            </div><!-- /.btn-group -->
                            <button class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                            <div class="pull-right">

                                <div class="btn-group">
                                    <button class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                                    <button class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                                </div><!-- /.btn-group -->
                            </div><!-- /.pull-right -->
                        </div>
                        <div class="table-responsive mailbox-messages">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Doctor Name</th>
                                        <th>Appointment Date</th>
                                        <th>Duration</th>
                                        <th>Report Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $all_test = $obj_admin->get_all_test_for_report_manager();
                                    while ($row = mysql_fetch_assoc($all_test)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row['patient_reg_id']; ?></td>
                                            <td><?php echo $row['patient_name']; ?></td>
                                            <td><?php echo $row['doctor_title'] . ' ' . $row['doctor_first_name'] . ' ' . $row['doctor_last_name']; ?></td>
                                            <td><?php echo $row['appointment_date']; ?></td>
                                            <td>
                                                <?php
                                                $date = new DateTime();
                                                $date2 = new DateTime($date->format('Y-m-d'));
                                                $date3 = new DateTime($row['appointment_date']);
                                                $interval = $date3->diff($date2);
                                                echo $interval->format('%d') . ' days ago';
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    $pres_nurse_id_doctor_report_array = array();
                                                    $pres_nurse_id_report = $obj_report->get_pres_nurse_id_report($row['prescription_nurse_id']);
                                                    $pres_nurse_id_doctor_report = $obj_report->get_pres_id_doctor_report();
                                                    while ($row1 = mysql_fetch_assoc($pres_nurse_id_doctor_report)) {
                                                        $pres_nurse_id_doctor_report_array[] = $row['prescription_nurse_id'];
                                                    }
                                                    if(in_array($pres_nurse_id_report['prescription_nurse_id'], $pres_nurse_id_doctor_report_array)){
                                                        echo '<a style="color:green" href="#">View Report</a>';
                                                    }else{
                                                        echo '<a href="?page=add_report&pnid='.$row['prescription_nurse_id'].'">Add Report</a>';
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-default bg-aqua-gradient glyphicon glyphicon-trash"></button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table><!-- /.table -->
                        </div><!-- /.mail-box-messages -->
                    </div><!-- /.box-body -->
                    <div class="box-footer no-padding">
                        <div class="mailbox-controls">
                            <!-- Check all button -->
                            <button class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>
                            <div class="btn-group">
                                <button class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                                <button class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                                <button class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                            </div><!-- /.btn-group -->
                            <button class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                                    <button class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                                </div><!-- /.btn-group -->
                            </div><!-- /.pull-right -->
                        </div>
                    </div>
                </div><!-- /. box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
    <?php
}