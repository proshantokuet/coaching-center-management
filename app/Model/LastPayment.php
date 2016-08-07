<?php
App::uses('Model', 'Model');
App::uses('AuthComponent', 'Controller/Component');

class LastPayment extends AppModel 
{
	public $name = 'LastPayment';
	public $helpers = array('Html', 'Form');
	
	public $belongsTo = array('Student','User','Course');

}