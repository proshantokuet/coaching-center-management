 <header class="main-header">
    <!-- Logo -->
    <a href="/test" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>A</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>AID ACADEMY </b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success"><?php echo $new_students_count ?> </span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have <?php echo $new_students_count ?> Students</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">                  
                    <?php if(!empty($new_students)){
                    foreach ($new_students as $key => $value) {?>                    
                    <li><!-- start message -->
                      <?php echo $this->Html->link(__($value['Student']['name'].'('.$value['Student']['created'].')'), array('plugin' => 0, 'controller' => 'Students', 'action' => 'edit',$value['Student']['id']),array('class'=>'')); ?>
                    </li>
                    <?php } } ?>
                 
                  
                </ul>
              </li>
              
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          
          <!-- Tasks: style can be found in dropdown.less -->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?php echo $thumbnail= $this->Html->image('user/thumbnail/'.$this->Session->read('Auth.User')['thumbnail'],array('class'=>'user-image')); ?>              
              <span class="hidden-xs"><?php echo $this->Session->read('Auth.User')['name']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <?php echo $thumbnail= $this->Html->image('user/thumbnail/'.$this->Session->read('Auth.User')['thumbnail'],array('class'=>'img-circle')); ?>
               
                <?php //pr($this->Session->read('Auth.User'))?>
                <p>
                  <?php echo $this->Session->read('Auth.User')['name']; ?>
                  <small>Member since <?php echo $this->Session->read('Auth.User')['created']; ?></small>
                </p>
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <?php echo $this->Html->link(__("Sign out"), array('plugin' => 0, 'controller' => 'users', 'action' => 'logout'),array('class'=>'btn btn-default btn-flat')); ?>
                  
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
