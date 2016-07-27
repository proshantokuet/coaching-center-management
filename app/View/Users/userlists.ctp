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
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>        
        <li class="active">All users</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
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
					$this->Paginator->sort('name'),
					$this->Paginator->sort('email'),
					$this->Paginator->sort('phone'),
					$this->Paginator->sort('role_id'),
					
					'Actions',                	
																   
										
				));
				echo $tableHeaders;
				$rows = array();
				foreach ($values AS $value) {			
					
					
					$action = $this->Html->link(' ', array('controller' =>$this->request->params['controller'], 'action' => 'edit', $value[$v]['id']),array('class'=>'fa fa-pencil-square-o'));					
					$action .= ' '.$this->Form->postLink(__('', true), array(		
						'controller' => $this->request->params['controller'],
						'action' => 'delete',
						$value[$v]['id'],
						),array('class'=>'fa fa-times','escape' => false, 'confirm' => __('Want to delete?'))
					);
					$action .= ' '.$this->Html->link(' Change Password', array('controller' =>$this->request->params['controller'], 'action' => 'changepassword', $value[$v]['id']));	
					
					$rows[] = array(
						$value[$v]['name'],
						$value[$v]['email'],
						$value[$v]['mobile'],		
						$value[$v]['role'],
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

  