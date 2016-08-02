<?php


App::uses('AppController', 'Controller');


class HomesController extends AppController {

	public $uses = array();


	public function index() {
		
		if($this->Session->read('Auth.User.id')){
			$this->redirect(array('controller'=>'Users','action' => 'appointment'));
		}
		
	}
}
