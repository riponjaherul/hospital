<?php
session_start();
ob_start();
date_default_timezone_set("Asia/Dacca");
//if((isset($_SESSION['sess_user_admin_login_id']) == NULL) || (isset($_SESSION['sess_user_doctor_login_id']) == NULL)){
//    header('Location:index.php');
//}
if ((isset($_SESSION['sess_user_admin_login_id']) == NULL)) {
    header('Location:index.php');
}
require_once './classes/admin.php';
require_once './classes/appointment.php';
require_once './classes/nurse.php';
require_once './classes/doctor.php';
require_once './classes/patient.php';
require_once './classes/report.php';
$obj_admin = new Admin();
$obj_appointment = new Appointment();
$obj_nurse = new Nurse();
$obj_doctor = new Doctor();
$obj_patient = new Patient();
$obj_report = new Report();

$space_1 = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
$space_2 = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

$result = $_SESSION['result'];

if (isset($_GET['page'])) {
    switch ($_GET['page']) {
        case 'make_prescriprion':
            $page = 'make_prescriprion_info.php';
            break;
        case 'prescription_details':
            $page = 'prescription_details.php';
            break;
        case 'manage_prescriprion':
            $page = 'manage_prescriprion_info.php';
            break;
        case 'suggest_report':
            $page = 'suggest_report_info.php';
            break;
        case 'view_appointment':
            $page = 'view_appointment_info.php';
            break;
        case 'view_appointment_new':
            $page = 'view_appointment_new_info.php';
            break;
        case 'edit_appointment':
            $page = 'edit_single_appointment.php';
            break;
        case 'appointment_payment':
            $page = 'appointment_payment_info.php';
            break;
        case 'manage_nurse':
            $page = 'manage_nurse_info.php';
            break;
        case 'view_appointment_n':
            $page = 'view_appointment_n_info.php';
            break;
        case 'add_prescription_p':
            $page = 'add_prescription_p_info.php';
            break;
        case 'view_appointment_d':
            $page = 'view_appointment_d_info.php';
            break;
        case 'add_prescription_d':
            $page = 'add_prescription_d_info.php';
            break;
        case 'view_report_request':
            $page = 'view_report_request_info.php';
            break;
        case 'add_report_request':
            $page = 'add_report_request_info.php';
            break;
        case 'view_prescription':
            $page = 'view_prescription_info.php';
            break;
        case 'patient_details':
            $page = 'patient_details_info.php';
            break;
        case 'view_prescription_date':
            $page = 'view_prescription_date_info.php';
            break;
        case 'requseted_report':
            $page = 'requseted_report_info.php';
            break;
        case 'add_report':
            $page = 'add_report_info.php';
            break;
        case 'patient_profile':
            $page = 'patient_profile_info.php';
            break;
        case 'sign_out':
            $obj_admin->sign_out();
            break;

        default:
            break;
    }
}
if (isset($_GET['option'])) {
    switch ($_GET['option']) {
        case 'change_appointment_status':
            $id = $_GET['id'];
            $rid = $_GET['rid'];
            if ($rid == '0') {
                $obj_appointment->change_appointment_new_status($id);
            } else {
                $obj_appointment->change_appointment_status($id);
            }
            break;

        default:
            break;
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Deshbord :: Hospital Management System</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.4 -->
        <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- FontAwesome 4.3.0 -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons 2.0.0 -->
        <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link href="assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
        <!-- iCheck -->
        <link href="assets/plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="assets/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- Date Picker -->
        <link href="assets/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="assets/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue sidebar-mini">
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>A</b>LT</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg">Deshbord</span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- Messages: style can be found in dropdown.less-->
                            <?php
                            if (isset($_SESSION['user_access_for_patient'])) {
                                ?>
                                <li class="dropdown messages-menu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-envelope-o"></i>
                                        <?php
                                        $total_unread_prescription = $obj_patient->get_no_of_unread_prescription($result['patient_id']);
                                        echo '<span class="label label-success">' . $total_unread_prescription['total_read_status'] . '</span>';
                                        ?>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <?php
                                        echo '<li class="header">You have <b>' . $total_unread_prescription['total_read_status'] . '</b> new prescriptions</li>';
                                        ?>
                                        <li>
                                            <!-- inner menu: contains the actual data -->
                                            <ul class="menu">
                                                <li><!-- start message -->
                                                    <?php
                                                    $unreaad_prescription = $obj_patient->get_unread_prescription($result['patient_id']);
                                                    while ($row = mysql_fetch_assoc($unreaad_prescription)) {
                                                        echo '<a href="?page=view_prescription_date&pid='.$result['patient_id'].'&date='.$row['appointment_date'].'&rstatus='.$row['read_status'].'&pnid='.$row['prescription_nurse_id'].'">
                                                        <h4>
                                                            '.$row['doctor_title'].' '.$row['doctor_first_name'].' '.$row['doctor_last_name'].'
                                                            <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                                        </h4>
                                                        <p>'.$row['appointment_date'].'</p>
                                                    </a>';
                                                    }
                                                    ?>
                                                </li><!-- end message -->
                                            </ul>
                                        </li>
                                        <li><a href="?page=patient_details&id=<?php echo $result['patient_id']; ?>&ssis=<?php echo $_SESSION['user_access_for_patient']; ?>">See All Prescriptions</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown messages-menu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-envelope-o"></i>
                                        <span class="label label-success">4</span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="header">You have 4 new reports</li>
                                        <li>
                                            <!-- inner menu: contains the actual data -->
                                            <ul class="menu">
                                                <li><!-- start message -->
                                                    <a href="#">
                                                        <div class="pull-left">
                                                            <img src="assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
                                                        </div>
                                                        <h4>
                                                            Support Team
                                                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                        </h4>
                                                        <p>Why not buy a new awesome theme?</p>
                                                    </a>
                                                </li><!-- end message -->
                                                <li>
                                                    <a href="#">
                                                        <div class="pull-left">
                                                            <img src="assets/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image" />
                                                        </div>
                                                        <h4>
                                                            AdminLTE Design Team
                                                            <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                                        </h4>
                                                        <p>Why not buy a new awesome theme?</p>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <div class="pull-left">
                                                            <img src="assets/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image" />
                                                        </div>
                                                        <h4>
                                                            Developers
                                                            <small><i class="fa fa-clock-o"></i> Today</small>
                                                        </h4>
                                                        <p>Why not buy a new awesome theme?</p>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <div class="pull-left">
                                                            <img src="assets/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image" />
                                                        </div>
                                                        <h4>
                                                            Sales Department
                                                            <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                                        </h4>
                                                        <p>Why not buy a new awesome theme?</p>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <div class="pull-left">
                                                            <img src="assets/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image" />
                                                        </div>
                                                        <h4>
                                                            Reviewers
                                                            <small><i class="fa fa-clock-o"></i> 2 days</small>
                                                        </h4>
                                                        <p>Why not buy a new awesome theme?</p>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="footer"><a href="#">See All Messages</a></li>
                                    </ul>
                                </li>
                            <?php } ?>
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="uploads/<?php
                                    if (isset($_SESSION['user_access_for_admin'])) {
                                        echo $result['admin_image'];
                                    } elseif (isset($_SESSION['user_access_for_doctor'])) {
                                        echo $result['doctor_image'];
                                    } elseif (isset($_SESSION['user_access_for_patient'])) {
                                        echo $result['patient_image'];
                                    } elseif (isset($_SESSION['user_access_for_report_manager'])) {
                                        echo $result['r_manager_image'];
                                    } elseif (isset($_SESSION['user_access_for_registration_manager'])) {
                                        echo $result['reg_manager_image'];
                                    } elseif ($_SESSION['user_access_for_nurse_manager']) {
                                        echo $result['nurse_image'];
                                    }
                                    ?>" class="user-image" alt="User Image" />
                                    <span class="hidden-xs"><?php
                                        if (isset($_SESSION['user_access_for_admin'])) {
                                            echo $result['admin_name'];
                                        } elseif (isset($_SESSION['user_access_for_doctor'])) {
                                            echo $result['doctor_title'] . ' ' . $result['doctor_first_name'] . ' ' . $result['doctor_last_name'];
                                        } elseif (isset($_SESSION['user_access_for_patient'])) {
                                            echo $result['patient_name'];
                                        } elseif (isset($_SESSION['user_access_for_report_manager'])) {
                                            echo $result['r_manager_name'];
                                        } elseif (isset($_SESSION['user_access_for_registration_manager'])) {
                                            echo $result['reg_manager_name'];
                                        } elseif ($_SESSION['user_access_for_nurse_manager']) {
                                            echo $result['nurse_name'];
                                        }
                                        ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="uploads/<?php
                                        if (isset($_SESSION['user_access_for_admin'])) {
                                            echo $result['admin_image'];
                                        } elseif (isset($_SESSION['user_access_for_doctor'])) {
                                            echo $result['doctor_image'];
                                        } elseif (isset($_SESSION['user_access_for_patient'])) {
                                            echo $result['patient_image'];
                                        } elseif (isset($_SESSION['user_access_for_report_manager'])) {
                                            echo $result['r_manager_image'];
                                        } elseif (isset($_SESSION['user_access_for_registration_manager'])) {
                                            echo $result['reg_manager_image'];
                                        } elseif ($_SESSION['user_access_for_nurse_manager']) {
                                            echo $result['nurse_image'];
                                        }
                                        ?>" class="img-circle" alt="User Image" />
                                        <p>
                                            <?php
                                            if (isset($_SESSION['user_access_for_admin'])) {
                                                echo $result['admin_name'];
                                            } elseif (isset($_SESSION['user_access_for_doctor'])) {
                                                echo $result['doctor_title'] . ' ' . $result['doctor_first_name'] . ' ' . $result['doctor_last_name'];
                                            } elseif (isset($_SESSION['user_access_for_patient'])) {
                                                echo $result['patient_name'];
                                            } elseif (isset($_SESSION['user_access_for_report_manager'])) {
                                                echo $result['r_manager_name'];
                                            } elseif (isset($_SESSION['user_access_for_registration_manager'])) {
                                                echo $result['reg_manager_name'];
                                            } elseif ($_SESSION['user_access_for_nurse_manager']) {
                                                echo $result['nurse_name'];
                                            }
                                            ?> - Web Developer
                                            <small>Member since Nov. 2012</small>
                                        </p>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="?page=patient_profile&pid=<?php echo $result['patient_id']; ?>&sessid=<?php echo $_SESSION['user_access_for_patient']; ?>" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="?page=sign_out" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!-- Control Sidebar Toggle Button -->

                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <?php
            include './pages/manu_page.php';
            ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <?php
                if (isset($page)) {
                    include './pages/' . $page;
                } else {
                    include './pages/deshbord_content.php';
                }
                ?>
            </div><!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 2.2.0
                </div>
                <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Create the tabs -->
                <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                    <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
                    <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Home tab content -->
                    <div class="tab-pane" id="control-sidebar-home-tab">
                        <h3 class="control-sidebar-heading">Recent Activity</h3>
                        <ul class="control-sidebar-menu">
                            <li>
                                <a href="javascript::;">
                                    <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                                        <p>Will be 23 on April 24th</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript::;">
                                    <i class="menu-icon fa fa-user bg-yellow"></i>
                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                                        <p>New phone +1(800)555-1234</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript::;">
                                    <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                                        <p>nora@example.com</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript::;">
                                    <i class="menu-icon fa fa-file-code-o bg-green"></i>
                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                                        <p>Execution time 5 seconds</p>
                                    </div>
                                </a>
                            </li>
                        </ul><!-- /.control-sidebar-menu -->

                        <h3 class="control-sidebar-heading">Tasks Progress</h3>
                        <ul class="control-sidebar-menu">
                            <li>
                                <a href="javascript::;">
                                    <h4 class="control-sidebar-subheading">
                                        Custom Template Design
                                        <span class="label label-danger pull-right">70%</span>
                                    </h4>
                                    <div class="progress progress-xxs">
                                        <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript::;">
                                    <h4 class="control-sidebar-subheading">
                                        Update Resume
                                        <span class="label label-success pull-right">95%</span>
                                    </h4>
                                    <div class="progress progress-xxs">
                                        <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript::;">
                                    <h4 class="control-sidebar-subheading">
                                        Laravel Integration
                                        <span class="label label-warning pull-right">50%</span>
                                    </h4>
                                    <div class="progress progress-xxs">
                                        <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript::;">
                                    <h4 class="control-sidebar-subheading">
                                        Back End Framework
                                        <span class="label label-primary pull-right">68%</span>
                                    </h4>
                                    <div class="progress progress-xxs">
                                        <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                                    </div>
                                </a>
                            </li>
                        </ul><!-- /.control-sidebar-menu -->

                    </div><!-- /.tab-pane -->
                    <!-- Stats tab content -->
                    <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
                    <!-- Settings tab content -->
                    <div class="tab-pane" id="control-sidebar-settings-tab">
                        <form method="post">
                            <h3 class="control-sidebar-heading">General Settings</h3>
                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Report panel usage
                                    <input type="checkbox" class="pull-right" checked />
                                </label>
                                <p>
                                    Some information about this general settings option
                                </p>
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Allow mail redirect
                                    <input type="checkbox" class="pull-right" checked />
                                </label>
                                <p>
                                    Other sets of options are available
                                </p>
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Expose author name in posts
                                    <input type="checkbox" class="pull-right" checked />
                                </label>
                                <p>
                                    Allow the user to show his name in blog posts
                                </p>
                            </div><!-- /.form-group -->

                            <h3 class="control-sidebar-heading">Chat Settings</h3>

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Show me as online
                                    <input type="checkbox" class="pull-right" checked />
                                </label>
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Turn off notifications
                                    <input type="checkbox" class="pull-right" />
                                </label>
                            </div><!-- /.form-group -->

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Delete chat history
                                    <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                                </label>
                            </div><!-- /.form-group -->
                        </form>
                    </div><!-- /.tab-pane -->
                </div>
            </aside><!-- /.control-sidebar -->
            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div><!-- ./wrapper -->

        <!-- jQuery 2.1.4 -->
        <script src="assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js" type="text/javascript"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script type="text/javascript">
            $.widget.bridge('uibutton', $.ui.button);
        </script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- Morris.js charts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="assets/plugins/morris/morris.min.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="assets/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="assets/plugins/knob/jquery.knob.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script>
        <script src="assets/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- datepicker -->
        <script src="assets/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- Slimscroll -->
        <script src="assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <!-- FastClick -->
        <script src="assets/plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="assets/dist/js/app.min.js" type="text/javascript"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="assets/dist/js/pages/dashboard.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="assets/dist/js/demo.js" type="text/javascript"></script>
    </body>
</html>