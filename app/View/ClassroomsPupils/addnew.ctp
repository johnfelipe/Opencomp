<div class="page-title">
    <h2><?php echo __('Ajouter un nouvel élève à la classe'); ?></h2>
    <?php echo $this->Html->link('<i class="icon-arrow-left"></i> '.__('retour à la classe'), '/classrooms/view/'.$classroom_id, array('class' => 'ontitle btn', 'escape' => false)); ?>
</div>

<?php 

echo $this->Form->create('Classroom', array('class' => 'form-horizontal'));

echo $this->Form->input('Pupil.first_name', array(
    'label' => array(
        'text' => 'Prénom de l\'élève',
        'class' => 'control-label'
    )
)); 

echo $this->Form->input('Pupil.name', array(
    'label' => array(
        'text' => 'Nom de l\'élève',
        'class' => 'control-label'
    )
)); 

echo $this->Form->input('Pupil.sex', array(
	'type' => 'select',
    'options' => array('M'=>'Masculin','F'=>'Féminin'),
    'label' => array(
        'text' => 'Sexe de l\'élève',
        'class' => 'control-label'
    )
)); 

echo $this->Form->input('Pupil.birthday', array(
        'class' => 'span2 startdate',
        'type' => 'text',
        'readonly' => 'readonly',
        'prepend' => array('<i class="icon-calendar"></i>'),
        'label' => array(
            'text' => 'Date de naissance',
            'class' => 'control-label'
        )
)); 

echo $this->Form->hidden('ClassroomsPupil.classroom_id', array('value' => $classroom_id));

echo $this->Form->input('ClassroomsPupil.level_id', array(
	'after' => '<p class="help-block">'.__("Opencomp vous demande de spécifier un niveau pour chaque élève car certaines classes peuvent comporter des élèves de niveaux différents.").'</p>',
    'label' => array(
        'text' => 'Niveau scolaire',
        'class' => 'control-label'
    )
));

?>

<div class="form-actions">
     <?php echo $this->Form->button('Enregistrer les modifications', array('type' => 'submit', 'class' => 'btn btn-primary')); ?>        
</div>

<?php echo $this->Form->end(); ?>