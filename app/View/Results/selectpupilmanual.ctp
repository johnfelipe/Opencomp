<div class="page-title">
    <h2><?php echo __('Quel est l\'élève dont vous souhaitez saisir le résultat'); ?></h2>
    <?php echo $this->Html->link('<i class="icon-ok"></i> '.__('J\'ai terminé la saisie'), '/evaluations/manageresults/'.$evaluation_id, array('class' => 'ontitle btn btn-success', 'escape' => false)); ?>
</div>

<?php

echo $this->Form->create('Result', array('class' => 'form-horizontal'));

echo $this->Form->input('pupil_id', array(
        'class'=>'chzn-select send',
        'data-placeholder' => 'Sélectionnez un élève',
        'style'=>'width : 220px;',
        'label' => array(
            'text' => 'Élève',
            'class' => 'control-label'
        )
    )
);

?>

<div class="form-actions">
     <?php echo $this->Form->button('Saisir le résultat', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>
</div>

<?php
echo $this->Form->end();
?>