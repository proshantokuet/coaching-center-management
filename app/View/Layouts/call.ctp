<?php 
	$cakeDescription = __d('cake_dev', 'Amader Daktar');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
	<script src="https://static.vline.com/vline.js" type="text/javascript"></script>
	<?php
		echo $this->Html->css(array('jquery-ui','fancydropdown','font-awesome'));
		//echo $this->Html->meta('icon');
		echo $this->Html->script(array(				
			'jquery-1.9.1',			
			'jquery-ui',
			'ui',
			'adapter',
			
			
		));
		

		//echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<?php $userID = $this->Session->read('Auth.User.id');
	$uid = '';
	if($this->Session->read('Auth.User.role_id') == 2){		
			$uid = 'Doctor000'.$userID;
		}else if($this->Session->read('Auth.User.role_id') == 4){			
			$uid =  'RMP000'.$userID;
		}else{
			$uid = $userID;
		}
	?>
	<script type="text/javascript">
		var siteurl = "<?php echo $this->request->webroot;?>"
		var userId = "<?php echo $uid; ?>" 
		
	</script>
	

</head>
<body >
	<?php 
		
		//echo $this->element('menu/call');
		
	?>
	<div id="container">
	
		<div id="content">
			
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<h1> Powered by Amader Daktar</h1>
		</div>
	</div>
	
	
</body>
</html>
