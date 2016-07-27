<?php 
$model =  Inflector::singularize($this->request->params['controller']);
$v = ucfirst($model);
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrappers" style="background-color: #ecf0f5">
    <!-- Content Header (Page header) -->
     <?php echo $this->element("menu/head"); ?>

    <!-- Main content -->
    <section class="content">
      <?php echo $this->element("menu/menu"); ?>
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

          
        <!-- /.box-body -->
         <div class="box-footer">
                <button  style="float:right" type="submit" class="btn btn-primary">Submit</button>
              </div>
        </form>
      </div>
      <!-- /.box -->

      
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


