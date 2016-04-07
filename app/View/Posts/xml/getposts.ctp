<?php
    App::uses('Xml', 'Utility');
	$posts = array('document' => $posts);
	$xmlObjetcs = Xml::formArray( array('posts' => '$posts'), array('format' => 'attribute')); 
	echo $xmlObjects->asXML();
?>