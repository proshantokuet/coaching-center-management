<?php
	$model =  Inflector::singularize($this->request->params['controller']);		  
	$v = ucfirst($model);
?>

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        All users
      </h1>
      <ol class="breadcrumb">
        <li><?php echo $this->Html->link(' Home', array('controller' => 'Users', 'action' => $home_page)); ?>
        </li>
        <li><?php echo $this->Html->link($v, array('controller' => $this->request->params['controller'], 'action' => 'index')); ?>
         </li>           
        <li class="active">User lists</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    	<div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title"> <?php  echo $this->Session->flash(); ?> </h3>

          <div class="box-tools pull-right">
            <h3 style="float:right" class="box-title"><?php echo $this->Html->link(__("Add New User"), array('plugin' => 0, 'controller' => $this->request->params['controller'], 'action' => 'add'),array('class'=>'btn btn-default btn-flat')); ?></h3>
          </div>
        </div>
    	<div class="row">
        <div class="col-xs-12">
          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">
				<?php 
				if(!empty($values)){  ?>
				<table cellpadding="0" cellspacing="0" class="table" >
				<?php  
				$tableHeaders =  $this->Html->tableHeaders(array(                   
					$this->Paginator->sort('username'),
					$this->Paginator->sort('email'),
					$this->Paginator->sort('phone'),
					$this->Paginator->sort('role_id'),
					$this->Paginator->sort('status'),
					'Action'		   
										
				));
				echo $tableHeaders;
				$rows = array();
				foreach ($values AS $value) {			
					if($value[$model]['status'] == 1){
						$icon= '<span class="label label-success">Approved</span>';
					}else{	
						$icon = '<span class="label label-warning">Pending</span>';
					}
					$status = $this->Form->postLink(__($icon, true), array(		
						'controller' => $this->request->params['controller'],
						'action' => 'status',
						$value[$model]['id'],
						),array('escape' => false, 'confirm' => __('Want to change status?'))
					);					
					$action = $this->Html->link('Edit ', array('controller' =>$this->request->params['controller'], 'action' => 'edit', $value[$v]['id']),array('class'=>'fa fa-pencil-square-o'));					
					/*$action .= ' '.$this->Form->postLink(__(' Delete', true), array(		
						'controller' => $this->request->params['controller'],
						'action' => 'delete',
						$value[$v]['id'],
						),array('class'=>'fa fa-times','escape' => false, 'confirm' => __('Want to delete?'))
					);*/
					$action .= ' '.$this->Html->link(' Change Password', array('controller' =>$this->request->params['controller'], 'action' => 'changepassword', $value[$v]['id']));	
					
					$rows[] = array(
						$value[$v]['username'],
						$value[$v]['email'],
						$value[$v]['mobile'],		
						$value[$v]['role'],
						$status,
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
									<li class="paginate_button"><?php echo $this->Paginator->numbers(); ?></li>					
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
          </div>
      </div>
	</section>
    <!-- /.content -->
  </div>

  
