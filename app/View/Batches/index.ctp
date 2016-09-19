<?php
	$model =  Inflector::singularize($this->request->params['controller']);		  
	$model = ucfirst($model);
?>

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        All Batches
      </h1>
      <ol class="breadcrumb">
        <li><?php echo $this->Html->link(' Home', array('controller' => 'Users', 'action' => $home_page)); 
        ?>
        </li>        
        <li class="active">Batch</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    	<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 style="float:right" class="box-title"><?php echo $this->Html->link(__("Add new"), array('plugin' => 0, 'controller' => $this->request->params['controller'], 'action' => 'add'),array('class'=>'btn btn-default btn-flat')); ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
				<?php 
				if(!empty($values)){  ?>
				<table cellpadding="0" cellspacing="0" class="table" >
				<?php  
				$tableHeaders =  $this->Html->tableHeaders(array(                   
					$this->Paginator->sort('name'),					
					$this->Paginator->sort('description'),
					$this->Paginator->sort('user_id'),
					$this->Paginator->sort('status'),
					'Actions',                	
																   
										
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
					$action = $this->Html->link('Edit ', array('controller' =>$this->request->params['controller'], 'action' => 'edit', $value[$model]['id']),array('class'=>'fa fa-pencil-square-o'));					
					$action .= ' '.$this->Html->link('View', array('controller' =>$this->request->params['controller'], 'action' => 'view', $value[$model]['id']),array('class'=>'fa fa-pencil-square-o'));
					$name = $this->Html->link($value[$model]['name'], array('controller' =>$this->request->params['controller'], 'action' => 'edit', $value[$model]['id']));	
					$rows[] = array(
						$name,						
						$value[$model]['description'],
						$value['User']['name'],
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
          </div>
      </div>
	</section>
    <!-- /.content -->
  </div>

  
