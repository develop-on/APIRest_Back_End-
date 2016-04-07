<?php
class Post extends AppModel {

	public $belongsTo = 'User';

	// function to determine if the provided user is the owner of the provided post
	// copied as-is from http://book.cakephp.org/2.0/en/tutorials-and-examples/blog-auth-example/auth.html
	public function isOwnedBy($post, $user) {
		return $this->field('id', array('id' => $post, 'user_id' => $user)) !== false;
	}
}