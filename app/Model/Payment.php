<?php
App::uses('Model', 'Model');
App::uses('AuthComponent', 'Controller/Component');

class Payment extends AppModel 
{
	public $name = 'Payment';
	public $helpers = array('Html', 'Form');
	
	public $belongsTo = array('Student','Course');	
	
	
}