<?php


App::uses('AppController', 'Controller');
class PagesController extends AppController {
	public $uses = array('Course','Notice');
	public function index() {
		$this->set('title_for_layout', __('AID ACADEMY'));
		$this->layout = 'home';
		$values = $this->Course->find('all',array('conditions'=>array('Course.status'=>1)));		
		$this->set(compact('values'));
		$notices = $this->Notice->find('all',array('limit'=>10,'conditions'=>array('Notice.status'=>1)));
		$this->set(compact('notices'));

	}
}
