<!-- File: /app/View/Posts/edit.ctp -->
<div class="users form">
<h1>Edit Post</h1>
<?php
echo $this->Form->create('Post');
echo $this->Form->input('title');
echo $this->Form->input('body', array('rows' => '3'));
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Save Post');
?>
</div>
<?php  echo $this->Html->link( "Back to the dashboard",   array('controller'=>'users','action'=>'admin_dashboard') );  ?>
<br/>
<?php  echo $this->Html->link( "Display all Posts",   array('controller'=>'posts','action'=>'admin_index') );  ?>
<br/>
<br/><br/><br/>
<?php  echo $this->Html->link( "Logout",   array('controller'=>'users','action'=>'admin_logout') );  ?>