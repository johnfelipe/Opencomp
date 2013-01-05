<div class="page-title">
    <h2><?php echo __('Ajouter une évaluation'); ?></h2>
    <?php echo $this->Html->link('<i class="icon-arrow-left"></i> '.__('retour à la classe'), '/classrooms/viewtests/'.$classroom_id, array('class' => 'ontitle btn', 'escape' => false)); ?>
</div>

<?php

echo $this->Form->create('Evaluation', array('class' => 'form-horizontal'));

echo $this->Form->input('title', array(
    'label' => 'Titre de l\'évaluation'
    )
);

echo $this->Form->hidden('classroom_id', array('value' => $classroom_id));

echo $this->Form->input('user_id', array(
    'class'=>'chzn-select',
    'style'=>'width : 220px;',
    'label' => array(
        'text' => 'Évalué par',
        'class' => 'control-label'
        )
    )
);

echo $this->Form->input('period_id', array(
    'class'=>'chzn-select',
    'style'=>'width : 220px;',
    'default'=>$current_period,
    'after' => '<span style="font-style: italic; margin-top:10px; margin-bottom:20px;" class="help-block"><i class="icon-lightbulb"></i> '.__("La période courante de l'établissement a été automatiquement sélectionnée.").'</span>',
    'label' => array(
        'text' => 'Période associée',
        'class' => 'control-label'
        )
    )
);

foreach($pupils as $class => $list){
	$btn_nvx[$class] = '<div class="btn-group">';
	$btn_nvx[$class] .= $this->Form->button('Tous les '.$class, array('class'=> 'selectPupils btn btn-mini', 'value'=>$class, 'escape'=>false));
	$btn_nvx[$class] .= $this->Form->button('<i class="icon-remove"></i>', array('class'=> 'unselectPupils btn btn-mini', 'value'=>$class, 'escape'=>false));
	$btn_nvx[$class] .= '</div>';
}

$btn_nvx_string = '';

foreach($btn_nvx as $btn)
	$btn_nvx_string .= $btn;


echo $this->Form->input('Pupil', array(
    'class'=>'chzn-select',
    'data-placeholder' => 'Cliquez ici ou sur les boutons de niveaux pour ajouter des élèves.',
    'after' => '<div class="help-block btn-toolbar">'.$btn_nvx_string.'</div>',
    'style'=>'width : 550px;',
    'label' => array(
        'text' => 'Élèves ayant passé l\'évaluation',
        'class' => 'control-label'
        )
    )
);



?>

<div class="form-actions">
    <?php echo $this->Form->submit('Enregistrer cette évaluation', array(
        'div' => false,
        'class' => 'btn btn-primary',
    )); ?>
</div>

<?php echo $this->Form->end(); ?>
