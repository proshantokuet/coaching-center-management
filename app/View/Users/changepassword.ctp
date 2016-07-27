
<div class="hero-unit">
<?php 
$model =  Inflector::singularize($this->request->params['controller']);
$v = ucfirst($model);
?>
<span class="titleLeft"><?php echo $title_for_layout ;?></span> 
<div class="gap"></div>
<?php echo $this->Form->create($v, array('type'=>'file'));?>
<?php
	echo $this->Form->input('id');	
	echo $this->Form->input('password',array('value'=>''));			
	echo $this->Form->input('verify_password', array('type' => 'password'));
	echo '<br />';
	echo $this->Form->submit('Save', array('div'=> false,'class'=>'btn'));
	echo '&nbsp;'. $this->Html->link(__('Cancel'), array(
		'action' => 'userlists'
	), array( 'class' => 'btn pure-button pure-button-success',
	));
	echo $this->Form->end();
	?>
	

</div>



