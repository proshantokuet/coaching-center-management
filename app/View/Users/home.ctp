      <div class="hero-unit">
		<h2><?php echo $title_for_layout ;?></h2>
		<?php  $model =  Inflector::singularize($this->request->params['controller']);
		  if(!empty($values)){ 
		  
		  $v = 'Booking';			
		  $c = $this->request->params['controller'];
		  
		  ?>
			
				<table cellpadding="0" cellspacing="0" class="table" >
				<?php  
					$tableHeaders =  $this->Html->tableHeaders(array(                   
						$this->Paginator->sort('flightCode','Flight Code'),                  	
						$this->Paginator->sort('treatment_id'),                  	
						$this->Paginator->sort('price'), 
						$this->Paginator->sort('reservationCode','Booking Code'),
						$this->Paginator->sort('hospitalCode','Air Port Code'),
						$this->Paginator->sort('paymentStatus'),                  	
												   
						__('Actions', true),
					));
					echo $tableHeaders;
					$rows = array();
					foreach ($values AS $value) {
						
						
						$status = $value[$v]['paymentStatus'];
						if($status == 1){
							$active = $this->Html->image('tick.png');
							$actions = 'Paid';
						}else{
							$active = $this->Html->image('cross.png');
							$actions  = $this->Html->link(__('Confirm', true), array('controller' => $this->request->params['controller'], 'action' => 'nowconfirm', $value[$v]['id']));
					  	
						}
						$status1 = $this->Form->postLink(__($active, true), array(
							'controller' => 'users',
							'action' => 'status',
							$value[$v]['id'],
						),array('escape' => false), null, __('Are you sure?', true));
						
						
						$name = $value[$v]['flightCode'];
						
						$rows[] = array(
							$name,
							$value['Treatment']['name'],
							$value[$v]['flighPrice'],
							$value[$v]['bookingCode'],
							$value[$v]['hospitalCode'],
							$active,
							$actions,
						);
					}
					echo $this->Html->tableCells($rows);
					//echo $tableHeaders;
					
					
				
				
				?>	
			</table>
		   	
				
			<?php if ($pagingBlock = $this->fetch('paging')): ?>
				<?php echo $pagingBlock; ?>
			<?php else: ?>
				<?php if (isset($this->Paginator) && isset($this->request['paging'])): ?>
					<div class="paging">
						<?php echo $this->Paginator->first('< ' . __('first')); ?>
						<?php echo $this->Paginator->prev('< ' . __('prev')); ?>
						<?php echo $this->Paginator->numbers(); ?>
						<?php echo $this->Paginator->next(__('next') . ' >'); ?>
						<?php echo $this->Paginator->last(__('last') . ' >'); ?>
					</div>
					<div class="counter"><?php //echo $this->Paginator->counter(array('format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%'))); ?></div>
				<?php endif; ?>
			<?php endif; 
		   
		   }
		   
		   ?>
		  


      </div>