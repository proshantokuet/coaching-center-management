<?php 
$model =  Inflector::singularize($this->request->params['controller']);
$v = ucfirst($model);
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Payment of  <?php echo $this->request->data['Student']['name'] ?>
        
      </h1>
      <ol class="breadcrumb">
        <li><?php echo $this->Html->link(' Home', array('controller' => 'Users', 'action' => $home_page)); ?>
        </li>
        <li><?php echo $this->Html->link('Student', array('controller' => 'Students', 'action' => 'index')); ?>
         </li>           
        <li class="active">Payment Creation of <?php echo $this->request->data['Student']['name'] ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title"></h3>

          <div class="box-tools pull-right">
             <?php  echo $this->Html->link('Course Assign', array('controller' => 'Students', 'action' => 'course',$this->request->data['Student']['id']),array('class'=>'label label-success'));
           ?>

           <?php  echo $this->Html->link('Student Summary Print', array('controller' => 'Students', 'action' => 'print_form',$this->request->data['Student']['id']),array('target'=>'_blank','class'=>'label label-success'));
           ?>
          </div>
        </div>
        <!-- /.box-header -->
       <?php echo $this->Form->create($v, array('type'=>'file'));?>
        <div class="box-body ">
          <div class="row">
          	<div class="col-md-12">
          		<div class="row  form-group">
              <div class="col-md-2">
                <label>Course</label>
               
              </div>
              <div class="col-md-1">
                <label>Fees</label>                
              </div>
              <div class="col-md-1">
                <label>Payment</label>                
              </div>
              <div class="col-md-1">
                <label>Due</label>               
              </div>
              <div class="col-md-2">
                <label>Payment Date</label>               
              </div>
              <div class="col-md-2">
                <label>Pay Now</label>               
              </div>
              <div class="col-md-2">
                <label>Next Payment Date</label>               
              </div>
          </div>
          <?php if(!empty($this->request->data['Fee'])){?>
            <?php foreach ($this->request->data['Fee'] as $key => $value) { ?>           	
            
            <div class="row  form-group">
              <div class="col-md-2">
                <div><?php echo $value['name'];?></div>
              </div>
              <div class="col-md-1">               
                 <div><?php  echo $value['fees']; ?></div>
              </div>
              <div class="col-md-1">                
                <div><?php  echo $value['payment']; ?></div>
              </div>
              <div class="col-md-1"> 
              <div><?php  echo $value['due']; ?></div>                             
              </div>
              <div class="col-md-2"> 
              <div><?php  echo $value['due_date']; ?></div>                             
              </div>
              <div class="col-md-2"> 
              	<input  type="number" name="amount[]"   class="form-control">
              	<input  type="hidden" name="course_id[]" value=<?php echo  $value['id'] ?>>
                                        
              </div>
              <div class="col-md-2"> 
                <input type="text" id="due_date" class="form-control due_date" name="due_date[]">
              </div>
          </div>

 		<?php } } ?>

        </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
         <div class="box-footer">
                <button type="submit" style="float:right" class="btn btn-primary">Submit</button>
              </div>
        </form>
        
        <div class="box-header">
        	<div class="col-md-6">        		
        	<div class="box-tools pull-left"> <h3>Student Summary</h3></div>
              <div class="box-body no-padding">
              	<table class="table table-condensed">
	                <tbody>
	                	<tr> <th>Name</th><td><?php echo $this->request->data['Student']['name'] ?></td></tr>
			             <tr> <th>Father Name</th><td><?php echo $this->request->data['Student']['father_name'] ?>
                   </td></tr>
			             
			             <tr><th>Total Fees</th><td><?php echo $total_fees ?></td></tr>		            
			             <tr> <th>Total Payment</th><td><?php echo $total_payment ?></td></tr>
			             <tr> <th>Total Due</th><td><?php echo $total_due ?></td></tr>
	              	</tbody>
          		</table>
            </div>
            </div>
        </div>
      </div>
      <!-- /.box -->

      
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

