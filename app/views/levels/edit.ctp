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
 		<legend><?php __('Editer un niveau'); ?></legend>
	<?php
		echo $this->Form->input('title', array( 'label' => 'Nom'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Envoyer', true));?>
</div>
