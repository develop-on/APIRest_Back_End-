<?php
// app/Controller/UsersController.php
App::uses('AppController', 'Controller');

class UsersController extends AppController {

	public $paginate = array(
        'limit' => 25,
        'conditions' => array('status' => '1'),
    	'order' => array('User.username' => 'asc' ) 
    );
	
    public function beforeFilter() {
        parent::beforeFilter();
        
        // do any additional beforeFilter stuff after calling the parent function
    }


	public function login() {
		
		//if already logged-in, redirect
		if($this->Session->check('Auth.User')){
			return $this->redirect(array('action' => 'dashboard'));		
		}
		
		// if we get the post information, try to authenticate
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
			
				$status = $this->Auth->user('status');
				if($status != 0){
					$this->Session->setFlash(__('Welcome, '. $this->Auth->user('username')));
					return $this->redirect($this->Auth->redirectUrl());
				}else{
					// this is a deleted user
					$this->Auth->logout();
					$this->Session->setFlash(__('Invalid username or password - This user appears to be deleted...'));
				}
			} else {
				$this->Session->setFlash(__('Invalid username or password'));
			}
		} 
	}
	
	public function setup() {
		// check to see if we already have a user created...
		$firstUser = $this->User->find('first');
		if(!empty($firstUser)){
			// if we alredy have a user, we can no longer show this page but we should let the user know
			$this->Session->setFlash(__('The Initial administrator has already been setup. Please login instead.'));
			if($this->Auth->loggedIn()){
				return $this->redirect(array('action' => 'admin_dashboard'));
			}else{
				return $this->redirect(array('action' => 'login'));
			}
		}
		
		if ($this->request->is('post')) {
	
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The initial adminstrator has been created succesfully! You can login now.'));
				return $this->redirect(array('action' => 'login'));
			} else {
				$this->Session->setFlash(__('The initial user could not be created. Please, try again.'));
			}
		}
	}

	public function admin_logout() {
		return $this->redirect($this->Auth->logout());
	}
	
	public function admin_dashboard() {
		// nothing done here, everything happens in the view
	}
	
	public function admin_profile(){
		// nothing done here, everything happens in the view
		$user = $this->User->findById($this->Auth->user('id'));
		$this->set(compact('user'));
	}
	
	public function admin_profile_edit(){
		$user = $this->User->findById($this->Auth->user('id'));
		
		if ($this->request->is('post') || $this->request->is('put')) {
			$this->User->id = $this->Auth->user('id');
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('Your profile data has been updated'));
				return $this->redirect(array('action' => 'admin_profile_edit'));
			}else{
				$this->Session->setFlash(__('Unable to update your profile.'));
			}
		}
		
		if (!$this->request->data) {
			$this->request->data = $user;
		}
	}

    public function admin_index() {
		$this->paginate = array(
			'limit' => 10,
			'order' => array('User.username' => 'asc' ),
			'conditions' => array('User.status' => 1),
		);
		$users = $this->paginate('User');
		$this->set(compact('users'));
    }
    
    public function admin_add() {
		if($this->isAuthorized()){
			if ($this->request->is('post')) {
					
				$this->User->create();
				if ($this->User->save($this->request->data)) {
					$this->Session->setFlash(__('The user has been created'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The user could not be created. Please, try again.'));
				}	
			}
		}else{
			$this->Session->setFlash(__('You do not have permission to do this'));
			return $this->redirect(array('action' => 'admin_dashboard'));
		}
    }

    public function admin_edit($id = null) {
		if($this->isAuthorized()){
		    if (!$id) {
				$this->Session->setFlash('Please provide a user id');
				return $this->redirect(array('action'=>'index'));
			}

			$user = $this->User->findById($id);
			if (!$user) {
				$this->Session->setFlash('Invalid User ID Provided');
				return $this->redirect(array('action'=>'index'));
			}

			if ($this->request->is('post') || $this->request->is('put')) {
				$this->User->id = $id;
				if ($this->User->save($this->request->data)) {
					$this->Session->setFlash(__('The user has been updated'));
					return $this->redirect(array('action' => 'edit', $id));
				}else{
					$this->Session->setFlash(__('Unable to update your user.'));
				}
			}

			if (!$this->request->data) {
				$this->request->data = $user;
			}
		}else{
			$this->Session->setFlash(__('You do not have permission to do this'));
			return $this->redirect(array('action' => 'admin_dashboard'));
		}
    }

    public function admin_delete($id = null) {
		
		if($this->isAuthorized()){
		
			if (!$id) {
				$this->Session->setFlash('Please provide a user id');
				return $this->redirect(array('action'=>'admin_dashboard'));
			}
			
			$this->User->id = $id;
			if (!$this->User->exists()) {
				$this->Session->setFlash('Invalid user id provided');
				return $this->redirect(array('action'=>'admin_dashboard'));
			}
			if ($this->User->saveField('status', 0)) {
				$this->Session->setFlash(__('User deleted'));
				return $this->redirect(array('action' => 'admin_dashboard'));
			}
			$this->Session->setFlash(__('User was not deleted'));
			return $this->redirect(array('action' => 'admin_dashboard'));
		}else{
			$this->Session->setFlash(__('You do not have permission to do this'));
			return $this->redirect(array('action' => 'admin_dashboard'));
		}
    }
}

?>