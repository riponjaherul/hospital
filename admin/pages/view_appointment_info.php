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
                    <div >
                        <div class="input-group" style="width: 150px;">
                            <select onchange="get_department_id(this.value, 'doctor_list')">
                                <option>Select Department...</option>
                                <?php
                                $all_department = $obj_admin->select_all_department();
                                while ($row = mysql_fetch_assoc($all_department)) {
                                    ?>
                                    <option value="<?php echo $row['department_id']; ?>"><?php echo $row['department_name']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div><br>
                    <div class="col-lg-12">
                        <div class="col-lg-3 " id="doctor_list">

                        </div>
                        <div class="col-lg-3 col-lg-offset-6" id="date_select">

                        </div>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-header" style="width: 400px;">
                    <div id="doctor_list">

                    </div>
                </div><!-- /.box-header -->
                <?php
                if (isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                }
                ?>
            </div>
        </div><!-- /.box-header -->
        <div id="appointment_list">
           
        </div>
    </div><!-- /.box -->
</section><!-- /.content -->
<?php unset($_SESSION['doctor_id']); ?>

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

    function get_doctor_id(given_text, ID) {
//       alert(given_text);
        serverPage = 'pages/ajax/appointment_details2.php?doctor_id=' + given_text;
        xmlhttp.open("GET", serverPage);
        xmlhttp.onreadystatechange = function ()
        {
            //alert(xmlhttp.readyState);
//                    alert(xmlhttp.status);
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
            {
//                        alert(xmlhttp.responseText);
                document.getElementById(ID).innerHTML = xmlhttp.responseText;
                //document.getElementById(objcw).innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.send(null);
    }
    function get_selected_date(given_text, ID) {
        serverPage = 'pages/ajax/appointment_details2.php?get_date=' + given_text;
        xmlhttp.open("GET", serverPage);
        xmlhttp.onreadystatechange = function ()
        {
            //alert(xmlhttp.readyState);
//                    alert(xmlhttp.status);
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
            {
//                        alert(xmlhttp.responseText);
                document.getElementById(ID).innerHTML = xmlhttp.responseText;
                //document.getElementById(objcw).innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.send(null);
    }
</script>