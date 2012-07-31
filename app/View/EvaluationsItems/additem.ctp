<div class="page-title">
    <h2><?php echo __('Ajouter un item'); ?></h2>
    <?php echo $this->Html->link('<i class="icon-arrow-left"></i> '.__('retour à l\'arbre de compétences'), 'index', array('class' => 'ontitle btn', 'escape' => false)); ?>
</div>

<div class="alert alert-info">
  Vous êtes sur le point de créer un nouvel item.<br />
  Le nouvel item sera inséré dans la compétence <code><?php echo $path; ?></code>.

</div>

<?php 

echo $this->Form->create('EvaluationsItem', array(
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

echo $this->Form->input('Item.title', array(
    'label' => array(
        'text' => 'Libellé de l\'item',
        'class' => 'control-label'
    )
)); 

echo $this->Form->hidden('Item.competence_id', array('value' => $competence_id));
echo $this->Form->hidden('Item.classroom_id', array('value' => $eval['Evaluation']['id']));
echo $this->Form->hidden('Item.type', array('value' => 3));
    
?>

<div class="form-actions">
     <?php echo $this->Form->button('Créer ce nouvel item', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>        
</div>

<?php echo $this->Form->end(); ?>