<?php echo $this->element('listes_nav'); ?>

<?php
echo $html->link(
    '<span class="leftarrow icon"></span>'.__('Liste des périodes scolaires',true),
    array('controller'=>'periods', 'action'=>'index'),
    array('class'=>'button', 'escape' => false)
);
?>

<br /><br />

<div class="periods form">
<?php echo $this->Form->create('Period');?>
	<fieldset>
 		<legend><?php __('Éditer une période scolaire'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('begin', array( 'label' => 'Date de début :', 'dateFormat' => 'DMY'));
		echo $this->Form->input('end', array( 'label' => 'Date de fin :', 'dateFormat' => 'DMY'));
		echo $this->Form->input('year_id', array( 'label'=>'Année scolaire :'));
		echo $this->Form->input('establishment_id', array( 'label'=>'Établissement :'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Envoyer', true));?>
</div>