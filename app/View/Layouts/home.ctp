<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout ?>:
		
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
	
	<?php
		echo $this->Html->css(array('bootstrap.min',
			'ionicons.min',
			'datepicker3',
			'all',
			'style',
			'bootstrap-timepicker.min',
			'select2.min',
			'AdminLTE.min',
			'_all-skins.min'));		
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	  <!-- Ionicons -->
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	
	

</head>
<body class="hold-transition">
<div class="wrapper row-offcanvas-left">

	<?php 	
	
	echo $this->fetch('content'); 
	 ?>
	<footer class="main-footer">
	    <div class="pull-right hidden-xs">
	      
	    </div>
	    <strong>Copyright &copy; 2014-2016 AID ACADEMY.</strong> All rights
	    reserved.
  </footer>
<?php 
	echo $this->Html->script(array(				
			'jquery-2.2.3.min',			
			'bootstrap.min',			
			'app.min',
			'demo',
			
			
		));
?>
</div>
</body>
</html>
