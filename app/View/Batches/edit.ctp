<?php 
$model =  Inflector::singularize($this->request->params['controller']);
$v = ucfirst($model);
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Batch Edit Page
        
      </h1>
      <ol class="breadcrumb">
        <li><?php echo $this->Html->link(' Home', array('controller' => 'Users', 'action' => 'userlists')); ?>
        </li>
        <li><?php echo $this->Html->link($v, array('controller' => $this->request->params['controller'], 'action' => 'index')); ?>
         </li>           
        <li class="active">Batch Edit Page</li>
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
                <?php echo $this->Form->input('id'); ?>  
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
              <?php foreach($this->request->data['BatchTime'] as $key => $course){  ?>
              <div  style="clear:both" class="rowss"> 
                <div class="col-md-2">
                  <label>Course Id </label>
                  <?php $courseName  = $this->requestAction('courses/name/'.$course['course_id']) ;
                  
                  ?>
                  <input  type="hidden" name="id[]" value=<?php echo $course['id'] ?>>
                  <input  type="text" name="course[]" readonly="true" value=<?php echo $courseName ?> class="form-control">
                </div>
                <div class="col-md-2"> 
                  <label>Day</label>
                  <input  type="text" name="day[]" readonly="true" value=<?php echo $course['day'] ?> class="form-control"> 
                </div>
                <div class="col-md-2"> 
                  <label>Start Time</label>
                  <input  type="text" name="start_time[]" readonly="true" value=<?php echo $course['start_time'] ?> class="form-control"> 
                </div>
                <div class="col-md-2"> 
                  <label>End Time</label>
                  <input  type="text" name="end_time[]" readonly="true" value=<?php echo $course['end_time'] ?> class="form-control"> 
                </div>
                <div class="col-md-1"><label>&nbsp;</label>
                  <button  type="button"
                    class="btn  btn-md remove">
                    <span class="glyphicon" aria-hidden="true">Delete</span></button>
                </div>      
              </div>
              <?php } ?>
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


