<?php

class Report extends Admin {
    public function __construct() {
        parent::__construct();
    }
    function add_report($data,$files){
        $test_images = Array();
//        $gallery_image_title = Array();
        $valid_formats = array("jpg", "png", "gif", "zip", "bmp");
        $max_file_size = 1024 * 100; //100 kb
        $path = "uploads/test_images/"; // Upload directory
        $count = 0;


        // Loop $_FILES to exeicute all files
        foreach ($files['test_image']['name'] as $f => $name) {
            if ($files['test_image']['error'][$f] == 4) {
                continue; // Skip file if any error found
            }
            if ($files['test_image']['error'][$f] == 0) {
                if ($files['test_image']['size'][$f] > $max_file_size) {
                    $message[] = "$name is too large!.";
                    continue; // Skip large files
                } elseif (!in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats)) {
                    $message[] = "$name is not a valid format";
                    continue; // Skip invalid file formats
                } else { // No error found! Move uploaded files 
                    if (move_uploaded_file($files["test_image"]["tmp_name"][$f], $path . $name)) {
//                        echo '<pre>';
                        $test_images = $path . $name;
                        $test_id = $data['test_id'][$count];
                        $pres_nurse_id = $data['pres_nurse_id'][$count];
                        $sql = "INSERT INTO tbl_report(prescription_nurse_id,test_id,test_image)"
                                . "VALUES('$pres_nurse_id','$test_id','$test_images')";
                        mysql_query($sql);
                        $count++;
                    } // Number of successfully uploaded file
                }
            }
        }
        header('Location:?page=requseted_report');
    }
    function get_pres_nurse_id_report($pres_nurse_id){
        $sql = "SELECT DISTINCT `prescription_nurse_id` FROM `tbl_report` WHERE `prescription_nurse_id` = '$pres_nurse_id'";
        $query_result = mysql_query($sql);
        return mysql_fetch_assoc($query_result);
    }
    function get_pres_id_doctor_report(){
        $sql = "SELECT DISTINCT `prescription_nurse_id` FROM `tbl_prescription_doctor_test`";
        return mysql_query($sql);
    }
}