<?php 
	$cakeDescription = __d('cake_dev', 'AID ACADEMY');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
	
	<?php
		echo $this->Html->css(array('bootstrap.min',
			'ionicons.min',			
			'AdminLTE.min',
			'square/blue'));		
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	

</head>
<style>
@media print {
    .vendorListHeading th {
    color: white !important;
}}
</style>
<body onload="window.print();">
	<?php
	echo $this->fetch('content'); 
	echo $this->Session->flash(); ?>
	


</body>
</html>
