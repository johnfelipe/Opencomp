<?php echo $this->element('listes_nav'); ?>

<?php
echo $html->link(
    '<span class="leftarrow icon"></span>'.__('Liste des niveaux',true),
    array('controller'=>'levels', 'action'=>'index'),
    array('class'=>'button', 'escape' => false)
);
?>
<br /><br />

<div class="levels form">
<?php echo $this->Form->create('Level');?>
	<fieldset>
 		<legend><?php __('Ajouter un niveau'); ?></legend>
	<?php
		echo $this->Form->input('title', array( 'label' => 'Nom'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enregistrer', true));?>
</div>




<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Lister les niveaux', true), array('action' => 'index'));?></li>
	</ul>
</div>