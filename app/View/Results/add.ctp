<div class="page-title">
    <h2><?php echo __('<span class="flash">Flashez</span> les résultats de l\'évaluation'); ?></h2>
</div>

<div class="well">
  Vous êtes sur le point de saisir les résultats de <code><?php echo $pupil['Pupil']['first_name'].' '.$pupil['Pupil']['name']; ?></code> pour l'évaluation <code><?php echo $items[0]['Evaluation']['title']; ?></code>.<br /><br />
  <span class="flash">Flashez</span> l'ensemble des résultats en utilisant la table de codage.<br /> A la fin de la saisie, les résultats sont automatiquement sauvegardés.
</div>

<?php

echo $this->Form->create('Results', array(
    'class' => 'form-horizontal',
    'inputDefaults' => array(
        'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
        'div' => array('class' => 'control-group'),
        'between' => '<div class="controls">',
        'after' => '</div>',
        'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline'))
        )
    )
);

foreach($items as $item){
	if(!isset($results[$item['Item']['id']]))
		$results[$item['Item']['id']] = '';
		
	echo $this->Form->input($item['Item']['id'], array(
		'between' => '<div class="controls"><div class="input-prepend"><span class="add-on"><i class="icon-barcode"></i></span>',
		'after' => "</div><p class='help-block'>".$item['Item']['title']."</p></div>",
		'class' => 'span1 result',
		'value' => $results[$item['Item']['id']],
	    'label' => array(
	        'text' => 'Résultat item '.($item['EvaluationsItem']['position']),
	        'class' => 'control-label'
	    )
	));
}


echo $this->Form->end(); 

?>