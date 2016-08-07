<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left ">          
          <?php //echo $thumbnail= $this->Html->image('../images/school_logo_4.jpg',array('width'=>'100%')); ?>
        </div>
        
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
            <li><?php echo $this->Html->link(__("Users"), array('plugin' => 0, 'controller' => 'Users', 'action' => $home_page)); ?>
        </li>
         <li class="treeview">
            <li><?php echo $this->Html->link(__("Institute"), array('plugin' => 0, 'controller' => 'Institutions', 'action' => 'index')); ?>
        </li>
        <li class="treeview">
            <li><?php echo $this->Html->link(__("Course"), array('plugin' => 0, 'controller' => 'Courses', 'action' => 'index')); ?>
        </li>
        <li class="treeview">
          <li><?php echo $this->Html->link(__("Batch"), array('plugin' => 0, 'controller' => 'Batches', 'action' => 'index')); ?>
        </li>
        <li class="treeview">
          <?php echo $this->Html->link(__("Student"), array('plugin' => 0, 'controller' => 'Students', 'action' => 'index')); ?>
        </li>        
        <li class="treeview">
          <?php echo $this->Html->link(__("Notice"), array('plugin' => 0, 'controller' => 'Notices', 'action' => 'index')); ?>
        </li>
        <li class="treeview">
          <?php echo $this->Html->link(__("Statement"), array('plugin' => 0, 'controller' => 'Students', 'action' => 'statement')); ?>
        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>