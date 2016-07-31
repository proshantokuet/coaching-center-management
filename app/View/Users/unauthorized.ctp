<div class="login-box">
  <div class="login-logo">
    <b>AID ACADEMIA </b>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">    
    <h3 class="login-box-msg"><b>Unauthorized Access</b></h3>
    <?php echo $this->Html->link(__("Sign In"), array('plugin' => 0, 'controller' => 'Users', 'action' => 'login')); ?>
  </div>
  <!-- /.login-box-body -->
</div>