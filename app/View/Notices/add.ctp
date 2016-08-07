<?php 
$model =  Inflector::singularize($this->request->params['controller']);
$v = ucfirst($model);
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Notice Creation Form
        
      </h1>
     <ol class="breadcrumb">
        <li><?php echo $this->Html->link(' Home', array('controller' => 'Users', 'action' => $home_page)); ?>
        </li>
        <li><?php echo $this->Html->link($v, array('controller' => $this->request->params['controller'], 'action' => 'index')); ?>
         </li>        
        <li class="active">Notice Creation Form</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title"></h3>

          <div class="box-tools pull-right">
            
          </div>
        </div>
        <!-- /.box-header -->
       <?php echo $this->Form->create($v, array('type'=>'file'));?>
        <div class="box-body ">
          <div class="row">
          	
            <div class="col-md-6">
              <div class="form-group">
                <label>Title <span class="required">*</span></label>
                <?php  echo $this->Form->input('name',array('placeholder'=>'Title','class'=>'form-control','label'=>false,'div'=>false)); ?>
              </div>
              <div class="form-group">
                <label>Description</label>
                <?php  echo $this->Form->input('description',array('class'=>'form-control','label'=>false,'div'=>false)); ?>
              </div>
              
            </div>
            
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
         <div class="box-footer">
                <button type="submit" style="float:right" class="btn btn-primary">Submit</button>
              </div>
        </form>
      </div>
      <!-- /.box -->

      
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


