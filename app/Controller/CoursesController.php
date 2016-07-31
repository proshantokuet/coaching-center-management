<?php
App::uses('AppController', 'Controller');

class CoursesController extends AppController {

	public $name = 'Courses';
	public $components = array('RequestHandler');
	public $uses = array('Course');	
	// Patient registration form
	
	public function add(){
		$this->checkPermission();
		$this->set('title_for_layout', __('Course Add Page'));		
		$model = $this->_model();
		if (!empty($this->request->data)) {			
			$this->$model->create();			
			$this->request->data[$model]['status'] = 1;
			$this->request->data[$model]['user_id']= $this->Session->read('Auth.User.id');
			if ($this->$model->save($this->request->data)) {				
				$this->Session->setFlash(__('Success'), 'default', array('class' => 'success'));				
				$this->redirect(array('action' => 'index'));
			} 
			else {
				$this->Session->setFlash(__($this->save_msg_error), 'default', array('class' => 'error'));
			}
		}
		$days = array('Satarday'=>'Satarday','Sunday'=>'Sunday','Monday'=>'Monday','Tuesday'=>'Tuesday','Wednesday'=>'Wednesday','Thusday'=>'Thusday','Friday'=>'Friday');
		$this->set(compact('days'));
		
	}
	public function edit($id){
		$this->checkPermission();
		$model = $this->_model();
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid ' .$v), 'default', array('class' => 'error'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->request->data)) {
			$this->request->data[$model]['updated_by']= $this->Session->read('Auth.User')['username'];
			if ($this->$model->save($this->request->data)) {				
				$this->Session->setFlash(__('Success'), 'default', array('class' => 'success'));				
				$this->redirect(array('action' => 'index'));
			} 
			else {
				$this->Session->setFlash(__($this->save_msg_error), 'default', array('class' => 'error'));
			}
		}
		$this->request->data = $this->$model->read(null, $id);
		$this->set('title_for_layout', __('Edit Form of '.$this->request->data['Course']['name']));
	}
	
	public function name($id){
		$model = $this->_model();
		$this->set('title_for_layout', __('Course List Page'));
		$cousrse = $this->$model->findById($id);
		return $cousrse['Course']['name'];
	}
	public function index(){
		
		$this->checkPermission();
		$this->set('title_for_layout', __('Your Home Page'));		
		$v = $this->_model();
		$this->set('title_for_layout', __('User List'));
		
		$this->set('values', $this->paginate());		
		
	}
	// delete action
	public function delete($id) {
		$this->adminPermission();
		$model = $this->_model();
		if ($this->request->is('get')) {
		    throw new MethodNotAllowedException();
		}	    
		if ($this->$model->delete($id)) {
		    $this->Session->setFlash(
			__('This has been deleted.')
		    );
		    return $this->redirect(array('action' => 'index'));
		}
	}
	// delete action
	public function status($id) {
		//$this->adminPermission();
		$v = $this->_model();
		if ($this->request->is('get')) {
		    throw new MethodNotAllowedException();
		}
		$institute = $this->$v->findById($id);
		$status = $institute[$v]['status'];
		//pr($institute);
		if($status ==0){
			$status = 1;
			$msg = 'activated';
		}else{
			$status = 0;
			$msg = 'de-activated';
		}
		$institute[$v]['status'] = $status;

		$institute[$v]['id'] = $id;
		//pr($institute);die;
		if ($this->$v->save($institute)) {
		    $this->Session->setFlash(
			__('This has been '.$msg)
		    );
		    return $this->redirect(array('action' => 'index'));
		}
	}
	
	

}
