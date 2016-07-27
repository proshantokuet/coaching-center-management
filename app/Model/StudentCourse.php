<?php
App::uses('Model', 'Model');
App::uses('AuthComponent', 'Controller/Component');

class StudentCourse extends AppModel 
{
	public $name = 'StudentCourse';
	public $helpers = array('Html', 'Form');
	
	public $belongsTo = array('Student');

}