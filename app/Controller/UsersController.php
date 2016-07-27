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
				
				$this->Session->setFlash(__('Success'), 'default', array('class' => 'success'));
				
				$this->redirect(array('action' => 'userlists'));
			} 
			else {
				$this->Session->setFlash(__($this->save_msg_error), 'default', array('class' => 'error'));
			}
		}
		$this->layout = 'default';
	}
	
	public function reset_password($id = null){
		
		if(empty($id)){
			$this->checkPermission();
		}
		$this->set('title_for_layout', __('Reset Password'));
		if (!empty($this->request->data) and !empty($id)) {
			if (!$this->User->hasAny(array('User.resetkey' => $id))) {
				$this->Session->destroy();
				$this->Session->setFlash(__('Invalid Key'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'login'));
			}else{
				$this->User->recuesive = -1;
				$user = $this->User->findByResetkey($id);
				$this->request->data['User']['id'] = $user['User']['id'];
				
				
				if ($this->User->save($this->request->data)) {
					$activationKey = '';
					$this->User->saveField('resetkey', $activationKey);
					$this->Session->setFlash(__('Password has been Reset'), 'default', array('class' => 'success'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('Password could not be Reset. Please, try again.'), 'default', array('class' => 'error'));
				}
			}	
		}else if(!empty($this->request->data) and empty($id)){
			
			$this->request->data['User']['id'] = $this->Session->read('Auth.User.id');
			//pr($this->request->data);
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('Password has been Reset'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Password could not be Reset. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$this->request->data = $this->User->read(null, $id);
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
			$photo = $this->ImageUpload->uploadImage('image', IMAGE_LOCATION1);				
			if(!empty($photo['image'])){		   
				$this->request->data['User']['image']= $photo['image'];
				$this->request->data['User']['thumbnail']= $photo['thumbnail'];
			}
			if ($this->$v->save($this->request->data)) {
				$this->Session->setFlash(__('The '.$v.' has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'userlists'));
			} else {
				$this->Session->setFlash(__('The '.$v.'  could not be saved. Please, try again.'), 'default', array('class' => 'error'));
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
				$this->Session->setFlash(__('The '.$v.' has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'userlists'));
			} else {
				$this->Session->setFlash(__('The '.$v.'  could not be saved. Please, try again.'), 'default', array('class' => 'error'));
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
		if($role ==3){
			// if user type doctor then get appointment page
			$this->redirect(array('controller'=>'Homes','action' => 'index'));
		}else if($role == 'admin'){
			// if user type admin then get user list page
			$this->redirect(array('controller'=>'Users','action' => 'userlists'));						
		}else{
			$this->redirect(array('controller'=>'Users','action' => 'appointment'));							
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
	public function userlists(){
		
		$this->checkPermission();
		$this->set('title_for_layout', __('Your Home Page'));
		$this->loadModel('Patient');
		$v = $this->_model();
		$this->set('title_for_layout', __('User List'));
		$this->Patient->recursive = 0;
		$filter = array('conditions'=>array('User.role ='=> 'admin'),'limit'=>20,'order'=> 'User.id desc');		
		$this->paginate =$filter;
		$this->set('values', $this->paginate('User'));		
		
	}
	
	public function index(){
		
		$this->redirect(array('action' => 'appointment'));
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
	
	public function forget_password(){
		$this->set('title_for_layout', __('Forgot your password'));
		if (!empty($this->request->data) && isset($this->request->data['User']['email'])) {
			
			$this->User->recuesive = -1;
			$user = $this->User->findByEmail($this->request->data['User']['email']);
			if (!isset($user['User']['id'])) {
				$this->Session->setFlash(__('Invalid Email.'), 'default', array('class' => 'error'));
				
			}
			$this->User->id = $user['User']['id'];
			$activationKey = md5(uniqid());
			$this->User->saveField('resetkey', $activationKey);
			$link = Router::url(array('controller' => 'users','action' => 'reset_password',$activationKey), true); 
			$to  = $this->request->data['User']['email'] ; // note the comma				

				// subject
				$subject = 'Forget password';

				// message
				 $message = '
				<html>
					<head>
  						<title>Forget Password</title>
					</head>
				<body>
 					 <p>'.Date('Y-m-d').'</p>
 					 <div><a href="'.$link.'"> Click Here for reset password </a> </div>
				</body>
				</html>
					';

			// To send HTML mail, the Content-type header must be set
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

			

			// Mail it
			mail($to, $subject, $message, $headers);
			$this->Session->setFlash(__('Please Check Your Mail'), 'default', array('class' => 'success'));
			$this->redirect(array('controller' =>'Homes','action' => 'index'));
			
		}
		//echo $activationKey = md5(uniqid());
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
		$this->set('title_for_layout', __('Unauthorized Access Area'));
	}
	
	// delete action
	public function delete($id) {
		$this->adminPermission();
		$v = $this->_model();
		if ($this->request->is('get')) {
		    throw new MethodNotAllowedException();
		}	    
		if ($this->$v->delete($id)) {
		    $this->Session->setFlash(
			__('This has been deleted.')
		    );
		    return $this->redirect(array('action' => 'userlists'));
		}
	}
	
	
	

}
