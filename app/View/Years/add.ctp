<?php echo $this->element('listes_nav'); ?>

<?php
echo $this->Html->link(
    '<span class="leftarrow icon"></span>'.__('Liste des années scolaires',true),
    array('controller'=>'years', 'action'=>'index'),
    array('class'=>'button', 'escape' => false)
);
?>

<br /><br />

<div class="years form">

<?php echo $this->Form->create('Year');?>
    <fieldset>
        <legend><?php __('Ajouter une année scolaire'); ?></legend>
    <?php
        echo $this->Form->input('title', array( 'label' => 'Année scolaire'));
    ?>
    </fieldset>

<?php echo $this->Form->end(__('Ajouter', true));?>

</div>
