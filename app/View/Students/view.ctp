<?php
	$model =  Inflector::singularize($this->request->params['controller']);		  
	$model = ucfirst($model);
?>

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        View of batch <?php echo $this->request->data['Batch']['name']?>
      </h1>
      <ol class="breadcrumb">
        <li><?php echo $this->Html->link(' Home', array('controller' => 'Users', 'action' => 'userlists')); ?>
        </li>
        <li><?php echo $this->Html->link($model, array('controller' => $this->request->params['controller'], 'action' => 'index')); ?>
         </li>         
        <li class="active"><?php echo $this->request->data['Batch']['name']?></li>
      </ol>
    </section>
	<?php  if($this->request->data['Batch']['status'] == 1){
			$icon= '<span class="label label-success">Approved</span>';
		}else{	
			$icon = '<span class="label label-warning">Pending</span>';
		}
	?>
    <!-- Main content -->
    <section class="content">
    	<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <div class="box-body no-padding">
              	<table class="table table-condensed">
	                <tbody>
	                	<tr> <th >Name</th><td><?php echo $this->request->data['Batch']['name']?></td></tr>
			            <tr><th>Description</th><td><?php echo $this->request->data['Batch']['description']?></td></tr>		            
			            <tr> <th>User</th><td><?php echo $this->request->data['User']['name']?></td></tr>
			            <tr><th >Status</th><td><?php echo $icon?></td></tr>
	              	</tbody>
          		</table>
            </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
				<?php 
				if(!empty($this->request->data)){  ?>
				<table cellpadding="0" cellspacing="0" class="table table-hover" >
					<th>Start Time </th>
					<th>End Time</th>
					<th>Date</th>
					<th>Course Name</th>
					<th></th>
				<?php 
				$rows = array();
				foreach ($this->request->data['BatchTime'] AS $value) {
					$courseName  = $this->requestAction('courses/name/'.$value['course_id']) ;
					$rows[] = array(
						$value['start_time'],						
						$value['end_time'],
						$value['day'],
						$courseName,
							
						);
					}
						echo $this->Html->tableCells($rows);

					echo '</table>';
				}
					?>
					

				 </div>
            <!-- /.box-body -->
          </div>
      </div>
	</section>
    <!-- /.content -->
  </div>

  