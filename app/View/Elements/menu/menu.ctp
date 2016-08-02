<style>
#menu ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

#menu li {
    float: left;
}

#menu li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

#menu li a:hover {
    background-color: #111;
}
</style>

  <div id="menu">
    <ul>
     <li><?php echo $this->Html->link(__('Home'), array('plugin' => 0, 'controller' => 'Pages', 'action' => 'index')); ?></li>
     <li><?php echo $this->Html->link(__('Notice'), array('plugin' => 0, 'controller' => 'Notices', 'action' => 'all')); ?></li>
      <li><a href="#contact">Contact</a></li>
      <li><a href="#about">About</a></li>
      <?php if(!$this->Session->read('Auth.User.id')){  ?>
        <li><?php echo $this->Html->link(__("Sign In"), array('plugin' => 0, 'controller' => 'Users', 'action' => 'login')); ?></li>
        <li><?php echo $this->Html->link(__("Registration"), array('plugin' => 0, 'controller' => 'Students', 'action' => 'registration')); ?></li>
      <?php } else { ?>
      <li><?php echo $this->Html->link(__("Sign Out"), array('plugin' => 0, 'controller' => 'Users', 'action' => 'logout')); ?></li>
      <?php } ?>
    </ul>
  </div>