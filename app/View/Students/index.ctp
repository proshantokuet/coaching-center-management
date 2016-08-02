<?php 
$model =  Inflector::singularize($this->request->params['controller']);
$v = ucfirst($model);
?>

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Student Search Form
      </h1>
      <ol class="breadcrumb">
        <li><?php echo $this->Html->link(' Home', array('controller' => 'Users', 'action' => 'userlists')); ?>
        </li>       
        <li class="active"> Student Search Form</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Please fillup the form </h3>

          <div class="box-tools pull-right">
            <h3 style="float:right" class="box-title"><?php echo $this->Html->link(__("Add New Student"), array('plugin' => 0, 'controller' => $this->request->params['controller'], 'action' => 'add'),array('class'=>'btn btn-default btn-flat')); ?></h3>
          </div>
        </div>
        <!-- /.box-header -->
       <?php echo $this->Form->create('Home', array('type' => 'get', 'url' => array('controller' => 'Students', 'action' => 'index')));?>
        <div class="box-body ">
          <div class="row">
            
            <div class="col-md-6">
              <div class="form-group">
                <label>Student Name</label>
                <?php  echo $this->Form->input('name',array('placeholder'=>'Student name','class'=>'form-control','label'=>false,'div'=>false,'value'=>$name)); ?>
              </div>
              <div class="form-group">
                <label>Student ID</label>
                <?php  echo $this->Form->input('id_number',array('placeholder'=>'Student ID','class'=>'form-control','label'=>false,'div'=>false,'value'=>$id_number)); ?>
              </div>
              <div class="form-group">
                <label>Batch</label>
                <?php  echo $this->Form->input('batch_id',array('empty'=>'Please Select','options'=>$batches,'class'=>'form-control','label'=>false,'div'=>false,'selected'=>$batch_id)); ?>
              </div>
              
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Email</label>
               <?php  echo $this->Form->input('email',array('placeholder'=>'email',
               'class'=>'form-control','label'=>false,'div'=>false,'value'=>$email)); ?>
              </div>
              <div class="form-group">
                <label>Student Phone </label>
               <?php  echo $this->Form->input('contact_student',array('placeholder'=>'Student Phone',
               'class'=>'form-control','label'=>false,'div'=>false,'value'=>$contact_student)); ?>
              </div>
             

            </div>
      
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>

<div class="box-body">
        <?php 
        if(!empty($values)){  ?>
        <table cellpadding="0" cellspacing="0" class="table" >
        <?php  
        $tableHeaders =  $this->Html->tableHeaders(array(                   
          $this->Paginator->sort('name'),         
          $this->Paginator->sort('batch_id'),
          $this->Paginator->sort('email'),
          $this->Paginator->sort('contact_student'),
          'Action',
                            
                                   
                    
        ));
        echo $tableHeaders;
        $rows = array();
        foreach ($values AS $value) {
          
          $action = $this->Html->link('Course Assign ', array('controller' =>$this->request->params['controller'], 'action' => 'edit', $value[$model]['id']),array('class'=>'label label-success'));         
          $action .= '     &nbsp;'.$this->Html->link('Admission Form Print', array('controller' =>$this->request->params['controller'], 'action' => 'print_form', $value[$model]['id']),array('target'=>'_blank','class'=>'label label-success')); 
          $action .= '     &nbsp;'.$this->Html->link('ID Card Print', array('controller' =>$this->request->params['controller'], 'action' => 'card', $value[$model]['id']),array('target'=>'_blank','class'=>'label label-success'));
          $action .= '&nbsp;'.$this->Html->link('Make Payment', array('controller' =>'Payments', 'action' => 'index', $value[$model]['id']),array('class'=>'label label-success'));  
          $name = $this->Html->link($value[$model]['name'], array('controller' =>$this->request->params['controller'], 'action' => 'edit', $value[$model]['id']));  
          $rows[] = array(
            $name,            
            $value['Batch']['name'],
            $value[$model]['email'],
            $value[$model]['contact_student'],
            $action,
                      
            );
          }
            echo $this->Html->tableCells($rows);

          echo '</table>'; 
          if ($pagingBlock = $this->fetch('paging')): ?>
          <?php echo $pagingBlock; ?>
          <?php else: ?>
            <?php if (isset($this->Paginator) && isset($this->request['paging'])): ?>
              <div class="dataTables_paginate paging_simple_numbers">
                <ul class="pagination">
                  <li class="paginate_button previous">
                    <?php echo $this->Paginator->first('< ' . __('First')); ?>  
                  </li>         
                  <li class="paginate_button"><?php echo $this->Paginator->numbers(array('separator'=>' ')); ?></li>         
                  <li class="paginate_button next" id="example2_next">
                    <?php echo $this->Paginator->last(__('Last') . ' >'); ?></li>
                </ul>

              </div>
              
            <?php endif; ?>
          <?php endif; 
        }       
        ?>  

         </div>

        <!-- /.box-body -->
         <div class="box-footer" >
                <button style="float:right" type="submit" class="btn btn-primary">Search</button>
              </div>
        </form>
      </div>
      <!-- /.box -->

      
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  