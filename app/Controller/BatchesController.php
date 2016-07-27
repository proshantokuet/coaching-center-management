<?php
App::uses('AppController', 'Controller');

class BatchesController extends AppController {

	public $name = 'Batches';
	public $components = array('RequestHandler');
	public $uses = array('Batch');	
	// Patient registration form
	
	public function add(){
		$this->checkPermission();		
		$model = $this->_model();
		$this->loadModel('Course');
		if (!empty($this->request->data)) {		
			unset($this->request->data['Batch']['BatchTime']);
			unset($this->request->data['BatchTime']);			
			foreach($this->request->data['course'] as $key => $course){					
				$courses = $this->Course->findByName($this->request->data['course'][$key]);					
				$this->request->data['BatchTime'][$key]['course_id'] = $courses['Course']['id'];
				$this->request->data['BatchTime'][$key]['day'] = $this->request->data['day'][$key];
				$this->request->data['BatchTime'][$key]['start_time'] = $this->request->data['start_time'][$key];
				$this->request->data['BatchTime'][$key]['end_time'] = $this->request->data['end_time'][$key];
			}
			unset($this->request->data['course']);
			unset($this->request->data['day']);
			unset($this->request->data['start_time']);
			unset($this->request->data['end_time']);

						
			$this->$model->create();			
			$this->request->data[$model]['status'] = 1;
			$this->request->data[$model]['user_id']= $this->Session->read('Auth.User.id');
			if ($this->$model->saveAll($this->request->data)) {				
				$this->Session->setFlash(__('Success'), 'default', array('class' => 'success'));				
				$this->redirect(array('action' => 'index'));
			} 
			else {
				$this->Session->setFlash(__($this->save_msg_error), 'default', array('class' => 'error'));
			}
		}

		$courses = $this->Course->find('list', array('fields'=>array('Course.name','Course.name'),'conditions'=>array('Course.status'=>1)));
		$days = array('Satarday'=>'Satarday','Sunday'=>'Sunday','Monday'=>'Monday','Tuesday'=>'Tuesday','Wednesday'=>'Wednesday','Thusday'=>'Thusday','Friday'=>'Friday');
		$this->set(compact('courses','days'));
	}
	public function edit($id){
		$this->checkPermission();
		$model = $this->_model();
		$this->loadModel('BatchTime');
		$this->loadModel('Course');
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid ' .$v), 'default', array('class' => 'error'));
			$this->redirect(array('action' => 'index'));
		}

		if (!empty($this->request->data)) {
			unset($this->request->data['Batch']['BatchTime']);
			unset($this->request->data['BatchTime']);
			foreach($this->request->data['course'] as $key => $course){
				$courses = $this->Course->findByName($this->request->data['course'][$key]);					
				$this->request->data['BatchTime'][$key]['course_id'] = $courses['Course']['id'];
				$this->request->data['BatchTime'][$key]['day'] = $this->request->data['day'][$key];
				$this->request->data['BatchTime'][$key]['start_time'] = $this->request->data['start_time'][$key];
				$this->request->data['BatchTime'][$key]['end_time'] = $this->request->data['end_time'][$key];
			}
			$batchTimes = $this->BatchTime->find('all', array('fields'=>array('BatchTime.id'),'conditions'=>array('BatchTime.batch_id'=>$id)));
			foreach($batchTimes as $key => $ids){				
				$this->BatchTime->delete($ids['BatchTime']['id']);
			}
			
			unset($this->request->data['course']);
			unset($this->request->data['id']);
			unset($this->request->data['day']);
			unset($this->request->data['start_time']);
			unset($this->request->data['end_time']);
			if ($this->$model->saveAll($this->request->data)) {				
				$this->Session->setFlash(__('Success'), 'default', array('class' => 'success'));				
				$this->redirect(array('action' => 'index'));
			} 
			else {
				$this->Session->setFlash(__($this->save_msg_error), 'default', array('class' => 'error'));
			}
		}
		$this->request->data = $this->$model->read(null, $id);
		
		$courses = $this->Course->find('list', array('fields'=>array('Course.name','Course.name'),'conditions'=>array('Course.status'=>1)));
		$days = array('Satarday'=>'Satarday','Sunday'=>'Sunday','Monday'=>'Monday','Tuesday'=>'Tuesday','Wednesday'=>'Wednesday','Thusday'=>'Thusday','Friday'=>'Friday');
		$this->set(compact('courses','days'));
		

	}
	
	
	public function index(){		
		$this->checkPermission();
		$this->set('title_for_layout', __('Your Home Page'));		
		$model = $this->_model();		
		$this->set('values', $this->paginate());		
		
	}
	public function view($id){		
		$this->checkPermission();				
		$model = $this->_model();

		$this->request->data = $this->$model->read(null, $id);
		
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
