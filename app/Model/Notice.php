<?php
App::uses('Model', 'Model');
App::uses('AuthComponent', 'Controller/Component');

class Notice extends AppModel 
{
	public $name = 'Notice';
	public $helpers = array('Html', 'Form');
	public $validate = array(
		'name' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'This field cannot be left blank.',
				'last' => true,
			),
			 
		),
		
	);
	
}