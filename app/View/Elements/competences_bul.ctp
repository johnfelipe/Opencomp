<?php echo($data['Competence']['title']); debug($data); ?>

<?php if(empty($data['ChildCompetence'])){
	
	if(!empty($data['Item'])){
		echo '<ul>';
		foreach($data['Item'] as $item){			
			echo '<li>';
			echo $this->Html->link($item['title'], '#');
			echo '</li>';
		}	
		echo '</ul>';	
	}	
}
?>
