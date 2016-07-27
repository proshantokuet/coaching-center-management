<?php 
$model =  Inflector::singularize($this->request->params['controller']);
$v = ucfirst($model);
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Student Creation Page
        
      </h1>
      <ol class="breadcrumb">
        <li><?php echo $this->Html->link(' Home', array('controller' => 'Homes', 'action' => 'index')); ?>
        </li>
        <li><?php echo $this->Html->link($v, array('controller' => $this->request->params['controller'], 'action' => 'index')); ?>
         </li>           
        <li class="active">Student Creation Page</li>
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
                <label>Username</label>
                <?php  echo $this->Form->input('User.username',array('placeholder'=>'Username','class'=>'form-control','label'=>false,'div'=>false)); ?>
              </div>

              <div class="form-group">
                <label>Student Name</label>
                <?php  echo $this->Form->input('name',array('placeholder'=>'Student name','class'=>'form-control','label'=>false,'div'=>false)); ?>
              </div>
              

              <div class="form-group">
                <label>Father Name</label>
                <?php  echo $this->Form->input('father_name',array('placeholder'=>'Father name','class'=>'form-control','label'=>false,'div'=>false)); ?>
              </div>
              <div class="form-group">
                <label>Mother Name</label>
                <?php  echo $this->Form->input('mother_name',array('placeholder'=>'Mother name','class'=>'form-control','label'=>false,'div'=>false)); ?>
              </div>
              <div class="form-group">
                <label>Student Phone</label>
                <?php  echo $this->Form->input('contact_student',array('placeholder'=>'Student Contact','class'=>'form-control','label'=>false,'div'=>false)); ?>
              </div>
              <div class="form-group">
                <label>Present Address</label>
                <?php  echo $this->Form->input('present_address',array('placeholder'=>'Present Address','class'=>'form-control','label'=>false,'div'=>false)); ?>
              </div>
              <div class="form-group">
                <label>Institute</label>
                <?php  echo $this->Form->input('institution_id',array('empty'=>'Please Select','options'=>$institutions,'class'=>'form-control','label'=>false,'div'=>false)); ?>
              </div>
              <div class="form-group">
                <label>Batch</label>
                <?php  echo $this->Form->input('batch_id',array('empty'=>'Please Select','options'=>$batches,'class'=>'form-control','label'=>false,'div'=>false)); ?>
              </div>
              <div class="form-group">
                <label>Student ID</label>
                <?php  echo $this->Form->input('id_number',array('placeholder'=>'Student Id','class'=>'form-control','label'=>false,'div'=>false)); ?>
              </div>
              
              
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Password</label>
                <?php  echo $this->Form->input('User.password',array('placeholder'=>'Password','class'=>'form-control','label'=>false,'div'=>false)); ?>
              </div>
              <div class="form-group">
                <label>Nick Name</label>
                <?php  echo $this->Form->input('nick_name',array('placeholder'=>'Nick Name','class'=>'form-control','label'=>false,'div'=>false)); ?>
              </div>
              <div class="form-group">
                <label>Father Occupation</label>
                <?php  echo $this->Form->input('father_occupation',array('placeholder'=>'Father Occupation','class'=>'form-control','label'=>false,'div'=>false)); ?>
              </div>
              <div class="form-group">
                <label>Mother Occupation</label>
                <?php  echo $this->Form->input('mother_occupation',array('placeholder'=>'Mother Occupation','class'=>'form-control','label'=>false,'div'=>false)); ?>
              </div>
              <div class="form-group">
                <label>Guardian Phone</label>
                <?php  echo $this->Form->input('contact_guardian',array('placeholder'=>'Guardian Contact','class'=>'form-control','label'=>false,'div'=>false)); ?>
              </div>
              <div class="form-group">
                <label>Email</label>
                <?php  echo $this->Form->input('email',array('placeholder'=>'Email','class'=>'form-control','label'=>false,'div'=>false)); ?>
              </div>
              <div class="form-group">
                <label>Education Level</label>
                <?php  echo $this->Form->input('edu_level',array('empty'=>'Please Select','options'=>$edu_level,'class'=>'form-control','label'=>false,'div'=>false)); ?>
              </div>
              
             <div class="form-group">
                <label>Picture</label>
                <input type="file" id="file" name="picture">
              </div>

            </div>
			
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <div class="col-md-12">
            <br />
           
            <div class="row  form-group" id="prescription">
              <div class="col-md-2">
                <label>Course</label>
                <?php echo $this->Form->input('BatchTime.course_id',array('options' => $courses,'label'=> false,'div'=> false)); ?>
              </div>
          </div>
           <div id="addCourse" class="btn btn-primary">Add Course</div>
        </div>
        <!-- /.box-body -->
         <div class="box-footer">
                <button style="float:right" type="submit" class="btn btn-primary">Submit</button>
              </div>
        </form>
      </div>
      <!-- /.box -->

      
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


