<!-- app/View/Users/add.ctp -->
<div class="users form">

<?php echo $this->Form->create('User');?>
    <fieldset>
        <legend><?php echo __('Add User'); ?></legend>
        <?php echo $this->Form->input('username');
		echo $this->Form->input('email');
        echo $this->Form->input('password');
		echo $this->Form->input('password_confirm', array('label' => 'Confirm Password *', 'maxLength' => 255, 'title' => 'Confirm password', 'type'=>'password'));
        echo $this->Form->input('role', array(
            'options' => array( 'admin' => 'Admin', 'author' => 'Author')
        ));
		echo $this->Form->input('bio');
		
		echo $this->Form->submit('Add User', array('class' => 'form-submit',  'title' => 'Click here to add the user') ); 
?>
    </fieldset>
<?php echo $this->Form->end(); ?>
</div>
<?php  echo $this->Html->link( "Back to the dashboard",   array('controller'=>'users','action'=>'admin_dashboard') );  ?>
<br/>
<?php  echo $this->Html->link( "Back to users list",   array('controller'=>'users','action'=>'admin_index') );  ?>
<br/>
<?php  echo $this->Html->link( "Back to the main site",   array('controller'=>'posts','action'=>'index', 'admin'=>false) );  ?>
<br/>

<br/><br/><br/>
<?php  echo $this->Html->link( "Logout",   array('controller'=>'users','action'=>'admin_logout') );  ?>