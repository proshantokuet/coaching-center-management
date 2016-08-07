<?php
App::uses('AppController', 'Controller');

class CoursesController extends AppController {

	public $name = 'Courses';
	public $components = array('RequestHandler');
	public $uses = array('Course','Batch','CourseBatch');	
	
	public function add(){
		$this->checkPermission();
		$this->set('title_for_layout', __('Course Add Page'));		
		$model = $this->_model();
		if (!empty($this->request->data)) {			
			$this->$model->create();			
			$this->_saveAndUpdate('',$this->request->data);
		}
		$batches = $this->Batch->find('list', array('fields'=>array('Batch.name','Batch.name'),'conditions'=>array('Batch.status'=>1)));
		$days = array('Satarday'=>'Satarday','Sunday'=>'Sunday','Monday'=>'Monday','Tuesday'=>'Tuesday','Wednesday'=>'Wednesday','Thusday'=>'Thusday','Friday'=>'Friday');
		$this->set(compact('days','batches'));		
	}

	public function _saveAndUpdate($id = null ,$data = null){
		$model = $this->_model();	
		$this->request->data = $data;	
		$this->request->data[$model]['status'] = 1;
		$this->request->data[$model]['user_id']= $this->Session->read('Auth.User.id');			
		$batches = array_unique($this->request->data['batch']);			
		if(!empty($batches)){	
	        foreach ($batches as $key => $value) {	           		
	            $batch = $this->Batch->findByName($value);
	            $this->request->data['CourseBatch'][$key]['batch_id'] = $batch['Batch']['id'];
	            $this->request->data['CourseBatch'][$key]['user_id'] = $this->Session->read('Auth.User.id');
	        }
        }
        unset($this->request->data['batch']);  
        unset($this->request->data['Course']['batch_id']);
        $datasource = $this->$model->getDataSource();
		$datasource->begin();
		try{
			if(!empty($id)){// edit  mode
				$courseBatches = $this->CourseBatch->find('all', array('fields'=>array('CourseBatch.id'),'conditions'=>array('CourseBatch.course_id'=>$id)));
				foreach($courseBatches as $key => $ids){				
					$this->CourseBatch->delete($ids['CourseBatch']['id']);
				}
				$this->request->data[$model]['updated_by']= $this->Session->read('Auth.User')['username'];
			}
			if ($this->$model->saveAll($this->request->data)) {	
				$datasource->commit();				
				$this->Session->setFlash(__('Success'), 'default', array('class' => 'success'));				
				$this->redirect(array('action' => 'index'));
			} 
			else {
				$this->Session->setFlash(__($this->save_msg_error), 'default', array('class' => 'error'));
			}
		}catch(Exception $e) {			
			$datasource->rollback();
			return 1;			
			exit();
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
			$this->_saveAndUpdate($id,$this->request->data);
		}
		$batches = $this->Batch->find('list', array('fields'=>array('Batch.name','Batch.name'),'conditions'=>array('Batch.status'=>1)));
		$this->request->data = $this->$model->read(null, $id);
		$this->set('title_for_layout', __('Edit Form of '.$this->request->data['Course']['name']));
		$this->set(compact('batches'));
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
		$this->set('title_for_layout', __('Course List'));
		$this->paginate = array('order'=>'Course.id DESC');
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
		$this->recusive = -1;
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
		$this->$v->id = $id;
		$activationKey = md5(uniqid());
		$this->$v->saveField('status', $status);		
		return $this->redirect(array('action' => 'index'));
		
	}
}
