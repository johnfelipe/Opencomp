<div class="academies form">
<?php echo $this->Form->create('Academy');?>
    <fieldset>
        <legend><?php __('Éditer une académie'); ?></legend>
    <?php
        echo $this->Form->input('name');
        echo $form->label('type');
        $options=array('0'=>'Académie','1'=>'Sous-rectorat');
        echo $form->select('type',$options)
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
