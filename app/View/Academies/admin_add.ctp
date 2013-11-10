<div class="page-title">
    <h2><?php echo __('Ajouter une académie'); ?></h2>
    <?php echo $this->Html->link('<i class="icon-arrow-left"></i> '.__('retour aux académies'), 'index', array('class' => 'ontitle btn', 'escape' => false)); ?>
</div>

<?php 

echo $this->Form->create('Academy', array(
    'class' => 'form-horizontal',
	)
);

echo $this->Form->input('name', array(
    'label' => array(
        'text' => 'Nom de l\'académie',
        'class' => 'control-label'
    )
)); 

echo $this->Form->input('type', array(
    'type' => 'select',
    'options' => array('0'=>'Académie','1'=>'Sous-rectorat'),
    'label' => array(
        'text' => 'Type d\'académie',
        'class' => 'control-label'
    )
)); 

echo $this->Form->input('User', array(
    'class'=>'chzn-select',
    'data-placeholder'=>'Ajoutez un responsable ...',
    'style'=>'width : 300px;',
    'label' => array(
        'text' => 'Responsable(s) de l\'académie',
        'class' => 'control-label'
        )
    )
);
    
?>

<div class="form-actions">
     <?php echo $this->Form->button('Enregistrer les modifications', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>        
</div>

<?php echo $this->Form->end(); ?>