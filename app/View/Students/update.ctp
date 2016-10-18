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
          <h3 class="box-title">Edit Form </h3>

          <div class="box-tools pull-right">
            
          </div>
        </div>
        <!-- /.box-header -->
        <?php echo $this->Form->create($v, array('type'=>'file'));?>
        <div class="box-body ">
          <div class="row">
            
            <div class="col-md-6">             

              <div class="form-group">
                <label>Student Name <span class="required">*</span></label>
                 <?php  echo $this->Form->hidden('id'); ?>
                
                 <?php  echo $this->Form->hidden('User.id'); ?>
                <?php  echo $this->Form->input('name',array('placeholder'=>'Student name','class'=>'form-control','label'=>false,'div'=>false)); ?>
              </div>
              <div class="form-group">
                <label>Father Name <span class="required">*</span></label>
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
                <?php  echo $this->Form->input('institution_id',array('options'=>$institutions,'class'=>'form-control','label'=>false,'div'=>false)); ?>
              </div>
              
             
              <div class="form-group">
                <label>Secret key <span class="required">*</span></label>
                <?php  echo $this->Form->input('User.question',array('placeholder'=>'Secret key','class'=>'form-control','label'=>false,'div'=>false)); ?>   
               
              </div>
               
               
               
              
            </div>
            <!-- /.col -->
            
            <div class="col-md-6">              
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
                <label>Class</label>
                <?php  echo $this->Form->input('passing_year',array('options'=>$year_of_passing,'class'=>'form-control','label'=>false,'div'=>false)); ?>
              </div>
              
               <div class="form-group">
                <label>Branch</label>
                 <?php  echo $this->Form->input('branch',array('options'=>$branches,'class'=>'form-control','label'=>false,'div'=>false)); ?>
              </div>
              
             <div class="form-group">
                <label>Picture</label>
                <input type="file" id="file" name="picture" onchange="readURL(this,this.id);">
                <img class="remove" id="img" src="#" alt="" />
                <?php echo $thumbnail= $this->Html->image('user/thumbnail/'.$this->request->data['Student']['thumbnail'],array('class'=>'user-image')); ?>
              </div>

            </div>
      
            <!-- /.col -->
          </div>
          <!-- /.row -->
			<div class="col-md-12 row">
			   <div class="row">
				   <div class="col-md-6">
					  <label> Birth Date </label>
					  <?php  echo $this->Form->input('birth_date',array('class'=>'form-control due_date','type'=>'text','label'=>false,'div'=>false)); ?>
					</div>
					<div class="col-md-6">
					  <label> Blood Group </label>
					  <?php  echo $this->Form->input('branch',array('empty'=>'Please Select','options'=>$blood_group,'class'=>'form-control','label'=>false,'div'=>false)); ?>
					</div>
			   </div>
		   </div>
           <div class="col-md-12 row">
			   <div class="row">
				   <div class="col-md-6">
					  <label> Remarkable academic performance </label>
					  <?php  echo $this->Form->input('academic_performance',array('class'=>'form-control','label'=>false,'div'=>false)); ?>
					</div>
					<div class="col-md-6">
					  <label> Extra curricular activities </label>
					  <?php  echo $this->Form->input('extra_curricular_activities',array('class'=>'form-control','label'=>false,'div'=>false)); ?>
					</div>
			   </div>
		   </div>
		  <div class="col-md-12">
			  <div class="row">
				  <div class="col-md-3">
					  <label> Exam Name </label>
					  <?php  echo $this->Form->input('AcademicResult.0.exam',array('value'=>'PSC','class'=>'form-control','label'=>false,'div'=>false)); ?></div>
				  <div class="col-md-3"><label> Passing Year</label>
					<?php  echo $this->Form->input('AcademicResult.0.year',array('empty'=>'Please Select','options'=>$years,'class'=>'form-control','label'=>false,'div'=>false)); ?>
				  </div>
				  <div class="col-md-3">
					  <label> Institution </label>
					<?php  echo $this->Form->input('AcademicResult.0.institution',array('empty'=>'Please Select','options'=>$institutions,'class'=>'form-control','label'=>false,'div'=>false)); ?>
				  </div>
				  <div class="col-md-3">
					  <label> GPA </label>
					<?php  echo $this->Form->input('AcademicResult.0.gpa',array('class'=>'form-control','label'=>false,'div'=>false)); ?>
					<?php  echo $this->Form->input('AcademicResult.0.id',array('type'=>'hidden','class'=>'form-control','label'=>false,'div'=>false)); ?>
				  </div>
			  </div>
			  <div class="row">
				  <div class="col-md-3">
					  <label> Exam Name </label>
					  <?php  echo $this->Form->input('AcademicResult.1.exam',array('value'=>'JSC','class'=>'form-control','label'=>false,'div'=>false)); ?></div>
				  <div class="col-md-3"><label> Passing Year</label>
					<?php  echo $this->Form->input('AcademicResult.1.year',array('empty'=>'Please Select','options'=>$years,'class'=>'form-control','label'=>false,'div'=>false)); ?>
				  </div>
				  <div class="col-md-3">
					  <label> Institution </label>
					<?php  echo $this->Form->input('AcademicResult.1.institution',array('empty'=>'Please Select','options'=>$institutions,'class'=>'form-control','label'=>false,'div'=>false)); ?>
				  </div>
				  <div class="col-md-3">
					  <label> GPA </label>
					<?php  echo $this->Form->input('AcademicResult.1.gpa',array('class'=>'form-control','label'=>false,'div'=>false)); ?>
					<?php  echo $this->Form->input('AcademicResult.1.id',array('type'=>'hidden','class'=>'form-control','label'=>false,'div'=>false)); ?>
				  </div>
			  </div>
			  <div class="row">
				  <div class="col-md-3">
					  <label> Exam Name </label>
					  <?php  echo $this->Form->input('AcademicResult.2.exam',array('value'=>'SSC','class'=>'form-control','label'=>false,'div'=>false)); ?></div>
				  <div class="col-md-3"><label> Passing Year</label>
					<?php  echo $this->Form->input('AcademicResult.2.year',array('empty'=>'Please Select','options'=>$years,'class'=>'form-control','label'=>false,'div'=>false)); ?>
				  </div>
				  <div class="col-md-3">
					  <label> Institution </label>
					<?php  echo $this->Form->input('AcademicResult.2.institution',array('empty'=>'Please Select','options'=>$institutions,'class'=>'form-control','label'=>false,'div'=>false)); ?>
				  </div>
				  <div class="col-md-3">
					  <label> GPA </label>
					<?php  echo $this->Form->input('AcademicResult.2.gpa',array('class'=>'form-control','label'=>false,'div'=>false)); ?>
					<?php  echo $this->Form->input('AcademicResult.2.id',array('type'=>'hidden','class'=>'form-control','label'=>false,'div'=>false)); ?>
				  </div>
			  </div>
				<div class="row">
				  <div class="col-md-3">
					  <label> Exam Name </label>
					  <?php  echo $this->Form->input('AcademicResult.3.exam',array('value'=>'HSC','class'=>'form-control','label'=>false,'div'=>false)); ?></div>
				  <div class="col-md-3"><label> Passing Year</label>
					<?php  echo $this->Form->input('AcademicResult.3.year',array('empty'=>'Please Select','options'=>$years,'class'=>'form-control','label'=>false,'div'=>false)); ?>
				  </div>
				  <div class="col-md-3">
					  <label> Institution </label>
					<?php  echo $this->Form->input('AcademicResult.3.institution',array('options'=>$institutions, 'empty'=>'Please Select', 'class'=>'form-control','label'=>false,'div'=>false)); ?>
				  </div>
				  <div class="col-md-3">
					  <label> GPA </label>
					<?php  echo $this->Form->input('AcademicResult.3.gpa',array('class'=>'form-control','label'=>false,'div'=>false)); ?>
					<?php  echo $this->Form->input('AcademicResult.3.id',array('type'=>'hidden','class'=>'form-control','label'=>false,'div'=>false)); ?>
				  </div>
			  </div>  
			  
		  </div>
		<br />

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
<script>
function readURL(input, name) {
        //$("#del").css("display", 'block');
        //alert(name);
        var idd = name.split('_');
        var ids = idd[1];
        
        if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
            $("#img")
              .attr('src', e.target.result)
              .width(100)
              .height(100);
          };

          reader.readAsDataURL(input.files[0]);
         /* $("#"+name).css("display", 'none');
          $(".rem"+ids).css("display", 'inline-block');*/
        }
      
      
      }
</script>
