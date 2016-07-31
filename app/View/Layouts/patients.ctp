<?php 
	$cakeDescription = __d('cake_dev', 'Chikitsha e-Prescription');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->css(array('cake.generic','jquery-ui','fancydropdown'));
		//echo $this->Html->meta('icon');
		echo $this->Html->script(array(				
			'jquery-1.9.1',
			'jquery-ui',
			
			
		));
		

		//echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	
	<script type="text/javascript">var siteurl = "<?php echo $this->request->webroot;?>"</script>
	

</head>
<body>
	<div id="container">
	<?php 
		if($this->Session->read('Auth.User')){
			echo $this->element('menu/user');
		}
	?>
		<div id="content">

			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
		</div>
	</div>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
