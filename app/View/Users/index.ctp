
<?php
	$model =  Inflector::singularize($this->request->params['controller']);		  
	$v = 'Appointment';
	$count = count($values);
?>


<input type="hidden" id="count"> 
<script type="text/javascript">
	setInterval(function(){
		$(document).ready(function () {								
			$.ajax({
				async:true,					
				dataType: "html",
				url:siteurl+"Users/appointmentlist/",
				success:function (data) {						
					$("#appointmentList").html(data);
				},
				type:"post"				
			});				
			return false;			
		});
	},1000);
	
	$(function() {
		
		$("#count").val(<?php echo $count ?>)
		
	});
</script>

<span class="titleLeft"><?php echo $title_for_layout ;?></span> 
<div class="clear"></div>
<div class="gap"></div>
<div id="appointmentList">
	<?php //pr($values);
	if(!empty($values)){  ?>
	<table cellpadding="0" cellspacing="0" class="table" >
		<?php  
		$tableHeaders =  $this->Html->tableHeaders(array(                   
			$this->Paginator->sort('name'),
			$this->Paginator->sort('temperature'),
			$this->Paginator->sort('color'),
			$this->Paginator->sort('respiration'),
			$this->Paginator->sort('dehydration'),
			'Actions',              	
														   
								
		));
		echo $tableHeaders;
		$rows = array();
		foreach ($values AS $value) {
			
			$action = $this->Form->postLink(__('Delete', true), array(		
				'controller' => $this->request->params['controller'],
				'action' => 'delete',
				$value[$v]['id'],
			),array('escape' => false), null, __('Are you sure?', true));
								
			$today = new DateTime();
			$created = new DateTime($value[$v]['created']);
			$interval = $today->diff($created);
			
			$diffTime = json_decode(json_encode($interval), true);
			//pr($diffTime);
			//   && $diffTime['i'] <= 58
			// Appointment status check
			$class = '';
			//echo $diffTime['y'];
			if($diffTime['y'] <= 0  && $diffTime['m'] <= 0 && $diffTime['d'] <= 0  && $diffTime['h'] == 0 && $diffTime['i'] <= 59){
				$class = 'green';
			}else if($diffTime['y'] <= 0  && $diffTime['m'] <= 0 && $diffTime['d'] <= 0  && $diffTime['h'] == 1 && $diffTime['i'] <= 59){
				$class = 'yellow';
			}else if($diffTime['y'] <= 0  && $diffTime['m'] <= 0 && $diffTime['d'] <= 0  && $diffTime['h'] == 2 && $diffTime['i'] <= 59){
				$class = 'red';
			}else{
				$class = 'red';
			}

			$action = ' '.$this->Html->link('Create Prescription', array('controller' => 'Prescriptions', 'action' => 'add', $value[$v]['patient_id'],$value[$v]['id'],$value[$v]['rmp_id']),array('class'=>'fa fa-plus-square','escape' => false));					
			
			echo '<tr class = '.$class.'> <td>'. $value['Patient']['name'].'</td>
			
			<td>'. $value[$v]['temperature'].'</td>
			<td>'. $color[$value[$v]['color']].'</td>
			<td>'. $respiration[$value[$v]['respiration']].'</td>
			<td>'. $dehydration[$value[$v]['dehydration']].'</td>
			<td>'. $action.'</td>
			
			';
			
			echo '</tr>';
			
		}
		echo '</table>'; 
		//echo $this->Html->tableCells($rows);
		
		if ($pagingBlock = $this->fetch('paging')): ?>
		<?php echo $pagingBlock; ?>
		<?php else: ?>
		<?php if (isset($this->Paginator) && isset($this->request['paging'])): ?>
			<div class="paging">
			<?php echo $this->Paginator->first('< ' . __('First')); ?>						
			<?php echo $this->Paginator->numbers(array('separator'=>' ')); ?>						
			<?php echo $this->Paginator->last(__('Last') . ' >'); ?>
			</div>
			
			<?php endif; ?>
		<?php endif; 
	}				
		?>	
	
</div>
<div  id="sound">
</div>