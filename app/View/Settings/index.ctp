<div class="page-title">
    <h2><?php echo __('Paramètres de l\'application'); ?></h2>
</div>

<?php 

echo $this->Form->create('Settings', array(
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

echo $this->Form->input('Setting.currentYear', array(
	'type' => 'select',
	'class'=>'chzn-select',
    'options' => $years,
    'selected' => $currentYear,
    'label' => array(
        'text' => 'Année scolaire courante',
        'class' => 'control-label'
    )
)); 

echo $this->Form->input('Setting.lastYear', array(
	'type' => 'select',
	'class'=>'chzn-select',
    'options' => $years,
    'selected' => $lastYear,
    'label' => array(
        'text' => 'Année scolaire précédente',
        'class' => 'control-label'
    )
)); 

?>

<div class="form-actions">
     <?php echo $this->Form->button('Enregistrer les paramètres', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>        
</div>

<?php echo $this->Form->end(); ?>