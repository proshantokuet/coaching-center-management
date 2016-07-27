<span class="titleLeft"><?php echo $title_for_layout ;?></span> 
<div class="clear"></div>
<div class="gap"></div>
<?php echo $this->Form->create('User', array('type'=>'file'));
	echo $this->Form->input('email');
?>
<?php
	echo $this->Form->submit('Save', array('div'=> false));
	echo $this->Html->link(__('Cancel'), array(
		'action' => 'index'
	), array(
	'class' => 'cancel',
	));
				
	echo $this->Form->end();
?>
	