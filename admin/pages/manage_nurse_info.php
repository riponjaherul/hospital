<?php
    if(isset($_POST['btn_nurse'])){
        $obj_nurse->add_managing_nurse($_POST);
    }
?>
<section class="content-header">
    <h1>
        Nurse Manager
        <small>Preview</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Nurse</a></li>
        <li class="active">Nurse Manager</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- right column -->
        <div class="col-md-5 col-md-offset-1">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Manage Nurse</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="" method="post">
                    <div class="box-body">
                        <div class="form-group">
                               <?php
                                if(isset($_SESSION['message'])){
                                    echo $_SESSION['message'];
                                    unset($_SESSION['message']);
                                }
                               ?> 
                            <div class="col-sm-4">
                            <label for="inputEmail3" class="col-sm-2 control-label">Department</label>
                            </div>
                            <div class="col-sm-7">
                                <select name="department_id">
                                    <option value=" ">Select Department...</option>
                                    <?php
                                    $all_department = $obj_admin->select_all_department();
                                    while ($row = mysql_fetch_assoc($all_department)) {
                                        echo '<option value="'.$row['department_id'].'">'.$row['department_name'].'</option>';
                                        } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                            <label for="inputEmail3" class="col-sm-2 control-label">Nurse</label>
                            </div>
                            <div class="col-sm-7">
                                <select name="nurse_id">
                                    <option value=" ">Select Nurse...</option>
                                    <?php
                                    $all_nurse = $obj_admin->get_all_nurse();
                                    while ($row = mysql_fetch_assoc($all_nurse)) {
                                        echo '<option value="'.$row['nurse_id'].'">'.$row['nurse_name'].'</option>';
                                        } ?>
                                </select>
                            </div>
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-default">Cancel</button>
                        <button type="submit" name="btn_nurse" class="btn btn-info pull-right">Save</button>
                    </div><!-- /.box-footer -->
                </form>
            </div><!-- /.box -->
            <!-- general form elements disabled -->
        </div><!--/.col (right) -->
    </div>   <!-- /.row -->
</section><!-- /.content -->