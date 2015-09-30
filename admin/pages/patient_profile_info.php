<?php
if (isset($_GET['sessid'])) {
    ?>
    <section class="content-header">
        <h1>
            Patient Profile
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Patient View</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="col-md-7 col-md-offset-2">
                        <div class="box box-solid" style="max-width: 400px;">
                            <div class="box-body no-padding">
                                <table id="layout-skins-list" class="table table-striped bring-up nth-2-center">
                                    <tbody>
                                        <tr>
                                            <td><b>Registration ID</b></td>
                                            <td><?php echo $result['patient_reg_id']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Name</b></td>
                                            <td><?php echo $result['patient_name']; ?> (<a href="">change</a>)</td>
                                        </tr>
                                        <tr>
                                            <td><b>Email Address</b></td>
                                            <td><?php echo $result['patient_email_address']; ?> (<a href="">change</a>)</td>
                                        </tr>
                                        <tr>
                                            <td><b>Phone Number</b></td>
                                            <td><?php echo $result['patient_phone_number']; ?> (<a href="">change</a>)</td>
                                        </tr>
                                        <tr>
                                            <td><b>Password</b></td>
                                            <td><?php echo $result['patient_password']; ?> (<a href="">change</a>)</td>
                                        </tr>
                                        <tr>
                                            <td><b>Date of Birth</b></td>
                                            <td><?php echo $result['patient_dob']; ?> (<a href="">change</a>)</td>
                                        </tr>
                                        <tr>
                                            <td><b>Address</b></td>
                                            <td><?php echo $result['patient_address']; ?> (<a href="">change</a>)</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    </div>


                </div><!-- /. box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
    <?php

}