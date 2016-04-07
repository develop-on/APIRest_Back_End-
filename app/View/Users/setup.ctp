<!-- app/View/Users/add.ctp -->
<div class="users form">

<small>This page allows you to create your first administrator for the CMS so that you can then login to the system</small>
<?php echo $this->Form->create('User');?>
    <fieldset>
        <legend><?php echo __('Create The First Administrator'); ?></legend>
        <?php echo $this->Form->input('username');
		echo $this->Form->input('email');
        echo $this->Form->input('password');
		echo $this->Form->input('password_confirm', array('label' => 'Confirm Password *', 'maxLength' => 255, 'title' => 'Confirm password', 'type'=>'password'));
        echo $this->Form->input('role', array(
            'options' => array( 'admin' => 'Admin')
        ));
		
		echo $this->Form->submit('Add User', array('class' => 'form-submit',  'title' => 'Click here to add the user') ); 
?>
    </fieldset>
<?php echo $this->Form->end(); ?>
</div>
<?php  echo $this->Html->link( "Back to the main site",   array('controller'=>'posts','action'=>'index') );  ?>
<br/>

