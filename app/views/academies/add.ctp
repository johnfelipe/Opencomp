<div class="academies form">

<?php echo $this->Form->create('Academy');?>
	<fieldset>
 		<legend><?php __('Ajouter une Academie'); ?></legend>
	<?php
		echo $this->Form->input('name', array( 'label' => 'Nom de l\'académie'));
		echo $form->label('type');
		$options=array('0'=>'Académie','1'=>'Sous-rectorat');
		$attributes['empty'] = false;
		echo $form->select('type',$options,NULL,$attributes);
	?>
        </fieldset>
</div>
<?php echo $this->Form->end(__('Ajouter', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Lister les academies', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('Nouvelle academie', true), array('controller' => 'academies', 'action' => 'add')); ?> </li>
	</ul>
</div>
