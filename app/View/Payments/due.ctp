<?php 
$model =  Inflector::singularize($this->request->params['controller']);
$v = ucfirst($model);
?>

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Due Amount 
      </h1>
      <ol class="breadcrumb">
        <li><?php echo $this->Html->link(' Home', array('controller' => 'Users', 'action' => $home_page)); ?>
        </li>       
        <li class="active">Due Amount</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title"></h3>

          <div class="box-tools pull-right">
            <h3 style="float:right" class="box-title">
            <h3 style="float:right" class="box-title"><?php echo $this->Html->link(__("New Search"), array('plugin' => 0, 'controller' => $this->request->params['controller'], 'action' => 'statement'),array('class'=>'btn btn-default btn-flat')); ?></h3>
          </div>
        </div>
        
        <!-- /.box-header -->
       <?php echo $this->Form->create('Home', array('type' => 'get', 'url' => array('controller' => 'Payments', 'action' => 'due_payment')));?>
        <div class="box-body ">
          <div class="row"> 
            <div class="col-md-4">
              <div class="form-group">
                <label>Student Name</label>
               <input type="text" id="role" value="<?php echo @$s_name_role ?>"  class="form-control" name="name">
              </div>              
            </div>           
            <div class="col-md-4">
              <div class="form-group">
                <label>Start Date</label>
               <input type="text" id="start" value="<?php echo @$start?>" required="required" class="form-control due_date" name="start">
              </div>              
            </div>
            <!-- /.col -->
            <div class="col-md-4">
              <div class="form-group">
                <label>End Date</label>
               <input type="text" id="end" value="<?php echo @$end?>" required="required" class="form-control due_date" name="end">
              </div>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
         <div class="box-footer" >
          <button style="float:right" type="submit" class="btn btn-primary">Submit</button>          
          </div>
        </form>
        

      <div class="box-body">
        <?php 
        if(!empty($values)){  ?>
        
        <table cellpadding="0" cellspacing="0" class="table" >
        <?php  
        $tableHeaders =  $this->Html->tableHeaders(array(
          'Student Name',
          'Course',
          'Due Amount',
          'Due Payment Date',
                    
        ));
        echo $tableHeaders;
        $rows = array();
        $total = 0;
        foreach ($values AS $value) {
          $amount = $value['Course']['fees']-$value['Payment']['amount'];
          $rows[] = array(
            $value['Student']['name'],     
            $value['Course']['name'],
            $amount,
            $value['Payment']['due_date'],           
                      
            );
          }
          echo $this->Html->tableCells($rows);
          
          echo '</table>'; 
          
        }       
        ?>  

         </div>

        <!-- /.box-body -->
        
      </div>
      <!-- /.box -->

      
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  