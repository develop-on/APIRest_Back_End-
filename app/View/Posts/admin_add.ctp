<!-- File: /app/View/Posts/add.ctp -->
<div class="users form">
<h1>Add Post</h1>
<?php
$user = $this->Session->read('Auth.User');
echo $this->Form->create('Post');
echo $this->Form->hidden('user_id', array('value' => $user['id']));
echo $this->Form->input('title');
echo $this->Form->input('body', array('rows' => '3'));
echo $this->Form->end('Add Post');
?>
</div>
<?php  echo $this->Html->link( "Back to the dashboard",   array('controller'=>'users','action'=>'admin_dashboard') );  ?>
<br/>

<br/><br/><br/>
<?php  echo $this->Html->link( "Logout",   array('controller'=>'users','action'=>'admin_logout') );  ?>
