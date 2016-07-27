<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <?php echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'login')));?>
      <div class="form-group has-feedback">        
        <?php echo $this->Form->input('username',array('div'=>false ,'class'=>'form-control','placeholder'=>'User Name')); 
        ?>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">        
        <?php echo $this->Form->input('password',array('div'=>false ,'class'=>'form-control','placeholder'=>'Password')); 
        ?>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>              
              <?php echo $this->Form->input('rememberMe', array('type' => 'checkbox', 'label' => 'Remember me')); ?>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

   
    <!-- /.social-auth-links -->

    <a href="#">I forgot my password</a><br>
    <a href="register.html" class="text-center">Register a new membership</a>

  </div>
  <!-- /.login-box-body -->
</div>