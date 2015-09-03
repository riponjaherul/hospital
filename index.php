<?php
 date_default_timezone_set("Asia/Dacca");
require_once './view/classes/view.php';
require_once './view/classes/appointment.php';
$obj_view = new View();
$obj_appointment = new Appointment();

if (isset($_GET['page'])) {
    switch ($_GET['page']) {
        case 'appointment_new':
            $page = 'appointment_new_info.php';
            break;
        case 'appointment_old':
            $page = 'appointment_old_info.php';
            break;

        default:
            break;
    }
}
?>
<html>
    <head>
        <title>Hospital Management System</title>
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

        <!-- Load jQuery JS -->
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <!-- Load jQuery UI Main JS  -->
        <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    </head>
    <body>
        <h1 align="center" style="padding-top: 50px; ">Welcome to Hospital Management System</h1>
        <a href="">Make Appointment</a>
        <ul>
            <li><a href="?page=appointment_new">New Patient</a></li>
            <li><a href="?page=appointment_old">Old Patient</a></li>
        </ul>
        <div style="padding-left:100px; padding-top: 50px;">
            <?php
                if(isset($page)){
                    include_once './view/page/'.$page;
                }else{
                    include './view/page/main_content.php';
                }
            ?>
        </div>

    </body>
</html>