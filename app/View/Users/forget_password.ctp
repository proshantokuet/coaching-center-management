<div class="login-box">
  <div class="login-logo">
    <b>AID ACADEMIA </b>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <h3> <?php echo $this->Session->flash(); ?></h3>    

    <?php echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'forget_password')));?>
      <div class="form-group has-feedback">        
        <?php echo $this->Form->input('username',array('div'=>false ,'class'=>'form-control','placeholder'=>'User Name')); 
        ?>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">  
      <label>Secret Answer</label>      
        <?php echo $this->Form->input('question',array('div'=>false ,'class'=>'form-control','placeholder'=>'Secrect Answer','label'=>false)); 
        ?>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

   
    <!-- /.social-auth-links -->

    
    

  </div>
  <!-- /.login-box-body -->
</div>