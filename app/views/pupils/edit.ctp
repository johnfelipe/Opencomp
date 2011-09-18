<div class="pupils form">
<?php echo $this->Form->create('Pupil');?>
	<fieldset>
 		<legend><?php __('Editer un élève'); ?></legend>
<?php
		echo $this->Form->input('Nom');
		echo $this->Form->input('Prénom');
		$options=array('M'=>'Masculin','F'=>'Féminin');
		echo $form->radio('sex',$options,array( 'legend' => 'Date de naissance'));
		echo $form->input('birthday', array( 'label' => 'Date de naissance'
			    , 'dateFormat' => 'DMY'));
		echo $this->Form->input('classroom_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Envoyer', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Supprimer', true), array('action' => 'delete', $this->Form->value('Pupil.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Pupil.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Lister les élèves', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('Lister les classes', true), array('controller' => 'classrooms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nouvelle classe', true), array('controller' => 'classrooms', 'action' => 'add')); ?> </li>
	</ul>
</div>