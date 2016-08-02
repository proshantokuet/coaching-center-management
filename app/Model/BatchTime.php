<?php
App::uses('Model', 'Model');
App::uses('AuthComponent', 'Controller/Component');

class BatchTime extends AppModel 
{
	public $name = 'BatchTime';
	public $helpers = array('Html', 'Form');
	
	public $belongsTo = array('Batch','Course');

}