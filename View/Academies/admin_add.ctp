<div class="page-title">
    <h2><?php echo __('Añadir un Colegio'); ?></h2>
    <?php echo $this->Html->link('<i class="icon-arrow-left"></i> '.__('Volver a los colegios'), 'index', array('class' => 'ontitle btn btn-default', 'escape' => false)); ?>
</div>

<?php 

echo $this->Form->create('Academy', array(
    'inputDefaults' => array(
        'div' => 'form-group',
        'label' => array(
            'class' => 'col col-md-2 control-label'
        ),
        'wrapInput' => 'col col-md-3',
        'class' => 'form-control'
    ),
    'class' => 'form-horizontal'
));

echo $this->Form->input('name', array(
    'label' => array(
        'text' => 'Nombre del Colegio'
    )
)); 

echo $this->Form->input('type', array(
    'type' => 'select',
    'options' => array('0'=>'Académie','1'=>'Rector Adjunto'),
    'label' => array(
        'text' => 'Tipo de Colegio'
    )
)); 

echo $this->Form->input('User', array(
    'class'=>'chzn-select form-control',
    'data-placeholder'=>'Añadir un responsable ...',
    'label' => array(
        'text' => 'Responsables del Colgeio'
        )
    )
);
    
?>

<div class="form-group">
    <?php echo $this->Form->submit('Guardar cambios', array(
        'div' => 'col col-md-9 col-md-offset-2',
        'class' => 'btn btn-primary'
    )); ?>
</div>

<?php echo $this->Form->end(); ?>