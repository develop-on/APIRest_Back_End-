<!-- File: /app/View/Posts/index.ctp -->
<div class="users form">
<h1>Blog posts</h1>
<p><?php echo $this->Html->link('Add Post', array('action' => 'add')); ?></p>
<table>
    <tr>
        <th>Id</th>
        <th><?php echo $this->Paginator->sort('title', 'Title');?></th>
		<th><?php echo $this->Paginator->sort('User.username', 'Author');?></th>
        <th><?php echo $this->Paginator->sort('created', 'Created');?></th>
		<th><?php echo $this->Paginator->sort('modified','Last Update');?></th>
		<th>Actions</th>
    </tr>

<!-- Here's where we loop through our $posts array, printing out post info -->

    <?php foreach ($posts as $post): ?>
    <tr>
        <td><?php echo $post['Post']['id']; ?></td>
        <td>
            <?php
                echo $this->Html->link(
                    $post['Post']['title'],
                    array('action' => 'edit', $post['Post']['id'])
                );
            ?>
        </td>
        <td ><?php echo $post['User']['username']; ?></td>
        <td ><?php echo $this->Time->niceShort($post['Post']['created']); ?></td>
		<td ><?php echo $this->Time->niceShort($post['Post']['modified']); ?></td>
		
		<td>
            <?php
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $post['Post']['id']),
                    array('confirm' => 'Are you sure?')
                );
            ?>
            <?php
                echo $this->Html->link(
                    'Edit', array('action' => 'edit', $post['Post']['id'])
                );
            ?>
        </td>
    </tr>
    <?php endforeach; ?>

</table>
<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
<?php echo $this->Paginator->numbers(array(   'class' => 'numbers'     ));?>
<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
</div>
<?php  echo $this->Html->link( "Back to the dashboard",   array('controller'=>'users','action'=>'admin_dashboard') );  ?>
<br/>
<?php  echo $this->Html->link( "Back to the main site",   array('controller'=>'posts','action'=>'index', 'admin'=>false) );  ?>
<br/>

<br/><br/><br/>
<?php  echo $this->Html->link( "Logout",   array('controller'=>'users','action'=>'admin_logout') );  ?>