<?php
App::uses('Model', 'Model');
App::uses('AuthComponent', 'Controller/Component');

class Batch extends AppModel 
{
	public $name = 'Batch';
	public $helpers = array('Html', 'Form');
	public $validate = array(
		'name' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'This field cannot be left blank.',
				'last' => true,
			),
			 'isUnique' => array(
				'rule' => 'isUnique',
				'message' => 'The course name has already been taken.',
				'last' => true,
			),
		),
		
	);
	public $belongsTo = array('User');
	public $hasMany = array('BatchTime');
	
}