
<div class="hero-unit">
<?php 
$model =  Inflector::singularize($this->request->params['controller']);
$v = ucfirst($model);
?>
<h2><?php echo $title_for_layout ;?></h2>
<?php echo $this->Form->create($v);?>
<?php
	echo $this->Form->input('id');			
	echo $this->Form->input('name');				
	echo $this->Form->input('email');
	echo $this->Form->input('phone');
	echo $this->Form->input('gender',array('options'=> array('Male'=>'Male','Female'=> 'Female'),'empty'=>'Please Select Gender'));
	echo $this->Form->hidden('status', array('value'=> 1));
	echo $this->Form->hidden('role_id', array('value'=> 3));
	echo $this->Form->input('password');			
	echo $this->Form->input('verify_password', array('type' => 'password'));	
	
	echo $this->Form->submit('Save', array('div'=> false));
	echo $this->Html->link(__('Cancel'), array(
		'action' => 'index'
	), array( 'class' => 'cancel',
	));
	echo $this->Form->end();
	?>
	

</div>



