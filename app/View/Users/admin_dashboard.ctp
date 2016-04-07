<!-- app/View/Users/add.ctp -->
<div class="users form">
<h1>CMS Admin Dashboard</h1>
<p>Welcome to the admin dashboard of the CMS. From here, there are many things that you can do. The following are all the things that you can do from the dashboard based on your role:
<ul>
<li><?php  echo $this->Html->link( "View Posts Listing",   array('controller'=>'posts','action'=>'index') );  ?></li>
<li><?php  echo $this->Html->link( "Create a new Post",   array('controller'=>'posts','action'=>'admin_add') );  ?></li>
<li><?php  echo $this->Html->link( "View Your Profile",   array('controller'=>'users','action'=>'admin_profile') );  ?></li>
<li><?php  echo $this->Html->link( "Edit Your Profile",   array('controller'=>'users','action'=>'admin_profile_edit') );  ?></li>
<?php 
$user = $this->Session->read('Auth.User');
if($user['role'] == 'admin'){ ?>
<li><?php  echo $this->Html->link( "View Active Users List",   array('controller'=>'users','action'=>'admin_index') );  ?></li>
<li><?php  echo $this->Html->link( "Create A New User",   array('controller'=>'users','action'=>'admin_add') );  ?></li>
<?php } ?>
<li><?php  echo $this->Html->link( "Logout",   array('controller'=>'users','action'=>'admin_logout') );  ?></li>
</ul>
</p>
</div>
<?php  echo $this->Html->link( "Back to the main site",   array('controller'=>'posts','action'=>'index', 'admin'=>false) );  ?>
<br/>

<br/><br/><br/>
<?php  echo $this->Html->link( "Logout",   array('controller'=>'users','action'=>'admin_logout') );  ?>
