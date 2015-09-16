<aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..." />
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="header"></li>
                        <li class="active treeview">
                            <a href="deshbord.php">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <?php
                        if (isset($_SESSION['user_access_for_admin'])) {
                            ?>
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-folder"></i> <span>Doctor Manager</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i>Add Doctor</a></li>
                                </ul>
                            </li>

                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-folder"></i> <span>Report Manager</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="?page=add_report_request"><i class="fa fa-circle-o"></i>Add Report Request</a></li>
                                </ul>
                            </li> 
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-folder"></i> <span>Registration Manager</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href=""><i class="fa fa-circle-o"></i>Add Patient</a></li>
                                </ul>
                            </li> 
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-folder"></i> <span>Payment Manager</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href=""><i class="fa fa-circle-o"></i>Add Patient</a></li>
                                </ul>
                            </li> 
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-folder"></i> <span>Nurse Manager</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href=""><i class="fa fa-circle-o"></i>Add Nurse</a></li>
                                    <li><a href=""><i class="fa fa-circle-o"></i>View Nurse</a></li>
                                    <li><a href="?page=manage_nurse"><i class="fa fa-circle-o"></i>Manage Nurse</a></li>
                                </ul>
                            </li> 
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-folder"></i> <span>Appointment Manager</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="?page=view_appointment"><i class="fa fa-circle-o"></i>View Appointment</a></li>
                                    <li><a href="?page=view_appointment_new"><i class="fa fa-circle-o"></i>View New Appointment</a></li>
                                </ul>
                            </li>  
                            <?php
                        }if (isset($_SESSION['user_access_for_doctor'])) {
                            ?>
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-folder"></i> <span>Make Prescription</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <?php
                                        $all_shift = $obj_admin->select_all_shift();
                                        while ($row1 = mysql_fetch_assoc($all_shift)) {
                                            echo '<li><a href="?page=view_appointment_d&sid='.$row1['shift_id'].'"><i class="fa fa-circle-o"></i>'.$row1['shift_name'].'</a></li>';
                                        }
                                    ?>
                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-folder"></i> <span>Report Manager</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">

                                    <li><a href="?page=manage_report"><i class="fa fa-circle-o"></i>Manage Report</a></li>
                                </ul>
                            </li>
                        <?php } if (isset($_SESSION['user_access_for_registration_manager'])) { ?>
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-folder"></i> <span>Appointment Manager</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">

                                    <li><a href="?page=view_appointment"><i class="fa fa-circle-o"></i>View Appointment</a></li>
                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-folder"></i> <span>Patient Manager</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href=""><i class="fa fa-circle-o"></i>Add Patient</a></li>
                                </ul>
                            </li> 
                        <?php } if (isset($_SESSION['user_access_for_nurse_manager'])) { ?>
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-folder"></i> <span>Appointment Manager</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <?php
                                        $department_n_manager = $obj_nurse->get_department_n_manager($result['nurse_id']);
                                        while ($row = mysql_fetch_assoc($department_n_manager)) {
                                        echo '<li><a href="?page=view_appointment_n&did='.$row['department_id'].'&sesid='.$_SESSION['user_access_for_nurse_manager'].'"><i class="fa fa-circle-o"></i>'.$row['department_name'].'</a></li>';
                                        }
                                    ?>
                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-folder"></i> <span>Patient Manager</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href=""><i class="fa fa-circle-o"></i>Add Patient</a></li>
                                </ul>
                            </li> 
                        <?php } if(isset($_SESSION['user_access_for_report_manager'])) { ?>
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-folder"></i> <span>Report Manager</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="?page=requseted_report&sesid=<?php echo $_SESSION['user_access_for_report_manager']; ?>"><i class="fa fa-circle-o"></i>Requested Report</a></li>
                                </ul>
                            </li>
                        <?php }if(isset($_SESSION['user_access_for_patient'])){ ?>
                            <li class="treeview">
                                <a href="?page=patient_details&id=<?php echo $result['patient_id']; ?>&ssis=<?php echo $_SESSION['user_access_for_patient']; ?>">
                                    <i class="fa fa-folder"></i> <span>View Prescription</span>
                                </a>
                            </li>
                            <li class="treeview">
                                <a href="?page=view_report_single_p&ssis=<?php echo $_SESSION['user_access_for_patient']; ?>">
                                    <i class="fa fa-folder"></i> <span>View Report</span>
                                </a>
                            </li>
                       <?php } ?>
                        <li><a href="?page=sign_out"><i class="fa fa-circle-o text-red"></i> <span>Sign Out</span></a></li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>