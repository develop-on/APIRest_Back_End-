<?php
// Controller/RecipesController.php
class RestPostsController extends AppController {

    public $uses = array('Post');
	public $helpers = array('Html', 'Form');
	public $components = array('RequestHandler');

    public function index() {
        $posts = $this->Post->find('all');
        echo json_encode(compact('posts'));
		$this->autoRender = false;

    }

    public function view($id) {
        $posts = $this->Post->findById($id);
        echo json_encode(compact('posts'));
		$this->autoRender = false;
    }

    public function add() {
        $this->Post->create();
        if ($this->Post->save($this->request->data)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        echo json_encode(compact('messages'));
		$this->autoRender = false;
    }

    public function edit($id) {
        $this->Post->id = $id;
        if ($this->Post->save($this->request->data)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
    }

    public function delete($id) {
        if ($this->Post->delete($id)) {
            $message = 'Deleted';
        } else {
            $message = 'Error';
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
    }
}
?>