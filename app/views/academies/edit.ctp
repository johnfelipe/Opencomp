<div class="academies form">
<?php echo $this->Form->create('Academie');?>
	<fieldset>
 		<legend><?php __('Editer une academie'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('Nom');
		echo $this->Form->input('Administrateur');
                echo $this->Form->input('establishment_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enregistrer', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

                <li><?php echo $this->Html->link(__('Lister les academies', true), array('action' => 'index'));?></li>	
                <li><?php echo $this->Html->link(__('Nouvelle academie', true), array('controller' => 'academies', 'action' => 'add')); ?> </li>
                <li><?php echo $this->Html->link(__('Supprimer une academie', true), array('action' => 'delete', $this->Form->value('establishment.id')), null, sprintf(__('Etes-vous sure de vouloir supprimer cette academie # %s?', true), $this->Form->value('establishment.id'))); ?></li>
		
	</ul>
</div>
