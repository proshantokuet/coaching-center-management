<?php 
$model =  Inflector::singularize($this->request->params['controller']);
$v = ucfirst($model);
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Batch Creation Page
        
      </h1>
      <ol class="breadcrumb">
        <li><?php echo $this->Html->link(' Home', array('controller' => 'Homes', 'action' => 'index')); ?>
        </li>
        <li><?php echo $this->Html->link($v, array('controller' => $this->request->params['controller'], 'action' => 'index')); ?>
         </li>           
        <li class="active">Batch Creation Page</li>
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
                <label>Batch Name</label>
                <?php  echo $this->Form->input('name',array('placeholder'=>'Batch name','class'=>'form-control','label'=>false,'div'=>false)); ?>
              </div>
              
              
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Description</label>
                <?php  echo $this->Form->input('description',array('placeholder'=>'description','class'=>'form-control','label'=>false,'div'=>false)); ?>
              </div>
            </div>
			
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <div class="col-md-12">
            <br />
            <div id="addPrescription" class="btn btn-primary">Add Course</div>
            <div class="row  form-group" id="prescription">
              <div class="col-md-2">
                <label>Course</label>
                <?php echo $this->Form->input('BatchTime.course_id',array('options' => $courses,'label'=> false,'div'=> false)); ?>
              </div>
              <div class="col-md-2">
                <label>Day</label>
                <?php echo $this->Form->select('BatchTime.day',array('options' => $days,'label'=> false,'div'=> false)); ?>
              </div>
              <div class="col-md-2">
                <label>Start Time</label>
                <div class="bootstrap-timepicker">
                  <div class="form-group">
                    <div class="input-group">
                      <input id="startTime" type="text" class="form-control timepicker">

                      <div class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                      </div>
                    </div>
                    <!-- /.input group -->
                  </div>
                <!-- /.form group -->
                </div>
              </div>
              <div class="col-md-2">
                <label>End Time</label>
                <div class="bootstrap-timepicker">
                  <div class="form-group">
                    <div class="input-group">
                      <input id="endTime" type="text" class="form-control timepicker">

                      <div class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                      </div>
                    </div>
                    <!-- /.input group -->
                  </div>
                <!-- /.form group -->
                </div>
              </div>


          </div>

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


