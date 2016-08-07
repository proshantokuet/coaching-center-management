<?php 
$model =  Inflector::singularize($this->request->params['controller']);
$v = ucfirst($model);
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Course Edit Page
        
      </h1>
      <ol class="breadcrumb">
        <li><?php echo $this->Html->link(' Home', array('controller' => 'Users', 'action' => $home_page)); ?>
        </li>
         <li><?php echo $this->Html->link($v, array('controller' => $this->request->params['controller'], 'action' => 'index')); ?>
         </li>      
        <li class="active">Course Edit Page</li>
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
                <label><?php echo $v ?>  Name</label>
                <?php echo $this->Form->input('id'); ?>                
                <?php  echo $this->Form->input('name',array('placeholder'=>$v.' name','class'=>'form-control','label'=>false,'div'=>false)); ?>
              </div>
              <div class="form-group">
                <label><?php echo $v?> Description</label>
                <?php  echo $this->Form->input('description',array('placeholder'=>$v.' Description','class'=>'form-control','label'=>false,'div'=>false)); ?>
                
              </div>
              
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <label><?php echo $v?>  Code</label>               
               <?php  echo $this->Form->input('code',array('placeholder'=>$v.' Code',
               'class'=>'form-control','label'=>false,'div'=>false)); ?>
              </div>

              <div class="form-group">
                <label><?php echo $v?> Fees</label>
               <?php  echo $this->Form->input('fees',array('placeholder'=>$v.' Fees',
               'class'=>'form-control','label'=>false,'div'=>false)); ?>
              </div>

            </div>
			
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <div class="col-md-12">
            <br /> 
            <div class="row  form-group" id="prescription">
              <div class="col-md-2">
                <label> Batch</label><br />
                <?php echo $this->Form->input('Course.batch_id',array('options' => $batches,'label'=> false,'div'=> false)); ?>
              </div>
                <?php foreach($this->request->data['CourseBatch'] as $key => $batch){
                $batchName  = $this->requestAction('batches/name/'.$batch['batch_id']) ;
               ?>
              <div  style="clear:both" class="rowss">                 
                <div class="col-md-2"> 
                  <label>&nbsp;</label>
                  <input  type="text" name="batch[]" readonly="true" value=<?php echo $batchName ?> class="form-control"> 
                </div>
                <div class="col-md-1"><label>&nbsp;</label>
                  <button  type="button"
                    class="btn  btn-md remove">
                    <span class="glyphicon" aria-hidden="true">Delete</span></button>
                </div> 
                     
              </div>
              <?php } ?>
          </div>
           <div id="addBatch" class="btn btn-primary">Add Batch</div>
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


