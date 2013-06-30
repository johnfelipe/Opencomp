<?php
    $id = $data['Competence']['id'];
?>

<a href="#" id="<?php echo $id; ?>" class="jstree-toggle" style="color:grey;"><?php echo($data['Competence']['title']); ?> </a>

<?php if(empty($data['ChildCompetence'])){
	echo $this->Html->link(
		' <i class="icon-plus"></i> '.__('nouvel item'), 
		array(
			'controller' => 'evaluationsItems', 
			'action' => 'addunrateditem',
			'competence_id' => $id,
			'classroom_id' => $this->data['Classroom']['classroom_id'],
			'period_id' => $this->data['Classroom']['period_id']
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
				echo '<span class="label label-important" style="margin-right:5px;">EN</span>';
			elseif($item['type'] == 2)
				echo '<span class="label label-info" style="margin-right:5px;">ET</span>';
			elseif($item['type'] == 3)
				echo '<span class="label label-success" style="margin-right:5px;">PE</span>';
			foreach($item['Level'] as $level){
				echo '<span class="label" style="margin-right:5px;">'.$level['title'].'</span>';
			}
			echo $this->Html->link($item['title'], '#');
			echo $this->Html->link(
				' <i class="icon-ok"></i> '.__('choisir'), 
				array(
					'controller' => 'evaluationsItems', 
					'action' => 'attachunrateditem',
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
