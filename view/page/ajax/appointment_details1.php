<?php
session_start();
if (isset($_GET['time'])) {
    $user_date = $_GET['time'];
    $_SESSION['user_date'] = $user_date;
    $date = new DateTime();
    $current_date = $date->format('Y-m-d');

    if ($current_date > $user_date) {
        echo '<span style="color:red">Please input valid date</span>';
    }
}

if (isset($_GET['get_time_slot_id'])) {
    ?>
    <td>
        <table>
            <tr>
                <td>Patient Name</td>
                <td><input type="text" name="patient_name" value=""></td>
            </tr>
            <tr>
                <td>Patient Phone Number</td>
                <td><input type="text" name="patient_phone_number" value=""></td>
            </tr>
            <tr>
                <td><input type="submit" name="btn_new" value="Make Appointment"></td>
            </tr>
        </table>
    </td>
    <?php

}