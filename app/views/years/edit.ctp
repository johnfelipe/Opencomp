<div class="years form">
<?php echo $this->Form->create('Year');?>
    <fieldset>
        <legend><?php __('Éditer une année scolaire'); ?></legend>
    <?php
        echo $this->Form->input('year', array( 'label' => 'Année scolaire'));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Enregistrer', true));?>
</div>
<div class="actions">
    <h3><?php __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('Lister les années scolaires', true), array('action' => 'index'));?></li>
        <li><?php echo $this->Html->link(__('Nouvelle année scolaire', true), array('controller' => 'years', 'action' => 'add')); ?> </li>
    </ul>
</div>
