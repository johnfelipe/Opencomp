<div class="establishments form">
<?php

echo $html->link(
    '<span class="leftarrow icon"></span>'.__('Liste des établissements',true),
    array('controller'=>'establishments', 'action'=>'index'),
    array('class'=>'button', 'escape' => false)
);

echo '<p></p>'.$this->Form->create('Establishment');?>
    <fieldset>
        <legend><?php __('Ajouter un établissement'); ?></legend>
    <?php
        echo $this->Form->input('name', array( 'label' => 'Nom'));
        echo $this->Form->input('address', array( 'label' => 'Adresse'));
        echo $this->Form->input('postcode', array( 'label' => 'Code Postal'));
        echo $this->Form->input('town', array( 'label' => 'Ville'));
        echo $this->Form->input('user_id', array('options' => $utilisateurs, 'label'=>'Directeur de l\'établissement'));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Enregistrer', true));?>
</div>
