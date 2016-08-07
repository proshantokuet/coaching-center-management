<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController {

	public $name = 'Users';
	public $components = array('RequestHandler','ImageUpload');
	public $uses = array('User');	
	// Patient registration form
	public function registration(){		
		$v = $this->_model();		
		$this->set('title_for_layout', __('Create your account'));
		$v = $this->_model();
		if (!empty($this->request->data)) {			
			$this->$v->create();			
			if ($this->$v->save($this->request->data)) {				
				$this->Session->setFlash(__('Success'), 'default', array('class' => 'success'));				
				$this->redirect(array('action' => 'index'));
			} 
			else {
				$this->Session->setFlash(__($this->save_msg_error), 'default', array('class' => 'error'));
			}
		}
	}
	// user addv(doctor,rmp)
	public function add(){
		$this->checkPermission();
		
		$this->set('title_for_layout', __('Create doctor account'));
		$v = $this->_model();
		if (!empty($this->request->data)) {
			
			$this->$v->create();
			$photographName = $this->ImageUpload->uploadImage('picture', IMAGE_LOCATION1);
			$this->request->data['User']['picture']= $photographName['image'];
			$this->request->data['User']['thumbnail']= $photographName['thumbnail'];
			$this->request->data['User']['role'] = 'admin';
			if ($this->$v->save($this->request->data)) {
				
				$this->Session->setFlash(__('User has been created successfully.'), 'default', array('class' => 'success'));
				
				$this->redirect(array('action' => 'index'));
			} 
			else {
				$this->Session->setFlash(__($this->save_msg_error), 'default', array('class' => 'error'));
			}
		}
		$this->layout = 'default';
	}
	
	
	
	/****************User  edit Action  **********************/
	public function edit($id = null) {
		$this->checkPermission();
		$v = $this->_model();
		
		$this->set('title_for_layout', __('Edit '.$v));
		
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid ' .$v), 'default', array('class' => 'error'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->request->data)) {
			$photo = $this->ImageUpload->uploadImage('picture', IMAGE_LOCATION1);				
			if(!empty($photo['image'])){		   
				$this->request->data['User']['picture']= $photo['image'];
				$this->request->data['User']['thumbnail']= $photo['thumbnail'];
			}
			if ($this->$v->save($this->request->data)) {
				$this->Session->setFlash(__('User has been updated successfully.'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The '.$v.'  could not be updated. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$this->request->data = $this->$v->read(null, $id);
	}
	
	/****************User  Change Password  **********************/
	public function changepassword($id = null) {
		$this->checkPermission();
		$v = $this->_model();		
		$this->set('title_for_layout', __('Change  '.$v));
		
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid ' .$v), 'default', array('class' => 'error'));
			$this->redirect(array('action' => 'index'));
		}		
		if (!empty($this->request->data)) {
			
			if ($this->$v->save($this->request->data)) {
				$this->Session->setFlash(__('Password has been updated successfully.'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The password  could not be updated. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$this->request->data = $this->$v->read(null, $id);
	}
	// user login
	public function login() {
		$this->layout = 'login';
		
		if ($this->request->is('post')) {
			if ($this->request->data['User']['rememberMe'] == 1) {
				if ($this->Auth->login()) {
					$users = $this->Session->read('Auth.User');
					if($users['status'] == 1){				
						// user type rmp then goto video page
						$cookieTime = "1 week"; // You can do e.g: 1 week, 17 weeks, 14 days	 
						// remove "remember me checkbox"
						unset($this->request->data['User']['rememberMe']);							     
						// hash the user's password
						$this->request->data['User']['password'] = $this->Auth->password($this->request->data['User']['password']);							     
						// write the cookie
						$this->Cookie->write('rememberMe', $this->request->data['User'], true, $cookieTime);
						$this->_redirect_login($users['role'],$users['id']);
					}else{						
						$this->_login_fail();
					}
				} else {
					$this->Session->setFlash(__('Invalid email or password, try again'));
				}
			}else{
				if ($this->Auth->login()) {				
					$users = $this->Session->read('Auth.User');					
					if($users['status'] == 1){
						$this->_redirect_login($users['role'],$users['id']);						
					}else{						 
						$this->_login_fail();
					}
				} else {
					$this->Session->setFlash(__('Invalid email or password, try again'));
				}
			}
		}else{
			if($this->Session->read('Auth.User.id') != ''){				
				$users = $this->Session->read('Auth.User');
				$this->_redirect_login($users['role'],$users['id']);				
			}else{
				
			}
		}
	}
	/*  mpadmin user logout action*/
	
	function _redirect_login($role = null,$id = null){
		$v = $this->_model();
		$this->$v->updateAll(
			array('User.is_logged' => 1),
			array('User.id' => $id)
		);
		//$this->$v->saveField("is_logged",1);
		if($role =='student'){
			// if user type doctor then get appointment page
			$this->redirect(array('controller'=>'Students','action' => 'profile'));
		}else if($role == 'admin'){
			// if user type admin then get user list page
			$this->redirect(array('controller'=>'Users','action' => 'index'));						
		}
	}
	function _login_fail(){
		$this->Session->destroy();
		$this->Session->setFlash(__('Your Account Status is Inactive Please Wait For Approve  '));
		$this->redirect(array('controller'=>'users','action' => 'login'));
		
	}
	public function logout() {
		$this->layout = 'login';
		$v = $this->_model();		
		$users = $this->Session->read('Auth.User');
		$this->$v->updateAll(
			array('User.is_logged' => 0),
			array('User.id' => $users['id'])
		);
		$this->Auth->logout();
		$this->Cookie->delete('rememberMe');		
		$this->redirect(array($this->params['prefix']=>false,'controller'=>'Users','action' => 'login' ));
	}
	public function index(){
		
		$this->checkPermission();
		$this->set('title_for_layout', __('Your Home Page'));
		$this->loadModel('Patient');
		$v = $this->_model();
		$this->set('title_for_layout', __('User List'));
		$this->Patient->recursive = 0;
		$filter = array('conditions'=>array('User.role ='=> 'admin'),'limit'=>20,'order'=> 'User.id desc');		
		$this->paginate =$filter;
		$this->set('values', $this->paginate('User'));
		$this->view = 'userlists';		
		
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
	
		 
	public function getusername($doctor_id =null,$patient_id =null){		
		$this->loadModel('Patient');
		$patientNames = $this->Patient->find('first',array('fields'=>'name','conditions'=> array('Patient.id'=> $patient_id)));		
		$doctorNames = $this->User->find('first',array('fields'=>'name','conditions'=> array('User.id'=> $doctor_id)));		
		$userNames = array();
		$userNames['patient'] = $patientNames['Patient']['name'];
		$userNames['doctor'] = 	$doctorNames['User']['name'];
		return json_encode($userNames);
	}	
	
	public function reset_password($id = null,$key=null){		
		
		$this->set('title_for_layout', __('Reset Password'));
		if (!empty($this->request->data) and !empty($id)) {
			
			if (!$this->User->hasAny(array('User.resetkey' => $key,'User.id'=>$id))) {
				$this->Session->destroy();
				$this->Session->setFlash(__('Invalid Key'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'login'));
			}else{
				
				$this->request->data['User']['id'] = $id;
				if ($this->User->save($this->request->data)) {
					$activationKey = '';
					$this->User->saveField('resetkey', $activationKey);
					$this->Session->setFlash(__('Password has been Reset'), 'default', array('class' => 'success'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('Password could not be Reset. Please, try again.'), 'default', array('class' => 'error'));
				}
			}	
		}
		$this->layout = 'login';
		$this->request->data = $this->User->read(null, $id);
		$this->set(compact('id','key'));
	}

	public function forget_password(){
		$this->set('title_for_layout', __('Forgot your password'));
		if (!empty($this->request->data)) {			
			$this->User->recuesive = -1;
			$userName = $this->request->data['User']['username'];
			$answer = $this->request->data['User']['question'];
			$user = $this->User->find('first',array('conditions'=>array('username'=>$userName,
				'question'=>$answer)));
			if(!empty($user)){
				$this->User->id = $user['User']['id'];
				$activationKey = md5(uniqid());
				$this->User->saveField('resetkey', $activationKey);
				//$link = Router::url(array('controller' => 'users','action' => 'reset_password',$activationKey), true); 
				//$this->Session->setFlash(__('Please Check Your Mail'), 'default', array('class' => 'success'));
				$this->redirect(array('controller' =>'Users','action' => 'reset_password',$user['User']['id'],$activationKey));
			}else{
				$this->Session->setFlash(__('User Does not exist'), 'default', array('class' => 'success'));
				$this->redirect(array('controller' =>'Users','action' => 'forget_password'));
			}
			
		}
		$this->layout = 'login';
	}
	
	public function getlogin($deviceId =null, $pass = null){
		$this->layout = false;
		if($deviceId != '' && $pass !=''){
			$deviceId = $deviceId.'@yahoo.com';
			$pass = Security::hash($pass, NULL, true);			
			$user = $this->User->find('first',array('fields'=>array('id','role_id'),'conditions'=>array('User.email' => $deviceId, 'User.password'=> $pass)));		
			$userId = array();
			if(!empty($user)){
				$users['userId'] = $user['User']['id'];
				$users['role_id'] = $user['User']['role_id'];				
				return json_encode($users);
			}else{
				return 0;
			}
		}else{			
			return 0;
			
		}
		exit();
	}
	public function getuserinfo($userId =null){
		$this->layout = false;
		if($userId != ''){
			$user = $this->User->find('first',array('fields'=>array('name','id','gender','phone','role_id'),'conditions'=>array('User.id' => $userId)));
			if(!empty($user)){
			return json_encode($user);
			}else{
				return 0;
			}
		}else{
			return 0;
		}
		exit();
	}
	
	public function video($rmp_id = null,$doctor_id = null){
		$this->set(compact('rmp_id','doctor_id'));
	}
	
	public function unauthorized(){	
	$this->layout = 'login';	
		$this->set('title_for_layout', __('Unauthorized Access Area'));
	}
	
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
	
	

}
