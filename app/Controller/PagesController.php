<?php


App::uses('AppController', 'Controller');


class PagesController extends AppController {

	public $uses = array();


	public function index() {
		
		$this->layout = 'home';
	}
}
