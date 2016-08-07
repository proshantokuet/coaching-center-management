<?php
App::uses('Model', 'Model');
App::uses('AuthComponent', 'Controller/Component');

class CourseBatch extends AppModel 
{
	public $name = 'CourseBatch';
	public $helpers = array('Html', 'Form');
	
	public $belongsTo = array('Batch','Course','User');

}