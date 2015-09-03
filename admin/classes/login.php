<?php
require_once 'database.php';

class Login {

    public function __construct() {
        $obj_db = new Database();
    }

     function check_login($data) {
        $email_address = mysql_real_escape_string($data['admin_email_address']);
        $password = md5($data['admin_password']);

        $sql = "SELECT admin_name,admin_image,admin_email_address,admin_password
                FROM tbl_admin
                WHERE admin_email_address = '$email_address' AND admin_password = '$password'";
        $query_result = mysql_query($sql);
        $result = mysql_fetch_assoc($query_result);

        if ($result == NULL) {
            $_SESSION['message'] = '<span style="color:red;">Invalid Email and Password</span>';
        } else {
            $_SESSION['sess_user_admin_login_id'] = session_id();
            $_SESSION['user_access_for_admin'] = session_id();
            $_SESSION['result'] = $result;
            header("Location:deshbord.php");
        }
    }
    
    function check_doctor_login($data) {
//        print_r($data);
//        exit();
        $email_address = mysql_real_escape_string($data['doctor_email_address']);
        $password = md5($data['doctor_password']);
        
        $sql = "SELECT doctor_title,doctor_first_name,doctor_last_name,doctor_email_address,doctor_password,doctor_stauts
                FROM tbl_doctor
                WHERE doctor_email_address = '$email_address' AND doctor_password = '$password'";
        $query_result = mysql_query($sql);
        $result = mysql_fetch_assoc($query_result);
//        print_r($result);
//        exit();

        if ($result == NULL) {
            $_SESSION['message'] = '<span style="color:red;">Invalid Email and Password</span>';
        } else {
            $_SESSION['sess_user_admin_login_id'] = session_id();
            $_SESSION['user_access_for_doctor'] = session_id();
            $_SESSION['result'] = $result;
            header("Location:../deshbord.php");
        }
    }
    function check_patient_login($data) {
        $email_address = mysql_real_escape_string($data['patient_email_address']);
        $password = md5($data['patient_password']);
        
        $sql = "SELECT patient_name,patient_image,patient_email_address,patient_password
                FROM tbl_patient
                WHERE patient_email_address = '$email_address' AND patient_password = '$password'";
        $query_result = mysql_query($sql);
        $result = mysql_fetch_assoc($query_result);

        if ($result == NULL) {
            $_SESSION['message'] = '<span style="color:red;">Invalid Email and Password</span>';
        } else {
            $_SESSION['sess_user_admin_login_id'] = session_id();
            $_SESSION['user_access_for_patient'] = session_id();
            $_SESSION['result'] = $result;
            header("Location:../deshbord.php");
        }
    }
    function check_report_manager_login($data) {
        $email_address = mysql_real_escape_string($data['r_manager_email_address']);
        $password = md5($data['r_manager_password']);
        
        $sql = "SELECT r_manager_name,r_manager_image,r_manager_email_address,r_manager_password
                FROM tbl_report_manager
                WHERE r_manager_email_address = '$email_address' AND r_manager_password = '$password'";
        $query_result = mysql_query($sql);
        $result = mysql_fetch_assoc($query_result);
        
        if ($result == NULL) {
            $_SESSION['message'] = '<span style="color:red;">Invalid Email and Password</span>';
        } else {
            $_SESSION['sess_user_admin_login_id'] = session_id();
            $_SESSION['user_access_for_report_manager'] = session_id();
            $_SESSION['result'] = $result;
            header("Location:../deshbord.php");
        }
    }
    function check_reg_manager_login($data){
        $email_address = mysql_real_escape_string($data['reg_manager_email_address']);
        $password = md5($data['reg_manager_password']);
        
        $sql = "SELECT reg_manager_name,reg_manager_image,reg_manager_email_address,reg_manager_password
                FROM tbl_reg_manager
                WHERE reg_manager_email_address = '$email_address' AND reg_manager_password = '$password'";
        $query_result = mysql_query($sql);
        $result = mysql_fetch_assoc($query_result);
        
        if ($result == NULL) {
            $_SESSION['message'] = '<span style="color:red;">Invalid Email and Password</span>';
        } else {
            $_SESSION['sess_user_admin_login_id'] = session_id();
            $_SESSION['user_access_for_registration_manager'] = session_id();
            $_SESSION['result'] = $result;
            header("Location:../deshbord.php");
        }
    }
}
