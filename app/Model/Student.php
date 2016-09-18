<?php
App::uses('Model', 'Model');
App::uses('AuthComponent', 'Controller/Component');

class Student extends AppModel 
{
	public $name = 'Student';
	public $helpers = array('Html', 'Form');
	public $validate = array(
		'id_number' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'This field cannot be left blank.',
				'last' => true,
			),
			 'isUnique' => array(
				'rule' => 'isUnique',
				'message' => 'The roll has already been taken.',
				'last' => true,
			),
			 'between' => array(
                'rule' => array('between', 6, 6),
                'message' => 'must be 6 characters'
            )
		),
		'password' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'This field cannot be left blank.',
				'last' => true,
			),			
			
		),
		'username' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'This field cannot be left blank.',
				'last' => true,
			),
			//'rule' => array('minLength', 6),
			'isUnique' => array(
				'rule' => 'isUnique',
				'message' => 'The username has already been taken.',
				'last' => true,
			),
		),
		'question' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'This field cannot be left blank.',
				'last' => true,
			),
			 'isUnique' => array(
				'rule' => 'isUnique',
				'message' => 'The Anwser has already been taken.',
				'last' => true,
			),
		),
		'name' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'This field cannot be left blank.',
				'last' => true,
			),			
			
		),
		'father_name' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'This field cannot be left blank.',
				'last' => true,
			),			
			
		),
		'batch_id' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'This field cannot be left blank.',
				'last' => true,
			),			
			
		),
		
		
		
	);
	public $belongsTo = array('User','Institution','Batch');
	public $hasMany = array('StudentCourse','Payment');
}