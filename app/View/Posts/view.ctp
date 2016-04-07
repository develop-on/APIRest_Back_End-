<!-- File: /app/View/Posts/view.ctp -->
<div class="users form">
<h1><?php echo h($post['Post']['title']); ?></h1>

<h3><small>Created: <?php echo $this->Time->niceShort($post['Post']['created']); ?> by <?php echo h($post['User']['username']); ?></small></h3>

<p><?php echo h($post['Post']['body']); ?></p>

</div>

<?php 
echo $this->element('admin_navbar');
?>