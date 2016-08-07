<?php
App::uses('Model', 'Model');
App::uses('AuthComponent', 'Controller/Component');

class Course extends AppModel 
{
	public $name = 'Course';
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
		'fees' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'This field cannot be left blank.',
				'last' => true,
			)
		),
		
		'code' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'This field cannot be left blank.',
				'last' => true,
			)
		),
		
	);
	
	public $belongsTo = array('User');
	public $hasMany = array('CourseBatch');
	
}