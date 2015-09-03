<section class="content-header">
          <h1>
            Make Prescription
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Prescription Manager</a></li>
            <li class="active">Make prescription</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            
            <!-- right column -->
            <div class="col-md-12">
              <!-- Horizontal Form -->
              <div class="box box-info">
                <!-- form start -->
                <form class="form-horizontal" method="post" action="?page=prescription_details">
                  <div class="box-body">
                      <?php
                        if(isset($_SESSION['message'])){
                            echo $_SESSION['message'];
                            unset($_SESSION['message']);
                        }
                      ?>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Number of Medicine</label>
                      <div class="col-sm-10">
                          <input type="text" name="medicine_number" size="40" id="inputEmail3" placeholder="Number of Medicine">&nbsp;&nbsp;&nbsp;
                          <button type="submit" name="btn" class="btn btn-info">Add Medicine</button>
                      </div>
                    </div>
                  </div><!-- /.box-footer -->
                </form>
              </div><!-- /.box -->
              <!-- general form elements disabled -->
              
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->