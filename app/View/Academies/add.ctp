<div class="academies form">

<?php

echo $this->Html->link(
    '<span class="leftarrow icon"></span>'.__('Liste des académies',true),
    array('controller'=>'academies', 'action'=>'index'),
    array('class'=>'button', 'escape' => false)
);

echo '<p></p>'.$this->Form->create('Academy');?>
    <fieldset>
        <legend><?php __('Ajouter une académie'); ?></legend>
    <?php
        echo $this->Form->input('name', array('label'=>'Nom de l\'académie :'));
        echo $form->label('type','Type d\'académie :');
        $options=array('0'=>'Académie','1'=>'Sous-rectorat');
        echo $form->select('type', $options, 0, array('empty'=>false));
        echo $this->Form->input('User', array(
            'label'=>'Responsable(s) de l\'académie :',
            'class'=>'chzn-select',
            'data-placeholder'=>'Ajoutez un responsable ...',
            'style'=>'width : 300px;'));
    ?>
        </fieldset>
</div>
<?php echo $this->Form->end(__('Ajouter', true));?>
</div>
