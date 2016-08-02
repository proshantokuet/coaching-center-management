<?php

	Router::connect('/login', array('controller' => 'Users', 'action' => 'login'));
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	Router::connect('/', array('controller' => 'pages', 'action' => 'index'));
	Router::connect('/registration', array('controller' => 'Students', 'action' => 'registration'));
	Router::connect('/profile', array('controller' => 'Students', 'action' => 'profile'));

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
