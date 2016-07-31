<section class="content-header" style="background-color: #f9f9f9;">
      <h1>
        &nbsp;
      </h1>
      <ol class="breadcrumb">
      	<?php if(!$this->Session->read('Auth.User.id')){  ?>
        <li><?php echo $this->Html->link(__("Sign In"), array('plugin' => 0, 'controller' => 'Users', 'action' => 'login')); ?></li>
        <li><?php echo $this->Html->link(__("Registration"), array('plugin' => 0, 'controller' => 'Students', 'action' => 'registration')); ?></li>
    	<?php } else { ?>
			<li><?php echo $this->Html->link(__("Sign Out"), array('plugin' => 0, 'controller' => 'Users', 'action' => 'logout')); ?></li>
    	<?php } ?>
      </ol>
    </section>