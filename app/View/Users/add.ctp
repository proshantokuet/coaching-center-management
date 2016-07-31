<?php 
$model =  Inflector::singularize($this->request->params['controller']);
$v = ucfirst($model);
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Creation Page
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Advanced Elements</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Please fillup the form </h3>

          <div class="box-tools pull-right">
            
          </div>
        </div>
        <!-- /.box-header -->
       <?php echo $this->Form->create($v, array('type'=>'file'));?>
        <div class="box-body ">
          <div class="row">
          	
            <div class="col-md-6">
              <div class="form-group">
                <label>Name</label>
                <input class="form-control" name=data[User][name] type="text" placeholder="Name">
              </div>
              <div class="form-group">
                <label>User name</label>
                <input class="form-control" name=data[User][username] type="text" placeholder="User Name">
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Email</label>
                <input class="form-control" name=data[User][email] type="text" placeholder="Email">
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Mobile</label>
               <input type="text" name=data[User][mobile] class="form-control"  placeholder="Mobile">
              </div>

              <div class="form-group">
                <label>Password</label>
               <input type="password" name=data[User][password] class="form-control" id="exampleInputPassword1" placeholder="Password">
              </div>

              <!-- <div class="form-group">
                <label>Re-Type Password</label>
               <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Re-Type Password">
              </div> -->
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Address</label>
               <input type="text" name=data[User][address] class="form-control"  placeholder="Address">
              </div>

              <div class="form-group">
                <label>Status</label>
                <?php
                echo $this->Form->checkbox('status');
                ?>
              </div>
				      <div class="form-group">
                <label>Picture</label>
                <input type="file" id="file" name="picture">
              </div>
              <!-- /.form-group -->
            </div>
			
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
         <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
        </form>
      </div>
      <!-- /.box -->

      
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


