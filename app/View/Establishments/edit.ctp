<div class="page-title">
    <h2><?php echo __('Modifier un établissement'); ?></h2>
    <?php echo $this->Html->link('<i class="icon-arrow-left"></i> '.__('académie de l\'établissement'), '/academies/view/'.$this->data['Academy']['id'], array('class' => 'ontitle btn', 'escape' => false)); ?>
</div>

<?php 

echo $this->Form->create('Establishment', array(
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

echo $this->Form->input('id');

echo $this->Form->input('name', array(
    'label' => array(
        'text' => 'Nom de l\'établissement',
        'class' => 'control-label'
    )
)); 

echo $this->Form->input('address', array(
    'label' => array(
        'text' => 'Adresse',
        'class' => 'control-label'
    )
)); 

echo $this->Form->input('postcode', array(
    'label' => array(
        'text' => 'Code postal',
        'class' => 'control-label'
    )
)); 

echo $this->Form->input('town', array(
    'label' => array(
        'text' => 'Ville',
        'class' => 'control-label'
    )
)); 

echo $this->Form->input('user_id', array(
    'class'=>'chzn-select',
    'style'=>'width : 220px;',
    'label' => array(
        'text' => 'Direction assurée par',
        'class' => 'control-label'
        )
    )
);

echo $this->Form->input('academy_id', array(
    'class'=>'chzn-select',
    'style'=>'width : 220px;',
    'label' => array(
        'text' => 'Académie',
        'class' => 'control-label'
        )
    )
);

?>

<div class="form-actions">
     <?php echo $this->Form->button('Enregistrer les modifications', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>        
</div>