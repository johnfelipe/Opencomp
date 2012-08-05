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
	if(!empty($data['Item'])){
		echo '<ul>';
		foreach($data['Item'] as $item){			
			echo '<li>';
			if($item['type'] == 1) 
				echo '<span class="label label-important">EN</span>';
			elseif($item['type'] == 2)
				echo '<span class="label label-info">ET</span>';
			elseif($item['type'] == 3)
				echo '<span class="label label-success">PE</span>';
			echo $this->Html->link($item['title'], '#');
			echo $this->Html->link(
				' <i class="icon-ok"></i> '.__('ajouter à l\'évaluation'), 
				array(
					'controller' => 'evaluationsitems', 
					'action' => 'attachitem',
					'evaluation_id' => $evaluation_id,
					'item_id' => $item['id']
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
