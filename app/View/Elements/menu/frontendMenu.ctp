<?php
$users = $this->Session->read('Auth.User');
$cakeDescription = 'Chikitsha e-Prescription';
?>
<div id="header_top">

<div id="menu">
<ul class="tabs">
	
	<li><h4><?php echo $this->Html->link('Home', array('controller' => 'Homes', 'action' => 'index')); ?></h4></li>		
	<li><h4><?php echo $this->Html->link('Login', array('controller' => 'Users', 'action' => 'login')); ?></h4></li>
	
	
</ul>
</div>
</div>
<br />
<div class="gap"></div>
