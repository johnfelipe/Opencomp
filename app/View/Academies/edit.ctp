<div class="academies form">
<?php echo $this->Form->create('Academy');?>
<h3>Fiche de l'académie "<?php echo $this->data['Academy']['name'] ?>"</h3>

    <?php
        echo $this->Form->input('name', array('label'=>'Nom de l\'académie :'));
        echo $this->Form->label('type','Type d\'académie :');
        $options=array('0'=>'Académie','1'=>'Sous-rectorat');
        echo $this->Form->select('type', $options, array('empty'=>false));
        echo $this->Form->input('User', array(
            'label'=>'Responsable(s) de l\'académie :',
            'class'=>'chzn-select',
            'data-placeholder'=>'Ajoutez un responsable ...',
            'style'=>'width : 300px;'));
    ?>
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