<div class="users form">
	<h2><?php echo __('Login'); ?></h2>
	<?php echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'login')));?>
		<fieldset>
		<?php
			echo $this->Form->input('username');
			echo $this->Form->input('password');
			echo $this->Form->input('rememberMe', array('type' => 'checkbox', 'label' => 'Remember me'));
		?>
		</fieldset>
	<?php echo $this->Form->end('Submit');?>
</div>