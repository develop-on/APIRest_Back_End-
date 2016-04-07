<?php
class PostsController extends AppController {
    
	public $helpers = array('Html', 'Form');
	public $components = array('RequestHandler');
	
	public $paginate = array(
        'limit' => 25,
        'conditions' => array('status' => '1'),
    	'order' => array('Post.created' => 'desc' ) 
    );
	
	public function isAuthorized($user = NULL) {

		// Unless they are an admin, only the owner of a post can edit or delete it
		if (in_array($this->action, array('admin_edit', 'admin_delete')) && ($this->Auth->user('role') != 'admin')) {
			
			$postId = (int) $this->request->params['pass'][0];
			if($this->Post->isOwnedBy($postId,$this->Auth->user('id'))){
				return true;
			}
		}

		return parent::isAuthorized($user);
	}

    public function getposts() {
	   
	  	$this->set('posts', $this->Post->find('all'));
		$this->set('_serialize', array('posts')); 
	}
	
	public function index() {
        $this->paginate = array(
			'limit' => 10,
			'order' => array('Post.created' => 'asc' ),
			'conditions' => array('Post.status' => 1),
		);
		$posts = $this->paginate('Post');
		$this->set(compact('posts'));
	}
    
    public function view($id = null) {
    	if (!$id) {
    		throw new NotFoundException(__('Invalid post'));
    	}
    
    	$post = $this->Post->findById($id);
    	if (!$post) {
    		throw new NotFoundException(__('Invalid post'));
    	}
    	$this->set('post', $post);
    }
    
    public function admin_index() {
    	$this->paginate = array(
			'limit' => 10,
			'order' => array('Post.created' => 'asc' ),
			'conditions' => array('Post.status' => 1),
		);
		$posts = $this->paginate('Post');
		$this->set(compact('posts'));
    }
    
    public function admin_add() {
    	if ($this->request->is('post')) {
			$this->Post->create();
    		if ($this->Post->save($this->request->data)) {
    			$this->Session->setFlash(__('Your post has been created.'));
    			return $this->redirect(array('action' => 'index'));
    		}
    		$this->Session->setFlash(__('Unable to add your post.'));
    	}
    }
    
    public function admin_edit($id = null) {
		if($this->isAuthorized()){
			if (!$id) {
				throw new NotFoundException(__('Invalid post'));
			}
		
			$post = $this->Post->findById($id);
			if (!$post) {
				throw new NotFoundException(__('Invalid post'));
			}
		
			if ($this->request->is(array('post', 'put'))) {
				$this->Post->id = $id;
				if ($this->Post->save($this->request->data)) {
					$this->Session->setFlash(__('Your post has been updated.'));
					return $this->redirect(array('action' => 'admin_index'));
				}
				$this->Session->setFlash(__('Unable to update your post.'));
			}
		
			if (!$this->request->data) {
				$this->request->data = $post;
			}
		}
    }
	
	public function admin_delete($id) {
		if($this->isAuthorized()){
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}
			
			$this->Post->read(null, $id);
			$this->Post->set(array(
				'status' => 0
			));
			;
			
			if( $this->Post->save() ){
				$this->Session->setFlash(
					__('The post with id: %s has been deleted.', h($id))
				);
				return $this->redirect(array('controller' => 'posts','action' => 'admin_index'));
			}
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}
			
			$this->Post->read(null, $id);
			$this->Post->set(array(
				'status' => 0
			));
			;
			
			if( $this->Post->save() ){
				$this->Session->setFlash(
					__('The post with id: %s has been deleted.', h($id))
				);
				return $this->redirect(array('controller' => 'posts','action' => 'admin_index'));
			}
		}else{
			$this->Session->setFlash(__('You do not have permission to do this'));
			return $this->redirect(array('action' => 'admin_index'));
		}
	}
}