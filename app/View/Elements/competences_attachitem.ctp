<?php
    $id = $data['Competence']['id'];
?>

<a href="#" id="<?php echo $id; ?>" class="jstree-toggle" style="color:grey;"><?php echo($data['Competence']['title']); ?> </a>

<?php if(empty($data['ChildCompetence'])){
	echo $this->Html->link(
		' <i class="icon-plus"></i> '.__('nouvel item'), 
		array(
			'controller' => 'evaluationsitems', 
			'action' => 'additem',
			'evaluation_id' => $evaluation_id,
			'competence_id' => $id
		), 
		array(
			'escape' => false,
			'style' => 'color:green;'
		)
	);
	if(isset($items[$id])){
		echo '<ul>';
		foreach($items[$id] as $item_id => $item_title){			
			echo '<li>';
			echo $this->Html->link($item_title, '#');
			echo $this->Html->link(
				' <i class="icon-ok"></i> '.__('ajouter à l\'évaluation'), 
				array(
					'controller' => 'evaluationsitems', 
					'action' => 'attachitem',
					'evaluation_id' => $evaluation_id,
					'item_id' => $item_id
				), 
				array(
					'escape' => false,
					'style' => 'color:steelblue;'
				)
			);
			echo '</li>';
		}	
		echo '</ul>';	
	}	
}
?>
