<div class="users form">

<h1>My Super Blog</h1>
<p>Welcome to the awesomest blog on the Internet. Check some of our blog postings below...</p>
<table>
    <tr>
        <th>Id</th>
        <th><?php echo $this->Paginator->sort('title', 'Title');?></th>
        <th><?php echo $this->Paginator->sort('created', 'Created');?></th>
    </tr>

    Here is where we loop through our $posts array, printing out post info

    <?php foreach ($posts as $post): ?>
    <tr>
        <td><?php echo $post['Post']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($post['Post']['title'], array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?>
        </td>
        <td><?php echo $this->Time->niceShort($post['Post']['created']); ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($post); ?>
</table>
<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
<?php echo $this->Paginator->numbers(array(   'class' => 'numbers'     ));?>
<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>

</div>

<?php  echo $this->element('admin_navbar'); ?>