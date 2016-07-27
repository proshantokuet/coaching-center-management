<?php
App::uses('AppController', 'Controller');

class PaymentsController extends AppController {

	public $name = 'Payments';
	public $components = array('RequestHandler');
	public $uses = array('Payment','Course','Student','StudentCourse');	
	// Patient registration form
	
	public function index($id){
		$this->checkPermission();		
		$model = $this->_model();
		if (!empty($this->request->data)) {			
			$this->$model->create();
			$course_list = array();
			foreach ($this->request->data['amount'] as $key => $value) {
				array_push($course_list,$this->request->data['course_id'][$key]);
				$payment = $this->$model->find('first', array('conditions'=>array('Payment.course_id'=>$this->request->data['course_id'][$key],'Payment.student_id'=>$id)));
				
				if(!empty($payment)){
					$this->request->data[$key]['Payment']['id'] = $payment['Payment']['id'];
					$this->request->data[$key]['Payment']['status'] = 1;					
					$this->request->data[$key]['Payment']['amount'] = $value+$payment['Payment']['amount'];					
				}else{
					$this->request->data[$key]['Payment']['user_id'] = $this->Session->read('Auth.User.id');
					$this->request->data[$key]['Payment']['student_id'] = $id;
					$this->request->data[$key]['Payment']['amount'] = $value;
					$this->request->data[$key]['Payment']['status'] = 1;
					$this->request->data[$key]['Payment']['course_id'] = $this->request->data['course_id'][$key];
				}
			}

			$payments = $this->Payment->find('all', array('fields'=>array('Payment.id,Payment.course_id'),'conditions'=>array('Payment.student_id'=>$id,)));
			foreach($payments as $key => $ids){			
				if (!in_array($ids['Payment']['course_id'], $course_list)) {
					//pr(55555);
				    $this->Payment->id = $ids['Payment']['id'];
					$this->Payment->saveField('status', 0);
				}
				
			}			
			unset($this->request->data['amount']);
			unset($this->request->data['course_id']);					
			if ($this->$model->saveAll($this->request->data)) {				
				$this->Session->setFlash(__('Success'), 'default', array('class' => 'success'));				
				$this->redirect(array('action' => 'index',$id));
			} 
			else {
				$this->Session->setFlash(__($this->save_msg_error), 'default', array('class' => 'error'));
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
				$this->request->data['Fee'][$key]['due'] = @$fee['Course']['fees'] - @$payment['Payment']['amount'];
				$total_fees = $total_fees+$fee['Course']['fees'];
				$total_due = $total_due+$this->request->data['Fee'][$key]['due'];
				$total_payment = $total_payment+ @$payment['Payment']['amount'];
			}	
		}	
		$this->set(compact('total_fees','total_due','total_payment'));
		
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
	}
	
	public function name($id){
		$model = $this->_model();
		$cousrse = $this->$model->findById($id);
		return $cousrse['Course']['name'];
	}
	
	
}