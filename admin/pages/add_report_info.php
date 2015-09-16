<?php
if (isset($_GET['pnid'])) {
    $pres_nurse_id = $_GET['pnid'];
    
    if(isset($_POST['btn'])){
        $obj_report->add_report($_POST,$_FILES);
    }
    ?>
    <section class="content-header">
        <h1>
            Requested Report View
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Requested Report View</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border" style="padding-bottom: 30px;">
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-3"></div>
                        <div class="box-tools pull-right">
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                        <div class="mailbox-controls">
                            <!-- Check all button -->
                            <button class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>
                            <div class="btn-group">
                                <button class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                                <button class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                                <button class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                            </div><!-- /.btn-group -->
                            <button class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                            <div class="pull-right">

                                <div class="btn-group">
                                    <button class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                                    <button class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                                </div><!-- /.btn-group -->
                            </div><!-- /.pull-right -->
                        </div>
                        <div class="table-responsive mailbox-messages col-md-8 col-md-offset-2">
                            <form method="post" action="" enctype="multipart/form-data">
                                <table class="table table-hover table-striped">
                                    <tbody>
                                        <?php
                                        $i = 0;
                                        $test_by_pid = $obj_admin->get_test_by_pid($pres_nurse_id);
                                        while ($row = mysql_fetch_assoc($test_by_pid)) {
                                            ?>
                                            <tr>
                                                <td><?php echo ++$i; ?></td> 
                                                <td><?php echo $row['test_name']; ?></td> 
                                                <td style="color: red">Upload</td> 
                                                <td>
                                                    <input type="file" name="test_image[]">
                                                    <input type="hidden" name="test_id[]" value="<?php echo $row['test_id']; ?>">
                                                    <input type="hidden" name="pres_nurse_id[]" value="<?php echo $pres_nurse_id; ?>">
                                                </td> 
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table><!-- /.table -->
                                <button class="btn btn-bitbucket pull-right" type="submit" name="btn">Submit</button>
                            </form>
                        </div><!-- /.mail-box-messages -->
                    </div><!-- /.box-body -->
                    <div class="box-footer no-padding">
                        <div class="mailbox-controls">
                            <!-- Check all button -->
                            <button class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>
                            <div class="btn-group">
                                <button class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                                <button class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                                <button class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                            </div><!-- /.btn-group -->
                            <button class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                                    <button class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                                </div><!-- /.btn-group -->
                            </div><!-- /.pull-right -->
                        </div>
                    </div>
                </div><!-- /. box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
    <?php
}