<?php 
	$cakeDescription = __d('cake_dev', 'AID ACDEMIA');
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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	  <!-- Ionicons -->
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	
	

</head>
<body class="hold-transition login-page">
	<?php
	echo $this->fetch('content'); 
	echo $this->Session->flash(); ?>
	
<?php 
	echo $this->Html->script(array(				
			'jquery-2.2.3.min',			
			'bootstrap.min',			
			'app.min',
			'icheck.min',
			
		));
?>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>

</body>
</html>
