<!-- app/View/Users/add.ctp -->
<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Edit Your Profile'); ?></legend>
        <?php 
		echo $this->Form->hidden('id', array('value' => $this->data['User']['id']));
		echo $this->Form->input('username', array( 'readonly' => 'readonly', 'label' => 'Usernames cannot be changed!'));
		echo $this->Form->input('email');
        echo $this->Form->input('password_update', array( 'label' => 'New Password (leave empty if you do not want to change)', 'maxLength' => 255, 'type'=>'password','required' => 0));
		echo $this->Form->input('password_confirm_update', array('label' => 'Confirm New Password *', 'maxLength' => 255, 'title' => 'Confirm New password', 'type'=>'password','required' => 0));
		echo $this->Form->input('role', array(
            'options' => array( 'admin' => 'Admin', 'author' => 'Author')
        ));
		echo $this->Form->input('bio');

		echo $this->Form->submit('Edit Profile', array('class' => 'form-submit',  'title' => 'Click here to edit your profile') ); 
?>
    </fieldset>
<?php echo $this->Form->end(); ?>
</div>
<?php  echo $this->Html->link( "Back to the dashboard",   array('controller'=>'users','action'=>'admin_dashboard') );  ?>
<br/>
<?php  echo $this->Html->link( "Back to the main site",   array('controller'=>'posts','action'=>'index', 'admin'=>false) );  ?>
<br/>

<br/><br/><br/>
<?php  echo $this->Html->link( "Logout",   array('controller'=>'users','action'=>'admin_logout') );  ?>