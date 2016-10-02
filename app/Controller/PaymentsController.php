<?php
App::uses('AppController', 'Controller');

class PaymentsController extends AppController {

	public $name = 'Payments';
	public $components = array('RequestHandler');
	public $uses = array('Payment','Course','Student','StudentCourse','Transaction','LastPayment');	
	
	public function index($id){
		$this->checkAdminOrOfficer();
		$model = $this->_model();
		if (!empty($this->request->data)) {			
			$this->$model->create();
			$course_list = array();
			foreach ($this->request->data['amount'] as $key => $value) {
				array_push($course_list,$this->request->data['course_id'][$key]);
				$payment = $this->$model->find('first', array('conditions'=>array('Payment.course_id'=>$this->request->data['course_id'][$key],'Payment.student_id'=>$id)));
				$due_date = new DateTime($this->request->data['due_date'][$key]);
				$due_date = $due_date->format('Y-m-d');
				$couse_id =  $this->request->data['course_id'][$key];
				$this->request->data[$key]['Transaction']['student_id'] = $id;
				$this->request->data[$key]['Transaction']['course_id'] = $couse_id;
				$this->request->data[$key]['Transaction']['amount'] = $value;
				$this->request->data[$key]['Transaction']['user_id'] =$this->Session->read('Auth.User.id');

				if(!empty($payment)){
					$this->request->data[$key]['Payment']['id'] = $payment['Payment']['id'];
					$this->request->data[$key]['Payment']['status'] = 1;
					$this->request->data[$key]['Payment']['due_date'] = $due_date;					
					$this->request->data[$key]['Payment']['amount'] = $value+$payment['Payment']['amount'];					
				}else{
					$this->request->data[$key]['Payment']['user_id'] = $this->Session->read('Auth.User.id');
					$this->request->data[$key]['Payment']['student_id'] = $id;
					$this->request->data[$key]['Payment']['amount'] = $value;
					$this->request->data[$key]['Payment']['status'] = 1;
					$this->request->data[$key]['Payment']['due_date'] = $due_date;
					$this->request->data[$key]['Payment']['course_id'] = $couse_id;
				}
				$this->request->data[$key]['LastPayment']['student_id'] = $id;
				$this->request->data[$key]['LastPayment']['course_id'] = $couse_id;
				$this->request->data[$key]['LastPayment']['user_id'] = $this->Session->read('Auth.User.id');
				$this->request->data[$key]['LastPayment']['amount'] = $value;

			}


						
			unset($this->request->data['amount']);
			unset($this->request->data['due_date']);
			unset($this->request->data['course_id']);
			$datasource = $this->$model->getDataSource();
			//pr($this->request->data);die;
			$datasource->begin(); 

			$payments = $this->Payment->find('all', array('fields'=>array('Payment.id,Payment.course_id'),'conditions'=>array('Payment.student_id'=>$id,)));
			foreach($payments as $key => $ids){			
				if (!in_array($ids['Payment']['course_id'], $course_list)) {					
				    $this->Payment->id = $ids['Payment']['id'];
					$this->Payment->saveField('status', 0);
				}
				
			}
			@$this->LastPayment->deleteAll(array('LastPayment.student_id'=> $id));
			try{ 
				if ($this->$model->saveAll($this->request->data)) {	
					$this->Transaction->saveAll($this->request->data);
					$this->LastPayment->saveAll($this->request->data);
				 	$datasource->commit();			
					$this->Session->setFlash(__('Success'), 'default', array('class' => 'success'));				
					$this->redirect(array('action' => 'index',$id));
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
		$this->request->data = $this->Student->read(null, $id);
		$total_fees = 0 ;
		$total_due = 0;
		$total_payment = 0;
		
		if(!empty($this->request->data['StudentCourse'])){
			foreach ($this->request->data['StudentCourse'] as $key => $value) {
				$payment = $this->$model->find('first', array('conditions'=>array('Payment.course_id'=>$value['course_id'],'Payment.student_id'=>$id,'Payment.status' => 1)));
				$fee = $this->Course->read(null, $value['course_id']);			
				$this->request->data['Fee'][$key]['id'] = $value['course_id'];
				$this->request->data['Fee'][$key]['name'] = $fee['Course']['name'];
				$this->request->data['Fee'][$key]['fees'] = $fee['Course']['fees'];
				$this->request->data['Fee'][$key]['payment'] = @$payment['Payment']['amount'];
				$this->request->data['Fee'][$key]['due_date'] = @$payment['Payment']['due_date'];
				$this->request->data['Fee'][$key]['due'] = @$fee['Course']['fees'] - @$payment['Payment']['amount'];
				$total_fees = $total_fees+$fee['Course']['fees'];
				$total_due = $total_due+$this->request->data['Fee'][$key]['due'];
				$total_payment = $total_payment+ @$payment['Payment']['amount'];
			}	
		}	
		$this->set(compact('total_fees','total_due','total_payment'));
		
	}
	public function edit($id){
		$this->checkAdminOrOfficer();
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
	}
	public function due_payment(){
		$this->checkAdminOrOfficer();
		$indicator = 1;
		$this->view = 'due';
		$this->set('title_for_layout', __('Due Payment'));
		
		if(!empty($_REQUEST)){
			$indicator = 2;	
			$this->_due_payment($_REQUEST);		
		}				
		$this->set(compact('indicator'));
	}
	public function name($id){
		$model = $this->_model();
		$cousrse = $this->$model->findById($id);
		return $cousrse['Course']['name'];
	}
	function _due_payment(){
		$model = $this->_model();
       $id_array = array();
		if(!empty(@$_REQUEST['name'])){
			$name = @$_REQUEST['name'];
			$s_name_role = $name;

			$role = explode('-',$name);
			$s_name =$role[0];
			$role = $role[1];
			@$student_id=$this->Student->find('first',array('conditions'=>array('id_number'=>$role)));
			@$student_id = @$student_id['Student']['id'];
			if(!empty(@$student_id)){
				$id_array = array($model.'.student_id ='  => $student_id);
			}else{
				$id_array = array();
			}
		}
		
		$start = @$_REQUEST['start'];
		$end = @$_REQUEST['end'];
		$this->set(compact('start','end'));
		$start = new DateTime($start);
		$start = $start->format('Y-m-d');
		$end = new DateTime($end);
		$end = $end->format('Y-m-d');
		$conditions = array();
		if(!empty($start)){
			$start_array = array($model.'.due_date >='  => $start);
		}else{
			$start_array = array();
		}
		if(!empty($end)){
			$end_array = array($model.'.due_date <='  => $end);
		}else{
			$end_array = array();
		}
		$conditions = array_merge($start_array,$end_array,$id_array);
		//$this->$model->unbindModel(array('belongsTo' => array('Student')));		
		$values = $this->$model->find('all',array('conditions'=>$conditions));
		 
		$this->set(compact('values','s_name','s_name_role'));
	}
	
}
