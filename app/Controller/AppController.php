<?php
App::uses('Controller', 'Controller');

class AppController extends Controller {
    
    /* load component  */
    public $components = array('Cookie','Session',	
	    'Auth' => array(
            'authenticate' => array(
                'Form' => array(
                   	'fields' => array('username' => 'username', 'password' => 'password'),
    				
                )
            ),            
        )
    );
   //set an alias for the newly created helper: Html<->MyHtml
    public $helpers = array('Html');
    public function beforeFilter() {
    	$this->loadModel('Student','Notice'); // If the User model is not loaded already
        $new_students = $this->Student->find('all', array('conditions'=>array('Student.is_new'=>0),'order'=>'Student.id DESC'));
        $new_students_count = $this->Student->find('count', array('conditions'=>array('Student.is_new'=>0)));
        
        $this->set(compact('new_students','new_students_count'));
        $this->Cookie->httpOnly = true;
        $currency = $this->currency();
        if (!$this->Auth->loggedIn() && $this->Cookie->read('rememberMe')) {
            $cookie = $this->Cookie->read('rememberMe');     
            $this->loadModel('User'); // If the User model is not loaded already
            $user = $this->User->find('first', array(
                    'conditions' => array(
                        'User.username' => $cookie['username'],
                        'User.password' => $cookie['password']
                )
            ));
         
            if ($user && !$this->Auth->login($user['User'])) {
                $this->redirect('/users/logout'); // destroy session & cookie
            }
         }
     $this->optionLists();
	$this->createArrayValue();
	$param = $this->request->params;
	$action = $param['action'];
		
	if($this->params['prefix'] == ''){
	    $this->Auth->allow();
	}elseif($this->params['prefix'] == 'mpadmin'){			
	    if($this->Session->read('Auth.User')){
		if($this->Auth->user('role_id') == 1){
		    $this->Auth->allow();
		}else{
		    $this->Session->destroy();
			$this->Session->setFlash(__('Your are not authorized here  '));
			$this->redirect(array('prefix'=>false,'controller'=>'users','action' => 'login'));
                    }
	    }else{
		$this->Auth->allow('mpadmin_login');
	    }
	}	
	parent::beforeFilter();
	
	$this->set(compact('currency'));
    }        
    
    function _model(){		        
        $model =  Inflector::singularize($this->request->params['controller']);		  
        $v = ucfirst($model);
        return $v;
    }
    
    function currency(){
	return 'BDT';
    }
    
    function doctorcheckPermission(){
	if (!$this->Auth->login()){
	    $this->redirect(array('controller'=>'Users','action' => 'login'));
	}
    }
    
    function checkPermission(){
		if (!$this->Auth->login()){            
		    $this->redirect(array('controller'=>'Users','action' => 'login'));            
		}
		else if($this->Session->read('Auth.User.role') !='admin'){            
	        $this->Session->setFlash(__(' Unauthorized Access' ), 'default', array('class' => 'success'));			
	        $this->redirect(array('controller'=>'Users','action' => 'unauthorized'));
	            
	    }
    }
    
     function studentPermission(){
	if (!$this->Auth->login()){
            
	    $this->redirect(array('controller'=>'Users','action' => 'login'));
            
	}else if($this->Session->read('Auth.User.role') !='student'){
            
            $this->Session->setFlash(__(' Unauthorized Access' ), 'default', array('class' => 'success'));			
            $this->redirect(array('controller'=>'Users','action' => 'unauthorized'));
            
        }
    }
    
    public function dateformat($date = null){
	return $date = str_replace('/', '-',$date);
		
    }
    public function optionLists(){
	    $boards =  array('Dhaka' =>'Dhaka' ,'Jessore'=>'Jessore','Barisal'=>'Barisal','Comilla'=>'Comilla',
	    	'Rajshahi'=>'Rajshahi','Chittagong'=>'Chittagong','Rangpur'=>'Rangpur');
	    $branches = array('Shantinagar'=>'Shantinagar');
	    $year_of_passing = array('2010'=>'2010','2011'=>'2011','2012'=>'2012','2013'=>'2013','2014'=>'2014','2015'=>'2015','2016'=>'2016');
	    $occupations = array('Teacher'=>'Teacher','Govt Service Holder' => 'Govt Service Holder','Private Service Holder'=>'Private Service Holder',
	    	'Others'=>'Others');
	    $this->set(compact('boards','branches','year_of_passing','occupations'));
	}
    
    public function createArrayValue(){
	
	$gender = array();	
	$gender[1] = 'Male';
	$gender[2] = 'Female';
	
	$respiration = array();
	$respiration[1] = 'High';
	$respiration[2] = 'Normal';
	$respiration[3] = 'Low';
	
	$appearance = array();
	$appearance[1] = 'Normal';
	$appearance[2] = 'Ill-Looking';
	$appearance[3] = 'Toxic';
	
	$color = array();
	$color[1] = 'Normal';
	$color[2] = 'Jaundiced(Yellow)';
	$color[3] = 'Anemic(Pale)';
	$color[4] = 'Cyanosis(Bluish)';
	
	$consciousness= array();
	$consciousness[1] ='Conscious';
	$consciousness[2] ='Semi-Conscious';
	$consciousness[3] = 'Unconscious';
	
	$edema= array();
	
	$edema[1] ='Absent';
	$edema[2] ='One Leg';
	$edema[3] ='Both Legs';
	$edema[4] ='Face (Near Eyes)';
	$edema[5] ='Abdomen';
	$edema[6] ='Reproductive organs';
	$edema[7] ='Others';
	
	$dehydration= array();
	$ari = array();
	$dehydration[1] ='Absent';
	$dehydration[2] ='Present';
	$ari[1] ='Present';
	$ari[2] ='Absent';
	
	
	$this->set(compact('ari','gender','respiration','appearance','color','consciousness','edema','dehydration'));
        
    }
}
