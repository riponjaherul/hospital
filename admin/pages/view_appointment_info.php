<?php
if (isset($_SESSION['user_access_for_registration_manager'])) {
    if (isset($_POST['btn'])) {
        $dep_id = $_POST['department_id'];
        $doc_id = $_POST['doctor_id'];
        $a_date = $_POST['selected_date'];
        $all_appointment_list = $obj_appointment->get_all_appointment_list($doc_id,$a_date);
    }
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
                        <div>

                        </div><br>
                        <div class="col-lg-12">
                            <form method="post" action="">
                                <div class="col-lg-3">
                                    <select name="department_id" onchange="get_department_id(this.value, 'doctor_list')">
                                        <?php
                                        if (isset($_POST['btn'])) {
                                            $dept_name = $obj_admin->get_single_department_name($dep_id);
                                            echo '<option value="' . $dep_id . '">' . $dept_name['department_name'] . '</option>';
                                        } else {
                                            ?>
                                            <option>Select Department...</option>
                                            <?php
                                            $all_department = $obj_admin->select_all_department();
                                            while ($row = mysql_fetch_assoc($all_department)) {
                                                ?>
                                                <option value="<?php echo $row['department_id']; ?>"><?php echo $row['department_name']; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-lg-3" id="doctor_list">
                                    <select name="doctor_id">
                                        <?php
                                        if (isset($_POST['btn'])) {
                                            $doctor_name = $obj_admin->get_single_doctor_name($doc_id);
                                            echo '<option value="' . $doc_id . '">' . $doctor_name['doctor_title'] . ' ' . $doctor_name['doctor_first_name'] . ' ' . $doctor_name['doctor_last_name'] . '</option>';
                                        } else {
                                            echo '<option>Select Doctor...</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-lg-3" id="date_select">
                                    <input type="date" name="selected_date" value="<?php
                                    if (isset($_POST['btn'])) {
                                        echo $a_date;
                                    }
                                    ?>" placeholder="MM-DD-YYYY">
                                </div>
                                <div class="col-lg-3" id="date_select">
                                    <button type="submit" name="btn" value="filter">Filter</button>
                                    <!--<input type="submit" name="btn" value="Filter">-->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- /.box-header -->
            <?php
            if (isset($all_appointment_list)) {
                ?>
                <div id="appointment_list">
                    <div class="box-body table-responsive col-lg-12">
                        <table class="table table-hover table-bordered" >
                            <tr>
                                <th>Serial No</th>
                                <th>Shift Name</th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Phone Number</th>
                                <th>Time</th>
                                <th>Confirmation</th>
                                <th>Payment</th>
                                <th>Action</th>
                            </tr>
                            <?php
//                    $appointment_list = $obj_appointment->select_all_appointment_list($get_date, $doctor_id);
                            while ($row1 = mysql_fetch_assoc($all_appointment_list)) {
//               
                                ?>
                                <tr>
                                    <td align="center"><?php echo $row1['time_slot_serial']; ?></td>
                                    <td ><?php
                                        if ($row1['shift_name'] == 'Morning') {
                                            echo '<button class="btn btn-block btn-primary btn-xs">' . $row1['shift_name'] . '</button>';
                                        } else {
                                            echo '<button class="btn btn-block btn-warning btn-xs">' . $row1['shift_name'] . '</button>';
                                        }
                                        ?></td>
                                    <td><?php
                                        if ($row1['patient_reg_id'] == '0') {
                                            echo '<button class="btn btn-block btn-xs" style="background-color:#33FFD6">New</button>';
                                        } else {
                                            echo '<button class="btn btn-block btn-default btn-xs">' . $row1['patient_reg_id'] . '</button>';
                                        }
                                        ?></td>
                                    <td><b><?php echo $row1['patient_name']; ?></b></td>
                                    <td><?php echo $row1['patient_phone_number']; ?></td>
                                    <td><b style="color: #006666"><?php echo $row1['time_slot_time']; ?></b></td>
                                    <td><?php
//                                    if ($row1['appointment_status'] == 0) {
//                                        echo '<b style="color: #ff0000">Pending</b>&nbsp;&nbsp;'
//                                        . '<a href="?option=change_appointment_status&id=' . $row1['appointment_id'] . '&rid=' . $row1['patient_reg_id'] . '" class="glyphicon glyphicon-link"></a>';
//                                    } else {
//                                        echo '<b style="color: #006600">Confirm</b>';
//                                    }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
//                                if ($row1['appointment_status'] == 1) {
                                        if ($row1['patient_reg_id'] == '0') {
                                            echo '<b style="color: #ff0000">DUE</b>';
                                        } else {
                                            $patient_id_appointment = $obj_appointment->get_parient_id_for_appointment($row1['patient_reg_id']);
                                            $patient_id_bill = $obj_appointment->get_parient_id_for_bill($doc_id, $patient_id_appointment, $a_date);
                                            if ($patient_id_bill != NULL) {
                                                ?>
                                                <b style="color: #006600">PAID</b>
                                                <?php
                                            } else {
                                                ?>
                                                <b style="color: #ff0000">DUE</b>&nbsp;&nbsp;&nbsp;
                                                <a href="?page=appointment_payment&id=<?php echo $row1['patient_reg_id']; ?>&did=<?php echo $doc_id; ?>" class="glyphicon glyphicon-link" target="_blank"></a>
                                                <?php
                                            }
                                        }
//                                }else {
//                                    echo '<b style="color: #ff0000">Confirm First</b>';
//                                }
                                        ?>
                                    </td>
                                    <td>

                                        <?php
//                                    if ($row1['appointment_status'] == 1) {
                                        if ($row1['patient_reg_id'] == '0') {
                                            echo '<a href="?page=edit_appointment&id=' . $row1['appointment_id'] . '&rid=' . $row1['patient_reg_id'] . '" target="_blank" ><button class="btn btn-sm glyphicon glyphicon-edit"></button></a>';
                                        } else {
                                            echo '<button class="btn btn-sm glyphicon glyphicon-edit disabled" ></button>';
                                        }
//                                    } else {
//                                        echo '<button class="btn btn-sm glyphicon glyphicon-edit disabled"></button>';
//                                    }
                                        ?>
                                        <a href="?option=pending_patient&id=<?php echo $row1['appointment_id']; ?>&rid=<?php echo $row1['patient_reg_id']; ?>"><button class="btn btn-sm glyphicon glyphicon-trash"></button></a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                    </div><!-- /.box-body -->
                </div>
            <?php } ?>
        </div><!-- /.box -->
    </section><!-- /.content -->

    <script type="text/javascript">
        //Create a boolean variable to check for a valid Internet Explorer instance.
        var xmlhttp = false;
        //Check if we are using IE.
        try {
            //If the Javascript version is greater than 5.
            xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
            //alert(xmlhttp);
            //alert ("You are using Microsoft Internet Explorer.");
        } catch (e) {
            // alert(e);

            //If not, then use the older active x object.
            try {
                //If we are using Internet Explorer.
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                //alert ("You are using Microsoft Internet Explorer");
            } catch (E) {
                //Else we must be using a non-IE browser.
                xmlhttp = false;
            }
        }
        //If we are using a non-IE browser, create a javascript instance of the object.
        if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
            xmlhttp = new XMLHttpRequest();
            //alert ("You are not using Microsoft Internet Explorer");
        }

        function get_department_id(given_text, objID)
        {
    //                alert(given_text);
            //var obj = document.getElementById(objID);
            serverPage = 'pages/ajax/appointment_details2.php?department_id=' + given_text;
            xmlhttp.open("GET", serverPage);
            xmlhttp.onreadystatechange = function ()
            {
                //alert(xmlhttp.readyState);
    //                    alert(xmlhttp.status);
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                {
    //                        alert(xmlhttp.responseText);
                    document.getElementById(objID).innerHTML = xmlhttp.responseText;
                    //document.getElementById(objcw).innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.send(null);
        }
    </script>
    <?php
}