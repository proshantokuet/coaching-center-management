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
		$this->set('title_for_layout', __('Student Add Form'));
		if (!empty($this->request->data)) {			
			
			$this->_saveOrUpdate("",$this->request->data,'','');
		}

		$courses = $this->Course->find('list', array('fields'=>array('Course.name','Course.name'),'conditions'=>array('Course.status'=>1)));
		$institutions = $this->Institution->find('list', array('fields'=>array('Institution.id','Institution.name'),'conditions'=>array('Institution.status'=>1)));
		$batches = $this->Batch->find('list', array('fields'=>array('Batch.id','Batch.name'),'conditions'=>array('Batch.status'=>1)));
		$edu_level = array('Kg'=>'Kg','One'=>'One','Two'=>'Two','Three'=>'Three','Four'=>'Four',
			'Five'=>'Five','Six'=>'Six','Seven'=>'Seven','Eight'=>'Eight','Nine'=>'Nine','Ten'=>'Ten',
			'Eleven'=>'Eleven','Tweleve'=>'Tweleve');
		$this->set(compact('courses','batches','edu_level','institutions'));
	}

	public function update($id){
		$this->studentPermission();	
		$this->layout='home';
		$this->set('title_for_layout', __('Student Edit Form'));	
		$model = $this->_model();
		if (!empty($this->request->data)) {	
			$this->_saveOrUpdate($id,$this->request->data,'','profile');
		}
		$this->request->data = $this->$model->read(null, $id);
		//pr($this->request->data);
		$courses = $this->Course->find('list', array('fields'=>array('Course.name','Course.name'),'conditions'=>array('Course.status'=>1)));
		$institutions = $this->Institution->find('list', array('fields'=>array('Institution.id','Institution.name'),'conditions'=>array('Institution.status'=>1)));
		$batches = $this->Batch->find('list', array('fields'=>array('Batch.id','Batch.name'),'conditions'=>array('Batch.status'=>1)));
		$edu_level = array('Kg'=>'Kg','One'=>'One','Two'=>'Two','Three'=>'Three','Four'=>'Four',
			'Five'=>'Five','Six'=>'Six','Seven'=>'Seven','Eight'=>'Eight','Nine'=>'Nine','Ten'=>'Ten',
			'Eleven'=>'Eleven','Tweleve'=>'Tweleve');
		$this->set(compact('courses','batches','edu_level','institutions'));
	}
	public function profile(){
		$this->studentPermission();
		$model = $this->_model();		
		$id = $this->Session->read('Auth.User.id');		
		$this->request->data = $this->$model->find('first', array('conditions'=>array('Student.user_id'=>$id)));
		$id = $this->request->data['Student']['id'];
		$this->set('title_for_layout', __('Student Profile of'.$this->request->data['Student']['name']));
		$this->layout = 'home';
		$total_fees = 0 ;
		$total_due = 0;
		$total_payment = 0;
		if(!empty($this->request->data['StudentCourse'])){
			foreach ($this->request->data['StudentCourse'] as $key => $value) {
				$payment = $this->Payment->find('first', array('conditions'=>array('Payment.course_id'=>$value['course_id'],'Payment.student_id'=>$id,'Payment.status' => 1)));
				$fee = $this->Course->read(null, $value['course_id']);			
				$this->request->data['Fee'][$key]['id'] = $value['course_id'];
				$this->request->data['Fee'][$key]['due_date'] = @$payment['Payment']['due_date'];
				$this->request->data['Fee'][$key]['name'] = $fee['Course']['name'];
				$this->request->data['Fee'][$key]['fees'] = $fee['Course']['fees'];
				$this->request->data['Fee'][$key]['payment'] = @$payment['Payment']['amount'];
				$this->request->data['Fee'][$key]['due'] = @$fee['Course']['fees'] - @$payment['Payment']['amount'];
				$total_fees = $total_fees+$fee['Course']['fees'];
				$total_due = $total_due+$this->request->data['Fee'][$key]['due'];
				$total_payment = $total_payment+ @$payment['Payment']['amount'];
			}	
		}	
		$date = new DateTime();
		$date = $date->format('Y-m-d');		
		$this->set(compact('total_fees','total_due','total_payment','date'));
	}
	public function registration(){
		$this->layout = 'home';
		$this->set('title_for_layout', __('Student Registration Form'));		
		$model = $this->_model();
		$this->loadModel('Course');
		if (!empty($this->request->data)) {	

			$this->_saveOrUpdate("",$this->request->data,0,'');
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
		$this->set('title_for_layout', __('Student Registration Edit Form'));
		if (!empty($this->request->data)) {	

			$this->_saveOrUpdate($id,$this->request->data,'','');
		}
		$this->request->data = $this->$model->read(null, $id);
		//pr($this->request->data);
		$courses = $this->Course->find('list', array('fields'=>array('Course.name','Course.name'),'conditions'=>array('Course.status'=>1)));
		$institutions = $this->Institution->find('list', array('fields'=>array('Institution.id','Institution.name'),'conditions'=>array('Institution.status'=>1)));
		$batches = $this->Batch->find('list', array('fields'=>array('Batch.id','Batch.name'),'conditions'=>array('Batch.status'=>1)));
		$edu_level = array('Kg'=>'Kg','One'=>'One','Two'=>'Two','Three'=>'Three','Four'=>'Four',
			'Five'=>'Five','Six'=>'Six','Seven'=>'Seven','Eight'=>'Eight','Nine'=>'Nine','Ten'=>'Ten',
			'Eleven'=>'Eleven','Tweleve'=>'Tweleve');
		$this->set(compact('courses','batches','edu_level','institutions'));

	}
	
	public function  _saveOrUpdate($id,$data,$status,$action){
			$this->request->data = $data;
			$model = $this->_model();
			if(!empty($this->request->data['BatchTime'])){
				unset($this->request->data['BatchTime']);	
			}
			if(!empty($this->request->data['course'])){					
				foreach($this->request->data['course'] as $key => $course){	
					$courses = $this->Course->findByName($this->request->data['course'][$key]);
					$payment = $this->Payment->find('first', array('conditions'=>array('Payment.course_id'=>$courses['Course']['id'],'Payment.student_id'=>$id,'Payment.status' =>0)));
					if(!empty($payment)){
						$this->Payment->id = $payment['Payment']['id'];
						$this->Payment->saveField('status', 1);
					}										
					$this->request->data['StudentCourse'][$key]['course_id'] = $courses['Course']['id'];
					if(!empty($id)){
						$find_student = $this->$model->findById($id);
						$student_batch_id = $find_student['Student']['batch_id'];
						if(!empty($student_batch_id)){
							$this->request->data['StudentCourse'][$key]['batch_id'] = $student_batch_id;		
						}else{
							$this->Session->setFlash(__('Batch is not set yet'), 'default', array('class' => 'error'));				
							$this->redirect(array('controller'=>'Student','action' => 'edit',$id ));
						}
						
					}else{
						$this->request->data['StudentCourse'][$key]['batch_id'] = $this->request->data['Student']['batch_id'];				
					}
				}
				if(!empty($id)){ // When Admin edit student profile and set course
				$StudentCourse = $this->StudentCourse->find('all', array('fields'=>array('StudentCourse.id'),'conditions'=>array('StudentCourse.student_id'=>$id)));
				foreach($StudentCourse as $key => $ids){				
					$this->StudentCourse->delete($ids['StudentCourse']['id']);
				}
			}
				unset($this->request->data['course']);
			}
			
			$this->$model->create();			
			$this->request->data['User']['role'] = 'student';			
			$this->request->data['User']['status'] = 1;
			$this->request->data[$model]['status'] = 1;
			$this->request->data[$model]['created_by']= $this->Session->read('Auth.User.id');
			$photographName = $this->ImageUpload->uploadImage('picture', IMAGE_LOCATION1);
			if(!empty($photographName['image'])){
				$this->request->data['Student']['picture']= $photographName['image'];
				$this->request->data['Student']['thumbnail']= $photographName['thumbnail'];
			}

			$datasource = $this->$model->getDataSource();
			$datasource->begin(); 
			try{ 
				if ($this->$model->saveAll($this->request->data)) {
					$datasource->commit();
					if(!empty($id)){
						$lastId = $id;
					}else{	
						$lastId = $this->Student->getInsertID();
					}
					//$this->Session->setFlash(__('you have successfully registered '), 'default', array('class' => 'success'));				
					if(!empty($action)){ // when student update profile
						$action = $action;
						$this->Session->setFlash(__('You have successfully Update your information '), 'default', array('class' => 'success'));				
						$this->redirect(array('controller'=>'Students','action' => 'profile' ));
					}else{
						$this->Session->setFlash(__('Your Registration has benn completed.'), 'default', array('class' => 'success'));				
						$this->redirect(array('controller'=>'Payments','action' => 'index',$lastId ));
					}
					
				} 
				else {
					$datasource->rollback();
					throw new Exception();
					$this->Session->setFlash(__($this->save_msg_error), 'default', array('class' => 'error'));
				}
			}catch(Exception $e) {			
				$datasource->rollback();
				return 1;			
				exit();
			}

	}
	public function search(){
		$this->checkPermission();
		$this->set('title_for_layout', __('Student Search Form'));	
		$this->_searchResult($_REQUEST);
	}
	
	public function index(){		
		$this->checkPermission();
		$this->set('title_for_layout', __('Student Search Form'));		
		$this->_searchResult($_REQUEST);	
		
	}

	public function _searchResult(){
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
					'limit' => 20,
					'order'=> 'Student.id DESC',
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
		$this->set('title_for_layout', __('Student View Form ' .$this->request->data['Student']['name'] ));
		
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
	public function print_form($id){
		$this->layout = 'print';
		$this->checkPermission();				
		$model = $this->_model();
		$this->request->data = $this->$model->read(null, $id);
		$this->set('title_for_layout', __('Student Print Form ' .$this->request->data['Student']['name'] ));
		$total_fees = 0 ;
		$total_due = 0;
		$total_payment = 0;
		if(!empty($this->request->data['StudentCourse'])){
			foreach ($this->request->data['StudentCourse'] as $key => $value) {
				$payment = $this->Payment->find('first', array('conditions'=>array('Payment.course_id'=>$value['course_id'],'Payment.student_id'=>$id,'Payment.status' => 1)));
				$fee = $this->Course->read(null, $value['course_id']);			
				$this->request->data['Fee'][$key]['id'] = $value['course_id'];
				$this->request->data['Fee'][$key]['due_date'] = @$payment['Payment']['due_date'];
				$this->request->data['Fee'][$key]['name'] = $fee['Course']['name'];
				$this->request->data['Fee'][$key]['fees'] = $fee['Course']['fees'];
				$this->request->data['Fee'][$key]['payment'] = @$payment['Payment']['amount'];
				$this->request->data['Fee'][$key]['due'] = @$fee['Course']['fees'] - @$payment['Payment']['amount'];
				$total_fees = $total_fees+$fee['Course']['fees'];
				$total_due = $total_due+$this->request->data['Fee'][$key]['due'];
				$total_payment = $total_payment+ @$payment['Payment']['amount'];
			}	
		}	

		$date = new DateTime();
		$date = $date->format('Y-m-d');		
		$this->set(compact('total_fees','total_due','total_payment','date'));
		$this->view = 'print';

	}
	public function card($id){
		$this->layout = 'print';
		$this->checkPermission();				
		$model = $this->_model();
		$this->request->data = $this->$model->read(null, $id);
	}

}
