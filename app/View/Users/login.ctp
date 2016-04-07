<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Please enter your username and password'); ?></legend>
        <?php echo $this->Form->input('username');
        echo $this->Form->input('password');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Login')); ?>
<small>If you have just installed this application, <?php  echo $this->Html->link( "Click here to setup the CMS",   array('controller'=>'users','action'=>'setup') );  ?></small>
</div>
<?php  echo $this->Html->link( "Back to the main site",   array('controller'=>'posts','action'=>'index') );  ?>
<br/>