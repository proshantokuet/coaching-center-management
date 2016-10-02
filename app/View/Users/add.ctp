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
        <li><?php echo $this->Html->link(' Home', array('controller' => 'Users', 'action' => $home_page)); ?>
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
          <h3 class="box-title"> </h3>

          <div class="box-tools pull-right">
            
          </div>
        </div>
        <!-- /.box-header -->
       <?php echo $this->Form->create($v, array('type'=>'file'));?>
        <div class="box-body ">
          <div class="row">
          	
            <div class="col-md-6">
              <div class="form-group">
                <label>Name <span class="required">*</span></label>                
                 <?php  echo $this->Form->input('name',array('placeholder'=>'Name','class'=>'form-control','label'=>false,'div'=>false)); ?>
              </div>
              <div class="form-group">
                <label>User name <span class="required">*</span></label>
                <?php  echo $this->Form->input('username',array('placeholder'=>'User Name','class'=>'form-control','label'=>false,'div'=>false)); ?>                
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Email <span class="required">*</span></label>
                <?php  echo $this->Form->input('email',array('placeholder'=>'Email','class'=>'form-control','label'=>false,'div'=>false)); ?>   
                
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Mobile</label>
                <?php  echo $this->Form->input('mobile',array('placeholder'=>'Mobile','class'=>'form-control','label'=>false,'div'=>false)); ?>   
               
              </div>

              <div class="form-group">
                <label>Password <span class="required">*</span></label>
                <?php  echo $this->Form->input('password',array('placeholder'=>'Password','class'=>'form-control','label'=>false,'div'=>false)); ?> 
               
              </div>
             
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Address</label>
                <?php  echo $this->Form->input('address',array('placeholder'=>'Address','class'=>'form-control','label'=>false,'div'=>false)); ?> 
              </div>
              <div class="form-group">
                <label>Secret key <span class="required">*</span></label>
                <?php  echo $this->Form->input('question',array('placeholder'=>'Secret key','class'=>'form-control','label'=>false,'div'=>false)); ?>   
               
              </div>
               <div class="form-group">
                <label>Role <span class="required">*</span></label>
                <?php  echo $this->Form->input('role',array('options'=>array('admin'=>'admin','Front desk officer'=>'Front desk officer'),'class'=>'form-control','label'=>false,'div'=>false)); ?>   
               
              </div>
              <div class="form-group">
                <label>Status</label>
                <?php
                echo $this->Form->checkbox('status');
                ?>
              </div>
				      <div class="form-group">
                <label>Picture</label>
                 <input type="file" id="file" name="picture" onchange="readURL(this,this.id);">
                <img class="remove" id="img" src="#" alt="" />
              </div>
              <!-- /.form-group -->
            </div>
			
            <!-- /.col -->
          </div>
          <!-- /.row -->
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
