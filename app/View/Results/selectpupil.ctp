<div class="page-title">
    <h2><?php echo __('<span class="flash">Flashez</span> l\'élève dont vous souhaitez saisir le résultat'); ?></h2>
    <?php echo $this->Html->link('<i class="icon-arrow-left"></i> '.__('TODO'), '/classrooms/viewtests/', array('class' => 'ontitle btn', 'escape' => false)); ?>
</div>

<?php

echo $this->Form->create('Result', array(
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

echo $this->Form->input('pupil_id', array(
	'between' => '<div class="controls"><div class="input-prepend"><span class="add-on"><i class="icon-barcode"></i></span>',
	'class' => 'span1 send',
	'type' => 'text',
    'label' => array(
        'text' => 'Code barre élève',
        'class' => 'control-label'
    )
));

echo $this->Form->end(); 

?>