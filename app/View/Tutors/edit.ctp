<div class="tutors form">
<?php echo $this->Form->create('Tutor');?>
	<fieldset>
 		<legend><?php __('Editer un tuteur'); ?></legend>
	<?php
		echo $this->Form->input('Nom');
		echo $this->Form->input('Prénom');
		echo $this->Form->input('Adresse');
                echo $this->Form->input('Code Postal');
                echo $this->Form->input('Ville');
                echo $this->Form->input('N° de téléphone');
                echo $this->Form->input('N° de téléphone 2(facultatif)');
                echo $this->Form->input('Adresse e-mail');
                echo $this->Form->input('Notes');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enregistrer', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

                <li><?php echo $this->Html->link(__('Lister les tuteurs', true), array('action' => 'index'));?></li>	
                <li><?php echo $this->Html->link(__('Ajouter un tuteur', true), array('controller' => 'tutors', 'action' => 'add')); ?> </li>
                <li><?php echo $this->Html->link(__('Supprimer un tuteur', true), array('action' => 'delete', $this->Form->value('tutor')), null, sprintf(__('Etes-vous sure de vouloir supprimer ce tuteur # %s?', true), $this->Form->value('tutor'))); ?></li>
		
	</ul>

 

</div>
