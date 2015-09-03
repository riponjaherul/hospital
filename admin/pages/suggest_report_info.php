<?php
if (isset($_POST['btn'])) {
    $obj_admin->save_prescription_suggest_test($_POST);
}
?>
<section class="content-header">
    <h1>
        Suggest Report
        <small>Preview</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Prescription Manager</a></li>
        <li class="active">Suggest Report</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- left column -->

        <!-- right column -->
        <div class="col-md-10 col-md-offset-1">
            <!-- Horizontal Form -->
            <div class="box box-warning">
                <div class="box-header with-border">
                </div><!-- /.box-header -->
<?php
                            if (isset($_SESSION['message'])) {
                                echo $_SESSION['message'];
                                unset($_SESSION['message']);
                            }
                            ?>
                <div class="box-body">
                    <form role="form" method="post" action="">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Appointment ID</label>
                            
                            <select class="form-control select2" name="patient_id">
                                <option selected="selected">Select Patient ....</option>
                                <?php
                                $select_all_patient = $obj_admin->select_all_patient();
                                while ($row = mysql_fetch_assoc($select_all_patient)) {
                                    echo '<option value=' . $row['patient_id'] . '>' . $row['patient_name'] . '</option>';
                                }
                                ?>
                            </select>
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            <label>Select Patient</label>
                            
                            <select class="form-control select2" name="patient_id">
                                <option selected="selected">Select Patient ....</option>
                                <?php
                                $select_all_patient = $obj_admin->select_all_patient();
                                while ($row = mysql_fetch_assoc($select_all_patient)) {
                                    echo '<option value=' . $row['patient_id'] . '>' . $row['patient_name'] . '</option>';
                                }
                                ?>
                            </select>
                        </div><!-- /.form-group -->

                        <div class="form-group">
                            <label>Select Category</label>

                            <select class="form-control select2" name="patient_id" onchange="show_test_by_category(this.value)">
                                <option selected="selected">Select Category ....</option>
                                <?php
                                $select_all_text_category = $obj_admin->select_all_test_category();
                                while ($row = mysql_fetch_assoc($select_all_text_category)) {
                                    echo '<option value=' . $row['test_category_id'] . '>' . $row['test_category_name'] . '</option>';
                                }
                                ?>
                            </select>
                        </div><!-- /.form-group -->
                        <div class="form-group" id="txtHint">

                        </div>
                        <div class="box-footer">
                            <button type="submit" name="btn" class="btn btn-primary btn-lg">Save</button>
                        </div>
                    </form>
                </div><!-- /.box-body -->

            </div><!-- /.box -->

        </div><!--/.col (right) -->
    </div>   <!-- /.row -->
</section><!-- /.content -->
<script>
    function show_test_by_category(str) {
        if (str == "") {
            document.getElementById("txtHint").innerHTML = "";
            return;
        }
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else { // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "pages/ajax_page/get_test_by_category.php?value_id=" + str, true);
        xmlhttp.send();
    }
</script>