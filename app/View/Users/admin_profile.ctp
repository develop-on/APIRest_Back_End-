<!-- app/View/Users/add.ctp -->
<div class="users form">

<h1>The following are your profile settings</h1>
<ul>
	<li><strong>username</strong>: <?php echo $user['User']['username'] ?></li>
	<li><strong>email</strong>: <?php echo $user['User']['email'] ?></li>
	<li><strong>bio</strong>: <?php echo $user['User']['bio'] ?></li>
</ul>
<br/>
<?php  echo $this->Html->link( "Edit Your Profile",   array('controller'=>'users','action'=>'admin_profile_edit') );  ?>
</div>
<?php  echo $this->Html->link( "Back to the dashboard",   array('controller'=>'users','action'=>'admin_dashboard') );  ?>
<br/>
<?php  echo $this->Html->link( "Back to the main site",   array('controller'=>'posts','action'=>'index', 'admin'=>false) );  ?>
<br/>

<br/><br/><br/>
<?php  echo $this->Html->link( "Logout",   array('controller'=>'users','action'=>'admin_logout') );  ?>