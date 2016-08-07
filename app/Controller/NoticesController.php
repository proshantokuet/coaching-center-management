<?php
App::uses('AppController', 'Controller');

class NoticesController extends AppController {

	public $name = 'Notices';
	public $components = array('RequestHandler','ImageUpload');
	public $uses = array('Notice');	
	// Patient registration form
	
	public function add(){
		$this->checkPermission();		
		$model = $this->_model();
		$this->set('title_for_layout', __('Notice Add Form'));
		if (!empty($this->request->data)) {			
			$this->$model->create();			
			$this->request->data[$model]['status'] = 1;
			$this->request->data[$model]['user_id']= $this->Session->read('Auth.User.id');
			if ($this->$model->save($this->request->data)) {				
				$this->Session->setFlash(__('Successfully Added Notice'), 'default', array('class' => 'success'));				
				$this->redirect(array('action' => 'index'));
			} 
			else {
				$this->Session->setFlash(__($this->save_msg_error), 'default', array('class' => 'error'));
			}
		}
		
	}
	public function edit($id){
		$this->checkPermission();
		$model = $this->_model();
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid ' .$v), 'default', array('class' => 'error'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->request->data)) {			
			if ($this->$model->save($this->request->data)) {				
				$this->Session->setFlash(__('Successfully Edited Notice'), 'default', array('class' => 'success'));				
				$this->redirect(array('action' => 'index'));
			} 
			else {
				$this->Session->setFlash(__($this->save_msg_error), 'default', array('class' => 'error'));
			}
		}		
		$this->request->data = $this->$model->read(null, $id);
		$this->set('title_for_layout', __('Edit Form of '.$this->request->data['Notice']['name']));
	}
	
	
	public function index(){
		
		$this->checkPermission();
		$this->set('title_for_layout', __('Your Home Page'));		
		$v = $this->_model();
		$this->set('title_for_layout', __('Notice List'));
		
		$this->set('values', $this->paginate());		
		
	}
	// delete action
	public function delete($id) {
		$this->checkPermission();
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
		$this->checkPermission();
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
	
	public function all(){	
		$this->set('title_for_layout', __('All Notice'));
		$this->layout = 'home';		
		$v = $this->_model();	
		$notices = $this->Notice->find('all',array('limit'=>10,'conditions'=>array('Notice.status'=>1)));
		$this->set(compact('notices'));
		$this->paginate = array('conditions'=>array('status'=>1));	
		$this->set('values', $this->paginate());

		
	}
	public function view($id){
		$v = $this->_model();		
		$this->layout = 'home';	
		$notices = $this->$v->find('all',array('limit'=>10));		
		$this->set(compact('notices'));		
		$this->request->data = $this->$v->read(null,$id);
		$this->set('title_for_layout', __($this->request->data['Notice']['name']));
	}

}
