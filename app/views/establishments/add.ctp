<div class="establishments form">
<?php echo $this->Form->create('Establishment');?>
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




<div class="actions">
    <h3><?php __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Lister les établissements', true), array('action' => 'index'));?></li>
    </ul>
</div>
