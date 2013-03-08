<div class="page-title">
    <h2><?php echo __('<span class="flash">Flashez</span> l\'élève dont vous souhaitez saisir le résultat'); ?></h2>
    <?php echo $this->Html->link('<i class="icon-ok"></i> '.__('J\'ai terminé la saisie'), '/evaluations/manageresults/'.$evaluation_id, array('class' => 'ontitle btn btn-success', 'escape' => false)); ?>
</div>

<?php

echo $this->Form->create('Result', array('class' => 'form-horizontal'));

echo $this->Form->input('pupil_id', array(
	'prepend' => '<i class="icon-barcode"></i>',
	'class' => 'span1 send',
	'type' => 'text',
    'label' => array(
        'text' => 'Code barre élève',
        'class' => 'control-label'
    )
));

echo $this->Form->end(); 

?>