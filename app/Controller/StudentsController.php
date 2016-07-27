<?php
App::uses('AppController', 'Controller');

class StudentsController extends AppController {

	public $name = 'Students';
	public $components = array('RequestHandler','ImageUpload');
	public $uses = array('Student','Course','Institution','Batch','StudentCourse','Payment');	
	// Patient registration form
	
	public function add(){
		$this->checkPermission();		
		$model = $this->_model();
		$this->loadModel('Course');

		if (!empty($this->request->data)) {			
			/*unset($this->request->data['BatchTime']);						
			foreach($this->request->data['course'] as $key => $course){					
				$courses = $this->Course->findByName($this->request->data['course'][$key]);					
				$this->request->data['StudentCourse'][$key]['course_id'] = $courses['Course']['id'];
				$this->request->data['StudentCourse'][$key]['batch_id'] = $this->request->data['Student']['batch_id'];
				
			}
			unset($this->request->data['course']);			
			$this->$model->create();			
			$this->request->data['User']['role'] = 'student';
			$this->request->data['User']['status'] = 1;
			$this->request->data[$model]['status'] = 1;
			$this->request->data[$model]['created_by']= $this->Session->read('Auth.User.id');
			$photographName = $this->ImageUpload->uploadImage('picture', IMAGE_LOCATION1);
			if(!empty($photographName['image'])){
				$this->request->data['User']['picture']= $photographName['image'];
				$this->request->data['User']['thumbnail']= $photographName['thumbnail'];
			}			
			if ($this->$model->saveAll($this->request->data)) {	
				$lastId = $this->Student->getInsertID();
				$this->Session->setFlash(__('Success'), 'default', array('class' => 'success'));				
				$this->redirect(array('controller'=>'Payments','action' => 'index',$lastId ));
			} 
			else {
				$this->Session->setFlash(__($this->save_msg_error), 'default', array('class' => 'error'));
			}*/
			$this->_saveOrUpdate("",$this->request->data);
		}

		$courses = $this->Course->find('list', array('fields'=>array('Course.name','Course.name'),'conditions'=>array('Course.status'=>1)));
		$institutions = $this->Institution->find('list', array('fields'=>array('Institution.id','Institution.name'),'conditions'=>array('Institution.status'=>1)));
		$batches = $this->Batch->find('list', array('fields'=>array('Batch.id','Batch.name'),'conditions'=>array('Batch.status'=>1)));
		$edu_level = array('Kg'=>'Kg','One'=>'One','Two'=>'Two','Three'=>'Three','Four'=>'Four',
			'Five'=>'Five','Six'=>'Six','Seven'=>'Seven','Eight'=>'Eight','Nine'=>'Nine','Ten'=>'Ten',
			'Eleven'=>'Eleven','Tweleve'=>'Tweleve');
		$this->set(compact('courses','batches','edu_level','institutions'));
	}
	public function edit($id){
		$this->checkPermission();
		$model = $this->_model();
		if (!empty($this->request->data)) {	
			$this->_saveOrUpdate($id,$this->request->data);
		}
		$this->request->data = $this->$model->read(null, $id);
		
		$courses = $this->Course->find('list', array('fields'=>array('Course.name','Course.name'),'conditions'=>array('Course.status'=>1)));
		$institutions = $this->Institution->find('list', array('fields'=>array('Institution.id','Institution.name'),'conditions'=>array('Institution.status'=>1)));
		$batches = $this->Batch->find('list', array('fields'=>array('Batch.id','Batch.name'),'conditions'=>array('Batch.status'=>1)));
		$edu_level = array('Kg'=>'Kg','One'=>'One','Two'=>'Two','Three'=>'Three','Four'=>'Four',
			'Five'=>'Five','Six'=>'Six','Seven'=>'Seven','Eight'=>'Eight','Nine'=>'Nine','Ten'=>'Ten',
			'Eleven'=>'Eleven','Tweleve'=>'Tweleve');
		$this->set(compact('courses','batches','edu_level','institutions'));

	}
	
	public function  _saveOrUpdate($id,$data){
			$this->request->data = $data;
			$model = $this->_model();
			if(!empty($this->request->data['BatchTime'])){
				unset($this->request->data['BatchTime']);	
			}
			if(!empty($this->request->data['BatchTime'])){					
				foreach($this->request->data['course'] as $key => $course){	
					$courses = $this->Course->findByName($this->request->data['course'][$key]);
					$payment = $this->Payment->find('first', array('conditions'=>array('Payment.course_id'=>$courses['Course']['id'],'Payment.student_id'=>$id,'Payment.status' =>0)));
					if(!empty($payment)){
						$this->Payment->id = $payment['Payment']['id'];
						$this->Payment->saveField('status', 1);
					}										
					$this->request->data['StudentCourse'][$key]['course_id'] = $courses['Course']['id'];
					$this->request->data['StudentCourse'][$key]['batch_id'] = $this->request->data['Student']['batch_id'];				
				}
			
				unset($this->request->data['course']);
			}
			if(!empty($id)){
				$StudentCourse = $this->StudentCourse->find('all', array('fields'=>array('StudentCourse.id'),'conditions'=>array('StudentCourse.student_id'=>$id)));
				foreach($StudentCourse as $key => $ids){				
					$this->StudentCourse->delete($ids['StudentCourse']['id']);
				}
			}
			$this->$model->create();			
			$this->request->data['User']['role'] = 'student';
			$this->request->data['User']['status'] = 1;
			$this->request->data[$model]['status'] = 1;
			$this->request->data[$model]['created_by']= $this->Session->read('Auth.User.id');
			$photographName = $this->ImageUpload->uploadImage('picture', IMAGE_LOCATION1);
			if(!empty($photographName['image'])){
				$this->request->data['User']['picture']= $photographName['image'];
				$this->request->data['User']['thumbnail']= $photographName['thumbnail'];
			}
			pr($this->request->data);die;			
			if ($this->$model->saveAll($this->request->data)) {
				
				if(!empty($id)){
					$lastId = $id;
				}else{	
					$lastId = $this->Student->getInsertID();
				}
				$this->Session->setFlash(__('Success'), 'default', array('class' => 'success'));				
				$this->redirect(array('controller'=>'Payments','action' => 'index',$lastId ));
			} 
			else {
				$this->Session->setFlash(__($this->save_msg_error), 'default', array('class' => 'error'));
			}

	}
	
	public function index(){		
		$this->checkPermission();
		$this->set('title_for_layout', __('Your Home Page'));		
		$model = $this->_model();
		$name = @$_REQUEST['name'];
		$id_number = @$_REQUEST['id_number'];
		$batch_id = @$_REQUEST['batch_id'];
		$email = @$_REQUEST['email'];
		$contact_student = @$_REQUEST['contact_student'];
		$institution_id = @$_REQUEST['institution_id'];
		$conditions = array();
		if(!empty($id_number)){
			$id_number_array = array($model.'.id_number'  => $id_number);
		}else{
			$id_number_array = array();
		}
		if(!empty($email)){
			$email_array = array($model.'.email'  => $email);
		}else{
			$email_array = array();
		}
		if(!empty($contact_student)){
			$contact_student_array = array($model.'.contact_student'  => $contact_student);
		}else{
			$contact_student_array = array();
		}
		if(!empty($institution_id)){
			$institution_id_array = array($model.'.institution_id'  => $institution_id);
		}else{
			$institution_id_array = array();
		}
		if(!empty($batch_id)){
			$batch_id_array = array($model.'.batch_id'  => $batch_id);
		}else{
			$batch_id_array = array();
		}
		if(!empty($name)){			
			$name_array = array($model.'.name LIKE ?'  => "%".$name."%");	
		}else{
			$name_array = array();
		}
		if(!empty($id_number_array) || !empty($email) || !empty($contact_student) || !empty($institution_id) 
			|| !empty($batch_id) || !empty($name)){
			$conditions = array_merge($id_number_array,$email_array,$contact_student_array,$institution_id_array,$name_array,$batch_id_array);
			$this->paginate = array(
					'conditions'=>array(
						$conditions,					
					),
					'limit' => 1,
					'order'=> 'Student.id desc',
				);
			
			$this->set('values', $this->paginate());
			$indicator = 1;	
			$this->set(compact('indicator'));
		}
		$institutions = $this->Institution->find('list', array('fields'=>array('Institution.id','Institution.name'),'conditions'=>array('Institution.status'=>1)));
		$batches = $this->Batch->find('list', array('fields'=>array('Batch.id','Batch.name'),'conditions'=>array('Batch.status'=>1)));
		$this->set(compact('batches','institutions','name','id_number','email','contact_student','institution_id',
			'institution_id','batch_id'));		
		
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
	public $hasMany = array('Student','Institution','Batch');
	

}
