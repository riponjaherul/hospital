<?php
if (isset($_GET['id'])) {
    $patient_id = $_GET['id'];
    ?>
    <section class="content-header">
        <h1>
            Patient View
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Patient View</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <?php
                        $patient_info = $obj_patient->get_patient_info($patient_id);
                        $date = new DateTime();
                        $date1 = new DateTime($patient_info['patient_dob']);
                        $date2 = new DateTime($date->format('Y-m-d'));
                        $interval = $date1->diff($date2);
                        ?>
                        <div class="col-md-2">
                            <h3 class="box-title" style="font-size: 16px;">Name </h3><br>
                            <h4 class="box-title" style="font-size: 15px;">Age </h4><br>
                            <h4 class="box-title" style="font-size: 15px;">Gender </h4><br>
                            <h3 class="box-title" style="font-size: 16px;">Primary Doctor</h3>
                        </div>
                        <div class="col-md-3">
                            <?php echo $patient_info['patient_name']; ?><br>
                            <?php echo $interval->format('%y Y %m M %d D'); ?><br>
                            <?php echo $patient_info['patient_gender']; ?><br>
                            <?php echo $patient_info['doctor_title'] . ' ' . $patient_info['doctor_first_name'] . ' ' . $patient_info['doctor_last_name']; ?>
                        </div>
                        <div class="box-tools pull-right">
                            <div class="has-feedback">
                                <input type="text" class="form-control input-sm" placeholder="Search Mail" />
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
                                        <th></th>
                                        <th>Appointment Date</th>
                                        <th>Doctor Name</th>
                                        <th>Report Status</th>
                                        <th>Duration</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $all_appointment_patient_id = $obj_appointment->get_all_appointment_patinet_id($patient_id);
                                    while ($row = mysql_fetch_assoc($all_appointment_patient_id)) {
                                        $i = 1;
                                        ?>
                                    <tr <?php 
                                    if($row['read_status']==0){
                                        echo 'style="background-color: #e1e1e1;"';
                                    } else{
                                        echo '';
                                    }
                                        ?>>
                                            <td><?php echo $i; ?></td>
                                            <td class="mailbox-name"><a href="?page=view_prescription_date&pid=<?php echo $patient_id; ?>&date=<?php echo $row['appointment_date'] ?>&rstatus=<?php echo $row['read_status'] ?>&pnid=<?php echo $row['prescription_nurse_id']; ?>"><?php echo $row['appointment_date'] ?></a></td>
                                            <td class="mailbox-subject"><b></b><?php echo $row['doctor_title'].' '.$row['doctor_first_name'].' '.$row['doctor_last_name'] ?></td>
                                            <td class="mailbox-attachment"><?php 
                                                if($row['test_status']==1){
                                                    echo 'Yes';
                                                }else{
                                                    echo 'No';
                                                }
                                            ?></td>
                                            <td class="mailbox-date"><?php 
                                                    $date3 = new DateTime($row['appointment_date']);
                                                    $interval1 = $date3->diff($date2);
                                                    echo $interval1->format('%d').' days ago';
                                                    ?></td>
                                        </tr>
                                        <?php
                                        $i++;
                                    }
                                    ?>
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