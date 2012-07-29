<div class="page-title">
    <h2><?php echo __('Ajouter une classe'); ?></h2>
    <?php echo $this->Html->link('<i class="icon-arrow-left"></i> '.__('retour à l\'établissement'), 'index', array('class' => 'ontitle btn', 'escape' => false)); ?>
</div>

<?php 

echo $this->Form->create('Classroom', array(
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

echo $this->Form->input('title', array(
    'label' => array(
        'text' => 'Nom de la classe',
        'class' => 'control-label'
    )
)); 

echo $this->Form->input('user_id', array(
	'class'=>'chzn-select',
    'label' => array(
        'text' => 'Enseignant titulaire',
        'class' => 'control-label'
    )
)); 

echo $this->Form->input('year_id', array(
    'label' => array(
        'text' => 'Année scolaire',
        'class' => 'control-label'
    )
)); 

echo $this->Form->input('establishment_id', array(
	'class'=>'chzn-select',
	'default'=>$establishment_id,
    'label' => array(
        'text' => 'Établissement scolaire',
        'class' => 'control-label'
    )
)); 

echo $this->Form->input('User', array(
	'class'=>'chzn-select',
	'data-placeholder'=>'Int extérieurs, mis-tps, décharge ...',
    'label' => array(
        'text' => 'Intervenants classe',
        'class' => 'control-label'
    )
)); 

?>

<div class="form-actions">
     <?php echo $this->Form->button('Enregistrer les modifications', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>        
</div>

<?php echo $this->Form->end(); ?>