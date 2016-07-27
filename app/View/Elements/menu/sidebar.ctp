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
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Institue</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><?php echo $this->Html->link(__("List"), array('plugin' => 0, 'controller' => 'Institutions', 'action' => 'index')); ?></li>
            <li><?php echo $this->Html->link(__("Add"), array('plugin' => 0, 'controller' => 'Institutions', 'action' => 'add')); ?></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Course</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><?php echo $this->Html->link(__("List"), array('plugin' => 0, 'controller' => 'Courses', 'action' => 'index')); ?></li>
            <li><?php echo $this->Html->link(__("Add"), array('plugin' => 0, 'controller' => 'Courses', 'action' => 'add')); ?></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Batch</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><?php echo $this->Html->link(__("List"), array('plugin' => 0, 'controller' => 'Batches', 'action' => 'index')); ?></li>
            <li><?php echo $this->Html->link(__("Add"), array('plugin' => 0, 'controller' => 'Batches', 'action' => 'add')); ?></li>
          </ul>
        </li>
        <li class="treeview">
          <?php echo $this->Html->link(__("Student"), array('plugin' => 0, 'controller' => 'Students', 'action' => 'index')); ?>
        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>