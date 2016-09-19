<?php 
$model =  Inflector::singularize($this->request->params['controller']);
$v = ucfirst($model);
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Student Edit Form
        
      </h1>
      <ol class="breadcrumb">
        <li><?php echo $this->Html->link(' Home', array('controller' => 'Users', 'action' => $home_page)); ?>
        </li>
        <li><?php echo $this->Html->link($v, array('controller' => $this->request->params['controller'], 'action' => 'index')); ?>
         </li>           
        <li class="active">Student Edit Form</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title"> </h3>

          <div class="box-tools pull-right">
            
          </div>
        </div>
        <!-- /.box-header -->
       <?php echo $this->Form->create($v, array('type'=>'file'));?>
        <div class="box-body ">
          <div class="row">
            <?php  echo $this->Form->hidden('id'); ?>
                 <?php  echo $this->Form->hidden('is_new',array('value'=>1)); ?>
                 <?php  echo $this->Form->hidden('User.id'); ?>
            
      
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <div class="col-md-12">
            <br />
            
            <div class="row  form-group" id="prescription">
              <div class="col-md-4">
                <label>Course</label>
                <?php echo $this->Form->input('BatchTime.course_id',array('options' => $courses,'label'=> false,'div'=> false)); ?>
              </div>
              <div class="col-md-4" id="batch">
                <label>Batch</label>
                <?php echo $this->Form->input('BatchTime.batch_id',array('options'=>'','empty'=>'Plesse Select','label'=> false,'div'=> false)); ?>
              </div>
         
          <?php foreach($this->request->data['StudentCourse'] as $key => $course){  ?>
              <div  style="clear:both" class="rowss"> 
                <div class="col-md-4">
                 <label>&nbsp;</label>
                  <?php $courseName  = $this->requestAction('courses/name/'.$course['course_id']) ;
                  
                  ?>                 
                  <input  type="text" name="course[]" readonly="true" value=<?php echo $courseName ?> class="form-control">
                </div>
                <div class="col-md-4">
                 <label>&nbsp;</label>
                  <?php $batchName  = $this->requestAction('batches/name/'.$course['batch_id']) ;
                  
                  ?>                 
                  <input  type="text" name="batch[]" readonly="true" value=<?php echo $batchName ?> class="form-control">
                </div>
                <div class="col-md-1"><label>&nbsp;</label>
				<?php if(!array_key_exists($course['course_id'],$course_payments)){ ?>
                  <button  type="button"
                    class="btn  btn-md remove">
                    <span class="glyphicon" aria-hidden="true">Delete</span></button>
				   <?php } ?>
                </div> 
                   
              </div>
              <?php } ?>
               </div>
              <div style="clear:both"></div>
              <br />
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
