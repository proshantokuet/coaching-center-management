<?php


App::uses('AppController', 'Controller');
class PagesController extends AppController {
	public $uses = array('Course','Notice');
	public function index() {
		$this->set('title_for_layout', __('AID ACADEMIA'));
		$this->layout = 'home';
		$values = $this->Course->find('all');
		$notices = $this->Notice->find('all',array('limit'=>10));
		$this->set(compact('values','notices'));

	}
}
