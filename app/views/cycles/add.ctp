<?php echo $this->element('listes_nav'); ?>

<?php
echo $html->link(
    '<span class="leftarrow icon"></span>'.__('Liste des cycles d\'apprentissage',true),
    array('controller'=>'cycles', 'action'=>'index'),
    array('class'=>'button', 'escape' => false)
);
?>
<br /><br />

<div class="cycles form">
<?php echo $this->Form->create('Cycle');?>
	<fieldset>
 		<legend><?php __('Ajouter un cycle d\'apprentissage'); ?></legend>
	<?php
		echo $this->Form->input('title', array( 'label' => 'Nom'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enregistrer', true));?>
</div>