
<span class="titleLeft"><?php echo $title_for_layout ;?></span> 
<div class="clear"></div>
<div class="gap"></div>
<?php echo $this->Form->create('User', array('type'=>'file'));?>
<fieldset>
	<div class="tabs">
	
	<div id="user-main">
		<?php //pr($this->request->data);			
			echo $this->Form->input('id');
			echo $this->Form->input('password', array('value' => '', 'label' => 'Type New Password'));
			echo $this->Form->input('verify_password', array('type' => 'password', 'value' => ''));	
			
		?>
	</div>
		
	</div>
</fieldset>
			<?php
				echo $this->Form->submit('Save', array('div'=> false));
				echo $this->Html->link(__('Cancel'), array(
					'action' => 'index'
				), array(
					'class' => 'cancel',
				));
				
				echo $this->Form->end();
			?>
	