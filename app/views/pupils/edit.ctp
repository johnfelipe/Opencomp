<div class="pupils form">
<?php echo $this->Form->create('Pupil');?>
	<fieldset>
 		<legend><?php __('Editer un élève'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nom');
		echo $this->Form->input('prenom');
		echo $this->Form->input('sexe');
		echo $this->Form->input('date-de-naissance');
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