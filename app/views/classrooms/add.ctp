<div class="classrooms form">
<?php echo $this->Form->create('Classroom');?>
	<fieldset>
 		<legend><?php __('Ajouter une classe'); ?></legend>
	<?php
		echo $this->Form->input('title');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Envoyer', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Lister les classes', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('Lister les élèves', true), array('controller' => 'pupils', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nouvel élève', true), array('controller' => 'pupils', 'action' => 'add')); ?> </li>
	</ul>
</div>