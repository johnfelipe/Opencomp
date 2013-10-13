<?php
    $id = $data['Competence']['id'];
?>

<a href="#" id="<?php echo $id; ?>" class="jstree-toggle" style="color:grey;"><?php echo($data['Competence']['title']); ?> </a>

<?php if(AuthComponent::user('role') === 'admin'){
	echo $this->Html->link(
		'<i class="icon-arrow-up"></i>', 
		array(
			'controller' => 'competences', 
			'action' => 'moveup',
			$id
		), 
		array(
			'escape' => false,
			'style' => 'color:grey;'
		)
	);
	
	echo $this->Html->link(
		' <i class="icon-arrow-down"></i>', 
		array(
			'controller' => 'competences', 
			'action' => 'movedown',
			$id
		), 
		array(
			'escape' => false,
			'style' => 'color:grey;'
		)
	);
} ?>

<?php if(AuthComponent::user('role') === 'admin'){
	echo '<ul><li>';
	
	echo $this->Html->link(
		' <i class="icon-plus"></i> '.__('créer une nouvelle compétence dans ').$data['Competence']['title'], 
		array(
			'controller' => 'competences', 
			'action' => 'add',
			$id
		), 
		array(
			'escape' => false,
			'style' => 'color:green;'
		)
	);
	
	echo '</li></ul>';
} ?>