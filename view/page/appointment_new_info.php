<?php
if (isset($_POST['btn_new'])) {
    $obj_appointment->save_appointment_new($_POST);
}
?>
<h1 style="padding-left: 400px;">Make Appointment</h1>
<form method="post" action="">
    <div style="float: left; width: 48%;">
        <table>
            <tr>
                <td>Appointment Date:</td>
                <td>
                    <input type="date" name="appointment_date" value="" placeholder="mm-dd-yy" onblur="date_different(this.value)"/>
                </td>
                <td id="time_error"></td>
            </tr>
            <tr>
                <td>Department Name : </td>
                <td>
                    <select onchange="get_department_id(this.value)">
                        <option value=" ">Select Department...</option>
                        <?php
                        $select_all_department = $obj_view->select_all_department();
                        while ($row = mysql_fetch_assoc($select_all_department)) {
                            ?>
                            <option value="<?php echo $row['department_id']; ?>"><?php echo $row['department_name']; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr id="doctor_list">

            </tr>
            <tr id="doctor_details">

            </tr>
        </table>
    </div>
    <div style="float: left; width: 48%;">
        <table>
            <tr id="shift_name">

            </tr>
            <tr id="time_slot">

            </tr>
            <tr id="patient_reg_id">

            </tr>
            <tr id="patient_details">

            </tr>
        </table>
    </div>

</form>
<script>
//    $(document).ready(
//            /* This is the function that will get executed after the DOM is fully loaded */
//                    function () {
//                        $("#datepicker").datepicker({
//                            changeMonth: true, //this option for allowing user to select month
//                            changeYear: true //this option for allowing user to select from year range
//                        });
//                    }
//
//            );

function date_different(time1){
//    alert(time);
    if (time1 == "") {
            document.getElementById("time_error").innerHTML = "";
            return;
        }
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else { // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
//                    alert(xmlhttp.status);
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("time_error").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "view/page/ajax/appointment_details1.php?time=" + time1, true);
        xmlhttp.send();
}
    function get_department_id(str) {
//        alert(str);
        if (str == "") {
            document.getElementById("doctor_list").innerHTML = "";
            return;
        }
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else { // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
//                    alert(xmlhttp.status);
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("doctor_list").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "view/page/ajax/appointment_details.php?value_id=" + str, true);
        xmlhttp.send();
    }

    function get_doctor_id_for_shift(val1) {
        if (val1 == "") {
            document.getElementById("shift_name").innerHTML = "";
            return;
        }
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else { // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
//                    alert(xmlhttp.status);
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("shift_name").innerHTML = xmlhttp.responseText;
                get_doctor_id_for_details(val1);
            }
        }
        xmlhttp.open("GET", "view/page/ajax/appointment_details.php?get_doctor_id_for_shift=" + val1, true);
        xmlhttp.send();
    }

    function get_doctor_id_for_details(val) {
//                alert(val);
        if (val == "") {
            document.getElementById("doctor_details").innerHTML = "";
            return;
        }
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else { // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
//                    alert(xmlhttp.status);
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("doctor_details").innerHTML = xmlhttp.responseText;

            }
        }
        xmlhttp.open("GET", "view/page/ajax/appointment_details.php?get_doctor_id=" + val, true);
        xmlhttp.send();
    }

    function get_time_slot(val2) {
//                alert(val);
        if (val2 == "") {
            document.getElementById("time_slot").innerHTML = "";
            return;
        }
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else { // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
//                    alert(xmlhttp.status);
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("time_slot").innerHTML = xmlhttp.responseText;

            }
        }
        xmlhttp.open("GET", "view/page/ajax/appointment_details.php?get_shift_id=" + val2, true);
        xmlhttp.send();
    }
    function get_time_slot_id(val3) {
        if (val3 == "") {
            document.getElementById("patient_reg_id").innerHTML = "";
            return;
        }
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else { // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
//                    alert(xmlhttp.status);
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("patient_reg_id").innerHTML = xmlhttp.responseText;

            }
        }
        xmlhttp.open("GET", "view/page/ajax/appointment_details1.php?get_time_slot_id=" + val3, true);
        xmlhttp.send();
    }

    function get_patient_name(val4) {
        if (val4 == "") {
            document.getElementById("patient_details").innerHTML = "";
            return;
        }
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else { // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
//                    alert(xmlhttp.status);
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("patient_details").innerHTML = xmlhttp.responseText;

            }
        }
        xmlhttp.open("GET", "view/page/ajax/doctor_list_by_dept.php?patient_reg_id=" + val4, true);
        xmlhttp.send();
    }

</script>

