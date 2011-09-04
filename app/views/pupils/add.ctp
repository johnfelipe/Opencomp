<div class="pupils form">
<?php echo $this->Form->create('Pupil');?>
	<fieldset>
 		<legend><?php __('Ajouter des élèves'); ?></legend>
	<?php
		echo $this->Form->input('Nom');
		echo $this->Form->input('Prénom');
		echo $this->Form->input('Sexe');
		echo $form->input('birthday', array( 'label' => 'Date de naissance'
			    , 'dateFormat' => 'DMY'));
		echo $this->Form->input('classroom_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enregistrer', true));?>
</div>




--------------------------
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Lister les élèves', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('Lister les classes', true), array('controller' => 'classrooms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nouvelle classe', true), array('controller' => 'classrooms', 'action' => 'add')); ?> </li>
	</ul>
</div>