<?php
App::uses('Model', 'Model');
App::uses('AuthComponent', 'Controller/Component');

class User extends AppModel 
{
	public $name = 'User';
	public $helpers = array('Html', 'Form');
	
	function checkemail($data, $fields) { 
		if (!is_array($fields)) { 
		    $fields = array($fields); 
		} 
		foreach($fields as $key) { 
		    $tmp[$key] = $this->data[$this->name][$key];
		    
		    
		} 
		if(!filter_var($tmp[$key], FILTER_VALIDATE_EMAIL)){
			return false;
		}else{
			return true;
		}
		
	}
	
	public $validate = array(	
		 'name' => array(		
            
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
			 'isUnique' => array(
				'rule' => 'isUnique',
				'message' => 'The username has already been taken.',
				'last' => true,
			),
		),
		'email' => array(
			'email' => array(
				"rule"=>array("checkemail", array("email")),
				'message' => 'Please provide a valid email address.',
				'last' => true,
			),
			'isUnique' => array(
				'rule' => 'isUnique',
				'message' => 'The Email has already been taken.',
				'last' => true,
			),
		),
		'password' => array(
			'alphaNumeric' => array(
			'rule'     => 'alphaNumeric',
			'required' => true,
			'message'  => 'Alphabets and numbers only'
			),
			'rule' => array('minLength', 5),
			'message' => 'Passwords must be at least 6 characters long.',
		),
		'verify_password' => array(
			'rule' => 'validIdentical',
		),
	);	
	
	
		
	public function beforeSave($options = array()) 
	{
		if (isset($this->data[$this->alias]['password'])) {$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);}
		return true;
	}

	protected function _identical($check) {
		return $this->validIdentical($check);
	}
	
	public function validIdentical($check) {
		if (isset($this->data['User']['password'])) {
			if ($this->data['User']['password'] != $check['verify_password']) {
				return __('Passwords do not match. Please, try again.');
			}
		}
		return true;
	}
	
	
	
}