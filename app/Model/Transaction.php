<?php
App::uses('Model', 'Model');
App::uses('AuthComponent', 'Controller/Component');

class Transaction extends AppModel 
{
	public $name = 'Transaction';
	public $helpers = array('Html', 'Form');
	
	
	public $belongsTo = array('Student','Course','User');
	
	
}