<?php
App::uses('Model', 'Model');
App::uses('AuthComponent', 'Controller/Component');

class AcademicResult extends AppModel 
{
	public $name = 'AcademicResult';
	public $helpers = array('Html', 'Form');
	
	public $belongsTo = array('Student');
}
