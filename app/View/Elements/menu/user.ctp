<?php
$users = $this->Session->read('Auth.User');
$cakeDescription = 'Amader Daktar';
?>
<div id="header_top">
	<div id="menu">
	<div class="logo">
		
              <a href="index.html"><?php echo $this->Html->image('logo.png'); ?></a>
        </div>
	<div class="heder_right">
		<div id="login"> 
			<h1>
			<?php		
			if($this->Session->read('Auth.User.id')){
				echo sprintf(__("You are logged in as: %s"), $this->Session->read('Auth.User.name'));
				echo '<span> |</span>';
			}
				
			if($this->Session->read('Auth.User.id')){			
				echo $this->Html->link(__("Log out"), array('plugin' => 0, 'controller' => 'users', 'action' => 'logout'),array('class'=>'bt'));
			}else{
				echo $this->Html->link(__("Login"), array('plugin' => 0, 'controller' => 'users', 'action' => 'login'));
			}
				 
			?>
			</h1>
		</div>
		
		<div class="menu_item">
			<ul class="tabs">
				<?php
				if($this->Session->read('Auth.User.role_id') == 4){ ?>
				
				<?php }
				else if($this->Session->read('Auth.User.role_id') == 1){ ?>
					
					<li><h4><?php echo $this->Html->link('User List', array('controller' => 'Users', 'action' => 'userlists')); ?></h4></li>
					<li><h4><?php echo $this->Html->link('Appointment', array('controller' => 'Appointments', 'action' => 'index')); ?></h4></li>
					<!--<li><h4><?php echo $this->Html->link('System', array('controller' => 'Systems', 'action' => 'index')); ?></h4></li>
					<li><h4><?php echo $this->Html->link('Disease', array('controller' => 'Diseases', 'action' => 'index')); ?></h4></li> -->
					<li><h4><?php echo $this->Html->link('Prescription', array('controller' => 'Prescriptions', 'action' => 'index')); ?></h4></li>
					<li><h4><?php echo $this->Html->link('Unit Cost', array('controller' => 'UnitCosts', 'action' => 'index')); ?></h4></li>
					<li><h4><?php echo $this->Html->link('Credit Limits', array('controller' => 'CreditLimits', 'action' => 'index')); ?></h4></li>
					<li><h4><?php echo $this->Html->link('Accounts', array('controller' => 'Accounts', 'action' => 'index')); ?></h4></li>
					<li><h4><?php echo $this->Html->link('Transactions', array('controller' => 'Transactions', 'action' => 'index')); ?></h4></li>
				<?php }
				else if($this->Session->read('Auth.User.role_id') == 2){ ?>
					
					<li><h4><?php echo $this->Html->link('Home', array('controller' => 'Users', 'action' => 'index'),array('class'=>'bt')); ?></h4></li>
					
					<li><h4><?php echo $this->Html->link('Prescription', array('controller' => 'Prescriptions', 'action' => 'index'),array('class'=>'bt')); ?></h4></li>
				<?php }
				
				?>
			</ul>
		</div>


		
	</div>
		
	</div>

</div>

