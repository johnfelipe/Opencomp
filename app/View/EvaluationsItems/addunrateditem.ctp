<div class="page-title">
    <h2><?php echo __('Ajouter un item non évalué'); ?></h2>
    <?php echo $this->Form->postLink('<i class="icon-arrow-left"></i> '.__('retour à l\'arbre de compétences'), '/competences/attachunrateditem/', array('data' => array('Classroom.classroom_id' => $this->request->params['named']['classroom_id'], 'Classroom.period_id' => $this->request->params['named']['period_id']), 'class' => 'ontitle btn', 'escape' => false)); ?>
</div>

<div class="alert alert-info">
  Vous êtes sur le point de créer un nouvel item.<br />
  Le nouvel item sera inséré dans la compétence <code><?php echo $path; ?></code>.

</div>

<?php 

echo $this->Form->create('Item', array(
    'class' => 'form-horizontal',
    'url' => array(
    	'controller' => 'evaluationsItems',
    	'action' => 'addunrateditem',
    	'classroom_id' => $this->request->params['named']['classroom_id'],
    	'period_id' => $this->request->params['named']['period_id'],
    	'competence_id' => $competence_id
    ),
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
	'type' => 'textarea',
    'label' => array(
        'text' => 'Libellé de l\'item',
        'class' => 'control-label'
    )
)); 

echo $this->Form->input('Level', array(
    'class'=>'chzn-select',
    'data-placeholder' => 'Sélectionnez un/des niveau(x) ...',
    'style'=>'width : 220px;',
    'label' => array(
        'text' => 'Niveau de l\'item',
        'class' => 'control-label'
        )
    )
);

echo $this->Form->hidden('competence_id', array('value' => $competence_id));
echo $this->Form->hidden('classroom_id', array('value' => $this->request->params['named']['classroom_id']));
echo $this->Form->hidden('user_id', array('value' => AuthComponent::user('id')));
echo $this->Form->hidden('type', array('value' => 3));
    
?>

<div class="form-actions">
     <?php echo $this->Form->button('Créer ce nouvel item', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>        
</div>

<?php echo $this->Form->end(); ?>